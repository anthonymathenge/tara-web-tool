<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Damage;
use App\Models\Asset; // Make sure to import the Asset model


class DamageController extends Controller
{

    public function index($assetId)
    {
        // Fetch the asset based on the ID
        $asset = Asset::findOrFail($assetId);

        // Fetch threats associated with the specified asset
        $damageScenario = Damage::where('asset_id', $assetId)->get();
        $securityProperties = ['Confidentiality', 'Integrity', 'Availability'];

        // Return the view with the threats data
        return view('assets.show', compact('asset','damageScenario','securityProperties'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'damage_scenario' => 'required|string',
            'security_property' => 'required|in:Confidentiality,Integrity,Availability',
            'safety_impact' => 'required|in:Negligible,Moderate,Major,Severe',
            'financial_impact' => 'required|in:Negligible,Moderate,Major,Severe',
            'operational_impact' => 'required|in:Negligible,Moderate,Major,Severe',
            'privacy_impact' => 'required|in:Negligible,Moderate,Major,Severe',
        ]);

        $damageScenario = new DamageScenario();

        // Populate the damage scenario attributes from the request
        $damageScenario->asset_id = $request->asset_id;
        $damageScenario->scenario = $request->damage_scenario;
        $damageScenario->asset_id = $request->asset_id;
        $damageScenario->property = $request->security_property;
        $damageScenario->safety_impact = $request->safety_impact;
        $damageScenario->financial_impact = $request->financial_impact;
        $damageScenario->operational_impact = $request->operational_impact;
        $damageScenario->privacy_impact = $request->privacy_impact;


        // Set user_id if you have user authentication
        $damageScenario->user_id = Auth::id(); // Assuming you're using user authentication

        // Save the damage scenario to the database
        $damageScenario->save();


        // Redirect back to the asset show page with a success message
        return redirect()->route('damage.show', ['id' => $request->asset_id])
                         ->with('success', 'Damage scenario saved successfully.');
    }
  
}
