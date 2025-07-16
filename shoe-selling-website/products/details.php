<?php
require_once '../config/db.php';
$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = :id"; //used in prepared statement :
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="../assets/css/frontend.css">
</head>
<body>
    <header>
        <div class="container">
	
            <h1>Shoe Store</h1>
            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../cart/view_cart.php">Cart</a></li>
                    <li><a href="../auth/login.php">Login</a></li>
					<li><a href="../admin/contact.php">Contact us</a></li>

                </ul>
            </nav>
        </div>
    </header>

    <section class="product-details">
        <div class="container">
            <div class="product-card">
                <img src="../assets/images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <p class="price">Price: $<?php echo htmlspecialchars($product['price']); ?></p>
                <a href="../cart/add_to_cart.php?id=<?php echo $product['id']; ?>" class="button">Add to Cart</a>
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
