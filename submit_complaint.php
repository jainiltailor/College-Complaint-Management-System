<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header('Location: index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $complaint = $_POST['complaint'];
    $student_id = $_SESSION['user_id'];

    $conn = new mysqli('localhost', 'root', '', 'college_complaint_management_scet');
    $stmt = $conn->prepare("INSERT INTO complaints (student_id, complaint) VALUES (?, ?)");
    $stmt->bind_param("is", $student_id, $complaint);

    if ($stmt->execute()) {
        header('Location: student_dashboard.php');
    } else {
        echo "Error submitting complaint.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Complaint</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>File a Complaint</h2>
        <form method="POST">
            <textarea name="complaint" rows="5" required></textarea><br><br>
            <button type="submit">Submit Complaint</button>
        </form>
    </div>
</body>
</html>
