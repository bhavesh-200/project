<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data
    $inputSentence = trim($_POST['inputSentence']);

    // Count words in the input
    if (!empty($inputSentence)) {
        $wordCount = str_word_count($inputSentence);
    } else {
        $wordCount = 0;
    }

    // Display the result
    echo "<div style='text-align:center; margin-top: 20px;'>";
    echo "<h1>Word Count Result</h1>";
    echo "<p>You entered: <strong>" . htmlspecialchars($inputSentence) . "</strong></p>";
    echo "<p>Number of words: <strong>" . $wordCount . "</strong></p>";
    echo "<a href='index.html'>Go Back</a>";
    echo "</div>";
} else {
    echo "Invalid request.";
}
?>
