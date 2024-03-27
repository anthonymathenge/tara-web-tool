<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDamageScenariosTable extends Migration
{
    public function up()
    {
        Schema::create('damage_scenarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained()->onDelete('cascade');
            $table->string('damage_id')->unique();
            $table->string('scenario');
            // Add other damage scenario attributes as needed
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('damage_scenarios');
    }
}
