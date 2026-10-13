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

$sql = "SELECT * FROM usuarios WHERE id = '$usuario_id'";
$resultado = $conexion->query($sql);
$usuario = $resultado->fetch_assoc();

$sqlProvincias = "SELECT * FROM provincias";
$resultadoProvincias = $conexion->query($sqlProvincias);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil</title>
</head>

<body>

  <h2>Perfil de usuario</h2>

  <form action="actualizar-perfil.php" method="POST">

    <label>Username</label>
    <input type="text" name="username" value="<?php echo $usuario["username"]; ?>" required>

    <br><br>

    <label>Password</label>
    <input type="text" name="password" value="<?php echo $usuario["password"]; ?>" required>

    <br><br>

    <label>Provincia</label>

    <select name="provincia_id" required>

      <?php
      while ($provincia = $resultadoProvincias->fetch_assoc()) {

        if ($provincia["Id"] == $usuario["provincia_id"]) {
          echo '<option value="' . $provincia["Id"] . '" selected>' . $provincia["nombre"] . '</option>';
        } else {
          echo '<option value="' . $provincia["Id"] . '">' . $provincia["nombre"] . '</option>';
        }

      }
      ?>

    </select>

    <br><br>

    <button type="submit">Actualizar</button>

  </form>

</body>

</html>