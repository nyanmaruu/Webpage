-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 10:37 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Blends', '2023-01-29 15:37:01', '2023-01-29 15:37:01'),
(2, 'Flavored_coffee', '2023-01-29 15:37:01', '2023-01-29 15:37:01'),
(3, 'Single_origin_coffee', '2023-01-29 15:37:21', '2023-01-29 15:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pictures` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `short_introduction` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `name`, `pictures`, `description`, `price`, `short_introduction`, `created_at`, `updated_at`) VALUES
(1, 1, 'Adirondack', './Pictures/blends/Adirondack.webp', 'Experience the universal appeal of our best-selling coffee with our clean, sweet Adirondack Blend.\r\n\r\nMade from an original blend of 100% of the finest, hand-selected Arabica coffee beans expertly roasted to a medium-roast, our Adirondack Blend coffee has', 12, 'Experience the universal appeal of our best-selling coffee with our clean, sweet Adirondack Blend.', '2023-01-29 15:41:44', '2023-02-05 18:06:29'),
(2, 1, 'BreakfastBlend', 'Pictures/blends/BreakfastBlend.webp', 'Wake up with our bright, citrusy Breakfast Blend, made from 100% of the finest, hand-selected Arabica coffee.\r\n\r\nNamed for the brisk, get-up-and-go charge to it, our Breakfast Blend is made by artfully blending South American Arabica coffee beans, and the', 12, 'Wake up with our bright, citrusy Breakfast Blend, made from 100% of the finest, hand-selected Arabica coffee.', '2023-01-29 15:41:44', '2023-02-05 18:06:38'),
(5, 1, 'DarkADK', 'Pictures/blends/DarkADK.webp', 'Experience a darker side of our most popular blend.\r\n\r\nMade from an original blend of 100% of the finest, hand-selected Arabica coffee beans expertly roasted to a dark-roast, our Dark Adirondack Blend coffee has a dense and smooth body, flavors of caramel', 13, 'Made from an original blend of 100% of the finest, hand-selected Arabica coffee bean', '2023-01-29 15:43:27', '2023-02-05 18:06:53'),
(6, 1, 'Espresso', 'Pictures/blends/Espresso.webp', 'Experience the artful elegance of Italy\'s famous beverage with our bold, yet sweet Espresso Blend coffee.\r\n\r\nMade from a blend of 100% of the finest, hand-selected Arabica and Robusta coffee beans from South America, Central America, and Africa, our Espre', 11, 'Experience the artful elegance of Italy\'s famous beverage with our bold, yet sweet Espresso Blend coffee.', '2023-01-29 15:43:27', '2023-02-05 18:07:03'),
(7, 1, 'FreightHouse', 'Pictures/blends/FreightHouse.webp', 'HERE COMES A BRAND NEW BLEND with a mission; It\'s about revitalization. We saw an opportunity to take a piece of Utica\'s history and bring it back to life.', 12, 'HERE COMES A BRAND NEW BLEND with a mission; It\'s a Fresh silky taste of Coffee', '2023-01-29 15:43:58', '2023-02-05 18:08:08'),
(8, 2, 'ADKBlueberry', 'Pictures/flavoredCoffee/ADKBlueberry.webp', 'Savor the flavor and the aroma of freshly picked sweet blueberries.\r\nExperience the taste of wild Adirondack blueberries. Even if you\'ve had the pleasure of enjoying blueberry coffee before, this one is bound to blow the rest out of the water. \r\n\r\nMade fr', 12, 'Savor the flavor and the aroma of freshly picked sweet blueberries.', '2023-01-29 15:45:34', '2023-02-05 18:08:15'),
(9, 2, 'Cannoli', 'Pictures/flavoredCoffee/Cannoli.webp', 'Our most popular flavored coffee offering! \n\nExperience the sweet and creamy indulgence of Utica\'s favorite Italian pastry in a mug with our Cannoli coffee.\nMade from 100% of the finest, hand-selected Arabica coffee with natural and artificial flavor.', 12, 'Experience the sweet and creamy indulgence of Utica\'s favorite Italian pastry in a mug with our Cannoli coffee.', '2023-01-29 15:45:34', '2023-02-05 18:08:27'),
(10, 2, 'CoconutCream', 'Pictures/flavoredCoffee/CoconutCream.webp', 'Experience the rich, smooth, and sweet flavors of coconut.\r\nIf you consider yourself to be coconut crazy, this one is for you! \r\n\r\nMade from 100% of the finest, hand-selected Arabica coffee with natural and artificial flavor.\r\n\r\nGluten, Allergen & Sugar-F', 13, 'Experience the rich, smooth, and sweet flavors of coconut.', '2023-01-29 15:48:13', '2023-02-05 18:08:32'),
(11, 2, 'MochaMint', 'Pictures/flavoredCoffee/MochaMint.webp', 'The unmistakable flavor of freshly roasted mint combines beautifully with our Brazil Cerrado to create a taste and aroma that will have you hooked from the very first cup.\r\nFeeling a little nutty? \r\n\r\nMade from 100% of the finest, hand-selected Arabica co', 15, 'The unmistakable flavor of freshly roasted mint.', '2023-01-29 15:48:13', '2023-02-05 18:08:42'),
(12, 2, 'CinnamonBun', 'Pictures/flavoredCoffee/CinnamonBun.webp', 'IT\'S BACK! Our best-selling seasonal flavor. The flavor you\'ve been asking for over a year has finally returned and believe us when we say, we are so excited.\r\n\r\nMade from 100% of the finest, hand-selected Arabica coffee with natural and artificial flavor', 11, 'Made from 100% of the finest, hand-selected Arabica coffee with natural and artificial flavor', '2023-01-29 15:48:52', '2023-02-05 18:08:56'),
(13, 3, 'Brazil Cerrado', 'Pictures/singleOriginsCoffee/BrazilCerrado.webp', 'Take a taste of Brazil with our most popular coffee. Balanced and mild, with a solid body, our Brazil Cerrado coffee has low acidity, nutty and malt flavors, and an exceptional chocolate aftertaste. Made from 100% of the finest, hand-selected Arabica coff', 8, 'Balanced and mild, with a solid body, our Brazil Cerrado coffee has low acidity, nutty and malt flavors.', '2023-01-29 15:52:21', '2023-02-05 18:09:11'),
(14, 3, 'ColombiaOrganic', 'Pictures/SingleOriginsCoffee/ColombiaOrganic.webp', 'Take a taste of Colombia with our bright and complex Colombia Organic coffee, with a smooth body, and notes of honey, toasted walnut, and molasses, made from 100% of the finest, hand-selected Arabica coffee.\r\n\r\nTasting Notes: Honey, toasted walnut, molass', 12, 'smooth body, and notes of honey, toasted walnut, and molasses, made from 100% of the finest, hand-selected Arabica coffee.', '2023-01-29 15:52:21', '2023-02-05 18:09:27'),
(15, 3, 'ColombiaSuprem', 'Pictures/singleOriginsCoffee/ColombiaSuprem.webp', 'Take a taste of Colombia with our fruity and sweet Colombia Supremo coffee, with balanced acidity and notes of caramel, tart fruit, and dark chocolate, made from 100% of the finest, hand-selected Arabica coffee.\r\n\r\nTasting Notes: Caramel, tart fruit, dark', 12, 'Take a taste of Colombia with our fruity and sweet Colombia Supremo coffee.', '2023-01-29 15:52:21', '2023-02-05 18:09:38'),
(16, 3, 'CostaRica', 'Pictures/singleOriginsCoffee/CostaRica.webp', 'Take a taste of Costa Rica with our clean and sweet Costa Rican coffee, with a well-rounded, rich body, and notes of chocolate and nuttiness, made from 100% of the finest, hand-selected Arabica coffee.\r\n\r\nTasting Notes: Floral accents, nutty to chocolate\r', 12, ' 100% of the finest, hand-selected Arabica coffee.', '2023-01-29 15:52:21', '2023-02-05 18:09:50'),
(17, 3, 'Guatemala', 'Pictures/singleOriginsCoffee/Guatemala.webp', 'Take a taste of Guatemala with our balanced, chocolate forward Guatemala Santo Domingo. with notes of almond and caramel, made from 100% of the finest, hand-selected Arabica coffee.\r\n\r\nTasting Notes: Almond, caramel, chocolate, balanced\r\n\r\nRegion: Santa R', 12, '100% of the finest, hand-selected Arabica coffee.', '2023-01-29 15:52:21', '2023-02-05 18:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_orders`
--

CREATE TABLE `product_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` tinytext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type_id`, `user_name`, `user_password`, `user_email`, `created_at`, `updated_at`) VALUES
(14, 0, 'Test', '$2y$10$NDpxkwmnVerXXMmiFl.haudUGmKPXPWM7/jxICa9HtmZP2/RmF1q.', 'test@gmail.com', '2023-09-04 20:15:18', '2023-09-04 20:15:18'),
(15, 1, 'Admin', '$2y$10$ZEYW/gYumz/Sn9mILioEnuANhHbPNUHymCjxxVmU0zaRps5SJALO.', 'admin@gmail.com', '2023-09-04 20:15:58', '2023-09-04 20:16:04'),
(16, 0, 'test2', '$2y$10$PzqJgg2KZDcWOzY1HUxGJO5vnnIyLJcb8Hq2UtajVtBgtGxaD433.', 'test2@gmail.com', '2023-09-04 20:18:39', '2023-09-04 20:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`address_id`, `user_id`, `name`, `email`, `address`, `city`, `zip_code`, `country`) VALUES
(48, 14, 'Test Péter', 'Test@gmail.com', 'Test utca 5', 'Test City', '21321', 'Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Indexes for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_orders`
--
ALTER TABLE `product_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `users_address` (`address_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_orders`
--
ALTER TABLE `product_orders`
  ADD CONSTRAINT `product_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_orders_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_address`
--
ALTER TABLE `users_address`
  ADD CONSTRAINT `users_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
