<?php

require_once __DIR__ . '/../utils/auth.php';
requireLogin();

require_once __DIR__ . '/../utils/database.php';

$name = $_POST['name'];
$course_code = $_POST['course_code'];
$career_id = $_POST['career_id'];
$credits = $_POST['credits'];
$description = $_POST['description'];

$sql = "INSERT INTO courses (name, course_code, career_id, credits, description)
        VALUES ('$name', '$course_code', '$career_id', '$credits', '$description')";

$conn->exec($sql);

header('Location: /courses.php');
exit();