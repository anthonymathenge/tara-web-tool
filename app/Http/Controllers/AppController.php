<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AppController extends Controller
{
  public function showAsset($assetId)
  {
      // Retrieve the asset based on the $assetId
      $asset = Asset::find($assetId);
  
      // Check if the asset exists
      if (!$asset) {
          abort(404); // Or handle the case where the asset is not found
      }
  
      // Pass the $asset variable to the view
      return view('layouts.app', compact('asset'));
  }
  
}
