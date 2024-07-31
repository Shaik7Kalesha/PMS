-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 31, 2024 at 11:51 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kaleshadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `batch_id` varchar(255) NOT NULL,
  `batch_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `batch_id`, `batch_name`, `status`, `created_at`, `updated_at`) VALUES
(6, '1', '4 year', 'closed', '2024-06-26 03:49:37', '2024-06-30 09:42:40'),
(7, '2', '4th year', 'open', '2024-06-26 03:49:56', '2024-06-27 22:34:35'),
(8, '3', '4th year', 'pending', '2024-06-26 03:50:08', '2024-06-26 03:50:08'),
(9, '4', '4th year', 'pending', '2024-06-26 03:50:22', '2024-06-26 03:50:22'),
(10, '5', '3rd year', 'pending', '2024-06-26 03:51:14', '2024-06-26 03:51:14'),
(11, '6', '5/3Y', 'pending', '2024-06-26 21:20:29', '2024-06-26 21:20:29'),
(12, '8', '5/3Y', 'pending', '2024-06-26 21:22:01', '2024-06-26 21:22:01'),
(13, '11', '5/3Y', 'pending', '2024-06-26 21:35:10', '2024-06-26 21:35:10'),
(14, '12', '5/3Y', 'pending', '2024-06-26 21:38:45', '2024-06-26 21:38:45'),
(15, '12', '5/3Y', 'pending', '2024-06-26 21:43:04', '2024-06-26 21:43:04'),
(16, '12', '5/3Y', 'pending', '2024-06-26 21:43:55', '2024-06-26 21:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staffid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `staffid`, `name`, `email`, `department`, `mobilenumber`, `designation`, `password`, `created_at`, `updated_at`) VALUES
(1, '1', 'dhatchu', 'dhatchu1810@gmail.com', 'cse', '98765432111', 'web developer', '12345678', '2024-07-01 00:09:08', '2024-07-01 00:09:08'),
(2, '2', 'shaikalis', 'shaik@gmail.com', 'cse', '98765432111', 'web developer', '12345678', '2024-07-01 00:11:43', '2024-07-01 00:11:43');

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bioid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `personalemail` varchar(255) NOT NULL,
  `officialemail` varchar(255) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `portfolio` varchar(255) DEFAULT NULL,
  `mobilenumber` varchar(255) NOT NULL,
  `techstack` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `dateofjoining` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `bioid`, `name`, `password`, `personalemail`, `officialemail`, `employeeid`, `experience`, `linkedin`, `portfolio`, `mobilenumber`, `techstack`, `designation`, `dateofjoining`, `created_at`, `updated_at`, `status`) VALUES
(2, '2', 'indumah', '$2y$10$5XbR/Opls5Hkm5Po/H7pKuKkl7Vcg9V43hiufpBFFLWnVZp.S.0nW', 'kalesha123@gmail.com', 'kalesh12@gmail.com', 2, '2', 'https://www.w3schools.com/jquery/jquery_get_started.asp', 'https://www.w3schools.com/jquery/jquery_get_started.asp', '98765432111', 'android', 'graduate', '2024-06-03', '2024-06-07 05:00:51', '2024-07-09 03:17:50', 'accepted'),
(20, '20', 'mine', '$2y$10$zclNAloqVCkM3YOA5Am8NugfKzz/gLfMXWKmGRFpxKZdHyjWQanKu', 'mine123@gmail.com', 'dmine123@gmail.com', 41, '2', 'https://www.w3schools.com/jquery/jquery_get_started.asp', 'https://www.w3schools.com/jquery/jquery_get_started.asp', '65432109876', 'html,larevel', 'graduate', '2024-06-18', '2024-06-19 04:04:11', '2024-06-30 22:58:26', 'accepted'),
(23, '23', 'bhaviya', '$2y$10$AtzR7ib2cNyw2h481WKDcO8GyOS6yXX9.Yt.F7.F0xrhxfDZC/7hS', 'bhaviya123@gmail.com', 'joe123@gmail.com', 311, '5', 'https://www.w3schools.com/jquery/jquery_get_started.asp', 'https://www.w3schools.com/jquery/jquery_get_started.asp', '34521098765', 'laravel', 'bsc', '2024-06-17', '2024-06-19 05:14:32', '2024-07-08 03:39:29', 'accepted'),
(25, '78', 'bhavani', '$2y$10$ynzEAi5Ampa31P8ECKxnvORBGkyovdGdj9Lojqaj7DSVZVm.CPKlS', 'shaik67@gmail.com', 'shaik98@gmail.com', 1234, '5', 'https://www.w3schools.com/jquery/jquery_get_started.asp', 'https://www.w3schools.com/jquery/jquery_get_started.asp', '98765432110', 'laravell', 'Professor', '2024-06-21', '2024-06-19 22:20:50', '2024-07-08 03:32:16', 'accepted'),
(31, '31', 'monika', '$2y$10$Af7TzeWdWBXXGExYsN9TK..yvdmfu0rWtW2EcnIZDaBzCamcEPqEm', 'dhatchu1810@gmail.com', 'dhatchu1812@gmail.com', 5, '22', 'https://www.w3schools.com/jquery/jquery_get_started.asp', 'https://www.w3schools.com/jquery/jquery_get_started.asp', '12345678900', 'laravel', 'bsc', '2024-06-20', '2024-06-19 22:38:37', '2024-06-26 04:09:43', 'rejected'),
(40, '40', 'aakash', '$2y$10$jW15wvQgOg2bx/lJwTzfk.QfjlcgGJLiRniuuuBcLNdfWPF4oyCMK', 'akash@gmail.com', 'ak123@gmail.com', 2217, '2', 'https://www.youtube.com/watch?v=5jEfqht9k6o&list=RD5jEfqht9k6o&start_radio=1', 'https://www.youtube.com/watch?v=5jEfqht9k6o&list=RD5jEfqht9k6o&start_radio=1', '8939008355', 'html,css,jvascript,php', 'Web developer', '2024-08-02', '2024-07-18 02:30:59', '2024-07-27 00:55:14', 'accepted');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_04_100058_create_member_table', 2),
(6, '2024_06_04_100624_create_members_table', 3),
(8, '2024_06_06_082320_create_students_table', 4),
(9, '2024_06_07_092938_add_bioid_to_members__table', 5),
(10, '2024_06_07_101833_create_members_table', 6),
(11, '2024_06_20_064001_add_status_to_members__table', 7),
(12, '2024_06_20_095953_add_status_to_students__table', 8),
(13, '2024_06_22_080946_create_roles_table', 9),
(14, '2024_06_22_085518_create_roles_table', 10),
(15, '2024_06_22_090146_create_roles_table', 11),
(16, '2024_06_23_162841_create_batches_table', 12),
(17, '2024_06_23_164856_create_teams_table', 13),
(18, '2024_06_24_080221_create_batches_table', 14),
(19, '2024_06_24_080232_create_teams_table', 14),
(20, '2024_06_24_094507_create_batches_table', 15),
(21, '2024_06_24_094652_create_batches_table', 16),
(22, '2024_06_26_144957_create_projects_table', 17),
(23, '2024_06_26_172432_create_projects_table', 18),
(24, '2024_06_26_173613_create_projects_table', 19),
(25, '2024_06_27_053924_create_projects_table', 20),
(26, '2024_06_27_060147_create_projects_table', 21),
(27, '2024_06_28_091133_create_developers_to_project', 22),
(28, '2024_06_28_092545_create_enddate_to_project', 23),
(29, '2024_07_01_044957_create_faculties_table', 24),
(30, '2024_07_02_042820_create_team_to_project', 25),
(31, '2024_07_04_101244_add_member_id_to_students_table', 26),
(32, '2024_07_08_040804_create_title_to_students__table', 27),
(33, '2024_07_08_041129_create_title_to_students__table', 28),
(34, '2024_07_19_035632_create_tasks_table', 29);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('student@gmail.com', '$2y$10$2XwVS40cw1PRTolXXy35g.o1wzaYgMX9Wg70p1oul1.tlZICwS71i', '2024-05-20 10:11:35');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `source` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `developers` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `platform` varchar(255) DEFAULT NULL,
  `batch_year` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `team` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `source`, `description`, `created_at`, `updated_at`, `developers`, `start_date`, `student_name`, `platform`, `batch_year`, `status`, `end_date`, `team`) VALUES
(1, 'Optimizing Doctor Availability and Appointment Allocation in Hospitals through Digital Technology and Al Integration.\n', 'https://arms.sse.saveetha.com', 'Optimizing doctor availability and appointment allocation in hospitals through digital technology and AI involves implementing intelligent scheduling systems that automate and enhance scheduling efficiency. By leveraging real-time data, predictive algorit', '2024-06-27 00:32:58', '2024-07-03 21:53:36', 'mine', '2024-07-02', 'dhatchu', 'linkedin', '4 year', 'accepted', '2024-08-01', 'laravel'),
(2, 'Use of Digital Technology to calculate water footprints for different daily use items.\n', 'https://arms.sse.saveetha.com', '\nDigital technology calculates water footprints for various daily use items by analyzing data on water consumption across their entire lifecycle. Advanced software and apps use this data to provide accurate insights into the water used in production, transportation, and disposal, helping consumers and businesses make more informed, water-efficient choices.', '2024-06-28 03:05:49', '2024-07-03 21:51:51', 'member', '2024-07-03', 'Shaik Hussain', 'linkedin', '3rd year', 'rejected', '2024-07-03', 'laravel'),
(3, 'Application Development for monitoring of wool from Farm to fabric\n', 'https://arms.sse.saveetha.com', 'Application development for monitoring wool from farm to fabric involves creating software that tracks wool\'s journey through all stages of production. This includes farm management, processing, and manufacturing, ensuring quality and traceability while enhancing transparency and efficiency in the wool supply chain.', '2024-07-01 03:18:53', '2024-07-03 03:28:04', 'joe', '2024-07-18', 'hemanth', 'linkedin', '4th year', 'accepted', '2024-07-19', 'kalesha');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'kalesha', '2024-06-24 00:18:27', '2024-06-24 00:18:27'),
(4, 'kalesha', '2024-06-24 04:02:58', '2024-06-24 04:02:58'),
(5, 'kalesha', '2024-06-28 01:59:08', '2024-06-28 01:59:08'),
(6, 'kalesha', '2024-06-28 02:06:33', '2024-06-28 02:06:33'),
(7, 'kalesha', '2024-06-28 02:08:34', '2024-06-28 02:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `regno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `project_title` varchar(255) DEFAULT NULL,
  `project_description` varchar(500) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `batch_year` varchar(255) NOT NULL,
  `mentor_name` varchar(255) NOT NULL,
  `mentor_number` varchar(255) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `member_id`, `regno`, `name`, `email`, `project_title`, `project_description`, `password`, `department`, `batch_year`, `mentor_name`, `mentor_number`, `student_number`, `created_at`, `updated_at`, `status`) VALUES
