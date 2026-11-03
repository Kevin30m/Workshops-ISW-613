<?php

require_once __DIR__ . '/../models/Course.php';

class CourseController
{
    public function index()
    {
        $courseModel = new Course();

        $courses = $courseModel->getAll();

        require __DIR__ . '/../views/courses/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../views/courses/create.php';
    }

    public function store()
    {
        $name = $_POST['name'];
        $course_code = $_POST['course_code'];
        $career_id = $_POST['career_id'];
        $credits = $_POST['credits'];
        $description = $_POST['description'];

        $courseModel = new Course();

        $courseModel->create(
            $name,
            $course_code,
            $career_id,
            $credits,
            $description
        );

        header('Location: /courses.php');
        exit();
    }

    public function edit()
    {
        $id = $_GET['id'];

        $courseModel = new Course();

        $course = $courseModel->getById($id);

        require __DIR__ . '/../views/courses/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $course_code = $_POST['course_code'];
        $career_id = $_POST['career_id'];
        $credits = $_POST['credits'];
        $description = $_POST['description'];

        $courseModel = new Course();

        $courseModel->update(
            $id,
            $name,
            $course_code,
            $career_id,
            $credits,
            $description
        );

        header('Location: /courses.php');
        exit();
    }

    public function delete()
    {
        $id = $_POST['id'];

        $courseModel = new Course();

        $courseModel->delete($id);

        header('Location: /courses.php');
        exit();
    }
}