@extends('layouts.app')

@section('title', 'Nuevo Curso')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card">

            <div class="card-body p-4">

                <h2 class="fw-bold mb-4">
                    Registrar Nuevo Curso
                </h2>

                <form action="{{ route('cursos.store') }}"
                      method="POST">

                    @csrf

                    <div class="mb-3">

                        <label for="nombre" class="form-label">
                            Nombre del Curso
                        </label>

                        <input type="text"
                               id="nombre"
                               name="nombre"
                               class="form-control"
                               value="{{ old('nombre') }}"
                               maxlength="255"
                               required>

                    </div>

                    <div class="mb-3">

                        <label for="codigo" class="form-label">
                            Código del Curso
                        </label>

                        <input type="text"
                               id="codigo"
                               name="codigo"
                               class="form-control"
                               value="{{ old('codigo') }}"
                               maxlength="255"
                               required>

                    </div>

                    <div class="mb-3">

                        <label for="creditos" class="form-label">
                            Cantidad de Créditos
                        </label>

                        <input type="number"
                               id="creditos"
                               name="creditos"
                               class="form-control"
                               value="{{ old('creditos') }}"
                               min="0"
                               max="20"
                               required>

                    </div>

                    <div class="mb-4">

                        <label for="carrera_id" class="form-label">
                            Carrera
                        </label>

                        <select id="carrera_id"
                                name="carrera_id"
                                class="form-select"
                                required>

                            <option value="">
                                Seleccione una carrera
                            </option>

                            @foreach($carreras as $carrera)

                                <option value="{{ $carrera->id }}"
                                    @selected(old('carrera_id') == $carrera->id)>

                                    {{ $carrera->nombre }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <button type="submit"
                            class="btn btn-success">

                        Guardar Curso

                    </button>

                    <a href="{{ route('cursos.index') }}"
                       class="btn btn-secondary">

                        Cancelar

                    </a>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection