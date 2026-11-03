<?php

require_once __DIR__ . '/../utils/auth.php';
requireLogin();

require_once __DIR__ . '/../controllers/ProfileController.php';

$controller = new ProfileController();

$action = $_GET['action'] ?? 'index';

if ($action == 'update') {
    $controller->update();
} else {
    $controller->index();
}