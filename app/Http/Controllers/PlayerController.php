<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Lineup;
use App\Models\Position;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ramsey\Uuid\Type\Integer;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::orderByRaw('CAST(player_no AS UNSIGNED) ASC')
            ->orderBy('team_id')
            ->paginate(20);
        $teams = Team::all(); // Retrieve teams data
        $positions = Position::all(); // Retrieve positions data
        $countries = Country::all(); // Retrieve countries data
        return view('teams.players.index', compact('players', 'teams', 'positions', 'countries'));
    }

    public function search(Request $request)
    {
        $term = $request->input('search');
        $players = Player::where('player_name', 'like', "%$term%");
        $players->orWhereHas('team', function ($query) use ($term) {
            $query->where('team_name', 'like', "%$term%");
        });
        $players = $players->orderBy('player_name')->paginate(20);
        $teams = Team::all(); // Retrieve teams data
        $positions = Position::all(); // Retrieve positions data
        $countries = Country::all(); // Retrieve countries data

        return view('teams.players.index', compact('players', 'teams', 'positions', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $teams = Team::all();
        // return view('teams.players.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'player_name' => 'required|string|max:45|unique:players',
            'player_no' => 'required|string|max:45',
            'dob' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'team_id' => 'required|exists:teams,id',
            'position_id' => 'required|exists:positions,id'
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images/players'), $imageName);

        $player = new Player();
        $player->player_name = $request->player_name;
        $player->player_no = $request->player_no;
        $player->dob = $request->dob;
        $player->image = $imageName;
        $player->team_id = $request->team_id;
        $player->position_id = $request->position_id;
        $player->country_id = $request->country_id;
        $player->save();

        // return redirect()->route('players.index')
        //     ->with('success', 'Player added successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'player_name' => 'required|string|max:45',
            'player_no' => 'required|string|max:45',
            'dob' => 'required|date',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'team_id' => 'required|exists:teams,id',
            'position_id' => 'required|exists:positions,id'
        ]);

        $player = Player::findOrFail($id);

        if ($request->hasFile('new_image')) {
            $imageName = time() . '.' . $request->new_image->extension();
            $request->new_image->move(public_path('images/players'), $imageName);
            $player->image = $imageName;
        }

        $player->player_name = $request->player_name;
        $player->player_no = $request->player_no;
        $player->dob = $request->dob;
        $player->team_id = $request->team_id;
        $player->position_id = $request->position_id;
        $player->country_id = $request->country_id;
        $player->save();

        return redirect()->route('players.index')->with('success', 'Player updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $player = Player::findOrFail($id);
        $player->delete();

        return redirect()->route('players.index')->with('success', 'Player deleted successfully.');
    }

    public function updateHomePlayerStatus(Request $request, $id)
    {
        //dd('homeTeamPlayers');
        // Update the status of the specific player to 'home_court'
        $homeTeamPlayers = Session::get('homeTeamPlayers');
        dd($homeTeamPlayers);
        if ($homeTeamPlayers) {
            // Find the player by ID
            $homeTeamPlayer = $homeTeamPlayers->firstWhere('id', $id);
        }
        $homeTeamPlayer['status'] = 'home_court';
        Session::put('homeTeamPlayers', $homeTeamPlayer);
        
        //dd($players);

        // Ensure only 5 players have the status 'away_court', others to 'home_bench'
        $homeCourtPlayers = $homeTeamPlayers->where('status', 'home_court');
        
        if ($homeCourtPlayers->count() > 5) {
            $extraPlayers = $homeCourtPlayers->slice(5);
            foreach ($extraPlayers as $extraPlayer) {
                $extraPlayer->status = 'home_bench';
                Session::put('homeTeamPlayers', $extraPlayers);
            }
        }

        // Redirect back to the active players list with a success message
        return redirect()->back()->with('status', 'Player status updated.');
    }
/*
    public function updateHomePlayerStatus($id)
    {
        // Find the player by ID
        $player = Player::findOrFail($id);
        //dd($player);
        // Update the player's status
        $player->status = 'home_court'; // Set the desired status
        $player->updated_at = now(); // Update the timestamp
        $player->save();

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Player status updated successfully!');
    }
*/
public function updateAwayPlayerStatus($id)
    {
        // Find the player by ID
        $player = Lineup::findOrFail($id);
        $team_id = $player->player_team_id;
        //dd($player->player_team_id);
        // Update the player's status
        $player->status = 'guest_court'; // Set the desired status
        $player->updated_at = now(); // Update the timestamp
        $player->save();
        // Ensure only 5 players have the status 'away_court', others to 'home_bench'
        $teamPlayers = Lineup::where('player_team_id', $team_id)->get();
        $awayCourtPlayers = $teamPlayers->where('status', 'guest_court');
        if ($awayCourtPlayers->count() >= 5) {
            $extraPlayers = $awayCourtPlayers->slice(5);
            foreach ($extraPlayers as $extraPlayer) {
                $extraPlayer->status = 'guest_bench';
                $extraPlayer->save();
            }
        }

        // Redirect back with a success message
        return redirect()->back()->with('message', 'Player status updated successfully!');
    }
/*
    public function updateAwayPlayerStatus($id)
    {
        // Update the status of the specific player to 'away_court'
        //dd($id);
        $guestTeamPlayers = Session::get('guestTeamPlayers');
        if ($guestTeamPlayers) {
            // Find the player by ID
            $guestTeamPlayers = $guestTeamPlayers->firstWhere('id', $id);
        }
        $guestTeamPlayers->status = 'away_court';
        Session::put('guestTeamPlayers', $guestTeamPlayers);
        
        //dd($players);

        // Ensure only 5 players have the status 'away_court', others to 'away_bench'
        $awayCourtPlayers = $guestTeamPlayers->where('status', 'away_court');
        
        if ($awayCourtPlayers->count() > 5) {
            $extraPlayers = $awayCourtPlayers->slice(5);
            foreach ($extraPlayers as $extraPlayer) {
                $extraPlayer->status = 'away_bench';
                Session::put('guestTeamPlayers', $guestTeamPlayers);
            }
        }

        // Redirect back to the active players list with a success message
        return redirect()->back()->with('status', 'Player status updated.');
    }
    */
    public function updateHomePlayerStatusToBench($id)
    {
        // Update the status of the specific player to 'away_court'
        //dd($id);
        $homeTeamPlayers = Session::get('homeTeamPlayers');
        if ($homeTeamPlayers) {
            // Find the player by ID
            $homeTeamPlayers = $homeTeamPlayers->firstWhere('id', $id);
        }
        $homeTeamPlayers->status = 'home_bench';
        Session::put('homeTeamPlayers', $homeTeamPlayers);
        // Redirect back to the active players list with a success message
        return redirect()->back()->with('status', 'Player status updated.');
    }

    public function updateAwayPlayerStatusToBench($id)
    {
        // Update the status of the specific player to 'away_court'
        //dd($id);
        $player = Lineup::findOrFail($id);
        
        $player->status = 'guest_bench';
        $player->save();
        // Redirect back to the active players list with a success message
        return redirect()->back()->with('status', 'Player status updated.');
    }

    public function clearHomeSession()
    {
        // Clear players from session
        Session::forget('homeTeamPlayers');

        // Redirect back with a success message
        return redirect()->back()->with('message', 'All players are active!');
    }
    public function clearAwayLineup()
    {
        // Find all players where status is 'guest_court' or 'guest_bench'
        $players = Lineup::whereIn('status', ['guest_court', 'guest_bench'])->get();

        // Update the status of each player to 'active'
        foreach ($players as $player) {
            $player->status = 'active';
            $player->updated_at = now(); // Update the timestamp
            $player->save();
        }

        // Redirect back with a success message
        return redirect()->back()->with('message', 'All players are active!');
    }

}
