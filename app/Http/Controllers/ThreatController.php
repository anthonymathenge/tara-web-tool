<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Threat;
use App\Models\Asset;

class ThreatController extends Controller
{
    public function index($assetId)
    {
        // Fetch the asset based on the ID
        $asset = Asset::findOrFail($assetId);

        // Fetch threats associated with the specified asset
        $savedSelections = Threat::where('asset_id', $assetId)->first();

        // Pass both $asset and $threats to the view
        return view('assets.threat', compact('asset', 'savedSelections'));
    }


    public function store(Request $request)
    {
        // Validate the request data
       $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'stride_name' => 'required|string', // Adjust validation rules as needed
            'threat_name' => 'required|string',
            // Add more validation rules for other fields if needed
        ]);
        $threat = Threat::firstWhere('asset_id', $request->asset_id);

        if (!$threat) {
            $threat = new Threat();
            $threat->asset_id = $request->asset_id; // Assuming asset_id is passed through the form
        }
        // Create a new threat instance
        $threat->stride_name = $request->stride_name;
        $threat->threat_name = $request->threat_name;
        // Save the threat to the database
        $threat->save();

        // Redirect back or to any other page after storing the threat
        return redirect()->route('threat.index', ['id' => $request->asset_id])->with('success', 'Threat stored successfully.');

    }
}
