-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2026 at 05:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instambay_foodhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory_table`
--

CREATE TABLE `inventory_table` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_stock` int(11) NOT NULL,
  `added_at` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory_table`
--

INSERT INTO `inventory_table` (`item_id`, `item_name`, `item_stock`, `added_at`, `added_by`) VALUES
(54, 'Coke Mismo', 207, '2026-03-26 11:44:08', 2),
(55, 'Coke Sakto', 121, '2026-03-26 11:44:22', 2),
(56, 'Siopao Chicken', 92, '2026-03-26 11:45:56', 2),
(57, 'Siopao Pork', 65, '2026-03-26 11:45:56', 2),
(58, 'Siomai Beef', 64, '2026-03-26 11:45:56', 2),
(59, 'Siomai Japanese', 93, '2026-03-26 11:45:56', 2),
(60, 'Siomai Pork', 85, '2026-03-26 11:45:56', 2),
(61, 'Siomai Chicken', 83, '2026-03-26 11:45:56', 2),
(62, 'Fishball', 70, '2026-03-26 11:45:56', 2),
(63, 'Slice Cheese', 79, '2026-03-26 11:45:56', 2),
(64, 'Cheese Stick', 90, '2026-03-26 11:45:56', 2),
(65, 'Squid Ball', 80, '2026-03-26 11:45:56', 2),
(66, 'Kikiam', 86, '2026-03-26 11:45:56', 2),
(67, 'Lumpia', 51, '2026-03-26 11:45:56', 2),
(68, 'Ham', 98, '2026-03-26 11:45:56', 2),
(69, 'Egg', 62, '2026-03-26 11:45:56', 2),
(70, 'Patty Burger', 95, '2026-03-26 11:45:56', 2),
(71, 'Crispy Burger', 70, '2026-03-26 11:45:56', 2),
(72, 'Siomai Burger (Beef)', 63, '2026-03-26 11:45:56', 2),
(73, 'Shawarma Rice', 85, '2026-03-26 11:45:56', 2),
(74, 'Chicken Pastil', 73, '2026-03-26 11:45:56', 2),
(75, 'Torikatsu', 61, '2026-03-26 11:45:56', 2),
(76, 'Nuggets', 58, '2026-03-26 11:45:56', 2),
(77, 'Nachos Beef', 59, '2026-03-26 11:45:56', 2),
(78, 'Cup Noodles', 61, '2026-03-26 11:45:56', 2),
(79, 'Creamy Seafood', 55, '2026-03-26 11:45:56', 2),
(80, 'Seafood', 99, '2026-03-26 11:45:56', 2),
(81, 'Yakisoba', 82, '2026-03-26 11:45:56', 2),
(82, 'Homi Special', 90, '2026-03-26 11:45:56', 2),
(83, 'Beef', 56, '2026-03-26 11:45:56', 2),
(84, 'Chicken', 96, '2026-03-26 11:45:56', 2),
(85, 'Spicy Hot Beef', 68, '2026-03-26 11:45:56', 2),
(86, 'Batchoy', 55, '2026-03-26 11:45:56', 2),
(87, 'Soda Drinks', 87, '2026-03-26 11:45:56', 2),
(88, 'Sprite Sakto', 94, '2026-03-26 11:45:56', 2),
(89, 'Royal Sakto', 77, '2026-03-26 11:45:56', 2),
(90, 'Mt. Dew', 98, '2026-03-26 11:45:56', 2),
(91, 'Mineral Water 500Ml', 55, '2026-03-26 11:45:56', 2),
(92, 'Mineral Water 330Ml', 71, '2026-03-26 11:45:56', 2),
(93, 'Cups', 71, '2026-03-26 11:45:56', 2),
(94, '12/Oz Cup', 58, '2026-03-26 11:45:56', 2),
(95, '16/Oz Cup', 81, '2026-03-26 11:45:56', 2),
(96, '22/Oz Cup', 72, '2026-03-26 11:45:56', 2),
(97, 'Pancit Canton - Chilimansi Big', 92, '2026-03-26 11:48:46', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE `products_table` (
  `product_id` int(11) NOT NULL,
  `product_type` enum('Single','Combo') DEFAULT 'Single',
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_solds` int(11) DEFAULT 0,
  `product_image` varchar(255) DEFAULT NULL,
  `added_at` datetime DEFAULT current_timestamp(),
  `added_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`product_id`, `product_type`, `product_name`, `product_price`, `product_solds`, `product_image`, `added_at`, `added_by`) VALUES
(6, 'Single', 'Pancit Canton Big - Chilimansi', 30.00, 4, 'product_image_1774496975_69c4accfaf488.png', '2026-03-26 11:49:35', 2),
(7, 'Combo', 'Canton With Coke', 50.00, 4, 'product_image_1774497117_69c4ad5db48d2.png', '2026-03-26 11:51:57', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_items_table`
--

