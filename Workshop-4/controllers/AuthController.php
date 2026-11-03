<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../utils/auth.php';
require_once __DIR__ . '/../utils/database.php';
require_once __DIR__ . '/../utils/provinces.php';

class AuthController
{
    public function login()
    {
        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;

        if (
            !is_string($username)
            || !is_string($password)
            || trim($username) === ''
            || $password === ''
        ) {
            header('Location: /index.php?error=invalid_input');
            exit();
        }

        $userModel = new User();

        $user = $userModel->getByUsername(trim($username));

        if ($user === false || !password_verify($password, $user['password_hash'])) {
            header('Location: /index.php?error=invalid_credentials');
            exit();
        }

        loginUser($user);

        if (isset($_POST['remember_me'])) {
            rememberUsername($user['username']);
        } else {
            forgetUsername();
        }

        header('Location: /pages/dashboard.php');
        exit();
    }

    public function register()
    {
        global $conn;

        $username = $_POST['username'] ?? null;
        $password = $_POST['password'] ?? null;
        $confirmPassword = $_POST['confirm_password'] ?? null;
        $provinceId = $_POST['province_id'] ?? null;

        if (
            !is_string($username)
            || !is_string($password)
            || !is_string($confirmPassword)
            || trim($username) === ''
            || !ctype_digit((string) $provinceId)
        ) {
            header('Location: /index.php?action=register&error=invalid_input');
            exit();
        }

        if (strlen($password) < 8) {
            header('Location: /index.php?action=register&error=password_too_short');
            exit();
        }

        if ($password !== $confirmPassword) {
            header('Location: /index.php?action=register&error=password_mismatch');
            exit();
        }

        if (findProvince($conn, (int) $provinceId) === false) {
            header('Location: /index.php?action=register&error=invalid_province');
            exit();
        }

        try {

            $userModel = new User();

            $userModel->createUser(
                trim($username),
                $password,
                (int) $provinceId
            );

        } catch (PDOException $exception) {

            if ($exception->getCode() === '23000') {
                header('Location: /index.php?action=register&error=username_taken');
                exit();
            }

            header('Location: /index.php?action=register&error=server_error');
            exit();
        }

        header('Location: /index.php?success=registered');
        exit();
    }
}