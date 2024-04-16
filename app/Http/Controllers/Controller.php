<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Asset; // Make sure to import the Asset model


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        // Fetch and pass the asset information to all views
        $asset = Asset::all(); // Example: Fetching the first asset
        view()->share('asset', $asset);
    }
}
