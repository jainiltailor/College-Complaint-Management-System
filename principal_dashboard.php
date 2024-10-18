<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'principal') {
    header('Location: index.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'college_complaint_management_scet');

// Fetch faculty complaints
$result = $conn->query("SELECT complaints.*, users.username FROM complaints JOIN users ON complaints.student_id = users.id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, Principal</h2>
        <div class="dashboard-links">
            <a href="verify_accounts.php" class="btn-primary">Verify Faculty Accounts</a>
            <a href="profile.php" class="btn-secondary">Profile</a>
        </div>
        <br><br>
        <h3>All Complaints</h3>
        <div class="complaint-list">
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="complaint-card">
                    <p><strong><?php echo $row['username']; ?>:</strong> <?php echo $row['complaint']; ?></p>
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
