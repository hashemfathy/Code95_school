-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2019 at 01:10 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `level_id`, `created_at`, `updated_at`) VALUES
(1, '1-A', 1, NULL, NULL),
(2, '1-B', 1, NULL, NULL),
(3, '1-C', 1, NULL, NULL),
(4, '1-D', 1, NULL, NULL),
(5, '1-E', 1, NULL, NULL),
(6, '2-A', 2, NULL, NULL),
(7, '2-B', 2, NULL, NULL),
(8, '2-C', 2, NULL, NULL),
(9, '2-D', 2, NULL, NULL),
(10, '2-E', 2, NULL, NULL),
(11, '3-A', 3, NULL, NULL),
(12, '3-B', 3, NULL, NULL),
(13, '3-C', 3, NULL, NULL),
(14, '3-D', 3, NULL, NULL),
(15, '3-E', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'level-1', NULL, NULL),
(2, 'level-2', NULL, NULL),
(3, 'level-3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_25_211956_create_students_table', 1),
(4, '2019_06_25_222124_create_levels_table', 1),
(5, '2019_06_25_222545_create_classrooms_table', 1),
(6, '2019_06_25_231923_add_column_to_students_table', 1),
(7, '2019_06_29_130459_create_teachers_table', 2),
(8, '2019_06_29_143044_create_subjects_table', 3),
(9, '2019_06_29_180848_create_teach_class_subject_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `parent_phone`, `user_id`, `created_at`, `updated_at`, `classroom_id`, `level_id`) VALUES
(5, '01146785296', 7, '2019-06-26 20:31:16', '2019-06-28 19:56:49', 7, 2),
(6, '01235469872', 8, '2019-06-26 20:33:16', '2019-06-26 20:33:16', 11, 3),
(7, '01146755296', 10, '2019-06-27 13:13:48', '2019-06-27 13:13:48', 7, 2),
(8, '01235689892', 12, '2019-06-27 13:25:22', '2019-06-27 13:25:22', 7, 2),
(10, '01487874545', 15, '2019-06-28 13:18:52', '2019-06-28 13:18:52', 15, 3),
(11, '01235687898', 16, '2019-06-28 13:34:17', '2019-06-28 15:52:42', 5, 1),
(12, '01235869872', 17, '2019-06-28 13:34:55', '2019-06-28 13:34:55', 13, 3),
(13, '01235684898', 18, '2019-06-28 16:05:14', '2019-06-28 16:05:14', 7, 2),
(14, '01146555296', 19, '2019-06-28 16:06:58', '2019-06-28 16:06:58', 1, 1),
(15, '01235449872', 20, '2019-06-28 16:08:54', '2019-06-28 16:08:54', 9, 2),
(16, '01235789898', 21, '2019-06-28 19:56:31', '2019-06-28 19:58:00', 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_code`, `level_id`, `created_at`, `updated_at`) VALUES
(1, 'English-p-1', 1, NULL, NULL),
(2, 'English-p-2', 2, NULL, NULL),
(3, 'English-p-3', 3, NULL, NULL),
(4, 'Arabic-p-1', 1, NULL, NULL),
(5, 'Arabic-p-2', 2, NULL, NULL),
(6, 'Arabic-p-3', 3, NULL, NULL),
(7, 'history-p-1', 1, NULL, NULL),
(8, 'history-p-2', 2, NULL, NULL),
(9, 'history-p-3', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `phone_number`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '01124536485', 4, NULL, NULL),
(2, '01235478965', 24, '2019-06-29 11:47:56', '2019-06-29 11:47:56'),
(3, '01225448965', 25, '2019-06-29 12:15:18', '2019-06-29 12:15:18'),
(4, '01235477965', 26, '2019-06-29 16:33:57', '2019-06-29 16:33:57'),
(5, '01225448965', 27, '2019-06-29 16:35:24', '2019-06-29 16:35:24'),
(6, '01235478965', 28, '2019-06-29 16:36:13', '2019-06-29 16:36:13'),
(7, '01225448965', 29, '2019-06-29 16:36:48', '2019-06-29 16:36:48'),
(8, '01235478965', 30, '2019-06-29 16:37:30', '2019-06-29 16:37:30'),
(9, '01235478965', 31, '2019-06-29 16:38:11', '2019-06-29 16:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `teach_class_subject`
--

CREATE TABLE `teach_class_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teach_class_subject`
--

INSERT INTO `teach_class_subject` (`id`, `teacher_id`, `classroom_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 2, 1, NULL, NULL),
(3, 1, 6, 2, NULL, NULL),
(4, 1, 7, 2, NULL, NULL),
(5, 1, 11, 3, NULL, NULL),
(6, 1, 12, 3, NULL, NULL),
(7, 2, 3, 1, NULL, NULL),
(8, 2, 4, 1, NULL, NULL),
(9, 2, 8, 2, NULL, NULL),
(10, 2, 9, 2, NULL, NULL),
(11, 2, 13, 3, NULL, NULL),
(12, 2, 14, 3, NULL, NULL),
(13, 3, 5, 1, NULL, NULL),
(14, 3, 10, 2, NULL, NULL),
(15, 3, 15, 3, NULL, NULL),
(16, 4, 1, 4, NULL, NULL),
(17, 4, 2, 4, NULL, NULL),
(18, 4, 6, 5, NULL, NULL),
(19, 4, 7, 5, NULL, NULL),
(20, 4, 11, 6, NULL, NULL),
(21, 4, 12, 6, NULL, NULL),
(22, 5, 3, 4, NULL, NULL),
(23, 5, 4, 4, NULL, NULL),
(24, 5, 8, 5, NULL, NULL),
(25, 5, 9, 5, NULL, NULL),
(26, 5, 13, 6, NULL, NULL),
(27, 5, 14, 6, NULL, NULL),
(28, 6, 5, 4, NULL, NULL),
(29, 6, 10, 5, NULL, NULL),
(30, 6, 15, 6, NULL, NULL),
(31, 7, 1, 7, NULL, NULL),
(32, 7, 2, 7, NULL, NULL),
(33, 7, 6, 8, NULL, NULL),
(34, 7, 7, 8, NULL, NULL),
(35, 7, 11, 9, NULL, NULL),
(36, 7, 12, 9, NULL, NULL),
(37, 8, 3, 7, NULL, NULL),
(38, 8, 4, 7, NULL, NULL),
(39, 8, 8, 8, NULL, NULL),
(40, 8, 9, 8, NULL, NULL),
(41, 8, 13, 9, NULL, NULL),
(42, 8, 14, 9, NULL, NULL),
(43, 9, 5, 7, NULL, NULL),
(44, 9, 10, 8, NULL, NULL),
(45, 9, 15, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` mediumint(9) NOT NULL DEFAULT '3',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `photo`, `is_admin`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'hashem', 'hashem@gmail.com', 'ismailia', NULL, 1, NULL, '$2y$10$xcNydA54.58Sz.z1v8sT6OqwycaL6tuplXK..5K1RipLcpGRbgnNe', NULL, NULL, NULL),
(4, 'hassan ali', 'hassan_ali@gmail.com', 'cairo', '80745.JPG', 2, NULL, '$2y$10$P46GITJQQPD0k4.EQctxle2aK/dXklJ./2p62eY1t/wV3BRODZXF6', NULL, NULL, '2019-06-29 11:45:59'),
(7, 'hatem', 'hatem@gmail.com', 'tahrir', '94701.JPG', 3, NULL, '$2y$10$FCuYK3C5X9FKpL/iQ0TcoO7m0Xc9sEzIBZRMfav3LuKNOL6AMxwL6', NULL, '2019-06-26 20:31:15', '2019-06-28 19:56:49'),
(8, 'nour', 'nour@gmail.com', 'shobra', '78379.JPG', 3, NULL, '$2y$10$SzkEF0S05rub0qFdNtPw1e7bOvG5PEQAVVnU9ucRNkWwbtkXhO2Ci', NULL, '2019-06-26 20:33:16', '2019-06-28 19:57:12'),
(10, 'yousra', 'yousra@gmail.com', 'cairo', '71552.jpg', 3, NULL, '$2y$10$eoSGxmEwpayOBgoe5D1iDO4x0aJibVr.kZXMH0T.SXVsEkhUh6lB6', NULL, '2019-06-27 13:13:48', '2019-06-28 19:58:41'),
(12, 'yasmin', 'yasmin@gmail.com', 'ardal gamaiaat', '60960.JPG', 3, NULL, '$2y$10$mtlg6VA7xO3Hs8.XaCoraOO.7MMtVrFsS7CfzZaB/7LJr393hVD0u', NULL, '2019-06-27 13:25:22', '2019-06-28 19:57:35'),
(15, 'yehia', 'yehia@gmail.com', 'ismailia', '62714.JPG', 3, NULL, '$2y$10$vKgv4Hr1baw6ikq.7xA7AO.qyz27bUybLI2BV3JnBzgFLUX0P3ZMO', NULL, '2019-06-28 13:18:52', '2019-06-28 13:18:52'),
(16, 'yassin ahmed', 'yassin@gmail.com', 'Giza', '83873.JPG', 3, NULL, '$2y$10$lHqgmiP5s4SSWAj/oNtjc.H0YGx4Px.DeE213MOkaAze9OJdQdTgO', NULL, '2019-06-28 13:34:17', '2019-06-28 15:52:42'),
(17, 'noha', 'noha@gmail.com', 'suhag', '67858.JPG', 3, NULL, '$2y$10$vA/pHTtfnIqCMoBTDYee1u3dElfhwiO.F6AL85b3.25o3wQYtrq0u', NULL, '2019-06-28 13:34:55', '2019-06-28 13:34:55'),
(18, 'ahmed', 'ahmed@gmail.com', 'ismailia', '90237.jpg', 3, NULL, '$2y$10$cPPEOCNentkOToJAnUvxouIiA9tMGTXGxxNsFSC8HykyTzVzTrwWG', NULL, '2019-06-28 16:05:14', '2019-06-28 16:05:14'),
(19, 'moustafa', 'moustafa@gmail.com', 'Banha', '56334.jpg', 3, NULL, '$2y$10$8lvF5ax2wgapOiu4rj4mW.6LVQ3BjixYzqw69v8.d8rDZwRTUSHva', NULL, '2019-06-28 16:06:58', '2019-06-28 16:06:58'),
(20, 'ali darwesh', 'ali@gmail.com', 'El shohadaa', '63976.JPG', 3, NULL, '$2y$10$75NqYnwat.ZI02c5WO87YeWqMwA8OukAY1Ynpj5x8eQQ/bBd1yCQ6', NULL, '2019-06-28 16:08:54', '2019-06-28 16:08:54'),
(21, 'mahmoud ali', 'mahmoud_ali@gmail.com', 'El shohadaa', '11774.JPG', 3, NULL, '$2y$10$43XUV6P5R/FPdrIplLYBXOIEEvyVZsoycO4hMj4neZQNYKMn3BQ9W', NULL, '2019-06-28 19:56:31', '2019-06-28 19:58:00'),
(24, 'rabab ahmed', 'rabab_ahmed@gmail.com', 'El shohadaa', '42466.jpg', 2, NULL, '$2y$10$xRw9tZv4gEZWUAsC12goYuIODKTHrI9R4/bNMLjDLogUIqZi86Xo2', NULL, '2019-06-29 11:47:56', '2019-06-29 11:47:56'),
(25, 'mahmoud hany', 'mahmoud_hany@gmail.com', 'ismailia', '57351.jpg', 2, NULL, '$2y$10$W2/O32C0w2PDE.Qw0Ru1n.WJ1/8uh8/vfDiLX5jXmQXzuBqsGRDk6', NULL, '2019-06-29 12:15:18', '2019-06-29 12:15:18'),
(26, 'ahmed mahmoud', 'ahmed_mahmoud@gmail.com', 'ismailia', '40070.jpg', 2, NULL, '$2y$10$wPNVVzrpFfIsB/vZKwqZL.rXyimQnZ.eoMTycgfnTcoqYgsgBDil2', NULL, '2019-06-29 16:33:57', '2019-06-29 16:33:57'),
(27, 'mohamed nader', 'mohamed_nader@gmail.com', 'ismailia', '85480.JPG', 2, NULL, '$2y$10$ciWkcuH1ur87hVmP7J94gOCv1jpieOUpSrKmMqjekpYIcR1f0h0.K', NULL, '2019-06-29 16:35:24', '2019-06-29 16:35:24'),
(28, 'nader ahmed', 'nader_ahmed@gmail.com', 'ismailia', '63095.jpg', 2, NULL, '$2y$10$uy1jJztqxQ/PWTKAQwreu.2FihIR6LEvNwCkTMwqXVHzP8FRKxGvC', NULL, '2019-06-29 16:36:13', '2019-06-29 16:36:13'),
(29, 'ali mahmoud', 'ali_mahmoud@gmail.com', 'ismailia', '74381.jpg', 2, NULL, '$2y$10$8qJSDbm5BVce2iLad.PBnOupatfYNpySomBIieG4CDqBdDuewTyAS', NULL, '2019-06-29 16:36:48', '2019-06-29 16:36:48'),
(30, 'momen ali', 'momen_ali@gmail.com', 'ismailia', '49779.jpg', 2, NULL, '$2y$10$tsWjiJr9KNd2hMhRRfkxiebbh89ywq4vCbV7xA80IDRb.T2p8o0Om', NULL, '2019-06-29 16:37:30', '2019-06-29 16:37:30'),
(31, 'yehia ahmed', 'yehia_ahmed@gmail.com', 'ismailia', '23398.jpg', 2, NULL, '$2y$10$A3gDZJwoMcT52jtt3WUN3eI19pk2m8ZOnQ8B6LwJZg8w/gJ6YnMnG', NULL, '2019-06-29 16:38:11', '2019-06-29 16:38:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classrooms_name_unique` (`name`),
  ADD KEY `classrooms_level_id_foreign` (`level_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `levels_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_classroom_id_foreign` (`classroom_id`),
  ADD KEY `students_level_id_foreign` (`level_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_level_id_foreign` (`level_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `teach_class_subject`
--
ALTER TABLE `teach_class_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teach_class_subject_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teach_class_subject_classroom_id_foreign` (`classroom_id`),
  ADD KEY `teach_class_subject_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teach_class_subject`
--
ALTER TABLE `teach_class_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `students_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teach_class_subject`
--
ALTER TABLE `teach_class_subject`
  ADD CONSTRAINT `teach_class_subject_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `teach_class_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `teach_class_subject_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
