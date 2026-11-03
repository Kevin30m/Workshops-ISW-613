<?php

require_once __DIR__ . '/../utils/database.php';

class Course
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM courses";
        $resultado = $this->conn->query($sql);

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $course_code, $career_id, $credits, $description)
    {
        $sql = "INSERT INTO courses (name, course_code, career_id, credits, description)
                VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            $name,
            $course_code,
            $career_id,
            $credits,
            $description
        ]);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM courses WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $course_code, $career_id, $credits, $description)
    {
        $sql = "UPDATE courses
                SET name = ?,
                    course_code = ?,
                    career_id = ?,
                    credits = ?,
                    description = ?
                WHERE id = ?";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            $name,
            $course_code,
            $career_id,
            $credits,
            $description,
            $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM courses WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
    }
}