<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate input
    $errors = [];

    // Check if all fields are filled
    foreach ($_POST as $key => $value) {
        if (empty($value) && $key !== 'hobbies') {
            $errors[] = "All fields must be filled.";
            break;
        }
    }

    // Validate password length
    if (strlen($_POST['password']) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }

    // Validate password match
    if ($_POST['password'] !== $_POST['retype_password']) {
        $errors[] = "Passwords do not match.";
    }

    // Validate mobile number
    if (!preg_match('/^\d{10}$/', $_POST['mobile'])) {
        $errors[] = "Mobile number must be 10 digits.";
    }

    // Validate hobbies
    if (empty($_POST['hobbies'])) {
        $errors[] = "At least one hobby must be selected.";
    }

    // Validate city selection
    if ($_POST['city'] === "") {
        $errors[] = "City must be selected.";
    }

    // Display errors or user data
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        echo "<a href='index.html'>Go Back</a>";
    } else {
        // Display user data
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Hobbies</th>
                    <th>City</th>
                </tr>
                <tr>
                    <td>" . htmlspecialchars($_POST['name']) . "</td>
                    <td>" . htmlspecialchars($_POST['email']) . "</td>
                    <td>" . htmlspecialchars($_POST['mobile']) . "</td>
                    <td>" . implode(", ", $_POST['hobbies']) . "</td>
                    <td>" . htmlspecialchars($_POST['city']) . "</td>
                </tr>
              </table>";
    }
} else {
    echo "Invalid request.";
}
?>
