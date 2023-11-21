<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Iluminate\Support\Str;
use App\Models\Journey;
use App\Models\Ship;
use App\Models\Planet;
use App\Models\JourneyType;


class JourneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $journeys = Journey::all();
        foreach ($journeys as $journey) {
            $journey->ship = Ship::findOrFail($journey->ship_id);
            $journey->planet = Planet::findOrFail($journey->planet_id);
            $journey->journeyType = JourneyType::findOrFail($journey->journey_type_id);
        }

        // $journey->users = $journey->users()->get();

        return response()->json($journeys);
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
        $journey = new Journey($request->all());
        $journey->save();

        return response()->json($journey);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $journey = Journey::finrOrFail($id);
        return response()->json($journey);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, Journey $journey)
    {
        $journey = Journey::findOrFail($id);
        $journey->update($request->all());
        return response()->json(['message' => 'Voyage mis à jour avec succès']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Journey $journey)
    {
        $journey = Journey::findOrFail($id);
        $journey->delete();
        return response()->json(['message' => 'Voyage supprimé avec succès']);
    }
}
