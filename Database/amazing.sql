-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2017 at 05:02 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amazing`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `noBanner` int(11) DEFAULT NULL,
  `desBanner` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `iBanner` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pid` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`noBanner`, `desBanner`, `iBanner`, `pid`) VALUES
(3, 'Mua Oppo F3 Trúng Oppo <br> A71 Mỗi Ngày', 'Images/banner5.png', 'F32017O'),
(4, 'iPhone 7, 7+ Giá Mới <br> Giảm Ngay Đến 2 Triệu', 'Images/banner10.jpg', 'iP7P32GB2017A'),
(1, 'J7+ Trả Góp 0% <br> 100% Tặng Quà 1 Triệu', 'Images/banner6.png', 'J7PLUS2017S'),
(2, 'Mua Galaxy Note 8 Trợ <br> Giá Ngay 6 Triệu', 'Images/banner11.jpg', 'N82017S');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `noComment` int(11) NOT NULL,
  `idPro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nameUserCMT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phoneUserCMT` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contentCMT` text COLLATE utf8_unicode_ci NOT NULL,
  `timeComment` text COLLATE utf8_unicode_ci NOT NULL,
  `parentCMT` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`noComment`, `idPro`, `nameUserCMT`, `phoneUserCMT`, `contentCMT`, `timeComment`, `parentCMT`) VALUES
(126, 'iP732GB2017A', 'dddd', '01649513801', 'ngon', '18/12/2017 01:54 PM', '0'),
(127, 'iP732GB2017A', 'dddd', '01649513801', 'được', '18/12/2017 01:54 PM', '126'),
(128, 'iP732GB2017A', 'dddd', '01649513801', 'hay ', '18/12/2017 01:54 PM', '126'),
(129, 'F32017O', 'dddd', '01649513801', 'sản phẩm đẹp ', '18/12/2017 01:55 PM', '0'),
(130, 'S82017S', 'Quang Huy', '01649513801', 'sản phẩm đẹp', '21/12/2017 12:19 PM', '0'),
(132, 'S82017S', 'Ninh', '01649513801', 'Được', '21/12/2017 06:19 PM', '0'),
(133, 'UU2017HTC', 'Huy', '0964353929', 'Được', '21/12/2017 06:20 PM', '0'),
(134, 'F32017O', 'Nguyen Van Thuat', '0964353929', 'Tuyệt vời', '21/12/2017 06:21 PM', '0'),
(135, 'iP732GB2017A', 'Ninh', '01649513801', 'hay lắm', '21/12/2017 07:03 PM', '126'),
(136, 'S82017S', 'Huy Hoang ', '01649513801', 'Có bán tại Hải Dương không', '21/12/2017 07:08 PM', '0'),
(137, 'S82017S', 'Huy', '01649513801', 'CC', '21/12/2017 07:08 PM', '132'),
(138, 'S82017S', 'Huy', '01649513801', 'CC', '21/12/2017 07:09 PM', '132'),
(139, 'J7PRO2017S', 'Huy Quang', '01649513801', 'ngon ', '21/12/2017 07:49 PM', '0'),
(140, 'J7PRO2017S', 'Hai Ninh', '01649513801', 'haha', '21/12/2017 07:49 PM', '139'),
(141, 'J7PRO2017S', 'Huy', '01649513801', 'hih', '26/12/2017 12:00 PM', '139');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`) VALUES
('quanghuy27101997@gmail.com', '27101997');

-- --------------------------------------------------------

--
-- Table structure for table `orderpro`
--

