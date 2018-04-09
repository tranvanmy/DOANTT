-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 10, 2017 lúc 10:39 PM
-- Phiên bản máy phục vụ: 10.0.31-MariaDB-cll-lve
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `thietke5_framgia_cook`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `description`, `icon`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Hải sản', NULL, NULL, '/media/photos/icon/59758cc3730fb.png', '2017-07-04 21:04:12', '2017-07-24 01:33:05', 2),
(3, 'Đồ chay', NULL, NULL, '/media/photos/icon/59719e0ceb79d.png', '2017-07-05 11:53:56', '2017-07-24 01:32:56', 2),
(6, 'Thực đơn', NULL, NULL, '/media/photos/icon/59719e0cf225f.png', '2017-07-20 23:24:49', '2017-07-24 01:33:00', 2),
(7, 'Khai vị', 6, NULL, '/media/photos/icon/59719e0d2daff.png', '2017-07-20 23:25:35', '2017-07-24 01:33:10', 2),
(10, 'Tráng miệng', 6, NULL, '/media/photos/icon/59719e0d2daff.png', '2017-07-20 23:27:09', '2017-07-24 01:33:16', 2),
(11, 'Khai vị', 6, NULL, '/media/photos/icon/59719e0d092d7.png', '2017-07-20 23:27:24', '2017-07-20 23:36:26', 2),
(12, 'Dịp lễ', NULL, NULL, '/media/photos/icon/59719f0c1fe38.png', '2017-07-20 23:28:35', '2017-07-24 01:33:21', 2),
(13, 'Sinh nhật', 12, NULL, '/media/photos/icon/59719f0c1fe38.png', '2017-07-20 23:29:00', '2017-07-20 23:36:32', 2),
(14, 'Ăn chay', 12, NULL, '/media/photos/icon/59719f0c19163.png', '2017-07-20 23:29:30', '2017-07-20 23:36:35', 2),
(15, 'Cơm gia đình', 12, NULL, '/media/photos/icon/59719eea6b801.png', '2017-07-20 23:29:50', '2017-07-20 23:36:40', 2),
(16, 'Quốc gia', NULL, NULL, '/media/photos/icon/59719e0cf225f.png', '2017-07-20 23:30:39', '2017-07-20 23:30:39', 1),
(17, 'Việt Nam', 16, NULL, '/media/photos/icon/59719e0d10507.png', '2017-07-20 23:31:07', '2017-07-20 23:36:47', 2),
(18, 'Thái Lan', NULL, NULL, '/media/photos/icon/59719f0c2d1e5.png', '2017-07-20 23:31:30', '2017-07-20 23:37:03', 2),
(19, 'Ấn Độ', 16, NULL, '/media/photos/icon/59719e0d2a00a.png', '2017-07-20 23:37:42', '2017-07-20 23:37:48', 2),
(20, 'Nhật Bản', 16, NULL, '/media/photos/icon/59719e0cd7572.png', '2017-07-23 23:03:26', '2017-07-23 23:03:26', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_table_id` int(10) UNSIGNED NOT NULL,
  `comment_table_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `content`, `comment_table_id`, `comment_table_type`, `created_at`, `updated_at`, `parent_id`) VALUES
