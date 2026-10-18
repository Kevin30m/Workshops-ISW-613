<?php
require_once __DIR__ . '/../utils/auth.php';

requireLogin();
?>

<?php require_once 'common/header.php'; ?>

<div class="container mt-5">

  <h2>Crear Curso</h2>

  <form action="/actions/create_course.php" method="POST">

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
      <label>Descripción del Curso</label>
      <textarea name="description" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
      Crear Curso
    </button>

    <a href="/courses.php" class="btn btn-secondary">
      Volver
    </a>

  </form>

</div>

<?php require_once 'common/footer.php'; ?>