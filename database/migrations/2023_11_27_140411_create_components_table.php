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
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id')->unsigned();
            $table->string('name');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('stored_data')->nullable();
            $table->text('technologies')->nullable();
            // Add any other fields you need for the Component model
            $table->timestamps();

            // Foreign key relationship
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');           
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('components');
    }
};
