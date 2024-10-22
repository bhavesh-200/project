<?php
session_start(); // Start the session

// Check if the user is already logged in
if (isset($_SESSION['rollno'])) {
    header("Location: welcome.php");
    exit();
}

$error_message = "";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $rollno = trim($_POST['rollno']);
    $password = trim($_POST['password']);

    // Validate login credentials
    if ($rollno === "8126" && $password === "123456") {
        $_SESSION['rollno'] = $rollno; // Set session variable
        // Set a cookie for the roll number (expires in 1 day)
        setcookie("rollno", $rollno, time() + (86400), "/");
        header("Location: welcome.php"); // Redirect to welcome page
        exit();
    } else {
        $error_message = "Invalid roll number or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="rollno">Roll Number:</label>
            <input type="text" id="rollno" name="rollno" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <?php if (!empty($error_message)): ?>
                <p class="error"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
