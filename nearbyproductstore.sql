-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 08:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nearbyproductstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'sawai', 'aaa@gmail.com', '12345678'),
(30, 'Rudhra Singh', 'sawairazz@gmail.com', '13579012');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `name`, `price`, `description`, `product_image`, `shop_id`) VALUES
(115, 'Pen', '20', 'Our seamless online and in-store experiences allow you to shop, make returns,\r\nDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'art-1867899_1280.jpg', 4),
(116, 'Pencil', '15', 'Model Name:\r\nFUSION PENCIL+DOMS ZOOM +DOMS NEON EXTRA DARK PENCIL SET (PACK OF 3 )\r\nSeries:\r\nEXTRA DARK PENCIL\r\n\r\n', 'colored-pencils-168391_1280.jpg', 4),
(122, 'Pendrive', '350', 'USB 2.0|64 GB\r\nPlastic\r\nFor Laptop, Audio Player, Tablet, Desktop Computer, Television\r\nColor:Black', 'usb-key-1212110_1280.jpg', 4),
(125, 'Pen', '25', 'this is a brand one value', 'pen-631321_1280.jpg', 30),
(126, 'Pencil', '2', 'rose gold flower', 'pencil-1486278_1280.jpg', 30),
(136, 'Pendrive', '200', 'Our seamless online and in-store experiences allow you to shop, make returns, and earn rewards on all your purchases across brands online or in-store.', 'memory-stick-1267620_1280.jpg', 30),
(160, 'Pencil', '10', 'nice pen', 'idea-1876659_1280.jpg', 33),
(161, 'Ice cream', '80', 'nice flower', 'ice-2166149_1280.jpg', 33),
(162, 'Pencil', '10', 'nice pen dear', 'planner-4884740_1280.jpg', 34),
(163, 'Ice cream', '65', 'nice flower dear', 'sweet-3244685_1280.jpg', 34),
(164, 'Pendrive', '399', 'this is awesome', 'data-transfer-3199488_1280.jpg', 33),
(165, 'Pendrive', '150', 'this is awesome', 'usb-5029286_1280.jpg', 34),
(174, 'Book', '199', 'Atwood\'s classic dystopian novel of a terrifying (and terrifyingly plausible) future America has rewarded rereading like no other book; I\'ve probably read it 30 times by now. The world of the narrator, Offred (from \"Of Fred\" — women no longer have their own names), is chilling, ', 'books-2211342_1280.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `shopcategory`
--

CREATE TABLE `shopcategory` (
  `id` int(20) NOT NULL,
  `shop_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopcategory`
--

INSERT INTO `shopcategory` (`id`, `shop_category`) VALUES
(1, 'Hardware Store'),
(2, 'Grocery Store'),
(3, 'Electronic Store'),
(5, 'Medical Store'),
(11, 'General Store'),
(12, 'Dairy'),
(13, 'Fancy Store'),
(14, 'Bakery'),
(15, 'Stationary'),
(16, 'Cloth Store');

-- --------------------------------------------------------

--
-- Table structure for table `shopregistration`
--

CREATE TABLE `shopregistration` (
  `id` int(11) NOT NULL,
  `shopname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `category` char(100) NOT NULL,
  `opening_time` time NOT NULL,
  `closing_time` time NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL,
  `shopimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopregistration`
--

INSERT INTO `shopregistration` (`id`, `shopname`, `email`, `password`, `mobile`, `category`, `opening_time`, `closing_time`, `latitude`, `longitude`, `shopimage`) VALUES
(4, 'Tarun Stationary', 'ss@gmail.com', '1234567890', 7743890762, 'Stationary', '04:00:00', '17:00:00', 26.215450, 73.025894, 'books-2211342_1280.jpg'),
(30, 'Mension Store', 'me@gmail.com', '87654321', 8967567890, 'Stationary', '10:45:00', '20:30:00', 26.215450, 73.025894, 'store-832188_1280.jpg'),
(33, 'Megha Stationary', 'mg@gmail.com', '12345678', 5647839201, 'Stationary', '04:32:00', '16:27:00', 27.207006, 73.742294, 'books-2211342_1280.jpg'),
(34, 'Shyam Store', 'sy@gmail.com', '12345678', 5647839201, 'Cloth Store', '04:32:00', '16:27:00', 25.771315, 73.323685, 'store-984393_1280.jpg'),
(38, 'Trendy Store', 'trendy@gmail.com', '12345678', 9078006753, 'Cloth Store', '02:36:00', '16:56:00', 26.215416, 73.025864, 'store-984393_1280.jpg'),
(39, 'Krishna Electronics', 'ke@gmail.com', '12345678', 5647839201, 'Electronic Store', '03:24:00', '16:53:00', 26.215452, 73.025902, 'usb-key-1212110_1280.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

CREATE TABLE `user_messages` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `name`, `email`, `message`) VALUES
(6, 'vabhav', 'vb@gmail.com', 'hello,\r\nThere is a problem while getting location. hello,\r\nThere is a problem while getting location. hello,\r\nThere is a problem while getting location. hello,\r\nThere is a problem while getting location. hello,\r\nThere is a problem while getting location. hello,\r\nThere is a problem while getting location.'),
(7, 'shiv singh', 'singht1212@gmail.com', 'hello, how are you.'),
(8, 'Nick', 'nick23@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n\r\n\r\n'),
(10, 'Alex', 'ak23@gmail.com', 'There is something problem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `shopcategory`
--
ALTER TABLE `shopcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopregistration`
--
ALTER TABLE `shopregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `shopcategory`
--
ALTER TABLE `shopcategory`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `shopregistration`
--
ALTER TABLE `shopregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
