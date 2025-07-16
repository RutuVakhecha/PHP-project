-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2025 at 03:26 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoe_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(3, 'admin', 'admin@example.com', '$2y$10$UmJyus/rWlLKMgUBpwkGnuFFcMCf.UaozzyN6rA9QQLt8uthHq/ca');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Sneakers'),
(2, ' Sports Shoes'),
(3, 'Basketball Shoes'),
(4, 'Running Shoes'),
(5, ' Mens Shoes'),
(6, ' Stylish-Shoes'),
(7, 'Footwear Shoes'),
(8, 'Gym Shoes'),
(10, 'Womens Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`) VALUES
(1, 'rutu vakhecha', 'rutu@gmail.com', 'hi am intrested your website'),
(25, 'abc', 'abc@gmail.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `name` varchar(65) NOT NULL,
  `address` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `total`, `order_date`, `name`, `address`, `email`) VALUES
(1, 6, 14, 1, '30.00', '2024-09-27 13:37:27', 'rutu vakhecha', 'junagadh', 'rutu@gmail.com'),
(2, 6, 11, 1, '40.00', '2024-09-27 13:38:59', 'rutu vakhecha', 'jamnagar', 'rutuv@gmail.com'),
(3, 6, 22, 1, '50.00', '2024-09-27 13:38:59', 'rutu vakhecha', 'jamnagar', 'rutuv@gmail.com'),
(4, NULL, 9, 1, '40.00', '2024-09-29 18:10:10', 'Baldev Vakhesa', 'navagadh', 'balu@gmail.com'),
(5, NULL, 21, 1, '90.00', '2024-09-29 18:10:10', 'Baldev Vakhesa', 'navagadh', 'balu@gmail.com'),
(6, NULL, 16, 1, '50.00', '2025-07-02 20:56:28', 'rutu vakhecha', 'jaypur', 'rutu@gmail.com'),
(7, NULL, 14, 1, '80.00', '2025-07-02 20:56:28', 'rutu vakhecha', 'jaypur', 'rutu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `category_id`) VALUES
(8, 'Air Jordan Retro', 'Jordan Retro is a line of authentic and original sneakers that goes beyond just being fashionable. Jordan Retro shoes feature various color schemes, which are bright and colorful. With its unique exterior, this shoe is an instant hit with sneakerheads looking for a new pair of kicks.', '50.00', '66f8f0428fd6a.jpg', 3),
(9, ' Unisex Rebound Future ', 'The rebound shoe reduces impact of jump landing by ~20%. The rebound shoe reduces impact of running by 11%. Impact is reduced by lower impact force and longer time to peak.', '40.00', '66f8efa4cad01.jpg', 8),
(11, 'Air Zoom', 'CAGED AIR. THROWBACK STYLE. First released in 2003, the Nike Air Zoom Spiridon Cage 2 is as relevant today as it was back in the day. Featuring OG design lines and a caged Zoom Air unit, it gives you a responsive ride with early 2000 style', '40.00', '66f8ef2976135.jpg', 4),
(12, 'Air Zoom Vemro', 'As a daily running shoe in its past incarnation, the Vomero 5 has a moderate heel-to-toe drop of 9.6 mm.', '40.00', '66f8f05680b5c.jpg', 4),
(13, 'Nike-Air-Pegasus', 'The Nike Pegasus is a fantastic option when used as a daily trainer. Traditionally, it provides the right amount of cushion, is very durable, and great for logging those miles throughout the week', '90.00', '66f67dc2ab248.jpg', 6),
(14, 'Nike Full Force Low', 'This pared-back design references the classic AF-1, then leans into 80s style with throwback stitching and varsity-inspired colours. Not everything has to be a throwback, thoughâ€”modern comfort and durability make them easy to wear any time, anywhere.', '80.00', '66f6870ab318e.jpg', 3),
(15, 'LQDCELL Mthod Training Shoes', 'Training shoes support a range of movement, including: cutting, stopping, breaking, jumping, and changing direction quickly.', '90.00', '66f68744d2e7b.jpg', 3),
(16, 'Mens Full Force Low', 'his pared-back design references the classic AF-1, then leans into 80s style with throwback stitching and varsity-inspired colours. Not everything has to be a throwback, thoughâ€”modern comfort and durability make them easy to wear any time, anywhere.', '50.00', '66f6879618de2.jpg', 5),
(17, 'Precision VII ', 'step onto the floor with full confidence and take your best shot in the Nike Precision 7â€”a game-ready basketball shoe for everyone. Made with Nike EasyOn technology, it has a collapsible heel and large midfoot strap to help you tighten the laces and secure the fit using one hand.', '100.00', '66f687d43bac8.jpg', 7),
(18, 'Nike Air Max', 'WALKING;JOGGING;RUNNING SHOES;SOFT;TRNDY;STYLISH;COMFORTABLE;CATCHY', '80.00', '66f68808da10a.jpg', 4),
(19, 'Nike Air Max Alpha Trainer', 'As the name indicates, all Air Max shoes feature one or more translucent pouches of pressurized gas embedded in the midsole and visible from the outside of the shoe. Referred to as "Air units" or "airbags," their stated purpose is to provide superior cushioning to traditional foam while also reducing weight.', '30.00', '66f6886257a30.jpg', 6),
(20, 'Air Max Impact 4', 'Nike Air Max is a line of shoes produced by Nike, Inc., with the first model released in 1987. Air Max shoes are identified by their midsoles incorporating flexible urethane pouches filled with pressurized gas, visible from the exterior of the shoe and intended to provide cushioning to the underfoot.', '80.00', '66f68884efd76.jpg', 3),
(21, 'Air Zoom Structure ', 'The Nike Zoom Structure 24 is for those who want a firm, mild to moderate stability shoe with a slightly wider fitting upper', '90.00', '66f688b64324d.jpg', 3),
(22, 'Nike zoom Vomero 15', 'However, it turns out they are a really good performer. The combination of articulated Zoom Air in the forefoot and ZoomX in the heel is a winner. The Nike Air Zoom Vomero 15 made our list of the best road running shoes in 2022.', '50.00', '66f688e22a8bc.jpg', 1),
(23, 'Nike mens Blazer Mid 77', 'Leather and synthetic upper looks crisp and is easy to style. Vintage treatment on the midsole adds the perfect touch of retro. Autoclave construction fuses the outsole to the midsole for a streamlined look that\'s timeless. Exposed foam on the tongue provides a throwback look.', '70.00', 'Nike mens Blazer Mid \'77 Vntg Running Shoe.jpg', 4),
(24, 'Nike Mens Free Run 2', 'Since the 2022â€“23 season, winners receive the Michael Jordan Trophy, named for the five-time MVP often considered to be the greatest player in NBA history. NBA Most Valuable Player Award.', '130.00', 'Nike Mens Free Run 2 Running Shoe.jpg', 4),
(25, 'Nike Jordan MVP', 'The pair I tested is the PF (Performance Fit) version purchased overseas and utilizes XDR (Extra Durable Rubber) for the outsole.', '120.00', 'Nike Mens Jordan MVP Running Shoes.jpg', 6),
(26, 'Jordan One Take 5 Pf', 'Trail running shoes are designed to handle different types of terrain, including pavements. They give you good traction and cushioning on the road. Nevertheless, it is crucial to note that they may not be as lightweight and as responsive as regular road running shoes.', '90.00', 'Nike Mens Jordan One Take 5 Pf Running.jpg', 1),
(27, 'Juniper Trail 3', 'The pair I tested is the PF (Performance Fit) version purchased overseas and utilizes XDR (Extra Durable Rubber) for the outsole.', '70.00', 'NIKE Men\'s Juniper Trail 3 Running Shoes.jpg', 8),
(28, 'Nike Pegasus', 'Now with the Pegasus, Air could be positioned just in the heel, which is where most runners\' feet strike when they make contact with the ground. With a combination of Nike Air, a waffle outsole and a new foam, the Pegasus had the ingredients to become an industry leader in responsive cushioning and a runner favorite.', '100.00', 'Nike Mens Pegasus Running Shoes.jpg', 10),
(29, 'Pegasus Turbo', 'Original Nike Pegasus Turbo was the first daily trainer with Zoom X foam and is innovative and a trendsetter. It was supposed to be a training companion for VaporFly 4%.', '120.00', 'Nike Mens Pegasus Turbo Next Nature Running Shoe.jpg', 2),
(30, 'React Pegasus Trail4', 'Original Nike Pegasus Turbo was the first daily trainer with Zoom X foam and is innovative and a trendsetter. It was supposed to be a training companion for VaporFly 4%.', '150.00', 'Nike Mens React Pegasus Trail 4 Running Shoe.jpg', 5),
(31, 'Nike Pegasus 38', 'BORN TO RUN AND PLAY. The Nike Air Zoom Pegasus 38 returns to put a spring in your steps, skips and jumps using the same responsive foam as its predecessor.', '80.00', 'NIKE Pegasus 38 Men\'s Road Running Shoes.jpg', 1),
(32, 'Nike Pegasus 40', 'The Pegasus feels like its hugging your foot - in a good way. Its soft and seems to mold to the shape of your foot, which is one of the reasons it feels so supportive. The shoe fits true to size - so no need to size up or down', '110.00', 'NIKE Pegasus 40 Premium Men\'s Road Running Shoes.jpg', 2),
(33, 'Ultraride Walking', 'Walking shoes are designed to give flat feet more flexibility. This allows your foot to move naturally when walking, reducing the risk of injury and providing a comfortable fit. Most walking shoes feature softer midsoles that cushion your feet while allowing them to bend and flex as you walk.', '100.00', 'ultraride walking.jpg', 4),
(34, 'Nike Air Max for Men', 'Nike Air Max is a line of shoes produced by Nike, Inc., with the first model released in 1987. Air Max shoes are identified by their midsoles incorporating flexible urethane pouches filled with pressurized gas, visible from the exterior of the shoe and intended to provide cushioning to the underfoot.', '150.00', '51UcgCzuwPL._SY625_.jpg', 5),
(35, 'NIKE Full Force Low ', 'his pared-back design references the classic AF-1, then leans into 80s style with throwback stitching and varsity-inspired colours. Not everything has to be a throwback, thoughâ€”modern comfort and durability make them easy to wear any time, anywhere.', '90.00', 'NIKE Full Force Low Men\'s Shoes.jpg', 5),
(36, 'Nike Air Jordan', 'Basketball Shoes is the perfect weapon against tough cuts and wicked base movements and creates a lethal combination of exclusivity and stability with responsive cushioning. UPPER-Spacer Mesh covered with TPU film For better fit and comfort. More inner foam stitching provides more support and fit. \r\n', '100.00', 'Nike Mens Air Jordan Xxxviii CNY Pf Runnin.jpg', 3),
(37, 'Max Impact 54', ' Designed for comfortable wear for sports and street style, NIKE is always fun to wear. Upgrade in style with a wide range from the worldâ€™s leading and much-loved sports brand, NIKE. \r\n', '150.00', '66f92722d0af5.jpg', 6),
(38, 'Max Impact 54', ' Designed for comfortable wear for sports and street style, NIKE is always fun to wear. Upgrade in style with a wide range from the worldâ€™s leading and much-loved sports brand, NIKE. ', '100.00', '66f92703c92af.jpg', 2),
(39, 'Nike Air Max', 'The Nike Downshifter 9 features soft, lightweight cushioning and breathable fabric for comfort that lasts as long as you can run.\r\n', '90.00', 'Nike Mens Air Max Running Shoes 90Air.jpg', 10),
(40, 'Nike Zoom For Mens', 'CAGED AIR. THROWBACK STYLE. First released in 2003, the Nike Air Zoom Spiridon Cage 2 is as relevant today as it was back in the day. Featuring OG design lines and a caged Zoom Air unit, it gives you a responsive ride with early 2000 style', '130.00', 'NIKE Mens Air Zoom G.t. Cut Academy Ep.jpg', 7),
(41, 'NIKE court Royale', '11  Designed for comfortable wear for sports and street style, NIKE is always fun to wear. Upgrade in style with a wide range from the worldâ€™s leading and much-loved sports brand, NIKE. \r\n', '50.00', 'NIKE Mens Court Royale 2 NnSneaker.jpg', 7),
(42, 'Mens Downshifter 13', 'Step into the future with PWRFRAME. This innovative style fuses street and tech, standing out with a progressive design and futuristic feel. Originally developed for the football pitch, our PWRFRAME technology features a continuous ring of support from heel to midfoot Ã¢â‚¬â€œ providing optimal comfort in this cutting-edge kick. This pack features a textile upper and a bonded frame visible under the TPU mesh window.\r\n', '90.00', 'NIKE Mens Downshifter 13.jpg', 7),
(43, 'Nike Jordan Luka', 'Jordan is a line of authentic and original sneakers that goes beyond just being fashionable. Jordan Retro shoes feature various color schemes, which are bright and colorful. With its unique exterior, this shoe is an instant hit with sneakerheads looking for a new pair of kicks.', '100.00', 'Nike Mens Jordan Luka 2 Pf.jpg', 1),
(44, 'Unisex Pwrframe OP-1', 'Step into the future with PWRFRAME. This innovative style fuses street and tech, standing out with a progressive design and futuristic feel. Originally developed for the football pitch, our PWRFRAME technology features a continuous ring of support from heel to midfoot Ã¢â‚¬â€œ providing optimal comfort in this cutting-edge kick. This pack features a textile upper and a bonded frame visible under the TPU mesh window.\r\n', '170.00', 'Unisex Pwrframe OP-1 Cyber.jpg', 10),
(45, 'Nike WMNS Tanjun', 'NIKE Court Vision Alta Women\'s Sneaker Shoes (8) ', '80.00', 'NIKE Womens WMNS TanjunRunning Shoe.jpg', 10),
(46, 'Electrify Nitro', 'Designed for comfortable wear for sports and street style, NIKE is always fun to wear. Upgrade in style with a wide range from the worldâ€™s leading and much-loved sports brand, NIKE. \r\n', '100.00', '66f928fe4565c.jpg', 2),
(47, 'Unisex Child DownShfter', 'Step into the future with PWRFRAME. This innovative style fuses street and tech, standing out with a progressive design and futuristic feel. Originally developed for the football pitch, our PWRFRAME technology features a continuous ring of support from heel to midfoot Ã¢â‚¬â€œ providing optimal comfort in this cutting-edge kick', '120.00', 'Nike Unisex-Child Downshifter 9 (PSV).jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'prakash', '$2y$10$zqoqeLu7D1hH7uYsKlUFFemw3tMc0RB.iclVoc1bHq7P2Te2VpxxO', 'vakhechap347@gmail.com'),
(4, 'gunjan vakhecha', '$2y$10$HXy4na47fSODEyRPr5roeO/lqRd3sJNeKMuxG907/D7e8/D2a0En2', 'gunjan@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
