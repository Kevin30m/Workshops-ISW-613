CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    course_code VARCHAR(50) NOT NULL,
    career_id INT NOT NULL,
    credits INT NOT NULL,
    description TEXT NOT NULL
);