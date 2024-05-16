<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Country;
use App\Models\Player;
use App\Models\Position;
use App\Models\Team;
use App\Models\Sport;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

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
        $team = Team::with('coaches')->findOrFail($teamId); // Retrieve the team by ID
        $players = $team->players; // Fetch players associated with the team        
        $positions = Position::all(); // Retrieve positions data
        $countries = Country::all(); // Retrieve countries data
        $coaches = $team->coaches; // Fetch coaches associated with the team

        return view('teams.players', compact('team', 'players', 'positions', 'countries', 'coaches'));
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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'sport_id' => 'required|exists:sports,id',
            'coach_id' => 'required|exists:coaches,id',
            'short_name' => 'nullable|uppercase|string|max:3'
        ]);

        // Is an image provided
        if ($request->hasFile('logo')) {
            $fileNameWithoutSpaces = str_replace([' ', '/'], ['_', '-'], $request->team_name);
            $fileNameLowercase = strtolower($fileNameWithoutSpaces);
            $imageName = $fileNameLowercase . '.' . $request->logo->extension();
            $request->logo->move(public_path('images/logos'), $imageName);
        } else {
            $imageName = 'default.png';
        }

        $team = new Team();
        $team->team_name = $request->team_name;
        $team->logo = $imageName;
        $team->sport_id = $request->sport_id;
        $team->coach_id = $request->coach_id;
        $team->short_name = $request->short_name;
        $team->save();

        return back()->with('success', 'Team added successfully.');
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
            'team_name' => 'required|string|max:45',
            'new_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'sport_id' => 'required|exists:sports,id',
            'coach_id' => 'required|exists:coaches,id',
            'short_name' => 'nullable|uppercase|string|max:3'
        ]);

        try {

            $team = Team::findOrFail($id);

            if ($request->hasFile('new_logo')) {
                $fileNameWithoutSpaces = str_replace([' ', '/'], ['_', '-'], $request->team_name);
                $fileNameLowercase = strtolower($fileNameWithoutSpaces);
                $imageName = $fileNameLowercase . '.' . $request->new_logo->extension();
                $request->new_logo->move(public_path('images/logos'), $imageName);
                $team->logo = $imageName;
            }

            $team->update([
                'team_name' => $request->input('team_name'),
                'sport_id' => $request->input('sport_id'),
                'coach_id' => $request->input('coach_id'),
                'short_name' => $request->input('short_name'),
            ]);

            return redirect()->route('team.index')->with('success', 'Team updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    /**
     * Players by team.
     */
    // public function playersByTeam($teamId)
    // {
    //     // Retrieve the team by its ID
    //     $team = Team::findOrFail($teamId);
    //     $coaches = Coach::all(); // Retrieve coaches data

    //     // Retrieve all players belonging to the team
    //     $players = $team->players()->orderBy('player_no')->paginate(20);

    //     // Return a view with the players data
    //     return view('players.index', compact('team', 'players', 'coaches'));
    // }

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
