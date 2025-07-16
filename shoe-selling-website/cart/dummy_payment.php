<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // You can capture user details here if needed.
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];

    // Clear the cart
    unset($_SESSION['cart']);

    // Redirect to a thank-you page or show a confirmation message
    header("Location: order_confirmation.php?name=$name");
}
?>
