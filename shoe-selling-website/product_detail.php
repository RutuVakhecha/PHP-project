<?php
require_once 'config/db.php'; // Ensure to include your database connection


// Get the product ID from the URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch product details from the database
$query = "SELECT * FROM products WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if product exists
if (!$product) {
    echo "<h1>Product not found</h1>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="assets/css/frontend.css">
</head>
<body>
    <header>
        <h1>Shoe Store</h1>
    </header>

    <main>
        <div class="product-detail">
            <img src="assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image-detail">
            <div class="product-info-detail">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p class="description"><?php echo htmlspecialchars($product['description']); ?></p>
                <p class="price">₹<?php echo htmlspecialchars($product['price']); ?></p>
                <a href="index.php" class="button">Back to Products</a>
            </div>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Shoe Store. All Rights Reserved.</p>
    </footer>
</body>
</html>
