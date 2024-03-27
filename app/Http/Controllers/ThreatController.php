<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DamageScenario;
use App\Models\Asset; // Make sure to import the Asset model

class ThreatController extends Controller
{
    public function index()
    {
        // Fetch Damage ID, Damage scenario, and Asset name from the database
        $damage = DamageScenario::find($damageId); // Use DamageScenario instead of Damage
        $asset = Asset::find($asset_Id); // Fetch Asset model data

        return view('assets.threat', compact('damage', 'asset'));
    }

    public function show()
    {
        return view('assets.Threat');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'threat_name' => 'required|string|max:255', // Adjust validation rules as needed
            // Add more validation rules for other fields if needed
        ]);

        // Store the selected STRIDE threat or perform any other necessary actions
        // For example:
        // $threat = new Threat();
        // $threat->name = $validatedData['threat_name'];
        // $threat->save();

        // Redirect back or to any other page after storing the threat
        return redirect()->back()->with('success', 'Threat stored successfully.');
    }
}
