<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    public function run(): void
    {
        $carreras = [
            'Ingenieria del Software',
            'Ingenieria en Tecnologias de Informacion',
            'Administracion de Empresas',
            'Contabilidad y Finanzas',
            'Ingenieria Industrial',
        ];

        foreach ($carreras as $nombre) {
            Carrera::firstOrCreate([
                'nombre' => $nombre,
            ]);
        }
    }
}