<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\Player;
use App\Models\Lineup;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class SegmentController extends Controller
{
    public function index()
    {
        return view('segment.index');
    }

    public function hometeam($game_id, $team_id)
    {
        $homeTeamPlayers = Lineup::where('player_team_id', $team_id)
        ->where('game_id', $game_id)->get();

        $id = $homeTeamPlayers[0]->game_id;
        //dd(compact('homeTeamPlayers'));
        View::share('id', $id);
        return view('score.hometeam' ,compact('homeTeamPlayers'));
        
    }
    public function guestteam($game_id, $team_id)
    {
        $guestTeamPlayers = Lineup::where('player_team_id', $team_id)->get();
        $id = $guestTeamPlayers[0]->game_id;
        //dd($guestTeamPlayers[0]->game_id);
        View::share('id', $id);
        //dd($id);
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
