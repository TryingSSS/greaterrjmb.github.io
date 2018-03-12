-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 07:50 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
`brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_active` int(11) NOT NULL DEFAULT '0',
  `brand_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_active`, `brand_status`) VALUES
(14, 'Samsung', 1, 1),
(15, 'Panasonic', 1, 1),
(16, 'Sanyo', 1, 1),
(17, 'Sharp', 1, 1),
(18, 'Lenovo', 1, 1),
(19, 'LG', 1, 1),
(20, 'Standard', 1, 1),
(21, 'TCL', 1, 1),
(39, 'Snow', 1, 1),
(40, 'Test Brand', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`categories_id` int(11) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT '0',
  `categories_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_active`, `categories_status`) VALUES
(9, 'Computers & Tablets', 1, 1),
(10, 'Televisions & Audio', 1, 1),
(11, 'Air Conditioning & Fans', 1, 1),
(12, 'Home Appliances', 1, 1),
(13, 'Furnitures', 1, 1),
(14, 'Test Category', 2, 2),
(15, 'gh', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
`history_id` int(11) NOT NULL,
  `process` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date_executed` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `process`, `username`, `date_executed`) VALUES
(78, 'User Added: TestUsername', 'admin', '2017-08-04 20:07:30 PM PHT'),
(80, 'User Deleted: TestUsername', 'admin', '2017-08-04 20:07:46 PM PHT'),
(82, 'User Added: Test', 'admin', '2017-08-04 20:14:04 PM PHT'),
(83, 'Brand Added: Test Brand', 'Test', '2017-08-04 20:14:58 PM PHT'),
(84, 'Brand Updated: Test Brand', 'Test', '2017-08-04 20:15:06 PM PHT'),
(85, 'Brand Deleted: Test Brand', 'Test', '2017-08-04 20:15:11 PM PHT'),
(86, 'Product Updated: TCL L50E5000F3DE 3D LED TV', 'admin', '2017-08-04 20:36:54 PM PHT'),
(87, 'Product Updated: Samsung PS43F4000', 'admin', '2017-08-04 20:37:11 PM PHT'),
(88, 'Brand Updated: Samsung', 'admin', '2017-08-04 20:37:34 PM PHT'),
(89, 'Product Updated: Samsung PS43F4000', 'admin', '2017-08-04 20:37:46 PM PHT'),
(92, 'User Logged Out: admin', 'admin', '2017-08-04 21:04:22 PM PHT'),
(103, 'Added order : Name = Jane Doe, Total = 22958.88', 'admin', '2017-08-04 21:50:33 PM PHT'),
(104, 'Payment Updated: Name:Jane Doe Amount Paid: 3000', 'admin', '2017-08-04 21:52:16 PM PHT'),
(105, 'Added order : Name = Sam Smith, Total = 22958.88', 'admin', '2017-08-04 22:06:38 PM PHT'),
(106, 'Payment Updated: Name:Sam Smith, Amount Paid: 2000', 'admin', '2017-08-04 22:08:30 PM PHT'),
(107, 'Added order : Name = Anna Collins, Total = 48716.6', 'admin', '2017-08-04 23:03:51 PM PHT'),
(108, 'Payment Updated: Name:Sam Smith, Amount Paid: 2000', 'admin', '2017-08-04 23:12:49 PM PHT'),
(109, 'User Logged Out: admin', 'admin', '2017-08-04 23:18:16 PM PHT'),
(110, 'User Logged In: snow', 'snow', '2017-08-04 23:18:27 PM PHT'),
(111, 'Deleted Order: Name = Anna Collins, Total = 48716.', 'snow', '2017-08-04 23:29:40 PM PHT'),
(112, 'User Logged Out: snow', 'snow', '2017-08-04 23:29:52 PM PHT'),
(113, 'User Logged In: admin', 'admin', '2017-08-04 23:29:56 PM PHT'),
(114, 'User Logged Out: admin', 'admin', '2017-08-04 23:33:58 PM PHT'),
(115, 'User Logged In: admin', 'admin', '2017-08-05 19:26:59 PM PHT'),
(116, 'Deleted Order: Name = Sam Smith, Total = 22958.88 ', 'admin', '2017-08-05 19:28:23 PM PHT'),
(117, 'User Logged In: admin', 'admin', '2017-08-10 12:40:35 PM PHT'),
(118, 'User Logged In: admin', 'admin', '2017-08-11 12:17:59 PM PHT'),
(119, 'Added purchase', 'admin', '2017-08-11 12:29:32 PM PHT'),
(120, 'Added purchase', 'admin', '2017-08-11 12:32:48 PM PHT'),
(121, 'Added purchase', 'admin', '2017-08-11 12:35:29 PM PHT'),
(122, 'Added purchase', 'admin', '2017-08-11 12:37:55 PM PHT'),
(123, 'Added order : Name = test, Total = 22958.88', 'admin', '2017-08-11 12:42:16 PM PHT'),
(124, 'Added purchase', 'admin', '2017-08-11 12:42:58 PM PHT'),
(125, 'Added purchase', 'admin', '2017-08-11 12:44:04 PM PHT'),
(126, 'Added purchase', 'admin', '2017-08-11 12:44:22 PM PHT'),
(127, 'Added purchase', 'admin', '2017-08-11 12:47:52 PM PHT'),
(128, 'Added purchase', 'admin', '2017-08-11 12:48:30 PM PHT'),
(129, 'Deleted Order: Name = test, Total = 22958.88 ', 'admin', '2017-08-11 12:49:41 PM PHT'),
(130, 'Product Added: Blender', 'admin', '2017-08-11 13:16:45 PM PHT'),
(131, 'Product Added: Blender', 'admin', '2017-08-11 13:19:48 PM PHT'),
(132, 'Product Updated: Blender', 'admin', '2017-08-11 13:20:09 PM PHT'),
(133, 'Product Updated: Blender', 'admin', '2017-08-11 13:28:04 PM PHT'),
(134, 'Product Added: Rice Cooker', 'admin', '2017-08-11 13:28:54 PM PHT'),
(135, 'User Logged In: admin', 'admin', '2017-08-11 14:43:29 PM PHT'),
(136, 'User Logged In: admin', 'admin', '2017-08-18 19:47:40 PM PHT');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `vat` varchar(255) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `due` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `client_name`, `client_contact`, `sub_total`, `vat`, `total_amount`, `discount`, `grand_total`, `paid`, `due`, `payment_type`, `payment_status`, `order_status`) VALUES
(10, '2017-08-04', 'Sam Smith', '0978563412', '22998.00', '2759.76', '25757.76', '0', '25757.76', '12000', '13757.76', 2, 4, 1),
(11, '2017-08-04', 'Jane Doe', '0926789412', '20499.00', '2459.88', '22958.88', '0', '22958.88', '6000', '16958.88', 2, 4, 1),
(12, '2017-08-05', 'Sam Smith', '0978563412', '20499.00', '2459.88', '22958.88', '0', '22958.88', '6500', '16458.88', 2, 4, 2),
(13, '2017-08-04', 'Anna Collins', '0978654321', '43497.00', '5219.64', '48716.64', '0', '48716.64', '10000', '38716.64', 2, 2, 2),
(14, '2017-08-11', 'test', 'test', '20499.00', '2459.88', '22958.88', '0', '22958.88', '12000', '10958.88', 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
`order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `order_item_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_item_id`, `order_id`, `product_id`, `quantity`, `rate`, `total`, `order_item_status`) VALUES
(18, 10, 16, '1', '22998', '22998.00', 1),
(19, 11, 15, '1', '20499', '20499.00', 1),
(20, 12, 15, '1', '20499', '20499.00', 2),
(21, 13, 15, '1', '20499', '20499.00', 2),
(22, 13, 16, '1', '22998', '22998.00', 2),
(23, 14, 15, '1', '20499', '20499.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` text NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_image`, `supplier_id`, `brand_id`, `categories_id`, `quantity`, `rate`, `active`, `status`) VALUES
(15, 'TCL L50E5000F3DE 3D LED TV', '../assests/images/stock/27569597b247659d33.jpg', 15, 21, 10, '1', '20499', 1, 1),
(16, 'Samsung PS43F4000', '../assests/images/stock/30870597b2545a0935.jpg', 16, 14, 10, '2', '22998', 1, 1),
(17, 'Toiletry Bag', '../assests/images/stock/206205982e28d53197.png', 0, 14, 13, '7', '150', 2, 2),
(18, 'Toiletry Bag', '../assests/images/stock/313635984141e3b179.png', 0, 15, 9, '5', '150', 2, 2),
(19, 'Blender', '../assests/images/stock/7043598d3dbded043.jpg', 15, 15, 12, '6', '5600', 1, 1),
(21, 'Rice Cooker', '../assests/images/stock/20251598d4096a98e4.jpg', 15, 15, 12, '7', '3500', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
`purchase_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `purchase_status` int(11) NOT NULL,
  `delivery_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `purchase_date`, `supplier_id`, `total_amount`, `purchase_status`, `delivery_status`) VALUES
(1, '2017-08-11', 16, '', 1, 1),
(2, '2017-08-11', 16, '', 1, 0),
(3, '2017-08-11', 15, '', 1, 1),
(4, '2017-08-11', 15, '', 1, 1),
(5, '2017-08-11', 16, '', 1, 1),
(6, '2017-08-11', 15, '', 1, 1),
(7, '2017-08-11', 15, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE IF NOT EXISTS `purchase_item` (
`purchase_item_id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `quantity` varchar(50) NOT NULL,
  `unitprice` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `purchase_item_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`purchase_item_id`, `purchase_id`, `product_id`, `quantity`, `unitprice`, `total`, `purchase_item_status`) VALUES
(7, 2, 15, '1', '', '', 1),
(8, 2, 16, '1', '', '', 1),
(9, 3, 15, '1', '', '', 1),
(10, 4, 15, '1', '', '', 1),
(11, 5, 15, '', '', '', 1),
(12, 6, 15, '1', '', '', 1),
(13, 7, 15, '1', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
`supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_address` varchar(255) NOT NULL,
  `supplier_contact` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`) VALUES
(15, 'Apple Inc.', 'USA', '432-9012'),
(16, 'Samsung Electronics', 'South Korea', '221-9035');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `last_log_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `role`, `status`, `last_log_date`) VALUES
(1, 'Adrian', 'Calibayan', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'adrian@gmail.com', 1, 1, '2017-08-18 19:47:40'),
(10, 'Snow', 'White', 'snow', '5f4dcc3b5aa765d61d8327deb882cf99', 'snow@gmail.com', 2, 1, '2017-08-04 23:18:27'),
(14, 'Test', 'Test', 'Test', '0cbc6611f5540bd0809a388dc95a615b', 'test@gmail.com', 2, 2, '2017-08-04 08:14:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
 ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
 ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
 ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
 ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
 ADD PRIMARY KEY (`purchase_item_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
 ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
MODIFY `purchase_item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
