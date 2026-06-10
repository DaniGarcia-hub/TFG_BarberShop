<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Haircut;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barberIds = User::role('peluquero')->pluck('id')->toArray();
        $clientIds = User::pluck('id')->toArray();
        $scheduleIds = Schedule::pluck('id')->toArray();
        $haircutIds = Haircut::pluck('id')->toArray();

        if (empty($barberIds) || empty($clientIds) || empty($scheduleIds) || empty($haircutIds)) {
            return;
        }

        Booking::create([
            'client_id' => $clientIds[0],
            'barber_id' => $barberIds[0],
            'schedule_id' => $scheduleIds[21],
            'haircut_id' => $haircutIds[1],
            'booking_date' => '2026-06-09',
            'note' => 'Corte de pelo con degradado y lavado.',
            'state' => 'pendiente',
            'confirmation_date' => null,
        ]);

        Booking::create([
            'client_id' => $clientIds[4],
            'barber_id' => $barberIds[0],
            'schedule_id' => $scheduleIds[60],
            'haircut_id' => $haircutIds[0],
            'booking_date' => '2026-06-11',
            'note' => 'Arreglo de barba con navaja.',
            'state' => 'completado',
            'confirmation_date' => now()->subDays(1),
        ]);

        Booking::create([
            'client_id' => $clientIds[5],
            'barber_id' => $barberIds[2] ?? $barberIds[0],
            'schedule_id' => $scheduleIds[41],
            'haircut_id' => $haircutIds[3] ?? $haircutIds[0],
            'booking_date' => '2026-06-10',
            'note' => 'Tinte de pelo...',
            'state' => 'pendiente',
            'confirmation_date' => null,
        ]);

        Booking::create([
            'client_id' => $clientIds[6],
            'barber_id' => $barberIds[1] ?? $barberIds[0],
            'schedule_id' => $scheduleIds[97],
            'haircut_id' => $haircutIds[2],
            'booking_date' => '2026-06-13',
            'note' => 'El cliente avisó que no podía asistir por trabajo.',
            'state' => 'cancelado',
            'confirmation_date' => null,
        ]);

        Booking::create([
            'client_id' => $clientIds[3],
            'barber_id' => $barberIds[1] ?? $barberIds[0],
            'schedule_id' => $scheduleIds[24],
            'haircut_id' => $haircutIds[0],
            'booking_date' => '2026-06-09',
            'note' => null,
            'state' => 'pendiente',
            'confirmation_date' => null,
        ]);
    }
}
