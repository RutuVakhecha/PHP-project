<?php
require_once '../config/db.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the product exists
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        // Delete the product from the database
        $query = "DELETE FROM products WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            // Optionally, delete the product image from the server
            $image_path = "../assets/images/" . $product['image'];
            if (file_exists($image_path)) {
                unlink($image_path);//delete a file
            }
            $_SESSION['success'] = "Product deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete product!";
        }
    } else {
        $_SESSION['error'] = "Product not found!";
    }
} else {
    $_SESSION['error'] = "No product ID provided!";
}

header("Location: manage_products.php");
exit;
