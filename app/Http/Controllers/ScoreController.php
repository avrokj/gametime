<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function index()
    {
        // Retrieve the players collection from the session
        $players = Session::get('players');
        // Check if players data exists in session
        if ($players) {
        // Filter players with status 'away_court'
        $awayCourtPlayers = $players->where('status', 'away_court')->take(5); // Limit to 5 players
        }
        else
        {
        $awayCourtPlayers = collect(); // Empty collection if no players found
    }

        $game = Game::find(1);
        $home_team = Team::find($game->home_team_id);
        $away_team = Team::find($game->away_team_id);
        $home_score = $game->home_score;
        $away_score = $game->away_score;
        $id = $game->id;
        return view('score.index', [
            'home_team' => $home_team,
            'away_team' => $away_team,
            'home_score' => $home_score,
            'away_score' => $away_score,
            'id' => $id
        ], compact('awayCourtPlayers'));
        
    }

    public function updateHomeScore(Request $request)
    {
        $game = Game::find(1);
        if ($game) {
            $game->home_score = $request->input('homeScore');
            $game->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Game not found']);
    }

    public function updateAwayScore(Request $request)
    {
        $game = Game::find(1);
        if ($game) {
            $game->away_score = $request->input('awayScore');
            $game->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Game not found']);
    }

    public function updateScore(Request $request)
    {
        $game = Game::find(1);
        if ($game) {
            $game->away_score = $request->input('awayScore');
            $game->home_score = $request->input('homeScore');
            $game->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Game not found']);
    }
}
