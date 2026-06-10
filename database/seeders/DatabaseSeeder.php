<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Schedule;
use App\Models\Haircut;
use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersDefaultSeeder::class,
            ScheduleSeeder::class,
            HaircutSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
