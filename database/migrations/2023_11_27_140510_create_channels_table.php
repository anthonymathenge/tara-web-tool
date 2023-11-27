<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id')->unsigned();
            $table->string('name');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('technologies')->nullable();
            // Add any other fields you need for the Channel model
            $table->timestamps();


            // Foreign key relationship
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');            
        });

        Schema::create('channel_component', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('channel_id')->unsigned();
            $table->bigInteger('component_id')->unsigned();
            
            $table->timestamps();

            $table->foreign('channel_id')->references('id')->on('channels')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('component_id')->references('id')->on('components')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channel_component');
        Schema::dropIfExists('channels');
    }
};
