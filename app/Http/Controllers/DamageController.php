<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Damage;
use App\Models\Asset; // Make sure to import the Asset model


class DamageController extends Controller
{

    public function index($assetId)
    {
        // Fetch the asset based on the ID
        $asset = Asset::findOrFail($assetId);

        // Fetch saved selections for the asset from the database
        $savedSelections = Damage::where('asset_id', $assetId)->first();

        $securityProperties = ['Confidentiality', 'Integrity', 'Availability'];

        // Pass the asset and saved selections data to the view
        return view('assets.show', compact('asset', 'savedSelections','securityProperties'));
    }


    public function store(Request $request)
{
    $request->validate([
        'asset_id' => 'required|exists:assets,id',
        'security_property' => 'required|string',
        'damage_scenario' => 'required|string',
        'safety_impact' => 'required|string',
        'financial_impact' => 'required|string',
        'operational_impact' => 'required|string',
        'privacy_impact' => 'required|string',
        'safety_justification' => 'nullable|string',
        'financial_justification' => 'nullable|string',
        'operational_justification' => 'nullable|string',
        'privacy_justification' => 'nullable|string',
    ]);

    // Check if a Damage instance already exists for the given asset_id
    $damage = Damage::firstWhere('asset_id', $request->asset_id);

    // If it doesn't exist, create a new one
    if (!$damage) {
        $damage = new Damage();
        $damage->asset_id = $request->asset_id;
    }

    // Update (or set) the attributes
    $damage->damage_scenario = $request->damage_scenario;
    $damage->security_property = $request->security_property;
    $damage->safety_impact = $request->safety_impact;
    $damage->financial_impact = $request->financial_impact;
    $damage->operational_impact = $request->operational_impact;
    $damage->privacy_impact = $request->privacy_impact;
    $damage->safety_justification = $request->safety_justification;
    $damage->financial_justification = $request->financial_justification;
    $damage->operational_justification = $request->operational_justification;
    $damage->privacy_justification = $request->privacy_justification;

    // Save the Damage instance
    $damage->save();

    return redirect()->route('damage.index', ['id' => $request->asset_id])->with('success', 'Damage scenario saved successfully.');
}

    
    public function getDetails()
{
    $damageDetails = DB::table('damages')->get();

    return response()->json($damageDetails);
}
    
}
