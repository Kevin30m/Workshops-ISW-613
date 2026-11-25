<?php

namespace Tests\Feature;

use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MatriculaTest extends TestCase
{
    use RefreshDatabase;

    public function test_mostrar_formulario_principal(): void
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Matrícula de Estudiantes');
        $response->assertSee('ISW-613');
    }

    public function test_registrar_matricula(): void
    {
        $this->seed();

        $curso = Curso::firstOrFail();

        $response = $this->post('/matriculas', [
            'estudiante' => 'Estudiante de Prueba',
            'identificacion' => 'TEST123',
            'curso_id' => $curso->id,
        ]);

        $this->assertDatabaseHas('matriculas', [
            'estudiante' => 'Estudiante de Prueba',
            'identificacion' => 'TEST123',
            'curso_id' => $curso->id,
        ]);

        $matricula = Matricula::firstOrFail();

        $response->assertRedirect(
            route('matriculas.show', $matricula)
        );
    }

    public function test_mostrar_confirmacion(): void
    {
        $this->seed();

        $curso = Curso::firstOrFail();

        $matricula = Matricula::create([
            'estudiante' => 'Estudiante de Prueba',
            'identificacion' => 'TEST123',
            'curso_id' => $curso->id,
        ]);

        $response = $this->get(
            route('matriculas.show', $matricula)
        );

        $response->assertStatus(200);
        $response->assertSee('Estudiante de Prueba');
        $response->assertSee('TEST123');
        $response->assertSee($curso->nombre);
    }

    public function test_validar_campos_obligatorios(): void
    {
        $response = $this->post('/matriculas', []);

        $response->assertSessionHasErrors([
            'estudiante',
            'identificacion',
            'curso_id',
        ]);
    }

    public function test_no_matricular_curso_inexistente(): void
    {
        $response = $this->post('/matriculas', [
            'estudiante' => 'Estudiante de Prueba',
            'identificacion' => 'TEST123',
            'curso_id' => 999999,
        ]);

        $response->assertSessionHasErrors('curso_id');

        $this->assertDatabaseCount('matriculas', 0);
    }
}