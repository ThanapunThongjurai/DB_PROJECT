-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2020 at 12:35 AM
-- Server version: 10.3.23-MariaDB-0+deb10u1
-- PHP Version: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thanapun.th`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(10) NOT NULL COMMENT 'รหัสสินค้า',
  `item_name` text NOT NULL,
  `item_price` int(10) NOT NULL COMMENT 'ราคา',
  `item_type` int(2) NOT NULL COMMENT 'ประเภท',
  `item_disc` text NOT NULL COMMENT 'คำอธิบาย',
  `item_preview` mediumtext NOT NULL COMMENT 'คำอธิบายแบบย่อ',
  `item_amount` int(10) NOT NULL COMMENT 'จำนวน',
  `imagelocation` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `item_name`, `item_price`, `item_type`, `item_disc`, `item_preview`, `item_amount`, `imagelocation`) VALUES
(3, '3', 4, 2, '4', '3', 0, '3.png'),
(7, '7', 7, 7, '7', '7', 0, '7.png'),
(8, '8', 8, 8, '8', '8', 5, '8.png'),
(9, '9', 9, 9, '9', '9', 0, '9.png');

-- --------------------------------------------------------

--
-- Table structure for table `item_type`
--

CREATE TABLE `item_type` (
  `item_type_id` int(3) NOT NULL COMMENT 'หมายเลข',
  `item_type_name` varchar(16) NOT NULL COMMENT 'ชื่อ บ ขนส่ง'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_type`
--

