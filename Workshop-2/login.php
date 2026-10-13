<?php

session_start();

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

    $usuario = $resultado->fetch_assoc();

    $_SESSION["usuario_id"] = $usuario["id"];
    $_SESSION["username"] = $usuario["username"];

    header("Location: perfil.php");
    exit();

} else {

    header("Location: index.php?error=1");
    exit();
}

?>