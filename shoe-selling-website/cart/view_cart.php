<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="../assets/css/frontend.css">
</head>
<body>
<?php
    include '../header.php'; // Include header file
    ?>

    <section class="cart-section">
        <div class="container">
            <h2>Your Cart</h2>
            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['name']); ?></td>
                                <td>$<?php echo htmlspecialchars($item['price']); ?></td>
                                <td><a href="remove_from_cart.php?id=<?php echo $item['id']; ?>" class="button">Remove</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="cart-actions">
                    <a href="checkout.php" class="button">Proceed to Checkout</a>
                </div>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Shoe Store. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
