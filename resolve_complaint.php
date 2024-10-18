<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'faculty') {
    header('Location: index.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'college_complaint_management_scet');
$complaint_id = $_GET['id'];

// Mark complaint as resolved
$conn->query("UPDATE complaints SET status = 'Resolved' WHERE id = $complaint_id");
header('Location: faculty_dashboard.php');
?>
