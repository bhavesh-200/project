<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['rollno'])) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Get the roll number from the session
$rollno = $_SESSION['rollno'];

// Check if the cookie is set
$cookie_rollno = isset($_COOKIE['rollno']) ? $_COOKIE['rollno'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($rollno); ?>!</h1>
        <p>You are logged in.</p>
        <form action="logout.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </div>
</body>
</html>
