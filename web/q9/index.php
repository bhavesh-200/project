<?php
$table = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $number = $_POST['number'];

    // Validate input
    if (is_numeric($number)) {
        $number = intval($number);
        $table .= "<h3>Multiplication Table of $number</h3><ul>";
        for ($i = 1; $i <= 10; $i++) {
            $table .= "<li>$number x $i = " . ($number * $i) . "</li>";
        }
        $table .= "</ul>";
    } else {
        $error_message = "Please enter a valid number.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table Generator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Multiplication Table Generator</h1>
        <form action="index.php" method="post">
            <label for="number">Enter a number:</label>
            <input type="number" id="number" name="number" required>

            <button type="submit">Generate Table</button>
        </form>

        <?php if (!empty($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <?php if (!empty($table)): ?>
            <div class="results">
                <?php echo $table; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
