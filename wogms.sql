-- phpMyAdmin SQL Dump
-- version 5.2.0-rc1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 02:44 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wogms`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `description`, `amount`, `created_at`, `updated_at`, `month`) VALUES
(1, '23', 23, '2022-02-17 14:12:00', '2022-02-17 14:12:00', ''),
(2, 'glow stikcing it  th=oo the', 44, '2022-02-17 14:14:18', '2022-02-17 14:14:18', ''),
(3, 'grloieie', 122, '2022-01-17 16:10:11', '2022-02-17 14:14:54', ''),
(4, 'screw sets', 12, '2022-02-17 14:53:19', '2022-02-17 14:53:19', 'February'),
(5, 'Bought microphone cone', 30, '2022-02-22 16:09:51', '2022-02-22 16:09:51', 'February'),
(6, 'for games', 50, '2022-03-06 12:07:37', '2022-03-06 12:07:37', 'March'),
(7, 'kjiu', 56, '2022-03-06 12:09:58', '2022-03-06 12:09:58', 'March');

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
-- Table structure for table `game_changer_dues`
--

CREATE TABLE `game_changer_dues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `game_changer_dues`
--

INSERT INTO `game_changer_dues` (`id`, `fullname`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Edwin Ofosuhene', 12, '2022-02-17 16:09:08', '2022-02-17 16:09:08'),
(2, 'Edwin Ofosuhene', 12, '2022-02-17 16:10:09', '2022-02-17 16:10:09'),
(3, 'ziqi@mailinatorm', 45, '2022-02-17 16:12:36', '2022-02-17 16:12:36'),
(4, 'Edwin Ofosuhene', 3, '2022-02-23 10:54:58', '2022-02-23 10:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `gc_contributions`
--

CREATE TABLE `gc_contributions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gc_contributions`
--

INSERT INTO `gc_contributions` (`id`, `fullname`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'Daniel', 'Daniel\'s Engagement', '20', NULL, NULL),
(2, 'Patricia Kumor', 'Daniel\'s Engagement', '56', '2022-03-16 11:19:34', NULL),
(3, 'Janet Jackson', 'Pastor Alex\'s Birthday', '34', '2022-03-16 11:22:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gc_contribution_projects`
--

CREATE TABLE `gc_contribution_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gc_contribution_projects`
--

INSERT INTO `gc_contribution_projects` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Pastor Alex\'s Birthday', '2022-02-23 17:02:03', '2022-02-23 17:02:03'),
(2, 'Daniel\'s Engagement', '2022-02-23 17:08:27', '2022-02-23 17:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `gc_expenses`
--

CREATE TABLE `gc_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gc_expenses`
--

INSERT INTO `gc_expenses` (`id`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'For T shirts', 30, '2022-02-23 12:05:19', '2022-02-23 12:05:19'),
(2, 'For certificates', 23, '2022-02-23 12:07:01', '2022-02-23 12:07:01'),
(3, 'Flat screen', 50, '2022-03-16 10:29:26', '2022-03-16 10:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `gc_offerings`
--

CREATE TABLE `gc_offerings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gc_offerings`
--

INSERT INTO `gc_offerings` (`id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 32, '2022-02-23 11:11:14', '2022-02-23 11:11:14'),
(2, 54, '2022-02-23 11:12:40', '2022-02-23 11:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `profileImg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hometown` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_stat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_stat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `next_of_kin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nok_contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_to_nok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_of_nok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baptism_stat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_baptised` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `yom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_occupation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_of_company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment_stat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `profileImg`, `fullname`, `dob`, `contact`, `gender`, `hometown`, `marital`, `region`, `residence`, `email`, `father_name`, `father_stat`, `mother_name`, `mother_stat`, `next_of_kin`, `nok_contact`, `relation_to_nok`, `email_of_nok`, `dept`, `baptism_stat`, `date_baptised`, `yom`, `profession`, `present_occupation`, `name_of_company`, `employment_stat`, `created_at`, `updated_at`) VALUES
(2, '1644343965.jpg', 'Benedict Cardenas', '1968-07-01', '04428482039', 'Male', 'Akyem Sobrepo', '', 'Ahafo', 'qefivaf@mailinator.com', 'rimar@mailinator.com', 'doruhupuvy@mailinator.com', 'dead', 'tigywapixi@mailinator.com', 'alive', 'dabac@mailinator.com', '+1 (163) 449-3045', 'tano@mailinator.com', '+1 (598) 847-5912', 'Men of valour', 'Yes', '2000-12-13', '1982', 'wujypy@mailinator.com', 'mumadug@mailinator.com', 'gevyduto@mailinator.com', 'Employee', '2022-02-08 18:12:45', '2022-02-08 18:12:45'),
(3, '090222-1644399696.jpg', 'Edwin Ofosuhene', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(4, '090222-1644399696.jpg', 'Erlick Buckman', '2009-06-18', '76543290', 'Male', 'Akyem Asene', 'Single', 'Ahafo', 'GV-043-2439', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Men of valour', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Employee', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(5, '090222-1644399696.jpg', 'linator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(6, '090222-1644399696.jpg', 'ziqi@mailinatorm', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(7, '090222-1644399696.jpg', 'ziqi@maiom', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(8, '090222-1644399696.jpg', 'ziqiailinator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(9, '090222-1644399696.jpg', 'ziqmailinator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(10, '090222-1644399696.jpg', 'ziqi@mailinatr.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(11, '090222-1644399696.jpg', 'ziqi@mailator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(12, '090222-1644399696.jpg', 'ziqi@mailtor.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(13, '090222-1644399696.jpg', 'ziqi@mailinato\\com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(14, '090222-1644399696.jpg', 'ziqi@m', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(15, '090222-1644399696.jpg', 'ziqi@mailor.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(16, '090222-1644399696.jpg', 'ziqinator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(17, '090222-1644399696.jpg', 'ziqi@mailinator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(18, '090222-1644399696.jpg', 'ziqi@mailin', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(19, '090222-1644399696.jpg', 'ziqi@mailinator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(20, '090222-1644399696.jpg', 'ziqi@mailinato', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(21, '090222-1644399696.jpg', 'zailinator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(22, '090222-1644399696.jpg', 'ziqi@mainator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(23, '090222-1644399696.jpg', 'ziqi@mailinator', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(24, '090222-1644399696.jpg', 'ziqi@mailinator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(25, '090222-1644399696.jpg', 'ailinator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Women of honour', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(26, '090222-1644399696.jpg', 'ziqi@mailinator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'g', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37'),
(27, '090222-1644399696.jpg', 'ziqi@mailinator.com', '2009-06-18', '+1 (176) 218-5527', 'Male', 'jagyf@mailinator.com', '', 'Central', 'tohe@mailinator.com', 'voraxu@mailinator.com', 'tere@mailinator.com', 'alive', 'dizytufylu@mailinator.com', 'alive', 'giqagalade@mailinator.com', '+1 (381) 121-7962', 'zyxezen@mailinator.com', '+1 (322) 385-5302', 'Game Changers Generation', 'Yes', '1994-10-09', '2007', 'vivybyxeno@mailinator.com', 'gogaf@mailinator.com', 'wowogymaq@mailinator.com', 'Unemployed', '2022-02-09 09:41:37', '2022-02-09 09:41:37');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_05_143851_create_members_table', 1),
(6, '2022_02_05_144237_create_tithes_table', 1),
(7, '2022_02_05_144311_create_offertories_table', 1),
(8, '2022_02_05_144331_create_welfares_table', 1),
(9, '2022_02_05_144355_create_expenses_table', 1),
(10, '2022_02_05_144523_create_game_changer_dues_table', 1),
(11, '2022_02_18_160521_create_wohs_table', 2),
(12, '2022_02_22_142752_create_welfare_expenses_table', 2),
(13, '2022_02_23_083847_create_gc_offerings_table', 3),
(14, '2022_02_23_113050_create_gc_expenses_table', 4),
(15, '2022_02_23_133520_create_gc_contributions_table', 5),
(16, '2022_02_23_165609_create_gc_contribution_projects_table', 6),
(17, '2022_03_16_132304_wohs_dues_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `offertories`
--

CREATE TABLE `offertories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offertories`
--

INSERT INTO `offertories` (`id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1223.00, '2022-02-09 17:04:22', '2022-02-09 17:04:22'),
(2, 90.00, '2022-04-09 17:12:14', '2022-02-09 17:12:14'),
(3, 144.00, '2022-01-09 17:24:36', '2022-02-09 17:24:36'),
(4, 13.00, '2022-05-09 17:40:13', '2022-02-09 17:40:13'),
(5, 43.23, '2022-02-09 17:40:28', '2022-02-09 17:40:28'),
(6, 1500.00, '2022-02-18 15:59:15', '2022-02-18 15:59:15');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tithes`
--

CREATE TABLE `tithes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tithes`
--

INSERT INTO `tithes` (`id`, `fullname`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'sasudibupi@mailinator.com', 20, '2022-02-11 13:13:51', '2022-02-11 13:13:51'),
(2, 'sasudibupi@mailinator.com', 5, '2022-02-17 11:14:35', '2022-02-17 11:14:35'),
(3, 'Edwin Ofosuhene', 15, '2022-02-17 13:20:20', '2022-02-17 13:20:20');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Edwin Ofosuhene', 'recordscloud0@gmail.com', NULL, '$2y$10$cOXTw1VNxE4VCZt6yY2Hr.Xim.VFmQvwXsB5QY4PEMNR9DxqvvF2e', NULL, '2022-02-09 15:10:38', '2022-02-09 15:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `welfares`
--

CREATE TABLE `welfares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `welfares`
--

INSERT INTO `welfares` (`id`, `month`, `year`, `fullname`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'February', '2022', 'Edwin Ofosuhene', '12', '2022-02-17 13:41:52', '2022-02-17 13:41:52'),
(2, 'February', '2022', 'Edwin Ofosuhene', '12', '2022-02-18 17:01:22', '2022-02-18 17:01:22'),
(3, 'February', '2022', 'Edwin Ofosuhene', '5', '2022-02-18 17:01:37', '2022-02-18 17:01:37'),
(4, 'February', '2022', 'Edwin Ofosuhene', '15', '2022-02-18 17:01:49', '2022-02-18 17:01:49'),
(5, 'February', '2022', 'sasudibupi@mailinator.com', '55', '2022-02-18 17:02:03', '2022-02-18 17:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `welfare_expenses`
--

CREATE TABLE `welfare_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `welfare_expenses`
--

INSERT INTO `welfare_expenses` (`id`, `fullname`, `amount`, `reason`, `created_at`, `updated_at`) VALUES
(1, 'sasudibupi@mailinator.com', 2000, 'For mother\'s funeral', '2022-02-22 15:17:07', '2022-02-22 15:17:07'),
(2, 'Edwin Ofosuhene', 200, 'For Dad\'s Funeral', '2022-02-22 15:32:42', '2022-02-22 15:32:42');

-- --------------------------------------------------------

--
-- Table structure for table `wohs_dues`
--

CREATE TABLE `wohs_dues` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `game_changer_dues`
--
ALTER TABLE `game_changer_dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gc_contributions`
--
ALTER TABLE `gc_contributions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gc_contribution_projects`
--
ALTER TABLE `gc_contribution_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gc_expenses`
--
ALTER TABLE `gc_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gc_offerings`
--
ALTER TABLE `gc_offerings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offertories`
--
ALTER TABLE `offertories`
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
-- Indexes for table `tithes`
--
ALTER TABLE `tithes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `welfares`
--
ALTER TABLE `welfares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `welfare_expenses`
--
ALTER TABLE `welfare_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wohs_dues`
--
ALTER TABLE `wohs_dues`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `game_changer_dues`
--
ALTER TABLE `game_changer_dues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gc_contributions`
--
ALTER TABLE `gc_contributions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gc_contribution_projects`
--
ALTER TABLE `gc_contribution_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gc_expenses`
--
ALTER TABLE `gc_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gc_offerings`
--
ALTER TABLE `gc_offerings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `offertories`
--
ALTER TABLE `offertories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tithes`
--
ALTER TABLE `tithes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `welfares`
--
ALTER TABLE `welfares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `welfare_expenses`
--
ALTER TABLE `welfare_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wohs_dues`
--
ALTER TABLE `wohs_dues`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
