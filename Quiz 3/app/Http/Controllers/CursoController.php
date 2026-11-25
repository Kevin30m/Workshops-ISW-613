<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Carrera;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::with('carrera')
            ->orderBy('nombre')
            ->get();

        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $carreras = Carrera::orderBy('nombre')->get();

        return view('cursos.create', compact('carreras'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:cursos,codigo',
            'creditos' => 'required|integer|min:0|max:20',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        Curso::create($datos);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso registrado correctamente.');
    }

    public function edit(Curso $curso)
    {
        $carreras = Carrera::orderBy('nombre')->get();

        return view('cursos.edit', compact('curso', 'carreras'));
    }

    public function update(Request $request, Curso $curso)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => [
                'required',
                'string',
                'max:255',
                Rule::unique('cursos', 'codigo')->ignore($curso->id),
            ],
            'creditos' => 'required|integer|min:0|max:20',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        $curso->update($datos);

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso actualizado correctamente.');
    }

    public function destroy(Curso $curso)
    {
        if ($curso->matriculas()->exists()) {
            return redirect()
                ->route('cursos.index')
                ->with('error', 'No se puede eliminar un curso con matriculas registradas.');
        }

        $curso->delete();

        return redirect()
            ->route('cursos.index')
            ->with('success', 'Curso eliminado correctamente.');
    }
}