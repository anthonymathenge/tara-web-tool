<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DamageScenario extends Model
{
    protected $fillable = [
        'asset_id',
        'scenario',
        'safety_impact',
        'financial_impact',
        'operational_impact',
        'privacy_impact',
        'safety_justification',
        'financial_justification',
        'operational_justification',
        'privacy_justification',
        'overall_impact_rating',
    ];
    // Define the relationship with the Asset model
    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }
    // DamageScenario.php

public function calculateOverallImpactRating()
{
    // Get individual impact ratings from the DamageScenario object
    $safetyImpact = $this->safety_impact;
    $financialImpact = $this->financial_impact;
    $operationalImpact = $this->operational_impact;
    $privacyImpact = $this->privacy_impact;

    // Define the Meta Data array (assuming it contains the overall impact ratings)
    $metaData = ['Negligible', 'Moderate', 'Major', 'Severe'];

    // Match individual impact ratings with the Meta Data array and get their indices
    $safetyIndex = array_search($safetyImpact, $metaData);
    $financialIndex = array_search($financialImpact, $metaData);
    $operationalIndex = array_search($operationalImpact, $metaData);
    $privacyIndex = array_search($privacyImpact, $metaData);

    // Get the maximum index among the individual impact ratings
    $maxIndex = max($safetyIndex, $financialIndex, $operationalIndex, $privacyIndex);

    // Calculate the overall impact rating based on the maximum index
    $overallImpactRating = $metaData[$maxIndex] ?? "Waiting for all ratings";

    // Update the overall impact rating in the database
    $this->overall_impact_rating = $overallImpactRating;
    $this->save();
}

}
