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
        Schema::create('car_damage_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_damage_id')->constrained('car_damages')->onDelete('cascade');
            $table->enum('status', ['Pending', 'Under Repair', 'Complete'])->default('Pending');
            $table->dateTime('status_date')->useCurrent();
            $table->text('additional_notes')->nullable();
            $table->foreignId('updated_by_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_damage_statuses');
    }
};
