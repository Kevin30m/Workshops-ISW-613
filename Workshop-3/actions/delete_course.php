<?php

require_once __DIR__ . '/../utils/auth.php';
requireLogin();

require_once __DIR__ . '/../utils/database.php';

$id = $_POST['id'];

$sql = "DELETE FROM courses WHERE id = '$id'";

$conn->exec($sql);

header('Location: /courses.php');
exit();

?>