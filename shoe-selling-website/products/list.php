<?php
require_once '../config/db.php';
$query = "SELECT * FROM products";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="assets/css/frontend.css">

</head>
<style>
.products-grid{
	display:inline-block;
}
.product-card{
 display:inline-block;
 text-align:center;
 margin-left:60px;
 font-size:20px;
}
</style>
<body>
    <header>
        <div class="container">
            <h1>Shoe Store</h1>
            <nav class="links">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../cart/view_cart.php">Cart</a></li>
                    <li><a href="../auth/login.php">Login</a></li>
					<li><a href="../admin/contact.php">Contact us</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <section class="products-section">
        <div class="container">
            <h2>All Shoes</h2>
            <div class="products-grid">
                <?php foreach ($products as $product): ?>
                    <div class="product-card">
                        <img src="../assets/images/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                        <h3><?php echo $product['name']; ?></h3>
                        <p>$<?php echo $product['price']; ?></p>
                        <a href="details.php?id=<?php echo $product['id']; ?>" class="button">View Details</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Shoe Store. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
