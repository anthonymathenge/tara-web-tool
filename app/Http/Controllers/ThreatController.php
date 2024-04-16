<?php

// app/Http/Controllers/ThreatController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Threat;
use App\Models\Damage;
use App\Models\Asset;

class ThreatController extends Controller
{
    public function index($assetId)
    {
        // Fetch the asset based on the ID
        $asset = Asset::findOrFail($assetId)->first();

        // Fetch threats associated with the specified asset
        $threats = Threat::where('asset_id', $assetId)->get();

        // Pass both $asset and $threats to the view
        return view('assets.threat', compact('asset', 'threats'));
    }




    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'threat_name' => 'required|string|max:255',
            'damage_id' => 'required|exists:damages,id', // Ensure the damage exists
            'threat_name' => 'required|string|max:255', // Adjust validation rules as needed
            // Add more validation rules for other fields if needed
        ]);

        // Create a new threat instance
        $threat = new Threat();
        $threat->asset_id = $request->asset_id; // Assuming asset_id is passed through the form
        $threat->damage_id = $request->damage_id; // Assuming damage_id is passed through the form
        $threat->threat_name = $request->threat_name;
        // Set other threat attributes as needed

        // Save the threat to the database
        $threat->save();

        // Redirect back or to any other page after storing the threat
        return redirect()->back()->with('success', 'Threat stored successfully.');
    }
}
