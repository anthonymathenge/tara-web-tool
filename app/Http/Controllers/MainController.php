<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tara;
use App\Models\Asset;
use App\Models\Damage;
use App\Models\Threat;

class MainController extends Controller
{
    public function index($assetId)
    {
        // Fetch the asset based on the ID
        $asset = Asset::findOrFail($assetId);

        // Fetch TARA records associated with the specified asset
        $damageScenario = Damage::where('asset_id', $assetId)->get();
        $securityProperties = ['Confidentiality', 'Integrity', 'Availability'];
        $threats = Threat::where('asset_id', $assetId)->get();
        $taraRecords = Tara::where('asset_id', $assetId)->get();

        // Return the view with the TARA records data
        return view('assets.main', compact('asset','damageScenario','securityProperties','threats', 'taraRecords'));
    }
}