<?php

namespace App\Http\Controllers;

use App\Joinedevent;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use DB;
use File;

class JoinedeventController extends Controller
{
    //
    public function index(Request $request, Joinedevent $joinedevent, Event $event)
    {
    	# sebagian function ini ada di event.blade.php
    	$je = Joinedevent::all();
        $event = Event::all();
        
        // $idUser = DB::table('users')

        $event2 = DB::table('events')
               ->join('joinedevents', 'events.id', '=', 'joinedevents.event_id')
               ->orderBy('joinedevents.event_id', 'asc')
               ->get(array(
                    'events.*',
                    'joinedevents.event_id',
                    'joinedevents.user_id',
                    'joinedevents.status',
                    'joinedevents.invoice'
               ));

        $user = DB::table('events')
            ->join('joinedevents', 'events.id', '=', 'joinedevents.event_id')
            ->join('users', 'users.id', '=', 'joinedevents.user_id')
            ->where('joinedevents.user_id', $request->user_id)
            ->get(array(
                'u_id' => 'users.id',
                'users.name',
                'users.NRA',
                'users.email',
                'users.position',
                'e_id' => 'events.id',
                'events.event_name',
                'events.event_category',
                'events.price_int',
                'events.price_ext',
                'events.place',
                'events.quota',
                'events.event_start',
                'events.event_end',
                'events.description',
                'events.attachment',
                'joinedevents.event_id',
                'joinedevents.user_id',
                'joinedevents.status',
                'joinedevents.invoice'
        ));

    	return view('users.event', ['events' => $event->all(), 'joinedevents' => $je->all(), 'users' => $user->all()]);
    }

    public function search()
    {
        return Datatables::of(Event::query())->make(true);
    }

    public function add(Request $request, Joinedevent $joinedevent)
    {
    	# code...
    	$joinedevent::create([
    		'user_id' => $request->user_id,
    		'event_id' => $request->event_id
    	]);

        // return($request);

    	return redirect()->route('user.event')->withStatus(__('Event successfully added to your list.'));
    }

    public function update(Request $request, Joinedevent $joinedevent)
    {
        # code...
        $ev_id = $request->event_id;
        $joinedevent
            ->where('event_id', $request->event_id)
            ->where('user_id', $request->user_id)
            ->update([
                'status' => $request->status
            ]);

        // return($request->all());

        return redirect()->route('event.list', $ev_id)->withStatusmember(__('User status successfully edit.'));
    }

    public function attendance(Event $event)
    {
        # code...
        return view('event.attendance', ['events' => $event->paginate(15)]);
    }

    public function list(Request $request, Joinedevent $joinedevent, Event $event, User $user)
    {
    	# get data attendance
    	$joinedevent = Joinedevent::all()->where('event_id', $request->event_id);

    	// get event name
    	$event = Event::all()->where('id', $request->event_id);

    	// get user info
    	$user = DB::table('users')
            ->join('joinedevents', 'users.id', '=', 'joinedevents.user_id')
            ->join('events', 'events.id', '=', 'joinedevents.event_id')
            ->where('joinedevents.event_id', $request->event_id)
            ->get(array(
                'users.*',
                'joinedevents.*'
        ));

    	return view('event.list', ['joinedevents' => $joinedevent, 'events' => $event, 'users' => $user]);
    }

    public function deleteJoinedEvent(Request $request)
    {
        $fileName = $request->invoice;
        $doc_path = public_path('storage\invoice\\'.$fileName);

        // return($doc_path);

        if (File::exists($doc_path)) {
            
            File::delete($doc_path);
            
            DB::table('joinedevents')
            ->where('event_id', $request->event_id)
            ->where('user_id', $request->user_id)
            ->delete();
            return back()->withStatusmember(__('This user successfully removed from join the event.'));
        }
        else{
            return back()->withStatusmembererror(__('Failed to remove user.'));
        }

        // return back()->withStatusmember(__('This user successfully removed from join the event.'));
    }

