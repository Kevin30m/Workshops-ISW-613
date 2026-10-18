<?php

require_once __DIR__ . '/../utils/auth.php';
requireLogin();

require_once __DIR__ . '/../utils/database.php';

$id = $_POST['id'];
$name = $_POST['name'];
$course_code = $_POST['course_code'];
$career_id = $_POST['career_id'];
$credits = $_POST['credits'];
$description = $_POST['description'];

$sql = "UPDATE courses
        SET name = '$name',
            course_code = '$course_code',
            career_id = '$career_id',
            credits = '$credits',
            description = '$description'
        WHERE id = '$id'";

$conn->exec($sql);

header('Location: /courses.php');
exit();

?>