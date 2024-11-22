-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 04:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookinghotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_cred`
--

CREATE TABLE `admin_cred` (
  `sr_no` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_pass` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_cred`
--

INSERT INTO `admin_cred` (`sr_no`, `admin_name`, `admin_pass`) VALUES
(1, 'tuandeptrai', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `total_pay` int(11) NOT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `user_name` varchar(100) NOT NULL,
  `phonenum` varchar(500) NOT NULL,
  `address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`sr_no`, `booking_id`, `room_name`, `price`, `total_pay`, `room_no`, `user_name`, `phonenum`, `address`) VALUES
(19, 19, 'tuandeptrai', '999.999', 1999998, NULL, 'Phamtuan', '3245451', 'dsdsdsdsd'),
(20, 20, 'Phòng đơn', '245.000', 1960000, '200', 'Phamtuan', '3245451', 'dsdsdsdsd'),
(21, 21, 'oni-chan baka 1', '230.000', 2760000, NULL, 'Phamtuan', '3245451', 'dsdsdsdsd'),
(22, 22, 'oni-chan baka 1', '230.000', 460000, '1', 'Phamtuan', '3245451', 'dsdsdsdsd'),
(23, 23, 'Phòng bình dân', '230.000', 2760000, '200', 'Phamtuan', '3245451', 'dsdsdsdsd'),
(24, 24, 'Phòng đơn', '245.000', 2205000, NULL, 'Phamtuan', '3245451', 'dsdsdsdsd'),
(25, 25, 'Phòng VIP', '250.000', 500000, '696', 'Phamtuan', '3245451', 'dsdsdsdsd'),
(26, 26, 'Phòng bình dân', '230.000', 920000, '120', 'Phamtuan', '3245451', 'dsdsdsdsd'),
(27, 27, 'Phòng bình dân', '230.000', 230000, NULL, 'Phamtuan', '3245451', 'dsdsdsdsd'),
(28, 28, 'Phòng bình dân', '230.000', 690000, '200', 'Phamtuan', '3245451', 'dsdsdsdsd');

-- --------------------------------------------------------

--
-- Table structure for table `booking_order`
--

