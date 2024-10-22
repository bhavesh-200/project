<?php
session_start(); // Start the session

// Initialize the page load count
if (!isset($_SESSION['load_count'])) {
    $_SESSION['load_count'] = 0; // Initialize if not set
}

// Increment the load count
$_SESSION['load_count']++;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Load Counter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Our Website!</h1>
        <p>You have loaded this page <?php echo $_SESSION['load_count']; ?> times.</p>
    </div>
</body>
</html>
