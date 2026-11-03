<?php

require_once __DIR__ . '/../../utils/database.php';
require_once __DIR__ . '/../../utils/provinces.php';
require_once __DIR__ . '/../../utils/messages.php';

$provinces = getProvinces($conn);

?>

<?php require_once __DIR__ . '/../../pages/common/header.php'; ?>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header text-center">
                    <h4>Register</h4>
                </div>

                <div class="card-body">

                    <?php renderAlert(); ?>

                    <form action="/index.php?action=register" method="POST">

                        <div class="form-group">
                            <label>Username</label>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Province</label>

                            <select name="province_id"
                                    class="form-control"
                                    required>

                                <option value="" disabled selected>
                                    Select a province
                                </option>

                                <?php foreach ($provinces as $province): ?>

                                    <option value="<?php echo $province['id']; ?>">
                                        <?php echo $province['name']; ?>
                                    </option>

                                <?php endforeach; ?>

                            </select>
                        </div>

                        <div class="form-group">
                            <label>Password</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   minlength="8"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>

                            <input type="password"
                                   name="confirm_password"
                                   class="form-control"
                                   minlength="8"
                                   required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary btn-block">
                            Create account
                        </button>

                    </form>

                    <p class="text-center mt-3">
                        Already have an account?
                        <a href="/index.php">Login</a>
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/../../pages/common/footer.php'; ?>