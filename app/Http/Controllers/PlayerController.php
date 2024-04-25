<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Position;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

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
            'player_name' => 'required|string|max:45',
            'player_no' => 'required|string|max:45',
            'dob' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'team_id' => 'required|exists:teams,id',
            'position_id' => 'required|exists:positions,id',
            'status' => 'required|in:active,inactive,injured'
        ]);

        try {
            $fileNameWithoutSpaces = str_replace(' ', '_', $request->player_name);
            $fileNameLowercase = strtolower($fileNameWithoutSpaces);
            $imageName = $fileNameLowercase . '-' . $request->player_no . '.' . $request->image->extension();

            $request->image->move(public_path('images/players'), $imageName);

            Player::create([
                'player_name' => $request->input('player_name'),
                'player_no' => $request->input('player_no'),
                'dob' => $request->input('dob'),
                'image' => $imageName,
                'team_id' => $request->input('team_id'),
                'position_id' => $request->input('position_id'),
                'country_id' => $request->input('country_id'),
                'status' => $request->input('status'),
            ]);

            return back()->with('success', 'Player added successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
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
            'position_id' => 'required|exists:positions,id',
            'status' => 'required|in:active,inactive,injured'
        ]);

        try {
            $player = Player::findOrFail($id);

            if ($request->hasFile('new_image')) {
                $fileNameWithoutSpaces = str_replace(' ', '_', $request->player_name);
                $fileNameLowercase = strtolower($fileNameWithoutSpaces);
                $imageName = $fileNameLowercase . '-' . $request->player_no . '.' . $request->new_image->extension();
                $request->new_image->move(public_path('images/players'), $imageName);
                $player->image = $imageName;
            }

            $player->update([
                'player_name' => $request->input('player_name'),
                'player_no' => $request->input('player_no'),
                'dob' => $request->input('dob'),
                'team_id' => $request->input('team_id'),
                'position_id' => $request->input('position_id'),
                'country_id' => $request->input('country_id'),
                'status' => $request->input('status'),
            ]);

            return redirect()->route('players.index')->with('success', 'Player updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
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
}
