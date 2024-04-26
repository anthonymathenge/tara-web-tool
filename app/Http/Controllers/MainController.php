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

        // Fetch saved selections for the asset from the database

        $securityProperties = ['Confidentiality', 'Integrity', 'Availability'];

        // Return the view with the assets data
        return view('assets.main', compact('asset'));
    }
}
