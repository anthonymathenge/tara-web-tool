<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tara;
use App\Models\Asset;

class TaraController extends Controller
{
    public function index($assetId)
    {
        // Fetch the asset based on the ID
        $asset = Asset::findOrFail($assetId);

        // Fetch TARA records associated with the specified asset
        $taraRecords = Tara::where('asset_id', $assetId)->get();

        // Return the view with the TARA records data
        return view('assets.tara', compact('asset', 'taraRecords'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
            'attack_path' => 'required|string',
            'elapsed_time' => 'required|string|in:<1 week,<1 month,<=6 months,<=3 years,>3 years',
            'specialist_expertise' => 'required|string|in:layman,proficient,expert,multiple experts',
            'knowledge_item' => 'required|string|in:public,restricted,confidential,strictly confidential',
            'window_of_opportunity' => 'required|string|in:Unlimited,Easy,Moderate,Difficult',
            'equipment' => 'required|string|in:Standard,Specialised,Bespoke,Multiple Bespoke',
        ]);

        $taraRecord = new Tara();

        // Populate the TARA record attributes from the request
        $taraRecord->asset_id = $request->asset_id;
        $taraRecord->attack_path = $request->attack_path;
        $taraRecord->elapsed_time = $request->elapsed_time;
        $taraRecord->specialist_expertise = $request->specialist_expertise;
        $taraRecord->knowledge_item = $request->knowledge_item;
        $taraRecord->window_of_opportunity = $request->window_of_opportunity;
        $taraRecord->equipment = $request->equipment;

        // Save the TARA record to the database
        $taraRecord->save();

        // Redirect back to the asset TARA index page with a success message
        return redirect()->route('tara.index', ['assetId' => $request->asset_id])
                         ->with('success', 'TARA record saved successfully.');
    }
}
