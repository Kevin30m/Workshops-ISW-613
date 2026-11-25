@extends('layouts.app')

@section('title', 'Confirmación de Matrícula')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <div class="card-body p-4">

                <div class="alert alert-success text-center">

                    <h4 class="fw-bold">
                        ¡Matrícula realizada correctamente!
                    </h4>

                    <p class="mb-0">
                        Los datos fueron registrados exitosamente.
                    </p>

                </div>

                <h3 class="fw-bold mb-4">
                    Detalles de la Matrícula
                </h3>

                <div class="table-responsive">

                    <table class="table table-bordered">

                        <tbody>

                            <tr>
                                <th>Número de Matrícula</th>
                                <td>{{ $matricula->id }}</td>
                            </tr>

                            <tr>
                                <th>Nombre del Estudiante</th>
                                <td>{{ $matricula->estudiante }}</td>
                            </tr>

                            <tr>
                                <th>Identificación</th>
                                <td>{{ $matricula->identificacion }}</td>
                            </tr>

                            <tr>
                                <th>Nombre del Curso</th>
                                <td>{{ $matricula->curso->nombre }}</td>
                            </tr>

                            <tr>
                                <th>Código del Curso</th>
                                <td>{{ $matricula->curso->codigo }}</td>
                            </tr>

                            <tr>
                                <th>Cantidad de Créditos</th>
                                <td>{{ $matricula->curso->creditos }}</td>
                            </tr>

                            <tr>
                                <th>Carrera</th>
                                <td>{{ $matricula->curso->carrera->nombre }}</td>
                            </tr>

                            <tr>
                                <th>Fecha de Matrícula</th>
                                <td>
                                    {{ $matricula->created_at->format('d/m/Y') }}
                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>

                <div class="d-flex gap-2 mt-4 flex-wrap">

                    <a href="{{ route('matriculas.create') }}"
                       class="btn btn-primary">

                        Nueva Matrícula

                    </a>

                    <a href="{{ route('cursos.index') }}"
                       class="btn btn-secondary">

                        Gestión de Cursos

                    </a>

                    <button type="button"
                            class="btn btn-outline-dark"
                            onclick="window.print()">

                        Imprimir

                    </button>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection