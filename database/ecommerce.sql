-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 08:42 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, 155.00, 'not paid', 1, 2147483647, 'London', 'london', '2024-03-10 16:09:35'),
(2, 354.00, 'not paid', 1, 2147483647, 'London', 'london', '2024-03-10 16:28:52'),
(3, 254.00, 'not paid', 1, 2147483647, 'London', 'london', '2024-03-10 16:33:27'),
(4, 298.00, 'not paid', 1, 2147483647, 'London', 'london', '2024-03-10 16:41:04'),
(5, 298.00, 'not paid', 1, 2147483647, 'London', 'london', '2024-03-10 16:42:16'),
(6, 298.00, 'not paid', 1, 2147483647, 'London', 'london', '2024-03-10 16:44:01'),
(7, 349.00, 'not paid', 1, 2147483647, 'London', 'London', '2024-03-10 16:48:25'),
(8, 199.00, 'not paid', 1, 2147483647, 'London', 'london', '2024-03-10 16:51:14'),
(9, 99.00, 'not paid', 1, 2147483647, 'London', 'London', '2024-03-10 17:29:47'),
(10, 254.00, 'not paid', 1, 123456788, 'Bristol', 'Bristol', '2024-03-10 21:07:49'),
(11, 254.00, 'not paid', 1, 123456788, 'Bristol', 'Bristol', '2024-03-10 21:10:49'),
(12, 254.00, 'not paid', 3, 993535356, 'Bristol', 'Bristol', '2024-03-10 21:16:22'),
(13, 254.00, 'delivered', 3, 2147483647, 'london', 'london', '2024-03-10 21:26:30'),
(14, 155.00, 'not paid', 1, 0, 'ffffffff', 'ffffffffffff', '2024-03-11 08:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 6, '2', 'Shoes', 'shoes4.jpg', 99.00, 1, 1, '2024-03-10 16:44:01'),
(2, 7, '3', 'Man coat', 'coat5.jpg', 199.00, 1, 1, '2024-03-10 16:48:25'),
(3, 8, '3', 'Man coat', 'coat5.jpg', 199.00, 1, 1, '2024-03-10 16:51:14'),
(4, 9, '2', 'Shoes', 'shoes4.jpg', 99.00, 1, 1, '2024-03-10 17:29:47'),
(5, 10, '2', 'Shoes', 'shoes4.jpg', 99.00, 1, 1, '2024-03-10 21:07:49'),
(6, 11, '2', 'Shoes', 'shoes4.jpg', 99.00, 1, 1, '2024-03-10 21:10:49'),
(7, 12, '1', 'White Shoes', 'shoes.jpg', 155.00, 1, 3, '2024-03-10 21:16:22'),
(8, 13, '2', 'Shoes', 'shoes4.jpg', 99.00, 1, 3, '2024-03-10 21:26:30'),
(9, 13, '1', 'White Shoes', 'shoes.jpg', 155.00, 1, 3, '2024-03-10 21:26:30'),
(10, 14, '1', 'White Shoes', 'shoes.jpg', 155.00, 1, 1, '2024-03-11 08:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(108) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `product_image4` varchar(255) DEFAULT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) DEFAULT NULL,
  `product_color` varchar(108) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'White Shoes', 'shoes', 'awesome white shoes', 'shoes.jpg', 'shoes.jpg', 'shoes.jpg', 'shoes.jpg', 155.00, 0, 'white'),
(2, 'Shoes', 'shoes', 'awesome grey shoes', 'shoes4.jpg', 'shoes4.jpg', 'shoes4.jpg', 'shoes4.jpg', 99.00, 0, 'grey'),
(3, 'Man coat', 'coats', 'Grey coat', 'coat5.jpg', 'coat5.jpg', 'coat5.jpg', 'coat5.jpg', 199.00, 0, 'grey'),
(4, 'Long coat', 'coats', 'Woman long coat', 'coat3.jpg', 'coat3.jpg', 'coat3.jpg', 'coat3.jpg', 150.00, 0, 'Yellow');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(108) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'lin', 'lin@gmail.com', '7a50a944a3eac10ca2831dc3077b814e'),
(2, 'Lwin', 'lwin@gmail.com', '5999073b2972a9a8de67b71f5d452b57'),
(3, 'Tony', 'tony@gmail.com', 'e8364d468447a930dfa9eefb5b68cf5c'),
(4, 'Htoo', 'htoo@gmail.com', '1cd8e7658bb6db26fed1ce17940b7dbd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
