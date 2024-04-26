<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Asset;
use App\Models\Damage;

class DamageControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreMethod()
    {
        // Create a new Asset instance
        $asset = Asset::factory()->create();

        // Define the data to be sent in the request
        $data = [
            'asset_id' => $asset->id,
            'security_property' => 'Confidentiality',
            'damage_scenario' => 'Test scenario',
            'safety_impact' => 'Negligible',
            'financial_impact' => 'Moderate',
            'operational_impact' => 'Major',
            'privacy_impact' => 'Severe',
            'safety_justification' => 'Test justification',
            'financial_justification' => 'Test justification',
            'operational_justification' => 'Test justification',
            'privacy_justification' => 'Test justification',
        ];

        // Send a POST request to the store route
        $response = $this->post(route('damage.store'), $data);

        // Assert that the response status is a redirect
        $response->assertStatus(302);

        // Assert that the response has the 'success' session status
        $response->assertSessionHas('success', 'Damage scenario saved successfully.');

        // Assert that the damages table has a row that matches the data
        $this->assertDatabaseHas('damages', $data);
    }
}
