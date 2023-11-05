-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2023 lúc 02:19 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `image`, `url`, `description`, `status`) VALUES
(27, 'banner1.jpg', 'https://bloghealthlife.online/', '<p>Đ&acirc;y l&agrave; m&ocirc; tả</p>\r\n', 'display'),
(28, 'banner2.jpg', 'https://bloghealthlife.online/', '<p>Đ&acirc;y l&agrave; m&ocirc; tả</p>\r\n', 'display'),
(29, 'banner3.jpg', 'https://bloghealthlife.online/', '<p>Đ&acirc;y l&agrave; m&ocirc; tả</p>\r\n', 'display');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `userId`, `categoryName`, `description`) VALUES
(65, 16, 'Smartphone', '<p>Latest smartphones 2024</p>\r\n'),
(66, 16, 'Laptop', '<p>Latest laptops 2024</p>\r\n'),
(67, 21, 'Electronic accessories', '<p>Latest electronic accessories 2024</p>\r\n'),
(68, 21, 'Desktop', '<p>Latest desktop computers 2024</p>\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `content` varchar(9999) NOT NULL,
  `createdate` datetime NOT NULL,
  `rate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`userId`, `productId`, `content`, `createdate`, `rate`) VALUES
(16, 20, 'Very nice jacket 😍😍😍', '2023-11-04 19:39:47', 'good'),
(16, 20, 'Quá dữ lun gòi', '2023-11-04 19:39:59', 'good'),
(16, 20, 'ô kê nun', '2023-11-04 19:40:03', 'good'),
(16, 20, 'sốp lừa đẻo', '2023-11-04 19:40:45', 'bad'),
(16, 20, 'tô lạ mi', '2023-11-04 19:41:08', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` mediumtext NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `emails`
--

INSERT INTO `emails` (`id`, `userId`, `name`, `email`, `message`, `createdate`) VALUES
(8, 16, 'Trần Quang Nghĩa', 'niboss458@gmail.com', 'Ngày 4/10, theo tin từ Công an huyện Kỳ Sơn (Nghệ An), đơn vị vừa khởi tố Lô Thị My (SN 1990) và Lo Bún Ma (SN 1988), cùng trú tại xã Hữu Lập, huyện Kỳ Sơn về tội Mua bán người.\nTrước đó, đầu tháng 10/2023, Công an huyện Kỳ Sơn nhận được đơn đơn tố giác của chị V.H.Y. (SN 1989) trình báo từng bị 2 đối tượng Lô Thị My và Lo Bún Ma lừa bán sang Trung Quốc.\n\nTheo điều tra, tháng 6/2014, Lô Thị My (lấy chồng và sinh sống tại Trung Quốc) gọi điện cho Lo Bún Ma nói muốn kiếm người lấy chồng bên Trung Quốc, nếu thành công sẽ chia “hoa hồng”.\n\nBiết chị V.H.Y đang lâm vào tình trạng khó khăn, cần tiền trả nợ nên Lo Bún Ma đã dụ dỗ, rủ rê Y. sang Trung Quốc “làm việc nhẹ, lương cao”.', '2023-11-04 20:09:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `productId` int(11) NOT NULL,
  `image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`productId`, `image`) VALUES
(20, 'ipprm.jpg'),
(20, 'ip15.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logs`
--

CREATE TABLE `logs` (
  `userId` int(11) NOT NULL,
  `loginTime` datetime NOT NULL,
  `logoutTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `logs`
--

INSERT INTO `logs` (`userId`, `loginTime`, `logoutTime`) VALUES
(16, '2023-10-27 11:16:28', '2023-10-27 11:16:37'),
(16, '2023-10-27 11:16:51', '2023-10-27 12:18:19'),
(16, '2023-10-27 12:18:28', '2023-10-27 12:58:19'),
(16, '2023-10-27 13:00:30', '2023-10-27 14:04:29'),
(16, '2023-10-28 17:23:24', '2023-10-28 17:51:48'),
(21, '2023-10-28 17:51:51', '2023-10-28 17:52:16'),
(16, '2023-10-28 17:52:25', '2023-10-28 22:11:37'),
(21, '2023-10-28 22:11:47', '2023-10-28 22:15:13'),
(16, '2023-10-29 08:03:31', '2023-10-29 11:04:12'),
(16, '2023-10-29 11:04:15', '2023-10-29 11:08:47'),
(16, '2023-10-29 13:22:59', '2023-10-29 14:37:12'),
(16, '2023-10-29 14:39:28', '2023-10-29 14:53:38'),
(21, '2023-10-29 14:53:47', '0000-00-00 00:00:00'),
(16, '2023-10-29 19:15:43', '2023-10-29 19:39:30'),
(16, '2023-10-29 19:39:34', '2023-10-29 21:47:37'),
(16, '2023-10-30 08:35:33', '2023-10-30 08:45:09'),
(21, '2023-10-30 08:45:13', '2023-10-30 11:09:39'),
(21, '2023-10-30 11:09:43', '0000-00-00 00:00:00'),
(16, '2023-10-30 15:05:57', '0000-00-00 00:00:00'),
(16, '2023-10-31 08:00:52', '2023-10-31 08:01:16'),
(21, '2023-10-31 08:01:19', '2023-10-31 08:01:41'),
(21, '2023-10-31 08:04:40', '2023-10-31 08:04:51'),
(21, '2023-10-31 08:04:55', '2023-10-31 08:05:16'),
(21, '2023-10-31 08:05:19', '2023-10-31 08:07:01'),
(16, '2023-10-31 08:07:04', '2023-10-31 08:07:15'),
(21, '2023-10-31 08:07:19', '2023-10-31 08:35:47'),
(16, '2023-10-31 08:37:28', '2023-10-31 09:26:44'),
(16, '2023-10-31 09:27:35', '2023-10-31 09:32:10'),
(16, '2023-10-31 09:33:16', '2023-10-31 09:34:48'),
(16, '2023-10-31 09:35:03', '2023-10-31 09:36:07'),
(16, '2023-10-31 09:36:13', '2023-10-31 09:39:16'),
(16, '2023-10-31 09:39:47', '2023-10-31 10:45:45'),
(16, '2023-10-31 10:45:50', '0000-00-00 00:00:00'),
(16, '2023-10-31 19:37:47', '2023-10-31 19:37:51'),
(16, '2023-10-31 19:37:55', '2023-10-31 22:01:56'),
(21, '2023-10-31 22:02:00', '2023-10-31 22:02:11'),
(32, '2023-10-31 22:02:16', '2023-10-31 22:11:56'),
(16, '2023-10-31 22:11:58', '2023-10-31 22:59:45'),
(16, '2023-10-31 22:59:48', '0000-00-00 00:00:00'),
(16, '2023-11-01 08:24:24', '0000-00-00 00:00:00'),
(16, '2023-11-01 14:37:47', '2023-11-01 14:38:21'),
(16, '2023-11-01 18:39:01', '2023-11-01 19:43:28'),
(21, '2023-11-01 19:43:55', '2023-11-01 20:01:21'),
(16, '2023-11-01 20:03:55', '0000-00-00 00:00:00'),
(16, '2023-11-01 20:09:11', '2023-11-01 20:39:38'),
(16, '2023-11-01 20:41:50', '0000-00-00 00:00:00'),
(16, '2023-11-02 09:15:23', '2023-11-02 10:56:55'),
(21, '2023-11-02 10:56:57', '0000-00-00 00:00:00'),
(16, '2023-11-02 12:47:25', '2023-11-02 12:47:49'),
(16, '2023-11-02 13:11:23', '0000-00-00 00:00:00'),
(16, '2023-11-02 13:30:48', '2023-11-02 13:41:26'),
(16, '2023-11-02 15:39:18', '2023-11-02 18:31:12'),
(16, '2023-11-02 19:44:20', '2023-11-02 21:57:40'),
(16, '2023-11-03 09:10:14', '2023-11-03 10:44:12'),
(16, '2023-11-03 10:44:49', '2023-11-03 10:48:27'),
(21, '2023-11-03 10:48:31', '2023-11-03 10:48:41'),
(16, '2023-11-03 10:48:45', '2023-11-03 11:35:09'),
(16, '2023-11-03 11:38:36', '2023-11-03 11:44:07'),
(16, '2023-11-03 11:44:11', '2023-11-03 12:06:56'),
(16, '2023-11-03 12:07:39', '2023-11-03 12:09:48'),
(16, '2023-11-03 12:10:07', '2023-11-03 12:10:13'),
(21, '2023-11-03 12:10:16', '0000-00-00 00:00:00'),
(16, '2023-11-03 14:19:42', '2023-11-03 14:30:24'),
(16, '2023-11-03 14:42:20', '0000-00-00 00:00:00'),
(16, '2023-11-03 15:54:24', '2023-11-03 16:38:43'),
(21, '2023-11-03 16:38:46', '2023-11-03 16:39:05'),
(16, '2023-11-03 16:39:07', '2023-11-03 17:04:34'),
(16, '2023-11-03 17:06:59', '0000-00-00 00:00:00'),
(16, '2023-11-03 19:11:06', '0000-00-00 00:00:00'),
(16, '2023-11-04 08:01:52', '2023-11-04 08:06:55'),
(16, '2023-11-04 08:06:57', '2023-11-04 08:07:16'),
(16, '2023-11-04 08:07:18', '2023-11-04 08:08:51'),
(16, '2023-11-04 08:09:51', '2023-11-04 08:09:59'),
(21, '2023-11-04 08:10:03', '2023-11-04 09:49:33'),
(16, '2023-11-04 09:49:40', '2023-11-04 10:09:07'),
(16, '2023-11-04 11:34:35', '2023-11-04 14:55:22'),
(16, '2023-11-04 14:57:13', '2023-11-04 14:58:07'),
(16, '2023-11-04 14:58:25', '0000-00-00 00:00:00'),
(16, '2023-11-04 18:53:00', '2023-11-04 18:54:21'),
(16, '2023-11-04 18:54:26', '2023-11-04 18:55:01'),
(16, '2023-11-04 18:55:09', '2023-11-04 19:31:27'),
(16, '2023-11-04 19:20:59', '0000-00-00 00:00:00'),
(16, '2023-11-04 19:32:41', '2023-11-04 19:32:49'),
(21, '2023-11-04 19:32:52', '2023-11-04 19:33:01'),
(16, '2023-11-04 19:33:06', '2023-11-04 20:58:28'),
(16, '2023-11-04 21:12:26', '2023-11-04 21:47:32'),
(21, '2023-11-04 22:04:52', '2023-11-04 22:05:51'),
(16, '2023-11-04 22:05:59', '2023-11-04 22:10:15'),
(16, '2023-11-04 22:23:46', '2023-11-04 22:26:58'),
(21, '2023-11-04 22:35:23', '2023-11-04 22:41:21'),
(16, '2023-11-04 22:41:24', '2023-11-04 22:48:50'),
(16, '2023-11-04 22:49:00', '2023-11-04 23:03:47'),
(32, '2023-11-04 23:03:52', '2023-11-04 23:04:37'),
(16, '2023-11-04 23:04:40', '2023-11-04 23:04:44'),
(21, '2023-11-04 23:04:47', '2023-11-04 23:05:54'),
(32, '2023-11-04 23:06:36', '2023-11-04 23:06:50'),
(21, '2023-11-04 23:06:56', '2023-11-04 23:07:04'),
(16, '2023-11-04 23:07:08', '0000-00-00 00:00:00'),
(16, '2023-11-04 23:08:05', '2023-11-04 23:15:56'),
(32, '2023-11-04 23:16:04', '2023-11-04 23:16:37'),
(16, '2023-11-05 08:01:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userIdHandle` int(11) NOT NULL,
  `createdate` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `note` varchar(500) NOT NULL,
  `process` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `userId`, `userIdHandle`, `createdate`, `total`, `note`, `process`, `status`) VALUES
(1, 21, 16, '2023-11-03 06:08:10', 999999, 'Không bỏ hành :))))', 'confirm', 'unpaid'),
(19, 21, 16, '2023-11-03 06:08:10', 999999, 'Không bỏ hành :))))', 'processing', 'unpaid'),
(20, 21, 16, '2023-11-03 06:08:10', 999999, 'Không bỏ hành :))))', 'delivering', 'unpaid'),
(21, 21, 21, '2023-11-03 06:08:10', 999999, 'Không bỏ hành :))))', 'completed', 'paid'),
(22, 21, 21, '2023-11-03 06:08:10', 999999, 'Không bỏ hành :))))', 'delivering', 'boom'),
(23, 21, 0, '2023-11-03 06:08:10', 999999, 'Không bỏ hành :))))', 'send', 'unpaid'),
(24, 21, 0, '2023-11-03 06:08:10', 999999, 'Không bỏ hành :))))', 'send', 'unpaid'),
(25, 21, 0, '2023-11-03 06:08:10', 999999, 'Không bỏ hành :))))', 'send', 'unpaid');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `image` varchar(999) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `details` mediumtext NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `categoryId`, `image`, `productName`, `price`, `discount`, `quantity`, `description`, `details`, `status`) VALUES
(20, 65, 'ip15prm.png', 'Iphone 15 ProMax - Hàng chính hãng mới nhất 2023', 1438, 0, 2000, '<p>iPhone 15 Pro Max l&agrave; một t&aacute;c phẩm nghệ thuật của Apple, kết hợp sự tinh tế trong thiết kế v&agrave; sức mạnh của c&ocirc;ng nghệ. Với vỏ kim loại chất lượng cao, iPhone 15 Pro Max tỏa s&aacute;ng với đường n&eacute;t mềm mại v&agrave; tinh tế, c&ugrave;ng với m&agrave;n h&igrave;nh OLED Super Retina tương tự, mang đến một trải nghiệm h&igrave;nh ảnh tuyệt vời. Độ ph&acirc;n giải 4K v&agrave; tốc độ l&agrave;m tươi cực cao đảm bảo rằng mọi h&igrave;nh ảnh tr&ecirc;n m&agrave;n h&igrave;nh tr&ocirc;ng rất sắc n&eacute;t v&agrave; sống động.</p>\r\n\r\n<p>Về hiệu suất, iPhone 15 Pro Max được trang bị bộ vi xử l&yacute; A16, mạnh mẽ hơn bao giờ hết. Điều n&agrave;y đồng nghĩa với việc bạn c&oacute; thể chạy mượt m&agrave; c&aacute;c ứng dụng kh&oacute; nhất v&agrave; thậm ch&iacute; tận dụng khả năng thực tế ảo v&agrave; trải nghiệm thực tế ảo một c&aacute;ch mượt m&agrave;.</p>\r\n\r\n<p>Hệ thống camera tr&ecirc;n iPhone 15 Pro Max kh&ocirc;ng ngừng n&acirc;ng cao, với một cụm camera sau đa dạng. Bạn c&oacute; camera ch&iacute;nh c&oacute; khả năng chụp ảnh chất lượng cao trong mọi điều kiện &aacute;nh s&aacute;ng, một camera si&ecirc;u rộng cho c&aacute;c bức ảnh phong cảnh tuyệt đẹp, v&agrave; một camera telephoto để chụp cận cảnh. T&iacute;ch hợp c&ocirc;ng nghệ x&oacute;a nền th&ocirc;ng minh v&agrave; chế độ chụp ban đ&ecirc;m cải tiến, bạn c&oacute; thể tạo ra những bức ảnh độc đ&aacute;o v&agrave; ấn tượng.</p>\r\n\r\n<p>Với pin dung lượng lớn, bạn c&oacute; thể sử dụng iPhone 15 Pro Max suốt cả ng&agrave;y m&agrave; kh&ocirc;ng cần lo lắng về việc hết pin. T&iacute;nh năng sạc nhanh gi&uacute;p bạn nạp đầy pin nhanh ch&oacute;ng khi cần thiết. V&agrave; với hỗ trợ 5G, bạn sẽ trải nghiệm tốc độ internet si&ecirc;u nhanh, cho ph&eacute;p tải xuống nhanh ch&oacute;ng v&agrave; xem video mượt m&agrave;.</p>\r\n\r\n<p>Bảo mật l&agrave; ưu ti&ecirc;n h&agrave;ng đầu với t&iacute;nh năng Face ID ti&ecirc;n tiến, đảm bảo rằng chỉ bạn mới c&oacute; thể truy cập thiết bị. iPhone 15 Pro Max chạy tr&ecirc;n hệ điều h&agrave;nh iOS mới nhất, đồng thời hỗ trợ c&aacute;c ứng dụng v&agrave; dịch vụ mới, biến n&oacute; th&agrave;nh một thiết bị th&ocirc;ng minh ho&agrave;n hảo cho mọi nhu cầu.</p>\r\n', '<p><strong>Thiết kế:</strong></p>\r\n\r\n<ul>\r\n	<li>K&iacute;ch thước: 160 x 75 x 7 mm</li>\r\n	<li>Trọng lượng: 220 gram</li>\r\n	<li>Vật liệu vỏ: Kim loại v&agrave; k&iacute;nh chất lượng cao</li>\r\n	<li>M&agrave;n h&igrave;nh: OLED Super Retina với độ ph&acirc;n giải 4K, 6.7 inch, tốc độ l&agrave;m tươi 120Hz</li>\r\n</ul>\r\n\r\n<p><strong>Hiệu suất:</strong></p>\r\n\r\n<ul>\r\n	<li>Bộ vi xử l&yacute;: Apple A16 Bionic</li>\r\n	<li>RAM: 8GB</li>\r\n	<li>Bộ nhớ trong: 128GB / 256GB / 512GB / 1TB</li>\r\n</ul>\r\n\r\n<p><strong>Hệ thống Camera:</strong></p>\r\n\r\n<ul>\r\n	<li>Camera ch&iacute;nh: 108MP, khẩu độ f/1.8</li>\r\n	<li>Camera si&ecirc;u rộng: 20MP, khẩu độ f/2.2</li>\r\n	<li>Camera telephoto: 12MP, khẩu độ f/2.4, zoom quang 3x</li>\r\n	<li>Camera selfie: 32MP, khẩu độ f/2.0</li>\r\n	<li>Chế độ chụp ban đ&ecirc;m cải tiến</li>\r\n	<li>T&iacute;ch hợp c&ocirc;ng nghệ x&oacute;a nền th&ocirc;ng minh</li>\r\n</ul>\r\n\r\n<p><strong>Pin v&agrave; Sạc:</strong></p>\r\n\r\n<ul>\r\n	<li>Pin dung lượng: 5.000mAh</li>\r\n	<li>Hỗ trợ sạc nhanh 66W</li>\r\n	<li>Hỗ trợ sạc kh&ocirc;ng d&acirc;y 25W</li>\r\n	<li>Hỗ trợ sạc ngược kh&ocirc;ng d&acirc;y</li>\r\n</ul>\r\n\r\n<p><strong>Kết nối:</strong></p>\r\n\r\n<ul>\r\n	<li>Hỗ trợ mạng 5G</li>\r\n	<li>Hỗ trợ Wi-Fi 6E</li>\r\n	<li>Cổng Lightning</li>\r\n	<li>NFC</li>\r\n	<li>Face ID với t&iacute;nh năng nhận diện khu&ocirc;n mặt ti&ecirc;n tiến</li>\r\n</ul>\r\n\r\n<p><strong>Hệ điều h&agrave;nh:</strong></p>\r\n\r\n<ul>\r\n	<li>iOS 16</li>\r\n</ul>\r\n', 'hot');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userinformation`
--

CREATE TABLE `userinformation` (
  `userId` int(11) NOT NULL,
  `fullName` varchar(999) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `numberphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `userinformation`
--

INSERT INTO `userinformation` (`userId`, `fullName`, `email`, `address`, `numberphone`) VALUES
(16, 'Nghĩa Đẹi Koa', 'nghiadaica@gmail.com', 'Khối 4, huyện Đăk Tô, tỉnh KonTum', '0366461704');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `token` varchar(400) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `orderNum` int(11) NOT NULL,
  `boomNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `token`, `userName`, `email`, `password`, `role`, `status`, `orderNum`, `boomNum`) VALUES
(16, 'ed93cf1e1800f4e0924843c9ba7682d472ef52feeb00d2122d6556252d49a15b7d8b96d22c11737e', 'Nghĩa Đại Ca', 'nghiadaica@gmail.com', '$2y$10$9JZhdXzOkoAdTiyQtde54u/CL4iv7bg7rzM4JSJG.ymOrsawBgZWa', 'admin', 'active', 0, 0),
(21, '5f9a4582c5733f4cd0914bb5c1a7023bfcad3f5f1d346ec47da6fbbd0e49e98d84d7d96acf8aefc3', 'niboss458@gmail.com', 'niboss458@gmail.com', '$2y$10$VBKerk.NrXs4c1E8nB8lKu3D.kyUXVbtSpOOboxkFJQdMestINKL6', 'staff', 'active', 0, 0),
(32, '245aa4be23b205b09a364873a9f9584717e8be6499714cf4614795ca80d74a12caacf88ef937f427', 'Sinh viên', 'nghiatqpd07595@fpt.edu.vn', '$2y$10$Ir0MINlPhB0l3Uz/khmSRuDcdLxXtf4mgt8vxvVKzHkmWOT/in.2i', 'user', 'active', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categories-users` (`userId`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD KEY `fk_comment-user` (`userId`),
  ADD KEY `fk_comment-product` (`productId`);

--
-- Chỉ mục cho bảng `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_email` (`userId`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD KEY `fk_images` (`productId`);

--
-- Chỉ mục cho bảng `logs`
--
ALTER TABLE `logs`
  ADD KEY `fk_logs` (`userId`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `fk_order-details` (`orderId`),
  ADD KEY `fk_order-productId` (`productId`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order-user` (`userId`),
  ADD KEY `fk_userIdHandle` (`userIdHandle`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categories-product` (`categoryId`);

--
-- Chỉ mục cho bảng `userinformation`
--
ALTER TABLE `userinformation`
  ADD KEY `fk_userInformation` (`userId`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categories-users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment-product` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_comment-user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `emails`
--
ALTER TABLE `emails`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `fk_logs` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `fk_order-details` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_order-productId` FOREIGN KEY (`productId`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order-user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_categories-product` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `userinformation`
--
ALTER TABLE `userinformation`
  ADD CONSTRAINT `fk_userInformation` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
