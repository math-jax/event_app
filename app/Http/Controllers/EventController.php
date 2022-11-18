<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public $data;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['events'] = Event::orderBy('start_date', 'DESC')->paginate(12);
        return view('event.index', $this->data);
        // return view('event.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEventRequest $request)
    {
        if ($request->has('event_file')) {
            $imagePath = $request->file('event_file')->store('/event/', 'public');
        } else {
            $imagePath = null;
        }

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->venue = $request->venue;
        $event->image = $imagePath;
        $event->save();
        return redirect()->route('event.index')->with('success', 'Event Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['event'] = Event::find($id);
        return view('event.show', $this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['event'] = Event::find($id);
        // dd($this->data['event']);
        return view('event.form', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, $id)
    {
        $event = Event::find($id);
        if ($request->has('event_file')) {
            $imagePath = $request->file('event_file')->store('/event/', 'public');
        } else {
            $imagePath = null;
        }
        $event->title = $request->title;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->venue = $request->venue;
        $event->image = $imagePath;
        $event->save();
        return redirect()->route('event.index')->with('success', 'Event Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Event Deleted Successfully'
        ]);
    }

    public function loadEvents()
    {
        $events = Event::orderBy('start_date', 'DESC')->get();
        return view('partials.eventCard', compact('events'));
    }

    public function sortEventBy($id)
    {
        switch ($id) {
            case 0: // All Events
                $events = Event::orderBy('start_date', 'DESC')->get();
                return view('partials.eventCard', compact('events'));
                break;
            case 1: //Finished Events
                $events = Event::where('end_date', '<', now()->toDateString())->orderBy('start_date', 'DESC')->get();
                return view('partials.eventCard', compact('events'));
                break;
            case 2: //Finished Events in Past 7 Days
                $events = Event::whereBetween('end_date', [now()->toDateString(), now()->subWeek()->toDateString()])->orderBy('start_date', 'DESC')->orderBy('start_date', 'DESC')->get();
                return view('partials.eventCard', compact('events'));
                break;
            case 3: // Upcoming
                $events = Event::where('start_date', '>', now()->toDateString())->orderBy('start_date', 'DESC')->get();
                return view('partials.eventCard', compact('events'));
                break;
            case 4: // Upcoming within 7 days
                $events = Event::whereBetween('start_date', [now()->addDay()->toDateString(), now()->addWeek()->toDateString()])->orderBy('start_date', 'DESC')->get();
                return view('partials.eventCard', compact('events'));
                break;
            default: //default return empty collection
            $events = collect([]);
            return view('partials.eventCard', compact('events'));
        }
    }
}