(1, 2, '123', 'shaik', 'shaik@gmail.com', 'e-learning management system', 'e-learning management system', '$2y$10$P9UyEui1j5uvDBFwVRB/BuLvAeLxYkjuActM63OqFf0kpfbODgniK', 'CSE', '3/4', 'gayathri', '1234567890', '1234567890', '2024-06-06 04:11:25', '2024-07-07 23:04:02', 'accepted'),
(2, 2, '2', 'dhatchu', 'dhatchumah@gmail.com', 'real estrate', 'gafvghvgaf', '$2y$10$cssaj/uC.x.EMPFw5e3K7.VQyfgi96EXmM7HjIuhPSap8zldik5Gi', 'bcs', '5/3', 'dhatchu mam', '3210976549', '9867654312', '2024-06-06 10:21:02', '2024-07-08 02:26:22', 'pending'),
(12, 23, '12', 'Shaik Afroz', 'afrozshaik1450@gmail.com', NULL, NULL, '81210547', 'CSE', '5/4', 'Thinakaran', '9876543212', '8121054754', '2024-06-29 02:57:20', '2024-07-08 03:24:11', 'rejected'),
(29, 23, '29', 'dhatchu', 'admin99@gmail.com', 'kalesha', 'kqwertgbvcdspoiuytrewqasdfghjknsjsjccnjkbsc jcdkjcbjsdncw', '$2y$10$uO.dh5eCCbMcR6qlpX417uJSyUcCVTy1Z1.L.fXZ1BU/YSbfj0u72', 'bcs', '5/3', 'dhatchu mam', '3210976549', '6543210987', '2024-06-06 21:35:23', '2024-07-08 03:21:43', 'accepted'),
(30, 40, '30', 'Shaik Hussain', 'hussain123@gmail.com', 'Use of Digital Technology to calculate water footprints for different daily use items.', 'Digital technology calculates water footprints for various daily use items by analyzing data on water consumption across their entire lifecycle. Advanced software and apps use this data to provide accurate insights into the water used in production, transportation, and disposal, helping consumers and businesses make more informed, water-efficient choices.', '$2y$10$1CXYjTpNJKGWwSU5189jeOgKcvbdtyra2Zl8kd1VtF1EQyil5OoTK', 'CSE', '5/4', 'Arunachalam', '1234321342', '9392462210', '2024-06-07 21:28:58', '2024-07-22 00:23:13', 'rejected'),
(39, 20, '39', 'hemanth', 'hemanth123@gmail.com', 'kalesha', 'gafvghvgafwefghj', '$2y$10$6XyM38/1hIper8WyFFRgXOP7rWVAUlKoCKXZkl5VXpMZPbiA4e.K6', 'Data Science', '5/4', 'gayathri', '9876543210', '7654321098', '2024-06-29 00:25:19', '2024-07-08 23:28:24', 'rejected'),
(45, 40, '45', 'kunna', 'kunna@gmail.com', 'Optimizing Doctor Availability and Appointment Allocation in Hospitals through Digital Technology and Al Integration.', 'Optimizing doctor availability and appointment allocation in hospitals through digital technology and AI involves implementing intelligent scheduling systems that automate and enhance scheduling efficiency. By leveraging real-time data, predictive algorit', '$2y$10$sNpDpr7eTuk59GB95NlrV.eLP2XV.tin7TPxzzTSzwrubpuWgNMYS', 'bcs', '5/4', 'dhatchu mam', '9876543210', '6543216789', '2024-07-08 02:19:24', '2024-07-21 23:54:43', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL DEFAULT 'null',
  `task_date` varchar(255) NOT NULL DEFAULT 'null',
  `eta` varchar(255) NOT NULL DEFAULT 'null',
  `completed_date` varchar(255) NOT NULL DEFAULT 'null',
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `student_id`, `member_id`, `title`, `description`, `task_name`, `task_date`, `eta`, `completed_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 40, 'abc', 'qwertyuiopasdfghjklzxcvbnm', '1.wdwuhu,2.djihodjiod,3.jiijdi', '7/22/2024', '7/23/2024', '7/25/2024', 'pending', '2024-07-21 22:10:46', '2024-07-21 22:10:46'),
(2, NULL, NULL, 'projet management system', 'poiuytrewqasdfghjkl,mnbvcxzasdfg', '1.hii,2.eirjeijr,3.eoirjiej', '2024-07-22', '2024-07-23', '2024-07-26', 'onprogress', '2024-07-21 23:05:22', '2024-07-21 23:05:22'),
(3, NULL, NULL, 'projet management system', 'poiuytrewqasdfghjkl,mnbvcxzasdfg', '1.hii,2.eirjeijr,3.eoirjiej', '2024-07-22', '2024-07-23', '2024-07-26', 'onprogress', '2024-07-21 23:06:34', '2024-07-21 23:06:34'),
(4, 45, 40, 'tre', 'ytre', '1.hii,2.eirjeijr,3.eoirjiej', '2024-07-23', '2024-07-24', '2024-07-26', 'completed', '2024-07-21 23:39:32', '2024-07-21 23:39:32'),
(5, 45, 40, 'oiuytre', 'oiytre', '1.hii,2.eirjeijr,3.eoirjiej', '2024-07-22', '2024-07-23', '2024-07-24', 'completed', '2024-07-21 23:42:05', '2024-07-21 23:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` varchar(255) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_id`, `team_name`, `created_at`, `updated_at`) VALUES
(1, '123', 'kalesha', '2024-06-24 03:36:38', '2024-06-24 03:36:38'),
(4, '122', 'kalesha', '2024-06-24 03:59:15', '2024-06-24 03:59:15'),
(5, '122', 'kalesha', '2024-06-24 03:59:23', '2024-06-24 03:59:23'),
(6, '123', 'kalesha', '2024-06-24 04:01:41', '2024-06-24 04:01:41'),
(7, '123', 'kalesha', '2024-06-24 04:49:26', '2024-06-24 04:49:26'),
(8, '123', 'kalesha', '2024-06-24 22:09:52', '2024-06-24 22:09:52'),
(9, '123', 'laravel', '2024-06-28 03:11:20', '2024-06-28 03:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `member_id`, `name`, `email`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$CVGy/v2uT5tdRofCsjkd3e/5RK24coQKgTQ.Vs7EwbQh6EG24laYG', 'ISUoHBU4QFqBZqcO9g7yzWpKaimvcVhA2uGLI1i5JIkm2s4m25yqCiWXyBxf', '2024-05-08 23:42:34', '2024-05-08 23:42:34'),
(2, NULL, 'student', 'student@gmail.com', 'student', NULL, '$2y$10$CVGy/v2uT5tdRofCsjkd3e/5RK24coQKgTQ.Vs7EwbQh6EG24laYG', NULL, '2024-05-08 23:45:43', '2024-05-08 23:45:43'),
(4, NULL, 'member', 'member@gmail.com', 'member', NULL, '$2y$10$CVGy/v2uT5tdRofCsjkd3e/5RK24coQKgTQ.Vs7EwbQh6EG24laYG', NULL, '2024-06-03 03:15:13', '2024-06-03 03:15:13'),
(28, NULL, 'mohammed hussian', 'kalesha@gmail.com', 'student', NULL, '$2y$10$CVGy/v2uT5tdRofCsjkd3e/5RK24coQKgTQ.Vs7EwbQh6EG24laYG', NULL, '2024-06-29 00:20:07', '2024-06-29 00:20:07'),
(29, NULL, 'Shaik Hussain', 'hussain123@gmail.com', 'student', NULL, '$2y$10$/xJLhLNN.Ft0MuhMhSkiGuhf14GJK7zd3irBVgw/9mUwhHCuYarge', NULL, '2024-06-29 00:20:33', '2024-06-29 00:20:33'),
(31, NULL, 'dhatchu', 'admin99@gmail.com', 'student', NULL, '$2y$10$djmOz5J016aiarJDvQgCdOlIkQfQc.KtEDA6BRmrFwre.zKFQRipO', NULL, '2024-06-29 00:21:10', '2024-06-29 00:21:10'),
(34, NULL, 'kalesha', 'admin7889@gmail.com', 'student', NULL, '$2y$10$.tiqrKRTbIsjJZM3m6HT3OQQJ0DJEJjDhFc7cz9huBJJE.dy/RxIm', NULL, '2024-06-29 00:26:59', '2024-06-29 00:26:59'),
(73, 2, 'indumah', 'kalesha123@gmail.com', 'developer', NULL, '$2y$10$5caBhqO467YPuVfWpef/Kedfpi2cOV84kWYwy7esa9c1WpMO8qwRC', NULL, '2024-06-30 22:58:13', '2024-07-08 04:42:46'),
(75, NULL, 'joe', 'joe123@gmail.com', 'tl', NULL, '$2y$10$GANjRa4D6vHMf/iS1/SIRumX9v4snVC7gKc4DGb09onBx5pGZMvQu', NULL, '2024-07-01 00:54:00', '2024-07-01 00:54:00'),
(82, NULL, 'indhira', 'indhira123@gmail.com', 'member', NULL, '$2y$10$xgPK7/jFsw0flY9AsaclfOL424k3qGgfcVamY1g6v6cznmGp8YxqS', NULL, '2024-07-08 00:38:58', '2024-07-18 00:57:05'),
(87, NULL, 'kunna', 'kunna@gmail.com', 'student', NULL, '$2y$10$CVGy/v2uT5tdRofCsjkd3e/5RK24coQKgTQ.Vs7EwbQh6EG24laYG', NULL, '2024-07-08 03:22:15', '2024-07-08 03:22:15'),
(89, 25, 'bhavani', 'shaik67@gmail.com', 'developer', NULL, '$2y$10$ynzEAi5Ampa31P8ECKxnvORBGkyovdGdj9Lojqaj7DSVZVm.CPKlS', NULL, '2024-07-08 03:32:16', '2024-07-18 10:49:46'),
(91, 20, 'mine', 'mine123@gmail.com', 'member', NULL, '$2y$10$CVGy/v2uT5tdRofCsjkd3e/5RK24coQKgTQ.Vs7EwbQh6EG24laYG', NULL, '2024-07-08 04:42:50', '2024-07-08 04:42:50'),
(92, 23, 'bhaviya', 'bhaviya123@gmail.com', 'member', NULL, '$2y$10$CVGy/v2uT5tdRofCsjkd3e/5RK24coQKgTQ.Vs7EwbQh6EG24laYG', NULL, '2024-07-08 04:42:54', '2024-07-08 04:42:54'),
(94, 40, 'aakash', 'akash@gmail.com', 'member', NULL, '$2y$10$CVGy/v2uT5tdRofCsjkd3e/5RK24coQKgTQ.Vs7EwbQh6EG24laYG', NULL, '2024-07-18 02:31:10', '2024-07-18 02:31:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_bioid_unique` (`bioid`),
  ADD UNIQUE KEY `members_password_unique` (`password`),
  ADD UNIQUE KEY `members_personalemail_unique` (`personalemail`),
  ADD UNIQUE KEY `members_officialemail_unique` (`officialemail`),
  ADD UNIQUE KEY `members_employeeid_unique` (`employeeid`),
  ADD UNIQUE KEY `members_mobilenumber_unique` (`mobilenumber`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_regno_unique` (`regno`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_password_unique` (`password`),
  ADD UNIQUE KEY `students_student_number_unique` (`student_number`),
  ADD KEY `students_member_id_foreign` (`member_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_student_id_foreign` (`student_id`),
  ADD KEY `tasks_member_id_foreign` (`member_id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tasks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
