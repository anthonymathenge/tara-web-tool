<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DamageScenario;
use App\Models\Asset; // Make sure to import the Asset model


class DamageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'damage_scenario' => 'required|string',
            'safety_impact' => 'required|in:Negligible,Moderate,Major,Severe',
            'financial_impact' => 'required|in:Negligible,Moderate,Major,Severe',
            'operational_impact' => 'required|in:Negligible,Moderate,Major,Severe',
            'privacy_impact' => 'required|in:Negligible,Moderate,Major,Severe',
        ]);
    
        $damageScenario = new DamageScenario();

        // Populate the damage scenario attributes from the request
        $damageScenario->asset_id = $request->asset_id;
        // Set user_id if you have user authentication
        $damageScenario->user_id = Auth::id(); // Assuming you're using user authentication
        $damageScenario->damage_scenario = $request->damage_scenario;
        $damageScenario->safety_impact = $request->safety_impact;
        $damageScenario->financial_impact = $request->financial_impact;
        $damageScenario->operational_impact = $request->operational_impact;
        $damageScenario->privacy_impact = $request->privacy_impact;
    
        // Save the damage scenario to the database
        $damageScenario->save();
    
        // Redirect back to the asset show page with a success message
        return redirect()->route('damage.show', ['id' => $request->asset_id])
                         ->with('success', 'Damage scenario saved successfully.');
    
    }
    // YourController.php

    public function show($id)
    {
        $asset = Asset::findOrFail($id);

        // Retrieve the associated damage scenario
        $damageScenario = DamageScenario::where('asset_id', $asset->id)->first();
    
        // Pass the asset and damage scenario data to the view
        return view('assets.show', compact('asset', 'damageScenario'));
    }    
}
