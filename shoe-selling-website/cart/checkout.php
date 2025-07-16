<?php 

session_start();
require_once '../config/db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    // Assuming user ID is stored in session or set it as anonymous for now
    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // Insert each product in the cart into the orders table
    foreach ($_SESSION['cart'] as $item) {
        $productId = $item['id'];
        $quantity = 1; // Set as 1, you can modify it to get dynamic quantity later
        $total = $item['price'];

        // Insert into orders table including shipping information
        $insertOrder = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity, total, order_date, name, address, email) VALUES (?, ?, ?, ?, NOW(), ?, ?, ?)");
        $insertOrder->execute([$userId, $productId, $quantity, $total, $name, $address, $email]);
    }

    // After placing the order, clear the cart
    unset($_SESSION['cart']);
    
    // Redirect to a thank you page
    header("Location: order_confirmation.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../assets/css/frontend.css">
    <style>
        /* Inline CSS for better layout and visual style */
        .checkout-section {
            padding: 50px 0;
            background-color: #f9f9f9;
        }
        .checkout-section h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }
        .checkout-section .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 1.2rem;
            margin-bottom: 8px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .button {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.2rem;
            text-align: center;
            cursor: pointer;
            border: none;
        }
        .button:hover {
            background-color: #0056b3;
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <?php include '../header.php'; // Include header ?>

    <section class="checkout-section">
        <div class="container">
            <h2>Checkout</h2>

            <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <h3>Your Order Summary:</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total = 0;
                        foreach ($_SESSION['cart'] as $item): 
                            $total += $item['price']; // Assuming quantity = 1 for simplicity
                        ?>
                            <tr>
                                <td><?php echo $item['name']; ?></td>
                                <td>$<?php echo $item['price']; ?></td>
                                <td>1</td> <!-- You can add quantity handling later -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p>Total: $<?php echo number_format($total, 2); ?></p> <!-- display cart total amount value decimal format -->

                <form action="checkout.php" method="POST">
                    <h3>Enter your details:</h3>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Shipping Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <button type="submit" class="button">Place Order</button>
                </form>
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
