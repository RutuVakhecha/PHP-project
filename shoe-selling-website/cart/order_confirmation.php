<?php
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Customer';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="../assets/css/frontend.css">
</head>
<body>
    <h1>Thank you for your purchase, <?php echo $name; ?>!</h1>
    <p>Your order has been placed successfully.</p>
    <p>We will ship your products to the provided address soon.</p>
</body>
</html>