CREATE TABLE `booking_order` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `arrival` int(11) NOT NULL DEFAULT 0,
  `refund` int(11) DEFAULT NULL,
  `booking_status` varchar(100) NOT NULL DEFAULT 'pending',
  `order_id` varchar(200) NOT NULL,
  `trans_id` int(200) DEFAULT NULL,
  `trans_amt` int(11) NOT NULL,
  `trans_status` varchar(100) NOT NULL DEFAULT 'pending',
  `trans_resp_msg` varchar(200) DEFAULT NULL,
  `rate_review` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_order`
--

INSERT INTO `booking_order` (`booking_id`, `user_id`, `room_id`, `check_in`, `check_out`, `arrival`, `refund`, `booking_status`, `order_id`, `trans_id`, `trans_amt`, `trans_status`, `trans_resp_msg`, `rate_review`, `datetime`) VALUES
(19, 10, 12, '2024-11-14', '2024-11-16', 0, 1, 'cancelled', 'UTH_1088672', 14671686, 1999998, '00', 'Thanh toan GD:UTH_1088672', NULL, '2024-11-14 11:30:44'),
(20, 10, 10, '2024-11-14', '2024-11-22', 0, 1, 'cancelled', 'UTH_1077467', 14671878, 1960000, '00', 'Thanh toan GD:UTH_1077467', 1, '2024-11-14 13:06:23'),
(21, 10, 8, '2024-11-15', '2024-11-27', 0, NULL, 'payment failed', 'UTH_1028827', 0, 0, '', '', NULL, '2024-11-14 14:14:24'),
(22, 10, 8, '2024-11-16', '2024-11-18', 0, 1, 'cancelled', 'UTH_1047042', 14675192, 460000, '00', 'Thanh toan GD:UTH_1047042', 1, '2022-10-11 20:52:02'),
(23, 10, 8, '2024-11-17', '2024-11-29', 1, NULL, 'booked', 'UTH_1030634', 14677402, 2760000, '00', 'Thanh toan GD:UTH_1030634', 1, '2024-11-17 11:53:48'),
(24, 10, 10, '2024-11-21', '2024-11-30', 0, 1, 'cancelled', 'UTH_107247', 14677406, 2205000, '00', 'Thanh toan GD:UTH_107247', NULL, '2024-11-17 11:57:48'),
(25, 10, 11, '2024-11-17', '2024-11-19', 1, NULL, 'booked', 'UTH_1048022', 14677410, 500000, '00', 'Thanh toan GD:UTH_1048022', 1, '2024-11-17 11:59:21'),
(26, 10, 8, '2024-11-17', '2024-11-21', 1, NULL, 'booked', 'UTH_1087857', 14677414, 920000, '00', 'Thanh toan GD:UTH_1087857', 1, '2024-11-17 12:04:13'),
(27, 10, 8, '2024-11-28', '2024-11-29', 0, NULL, 'pending', 'UTH_1010956', NULL, 0, 'pending', NULL, NULL, '2024-11-17 18:21:43'),
(28, 10, 8, '2024-11-18', '2024-11-21', 1, NULL, 'booked', 'UTH_1018145', 14677989, 690000, '00', 'Thanh toan GD:UTH_1018145', 0, '2024-11-17 18:27:54');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `sr_no` int(11) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`sr_no`, `image`) VALUES
(7, 'IMG_42188.png'),
(9, 'IMG_94819.png'),
(10, 'IMG_76176.png'),
(11, 'IMG_77743.webp');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `sr_no` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gmap` varchar(100) NOT NULL,
  `pn1` bigint(20) NOT NULL,
  `pn2` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `tt` varchar(100) NOT NULL,
  `insta` varchar(100) NOT NULL,
  `iframe` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`sr_no`, `address`, `gmap`, `pn1`, `pn2`, `email`, `fb`, `tt`, `insta`, `iframe`) VALUES
