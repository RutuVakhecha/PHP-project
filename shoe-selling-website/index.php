<?php
require_once 'config/db.php'; // Ensure to include your database connection

// Fetch products from the database
$query = "SELECT * FROM products";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Store </title>
    <link rel="stylesheet" href="assets/css/frontend.css">
    <!-- Slick Slider CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <!-- Slick Slider Theme (optional) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

    <!-- jQuery (required for Slick Slider) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>


</head>
<style>
.mySlides {display:none; padding-top:30px; height:500px;}
.display-left{color:rgb(244, 244, 244); border:none}
.display-right{color:rgb(244, 244, 244); border:none}
</style>
<body>
    
    <?php
    include 'header.php'; // Include header filezz
    ?>
<div class="container" >
  <img class="mySlides" src="assets/images/shoes2.jpg" style="width:100%; " >
  <img class="mySlides" src="assets/images/shoes3.jpg" style="width:100%">
  <img class="mySlides" src="assets/images/shoes4.jpg" style="width:100%">
 
  <button class="display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);
var interval = setInterval(function() { plusDivs(1); }, 3000); // Change slide every 3 seconds

function plusDivs(n) {
  showDivs(slideIndex += n);
  resetInterval(); // Reset interval on manual control
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}

function resetInterval() {
  clearInterval(interval);
  interval = setInterval(function() { plusDivs(1); }, 3000);
}
</script>
    <!-- Product Slider -->
    <section class="product-slider">
        <div class="container">
            <h2>Featured Products</h2>
            <div class="slider">
                <?php
                foreach ($products as $product) {
                    echo '<div class="slider-item">';
                    echo '<img src="assets/images/' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '">';
                    echo '<h3>' . htmlspecialchars($product['name']) . '</h3>';
                    echo '<p>Price: $' . htmlspecialchars($product['price']) . '</p>';
                    echo '<a href="products/details.php?id=' . $product['id'] . '" class="button">More Details</a>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </section>

    <div class='main-class' style="padding-top:60px;">
       
        <b><a href="products/product_listing.php" class='offer'>Shop All Our New Markdowns </a></b>
    </div>
    <div class='container'>
        <a href="products/product_listing.php">
            <img src='assets/images/just do it.png' alt='just do it' class='just'></img>


            <b><a href="products/product_listing.php" class='nike-41'>Nike Pegasus 41</a></b>
            <p><a href="products/product_listing.php" class='waste'>DON'T WASTE YOUR ENERGY</a></p>
            <a href="products/product_listing.php" class='nike-42'>Run in Pegasus. Feel the responsive energy return of Air Zoom and all-new ReactX foam.</a>

            <a href='products/product_listing.php'>
                <div class='main-button'>
                    <button class='shop-button'><b>Shop</b></button>
                </div>
            </a>
            <p class='new'>Newest of the Season</p>
    </div>

    <div class='container'>
       
        <p class='dont-miss'>Don't Miss</p>
        <img src='assets/images/jordan.jpg' alt="jordan" class='jordan-img'></img>
        <p><a href='matching-sets-jordan' class='jordan-sports'>JORDAN SPORT</a></p>
        <a href='Nike-Landing-Page-main/sports_shoes.php' class='nike-42'>Rooted in basketball, influenced by street culture. Jazz Chisholm and Guard Rhyne Howard stunt in elevated pieces</a>
        <a href='Nike-Landing-Page-main/sports_shoes.php' class='nike-43'>designed to complement performance and style.</a>
        <div class='main-button'>
        <a href="Nike-Landing-Page-main/sports_shoes.php">
            <button class='shop-button'><b>Shop</b></button>
            </a>
        </div>
    </div>
    <div class='slider-warapper2'>
        <p class='classics'>Classics Spotlight</p>

        <div class='image-list2'>
            <img src='assets/images/footwear.jpg' alt='img-1' class='image-item' />
            <img src='assets/images/running-shoes.jpg' alt='img-2' class='image-item' />
            <img src='assets/images/running-essential.jpg' alt='img-3' class='image-item' />
            <img src='assets/images/summer-shoes.jpg' alt='img-4' class='image-item' />
        </div>
    </div>

    <div class='sport-slider-warapper'>
        <p class='sport'>Shop by Sport</p>

        <div class='sport-image-list' >
            <img src='assets/images/nike-basketball.jpg' alt='img-1' class='image-item' />
            <img src='assets/images/nike-golf.jpg' alt='img-2' class='image-item' />
            <img src='assets/images/nike-trail.jpg' alt='img-3' class='image-item' />
            <img src='assets/images/nike-tennis.jpg' alt='img-4' class='image-item' />
            <img src='assets/images/nike-football.jpg' alt='img-5' class='image-item' /><br>
        </div>
       
    </div>

    <footer>
        <div class="container">
            <p>&copy; 2024 Shoe Store. All Rights Reserved.</p>
            <h2>Devloped By : Rutu Vakhecha</h2>
        </div>
        
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                }]
            });
        });
    </script>
</body>

</html>