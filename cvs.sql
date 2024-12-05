-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2024 at 02:08 PM
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
-- Database: `cvs`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant_certificate`
--

CREATE TABLE `applicant_certificate` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` bigint(20) UNSIGNED NOT NULL,
  `certificate_name` varchar(255) NOT NULL,
  `issuing_organization` varchar(255) NOT NULL,
  `issue_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personal_info_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `issuing_organization` varchar(255) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `personal_info_id`, `name`, `issuing_organization`, `issue_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cisco Certified Network Associate (CCNA)', 'Cisco', '2024-08-05', '2024-12-05 01:33:28', '2024-12-05 01:33:28'),
(2, 2, 'Cisco Certified Network Associate (CCNA)', 'Cisco', '2024-11-28', '2024-12-05 01:45:09', '2024-12-05 01:45:09'),
(8, 3, 'Cisco Certified Network Associate (CCNA)', 'Cisco', '2024-12-01', '2024-12-05 03:15:01', '2024-12-05 03:15:01'),
(10, 6, 'Cisco Certified Network Associate (CCNA)', 'Cisco', '2024-11-28', '2024-12-05 03:53:14', '2024-12-05 03:53:14'),
(15, 8, 'Cisco Certified Network Associate (CCNA)', 'Cisco', '2024-11-28', '2024-12-05 04:54:26', '2024-12-05 04:54:26'),
(16, 7, 'Cisco Certified Network Associate (CCNA)', 'Cisco', '2024-11-28', '2024-12-05 04:56:06', '2024-12-05 04:56:06'),
(17, 7, 'Leverage Knowledge and Digital Skills in Digital Workplace (LKDSDW)', 'Baliwag Polytechnic College (BTECH)', '2020-04-26', '2024-12-05 04:56:06', '2024-12-05 04:56:06'),
(18, 7, '2 nd Virtual Research Colloquium: Cultivating Research Culture, Opportunities and Possibilities through Innovation and Sustainability', NULL, NULL, '2024-12-05 04:56:06', '2024-12-05 04:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personal_info_id` bigint(20) UNSIGNED NOT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `Educlevel` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `graduation_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `personal_info_id`, `degree`, `school_name`, `Educlevel`, `start_date`, `graduation_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bachelor of Science And Information Technology', 'Baliwag Polytechnic College', 'College', '2021-08-05', NULL, '2024-12-05 01:33:28', '2024-12-05 01:33:28'),
(2, 2, 'Bachelor of Science And Information Technology', 'Baliwag Polytechnic College', 'College', '2021-08-05', NULL, '2024-12-05 01:45:09', '2024-12-05 01:45:09'),
(8, 3, 'Bachelor of Science and Information and Technology', 'Baliuag Polytechnic College', 'College', '2021-08-05', NULL, '2024-12-05 03:15:00', '2024-12-05 03:15:00'),
(9, 3, 'Stem', 'Baliuag University', 'Senior High School', '2018-01-01', '2021-01-01', '2024-12-05 03:15:01', '2024-12-05 03:15:01'),
(10, 3, NULL, 'Mariano Ponce National High Schoo', 'Junior High School', '2014-01-01', '2018-01-01', '2024-12-05 03:15:01', '2024-12-05 03:15:01'),
(11, 3, NULL, 'Jacinto Ponce Elementary School', 'Elementary', '2009-01-01', '2014-01-01', '2024-12-05 03:15:01', '2024-12-05 03:15:01'),
(13, 6, 'Bachelor of Science And Information Technology', 'Dalubhasaang Politekniko ng Lungsod ng Baliwag Baliwag, Bulacan', 'College', '2021-02-08', NULL, '2024-12-05 03:53:14', '2024-12-05 03:53:14'),
(14, 6, NULL, 'Guiguinto National Vocational High School', 'Junior High School', '2015-01-01', '2021-02-08', '2024-12-05 03:53:14', '2024-12-05 03:53:14'),
(15, 6, NULL, 'Guiguinto Elementary School', 'Elementary', '2009-01-01', '2015-01-01', '2024-12-05 03:53:14', '2024-12-05 03:53:14'),
(26, 8, 'Bachelor of Science And Information Technology', 'Baliwag Polytechnic College', 'College', '2021-08-05', NULL, '2024-12-05 04:54:25', '2024-12-05 04:54:25'),
(27, 7, 'Bachelor of Science and Information and Technology', 'Baliuag Polytechnic College', 'College', '2021-08-05', NULL, '2024-12-05 04:56:05', '2024-12-05 04:56:05'),
(28, 7, NULL, 'Bachelor of Theology Ministerial Education', 'Senior High School', NULL, '2020-01-01', '2024-12-05 04:56:06', '2024-12-05 04:56:06'),
(29, 7, NULL, 'Biblical Studies Major in Theology', 'Junior High School', NULL, '2018-01-01', '2024-12-05 04:56:06', '2024-12-05 04:56:06'),
(30, 7, NULL, 'Mariano Ponce National High School', 'Elementary', NULL, '2010-01-01', '2024-12-05 04:56:06', '2024-12-05 04:56:06'),
(31, 7, NULL, 'Concepcion Elementary School', NULL, NULL, '2006-01-01', '2024-12-05 04:56:06', '2024-12-05 04:56:06');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(20, '0001_01_01_000000_create_users_table', 1),
(21, '0001_01_01_000001_create_cache_table', 1),
(22, '0001_01_01_000002_create_jobs_table', 1),
(23, '2024_11_29_044250_create_user_system_table', 1),
(25, '2024_11_29_000001_create_personal_infos_table', 2),
(26, '2024_11_29_131734_create_applicant_certificate_table', 2),
(27, '2024_11_29_150948_create_skills_table', 2),
(28, '2024_11_29_150949_create_work_experiences_table', 2),
(29, '2024_11_29_150950_create_educations_table', 2),
(30, '2024_11_29_150958_create_certificates_table', 2),
(31, '2024_12_02_162116_create__creator_resume', 3);

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
-- Table structure for table `personal_infos`
--

