<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreatsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('threats', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key (threat_id)
            $table->foreignId('asset_id')->constrained()->onDelete('cascade'); // Foreign key for asset
            $table->foreignId('damage_id')->constrained('damages')->onDelete('cascade'); // Foreign key for damage scenario
            $table->string('threat_name');
            // Include other fields as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('threats');
    }
};
