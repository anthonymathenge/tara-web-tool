<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Asset;

class AssetController extends Controller
{
    //Display form to create a new asset
    public function create($assetId)
    {
        // Retrieve assets belonging to the authenticated user
        $user = Auth::user();
        $assets = $user->assets;
        $selectedAsset = Asset::findOrFail($assetId);

        //Render the create asset form view with the retrieved asset
        return view('assets.create', ['assets' => $assets],compact('selectedAsset'));
    }

    public function store(Request $request)
    {
        //Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $asset = new Asset();
        // Associate the asset with the currently authenticated user
        $asset->user_id = auth()->user()->id;
        // Generate a unique asset ID
        // Set other asset details from the form
        $asset->name = $request->name;
        $asset->save();
        return redirect()->route('assets.index')->with('success', 'Asset created successfully!');
    }
    public function index()
    {
        //Retrieve assets belonging to the authenticated user
        $user = Auth::user();
        $assets = $user->assets;
        return view('assets.create', compact('assets'));
    }
    public function show($assetId)
    {
        $asset = Asset::find($assetId);

    // Pass the asset to the view
    return view('assets.show', ['asset' => $asset]);
    }
   

}
