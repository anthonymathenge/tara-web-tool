<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function data_flow()
    {
        return $this->hasMany(Dataflow::class);
    }
    public function component()
    {
        return $this->belongsToMany(Component::class);
    }

}
