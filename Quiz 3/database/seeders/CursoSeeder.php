<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Carrera;

class CursoSeeder extends Seeder
{
    public function run(): void
    {
        $software = Carrera::where(
            'nombre', 'Ingenieria del Software'
        )->firstOrFail();

        $tecnologias = Carrera::where(
            'nombre', 'Ingenieria en Tecnologias de Informacion'
        )->firstOrFail();

        $administracion = Carrera::where(
            'nombre', 'Administracion de Empresas'
        )->firstOrFail();

        $cursos = [
            [
                'nombre' => 'Programacion en Ambiente Web I',
                'codigo' => 'ISW-613',
                'creditos' => 4,
                'carrera_id' => $software->id,
            ],
            [
                'nombre' => 'Administracion de Sistemas Operativos de Red',
                'codigo' => 'ISW-612',
                'creditos' => 4,
                'carrera_id' => $software->id,
            ],
            [
                'nombre' => 'Bases de Datos',
                'codigo' => 'BD-101',
                'creditos' => 3,
                'carrera_id' => $software->id,
            ],
            [
                'nombre' => 'Diseno e Implementacion de Redes',
                'codigo' => 'RED-101',
                'creditos' => 4,
                'carrera_id' => $tecnologias->id,
            ],
            [
                'nombre' => 'Seguridad Informatica',
                'codigo' => 'SEG-101',
                'creditos' => 3,
                'carrera_id' => $tecnologias->id,
            ],
            [
                'nombre' => 'Administracion General',
                'codigo' => 'ADM-101',
                'creditos' => 3,
                'carrera_id' => $administracion->id,
            ],
        ];

        foreach ($cursos as $curso) {
            Curso::firstOrCreate(
                ['codigo' => $curso['codigo']],
                $curso
            );
        }
    }
}
