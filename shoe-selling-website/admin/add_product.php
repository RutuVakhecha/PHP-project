<?php
require_once '../config/db.php';
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch categories
$categoryQuery = "SELECT * FROM categories";
$stmt = $conn->prepare($categoryQuery);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle product submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $image = $_FILES['image']['name'];

    // Upload image
    $image_target = "../assets/images/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $image_target);

    // Insert product
    $query = "INSERT INTO products (name, description, price, category_id, image) VALUES (:name, :description, :price, :category_id, :image)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->bindParam(':image', $image);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Product added successfully!";
        header("Location: manage_products.php");
        exit;
    } else {
        $_SESSION['error'] = "Failed to add product!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
/* admin.css */

/* General styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 30px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Headings */
h2 {
    color: #333;
}

/* Form styles */
form {
    display: flex;
    flex-direction: column;
}

.form-group {
    margin-bottom: 15px;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="number"],
input[type="email"],
textarea,
select {
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    transition: border-color 0.3s;
}

input[type="text"]:focus,
input[type="number"]:focus,
input[type="email"]:focus,
textarea:focus,
select:focus {
    border-color: #007bff;
    outline: none;
}

/* Button styles */
.button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: #0056b3;
}

/* Success and error messages */
.success, .error {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.error {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

/* Image preview styles */
.form-group img {
    margin-top: 10px;
    max-width: 100px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>

<body>
    <?php include 'admin_header.php'; ?>

    <div class="container">
        <h2>Add New Product</h2>

        <?php if (isset($_SESSION['success'])):  //when product is add?> 
            <div class="success"><?php echo $_SESSION['success'];
                                    unset($_SESSION['success']); ?></div>
        <?php elseif (isset($_SESSION['error'])): ?>
            <div class="error"><?php echo $_SESSION['error'];
                                unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="description">Product Description</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category_id" required>
                    <option value="">Select Category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" id="image" name="image" required>
            </div>
            <button type="submit" class="button">Add Product</button>
        </form>
    </div>
</body>

</html>