<?php

namespace App\Http\Controllers;

use App\Models\Arena;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArenaController extends Controller
{
    public function index()
    {
        $arenas = Arena::orderBy('arena_name')->paginate(20);

        return view('arenas.index', compact('arenas'));
    }

    public function search(Request $request)
    {
        $term = $request->input('search');
        $arenas = Arena::where('arena_name', 'like', "%$term%")->orderBy('arena_name')->paginate(20);

        return view('arenas.index', compact('arenas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('arenas.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'arena_name' => 'required|string|max:45',
            'country_id' => 'required|exists:countries,id',
        ]);

        Arena::create($request->all());

        return view('arenas.index', [
            'arenas' => Arena::orderBy('arena_name')->paginate(20)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Arena $arena)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arena $arena)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $arena = Arena::findOrFail($id);

        $request->validate([
            'arena_name' => 'required|string|max:45',
            'country_id' => 'required|exists:countries,id',
        ]);

        $arena->update($request->all());

        return redirect()->route('arenas.index')->with('success', 'Arena updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $arena = Arena::findOrFail($id);
        $arena->delete();

        return redirect()->route('arenas.index')->with('success', 'Arena deleted successfully.');
    }
}
