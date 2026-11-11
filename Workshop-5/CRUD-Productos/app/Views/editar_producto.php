
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5">

    <h2>Editar Producto</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('productos/actualizar/' . $producto['id']) ?>" method="post">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label">Nombre del producto</label>

            <input
                type="text"
                name="nombre"
                class="form-control"
                value="<?= esc($producto['nombre']) ?>"
                maxlength="100"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Precio</label>

            <input
                type="number"
                name="precio"
                class="form-control"
                value="<?= esc($producto['precio']) ?>"
                min="0"
                step="0.01"
                required>
        </div>

        <button type="submit" class="btn btn-success">
            Actualizar
        </button>

        <a href="<?= site_url('productos') ?>" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

</body>
</html>