(1, '70 Đ. Tô Ký, Tân Chánh Hiệp, Quận 12 , Hồ Chí Minh, Việt Nam', 'https://maps.app.goo.gl/6dAmjSjSn3N4SGCaA', 1236545479, 2423683214, 'phamtuan7592@gmail.com', 'https://www.facebook.com/', 'https://www.tiktok.com/en/', 'https://www.instagram.com/', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7836.589357271335!2d106.616386!3d10.865177000000001!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a10b0f0554f:0x769800e8967d6703!2zNzAgxJAuIFTDtCBLw70sIFTDom4gQ2jDoW5oIEhp4buHcCwgUXXhuq1uIDEyLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2sus!4v');

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE `facilities` (
  `id` int(11) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `icon`, `name`, `description`) VALUES
(11, 'IMG_40188.svg', 'Wifi', 'Wifi cá nhân, tốc độ truy cập cao và xem phim bao mượt'),
(12, 'IMG_20707.svg', 'Tivi', 'Tivi hiện đại, độ phân giải cao và xem phim bao nét'),
(13, 'IMG_25353.svg', 'Tủ lạnh', 'tủ lạnh cao cấp, thiết kế sang trọng và đẳng cấp');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`) VALUES
(15, 'Phòng ngủ'),
(16, 'Phòng tắm'),
(17, 'Phòng khách');

-- --------------------------------------------------------

--
-- Table structure for table `rating_review`
--

CREATE TABLE `rating_review` (
  `sr_no` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` varchar(200) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating_review`
--

INSERT INTO `rating_review` (`sr_no`, `booking_id`, `room_id`, `user_id`, `rating`, `review`, `seen`, `datetime`) VALUES
(2, 22, 8, 10, 5, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia officia, dolorem et similique obcaecati optio expedita vero veritatis?\r\nQuasi dolores non officia quisquam incidunt explicabo, porro ', 1, '2022-11-17 07:58:14'),
(5, 23, 8, 10, 5, 'phòng đẹp sạch sẽ tiện nghi ', 0, '2024-11-17 11:56:46'),
(6, 25, 11, 10, 2, 'phòng rất tệ', 1, '2024-11-17 12:00:32'),
(7, 26, 8, 10, 5, 'tuyệt vời không có gì để chê', 0, '2024-11-17 12:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `area` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `description` varchar(400) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `removed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `status`, `removed`) VALUES
(8, 'Phòng bình dân', 3, '230.000', 3, 4, 4, 'Phòng bình dân mang đến sự kết hợp hoàn hảo giữa giá trị và chất lượng. Mặc dù có mức giá phải chăng, nhưng mỗi phòng vẫn được trang bị đầy đủ tiện nghi cơ bản để đảm bảo sự thoải mái cho khách lưu trú.', 1, 0),
(10, 'Phòng đơn', 12, '245.000', 2, 2, 3, 'Phòng đơn là lựa chọn lý tưởng cho những du khách đi một mình hoặc những khách công tác cần không gian riêng tư và thoải mái. Phòng được thiết kế tinh tế, với không gian rộng rãi và trang bị đầy đủ các tiện nghi hiện đại', 1, 0),
(11, 'Phòng VIP', 13, '250.000', 1, 2, 2, 'Phòng VIP tại là lựa chọn hoàn hảo cho những ai tìm kiếm một không gian sang trọng, tiện nghi và riêng tư. Với diện tích rộng rãi, phòng VIP được trang trí tinh tế, kết hợp giữa vẻ đẹp hiện đại và sự sang trọng cổ điển.', 1, 0),
(12, 'Phòng đơn', 4, '999.999', 2, 3, 1, 'Phòng đơn tại là lựa chọn lý tưởng cho những du khách đi một mình hoặc những khách công tác cần không gian riêng tư và thoải mái. Phòng được thiết kế tinh tế, với không gian rộng rãi và trang bị đầy đủ các tiện nghi hiện đại', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_facilities`
--

CREATE TABLE `room_facilities` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `facilities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_facilities`
--

INSERT INTO `room_facilities` (`sr_no`, `room_id`, `facilities_id`) VALUES
(110, 8, 11),
(111, 10, 11),
(112, 12, 11),
(113, 12, 12),
(114, 12, 13),
(115, 11, 11),
(116, 11, 12),
(117, 11, 13);

-- --------------------------------------------------------

--
-- Table structure for table `room_features`
--

CREATE TABLE `room_features` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `features_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_features`
--

INSERT INTO `room_features` (`sr_no`, `room_id`, `features_id`) VALUES
(133, 8, 15),
(134, 8, 16),
(135, 10, 15),
(136, 12, 15),
(137, 12, 16),
(138, 11, 15),
(139, 11, 16),
(140, 11, 17);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `sr_no` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `thumb` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`sr_no`, `room_id`, `image`, `thumb`) VALUES
(26, 8, 'IMG_48990.jpg', 1),
(27, 10, 'IMG_69772.jpg', 0),
(30, 11, 'IMG_33365.jpg', 0),
(31, 12, 'IMG_22596.jpg', 1),
(34, 8, 'IMG_20205.jpg', 0),
(35, 8, 'IMG_35261.jpg', 0),
(36, 10, 'IMG_15501.jpg', 1),
(38, 11, 'IMG_57151.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `sr_no` int(11) NOT NULL,
  `site_title` varchar(50) NOT NULL,
  `site_about` varchar(250) NOT NULL,
  `shutdown` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`sr_no`, `site_title`, `site_about`, `shutdown`) VALUES
(1, 'UTH HOTEL', 'Chào mừng bạn đến với của chúng tôi, nơi mang đến sự kết hợp hoàn hảo giữa phong cách hiện đại và dịch vụ chuyên nghiệp. Với vị trí đắc địa ngay trung tâm thành phố, khách sạn chúng tôi là điểm dừng chân lý tưởng cho cả khách du lịch và doanh nhân.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_details`
--

CREATE TABLE `team_details` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team_details`
--

INSERT INTO `team_details` (`sr_no`, `name`, `picture`) VALUES
(14, 'Sô Ny', 'IMG_49054.png'),
(15, 'Hoàng Tuấn', 'IMG_40146.png'),
(16, 'Thành Đạt', 'IMG_86932.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_cred`
--

CREATE TABLE `user_cred` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `pincode` int(100) NOT NULL,
  `dob` date NOT NULL,
  `profile` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) DEFAULT NULL,
  `t_expire` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_cred`
--

INSERT INTO `user_cred` (`id`, `name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`, `is_verified`, `token`, `t_expire`, `status`, `datetime`) VALUES
(10, 'Phamtuan', 'phamtuan7952@gmail.com', 'dsdsdsdsd', '3245451', 123, '2024-11-05', 'IMG_50298.jpg', '$2y$10$No7.9JWgSPyTbebq2yv/Z.mqtVEtShpC2aEH7q3likPrUpLJ4vNMK', 1, NULL, NULL, 1, '2024-11-09 21:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_queries`
--

