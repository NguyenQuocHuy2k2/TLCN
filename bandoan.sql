-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 01, 2023 at 04:03 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bandoan`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `coupon_id` int NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(30) NOT NULL,
  `coupon_type` int NOT NULL,
  `coupon_amount` int NOT NULL,
  `min_order` int NOT NULL,
  `coupon_quantity` int NOT NULL,
  `coupon_used` int NOT NULL,
  `coupon_remain` int NOT NULL,
  `coupon_expired` date NOT NULL,
  PRIMARY KEY (`coupon_id`,`coupon_code`),
  UNIQUE KEY `coupon_code` (`coupon_code`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_code`, `coupon_type`, `coupon_amount`, `min_order`, `coupon_quantity`, `coupon_used`, `coupon_remain`, `coupon_expired`) VALUES
(1, 'GIAMGIA50K', 0, 50000, 50000, 30, 0, 30, '2023-11-02'),
(2, 'GIAMGIA10%', 1, 10, 300000, 30, 6, -2, '2023-11-02'),
(3, 'GIAMGIA100K', 0, 100000, 1000000, 30, 7, 23, '2023-11-10'),
(4, 'GIAMGIA150K', 0, 150000, 500000, 30, 9, 21, '2023-11-09'),
(5, '', 0, 0, 0, 123125, 17, 123108, '2114-12-31'),
(6, 'GIAMGIATEST', 0, 120000, 1000000, 12, 0, 0, '2023-12-01'),
(7, 'GIAMGIA30K', 0, 30000, 120000, 9, 3, 6, '2023-12-24'),
(11, 'TEST', 1, 12, 300000, 12, 4, 8, '2023-12-21'),
(10, '55', 1, 55, 1230000, 13, 1, 12, '2023-12-21'),
(12, 'GIAMGIA1TR', 0, 1000000, 11000000, 3, 0, 3, '2023-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `coupons_type`
--

DROP TABLE IF EXISTS `coupons_type`;
CREATE TABLE IF NOT EXISTS `coupons_type` (
  `coupon_type` int NOT NULL,
  `type_name` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`coupon_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `coupons_type`
--

INSERT INTO `coupons_type` (`coupon_type`, `type_name`) VALUES
(0, 'Giảm theo số tiền'),
(1, 'Giảm theo tỉ lệ %');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(18, 'Capple.vn');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `coupon_discount` int NOT NULL,
  `total` int NOT NULL,
  `note` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `checkout` int NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=276 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address`, `phone`, `status`, `coupon_discount`, `total`, `note`, `checkout`, `date_create`) VALUES
(269, 1, '190 Nguyễn Thái Sơn, Phường 4, Quận Gò Vấp', '935540795', 0, 0, 165000, '', 1, '2023-11-01 05:37:54'),
(270, 1, 'test', '0357369820', 5, 30000, 630000, '', 0, '2023-11-01 05:40:40'),
(271, 1, '566/72/63R Nguyễn Thái Sơn, P.5, Quận Gò Vấp', '0935540795', 5, 0, 285000, '', 1, '2023-11-01 07:42:46'),
(272, 1, 'test', '0357369820', 5, 0, 190000, '', 1, '2023-11-01 08:07:25'),
(273, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 100000, 2735000, '', 0, '2023-11-01 14:14:03'),
(274, 1, 'test', '0357369820', 1, 100000, 2570000, '', 1, '2023-11-01 14:20:08'),
(275, 1, '15 An Nhon', '0935540795', 1, 55, 2403000, '', 0, '2023-11-01 15:56:14');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `order_id` int NOT NULL,
  `product_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `discount_price` int NOT NULL,
  `product_quantity` int NOT NULL,
  `cost` int NOT NULL,
  `product_id` int NOT NULL,
  `type_id` int NOT NULL,
  `product_image` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `orderdetail_id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`orderdetail_id`)
) ENGINE=MyISAM AUTO_INCREMENT=275 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_name`, `discount_price`, `product_quantity`, `cost`, `product_id`, `type_id`, `product_image`, `orderdetail_id`) VALUES
(115, 'Chanh tươi Irag (kg)', 250000, 6, 1500000, 3, 3, 'chanhtuoiirag.png', 79),
(114, 'Bánh kem Matcha Nho', 320000, 1, 320000, 12, 2, 'banhkemnhomatcha.jpg', 78),
(114, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 77),
(114, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 76),
(114, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 75),
(114, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 74),
(114, 'Nho Pháp thượng hạng (kg)', 150000, 1, 150000, 56, 1, 'nho.png', 73),
(114, 'Bánh kem bơ Pháp', 850000, 2, 1700000, 1, 2, 'banhkembophap.jpg', 72),
(113, 'Nho Pháp thượng hạng (kg)', 150000, 1, 150000, 56, 1, 'nho.png', 71),
(113, 'Ớt chuông đỏ (kg)', 60000, 1, 60000, 23, 3, 'otchuongdo.png', 70),
(113, 'Chanh tươi Irag (kg)', 250000, 2, 500000, 3, 3, 'chanhtuoiirag.png', 69),
(113, 'Bánh kem dâu Ý', 1200000, 2, 2400000, 5, 2, 'banhkemdau.jpg', 68),
(113, 'Chanh dây Nga tươi (kg)', 120000, 2, 240000, 16, 1, 'chanhday.png', 67),
(113, 'Cà tím Châu Phi (kg)', 120000, 3, 360000, 7, 3, 'catim.jpg', 66),
(113, 'Hồng đỏ Nam Mỹ (kg)', 165000, 5, 825000, 11, 1, 'hongdomy.png', 65),
(120, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 83),
(119, 'Kiwi ngọt Brazil (kg)', 190000, 3, 570000, 57, 1, 'kiwi.png', 81),
(119, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 82),
(121, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 84),
(148, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 85),
(148, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 86),
(149, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 87),
(149, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 88),
(149, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 89),
(150, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 90),
(150, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 91),
(151, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 92),
(151, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 93),
(152, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 94),
(153, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 95),
(154, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 96),
(154, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 97),
(155, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 98),
(155, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 99),
(156, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 100),
(157, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 101),
(158, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 102),
(159, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 103),
(160, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 104),
(161, 'Cà rốt Bắc Mỹ (kg)', 120000, 1, 120000, 54, 3, 'carot.png', 105),
(162, 'Cà rốt Bắc Mỹ (kg)', 120000, 1, 120000, 54, 3, 'carot.png', 106),
(163, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 107),
(164, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 108),
(165, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 109),
(166, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 110),
(167, 'Bánh kem Matcha Nho', 320000, 1, 320000, 12, 2, 'banhkemnhomatcha.jpg', 111),
(0, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 112),
(168, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 113),
(168, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 114),
(169, 'Bánh kem bơ Pháp', 850000, 1, 850000, 1, 2, 'banhkembophap.jpg', 115),
(170, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 116),
(171, 'Bánh kem Matcha Nho', 320000, 1, 320000, 12, 2, 'banhkemnhomatcha.jpg', 117),
(171, 'Bánh kem bơ Pháp', 850000, 1, 850000, 1, 2, 'banhkembophap.jpg', 118),
(171, 'Kiwi ngọt Brazil (kg)', 190000, 2, 380000, 57, 1, 'kiwi.png', 119),
(172, 'Kiwi ngọt Brazil (kg)', 190000, 2, 380000, 57, 1, 'kiwi.png', 120),
(173, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 121),
(174, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 122),
(175, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 123),
(176, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 124),
(177, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 125),
(177, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 126),
(178, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 127),
(179, 'Kiwi ngọt Brazil (kg)', 190000, 2, 380000, 57, 1, 'kiwi.png', 128),
(180, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 129),
(180, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 130),
(181, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 131),
(182, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 132),
(183, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 133),
(184, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 134),
(185, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 135),
(186, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 136),
(187, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 137),
(188, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 138),
(189, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 139),
(190, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 140),
(191, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 141),
(192, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 142),
(193, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 143),
(194, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 144),
(195, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 145),
(196, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 146),
(197, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 147),
(198, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 148),
(199, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 149),
(200, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 150),
(201, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 151),
(202, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 152),
(203, 'Cà rốt Bắc Mỹ (kg)', 120000, 1, 120000, 54, 3, 'carot.png', 153),
(203, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 154),
(204, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 155),
(205, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 156),
(206, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 157),
(207, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 158),
(207, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 159),
(208, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 160),
(209, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 161),
(210, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 162),
(211, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 163),
(212, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 164),
(213, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 165),
(214, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 166),
(215, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 167),
(216, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 168),
(217, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 169),
(218, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 170),
(219, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 171),
(220, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 172),
(221, 'Chanh dây Nga tươi (kg)', 120000, 2, 240000, 16, 1, 'chanhday.png', 173),
(222, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 174),
(223, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 175),
(224, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 176),
(225, 'Chanh dây Nga tươi (kg)', 120000, 3, 360000, 16, 1, 'chanhday.png', 177),
(226, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 178),
(227, 'Chanh dây Nga tươi (kg)', 120000, 4, 480000, 16, 1, 'chanhday.png', 179),
(228, 'Hồng đỏ Nam Mỹ (kg)', 165000, 7, 1155000, 11, 1, 'hongdomy.png', 180),
(229, 'Hồng đỏ Nam Mỹ (kg)', 165000, 6, 990000, 11, 1, 'hongdomy.png', 181),
(230, 'Hồng đỏ Nam Mỹ (kg)', 165000, 8, 1320000, 11, 1, 'hongdomy.png', 182),
(231, 'Hồng đỏ Nam Mỹ (kg)', 165000, 8, 1320000, 11, 1, 'hongdomy.png', 183),
(232, 'Hồng đỏ Nam Mỹ (kg)', 165000, 7, 1155000, 11, 1, 'hongdomy.png', 184),
(233, 'Hồng đỏ Nam Mỹ (kg)', 165000, 6, 990000, 11, 1, 'hongdomy.png', 185),
(234, 'Hồng đỏ Nam Mỹ (kg)', 165000, 7, 1155000, 11, 1, 'hongdomy.png', 186),
(235, 'Hồng đỏ Nam Mỹ (kg)', 165000, 10, 1650000, 11, 1, 'hongdomy.png', 187),
(236, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 188),
(236, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 189),
(236, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 190),
(237, 'Hồng đỏ Nam Mỹ (kg)', 165000, 7, 1155000, 11, 1, 'hongdomy.png', 191),
(238, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 192),
(238, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 193),
(238, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 194),
(239, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 195),
(239, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 196),
(240, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 197),
(240, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 198),
(240, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 199),
(240, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 200),
(241, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 201),
(241, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 202),
(242, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 203),
(243, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 204),
(244, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 205),
(245, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 206),
(246, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 207),
(247, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 208),
(248, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 209),
(249, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 210),
(250, 'Cải thìa Triều Tiên (kg)', 70000, 1, 70000, 53, 3, 'caithia.png', 211),
(251, 'Kiwi ngọt Brazil (kg)', 190000, 3, 570000, 57, 1, 'kiwi.png', 212),
(251, 'Dâu tây đỏ ngọt (kg)', 100000, 3, 300000, 18, 1, 'dautay.png', 213),
(251, 'Bánh kem Matcha', 600000, 5, 3000000, 22, 2, 'banhkemmatcha.jpg', 214),
(251, 'Bánh kem dâu Ý', 1200000, 6, 7200000, 5, 2, 'banhkemdau.jpg', 215),
(251, 'Bánh kem Táo Hàn Quốc', 550000, 2, 1100000, 17, 2, 'banhkemtao.jpg', 216),
(252, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 217),
(252, 'Vải thiều loại to (kg)', 85000, 2, 170000, 21, 1, 'vaithieuloaito.png', 218),
(253, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 219),
(253, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 220),
(254, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 221),
(255, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 222),
(256, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 223),
(257, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 224),
(258, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 225),
(259, 'Dâu tây đỏ ngọt (kg)', 100000, 3, 300000, 18, 1, 'dautay.png', 226),
(259, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 227),
(260, 'Dâu tây đỏ ngọt (kg)', 100000, 3, 300000, 18, 1, 'dautay.png', 228),
(260, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 229),
(261, 'Dâu tây đỏ ngọt (kg)', 100000, 3, 300000, 18, 1, 'dautay.png', 230),
(261, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 231),
(262, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 232),
(262, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 233),
(262, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 234),
(262, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 235),
(262, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 236),
(262, 'Cải thìa Triều Tiên (kg)', 70000, 1, 70000, 53, 3, 'caithia.png', 237),
(262, 'Chanh tươi Irag (kg)', 250000, 1, 250000, 3, 3, 'chanhtuoiirag.png', 238),
(262, 'Cà tím Châu Phi (kg)', 120000, 1, 120000, 7, 3, 'catim.jpg', 239),
(262, 'Dưa leo Ấn Độ (kg)', 50000, 1, 50000, 13, 3, 'dualeoando.png', 240),
(262, 'Ớt chuông đỏ (kg)', 60000, 1, 60000, 23, 3, 'otchuongdo.png', 241),
(262, 'Nho Pháp thượng hạng (kg)', 150000, 1, 150000, 56, 1, 'nho.png', 242),
(262, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 243),
(262, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 244),
(263, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 245),
(264, 'Hồng đỏ Nam Mỹ (kg)', 165000, 2, 330000, 11, 1, 'hongdomy.png', 246),
(267, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 247),
(268, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 248),
(269, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 249),
(270, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 250),
(271, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 251),
(271, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 252),
(272, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 253),
(273, 'Hồng đỏ Nam Mỹ (kg)', 165000, 2, 330000, 11, 1, 'hongdomy.png', 254),
(273, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 255),
(273, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 256),
(273, 'Bánh kem bơ Pháp', 850000, 1, 850000, 1, 2, 'banhkembophap.jpg', 257),
(273, 'Bánh kem Matcha Nho', 320000, 1, 320000, 12, 2, 'banhkemnhomatcha.jpg', 258),
(273, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 259),
(273, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 260),
(274, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 261),
(274, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 262),
(274, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 263),
(274, 'Bánh kem bơ Pháp', 850000, 1, 850000, 1, 2, 'banhkembophap.jpg', 264),
(274, 'Bánh kem Matcha Nho', 320000, 1, 320000, 12, 2, 'banhkemnhomatcha.jpg', 265),
(274, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 266),
(274, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 267),
(275, 'Hồng đỏ Nam Mỹ (kg)', 165000, 2, 330000, 11, 1, 'hongdomy.png', 268),
(275, 'Dâu tây đỏ ngọt (kg)', 100000, 2, 200000, 18, 1, 'dautay.png', 269),
(275, 'Vải thiều loại to (kg)', 85000, 2, 170000, 21, 1, 'vaithieuloaito.png', 270),
(275, 'Bánh kem bơ Pháp', 850000, 2, 1700000, 1, 2, 'banhkembophap.jpg', 271),
(275, 'Bánh kem Matcha Nho', 320000, 2, 640000, 12, 2, 'banhkemnhomatcha.jpg', 272),
(275, 'Bánh kem Táo Hàn Quốc', 550000, 2, 1100000, 17, 2, 'banhkemtao.jpg', 273),
(275, 'Bánh kem Matcha', 600000, 2, 1200000, 22, 2, 'banhkemmatcha.jpg', 274);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `order_id` int NOT NULL,
  `total_cost` int NOT NULL,
  `bankcode` varchar(50) NOT NULL,
  `content` varchar(5) NOT NULL,
  `card_type` varchar(24) NOT NULL,
  `status` varchar(40) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`order_id`, `total_cost`, `bankcode`, `content`, `card_type`, `status`) VALUES
(226, 510000, 'VNPAY', '226', 'QRCODE', 'Thanh toán thất bại'),
(227, 330000, 'VNPAY', '227', 'QRCODE', 'Thanh toán thất bại'),
(233, 990000, 'VNPAY', '233', 'QRCODE', 'Thanh toán thất bại'),
(235, 1320000, 'VNPAY', '235', 'QRCODE', 'Thanh toán thất bại'),
(241, 212000, 'NCB', '241', 'ATM', 'Thanh toán thành công'),
(251, 10170000, 'NCB', '251', 'ATM', 'Thanh toán thành công'),
(252, 620000, 'VNPAY', '252', 'QRCODE', 'Thanh toán thất bại'),
(255, 660000, 'VNPAY', '255', 'QRCODE', 'Thanh toán thất bại'),
(259, 699600, 'VNPAY', '259', 'QRCODE', 'Thanh toán thất bại'),
(270, 630000, 'NCB', '270', 'ATM', 'Thanh toán thành công'),
(273, 2735000, 'NCB', '273', 'ATM', 'Thanh toán thành công'),
(275, 2403000, 'NCB', '275', 'ATM', 'Thanh toán thành công');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `manu_id` int NOT NULL,
  `type_id` int NOT NULL,
  `price` int NOT NULL,
  `discount_price` int NOT NULL,
  `pro_image` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `feature` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `discount_price`, `pro_image`, `description`, `feature`, `created_at`) VALUES
(1, 'Bánh kem bơ Pháp', 18, 2, 0, 850000, 'banhkembophap.jpg', 'Vẫn sở hữu phần cốt bánh bông lan xốp mịn, điều làm cho những chiếc bánh kem này trở nên đặc biệt và cuốn hút nằm ở phần kem bơ.\r\n\r\nKem bơ Pháp được làm từ những nguyên liệu gồm lòng đỏ trứng, syrup đường và bơ lạt. Nhờ sử dụng thêm lòng đỏ trứng, thành phẩm kem bơ sẽ có hương vị cực kì thơm ngon, mềm mượt và tan ngay khi vào miệng.\r\n\r\nNhững người thợ tài hoa của Grand Castella còn tận dụng phần kem bơ này, sáng tạo nên những hình ảnh trang trí độc đáo, giúp chiếc bánh kem đã ngon nay trở nên xinh đẹp hơn.', 1, '2021-10-22 04:15:10'),
(53, 'Cải thìa Triều Tiên (kg)', 18, 3, 0, 70000, 'caithia.png', 'Cải thìa Triều Tiên do ông Kim trồng ăn rất ngon nhé. Mua ăn thử đi biết', 0, '2022-11-18 08:20:02'),
(54, 'Cà rốt Bắc Mỹ (kg)', 18, 3, 0, 120000, 'carot.png', 'Cà rốt Bắc Mỹ do ông Donald Trump đích thân trồng tại nông trại. Không qua bất cứ máy móc và hóa chất. Nên rất ngon và đắt', 0, '2022-11-18 08:19:55'),
(55, 'Cà chua Nhật Bản (kg)', 18, 3, 0, 110000, 'cachua.png', 'Do Thiên Hoàng Minh Trị trồng từ thời chiến tranh thế giới thứ 2. Đặc biệt loại này không dính phóng xạ nên ăn bổ lắm nha.', 0, '2022-11-18 08:19:46'),
(3, 'Chanh tươi Irag (kg)', 18, 3, 0, 250000, 'chanhtuoiirag.png', 'Loại tranh xuất xứ từ những anh Iran, Irag đẹp trai. Khủng b*, nên chanh này ăn ngon và hấp dẫn. Tận hưởng những phút giây như bị kh**g bố khi ăn nó', 0, '2022-11-18 08:22:41'),
(5, 'Bánh kem dâu Ý', 18, 2, 0, 1200000, 'banhkemdau.jpg', 'Xuất xứ từ Ý, du nhập Việt Nam năm 2022. Mới lạ và đang là xu hướng', 1, '2022-11-18 08:22:28'),
(7, 'Cà tím Châu Phi (kg)', 18, 3, 0, 120000, 'catim.jpg', 'Loại cà tím Châu Phi này to thì khỏi phải nói :)). Ăn thì cũng ngon, làm ngất ngây bao nhiêu chị em. Mua ăn thử bạn nhé', 1, '2022-11-18 08:22:20'),
(11, 'Hồng đỏ Nam Mỹ (kg)', 18, 1, 225000, 165000, 'hongdomy.png', 'Hồng đỏ tươi Nam Mỹ, cung cấp nhiều khoáng chất tốt cho cơ thể', 1, '2022-11-18 08:22:12'),
(12, 'Bánh kem Matcha Nho', 18, 2, 0, 320000, 'banhkemnhomatcha.jpg', 'Sản phẩm tốt với giá thành rẻ. Ngon mà đẹp, thích hợp với sinh viên', 1, '2022-11-18 08:21:53'),
(13, 'Dưa leo Ấn Độ (kg)', 18, 3, 0, 50000, 'dualeoando.png', 'Dưa leo Ấn Độ chỉ được trồng ở Ấn Độ. Không xuất khẩu, nay có ở Việt Nam nhờ tui buôn l*u. Mua ăn đi nhé!!!', 1, '2022-11-18 08:21:34'),
(16, 'Chanh dây Nga tươi (kg)', 18, 1, 0, 120000, 'chanhday.png', 'Loại chanh dây đặc biệt này chỉ trồng được ở nước Hàn Đới như Nga, nên đừng thắc ắc giá cả. Mua ăn liền đi nhé!!!', 1, '2022-11-18 08:21:23'),
(17, 'Bánh kem Táo Hàn Quốc', 18, 2, 0, 550000, 'banhkemtao.jpg', 'Bánh kem táo Hàn Quốc siêu đẹp và ngon', 1, '2022-11-18 08:21:15'),
(18, 'Dâu tây đỏ ngọt (kg)', 18, 1, 0, 100000, 'dautay.png', 'Loại dâu tây này siêu ngọt và thơm. Ăn ngon nhé bạn', 1, '2022-11-18 08:21:01'),
(21, 'Vải thiều loại to (kg)', 18, 1, 0, 85000, 'vaithieuloaito.png', 'Vải thiều loại to, tươi mới mỗi ngày. Cung cấp Vitamin tốt cho sức khỏe', 0, '2022-11-18 08:20:52'),
(22, 'Bánh kem Matcha', 18, 2, 0, 600000, 'banhkemmatcha.jpg', 'Bánh kem matcha trà xanh, cực kỳ thơm ngon. Được khá nhiều người ưa chuộng', 1, '2022-11-18 08:22:01'),
(23, 'Ớt chuông đỏ (kg)', 18, 3, 0, 60000, 'otchuongdo.png', 'Ớt chuông đỏ cung cấp nhiều Vitamin D. Loại này ít cay nhưng ngon khi xào chung với Mực', 1, '2022-11-18 08:20:15'),
(56, 'Nho Pháp thượng hạng (kg)', 18, 1, 0, 150000, 'nho.png', 'Loại nho Pháp thượng hạng này được Napoleon cho trồng vào giữa thế kỷ XVII và thịnh hành đến bây giờ. Được mình nhập khẩu chui về bán cho bạn ăn', 0, '2022-11-18 08:19:33'),
(57, 'Kiwi ngọt Brazil (kg)', 18, 1, 260000, 190000, 'kiwi.png', 'Kiwi được hái từ trong rừng Amazon tại Brazil, hương vị phải nói là ngây ngất lòng người, ăn 1 lần là lần sau khỏi ăn luôn', 0, '2022-11-20 03:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Trái cây tươi'),
(2, 'Bánh ngọt'),
(3, 'Rau củ');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL,
  `role_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL,
  `Sell_number` int NOT NULL,
  `Import_quantity` int NOT NULL,
  `Import_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `Sell_number`, `Import_quantity`, `Import_date`) VALUES
(2, 300, 1200, '2021-11-12 01:41:19'),
(3, 1200, 2000, '2021-11-12 01:42:44'),
(4, 100, 1000, '2021-11-12 01:43:12'),
(5, 700, 1500, '2021-11-12 01:43:38'),
(6, 100, 500, '2021-11-12 01:44:04'),
(7, 600, 1000, '2021-11-12 01:44:30'),
(8, 170, 300, '2021-11-12 01:44:52'),
(9, 100, 500, '2021-11-12 01:45:20'),
(10, 150, 400, '2021-11-19 12:29:46'),
(11, 160, 300, '2021-11-19 12:32:39'),
(12, 200, 500, '2021-11-19 12:32:54'),
(13, 320, 540, '2021-11-19 12:33:05'),
(14, 250, 350, '2021-11-19 12:33:17'),
(15, 700, 1000, '2021-11-19 12:33:34'),
(16, 300, 600, '2021-11-19 12:33:49'),
(17, 100, 200, '2021-11-19 12:34:01'),
(18, 500, 1000, '2021-12-14 02:25:29'),
(19, 300, 1250, '2021-12-14 02:25:29'),
(20, 400, 700, '2021-12-14 02:26:09'),
(21, 150, 500, '2021-12-14 02:26:30'),
(22, 190, 700, '2021-12-14 02:26:43'),
(23, 250, 800, '2021-12-14 02:26:58'),
(24, 800, 2000, '2021-12-14 02:27:10'),
(25, 300, 750, '2021-12-14 02:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status` int NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status`, `status_name`) VALUES
(0, 'Đang gói hàng'),
(1, 'Đã giao hàng'),
(2, 'Đang thanh toán'),
(3, 'Đã thanh toán'),
(4, 'Đang giao hàng'),
(5, 'Đơn đã hủy'),
(6, 'Đã hủy thanh toán');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `First_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Last_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `image`, `First_name`, `Last_name`, `phone`, `username`, `password`, `role_id`) VALUES
(1, 'admin.jpg', 'Hồ ', 'Duy Hoàng', 935540795, 'hoang', '202cb962ac59075b964b07152d234b70', 1),
(14, 'avatar3.jpg', 'Nguyễn ', 'Quốc Huy', 123456, 'huy', '202cb962ac59075b964b07152d234b70', 2),
(17, NULL, 'Đàm ', 'Vinh Quang', 999777333, 'quang', '202cb962ac59075b964b07152d234b70', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
