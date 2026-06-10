<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UsersDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $barberRole = Role::create(['name' => 'peluquero']);

        $adminUser = User::create([
            'name' => 'Administrador',
            'email' => 'admin@barbershop.com',
            'password' => Hash::make('12345678'),
            'telefono' => '123456789',
        ]);

        $barberUser1 = User::create([
            'name' => 'Peluquero 1',
            'email' => 'peluqueroprueba1@barbershop.com',
            'password' => Hash::make('12345678'),
            'telefono' => '123456780',
        ]);

        $barberUser2 = User::create([
            'name' => 'Peluquero 2',
            'email' => 'peluqueroprueba2@barbershop.com',
            'password' => Hash::make('12345678'),
            'telefono' => '123456781',
        ]);

        $barberUser3 = User::create([
            'name' => 'Peluquero 3',
            'email' => 'peluqueroprueba3@barbershop.com',
            'password' => Hash::make('12345678'),
            'telefono' => '123456782',
        ]);

        User::create([
            'name' => 'Usuario 1',
            'email' => 'userprueba1@barbershop.com',
            'password' => Hash::make('12345678'),
            'telefono' => '111111111',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Usuario 2',
            'email' => 'userprueba2@barbershop.com',
            'password' => Hash::make('12345678'),
            'telefono' => '111111112',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Usuario 3',
            'email' => 'userprueba3@barbershop.com',
            'password' => Hash::make('12345678'),
            'telefono' => '111111113',
            'email_verified_at' => now(),
        ]);

        $adminUser->markEmailAsVerified();
        $adminUser->assignRole($adminRole);
        
        $barberUser1->markEmailAsVerified();
        $barberUser1->assignRole($barberRole);

        $barberUser2->markEmailAsVerified();
        $barberUser2->assignRole($barberRole);

        $barberUser3->markEmailAsVerified();
        $barberUser3->assignRole($barberRole);
    }
}
