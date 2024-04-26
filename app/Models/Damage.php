<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'security_property', 'damage_scenario', 
        'safety_impact', 'safety_justification', 
        'financial_impact', 'financial_justification', 
        'operational_impact', 'operational_justification', 
        'privacy_impact', 'privacy_justification'
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
}
