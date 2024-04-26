<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDamageTable extends Migration
{
    public function up()
    {
        Schema::create('damages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained()->onDelete('cascade');
            $table->string('security_property');
            $table->string('damage_scenario');
            $table->string('safety_impact');
            $table->text('safety_justification')->nullable();
            $table->string('financial_impact');
            $table->text('financial_justification')->nullable();
            $table->string('operational_impact');
            $table->text('operational_justification')->nullable();
            $table->string('privacy_impact');
            $table->text('privacy_justification')->nullable();
            // Add other damage scenario attributes as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('damages');
    }
}

