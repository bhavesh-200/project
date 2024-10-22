<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Shopping Cart</h1>
        
        <?php if (empty($_SESSION['cart'])): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <ul>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <li>
                        <h2><?php echo htmlspecialchars($item['name']); ?></h2>
                        <p>Price: $<?php echo htmlspecialchars($item['price']); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
            <p>Total items: <?php echo count($_SESSION['cart']); ?></p>
        <?php endif; ?>
        
        <a href="index.php">Continue Shopping</a>
    </div>
</body>
</html>
