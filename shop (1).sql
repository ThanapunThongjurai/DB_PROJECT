-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 10:42 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(4) NOT NULL COMMENT 'รหัสสินค้า',
  `item_name` text NOT NULL,
  `item_price` int(10) NOT NULL COMMENT 'ราคา',
  `item_type` int(2) NOT NULL COMMENT 'ประเภท',
  `item_disc` text NOT NULL COMMENT 'คำอธิบาย',
  `item_preview` mediumtext NOT NULL COMMENT 'คำอธิบายแบบย่อ',
  `item_amount` int(4) NOT NULL COMMENT 'จำนวน',
  `imagelocation` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `item_name`, `item_price`, `item_type`, `item_disc`, `item_preview`, `item_amount`, `imagelocation`) VALUES
(2, '3', 2, 2, '3', '2', 2, '2.png'),
(3, '3', 4, 3, '4', '3', 3, '3.png'),
(7, '7', 7, 7, '7', '7', 7, '7.png'),
(8, '8', 8, 8, '8', '8', 8, '8.png'),
(9, '9', 9, 9, '9', '9', 9, '9.png');

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `item_type_id` int(3) NOT NULL COMMENT 'หมายเลข',
  `item_type_name` varchar(16) NOT NULL COMMENT 'ชื่อ บ ขนส่ง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(4) NOT NULL,
  `order_no` int(4) NOT NULL,
  `order_username` int(4) NOT NULL,
  `pay_id` int(4) NOT NULL,
  `track_id` int(4) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(4) NOT NULL,
  `pay_username` int(4) NOT NULL COMMENT 'คนจ่ายเงิน',
  `pay_status` enum('wait','pay','cancel') NOT NULL,
  `pay_price` int(10) DEFAULT NULL,
  `pay_time` datetime(6) DEFAULT NULL,
  `payimagelocation` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_username`, `pay_status`, `pay_price`, `pay_time`, `payimagelocation`) VALUES
(21, 0, 'wait', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `track_id` int(4) NOT NULL,
  `track_username` int(4) NOT NULL,
  `track_owner` int(2) DEFAULT NULL,
  `track_no` varchar(20) DEFAULT NULL,
  `track_status` enum('wait','pay','send','cancel') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`track_id`, `track_username`, `track_owner`, `track_no`, `track_status`) VALUES
(9, 0, NULL, NULL, 'wait');

-- --------------------------------------------------------

--
-- Table structure for table `track_owner_id`
--

CREATE TABLE `track_owner_id` (
  `track_owner_id` int(2) NOT NULL,
  `track_owner_name` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track_owner_id`
--

INSERT INTO `track_owner_id` (`track_owner_id`, `track_owner_name`) VALUES
(1, 'KERRY'),
(2, 'FLASH'),
(3, 'EMS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_username` varchar(16) NOT NULL COMMENT 'ชื่อผู้ใช่',
  `user_password` varchar(16) NOT NULL COMMENT 'รหัสผ่าน',
  `user_fullname` varchar(256) NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `user_address` text NOT NULL COMMENT 'ที่อยู่',
  `user_email` text NOT NULL COMMENT 'email',
  `user_tel` text NOT NULL COMMENT 'เบอร์โทร',
  `user_status` varchar(1) NOT NULL COMMENT 'สถานะบัญชีผู้ใช้'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_username`, `user_password`, `user_fullname`, `user_address`, `user_email`, `user_tel`, `user_status`) VALUES
('root', 'root', 'Thanaput Thongjurai', 'บ้านไกล', '@pornhun', '0942860030', '1'),
('root2', 'root2', 'root2', '0', '', '0', '0'),
('root3', 'root3', 'root3', '0', '', '0', '0'),
('123', '123', '123', '123', '123@gmail.com', '123', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `item_type`
--
ALTER TABLE `item_type`
  ADD PRIMARY KEY (`item_type_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`track_id`);

--
-- Indexes for table `track_owner_id`
--
ALTER TABLE `track_owner_id`
  ADD PRIMARY KEY (`track_owner_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(4) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `item_type_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'หมายเลข';

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `track_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `track_owner_id`
--
ALTER TABLE `track_owner_id`
  MODIFY `track_owner_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
