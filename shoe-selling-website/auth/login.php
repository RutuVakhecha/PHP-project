<?php
require_once '../config/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists 
    $query = "SELECT * FROM users WHERE email = :email"; //: useed for placeholder email variable after replace with actual value
    $stmt = $conn->prepare($query);           
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC); //Php Data Objects

    if ($user && password_verify($password, $user['password'])) {
        // User authenticated, set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username']; // Store username for display
        header("Location: ../index.php"); // Redirect to homepage after login
        exit;
    } else {
        // Invalid credentials, set error message
        $_SESSION['error'] = "Invalid email or password!";
        header("Location: login.php"); // Redirect to login page to display error
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Login - Shoes Store</h1>
        </div>
    </header>

    <section class="auth-section">
        <div class="container">
            <h2>Login to Your Account</h2>
            <?php if (isset($_SESSION['error'])): ?>
                <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
            <?php endif; ?>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit" class="button">Login</button>
            </form>
            <p>Don't have an account? <a href="register.php">Register here</a>.</p>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Shoe Store. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
