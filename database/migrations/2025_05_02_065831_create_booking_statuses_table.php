FR<?php

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
        Schema::create('booking_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->onDelete('cascade');
            $table->enum('status', ['Unpaid', 'Paid', 'Pending', 'Cancelled', 'Approved', 'For Pick-Up', 'Ongoing', 'Due for Return', 'Successful', 'Reported', 'Unsettled', 'Blacklisted'])->default('Unpaid');
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
        Schema::dropIfExists('booking_statuses');
    }
};
