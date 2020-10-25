-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 09:07 AM
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
(3, '3', 4, 5, '4', '3', 0, '3.png'),
(7, '7', 7, 5, '7', '7', 0, '7.png'),
(8, '8', 8, 5, '8', '8', 5, '8.png'),
(9, '9', 9, 5, '9', '9', 4, '9.png'),
(48, 'เสื้อยืดสีเทา', 100, 1, 'เสื้อยืดใส่ง่ายสะบาย', 'เสื้อยืดใส่ง่ายสะบาย', 3, 'unnamed.jpg'),
(49, 'เสื้อยืดสีดำ', 100, 1, 'เสื้อยืดใส่ง่ายสะบาย', 'เสื้อยืดใส่ง่ายสะบาย', 5, '13513.jpg'),
(50, 'เสื้อยืดสีม่วง', 100, 1, 'เสื้อยืดใส่ง่ายสะบาย', 'เสื้อยืดใส่ง่ายสะบาย', 2, 'ม่วงอ่อน-18.jpg'),
(51, 'เสื้อโปโล แขนยาว', 349, 1, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 6, 'PIM-1574666400623-f9828242-7a9d-448c-b174-381bc18970de_v1-small.jpg'),
(52, 'เสื้อตราห่านสีขาว', 125, 1, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 3, '300679_04_double_goose.jpg'),
(53, 'กางเกงขาสั้น', 399, 2, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 3, 'men-s-golf-shorts-white.jpg'),
(54, 'Adidas ขาสั้น', 935, 2, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 5, 'PIM-1561985090523-6ccfe321-c906-46fd-88e0-b24bdb127f61_v1-small.jpg'),
(55, 'ADIDAS Essentials 3 Stripes Tapered', 1250, 2, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 3, 'adidas-3752-54124-1.jpg'),
(56, 'Adidas NEO สำหรับผู้หญิง', 1299, 2, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 2, 'RBS33597028.jpg'),
(57, 'กางเกงขาสั้น ลายผ้าขาวม้า สำหรับผู้หญิง', 100, 2, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 2, 'ceb039d0-78c6-5c00-d2c4-5d7a445536bf.jpg'),
(58, 'Adidas STAN SMITH[3UK]', 2700, 3, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 3, 'Stan_Smith_M20605_01_standard.jpg'),
(59, 'Adidas ADILETTE AQUA[11UK]', 700, 3, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 3, 'รองเท้า.jpg'),
(60, 'Adidas ULTRABOOST 20', 6500, 3, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 0, 'wadfedrfgervedrf.jpg'),
(61, 'Adidas FLUIDSTREET', 2300, 3, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 1, 'Fluidstreet_FW1713_01_standard.jpg'),
(62, 'Adidas NMD_R1', 4600, 3, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 1, 'NMD_R1_Shoes_Black_FV9153_01_standard.jpg'),
(63, 'FILA รุ่น-TB201903', 258, 4, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 3, '5d82ea23N45f70188.jpg!q70.jpg'),
(64, 'NIKE Classic', 1100, 4, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 4, 'nike-3548-77884-1.jpg'),
(65, 'ADIDAS Linear Classic Daily', 800, 4, 'ใส่ง่ายสะบาย', 'ใส่ง่ายสะบาย', 1, 'adidas-9798-36505-1.jpg'),
(66, ' PS4 : Grand Theft Auto 5 (GTA5)', 1290, 6, 'เล่นสนุก', 'เล่นสนุก', 1, 'dce1b4a76930197af07d488765cd9410.jpg'),
(67, 'PS4 : STAR WARS - Squadrons', 1290, 6, 'เล่นสนุก', 'เล่นสนุก', 3, 'gcb7zp.jpg'),
(68, 'PS4 : Jump Force', 990, 6, 'เล่นสนุก', 'เล่นสนุก', 1, 'xbfm6z.jpg'),
(69, 'PS4 : Ghost of Tsushima', 1890, 6, 'เล่นสนุก', 'เล่นสนุก', 0, 'gwf7ih.jpg');

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
(5, 'อื่นๆ'),
(6, 'เกม');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL COMMENT 'เลขorder',
  `order_username` varchar(16) NOT NULL COMMENT 'username คนซื้อ',
  `pay_id` int(10) NOT NULL COMMENT 'เลขรหัสการจ่ายเงิน',
  `track_id` int(10) NOT NULL COMMENT 'เลขติดตามพัสดุ',
  `order_date` datetime NOT NULL COMMENT 'วันที่ทำการสั่งซื้อ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_username`, `pay_id`, `track_id`, `order_date`) VALUES
