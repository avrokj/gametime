<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Event;
use App\Models\Team;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GameController extends Controller
{
    /**
     * Instantiate a new GameController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-game|edit-game|delete-game', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-game', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-game', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-game', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::latest()
            ->paginate(20);
        $teams = Team::all(); // Retrieve teams data
        $events = Event::all(); // Retrieve events data

        return view('games.index', compact('games', 'teams', 'events'));
    }


    public function search(StoreGameRequest $request)
    {
        // $term = $request->input('search');
        // $games = Game::where('game_name', 'like', "%$term%");
        // $games->orWhereHas('team', function ($query) use ($term) {
        //     $query->where('team_name', 'like', "%$term%");
        // });
        // $games = $games->orderBy('game_name')->paginate(20);
        // $teams = Team::all(); // Retrieve teams data

        // return view('games.index', compact('games', 'teams', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request): RedirectResponse
    {
        $request->validate([
            'event_id' => 'nullable|exists:events,id',
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id',
            'home_score' => 'nullable|integer|max:11',
            'away_score' => 'nullable|integer|max:11',
            'status' => 'nullable|integer|max:11',
        ]);

        $game = new Game();
        $game->event_id = $request->event_id;
        $game->home_team_id = $request->home_team_id;
        $game->away_team_id = $request->away_team_id;
        $game->home_score = $request->home_score;
        $game->away_score = $request->away_score;
        $game->status = $request->status;
        $game->save();

        return redirect()->route('games.index')
            ->withSuccess('New game is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game): View
    {
        // return view('games.show', [
        //     'game' => $game
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game): View
    {
        return view('games.edit', [
            'game' => $game
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game): RedirectResponse
    {
        $game->update($request->all());
        return redirect()->back()
            ->withSuccess('Game is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game): RedirectResponse
    {
        $game->delete();
        return redirect()->route('games.index')
            ->withSuccess('Game is deleted successfully.');
    }
}
