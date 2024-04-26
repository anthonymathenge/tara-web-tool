<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarasTable extends Migration
{
    public function up()
    {
        Schema::create('taras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained()->onDelete('cascade'); // Foreign key for asset
            $table->string('attack_path');
            $table->string('elapsed_time');
            $table->string('specialist_expertise');
            $table->string('knowledge_item');
            $table->string('window_of_opportunity');
            $table->string('equipment');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('taras');
    }
};
