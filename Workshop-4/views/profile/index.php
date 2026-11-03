<?php require_once __DIR__ . '/../../inc/header.php'; ?>

<div class="container mt-4">

    <div class="card">

        <div class="card-header text-center">
            <h4>Profile</h4>
        </div>

        <div class="card-body">

            <p>
                <strong>Usuario:</strong>
                <?php echo htmlspecialchars($_SESSION['username']); ?>
            </p>

            <p>
                <strong>Provincia:</strong>
                <?php echo htmlspecialchars($_SESSION['province_name'] ?? 'Not set'); ?>
            </p>

            <hr>

            <h5>Actualizar datos</h5>

            <form action="/pages/profile.php?action=update" method="POST">

                <div class="form-group">
                    <label>Username</label>

                    <input type="text"
                           name="username"
                           class="form-control"
                           value="<?php echo htmlspecialchars($_SESSION['username']); ?>"
                           required>
                </div>

                <div class="form-group">
                    <label>Provincia</label>

                    <select name="province_id" class="form-control" required>

                        <?php foreach ($provinces as $province): ?>

                            <option value="<?php echo $province['id']; ?>"
                                <?php
                                if ($province['id'] == $_SESSION['province_id']) {
                                    echo 'selected';
                                }
                                ?>>

                                <?php echo $province['name']; ?>

                            </option>

                        <?php endforeach; ?>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">
                    Guardar Cambios
                </button>

                <a href="/pages/dashboard.php" class="btn btn-secondary">
                    Volver
                </a>

            </form>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/../../inc/footer.php'; ?>