(49, '0', 62, 50, '2020-10-23 19:25:13'),
(48, '0', 61, 49, '2020-10-20 21:14:24'),
(47, '0', 60, 48, '2020-10-18 22:48:28'),
(46, '0', 59, 47, '2020-10-18 16:15:23'),
(45, '0', 58, 46, '2020-10-18 15:58:28'),
(44, '0', 57, 45, '2020-10-18 14:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `orders_no`
--

CREATE TABLE `orders_no` (
  `orders_no` int(10) NOT NULL COMMENT 'เก็บ order id',
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
(37, 49, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(4) NOT NULL,
  `pay_username` varchar(16) NOT NULL COMMENT 'คนจ่ายเงิน',
  `pay_status` enum('wait','check','pay','cancel') NOT NULL COMMENT 'สถานะการชำระ',
  `pay_price` int(10) DEFAULT NULL COMMENT 'จำนวนที่ต้องจ่าย',
  `pay_time` datetime(6) DEFAULT NULL COMMENT 'เก็บเวลาที่ upload หลักฐาน',
  `pay_imagelocation` text DEFAULT NULL COMMENT 'ที่เก็บหลักฐาน'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_username`, `pay_status`, `pay_price`, `pay_time`, `pay_imagelocation`) VALUES
(62, '0', 'wait', 0, NULL, NULL),
(61, '0', 'pay', 8, '2020-10-29 21:18:00.000000', '121588820_5187923337899801_8389119168624097045_o.png'),
(57, '0', 'pay', 8, '2020-10-19 17:39:00.000000', '3.png'),
(58, '0', 'pay', 8, '2020-10-19 16:48:00.000000', '7.png'),
(59, '0', 'pay', 9, '2020-10-08 16:50:00.000000', 'Screenshot 2020-10-10 144329.png'),
(60, '0', 'pay', 24, '2020-10-19 22:52:00.000000', 'red.png');

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

CREATE TABLE `track` (
  `track_id` int(4) NOT NULL COMMENT 'idของเลขtraco',
  `track_username` varchar(16) NOT NULL COMMENT 'username ที่สั่งซื้อ',
  `track_owner` text DEFAULT NULL COMMENT 'บริษัทขนส่ง',
  `track_no` varchar(20) DEFAULT NULL COMMENT 'หมายเลข track',
  `track_status` enum('wait','send','cancel') NOT NULL COMMENT 'สถานะการจัดส่ง'
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
(50, '0', NULL, NULL, 'wait');

-- --------------------------------------------------------

--
-- Table structure for table `track_owner_id`
--

CREATE TABLE `track_owner_id` (
  `track_owner_id` int(2) NOT NULL COMMENT 'เลขชื่อ บ ขนส่ง',
  `track_owner_name` varchar(32) NOT NULL COMMENT 'ชื่อ บ ขนส่ง'
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
('namelesskingmeow', '00110011', 'Thanapun Thongjurai', 'บ้านโคกใหญ่', 'namelesskingmeow@gmail.com', '0942860030', '0');

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
  MODIFY `id_item` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `item_type`
--
ALTER TABLE `item_type`
  MODIFY `item_type_id` int(3) NOT NULL AUTO_INCREMENT COMMENT 'หมายเลข', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'เลขorder', AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `orders_no`
--
ALTER TABLE `orders_no`
  MODIFY `orders_no` int(10) NOT NULL AUTO_INCREMENT COMMENT 'เก็บ order id', AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `track`
--
ALTER TABLE `track`
  MODIFY `track_id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'idของเลขtraco', AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `track_owner_id`
--
ALTER TABLE `track_owner_id`
  MODIFY `track_owner_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'เลขชื่อ บ ขนส่ง', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
