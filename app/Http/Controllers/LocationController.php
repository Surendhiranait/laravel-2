<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;


class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    // Show the form for creating a new location
    public function create()
    {
        return view('locations.create');
    }

    // Store a newly created location in the database
    public function store(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        Location::create($request->all());

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    // Show the form for editing the specified location
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('locations.edit', compact('location'));
    }

    // Update the specified location in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        $location = Location::findOrFail($id);
        $location->update($request->all());

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    // Remove the specified location from the database
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
