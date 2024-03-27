<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityProperty extends Model
{
    protected $fillable = [
        'asset_id', 'property',
    ];

    // Define the relationship with the Asset model
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
