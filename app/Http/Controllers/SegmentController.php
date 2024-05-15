<?php

namespace App\Http\Controllers;
use App\Models\Player;

use Illuminate\Http\Request;

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

    public function guestteam($team_id)
    {
        //dd($team_id);
        $players = Player::where('team_id', $team_id)->get();
        //dd($players);
        return view('segment.guestteam', compact('players'));
    }

    public function team()
    {
        return view('segment.team');
    }

    public function player()
    {
        return view('segment.player');
    }
}
