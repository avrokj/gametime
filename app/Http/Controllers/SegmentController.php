<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\GameLog;
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
        return view('score.hometeam', compact('homeTeamPlayers'));
    }
    public function guestteam($game_id, $team_id)
    {
        $guestTeamPlayers = Lineup::where('player_team_id', $team_id)
            ->where('game_id', $game_id)->get();

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

    public function stats($game_id)
    {
        // Fetch the game log entries for the given game ID
        $gamelogs = GameLog::where('game_id', $game_id)->get();
        $gamelogs->load('player');

        // Group game logs by player
        $playersStats = $gamelogs->groupBy('player_id')->map(function ($logs) {
            $playerStats = [
                'player' => $logs->first()->player, // Assuming player relationship is defined
                'total_points' => 0,
                'total_actions' => $logs->count(),
                'made_shots' => 0,
                'total_shots' => $logs->whereIn('action', [0, 1, 2, 3])->count(),
                'total_in' => $logs->whereIn('action', [1, 2, 3])->count(),
                'actions' => [
                    0 => 0, // Missed Shot
                    1 => 0, // Made Freethrow
                    2 => 0, // Made 2-pointer
                    3 => 0, // Made 3-pointer
                ]
            ];

            // Calculate points and actions
            foreach ($logs as $log) {
                $action = $log->action;
                $playerStats['actions'][$action]++;
                if ($action == 1) $playerStats['total_points'] += 1; // Freethrow
                if ($action == 2) $playerStats['total_points'] += 2; // 2-point shot
                if ($action == 3) $playerStats['total_points'] += 3; // 3-pointer
                if (in_array($action, [1, 2, 3])) $playerStats['made_shots']++;
            }

            // Calculate shooting percentage
            $playerStats['shooting_percentage'] = $playerStats['total_shots'] > 0 ? ($playerStats['made_shots'] / $playerStats['total_shots']) * 100 : 0;

            return $playerStats;
        });

        // Group player stats by team
        $teamsStats = $playersStats->groupBy(function ($stats) {
            return $stats['player']->team->team_name;
        });

        return view('score.stats', compact('teamsStats'));
    }

    public function gamelog($game_id)
    {
        $gamelog = GameLog::where('game_id', $game_id)->get();
        // Eager load players to avoid multiple queries in the view
        $gamelog->load('player');

        return view('score.gamelog', compact('gamelog'));
    }
}
