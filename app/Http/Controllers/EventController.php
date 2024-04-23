<?php

namespace App\Http\Controllers;

use App\Models\Arena;
use App\Models\Country;
use App\Models\Position;
use App\Models\Event;
use App\Models\Sport;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_name')->paginate(20);
        $sports = Sport::all(); // Retrieve sports data
        $arenas = Arena::all(); // Retrieve arenas data
        return view('events.index', compact('events', 'sports', 'arenas'));
    }

    public function search(Request $request)
    {
        $term = $request->input('search');
        $events = Event::where('event_name', 'like', "%$term%")->orderBy('event_name')->paginate(20);
        $sports = Sport::all(); // Retrieve sports data
        $arenas = Arena::all(); // Retrieve arenas data

        return view('events.index', compact('events', 'sports', 'arenas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $sports = Sport::all();
        // return view('events.create', compact('sports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:45|unique:events',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'sport_id' => 'required|exists:sports,id',
            'coach_id' => 'required|exists:arenas,id'
        ]);

        $imageName = time() . '.' . $request->logo->extension();

        $request->logo->move(public_path('images/logos'), $imageName);

        $event = new Event();
        $event->event_name = $request->event_name;
        $event->logo = $imageName;
        $event->sport_id = $request->sport_id;
        $event->coach_id = $request->coach_id;
        $event->save();

        return redirect()->route('events.index')
            ->with('success', 'Event added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_name' => 'required|string|max:45|unique:events',
            'new_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'sport_id' => 'required|exists:sports,id',
            'coach_id' => 'required|exists:arenas,id'
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('new_logo')) {
            $imageName = time() . '.' . $request->new_logo->extension();
            $request->new_logo->move(public_path('images/logos'), $imageName);
            $event->logo = $imageName;
        }

        $event->event_name = $request->event_name;
        $event->sport_id = $request->sport_id;
        $event->coach_id = $request->coach_id;
        $event->save();

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    /**
     * Players by event.
     */
    public function playersByEvent($eventId)
    {
        // Retrieve the event by its ID
        $event = Event::findOrFail($eventId);

        // Retrieve all players belonging to the event
        $players = $event->players()->orderBy('player_no')->paginate(20);

        // Return a view with the players data
        return view('players.index', compact('event', 'players'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
