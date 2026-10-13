<?php

$conexion = new mysqli("localhost", "root", "", "workshop1_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$username = $_POST["username"];
$password = $_POST["password"];
$provincia_id = $_POST["provincia_id"];

$sql = "INSERT INTO usuarios (username, password, provincia_id)
        VALUES ('$username', '$password', '$provincia_id')";

if ($conexion->query($sql) === TRUE) {
    echo "Usuario registrado correctamente";
} else {
    echo "Error al registrar usuario";
}

?>