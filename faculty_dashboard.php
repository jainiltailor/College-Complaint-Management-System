<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'faculty') {
    header('Location: index.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'college_complaint_management_scet');

// Fetch all student complaints
$result = $conn->query("SELECT complaints.*, users.username FROM complaints JOIN users ON complaints.student_id = users.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, Faculty</h2>
        <div class="dashboard-links">
            <a href="verify_accounts.php" class="btn-primary">Verify Accounts</a>
            <a href="profile.php" class="btn-secondary">Profile</a>
        </div>
        <br>
        <h3>Student Complaints</h3>
        <div class="complaint-list">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="complaint-card">
                    <p><strong><?php echo $row['username']; ?>:</strong> <?php echo $row['complaint']; ?></p>
                    <p><strong>Status:</strong> <span class="<?php echo $row['status'] == 'Resolved' ? 'status-resolved' : 'status-pending'; ?>"><?php echo $row['status']; ?></span></p>
                    <?php if ($row['status'] == 'Pending') { ?>
                        <a href="resolve_complaint.php?id=<?php echo $row['id']; ?>" class="btn-resolve">Mark as Resolved</a>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <br>
        <div class="dashboard-links">
            <a href="logout.php" class="btn btn-secondary">Logout</a>
        </div>
    </div>
</body>
</html>
