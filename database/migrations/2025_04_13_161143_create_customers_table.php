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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable;
            $table->string('last_name');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('province');
            $table->string('city');
            $table->string('barangay');
            $table->string('address');
            $table->string('phone_number');
            $table->string('driver_license_number')->unique();
            $table->date('license_expiration_date');
            $table->string('license_img_path');
            $table->boolean('is_banned')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
