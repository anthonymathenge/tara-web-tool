<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
protected $fillable = ['asset_id', 'name', /* add other fillable fields */];

public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function damage()
    {
        return $this->hasOne(Damage::class);
    }

    public function threat()
    {
        return $this->hasOne(Threat::class);
    }

    public function tara()
    {
        return $this->hasOne(Tara::class);
    }

}