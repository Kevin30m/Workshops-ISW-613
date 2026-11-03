<?php

require_once __DIR__ . '/utils/auth.php';
requireLogin();

require_once __DIR__ . '/controllers/UserController.php';

$controller = new UserController();

$controller->index();