<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class ScoreController extends Controller
{
    public function index()
    {
        $game = Game::find(1);
        return view('score.index', ['game' => $game]);
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
