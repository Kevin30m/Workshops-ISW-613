<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>CRUD de Productos</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <h4>Agregar producto</h4>

    <form action="<?= site_url('productos/guardar') ?>" method="post">
        <?= csrf_field() ?>

        <input type="text" name="nombre"
               class="form-control mb-2"
               placeholder="Nombre del producto"
               maxlength="100" required>

        <input type="number" name="precio"
               class="form-control mb-2"
               placeholder="Precio"
               min="0" step="0.01" required>

        <button type="submit" class="btn btn-success">
            Guardar
        </button>
    </form>

    <hr>

    <h4>Lista de productos</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($productos as $producto): ?>
                <tr>
                    <td><?= esc($producto['id']) ?></td>
                    <td><?= esc($producto['nombre']) ?></td>
                    <td>₡<?= number_format($producto['precio'], 2) ?></td>
                    <td>
                        <a href="<?= site_url('productos/editar/' . $producto['id']) ?>"
                           class="btn btn-warning btn-sm">
                            Editar
                        </a>

                        <form action="<?= site_url('productos/eliminar/' . $producto['id']) ?>"
                              method="post"
                              style="display:inline"
                              onsubmit="return confirm('¿Eliminar producto?')">

                            <?= csrf_field() ?>

                            <button type="submit" class="btn btn-danger btn-sm">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
