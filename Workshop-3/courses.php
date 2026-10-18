<?php
require_once __DIR__ . '/utils/auth.php';

requireLogin();

require_once __DIR__ . '/utils/database.php';

$sql = "SELECT * FROM courses";
$resultado = $conn->query($sql);
$courses = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require('inc/header.php'); ?>

<div class="container-fluid">

  <div class="jumbotron">
    <h1 class="display-4">Courses</h1>
    <p class="lead">Courses list</p>
    <hr class="my-4">

    <!-- NUEVO: botón para crear cursos -->
    <a href="/pages/create_course.php" class="btn btn-primary">
      Crear Curso
    </a>
  </div>

  <table class="table">

    <thead>
      <tr>
        <th>Nombre</th>
        <th>Código</th>
        <th>Id Carrera</th>
        <th>Créditos</th>
        <th>Descripción</th>
        <th>Acciones</th>
      </tr>
    </thead>

    <tbody>

      <?php foreach ($courses as $course): ?>

        <tr>

          <td><?php echo htmlspecialchars($course['name']); ?></td>

          <td><?php echo htmlspecialchars($course['course_code']); ?></td>

          <td><?php echo (int) $course['career_id']; ?></td>

          <td><?php echo (int) $course['credits']; ?></td>

          <td><?php echo htmlspecialchars($course['description']); ?></td>

          <td>

            <!-- NUEVO: editar curso -->
            <a href="/pages/edit_course.php?id=<?php echo $course['id']; ?>"
               class="btn btn-warning">
              Editar
            </a>

            <!-- NUEVO: eliminar curso usando POST -->
            <form action="/actions/delete_course.php"
                  method="POST"
                  style="display:inline;">

              <input type="hidden"
                     name="id"
                     value="<?php echo $course['id']; ?>">

              <button type="submit"
                      class="btn btn-danger">
                Eliminar
              </button>

            </form>

          </td>

        </tr>

      <?php endforeach; ?>

    </tbody>

  </table>

</div>

<?php require('inc/footer.php'); ?>