CREATE TABLE `personal_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `Objective` varchar(255) DEFAULT NULL,
  `Facebook` varchar(255) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `Marital_Status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_infos`
--

INSERT INTO `personal_infos` (`id`, `first_name`, `last_name`, `email`, `phone`, `linkedin_url`, `address`, `image`, `Objective`, `Facebook`, `BirthDate`, `Height`, `weight`, `Marital_Status`, `created_at`, `updated_at`) VALUES
(1, 'John Kenneth', 'Sedo', 'kennethsedo11@gmail.com', '09500686170', NULL, 'Sta Barbara Baliwag Bulacan', 'uploads/images/1733391208.jpg', 'Aspiring IT professional pursuing a Bachelor’s degree in Information Technology, aiming to contribute to a forward-thinking organization by utilizing skills in network administration, system troubleshooting, and data analysis', 'https://www.facebook.com/Kentskie05', '2001-09-05', '170', '49', 'Single', '2024-12-05 01:33:28', '2024-12-05 01:33:28'),
(2, 'Bryan', 'Dela Cruz', 'bryandelacruz1818@gmail.com', '09998747863', NULL, 'Rafaela Homes', 'uploads/images/1733391909.jpg', 'Dedicated professional seeking to leverage skills and experience to contribute to the success of a dynamic organization.', 'https://www.facebook.com/Lilyan999.delacruz?mibextid=ZbWKwL', '2001-01-18', '172', '78', 'Single', '2024-12-05 01:45:09', '2024-12-05 01:45:09'),
(3, 'KYLLE', 'Dela Cruz', 'kyllem.delacruz@gmail.com', '094956878965', NULL, 'Pagala, Baliwag, Bulacan', 'uploads/images/1733394674.jpg', 'Motivated college student seeking an entry-level position at Mang Inasal to gain hands-on experience in the food\r\nservice industry.', NULL, '2002-01-01', '158', '69', 'Single', '2024-12-05 02:31:14', '2024-12-05 02:43:58'),
(6, 'Mark Trojan', 'Manikat', 'marktrojanmanikat@gmail.com', '09109244832', NULL, 'Tabang, Plaridel, Bulacan, Philippines', 'uploads/images/1733398976.png', 'Seeking to leverage design skills to enhance user experiences and contribute to innovative digital products.', NULL, '2003-02-07', '158', '69', 'Single', '2024-12-05 03:42:56', '2024-12-05 03:53:13'),
(7, 'RYAN', 'ALCOBER', 'N@A', '09977820415', NULL, 'Baliuag, Bulacan', 'uploads/images/1733400133.jpg', 'To finish my bachelor’s degree and find a job that will greatly help me learn new skills and gain experience.', NULL, '1999-01-01', '172', '72', 'Single', '2024-12-05 04:02:13', '2024-12-05 04:09:19'),
(8, 'John Michael', 'Bondoc', 'johnmichaelbondoc04@gmail.com', '09685374218', NULL, '73 ilang ilang east calantipe apalit pampanga', 'uploads/images/1733402430.jpg', 'Simple and passionate about applying my skills to help a team succeed.', NULL, '2003-06-23', '168', '63', 'Single', '2024-12-05 04:40:30', '2024-12-05 04:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('62YdMfdJaVlDIN1fRWXdakCxCvjTq6OAX8hcN3Fl', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU2o1UWVLZThhM2JsZDRnSDFBcDZRMVBRQXV0OVJOT3JIcU5FVklGTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1733404047);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personal_info_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `personal_info_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Problem-solving and Critical Thinking', '2024-12-05 01:33:28', '2024-12-05 01:33:28'),
(2, 1, 'Time Management and Organization', '2024-12-05 01:33:28', '2024-12-05 01:33:28'),
(3, 1, 'Team Collaboration and Communication', '2024-12-05 01:33:28', '2024-12-05 01:33:28'),
(4, 1, 'Attention to Detail', '2024-12-05 01:33:28', '2024-12-05 01:33:28'),
(5, 1, 'Adaptability and Willingness to Learn', '2024-12-05 01:33:28', '2024-12-05 01:33:28'),
(6, 2, 'Teamwork', '2024-12-05 01:45:09', '2024-12-05 01:45:09'),
(7, 2, 'LAN/WAN setup, TCP/IP, Network Security, Routing, and Switching', '2024-12-05 01:45:09', '2024-12-05 01:45:09'),
(8, 2, 'Vulnerability Assessment, Firewalls, Encryption Techniques', '2024-12-05 01:45:09', '2024-12-05 01:45:09'),
(19, 3, 'Willingness to Learn', '2024-12-05 03:15:00', '2024-12-05 03:15:00'),
(20, 3, 'Communication Skills', '2024-12-05 03:15:00', '2024-12-05 03:15:00'),
(21, 3, 'Positive Attitude', '2024-12-05 03:15:00', '2024-12-05 03:15:00'),
(22, 3, 'Time Management', '2024-12-05 03:15:00', '2024-12-05 03:15:00'),
(26, 6, 'UI/UX Design', '2024-12-05 03:53:13', '2024-12-05 03:53:13'),
(27, 6, 'Wireframing and Prototyping', '2024-12-05 03:53:13', '2024-12-05 03:53:13'),
(28, 6, 'Visual Design Tools (e.g., Figma, Adobe XD)', '2024-12-05 03:53:13', '2024-12-05 03:53:13'),
(29, 6, 'Visual Design Tools (e.g., Figma, Adobe XD)', '2024-12-05 03:53:14', '2024-12-05 03:53:14'),
(30, 6, 'Microsoft Office (e.g., Word, Excel, Powerpoint)', '2024-12-05 03:53:14', '2024-12-05 03:53:14'),
(42, 8, 'Communication', '2024-12-05 04:54:25', '2024-12-05 04:54:25'),
(43, 8, 'Prototyping', '2024-12-05 04:54:25', '2024-12-05 04:54:25'),
(44, 8, 'Positive Attitude', '2024-12-05 04:54:25', '2024-12-05 04:54:25'),
(45, 8, 'Willingness to Learn', '2024-12-05 04:54:25', '2024-12-05 04:54:25'),
(46, 7, 'Communication', '2024-12-05 04:56:05', '2024-12-05 04:56:05'),
(47, 7, 'Driving', '2024-12-05 04:56:05', '2024-12-05 04:56:05'),
(48, 7, 'Time Management', '2024-12-05 04:56:05', '2024-12-05 04:56:05'),
(49, 7, 'Multi-Tasking', '2024-12-05 04:56:05', '2024-12-05 04:56:05');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_system`
--

CREATE TABLE `user_system` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(15) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_system`
--

