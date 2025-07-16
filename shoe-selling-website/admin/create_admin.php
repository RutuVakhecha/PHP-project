<?php
require_once '../config/db.php';

// Create an admin account
$admin_name = "admin";  // Change this to the admin name you want
$admin_email = "admin@example.com";  // Change this to the admin email
$admin_password = "admin";  // Change this to the desired password

// Hash the password
$hashed_password = password_hash($admin_password, PASSWORD_BCRYPT);

// Check if admin already exists
$query = "SELECT * FROM admins WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $admin_email);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "Admin account with this email already exists.";
} else {
    // Insert the admin into the database
    $query = "INSERT INTO admins (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $admin_name);
    $stmt->bindParam(':email', $admin_email);
    $stmt->bindParam(':password', $hashed_password);

    if ($stmt->execute()) {
        echo "Admin account created successfully!";
    } else {
        echo "Failed to create admin account.";
    }
}
?>
