-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2024 at 03:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authen`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Electronics'),
(2, 'Food  Beverages'),
(3, 'Health and Beauty'),
(4, 'Home and Living'),
(5, 'Toy and Collecible');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float NOT NULL,
  `product_unit` int(100) NOT NULL,
  `category` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_unit`, `category`) VALUES
(1, 'Smartphone', 15000, 50, 1),
(2, 'Laptop', 30000, 30, 1),
(3, 'LED TV', 20000, 20, 1),
(4, 'Wireless Headphones', 3000, 100, 1),
(5, 'Digital Camera', 25000, 15, 1),
(6, 'Air Conditioner', 35000, 10, 1),
(7, 'Smartwatch', 8000, 40, 1),
(8, 'Gaming Console', 15000, 25, 1),
(9, 'Vacuum Cleaner', 5000, 35, 1),
(10, 'Bluetooth Speaker', 4000, 60, 1),
(11, 'Rice', 50, 200, 2),
(12, 'Fresh Milk', 20, 150, 2),
(13, 'Fruit Juice', 30, 100, 2),
(14, 'Bread', 25, 120, 2),
(15, 'Coffee', 100, 80, 2),
(16, 'Mineral Water', 10, 300, 2),
(17, 'Chocolate', 50, 90, 2),
(18, 'Snacks', 20, 200, 2),
(19, 'Seasoning Sauce', 60, 110, 2),
(20, 'Yogurt', 25, 130, 2),
(21, 'Moisturizer', 500, 60, 3),
(22, 'Shampoo', 150, 70, 3),
(23, 'Sunscreen', 300, 50, 3),
(24, 'Lipstick', 400, 80, 3),
(25, 'Perfume', 1200, 30, 3),
(26, 'Vitamins', 800, 100, 3),
(27, 'Compact Powder', 350, 60, 3),
(28, 'Body Lotion', 250, 90, 3),
(29, 'Face Mask', 100, 120, 3),
(30, 'Facial Cleanser', 200, 80, 3),
(31, 'Bed Sheets', 1500, 40, 4),
(32, 'Pillows', 700, 50, 4),
(33, 'Lamps', 2000, 30, 4),
(34, 'Coffee Table', 3000, 20, 4),
(35, 'Office Chair', 5000, 15, 4),
(36, 'Kitchen Utensils', 800, 100, 4),
(37, 'Curtains', 1200, 40, 4),
(38, 'Carpets', 4000, 25, 4),
(39, 'Wardrobe', 7000, 10, 4),
(40, 'Washing Machine', 15000, 10, 4),
(41, 'Lego Sets', 2500, 50, 5),
(42, 'Barbie Dolls', 1200, 40, 5),
(43, 'Toy Cars', 500, 100, 5),
(44, 'Board Games', 1500, 30, 5),
(45, 'Action Figures', 2000, 60, 5),
(46, 'Jigsaw Puzzles', 800, 80, 5),
(47, 'Remote Control Robots', 3000, 20, 5),
(48, 'Comic Books', 150, 200, 5),
(49, 'Plush Toys', 700, 90, 5),
(50, 'Trading Cards', 300, 100, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'taesaksit', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
