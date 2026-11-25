<?php

namespace Tests\Feature;

use App\Models\Carrera;
use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CursoTest extends TestCase
{
    use RefreshDatabase;

    public function test_listar_cursos(): void
    {
        $this->seed();

        $response = $this->get('/cursos');

        $response->assertStatus(200);
        $response->assertSee('ISW-613');
    }

    public function test_crear_curso(): void
    {
        $this->seed();

        $carrera = Carrera::firstOrFail();

        $response = $this->post('/cursos', [
            'nombre' => 'Curso de Prueba',
            'codigo' => 'TEST-001',
            'creditos' => 3,
            'carrera_id' => $carrera->id,
        ]);

        $response->assertRedirect(route('cursos.index'));

        $this->assertDatabaseHas('cursos', [
            'codigo' => 'TEST-001',
            'creditos' => 3,
        ]);
    }

    public function test_editar_curso(): void
    {
        $this->seed();

        $curso = Curso::firstOrFail();

        $response = $this->put('/cursos/' . $curso->id, [
            'nombre' => 'Curso Actualizado',
            'codigo' => $curso->codigo,
            'creditos' => 5,
            'carrera_id' => $curso->carrera_id,
        ]);

        $response->assertRedirect(route('cursos.index'));

        $this->assertDatabaseHas('cursos', [
            'id' => $curso->id,
            'nombre' => 'Curso Actualizado',
            'creditos' => 5,
        ]);
    }

    public function test_eliminar_curso(): void
    {
        $this->seed();

        $curso = Curso::firstOrFail();

        $response = $this->delete('/cursos/' . $curso->id);

        $response->assertRedirect(route('cursos.index'));

        $this->assertDatabaseMissing('cursos', [
            'id' => $curso->id,
        ]);
    }

    public function test_no_permitir_codigos_duplicados(): void
    {
        $this->seed();

        $curso = Curso::firstOrFail();

        $response = $this->post('/cursos', [
            'nombre' => 'Curso Duplicado',
            'codigo' => $curso->codigo,
            'creditos' => 3,
            'carrera_id' => $curso->carrera_id,
        ]);

        $response->assertSessionHasErrors('codigo');
    }

    public function test_no_eliminar_curso_matriculado(): void
    {
        $this->seed();

        $curso = Curso::firstOrFail();

        Matricula::create([
            'estudiante' => 'Estudiante de Prueba',
            'identificacion' => 'TEST123',
            'curso_id' => $curso->id,
        ]);

        $response = $this->delete('/cursos/' . $curso->id);

        $response->assertRedirect(route('cursos.index'));
        $response->assertSessionHas('error');

        $this->assertDatabaseHas('cursos', [
            'id' => $curso->id,
        ]);
    }

    public function test_no_permitir_creditos_negativos(): void
    {
        $this->seed();

        $carrera = Carrera::firstOrFail();

        $response = $this->post('/cursos', [
            'nombre' => 'Curso de Prueba',
            'codigo' => 'TEST-002',
            'creditos' => -1,
            'carrera_id' => $carrera->id,
        ]);

        $response->assertSessionHasErrors('creditos');
    }
}