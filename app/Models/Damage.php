<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    protected $fillable = [
        'asset_id', 'property',
    ];
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
