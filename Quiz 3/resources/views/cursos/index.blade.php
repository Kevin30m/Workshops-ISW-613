@extends('layouts.app')

@section('title', 'Gestión de Cursos')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold">Gestión de Cursos</h2>

        <p class="text-muted mb-0">
            Administración de los cursos disponibles.
        </p>

    </div>

    <a href="{{ route('cursos.create') }}"
       class="btn btn-success">

        + Nuevo Curso

    </a>

</div>

<div class="card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>
                        <th>Código</th>
                        <th>Nombre del Curso</th>
                        <th>Créditos</th>
                        <th>Carrera</th>
                        <th>Acciones</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($cursos as $curso)

                        <tr>

                            <td>{{ $curso->codigo }}</td>

                            <td>{{ $curso->nombre }}</td>

                            <td>
                                <span class="badge bg-primary">
                                    {{ $curso->creditos }}
                                </span>
                            </td>

                            <td>{{ $curso->carrera->nombre }}</td>

                            <td>

                                <div class="d-flex gap-2">

                                    <a href="{{ route('cursos.edit', $curso) }}"
                                       class="btn btn-warning btn-sm">

                                        Editar

                                    </a>

                                    <form action="{{ route('cursos.destroy', $curso) }}"
                                          method="POST"
                                          onsubmit="return confirm('¿Desea eliminar este curso?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm">

                                            Eliminar

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center">
                                No hay cursos registrados.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection