<?php
session_start();

// Check if the cart exists in the session
if (isset($_SESSION['cart'])) {
    // Get the product ID from the URL
    $id = $_GET['id'];

    // Loop through the cart items
    foreach ($_SESSION['cart'] as $key => $item) { //array $item ndex stored in $key var
        // Check if the current item's ID matches the one to be removed
        if ($item['id'] == $id) {
            // Remove the item from the cart
            unset($_SESSION['cart'][$key]);
            // Optional: Re-index the cart array
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break; // Exit the loop after removal
        }
    }
}

// Redirect back to the cart page
header('Location: view_cart.php');
exit;
?>
