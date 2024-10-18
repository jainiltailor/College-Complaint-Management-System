<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'college_complaint_management_scet');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for user
    $stmt = $conn->prepare("SELECT id, role, is_verified FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $role, $is_verified);
        $stmt->fetch();

        if ($is_verified) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role;

            if ($role == 'student') {
                header('Location: student_dashboard.php');
            } elseif ($role == 'faculty') {
                header('Location: faculty_dashboard.php');
            } elseif ($role == 'principal') {
                header('Location: principal_dashboard.php');
            }
            exit();
        } 
        else {
            header('Location: verification_check.php');
        }
    } else {
        echo "Invalid credentials!";
    }
}
?>


