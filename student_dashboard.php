<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'student') {
    header('Location: index.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'college_complaint_management_scet');
$student_id = $_SESSION['user_id'];

// Fetch student's complaints
$result = $conn->query("SELECT * FROM complaints WHERE student_id = $student_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, Student</h2>
        <div class="dashboard-links">
            <a href="submit_complaint.php" class="btn-primary">File a Complaint</a>
            <a href="profile.php" class="btn-secondary">Profile</a>
        </div>
        <br>            
        <h3>Your Complaints</h3>
        <div class="complaint-list">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="complaint-card">
                    <p><?php echo $row['complaint']; ?></p>
                    <p><strong>Status:</strong> <span class="<?php echo $row['status'] == 'Resolved' ? 'status-resolved' : 'status-pending'; ?>"><?php echo $row['status']; ?></span></p>
                </div>
            <?php } ?>
        </div>
        <div class="dashboard-links">
            <a href="logout.php" class="btn btn-secondary">Logout</a>
        </div>
    </div>
</body>
</html>
