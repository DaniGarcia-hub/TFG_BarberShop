<?php

namespace Database\Seeders;
use App\Models\Haircut;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HaircutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Haircut::create([
            'name' => 'Corte Básico',
            'description' => 'Servicio esencial y profesional garantizando un estilo impecable, con lavado y productos de calidad.',
            'price' => 17.00,
            'duration' => 30,
        ]);

        Haircut::create([
            'name' => 'Corte + Barba',
            'description' => 'Transformación completa: Corte combinado con diseño, perfilado a navaja y tratamiento de barba que mereces.',
            'price' => 27.00,
            'duration' => 30,
        ]);

        Haircut::create([
            'name' => 'Corte Niño',
            'description' => 'Degradado moderno desde el cero absoluto (shaver) hasta el largo superior deseado. Acabado simétrico milimétrico y perfilado de patillas.',
            'price' => 12.00,
            'duration' => 30,
        ]);

        Haircut::create([
            'name' => 'Servicio Especial: Tinte',
            'description' => 'Decoloración global y matiz en tonos tendencia (platino, gris o fantasía). Requiere protección capilar intensiva previa.',
            'price' => 40.00,
            'duration' => 60,
        ]);

        Haircut::create([
            'name' => 'Servicio Especial: Domicilio',
            'description' => 'Asistencia personalizada a domicilio, usando materiales de primera calidad y asesoramiento personal.',
            'price' => 99.99,
            'duration' => 120,
        ]);
    }
}
