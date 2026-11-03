<?php

require_once __DIR__ . '/../utils/database.php';

class User
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT users.id,
                       users.username,
                       users.created_at,
                       provinces.name AS province_name
                FROM users
                LEFT JOIN provinces
                ON users.province_id = provinces.id";

        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByUsername($username)
    {
        $sql = "SELECT users.id,
                       users.username,
                       users.password_hash,
                       users.province_id,
                       users.profile_picture,
                       provinces.name AS province_name
                FROM users
                LEFT JOIN provinces
                ON provinces.id = users.province_id
                WHERE users.username = ?
                LIMIT 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUser($username, $password, $provinceId)
    {
        $sql = "INSERT INTO users (username, password_hash, province_id)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            $username,
            password_hash($password, PASSWORD_DEFAULT),
            $provinceId
        ]);
    }
}