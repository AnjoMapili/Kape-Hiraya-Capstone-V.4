-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 12:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapehiraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_number` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_number`, `name`, `email`, `contact`, `address`, `date`) VALUES
(270, '101934', 'Nathan A. Mapili', 'nathan@yahoo.com', '0943135323', '536 V. Fabella St. Mandaluyong City', '2023-03-28'),
(272, '212637', 'Angelyn A. Mapili', 'angelyn_mapili18@yahoo.com', '09266345322', '536 V. Fabella St. Mandaluyong City', '2023-03-28'),
(274, '847124', 'Angelo A. Mapili', 'angelyn_mapili18@yahoo.com', '09266345322', '536 V. Fabella St. Mandaluyong City', '2023-03-30'),
(278, '635946', 'Nicole A. Borja', 'nicole_borja@yahoo.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-04-03'),
(279, '376913', 'Angelo A. Mapili', 'mapili_angelo14@gmail.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-04-03'),
(280, '354298', 'Angelo A. Mapili', 'angelyn_mapili18@yahoo.com', '09266345322', '536 V. Fabella St. Mandaluyong City', '2023-04-04'),
(281, '639431', 'Angelo A. Mapili', 'mapili_angelo14@gmail.com', '09266345322', '536 V. Fabella St. Mandaluyong City', '2023-04-04'),
(282, '676476', 'Angelo A. Mapili', 'angelyn_mapili18@yahoo.com', '09266345322', '536 V. Fabella St. Mandaluyong City', '2023-04-04'),
(283, '512257', 'Angelo A. Mapili', 'angelyn_mapili18@yahoo.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-04-04'),
(284, '959372', 'Kenly', 'Kenly@yahoo.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-04-04'),
(287, '396600', 'Angelo A. Mapili', 'mapili_angelo14@gmail.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-04-11'),
(288, '629772', 'Angelo A. Mapili', 'mapili_angelo14@gmail.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-04-11'),
(289, '908813', 'Nathan F. Mapili', 'nathan@yahoo.com', '09266403739', '536 V. Fabella St. Mandaluyong City', '2023-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `qty_250g` int(11) DEFAULT NULL,
  `qty_500g` int(11) DEFAULT NULL,
  `qty_1kg` int(11) DEFAULT NULL,
  `price_250g` decimal(18,2) DEFAULT NULL,
  `price_500g` decimal(18,2) DEFAULT NULL,
  `price_1kg` decimal(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `qty_250g`, `qty_500g`, `qty_1kg`, `price_250g`, `price_500g`, `price_1kg`) VALUES
(37, 'Benguet Blend', 20, 8, 5, '120.00', '175.00', '325.00'),
(38, 'Barako Blend', 20, 20, 20, '120.00', '175.00', '325.00'),
(39, 'Kalinga Robusta', 20, 20, 20, '120.00', '175.00', '325.00'),
(40, 'Robusta Batangas', 20, 20, 20, '120.00', '175.00', '325.00'),
(41, 'Premium Barako', 20, 20, 20, '125.00', '185.00', '345.00'),
(42, 'Sagada Arabica', 20, 20, 20, '150.00', '240.00', '450.00'),
(43, 'Italian Expresso', 20, 20, 20, '140.00', '220.00', '420.00'),
(44, 'Expresso Blend', 20, 20, 20, '138.00', '215.00', '405.00'),
(45, 'French Roast', 20, 20, 20, '125.00', '180.00', '340.00'),
(46, 'Arabica House Blend', 20, 20, 20, '140.00', '220.00', '410.00'),
(47, 'Benguet Arabica', 20, 20, 20, '155.00', '240.00', '450.00'),
(48, 'Premium Benguet Arabica', 20, 20, 20, '190.00', '325.00', '615.00'),
(49, 'Hazelnut (FC)', 20, 20, 20, '140.00', '225.00', '395.00'),
(50, 'Mocha (FC)', 20, 20, 20, '140.00', '225.00', '395.00'),
(51, 'Macadamia (FC)', 17, 20, 20, '140.00', '225.00', '395.00'),
(52, 'Caramel (FC)', 20, 20, 20, '140.00', '225.00', '395.00'),
(54, 'Butterscotch (FC)', 40, 30, 20, '140.00', '225.00', '395.00'),
(55, 'Irish Cream (FC)', 25, 30, 15, '140.00', '225.00', '395.00'),
(56, 'Hazelnut Vanilla (FC)', 15, 20, 30, '140.00', '225.00', '395.00'),
(57, 'Double Choco (FC)', 20, 60, 10, '140.00', '225.00', '395.00'),
(58, 'Choco Milano (FC)', 25, 25, 15, '140.00', '225.00', '395.00'),
(59, 'Salted Caramel (FC)', 20, 30, 20, '140.00', '225.00', '395.00'),
(60, 'French Vanilla (FC)', 35, 20, 10, '140.00', '225.00', '395.00'),
(64, 'Vanilla (FC)', 20, 20, 20, '140.00', '225.00', '395.00');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_number` varchar(45) DEFAULT NULL,
  `customer_name` varchar(45) DEFAULT NULL,
  `customer_address` varchar(45) DEFAULT NULL,
  `customer_contact_number` varchar(45) DEFAULT NULL,
  `customer_payment_method` varchar(45) DEFAULT NULL,
  `item_flavor` varchar(45) DEFAULT NULL,
  `item_type_of_roast` varchar(45) DEFAULT NULL,
  `item_type_of_grind` varchar(45) DEFAULT NULL,
  `item_quantity` int(11) DEFAULT NULL,
  `item_grams` varchar(45) DEFAULT NULL,
  `item_price` decimal(18,2) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_number`, `customer_name`, `customer_address`, `customer_contact_number`, `customer_payment_method`, `item_flavor`, `item_type_of_roast`, `item_type_of_grind`, `item_quantity`, `item_grams`, `item_price`, `status`, `created_at`) VALUES
