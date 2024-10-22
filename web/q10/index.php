<?php
$uploadDir = 'uploads/';
$uploadMessage = "";
$downloadLinks = [];

// Create the uploads directory if it doesn't exist
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Validate the upload
    if ($file['error'] === UPLOAD_ERR_OK) {
        $tmpName = $file['tmp_name'];
        $fileName = basename($file['name']);
        $uploadFilePath = $uploadDir . $fileName;

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($tmpName, $uploadFilePath)) {
            $uploadMessage = "File uploaded successfully: " . htmlspecialchars($fileName);
        } else {
            $uploadMessage = "Error uploading file.";
        }
    } else {
        $uploadMessage = "Error: " . $file['error'];
    }
}

// Get list of uploaded files for download
if ($handle = opendir($uploadDir)) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            $downloadLinks[] = $entry;
        }
    }
    closedir($handle);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload and Download</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>File Upload and Download</h1>
        
        <form action="index.php" method="post" enctype="multipart/form-data">
            <label for="file">Choose a file to upload:</label>
            <input type="file" id="file" name="file" required>
            <button type="submit">Upload File</button>
        </form>

        <?php if (!empty($uploadMessage)): ?>
            <p class="message"><?php echo $uploadMessage; ?></p>
        <?php endif; ?>

        <h2>Download Files</h2>
        <ul>
            <?php foreach ($downloadLinks as $file): ?>
                <li>
                    <a href="<?php echo $uploadDir . htmlspecialchars($file); ?>" download><?php echo htmlspecialchars($file); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
