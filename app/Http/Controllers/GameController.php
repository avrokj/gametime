<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use App\Models\Event;
use App\Models\Lineup;
use App\Models\Player;
use App\Models\Team;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        $games = Game::orderBy('datetime', 'desc')
            ->paginate(20);
        $teams = Team::all();
        $events = Event::all();
        $players = Player::all();

        return view('games.index', compact('games', 'teams', 'events', 'players'));
    }


    public function search(Request $request)
    {
        $term = $request->input('search');

        // Search for games by game name, related team names (home or away), or event name
        $games = Game::where('id', 'like', "%$term%")
            ->orWhereHas('homeTeam', function ($query) use ($term) {
                $query->where('team_name', 'like', "%$term%");
            })
            ->orWhereHas('awayTeam', function ($query) use ($term) {
                $query->where('team_name', 'like', "%$term%");
            })
            ->orWhereHas('event', function ($query) use ($term) {
                $query->where('event_name', 'like', "%$term%");
            })
            ->orderBy('datetime')
            ->paginate(20);

        $teams = Team::all();
        $events = Event::all();

        return view('games.index', compact('games', 'teams', 'events'));
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
        // Validate the request
        $validatedData = $request->validated();

        // Create the game
        $game = Game::create($validatedData);

        // Fetch the selected home team's players
        if ($request->has('home_team_id')) {
            $selectedHomeTeam = Team::with('players')->find($request->home_team_id);
            if ($selectedHomeTeam) {
                // Store lineup data for the selected home team's players
                foreach ($selectedHomeTeam->players as $player) {
                    Lineup::create([
                        'game_id' => $game->id,
                        'player_id' => $player->id,
                        'player_team_id' => $player->team_id,
                        'status' => 'active'
                    ]);
                }
            }
        }

        // Fetch the selected away team's players
        if ($request->has('away_team_id')) {
            $selectedAwayTeam = Team::with('players')->find($request->away_team_id);
            if ($selectedAwayTeam) {
                // Store lineup data for the selected away team's players
                foreach ($selectedAwayTeam->players as $player) {
                    Lineup::create([
                        'game_id' => $game->id,
                        'player_id' => $player->id,
                        'player_team_id' => $player->team_id,
                        'status' => 'active'
                    ]);
                }
            }
        }

        return redirect()->route('games.index')
            ->withSuccess('New game is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        // return view('games.show', [
        //     'game' => $game
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        // return view('games.edit', [
        //     'game' => $game
        // ]);
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
