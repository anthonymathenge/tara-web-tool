<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SecurityProperty;

class SecurityController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
        
            'asset_id' => 'required|exists:assets,id',
            'security_property' => 'required|in:Confidentiality,Integrity,Availability',
        ]);

        // Create a new SecurityProperty instance
        $securityProperty = new SecurityProperty();
        $securityProperty->asset_id = $request->asset_id;
        $securityProperty->property = $request->security_property;

        // Save the security property to the database
        $securityProperty->save();

        // Redirect back to the asset list or any other appropriate route
        return redirect()->route('assets.index')->with('success', 'Security property saved successfully.');
    }

   

}

