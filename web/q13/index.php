<?php
// Set a cookie named "username" with the value "ZSP College" and expiration time of one hour
setcookie("username", "ZSP College", time() + 3600, "/"); // 3600 seconds = 1 hour

// Check if the cookie is set
$cookieMessage = "";
if (isset($_COOKIE['username'])) {
    $cookieMessage = "Cookie 'username' is set to: " . htmlspecialchars($_COOKIE['username']);
} else {
    $cookieMessage = "Cookie 'username' is not set.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Cookie Example</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Set Cookie Example</h1>
        
        <p><?php echo $cookieMessage; ?></p>
    </div>
</body>
</html>
