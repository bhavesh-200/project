<?php
// Set a cookie named "bhavesh" with a value of "Hello, Bhavesh!" for 1 hour
setcookie("bhavesh", "Hello, Bhavesh!", time() + 3600, "/");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Cookie</title>
</head>
<body>
    <h1>Cookie Set!</h1>
    <p>The cookie 'bhavesh' has been set. <a href="index.php">Click here to retrieve the cookie value.</a></p>
</body>
</html>
