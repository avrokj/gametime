<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Game;
use App\Models\GameLog;
use App\Models\Team;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('datetime', 'desc')->get();
        $games = Game::orderBy('datetime', 'desc')->get();
        $teams = Team::all();
        $gamelogs = GameLog::all();

        return view('welcome', [
            'events' => $events,
            'games' => $games,
            'teams' => $teams,
            'gamelogs' => $gamelogs
        ]);
    }
}
