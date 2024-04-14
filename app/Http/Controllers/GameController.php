<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class GameController extends Controller
{
    /**
     * Instantiate a new GameController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-game|edit-game|delete-game', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-game', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-game', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-game', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('games.index', [
            'games' => Game::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request): RedirectResponse
    {
        Game::create($request->all());
        return redirect()->route('games.index')
            ->withSuccess('New game is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game): View
    {
        return view('games.show', [
            'game' => $game
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game): View
    {
        return view('games.edit', [
            'game' => $game
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game): RedirectResponse
    {
        $game->update($request->all());
        return redirect()->back()
            ->withSuccess('Game is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game): RedirectResponse
    {
        $game->delete();
        return redirect()->route('games.index')
            ->withSuccess('Game is deleted successfully.');
    }
}
