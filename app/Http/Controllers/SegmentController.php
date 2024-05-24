<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Player;
use App\Models\Lineup;

use Illuminate\Http\Request;

class SegmentController extends Controller
{
    public function index()
    {
        return view('segment.index');
    }

    public function hometeam($team_id)
    {
        $homeTeamPlayers = Lineup::where('player_team_id', $team_id)->get();
        //dd(compact('homeTeamPlayers'));
        return view('score.hometeam', compact('homeTeamPlayers'));
        
    }
    public function guestteam($team_id)
    {
        $guestTeamPlayers = Lineup::where('player_team_id', $team_id)->get();
        //dd(compact('guestTeamPlayers'));
        return view('score.guestteam', compact('guestTeamPlayers'));
        
    }

    public function team()
    {
        return view('score.team');
    }

    public function player()
    {
        return view('score.player');
    }
}
