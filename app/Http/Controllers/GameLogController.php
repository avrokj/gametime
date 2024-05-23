<?php

namespace App\Http\Controllers;
use App\Models\GameLog;
use App\Models\Player;

use Illuminate\Http\Request;

class GameLogController extends Controller
{
    public function storeHome(Request $request)
    {
        $player = Player::find($request->player_id);

        // Check if the player exists
        if ($player) {
            // Get the team_id from the player
            $team_id = $player->team_id;
        }

        $request->validate
        ([
            'game_id' => 'required|integer',
            'team_id' => 'required|integer',
            'player_id' => 'required|integer',
            'action' => 'required|string|max:45',
            'home_score' => 'required|integer',
            'away_score' => 'required|integer'
        ]);

        $gameLog = new GameLog();
        $gameLog->game_id = $request->game_id;
        $gameLog->team_id = $team_id;
        $gameLog->player_id = $request->player_id;
        $gameLog->action = $request->action;
        $gameLog->home_score = $request->home_score;
        $gameLog->away_score = $request->away_score;
        $gameLog->save();

        // return redirect()->route('players.index')
        //     ->with('success', 'Player added successfully.');
        return back();
    }

    public function storeAway(Request $request)
    {
        $player = Player::find($request->player_id);

        // Check if the player exists
        if ($player) {
            // Get the team_id from the player
            $team_id = $player->team_id;
        }

        $request->validate
        ([
            'game_id' => 'required|integer',
            'team_id' => 'required|integer',
            'player_id' => 'required|integer',
            'action' => 'required|string|max:45',
            'home_score' => 'required|integer',
            'away_score' => 'required|integer'
        ]);

        $gameLog = new GameLog();
        $gameLog->game_id = $request->game_id;
        $gameLog->team_id = $team_id;
        $gameLog->player_id = $request->player_id;
        $gameLog->action = $request->action;
        $gameLog->home_score = $request->home_score;
        $gameLog->away_score = $request->away_score;
        $gameLog->save();

        // return redirect()->route('players.index')
        //     ->with('success', 'Player added successfully.');
        return back();
    }

}
