CREATE DATABASE college_complaint_management_scet;

USE college_complaint_management_scet;

-- Users Table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    role ENUM('student', 'faculty', 'principal') NOT NULL,
    email VARCHAR(100),
    gender ENUM('Male', 'Female', 'Other'),
    college_id VARCHAR(100) NOT NULL,
    is_verified BOOLEAN DEFAULT FALSE
);


CREATE TABLE pending_verifications (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    role ENUM('student', 'faculty') NOT NULL,
    college_id VARCHAR(100) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL
);

-- Complaints Table
CREATE TABLE complaints (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    complaint TEXT NOT NULL,
    status ENUM('Pending', 'Resolved') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert Principal Account
INSERT INTO users (username, password, role, email, gender,college_id, is_verified) 
VALUES ('principal', 'scet@123', 'principal', 'principal@scet.ac.in', 'Male','SCET_PRINCIPAL', TRUE);