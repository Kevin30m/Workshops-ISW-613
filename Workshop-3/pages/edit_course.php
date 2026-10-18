<?php

require_once __DIR__ . '/../utils/auth.php';
requireLogin();

require_once __DIR__ . '/../utils/database.php';

$id = $_GET['id'];

$sql = "SELECT * FROM courses WHERE id = '$id'";
$resultado = $conn->query($sql);
$course = $resultado->fetch(PDO::FETCH_ASSOC);

?>

<?php require_once 'common/header.php'; ?>

<div class="container mt-5">

  <h2>Editar Curso</h2>

  <form action="/actions/update_course.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $course['id']; ?>">

    <div class="form-group">
      <label>Nombre</label>
      <input type="text" name="name" class="form-control"
             value="<?php echo $course['name']; ?>" required>
    </div>

    <div class="form-group">
      <label>Código de Curso</label>
      <input type="text" name="course_code" class="form-control"
             value="<?php echo $course['course_code']; ?>" required>
    </div>

    <div class="form-group">
      <label>Id de la Carrera</label>
      <input type="number" name="career_id" class="form-control"
             value="<?php echo $course['career_id']; ?>" required>
    </div>

    <div class="form-group">
      <label>Créditos</label>
      <input type="number" name="credits" class="form-control"
             value="<?php echo $course['credits']; ?>" required>
    </div>

    <div class="form-group">
      <label>Descripción</label>
      <textarea name="description" class="form-control" required><?php echo $course['description']; ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">
      Actualizar Curso
    </button>

    <a href="/courses.php" class="btn btn-secondary">
      Volver
    </a>

  </form>

</div>

<?php require_once 'common/footer.php'; ?>