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
/*
    public function hometeam($team_id)
    {
        //Session::forget('homeTeamPlayers');
        // Check if players data exists in session
        $homeTeamPlayers = Session::get('homeTeamPlayers');
        
        if ($homeTeamPlayers) {
        // Do something with the players data
        // For example, return another view with players data
        return view('segment.hometeam', compact('homeTeamPlayers'));
        }
        else
        {
        // Retrieve players based on team_id
        $homeTeamPlayers = Player::where('team_id', $team_id)->get();

        // Store players in the session
        Session::put('homeTeamPlayers', $homeTeamPlayers);
        }
        // Return the view with players data
        //dd($homeTeamPlayers);
        return view('segment.hometeam', compact('homeTeamPlayers'));
        
    }
    */
/*
    public function guestteam($team_id)
    {
        //Session::forget('guestTeamPlayers');
        //Session::flush();
        // Check if players data exists in session
        $guestTeamPlayers = Session::get('guestTeamPlayers');
        //dd($guestTeamPlayers);
        if ($guestTeamPlayers) {
        // Do something with the players data
        // For example, return another view with players data
        return view('segment.guestteam', compact('guestTeamPlayers'));
        }
        else
        {
        // Retrieve players based on team_id
        $guestTeamPlayers = Player::where('team_id', $team_id)->get();
        //dd($guestTeamPlayers);
        // Store players in the session
        Session::put('guestTeamPlayers', $guestTeamPlayers);
        }
        // Return the view with players data
        //dd($guestTeamPlayers);
        return view('segment.guestteam', compact('guestTeamPlayers'));
        
    }
    */
    public function hometeam($team_id)
    {
        $homeTeamPlayers = Lineup::where('player_team_id', $team_id)->get();
        dd(compact('homeTeamPlayers'));
        return view('segment.hometeam', compact('homeTeamPlayers'));
        
    }
    public function guestteam($team_id)
    {
        $guestTeamPlayers = Lineup::where('player_team_id', $team_id)->get();
        //dd(compact('guestTeamPlayers'));
        return view('segment.guestteam', compact('guestTeamPlayers'));
        
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
