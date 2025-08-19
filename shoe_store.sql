yfg4ydu5av26927oproduct_imagesyfg4ydu5av26927oyfg4ydu5av26927oyfg4ydu5av26927oyfg4ydu5av26927oyfg4ydu5av26927oyfg4ydu5av26927o-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 18, 2025 lúc 10:21 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shoe_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `category_id`, `created_at`) VALUES
(1, 'NIKE', 1, '2025-07-29 05:51:00'),
(2, 'ADIDAS', 1, '2025-07-29 05:51:06'),
(3, 'CROCS', 2, '2025-07-29 09:26:41'),
(6, 'New Balance', 1, '2025-08-18 03:41:21'),
(7, 'Vans', 1, '2025-08-18 03:52:59'),
(8, 'MLB', 1, '2025-08-18 03:53:31'),
(9, 'Converse', 1, '2025-08-18 03:53:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Sneaker', '2025-07-29 05:49:54'),
(2, 'SLIDES', '2025-07-29 07:37:09'),
(3, 'SHIRT', '2025-07-29 07:37:15'),
(4, 'PANT', '2025-07-29 07:37:23'),
(5, 'ACCESSORIES', '2025-07-29 07:37:29'),
(16, 'SALE', '2025-08-11 09:38:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `image`, `created_at`) VALUES
(1, 'Đen', 'colors/uAhyu0x0M9hoyq0jlb4Q2ITnqrYLjUk70Qn34VAA.png', '2025-07-29 21:41:38'),
(2, 'Xanh dương', 'colors/pX6ziGzCyY9R7UP2GpKKv4bM9z8lYVe8OIrpH490.png', '2025-07-29 21:41:51'),
(3, 'Nâu', 'colors/DQyXTY9REqiAOqxfcRKNnrO7DLPwWuKuQqru9RPP.jpg', '2025-07-29 21:42:53'),
(4, 'Xanh lá', 'colors/yY3mJJDDqVaaXQA3avZPRl5UwPNTrM5ATi1PHgz1.jpg', '2025-07-29 21:44:19'),
(5, 'Xám', 'colors/Q4UWARhe6OEPmlT5hVU5KrYKPbumq1Su3xX7P7jU.jpg', '2025-07-29 21:44:58'),
(6, 'Hồng', 'colors/jKxEnqzPGNRw9idoCB2mIEip5fuMXNIqYUURCekw.png', '2025-07-29 21:45:46'),
(7, 'Đỏ', 'colors/68f2zDqQKpCKuRKSqLg2nsUGDrm7AxS701c7k510.png', '2025-07-29 21:46:25'),
(8, 'Trắng', 'colors/gCK4w6ejdb2t54wdjSubQjEuijyMBqwh9sIm0XLT.jpg', '2025-07-29 21:48:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Chờ xác nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `address`, `city`, `phone`, `email`, `payment_method`, `total_price`, `created_at`, `status`) VALUES
(35, 'tammm', 'hehe', 'hehe', '0123456789', 'thanh.tam6999@gmail.com', 'cod', 2815199.00, '2025-08-18 07:06:59', 'Chờ xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_name`, `size`, `quantity`, `price`, `image`, `product_id`) VALUES
(26, 35, 'Nike V2K Run', '36', 1, 2815199.00, 'products/h6xPHPxN9tiGSQ1yyNoYjqXeEQcnUpTlYvTyEYyp.bin', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `des` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `color_id` int(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `productLine_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `des`, `price`, `product_code`, `color_id`, `category_id`, `brand_id`, `productLine_id`, `image`, `created_at`) VALUES
(1, 'Nike Air Force 1 \'07', 'Thoải mái, bền bỉ và vượt thời gian — đây là đôi giày số một vì một lý do. Thiết kế cổ điển của thập niên 80 kết hợp chất liệu da trơn với các chi tiết nổi bật, mang đến phong cách phù hợp cho dù bạn đang ở trên sân hay đang di chuyển.', 2929000.00, 'T4m001', 8, 1, 1, 1, 'products/PHVpgfw7LVIk7gnFxIPERYCrmRsFTa3g77kEwG2v.bin', '2025-08-18 04:30:04'),
(2, 'Air Jordan 1 Low', 'Lấy cảm hứng từ phiên bản gốc ra mắt năm 1985, Air Jordan 1 Low mang đến vẻ ngoài gọn gàng, cổ điển, vừa quen thuộc vừa luôn tươi mới. Với thiết kế biểu tượng, hoàn toàn phù hợp với mọi phong cách, đôi giày này đảm bảo bạn sẽ luôn nổi bật.', 3239000.00, 'T4m002', 1, 1, 1, 2, 'products/ZXvTfVLCaFN7jd0Aul3H6mLKiuSUuf7TNmNMzwBS.bin', '2025-08-18 05:30:05'),
(3, 'Air Jordan 1 Mid', '221 / 5.000\r\nPhiên bản AJ1 này tái hiện mẫu giày đặc trưng đầu tiên của Nike với sự kết hợp màu sắc tươi mới. Chất liệu cao cấp, đệm êm ái và cổ giày có đệm mang đến sự hỗ trợ toàn diện và tôn vinh đôi giày đã khởi nguồn cho tất cả.', 2143199.00, 'T4m003', 1, 1, 1, 2, 'products/7zqMVl7C7CQv2d1e171I8NxN7SEOahyzOHXWaZMN.bin', '2025-08-18 05:59:45'),
(5, 'Nike Air Max 90', '315 / 5.000\r\nHãy xỏ dây giày và cảm nhận di sản. Được sản xuất tại nơi giao thoa giữa nghệ thuật, âm nhạc và văn hóa, đôi giày chạy bộ vô địch này đã góp phần định hình thập niên 90. Được các tổng thống mang, cách mạng hóa qua các lần hợp tác và được tôn vinh qua những phối màu hiếm có, hình ảnh nổi bật, đế ngoài Waffle và lớp đệm Air lộ thiên đã giúp đôi giày luôn sống động và bền bỉ.', 3519000.00, 'T4m004', 8, 1, 1, 3, 'products/53vN9ATJ9NisXmlx73GTVlQD4fy5UGwdc1e2FR8g.bin', '2025-08-18 06:09:20'),
(6, 'Nike V2K Run', '380 / 5.000\r\nTua nhanh. Quay ngược thời gian. Không quan trọng—đôi giày này mang hơi hướng hoài cổ vào tương lai. V2K tái hiện mọi thứ bạn yêu thích ở Vomero trong một diện mạo được lấy cảm hứng trực tiếp từ catalogue giày chạy bộ đầu những năm 2000. Kết hợp nhiều lớp giày với chất liệu kim loại bóng bẩy, chi tiết nhựa gợi nhớ và đế giữa mang đậm nét cổ điển hoàn hảo. Phần gót giày chắc chắn đảm bảo bạn luôn thoải mái dù ở bất cứ đâu.', 2815199.00, 'T4m005', 4, 1, 1, 4, 'products/h6xPHPxN9tiGSQ1yyNoYjqXeEQcnUpTlYvTyEYyp.bin', '2025-08-18 06:15:59'),
(7, 'Nike Air More Uptempo Low', 'Với phong cách bóng rổ bay cao và họa tiết graffiti, Air More Uptempo chắc chắn sẽ thu hút mọi ánh nhìn cả trong lẫn ngoài sân đấu. Phiên bản cổ thấp này kết hợp đệm Air và cổ giày có đệm, mang đến cho bạn cảm giác thoải mái như vẻ ngoài của mình.', 4999000.00, 'T4m006', 4, 1, 1, 5, 'products/Fb00hEiiog61Zp932wrIfj0CoHoWx9PweaXQ42E9.bin', '2025-08-18 06:18:16'),
(8, 'Nike Cortez Leather', 'Chỉ một từ: truyền thống. Từ phong cách chạy bộ truyền thống đến hiện tượng thời trang, sức hấp dẫn cổ điển, đế giữa mềm mại như bọt biển và chi tiết bập bênh đã mang đến dấu ấn thập kỷ này qua thập kỷ khác. Phiên bản này kết hợp chất liệu da trơn và màu sắc dễ phối đồ, mang đến một phong cách cổ điển.', 1999199.00, 'T4m007', 6, 1, 1, 8, 'products/dNB1fmuEoPRf17EekP1YfF8ZyLCxgiJuYTOvr7ip.bin', '2025-08-18 06:25:09'),
(9, 'Nike Dunk Low Retro', 'Bạn luôn có thể tin tưởng vào một đôi giày cổ điển. Dunk Low kết hợp phong cách phối màu đặc trưng với chất liệu cao cấp và lớp đệm êm ái, mang đến sự thoải mái vượt trội và bền bỉ. Khả năng là vô tận—bạn sẽ mang Dunk như thế nào?', 2929000.00, 'T4m008', 5, 1, 1, 9, 'products/VYkMkUEK7m3juVTZZjRBWiQWptYAtUFrS49X1VVs.bin', '2025-08-18 06:27:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`) VALUES
(58, 35, 'products/thumbs/U46xukYuhtlNuEmQstAMkjAz6wRsojlFAFKnnUqJ.bin', '2025-08-08 08:48:01'),
(59, 35, 'products/thumbs/ddSapMm18DxcIMIu6oaxKytFbHkz8ZfYu2QzvIWD.bin', '2025-08-08 08:48:01'),
(60, 35, 'products/thumbs/QFD17lR1cQxIlVmpc5yPVhnDD287VnSalziawuys.bin', '2025-08-08 08:48:01'),
(61, 35, 'products/thumbs/WCptKwaUD9ln76GzEacYIUgocurfMwXFSWCqHQa5.bin', '2025-08-08 08:48:01'),
(62, 36, 'products/thumbs/JUUNnpcC8HCqMdbCeY4Z0rqhS8UbBUwOE90bzgoZ.bin', '2025-08-08 08:48:59'),
(63, 36, 'products/thumbs/9XjuIw1s7Qfq8OwlW1mPjkifYsL21gj6DBXYK0ZV.bin', '2025-08-08 08:48:59'),
(64, 36, 'products/thumbs/6qETXT5oApY6aRHFZ67fM8F1Q8lW2wsKEb0wl2tT.bin', '2025-08-08 08:48:59'),
(65, 37, 'products/thumbs/Kc4lvzCMBStluqZfBv9snVwjGbpe9Th9XHqdENqk.bin', '2025-08-08 08:49:46'),
(66, 37, 'products/thumbs/2ppIrmdbMB6PbEEPUK91XdanhxpZI1tmLGIE4Tgb.bin', '2025-08-08 08:49:46'),
(67, 37, 'products/thumbs/7r5F1ZaOovzeyAfegv2sELavLUBsJiybvgPWUvTp.bin', '2025-08-08 08:49:46'),
(80, 38, 'products/thumbs/MlpQpJ9KZNC5HaC1ss5P0HKTCCH9bBHRhcI0giOG.bin', '2025-08-08 13:28:45'),
(81, 38, 'products/thumbs/o6AqzvGOhXS5mB6JVsqlxB3so3C9XA7ux3s14CB1.bin', '2025-08-08 13:28:45'),
(88, 34, 'products/thumbs/rTaviTtRhz0kDc2FsSh1xx9Dy0XCHqHxJzjHVUhN.bin', '2025-08-11 07:19:24'),
(89, 34, 'products/thumbs/RbBz7iw7gqLwmomkYcjjLe24GGymec6s2tEc9h86.bin', '2025-08-11 07:19:24'),
(90, 34, 'products/thumbs/JXCYGEK6gPPSD6NKIehtskZzGi60KGFrvQpE8qqB.bin', '2025-08-11 07:19:24'),
(91, 34, 'products/thumbs/OpoHQzYc6Ek6ePjQeccL7gsOfg0JiNA83nIu6eAw.bin', '2025-08-11 07:19:24'),
(92, 40, 'products/thumbs/bPhkcTUTpv6xvl5r4RddDHJoAWrt99PXF765gsyK.bin', '2025-08-11 07:52:32'),
(93, 40, 'products/thumbs/XNQH7yeWyeaMHd7vI3N43RCjS5nLTxspePSWq72f.bin', '2025-08-11 07:52:32'),
(94, 40, 'products/thumbs/ikNyF7sTu8LjREArfKldoKhNI0F9YjRYQJLeZjH4.bin', '2025-08-11 07:52:32'),
(95, 40, 'products/thumbs/Tok8h9of15WzeIUv4SidyEGHDa8eBGcYOxxJLzu6.bin', '2025-08-11 07:52:32'),
(96, 1, 'products/thumbs/5DzjaN1J5Qm0wVPGMXHTm6igikZDCOGMKa0Gl3tH.bin', '2025-08-18 04:30:04'),
(97, 1, 'products/thumbs/FWZcdagt16orBWayUBJfUUxl4jvagp2CgAVi9uml.bin', '2025-08-18 04:30:04'),
(98, 1, 'products/thumbs/pr0yYVtYPZdbLrfYR8bwO0eyKdbKC4wh974okA8o.bin', '2025-08-18 04:30:04'),
(99, 1, 'products/thumbs/mTDc8ikWZzfHnmKsNd7wMFu0LXM8grCvHLqz6xGX.bin', '2025-08-18 04:30:04'),
(100, 1, 'products/thumbs/xLRJ9X4g2eHWMPhzcWlxfdJuUlkajN6GDan5UmHY.bin', '2025-08-18 04:30:04'),
(101, 1, 'products/thumbs/kzUKEY20j7HnES1HlZCT54ZXgENKJq0rF8pm2Ugx.bin', '2025-08-18 04:30:04'),
(102, 2, 'products/thumbs/vvjZjePBheC6FHM0ssEQE87e86GLIrbC5N4xawaF.bin', '2025-08-18 05:30:05'),
(103, 2, 'products/thumbs/Jjizy7DYKOlKs92UIbXgvgA7rFlA1IvTJrhQH7Xm.bin', '2025-08-18 05:30:05'),
(104, 2, 'products/thumbs/Vcny1Rd4bQWPT7spo76SRyGdV1ADxA9sRM821Khh.bin', '2025-08-18 05:30:05'),
(105, 2, 'products/thumbs/YToeSS4EVj6XUhD8hH8cTnZLFvutV2S7VMtL4MoF.bin', '2025-08-18 05:30:05'),
(106, 2, 'products/thumbs/cnAFYRMAnQgDSkCYuscjUzKYqVcL0MObXHHPbd8x.bin', '2025-08-18 05:30:05'),
(107, 3, 'products/thumbs/adBbsxkdwxrJuU3D2dxcOLPYZKovHwFNVDxOhpQl.bin', '2025-08-18 05:59:45'),
(108, 3, 'products/thumbs/jaChDUUpMJIbkoYyLKQUaPznCOPnzGy4vUrfKWzW.bin', '2025-08-18 05:59:45'),
(109, 3, 'products/thumbs/dWA9xukdY5giQ5C7BOkXhEzQcnDUlj1hGLuat4du.bin', '2025-08-18 05:59:45'),
(110, 3, 'products/thumbs/UhH0tKzwgIXBWlMZ7yzdd1heOz56SzlSmENV9Y0A.bin', '2025-08-18 05:59:45'),
(111, 3, 'products/thumbs/DslHxCd0EGolSB0BXozOMTu0lZ0AZMk3GkegxzRD.bin', '2025-08-18 05:59:45'),
(112, 3, 'products/thumbs/THlZle0LFUE0fH9c7wgoVyTHHIhZWaOVdSZpFJeW.bin', '2025-08-18 05:59:45'),
(113, 5, 'products/thumbs/IQ2s2aBfUB2zfEOjDUSpACtKnpuf4SVOIcnNwqDD.bin', '2025-08-18 06:09:20'),
(114, 5, 'products/thumbs/tIccjOZW9Xxh28dV4IOtUI2NOAsj8lMViEUJE0Vp.bin', '2025-08-18 06:09:20'),
(115, 5, 'products/thumbs/UCiScw7QWLu8HAcariIhtDAfhJJvzjX9ecasHr8n.bin', '2025-08-18 06:09:20'),
(116, 5, 'products/thumbs/djLSpFmt0Sv7ItO9wPANSBSLepax3z1joCe5IYMD.bin', '2025-08-18 06:09:20'),
(117, 5, 'products/thumbs/WQ7YBcyr0i9FRLAeZM9QY6Dg1YleqS7NOBgtJWE7.bin', '2025-08-18 06:09:20'),
(118, 5, 'products/thumbs/fbaqTFJvnngUCfKxopmlldk7qxGf1gyOFpaAFJxi.bin', '2025-08-18 06:09:20'),
(119, 6, 'products/thumbs/qsPN29C8g9ESYAzDCAjJr15uTAuwkCBYcdgCt97P.bin', '2025-08-18 06:15:59'),
(120, 6, 'products/thumbs/UTuoivwwfgFVvUDnlvYsYUHVgSm6IssJDhxxJG6Y.bin', '2025-08-18 06:15:59'),
(121, 6, 'products/thumbs/r7qdCHKsKUImY7XruthYtmDioVkBoMoRYErhaE0l.bin', '2025-08-18 06:15:59'),
(122, 6, 'products/thumbs/MuEFvfLcUpjj4vaMTU0Qb97pcyHIqxqSx7Um1i9a.bin', '2025-08-18 06:15:59'),
(123, 6, 'products/thumbs/HjfsvUIpBvHB31F8Od7cMohLtsbaZHJw0UHsQSnQ.bin', '2025-08-18 06:15:59'),
(124, 6, 'products/thumbs/HmaQmb9dlHP9YubAYKelnUj31j5khRScYz2JrzVN.bin', '2025-08-18 06:15:59'),
(125, 7, 'products/thumbs/tbLVteUMLzPoP0ynzuKtlTeUQqTrSQvrWTB5TFUq.bin', '2025-08-18 06:18:16'),
(126, 7, 'products/thumbs/lPab387t4nt4FESRu9NXdW3tX1HiXZDmp5x5gnxV.bin', '2025-08-18 06:18:16'),
(127, 7, 'products/thumbs/FH6mD8Yww7DU1maU84SfODXT89NLUaSZFJJhvwxl.bin', '2025-08-18 06:18:16'),
(128, 7, 'products/thumbs/63UTzNxIqvI8aDmfh9XiDtYm52tVdSqiDa90Os9d.bin', '2025-08-18 06:18:16'),
(129, 7, 'products/thumbs/eORLiZ0pRHUAg6hk8Y8YzpsAwwPOq5hLEvXICpkG.bin', '2025-08-18 06:18:16'),
(130, 7, 'products/thumbs/LWIIpEBkhmK1M8G7SW7hXresIwpLvCrlE0VQfy2z.bin', '2025-08-18 06:18:16'),
(131, 8, 'products/thumbs/RlBcN2M8W0GkJ9qc6fx0vpsP4wyoSUPxsJsRHEYw.bin', '2025-08-18 06:25:09'),
(132, 8, 'products/thumbs/5o9Ra1kGQY9nPvjI2wubSX8rT2C23kzCWWXh3V99.bin', '2025-08-18 06:25:09'),
(133, 8, 'products/thumbs/E7Xj9tomvRDHlY3651JVKA3Fya6GvoxFCHDcqD5i.bin', '2025-08-18 06:25:09'),
(134, 8, 'products/thumbs/EuLlaKvna2zNKFUxwvHWulN2xXQfkw8vhhN0xttC.bin', '2025-08-18 06:25:09'),
(135, 8, 'products/thumbs/TDT3d1ZykqGuQlWxtlELbgwYlRWWVM7VwtYiMmEu.bin', '2025-08-18 06:25:09'),
(136, 8, 'products/thumbs/EuBjnMMwMv8aymYA5ELU53PHywsi218JcxDuhlvK.bin', '2025-08-18 06:25:09'),
(137, 9, 'products/thumbs/u2XJzreYwqVksTwg8g7ClMpajvGA6NM3a91jqSeV.bin', '2025-08-18 06:27:10'),
(138, 9, 'products/thumbs/gvQk1rhOeOxiX4FRIN1C5rXuUS1NuBEcM5QIl5Nv.bin', '2025-08-18 06:27:10'),
(139, 9, 'products/thumbs/55J4Zcfi1wOSiJhHl2Uit0LIAT94BAztV3xvfPTI.bin', '2025-08-18 06:27:10'),
(140, 9, 'products/thumbs/y2LkPhGbF11tjVZej3TePzKMI4CiPgKfGuZLKE7C.bin', '2025-08-18 06:27:10'),
(141, 9, 'products/thumbs/jBBkW8jvt1eGpdxLRREv3Rv6CQi5vDN5C33Qwtnf.bin', '2025-08-18 06:27:10'),
(142, 9, 'products/thumbs/qZPrE2fAvEwXmjF5BQy2hCv2uR8j4ta5aNAEWI4V.bin', '2025-08-18 06:27:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_lines`
--

CREATE TABLE `product_lines` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_lines`
--

INSERT INTO `product_lines` (`id`, `name`, `brand_id`, `created_at`) VALUES
(1, 'Air Force 1', 1, '2025-07-29 07:16:14'),
(2, 'Jordan', 1, '2025-07-29 07:16:14'),
(3, 'Air Max', 1, '2025-07-29 07:16:14'),
(4, 'V2k Run', 1, '2025-07-29 07:16:33'),
(5, 'Uptempo', 1, '2025-07-29 07:16:33'),
(6, 'Jordan 1', 1, '2025-07-29 07:16:33'),
(8, 'Cortez', 1, '2025-08-18 03:35:23'),
(9, 'Dunk Low', 1, '2025-08-18 03:35:01'),
(11, 'Ultraboost', 2, '2025-08-18 03:35:42'),
(12, 'NMD', 2, '2025-08-18 03:35:57'),
(13, 'Alphabounce', 2, '2025-08-18 03:36:47'),
(14, 'Stan Smith', 2, '2025-08-18 03:39:28'),
(15, 'Super Star', 2, '2025-08-18 03:39:46'),
(16, 'Samba', 2, '2025-08-18 03:40:03'),
(17, 'Falcon', 2, '2025-08-18 03:40:12'),
(18, 'Prophere', 2, '2025-08-18 03:40:29'),
(21, '550', 6, '2025-08-18 03:43:41'),
(26, '990', 6, '2025-08-18 03:44:44'),
(27, '993', 6, '2025-08-18 03:44:53'),
(28, '996', 6, '2025-08-18 03:44:59'),
(29, '997', 6, '2025-08-18 03:45:06'),
(30, '998', 6, '2025-08-18 03:45:16'),
(31, '9060', 6, '2025-08-18 03:45:22'),
(34, 'Old Skool', 7, '2025-08-18 03:58:08'),
(35, 'Slip ons', 7, '2025-08-18 03:58:21'),
(36, 'Style 36', 7, '2025-08-18 03:58:41'),
(37, 'Mules', 8, '2025-08-18 04:00:59'),
(38, 'Bigball Chunky', 8, '2025-08-18 04:01:27'),
(39, 'Chunky Liner', 8, '2025-08-18 04:01:47'),
(40, 'Chunky Jogger', 8, '2025-08-18 04:02:03'),
(41, 'Chunky Classic', 8, '2025-08-18 04:02:21'),
(42, 'Chuck 70', 9, '2025-08-18 04:03:44'),
(43, 'Classic Chuck', 9, '2025-08-18 04:03:55'),
(44, 'Elevation', 9, '2025-08-18 04:04:07'),
(45, 'Run Star Trainer', 9, '2025-08-18 04:04:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quantities`
--

CREATE TABLE `quantities` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quantities`
--

INSERT INTO `quantities` (`id`, `product_id`, `size_id`, `amount`, `created_at`) VALUES
(279, 37, 1, 1, '2025-08-08 08:49:46'),
(280, 37, 2, 2, '2025-08-08 08:49:46'),
(281, 37, 3, 3, '2025-08-08 08:49:46'),
(377, 35, 1, 1, '2025-08-11 07:13:31'),
(378, 35, 2, 2, '2025-08-11 07:13:31'),
(379, 35, 3, 3, '2025-08-11 07:13:31'),
(380, 36, 8, 1, '2025-08-11 07:13:44'),
(381, 36, 9, 2, '2025-08-11 07:13:44'),
(385, 34, 1, 36, '2025-08-11 07:19:24'),
(386, 34, 2, 37, '2025-08-11 07:19:24'),
(387, 34, 3, 38, '2025-08-11 07:19:24'),
(388, 40, 1, 1, '2025-08-11 07:52:32'),
(389, 40, 4, 2, '2025-08-11 07:52:32'),
(390, 40, 7, 3, '2025-08-11 07:52:32'),
(391, 38, 1, 1, '2025-08-12 06:10:33'),
(392, 38, 2, 2, '2025-08-12 06:10:33'),
(393, 38, 3, 3, '2025-08-12 06:10:33'),
(412, 2, 1, 1, '2025-08-18 05:30:05'),
(413, 2, 2, 1, '2025-08-18 05:30:05'),
(414, 2, 3, 1, '2025-08-18 05:30:05'),
(415, 2, 4, 1, '2025-08-18 05:30:05'),
(416, 2, 5, 1, '2025-08-18 05:30:05'),
(417, 2, 6, 1, '2025-08-18 05:30:05'),
(418, 2, 7, 1, '2025-08-18 05:30:05'),
(419, 2, 8, 1, '2025-08-18 05:30:05'),
(420, 3, 1, 1, '2025-08-18 05:59:45'),
(421, 3, 2, 1, '2025-08-18 05:59:45'),
(422, 3, 3, 1, '2025-08-18 05:59:45'),
(423, 3, 4, 1, '2025-08-18 05:59:45'),
(424, 3, 5, 1, '2025-08-18 05:59:45'),
(425, 3, 6, 1, '2025-08-18 05:59:45'),
(426, 3, 7, 1, '2025-08-18 05:59:45'),
(427, 3, 8, 1, '2025-08-18 05:59:45'),
(428, 3, 9, 1, '2025-08-18 05:59:45'),
(429, 5, 1, 1, '2025-08-18 06:09:20'),
(430, 5, 2, 1, '2025-08-18 06:09:20'),
(431, 5, 3, 1, '2025-08-18 06:09:20'),
(432, 5, 4, 1, '2025-08-18 06:09:20'),
(433, 5, 5, 1, '2025-08-18 06:09:20'),
(434, 5, 6, 1, '2025-08-18 06:09:20'),
(435, 5, 7, 1, '2025-08-18 06:09:20'),
(436, 5, 8, 1, '2025-08-18 06:09:20'),
(437, 6, 1, 1, '2025-08-18 06:15:59'),
(438, 6, 2, 1, '2025-08-18 06:15:59'),
(439, 6, 3, 1, '2025-08-18 06:15:59'),
(440, 6, 4, 1, '2025-08-18 06:15:59'),
(441, 6, 5, 1, '2025-08-18 06:15:59'),
(442, 6, 6, 1, '2025-08-18 06:15:59'),
(443, 6, 7, 1, '2025-08-18 06:15:59'),
(444, 6, 8, 1, '2025-08-18 06:15:59'),
(445, 7, 1, 1, '2025-08-18 06:18:16'),
(446, 7, 2, 1, '2025-08-18 06:18:16'),
(447, 7, 3, 1, '2025-08-18 06:18:16'),
(448, 7, 4, 1, '2025-08-18 06:18:16'),
(449, 7, 5, 1, '2025-08-18 06:18:16'),
(450, 7, 6, 1, '2025-08-18 06:18:16'),
(451, 7, 8, 1, '2025-08-18 06:18:16'),
(452, 7, 9, 1, '2025-08-18 06:18:16'),
(453, 8, 1, 1, '2025-08-18 06:25:09'),
(454, 8, 2, 1, '2025-08-18 06:25:09'),
(455, 8, 3, 1, '2025-08-18 06:25:09'),
(456, 8, 4, 1, '2025-08-18 06:25:09'),
(457, 8, 5, 1, '2025-08-18 06:25:09'),
(458, 8, 6, 1, '2025-08-18 06:25:09'),
(459, 9, 1, 1, '2025-08-18 06:27:10'),
(460, 9, 2, 1, '2025-08-18 06:27:10'),
(461, 9, 3, 1, '2025-08-18 06:27:10'),
(462, 9, 4, 1, '2025-08-18 06:27:10'),
(463, 9, 5, 1, '2025-08-18 06:27:10'),
(464, 9, 6, 1, '2025-08-18 06:27:10'),
(465, 9, 7, 1, '2025-08-18 06:27:10'),
(466, 9, 8, 1, '2025-08-18 06:27:10'),
(476, 1, 1, 1, '2025-08-18 07:37:13'),
(477, 1, 2, 1, '2025-08-18 07:37:13'),
(478, 1, 3, 1, '2025-08-18 07:37:13'),
(479, 1, 4, 1, '2025-08-18 07:37:13'),
(480, 1, 5, 1, '2025-08-18 07:37:13'),
(481, 1, 6, 1, '2025-08-18 07:37:13'),
(482, 1, 7, 1, '2025-08-18 07:37:13'),
(483, 1, 8, 1, '2025-08-18 07:37:13'),
(484, 1, 9, 1, '2025-08-18 07:37:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`) VALUES
(1, '36', '2025-07-30 09:39:19'),
(2, '37', '2025-07-30 09:39:42'),
(3, '38', '2025-07-30 09:39:46'),
(4, '39', '2025-07-30 09:39:49'),
(5, '40', '2025-07-30 09:39:56'),
(6, '41', '2025-07-30 09:41:35'),
(7, '42', '2025-07-30 09:41:39'),
(8, '43', '2025-07-30 09:41:46'),
(9, '44', '2025-07-30 09:41:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `title`, `image`, `link`, `status`, `created_at`) VALUES
(1, 'hehe', 'slides/hwrgSEK5Gl5FHAcbNMkhLJHHhwOlUQkrZmQ5LtqE.bin', 'http://127.0.0.1:8000/category', '0', '2025-08-16 11:50:21'),
(2, 'hihi', 'slides/QPcbGlPCFuqpLPtfbCPSW0GYQEGJx7AVoO4RSPWv.bin', 'http://127.0.0.1:8000/category', '1', '2025-08-16 11:58:14'),
(3, 'hjhj', 'slides/Qg9x8yCPiHAxh1LAOaKCcPgvO29rrDVEcXaadFaq.webp', 'http://127.0.0.1:8000/category', '1', '2025-08-16 15:57:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `ward` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `remember_token`, `first_name`, `last_name`, `dob`, `created_at`, `updated_at`, `phone`, `province`, `ward`, `detail`, `role`) VALUES
(3, 'thanh.tam6999@gmail.com', NULL, '$2y$10$tzwHXJySBWC/n.YdBmndu.9xr4p6t2phaXrDts5Qc3U.OcvmVc1BO', NULL, 'he', 'he', '2001-05-16', '2025-08-15 09:37:51', '2025-08-16 21:08:29', '012345678', 'Binh Duong', 'Di An', 'hehehe', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `productLine_id` (`productLine_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product_lines`
--
ALTER TABLE `product_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `quantities`
--
ALTER TABLE `quantities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT cho bảng `product_lines`
--
ALTER TABLE `product_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `quantities`
--
ALTER TABLE `quantities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=485;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`productLine_id`) REFERENCES `product_lines` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_lines`
--
ALTER TABLE `product_lines`
  ADD CONSTRAINT `product_lines_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `quantities`
--
ALTER TABLE `quantities`
  ADD CONSTRAINT `quantities_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `quantities_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
