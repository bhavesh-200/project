<?php
session_start();

// Define maximum concurrent sessions
define('MAX_SESSIONS', 3);

// Initialize sessions array if not already set
if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = null;
}

// Create a placeholder for active sessions
if (!isset($_SESSION['active_sessions'])) {
    $_SESSION['active_sessions'] = [];
}

// Check for session management
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
    $username = trim($_POST['username']);
    
    // Add new session if user is logged in
    if (!empty($username)) {
        if (!in_array($username, $_SESSION['active_sessions'])) {
            // Check if the maximum session limit has been reached
            if (count($_SESSION['active_sessions']) < MAX_SESSIONS) {
                $_SESSION['active_sessions'][] = $username;
                $_SESSION['username'] = $username;
                $message = "Welcome, $username! You are now logged in.";
            } else {
                $message = "Maximum concurrent sessions reached. Please log out from another session.";
            }
        } else {
            $message = "You are already logged in!";
        }
    }
}

// Logout logic
if (isset($_GET['logout'])) {
    $key = array_search($_SESSION['username'], $_SESSION['active_sessions']);
    if ($key !== false) {
        unset($_SESSION['active_sessions'][$key]);
    }
    $_SESSION['username'] = null;
    $message = "You have been logged out.";
}

// Display active sessions
$activeSessionList = implode(", ", $_SESSION['active_sessions']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concurrent Session Limiter</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Concurrent Session Limiter</h1>
        
        <?php if (isset($message)): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>

        <?php if (empty($_SESSION['username'])): ?>
            <form action="index.php" method="post">
                <label for="username">Enter your username:</label>
                <input type="text" id="username" name="username" required>
                <button type="submit">Log In</button>
            </form>
        <?php else: ?>
            <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
            <p>Active Sessions: <?php echo htmlspecialchars($activeSessionList); ?></p>
            <a href="?logout=true">Log Out</a>
        <?php endif; ?>
    </div>
</body>
</html>
