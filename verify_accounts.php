<?php
session_start();
if (!isset($_SESSION['user_id']) || ($_SESSION['role'] != 'faculty' && $_SESSION['role'] != 'principal')) {
    header('Location: index.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'college_complaint_management_scet');
$role = $_SESSION['role'];

// Fetch unverified accounts based on the role
if ($role == 'principal') {
    $result = $conn->query("SELECT * FROM users WHERE role = 'faculty' AND is_verified = FALSE");
} else if ($role == 'faculty') {
    $result = $conn->query("SELECT * FROM users WHERE role = 'student' AND is_verified = FALSE");
}

// Verify an account
if (isset($_GET['verify_id'])) {
    $verify_id = $_GET['verify_id'];
    $conn->query("UPDATE users SET is_verified = TRUE WHERE id = $verify_id");
    header('Location: verify_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Accounts</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Verify Accounts</h2>
        <div class="account-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='account-card'>";
                    echo "<p><strong>Username:</strong> " . $row['username'] . "</p><br>";
                    echo "<p><strong>Email:</strong> " . $row['email'] . "</p><br>";
                    echo "<p><strong>College ID:</strong> " . $row['college_id'] . "</p><br>";
                    echo "<a href='verify_accounts.php?verify_id=" . $row['id'] . "' class='btn-primary'>Verify</a><br>";
                    echo "</div>";
                }
            } else {
                echo "<p>No accounts to verify.</p>";
            }
            ?>
        </div>
        <br>
        <div class="dashboard-links">
            <?php
                if ($role == 'principal') {
                    echo "<a href='principal_dashboard.php' class='btn-primary'>Back to Dashboard</a>";
                } else if ($role == 'faculty') {
                    echo "<a href='faculty_dashboard.php' class='btn-primary'>Back to Dashboard</a>";
                }
            ?>
        </div>
    </div>
</body>
</html>
