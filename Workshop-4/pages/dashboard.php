<?php

require_once __DIR__ . '/../utils/auth.php';

requireLogin();

?>

<?php require_once __DIR__ . '/../inc/header.php'; ?>

<div class="container mt-5">

    <h1 class="text-center">
        Welcome to My Website
    </h1>

    <p class="text-center">
        You are logged in as
        <strong>
            <?php echo htmlspecialchars($_SESSION['username']); ?>
        </strong>
    </p>

</div>

<?php require_once __DIR__ . '/../inc/footer.php'; ?>