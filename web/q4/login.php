<?php
// Hardcoded credentials (for demonstration purposes)
$valid_username = "user";
$valid_password = "password";

$error_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate inputs
    if (empty($username) || empty($password)) {
        $error_message = "Username and password are required.";
    } elseif ($username !== $valid_username || $password !== $valid_password) {
        $error_message = "Invalid username or password.";
    } else {
        // Successful login
        echo "<div style='text-align:center; margin-top: 20px;'>";
        echo "<h1>Login Successful</h1>";
        echo "<p>Welcome, " . htmlspecialchars($username) . "!</p>";
        echo "</div>";
        exit();
    }
}
?>

<!-- Display login form with error message if applicable -->
<div class="container">
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
        
        <?php if (!empty($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <button type="submit">Login</button>
    </form>
</div>
