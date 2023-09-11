-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2023 at 07:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_supper_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `is_supper_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Jarvis Berge DDS', 'funk.rashawn', 'meghan.pacocha@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '1bar0J3tQk', '2023-09-11 05:45:28', '2023-09-11 05:45:28'),
(2, 'Prof. Theo Rowe', 'otto40', 'johns.jared@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '2EjzokuLgs', '2023-09-11 05:45:28', '2023-09-11 05:45:28'),
(3, 'Albina Greenfelder', 'ricardo84', 'ladarius29@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'aeRMp7rAUb', '2023-09-11 05:45:28', '2023-09-11 05:45:28'),
(4, 'Prof. Karl Pfannerstill', 'veda39', 'theidenreich@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'Gtq5Y7KNPr', '2023-09-11 05:45:28', '2023-09-11 05:45:28'),
(5, 'Claudine Wintheiser', 'ibeier', 'kklocko@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'nyfsMStfFS', '2023-09-11 05:45:28', '2023-09-11 05:45:28'),
(6, 'Laurine Terry II', 'giovanna.crooks', 'zackary61@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'WBsH6YAyzy', '2023-09-11 05:45:28', '2023-09-11 05:45:28'),
(7, 'Sheila Abernathy', 'mellie.goldner', 'gleichner.monte@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'pdd75xt73h', '2023-09-11 05:45:28', '2023-09-11 05:45:28'),
(8, 'Judy Feeney', 'xankunding', 'mohammed58@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'eQCWORXNh7', '2023-09-11 05:45:28', '2023-09-11 05:45:28'),
(9, 'Mr. Jaquan Kris', 'corwin.leonard', 'elliott.barrows@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'ZACgLHujAU', '2023-09-11 05:45:28', '2023-09-11 05:45:28'),
(10, 'Rodrigo Littel', 'declan.yundt', 'rtillman@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'jneCNB7i2l', '2023-09-11 05:45:28', '2023-09-11 05:45:28'),
(11, 'Ignacio Upton', 'lawson.koss', 'ross15@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'E9Czt7yBN2', '2023-09-11 05:45:47', '2023-09-11 05:45:47'),
(12, 'Daisha Ortiz', 'zander.wiegand', 'nkunde@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'TcNuDfLdmi', '2023-09-11 05:45:47', '2023-09-11 05:45:47'),
(13, 'Merl Mills DDS', 'hilma38', 'lowe.francis@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'uSRv4Yw9hf', '2023-09-11 05:45:47', '2023-09-11 05:45:47'),
(14, 'Dr. Lucas Lueilwitz', 'hlueilwitz', 'zoey.reilly@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'C4fbJs12Ls', '2023-09-11 05:45:47', '2023-09-11 05:45:47'),
(15, 'Carlee West', 'hilpert.ephraim', 'xmosciski@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'yGkh0KKCeF', '2023-09-11 05:45:47', '2023-09-11 05:45:47'),
(16, 'Vada Swaniawski', 'cole.bernadine', 'qtreutel@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'iMvtwsH1nv', '2023-09-11 05:45:47', '2023-09-11 05:45:47'),
(17, 'Allene Bogan Jr.', 'cstroman', 'gstiedemann@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'jBfn2hWJsL', '2023-09-11 05:45:47', '2023-09-11 05:45:47'),
(18, 'Mylene Lebsack', 'heller.jordan', 'lindgren.amari@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'PrSm9FiMEq', '2023-09-11 05:45:47', '2023-09-11 05:45:47'),
(19, 'Prof. Jennie Wolff DDS', 'selmer51', 'vgrant@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'qiQHxjEDYp', '2023-09-11 05:45:47', '2023-09-11 05:45:47'),
(20, 'Herman Maggio', 'kennedy.mckenzie', 'sgutmann@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'ij3XGmXMDd', '2023-09-11 05:45:47', '2023-09-11 05:45:47'),
(21, 'Margaret Jacobi', 'adolphus.durgan', 'luigi.harvey@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'KeRZRgW7hE', '2023-09-11 05:46:16', '2023-09-11 05:46:16'),
(22, 'Luella Hansen', 'darrion11', 'sonny.stoltenberg@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'RulNi9Rvwg', '2023-09-11 05:46:16', '2023-09-11 05:46:16'),
(23, 'Lorine Rempel', 'christa.pfannerstill', 'eliseo06@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'IOnK6VE3DH', '2023-09-11 05:46:16', '2023-09-11 05:46:16'),
(24, 'Mr. Torey Ratke', 'kmonahan', 'droberts@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'LqpqUye5rL', '2023-09-11 05:46:16', '2023-09-11 05:46:16'),
(25, 'Mrs. Maryse Reynolds DDS', 'jessika66', 'pmccullough@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'jc4IrA74ob', '2023-09-11 05:46:16', '2023-09-11 05:46:16'),
(26, 'Garrison Hane', 'laney.mann', 'zpagac@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'p3pKSYvrsf', '2023-09-11 05:46:16', '2023-09-11 05:46:16'),
(27, 'Ana Gutkowski V', 'bauch.laurence', 'ftreutel@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'MajavW57E3', '2023-09-11 05:46:16', '2023-09-11 05:46:16'),
(28, 'Dr. Macy Rath', 'cordell.denesik', 'herman.barney@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 'sSh5QgHUSp', '2023-09-11 05:46:16', '2023-09-11 05:46:16'),
(29, 'Dallas Walsh DVM', 'ola45', 'zhamill@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'ujK32hQvQd', '2023-09-11 05:46:16', '2023-09-11 05:46:16'),
(30, 'Isac Auer', 'cummings.korbin', 'hiram.kris@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 0, 'eCjxRxHBcH', '2023-09-11 05:46:16', '2023-09-11 05:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `cover_image_path` blob DEFAULT NULL,
  `code` varchar(10) NOT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','archived','delete') NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `section`, `subject`, `room`, `cover_image_path`, `code`, `theme`, `user_id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Laravel Course', 'GSG', 'Laravel Framwork', 'Jerusalem', 0x636f766572732f4b785069596367774953554951325472396b476637376e44774c48707a344a526d5138697359414c2e6a7067, 'yC8yOmn9', NULL, 1, 'active', NULL, '2023-08-05 05:59:02', '2023-08-18 06:09:12'),
