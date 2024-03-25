<?php

namespace App\Http\Controllers;

use App\Models\Sport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SportController extends Controller
{
    public function index()
    {
        $sports = Sport::orderBy('sports_name')->paginate(20);

        return view('sports.index', compact('sports'));
    }

    public function search(Request $request)
    {
        $term = $request->input('search');
        $sports = Sport::where('sports_name', 'like', "%$term%")->orderBy('sports_name')->paginate(20);

        return view('sports.index', compact('sports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sports.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $this->sportize('update', $sport);
        $validated = $request->validate(
            [
                'sports_name' => 'required|string|max:255'
            ],
            [
                'sports_name.required' => 'The Sport name filed is required.'
            ]
        );

        Sport::create($validated);

        return view('sports.index', [
            'sports' => Sport::orderBy('sports_name')->paginate(20)
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport): View
    {

        return view('sports.edit', [
            'sport' => $sport,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sport $sport): RedirectResponse

    {
        // $this->sportize('update', $sport);
        $validated = $request->validate([
            'sports_name' => 'required|string|max:255',
        ]);

        $sport->update($validated);

        return redirect()->route('sports.index')->with('success', 'Sport updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        $sport->delete();

        return redirect()->route('sports.index')->with('success', 'Sport deleted successfully.');
    }
}
