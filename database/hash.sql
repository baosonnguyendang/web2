-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 02:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hash`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment_info`
--

CREATE TABLE `comment_info` (
  `cmt_id` int(11) NOT NULL,
  `cmt_content` text DEFAULT NULL,
  `cmt_user_id` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL,
  `item_id` int(11) NOT NULL,
  `cmt_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `item_info`
--

CREATE TABLE `item_info` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(200) DEFAULT NULL,
  `item_picture` varchar(200) DEFAULT NULL,
  `item_description` text DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `sell_date` datetime DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `is_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item_info`
--

INSERT INTO `item_info` (`item_id`, `item_name`, `item_picture`, `item_description`, `type`, `sell_date`, `stock`, `price`, `seller_id`, `is_delete`) VALUES
(1, 'GEFORCE RTX 3080', 'https://tandoanh.vn/wp-content/uploads/2020/12/MSI-Geforce-RTX-3080-SUPRIM-X-10G-10GB-GDDR6X-H1.jpg', 'Card new vừa nhập', 'gpu', '0000-00-00 00:00:00', 10, 29000000, 1, 0),
(2, 'GEFORCE GTX 1660 SUPER', 'https://static.digit.in/default/54ca53f4cacb16d40e19c8f2c999f87524a911ab.jpeg', 'Còn bảo hành đến 09/2023', 'gpu', '0000-00-00 00:00:00', 10, 5000000, 2, 0),
(3, 'RADEON RX580', 'https://www.pcgamesn.com/wp-content/uploads/2018/03/AMD-RX-580-graphics-cards.jpg', 'Hết bảo hành', 'gpu', '0000-00-00 00:00:00', 20, 5000000, 2, 0),
(4, 'CPU Intel i9-10900K', 'https://tandoanh.vn/wp-content/uploads/2020/05/Intel-Core-I9-10900K-10C-20T-20MB-3.70-5.30-GHz-Avengers-Edition-Box-chinh-hang.jpg', 'hàng chính h?ng', 'cpu', '0000-00-00 00:00:00', 5, 14000000, 3, 0),
(5, 'CPU Intel i3-10100F', 'https://tandoanh.vn/wp-content/uploads/2020/05/intel-core-i3-comet-lake-s.jpg', 'hàng chính hảng', 'cpu', '0000-00-00 00:00:00', 20, 2000000, 3, 0),
(6, 'CPU AMD Ryzen R-3600', 'https://tandoanh.vn/wp-content/uploads/2019/11/AMD-Ryzen%E2%84%A2-5-3600-6C12T-UPTO-4.2GHZ-Nhap-Khau.jpg.webp', 'hàng chính hảng', 'cpu', '0000-00-00 00:00:00', 2, 5000000, 3, 0),
(7, 'Gskill TridentZ Neo RGB 16GB (2x8GB)', 'https://tandoanh.vn/wp-content/uploads/2020/10/G.SKILL-TRIDENT-Z-NEO-RGB.jpg', 'Hàng chính hãng - Bảo hành 36 tháng', 'ram', '0000-00-00 00:00:00', 10, 2650000, 4, 0),
(8, 'G.Skill Ripjaws V 8GB ( 1x8GB )', 'https://tandoanh.vn/wp-content/uploads/2020/09/G.Skill-Ripjaws-V.jpg', 'Hết bảo hành', 'ram', '0000-00-00 00:00:00', 5, 500000, 3, 0),
(9, 'Samsung 980 Pro M.2 2280 250GB', 'https://tandoanh.vn/wp-content/uploads/2020/10/Samsung-980-Pro-M.2-2280-250GB.jpg', 'Hàng xách tay -  Bảo hành trách nhiệm 1 tháng', 'ram', '0000-00-00 00:00:00', 10, 1800000, 1, 0),
(10, 'Crucial BX500 3D NAND 2.5? 240GB – Sata3', 'https://tandoanh.vn/wp-content/uploads/2020/03/Crucial-BX500-3D-NAND-SATA-III-2.5-inch-240GB-02.jpg.webp', 'Vừa mua tháng 6/2020', 'ssd', '0000-00-00 00:00:00', 1, 550000, 1, 0),
(11, 'Samsung 860 Evo 250GB 3D V-Nand – Sata3 SSD', 'https://tandoanh.vn/wp-content/uploads/2019/08/Samsung-860-Evo-3D-V-Nand.jpg', 'Còn 24 tháng bảo hành', 'ssd', '0000-00-00 00:00:00', 5, 1000000, 2, 0),
(12, 'Western Digital Caviar Black 1TB', 'https://tandoanh.vn/wp-content/uploads/2019/08/WD-Caviar-Black-1TB-HDD.jpg', 'Vừa mua tháng 1/2020', 'hdd', '0000-00-00 00:00:00', 10, 1500000, 3, 0),
(13, 'Western Digital Caviar Red 1TB', 'https://tandoanh.vn/wp-content/uploads/2019/08/WD-Caviar-Red-1TB-HDD.jpg.webp', 'Ổ cứng WD Red 1TB chuyên dùng cho NAS - Hàng m?i chính h?ng', 'hdd', '0000-00-00 00:00:00', 5, 1500000, 2, 0),
(14, 'Seagate Barracuda 1TB Sata 3', 'https://tandoanh.vn/wp-content/uploads/2019/08/Seagate-Barracuda-1TB-HDD.jpg.webp', 'Hàng xách tay', 'hdd', '0000-00-00 00:00:00', 10, 800000, 2, 0),
(15, 'Gigabyte Z490i AORUS ULTRA Rev 1.0 – Socket 1200', 'https://tandoanh.vn/wp-content/uploads/2020/07/Gigabyte-Z490i-AORUS-ULTRA-Socket-1200-01.jpg', 'Còn 33 tháng bảo hành', 'mobo', '0000-00-00 00:00:00', 4, 6000000, 2, 0),
(16, 'Asus TUF GAMING B460-PLUS – Socket 1200', 'https://tandoanh.vn/wp-content/uploads/2020/11/Asus-TUF-GAMING-B460-PLUS-Socket-1200-01.jpg', 'Còn 30 tháng bảo hành', 'mobo', '0000-00-00 00:00:00', 2, 2000000, 2, 0),
(17, 'MSI MAG X570 TOMAHAWK WIFI', 'https://tandoanh.vn/wp-content/uploads/2020/11/MSI-MAG-X570-TOMAHAWK-WIFI-H1.jpg.webp', 'Hàng xách tay', 'mobo', '0000-00-00 00:00:00', 5, 5000000, 1, 0),
(18, 'ANTEC VP650P PLUS 650W 80PLUS 230V SINGLE RAIL', 'https://tandoanh.vn/wp-content/uploads/2020/11/ANTEC-VP650P-PLUS-650W-H1.jpg', 'Mua tháng 06/2020', 'psu', '0000-00-00 00:00:00', 2, 700000, 4, 0),
(19, 'Corsair SF600 80+ Gold SFX PSU – Fully Modular', 'https://tandoanh.vn/wp-content/uploads/2020/11/Corsair-SF600-80-Gold-SFX-PSU-Fully-Modular-01.jpg', 'Còn 30 tháng bảo hành', 'psu', '0000-00-00 00:00:00', 1, 2000000, 1, 0),
(20, 'Cooler Master Elite PC700 230V – V3', 'https://tandoanh.vn/wp-content/uploads/2020/11/Cooler-Master-Elite-P700-230V-%E2%80%93-V3-h6.jpg', 'Còn 29 tháng bảo hành', 'psu', '0000-00-00 00:00:00', 5, 800000, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_info`
--

CREATE TABLE `order_info` (
  `order_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `deliver_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_item_info`
--

CREATE TABLE `order_item_info` (
  `order_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `is_admin` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `username`, `password`, `email`, `name`, `address`, `phone`) VALUES
(1, 'annguyen1412', '123456789', 'annguyen1412@gmail.com', 'Nguyen Pham Duy An', 'HCM', '0356478215'),
(2, 'hoangtruong99', 'hoangtruong', 'hoangtruong99@gmail.com', 'Truong Minh Hoang', 'HCM', '0356478215'),
(3, 'baosonnguyen', '9874563210', 'baosonnguyen@gmail.com', 'Nguyen Dang Bao Son', 'HCM', '0356478215'),
(4, 'huyduong99', 'huyduong', 'huyduong99@gmail.com', 'Duong Quang Huy', 'HCM', '0356478215');

INSERT INTO `user_info` (`user_id`, `username`, `password`, `is_admin`) VALUES(5, 'admin', 'admin',1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment_info`
--
ALTER TABLE `comment_info`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `cmt_user_id` (`cmt_user_id`);

--
-- Indexes for table `item_info`
--
ALTER TABLE `item_info`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `order_item_info`
--
ALTER TABLE `order_item_info`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `buyer_id` (`buyer_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment_info`
--
ALTER TABLE `comment_info`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_info`
--
ALTER TABLE `item_info`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_info`
--
ALTER TABLE `order_info`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_info`
--
ALTER TABLE `comment_info`
  ADD CONSTRAINT `comment_info_ibfk_1` FOREIGN KEY (`cmt_user_id`) REFERENCES `user_info` (`user_id`),
  ADD CONSTRAINT `comment_info_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_info` (`item_id`);

--
-- Constraints for table `item_info`
--
ALTER TABLE `item_info`
  ADD CONSTRAINT `item_info_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `order_info_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user_info` (`user_id`);

--
-- Constraints for table `order_item_info`
--
ALTER TABLE `order_item_info`
  ADD CONSTRAINT `order_item_info_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_info` (`order_id`),
  ADD CONSTRAINT `order_item_info_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item_info` (`item_id`),
  ADD CONSTRAINT `order_item_info_ibfk_3` FOREIGN KEY (`buyer_id`) REFERENCES `user_info` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
