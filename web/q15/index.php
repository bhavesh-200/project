<?php
session_start();

// Sample products
$products = [
    ['id' => 1, 'name' => 'Product 1', 'price' => 10],
    ['id' => 2, 'name' => 'Product 2', 'price' => 15],
    ['id' => 3, 'name' => 'Product 3', 'price' => 20],
];

// Handle adding to cart
if (isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $product = array_filter($products, fn($p) => $p['id'] == $productId);
    if ($product) {
        $_SESSION['cart'][] = array_shift($product); // Add product to cart
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Product List</h1>
        <ul>
            <?php foreach ($products as $product): ?>
                <li>
                    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                    <p>Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                    <form method="post">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="cart.php">View Cart</a>
    </div>
</body>
</html>
