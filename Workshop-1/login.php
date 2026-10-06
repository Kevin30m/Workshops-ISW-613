<?php

$conexion = new mysqli("localhost", "root", "", "workshop1_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM usuarios 
        WHERE username = '$username' 
        AND password = '$password'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    header("Location: usuario-existe.php");
    exit();
} else {
    header("Location: index.php?error=1");
    exit();
}
?>