<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Country;
use App\Models\Player;
use App\Models\Position;
use App\Models\Team;
use App\Models\Sport;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::orderBy('team_name')->paginate(20);
        $sports = Sport::all(); // Retrieve sports data
        $coaches = Coach::all(); // Retrieve coaches data
        return view('teams.index', compact('teams', 'sports', 'coaches'));
    }

    public function search(Request $request)
    {
        $term = $request->input('search');
        $teams = Team::where('team_name', 'like', "%$term%")->orderBy('team_name')->paginate(20);
        $sports = Sport::all(); // Retrieve sports data
        $coaches = Coach::all(); // Retrieve coaches data

        return view('teams.index', compact('teams', 'sports', 'coaches'));
    }


    public function players(Request $request, $teamId)
    {
        // dd($request);
        $team = Team::findOrFail($teamId); // Retrieve the team by ID
        $players = $team->players; // Fetch players associated with the team        
        $positions = Position::all(); // Retrieve positions data
        $countries = Country::all(); // Retrieve countries data

        return view('teams.players', compact('team', 'players', 'positions', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $sports = Sport::all();
        // return view('teams.create', compact('sports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required|string|max:45|unique:teams',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'sport_id' => 'required|exists:sports,id',
            'coach_id' => 'required|exists:coaches,id'
        ]);

        $imageName = time() . '.' . $request->logo->extension();

        $request->logo->move(public_path('images/logos'), $imageName);

        $team = new Team();
        $team->team_name = $request->team_name;
        $team->logo = $imageName;
        $team->sport_id = $request->sport_id;
        $team->coach_id = $request->coach_id;
        $team->save();

        return redirect()->route('teams.index')
            ->with('success', 'Team added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'team_name' => 'required|string|max:45|unique:teams',
            'new_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'sport_id' => 'required|exists:sports,id',
            'coach_id' => 'required|exists:coaches,id'
        ]);

        $team = Team::findOrFail($id);

        if ($request->hasFile('new_logo')) {
            $imageName = time() . '.' . $request->new_logo->extension();
            $request->new_logo->move(public_path('images/logos'), $imageName);
            $team->logo = $imageName;
        }

        $team->team_name = $request->team_name;
        $team->sport_id = $request->sport_id;
        $team->coach_id = $request->coach_id;
        $team->save();

        return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
    }

    /**
     * Players by team.
     */
    public function playersByTeam($teamId)
    {
        // Retrieve the team by its ID
        $team = Team::findOrFail($teamId);

        // Retrieve all players belonging to the team
        $players = $team->players()->orderBy('player_no')->paginate(20);

        // Return a view with the players data
        return view('players.index', compact('team', 'players'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();

        return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
    }
}