    /**
     * Upload invoice
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function upload_invoice(Request $request) {
        
        // Validate first
        $this->validate($request, [
          'invoice' => 'required|image|mimes:jpg,png,jpeg,bmp,gif,svg,ico',
        ]);

        //get info file path
        $fileName = DB::table('joinedevents')
                    ->where('event_id', $request->event_id)
                    ->where('user_id', $request->user_id)
                    ->get(array(
                        'event_id',
                        'user_id',
                        'invoice'
        ));

        // get file path
        foreach ($fileName as $fn) {
            $doc_path = public_path('storage\invoice\\'.$fn->invoice);
        }
        
        //check if file exist then delete it
        if (File::exists($doc_path)) {
            File::delete($doc_path);            
        }

        if($request->hasFile('invoice')){
            $resource       = $request->file('invoice');
            $invoiceName = auth()->user()->id.'_invoice'.time().'.'.request()->invoice->getClientOriginalExtension();

            $uploadpath = 'storage/invoice';
            $resource->move($uploadpath, $invoiceName);
            $save = DB::table('joinedevents')
                        ->where('event_id', $request->event_id)
                        ->where('user_id', $request->user_id)
                        ->update(['invoice' => $invoiceName]);
            return back()->withStatus(__('Invoice successfully uploaded.'));
        }
        else{
            return back()->route('user.event')->withStatuserror(__('Invoice upload failed.'));
        }
        
    }

    public function upload_attachment(Request $request) {
        
        // Validate first
        $this->validate($request, [
          'attachment' => 'required',
        ]);

        //get info file path
        $fileName = DB::table('events')
                    ->where('id', $request->event_id)
                    ->get(array(
                        'attachment'
        ));

        // get file path
        foreach ($fileName as $fn) {
            $doc_path = public_path('storage\docs\\'.$fn->attachment);
        }
        
        //check if old file exist, then delete it
        if (File::exists($doc_path)) {
            
            File::delete($doc_path);

        }

        if($request->hasFile('attachment')){
            
            $resource       = $request->file('attachment');
            // $attachmentName = 'Event_'.$request->event_id.'_attachment'.time().'.'.request()->attachment->getClientOriginalExtension();

            $attachmentName = $resource->getClientOriginalName();

            $uploadpath = 'storage/docs';
            $resource->move($uploadpath, $attachmentName);

            $save = DB::table('events')
                        ->where('id', $request->event_id)
                        ->update(['attachment' => $attachmentName]);

            return back()->withStatus(__('Attachment successfully uploaded.'));
        }
        else{
            return back()->withStatuserror(__('Attachment upload failed.'));
        }
    }

    public function ppl_report(Request $request, Joinedevent $joinedevent, Event $event, User $user)
    {
        $joinedevent = Joinedevent::all();
        // $event = Event::all();
        $user = User::all();

        $event = DB::table('events')
            ->join('joinedevents', 'events.id', '=', 'joinedevents.event_id')
            ->join('users', 'users.id', '=', 'joinedevents.user_id')
            // ->select('events.*')
            ->where('joinedevents.user_id', auth()->user()->id)
            ->distinct()
            ->get(array(
                // 'users.*',
                // 'joinedevents.*',
                'u_id' => 'users.id',
                'users.name',
                'users.NRA',
                'users.email',
                'users.position',
                'e_id' => 'events.id',
                'events.event_name',
                'events.event_category',
                'events.place',
                'events.price_int',
                'events.price_ext',
                'events.quota',
                'events.SKPPL_type',
                'events.SKPPL',
                'events.event_start',
                'events.event_end',
                'events.description',
                'events.attachment',
                'joinedevents.event_id',
                'joinedevents.user_id',
                'joinedevents.status',
                'joinedevents.invoice'
        ));

        return view('users.ppl', ['users' => $user, 'events' => $event, 'joinedevents' => $joinedevent]);
    }
}
