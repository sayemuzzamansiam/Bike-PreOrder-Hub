-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 10:20 AM
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
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Kawasaki Ninja'),
(2, 'Yamaha'),
(3, 'Suzuki'),
(5, 'Harley Davidson'),
(7, 'Hero');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `user_ip`, `quantity`) VALUES
(9, '::1', 1),
(10, '::1', 1),
(11, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'High'),
(2, 'Mid'),
(3, 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keyword` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keyword`, `brand_id`, `cat_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Ninja Kawasaki', 'Kawasaki Bike is the best bike in the world', 'bike,ninja,kawasaki,h2r', 1, 1, 'kawasaki-ninja-h2r.jpg', 'Kawasaki Ninja h2.jpg', 'kawasaki-ninja-h2r.jpg', '8000000', '2023-09-08 19:39:58', 'true'),
(3, 'Suzuki', 'Suzuki manufactures legendary motorcycles such as the GSX-R', 'suzuki,bike', 3, 1, 'Suzuki.jpg', 'kawasaki-ninja-h2r.jpg', 'kawasaki-ninja-h2r.jpg', '500000', '2023-09-08 19:47:10', 'true'),
(4, 'Yamaha', 'Yamaha Corporation is a Japanese musical instrument.', 'bike,yamaha', 2, 1, 'Yamaha_YZF_R3.jpeg', 'Yamaha_YZF_R3.jpeg', 'Yamaha_YZF_R3.jpeg', '2000000', '2023-09-08 19:49:00', 'true'),
(5, 'Yamaha', 'Yamaha Corporation is a Japanese musical instrument.', 'bike,yamaha', 2, 1, 'Yamaha_YZF_R3.jpeg', 'Yamaha_YZF_R3.jpeg', 'Yamaha_YZF_R3.jpeg', '2000000', '2023-09-08 19:51:55', 'true'),
(6, 'Haraley Davidson', 'Yamaha Corporation is a Japanese musical instrument and audio equipment manufacturer.', 'bike,hd', 5, 1, 'HD.jpg', 'HD.jpg', 'HD.jpg', '4000000', '2023-09-08 19:54:08', 'true'),
(9, 'Siam', 'bike siam ', 'bike monster', 7, 4, 'Ninja h2.jpg', 'kawasaki-ninja-300-abs.png', 'Ninja h2.jpg', '10', '2023-12-16 16:15:38', 'true'),
(10, 'oyon', 'bike', 'bike', 8, 4, 'blue-harley-davidson.png', 'blue-harley-davidson.png', 'blue-harley-davidson.png', '5', '2023-12-16 16:23:35', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `user_name`, `user_email`, `product_id`, `product_title`, `order_date`) VALUES
(17, 1, 'dul kar salman', 'g123@gmail.com', 8, 'Siam', '2023-12-18 15:09:08'),
(18, 1, 'dul kar salman', 'g123@gmail.com', 9, 'Siam', '2023-12-18 15:09:09'),
(19, 1, 'dul kar salman', 'g123@gmail.com', 10, 'oyon', '2023-12-18 15:09:09'),
(20, 1, 'dul kar salman', 'g123@gmail.com', 11, 'boom', '2023-12-18 15:09:09'),
(21, 1, 'dul kar salman', 'g123@gmail.com', 8, 'Siam', '2023-12-18 15:33:03'),
(22, 1, 'dul kar salman', 'g123@gmail.com', 9, 'Siam', '2023-12-18 15:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'Goku', 'g123@gmail.com', '$2y$10$u0RX3lL5jp1eu7AlSKEwe.P0dHH2SdHfTYnGD4ZuCjNBccE/hyqRO', '74a543b61408dea0f3bcdb5e746706b158e61fab_hq.jpg', '::1', 'USA', '01235321235'),
(2, 'Sayemuzzaman Siam', 'sayemuzzaman123@gmail.com', '$2y$10$fmbZ4OWLksFqxCWrXeKRdO/Tn2pcF/dz/IMWqE5kkMJPbW10eiF82', 'aizen_sousuke_by_devilette.png', '::1', 'Khilgaon', '01839494854'),
(8, 'dul kar salman', 'a@gmail.com', '$2y$10$Gc6lfO.DJIA8W3U8.1clu.fAqSewPxOrOK5KE8Gtxx25bUqAI9vA2', 'afro_samurai_by_crooklynscriptures.jpg', '::1', 'dhaka', '01839592545'),
(10, 'oyon', 's123@gmail.com', '$2y$10$bxDb2i2zb6Rs82kPXlJWOO3UND2WgynfPleWZSYFQWAsVeEspUEnW', 'afro_samurai_conceptart_yDock.jpg', '::1', 'dhaka', '01936545644');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
