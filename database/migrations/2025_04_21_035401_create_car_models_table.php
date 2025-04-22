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
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model_name');
            $table->integer('model_year');
            $table->string('model_desc');
            $table->string('color');
            $table->string('engine_type');
            $table->integer('engine_displacement');
            $table->enum('fuel_type', ['Gasoline', 'Diesel']);
            $table->enum('transmission', ['Automatic', 'Manual']);
            $table->integer('seat_capacity');
            $table->string('car_dimensions');
            $table->enum('car_type', ['Sedan', 'SUV', 'Pick-up']);
            $table->string('img_file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_models');
    }
};
