-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2024 at 06:47 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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
-- Table structure for table `admin_table`
--

DROP TABLE IF EXISTS `admin_table`;
CREATE TABLE IF NOT EXISTS `admin_table` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_image`, `admin_mobile`) VALUES
(1, 'priya', 'priya123@gmail.com', '$2y$10$QYBbyiCUwqjsiM0RNYrqi..FTOKD9QPQK5iP/T7jqn6TbUtkrefwe', 'blacktop.jpg', '1234567891'),
(2, 'riya', 'riya43@gmail.com', '$2y$10$6EZayB1PQVtbnyQwGRIhP..qCYFiTcc3F8l1oL667QzFpaDh9EIRy', 'bg10.jpg', '5678945678'),
(3, 'vaishnavi', 'vaishnavi@gmail.com', '$2y$10$Qxsag6LNJZERGSYvvfD8oeko7QvLjhhxgNckX8Zy1.CDBfwqrwpS2', 'butterfly logo.png', '9988776655');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_title` varchar(100) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'levis'),
(2, 'nike'),
(3, 'zara'),
(5, 'Louis Vuitton'),
(6, 'adidas'),
(7, 'Calvin Klein'),
(10, 'biba');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

DROP TABLE IF EXISTS `cart_details`;
CREATE TABLE IF NOT EXISTS `cart_details` (
  `product_id` int NOT NULL,
  `ip_address` varchar(256) NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_title` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(2, 'western wear'),
(9, 'cardigans'),
(8, 'jeans'),
(6, 'hoodies'),
(7, 'skirts'),
(10, 'ethnics');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

DROP TABLE IF EXISTS `orders_pending`;
CREATE TABLE IF NOT EXISTS `orders_pending` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `invoice_number` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `order_status` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 1116402231, 4, 1, 'pending'),
(2, 1, 452661272, 3, 1, 'pending'),
(3, 1, 118517119, 3, 1, 'pending'),
(4, 1, 1306748973, 4, 1, 'pending'),
(5, 1, 1290303040, 1, 1, 'pending'),
(6, 1, 1058856654, 2, 1, 'pending'),
(7, 1, 2094802969, 4, 1, 'pending'),
(8, 1, 911655160, 4, 1, 'pending'),
(9, 1, 1785321882, 3, 1, 'pending'),
(10, 1, 290556371, 3, 1, 'pending'),
(11, 2, 1921410717, 3, 1, 'pending'),
(12, 2, 2033731885, 2, 1, 'pending'),
(13, 2, 1348561507, 3, 1, 'pending'),
(14, 2, 636006477, 5, 1, 'pending'),
(15, 2, 1389956544, 2, 1, 'pending'),
(16, 2, 701789782, 5, 1, 'pending'),
(17, 2, 818044055, 5, 1, 'pending'),
(18, 2, 316768026, 5, 4, 'pending'),
(19, 2, 1216711493, 5, 1, 'pending'),
(20, 2, 1124971225, 3, 2, 'pending'),
(21, 2, 892947283, 3, 1, 'pending'),
(22, 2, 1129410875, 3, 1, 'pending'),
(23, 2, 318376457, 3, 1, 'pending'),
(24, 2, 820519798, 3, 4, 'pending'),
(25, 2, 52308248, 3, 4, 'pending'),
(26, 2, 54763167, 3, 3, 'pending'),
(27, 2, 1345347638, 2, 2, 'pending'),
(28, 2, 1292357089, 2, 1, 'pending'),
(29, 2, 1543616026, 5, 1, 'pending'),
(30, 2, 1517001558, 3, 1, 'pending'),
(31, 2, 756407312, 3, 1, 'pending'),
(32, 2, 2057398277, 5, 1, 'pending'),
(33, 2, 585021605, 3, 1, 'pending'),
(34, 2, 516641556, 5, 1, 'pending'),
(35, 2, 568659636, 3, 1, 'pending'),
(36, 2, 781743528, 3, 1, 'pending'),
(37, 2, 322749047, 3, 1, 'pending'),
(38, 2, 274620148, 3, 1, 'pending'),
(39, 2, 1826435509, 3, 1, 'pending'),
(40, 2, 13918630, 3, 1, 'pending'),
(41, 2, 1278047391, 3, 1, 'pending'),
(42, 2, 1504673838, 5, 1, 'pending'),
(43, 2, 619179509, 3, 1, 'pending'),
(44, 2, 1226707722, 5, 1, 'pending'),
(45, 2, 601339934, 3, 1, 'pending'),
(46, 2, 221532001, 5, 1, 'pending'),
(47, 2, 1643484843, 3, 2, 'pending'),
(48, 2, 590207299, 4, 1, 'pending'),
(49, 2, 30654661, 7, 1, 'pending'),
(50, 2, 839581885, 3, 1, 'pending'),
(51, 2, 1871734485, 6, 1, 'pending'),
(52, 2, 527203029, 3, 5, 'pending'),
(53, 2, 2122871636, 7, 1, 'pending'),
(54, 2, 122073249, 3, 1, 'pending'),
(55, 2, 269868561, 7, 1, 'pending'),
(56, 2, 1407437910, 3, 1, 'pending'),
(57, 2, 1464673259, 3, 5, 'pending'),
(58, 2, 541713844, 8, 4, 'pending'),
(59, 2, 1007407133, 3, 7, 'pending'),
(60, 2, 917706011, 5, 1, 'pending'),
(61, 2, 1247825589, 5, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(5, 'anarkali', 'elegant indo western anarkali', 'gown,blue dress, dress, ', 1, 8, 'dress1.jpg', 'croptop.jpg', 'dress6.jpg', '900', '2024-01-15 14:58:25', 'true'),
(6, 'cardigan', 'green woolen cardigan', 'cardigan,jacket,shrug,green', 9, 3, 'cardigan1.jpg', 'cardigan2.jpg', 'cardigan3.jpg', '599', '2024-04-15 16:40:51', 'true'),
(2, 'black bodycon', 'Black solid bodycon dress High-neck Sleeveless, no sleeves Knee length in straight hem Zip closure', 'bodycon,black dress,sleeveless dress,party wear', 2, 0, 'blackdress1.jpg', 'blackdress2.jpg', 'blackdress3.jpg', '2200', '2024-04-15 16:37:51', 'true'),
(3, 'satin dress', 'satin dress,backless,ankle length,golden yellow colour ', 'satin dress, yellow dress, bodycon, one peice', 2, 0, 'd1.jpg', 'd3.jpg', 'd2.jpg', '3499', '2024-04-15 16:38:25', 'true'),
(4, 'ethnic red dress', 'Pattern Is Printed. Style Code Is Fstve2164aw23chered. Pack Of Is 1. Sleeve Length Is Sleeveless. Color Is Red. Ideal For Is Women. Sleeve Is Sleeveless. Suitable For Is Ethnic ...', 'red dress,ethnics,dress,one peice,kurti', 10, 10, 'ethnic1.jpg', 'ethnic2.jpg', 'ethnic3.jpg', '4599', '2024-04-15 16:39:17', 'true'),
(7, 'jeans', 'wide leg jeans', 'jeans,wide_leg,blue', 8, 1, 'jeans1.jpg', 'jeans2.jpg', 'jeans3.jpg', '1500', '2024-04-15 16:42:02', 'true'),
(8, 'top', 'top blue', 'blue,top', 2, 3, 'flaretop.jpg', 'dress6.jpg', 'cardigan1.jpg', '500', '2024-04-16 03:32:38', 'true'),
(9, 'top', 'top shirt', 'top shirt blue', 2, 2, 'bg.jpg', 'cardigan2.jpg', 'd2.jpg', '200', '2024-08-26 14:18:28', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

DROP TABLE IF EXISTS `user_orders`;
CREATE TABLE IF NOT EXISTS `user_orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount_due` int NOT NULL,
  `invoice_number` int NOT NULL,
  `total_products` int NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` varchar(255) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(45, 2, 1500, 269868561, 1, '2024-04-16 00:24:00', 'Complete'),
(42, 2, 17495, 527203029, 1, '2024-04-15 17:08:03', 'Complete'),
(41, 2, 599, 1871734485, 1, '2024-04-15 16:56:28', 'Complete'),
(38, 2, 5499, 590207299, 2, '2024-04-15 16:44:45', 'Complete'),
(46, 2, 3499, 1407437910, 1, '2024-04-17 07:02:51', 'Complete'),
(35, 2, 3499, 601339934, 1, '2024-04-15 11:22:34', 'Complete'),
(47, 2, 17495, 1464673259, 1, '2024-04-16 03:35:15', 'Complete'),
(48, 2, 2000, 541713844, 1, '2024-04-17 07:02:43', 'pending'),
(49, 2, 39893, 1007407133, 2, '2024-08-26 14:14:20', 'pending'),
(50, 2, 900, 917706011, 1, '2024-08-26 14:20:48', 'pending'),
(51, 2, 900, 1247825589, 1, '2024-08-26 15:04:03', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

DROP TABLE IF EXISTS `user_payments`;
CREATE TABLE IF NOT EXISTS `user_payments` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `invoice_number` int NOT NULL,
  `amount` int NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(13, 11, 318376457, 3499, 'Cash on Delivery', '0000-00-00 00:00:00'),
(37, 42, 527203029, 17495, 'Cash on Delivery', '0000-00-00 00:00:00'),
(42, 46, 1407437910, 3499, 'Cash on Delivery', '0000-00-00 00:00:00'),
(40, 45, 269868561, 1500, 'Cash on Delivery', '0000-00-00 00:00:00'),
(38, 43, 2122871636, 1500, 'Cash on Delivery', '0000-00-00 00:00:00'),
(39, 44, 122073249, 3499, 'Cash on Delivery', '0000-00-00 00:00:00'),
(35, 40, 839581885, 3499, 'Cash on Delivery', '0000-00-00 00:00:00'),
(29, 33, 619179509, 3499, 'Cash on Delivery', '0000-00-00 00:00:00'),
(41, 47, 1464673259, 17495, 'Cash on Delivery', '0000-00-00 00:00:00'),
(36, 41, 1871734485, 599, 'Cash on Delivery', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

DROP TABLE IF EXISTS `user_table`;
CREATE TABLE IF NOT EXISTS `user_table` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(2, 'vaishnavi', 'vaishnavi12@gmail.com', '$2y$10$nFVHtIfl5pq/lKm8yahZX.Hu0Qd7FlUIASSWXrcna9c51ah1.iGq6', 'logo.jpg', '::1', 'pune', '7620711357'),
(3, 'arshiya', 'arshiya667@gmail.com', '$2y$10$NJnAgEHKlxCq8gw3KlWpb.01uxA4xsFiNWQJlD2BlEVWkLSAqNlnC', 'bg.jpg', '::1', 'pune', '1234567898'),
(4, 'vish', 'vish9@gmail.com', '$2y$10$a/A1pxjZQenMunahS9fcsOXALfSu.O4tOwiiEZfAWrL5DLDblwiXG', 'butterfly logo.png', '::1', 'lohegoan', '9922964814');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
