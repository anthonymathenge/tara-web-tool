<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset; // Make sure to import the Asset model

class AssetController extends Controller
{
    public function create()
    {
        return view('assets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // Add validation rules for other asset fields as needed
        ]);

        $asset = new Asset();
        $asset->asset_id = uniqid(); // Generate a unique asset ID
        $asset->name = $request->name;
        // Set other asset details from the form

        $asset->save();

        return redirect()->route('assets.index')->with('success', 'Asset created successfully!');
    }
    public function index()
    {
        $assets = Asset::all();
        return view('assets.create', compact('assets'));
    }
    public function show(Asset $asset)
{
    $securityProperties = ['Confidentiality', 'Integrity', 'Availability'];
    return view('assets.show', compact('asset', 'securityProperties'));
}
}