CREATE TABLE `product_items_table` (
  `product_item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `added_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_items_table`
--

INSERT INTO `product_items_table` (`product_item_id`, `product_id`, `item_id`, `quantity`, `added_at`) VALUES
(12, 6, 94, 1, '2026-03-26 11:49:35'),
(13, 6, 97, 1, '2026-03-26 11:49:35'),
(14, 7, 94, 1, '2026-03-26 11:51:57'),
(15, 7, 97, 1, '2026-03-26 11:51:57'),
(16, 7, 54, 1, '2026-03-26 11:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `transactions_table`
--

CREATE TABLE `transactions_table` (
  `transaction_id` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `processed_by` int(11) DEFAULT NULL,
  `transaction_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions_table`
--

INSERT INTO `transactions_table` (`transaction_id`, `total_amount`, `processed_by`, `transaction_date`) VALUES
('TXN-20260326-8000', 30.00, 2, '2026-03-26 11:50:07'),
('TXN-20260326-9715', 290.00, 2, '2026-03-26 11:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items_table`
--

CREATE TABLE `transaction_items_table` (
  `transaction_item_id` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `added_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_items_table`
--

INSERT INTO `transaction_items_table` (`transaction_item_id`, `transaction_id`, `product_id`, `product_quantity`, `total_price`, `added_at`) VALUES
(18, 'TXN-20260326-8000', 6, 1, 30.00, '2026-03-26 11:50:07'),
(19, 'TXN-20260326-9715', 7, 4, 200.00, '2026-03-26 11:52:33'),
(20, 'TXN-20260326-9715', 6, 3, 90.00, '2026-03-26 11:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files_table`
--

CREATE TABLE `uploaded_files_table` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_size` decimal(10,2) DEFAULT NULL,
  `uploaded_at` datetime DEFAULT current_timestamp(),
  `uploaded_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploaded_files_table`
--

INSERT INTO `uploaded_files_table` (`file_id`, `file_name`, `file_size`, `uploaded_at`, `uploaded_by`) VALUES
(2, 'InventoryStock_1774260131_69c10fa3c647a.xlsx', 0.01, '2026-03-23 18:02:11', NULL),
(3, 'InventoryStock_1774332121_69c228d9008cb.xlsx', 0.01, '2026-03-24 14:02:01', NULL),
(4, 'InventoryStock_1774496752_69c4abf07b128.xlsx', 0.01, '2026-03-26 11:45:56', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Others') DEFAULT 'Others',
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_type` enum('Admin','Staff') DEFAULT 'Admin',
  `profile_picture` varchar(255) DEFAULT NULL,
  `reset_password_token` varchar(255) DEFAULT NULL,
  `reset_token_expiry` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `first_name`, `middle_name`, `last_name`, `gender`, `email_address`, `password`, `phone_number`, `user_address`, `user_type`, `profile_picture`, `reset_password_token`, `reset_token_expiry`, `created_at`, `updated_at`) VALUES
(2, 'Zylette', '', 'Dulana', 'Female', 'zyle.dulana.ui@phinmaed.com', '$2y$10$eaooYLbCp/.9ECRnbNeqg.8conMwDRMEPLkR2w5PubaRlDT9tfMua', '091234567890', 'Iloilo City, Iloilo', 'Admin', NULL, NULL, NULL, '2026-03-26 02:59:35', '2026-03-26 02:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs_table`
--

CREATE TABLE `user_logs_table` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `activity_description` text DEFAULT NULL,
  `activity_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logs_table`
--

INSERT INTO `user_logs_table` (`log_id`, `user_id`, `activity`, `activity_description`, `activity_date`) VALUES
(46, 2, 'Log in', 'Logged in', '2026-03-26 02:59:51'),
(47, 2, 'Log in', 'Logged in', '2026-03-26 03:00:52'),
(48, 2, 'Log in', 'Logged in', '2026-03-26 11:39:01'),
(49, 2, 'Log in', 'Logged in', '2026-03-26 11:40:34'),
(50, 2, 'Add Item', 'Added a new item: Coke Mismo', '2026-03-26 11:44:08'),
(51, 2, 'Add Item', 'Added a new item: Coke Sakto', '2026-03-26 11:44:22'),
(52, 2, 'Add Item', 'Added items via upload file', '2026-03-26 11:45:56'),
(53, 2, 'Add Item', 'Added a new item: Pancit Canton - Chilimansi Big', '2026-03-26 11:48:46'),
(54, 2, 'Added a product', 'Added a new product: Pancit Canton Big - Chilimansi', '2026-03-26 11:49:35'),
(55, 2, 'Add Transaction', 'Added a new transaction: TXN-20260326-8000', '2026-03-26 11:50:07'),
(56, 2, 'Added a product', 'Added a new product: Canton With Coke', '2026-03-26 11:51:57'),
(57, 2, 'Add Transaction', 'Added a new transaction: TXN-20260326-9715', '2026-03-26 11:52:33'),
(58, 2, 'Log in', 'Logged in', '2026-03-26 11:55:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory_table`
--
ALTER TABLE `inventory_table`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `product_items_table`
--
ALTER TABLE `product_items_table`
  ADD PRIMARY KEY (`product_item_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `transactions_table`
--
ALTER TABLE `transactions_table`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `processed_by` (`processed_by`);

--
-- Indexes for table `transaction_items_table`
--
ALTER TABLE `transaction_items_table`
  ADD PRIMARY KEY (`transaction_item_id`),
  ADD KEY `transaction_id` (`transaction_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `uploaded_files_table`
--
ALTER TABLE `uploaded_files_table`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `user_logs_table`
--
ALTER TABLE `user_logs_table`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory_table`
--
ALTER TABLE `inventory_table`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_items_table`
--
ALTER TABLE `product_items_table`
  MODIFY `product_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaction_items_table`
--
ALTER TABLE `transaction_items_table`
  MODIFY `transaction_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `uploaded_files_table`
--
ALTER TABLE `uploaded_files_table`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_logs_table`
--
ALTER TABLE `user_logs_table`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory_table`
--
ALTER TABLE `inventory_table`
  ADD CONSTRAINT `inventory_table_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users_table` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `products_table`
--
ALTER TABLE `products_table`
  ADD CONSTRAINT `products_table_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users_table` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `product_items_table`
--
ALTER TABLE `product_items_table`
  ADD CONSTRAINT `product_items_table_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products_table` (`product_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_items_table_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `inventory_table` (`item_id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions_table`
--
ALTER TABLE `transactions_table`
  ADD CONSTRAINT `transactions_table_ibfk_1` FOREIGN KEY (`processed_by`) REFERENCES `users_table` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `transaction_items_table`
--
ALTER TABLE `transaction_items_table`
  ADD CONSTRAINT `transaction_items_table_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `transactions_table` (`transaction_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_items_table_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products_table` (`product_id`);

--
-- Constraints for table `uploaded_files_table`
--
ALTER TABLE `uploaded_files_table`
  ADD CONSTRAINT `uploaded_files_table_ibfk_1` FOREIGN KEY (`uploaded_by`) REFERENCES `users_table` (`user_id`) ON DELETE SET NULL;

--
-- Constraints for table `user_logs_table`
--
ALTER TABLE `user_logs_table`
  ADD CONSTRAINT `user_logs_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users_table` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
