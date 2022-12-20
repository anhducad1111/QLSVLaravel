-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 05:34 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `diem`
--

CREATE TABLE `diem` (
  `id` int(10) UNSIGNED NOT NULL,
  `diemcc` double NOT NULL,
  `diemtx` double NOT NULL,
  `diemgk` double NOT NULL,
  `diemck` double NOT NULL,
  `diemtong` double DEFAULT NULL,
  `diemchu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monhoc_id` int(10) UNSIGNED NOT NULL,
  `sinhvien_id` int(10) UNSIGNED NOT NULL,
  `hocky` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE `giangvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `tengv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucdanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khoa_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`id`, `tengv`, `ngaysinh`, `gioitinh`, `sodienthoai`, `email`, `chucdanh`, `avatar`, `khoa_id`, `created_at`, `updated_at`) VALUES
(1, 'Võ Ngọc Đạt', '1999-11-11', 'Nam', '0934969680', 'vndat@vku.udn.vn', 'Thạc sĩ', 'vndat.png', 1, '2022-12-20 09:02:39', '2022-12-20 09:02:39'),
(2, 'Huỳnh Công Pháp', '1999-11-11', 'Nam', '0905114500', 'hcphap@vku.udn.vn', 'Tiến sĩ', 'hcphap.png', 1, '2022-12-20 09:05:35', '2022-12-20 09:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenkhoa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id`, `tenkhoa`, `created_at`, `updated_at`) VALUES
(1, 'Khoa học máy tính', '2022-12-20 08:56:54', '2022-12-20 08:56:54'),
(2, 'Kỹ thuật máy tính', '2022-12-20 08:57:19', '2022-12-20 08:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenlop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `khoa_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`id`, `tenlop`, `khoa_id`, `created_at`, `updated_at`) VALUES
(1, '21SE', 1, '2022-12-20 08:57:35', '2022-12-20 08:57:35'),
(2, '21JIT', 1, '2022-12-20 08:57:50', '2022-12-20 08:57:50'),
(3, '21IR', 2, '2022-12-20 08:57:56', '2022-12-20 08:57:56'),
(4, '21CE', 2, '2022-12-20 08:58:02', '2022-12-20 08:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(24, '2022_11_02_041255_create_khoa_table', 1),
(25, '2022_11_02_041350_create_lop_table', 1),
(26, '2022_11_02_041559_create_sinhvien_table', 1),
(27, '2022_11_02_041650_create_monhoc_table', 1),
(28, '2022_11_02_041720_create_giangvien_table', 1),
(29, '2022_11_02_045403_create_diem_table', 1),
(30, '2022_11_18_061936_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `monhoc`
--

CREATE TABLE `monhoc` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenmon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotinchi` int(11) NOT NULL,
  `sotiet` int(11) NOT NULL,
  `khoa_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monhoc`
--

INSERT INTO `monhoc` (`id`, `tenmon`, `sotinchi`, `sotiet`, `khoa_id`, `created_at`, `updated_at`) VALUES
(1, 'Kỹ năng mềm', 2, 30, 1, NULL, NULL),
(2, 'Đường lối cách mạng của ĐCS VN', 3, 45, 1, NULL, NULL),
(3, 'Tiếng Anh cơ bản 2', 3, 45, 1, NULL, NULL),
(4, 'Vật lý 2 và thí nghiệm', 3, 45, 1, NULL, NULL),
(5, 'Toán rời rạc', 2, 30, 1, NULL, NULL),
(6, 'Cơ sở dữ liệu', 3, 45, 1, NULL, NULL),
(7, ' Bóng chuyền ', 1, 45, 1, NULL, NULL),
(8, 'Toán kỹ thuật', 2, 30, 1, NULL, NULL),
(9, 'Cấu kiện điện tử', 2, 30, 1, NULL, NULL),
(10, 'Lý thuyết mạch', 2, 30, 1, NULL, NULL),
(11, 'Cầu lông ', 1, 45, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `hovaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quequan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anhdaidien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lop_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`id`, `hovaten`, `email`, `gioitinh`, `ngaysinh`, `quequan`, `anhdaidien`, `lop_id`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Anh Đức', 'ducna2.21it@vku.udn', 'Nam', '2003-11-11', 'Nam Định', 'facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg', 3, '2022-12-20 09:06:59', '2022-12-20 09:06:59'),
(2, 'Nguyễn Anh Văn', 'vanna.21ce@vku.udn.vn', 'Nam', '2003-11-18', 'Quảng Nam', 'facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg', 4, '2022-12-20 09:07:54', '2022-12-20 09:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeuser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'teacher',
  `svID` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `typeuser`, `svID`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$..49whllrYkofwmlLTfAMe.F6RmmrF0OfmrhwjURgQvFSTGOjIMlu', 'admin', NULL, NULL, '2022-12-20 08:52:03', '2022-12-20 08:52:03'),
(3, 'Võ Ngọc Đạt', 'vndat@vku.udn.vn', NULL, '$2y$10$PXP2cnbrQUHtJeI6yyMz5u2kVPpx5Aw.j0ZQ77UyEk1WsD7DYJ1LG', 'teacher', NULL, NULL, '2022-12-20 09:02:39', '2022-12-20 09:02:39'),
(4, 'Huỳnh Công Pháp', 'hcphap@vku.udn.vn', NULL, '$2y$10$VsqGeKo57WEAGoGa./6Xy.VIue9dJoumTso.Qly/jFEbp7oO1XBsi', 'teacher', NULL, NULL, '2022-12-20 09:05:35', '2022-12-20 09:05:35'),
(5, 'Nguyễn Anh Đức', 'ducna2.21it@vku.udn', NULL, '$2y$10$YhOLqhdAQvrAAA1ddmYhqu1ODQ1UdT4iEvNZ128Tta6k6pa9/ylii', 'student', NULL, NULL, '2022-12-20 09:06:59', '2022-12-20 09:06:59'),
(6, 'Nguyễn Anh Văn', 'vanna.21ce@vku.udn.vn', NULL, '$2y$10$BC0AlPgtljn/P./30uKqUeRdFKD54BRYuqDz5NXAr/qSRabkaFhC2', 'student', NULL, NULL, '2022-12-20 09:07:54', '2022-12-20 09:07:54');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_classcount`
-- (See below for the actual view)
--
CREATE TABLE `v_classcount` (
`soluonglop` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_studentcount`
-- (See below for the actual view)
--
CREATE TABLE `v_studentcount` (
`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_teachercount`
-- (See below for the actual view)
--
CREATE TABLE `v_teachercount` (
`soluonggv` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_usercount`
-- (See below for the actual view)
--
CREATE TABLE `v_usercount` (
`soluong` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `v_classcount`
--
DROP TABLE IF EXISTS `v_classcount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_classcount`  AS SELECT count(`lop`.`id`) AS `soluonglop` FROM `lop``lop`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_studentcount`
--
DROP TABLE IF EXISTS `v_studentcount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_studentcount`  AS SELECT count(`sinhvien`.`id`) AS `total` FROM `sinhvien``sinhvien`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_teachercount`
--
DROP TABLE IF EXISTS `v_teachercount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_teachercount`  AS SELECT count(`giangvien`.`id`) AS `soluonggv` FROM `giangvien``giangvien`  ;

-- --------------------------------------------------------

--
-- Structure for view `v_usercount`
--
DROP TABLE IF EXISTS `v_usercount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usercount`  AS SELECT count(`users`.`id`) AS `soluong` FROM `users``users`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diem_monhoc_id_foreign` (`monhoc_id`),
  ADD KEY `diem_sinhvien_id_foreign` (`sinhvien_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giangvien_khoa_id_foreign` (`khoa_id`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lop_khoa_id_foreign` (`khoa_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monhoc_khoa_id_foreign` (`khoa_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sinhvien_lop_id_foreign` (`lop_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_svid_foreign` (`svID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diem`
--
ALTER TABLE `diem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `diem_monhoc_id_foreign` FOREIGN KEY (`monhoc_id`) REFERENCES `monhoc` (`id`),
  ADD CONSTRAINT `diem_sinhvien_id_foreign` FOREIGN KEY (`sinhvien_id`) REFERENCES `sinhvien` (`id`);

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_khoa_id_foreign` FOREIGN KEY (`khoa_id`) REFERENCES `khoa` (`id`);

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_khoa_id_foreign` FOREIGN KEY (`khoa_id`) REFERENCES `khoa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_khoa_id_foreign` FOREIGN KEY (`khoa_id`) REFERENCES `khoa` (`id`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_lop_id_foreign` FOREIGN KEY (`lop_id`) REFERENCES `lop` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_svid_foreign` FOREIGN KEY (`svID`) REFERENCES `sinhvien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
