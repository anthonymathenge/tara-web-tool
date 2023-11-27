<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_flows extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
}