INSERT INTO `item_type` (`item_type_id`, `item_type_name`) VALUES
(1, 'เสื้อ'),
(2, 'กางเกง'),
(3, 'ร้องเท้า'),
(4, 'กระเป๋า'),
(5, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL COMMENT 'เลขorder',
  `order_username` text NOT NULL COMMENT 'username คนซื้อ',
  `pay_id` int(10) NOT NULL COMMENT 'เลขรหัสการจ่ายเงิน',
  `track_id` int(10) NOT NULL COMMENT 'เลขติดตามพัสดุ',
  `order_date` datetime NOT NULL COMMENT 'วันที่ทำการสั่งซื้อ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_username`, `pay_id`, `track_id`, `order_date`) VALUES
(48, '0', 61, 49, '2020-10-20 21:14:24'),
(47, '0', 60, 48, '2020-10-18 22:48:28'),
(46, '0', 59, 47, '2020-10-18 16:15:23'),
(45, '0', 58, 46, '2020-10-18 15:58:28'),
(44, '0', 57, 45, '2020-10-18 14:39:38'),
(49, '123', 62, 50, '2020-10-24 00:27:21'),
(50, 'admin', 63, 51, '2020-10-24 00:33:44');

-- --------------------------------------------------------

--
-- Table structure for table `orders_no`
--

CREATE TABLE `orders_no` (
  `orders_no` int(10) NOT NULL COMMENT 'runไว้เป็น pimary เฉยๆ',
  `order_no_id` int(10) NOT NULL COMMENT 'เอาไว้เก็บ order ที่สั่ง',
  `order_no_item` int(10) NOT NULL COMMENT 'item ที่สั่ง',
  `order_no_amount` int(10) NOT NULL COMMENT 'จำนวนที่สั่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_no`
--

INSERT INTO `orders_no` (`orders_no`, `order_no_id`, `order_no_item`, `order_no_amount`) VALUES
(16, 28, 3, 1),
(17, 28, 8, 1),
(18, 29, 7, 1),
(19, 30, 7, 1),
(20, 32, 3, 1),
(21, 33, 3, 1),
(22, 34, 3, 1),
(23, 35, 3, 1),
(24, 36, 3, 1),
(25, 37, 3, 1),
(26, 38, 3, 1),
(27, 39, 3, 0),
(28, 40, 9, 4),
(29, 41, 7, 1),
(30, 42, 7, 2),
(31, 43, 7, 4),
(32, 44, 8, 1),
(33, 45, 8, 1),
(34, 46, 9, 1),
(35, 47, 12, 2),
(36, 48, 8, 1),
(37, 49, 9, 1),
(38, 50, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(4) NOT NULL,
  `pay_username` varchar(16) NOT NULL COMMENT 'คนจ่ายเงิน',
  `pay_status` enum('wait','check','pay','cancel') NOT NULL,
  `pay_price` int(10) DEFAULT NULL,
  `pay_time` datetime(6) DEFAULT NULL,
  `pay_imagelocation` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_username`, `pay_status`, `pay_price`, `pay_time`, `pay_imagelocation`) VALUES
(61, '0', 'pay', 8, '2020-10-29 21:18:00.000000', '121588820_5187923337899801_8389119168624097045_o.png'),
(57, '0', 'pay', 8, '2020-10-19 17:39:00.000000', '3.png'),
(58, '0', 'pay', 8, '2020-10-19 16:48:00.000000', '7.png'),
(59, '0', 'pay', 9, '2020-10-08 16:50:00.000000', 'Screenshot 2020-10-10 144329.png'),
(60, '0', 'pay', 24, '2020-10-19 22:52:00.000000', 'red.png'),
(62, '123', 'wait', 9, NULL, NULL),
(63, 'admin', 'wait', 27, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `track_id` int(4) NOT NULL,
  `track_username` varchar(16) NOT NULL,
  `track_owner` text DEFAULT NULL,
  `track_no` varchar(20) DEFAULT NULL,
  `track_status` enum('wait','send','cancel') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`track_id`, `track_username`, `track_owner`, `track_no`, `track_status`) VALUES
(45, '0', 'FLASH', '123456', 'send'),
(46, '0', 'KERRY', '12', 'send'),
(47, '0', 'KERRY', '1234', 'send'),
(48, '0', 'EMS', '123', 'send'),
(49, '0', NULL, NULL, 'wait'),
(50, '123', NULL, NULL, 'wait'),
(51, 'admin', NULL, NULL, 'wait');

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
  `user_fullname` text NOT NULL COMMENT 'ชื่อ-นามสกุล',
  `user_address` text NOT NULL COMMENT 'ที่อยู่',
  `user_email` text NOT NULL COMMENT 'email',
  `user_tel` text NOT NULL COMMENT 'เบอร์โทร',
  `user_status` varchar(1) NOT NULL COMMENT 'สถานะบัญชีผู้ใช้'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_username`, `user_password`, `user_fullname`, `user_address`, `user_email`, `user_tel`, `user_status`) VALUES
('root', 'root', 'Thanaput Thongjurai', 'บ้านไกล บ้านไกล', '@pornhub', '0942860030', '1'),
('root2', 'root2', 'root2', '0', '', '0', '0'),
('root3', 'root3', 'root3', '0', '', '0', '0'),
('123', '123', '123', '123', '123@gmail.com', '123', '0'),
('12345', '12345', '12345', '12345', '12345@gmail.com', '1234569780', '0'),
('admin', 'admin', 'admin', 'admin', 'admin', 'admin', '1'),
('tao', '12345', 'sadsad', 'dsadsad', 'dasd', 'dsad', '0'),
('namelesskingsave', 'namelesskingsave', 'namelesskingsave', 'namelesskingsave', 'namelesskingsave@gmail.com', '0011001100', '0');

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
-- Indexes for table `orders_no`
--
ALTER TABLE `orders_no`
  ADD PRIMARY KEY (`orders_no`);

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
  MODIFY `id_item` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `item_type_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'หมายเลข', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'เลขorder', AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `orders_no`
--
ALTER TABLE `orders_no`
  MODIFY `orders_no` int(10) NOT NULL AUTO_INCREMENT COMMENT 'runไว้เป็น pimary เฉยๆ', AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `track_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `track_owner_id`
--
ALTER TABLE `track_owner_id`
  MODIFY `track_owner_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
