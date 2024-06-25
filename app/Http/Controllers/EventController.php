<?php

namespace App\Http\Controllers;

use App\Event;
use App\Joinedevent;
use Illuminate\Http\Request;
// use App\Http\Requests\UserRequest;
use Yajra\Datatables\Datatables;
// use Alert;

class EventController extends Controller
{
    //
    public function index(Event $model)
    {
    	# code...
    	return view('event.index', ['events' => $model->paginate(1000)]);
    }

    public function create()
    {
    	# code...
    	return view('event.create');
    }

    public function search()
    {
        return Datatables::of(Event::query())->make(true);
    }

    public function store(Request $request, Event $event)
    {
        // return($request);
        $event->create($request->all());

        return redirect()->route('event.index')->withStatus(__('Event successfully created.'));
    }

    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    public function update(Request $request, Event  $event)
    {
        // return($request);
        $event->update($request->all());

        return redirect()->route('event.index')->withStatus(__('Event successfully updated.'));
    }

    public function destroy(Event  $event)
    {
        $event->delete();
        // return($event);
        return redirect()->route('event.index')->withStatus(__('Event successfully deleted.'));
    }
}
