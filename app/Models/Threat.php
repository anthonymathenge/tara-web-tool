<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Threat extends Model
{
    protected $fillable = [
        'asset_id',
    ];
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