INSERT INTO `user_system` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `number`, `role`, `created_at`, `updated_at`) VALUES
(3, 'John Kenneth', 'Sedo', 'kenneth', '$2y$12$zg0dMGi71TA4NF8SO/tKxuyt4v.eQLTBaxs1egha7EJRVEL4rEbni', 'kennethsedo11@gmail.com', '09500686170', 'admin', '2024-12-05 01:05:47', '2024-12-05 01:05:47'),
(4, 'Bryan', 'Dela Cruz', 'bryancruz', '$2y$12$YIlJgS0sYZ0z5dmz1xz.NO3w3YN1WKHhhmikS6ViuihThDnMv4Jbe', 'bryandelacruz1818@gmail.com', '09998747863', 'user', '2024-12-05 01:07:34', '2024-12-05 05:06:10');

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personal_info_id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`id`, `personal_info_id`, `job_title`, `company_name`, `location`, `start_date`, `end_date`, `responsibilities`, `created_at`, `updated_at`) VALUES
(6, 3, 'Bartender', 'TEAcher Milk Tea Shop Baliuag Branch', 'Baliwag Bulacan', '2021-01-01', '2024-01-01', '- Assist in preparing a variety of milk tea and other drinks, learning recipes and techniques under\r\nsupervision.\r\n- Greet customers warmly, take orders, and provide recommendations to enhance their experience.\r\n- Maintain a clean and organized shop area, ensuring all tools and equipment are properly sanitized.', '2024-12-05 03:15:00', '2024-12-05 03:15:00'),
(16, 7, 'Manager', 'Aqua Cool Water Refilling Station', NULL, '2012-01-01', '2014-01-01', NULL, '2024-12-05 04:56:05', '2024-12-05 04:56:05'),
(17, 7, 'Helper', 'Bernard’s Glass and Aluminum', NULL, '2014-01-01', '2016-01-01', NULL, '2024-12-05 04:56:05', '2024-12-05 04:56:05'),
(18, 7, 'Jail Aide', 'Baliwag Municipal Jail', 'Baliwag Bulacan', '2016-01-01', '2018-01-01', NULL, '2024-12-05 04:56:05', '2024-12-05 04:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `_creator_resume`
--

CREATE TABLE `_creator_resume` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `personal_info_id` bigint(20) UNSIGNED DEFAULT NULL,
  `CreatorResume` bigint(20) UNSIGNED DEFAULT NULL,
  `Link` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `application_link` varchar(255) DEFAULT NULL,
  `link_type` varchar(255) DEFAULT NULL,
  `scheduled_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `_creator_resume`
--

INSERT INTO `_creator_resume` (`id`, `personal_info_id`, `CreatorResume`, `Link`, `Status`, `application_link`, `link_type`, `scheduled_date`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'http://127.0.0.1:8000/view_cv/1', 'Created', 'http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=cvs&table=certificates', 'job_application', '2024-12-05 11:45:00 AM', '2024-12-05 01:33:28', '2024-12-05 03:45:41'),
(2, 2, 4, NULL, 'Created', NULL, NULL, NULL, '2024-12-05 01:45:09', '2024-12-05 01:45:09'),
(3, 3, 4, NULL, 'Created', NULL, NULL, NULL, '2024-12-05 02:31:14', '2024-12-05 02:31:14'),
(4, 6, 3, 'http://127.0.0.1:8000/view_cv/6', 'Created', NULL, NULL, NULL, '2024-12-05 03:42:56', '2024-12-05 03:42:56'),
(5, 7, 3, 'http://127.0.0.1:8000/view_cv/7', 'Created', NULL, NULL, NULL, '2024-12-05 04:02:14', '2024-12-05 04:02:14'),
(6, 8, 3, 'http://127.0.0.1:8000/view_cv/8', 'Created', NULL, NULL, NULL, '2024-12-05 04:40:30', '2024-12-05 04:40:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_certificate`
--
ALTER TABLE `applicant_certificate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_certificate_applicant_id_foreign` (`applicant_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_personal_info_id_foreign` (`personal_info_id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `educations_personal_info_id_foreign` (`personal_info_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_infos`
--
ALTER TABLE `personal_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_infos_email_unique` (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skills_personal_info_id_foreign` (`personal_info_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_system`
--
ALTER TABLE `user_system`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_system_username_unique` (`username`),
  ADD UNIQUE KEY `user_system_email_unique` (`email`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_experiences_personal_info_id_foreign` (`personal_info_id`);

--
-- Indexes for table `_creator_resume`
--
ALTER TABLE `_creator_resume`
  ADD PRIMARY KEY (`id`),
  ADD KEY `_creator_resume_personal_info_id_foreign` (`personal_info_id`),
  ADD KEY `CreatorResume` (`CreatorResume`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_certificate`
--
ALTER TABLE `applicant_certificate`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `personal_infos`
--
ALTER TABLE `personal_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_system`
--
ALTER TABLE `user_system`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `_creator_resume`
--
ALTER TABLE `_creator_resume`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant_certificate`
--
ALTER TABLE `applicant_certificate`
  ADD CONSTRAINT `applicant_certificate_applicant_id_foreign` FOREIGN KEY (`applicant_id`) REFERENCES `personal_infos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_personal_info_id_foreign` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_infos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `educations`
--
ALTER TABLE `educations`
  ADD CONSTRAINT `educations_personal_info_id_foreign` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_infos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_personal_info_id_foreign` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_infos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD CONSTRAINT `work_experiences_personal_info_id_foreign` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_infos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `_creator_resume`
--
ALTER TABLE `_creator_resume`
  ADD CONSTRAINT `_creator_resume_ibfk_1` FOREIGN KEY (`CreatorResume`) REFERENCES `user_system` (`id`),
  ADD CONSTRAINT `_creator_resume_personal_info_id_foreign` FOREIGN KEY (`personal_info_id`) REFERENCES `personal_infos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
