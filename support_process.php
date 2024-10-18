<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $issue = $_POST['issue'];

    // Process the data (store in the database, send an email to support, etc.)
    // For now, just display a success message
    echo '
    <div class="alert alert-success text-center mt-4">
        <strong>Success!</strong> Your issue has been submitted. We will get back to you soon.
    </div>';
}
?>
