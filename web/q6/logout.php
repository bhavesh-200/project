<?php
session_start(); // Start the session
session_destroy(); // Destroy the session
setcookie("rollno", "", time() - 3600, "/"); // Delete the cookie
header("Location: login.php"); // Redirect to login page
exit();
?>
