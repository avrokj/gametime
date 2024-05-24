<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Country;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::orderBy('coach_name')->paginate(20);
        $countries = Country::all(); // Retrieve countries data
        return view('coaches.index', compact('coaches', 'countries'));
    }

    public function search(Request $request)
    {
        $term = $request->input('search');
        $coaches = Coach::where('coach_name', 'like', "%$term%")->orderBy('coach_name')->paginate(20);
        $countries = Country::all(); // Retrieve countries data

        return view('coaches.index', compact('coaches', 'countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $countries = Country::all();
        // return view('coaches.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'coach_name' => 'required|string|max:45|unique:coaches',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // 2MB max
            'country_id' => 'required|exists:countries,id'
        ]);

        $originalFileName = $request->coach_name;
        $fileNameWithoutSpaces = str_replace(' ', '_', $originalFileName);
        $fileNameLowercase = strtolower($fileNameWithoutSpaces);
        $imageName = $fileNameLowercase . '.' . $request->image->extension();

        $request->image->move(public_path('images/coaches'), $imageName);

        $coach = new Coach();
        $coach->coach_name = $request->coach_name;
        $coach->image = $imageName;
        $coach->country_id = $request->country_id;
        $coach->save();

        return redirect()->route('coaches.index')
            ->with('success', 'Coach added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coach $coach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coach $coach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'coach_name' => 'required|string|max:45',
            'new_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // 2MB max
            'country_id' => 'required|exists:countries,id'
        ]);

        $coach = Coach::findOrFail($id);

        if ($request->hasFile('new_image')) {
            $originalFileName = $request->coach_name;
            $fileNameWithoutSpaces = str_replace(' ', '_', $originalFileName);
            $fileNameLowercase = strtolower($fileNameWithoutSpaces);
            $imageName = $fileNameLowercase . '.' . $request->new_image->extension();
            $request->new_image->move(public_path('images/coaches'), $imageName);
            $coach->image = $imageName;
        }

        $coach->coach_name = $request->coach_name;
        $coach->country_id = $request->country_id;
        $coach->save();

        return redirect()->route('coaches.index')->with('success', 'Coach updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coach = Coach::findOrFail($id);
        $coach->delete();

        return redirect()->route('coaches.index')->with('success', 'Coach deleted successfully.');
    }
}
