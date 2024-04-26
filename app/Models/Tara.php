<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Tara extends Model
{
    use HasFactory;

    protected $fillable = [
            'attack_path',
            'elapsed_time',
            'specialist_expertise',
            'knowledge_item',
            'window_of_opportunity',
            'equipment',
    ];
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
