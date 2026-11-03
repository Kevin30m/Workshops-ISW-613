<?php require_once __DIR__ . '/../../inc/header.php'; ?>

<div class="container mt-4">

    <h2>Crear Curso</h2>

    <form action="/courses.php?action=store" method="POST">

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Código de Curso</label>
            <input type="text" name="course_code" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Id de la Carrera</label>
            <input type="number" name="career_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Créditos</label>
            <input type="number" name="credits" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            Guardar Curso
        </button>

        <button type="button" class="btn btn-secondary"
                onclick="window.location.href='/courses.php'">
            Volver
        </button>

    </form>

</div>

<?php require_once __DIR__ . '/../../inc/footer.php'; ?>