CREATE TABLE `orderpro` (
  `noOrder` int(11) NOT NULL,
  `idPro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nameCos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phoneCos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mailCos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `addCos` text COLLATE utf8_unicode_ci NOT NULL,
  `bankAcc` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderpro`
--

INSERT INTO `orderpro` (`noOrder`, `idPro`, `color`, `sex`, `nameCos`, `phoneCos`, `mailCos`, `addCos`, `bankAcc`) VALUES
(3, 'iP732GB2017A', 'Yellow', 'A', 'Nguyen Quang Huy', '01649513801', 'quanghuy27101997@gmail.com', 'Hanoi', ''),
(7, 'J7PRO2017S', 'Blue', 'A', 'Nguyen Quang Huy', '01649513801', 'quanghuy27101997@gmail.com', 'Hanoi', ''),
(36, 'J7PRO2017S', 'Black', 'A', 'Nguyen Quang Huy', '01649513801', 'quanghuy27101997@gmail.com', 'Hanoi', ''),
(44, 'F32017O', 'Yellow', 'A', 'Nguyen Quang Huy', '01649513801', 'quanghuy27101997@gmail.com', 'Hanoi', ''),
(45, 'J7PRO2017S', 'Black', 'A', 'Nguyen Quang Huy', '01649513801', 'quanghuy27101997@gmail.com', 'Hanoi', ''),
(46, 'J7PRO2017S', 'Black', 'A', 'Nguyen Quang Huy', '01649513801', 'quanghuy27101997@gmail.com', 'Hanoi', ''),
(47, 'iP7P32GB2017A', 'Yellow', 'A', 'Hai Ninh', '0964353929', 'quanghuy27101997@gmail.com', 'Hanoi', ''),
(48, 'N82017S', 'Blue', 'A', 'Nguyen Van Thuat', '0987086361', 'quanghuy27101997@gmail.com', 'Hanoi', ''),
(49, 'J7PLUS2017S', 'Blue', 'A', 'Nguyen Quang Huy', '01649513801', 'quanghuy27101997@gmail.com', 'Hanoi', ''),
(50, 'S82017S', '', 'A', 'Nguyen Quang Huy', '01649513801', 'quanghuy27101997@gmail.com', 'Hanoi', ''),
(51, 'S82017S', 'Black', 'A', 'Hai Ninh', '01649513801', 'quanghuy27101997@gmail.com', 'Hanoi', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `codePro` int(11) NOT NULL,
  `namePro` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `Supplier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `colorPro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `imagesPro` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `dataPro` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  `pricePro` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0',
  `iPro` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idPro` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cameraBehind` int(11) NOT NULL,
  `cameraFont` int(11) NOT NULL,
  `screen` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`codePro`, `namePro`, `Supplier`, `colorPro`, `imagesPro`, `dataPro`, `pricePro`, `view`, `iPro`, `idPro`, `cameraBehind`, `cameraFont`, `screen`) VALUES
(1, 'Samsung Galaxy S8', 'Samsung', 'Blue,Yellow,Black', 'Images/samsung_s8.jpg', 'Phone/S8/data_s8.json', 18490000, 3, 'Images/samsung_s8_pre.jpg', 'S82017S', 12, 8, 5.8),
(2, 'Samsung Galaxy J7 Pro', 'Samsung', 'Blue,Black', 'Images/samsung_j7pro.png', 'Phone/J7Pro/data_j7pro.json', 6990000, 0, 'Images/samsung_j7pro_pre.jpg', 'J7PRO2017S', 13, 13, 5.5),
(3, 'iPhone 7 32GB', 'Apple', 'Red,Yellow,Black', 'Images/iphone_7_32GB.png', 'Phone/iPhone7_32GB/data_iphone7_32GB.json', 15990000, 0, 'Images/iphone_7_32GB_pre.jpg', 'iP732GB2017A', 12, 7, 4.7),
(4, 'Oppo F3', 'Oppo', 'Black,Yellow,White', 'Images/oppo_F3.png', 'Phone/OppoF3/data_oppof3.json', 6990000, 0, 'Images/oppo_f3_pre.png', 'F32017O', 13, 16, 5.5),
(5, 'Samsung Galaxy Note 8', 'Samsung', 'Blue,Yellow', 'Images/samsung_note8.png', 'Phone/Note8/data_note8.json', 22490000, 5, 'Images/samsung_note8_pre.jpg', 'N82017S', 12, 8, 6.3),
(6, 'HTC U Ultra', 'HTC', 'Blue,Black', 'Images/htc_u_ultra.png', 'Phone/HTC_U_Ultra/data_htc_u_ultra.json', 14990000, 0, 'Images/htc_u_ultra_pre.jpg', 'UU2017HTC', 16, 12, 5.5),
(7, 'Samsung Galaxy J7 Plus', 'Samsung', 'Blue,Black', 'Images/samsung_j7plus.jpg', 'Phone/J7Plus/data_j7plus.json', 8690000, 0, 'Images/samsung_j7plus_pre.jpg', 'J7PLUS2017S', 13, 16, 5.5),
(8, 'iPhone 7 Plus 32GB', 'Apple', 'Red,Yellow,Black', 'Images/iphone_7_32GB_plus.png', 'Phone/iPhone7_Plus_32GB/data_iphone7_plus_32GB.json', 19990000, 6, 'Images/iphone_7_32GB_plus_pre.jpg', 'iP7P32GB2017A', 12, 7, 5.5),
(9, 'Huawei GR5 2017', 'Huawei', 'Yellow,White', 'Images/huawei_gr5.png', 'Phone/Huawei_GR5_2017/data_gr5.json', 5990000, 0, 'Images/huawei_gr5_pre.jpg', 'GR52017HUA', 12, 8, 5.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`noComment`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `orderpro`
--
ALTER TABLE `orderpro`
  ADD PRIMARY KEY (`noOrder`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`codePro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `noComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `orderpro`
--
ALTER TABLE `orderpro`
  MODIFY `noOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `codePro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
