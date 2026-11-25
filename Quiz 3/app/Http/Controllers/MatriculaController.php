<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Matricula;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function create()
    {
        $cursos = Curso::with('carrera')
            ->orderBy('nombre')
            ->get();

        return view('matriculas.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'estudiante' => 'required|string|max:255',
            'identificacion' => 'required|string|max:30',
            'curso_id' => 'required|exists:cursos,id',
        ]);

        $matricula = Matricula::create($datos);

        return redirect()
            ->route('matriculas.show', $matricula);
    }

    public function show(Matricula $matricula)
    {
        $matricula->load('curso.carrera');

        return view('matriculas.show', compact('matricula'));
    }
}