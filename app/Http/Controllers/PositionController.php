<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Models\Sport;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::orderBy('position_name')->paginate(20);
        $sports = Sport::all(); // Retrieve sports data
        return view('positions.index', compact('positions', 'sports'));
    }

    public function search(Request $request)
    {
        $term = $request->input('search');
        $positions = Position::where('position_name', 'like', "%$term%")->orderBy('position_name')->paginate(20);
        $sports = Sport::all(); // Retrieve sports data

        return view('positions.index', compact('positions', 'sports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $sports = Sport::all();
        // return view('positions.create', compact('sports'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'position_name' => 'required|string|max:45|unique:positions',
                'sport_id' => 'required|exists:sports,id'
            ]
        );

        // dd($request->all());
        Position::create($validated);

        return view('positions.index', [
            'positions' => Position::orderBy('position_name')->paginate(20)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $position = Position::findOrFail($id);

        $request->validate([
            'position_name' => 'required|string|max:45|unique:positions',
            'sport_id' => 'required|exists:sports,id',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Position deleted successfully.');
    }
}
