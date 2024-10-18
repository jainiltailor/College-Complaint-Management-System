<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'college_complaint_management_scet');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $college_id = $_POST['college_id'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, email, gender,college_id, role, is_verified) VALUES (?, ?, ?, ?, ?, FALSE)");
    $stmt->bind_param("sssss", $username, $password, $email, $gender, $college_id, $role);
    
    if ($stmt->execute()) {
        // Redirect to a waiting-for-verification page
        header('Location: waiting_verification.php');
    } else {
        echo "Error signing up.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Signup</h2>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>

            <label for="gender">Gender:</label>
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br><br>

            <label for="role">Role:</label>
            <select name="role" required>
                <option value="student">Student</option>
                <option value="faculty">Faculty</option>
            </select><br><br>

            <label for="college_id">College ID:</label>
            <input type="text" name="college_id" required><br><br>

            <button type="submit">Signup</button>
        </form>
    </div>
</body>
</html>
