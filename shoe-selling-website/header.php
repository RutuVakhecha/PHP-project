<?php // Check if a session is already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<style>

</style>
<header>
    <div class="container">
        <h1 style="font-size:40px;">Shoes Store</h1>
        <nav>
            <ul>
                <li><a href="/shoe-selling-website">Home</a></li>
                <li><a href="/shoe-selling-website/products/product_listing.php">Products</a></li>
                <li><a href="/shoe-selling-website/cart/view_cart.php">Cart</a></li>
                <!-- Display username if user is logged in -->
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                    <li><a href="/shoe-selling-website/auth/logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="/shoe-selling-website/auth/login.php">Login</a></li>
                <?php endif; ?>
					<li><a href="/shoe-selling-website/admin/contact.php">Contact us</a></li>
                    <li><a href="/shoe-selling-website/products/aboutus.php">About us</a></li>
                    <li><a href="/shoe-selling-website/admin/dashboard.php">Dashboard</a></li>
            </ul>
        </nav>
    </div>
</header>