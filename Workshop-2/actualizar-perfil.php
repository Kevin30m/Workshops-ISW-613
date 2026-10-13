<?php

session_start();

if (!isset($_SESSION["usuario_id"])) {
    header("Location: index.php");
    exit();
}

$conexion = new mysqli("localhost", "root", "", "workshop1_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$usuario_id = $_SESSION["usuario_id"];
$username = $_POST["username"];
$password = $_POST["password"];
$provincia_id = $_POST["provincia_id"];

$sql = "UPDATE usuarios
        SET username = '$username',
            password = '$password',
            provincia_id = '$provincia_id'
        WHERE id = '$usuario_id'";

if ($conexion->query($sql) === TRUE) {
    $_SESSION["username"] = $username;
    header("Location: perfil.php");
    exit();
} else {
    echo "Error al actualizar el perfil";
}

?>