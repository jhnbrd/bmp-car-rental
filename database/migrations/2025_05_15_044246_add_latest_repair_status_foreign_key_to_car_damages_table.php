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
        Schema::table('car_damages', function (Blueprint $table) {
            $table->foreign('latest_repair_status')->nullable()->references('id')->on('car_damage_statuses')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_damages', function (Blueprint $table) {
            $table->dropForeign(['latest_repair_status']);
        });
    }
};
