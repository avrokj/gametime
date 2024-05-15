<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
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
        // Check if players data exists in session
        $players = Session::get('players');
        if ($players) {
        // Do something with the players data
        // For example, return another view with players data
        return view('segment.guestteam', compact('players'));
        }
        else
        {
        // Retrieve players based on team_id
        $players = Player::where('team_id', $team_id)->get();

        // Store players in the session
        Session::put('players', $players);
        }
        // Return the view with players data
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
