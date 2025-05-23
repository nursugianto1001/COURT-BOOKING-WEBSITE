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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('court_id')->constrained('basket_courts')->onDelete('cascade');
            $table->date('schedule_date'); // Tanggal sewa
            $table->datetime('start_time'); // Jam mulai
            $table->datetime('end_time'); // Jam selesai
            $table->enum('status', ['available', 'booked', 'holiday'])->default('available');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};