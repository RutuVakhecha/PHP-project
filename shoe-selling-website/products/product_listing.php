<?php
include '../header.php'; // Include header
require_once '../config/db.php';

// Fetch categories
$categoryQuery = "SELECT * FROM categories";
$categoryStmt = $conn->query($categoryQuery);
$categories = $categoryStmt->fetchAll(PDO::FETCH_ASSOC);

// Filter products by category if selected
$categoryFilter = '';
if (isset($_GET['category_id']) && !empty($_GET['category_id'])) {
    $categoryFilter = "WHERE category_id = :category_id";
}

// Fetch products
$productQuery = "SELECT * FROM products $categoryFilter";
$productStmt = $conn->prepare($productQuery);
if (!empty($categoryFilter)) {
    $productStmt->bindParam(':category_id', $_GET['category_id'], PDO::PARAM_INT);
}
$productStmt->execute();
$products = $productStmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all products as an array

?>
<link rel="stylesheet" href="../assets/css/frontend.css">
<div class="container">
    <h1>Product Listing</h1>

    <!-- Category Filter -->
    <form method="GET" action="product_listing.php">
        <label for="category">Filter by Category:</label>
        <select name="category_id" id="category" onchange="this.form.submit()">
            <option value="">All Categories</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo htmlspecialchars($category['id']); ?>" <?php if (isset($_GET['category_id']) && $_GET['category_id'] == $category['id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($category['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <!-- Product Grid -->
    <div class="product-grid">
        <?php if (count($products) > 0): ?>  <!-- Now counting the array of products -->
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="../assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
                    <div class="product-info">
                        <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                        <p><?php echo htmlspecialchars(substr($product['description'], 0, 100)); ?>...</p>
                        <p class="price">$<?php echo htmlspecialchars($product['price']); ?></p>
                        <a href="details.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="button">View Details</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No products found in this category.</p>
        <?php endif; ?>
    </div>
</div>
