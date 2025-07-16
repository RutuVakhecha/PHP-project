<?php
// delete_user.php
session_start();
require_once '../config/db.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Check if user ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user from the database
    $query = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "User deleted successfully!";
    } else {
        $_SESSION['error'] = "Failed to delete user!";
    }
} else {
    $_SESSION['error'] = "No user ID provided!";
}

header("Location: manage_users.php");
exit;
?>
