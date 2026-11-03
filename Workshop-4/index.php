<?php

require_once __DIR__ . '/controllers/AuthController.php';

$controller = new AuthController();

$action = $_GET['action'] ?? 'showLogin';

if ($action == 'login') {

    $controller->login();

} elseif ($action == 'register') {

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->register();
    } else {
        require __DIR__ . '/views/auth/register.php';
    }

} else {

    require __DIR__ . '/views/auth/login.php';
}