(107, '623521', 'Nathan A. Mapili', '536 V. Fabella St. Mandaluyong City', '0943135323', 'Gcash', 'Vanilla (FC)', 'Medium Dark Roast', 'Medium Grind', 5, '250G', '750.00', 'Pending', '2023-04-07 02:46:52'),
(108, '766056', 'Angelo A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266345322', 'Cash', 'Vanilla (FC)', 'Medium Roast', 'Coarse Grind', 1, '250G', '150.00', 'Pending', '2023-04-07 02:49:43'),
(110, '386270', 'Nathan A. Mapili', '536 V. Fabella St. Mandaluyong City', '0943135323', 'Cash', 'Vanilla (FC)', 'Medium Roast', 'Medium Coarse Grind', 1, '250G', '150.00', 'Pending', '2023-04-10 17:30:39'),
(111, '279506', 'Angelo A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266345322', 'Cash', 'Vanilla (FC)', 'Light Roast', 'Medium Coarse Grind', 1, '250G', '150.00', 'Pending', '2023-04-10 17:31:55'),
(112, '279506', 'Angelo A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266345322', 'Cash', 'McDo', 'Medium Roast', 'Medium Fine Grind', 1, '500G', '577.00', 'Pending', '2023-04-10 17:31:55'),
(113, '406372', 'Angelo A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266345322', 'Gcash', 'Vanilla (FC)', 'Medium Dark Roast', 'Medium Coarse Grind', 1, '250G', '150.00', 'Pending', '2023-04-10 17:32:49'),
(114, '406372', 'Angelo A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266345322', 'Gcash', 'McDo', 'Dark Roast', 'Medium Coarse Grind', 1, '250G', '250.00', 'Pending', '2023-04-10 17:32:49'),
(115, '718930', '', '', '', 'Cash', 'Benguet Blend', 'Light Roast', 'Coarse Grind', 7, '500G', '1225.00', 'Pending', '2023-04-10 18:29:31'),
(117, '949305', 'Kenly', '536 V. Fabella St. Mandaluyong City', '09266403739', 'Gcash', 'Benguet Blend', 'Light Roast', 'Medium Coarse Grind', 1, '250G', '120.00', 'Pending', '2023-04-10 20:06:05'),
(118, '620649', 'Angelo A. Mapili', '536 V. Fabella St. Mandaluyong City', '09266345322', 'Gcash', 'Vanilla (FC)', 'Light Roast', 'Medium Coarse Grind', 1, '250G', '100.00', 'Pending', '2023-04-10 23:50:46'),
(121, '776483', 'Nathan A. Mapili', '536 V. Fabella St. Mandaluyong City', '0943135323', 'Gcash', 'Macadamia (FC)', 'Light Roast', 'Medium Coarse Grind', 1, '250G', '140.00', 'Pending', '2023-04-11 00:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `typeofgrind`
--

CREATE TABLE `typeofgrind` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeofgrind`
--

INSERT INTO `typeofgrind` (`id`, `name`) VALUES
(1, 'Coarse Grind'),
(2, 'Medium Coarse Grind'),
(3, 'Medium Grind'),
(4, 'Medium Fine Grind'),
(5, 'Fine Grind');

-- --------------------------------------------------------

--
-- Table structure for table `typeofroast`
--

CREATE TABLE `typeofroast` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeofroast`
--

INSERT INTO `typeofroast` (`id`, `name`) VALUES
(1, 'Light Roast'),
(2, 'Medium Roast'),
(3, 'Medium Dark Roast'),
(4, 'Dark Roast');

-- --------------------------------------------------------

--
-- Table structure for table `uom`
--

CREATE TABLE `uom` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uom`
--

INSERT INTO `uom` (`id`, `name`) VALUES
(4, '250G'),
(5, '500G'),
(6, '1KG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date_created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `status`, `date_created`) VALUES
(5, NULL, 'Yan', '$2y$10$ebs9sn.ocRF0jlNGhulYxerKkjtBn6lYq2sqsFxoFGxdfePoF7Jpm', NULL, NULL),
(6, NULL, 'admin', '$2y$10$9IrTthQ7Ju7Fg8ESD9ptQu31pAjX.cXjWxmPV9BZyONeoveyNClgi', NULL, NULL),
(7, NULL, 'anjo123', '123', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_products_name` (`name`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_transactions_item_flavor` (`item_flavor`);

--
-- Indexes for table `typeofgrind`
--
ALTER TABLE `typeofgrind`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `typeofroast`
--
ALTER TABLE `typeofroast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uom`
--
ALTER TABLE `uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `typeofgrind`
--
ALTER TABLE `typeofgrind`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `typeofroast`
--
ALTER TABLE `typeofroast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uom`
--
ALTER TABLE `uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
