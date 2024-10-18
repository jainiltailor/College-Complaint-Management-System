<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
    <!-- Add Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding: 20px;
            background-color: #f4f6f9;
        }
        .container {
            max-width: 600px;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="text-center">Pending Verifications</h2>
            <div class="alert alert-info">Please wait while we verify your account details.</div>
            <!-- Use a styled button -->
            <button class="btn btn-custom w-100">Check Status</button>
            <br>
            <div class="dashboard-links" align="right">
                <a href="logout.php" class="btn btn-secondary">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>