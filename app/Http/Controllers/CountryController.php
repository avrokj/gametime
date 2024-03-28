<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::orderBy('country_name')->paginate(20);

        return view('countries.index', compact('countries'));
    }

    public function search(Request $request)
    {
        $term = $request->input('search');
        $countries = Country::where('country_name', 'like', "%$term%")->orderBy('country_name')->paginate(20);

        return view('countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_name' => 'required|max:45',
            'code' => 'required|max:2',
        ]);

        // Create a new country record
        Country::create([
            'country_name' => $request->input('country_name'),
            'code' => $request->input('code'),
        ]);

        return redirect()->route('countries.index')->with('success', 'Country added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        // Validate input data
        $request->validate([
            'country_name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:countries,code,' . $id,
        ]);

        // Find the country record
        $country = Country::findOrFail($id);

        // Update the columns
        $country->update([
            'country_name' => $request->input('country_name'),
            'code' => $request->input('code'),
        ]);

        return redirect()->route('countries.index')->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')->with('success', 'Country deleted successfully.');
    }
}
