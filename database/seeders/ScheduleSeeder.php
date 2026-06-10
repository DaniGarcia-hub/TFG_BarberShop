<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $morningSlots = [
            ['08:00:00', '08:30:00'], 
            ['08:30:00', '09:00:00'],
            ['09:00:00', '09:30:00'], 
            ['09:30:00', '10:00:00'],
            ['10:00:00', '10:30:00'], 
            ['10:30:00', '11:00:00'],
            ['11:00:00', '11:30:00'], 
            ['11:30:00', '12:00:00'],
            ['12:00:00', '12:30:00'], 
            ['12:30:00', '13:00:00'],
        ];

        $afternoonSlots = [
            ['16:00:00', '16:30:00'], 
            ['16:30:00', '17:00:00'],
            ['17:00:00', '17:30:00'], 
            ['17:30:00', '18:00:00'],
            ['18:00:00', '18:30:00'], 
            ['18:30:00', '19:00:00'],
            ['19:00:00', '19:30:00'], 
            ['19:30:00', '20:00:00'],
            ['20:00:00', '20:30:00'],
        ];

        for ($day = 1; $day <= 6; $day++) { // Se recorre desde el día 1 (lunes) hasta el sabado (6).
            
            foreach ($morningSlots as $slot) { // Por cada turno de la mañana, se crea...
                Schedule::create([
                    'day_of_week' => $day,
                    'start_time'  => $slot[0],
                    'finish_time' => $slot[1],
                    'shift_type'  => 'mañana',
                ]);
            }

            if ($day >= 1 && $day <= 5) { // Los sábados no tendrán turno de tarde, entonces, desde el lunes hasta el viernes se crean turnos de tarde...
                foreach ($afternoonSlots as $slot) {
                    Schedule::create([
                        'day_of_week' => $day,
                        'start_time'  => $slot[0],
                        'finish_time' => $slot[1],
                        'shift_type'  => 'tarde', 
                    ]);
                }
            }
        }
    }
}