CREATE TABLE `user_queries` (
  `sr_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `massage` varchar(500) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `seen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_queries`
--

INSERT INTO `user_queries` (`sr_no`, `name`, `email`, `subject`, `massage`, `datetime`, `seen`) VALUES
(17, 'hihi', 'abc@gmail.com', 'a', 's', '2024-10-30 00:00:00', 1),
(18, 'tuandeptrai', 'phamtuan7952@gmail.com', 'hêhe', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia officia, dolorem et similique obcaecati optio expedita vero veritatis?\r\nQuasi dolores non officia quisquam incidunt explicabo, porro nemo ea saepe reprehenderit.', '2024-10-18 00:00:00', 0),
(19, 'tuandeptrai', 'phamtuan7952@gmail.com', 'mkl', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia officia, dolorem et similique obcaecati optio expedita vero veritatis?\r\nQuasi dolores non officia quisquam incidunt explicabo, porro nemo ea saepe reprehenderit.', '2024-11-16 12:50:37', 0),
(20, 'sonydeptrai', 'sony@gmail.com', 'mcn', 'bạn ơi đặt phòng thế nào vậy', '2024-11-17 12:18:28', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_cred`
--
ALTER TABLE `admin_cred`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_facilities`
--
ALTER TABLE `room_facilities`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `facilities id` (`facilities_id`),
  ADD KEY `room id` (`room_id`);

--
-- Indexes for table `room_features`
--
ALTER TABLE `room_features`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `features id` (`features_id`),
  ADD KEY `rm id` (`room_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`sr_no`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `team_details`
--
ALTER TABLE `team_details`
  ADD PRIMARY KEY (`sr_no`);

--
-- Indexes for table `user_cred`
--
ALTER TABLE `user_cred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_queries`
--
ALTER TABLE `user_queries`
  ADD PRIMARY KEY (`sr_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_cred`
--
ALTER TABLE `admin_cred`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `booking_order`
--
ALTER TABLE `booking_order`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `rating_review`
--
ALTER TABLE `rating_review`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_facilities`
--
ALTER TABLE `room_facilities`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `room_features`
--
ALTER TABLE `room_features`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_details`
--
ALTER TABLE `team_details`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_cred`
--
ALTER TABLE `user_cred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_queries`
--
ALTER TABLE `user_queries`
  MODIFY `sr_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`);

--
-- Constraints for table `booking_order`
--
ALTER TABLE `booking_order`
  ADD CONSTRAINT `booking_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`),
  ADD CONSTRAINT `booking_order_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rating_review`
--
ALTER TABLE `rating_review`
  ADD CONSTRAINT `rating_review_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking_order` (`booking_id`),
  ADD CONSTRAINT `rating_review_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `rating_review_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user_cred` (`id`);

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
