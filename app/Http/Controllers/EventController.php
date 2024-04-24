<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Arena;
use App\Models\Game;
use App\Models\Sport;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EventController extends Controller
{
    /**
     * Instantiate a new EventController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-event|edit-event|delete-event', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-event', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-event', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-event', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()
            ->paginate(20);
        $sports = Sport::all(); // Retrieve teams data
        $games = Game::all(); // Retrieve events data        
        $arenas = Arena::all(); // Retrieve arenas data

        return view('events.index', compact('events', 'sports', 'games', 'arenas'));
    }


    public function search(StoreEventRequest $request)
    {
        // $term = $request->input('search');
        // $events = Game::where('event_name', 'like', "%$term%");
        // $events->orWhereHas('team', function ($query) use ($term) {
        //     $query->where('team_name', 'like', "%$term%");
        // });
        // $events = $events->orderBy('event_name')->paginate(20);
        // $teams = Team::all(); // Retrieve teams data

        // return view('events.index', compact('events', 'teams', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request): RedirectResponse
    {

        $validatedData = $request->validated();

        Event::create($validatedData);

        return redirect()->route('events.index')
            ->withSuccess('New event is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event): View
    {
        // return view('events.show', [
        //     'event' => $event
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event): View
    {
        // return view('events.edit', [
        //     'event' => $event
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event): RedirectResponse
    {
        $event->update($request->all());
        return redirect()->back()
            ->withSuccess('Game is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): RedirectResponse
    {
        $event->delete();
        return redirect()->route('events.index')
            ->withSuccess('Event is deleted successfully.');
    }
}
