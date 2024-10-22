<?php
session_start();

// Set the timeout duration (in seconds)
$timeout_duration = 1800; // 30 minutes

// Check if the user is logged in
if (isset($_SESSION['LAST_ACTIVITY'])) {
    // Calculate the session's lifespan
    if (time() - $_SESSION['LAST_ACTIVITY'] > $timeout_duration) {
        // Session timed out
        session_unset(); // Unset $_SESSION variables
        session_destroy(); // Destroy session
        $message = "Session timed out due to inactivity. Please log in again.";
    } else {
        // Update the last activity time
        $_SESSION['LAST_ACTIVITY'] = time();
    }
} else {
    // Initialize the session variable
    $_SESSION['LAST_ACTIVITY'] = time();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simulate user login
    $_SESSION['USER_LOGGED_IN'] = true;
    $_SESSION['LAST_ACTIVITY'] = time(); // Reset activity time
    $message = "You are now logged in!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Timeout Example</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Session Timeout Example</h1>
        
        <?php if (isset($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>

        <?php if (!isset($_SESSION['USER_LOGGED_IN'])): ?>
            <form action="index.php" method="post">
                <button type="submit">Log In</button>
            </form>
        <?php else: ?>
            <p>Welcome! You are logged in. Activity will timeout after 30 minutes of inactivity.</p>
            <a href="logout.php">Log Out</a>
        <?php endif; ?>
    </div>
</body>
</html>
