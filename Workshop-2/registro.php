<?php

$conexion = new mysqli("localhost", "root", "", "workshop1_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM provincias";
$resultado = $conexion->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
</head>

<body>

  <h2>Registro de usuario</h2>

  <form action="guardar-usuario.php" method="POST">

    <label>Username</label>
    <input type="text" name="username" required>

    <br><br>

    <label>Password</label>
    <input type="password" name="password" required>

    <br><br>

    <label>Provincia</label>

    <select name="provincia_id" required>
      <option value="">Seleccione una provincia</option>


      
      <?php
      while ($provincia = $resultado->fetch_assoc()) {
        echo '<option value="' . $provincia["Id"] . '">' . $provincia["nombre"] . '</option>';
      }
      ?>



    </select>

    <br><br>

    <button type="submit">Registrar</button>

  </form>

</body>

</html>