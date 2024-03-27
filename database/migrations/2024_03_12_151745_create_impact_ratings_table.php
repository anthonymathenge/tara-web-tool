<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpactRatingsTable extends Migration
{
    public function up()
    {
        Schema::create('impact_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('damage_scenario_id')->constrained()->onDelete('cascade');
            $table->enum('safety', ['Negligible', 'Moderate', 'Major', 'Severe']);
            $table->enum('financial', ['Negligible', 'Moderate', 'Major', 'Severe']);
            $table->enum('operational', ['Negligible', 'Moderate', 'Major', 'Severe']);
            $table->enum('privacy', ['Negligible', 'Moderate', 'Major', 'Severe']);
            // Add other impact rating attributes as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('impact_ratings');
    }
}

