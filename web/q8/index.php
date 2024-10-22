<?php
$result = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shape = $_POST['shape'];

    switch ($shape) {
        case 'circle':
            $radius = $_POST['radius'];
            if (is_numeric($radius) && $radius > 0) {
                $area = pi() * pow($radius, 2);
                $result = "Area of Circle: " . number_format($area, 2);
            } else {
                $error_message = "Please enter a valid radius.";
            }
            break;

        case 'rectangle':
            $length = $_POST['length'];
            $width = $_POST['width'];
            if (is_numeric($length) && $length > 0 && is_numeric($width) && $width > 0) {
                $area = $length * $width;
                $result = "Area of Rectangle: " . number_format($area, 2);
            } else {
                $error_message = "Please enter valid dimensions.";
            }
            break;

        case 'triangle':
            $base = $_POST['base'];
            $height = $_POST['height'];
            if (is_numeric($base) && $base > 0 && is_numeric($height) && $height > 0) {
                $area = 0.5 * $base * $height;
                $result = "Area of Triangle: " . number_format($area, 2);
            } else {
                $error_message = "Please enter valid dimensions.";
            }
            break;

        case 'square':
            $side = $_POST['side'];
            if (is_numeric($side) && $side > 0) {
                $area = pow($side, 2);
                $result = "Area of Square: " . number_format($area, 2);
            } else {
                $error_message = "Please enter a valid side length.";
            }
            break;

        case 'trapezoid':
            $base1 = $_POST['base1'];
            $base2 = $_POST['base2'];
            $height = $_POST['height_trapezoid'];
            if (is_numeric($base1) && $base1 > 0 && is_numeric($base2) && $base2 > 0 && is_numeric($height) && $height > 0) {
                $area = 0.5 * ($base1 + $base2) * $height;
                $result = "Area of Trapezoid: " . number_format($area, 2);
            } else {
                $error_message = "Please enter valid dimensions.";
            }
            break;

        case 'parallelogram':
            $base = $_POST['base_parallelogram'];
            $height = $_POST['height_parallelogram'];
            if (is_numeric($base) && $base > 0 && is_numeric($height) && $height > 0) {
                $area = $base * $height;
                $result = "Area of Parallelogram: " . number_format($area, 2);
            } else {
                $error_message = "Please enter valid dimensions.";
            }
            break;

        default:
            $error_message = "Please select a shape.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area Calculator</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Area Calculator</h1>
        <form action="index.php" method="post">
            <label for="shape">Select a Shape:</label>
            <select id="shape" name="shape" onchange="toggleInputs(this.value)">
                <option value="">--Select--</option>
                <option value="circle">Circle</option>
                <option value="rectangle">Rectangle</option>
                <option value="triangle">Triangle</option>
                <option value="square">Square</option>
                <option value="trapezoid">Trapezoid</option>
                <option value="parallelogram">Parallelogram</option>
            </select>

            <div id="circleInputs" class="shape-inputs" style="display: none;">
                <label for="radius">Radius:</label>
                <input type="number" id="radius" name="radius" step="0.01" min="0">
            </div>

            <div id="rectangleInputs" class="shape-inputs" style="display: none;">
                <label for="length">Length:</label>
                <input type="number" id="length" name="length" step="0.01" min="0">
                <label for="width">Width:</label>
                <input type="number" id="width" name="width" step="0.01" min="0">
            </div>

            <div id="triangleInputs" class="shape-inputs" style="display: none;">
                <label for="base">Base:</label>
                <input type="number" id="base" name="base" step="0.01" min="0">
                <label for="height">Height:</label>
                <input type="number" id="height" name="height" step="0.01" min="0">
            </div>

            <div id="squareInputs" class="shape-inputs" style="display: none;">
                <label for="side">Side:</label>
                <input type="number" id="side" name="side" step="0.01" min="0">
            </div>

            <div id="trapezoidInputs" class="shape-inputs" style="display: none;">
                <label for="base1">Base 1:</label>
                <input type="number" id="base1" name="base1" step="0.01" min="0">
                <label for="base2">Base 2:</label>
                <input type="number" id="base2" name="base2" step="0.01" min="0">
                <label for="height_trapezoid">Height:</label>
                <input type="number" id="height_trapezoid" name="height_trapezoid" step="0.01" min="0">
            </div>

            <div id="parallelogramInputs" class="shape-inputs" style="display: none;">
                <label for="base_parallelogram">Base:</label>
                <input type="number" id="base_parallelogram" name="base_parallelogram" step="0.01" min="0">
                <label for="height_parallelogram">Height:</label>
                <input type="number" id="height_parallelogram" name="height_parallelogram" step="0.01" min="0">
            </div>

            <button type="submit">Calculate Area</button>
        </form>

        <?php if (!empty($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>

        <?php if (!empty($result)): ?>
            <div class="results">
                <h3><?php echo $result; ?></h3>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function toggleInputs(shape) {
            const inputs = document.querySelectorAll('.shape-inputs');
            inputs.forEach(input => input.style.display = 'none');
            if (shape) {
                document.getElementById(shape + 'Inputs').style.display = 'block';
            }
        }
    </script>
</body>
</html>