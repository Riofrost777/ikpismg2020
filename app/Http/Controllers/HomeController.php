<?php

namespace App\Http\Controllers;
use App\Joinedevent;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request, Joinedevent $joinedevent, Event $event, User $user)
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
                'events.price_int',
                'events.price_ext',
                'events.quota',
                'events.place',
                'events.SKPPL_type',
                'events.event_start',
                'events.event_end',
                'events.description',
                'events.attachment',
                'joinedevents.event_id',
                'joinedevents.user_id',
                'joinedevents.status',
                'joinedevents.invoice'
        ));

        return view('dashboard', ['users' => $user, 'events' => $event, 'joinedevents' => $joinedevent]);
    }
}
