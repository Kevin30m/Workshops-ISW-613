<?php

require_once __DIR__ . '/../models/User.php';

class UserController
{
    public function index()
    {
        $userModel = new User();

        $users = $userModel->getAll();

        require __DIR__ . '/../views/users/index.php';
    }
}