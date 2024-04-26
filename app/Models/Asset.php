<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    // The fields that are mass assignable
use HasFactory;
protected $fillable = [ 'name'];

//Defines the relationship between Asset and User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
//Defines the relationship between Asset and Damage model
    public function damage()
    {
        return $this->hasOne(Damage::class);
    }
//Defines the relationship between Asset and Threat model
    public function threat()
    {
        return $this->hasOne(Threat::class);
    }
//Defines the relationship between Asset and Tara model
    public function tara()
    {
        return $this->hasOne(Tara::class);
    }
}