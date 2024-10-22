<?php
session_start();
session_unset(); // Unset $_SESSION variables
session_destroy(); // Destroy session
header("Location: index.php");
exit();
