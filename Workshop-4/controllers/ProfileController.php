<?php

require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../utils/database.php';
require_once __DIR__ . '/../utils/provinces.php';

class ProfileController
{
    public function index()
    {
        global $conn;

        $username = $_SESSION['username'];

        $provinces = getProvinces($conn);

        require __DIR__ . '/../views/profile/index.php';
    }

    public function update()
    {
        global $conn;

        $username = $_POST['username'];
        $province_id = $_POST['province_id'];

        $sql = "UPDATE users
                SET username = ?, province_id = ?
                WHERE id = ?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([
            $username,
            $province_id,
            $_SESSION['user_id']
        ]);

        $_SESSION['username'] = $username;
        $_SESSION['province_id'] = $province_id;

        header('Location: /pages/profile.php');
        exit();
    }
}