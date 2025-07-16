<?php
session_start();
require_once '../config/db.php';

$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = :id";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id', $id);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!isset($_SESSION['cart'])) { //  `$_SESSION` array mein `cart` key set hai ya nhi
    $_SESSION['cart'] = [];
}
$_SESSION['cart'][] = $product;

header('Location: view_cart.php');
?>
