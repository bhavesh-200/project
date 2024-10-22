<?php
// Retrieve the value of the cookie named "bhavesh"
$cookieValue = isset($_COOKIE['bhavesh']) ? htmlspecialchars($_COOKIE['bhavesh']) : "Cookie 'bhavesh' is not set.";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Cookie Example</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Retrieve Cookie Example</h1>
        
        <p><?php echo $cookieValue; ?></p>
    </div>
</body>
</html>
