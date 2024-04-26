<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThreatsTable extends Migration
{
    public function up()
    {
        Schema::create('threats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('asset_id')->constrained()->onDelete('cascade');
            $table->string('stride_name');
            $table->string('threat_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('threats');
    }
};
