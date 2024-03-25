<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class SegmentController extends Controller
{
    public function index()
    {
        return view('segment.index');
    }
    public function hometeam()
    {
        return view('segment.hometeam');
    }
    public function guestteam()
    {
        return view('segment.guestteam');
    }
    public function team()
    {
        return view('segment.team');
    }
    public function player()
    {
        return view('segment.player');
        
    }
    public function score()
    {
        $game = Game::find(1);
        return view('segment.score', ['game' => $game]);
    }
    public function updateScore(Request $request)
{
    $game = Game::find($request->input('gameId'));
    if ($game) {
        $game->away_score = $request->input('awayScore');
        $game->save();
        return response()->json(['success' => true]);
    }
    return response()->json(['success' => false, 'message' => 'Game not found']);
}
}
