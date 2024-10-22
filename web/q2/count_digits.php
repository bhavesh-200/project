<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data
    $inputData = $_POST['inputData'];

    // Count digits in the input
    preg_match_all('/\d/', $inputData, $matches);
    $digitCount = count($matches[0]);

    // Display the result
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<h1>Digit Count Result</h1>";
    echo "<p>You entered: <strong>" . htmlspecialchars($inputData) . "</strong></p>";
    echo "<p>Number of digits: <strong>" . $digitCount . "</strong></p>";
    echo "<a href='index.html'>Go Back</a>";
    echo "</div>";
} else {
    echo "Invalid request.";
}
?>
