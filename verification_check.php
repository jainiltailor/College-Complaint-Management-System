<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Check</title>
    <style>
        .alert {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
        }

        .btn-warning {
            background-color: #f0ad4e;
            border: none;
            padding: 10px 20px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .alert-heading {
            font-size: 24px;
        }

        .container{
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="alert alert-warning text-center" style="margin-top: 20px;">
<h4 class="alert-heading">Account Not Verified!</h4>
<p>Your account is pending verification. Please check your email or contact support.</p>
<div class="container">
    <a href="support.php" class="btn btn-warning">Contact Support</a>
    <a href="logout.php" class="btn btn-warning ">Back To Login</a>
</div>
</div>    
</body>
</html>