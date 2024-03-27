<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
protected $fillable = ['asset_id', 'name', /* add other fillable fields */];

}