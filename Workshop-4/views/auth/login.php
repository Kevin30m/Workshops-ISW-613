<?php
require_once __DIR__ . '/../../utils/messages.php';

$rememberedUsername = $_COOKIE['remembered_username'] ?? '';
?>

<?php require_once __DIR__ . '/../../pages/common/header.php'; ?>

<body>

<div class="container mt-5">
    <h1 class="text-center">Welcome to My Website</h1>
    <p class="text-center">This is a simple homepage created with PHP and Bootstrap.</p>
</div>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card">

                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>

                <div class="card-body">

                    <?php renderAlert(); ?>

                    <form action="/index.php?action=login" method="POST">

                        <div class="form-group">
                            <label>Username</label>

                            <input type="text"
                                   class="form-control"
                                   name="username"
                                   value="<?php echo htmlspecialchars($rememberedUsername); ?>"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>

                            <input type="password"
                                   class="form-control"
                                   name="password"
                                   required>
                        </div>

                        <div class="form-group form-check">

                            <input type="checkbox"
                                   class="form-check-input"
                                   name="remember_me"
                                   <?php echo $rememberedUsername !== '' ? 'checked' : ''; ?>>

                            <label class="form-check-label">
                                Remember me
                            </label>

                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            Login
                        </button>

                    </form>

                    <p class="text-center mt-3">
                        Don't have an account?
                        <a href="/index.php?action=register">Sign up</a>
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<?php require_once __DIR__ . '/../../pages/common/footer.php'; ?>