(2, 'LARAVEL COURSE', 'GSG', 'Laravel Framwork', 'Jerusalem', 0x636f766572732f6a5951423563494e6464766c646272517347364a354f3052424f6c57694b6333634c4f4a794c71782e6a7067, 'reGn9QN6', NULL, 4, 'active', NULL, '2023-08-12 05:21:34', '2023-08-17 21:38:12'),
(4, 'HTML', 'GSG', 'Front-end', 'Jerusalem', 0x636f766572732f793755624f6d6e7957434f4c5858595677717159417233594239745a71437535734e61676f5169702e6a7067, 'xnmDAfeB', NULL, 4, 'active', '2023-09-02 10:22:05', '2023-08-17 21:37:59', '2023-09-02 10:22:05'),
(5, 'HTML', 'GSG', 'Front-end', 'Jerusalem', 0x636f766572732f6e53515a3646354f6738713733786b4954446b54616e4c65755030534c3657774b514532735547422e6a7067, 'hzhxkOeL', NULL, 1, 'active', NULL, '2023-08-18 06:03:49', '2023-08-18 06:09:20'),
(6, 'PHP COURSE', 'GSG', 'PHP', 'Jerusalem', 0x636f766572732f6f664d734b6133744d624a785270506941575a4d7764396575486d634668457a66646577793374442e6a7067, 'iuiadQRI', NULL, 2, 'active', NULL, '2023-08-18 09:39:30', '2023-08-18 09:39:39'),
(7, 'API Classroom', NULL, NULL, NULL, NULL, 'fbIRw8wc', NULL, NULL, 'active', NULL, '2023-09-02 09:40:49', '2023-09-02 09:40:49'),
(8, 'API Classroom', NULL, NULL, NULL, NULL, 'HLu2V35w', NULL, 4, 'active', NULL, '2023-09-04 06:42:21', '2023-09-04 06:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_user`
--

CREATE TABLE `classroom_user` (
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('student','teacher') NOT NULL DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classroom_user`
--

INSERT INTO `classroom_user` (`classroom_id`, `user_id`, `role`, `created_at`) VALUES
(1, 2, 'student', '2023-08-07 08:43:19'),
(1, 3, 'student', '2023-08-07 08:43:46'),
(1, 4, 'teacher', '2023-08-16 10:17:52'),
(4, 2, 'student', '2023-08-31 08:35:20'),
(4, 4, 'teacher', '2023-08-17 21:37:59'),
(5, 1, 'teacher', '2023-08-18 06:03:49'),
(6, 2, 'teacher', '2023-08-18 09:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `classworks`
--

CREATE TABLE `classworks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `topic_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `type` enum('assignment','material','question') NOT NULL,
  `status` enum('published','dart') NOT NULL DEFAULT 'published',
  `published_at` timestamp NULL DEFAULT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classworks`
--

INSERT INTO `classworks` (`id`, `classroom_id`, `user_id`, `topic_id`, `title`, `description`, `type`, `status`, `published_at`, `options`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'First Assignmen', 'Description:\r\nIn this 2-hour challenge, you will be tasked with building a CRUD (Create, Read, Update, Delete) web application using the Laravel Framework. The CRM application will allow users to manage a simple \"Contacts\" resource.\r\n\r\nTask Details:\r\n\r\nSetting Up the Project:\r\nCreate a new Laravel project or use an existing one.\r\nSet up the database configuration and migrate the necessary tables.\r\nDatabase and Model:\r\nCreate a migration to define the table structure for the resource.\r\nCreate an Eloquent model for the resource.', 'assignment', 'published', '2023-08-15 21:00:00', '{\"grade\":\"20\",\"due\":\"2023-08-17\"}', NULL, '2023-08-17 21:22:03'),
(5, 1, 1, 1, 'Employee Leave Management System', 'Administrator Can:\r\nManage leave types (Create, Read, Update, and Delete)\r\nManage employees (Create, Read, Update, and Delete)\r\nManage employees\' leave requests (View requests, Approve or Deny with reason)\r\nEmployees Can:\r\nSubmit a leave request (Select leave type, start date, duration in days)\r\nView leave\'s request status.', 'assignment', 'published', '2023-08-12 21:00:00', '{\"grade\":\"32\",\"due\":\"2023-08-14\"}', NULL, '2023-08-13 08:44:23'),
(6, 1, 1, 1, 'File Sharing Service', 'Develop a web app service that allow users to upload and share files by generating a link that users can access to download the file. (Similar to: https://wetransfer.com)', 'assignment', 'published', '2023-08-13 08:11:25', NULL, NULL, NULL),
(12, 1, 1, 3, 'At autem perferendis', 'Consequatur cupidit', 'question', 'published', '2023-08-15 21:00:00', '{\"grade\":\"12\",\"due\":\"2023-08-17\"}', NULL, NULL),
(13, 1, 1, 3, 'Earum sit ad exercit', 'In natus qui aliquid', 'material', 'published', '2023-08-14 21:00:00', NULL, NULL, NULL),
(41, 1, 4, 1, 'Employee Leave Management System', '<p><span style=\"font-family: \'arial black\', sans-serif;\"><strong>Administrator Can:</strong></span></p>\r\n<ul>\r\n<li>Manage leave types (Create, Read, Update, and Delete)</li>\r\n<li>Manage employees (Create, Read, Update, and Delete)</li>\r\n<li>Manage employees\' leave requests (View requests, Approve or Deny with reason)</li>\r\n</ul>\r\n<p><span style=\"font-family: \'arial black\', sans-serif;\"><strong>Employees Can:</strong></span></p>\r\n<ul>\r\n<li>Submit a leave request (Select leave type, start date, duration in days)</li>\r\n<li>View leave\'s request status.</li>\r\n</ul>', 'assignment', 'published', '2023-08-28 21:00:00', '{\"grade\":\"20\",\"due\":\"2023-08-30\"}', NULL, NULL),
(65, 1, 4, 3, 'test', NULL, 'material', 'published', '2023-08-31 06:28:18', NULL, NULL, NULL),
(66, 1, 4, 3, 'New Notification', NULL, 'assignment', 'published', '2023-08-30 21:00:00', '{\"grade\":\"20\",\"due\":\"2023-09-01\"}', NULL, NULL),
(67, 1, 4, 3, 'NewNotification', NULL, 'material', 'published', '2023-08-31 07:28:58', NULL, NULL, NULL),
(68, 4, 4, NULL, 'NewAssignment', NULL, 'assignment', 'published', '2023-08-30 21:00:00', '{\"grade\":\"30\",\"due\":\"2023-09-02\"}', NULL, NULL),
(70, 1, 4, 3, 'mailDog', NULL, 'material', 'published', '2023-09-01 21:00:00', NULL, NULL, NULL),
(71, 1, 4, 3, 'NewMessage', NULL, 'material', 'published', '2023-09-02 05:41:24', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classwork_user`
--

CREATE TABLE `classwork_user` (
  `classwork_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `grade` double(8,2) DEFAULT NULL,
  `submitted_at` timestamp NULL DEFAULT NULL,
  `status` enum('assigned','draft','submitted','returned') NOT NULL DEFAULT 'assigned',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classwork_user`
--

INSERT INTO `classwork_user` (`classwork_id`, `user_id`, `grade`, `submitted_at`, `status`, `created_at`) VALUES
(5, 2, NULL, '2023-08-18 09:38:36', 'submitted', '2023-08-13 07:22:12'),
(5, 3, NULL, '2023-08-17 13:15:52', 'submitted', '2023-08-13 07:22:12'),
(6, 2, NULL, NULL, 'assigned', '2023-08-13 08:11:25'),
(12, 2, NULL, NULL, 'assigned', '2023-08-17 06:36:31'),
(12, 3, NULL, NULL, 'assigned', '2023-08-17 06:36:31'),
(13, 2, NULL, NULL, 'assigned', '2023-08-17 06:37:45'),
(13, 3, NULL, NULL, 'assigned', '2023-08-17 06:37:45'),
(41, 2, NULL, '2023-09-02 07:59:59', 'submitted', '2023-08-29 05:39:03'),
(41, 3, NULL, NULL, 'assigned', '2023-08-29 05:39:03'),
(65, 2, NULL, NULL, 'assigned', '2023-08-31 06:28:18'),
(65, 3, NULL, NULL, 'assigned', '2023-08-31 06:28:18'),
(66, 2, NULL, NULL, 'assigned', '2023-08-31 06:42:59'),
(66, 3, NULL, NULL, 'assigned', '2023-08-31 06:42:59'),
(67, 2, NULL, NULL, 'assigned', '2023-08-31 07:28:58'),
(67, 3, NULL, NULL, 'assigned', '2023-08-31 07:28:58'),
(68, 2, NULL, NULL, 'assigned', '2023-08-31 08:48:24'),
(70, 2, NULL, NULL, 'assigned', '2023-09-02 05:06:04'),
(70, 3, NULL, NULL, 'assigned', '2023-09-02 05:06:04'),
(71, 2, NULL, NULL, 'assigned', '2023-09-02 05:41:24'),
(71, 3, NULL, NULL, 'assigned', '2023-09-02 05:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `commentable_type` varchar(255) NOT NULL,
  `commentable_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `user_agent` varchar(512) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `commentable_type`, `commentable_id`, `content`, `ip`, `user_agent`, `created_at`, `updated_at`) VALUES
(8, 1, 'classwork', 1, 'Hi', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '2023-08-07 16:36:19', '2023-08-07 16:36:19'),
(9, 1, 'classwork', 1, 'It\'s Hard', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '2023-08-07 16:43:38', '2023-08-07 16:43:38'),
(10, 1, 'classwork', 1, 'Hi', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '2023-08-16 06:51:55', '2023-08-16 06:51:55'),
(11, 1, 'classwork', 1, 'Hi', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '2023-08-16 06:53:37', '2023-08-16 06:53:37'),
(12, 1, 'classwork', 5, 'It\'s Hard', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '2023-08-16 06:54:43', '2023-08-16 06:54:43'),
(13, 1, 'classwork', 13, 'Hi', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '2023-08-17 06:52:51', '2023-08-17 06:52:51'),
(14, 4, 'classwork', 1, 'hi', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.203', '2023-08-17 13:10:47', '2023-08-17 13:10:47'),
(15, 4, 'classwork', 1, 'Hello', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '2023-08-17 21:13:54', '2023-08-17 21:13:54'),
(16, 4, 'classwork', 1, 'It\'s esay', '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '2023-08-17 21:16:10', '2023-08-17 21:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `code`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Classrooms #', 'classrooms-count', NULL, 'active', NULL, NULL),
(2, 'Students Per Classrooms', 'Classroom-student', NULL, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_11_082444_create_classrooms_table', 1),
(6, '2023_07_13_111508_create_topics_table', 1),
(7, '2023_07_24_092538_add_soft_deletes_to_topics_table', 1),
(20, '2023_07_29_180411_add_soft_deletes_to_classrooms_table', 2),
(21, '2023_07_30_085331_create_classroom_user_table', 2),
(22, '2023_07_31_085311_create_classworks_table', 2),
(23, '2023_08_06_143025_create_classwork_user_table', 2),
(24, '2023_08_07_084430_create_comments_table', 2),
(25, '2023_08_07_133326_create_posts_table', 3),
(26, '2023_08_17_101642_create_submissions_table', 4),
(27, '2023_08_23_085611_create_profiles_table', 5),
(28, '2023_08_27_085954_create_streams_table', 6),
(29, '2023_08_28_083303_create_notifications_table', 7),
(34, '2023_09_06_081437_create_plans_table', 8),
(35, '2023_09_06_081505_create_features_table', 8),
(36, '2023_09_06_081604_create_plan_feature_table', 8),
(37, '2023_09_06_081645_create_subscriptions_table', 8),
(38, '2023_09_09_081920_create_payments_table', 8),
(39, '2023_09_11_082451_create_admins_table', 9),
(40, '2014_10_12_200000_add_two_factor_columns_to_users_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('002e0121-f7e0-4124-8fb5-d3351f86d609', 'App\\Notifications\\NewClassworkNotification', 'user', 1, '{\"title\":\"New assignment\",\"body\":\"Rawan Mortaja posted a new assignment : New Notification\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/66\",\"classwork\":66}', NULL, '2023-08-31 06:43:00', '2023-08-31 06:43:00'),
('01270589-5339-4b38-b79a-8c711b59378f', 'App\\Notifications\\NewClassworkNotification', 'user', 2, '{\"title\":\"New assignment\",\"body\":\"Rawan Mortaja posted a new assignment : New Notification\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/66\",\"classwork\":66}', '2023-08-31 08:28:13', '2023-08-31 06:43:00', '2023-08-31 08:28:13'),
('0673bfb9-70c1-4f6e-824d-35febc2b2957', 'App\\Notifications\\NewClassworkNotification', 'user', 2, '{\"title\":\"New material\",\"body\":\"Rawan Mortaja posted a new material : test\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/65\",\"classwork\":65}', '2023-08-31 08:28:14', '2023-08-31 06:28:19', '2023-08-31 08:28:14'),
('0b8a09be-bf29-4e38-a3d5-d207c57dac5e', 'App\\Notifications\\NewClassworkNotification', 'user', 1, '{\"title\":\"New assignment\",\"body\":\"\\u0642\\u0627\\u0645 Rawan Mortaja \\u0628\\u0646\\u0634\\u0631 assignment : NewAssignment\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/4\\/classworks\\/68\",\"classwork\":68}', NULL, '2023-08-31 08:48:26', '2023-08-31 08:48:26'),
('2f6d4cac-681d-4a9d-ac20-edcedfa2ce86', 'App\\Notifications\\NewClassworkNotification', 'user', 3, '{\"title\":\"New material\",\"body\":\"Rawan Mortaja posted a new material : test\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/65\",\"classwork\":65}', NULL, '2023-08-31 06:28:20', '2023-08-31 06:28:20'),
('3831d5bf-937d-4962-a53e-c33918c10c78', 'App\\Notifications\\NewClassworkNotification', 'user', 1, '{\"title\":\"New material\",\"body\":\"\\u0642\\u0627\\u0645 Rawan Mortaja \\u0628\\u0646\\u0634\\u0631 material : NewMessage\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/71\",\"classwork\":71}', NULL, '2023-09-02 05:41:24', '2023-09-02 05:41:24'),
('42aa245b-4edf-44da-af3a-207023d26a86', 'App\\Notifications\\NewClassworkNotification', 'user', 3, '{\"title\":\"New material\",\"body\":\"Rawan Mortaja posted a new material : NewNotification\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/67\",\"classwork\":67}', NULL, '2023-08-31 07:29:00', '2023-08-31 07:29:00'),
('4331401b-651e-4540-a9ba-c7e43ea8a7b4', 'App\\Notifications\\NewClassworkNotification', 'user', 3, '{\"title\":\"New assignment\",\"body\":\"Rawan Mortaja posted a new assignment : New Notification\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/66\",\"classwork\":66}', NULL, '2023-08-31 06:43:00', '2023-08-31 06:43:00'),
('6c518337-fb67-4231-b339-cfb36787b15a', 'App\\Notifications\\NewClassworkNotification', 'user', 1, '{\"title\":\"New material\",\"body\":\"\\u0642\\u0627\\u0645 Rawan Mortaja \\u0628\\u0646\\u0634\\u0631 material : mailDog\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/70\",\"classwork\":70}', NULL, '2023-09-02 05:06:05', '2023-09-02 05:06:05'),
('888f2756-3d9d-475d-8056-2bb967416dbf', 'App\\Notifications\\NewClassworkNotification', 'user', 2, '{\"title\":\"New assignment\",\"body\":\"\\u0642\\u0627\\u0645 Rawan Mortaja \\u0628\\u0646\\u0634\\u0631 assignment : NewAssignment\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/4\\/classworks\\/68\",\"classwork\":68}', NULL, '2023-08-31 08:48:29', '2023-08-31 08:48:29'),
('8c2cb6c8-cba3-4eaa-8c06-710ac52aa027', 'App\\Notifications\\NewClassworkNotification', 'user', 3, '{\"title\":\"New material\",\"body\":\"\\u0642\\u0627\\u0645 Rawan Mortaja \\u0628\\u0646\\u0634\\u0631 material : mailDog\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/70\",\"classwork\":70}', NULL, '2023-09-02 05:06:05', '2023-09-02 05:06:05'),
('a1d4a3df-e829-46d7-9282-c2a1f82beeaa', 'App\\Notifications\\NewClassworkNotification', 'user', 3, '{\"title\":\"New material\",\"body\":\"\\u0642\\u0627\\u0645 Rawan Mortaja \\u0628\\u0646\\u0634\\u0631 material : NewMessage\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/71\",\"classwork\":71}', NULL, '2023-09-02 05:41:26', '2023-09-02 05:41:26'),
('b166d798-0540-4027-9967-c284474613a1', 'App\\Notifications\\NewClassworkNotification', 'user', 2, '{\"title\":\"New material\",\"body\":\"Rawan Mortaja posted a new material : NewNotification\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/67\",\"classwork\":67}', '2023-08-31 08:28:03', '2023-08-31 07:29:00', '2023-08-31 08:28:03'),
('b3b9ef2d-9911-489b-964d-fecd9a5cef34', 'App\\Notifications\\NewClassworkNotification', 'user', 1, '{\"title\":\"New material\",\"body\":\"Rawan Mortaja posted a new material : NewNotification\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/67\",\"classwork\":67}', NULL, '2023-08-31 07:28:59', '2023-08-31 07:28:59'),
('b483a446-5704-4748-a142-766a87a96055', 'App\\Notifications\\NewClassworkNotification', 'user', 1, '{\"title\":\"New material\",\"body\":\"Rawan Mortaja posted a new material : test\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/65\",\"classwork\":65}', NULL, '2023-08-31 06:28:18', '2023-08-31 06:28:18'),
('bceaac0c-9b7c-405d-a337-e100ae77f9b4', 'App\\Notifications\\NewClassworkNotification', 'user', 2, '{\"title\":\"New material\",\"body\":\"\\u0642\\u0627\\u0645 Rawan Mortaja \\u0628\\u0646\\u0634\\u0631 material : NewMessage\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/71\",\"classwork\":71}', NULL, '2023-09-02 05:41:25', '2023-09-02 05:41:25'),
('c3e3e319-42fd-4e1e-af66-77ad7e827c0e', 'App\\Notifications\\NewClassworkNotification', 'user', 2, '{\"title\":\"New material\",\"body\":\"\\u0642\\u0627\\u0645 Rawan Mortaja \\u0628\\u0646\\u0634\\u0631 material : mailDog\",\"image\":\"\",\"link\":\"http:\\/\\/127.0.0.1:8000\\/classrooms\\/1\\/classworks\\/70\",\"classwork\":70}', NULL, '2023-09-02 05:06:05', '2023-09-02 05:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subscription_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `currency_code` char(3) NOT NULL,
  `payment_geteway` varchar(255) NOT NULL,
  `status` enum('pending','completed','failed') NOT NULL,
  `geteway_refernce_id` varchar(255) DEFAULT NULL,
  `data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`data`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `subscription_id`, `amount`, `currency_code`, `payment_geteway`, `status`, `geteway_refernce_id`, `data`, `created_at`, `updated_at`) VALUES
(1, 4, 7, 6000, 'usd', 'srtipe', 'pending', NULL, NULL, '2023-09-11 07:35:32', '2023-09-11 07:35:32'),
(2, 4, 8, 6000, 'usd', 'srtipe', 'pending', NULL, NULL, '2023-09-11 07:37:12', '2023-09-11 07:37:12'),
(3, 4, 9, 6000, 'usd', 'srtipe', 'pending', NULL, NULL, '2023-09-11 07:37:48', '2023-09-11 07:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','inactived') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `description`, `price`, `featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Free Plan', NULL, 0, 0, 'active', NULL, NULL),
(2, 'Basic Plan', NULL, 2000, 1, 'active', NULL, NULL),
(3, 'Pro Plan', NULL, 8000, 1, 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `plan_feature`
--

CREATE TABLE `plan_feature` (
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `feature_value` smallint(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_feature`
--

INSERT INTO `plan_feature` (`plan_id`, `feature_id`, `feature_value`) VALUES
(1, 1, 1),
(1, 2, 10),
(2, 1, 5),
(2, 2, 30),
(3, 1, 100),
(3, 2, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `classroom_id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sample Post', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `locale` char(2) NOT NULL DEFAULT 'en',
  `timezone` varchar(255) NOT NULL DEFAULT 'UTC',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `birthday`, `locale`, `timezone`, `created_at`, `updated_at`) VALUES
(2, 4, 'Rawan', 'Mortaja', 'female', '2013-08-13', 'en', 'UTC', NULL, NULL),
(3, 2, 'Mohamed', 'Mortaja', 'male', '2023-08-27', 'en', 'UTC', '2023-08-28 17:12:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` char(36) NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` varchar(500) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `classroom_id`, `user_id`, `content`, `link`, `created_at`) VALUES
('2809eb78-740a-469b-b263-c12590cce631', 1, 4, 'Rawan Mortaja posted a new material : test', 'http://127.0.0.1:8000/classrooms/1/classworks/65', '2023-08-31 06:28:18'),
('3206b06e-3d91-41d1-8484-378510360cdf', 1, 4, 'Rawan Mortaja posted a new material : NewNotification', 'http://127.0.0.1:8000/classrooms/1/classworks/67', '2023-08-31 07:28:59'),
('975280d4-6d8a-41e4-8f15-3450890735a8', 1, 4, 'Rawan Mortaja posted a new assignment : Employee', 'http://127.0.0.1:8000/classrooms/1/classworks/46', '2023-08-29 07:17:16'),
('c7eaade6-466e-4516-be0c-9d757798ba3d', 1, 4, 'Rawan Mortaja posted a new assignment : New Notification', 'http://127.0.0.1:8000/classrooms/1/classworks/66', '2023-08-31 06:43:00'),
('d5f2b6ed-2c54-493c-a9fe-04169ac825b5', 1, 4, 'قام Rawan Mortaja بنشر material : mailDog', 'http://127.0.0.1:8000/classrooms/1/classworks/70', '2023-09-02 05:06:05'),
('ec35e500-2232-44f0-899b-15f6400e4290', 1, 4, 'قام Rawan Mortaja بنشر material : NewMessage', 'http://127.0.0.1:8000/classrooms/1/classworks/71', '2023-09-02 05:41:24'),
('f78e2239-b9e0-4638-bfea-26ab45977a85', 4, 4, 'قام Rawan Mortaja بنشر assignment : NewAssignment', 'http://127.0.0.1:8000/classrooms/4/classworks/68', '2023-08-31 08:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classwork_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `type` enum('link','file') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `classwork_id`, `user_id`, `content`, `type`, `created_at`, `updated_at`) VALUES
(9, 5, 2, 'submissions/5/4PLk7RMofJGrP51qyftr09RP2lX9dcZ5tkI3Si3Y.html', 'file', '2023-08-18 09:38:36', '2023-08-18 09:38:36'),
(10, 5, 2, 'submissions/5/dOwY4E8H5aJbCslgqQkIDOPEZ9F4AZvB2P0Z3sZ7.jpg', 'file', '2023-08-18 09:38:36', '2023-08-18 09:38:36'),
(11, 5, 2, 'submissions/5/dwNSAxP0LpeuRMSD5snOv6RdsrriIm5Z2ZxoOcRF.jpg', 'file', '2023-08-18 09:38:36', '2023-08-18 09:38:36'),
(12, 41, 2, 'submissions/41/4KIchfu2VnvlsKTyu1i2n3VoJBWVC6qyVXr6lRRX.html', 'file', '2023-09-02 07:59:59', '2023-09-02 07:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expires_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `price` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('pending','active','expire') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `plan_id`, `user_id`, `expires_at`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '2023-12-09 06:30:10', 6000, 'pending', '2023-09-09 05:30:10', '2023-09-09 05:30:10'),
(2, 2, 4, '2023-12-10 07:33:28', 6000, 'pending', '2023-09-10 06:33:28', '2023-09-10 06:33:28'),
(3, 2, 4, '2023-12-10 07:38:10', 6000, 'pending', '2023-09-10 06:38:10', '2023-09-10 06:38:10'),
(4, 2, 4, '2023-12-10 09:07:42', 6000, 'pending', '2023-09-10 08:07:42', '2023-09-10 08:07:42'),
(5, 2, 4, '2023-12-10 09:45:32', 6000, 'pending', '2023-09-10 08:45:32', '2023-09-10 08:45:32'),
(6, 2, 4, '2023-12-11 05:43:39', 6000, 'pending', '2023-09-11 04:43:39', '2023-09-11 04:43:39'),
(7, 2, 4, '2023-12-11 06:04:31', 6000, 'pending', '2023-09-11 05:04:31', '2023-09-11 05:04:31'),
(8, 2, 4, '2023-12-11 08:37:11', 6000, 'pending', '2023-09-11 07:37:11', '2023-09-11 07:37:11'),
(9, 2, 4, '2023-12-11 08:37:39', 6000, 'pending', '2023-09-11 07:37:39', '2023-09-11 07:37:39');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `classroom_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Assignment', 1, 1, NULL, NULL, NULL),
(2, 'Question', 1, 2, NULL, NULL, NULL),
(3, 'Material', 1, 1, NULL, NULL, NULL),
(5, 'React', 2, 3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rawanmortaja', 'rawanmortaja@gmail.com', NULL, '$2y$10$4/jI.b6VNSpPeXUhp7aig.hjB3.p.sR/ia6Xg0DVcsVgPI2bOjAXS', NULL, NULL, NULL, 'UtwQZDq26QJvB9p5LrGX7lNRAAVLrwAOZ1lyaBf5SRPo7DcKzVVCzeHhmCaq', '2023-08-05 05:52:03', '2023-08-05 05:52:03'),
(2, 'moh', 'moh@gmail.com', NULL, '$2y$10$A5MMelrp6OEu.Vm3DmfP1ejb0ks0gEIPoJFUFxoY8sUPRiPGri/8m', NULL, NULL, NULL, '9km6rwlLENljRP38rOUE4mADpfIY1hCNvfAAOpcDpL8w3Pe3q8K4kYUz8TIi', '2023-08-05 06:25:47', '2023-08-05 06:25:47'),
(3, 'reham', 'reham@gmail.com', NULL, '$2y$10$BDUJ5d/UuIkszeMFXNN0LuyJKrRJRk.Pb.G/zQzF8UPI0SVNOmalK', NULL, NULL, NULL, 'CzBWDYRnWGFrTUPlvMT3kAvKeK63CdGA9feRD4dEjqPbuvQHwrStFDYSV1yl', '2023-08-06 07:54:41', '2023-08-06 07:54:41'),
(4, 'Rawan Mortaja', 'rawanmortaja077@gmail.com', NULL, '$2y$10$SMathoSh6BeFdUhkKlMtLOK0C2P2YfKUqT2floed/NgFjN3UcDhca', NULL, NULL, NULL, 'lXcrnj1YKJboSEWcEKufqYdwJSMyTAt4ZwBoKU0MZApzEFKdKQujHjobEnnI', '2023-08-08 08:40:38', '2023-08-08 08:40:38'),
(5, 'User', 'user@gmail.com', NULL, '$2y$10$FkCaO5tZrdlmdVViZc4vN.P.jO8W95wlaPX5n14NcLRlpHAU8OkH.', NULL, NULL, NULL, NULL, '2023-08-08 08:55:28', '2023-08-08 08:55:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms_user_id_foreign` (`user_id`);

--
-- Indexes for table `classroom_user`
--
ALTER TABLE `classroom_user`
  ADD PRIMARY KEY (`classroom_id`,`user_id`),
  ADD KEY `classroom_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `classworks`
--
ALTER TABLE `classworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classworks_classroom_id_foreign` (`classroom_id`),
  ADD KEY `classworks_user_id_foreign` (`user_id`),
  ADD KEY `classworks_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `classwork_user`
--
ALTER TABLE `classwork_user`
  ADD PRIMARY KEY (`classwork_id`,`user_id`),
  ADD KEY `classwork_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_commentable_type_commentable_id_index` (`commentable_type`,`commentable_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `features_code_unique` (`code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_subscription_id_foreign` (`subscription_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_feature`
--
ALTER TABLE `plan_feature`
  ADD PRIMARY KEY (`plan_id`,`feature_id`),
  ADD KEY `plan_feature_feature_id_foreign` (`feature_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_classroom_id_foreign` (`classroom_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profiles_user_id_unique` (`user_id`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `streams_classroom_id_foreign` (`classroom_id`),
  ADD KEY `streams_user_id_foreign` (`user_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `submissions_classwork_id_foreign` (`classwork_id`),
  ADD KEY `submissions_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_plan_id_foreign` (`plan_id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_classroom_id_foreign` (`classroom_id`),
  ADD KEY `topics_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `classworks`
--
ALTER TABLE `classworks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `classroom_user`
--
ALTER TABLE `classroom_user`
  ADD CONSTRAINT `classroom_user_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classroom_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `classworks`
--
ALTER TABLE `classworks`
  ADD CONSTRAINT `classworks_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classworks_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `classworks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `classwork_user`
--
ALTER TABLE `classwork_user`
  ADD CONSTRAINT `classwork_user_classwork_id_foreign` FOREIGN KEY (`classwork_id`) REFERENCES `classworks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `classwork_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `plan_feature`
--
ALTER TABLE `plan_feature`
  ADD CONSTRAINT `plan_feature_feature_id_foreign` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `plan_feature_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `streams`
--
ALTER TABLE `streams`
  ADD CONSTRAINT `streams_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `streams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_classwork_id_foreign` FOREIGN KEY (`classwork_id`) REFERENCES `classworks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `topics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
