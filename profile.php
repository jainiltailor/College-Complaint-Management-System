<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$conn = new mysqli('localhost', 'root', '', 'college_complaint_management_scet');
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];

// Fetch user details
$stmt = $conn->prepare("SELECT username, email, gender, role FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $email, $gender, $role);
$stmt->fetch();
$stmt->close();

// Fetch complaint stats
$total_complaints = $conn->query("SELECT COUNT(*) AS total FROM complaints WHERE student_id = $user_id")->fetch_assoc()['total'];
$resolved_complaints = $conn->query("SELECT COUNT(*) AS resolved FROM complaints WHERE student_id = $user_id AND status = 'Resolved'")->fetch_assoc()['resolved'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Profile</h2>
        <p><strong>Username:</strong> <?php echo $username; ?></p><br>
        <p><strong>Email:</strong> <?php echo $email; ?></p><br>
        <p><strong>Gender:</strong> <?php echo $gender; ?></p><br>
        <p><strong>Role:</strong> <?php echo ucfirst($role); ?></p><br>
        <p><strong>Total Complaints Filed:</strong> <?php echo $total_complaints; ?></p><br>
        <p><strong>Total Complaints Resolved:</strong> <?php echo $resolved_complaints; ?></p><br><br>
        <div class="dashboard-links">
            <?php
                if ($role == 'principal') {
                    echo "<a href='principal_dashboard.php' class='btn-primary'>Back to Dashboard</a>";
                } else if ($role == 'student') {
                    echo "<a href='student_dashboard.php' class='btn-primary'>Back to Dashboard</a>";
                } else if ($role == 'faculty') {
                    echo "<a href='faculty_dashboard.php' class='btn-primary'>Back to Dashboard</a>";
                }

            ?>
        </div>
    </div>
</body>
</html>
