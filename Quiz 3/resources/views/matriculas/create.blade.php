@extends('layouts.app')

@section('title', 'Matrícula de Estudiantes')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <div class="card-body p-4">

                <h2 class="fw-bold mb-2">
                    Matrícula de Estudiantes
                </h2>

                <p class="text-muted mb-4">
                    Complete los datos del estudiante y seleccione
                    el curso que desea matricular.
                </p>

                <form action="{{ route('matriculas.store') }}"
                      method="POST">

                    @csrf

                    <div class="mb-3">

                        <label for="estudiante" class="form-label">
                            Nombre Completo del Estudiante
                        </label>

                        <input type="text"
                               id="estudiante"
                               name="estudiante"
                               class="form-control"
                               placeholder="Ingrese el nombre completo"
                               value="{{ old('estudiante') }}"
                               maxlength="255"
                               required>

                    </div>

                    <div class="mb-3">

                        <label for="identificacion" class="form-label">
                            Número de Identificación
                        </label>

                        <input type="text"
                               id="identificacion"
                               name="identificacion"
                               class="form-control"
                               placeholder="Ingrese su identificación"
                               value="{{ old('identificacion') }}"
                               maxlength="30"
                               required>

                    </div>

                    <div class="mb-4">

                        <label for="curso_id" class="form-label">
                            Curso Disponible
                        </label>

                        <select id="curso_id"
                                name="curso_id"
                                class="form-select"
                                required>

                            <option value="">
                                Seleccione un curso
                            </option>

                            @foreach($cursos as $curso)

                                <option value="{{ $curso->id }}"
                                    @selected(old('curso_id') == $curso->id)>

                                    {{ $curso->codigo }} -
                                    {{ $curso->nombre }} -
                                    {{ $curso->creditos }} créditos

                                </option>

                            @endforeach

                        </select>

                    </div>

                    @if($cursos->isEmpty())

                        <div class="alert alert-warning">
                            No hay cursos disponibles para matricular.
                        </div>

                    @endif

                    <div class="d-grid">

                        <button type="submit"
                                class="btn btn-primary"
                                @disabled($cursos->isEmpty())>

                            Matricular Estudiante

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection