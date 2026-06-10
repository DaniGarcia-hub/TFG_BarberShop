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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('note')->nullable();
            $table->enum('state', ['completado', 'pendiente', 'cancelado'])->default('pendiente');
            $table->timestamp('confirmation_date')->nullable();
            $table->date('booking_date');
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade'); // Relación al ID del cliente.
            $table->foreignId('barber_id')->constrained('users')->onDelete('cascade'); // Relación al ID del peluquero.
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade'); // Relación al ID del horario.
            $table->foreignId('haircut_id')->constrained('haircuts')->onDelete('cascade');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
