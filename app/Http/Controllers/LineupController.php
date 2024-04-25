<?php

namespace App\Http\Controllers;

use App\Models\Lineup;
use App\Http\Requests\StoreLineupRequest;
use App\Http\Requests\UpdateLineupRequest;
use App\Models\Arena;
use App\Models\Game;
use App\Models\Sport;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LineupController extends Controller
{
    /**
     * Instantiate a new LineupController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-lineup|edit-lineup|delete-lineup', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-lineup', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-lineup', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-lineup', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lineups = Lineup::latest()
            ->paginate(20);
        $sports = Sport::all(); // Retrieve teams data
        $games = Game::all(); // Retrieve lineups data        
        $arenas = Arena::all(); // Retrieve arenas data

        return view('lineups.index', compact('lineups', 'sports', 'games', 'arenas'));
    }


    public function search(Request $request)
    {
        $term = $request->input('search');
        $lineups = Lineup::where('lineup_name', 'like', "%$term%");
        $lineups->orWhereHas('arena', function ($query) use ($term) {
            $query->where('arena_name', 'like', "%$term%");
        });
        $lineups = $lineups->orderBy('lineup_name')->paginate(20);
        $sports = Sport::all(); // Retrieve teams data
        $arenas = Arena::all(); // Retrieve teams data

        return view('lineups.index', compact('lineups', 'sports', 'arenas', 'lineups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('lineups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLineupRequest $request): RedirectResponse
    {

        $validatedData = $request->validated();

        Lineup::create($validatedData);

        return redirect()->route('lineups.index')
            ->withSuccess('New lineup is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lineup $lineup)
    {
        // return view('lineups.show', [
        //     'lineup' => $lineup
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lineup $lineup)
    {
        // return view('lineups.edit', [
        //     'lineup' => $lineup
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLineupRequest $request, Lineup $lineup): RedirectResponse
    {
        $lineup->update($request->all());
        return redirect()->back()
            ->withSuccess('Game is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lineup $lineup): RedirectResponse
    {
        $lineup->delete();
        return redirect()->route('lineups.index')
            ->withSuccess('Lineup is deleted successfully.');
    }
}
