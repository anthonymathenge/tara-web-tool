<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityPropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('security_properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asset_id');
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
            $table->string('property');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('security_properties');
    }
}