(1, 13, 'nau ngon vai ca lone', 1, 'cookings', '2017-07-13 02:37:39', NULL, NULL),
(2, 15, 'con cac tao ne', 1, 'cookings', '2017-07-13 02:47:15', NULL, 1),
(25, 16, '123', 1, 'cookings', '2017-07-17 14:39:38', '2017-07-17 14:39:38', NULL),
(43, 18, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa v2', 1, 'cookings', '2017-07-18 03:33:42', '2017-07-18 04:03:52', NULL),
(44, 18, 'aaaaaaaaa f', 1, 'cookings', '2017-07-18 03:33:46', '2017-07-18 04:03:43', NULL),
(46, 18, 'a', 1, 'cookings', '2017-07-18 04:14:53', '2017-07-18 04:14:53', NULL),
(47, 18, 'a', 1, 'cookings', '2017-07-18 04:14:58', '2017-07-18 04:14:58', NULL),
(48, 18, 'a', 1, 'cookings', '2017-07-18 04:26:42', '2017-07-18 04:26:42', NULL),
(49, 16, 'aaaa', 1, 'cookings', '2017-07-18 09:15:06', '2017-07-18 19:06:45', 46),
(50, 16, 'aa', 1, 'cookings', '2017-07-18 19:12:31', '2017-07-18 19:12:31', NULL),
(51, 16, 'aa a', 1, 'cookings', '2017-07-18 19:12:32', '2017-07-18 19:38:16', NULL),
(52, 16, 'aa', 1, 'cookings', '2017-07-18 19:12:33', '2017-07-18 19:12:33', NULL),
(53, 16, 'aa', 1, 'cookings', '2017-07-18 19:12:44', '2017-07-18 19:12:44', NULL),
(54, 17, 'aaaaa', 1, 'cookings', '2017-07-18 23:01:50', '2017-07-18 23:01:50', 53),
(55, 17, 'aaaa', 1, 'cookings', '2017-07-18 23:13:19', '2017-07-18 23:13:19', 46),
(56, 17, 'aaaa', 1, 'cookings', '2017-07-18 23:13:20', '2017-07-18 23:13:20', 46),
(57, 17, 'aaaa', 1, 'cookings', '2017-07-18 23:13:20', '2017-07-18 23:13:20', 46),
(58, 17, 'aaaa', 1, 'cookings', '2017-07-18 23:13:20', '2017-07-18 23:13:20', 46),
(59, 17, 'aaaa a', 1, 'cookings', '2017-07-18 23:13:34', '2017-07-18 23:43:55', 44),
(62, 17, 'asssshole', 1, 'cookings', '2017-07-18 23:24:31', '2017-07-19 01:11:15', NULL),
(64, 17, 'aa1', 1, 'cookings', '2017-07-18 23:26:30', '2017-07-18 23:26:30', NULL),
(70, 17, 'cha', 1, 'cookings', '2017-07-18 23:51:45', '2017-07-18 23:51:45', NULL),
(72, 17, '2 2', 1, 'cookings', '2017-07-19 00:13:05', '2017-07-19 00:54:49', 70),
(73, 16, 'aaa', 1, 'cookings', '2017-07-19 12:02:25', '2017-07-19 12:02:25', 70),
(74, 16, 'aaaaaaaaaaaaaaaa', 1, 'cookings', '2017-07-19 12:02:31', '2017-07-19 12:02:31', 70),
(75, 16, '1111 thang mat lon', 12, 'cookings', '2017-07-19 19:07:00', '2017-07-19 19:07:10', NULL),
(76, 18, 'ok', 16, 'cookings', '2017-07-23 10:21:27', '2017-07-23 10:21:27', NULL),
(77, 4, 'comment', 8, 'posts', '2017-07-23 23:50:01', '2017-07-23 23:50:01', NULL),
(78, 24, 'Trang web hữu ích, Likeeeeeeeeeeeee', 21, 'cookings', '2017-07-23 23:51:17', '2017-07-23 23:51:17', NULL),
(79, 24, 'Hay!!!!! Trịu likeee', 19, 'cookings', '2017-07-23 23:53:50', '2017-07-23 23:53:50', NULL),
(80, 16, 'comment', 8, 'posts', '2017-07-23 23:54:52', '2017-07-23 23:54:52', NULL),
(81, 28, 'trông ngon đấy!!!!!', 18, 'cookings', '2017-07-23 23:59:57', '2017-07-23 23:59:57', NULL),
(83, 26, 'SDFDS', 19, 'cookings', '2017-07-24 00:02:20', '2017-07-24 00:02:38', 83),
(84, 26, 'A', 19, 'cookings', '2017-07-24 00:03:02', '2017-07-24 00:03:02', 79),
(85, 26, 'B', 19, 'cookings', '2017-07-24 00:03:07', '2017-07-24 00:03:07', 79),
(86, 26, 'V', 19, 'cookings', '2017-07-24 00:03:12', '2017-07-24 00:03:12', 79),
(88, 20, 'thanks', 21, 'cookings', '2017-07-24 00:16:56', '2017-07-24 00:16:56', 78),
(89, 20, 'Comment của t đâu', 12, 'posts', '2017-07-24 00:18:12', '2017-07-24 00:18:12', NULL),
(93, 35, 'cc', 19, 'cookings', '2017-07-24 00:23:50', '2017-07-24 00:23:50', 79),
(94, 20, 'Tớ ăn rồi . Ngon lắm luôn ý . Vừa có vị cá mực vừa có vị cam, lại còn có vị sữa dừa nữa. Không ăn phí 1 đời người bạn ơi :p( admin HNT)', 18, 'cookings', '2017-07-24 00:24:06', '2017-07-24 00:24:32', 81),
(95, 35, 'abcbasdasdasds', 19, 'cookings', '2017-07-24 00:24:07', '2017-07-24 00:24:07', NULL),
(96, 35, 'cc', 19, 'cookings', '2017-07-24 00:24:12', '2017-07-24 00:24:12', 95),
(97, 35, 'bình luận bị điên à', 19, 'cookings', '2017-07-24 00:24:24', '2017-07-24 00:24:24', 95),
(98, 37, 'Sao tớ ăn mà không thấy vị ấy nhỉ. Nó có vị chua chua dai dai của mít , lại thấy có vị ngọt của quế. Đôi khi tớ còn thấy vị đắng của kẹo cao su vị cam cơ', 18, 'cookings', '2017-07-24 00:35:39', '2017-07-24 00:35:39', 81),
(99, 39, 'Trông ngon quá', 18, 'cookings', '2017-07-24 00:41:48', '2017-07-24 00:41:48', 81),
(100, 20, 'hay qua', 23, 'cookings', '2017-07-24 00:42:48', '2017-07-24 00:42:48', NULL),
(101, 20, 'ngon', 26, 'cookings', '2017-07-24 01:10:44', '2017-07-24 01:10:44', NULL),
(102, 42, 'ngon', 21, 'cookings', '2017-07-24 01:26:02', '2017-07-24 01:26:02', NULL),
(104, 16, 'ok', 19, 'cookings', '2017-07-25 00:45:12', '2017-07-25 00:45:12', 95),
(105, 20, 'sdsdsds', 27, 'cookings', '2017-07-30 01:04:35', '2017-07-30 01:04:39', NULL),
(106, 4, 'âs', 15, 'posts', '2017-07-30 01:29:31', '2017-07-30 01:29:31', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cookings`
--

CREATE TABLE `cookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ration` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` int(10) UNSIGNED NOT NULL,
  `rate_point` double(8,2) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `video_link` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` decimal(10,0) NOT NULL DEFAULT '0',
  `sell` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cookings`
--

INSERT INTO `cookings` (`id`, `user_id`, `name`, `time`, `ration`, `image`, `level_id`, `rate_point`, `description`, `video_link`, `status`, `created_at`, `updated_at`, `price`, `sell`) VALUES
(1, 4, 'Nấu thịt chó', '120', 4, 'images/eI46KaKcxIYFNvAypVRe7vU6iLUjyikEzLpHLJYm.jpeg', 2, 3.00, 'Cách nấu thịt chó đơn giản mà vẫn đéo ngon', NULL, 0, '2017-07-12 01:43:39', '2017-07-23 19:20:14', '0', NULL),
(8, 16, 'thịt chó', '120', 3, 'images/eI46KaKcxIYFNvAypVRe7vU6iLUjyikEzLpHLJYm.jpeg', 2, NULL, 'cách nấu thịt chó khó nhưng mà cũng vẫn đéo ngon', NULL, 0, '2017-07-19 18:21:26', '2017-07-19 18:28:58', '0', NULL),
(9, 16, 'thịt chó 10', '120', 3, 'images/YrdtAEOVmj1VZix1O3tj1Plbj37wNvaoaEd3BxQ2.jpeg', 2, NULL, 'cách nấu thịt chó khó nhưng mà cũng vẫn đéo ngon', NULL, 0, '2017-07-19 18:21:35', '2017-07-19 18:35:00', '0', NULL),
(10, 16, 'thịt chó', '20', 1, 'images/Y7mRGAfo2tqdD4DcVXGBX7fdx2DHv3IBwXVHKTVr.jpeg', 1, NULL, 'thắng', NULL, 0, '2017-07-19 18:39:06', '2017-07-19 18:42:30', '0', NULL),
(11, 16, 'thịt chó', '20', 1, 'images/Y7mRGAfo2tqdD4DcVXGBX7fdx2DHv3IBwXVHKTVr.jpeg', 1, NULL, 'thắng', NULL, 0, '2017-07-19 18:39:19', '2017-07-19 18:47:56', '0', NULL),
(12, 16, 'bánh mì nướng', '150', 1, 'images/lyKk7XnhZ6X77c0BpZFfS4aL6qG2EhmtBsZCkb1z.jpeg', 1, NULL, 'thịt thắng', NULL, 0, '2017-07-19 18:54:58', '2017-07-23 19:20:25', '0', NULL),
(13, 16, 'chó', '150', 1, 'images/WdhKAmsEXHkDDKEhz9ZtE2Wvzo8cnjifScXpIJrj.png', 2, NULL, 'thịt thắng', NULL, 0, '2017-07-19 18:55:05', '2017-07-23 04:21:45', '0', NULL),
(14, 16, 'bánh mì nướng', '150', 1, 'images/lyKk7XnhZ6X77c0BpZFfS4aL6qG2EhmtBsZCkb1z.jpeg', 1, NULL, 'thịt thắng', NULL, 0, '2017-07-19 18:55:26', '2017-07-23 19:20:32', '0', NULL),
(15, 17, 'Bánh mì nướng bơ tỏi', '30', 2, 'images/DxyM52FnvEP8GYAEpPnAZunWzk77ITImlNeM8kE4.jpeg', 1, NULL, 'Bánh mì nướng bơ tỏi là món ăn của Châu Âu đã được phổ biến về Việt Nam khá lâu trước đây. Món ăn ngon này mang hương vị thơm thơm, béo béo của bơ và tỏi nướng giúp bạn có thể làm hài lòng các thành viên trong gia đình.', NULL, 0, '2017-07-20 23:49:18', '2017-07-23 19:20:01', '0', NULL),
(16, 18, 'aaaaaaaaaaaaaaa', '122', 1, 'images/eI46KaKcxIYFNvAypVRe7vU6iLUjyikEzLpHLJYm.jpeg', 2, NULL, '111111111', NULL, 0, '2017-07-23 10:19:31', '2017-07-23 19:19:50', '0', NULL),
(17, 19, 'Cách làm bò xào cần nước', '2', 1, 'images/fotpRd0eGsJGVrEp7EqcdsEM0xWsRKAykborShiu.jpeg', 6, NULL, 'Bò xào cần nước là một trong những món ăn ngon, món nhậu đơn giản, thích hợp cho cả người lớn và trẻ em. Thịt bò xào cần nước rất dễ ăn, thịt bò mềm khi ăn cùng rau cần nước xào giòn giòn hòa quyện cùng các gia vị đậm đà.', NULL, 1, '2017-07-23 18:32:33', '2017-07-23 19:02:20', '0', NULL),
(18, 19, 'Cách làm rau câu', '1', 2, 'images/YrdtAEOVmj1VZix1O3tj1Plbj37wNvaoaEd3BxQ2.jpeg', 6, NULL, 'Ngoài những loại rau câu thường ăn thì bạn cũng có thể nấu thử rau câu tắc xí muội, bởi đây là món rau câu dễ nấu lại mang hương vị khá lạ. Rau câu tắc xí muội sẽ là món ăn vặt tuyệt vời dành cho bạn', NULL, 1, '2017-07-23 19:38:35', '2017-07-23 20:43:54', '0', NULL),
(19, 21, 'Cách làm gỏi sứa', '2', 1, 'images/k4JHtRoSnrKzWfuydOtRdcyvnSeZt7jHc2OxX6yh.jpeg', 6, NULL, 'Ngày hè nóng nực, còn gì hơn một món ăn vừa mát lại vừa giòn tan trong miệng? Gỏi sứa - gỏi hải sản sẽ đáp ứng mong muốn đó. Cùng Cooky trổ tài vào bếp thực hiện món này đãi cả nhà nhé!', NULL, 1, '2017-07-23 20:34:22', '2017-07-23 20:43:48', '0', NULL),
(20, 21, 'Cách làm thạch cà phê Latte', '2', 2, 'images/Ah1RHJ1umEe90bELAYtfV8384C5ck6O2U6cVkxIl.jpeg', 7, NULL, 'Mỗi khi thấy mùi cà phê ngào ngạt lan tỏa từ chiếc ly nhỏ là mình lại xao xuyến. Hôm nay trời nắng mình thử “biến hóa” thức uống quyến rũ này thành món thạch mát lạnh đãi cả nhà nhé!', NULL, 1, '2017-07-23 20:40:23', '2017-07-23 23:24:55', '10000', NULL),
(21, 22, 'Cách làm mì tỏi trộn cua biển', '1', 1, 'images/H1Z4st91q09uTJoj48mctwERwTRNAVvestj7ZlOv.jpeg', 6, NULL, 'Mì tỏi trộn cua biển là một món ăn vô cùng hấp dẫn', NULL, 1, '2017-07-23 21:20:04', '2017-07-23 22:27:41', '11111', NULL),
(22, 26, 'Cá rim chuối', '1', 4, NULL, 7, NULL, 'nhiều dinh dưỡng', NULL, 0, '2017-07-23 23:57:55', '2017-07-24 00:00:09', '0', NULL),
(23, 16, 'Cách ướp tôm và mực nướng sa tế', '1', 1, 'images/Eurw8mKDZaQjMn6zScZiGOkfPjKaAKR31qNc5KHz.jpeg', 6, NULL, 'Tôm và mực nướng là một trong những món ăn cực ngon mà không ai có thể bỏ qua bởi hương-vị-sắc của nó, thích thú hơn khi kết hợp với sa tế sẽ làm món ăn hấp dẫn khó cưỡng.', NULL, 1, '2017-07-24 00:09:23', '2017-07-24 00:21:12', '0', NULL),
(24, 26, 'Ha na', '1', 4, NULL, 7, NULL, '123', NULL, 2, '2017-07-24 00:17:39', '2017-07-24 00:17:39', '0', NULL),
(25, 26, 'Ha na', '1', 4, 'images/IkaZ1IexvoL7JsoTAZVrJJH80775Lz5Qf7yupvTm.png', 7, NULL, '123', NULL, 0, '2017-07-24 00:18:03', '2017-07-24 00:19:58', '0', NULL),
(26, 20, 'thịt chó', '120', 4, 'images/ZMAzKVTAIFjaSUG3mkWu4pyo322wxbzU64hRyHWN.jpeg', 7, NULL, 'nấu thịt chó', NULL, 0, '2017-07-24 01:08:19', '2017-07-24 01:19:30', '120', NULL),
(27, 42, 'cơm gà Hội An', '20', 3, 'images/9UZFPGdUPpoidAuoZdDWi4xXd4PbAKETyEERYDoC.jpeg', 7, NULL, 'Nếu bạn đã từng ăn cơm gà ở Hội An thì sẽ không bao giờ quên hương vị thơm thơm của gà, chút chua chua và vị béo của từng hạt cơm.', NULL, 1, '2017-07-24 01:16:39', '2017-07-24 01:19:23', '0', NULL),
(28, 42, 'thit gà', '120', 4, 'images/qLuEzjfBm9dcBDH4LFUkjnKDrnKCvEGcVELeMxFV.jpeg', 7, NULL, 'thit gà', NULL, 2, '2017-07-24 01:21:56', '2017-07-24 01:22:08', '0', NULL),
(29, 44, 'ấdasdasdasd', '1111', 1, 'images/RdL2cqL050dAeWlScZViKQvHHiea5HTQszQPtGUK.jpeg', 6, NULL, 'ưqeqwewe', NULL, 2, '2017-07-25 06:31:02', '2017-07-25 06:34:22', '0', NULL),
(30, 44, 'ấdasdasdasd', '11', 1, 'images/RdL2cqL050dAeWlScZViKQvHHiea5HTQszQPtGUK.jpeg', 7, NULL, 'ưqeqwewedfde', NULL, 2, '2017-07-25 06:31:20', '2017-07-25 06:31:20', '0', NULL),
(31, 44, 'ấdasdasdasd', '11', 1, 'images/RdL2cqL050dAeWlScZViKQvHHiea5HTQszQPtGUK.jpeg', 7, NULL, 'ưqeqwewedfdesdsdsdsd', NULL, 2, '2017-07-25 06:31:33', '2017-07-25 06:31:33', '0', NULL),
(32, 20, 'sdsd', '1', 1, NULL, 7, NULL, 'ádasdasd', NULL, 2, '2017-07-30 01:02:22', '2017-07-30 01:02:22', '0', NULL),
(33, 20, 'sdsd', '1', 1, 'images/9k9mAZEvxaw4GAz2s9CnQ6zA0zQ16bFgfq0HLChx.jpeg', 7, NULL, 'ádasdasd', NULL, 2, '2017-07-30 01:02:41', '2017-07-30 01:02:41', '0', NULL),
(34, 20, 'sdsd', '1', 1, 'images/9k9mAZEvxaw4GAz2s9CnQ6zA0zQ16bFgfq0HLChx.jpeg', 7, NULL, 'ádasdasd', NULL, 2, '2017-07-30 01:02:55', '2017-07-30 01:02:55', '0', NULL),
(35, 20, 'sdsd', '1', 1, 'images/9k9mAZEvxaw4GAz2s9CnQ6zA0zQ16bFgfq0HLChx.jpeg', 7, NULL, 'ádasdasd', NULL, 2, '2017-07-30 01:02:57', '2017-07-30 01:02:57', '0', NULL),
(36, 4, 'ádfsadf', '112321', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 7, NULL, 'sadfsadfsafsad', NULL, 2, '2017-08-03 19:18:27', '2017-08-03 19:18:27', '0', NULL),
(37, 4, 'ádfsadf', '112321', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 7, NULL, 'sadfsadfsafsadsadf', NULL, 2, '2017-08-03 19:18:38', '2017-08-03 19:18:38', '0', NULL),
(38, 4, 'ádfsadf', '112321', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 7, NULL, 'sadfsadfsafsadsadf', NULL, 2, '2017-08-03 19:18:56', '2017-08-03 19:18:56', '0', NULL),
(39, 4, 'ádfsadf', '112321', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 7, NULL, 'sadfsadfsafsadsadf', NULL, 2, '2017-08-03 19:19:01', '2017-08-03 19:19:01', '0', NULL),
(40, 4, 'ádfsadf', '11', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 7, NULL, 'sadfsadfsafsadsadfádfsda', NULL, 2, '2017-08-03 19:19:16', '2017-08-03 19:19:16', '0', NULL),
(41, 4, 'ádfsadf', '11', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 7, NULL, 'sadfsadfsafsadsadfádfsda', NULL, 2, '2017-08-03 19:19:22', '2017-08-03 19:19:22', '0', NULL),
(42, 4, 'ádfsadf', '11', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 6, NULL, 'sadfsadfsafsadsadfádfsda', NULL, 2, '2017-08-03 19:19:31', '2017-08-03 19:19:31', '0', NULL),
(43, 4, 'ádfsadf', '11', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 6, NULL, 'sadfsadfsafsadsadfádfsda', NULL, 2, '2017-08-03 19:19:44', '2017-08-03 19:19:44', '0', NULL),
(44, 4, 'ádfsadf', '11', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 6, NULL, 'sadfsadfsafsadsadfádfsda', NULL, 2, '2017-08-03 19:20:23', '2017-08-03 19:20:23', '0', NULL),
(45, 4, 'ádfsadf', '11', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 6, NULL, 'sadfsadfsafsadsadfádfsda', NULL, 2, '2017-08-03 19:20:43', '2017-08-03 19:20:43', '0', NULL),
(46, 4, 'ádfsadf', '11', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 6, NULL, 'sadfsadfsafsadsadfádfsda', NULL, 2, '2017-08-03 19:23:01', '2017-08-03 19:23:01', '0', NULL),
(47, 4, 'ádfsadf', '11', 2, 'images/937huTbUmE3QQUZi8hui0bzzFDRP9BdCK8iKVWSh.png', 6, NULL, 'sadfsadfsafsadsadfádfsda', NULL, 2, '2017-08-03 19:26:05', '2017-08-03 19:26:05', '0', NULL),
(48, 16, 'aaaaaaaaa', '12', 2, 'images/TUkEwjXAlZr8y6HVn4G3s93HTYOA4HcuqWIJjFQA.jpeg', 7, NULL, 'aaaaaaaa', NULL, 2, '2017-08-09 20:13:57', '2017-08-09 20:13:57', '0', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cooking_categories`
--

CREATE TABLE `cooking_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cooking_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cooking_categories`
--

INSERT INTO `cooking_categories` (`id`, `cooking_id`, `category_id`, `created_at`, `updated_at`) VALUES
(13, 13, 13, NULL, NULL),
(14, 13, 11, NULL, NULL),
(15, 13, 19, NULL, NULL),
(17, 16, 13, NULL, NULL),
(18, 16, 14, NULL, NULL),
(19, 17, 17, NULL, NULL),
(20, 17, 10, NULL, NULL),
(21, 18, 11, NULL, NULL),
(22, 18, 10, NULL, NULL),
(23, 18, 10, NULL, NULL),
(24, 18, 13, NULL, NULL),
(25, 18, 17, NULL, NULL),
(26, 18, 15, NULL, NULL),
(27, 19, 15, NULL, NULL),
(28, 19, 17, NULL, NULL),
(29, 20, 15, NULL, NULL),
(30, 20, 17, NULL, NULL),
(31, 20, 10, NULL, NULL),
(32, 21, 15, NULL, NULL),
(33, 21, 17, NULL, NULL),
(34, 22, 13, NULL, NULL),
(35, 22, 15, NULL, NULL),
(36, 22, 17, NULL, NULL),
(37, 23, 15, NULL, NULL),
(38, 23, 17, NULL, NULL),
(39, 25, 10, NULL, NULL),
(40, 25, 11, NULL, NULL),
(41, 25, 13, NULL, NULL),
(42, 25, 17, NULL, NULL),
(43, 26, 15, NULL, NULL),
(44, 26, 17, NULL, NULL),
(45, 27, 15, NULL, NULL),
(46, 27, 17, NULL, NULL),
(47, 29, 15, NULL, NULL),
(48, 29, 14, NULL, NULL),
(49, 29, 17, NULL, NULL),
(50, 29, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cooking_ingredients`
--

CREATE TABLE `cooking_ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `ingredient_id` int(10) UNSIGNED NOT NULL,
  `cooking_id` int(10) UNSIGNED NOT NULL,
  `unit_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cooking_ingredients`
--

INSERT INTO `cooking_ingredients` (`id`, `ingredient_id`, `cooking_id`, `unit_id`, `quantity`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, NULL, NULL, NULL),
(2, 7, 1, 3, 2, NULL, NULL, NULL),
(3, 2, 8, 4, 1, 'ga', '2017-07-19 18:25:02', '2017-07-19 18:25:02'),
(4, 3, 8, 1, 1, 's', '2017-07-19 18:25:36', '2017-07-19 18:25:36'),
(5, 2, 9, 2, 1, '1', '2017-07-19 18:32:04', '2017-07-19 18:32:04'),
(6, 31, 9, 1, 1, '1', '2017-07-19 18:33:40', '2017-07-19 18:33:40'),
(7, 32, 10, 2, 1, '1', '2017-07-19 18:41:58', '2017-07-19 18:41:58'),
(8, 33, 11, 2, 1, '1', '2017-07-19 18:45:45', '2017-07-19 18:45:45'),
(9, 34, 11, 3, 1112, '1', '2017-07-19 18:46:19', '2017-07-19 18:46:19'),
(10, 35, 12, 1, 1, '1', '2017-07-19 18:55:48', '2017-07-19 18:55:48'),
(11, 3, 13, 2, 1, '111', '2017-07-23 04:21:14', '2017-07-23 04:21:14'),
(12, 36, 16, 1, 1, NULL, '2017-07-23 10:19:39', '2017-07-23 10:19:39'),
(13, 37, 17, 2, 100, 'Thịt phải tươi', '2017-07-23 18:33:19', '2017-07-23 18:33:19'),
(14, 38, 17, 2, 7, NULL, '2017-07-23 18:33:41', '2017-07-23 18:33:41'),
(15, 39, 17, 4, 1, NULL, '2017-07-23 18:33:57', '2017-07-23 18:33:57'),
(16, 40, 17, 4, 1, NULL, '2017-07-23 18:36:09', '2017-07-23 18:36:09'),
(17, 41, 18, 5, 1, NULL, '2017-07-23 19:39:19', '2017-07-23 19:39:19'),
(18, 42, 18, 3, 1, NULL, '2017-07-23 19:39:39', '2017-07-23 19:39:39'),
(19, 43, 18, 2, 15, NULL, '2017-07-23 19:39:55', '2017-07-23 19:39:55'),
(20, 44, 19, 2, 100, NULL, '2017-07-23 20:34:59', '2017-07-23 20:34:59'),
(21, 45, 19, 2, 10, NULL, '2017-07-23 20:35:11', '2017-07-23 20:35:11'),
(22, 46, 19, 2, 10, NULL, '2017-07-23 20:35:24', '2017-07-23 20:35:24'),
(23, 47, 19, 1, 1, NULL, '2017-07-23 20:35:38', '2017-07-23 20:35:38'),
(24, 48, 20, 2, 200, NULL, '2017-07-23 20:40:36', '2017-07-23 20:40:36'),
(25, 49, 20, 2, 500, NULL, '2017-07-23 20:40:46', '2017-07-23 20:40:46'),
(26, 50, 20, 2, 200, NULL, '2017-07-23 20:40:57', '2017-07-23 20:40:57'),
(27, 51, 20, 5, 2, NULL, '2017-07-23 20:41:11', '2017-07-23 20:41:11'),
(28, 52, 21, 2, 1, NULL, '2017-07-23 21:20:17', '2017-07-23 21:20:17'),
(29, 53, 21, 2, 1, NULL, '2017-07-23 21:20:32', '2017-07-23 21:20:32'),
(30, 54, 22, 1, 1, '123', '2017-07-23 23:58:12', '2017-07-23 23:58:12'),
(31, 55, 22, 2, 5, 'quả', '2017-07-23 23:58:35', '2017-07-23 23:58:35'),
(32, 56, 22, 2, 1, 'rau thơm', '2017-07-23 23:58:50', '2017-07-23 23:58:50'),
(34, 57, 23, 2, 100, NULL, '2017-07-24 00:09:39', '2017-07-24 00:09:39'),
(35, 58, 23, 4, 1, NULL, '2017-07-24 00:10:08', '2017-07-24 00:10:08'),
(36, 59, 25, 2, 2, '123', '2017-07-24 00:19:27', '2017-07-24 00:19:27'),
(37, 61, 26, 1, 1, NULL, '2017-07-24 01:08:35', '2017-07-24 01:08:51'),
(38, 62, 26, 2, 100, NULL, '2017-07-24 01:09:08', '2017-07-24 01:09:08'),
(39, 2, 27, 1, 1, NULL, '2017-07-24 01:17:06', '2017-07-24 01:17:06'),
(40, 63, 27, 2, 100, NULL, '2017-07-24 01:17:22', '2017-07-24 01:17:22'),
(41, 2, 28, 1, 1, NULL, '2017-07-24 01:28:44', '2017-07-24 01:28:44'),
(42, 64, 29, 1, 1, 'thit cho', '2017-07-25 06:33:17', '2017-07-25 06:33:17'),
(43, 65, 29, 2, 1, NULL, '2017-07-25 06:33:35', '2017-07-25 06:33:35'),
(45, 68, 36, 2, 111, '11', '2017-08-03 19:28:19', '2017-08-05 22:11:05'),
(47, 70, 36, 2, 11, '11', '2017-08-08 01:43:44', '2017-08-08 01:43:44'),
(49, 72, 48, 2, 1, 'sdfsd', '2017-08-09 20:14:31', '2017-08-09 20:14:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cooking_steps`
--

CREATE TABLE `cooking_steps` (
  `id` int(10) UNSIGNED NOT NULL,
  `cooking_id` int(10) UNSIGNED NOT NULL,
  `step` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cooking_steps`
--

INSERT INTO `cooking_steps` (`id`, `cooking_id`, `step`, `content`, `status`, `created_at`, `updated_at`, `image`) VALUES
(1, 1, 1, 'Trộm chó nhà hàng xóm bằng exciter', 0, NULL, NULL, NULL),
(2, 1, 2, 'Thịt con chó', 0, NULL, NULL, NULL),
(3, 1, 3, 'Phang vào mồm nó', 0, NULL, NULL, NULL),
(4, 1, 4, 'Thêm tí riềng mẻ vào ăn cho mát', 0, NULL, NULL, NULL),
(5, 8, 1, 'rình nhà hàng xóm', 0, '2017-07-19 18:26:03', '2017-07-19 18:26:03', 'images/zHhIwNrfFeitIxVNEN2YFqNS7xC1EEH8DhL7eNZ9.png'),
(6, 8, 2, 'bắt con gái nhà hàng xóm', 0, '2017-07-19 18:26:22', '2017-07-19 18:26:22', 'images/CGYov8N8YnMG2FQ5p13EV4juhWec51zLZBAUiHCp.png'),
(7, 8, 3, 'đòi chuộc bằng con chó', 0, '2017-07-19 18:26:34', '2017-07-19 18:26:34', 'images/HQ6zQ95BoZnqrWn0ONdiH28dj9Ef4LCOYnxynRtz.png'),
(8, 9, 1, 'aaaa', 0, '2017-07-19 18:34:26', '2017-07-19 18:34:26', 'images/08j748dCyU6BZ7GaMXSJT2JCEbeUYYTK7p26z3N8.png'),
(9, 9, 2, 'aaaaaaaaaaaaaaaaaaa', 0, '2017-07-19 18:34:35', '2017-07-19 18:34:35', 'images/2ASI2pfUQsh9iDKFY2dP0m6PafWmj0eTyuRcV4l4.png'),
(10, 9, 3, '1', 0, '2017-07-19 18:34:37', '2017-07-19 18:34:37', NULL),
(11, 10, 1, '1111', 0, '2017-07-19 18:42:07', '2017-07-19 18:42:07', 'images/fyKP9GIIypgwmtRx5gQpQnTxAsW9pm95Li88mvBW.png'),
(12, 11, 1, 'qqqq', 0, '2017-07-19 18:47:42', '2017-07-19 18:47:42', NULL),
(13, 12, 1, '11111111', 0, '2017-07-19 18:55:57', '2017-07-19 18:55:57', 'images/ngVi4RqL476qoQCqotiOQMklrcIz6xqdGpqI5KYI.png'),
(14, 13, 1, 'adasdas', 0, '2017-07-23 04:21:26', '2017-07-23 04:21:26', 'images/c44ndmK4IemLsNEPHdAaumrnplRfiFBmg2jIhTdB.png'),
(15, 16, 1, '1111111111111', 0, '2017-07-23 10:19:46', '2017-07-23 10:19:46', 'images/2EfqGc3EZ35cbt034z100XeyTKywF0czEWcUiYtL.jpeg'),
(16, 17, 1, 'Thịt bò thái lát mỏng, tỏi lột bỏ và bằm nhuyễn. Ướp thịt bò cùng tỏi, tiêu, bột ngọt, hạt nêm, nước tương trong 15 phút.', 0, '2017-07-23 18:37:06', '2017-07-23 18:37:06', 'images/xIfbiw7RACCn3m1GqYglOVljb06ds9Xsc3MDqlIH.jpeg'),
(17, 17, 2, 'Cần nước, cần tây rửa sạch, cắt khúc. Bắt chảo lên bếp và cho vào ít dầu ăn, khi dầu nóng thì phi tỏi. Khi tỏi vàng cho cần nước vào xào.', 0, '2017-07-23 18:37:19', '2017-07-23 18:37:19', 'images/LP7fKg0sgj06K0tLIAAN6isXcYBfmvufift4oNu2.jpeg'),
(18, 17, 3, 'Khi cần nước xẹp xuống thì cho cần tây vào cùng ít gia vị như muối, bột ngọt, hạt nêm. Khi cần tây vừa chín tới thì tắt bếp, cho ra dĩa. Tiếp tục xào phần thịt bò đã ướp.', 0, '2017-07-23 18:37:32', '2017-07-23 18:37:32', 'images/SJVt6fLfrdfVsmymfFvRtQQ76fFGXKsaQqGyynx5.jpeg'),
(19, 17, 4, 'Thịt bò sau khi xào tái (hoặc chín) cho lên phần cần nước, rắc thêm ít tiêu cho thơm. Có thể ăn kèm với nước ớt cộng vài lát ớt', 0, '2017-07-23 18:37:45', '2017-07-23 18:37:45', 'images/B4NwW6o9LXTqOqyiY0KkF09O7x0tXaCbMwuhiJ76.jpeg'),
(20, 18, 1, 'Cho 2 muỗng canh tắc xí muội cùng 1 lít nước vào nồi, khuấy cho tắc xí muội tan hoàn toàn.', 0, '2017-07-23 19:40:44', '2017-07-23 19:40:44', 'images/3PCdyRa4RjY1S3f2j5FHzHOxzTO2n0e4H1FuJ7gh.jpeg'),
(21, 18, 2, 'Cần nước, cần tây rửa sạch, cắt khúc. Bắt chảo lên bếp và cho vào ít dầu ăn, khi dầu nóng thì phi tỏi. Khi tỏi vàng cho cần nước vào xào.', 0, '2017-07-23 19:41:00', '2017-07-23 19:41:00', 'images/kjxij4wYnV5EdyTXMGfWbhFgVMfjywGVkY0djvIK.jpeg'),
(22, 18, 3, 'Khi cần nước xẹp xuống thì cho cần tây vào cùng ít gia vị như muối, bột ngọt, hạt nêm. Khi cần tây vừa chín tới thì tắt bếp, cho ra dĩa. Tiếp tục xào phần thịt bò đã ướp.', 0, '2017-07-23 19:41:17', '2017-07-23 19:41:17', 'images/YE5HGnSoOJZfw67QlC4RXz0LcsjrTfjJ92QSZ7yt.jpeg'),
(23, 18, 4, 'Cho ra khuôn và để nguội, bỏ vào trong tủ lạnh từ 2 - 3 tiếng là có thể ăn được.', 0, '2017-07-23 19:41:41', '2017-07-23 19:41:41', 'images/ZxzYwCrNwLNWcDW2gtEU3N0nkjbHi723RhLOeAAS.jpeg'),
(24, 19, 1, 'Sứa sơ chế thái sợi. Mực đã hấp, thái mỏng. Tôm tươi đã hấp/luộc và bóc vỏ, thái đôi, thái ba nếu tôm to.', 0, '2017-07-23 20:36:24', '2017-07-23 20:36:24', 'images/AYP0o6jhF2Q82RNvB0ZMOkWo6sKbKelZP0d1BLIM.jpeg'),
(25, 19, 2, 'Hành tây, dưa leo và cà rốt thái sợi mỏng.', 0, '2017-07-23 20:36:37', '2017-07-23 20:36:37', 'images/QGFpbQwAAGyGLT4FhKMzkTrQaL0Q1OQnBELnkJ27.jpeg'),
(26, 19, 3, 'Trộn dấm đen, đường trắng, muối tinh, dầu mè với nhau tạo thành hỗn hợp làm gỏi.', 0, '2017-07-23 20:36:49', '2017-07-23 20:36:49', 'images/0C3y5God9jNWmXHZgDXQzksC6iL9lkDRSQmkeNxP.jpeg'),
(27, 19, 4, 'Trộn đều tất cả nguyên liệu và gia vị (tương ớt, mè trắng, tiêu, muối và ớt băm) còn lại vào và để khoảng 15 phút để nguyên liệu ngấm gia vị. Món salad (gỏi sứa) đã sẵn sàng.', 0, '2017-07-23 20:37:01', '2017-07-23 20:37:01', 'images/OCu1QZ16RVR31IQ08diLAW42n9RrB4nkbcOuu1x3.jpeg'),
(28, 20, 1, 'Pha cà phê Epresso. Bột Gelatine cho vào1/2 bát nước ngâm 15 phút.', 0, '2017-07-23 20:41:29', '2017-07-23 20:41:29', 'images/GjgKg7BAT63wnJAUGtsDlVF2D8weTuy5ECMgPnAA.jpeg'),
(29, 20, 2, 'Cho Gelatine vào nồi đun, cho tiếp 220ml sữa và 50gr đường thích hợp vào, đun sôi, vừa đun vừa khuấy cho đường và bột thạch tan hết. Nhỏ lửa đun thêm 1 phút nữa rồi tắt bếp', 0, '2017-07-23 20:41:41', '2017-07-23 20:41:41', 'images/4ol9sm17NpdvU8Tke5SXTTlB0ToBJbYsOiEFsoVI.jpeg'),
(30, 20, 3, 'Nhấc nồi sữa xuống, để cho bớt nóng rồi cho hỗn hợp sữa này vào cà phê. Khuấy đều cho các nguyên liệu hòa vào nhau, cho thêm 1/2 muỗng rượu rum.', 0, '2017-07-23 20:42:05', '2017-07-23 20:42:05', 'images/eU6lMtaSGMMjP0RTnCy5Ne7qiwHhcVvsfZK7WpI7.jpeg'),
(31, 20, 4, 'Chia hỗn hợp ra các ly hoặc khuôn. Để nguội hẳn rồi cho vào tủ lạnh, ướp lạnh khoảng nửa ngày cho thạch hoàn toàn đông lại. Khi ăn có thể rắc chút socola đen lên trên.', 0, '2017-07-23 20:42:21', '2017-07-23 20:42:21', 'images/pIG3yhEaXblDB6TC8HTgTIQRN4izVPdsCc9ALtox.jpeg'),
(32, 21, 1, '3 củ tỏi băm và 1 củ đập nát. Cua làm sạch và cắt thành khúc nhỏ.', 0, '2017-07-23 21:21:42', '2017-07-23 21:21:42', 'images/FDezSbYWurl1DnD27g0Iun1of7hbfmWr8hfSgoQO.jpeg'),
(33, 21, 2, 'Nấu mì: Đun sôi nước, thả mì vào trong mì khoảng 2 phút, vớt ra ngay sau đó và để ráo nguội. Phi tỏi, dầu ô liu trên chảo, bếp vừa lửa. Đến khi tỏi thơm và ngấm dầu, múc tỏi ra bát', 0, '2017-07-23 21:21:56', '2017-07-23 21:21:56', 'images/GiN5LyRtJbVMPfCinlmNOIfx9wZl0TjX8FYaiUJx.jpeg'),
(34, 21, 3, 'Thêm 4 muỗng canh bơ đã chuẩn bị vào chảo, thêm nước dùng gà và tỏi băm đảo đều và tắt bếp, để nguội.', 0, '2017-07-23 21:22:08', '2017-07-23 21:22:08', 'images/kDUBUv9SofHfUqGYp7S2lHieqReZR30fV3Fp1eMF.jpeg'),
(35, 21, 4, 'Cho mì vào đảo sơ qua cho nóng, đổ hỗn hợp tỏi vào, thêm 1 muỗng muối và pho mát vào.', 0, '2017-07-23 21:22:17', '2017-07-23 21:22:17', 'images/WHOqSH9nfZMjRaFVk6MvmQOiWilgi0QZtoX6mcaZ.jpeg'),
(36, 21, 5, 'Làm cua biển rang: Đun nóng chỗ bơ còn lại trong chảo, cho tỏi vào xào thơm. Thêm tiêu đen, nước luộc gà, xào nhẹ, sau đó bỏ cua vào xào, đảo đều.', 0, '2017-07-23 21:22:28', '2017-07-23 21:22:28', 'images/CRoLNoQ5tcVmAlpQ2qH67gOF6tcswwZaMlkiDJZq.jpeg'),
(37, 21, 6, 'Cho thêm đường vào và nấu cua cho đến khi chúng chuyển sang màu gạch là chín, tầm 25-30 phút. Ăn nóng với tỏi và mì sợi.', 0, '2017-07-23 21:22:43', '2017-07-23 21:22:43', 'images/bEN5j3tXPLu6cQmQZRoqKK74Y9r3sXCz31ouFbZ0.jpeg'),
(38, 22, 1, 'B1', 0, '2017-07-23 23:59:25', '2017-07-23 23:59:25', 'images/Ei8XJ6aMXsyvvqRs27LdSQ56qnOfe8qe6TYgJOny.png'),
(39, 22, 2, 'B2', 0, '2017-07-23 23:59:38', '2017-07-23 23:59:38', 'images/Vm3NfbKKRY58yuFx1TWclJ12qWgnlttoqQMHGTar.png'),
(40, 23, 1, 'Làm muối ớt: muối ớt để ướp trong món ăn này mình làm gồm có: tỏi, củ hành tím, ớt, muối, tiêu xanh xay thật nhuyễn rồi rang lên.', 0, '2017-07-24 00:11:07', '2017-07-24 00:11:07', NULL),
(41, 23, 2, 'Rửa sạch tôm và mực bằng nước muối, sau đó rửa lại bằng nước pha chút giấm để hải sản thật sạch và không còn mùi tanh.', 0, '2017-07-24 00:11:22', '2017-07-24 00:11:22', 'images/1yaJQwoF46UzZhaTQkTRTuAHFKDxBZqhLymTl2pj.jpeg'),
(42, 23, 3, 'Cắt mực ra thành từng miếng nhỏ và cho vào tô.', 0, '2017-07-24 00:11:34', '2017-07-24 00:11:34', 'images/APlPsCTkdiCJCIOLH9wUj9oERvViIVLqlPg2M8Cw.jpeg'),
(43, 23, 4, 'Tẩm ướp gia vị vào mực: với 1 muỗng cafe muối, 2 muỗng cafe sa tế, 3 muỗng cafe mỡ (dầu ăn), 2 muỗng cafe muối ớt và ướp trong 7 phút.', 0, '2017-07-24 00:11:49', '2017-07-24 00:11:49', 'images/wM9ir229bsNaMC5JfBd6aWwgDVHiLB0zTrkdQXKX.jpeg'),
(44, 25, 1, '2', 0, '2017-07-24 00:19:34', '2017-07-24 00:19:34', 'images/RkWSPnYYLtSZjl9iMH5pfBFNfKCakBHGJ5mWgiGY.png'),
(45, 26, 1, 'thịt chó', 0, '2017-07-24 01:09:26', '2017-07-24 01:09:26', 'images/bOhG6XeR9Hnvv7xbxqmaenVBagpNuUp8T3IvmkFP.jpeg'),
(46, 26, 2, 'ăn thịt chó', 0, '2017-07-24 01:09:39', '2017-07-24 01:09:39', 'images/Y5umQVV5bGEJwPUtIkGcfmedDCu0MzQnXPwFgs3i.jpeg'),
(47, 27, 1, 'Thịt gà rửa sạch, để ráo nước, chặt làm đôi. Gạo tẻ cho ra tô.', 0, '2017-07-24 01:18:00', '2017-07-24 01:18:00', 'images/cmK6DbhIMtERRTsvzsmVUBLGpSv1L1uSx9tqcReN.png'),
(48, 27, 2, 'Gạo tẻ vo sạch, ngâm với nước khoảng 10 phút. Hành tây bóc vỏ, cắt mỏng. Rau răm nhặt, rửa sạch.', 0, '2017-07-24 01:18:17', '2017-07-24 01:18:17', 'images/GSeCXUFE5wLKXK3zsUEzUJw41S17oSPQp4AFQHFg.png'),
(49, 28, 1, 'thit ga ta', 0, '2017-07-24 01:29:04', '2017-07-24 01:29:17', 'images/GuZfbgM7EWtiZp8fRcRjXPf5kI0RgLEjJRmbHu4i.png'),
(50, 28, 2, 'mo ga', 0, '2017-07-24 01:29:33', '2017-07-24 01:29:33', 'images/KhQPPBd9FSTgvLqBkj43zURHqITNP9f7c89lgAhj.jpeg'),
(51, 29, 1, 'ádfasdaasdasdadasd', 0, '2017-07-25 06:33:45', '2017-07-25 06:33:45', 'images/YnxZCd9DHv2eIqycNUKutYrBEJ8rCIFWlKAkmltl.jpeg'),
(52, 29, 2, 'sdfsdfsdfsdfsdf', 0, '2017-07-25 06:33:55', '2017-07-25 06:33:55', 'images/HQ6v0dcByEzB3ZYTLug7S3PE33LRjuQONkFZvTAZ.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `follows`
--

CREATE TABLE `follows` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_id_follow` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `follows`
--

INSERT INTO `follows` (`id`, `user_id`, `user_id_follow`, `created_at`, `updated_at`, `status`) VALUES
(55, 36, 4, '2017-07-24 00:31:44', '2017-07-24 00:31:44', '1'),
(56, 20, 22, '2017-07-24 01:11:28', '2017-07-24 01:11:28', '1'),
(57, 42, 22, '2017-07-24 01:25:03', '2017-07-24 01:25:03', '1'),
(58, 20, 40, '2017-07-24 02:01:35', '2017-07-24 02:01:35', '1'),
(59, 20, 19, '2017-07-30 01:05:02', '2017-07-30 01:05:02', '1'),
(60, 20, 39, '2017-07-30 01:06:32', '2017-07-30 01:06:32', '1'),
(61, 20, 38, '2017-08-04 22:05:09', '2017-08-04 22:05:09', '1'),
(63, 45, 44, '2017-08-09 02:35:57', '2017-08-09 02:35:57', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `description`, `type`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'thit cho', '<p>thit tu con cho thang</p>', 1, NULL, 0, NULL, '2017-07-06 20:38:01'),
(2, 'thit ga', '<p>thit tu con ga fucking ga</p>\n\n<p>&nbsp;</p>', 1, NULL, 1, '2017-07-05 06:54:55', '2017-07-06 20:38:53'),
(3, 'IPHONE 7 PLUS', 'an vao song lau tram tuoi', 0, NULL, 1, '2017-07-05 12:31:12', '2017-07-05 12:31:12'),
(4, 'IPHONE 7 PLUS', 'an vao song lau tram tuoi', 1, '/photos/14/logo.png', 0, '2017-07-05 12:52:33', '2017-07-05 12:52:33'),
(6, 'sfsdfdfdf', '<p>ervdfe</p>', 0, NULL, 1, '2017-07-05 22:57:48', '2017-07-05 22:57:48'),
(7, 'IPHONE 6|6S PLUS', '<p>ervdfe<img alt=\"\" src=\"http://localhost:8000/photos/14/595d48feada98.jpg\" style=\"height:601px; width:601px\" /></p>', 0, '/photos/14/logoadmin.png', 1, '2017-07-05 22:58:36', '2017-07-05 22:58:36'),
(19, 'asdasd', '<p>adsa</p>', 0, NULL, 1, '2017-07-06 20:14:59', '2017-07-06 20:14:59'),
(20, 'dasdasd', '<p>adsdasd</p>', 0, NULL, 1, '2017-07-06 20:15:05', '2017-07-06 20:15:05'),
(21, 'ad', '<p>dasd</p>', 0, NULL, 1, '2017-07-06 20:16:48', '2017-07-06 20:16:48'),
(22, 'asda', '<p>adasd</p>', 0, NULL, 1, '2017-07-06 20:17:00', '2017-07-06 20:17:00'),
(24, 'dfasdasd', '<p>dasd</p>', 0, NULL, 1, '2017-07-06 20:20:17', '2017-07-06 20:20:17'),
(26, 'ANDasd', '<p>dasds</p>', 0, NULL, 1, '2017-07-06 20:23:20', '2017-07-06 20:23:20'),
(27, 'aaaa', '<p>asdsad</p>', 0, NULL, 1, '2017-07-06 20:32:03', '2017-07-06 20:32:03'),
(28, 'adasda', '<p>asdasda</p>', 0, NULL, 1, '2017-07-06 20:39:21', '2017-07-06 20:39:21'),
(29, 'adasd', '<p>asdasda</p>', 0, NULL, 1, '2017-07-06 20:39:27', '2017-07-06 20:39:27'),
(30, 'asdas', '<p>asdasd</p>', 0, NULL, 1, '2017-07-06 20:39:35', '2017-07-06 20:39:35'),
(31, '1', 'user create', NULL, NULL, 0, '2017-07-19 18:33:40', '2017-07-19 18:33:40'),
(32, '1', 'user create', NULL, NULL, 0, '2017-07-19 18:41:58', '2017-07-19 18:41:58'),
(33, '1', 'user create', NULL, NULL, 0, '2017-07-19 18:45:45', '2017-07-19 18:45:45'),
(34, '1112', 'user create', NULL, NULL, 0, '2017-07-19 18:46:19', '2017-07-19 18:46:19'),
(35, 'q', 'user create', NULL, NULL, 0, '2017-07-19 18:55:48', '2017-07-19 18:55:48'),
(36, '1', 'user create', NULL, NULL, 0, '2017-07-23 10:19:39', '2017-07-23 10:19:39'),
(37, 'Thịt Bò', 'user create', NULL, NULL, 0, '2017-07-23 18:33:19', '2017-07-23 18:33:19'),
(38, 'Cần tây', 'user create', NULL, NULL, 0, '2017-07-23 18:33:41', '2017-07-23 18:33:41'),
(39, 'Bột ngọt', 'user create', NULL, NULL, 0, '2017-07-23 18:33:57', '2017-07-23 18:33:57'),
(40, 'Nước tương', 'user create', NULL, NULL, 0, '2017-07-23 18:36:09', '2017-07-23 18:36:09'),
(41, 'Nước', 'user create', NULL, NULL, 0, '2017-07-23 19:39:19', '2017-07-23 19:39:19'),
(42, 'Trái tắc', 'user create', NULL, NULL, 0, '2017-07-23 19:39:39', '2017-07-23 19:39:39'),
(43, 'Bột rau câu', 'user create', NULL, NULL, 0, '2017-07-23 19:39:55', '2017-07-23 19:39:55'),
(44, 'Mực', 'user create', NULL, NULL, 0, '2017-07-23 20:34:59', '2017-07-23 20:34:59'),
(45, 'Hành tây', 'user create', NULL, NULL, 0, '2017-07-23 20:35:11', '2017-07-23 20:35:11'),
(46, 'Cà rốt', 'user create', NULL, NULL, 0, '2017-07-23 20:35:24', '2017-07-23 20:35:24'),
(47, 'Sứa biển', 'user create', NULL, NULL, 0, '2017-07-23 20:35:38', '2017-07-23 20:35:38'),
(48, 'Bột cà phê', 'user create', NULL, NULL, 0, '2017-07-23 20:40:36', '2017-07-23 20:40:36'),
(49, 'Đường trắng', 'user create', NULL, NULL, 0, '2017-07-23 20:40:46', '2017-07-23 20:40:46'),
(50, 'Chocolate đen', 'user create', NULL, NULL, 0, '2017-07-23 20:40:57', '2017-07-23 20:40:57'),
(51, 'Sữa tươi', 'user create', NULL, NULL, 0, '2017-07-23 20:41:11', '2017-07-23 20:41:11'),
(52, 'ì tôm', 'user create', NULL, NULL, 0, '2017-07-23 21:20:17', '2017-07-23 21:20:17'),
(53, 'Bơ lạt', 'user create', NULL, NULL, 0, '2017-07-23 21:20:32', '2017-07-23 21:20:32'),
(54, 'Cá', 'user create', NULL, NULL, 0, '2017-07-23 23:58:12', '2017-07-23 23:58:12'),
(55, 'Chuối', 'user create', NULL, NULL, 0, '2017-07-23 23:58:35', '2017-07-23 23:58:35'),
(56, 'thì là', 'user create', NULL, NULL, 0, '2017-07-23 23:58:50', '2017-07-23 23:58:50'),
(57, 'Tôm tươi', 'user create', NULL, NULL, 0, '2017-07-24 00:09:39', '2017-07-24 00:09:39'),
(58, 'Sa tế', 'user create', NULL, NULL, 0, '2017-07-24 00:10:08', '2017-07-24 00:10:08'),
(59, 'thit lợn', 'user create', NULL, NULL, 0, '2017-07-24 00:19:27', '2017-07-24 00:19:27'),
(60, 'thịt chó', 'user create', NULL, NULL, 0, '2017-07-24 01:08:35', '2017-07-24 01:08:35'),
(61, 'thịt chó sống', 'user create', NULL, NULL, 0, '2017-07-24 01:08:51', '2017-07-24 01:08:51'),
(62, 'giềng', 'user create', NULL, NULL, 0, '2017-07-24 01:09:08', '2017-07-24 01:09:08'),
(63, 'Hành tây', 'user create', NULL, NULL, 0, '2017-07-24 01:17:22', '2017-07-24 01:17:22'),
(64, 'thjt cho', 'user create', NULL, NULL, 0, '2017-07-25 06:33:17', '2017-07-25 06:33:17'),
(65, 'rieng', 'user create', NULL, NULL, 0, '2017-07-25 06:33:35', '2017-07-25 06:33:35'),
(66, 'sdfsdf', 'user create', NULL, NULL, 0, '2017-08-03 19:28:13', '2017-08-03 19:28:13'),
(67, 'ww', 'user create', NULL, NULL, 0, '2017-08-03 19:28:19', '2017-08-03 19:28:19'),
(68, 'ww23423fsadw', 'user create', NULL, NULL, 0, '2017-08-03 19:28:36', '2017-08-03 19:28:36'),
(69, 'qưeae', 'user create', NULL, NULL, 0, '2017-08-08 01:43:38', '2017-08-08 01:43:38'),
(70, '1312', 'user create', NULL, NULL, 0, '2017-08-08 01:43:44', '2017-08-08 01:43:44'),
(71, '111', 'user create', NULL, NULL, 0, '2017-08-09 20:14:12', '2017-08-09 20:14:12'),
(72, 'ssfsf', 'user create', NULL, NULL, 0, '2017-08-09 20:14:31', '2017-08-09 20:14:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `levels`
--

CREATE TABLE `levels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `levels`
--

INSERT INTO `levels` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'newbee', 'newbee', NULL, NULL),
(2, 'tastee', 'tastee', NULL, NULL),
(3, 'cookee', 'cookee', NULL, NULL),
(4, 'cheefee', 'cheefee', NULL, NULL),
(5, 'mastee', 'mastee', NULL, NULL),
(6, 'Dễ', 'Dễ', NULL, NULL),
(7, 'Trung bình', 'Trung bình', NULL, NULL),
(8, 'Khó', 'Khó', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_27_073647_create_cookings_table', 1),
(4, '2017_06_27_073759_create_ingredients_table', 1),
(5, '2017_06_27_073827_create_cooking_ingredients_table', 1),
(6, '2017_06_27_073848_create_cooking_steps_table', 1),
(7, '2017_06_27_073919_create_cooking_categories_table', 1),
(8, '2017_06_27_073928_create_categories_table', 1),
(9, '2017_06_27_073942_create_post_categories_table', 1),
(10, '2017_06_27_073949_create_posts_table', 1),
(11, '2017_06_27_074008_create_levels_table', 1),
(12, '2017_06_27_074024_create_orders_table', 1),
(13, '2017_06_27_074046_create_order_details_table', 1),
(14, '2017_06_27_074059_create_comments_table', 1),
(15, '2017_06_27_074115_create_follows_table', 1),
(16, '2017_06_27_074128_create_rates_table', 1),
(17, '2017_06_27_075539_create_units_table', 1),
(18, '2017_06_27_082727_relations', 1),
(19, '2017_06_30_021934_create_subscrices_table', 1),
(20, '2017_07_04_031833_update_user_table', 2),
(21, '2017_07_04_033137_update_userpassword_table', 3),
(22, '2017_07_04_031216_edit-category', 4),
(23, '2017_07_13_024111_update_comment_table', 5),
(24, '2017_07_19_093822_update_rate_table', 6),
(25, '2017_07_13_161114_updateFollows', 7),
(26, '2017_07_17_144931_edit_cooking_steps', 7),
(27, '2017_07_19_023153_wishlish', 8),
(28, '2017_07_19_023935_wishlishRelation', 8),
(29, '2017_07_20_224200_edit_cooking_table', 9),
(30, '2017_07_21_042516_edit_order_table', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seller` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `phone`, `note`, `user_id`, `total`, `status`, `created_at`, `updated_at`, `seller`) VALUES
(3, 'Tuan Nguyen Duc Anh', 'ducanh30@yahoo.com', 'aaaaaaaaaaa', '111111111111', NULL, 16, '0', 0, '2017-07-23 04:07:27', '2017-07-23 04:07:27', 16),
(4, 'tranvanmy', 'tranvanmy@gmail.com', '11111111', '0964395169', NULL, 19, '0', 1, '2017-07-23 19:56:05', '2017-07-23 19:56:27', 19),
(5, 'Văn Quyết', 'mih2t9x@gmail.com', '423 tran khac tran', '1234567890', NULL, 4, '0', 0, '2017-07-23 21:13:46', '2017-07-23 21:13:46', 21),
(6, 'admin', 'admin@gmail.com', '424 tran khac tran', '1234567', NULL, 20, '0', 0, '2017-07-23 21:24:59', '2017-07-23 21:24:59', 22),
(7, 'admin', 'admin@gmail.com', 'nam dinh', '1234567', NULL, 20, '10000', 0, '2017-07-23 23:25:26', '2017-07-23 23:25:26', 21),
(8, 'Duong Lai Quang', 'darkknight_0208@yahoo.com.vn', 'fdgdfgfdg', '0123456789', NULL, 29, '0', 0, '2017-07-24 00:05:41', '2017-07-24 00:05:41', 21),
(9, 'Ha Na1', 'phamhangmta93@gmail.com', '1', '01659694703', NULL, 26, '40000', 0, '2017-07-24 00:08:48', '2017-07-24 00:08:48', 21),
(10, 'Ha Na1', 'phamhangmta93@gmail.com', '1', '01659694703', NULL, 26, '11111', 0, '2017-07-24 00:08:48', '2017-07-24 00:08:48', 22),
(11, 'admin', 'admin@gmail.com', 'ha noi', '1234567', NULL, 20, '11111', 0, '2017-07-24 01:12:23', '2017-07-24 01:12:23', 22),
(12, 'admin', 'admin@gmail.com', 'ha noi', '1234567', NULL, 20, '0', 0, '2017-07-24 01:12:23', '2017-07-24 01:12:23', 16),
(13, 'tran my', 'my@gmail.com', 'hanoi', '12345678', NULL, 42, '0', 1, '2017-07-24 01:20:05', '2017-07-24 01:20:36', 42),
(14, 'admin', 'admin@gmail.com', 'nam dinh', '1234567', NULL, 20, '10000', 0, '2017-07-24 02:23:53', '2017-07-24 02:23:53', 21),
(15, 'admin', 'admin@gmail.com', 'nam dinh', '1234567', NULL, 20, '0', 0, '2017-07-24 02:23:53', '2017-07-24 02:23:53', 42),
(16, 'Văn Quyết', 'mih2t9x@gmail.com', 'nam dinh\\', '1234567890', NULL, 4, '11111', 0, '2017-08-05 20:36:57', '2017-08-05 20:36:57', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `cooking_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `cooking_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 3, 12, 1, '0', '2017-07-23 04:07:27', '2017-07-23 04:07:27'),
(2, 4, 18, 1, '0', '2017-07-23 19:56:05', '2017-07-23 19:56:05'),
(3, 5, 19, 1, '0', '2017-07-23 21:13:46', '2017-07-23 21:13:46'),
(4, 6, 21, 1, '0', '2017-07-23 21:24:59', '2017-07-23 21:24:59'),
(5, 7, 20, 1, '10000', '2017-07-23 23:25:26', '2017-07-23 23:25:26'),
(6, 8, 19, 1, '0', '2017-07-24 00:05:41', '2017-07-24 00:05:41'),
(7, 9, 20, 4, '40000', '2017-07-24 00:08:48', '2017-07-24 00:08:48'),
(8, 10, 21, 1, '11111', '2017-07-24 00:08:48', '2017-07-24 00:08:48'),
(9, 11, 21, 1, '11111', '2017-07-24 01:12:23', '2017-07-24 01:12:23'),
(10, 12, 23, 1, '0', '2017-07-24 01:12:23', '2017-07-24 01:12:23'),
(11, 13, 27, 1, '0', '2017-07-24 01:20:05', '2017-07-24 01:20:05'),
(12, 14, 20, 1, '10000', '2017-07-24 02:23:53', '2017-07-24 02:23:53'),
(13, 15, 27, 1, '0', '2017-07-24 02:23:53', '2017-07-24 02:23:53'),
(14, 16, 21, 1, '11111', '2017-08-05 20:36:57', '2017-08-05 20:36:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('anhmynd19101995@gmail.com', '$2y$10$bTWvYtY0UaxOyDcCLUijjOaMAdled.ozN4.HySI9p1RcV8s5GVYKG', '2017-07-04 07:41:23'),
('nhung@gmail.com', '$2y$10$8dMLY2IPpFb7Hm8DtKaM7OLjGucApGfmgxVvMVss9ft2FX.1sFWYq', '2017-07-23 21:15:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `image`, `description`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'nau thit cho', '/images/aeecQHRjFttTAGfZ.jpg', 'trom cho roi nau thit cho nhu the nao cho ngon', 'trom cho', 0, NULL, '2017-07-23 20:22:47'),
(2, 13, 'ádasdasd', '/images/aeecQHRjFttTAGfZ.jpg', 'ádasdasd', 'ádadadasd', 1, NULL, '2017-07-23 20:22:43'),
(4, 18, 'qqqq', '/images/aeecQHRjFttTAGfZ.jpg', NULL, '', 0, '2017-07-19 03:11:13', NULL),
(5, 19, 'Cách làm cút lộn xào me', '/images/aeecQHRjFttTAGfZ.jpg', 'Cút lộn xào me, nghêu hấp thái, lòng gà trứng non cháy tỏi, đậu hũ hải sản nướng giấy bạc... là 4 món nhậu được giới trẻ yêu thích. Bây giờ bạn có thể tự làm những món này ngay tại nhà đấy!', '<h2><strong>1. C&aacute;ch l&agrave;m c&uacute;t lộn x&agrave;o me</strong></h2>\n\n<p>C&uacute;t lộn x&agrave;o me được biết đến l&agrave; một m&oacute;n ăn vặt, ăn nhậu của c&aacute;c bạn trẻ. Vị&nbsp;<strong>cay cay của ớt, chua chua của me</strong>&nbsp;h&ograve;a lẫn với c&uacute;t lộn, đậu phộng rang l&agrave;m cho m&oacute;n ăn c&agrave;ng trở n&ecirc;n hấp dẫn. Giờ đ&acirc;y bạn c&oacute; thể tự l&agrave;m n&oacute; ngay tại nh&agrave; đấy.</p>\n\n<p>Khi biết c&aacute;ch l&agrave;m rồi bạn sẽ c&oacute; suy nghĩ: &quot;tại sao m&igrave;nh lại kh&ocirc;ng biết c&aacute;ch l&agrave;m m&oacute;n c&uacute;t lộn x&agrave;o me n&agrave;y sớm hơn nhỉ?&quot;. Thật vậy đấy, c&aacute;ch l&agrave;m đơn giản cực, c&uacute;t lộn mua về luộc ch&iacute;n b&oacute;c vỏ để ri&ecirc;ng. L&agrave;m phần nước sốt chua cay tất nhi&ecirc;n l&agrave; kh&ocirc;ng thể thiếu me rồi n&egrave;, b&ecirc;n cạnh những gia vị cần thiết th&igrave; bạn n&ecirc;n cho th&ecirc;m gừng v&agrave; sả băm v&agrave;o để c&oacute; thể giảm bớt độ tanh của trứng v&agrave; tăng m&ugrave;i vị cho m&oacute;n ăn. Nước sốt đạt chuẩn l&agrave; khi trứng được h&ograve;a quyện cũng sốt v&agrave; tạo th&agrave;nh độ sệt vừa mắt. Rắc th&ecirc;m đậu phộng cho giống ở h&agrave;ng qu&aacute;n nh&eacute; c&aacute;c g&aacute;i.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/cut-lon-xao-me-20259\" target=\"_blank\"><img alt=\"Top 4 món cực hot ở quán nhậu nay có thể tự làm tại nhà\" src=\"https://media.cooky.vn/recipe/g3/20259/s/recipe20259-prepare-step4-636322613591263060.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:</em>&nbsp;<a href=\"https://www.cooky.vn/cong-thuc/cut-lon-xao-me-20259\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m c&uacute;t lộn x&agrave;o me</strong></a></p>\n\n<h2><strong>2. C&aacute;ch l&agrave;m l&ograve;ng g&agrave; trứng non ch&aacute;y tỏi</strong></h2>\n\n<p>M&oacute;n thứ 2 đ&oacute; l&agrave; l&ograve;ng g&agrave; trứng non ch&aacute;y tỏi, m&oacute;n nhậu bất bại trong giới trẻ. Ch&uacute;ng ta thường ăn k&egrave;m ch&uacute;ng với b&aacute;nh m&igrave;, những c&aacute;i&nbsp;<strong>trứng g&agrave; non v&agrave;ng ươm, cắn v&agrave;o b&ugrave;i b&ugrave;i c&ograve;n l&ograve;ng g&agrave; th&igrave; gi&ograve;n sật sật, dai dai thơm lừng tỏi</strong>. Những ng&agrave;y trời mưa lạnh hay những bữa tiệc gia đ&igrave;nh m&agrave; c&oacute; đĩa l&ograve;ng g&agrave; n&oacute;ng hổi x&igrave; x&egrave;o, kh&oacute;i bốc nghi ng&uacute;t n&agrave;y kế b&ecirc;n th&igrave; c&ograve;n g&igrave; hấp dẫn hơn nữa đ&uacute;ng kh&ocirc;ng.</p>\n\n<p>Trước ti&ecirc;n cần ch&uacute; &yacute; phần chọn nguy&ecirc;n liệu cho m&oacute;n l&ograve;ng g&agrave; trứng g&agrave; ch&aacute;y tỏi l&agrave; phải đảm bảo nguy&ecirc;n liệu tươi ngon, trứng g&agrave; non c&oacute; nghĩa l&agrave; trứng g&agrave; c&ograve;n ở trong bụng g&agrave; m&aacute;i chưa được sinh ra, c&ograve;n m&agrave;u v&agrave;ng. Tiếp đến l&agrave; luộc ch&iacute;n phần trứng, ướp gia vị cho l&ograve;ng g&agrave;. Phi thơm tỏi để ri&ecirc;ng, tiếp cho v&agrave;o dầu m&agrave;u điều cho m&agrave;u đẹp, x&agrave;o l&ograve;ng g&agrave;, trứng non v&agrave; h&agrave;nh t&acirc;y, n&ecirc;m nếm gia vị vừa ăn. Cuối c&ugrave;ng th&ecirc;m tỏi phi thơm v&agrave;o rồi tắt bếp.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/long-ga-trung-non-chay-toi-20570\" target=\"_blank\"><img alt=\"Top 4 món cực hot ở quán nhậu nay có thể tự làm tại nhà\" src=\"https://media.cooky.vn/recipe/g3/20570/s/recipe20570-prepare-step5-636356535820029946.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:</em>&nbsp;<a href=\"https://www.cooky.vn/cong-thuc/long-ga-trung-non-chay-toi-20570\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m l&ograve;ng g&agrave; trứng non ch&aacute;y tỏi</strong></a></p>\n\n<h2><strong>3. C&aacute;ch l&agrave;m ngh&ecirc;u hấp Th&aacute;i</strong></h2>\n\n<p>M&oacute;n thứ 3 trong danh s&aacute;ch n&agrave;y l&agrave; ngh&ecirc;u hấp th&aacute;i, m&oacute;n ăn m&agrave; hầu như bạn g&aacute;i n&agrave;o cũng y&ecirc;u th&iacute;ch. Ngh&ecirc;u hấp b&eacute;o thơm cộng th&ecirc;m phần nước&nbsp;<strong>chua cay đặc trưng kết hợp với sả, l&aacute; chanh</strong>&nbsp;thật tuyệt.&nbsp;Ngh&ecirc;u hấp Th&aacute;i c&oacute; thể ăn với&nbsp;<strong>cơm, b&uacute;n, b&aacute;nh m&igrave;</strong>&nbsp;hoặc quen thuộc nhất l&agrave; ăn kh&ocirc;ng như c&aacute;ch thường thấy ở nhiều qu&aacute;n ốc vỉa h&egrave;.</p>\n\n<p>C&oacute; lẽ m&oacute;n ngh&ecirc;u hấp th&aacute;i kh&ocirc;ng qu&aacute; kh&oacute; khăn với c&aacute;c mẹ, nhưng đ&acirc;y quả thật l&agrave; một m&oacute;n nhậu l&yacute; tưởng v&agrave;o những ng&agrave;y lạnh. M&oacute;n ngh&ecirc;u muốn đạt phải c&oacute; vị chua cay h&ograve;a quyện, thơm m&ugrave;a l&aacute; chanh, sả. C&aacute;c mẹ n&ecirc;n nhớ khi luộc ngh&ecirc;u kh&ocirc;ng n&ecirc;n khuấy v&agrave;o nồi khi ngh&ecirc;u chưa s&ocirc;i, như vậy sẽ khiến ngh&ecirc;u kh&ocirc;ng mở miệng. Nếu bạn muốn vị chua đậm đ&agrave; th&igrave; c&oacute; thể vắt th&ecirc;m nước cốt chanh nh&eacute;!</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/ngheu-hap-thai-20471\" target=\"_blank\"><img alt=\"Top 4 món cực hot ở quán nhậu nay có thể tự làm tại nhà\" src=\"https://media.cooky.vn/recipe/g3/20471/s/recipe20471-prepare-step4-636348794392106778.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:&nbsp;</em><a href=\"https://www.cooky.vn/cong-thuc/ngheu-hap-thai-20471\" target=\"_blank\"><strong>C&aacute;ch nấu ngh&ecirc;u hấp th&aacute;i</strong></a></p>\n\n<h2><strong>4. C&aacute;ch l&agrave;m đậu hũ hải sản nướng giấy bạc</strong></h2>\n\n<p>Nếu bạn l&agrave; t&iacute;n đồ của c&aacute;c m&oacute;n nhậu gần đ&acirc;y th&igrave; c&oacute; thể kh&ocirc;ng bỏ qua m&oacute;n đậu hũ hải sản nướng giấy bạc. Với c&aacute;ch chế biến độc đ&aacute;o kết hợp h&agrave;i h&ograve;a giữa c&aacute;c nguy&ecirc;n liệu rau củ, nấm v&agrave; hải sản đem lại cho người thưởng thức một m&oacute;n ăn tuyệt vời.&nbsp;<strong>Đậu hũ non mềm ngọt, hải sản gi&ograve;n dai, rau củ tươi ngon</strong>, tất cả thật tuyệt.</p>\n\n<p>Lớp giấy bạc bọc b&ecirc;n ngo&agrave;i đ&atilde; g&oacute;i trọn hương vị của m&oacute;n ăn. V&igrave; vậy khi bạn t&aacute;ch lớp giấy bạc ra một m&ugrave;i hương lan tỏa k&iacute;ch th&iacute;ch vị gi&aacute;c người thưởng thức ngay lần đầu ti&ecirc;n. Chỉ đơn giản v&agrave;i bước quen thuộc, cắt luộc v&agrave; nướng th&ocirc;i m&agrave;, c&aacute;c mẹ h&atilde;y thử l&agrave;m m&oacute;n đậu hũ hải sản nướng giấy bạc ngay tại nh&agrave; nh&eacute;.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/dau-hu-hai-san-nuong-giay-bac-20356\" target=\"_blank\"><img alt=\"Top 4 món cực hot ở quán nhậu nay có thể tự làm tại nhà\" src=\"https://media.cooky.vn/recipe/g3/20356/s/recipe20356-prepare-step8-636337389507612960.jpg\" /></a></p>\n\n<p>&nbsp;</p>', 2, '2017-07-23 20:08:22', '2017-07-23 20:22:20'),
(6, 19, 'Cách làm Nước màu truyền thống', '/images/6oXHRmwds33442q9.jpg', 'Nước màu truyền thống được làm từ đường và nước, có màu cánh gián đẹp và quan trọng là không bị đắng cũng như không độc hại cho sức khỏe. Nước màu truyền thống lỏng hơn, có vị ngọt hơi đắng.', '<p>C&aacute;ch l&agrave;m nước m&agrave;u truyền thống rất đơn giản, chỉ cần cho đường trắng v&agrave;o chảo, th&ecirc;m nước v&agrave;o v&agrave; bật bếp lửa nhỏ nấu cho đường tan chảy m&agrave;u c&aacute;nh gi&aacute;n th&igrave; cho th&ecirc;m &iacute;t nước lạnh v&agrave;o h&ograve;a tan đường đang sệt lỏng ra. Nấu s&ocirc;i lại l&agrave; đạt, cho v&agrave;o hũ thủy tinh bảo quản nơi tho&aacute;ng m&aacute;t. Mỗi khi kho c&aacute;, thịt hay cần d&ugrave;ng bạn chỉ cần cho một &iacute;t nước m&agrave;u cho đẹp nh&eacute;.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/nuoc-mau-truyen-thong-20455\" target=\"_blank\"><img alt=\"Học nhanh 2 cách làm nước màu đơn giản tại nhà cho món kho\" src=\"https://media.cooky.vn/recipe/g3/20455/s/recipe20455-636355518940186697.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:</em>&nbsp;<a href=\"https://www.cooky.vn/cong-thuc/nuoc-mau-truyen-thong-20455\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m nước m&agrave;u truyền thống</strong></a></p>\n\n<p>Khi đ&atilde; c&oacute; cho m&igrave;nh hũ nước m&agrave;u như &yacute;, bạn c&oacute; thể d&ugrave;ng n&oacute; chế biến nhiều m&oacute;n ăn cho gia đ&igrave;nh nh&eacute;. Dưới đ&acirc;y Cooky xin giới thiệu cho bạn c&ocirc;ng thức c&aacute; l&oacute;c kho tộ c&oacute; sử dụng nước m&agrave;u.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/ca-loc-kho-to-16750\" target=\"_blank\"><img alt=\"Học nhanh 2 cách làm nước màu đơn giản tại nhà cho món kho\" src=\"https://media.cooky.vn/recipe/g2/16750/s/recipe16750-635953756965732064.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:&nbsp;</em><a href=\"https://www.cooky.vn/cong-thuc/ca-loc-kho-to-16750\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m c&aacute; l&oacute;c kho tộ</strong></a></p>\n\n<h2><strong>C&aacute;ch l&agrave;m Nước m&agrave;u thốt nốt</strong></h2>\n\n<p>Thoạt nh&igrave;n qua c&aacute;c bạn sẽ nhầm lẫn th&agrave;nh phẩm của 2 loại nước m&agrave;u n&agrave;y nếu kh&ocirc;ng ch&uacute; &yacute; phần&nbsp;<strong>v&aacute;ng dầu nằm ph&iacute;a tr&ecirc;n</strong>&nbsp;ở nước m&agrave;u thốt nốt v&agrave;&nbsp;<strong>sệt</strong>&nbsp;hơn. Điều th&uacute; vị hơn nữa l&agrave; khi nếm bạn sẽ thấy nước m&agrave;u thốt nốt sẽ c&oacute;&nbsp;<strong>vị mặn của nước mắm, the the của ớt tr&aacute;i v&agrave; thơm m&ugrave;i h&agrave;nh tỏi</strong>&nbsp;đấy.</p>\n\n<p>C&aacute;ch l&agrave;m nước m&agrave;u thốt nốt hơi c&ocirc;ng phu hơn so với nước m&agrave;u truyền thống. Trước hết cho dầu ăn v&agrave; đường thốt nốt nghiền nhỏ v&agrave;o chảo nấu cho đường tan, tiếp đến cho h&agrave;nh t&iacute;m, tỏi cắt l&aacute;t, ớt tr&aacute;i v&agrave;o c&ugrave;ng. Nấu khoảng 5 ph&uacute;t để tỏi ớt kh&ocirc; lại th&igrave; tắt bếp.&nbsp;Hạ lựa xuống mức nhỏ nhất, đổ từ từ 100ml nước mắm v&agrave;o chảo, vừa đổ vừa khuấy đều đến khi hỗn hợp lo&atilde;ng ra, đường tan hết v&agrave;o nước mắm. Đun th&ecirc;m 2 ph&uacute;t để hỗn hợp nước m&agrave;u s&ocirc;i lại th&igrave; nhắc xuống, đem lược bỏ x&aacute;c để bảo quản được l&acirc;u hơn.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/nuoc-mau-thot-not-20456\" target=\"_blank\"><img alt=\"Học nhanh 2 cách làm nước màu đơn giản tại nhà cho món kho\" src=\"https://media.cooky.vn/recipe/g3/20456/s/recipe20456-636355518853606545.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:</em>&nbsp;<strong><a href=\"https://www.cooky.vn/cong-thuc/nuoc-mau-thot-not-20456\" target=\"_blank\">C&aacute;ch l&agrave;m nước m&agrave;u thốt nốt</a></strong></p>\n\n<p>Nước m&agrave;u đường thốt nốt sẽ c&oacute; hương vị v&agrave; độ sệt gần giống như kho quẹt, ngo&agrave;i c&ocirc;ng dụng d&ugrave;ng để kho thịt c&aacute;, ch&uacute;ng ta c&oacute; thể d&ugrave;ng nước m&agrave;u như một loại nước chấm để d&ugrave;ng với cơm, chấm với rau luộc cũng rất l&agrave; ngon. Vậy thay v&igrave; d&ugrave;ng kho quẹt chấm rau củ, giờ ch&uacute;ng ta d&ugrave;ng nước m&agrave;u thốt nốt l&agrave;m nước chấm cho m&oacute;n b&ocirc;ng cải xanh luộc th&igrave; sẽ như thế n&agrave;o nhỉ?</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/bong-cai-xanh-luoc-2098\" target=\"_blank\"><img alt=\"Học nhanh 2 cách làm nước màu đơn giản tại nhà cho món kho\" src=\"https://media.cooky.vn/recipe/g1/2098/s/recipe2098-635646022255325126.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:</em>&nbsp;<a href=\"https://www.cooky.vn/cong-thuc/bong-cai-xanh-luoc-2098\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m b&ocirc;ng cải xanh luộc</strong></a></p>\n\n<p><strong><em>C&aacute;c mẹ đ&atilde; c&oacute; cho m&igrave;nh nước m&agrave;u an to&agrave;n, chất lượng do tự m&igrave;nh l&agrave;m ra chưa n&agrave;o? C&ugrave;ng chia sẻ kinh nghiệm khi c&aacute;c mẹ l&agrave;m ch&uacute;ng nh&eacute;!</em></strong></p>', 2, '2017-07-23 20:13:19', '2017-07-23 20:22:16'),
(8, 19, 'Bí quyết chế biến gà đông', '/images/j2Z49sATjq9WLnIF.jpg', 'Thịt gà đông lạnh sẽ được chế biến như thế nào, cụ thể là luộc để da gà giòn, thịt chắc, thơm như gà tươi sống. Bí quyết là gì nào?', '<p><em>Hiện nay, lượng ti&ecirc;u thụ thực phẩm đ&ocirc;ng lạnh rất phổ biến trong cuộc sống hiện đại, kh&ocirc;ng c&oacute; nhiều thời gian cho c&aacute;c b&agrave; mẹ nội trợ. Tuy vậy, kh&ocirc;ng phải mẹ n&agrave;o cũng biết c&aacute;ch chế biến những thực phẩm đ&ocirc;ng lạnh đ&uacute;ng c&aacute;ch, ngon v&agrave; bổ dưỡng như h&agrave;ng tươi sống. C&aacute;c mẹ c&ugrave;ng tham khảo qua b&agrave;i viết dưới đ&acirc;y nh&eacute;!</em></p>\n\n<h2><strong>Để g&agrave; r&aacute;o nước v&agrave; l&agrave;m m&aacute;t trước khi l&agrave;m đ&ocirc;ng</strong></h2>\n\n<p>Một chuy&ecirc;n gia của trường Trung cấp nghề Nấu ăn v&agrave; Nghiệp Vụ kh&aacute;c sạn đ&atilde; khuyến c&aacute;o g&agrave; trước khi cấp đ&ocirc;ng n&ecirc;n được l&agrave;m sạch sẽ,&nbsp;<strong>để r&aacute;o nước v&agrave; cho v&agrave;o ph&ograve;ng lạnh khoảng 2 giờ đồng hồ mới chuyển sang cấp lạnh.&nbsp;</strong>Một điều lu&ocirc;n được đảm bảo l&agrave; g&agrave; trước khi cấp đ&ocirc;ng phải được l&agrave;m r&aacute;o nước, c&oacute; thể sử dụng giấy thấm nước. Sau đ&oacute; d&ugrave;ng&nbsp;<strong>bọc nylon bọc k&iacute;n</strong>&nbsp;lại mới bảo quản đ&ocirc;ng lạnh để tr&aacute;nh ảnh hưởng đến c&aacute;c thực phẩm kh&aacute;c (đối với 1 số thiết bị l&agrave;m lạnh c&oacute; hướng dẫn rất r&otilde; vị tr&iacute; bảo quản của từng loại thực phẩm).</p>\n\n<p><img alt=\"Bí quyết chế biến gà đông lạnh giòn da, chắc thịt\" src=\"https://media.cooky.vn/recipe/g2/16749/s/cooky-recipe-635953603830091096.JPG\" /></p>\n\n<p>Phải l&agrave;m điều n&agrave;y v&igrave; đại đa số c&aacute;c thiết bị bảo quản lạnh hiện nay d&ugrave;ng quạt gi&oacute; để đưa kh&iacute; lạnh đến khắp nơi trong khoang bảo quản, nếu kh&ocirc;ng bọc k&iacute;n th&igrave; thực phẩm sẽ bị kh&ocirc; trong qu&aacute; tr&igrave;nh bảo quản. Khi d&ugrave;ng đến c&aacute;c loại thực phẩm n&agrave;y (trong thời hạn cho ph&eacute;p), trước đ&oacute; v&agrave;i giờ ta n&ecirc;n l&agrave;m giảm độ lạnh từ từ bằng c&aacute;ch đặt thực phẩm n&agrave;y v&agrave;o c&aacute;c vị tr&iacute; kh&aacute;c trong khoang bảo quản nơi m&agrave; c&oacute; nhiệt độ cao hơn (nhiệt độ ở c&aacute;c vị tr&iacute; bảo quản của thiết bị l&agrave;m lạnh dao động từ -4 độ C đến 4 độ C).</p>\n\n<p><img alt=\"Bí quyết chế biến gà đông lạnh giòn da, chắc thịt\" src=\"https://media.cooky.vn/images/blog-2016/bi-quyet-che-bien-ga-dong-lanh-gion-da-chac-thit-2.jpg\" /></p>\n\n<p>Điều n&agrave;y c&oacute; thể giải th&iacute;ch tại sao sau khi ra đ&ocirc;ng thịt g&agrave; lại bị chảy nước, mất chất dinh dưỡng v&agrave; kh&ocirc;ng bở. Trong qu&aacute; tr&igrave;nh cấp đ&ocirc;ng thịt g&agrave; bạn n&ecirc;n ch&uacute; &yacute; đ&eacute;n nhiệt độ v&agrave; thời gian cấp đ&ocirc;ng, nếu&nbsp;<strong>cấp đ&ocirc;ng thịt g&agrave; ở nhiệt độ từ -18 độ đến -30 độ th&igrave; sẽ để được một năm, cấp đ&ocirc;ng s&acirc;u ở -36 độ th&igrave; để được 18 th&aacute;ng</strong>. Nhưng kh&ocirc;ng phải v&igrave; vậy m&agrave; ta c&oacute; thể để thời gian l&acirc;u v&igrave; trong thịt c&oacute; một số enzyme tự ph&acirc;n huỷ v&agrave; chuyển ho&aacute;. C&oacute; một số vi khuẩn nhiễm v&agrave;o thịt trong qu&aacute; tr&igrave;nh giết mổ, ở nhiệt độ thấp, vi khuẩn n&agrave;y kh&ocirc;ng hoạt động nhưng vẫn sống, chờ điều kiện thuận lợi sẽ hoạt động.</p>\n\n<p>B&ecirc;n cạnh đ&oacute;, qu&aacute; tr&igrave;nh cấp đ&ocirc;ng v&agrave; r&atilde; đ&ocirc;ng l&agrave;m mất 1/3 c&aacute;c chất b&eacute;o ho&agrave; tan trong thịt, một số chất gần như mất hết. Nh&igrave;n chung, tổng c&aacute;c chất sau mỗi lần cấp đ&ocirc;ng - r&atilde; đ&ocirc;ng đều giảm 20%.</p>\n\n<h2><strong>B&iacute; quyết luộc thịt g&agrave; đ&ocirc;ng lạnh gi&ograve;n da, chắc thịt</strong></h2>\n\n<p>Muốn chế biến một m&oacute;n g&agrave; đ&ocirc;ng lạnh trước hết phải biết được c&aacute;ch r&atilde; đ&ocirc;ng đ&uacute;ng c&aacute;ch để đảm bảo được dinh dưỡng của thực phẩm. Nếu bạn kh&ocirc;ng r&atilde; đ&ocirc;ng trước khi chế biến th&igrave;&nbsp;<strong>thời gian nấu sẽ k&eacute;o d&agrave;i v&agrave; dẫn đến thịt g&agrave; sẽ bị tơi, kh&ocirc;, mất chất ngọt trong thịt</strong>&nbsp;v&agrave; hơn nữa thịt sẽ bị x&eacute; r&aacute;ch thớ rất mất thẩm mỹ m&oacute;n ăn.</p>\n\n<p><img alt=\"Bí quyết chế biến gà đông lạnh giòn da, chắc thịt\" src=\"https://media.cooky.vn/images/blog-2016/bi-quyet-che-bien-ga-dong-lanh-gion-da-chac-thit-1.jpg\" /></p>\n\n<p>Đối với m&oacute;n g&agrave; luộc bạn n&ecirc;n&nbsp;<strong>đặt con g&agrave; nằm ngữa v&agrave;o nồi khi luộc</strong>, cho phần lưng dưới đ&aacute;y nồi v&igrave; phần n&agrave;y l&acirc;u ch&iacute;n hơn c&aacute;c phần kh&aacute;c. C&oacute; thể th&ecirc;m một số gia vị luộc k&egrave;m như h&agrave;nh t&iacute;m, gừng, muối... Đổ nước lạnh v&agrave;o ngập g&agrave; rồi h&atilde;y bắc l&ecirc;n bếp luộc, nếu sử dụng nước n&oacute;ng hoặc nấu nước n&oacute;ng rồi mới cho g&agrave; v&agrave;o luộc th&igrave; g&agrave; sẽ&nbsp;<strong>bị th&acirc;m đen</strong>. Một điều m&agrave; ch&uacute;ng ta thường bỏ qua đ&oacute; l&agrave; khi luộc g&agrave; kh&ocirc;ng đậy nắp, nếu ch&uacute;ng ta đậy nắp k&iacute;n th&igrave; nhiệt lan tỏa trong nồi sẽ khiến g&agrave; nhanh ch&iacute;nh hơn.</p>\n\n<p><img alt=\"Bí quyết chế biến gà đông lạnh giòn da, chắc thịt\" src=\"https://media.cooky.vn/images/blog-2016/bi-quyet-che-bien-ga-dong-lanh-gion-da-chac-thit-3.jpg\" /></p>\n\n<p>Đối với g&agrave; đ&ocirc;ng lạnh, thời gian l<strong>uộc g&agrave; từ 45 đến 60 ph&uacute;t ở mức lửa nhỏ</strong>. Khi g&agrave; ch&iacute;n, ta vớt ra cho ngay v&agrave;o nồi nước s&ocirc;i để lạnh, để g&agrave; nguội hẳn mới lấy ra đĩa. C&aacute;ch n&agrave;y gi&uacute;p cho da g&agrave; căng v&agrave; c&oacute; m&agrave;u sắc đẹp. Sau khi thịt r&aacute;o nước một ch&uacute;t, d&ugrave;ng mỡ g&agrave; đ&atilde; thắng qu&eacute;t một lớp l&ecirc;n da để tạo m&agrave;u v&agrave;ng b&oacute;ng v&agrave; căng mượt. Thao t&aacute;c cuối c&ugrave;ng l&agrave; chặt miếng v&agrave; xếp g&agrave; ra đĩa.</p>\n\n<p><em><strong>Một số c&aacute;ch chế biến kh&aacute;c từ thịt g&agrave;</strong></em></p>\n\n<h2><strong>C&aacute;ch l&agrave;m g&agrave; hấp muối sả</strong></h2>\n\n<p>Bạn c&oacute; thể l&agrave;m m&oacute;n g&agrave; hấp muối sả đơn giản n&agrave;y ngay tại nh&agrave; m&agrave; ngon như ngo&agrave;i h&agrave;ng nh&eacute;. G&agrave; hấp muối sả giữ được vị ngọt trọn vẹn của thịt g&agrave;, c&oacute; người c&ograve;n gọi l&agrave; g&agrave; hấp muối hột. G&agrave; hấp kh&ocirc;ng cần nước kh&ocirc;ng những&nbsp;<strong>mềm như thịt g&agrave; luộc m&agrave; lại thơm ngon v&agrave; dai hơn</strong>. Khi&nbsp;<strong>ăn k&egrave;m với muối ớt l&aacute; chanh</strong>&nbsp;chắc chắn nh&agrave; bạn sẽ c&oacute; một m&oacute;n g&agrave; ngon kh&ocirc;ng cưỡng nổi.</p>\n\n<p>G&agrave; sau khi mua về, rửa sạch rồi cho gia vị gồm sả, h&agrave;nh t&iacute;m, tỏi, l&aacute; chanh cắt nhỏ... d&ugrave;ng tay b&ocirc;i đều hạt n&ecirc;m quanh g&agrave; để thấm gia vị khi hấp. Cho muối hột v&agrave;o nồi đ&aacute;y d&agrave;y rang sơ n&oacute;ng l&ecirc;n rồi l&oacute;t một lớp sả cắt kh&uacute;c v&agrave;o, đặt g&agrave; v&agrave;o đậy nắp v&agrave; hấp 1-1h30 t&ugrave;y k&iacute;ch thước con g&agrave; m&agrave; bạn chọn. Trong l&uacute;c chờ g&agrave; ch&iacute;n th&igrave; l&agrave;m muối ớt chanh chấm c&ugrave;ng. &Ocirc;i th&ocirc;i, mới nhắc th&ocirc;i đ&atilde; thấy m&oacute;n n&agrave;y ngon v&agrave; hấp dẫn cỡ n&agrave;o rồi, c&aacute;c mẹ h&atilde;y l&agrave;m cho cả nh&agrave; ăn ngay nh&eacute;!</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/ga-hap-muoi-sa-20428\" target=\"_blank\"><img alt=\"Bí quyết chế biến gà đông lạnh giòn da, chắc thịt\" src=\"https://media.cooky.vn/recipe/g3/20428/s/recipe20428-prepare-step4-636346862372289953.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:</em>&nbsp;<a href=\"https://www.cooky.vn/cong-thuc/ga-hap-muoi-sa-20428\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m g&agrave; hấp muối sả</strong></a></p>\n\n<h2><strong>C&aacute;ch l&agrave;m g&agrave; luộc l&aacute; chanh kh&ocirc;ng cần nước</strong></h2>\n\n<p>G&agrave; luộc lu&ocirc;n l&agrave; m&oacute;n ăn chứa đựng trọn vẹn tinh t&uacute;y của thịt g&agrave;, vậy n&ecirc;n c&aacute;ch luộc n&agrave;y kh&ocirc;ng khiến bạn thất vọng đ&acirc;u. Kh&ocirc;ng cần nước m&agrave; vẫn luộc được g&agrave;, qu&aacute; tuyệt vời, thịt g&agrave; sẽ chắc, kh&ocirc;ng bị r&aacute;ch da, thơm l&aacute; chanh v&agrave; sẽ nghiện ngay khi thử miếng đầu ti&ecirc;n đấy nh&eacute;.</p>\n\n<p>C&aacute;ch l&agrave;m cũng đơn giản như g&agrave; hấp muối sả vậy, nguy&ecirc;n liệu ch&iacute;nh ngo&agrave;i g&agrave; cần c&oacute; muối hột v&agrave; chanh. Sử dụng&nbsp;<strong>muối l&agrave;m ch&iacute;n g&agrave; thay cho nước, chanh sẽ tạo hương thơm th&ecirc;m cho thịt g&agrave;</strong>. Luộc &iacute;t nhất 30 ph&uacute;t mới được mở ra kiểm tra,&nbsp;tr&aacute;nh mở thường xuy&ecirc;n nồi sẽ mất nhiệt n&oacute;ng dẫn đến g&agrave; l&acirc;u ch&iacute;n. D&ugrave;ng k&egrave;m với muối ớt xanh sẽ rất ngon.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/ga-luoc-la-chanh-khong-can-nuoc-16749\" target=\"_blank\"><img alt=\"Bí quyết chế biến gà đông lạnh giòn da, chắc thịt\" src=\"https://media.cooky.vn/recipe/g2/16749/s/cooky-recipe-635953608385611097.JPG\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:</em>&nbsp;<a href=\"https://www.cooky.vn/cong-thuc/ga-luoc-la-chanh-khong-can-nuoc-16749\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m g&agrave; luộc l&aacute; chanh kh&ocirc;ng cần nước</strong></a></p>\n\n<h2><strong>C&aacute;ch l&agrave;m&nbsp;G&agrave; nướng ớt kiểu Ch&acirc;u Phi</strong></h2>\n\n<p>Nếu cảm thấy ng&aacute;n ngẩm với m&oacute;n thịt g&agrave; luộc, bạn c&oacute; thể chế biến ch&uacute;ng bởi c&ocirc;ng thức g&agrave; nướng ớt kiểu Ch&acirc;u Phi dưới đ&acirc;y. M&oacute;n nướng n&agrave;y kết hợp tới 15 loại gia vị kh&aacute;c nhau tạo n&ecirc;n một hương vị mới lạ cho người thưởng thức. G&agrave; nướng ớt kiểu Ch&acirc;u Phi n&ecirc;n l&agrave;m v&agrave;o ng&agrave;y cuối tuần hoặc bữa tiệc sẽ tuyệt vời lắm nh&eacute;.</p>\n\n<p>Mua tất cả c&aacute;c gia vị v&agrave; coh ch&uacute;ng v&agrave;o m&aacute;y xay xay nhuyễn, nếu kh&ocirc;ng c&oacute; m&aacute;y xay th&igrave; d&ugrave;ng cối gi&atilde; nhuyễn. Sau đ&oacute; cho hỗn hợp sốt v&agrave;o thịt g&agrave; đ&atilde; sơ chế sạch,&nbsp;<strong>ướp &iacute;t nhất 90 ph&uacute;t hoặc qua đ&ecirc;m c&agrave;ng tốt</strong>. Sau đ&oacute; cho l&ecirc;n khay v&agrave; đưa v&agrave;o l&ograve; nướng ch&iacute;n ở&nbsp;<strong>nhiệt độ 180-200 độ C khoảng 30-40 ph&uacute;t</strong>&nbsp;l&agrave; được.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/ga-nuong-ot-kieu-chau-phi-20117\" target=\"_blank\"><img alt=\"Bí quyết chế biến gà đông lạnh giòn da, chắc thịt\" src=\"https://media.cooky.vn/recipe/g3/20117/s/recipe20117-prepare-step4-636314193475687066.JPG\" /></a></p>', 2, '2017-07-23 20:16:36', '2017-07-23 20:22:09'),
(9, 19, '5 cách nấu cá ', '/images/sisxVT4hydLCfBwe.jpg', 'Cùng tham khảo cách chế biến các món cá mà không cần sử dụng tới dầu ăn vừa an toàn vừa ngon, đơn giản men nên biết!', '<p><em>Dầu ăn l&agrave; nguy&ecirc;n liệu được sử dụng chế biến c&aacute;c m&oacute;n ăn h&agrave;ng ng&agrave;y, tuy nhi&ecirc;n c&oacute; nhiều loại dầu ăn c&oacute; thể l&agrave;m gia tăng lượng cholesterol trong cơ thể, g&acirc;y ảnh hưởng kh&ocirc;ng tốt cho hệ tim mạch. Để đảm bảo cho sức khỏe của m&igrave;nh cũng như gia đ&igrave;nh n&ecirc;n sử dụng c&aacute;c loại dầu ăn an to&agrave;n hoặc hạn chế đến mức c&oacute; thể khi chế biến thức ăn.</em></p>\n\n<h2><strong>Chi&ecirc;n c&aacute; bằng chảo v&agrave; thay thế dầu ăn bằng bơ</strong></h2>\n\n<p><img alt=\"5 cách nấu cá không cần sử dụng dầu ăn tốt cho sức khỏe\" src=\"https://media.cooky.vn/images/blog-2016/5-cach-nau-ca-khong-can-su-dung-dau-an-tot-cho-suc-khoe-1.jpg\" /></p>\n\n<p>M&oacute;n c&aacute; chi&ecirc;n c&oacute; lẽ l&agrave; được chế biến nhiều nhất cho c&aacute;c bữa cơm, c&aacute; chi&ecirc;n vừa gi&ograve;n b&ecirc;n ngo&agrave;i, ngọt thịt b&ecirc;n trong khiến th&agrave;nh vi&ecirc;n gia đ&igrave;nh bạn lu&ocirc;n th&iacute;ch m&oacute;n n&agrave;y. Tuy nhi&ecirc;n, thay v&igrave; sử dụng dầu ăn để chi&ecirc;n, bạn c&oacute; thể thay thế bằng&nbsp;<strong>bơ v&agrave; &iacute;t nước</strong>. Sau khi c&aacute; được l&agrave;m xong, t&ugrave;y k&iacute;ch thước chảo để bạn cắt c&aacute; ra hay để nguy&ecirc;n con. Th&ocirc;ng thường m&oacute;n c&aacute; chi&ecirc;n th&igrave; ch&uacute;ng ta sẽ kh&ocirc;ng cần ướp th&ecirc;m gia vị, cho bơ v&agrave;o chảo để bơ tan chảy rồi cho c&aacute; v&agrave;o v&agrave; th&ecirc;m ch&uacute;t nước, đậy nắp chảo để nước kh&ocirc;ng bắn v&agrave;&nbsp;<strong>đun lửa nhỏ cho đến khi c&aacute; mềm</strong>&nbsp;v&agrave; đều cả hai mặt từ b&ecirc;n trong, sau đ&oacute; để lửa lớn l&ecirc;n cho&nbsp;<strong>ch&aacute;y v&agrave;ng phần da b&ecirc;n ngo&agrave;i l&agrave; lấy c&aacute; ra</strong>.</p>\n\n<h2><strong>C&aacute; hấp sẽ giữ được nhiều chất dinh dưỡng</strong></h2>\n\n<p><img alt=\"5 cách nấu cá không cần sử dụng dầu ăn tốt cho sức khỏe\" src=\"https://media.cooky.vn/images/blog-2016/5-cach-nau-ca-khong-can-su-dung-dau-an-tot-cho-suc-khoe-2.jpg\" /></p>\n\n<p>C&aacute; hấp được đ&aacute;nh gi&aacute; l&agrave; một trong những m&oacute;n ăn ngon v&agrave; bổ dưỡng v&igrave; phương ph&aacute;p n&agrave;y giữ lại nhiều chất dinh dưỡng trong thức ăn. C&aacute; hấp kh&aacute; phổ biến trong văn h&oacute;a ẩm thực của người ch&acirc;u &Aacute;. Th&ocirc;ng thường, khi hấp, c&aacute; được ướp với nhiều loại gia vị, ớt, tỏi v&agrave; gừng. V&agrave;o cuối qu&aacute; tr&igrave;nh hấp, người ta thường cho th&ecirc;m v&agrave;o c&aacute; một loại nước sốt được chế biến theo &yacute; th&iacute;ch của người d&ugrave;ng. Những hương vị kh&aacute;c nhau sẽ h&ograve;a trộn c&ugrave;ng với c&aacute;, tạo n&ecirc;n một m&oacute;n ăn thơm ngon v&agrave; hấp dẫn</p>\n\n<h2><strong>C&aacute; nướng bằng vỉ</strong></h2>\n\n<p><img alt=\"5 cách nấu cá không cần sử dụng dầu ăn tốt cho sức khỏe\" src=\"https://media.cooky.vn/images/blog-2016/5-cach-nau-ca-khong-can-su-dung-dau-an-tot-cho-suc-khoe-3.jpg\" /></p>\n\n<p>Hầu hết m&oacute;n nướng ch&uacute;ng ta kh&ocirc;ng cần phải sử dụng tới dầu ăn v&agrave; l&agrave; c&aacute;ch chế biến d&acirc;n gian đơn giản nhất. Thịt c&aacute; mềm v&agrave; rất nhanh ch&iacute;n, v&igrave; vậy bạn chỉ cần cho c&aacute; l&ecirc;n vĩ v&agrave; cho l&ecirc;n bếp than trong v&agrave;i ph&uacute;t. Ch&uacute; &yacute; l&agrave; khi cho c&aacute; l&ecirc;n vĩ bạn n&ecirc;n hạn chế lật c&aacute; qu&aacute; nhiều lần khiến c&aacute; dễ bị n&aacute;t. Muốn m&oacute;n c&aacute; nướng được ngon v&agrave; tăng hương vị hơn n&ecirc;n ướp ch&uacute;ng với gia vị trước cho thấm. Đặc biệt, với m&oacute;n nướng n&oacute;i chung v&agrave; m&oacute;n c&aacute; nướng n&oacute;i ri&ecirc;ng thường ch&uacute;ng ta l&agrave;m th&ecirc;m phần sốt phết l&ecirc;n mặt c&aacute; trong khi nướng, vừa tăng th&ecirc;m đậm đ&agrave; v&agrave; chống ch&aacute;y cho c&aacute;.</p>\n\n<h2><strong>C&aacute; nướng giấy bạc</strong></h2>\n\n<p><img alt=\"5 cách nấu cá không cần sử dụng dầu ăn tốt cho sức khỏe\" src=\"https://media.cooky.vn/images/blog-2016/5-cach-nau-ca-khong-can-su-dung-dau-an-tot-cho-suc-khoe-dai-dien.jpg\" /></p>\n\n<p>Giấy bạc gi&uacute;p cho m&oacute;n c&aacute; nướng được giữ được trọn hương vị của m&oacute;n c&aacute; v&agrave; sẽ giảm được kh&aacute; nhiều chất b&eacute;o. C&aacute; được l&agrave;m sạch, nếu muốn bạn c&oacute; thể ướp sẵn gia vị hoặc rau thơm để tạo m&ugrave;i khi nướng. Sau đ&oacute; lấy một miếng giấy bạc, phết một lớp mỏng bơ &iacute;t b&eacute;o hoặc mayonnaise l&ecirc;n giấy nhằm c&aacute; kh&ocirc;ng bị d&iacute;nh khi nướng. Cho c&aacute; v&agrave;o, g&oacute;i giấy bạc lại để l&ecirc;n bếp nướng.</p>\n\n<p>Với m&oacute;n c&aacute; nướng giấy bạc n&agrave;y bạn c&oacute; thể nướng được ở nhiều bếp ngay cả bếp gas m&agrave; kh&ocirc;ng nhất thiết phải l&agrave; l&ograve; nướng nh&eacute;!</p>\n\n<h2><strong>Chi&ecirc;n c&aacute; bằng l&ograve;</strong></h2>\n\n<p><img alt=\"5 cách nấu cá không cần sử dụng dầu ăn tốt cho sức khỏe\" src=\"https://media.cooky.vn/images/blog-2016/5-cach-nau-ca-khong-can-su-dung-dau-an-tot-cho-suc-khoe-4.jpg\" /></p>\n\n<p>Đối với m&oacute;n c&aacute; chi&ecirc;n bằng l&ograve;, c&aacute; cần được sơ chế trước khi nấu. C&aacute;ch sơ chế cũng kh&ocirc;ng qu&aacute; phức tạp, bạn chỉ cần nh&uacute;ng c&aacute; v&agrave;o một hỗn hợp gồm &iacute;t bột m&igrave;, nước sốt gia vị v&agrave; l&ograve;ng trắng trứng rồi cho c&aacute; l&ecirc;n khay v&agrave; đặt ch&uacute;ng v&agrave;o l&ograve; nướng. M&oacute;n c&aacute; n&agrave;y c&oacute; một lớp vỏ kh&aacute; gi&ograve;n sau khi được nướng ch&iacute;n.</p>\n\n<p>&nbsp;</p>', 2, '2017-07-23 20:17:45', '2017-07-23 20:22:04'),
(10, 21, 'Tổng hợp 5 món ăn hấp dẫn được làm từ đào tươi', '/images/jaouS6x7ZqkefhhC.jpg', 'Đào tươi mua về ngoài ăn liền thì bạn có thể chế biến thành các món ăn khác nhau như đào ngâm, mứt đào, đào dầm chua cay, sinh tố bơ đào... Mỗi món ăn mang lại cho người thưởng thức mỗi khẩu vị khác nhau, nhưng vẫn có đặc trưng chung của hương đào thanh ngọt.', '<p><em>Đ&atilde; v&agrave;o những ng&agrave;y cuối của m&ugrave;a đ&agrave;o nhưng độ hot của n&oacute; vẫn chưa dừng lại. C&aacute;c mẹ vẫn tranh thủ mua những tr&aacute;i đ&agrave;o cuối m&ugrave;a v&agrave; rỉ tai nhau l&agrave;m những m&oacute;n ngon từ đ&agrave;o. Dưới đ&acirc;y l&agrave; tổng hợp c&aacute;c m&oacute;n ăn hấp dẫn c&oacute; thể chế biến từ đ&agrave;o tươi cho c&aacute;c mẹ tham khảo!</em></p>\n\n<h2><strong>1. C&aacute;ch l&agrave;m Đ&agrave;o ng&acirc;m</strong></h2>\n\n<p>Đ&agrave;o ng&acirc;m l&agrave; m&oacute;n hot nhất v&agrave;o m&ugrave;a đ&agrave;o mỗi năm, mẹ n&agrave;o cũng l&agrave;m lấy một hũ d&ugrave;ng dần cho cả m&ugrave;a h&egrave;. C&aacute;c mẹ chia sẻ nhau kinh nghiệm của m&igrave;nh khi l&agrave;m m&oacute;n đ&agrave;o ng&acirc;m. Vậy cần ch&uacute; &yacute; g&igrave; khi l&agrave;m m&oacute;n đ&agrave;o ng&acirc;m n&agrave;y?</p>\n\n<p>Trước ti&ecirc;n, việc lựa chọn đ&agrave;o n&ecirc;n chọn những tr&aacute;i&nbsp;đ&agrave;o vừa&nbsp;<strong>ch&iacute;n tới, vỏ đỏ, ngọt thịt&nbsp;</strong>v&agrave; quan trọng l&agrave; ruột v&agrave;ng. Ch&uacute; &yacute; n&ecirc;n chọn những tr&aacute;i c&ograve;n cứng, v&igrave; khi gọt vỏ v&agrave; t&aacute;ch hạt sẽ kh&ocirc;ng l&agrave;m đ&agrave;o bị n&aacute;t. Đ&agrave;o khi t&aacute;ch hạt ra bạn nhớ cho v&agrave;o thau&nbsp;<strong>nước muối</strong>&nbsp;để&nbsp;<strong>đ&agrave;o kh&ocirc;ng bị th&acirc;m</strong>&nbsp;khi tiếp x&uacute;c với kh&ocirc;ng kh&iacute;, gọt vỏ xong cũng cho v&agrave;o thau nước muối ng&acirc;m nh&eacute;. Nước đường để ng&acirc;m m&oacute;n đ&agrave;o thường được nấu bằng đường n&acirc;u để c&oacute; m&agrave;u đẹp. Cho đ&agrave;o ng&acirc;m muối v&agrave;o nồi nước đường v&agrave; nấu khoảng 15-20 ph&uacute;t để đ&agrave;o trong lại rồi vớt đ&agrave;o ra một thau c&oacute; sẵn nước đ&aacute;. Mục đ&iacute;ch l&agrave; để đ&agrave;o được giữ độ gi&ograve;n l&acirc;u hơn khi ng&acirc;m. Nước đường nguội th&igrave; cho c&ugrave;ng đ&agrave;o v&agrave;o hũ thủy tinh để d&ugrave;ng dần. Nếu mẹ n&agrave;o muốn vị siryp thanh hơn th&igrave; cho th&ecirc;m nước cốt chanh v&agrave;o nước đường trước khi cho v&agrave;o hũ nh&eacute;.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/dao-ngam-20358\" target=\"_blank\"><img alt=\"Tổng hợp 5 món ăn hấp dẫn được làm từ đào tươi\" src=\"https://media.cooky.vn/recipe/g3/20358/s/recipe20358-prepare-step6-636336532263175289.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:</em>&nbsp;<a href=\"https://www.cooky.vn/cong-thuc/dao-ngam-20358\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m đ&agrave;o ng&acirc;m</strong></a></p>\n\n<h2><strong>2. C&aacute;ch l&agrave;m Mứt đ&agrave;o</strong></h2>\n\n<p>L&agrave;m một hũ mứt đ&agrave;o chua chua, ngọt ngọt phết l&ecirc;n b&aacute;nh m&igrave; mỗi bữa ăn s&aacute;ng quả l&agrave; s&aacute;ng suốt. M&ugrave;a đ&agrave;o, ngo&agrave;i l&agrave;m đ&agrave;o ng&acirc;m th&igrave; mứt đ&agrave;o cũng l&agrave; c&aacute;ch hay khi d&ugrave;ng đảo ăn dần cả m&ugrave;a h&egrave; đấy.</p>\n\n<p>C&aacute;ch l&agrave;m mứt đ&agrave;o đơn giản như c&aacute;c loại mứt kh&aacute;c bạn hay l&agrave;m, chỉ c&oacute; bước luộc đ&agrave;o sơ qua với v&agrave; ng&acirc;m đ&agrave;o luộc trước khi xay nhuyễn. Điều n&agrave;y gi&uacute;p cho đ&agrave;o tươi, gi&ograve;n hơn khi s&ecirc;n. Số lượng đường l&agrave;m mứt t&ugrave;y thuộc v&agrave;o sở th&iacute;ch ăn ngọt của từng người, v&agrave; nhớ th&ecirc;m v&agrave;i giọt nước chanh l&agrave;m m&oacute;n mứt thanh hơn nh&eacute;.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/mut-dao-14555\" target=\"_blank\"><img alt=\"Tổng hợp 5 món ăn hấp dẫn được làm từ đào tươi\" src=\"https://media.cooky.vn/recipe/g2/14555/s/recipe14555-prepare-step5-635689239981705780.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:</em>&nbsp;<a href=\"https://www.cooky.vn/cong-thuc/mut-dao-14555\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m mứt đ&agrave;o</strong></a></p>\n\n<h2><strong>3. C&aacute;ch l&agrave;m Đ&agrave;o dầm chua cay</strong></h2>\n\n<p>Với những người muốn c&oacute; ngay m&oacute;n đ&agrave;o tươi để thưởng thức thay v&igrave; cắt nấu th&igrave; đơn giản nhất vẫn l&agrave; m&oacute;n đ&agrave;o dầm chua cay. Mới nhắc đến th&ocirc;i, chắc hẳn chị em đang th&egrave;m chảy nước miếng rồi đấy.</p>\n\n<p>Lựa những tr&aacute;i đ&agrave;o đầu m&ugrave;a hoặc những tr&aacute;i c&oacute; vỏ m&agrave;u xanh vừa gi&ograve;n, độ chua nhiều hơn. Rửa sạch đ&agrave;o, kh&ocirc;ng cần phải loại bỏ vỏ để tăng độ chua gi&ograve;n hơn của đ&agrave;o, cắt miếng nhỏ t&aacute;ch hạt cho v&agrave;o ng&acirc;m với nước đường khoảng 10 ph&uacute;t. Sau đ&oacute; vớt ra v&agrave; th&ecirc;m gia vị v&agrave;o trộn đều l&agrave; măm măm được ngay nh&eacute;.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/dao-dam-chua-cay-4266\" target=\"_blank\"><img alt=\"Tổng hợp 5 món ăn hấp dẫn được làm từ đào tươi\" src=\"https://media.cooky.vn/recipe/g1/4266/s/recipe4266-prepare-step4-635736802698007367.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:</em>&nbsp;<a href=\"https://www.cooky.vn/cong-thuc/dao-dam-chua-cay-4266\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m đ&agrave;o dầm chua cay</strong></a></p>\n\n<h2><strong>4. C&aacute;ch l&agrave;m Sinh tố bơ đ&agrave;o</strong></h2>\n\n<p>Sinh tố bơ đ&agrave;o cho m&ugrave;a h&egrave; th&igrave; sao nhỉ? Chắc chưa mẹ n&agrave;o thử m&oacute;n n&agrave;y đ&acirc;u, ngon hơn bạn tưởng tượng đấy. Sinh tố bơ đ&agrave;o c&oacute; vị b&eacute;o ngậy của bơ, hương thơm của đ&agrave;o h&ograve;a quyện c&ugrave;ng vị ngọt l&agrave;nh của sữa tươi. Chắc chắn m&oacute;n sinh tố n&agrave;y sẽ chinh phục bạn ngay lần đầu thưởng thức. Tranh thủ m&ugrave;a đ&agrave;o, l&agrave;m m&oacute;n sinh tố bơ đ&agrave;o mời cả nh&agrave; giải kh&aacute;t ng&agrave;y nắng n&oacute;ng ngay nh&eacute;.</p>\n\n<p>Với m&oacute;n sinh tố n&agrave;y th&igrave; c&aacute;c bạn n&ecirc;n chọn những tr&aacute;i đ&agrave;o ch&iacute;n mềm, vị ngọt thanh sẽ th&iacute;ch hợp hơn. L&uacute;c xay sẽ mềm mịn, kh&ocirc;ng v&oacute;n cục v&igrave; đ&agrave;o c&ograve;n qu&aacute; sống. Cho tất cả nguy&ecirc;n liệu v&agrave;o xay, nếu muốn uống lạnh th&igrave; th&ecirc;m đ&aacute; vi&ecirc;n v&agrave;o xay c&ugrave;ng lu&ocirc;n. C&oacute; thể th&ecirc;m hạnh nh&acirc;n cắt l&aacute;t l&agrave;m topping nữa đấy.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/sinh-to-bo-dao-20258\" target=\"_blank\"><img alt=\"Tổng hợp 5 món ăn hấp dẫn được làm từ đào tươi\" src=\"https://media.cooky.vn/recipe/g3/20258/s/recipe20258-prepare-step4-636322774208209169.jpg\" /></a></p>\n\n<p><em>&gt;&gt; Xem th&ecirc;m c&ocirc;ng thức chi tiết v&agrave; lưu lại tại:&nbsp;</em><a href=\"https://www.cooky.vn/cong-thuc/sinh-to-bo-dao-20258\" target=\"_blank\"><strong>C&aacute;ch l&agrave;m sinh tố bơ đ&agrave;o</strong></a></p>\n\n<h2><strong>5. C&aacute;ch l&agrave;m Đ&agrave;o nướng bơ, mật ong</strong></h2>\n\n<p>Đ&agrave;o nướng th&igrave; sẽ như thế n&agrave;o nhỉ? C&oacute; mẹ n&agrave;o đ&atilde; l&agrave;m chưa? Đ&agrave;o sắp hết m&ugrave;a m&igrave;nh tranh thủ l&agrave;m m&oacute;n đ&agrave;o nướng bơ, mật ong nh&eacute;. Vị ngon của đ&agrave;o h&ograve;a quyện với bơ, mật ong khiến bạn m&ecirc; mẩn.</p>\n\n<p>Thật đơn giản với m&oacute;n ngon n&agrave;y, chỉ cần bật l&ograve; nướng rồi cho đ&agrave;o t&aacute;ch hột c&oacute; sẵn miếng bơ c&ugrave;ng mật ong v&agrave;o nướng khoảng 20 ph&uacute;t ở nhiệt độ 180 độ C. Phần topping l&agrave;m c&ograve;n đơn giản hơn nữa: Chỉ cần trộn c&aacute;c nguy&ecirc;n liệu lại v&agrave; phết l&ecirc;n mặt tr&ecirc;n miếng đ&agrave;o vừa nướng xong. Woa, bạn sẽ tận hưởng được vị b&eacute;o của kem v&agrave; bơ, ngọt của mật ong v&agrave; hương thơm của đ&agrave;o nướng. Thật tuyệt vời l&agrave;m sao.</p>\n\n<p><a href=\"https://www.cooky.vn/cong-thuc/dao-nuong-bo-mat-ong-9552\" target=\"_blank\"><img alt=\"Tổng hợp 5 món ăn hấp dẫn được làm từ đào tươi\" src=\"https://media.cooky.vn/recipe/g1/9552/s/recipe9552-prepare-step2-635737054090264914.jpg\" /></a></p>', 2, '2017-07-23 20:50:22', '2017-07-23 20:50:37');
INSERT INTO `posts` (`id`, `user_id`, `title`, `image`, `description`, `content`, `status`, `created_at`, `updated_at`) VALUES
(11, 21, 'Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)', '/images/v0JQZVev8B8PEt1x.jpg', 'Các món ăn dân dã bình dị ở dải đất miền Trung luôn gây nghiện, trở thành đặc sản địa phương đặc trưng không nơi nào giống được', '<h2><strong>1. Gi&ograve; thủ gốc Huế</strong></h2>\n\n<p>M&oacute;n đặc sản d&acirc;n d&atilde; miền Trung đầu ti&ecirc;n m&igrave;nh muốn giới thiệu đến mọi người l&agrave; gi&ograve; thủ, m&oacute;n ăn c&oacute; vị gi&ograve;n dai sựt sựt của tai heo v&agrave; lưỡi heo. Nhưng nhất định phải thử qua 1 lần gi&ograve; thủ gốc Huế nha, si&ecirc;u si&ecirc;u ngon v&agrave; kh&ocirc;ng nơi n&agrave;o giống được hết.</p>\n\n<p>Với tỉ lệ thịt nhiều mỡ như tai, mũi, lưỡi...cắt mỏng, x&agrave;o c&ugrave;ng với mộc nhĩ, thịt nạc xay nhuyễn c&ugrave;ng da heo, tạo độ kết d&iacute;nh ho&agrave;n hảo. Tuy nhi&ecirc;n phải x&agrave;o đ&uacute;ng theo phương ph&aacute;p gia truyền của người Huế th&igrave; khi cắt ra, miếng gi&ograve; sẽ chắc như miếng chả vậy.</p>\n\n<p>Gi&ograve; thủ th&igrave; phải ăn k&egrave;m b&aacute;nh m&igrave;, hoặc với dưa muối c&agrave;ng l&agrave;m tăng th&ecirc;m m&ugrave;i vị đậm đ&agrave; m&agrave; khi ăn nhiều kh&ocirc;ng ng&aacute;n nữa chứ. C&aacute;ch bảo quản gi&ograve; thủ Huế cũng dễ lắm, với ngăn đ&ocirc;ng th&igrave; 1 th&aacute;ng c&ograve;n ngăn m&aacute;t chỉ được 3 ng&agrave;y v&igrave; to&agrave;n l&agrave;m từ nguy&ecirc;n liệu tự nhi&ecirc;n kh&ocirc;ng h&agrave;n the m&agrave;. Khi n&agrave;o muốn nh&acirc;m nhi ch&uacute;t ch&uacute;t th&igrave; lấy ra r&atilde; đ&ocirc;ng l&agrave; được rồi.</p>\n\n<p><img alt=\"Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)\" src=\"https://media.cooky.vn/images/blog-2016/nhanh-tay-dat-ngay-10-mon-dac-san-mien-trung-giam-den-30-chi-trong-1-tuan-duy-nhat-24-30-7-1.jpg\" /></p>\n\n<p>Nếu muốn nếm thử hương vị đậm đ&agrave; của gi&ograve; thủ gốc Huế n&agrave;y th&igrave; h&atilde;y nhanh tay order ở&nbsp;<strong>Đặc sản Xanh</strong>&nbsp;- Shop n&agrave;y kh&ocirc;ng những bu&ocirc;n b&aacute;n gi&ograve; thủ gốc Huế m&agrave; c&ograve;n xuất xứ đa dạng từ Đ&agrave; Nẵng, Nha Trang, Phan Thiết, Đ&agrave; Lạt đến Ph&uacute; Quốc lu&ocirc;n.</p>\n\n<p><em>Order đặc sản tại đ&acirc;y n&egrave;&nbsp;</em>&nbsp;<strong><em><a href=\"https://www.foody.vn/ho-chi-minh/dac-san-xanh-dac-san-ba-mien/goi-mon?utm_source=cooky.vn&amp;utm_medium=cookyblog&amp;utm_campaign=Now302430\" target=\"_blank\">https://www.foody.vn/ho-chi-minh/dac-san-xanh-dac-san-ba-mien/goi-mon</a></em></strong><br />\n<em><strong>Nhớ nhập m&atilde; COOKY30 để ưu đ&atilde;i th&ecirc;m 30% bạn nh&eacute;!</strong></em></p>\n\n<h2><strong>2. Chả b&ograve; Đ&agrave; Nẵng</strong></h2>\n\n<p>Ở&nbsp;<strong>Đặc sản Xanh</strong>&nbsp;c&ograve;n c&oacute; chả b&ograve; Đ&agrave; Nẵng ngon bất hủ nữa, chả l&agrave;m từ thịt b&ograve; tươi ngon theo phương ph&aacute;p truyền thống của người Đ&agrave; Nẵng. Người Đ&agrave; Nẵng xa qu&ecirc; đi đ&acirc;u cũng rất nhớ m&ugrave;i thơm của chả b&ograve;, vị ngọt đậm đ&agrave;, gi&ograve;n v&agrave; dai. Cho d&ugrave; với c&ocirc;ng thức sẵn c&oacute;, nhiều người nơi kh&aacute;c l&agrave;m theo nhưng lại kh&ocirc;ng đ&uacute;ng điệu, n&ecirc;n th&agrave;nh ra người Đ&agrave; Nẵng chỉ th&iacute;ch mỗi chả b&ograve; nơi qu&ecirc; nh&agrave; m&igrave;nh th&ocirc;i.</p>\n\n<p>Chả b&ograve; Đ&agrave; Nẵng l&agrave;m từ những thớ thịt b&ograve; tươi, đ&atilde; lọc hết g&acirc;n v&agrave; xương h&ograve;a c&ugrave;ng với gia vị được bao bọc trong l&aacute; chuối tươi m&agrave;u xanh thẫm. Khi ăn chỉ cần gỡ bỏ lớp b&ecirc;n ngo&agrave;i th&igrave; đ&atilde; xuất hiện m&agrave;u hồng đỏ quyến rũ của chả b&ograve;.</p>\n\n<p><img alt=\"Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)\" src=\"https://media.cooky.vn/images/blog-2016/nhanh-tay-dat-ngay-10-mon-dac-san-mien-trung-giam-den-30-chi-trong-1-tuan-duy-nhat-24-30-7-2.png\" /></p>\n\n<p><em>Chả b&ograve; Đ&agrave; Nẵng, ăn một lần l&agrave; nhớ m&atilde;i.</em></p>\n\n<p>Chả c&oacute; vị ngon ngọt kh&ocirc;ng b&eacute;o, ăn với lại dưa chua, nem hay ăn k&egrave;m b&aacute;nh m&igrave; g&igrave; cũng &ldquo;số z&aacute;ch&rdquo; lu&ocirc;n. Chưa hết nha, chả b&ograve; Đ&agrave; Nẵng m&agrave; nh&acirc;m nhi với rượu bia c&ugrave;ng chiến hữu v&agrave;o cuối tuần th&igrave; c&ograve;n g&igrave; bằng nữa đ&uacute;ng kh&ocirc;ng?</p>\n\n<p>D&ugrave; bạn ở S&agrave;i G&ograve;n hay H&agrave; Nội, bạn kh&ocirc;ng cần phải đặt ch&acirc;n đến Đ&agrave; Nẵng để thưởng thức chả b&ograve; nữa m&agrave; đ&atilde; c&oacute;&nbsp;<strong>Đặc sản Xanh</strong>&nbsp;giao h&agrave;ng tận nơi cho bạn lu&ocirc;n rồi! Đặc biệt với đơn h&agrave;ng tr&ecirc;n 500k sẽ được freeship trong nội th&agrave;nh S&agrave;i G&ograve;n n&egrave;.</p>\n\n<p><em>Order đặc sản tại đ&acirc;y n&egrave;&nbsp;<strong><a href=\"https://www.foody.vn/ho-chi-minh/dac-san-xanh-dac-san-ba-mien/goi-mon?utm_source=cooky.vn&amp;utm_medium=cookyblog&amp;utm_campaign=Now302430\" target=\"_blank\">https://www.foody.vn/ho-chi-minh/dac-san-xanh-dac-san-ba-mien/goi-mon</a></strong></em><br />\n<em><strong>Nhớ nhập m&atilde; COOKY30 để ưu đ&atilde;i th&ecirc;m 30% bạn nh&eacute;!</strong></em></p>\n\n<h2><strong>3. B&aacute;nh Phu Th&ecirc; - Huế</strong></h2>\n\n<p>Bạn c&oacute; nhớ mỗi lần trong đ&aacute;m cưới đều xuất hiện một loại b&aacute;nh h&igrave;nh vu&ocirc;ng m&agrave;u xanh kh&ocirc;ng? Đ&oacute; l&agrave; b&aacute;nh phu th&ecirc;, c&ograve;n được gọi l&agrave; su s&ecirc;, tuy b&aacute;nh phu th&ecirc; c&oacute; ở nhiều nơi nhưng chỉ ri&ecirc;ng ở Huế m&oacute;n n&agrave;y lại mang hương vị rất ri&ecirc;ng của m&igrave;nh.</p>\n\n<p>Vị thơm ngọt của đậu xanh, dai gi&ograve;n của bột lọc, sần sật của sợi dừa cộng với hương bưởi nồng n&agrave;n ch&iacute;nh l&agrave; n&eacute;t đặc trưng của b&aacute;nh phu th&ecirc; nổi tiếng ở Huế. Tuy nhi&ecirc;n để ra được th&agrave;nh phẩm nổi tiếng đến vậy th&igrave; người l&agrave;m b&aacute;nh phải trải qua nhiều c&ocirc;ng đoạn, từ ng&acirc;m gạo cho đến việc xay th&agrave;nh bột, rồi th&ecirc;m nước hoa bưởi cho nồng n&agrave;n.</p>\n\n<p>Ở Hu&ecirc;́, một trăm lẻ năm chiếc b&aacute;nh phu th&ecirc; như lời cầu mong trăm năm hạnh ph&uacute;c l&agrave; lễ vật kh&ocirc;ng thể thiếu được trong phong tục cưới hỏi của người d&acirc;n xứ Huế.</p>\n\n<p><img alt=\"Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)\" src=\"https://media.cooky.vn/images/blog-2016/nhanh-tay-dat-ngay-10-mon-dac-san-mien-trung-giam-den-30-chi-trong-1-tuan-duy-nhat-24-30-7-4.jpg\" /></p>\n\n<p><em><strong>Đặc sản xứ Huế</strong>, kh&ocirc;ng cần về xứ Huế vẫn ăn được b&aacute;nh phu th&ecirc; Huế.</em></p>\n\n<p>Giờ đ&acirc;y muốn nếm thử một lần hương vị b&aacute;nh phu th&ecirc; của ri&ecirc;ng Huế th&igrave; đến ngay với&nbsp;<strong>Đặc sản xứ Huế</strong>&nbsp;bạn nh&eacute;! Nh&acirc;n dịp giảm gi&aacute; lớn đến vậy th&igrave; ngại g&igrave; kh&ocirc;ng order.</p>\n\n<p><em>Order đặc sản tại đ&acirc;y n&egrave;</em>&nbsp;<em><strong><a href=\"https://www.foody.vn/ho-chi-minh/banh-phu-the-la-dua-dac-san-xu-hue/goi-mon?utm_source=cooky.vn&amp;utm_medium=cookyblog&amp;utm_campaign=Now302430\" target=\"_blank\">https://www.foody.vn/ho-chi-minh/banh-phu-the-la-dua-dac-san-xu-hue/goi-mon</a></strong></em><br />\n<em><strong>Nhớ nhập m&atilde; COOKY30 để ưu đ&atilde;i th&ecirc;m 30% bạn nh&eacute;!</strong></em></p>\n\n<h2><strong>4. Mắm c&aacute; cơm thu d&igrave; Cẩn - Đ&agrave; Nẵng</strong></h2>\n\n<p>Đ&agrave; Nẵng l&agrave; nơi chứa đựng cả ng&agrave;n m&oacute;n đặc sản kh&ocirc;ng nơi n&agrave;o c&oacute; được, đ&atilde; nếm thử một lần th&igrave; kh&ocirc;ng bao giờ qu&ecirc;n được m&ugrave;i vị đ&oacute;, m&ugrave;i vị của mắm c&aacute; v&agrave; hơn hết l&agrave; mắm c&aacute; cơm thu của D&igrave; Cẩn - một thương hiệu si&ecirc;u si&ecirc;u nổi tiếng của Đ&agrave; Nẵng, m&agrave; ngay cả người Đ&agrave; Nẵng vẫn lu&ocirc;n y&ecirc;u th&iacute;ch n&oacute;.</p>\n\n<p>Loại đặc sản tuy b&igrave;nh d&acirc;n, nhưng để đạt được độ đậm đ&agrave; th&igrave; phải cần đến những b&iacute; quyết trong kh&acirc;u chế biến. Vậy v&igrave; sao mắm c&aacute; cơm thu D&igrave; Cẩn lại ngon đến vậy? Mắm của D&igrave; Cẩn được đ&aacute;nh gi&aacute; ngon hay kh&ocirc;ng nằm ở m&ugrave;i vị v&agrave; hương thơm bay ra từ hũ mắm, m&ugrave;i c&agrave;ng thơm chứng tỏ mắm c&agrave;ng ngon.</p>\n\n<p><img alt=\"Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)\" src=\"https://media.cooky.vn/images/blog-2016/nhanh-tay-dat-ngay-10-mon-dac-san-mien-trung-giam-den-30-chi-trong-1-tuan-duy-nhat-24-30-7-3.png\" /></p>\n\n<p><em>M&ugrave;i thơm của mắm c&aacute; cơm thu D&igrave; Cẩn đ&atilde; l&agrave;m quyến rũ kh&ocirc;ng biết bao người, n&ecirc;n cho d&ugrave; đi xa vẫn sẽ lưu luyến.</em></p>\n\n<p>Mắm c&aacute; cơm thu dầm th&ecirc;m miếng ớt, &iacute;t tỏi, &iacute;t chanh l&agrave; ngon đ&uacute;ng vị. Rau sống cuống b&aacute;nh tr&aacute;ng với thịt luộc hay c&aacute; l&oacute;c rồi chấm mắm c&aacute; cơm ăn đ&atilde; g&igrave; đ&acirc;u. C&oacute; khi ăn mắm c&aacute; cơm D&igrave; Cẩn với ch&eacute;n cơm trắng, v&agrave;i dĩa rau luộc th&ocirc;i cũng thấy ngon miệng rồi. Nhắc đến mắm của D&igrave; Cẩn th&ocirc;i l&agrave; đ&atilde; m&ecirc; mẩn rồi.</p>\n\n<p>Kh&ocirc;ng chỉ c&oacute; mắm c&aacute; cơm thu của D&igrave; Cẩn m&agrave;&nbsp;<strong>Đặc Sản Mắm Việt Nam</strong>&nbsp;c&ograve;n c&oacute; mắm n&ecirc;m, mắm dưa, mắm ruốc, mắm t&ocirc;m chua của D&igrave; Cẩn nữa n&ecirc;n rất tiện cho bạn n&agrave;o m&ecirc; mắm của D&igrave; Cẩn. Nhanh tay order liền để c&oacute; ngay hũ mắm c&aacute; cơm thu D&igrave; Cẩn ăn đỡ th&egrave;m!</p>\n\n<p><em>Order đặc sản tại đ&acirc;y n&egrave;<strong>&nbsp;<a href=\"https://www.foody.vn/ho-chi-minh/dac-san-mam-viet-nam/goi-mon?utm_source=cooky.vn&amp;utm_medium=cookyblog&amp;utm_campaign=Now302430\" target=\"_blank\">https://www.foody.vn/ho-chi-minh/dac-san-mam-viet-nam/goi-mon</a></strong></em><br />\n<em><strong>Nhớ nhập m&atilde; COOKY30 để ưu đ&atilde;i th&ecirc;m 30% bạn nh&eacute;!</strong></em></p>\n\n<h2><strong>5. Tr&eacute; B&agrave; Đệ - Đ&agrave; Nẵng</strong></h2>\n\n<p>Tr&eacute; B&agrave; Đệ l&agrave; một loại tr&eacute; rất nổi tiếng ở Đ&agrave; Nẵng từ nhiều thập ni&ecirc;n nay, bởi hương vị ri&ecirc;ng, hương vị đặc trưng kh&ocirc;ng nơi n&agrave;o s&aacute;nh được của B&agrave; Đệ. Nếu như kh&ocirc;ng biết c&aacute;ch ăn tr&eacute; th&igrave; sẽ kh&ocirc;ng cảm nhận được hương vị thơm ngon của tr&eacute; đ&acirc;u.</p>\n\n<p>Được l&agrave;m từ thịt nạc, thịt ba chỉ v&agrave; b&igrave; cắt nhỏ (đ&atilde; được luộc ch&iacute;n) trộn đều với tỏi, m&egrave;, riềng v&agrave; nhiều loại gia vị kh&aacute;c. Chỉ cần ủ ch&iacute;n tr&eacute; trong l&aacute; ổi v&agrave; g&oacute;i chặt trong l&aacute; chuối một ng&agrave;y th&ocirc;i l&agrave; đ&atilde; c&oacute; thể lấy ra nh&acirc;m nhi rồi.</p>\n\n<p>B&oacute;c từng lớp vỏ chuối rồi đặt từng chiếc tr&eacute; B&agrave; Đệ để ở giữa, sau đ&oacute; cho một &iacute;t đồ chua như đu đủ, c&agrave; rốt th&aacute;i sợi&hellip; v&agrave;o trong đĩa. Xếp xen kẽ nem, chả, tương ớt, tỏi lột vỏ, đậu phộng rang v&agrave; rau h&uacute;ng xung quanh miệng đĩa. Cắm th&ecirc;m một quả ớt ch&iacute;n đỏ v&agrave; một củ h&agrave;nh t&acirc;y đ&atilde; tỉa để đĩa b&aacute;nh trở n&ecirc;n hấp dẫn hơn.</p>\n\n<p><img alt=\"Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)\" src=\"https://media.cooky.vn/images/blog-2016/nhanh-tay-dat-ngay-10-mon-dac-san-mien-trung-giam-den-30-chi-trong-1-tuan-duy-nhat-24-30-7-5.png\" /></p>\n\n<p>Tr&eacute; B&agrave; Đệ c&ograve;n c&oacute; một b&iacute; quyết để ăn ngon hơn, bạn muốn biết l&agrave; g&igrave; kh&ocirc;ng? H&atilde;y order ngay m&oacute;n tr&eacute; B&agrave; Đệ để được qu&aacute;n&nbsp;<strong>Chả B&ograve; Đ&agrave; Nẵng</strong>&nbsp;bật m&iacute;! M&agrave; nhớ bảo quản tr&eacute; B&agrave; Đệ trong ngăn m&aacute;t tủ lạnh v&agrave; sử dụng trong v&ograve;ng 15 ng&agrave;y nha.</p>\n\n<p><em>Order đặc sản tại đ&acirc;y n&egrave;&nbsp;<strong><a href=\"https://www.foody.vn/ho-chi-minh/cha-bo-da-nang-dac-san-cha-bo-co-hue/goi-mon?utm_source=cooky.vn&amp;utm_medium=cookyblog&amp;utm_campaign=Now302430\" target=\"_blank\">https://www.foody.vn/ho-chi-minh/cha-bo-da-nang-dac-san-cha-bo-co-hue/goi-mon</a></strong></em><br />\n<em><strong>Nhớ nhập m&atilde; COOKY30 để ưu đ&atilde;i th&ecirc;m 30% bạn nh&eacute;!</strong></em></p>\n\n<h2><strong>6. B&aacute;nh dừa nướng Quảng Nam</strong></h2>\n\n<p>Bắt đầu chuyển qua đặc sản của Quảng Nam, kh&ocirc;ng biết bạn đ&atilde; từng được nghe b&aacute;nh dừa nướng Quảng Nam hay chưa, nhưng khi đ&atilde; nghe rồi th&igrave; phải thử một lần trong đời m&ugrave;i vị b&aacute;nh dừa nướng n&agrave;y.</p>\n\n<p>Với hai nguy&ecirc;n liệu ch&iacute;nh l&agrave; gạo nếp hương v&agrave; dừa b&aacute;nh tẻ nạo, tuyệt đối kh&ocirc;ng sử dụng h&oacute;a chất đ&atilde; tạo th&agrave;nh một loại b&aacute;nh thơm ngon. C&aacute;i ngậy beo b&eacute;o của dừa b&aacute;nh tẻ nạo, c&aacute;i ngọt vừa phải của đường k&iacute;nh c&ugrave;ng m&egrave; h&ograve;a quyện với gạo nếp thơm, ăn ho&agrave;i m&agrave; kh&ocirc;ng biết ch&aacute;n.&nbsp;B&aacute;nh dừa nướng vừa thơm vừa gi&ograve;n, vừa b&eacute;o mang hương vị xứ Quảng miền Trung.</p>\n\n<p><img alt=\"Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)\" src=\"https://media.cooky.vn/images/blog-2016/nhanh-tay-dat-ngay-10-mon-dac-san-mien-trung-giam-den-30-chi-trong-1-tuan-duy-nhat-24-30-7-7.jpg\" /></p>\n\n<p><em>&nbsp;Nh&acirc;m nhi miếng b&aacute;nh dừa c&ugrave;ng ch&eacute;n nước tr&agrave; th&igrave; lại c&agrave;ng th&ecirc;m ngon.</em></p>\n\n<p>B&aacute;nh dừa nướng Quảng Nam phải mua ở&nbsp;<strong>Đặc sản Quảng Nam</strong>, mua ở nơi người Quảng xứ m&igrave;nh b&aacute;n bao giờ cũng sẽ an t&acirc;m hơn v&agrave; cũng đỡ nhớ chất dừa quen thuộc cho d&ugrave; ở bất k&igrave; đ&acirc;u.</p>\n\n<p><em>Order đặc sản tại đ&acirc;y n&egrave;<strong>&nbsp;<a href=\"https://www.foody.vn/ho-chi-minh/dac-san-banh-dua-nuong-quan-12/goi-mon?utm_source=cooky.vn&amp;utm_medium=cookyblog&amp;utm_campaign=Now302430\" target=\"_blank\">https://www.foody.vn/ho-chi-minh/dac-san-banh-dua-nuong-quan-12/goi-mon</a></strong></em><br />\n<em><strong>Nhớ nhập m&atilde; COOKY30 để ưu đ&atilde;i th&ecirc;m 30% bạn nh&eacute;!</strong></em></p>\n\n<h2><strong>7. C&aacute; bống s&ocirc;ng Tr&agrave; - Quảng Ng&atilde;i</strong></h2>\n\n<p>M&oacute;n đặc sản tiếp theo m&igrave;nh muốn giới thiệu nữa l&agrave; c&aacute; bống s&ocirc;ng Tr&agrave;, một đặc sản ri&ecirc;ng biệt của xứ Quảng - Quảng Ng&atilde;i. C&aacute; bống s&ocirc;ng Tr&agrave; được xếp hạng v&agrave;o danh s&aacute;ch 50 m&oacute;n ăn đặc sản v&ugrave;ng miền ngon nhất Việt Nam.</p>\n\n<p>C&aacute; bống s&ocirc;ng Tr&agrave; l&agrave; một sự h&ograve;a quyện tuyệt vời bởi c&aacute; bống bắt từ s&ocirc;ng Tr&agrave; Kh&uacute;c, nước mắm, đường trắng Quảng Ng&atilde;i, tỏi L&yacute; Sơn, ti&ecirc;u rừng Ba Tơ vừa thơm vừa cay. Nhưng mọi hương vị của c&aacute; bống s&ocirc;ng Tr&agrave; lại kh&ocirc;ng giống bất k&igrave; nơi n&agrave;o, bởi hương vị vừa đủ của m&oacute;n n&agrave;y.</p>\n\n<p><img alt=\"Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)\" src=\"https://media.cooky.vn/images/blog-2016/nhanh-tay-dat-ngay-10-mon-dac-san-mien-trung-giam-den-30-chi-trong-1-tuan-duy-nhat-24-30-7-8.jpg\" /></p>\n\n<p><em>&nbsp;Gia vị vừa đủ cay, vừa đủ thơm, thậm ch&iacute; người kh&ocirc;ng quen ăn cay vẫn c&oacute; thể cảm nhận được vị ngon tuyệt vời của c&aacute; bống s&ocirc;ng Tr&agrave;.</em></p>\n\n<p>C&aacute; bống s&ocirc;ng Tr&agrave; m&agrave; ăn với cơm trắng th&igrave; c&agrave;ng tuyệt, ăn từ từ th&igrave; mới c&oacute; thể thấm hết được độ ngon của c&aacute; bống. C&aacute; bống được kho vừa đủ cứng, nhưng kh&ocirc;ng cứng qu&aacute; như c&aacute; kh&ocirc;, cũng kh&ocirc;ng dai m&agrave; mềm v&agrave; b&ugrave;i. Ch&iacute;nh v&igrave; lẽ đ&oacute; m&agrave; tại S&agrave;i G&ograve;n nhiều người y&ecirc;u th&iacute;ch m&oacute;n c&oacute; bống kho sẵn n&agrave;y.</p>\n\n<p>Hiện nay c&aacute; bống s&ocirc;ng Tr&agrave; được kho sẵn đựng trong hũ nhựa kh&ocirc;ng d&ugrave;ng chất bảo quản, tiện lợi cho d&acirc;n văn ph&ograve;ng mang theo ăn trưa đ&oacute;. Đến ngay với&nbsp;<strong>Thực phẩm miền Trung</strong>&nbsp;để thưởng thức m&oacute;n c&aacute; bống s&ocirc;ng Tr&agrave; nổi tiếng n&agrave;y nha!</p>\n\n<p><em>Order đặc sản tại đ&acirc;y n&egrave;<strong>&nbsp;<a href=\"https://www.foody.vn/ho-chi-minh/thuc-pham-mien-trung-banh-keo-nem-cha/goi-mon?utm_source=cooky.vn&amp;utm_medium=cookyblog&amp;utm_campaign=Now302430\" target=\"_blank\">https://www.foody.vn/ho-chi-minh/thuc-pham-mien-trung-banh-keo-nem-cha/goi-mon</a></strong></em></p>\n\n<p><em><strong>Nhớ nhập m&atilde; COOKY30 để ưu đ&atilde;i th&ecirc;m 30% bạn nh&eacute;!</strong></em></p>\n\n<h2><strong>8. Nem Chợ Huyện - B&igrave;nh Định</strong></h2>\n\n<p>Nếu đ&atilde; từng đến B&igrave;nh Định m&agrave; chưa từng thử nem Chợ Huyện th&igrave; quả l&agrave; thiếu s&oacute;t lớn của bạn đ&oacute;, nem của Chợ Huyện đủ vị mặn ngọt dai, b&eacute;o v&agrave; gi&ograve;n tạo n&ecirc;n n&eacute;t đặc trưng ri&ecirc;ng biệt của ẩm thực B&igrave;nh Định.</p>\n\n<p>Nem Chợ Huyện được l&agrave;m từ thịt heo cỏ c&oacute; nhiều nạc tươi ngon, được lọc sạch mỡ v&agrave; lớp nhầy rồi cho v&agrave;o cối quết nhuyễn. Nem để ch&iacute;n m&agrave; c&oacute; độ chua ngọt, dai gi&ograve;n th&igrave; sau khi xay thịt phải ủ th&ecirc;m một ng&agrave;y để thấm gia vị rồi mới g&oacute;i l&aacute; ổi. Với b&iacute; quyết đặc trưng chỉ c&oacute; ở nem Chợ Huyện m&agrave; th&agrave;nh phẩm l&agrave;m ra khiến người ta lưu luyến kh&ocirc;ng th&ocirc;i.</p>\n\n<p><img alt=\"Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)\" src=\"https://media.cooky.vn/images/blog-2016/nhanh-tay-dat-ngay-10-mon-dac-san-mien-trung-giam-den-30-chi-trong-1-tuan-duy-nhat-24-30-7-9(1).jpg\" /></p>\n\n<p><em>Nem Chợ Huyện ăn k&egrave;m với tỏi sống nh&acirc;m nhi với rượu Bầu Đ&aacute;, hoặc bia l&agrave; kh&ocirc;ng c&ograve;n g&igrave; bằng.</em></p>\n\n<p>Nếu chưa từng nếm thử th&igrave; đến với&nbsp;<strong>Đặc Sản B&igrave;nh Định</strong>&nbsp;nha, kh&ocirc;ng chỉ c&oacute; nem Chợ Huyện m&agrave; c&ograve;n c&oacute; chả c&aacute; đặc biệt, chả b&ograve;, chả lụa, chả thủ, nem chua cay, tr&eacute; B&igrave;nh Định nữa.</p>\n\n<p><em>Order đặc sản tại đ&acirc;y n&egrave;</em>&nbsp;<em><strong><a href=\"https://www.foody.vn/ho-chi-minh/dac-san-binh-dinh/goi-mon?utm_source=cooky.vn&amp;utm_medium=cookyblog&amp;utm_campaign=Now302430\" target=\"_blank\">https://www.foody.vn/ho-chi-minh/dac-san-binh-dinh/goi-mon</a>&nbsp;</strong></em>(giao h&agrave;ng sau 17h chiều)<br />\n<em><strong>Nhớ nhập m&atilde; COOKY30 để ưu đ&atilde;i th&ecirc;m 30% bạn nh&eacute;!</strong></em></p>\n\n<h2><strong>9. B&ograve; một nắng hai sương Ph&uacute; Y&ecirc;n</strong></h2>\n\n<p>B&ograve; một nắng hai sương Ph&uacute; Y&ecirc;n kh&ocirc;ng phải được l&agrave;m từ loại b&ograve; cao sang như b&ograve; Nhật Bản hay b&ograve; &Uacute;c m&agrave; đ&oacute; l&agrave; thịt b&ograve; từ v&ugrave;ng n&uacute;i Sơn H&ograve;a, b&ograve; được chăn thả rong tr&ecirc;n đồng cỏ tự nhi&ecirc;n n&ecirc;n thịt b&ograve; ở đ&acirc;y thơm ngon v&agrave; săn chắc. Bạn c&oacute; thắc mắc tại sao gọi l&agrave; b&ograve; một nắng hai sương kh&ocirc;ng? Kh&ocirc;ng phải đem ra phơi 1 nắng 2 sương m&agrave; bởi v&igrave; quy tr&igrave;nh l&agrave;m ra m&oacute;n đặc sản n&agrave;y đ&ograve;i hỏi sự c&ocirc;ng phu, tỉ mỉ c&ugrave;ng sự khổ cực.</p>\n\n<p>Kh&ocirc;ng những được lấy từ phần thịt b&ograve; chất lượng v&agrave; ngon nhất l&agrave; thịt thăn v&agrave; thịt đ&ugrave;i m&agrave; việc tẩm ướp gia vị cũng c&oacute; b&iacute; quyết ri&ecirc;ng - gia vị được pha chế theo phương thức gia truyền của người d&acirc;n địa phương. Đem đi phơi rồi cho v&agrave;o l&ograve; sấy, nhớ trở li&ecirc;n tục mỗi giờ trong thời gian 12 giờ, sau đ&oacute; đem phơi sương v&agrave; đem đi đ&oacute;ng g&oacute;i, mọi c&ocirc;ng đoạn đều l&agrave; thủ c&ocirc;ng.</p>\n\n<p>B&ograve; một nắng hai sương Ph&uacute; Y&ecirc;n khi ăn th&igrave; phải đem nướng tr&ecirc;n lửa than hoặc c&aacute;c thiết bị nướng kh&aacute;c đều được nhưng phải trở thịt cho đều tay để thịt ch&iacute;n đều. Sau đ&oacute; d&ugrave;ng ch&agrave;y đập nhẹ cho miếng b&ograve; mềm, x&eacute; th&agrave;nh từng miếng nhỏ, chấm với muối kiến v&agrave;ng tạo ra một vị ngon rất ngon.</p>\n\n<p><img alt=\"Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)\" src=\"https://media.cooky.vn/images/blog-2016/nhanh-tay-dat-ngay-10-mon-dac-san-mien-trung-giam-den-30-chi-trong-1-tuan-duy-nhat-24-30-7-10.jpg\" /></p>\n\n<p>Nếu muốn t&igrave;m mua đặc sản b&ograve; một nắng hai sương Ph&uacute; Y&ecirc;n để l&agrave;m qu&agrave;, hay tiệc t&ugrave;ng đồ nướng tại gia th&igrave; h&atilde;y nghĩ ngay đến&nbsp;<strong>Đặc Sản Việt</strong>&nbsp;c&oacute; gi&aacute; cả tốt nhất. Mua b&ograve; một nắng Ph&uacute; Y&ecirc;n ở đ&acirc;y được k&egrave;m theo muối kiến v&agrave;ng ăn c&ugrave;ng nữa đ&oacute;!</p>\n\n<p><em>Order đặc sản tại đ&acirc;y n&egrave;&nbsp;<strong><a href=\"https://www.foody.vn/ho-chi-minh/dac-san-viet-quan-8/goi-mon?utm_source=cooky.vn&amp;utm_medium=cookyblog&amp;utm_campaign=Now302430\" target=\"_blank\">https://www.foody.vn/ho-chi-minh/dac-san-viet-quan-8/goi-mon</a></strong></em><br />\n<em><strong>Nhớ nhập m&atilde; COOKY30 để ưu đ&atilde;i th&ecirc;m 30% bạn nh&eacute;!</strong></em></p>\n\n<h2><strong>10. Ghẹ sữa sấy Phan Thiết - B&igrave;nh Thuận</strong></h2>\n\n<p>Ở<strong>&nbsp;Đặc sản Việt</strong>&nbsp;c&ograve;n c&oacute; nhiều m&oacute;n đặc sản kh&aacute;c nhưng m&oacute;n cuối m&igrave;nh muốn giới thiệu l&agrave; ghẹ sữa sấy Phan Thiết. Một loại đặc sản đến từ v&ugrave;ng biển Phan Thiết, mang hương vị mặn biển tự nhi&ecirc;n, gi&ograve;n tan trong miệng.</p>\n\n<p>Những con ghẹ sữa nhỏ nhỏ được đ&aacute;nh bắt ngay tại biển, c&oacute; k&iacute;ch cỡ khoảng &frac14; ghẹ th&ocirc;ng thường, chế biến theo b&iacute; quyết đặc biệt của người d&acirc;n Phan Thiết. Bạn thử tưởng tượng xem, nhấm nh&aacute;p con ghẹ sữa vẫn được giữ nguy&ecirc;n hương vị ngọt, mặn đặc trưng của ghẹ biển Phan Thiết c&ugrave;ng với sự đậm đ&agrave; của tỏi, ớt, đường k&egrave;m theo th&igrave; rất tuyệt lu&ocirc;n.</p>\n\n<p>Ghẹ sữa sấy Phan Thiết kh&ocirc;ng chỉ gi&agrave;u dinh dưỡng m&agrave; c&ograve;n l&agrave; nguồn canxi tự nhi&ecirc;n bổ sung cho cơ thể nữa đ&oacute; nha, m&oacute;n n&agrave;y gia vị cũng vừa đủ, dễ tan n&ecirc;n con n&iacute;t cũng c&oacute; thể ăn.</p>\n\n<p><img alt=\"Nhanh tay đặt ngay 10 món đặc sản miền Trung giảm đến 30% chỉ trong 1 tuần duy nhất (24-30/7)\" src=\"https://media.cooky.vn/images/blog-2016/nhanh-tay-dat-ngay-10-mon-dac-san-mien-trung-giam-den-30-chi-trong-1-tuan-duy-nhat-24-30-7-11.jpg\" /></p>\n\n<p><em>Ch&iacute;nh nhờ sức h&uacute;t của m&igrave;nh m&agrave; ghẹ sữa sấy đ&atilde; được t&ocirc;n vinh l&ecirc;n tầm đặc sản, g&oacute;p v&agrave;o danh s&aacute;ch đặc sản của biển Phan Thiết m&agrave; kh&ocirc;ng đ&acirc;u c&oacute; được.</em></p>\n\n<p>Gh&eacute; ngay&nbsp;<strong>Đặc sản Việt</strong>&nbsp;về l&agrave;m đồ ăn vặt, mồi nhậu ngay liền n&egrave;!</p>', 1, '2017-07-23 20:58:26', '2017-07-23 20:58:26'),
(12, 4, 'Top 4 món bánh hot nhất trong tuần qua', '/images/dNflZbEEIMv0DIR0.jpg', 'Những món bánh siêu hot đang được chị em Phố Bánh & Dụng Cụ Làm Bánh rỉ tai nhau trong suốt tuần qua như bánh su que, bánh dẻo truyền thống, Tokbokki và bánh dứa.', '<h2><strong>B&aacute;nh su que - Huỳnh Phương Trang</strong></h2>\n\n<p><strong><img alt=\"Top 4 món bánh hot nhất trong tuần qua được chị em Phố Bánh yêu thích\" src=\"https://media.cooky.vn/images/blog-2016/sukem.jpg\" /></strong></p>\n\n<p>B&aacute;nh su que tưởng chừng dễ l&agrave;m bởi v&igrave; nguy&ecirc;n liệu đơn giản, tuy nhi&ecirc;n c&oacute; nhiều chị em vẫn thường hay thất bại bởi khi nướng l&ecirc;n kh&ocirc;ng nở đều hay trong ruột vẫn đặc chứ kh&ocirc;ng rỗng tuếch như b&iacute; phương của chị&nbsp;<strong>Huỳnh Phương Trang</strong>&nbsp;chia sẻ trong group đ&acirc;y.</p>\n\n<p><em><strong>C&ocirc;ng thức l&agrave;m vỏ, nh&acirc;n kem sữa, nh&acirc;n ph&ocirc; mai, nh&acirc;n kem trứng, nh&acirc;n socola v&agrave; nh&acirc;n tr&agrave; xanh.</strong></em></p>\n\n<p><em>(Lượng nguy&ecirc;n liệu n&agrave;y sẽ l&agrave;m được khoảng 75 SU QUE d&agrave;i 8cm)</em></p>\n\n<p><img alt=\"Top 4 món bánh hot nhất trong tuần qua được chị em Phố Bánh yêu thích\" src=\"https://media.cooky.vn/images/blog-2016/1a.png\" /></p>\n\n<p><em>Chị&nbsp;<strong>Huỳnh Phương Trang</strong>&nbsp;hướng dẫn kh&aacute; tỉ mỉ, từ&nbsp;<strong>vỏ b&aacute;nh</strong>&nbsp;cho đến l&agrave;m&nbsp;<strong>c&aacute;c loại nh&acirc;n</strong>&nbsp;lu&ocirc;n n&egrave;</em></p>\n\n<p><img alt=\"Top 4 món bánh hot nhất trong tuần qua được chị em Phố Bánh yêu thích\" src=\"https://media.cooky.vn/images/blog-2016/2c.png\" /></p>\n\n<p><em>C&aacute;ch l&agrave;m<strong>&nbsp;c&aacute;c loại nh&acirc;n&nbsp;</strong>v&agrave;&nbsp;<strong>lưu &yacute;</strong></em></p>\n\n<p><img alt=\"Top 4 món bánh hot nhất trong tuần qua được chị em Phố Bánh yêu thích\" src=\"https://media.cooky.vn/images/blog-2016/3c.png\" /></p>\n\n<h2><strong>Vỏ b&aacute;nh dẻo truyền thống - Huong Socola</strong></h2>\n\n<p><strong><img alt=\"Top 4 món bánh hot nhất trong tuần qua được chị em Phố Bánh yêu thích\" src=\"https://media.cooky.vn/images/blog-2016/banhdeo.jpg\" /></strong></p>\n\n<p>Gần đến Trung thu v&agrave; nhiều mẹ đ&atilde; đi học c&aacute;c lớp học l&agrave;m b&aacute;nh nhưng về nh&agrave; l&agrave;m vẫn c&ograve;n l&agrave;m chưa được, th&igrave; h&atilde;y tham khảo c&aacute;ch l&agrave;m vỏ b&aacute;nh dẻo truyền thống của chị<strong>&nbsp;Huong Socola</strong>&nbsp;nh&eacute;!</p>\n\n<p>C&ocirc;ng thức l&agrave;m&nbsp;<strong>vỏ b&aacute;nh dẻo truyền thống</strong></p>\n\n<p><strong><img alt=\"Top 4 món bánh hot nhất trong tuần qua được chị em Phố Bánh yêu thích\" src=\"https://media.cooky.vn/images/blog-2016/4(4).png\" /></strong></p>\n\n<h2><strong>Món Tokbokki - Thuyanh Nguyen</strong></h2>\n\n<p><img alt=\"Top 4 món bánh hot nhất trong tuần qua được chị em Phố Bánh yêu thích\" src=\"https://media.cooky.vn/images/blog-2016/tokbokki.jpg\" /></p>\n\n<p>Bạn rất th&iacute;ch m&oacute;n H&agrave;n, nhưng lại ngại mua ở ngo&agrave;i kh&ocirc;ng đảm bảo v&agrave; kh&ocirc;ng đ&uacute;ng vị của Tokbokki? H&atilde;y thử c&ocirc;ng thức&nbsp;<strong>l&agrave;m b&aacute;nh Tokbokki</strong>&nbsp;v&agrave; cả&nbsp;<strong>c&aacute;ch l&agrave;m sốt</strong>&nbsp;của chị&nbsp;<strong>Thuyanh Nguyen&nbsp;</strong>n&agrave;y.</p>\n\n<p><img alt=\"Top 4 món bánh hot nhất trong tuần qua được chị em Phố Bánh yêu thích\" src=\"https://media.cooky.vn/images/blog-2016/1122.png\" /></p>\n\n<h2><strong>B&aacute;nh dứa - Thi Giang Ha Dao</strong></h2>\n\n<p><strong><img alt=\"Top 4 món bánh hot nhất trong tuần qua được chị em Phố Bánh yêu thích\" src=\"https://media.cooky.vn/images/blog-2016/banhdua.jpg\" /></strong></p>\n\n<p>B&aacute;nh dứa vẫn l&agrave; b&aacute;nh được nhiều mẹ y&ecirc;u th&iacute;ch nhất, nhưng c&oacute; nhiều c&ocirc;ng thức hơi rắc rối dẫn đến c&aacute;c mẹ kh&ocirc;ng l&agrave;m được ngon như mong muốn th&igrave; h&atilde;y tham khảo c&ocirc;ng thức si&ecirc;u đơn giản của chị&nbsp;<strong>Thi Giang Ha Dao</strong>, vừa đẹp vừa dễ l&agrave;m nữa.</p>\n\n<p>C&ocirc;ng thức&nbsp;<strong>b&aacute;nh dứa</strong>&nbsp;của chị&nbsp;<strong>Thi Giang Ha Dao</strong></p>\n\n<p><img alt=\"Top 4 món bánh hot nhất trong tuần qua được chị em Phố Bánh yêu thích\" src=\"https://media.cooky.vn/images/blog-2016/123.png\" /></p>\n\n<p><em><strong>Cuối tuần m&agrave; l&agrave;m thử mấy m&oacute;n n&agrave;y th&igrave; tuyệt vời lắm nhỉ?</strong></em></p>', 2, '2017-07-23 21:07:31', '2017-07-23 21:08:06'),
(13, 26, 'Test', '/images/PfmeJTN9Bvo4M1YC.png', 'ádasdsa', '<p>&aacute;dasdsas</p>', 1, '2017-07-24 00:11:15', '2017-07-24 00:11:15'),
(14, 37, 'Xin chào mọi người', '/images/xbNNFecmpcaj7BVq.png', 'Ok', '<p>1234</p>', 1, '2017-07-24 00:32:12', '2017-07-24 00:32:12'),
(15, 42, 'cách luộc rau', '/images/mgbuY88Z50IbZRPt.png', 'luộc rau', '<p>c&aacute;ch luộc rau xanh</p>', 2, '2017-07-24 01:23:25', '2017-07-24 01:24:03'),
(16, 44, 'ádasds', '/images/Wyonf3qUW3A17UJn.jpg', 'ádasdasd', '<p>&aacute;dasdasdasd</p>', 1, '2017-07-25 06:29:48', '2017-07-25 06:29:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

CREATE TABLE `post_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rates`
--

CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `rate_table_id` int(10) UNSIGNED NOT NULL,
  `rate_table_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `point` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rates`
--

INSERT INTO `rates` (`id`, `user_id`, `rate_table_id`, `rate_table_type`, `created_at`, `updated_at`, `point`) VALUES
(1, 13, 1, 'cookings', '2017-07-18 18:43:26', '2017-07-18 18:43:26', 0),
(2, 11, 1, 'cookings', '2017-07-19 09:41:30', NULL, 4),
(3, 13, 1, 'cookings', '2017-07-19 09:41:56', NULL, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscrices`
--

CREATE TABLE `subscrices` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subscrices`
--

INSERT INTO `subscrices` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'duonglaiquang@gmail.com', '2017-07-24 00:01:00', '2017-07-24 00:01:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `units`
--

CREATE TABLE `units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'con', NULL, NULL),
(2, 'gram', NULL, NULL),
(3, 'cai', NULL, NULL),
(4, 'thìa cà phê', NULL, NULL),
(5, 'lit', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` int(10) UNSIGNED DEFAULT NULL,
  `status` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `avatar`, `level_id`, `status`, `remember_token`, `created_at`, `updated_at`, `facebook_id`, `google_id`) VALUES
(4, 'Văn Quyết', 'mih2t9x@gmail.com', '$2y$10$fGp6RmCyPoidXaLiO.sg/e4I8te5B4ceNlOaDdmFIkTc2e0UvKiF6', '1234567890', '/images/UXMrWjx9J6ryDJnh.jpg', NULL, 0, '2QaMYMTFgNLh5H4aiTLzUaVqtMlTlCYc26IZDKzJeQ6urHXqcncxphIQeiyh', '2017-07-03 23:15:44', '2017-07-25 06:37:32', '2271267716430909', NULL),
(11, 'tranvanmy', 'test@gmail.com', '$2y$10$aHNUKbN5.8OlElxcBx.KE.olAOWBPMivWaLXJ2n5TeQ6edsLsEr5O', '12345678', NULL, NULL, 2, 'IS5TAXKOiSjxAyEsJi18xAUDlfY8BMYodJweL8IGr2eJ4UIyrIuP1ql1oW30', NULL, '2017-07-06 23:30:49', NULL, NULL),
(13, 'Mỹ Mỹ', 'anhmynd19101995@gmail.com', '$2y$10$9Jx/xairWOcry0syRZILrOJmDZuYTMu0Q4YEgIOgIosV0n7QxQyMi', NULL, 'https://graph.facebook.com/v2.9/1781904542122736/picture?type=normal', NULL, 1, 'GZsX5SRordPXXL7Srbfm4c3PsZGottOZgGvGT5KRTHE7kZuEHUPSRjUsznkZ', '2017-07-04 02:26:27', '2017-07-07 01:27:11', '1781904542122736', NULL),
(15, 'tuan', 'tuanadmin@gmail.com', '$2y$10$8EokoaZZUc2QMABthucIzOe2TYx/HxL6MWwvr1DzMWnpTqDlexcHm', '12345678543', '/images/PKCKPhi6L3vbCIuC.jpg', NULL, 1, NULL, NULL, '2017-07-11 20:08:15', NULL, NULL),
(16, 'Tuan Nguyen Duc Anh', 'ducanh30@yahoo.com', NULL, NULL, 'https://graph.facebook.com/v2.9/1567313713332699/picture?type=normal', NULL, 1, 'GOnTuJLaGU19VTKjVbyPalOotue1Rfiw0BgUMOZRlck1oLEIgAQ6CsOb9fLa', '2017-07-12 19:20:39', '2017-07-12 19:20:39', '1567313713332699', NULL),
(17, 'tuancho', 'tuancho@gmail.com', '$2y$10$77Wk9NcUEcVgIZfj15p2lu3LRKPS7tR2gkq8OjkqSMC1kmMHUvZXS', '1234567890', '/images/user.png', 1, 1, 'MLpyukdlf06csHecCkYf5k51SYaxx3gfYTFTSpzCBWjlTHEwN0dsBrmp4lHj', '2017-07-17 19:12:48', '2017-07-17 19:12:48', NULL, NULL),
(18, 'tuan', 'tuan.nguyenducanh@gmail.com', '$2y$10$/t994Bk0OnQ0qSMFWjfk2eGBV80B9AvaAu6AoVWWV3VylCCMBVCSG', '01692871868', '/images/IyftXuuH3ytxvEeg.jpg', 1, 1, 'FImRi4NR5VbTiNlUuvQaR0fNy28sOU8sli8nXWY5q5kE58KvlMIkIwkc6xYX', '2017-07-18 00:41:03', '2017-07-23 19:32:11', NULL, NULL),
(19, 'tranvanmy', 'tranvanmy@gmail.com', '$2y$10$FSacHVKdOGVJLghZySHQH.qkq6dzJWlQ4QhuneOJWzUrA0AIEhad.', '0964395169', '/images/sHx5WOmvJNQBJmao.jpg', 1, 0, 'yU0KK93yF8Vfd4oWXj3OLCc5ABbFeMZtTj7aVwQgjxgUfzSPyhqpRfJtbVr9', '2017-07-23 18:30:23', '2017-07-23 19:36:26', NULL, NULL),
(20, 'admin', 'admin@gmail.com', '$2y$10$ddsxJbmXPcbfAZIgo7GiSe9fdrSRpTX6x5bWqu2MBlxURThIDC9OO', '1234567', '/images/user.png', 1, 1, 'hJgDXAg11252lPBUabQEv8QREZQk8uiKPuW8leFdFLDvV0pFNT8HwrrN41Hx', '2017-07-23 20:21:20', '2017-07-23 20:21:20', NULL, NULL),
(21, 'Trần Thi Nhung', 'nhung@gmail.com', '$2y$10$bNlvsGTQIgMwSh0msC8qKOja4Qya/8./viRLcEYVIJCoQ8TyiBD6q', '1234567', '/images/QgTZyIq1VTPBMwCR.jpg', 1, 0, '5t6S9M0ww6OAyHPTwSPaJ34tqGhBhdHKLrHKp2KFHu6bl1D81u6UlwflRrGn', '2017-07-23 20:31:44', '2017-07-23 20:32:03', NULL, NULL),
(22, 'Ha Nguyen', 'ha@gmail.com', '$2y$10$qo1Pb6QBCs58..1hR1/4WOmKHaDiWdtQOmKNMlYbftVGIOZE.zteq', '1234567', '/images/QSeE5JptbPEdWRyq.jpg', 1, 1, 'S8kXCV73zv5AiIHHhR5bUse6DkUyjrGkxIEDCVDYH2EgdPORwcK5n9rNNAtL', '2017-07-23 21:17:46', '2017-07-23 21:18:40', NULL, NULL),
(23, 'Ngo Trung Tuan', 'tuan@gmail.com', '$2y$10$xq.ZZW7JF10t99V5S1JKKOGNts7gaty/HHc5xItzrNnF/zbWNjnnC', '1234567', '/images/Y6YzlRyBlCdGqBqD.jpg', 1, 0, '5WuQsztHhGLoGbBclfnoP6mpNq15GPl05jrDthrZ0RJh3dVwMZ1KmuaP89VX', '2017-07-23 21:32:47', '2017-07-23 21:34:56', NULL, NULL),
(24, 'Tuấn PL', 'hihi@gmail.hihi', '$2y$10$sn6itewHyPYVwHdES6rntOXADJQxwZO6XjZWntO9kA9O2GN3Nqf2W', '098548999', '/images/ztO65d7QQ8MHNCOp.jpg', 1, 0, '8tAKd2glR9D9u7OJZuv9T0vtfzcq3hTioNJ3OBx66GXkBdEWtb8e5pSSmeEU', '2017-07-23 23:27:31', '2017-07-23 23:55:53', NULL, NULL),
(25, 'StrawHat', 'dieptx.ptit@gmail.com', '$2y$10$W1v06vnrKw/wX2f1y4TWmu0QQGsDE7qerTigpp8hHih65s4a/Q2qC', '01649055345', '/images/user.png', 1, 0, NULL, '2017-07-23 23:56:00', '2017-07-23 23:56:00', NULL, NULL),
(26, 'Ha Na', 'phamhangmta94@gmail.com', '$2y$10$Qt2x0.xfuotnIGF17QjwJ.a6vtrpYnc1U8DHzWi08bsjXQ0vc9oL6', '01659694705', '/images/QQof2dcY6N5bJ3YF.png', 1, 1, 'IL6DJo4IDAknrhwJb6JIRS3QDfPWmOu0wdO4EjknzOwoSLq4HOkAcyg1HzVg', '2017-07-23 23:57:04', '2017-07-24 00:32:48', NULL, NULL),
(27, 'Trịnh Đức Toàn', 'toantd.itvn@gmail.com', '$2y$10$pP7ku4nEL9NPYcrL3kK.ue.UixRjbuID10/oL.KWcri8H6miHx1p6', NULL, 'https://graph.facebook.com/v2.9/349759375443664/picture?type=normal', NULL, 0, 'V9XFcbES6BtNJ5xaY7UqDy5VR3wJvWPe4SAwZlyHgBbTyzifZhTBkbGT7xAr', '2017-07-23 23:57:45', '2017-07-24 02:14:14', '349759375443664', NULL),
(28, 'Nguyễn Đình Đức', 'ducngu@gmail.com', '$2y$10$.3CDyA0f.wFH8m3h4CF/D.m9BSDYtiK9R1Irc/3zhSwcaTsl7u9.u', '0123456789', '/images/user.png', 1, 0, NULL, '2017-07-23 23:58:02', '2017-07-23 23:58:02', NULL, NULL),
(29, 'Duong Lai Quang', 'darkknight_0208@yahoo.com.vn', NULL, NULL, 'https://graph.facebook.com/v2.9/931717106968628/picture?type=normal', NULL, 0, '9fFDSId5FVQ6dRMcCOaeIrd6Uc8sf10H5zI7qzoQRdoz8DadTdHusUOE26Rl', '2017-07-24 00:02:03', '2017-07-24 00:02:03', '931717106968628', NULL),
(30, 'Phạm Minh Ngọc', 'ngocpham0501@gmail.com', NULL, NULL, 'https://graph.facebook.com/v2.9/957445027729339/picture?type=normal', NULL, 0, '175qL3EgKyYGdBsu2WBsn5mig2C2uOCUiihNdh9TrO69i4yq3aOQW9ZICQAn', '2017-07-24 00:04:24', '2017-07-24 00:04:24', '957445027729339', NULL),
(31, 'Vũ Văn Lâm', 'lamvuvan.hust@gmail.com', NULL, NULL, 'https://graph.facebook.com/v2.9/861352224015720/picture?type=normal', NULL, 0, 'gHTwmYkVZJnqXHkZSPejQFU519itr8nmuAUAin42uf1zQCVCm2jZcX4jd3Ft', '2017-07-24 00:07:41', '2017-07-24 00:07:41', '861352224015720', NULL),
(32, 'Đinh Tài', 'tai.dinhvan2702@gmail.com', NULL, NULL, 'https://graph.facebook.com/v2.9/1411157838991298/picture?type=normal', NULL, 0, 'SfiK8FwsfsI5J17b3QAeZBEKGNrZjhAH6Djh6E9va3ShD2NpWxTUE7GF5sYk', '2017-07-24 00:11:39', '2017-07-24 00:11:39', '1411157838991298', NULL),
(33, 'Sáng', 'tieuthihao@gmail.com', '$2y$10$n5998mnn2uwpnZiQL0WzeuZ6Fm7y9kc5VneVdDGpV2d/2SEfnh74O', '000999888777', '/images/c7GTJbeYsB4scnn7.jpg', NULL, 0, 'nvZPurG0VmD37ocFDdrLqj5tYcHmeWgopPSSZUoQL9rTRXVIZLsoB6VTE6Fw', '2017-07-24 00:14:33', '2017-07-24 00:15:04', '685503304990006', NULL),
(34, 'Nguyễn Tuân', 'loveborabora112@gmail.com', NULL, NULL, 'https://graph.facebook.com/v2.9/323697264753126/picture?type=normal', NULL, 0, 'jWeC8igRr6iVdfFQ7FqFISNZ2egu9JbPHNhupdkalfZesdvMpejy83BBAbXH', '2017-07-24 00:14:55', '2017-07-24 00:14:55', '323697264753126', NULL),
(35, 'ha duc', 'cc@gmail.com', '$2y$10$8DdENidRvyJkdUxq304PIe9lpNatYYQRYI6rEy7..MGyYNsnblfYG', '1234567890', '/images/N34x4MKJ8UwXZixS.png', 1, 0, 'D1o5t7Lyd69rEJe9QogztfY3V8CXAToLLyeEFgqn1rgKJem7B2mJ4d5tqPE8', '2017-07-24 00:22:55', '2017-07-24 00:24:59', NULL, NULL),
(36, 'cc', 'cc1@gmail.com', '$2y$10$bryaFzqlIJmCEw1XMwa6zuuKknqPSH5/y9wjje2iaJd4bRa01uJ.e', '1234567890', '/images/user.png', 1, 0, NULL, '2017-07-24 00:27:34', '2017-07-24 00:27:34', NULL, NULL),
(37, 'Hoàng Tám', 'hoangnhutam95@gmail.com', '$2y$10$VVAS7nYSk5fmEWRTchJIruk1DDlHIVdPvag0NjziYUxKwMFkwmZeW', '01686066325', '/images/gOqyNudL9VEY489Y.jpg', NULL, 0, '4EBQfUIcREOW3p9jilUVLGEleenbfOAURUeIZjM7284UStpG15bzB2wVRysD', '2017-07-24 00:29:33', '2017-07-24 00:30:02', '1239959222783078', NULL),
(38, 'Phó Đức Đạt', 'phoducdat@yahoo.com.vn', NULL, NULL, 'https://graph.facebook.com/v2.9/1095435423891452/picture?type=normal', NULL, 0, 'WByy5wO3pqyFfufeTcZneSHnrtHf9W6odZbTZQEGwwj6KnbKLHu6TVlarlWX', '2017-07-24 00:35:52', '2017-07-24 00:35:52', '1095435423891452', NULL),
(39, 'Toản Doãn', 'mr.toandoan@yahoo.com.vn', NULL, NULL, 'https://graph.facebook.com/v2.9/1447603921995867/picture?type=normal', NULL, 2, '5QNoaNktLdEDlPXhiXgrr6ezjmJoMDCjJrQl0tMPg7WKM4paVTyLvIURcgBo', '2017-07-24 00:40:28', '2017-07-24 02:14:22', '1447603921995867', NULL),
(40, 'Dieu Linh Tran', NULL, '$2y$10$SaWdFcwaD40wz0JGE4vLg.9kvK0pxKnaJCwpNrxUwuIk6EjrIvrUy', NULL, 'https://graph.facebook.com/v2.9/1413251245407303/picture?type=normal', NULL, 0, 'BZhdXijrswOZRtyDeNwcqNgqwU2UjIR516RfL4nuCwLCsebOCahHpvMgAkyN', '2017-07-24 00:51:58', '2017-07-24 00:53:00', '1413251245407303', NULL),
(41, 'Vũ Xuân Trường', 'vutruong_95_nd@yahoo.com.vn', NULL, NULL, 'https://graph.facebook.com/v2.9/1026948084075247/picture?type=normal', NULL, 0, 'sa6dhXqhJYU8Xj6RF59hm30KgMxnHQ09deBzE2tL2hTfMDuJJNw7ErVtdN1T', '2017-07-24 00:59:45', '2017-07-24 00:59:45', '1026948084075247', NULL),
(42, 'tran my', 'my@gmail.com', '$2y$10$m.u7LLrjHcq5azK7MbC1CeyEIEvk8okvVfUpn8SDtnkXBFHa4h/Wi', '12345678', '/images/user.png', 1, 0, NULL, '2017-07-24 01:15:26', '2017-07-24 01:15:26', NULL, NULL),
(43, 'Đức Nguyễn', NULL, NULL, NULL, 'https://graph.facebook.com/v2.9/1180283318784273/picture?type=normal', NULL, 0, 'Bg5NMCEHF0rnnmaLi5vFOectkloOycV20seNirAbcepcLzr68LKTxJADVmWa', '2017-07-24 04:24:21', '2017-07-24 04:24:21', '1180283318784273', NULL),
(44, 'Vũ Nguyễn', NULL, NULL, NULL, 'https://graph.facebook.com/v2.9/939936446159208/picture?type=normal', NULL, 0, 'Z3XiIUp0Dv3fad5smPLpuW2jwEPfSoEV3ZOS09YrWsogqnJ4w5uugy2bnBMR', '2017-07-25 06:29:05', '2017-07-25 06:29:05', '939936446159208', NULL),
(45, 'Minh Nguyen', 'namtuocken@gmail.com', NULL, NULL, 'https://graph.facebook.com/v2.9/2050927038468674/picture?type=normal', NULL, 0, 'SiqFQ0vkhzM088c5mQhyMRcD8FEZQ60RupraoC3KS8isZ5xrxJpgHFYb2BuM', '2017-08-09 02:31:27', '2017-08-09 02:31:27', '2050927038468674', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlish`
--

CREATE TABLE `wishlish` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cooking_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlish`
--

INSERT INTO `wishlish` (`id`, `user_id`, `cooking_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 18, 16, 1, '2017-07-23 10:38:24', '2017-07-23 10:38:24'),
(2, 19, 17, 1, '2017-07-23 19:05:24', '2017-07-23 19:05:24'),
(4, 24, 19, 1, '2017-07-23 23:48:17', '2017-07-23 23:48:17'),
(7, 25, 21, 1, '2017-07-23 23:58:51', '2017-07-23 23:58:51'),
(9, 24, 17, 1, '2017-07-24 00:00:56', '2017-07-24 00:00:56'),
(11, 34, 19, 1, '2017-07-24 00:18:11', '2017-07-24 00:18:11'),
(50, 35, 20, 1, '2017-07-24 00:25:45', '2017-07-24 00:25:45'),
(51, 37, 18, 1, '2017-07-24 00:40:05', '2017-07-24 00:40:05'),
(54, 20, 26, 1, '2017-07-24 02:16:32', '2017-07-24 02:16:32'),
(58, 20, 27, 1, '2017-07-30 01:04:44', '2017-07-30 01:04:44'),
(59, 20, 18, 1, '2017-07-30 01:05:17', '2017-07-30 01:05:17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `cookings`
--
ALTER TABLE `cookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cookings_user_id_foreign` (`user_id`),
  ADD KEY `cookings_level_id_foreign` (`level_id`);

--
-- Chỉ mục cho bảng `cooking_categories`
--
ALTER TABLE `cooking_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cooking_categories_category_id_foreign` (`category_id`),
  ADD KEY `cooking_categories_cooking_id_foreign` (`cooking_id`);

--
-- Chỉ mục cho bảng `cooking_ingredients`
--
ALTER TABLE `cooking_ingredients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cooking_ingredients_ingredient_id_foreign` (`ingredient_id`),
  ADD KEY `cooking_ingredients_cooking_id_foreign` (`cooking_id`),
  ADD KEY `cooking_ingredients_unit_id_foreign` (`unit_id`);

--
-- Chỉ mục cho bảng `cooking_steps`
--
ALTER TABLE `cooking_steps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cooking_steps_cooking_id_foreign` (`cooking_id`);

--
-- Chỉ mục cho bảng `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `follows_user_id_foreign` (`user_id`),
  ADD KEY `follows_user_id_follow_foreign` (`user_id_follow`);

--
-- Chỉ mục cho bảng `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_seller_foreign` (`seller`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_cooking_id_foreign` (`cooking_id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_categories_post_id_foreign` (`post_id`),
  ADD KEY `post_categories_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rates_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `subscrices`
--
ALTER TABLE `subscrices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscrices_email_unique` (`email`);

--
-- Chỉ mục cho bảng `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_level_id_foreign` (`level_id`);

--
-- Chỉ mục cho bảng `wishlish`
--
ALTER TABLE `wishlish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlish_user_id_foreign` (`user_id`),
  ADD KEY `wishlish_cooking_id_foreign` (`cooking_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT cho bảng `cookings`
--
ALTER TABLE `cookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT cho bảng `cooking_categories`
--
ALTER TABLE `cooking_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT cho bảng `cooking_ingredients`
--
ALTER TABLE `cooking_ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT cho bảng `cooking_steps`
--
ALTER TABLE `cooking_steps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT cho bảng `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT cho bảng `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT cho bảng `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `subscrices`
--
ALTER TABLE `subscrices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `units`
--
ALTER TABLE `units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT cho bảng `wishlish`
--
ALTER TABLE `wishlish`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `cookings`
--
ALTER TABLE `cookings`
  ADD CONSTRAINT `cookings_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `cookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `cooking_categories`
--
ALTER TABLE `cooking_categories`
  ADD CONSTRAINT `cooking_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `cooking_categories_cooking_id_foreign` FOREIGN KEY (`cooking_id`) REFERENCES `cookings` (`id`);

--
-- Các ràng buộc cho bảng `cooking_ingredients`
--
ALTER TABLE `cooking_ingredients`
  ADD CONSTRAINT `cooking_ingredients_cooking_id_foreign` FOREIGN KEY (`cooking_id`) REFERENCES `cookings` (`id`),
  ADD CONSTRAINT `cooking_ingredients_ingredient_id_foreign` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`),
  ADD CONSTRAINT `cooking_ingredients_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Các ràng buộc cho bảng `cooking_steps`
--
ALTER TABLE `cooking_steps`
  ADD CONSTRAINT `cooking_steps_cooking_id_foreign` FOREIGN KEY (`cooking_id`) REFERENCES `cookings` (`id`);

--
-- Các ràng buộc cho bảng `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_user_id_follow_foreign` FOREIGN KEY (`user_id_follow`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `follows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_seller_foreign` FOREIGN KEY (`seller`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_cooking_id_foreign` FOREIGN KEY (`cooking_id`) REFERENCES `cookings` (`id`),
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `post_categories_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

--
-- Các ràng buộc cho bảng `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Các ràng buộc cho bảng `wishlish`
--
ALTER TABLE `wishlish`
  ADD CONSTRAINT `wishlish_cooking_id_foreign` FOREIGN KEY (`cooking_id`) REFERENCES `cookings` (`id`),
  ADD CONSTRAINT `wishlish_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
