<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistema de Matrícula')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background-color: #f1f5f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #173554;
        }

        .navbar-brand {
            font-weight: bold;
        }

        main {
            flex: 1;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
        }

        .table thead th {
            background-color: #173554;
            color: white;
        }

        footer {
            background-color: #173554;
            color: white;
            padding: 18px;
            text-align: center;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">

            <a class="navbar-brand"
               href="{{ route('matriculas.create') }}">
                Sistema de Matrícula
            </a>

            <button class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#menu"
                    aria-controls="menu"
                    aria-expanded="false"
                    aria-label="Abrir menú">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="menu">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('matriculas.create') }}">
                            Inicio / Matrícula
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('cursos.index') }}">
                            Gestión de Cursos
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>

    <main class="container py-5">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())

            <div class="alert alert-danger">

                <strong>Revise los siguientes errores:</strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        @yield('content')

    </main>

    <footer>
        Quiz 3 | Programación en Ambiente Web I | ISW-613
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>