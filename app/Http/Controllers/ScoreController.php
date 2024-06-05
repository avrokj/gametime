<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use App\Models\Game;
use App\Models\Lineup;
use App\Models\Team;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Support\Facades\Log;

class ScoreController extends Controller
{
    public function index($id)
    {
        $buttons =
            [
                'step' => [-1, 0, 1, 2, 3],
                'color' => ['#BF0915', '#555555', '#08680B', '#08680B', '#08660D'],
                'bg_color' => ['#C1A3A6', '#C1B6A6', '#B4BfB7', '#A2B3A6', '#A2B3A6']
            ];

        $game = Game::find($id);
        $home_team = Team::find($game->home_team_id);
        $away_team = Team::find($game->away_team_id);
        $home_score = $game->home_score;
        $away_score = $game->away_score;
        $id = $game->id;
        $status = $game->status;
        // Retrieve the players collection from the session
        $players = Lineup::where('game_id', $id)->get();
        // Check if players data exists in session
        if ($players) {
            // Filter players with status 'xxxx_court'
            $awayTeamPlayers = $players->where('status', 'guest_court')->take(5); // Limit to 5 players
            $homeTeamPlayers = $players->where('status', 'home_court')->take(5); // Limit to 5 players
        } else {
            $homeTeamPlayers = collect(); // Empty collection if no players found
            $awayTeamPlayers = collect(); // Empty collection if no players found
        }
        //dd($buttons['color']);
        return view('score.index', [
            'home_team' => $home_team,
            'away_team' => $away_team,
            'home_score' => $home_score,
            'away_score' => $away_score,
            'game_id' => $id,
            'status' => $status,
            'buttons' => $buttons,
            'sb_id' => $game->sb_id
        ], compact('awayTeamPlayers', 'homeTeamPlayers', 'id'));
    }

    public function updateHomeScore(Request $request, $id)
    {
        $game = Game::find($id);
        if ($game) {
            $game->home_score = $request->input('homeScore');
            $game->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Game not found']);
    }

    public function updateAwayScore(Request $request, $id)
    {
        $game = Game::find($id);
        if ($game) {
            $game->away_score = $request->input('awayScore');
            $game->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Game not found']);
    }

    public function updateScore(Request $request, $id)
    {
        //Log::info('Updating score for game ID: ' . $id);
        //Log::info('Request data: ', $request->all());
        $game = Game::find($request->input('id'));
        if ($game) {
            $game->away_score = $request->input('away_score');
            $game->home_score = $request->input('home_score');
            $game->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Game not found']);
    }

    public function lastHomeScoreUpdate(Request $request)
    {
        $player_id = (int)$request->player_id;
        $points = (int)$request->points;

        return redirect()->route('score.index')->with('success', 'Gamelog updated');
    }

    public function lastAwayScoreUpdate(Request $request)
    {
        $player_id = (int)$request->player_id;
        $points = (int)$request->points;

        return redirect()->route('score.index')->with('success', 'Gamelog updated');
    }
}
