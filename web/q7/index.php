<?php
$result = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $value = $_POST['value'];

    // Validate input
    if (is_numeric($value)) {
        $value = floatval($value);
        
        // Compute results
        $sum = $value + 10;
        $subtraction = $value - 10;
        $multiplication = $value * 10;
        $division = $value != 0 ? $value / 10 : "Undefined (division by zero)";
        $exponent = pow($value, 2); // Exponentiation (squaring the value)

        // Prepare results
        $result = "
            <h3>Results:</h3>
            <p>Sum (value + 10): $sum</p>
            <p>Subtraction (value - 10): $subtraction</p>
            <p>Multiplication (value * 10): $multiplication</p>
            <p>Division (value / 10): $division</p>
            <p>Exponent (value^2): $exponent</p>
        ";
    } else {
        $error_message = "Please enter a valid numeric value.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compute Operations</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Compute Operations</h1>
        <form action="index.php" method="post">
            <label for="value">Enter a numeric value:</label>
            <input type="text" id="value" name="value" required>

            <button type="submit">Compute</button>
        </form>
        
        <?php if (!empty($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        
        <?php if (!empty($result)): ?>
            <div class="results">
                <?php echo $result; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
