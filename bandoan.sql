-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 29, 2023 lúc 10:45 AM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bandoan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(18, 'Capple.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `total` int NOT NULL,
  `note` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `checkout` int NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address`, `phone`, `status`, `total`, `note`, `checkout`, `date_create`) VALUES
(114, 14, '140 Nguyễn Văn Tăng, Long Thạnh Mỹ, Quận 9, Thành phố Thủ Đức', '0977711233', 1, 3630000, 'Chuẩn bị bữa tối', 0, '2023-03-28 08:57:08'),
(115, 1, 'Man Thiện, Long Thạnh Mỹ, Quận 9, Thành phố Thủ Đức', '0979933966', 1, 1500000, '', 0, '2023-03-28 09:00:35'),
(113, 1, '266 Nguyễn Thái Sơn, P.5, Quận Gò Vấp, Thành phố Hồ Chí Minh', '0935540795', 1, 4535000, 'Chúc mừng sinh nhật', 0, '2023-03-28 08:54:34'),
(120, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 5, 165000, '', 0, '2023-10-27 08:21:06'),
(119, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 690000, '', 0, '2023-10-27 07:46:42'),
(121, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 165000, '', 0, '2023-10-27 12:23:44'),
(148, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 5, 310000, '', 0, '2023-10-27 16:15:40'),
(151, 1, 'test', '0357369820', 0, 310000, '', 0, '2023-10-27 16:41:43'),
(149, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 1990000, '', 0, '2023-10-27 16:26:50'),
(150, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 5, 310000, '', 0, '2023-10-27 16:41:16'),
(152, 1, '15 An Nhon', '0935540795', 0, 190000, '', 0, '2023-10-27 17:16:20'),
(153, 1, '190 Nguyễn Thái Sơn, Phường 4, Quận Gò Vấp', '935540795', 0, 165000, '', 1, '2023-10-27 17:16:38'),
(154, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 310000, '', 1, '2023-10-27 17:22:12'),
(155, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 310000, '', 0, '2023-10-28 04:13:39'),
(156, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 165000, '', 0, '2023-10-28 04:13:55'),
(157, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 165000, '', 0, '2023-10-28 04:15:44'),
(158, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 120000, '', 0, '2023-10-28 04:17:30'),
(159, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 120000, '', 0, '2023-10-28 04:22:46'),
(160, 1, '15 An Nhon', '0935540795', 0, 85000, '', 0, '2023-10-28 04:24:48'),
(161, 1, '190 Nguyễn Thái Sơn, Phường 4, Quận Gò Vấp', '935540795', 5, 120000, '', 0, '2023-10-28 04:27:45'),
(162, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 5, 120000, '', 1, '2023-10-28 04:27:56'),
(163, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 85000, '', 0, '2023-10-28 04:30:24'),
(164, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 120000, '', 0, '2023-10-28 04:31:30'),
(165, 1, 'test', '0357369820', 0, 165000, '', 0, '2023-10-28 04:33:48'),
(166, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 1200000, '', 1, '2023-10-28 04:35:46'),
(167, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 320000, '', 0, '2023-10-28 04:39:03'),
(168, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 355000, '', 0, '2023-10-28 06:44:03'),
(169, 1, '566/72/63R Nguyễn Thái Sơn, P.5, Quận Gò Vấp', '0935540795', 0, 850000, '', 0, '2023-10-28 06:44:17'),
(170, 1, 'test', '0357369820', 0, 550000, '', 0, '2023-10-28 06:45:00'),
(171, 1, 'test', '0357369820', 0, 1550000, '', 1, '2023-10-28 06:56:01'),
(172, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 380000, '', 1, '2023-10-28 07:41:52'),
(173, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 190000, '', 1, '2023-10-28 07:44:48'),
(174, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 190000, '', 1, '2023-10-28 08:01:10'),
(175, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 190000, '', 1, '2023-10-28 08:04:00'),
(176, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 190000, '', 1, '2023-10-28 08:10:25'),
(177, 1, '15 An Nhon', '0935540795', 0, 310000, '', 1, '2023-10-28 08:16:54'),
(178, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 190000, '', 1, '2023-10-28 08:17:55'),
(179, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 380000, '', 1, '2023-10-28 09:32:36'),
(180, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 355000, '', 1, '2023-10-29 03:24:10'),
(181, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 0, '2023-10-29 03:24:40'),
(182, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 165000, '', 1, '2023-10-29 03:29:24'),
(183, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 1, '2023-10-29 03:30:00'),
(184, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 0, '2023-10-29 03:31:15'),
(185, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 1200000, '', 0, '2023-10-29 03:32:32'),
(186, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 0, '2023-10-29 03:34:29'),
(187, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 5, 100000, '', 0, '2023-10-29 03:35:56'),
(188, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 0, '2023-10-29 03:52:28'),
(189, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 1, '2023-10-29 03:53:16'),
(190, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 0, '2023-10-29 03:55:11'),
(191, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 0, '2023-10-29 04:12:05'),
(192, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 0, '2023-10-29 04:14:47'),
(193, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 190000, '', 0, '2023-10-29 04:15:27'),
(194, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 190000, '', 0, '2023-10-29 04:23:04'),
(195, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 165000, '', 0, '2023-10-29 04:26:09'),
(196, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 190000, '', 0, '2023-10-29 04:27:49'),
(197, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 190000, '', 1, '2023-10-29 04:31:24'),
(198, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 100000, '', 0, '2023-10-29 06:24:19'),
(199, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 4, 190000, '', 0, '2023-10-29 06:27:52'),
(200, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 190000, '', 0, '2023-10-29 06:33:02'),
(201, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 1, '2023-10-29 06:36:33'),
(202, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 190000, '', 0, '2023-10-29 06:40:05'),
(203, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 3, 310000, '', 0, '2023-10-29 06:45:42'),
(204, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 190000, '', 0, '2023-10-29 06:47:36'),
(205, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 190000, '', 0, '2023-10-29 07:18:21'),
(206, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 190000, '', 0, '2023-10-29 07:52:14'),
(207, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 310000, '', 0, '2023-10-29 08:01:47'),
(208, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 190000, '', 0, '2023-10-29 08:06:07'),
(209, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 5, 190000, '', 0, '2023-10-29 08:07:42'),
(210, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 3, 190000, '', 0, '2023-10-29 08:08:21'),
(211, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 5, 190000, '', 0, '2023-10-29 08:10:41'),
(212, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 190000, '', 0, '2023-10-29 08:15:46'),
(213, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 2, 190000, '', 0, '2023-10-29 08:39:48'),
(214, 1, '22 Lang Hai', '935540795', 6, 120000, '', 0, '2023-10-29 08:40:03'),
(215, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 85000, '', 0, '2023-10-29 10:24:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
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
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
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
(215, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 167);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
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
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`order_id`, `total_cost`, `bankcode`, `content`, `card_type`, `status`) VALUES
(207, 310000, 'NCB', '207', 'ATM', 'Thanh toán thành công'),
(208, 190000, 'NCB', '208', 'ATM', 'Đã hủy thanh toán'),
(206, 190000, 'VNPAY', '206', 'QRCODE', 'Đã hủy thanh toán'),
(210, 190000, 'VISA', '210', 'VISA', 'Thanh toán thành công'),
(214, 120000, 'VNPAY', '214', 'QRCODE', 'Đã hủy thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
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
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Trái cây tươi'),
(2, 'Bánh ngọt'),
(3, 'Rau củ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL,
  `role_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sales`
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
-- Đang đổ dữ liệu cho bảng `sales`
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
-- Cấu trúc bảng cho bảng `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `status` int NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Đang đổ dữ liệu cho bảng `status`
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
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `image`, `First_name`, `Last_name`, `phone`, `username`, `password`, `role_id`) VALUES
(1, 'admin.jpg', 'Hồ ', 'Duy Hoàng', 935540795, 'hoang', '202cb962ac59075b964b07152d234b70', 1),
(14, 'avatar3.jpg', 'Nguyễn ', 'Quốc Huy', 123456, 'huy', '202cb962ac59075b964b07152d234b70', 2),
(17, NULL, 'Đàm ', 'Vinh Quang', 999777333, 'quang', '202cb962ac59075b964b07152d234b70', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
