<?php require_once __DIR__ . '/../../inc/header.php'; ?>

<div class="container">

    <h2>Cursos</h2>

    <a href="/courses.php?action=create" class="btn btn-primary">
        Crear Curso
    </a>

    <table class="table mt-3">

        <tr>
            <th>Nombre</th>
            <th>Código</th>
            <th>Id Carrera</th>
            <th>Créditos</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($courses as $course): ?>

            <tr>
                <td><?php echo $course['name']; ?></td>
                <td><?php echo $course['course_code']; ?></td>
                <td><?php echo $course['career_id']; ?></td>
                <td><?php echo $course['credits']; ?></td>
                <td><?php echo $course['description']; ?></td>

                <td>

                    <a href="/courses.php?action=edit&id=<?php echo $course['id']; ?>"
                       class="btn btn-warning">
                        Editar
                    </a>

                    <form action="/courses.php?action=delete"
                          method="POST"
                          style="display: inline;">

                        <input type="hidden"
                               name="id"
                               value="<?php echo $course['id']; ?>">

                        <button type="submit" class="btn btn-danger">
                            Eliminar
                        </button>

                    </form>

                </td>
            </tr>

        <?php endforeach; ?>

    </table>

</div>

<?php require_once __DIR__ . '/../../inc/footer.php'; ?>