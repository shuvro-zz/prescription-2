-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2017 at 12:32 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prescription`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=blocked 0=active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'square', 1, '2017-02-15 18:00:00', '2017-02-20 07:52:14'),
(2, 'aci', 1, '2017-02-15 18:00:00', '2017-02-16 08:36:52'),
(3, 'hamdard', 1, '2017-02-16 11:25:34', '2017-02-16 12:38:28'),
(4, 'reneta', 1, '2017-02-16 12:39:14', '2017-02-20 07:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` tinyint(4) DEFAULT '1' COMMENT '1=male 2=female',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active 0=blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `address`, `phone`, `age`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sahil', 'badda', '+8801012121220', 53, 1, 1, '2017-02-19 07:28:09', '2017-02-20 07:54:26'),
(2, 'saathi', 'motijheel', '+8801898989898', 27, 2, 1, '2017-02-19 07:28:30', '2017-02-20 07:53:11'),
(3, 'shamim', 'mohakhali', '+8801678787897', 27, 1, 1, '2017-02-19 11:19:40', '2017-02-20 07:53:31'),
(4, 'kamrul', 'mirpur', '+8801546566556', 45, 1, 1, '2017-02-19 13:06:29', '2017-02-20 07:54:15'),
(5, 'adib', 'gulsahn', '+8801564654656', 56, 1, 1, '2017-02-19 13:07:19', '2017-02-20 07:54:17'),
(6, 'faysal', '7 lichu bagan ', '+8801712409343', 28, 1, 1, '2017-02-20 21:03:05', '2017-02-20 21:03:05'),
(7, 'Rafi', 'Mirpur', '01326897456', 12, 1, 1, '2017-03-14 20:56:55', '2017-03-14 20:57:42'),
(8, 'Rabita', 'Dhaka', '01759412597', 15, 2, 1, '2017-03-14 20:58:37', '2017-03-14 20:58:37'),
(9, 'Selim', 'Kanchon', '+8801454545454', 25, 1, 1, '2017-03-14 21:00:35', '2017-03-14 21:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active 0=blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `contact`, `email`, `website`, `title`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Medicine Store', '170 North Mohkhali', '+8801898989999', '', '', 'M Store', 'logo.png', 1, '2017-02-20 20:26:17', '2017-02-20 20:26:17');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `degree` text COLLATE utf8_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=male 2=female',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `phone`, `address`, `degree`, `age`, `gender`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Mk Nahid ', '+8801712409343', '117 Kamola Bagan Mojumdary Sylhet ', 'MBBS. FRCS. KKMPL.', 57, 1, 1, '2017-02-18 18:00:00', '2017-02-26 19:33:01');

-- --------------------------------------------------------

--
-- Table structure for table `known_case_list`
--

CREATE TABLE `known_case_list` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `known_case_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1=active 0=inactive',
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `known_case_list`
--

INSERT INTO `known_case_list` (`id`, `prescription_id`, `known_case_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '1970-01-01', '2017-03-14 20:12:34'),
(2, 2, 1, 1, '1970-01-01', '2017-03-15 23:53:06'),
(3, 3, 2, 1, '1970-01-01', '2017-04-13 07:25:45'),
(4, 4, 2, 1, '1970-01-01', '2017-04-13 12:59:53'),
(5, 5, 2, 1, '1970-01-01', '2017-04-13 13:02:57'),
(6, 6, 4, 1, '1970-01-01', '2017-04-18 07:40:03'),
(7, 7, 1, 1, '1970-01-01', '2017-04-18 08:07:51'),
(8, 8, 1, 1, '1970-01-01', '2017-04-18 08:48:31'),
(9, 8, 4, 1, '1970-01-01', '2017-04-18 08:48:31'),
(13, 9, 1, 1, '1970-01-01', '2017-04-18 09:02:27'),
(14, 9, 5, 1, '1970-01-01', '2017-04-18 09:02:27'),
(15, 9, 8, 1, '1970-01-01', '2017-04-18 09:02:27'),
(16, 10, 2, 1, '1970-01-01', '2017-04-18 10:28:33'),
(17, 10, 5, 1, '1970-01-01', '2017-04-18 10:28:33'),
(18, 11, 1, 1, '1970-01-01', '2017-04-18 10:30:43'),
(19, 11, 4, 1, '1970-01-01', '2017-04-18 10:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `temp_password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` int(11) NOT NULL COMMENT '1=admin',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active 0=blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `reg_id`, `email`, `password`, `temp_password`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'super_admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '', 1, 1, '2016-11-08 09:37:55', '2016-11-19 07:14:47'),
(5, 6, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 2, 1, '2016-11-19 06:00:00', '2017-02-20 20:58:09'),
(6, 0, 'assistant@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 2, 1, NULL, '2017-03-21 11:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(11) NOT NULL,
  `code` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `power` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no_image.png',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active 0=blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL COMMENT 'who add this medicine'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `code`, `name`, `brand_id`, `power`, `image`, `status`, `created_at`, `updated_at`, `added_by`) VALUES
(1, '000001\n', 'napa', 4, '10mg', 'no_image.png', 1, '2017-02-15 18:00:00', '2017-02-20 08:59:36', 1),
(2, '000002\n', 'montier', 2, '10mg', 'no_image.png', 1, '2017-02-15 18:00:00', '2017-02-20 07:55:38', 1),
(3, '000003\n', 'loratin', 2, '10mg', 'no_image.png', 1, '2017-02-15 18:00:00', '2017-02-20 07:55:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_list`
--

CREATE TABLE `medicine_list` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `before_meal` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=before meal 2=after meal',
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `medicine_taken` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active 0=blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `medicine_list`
--

INSERT INTO `medicine_list` (`id`, `prescription_id`, `medicine_id`, `before_meal`, `comment`, `duration`, `medicine_taken`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '', '1 week', '1+0+1', 1, '2017-03-14 05:00:00', '2017-03-14 20:12:34'),
(2, 2, 1, 1, '', '3 Gonta Porpor', '1+1+3.', 1, '2017-03-15 05:00:00', '2017-03-15 23:53:06'),
(3, 2, 1, 2, '', '3 Gonta Porpor', '1+2+3', 1, '2017-03-15 05:00:00', '2017-03-15 23:53:06'),
(4, 2, 2, 1, '', '3 Gonta Porpor', '1+2+3', 1, '2017-03-15 05:00:00', '2017-03-15 23:53:06'),
(5, 2, 2, 1, '', '3 Gonta Porpor', '1+2+3', 1, '2017-03-15 05:00:00', '2017-03-15 23:53:06'),
(6, 3, 1, 1, '', '12', '2+1+1', 1, '2017-04-12 18:00:00', '2017-04-13 07:25:45'),
(7, 4, 2, 2, 'vxcvxcv', '7', '1+0+1', 1, '2017-04-12 18:00:00', '2017-04-13 12:59:53'),
(8, 4, 1, 2, '', '10', '1+0+1', 1, '2017-04-12 18:00:00', '2017-04-13 12:59:53'),
(9, 5, 1, 2, 'gfhfghfgh', '7 days', '1+0+1', 1, '2017-04-12 18:00:00', '2017-04-13 13:02:57'),
(10, 6, 1, 2, 'cdfghdfg', '4', 'fgdfg', 1, '2017-04-17 18:00:00', '2017-04-18 07:40:03'),
(11, 7, 3, 2, 'rakib', '7 days', '1+1+1', 1, '2017-04-17 18:00:00', '2017-04-18 08:07:51'),
(12, 8, 1, 2, ',.m.m,.m,.m,.', '6', '1+1+1', 1, '2017-04-17 18:00:00', '2017-04-18 08:48:31'),
(13, 9, 2, 2, 'comment', '3 days', '1+1+1', 1, '2017-04-17 18:00:00', '2017-04-18 09:02:27'),
(14, 10, 2, 2, 'comment', '3 days', '1+1+1', 1, '2017-04-17 18:00:00', '2017-04-18 10:28:33'),
(15, 11, 2, 2, 'comment comment comment', '3 days', '1+1+1', 1, '2017-04-17 18:00:00', '2017-04-18 10:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `detail` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `detail`, `updated_at`) VALUES
(1, 'Fever', '<ul><li>do not eat cold food</li></ul><p><br></p>', '2017-03-14 09:11:31'),
(2, 'known', '<p>case</p>', '2017-04-13 06:17:20'),
(3, 'hsdfovkjisdhf', '<p>dlishfjdkls</p>', '2017-04-17 12:05:51'),
(4, 'dsvndklsnvkl', '<p>xcvn x,mcn,x</p>', '2017-04-17 12:05:55'),
(5, 'lkdnjfkldnsfkl', '<p>,kdsnkd,snkn</p>', '2017-04-17 12:06:02'),
(6, 'vnfd', '<p>sxcdvnxc,</p>', '2017-04-17 12:06:07'),
(7, 'jjjjjj', '<p>jjjjjjjjjjjj</p>', '2017-04-17 12:06:30'),
(8, 'j', '<p>jjjjjjjjjjjjjjj</p>', '2017-04-17 12:06:34'),
(9, 'jjjjjjjjjjjjjjjjjjj', '<p>jjjjjjjjjjjjjjjjjjjj</p>', '2017-04-17 12:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `note_list`
--

CREATE TABLE `note_list` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active 0=blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `note_list`
--

INSERT INTO `note_list` (`id`, `prescription_id`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'note 1', 1, '2017-03-14 05:00:00', '2017-03-14 20:12:34'),
(2, 2, '', 1, '2017-03-15 05:00:00', '2017-03-15 23:53:06'),
(3, 3, '', 1, '2017-04-12 18:00:00', '2017-04-13 07:25:45'),
(4, 4, '', 1, '2017-04-12 18:00:00', '2017-04-13 12:59:53'),
(5, 5, 'test123', 1, '2017-04-12 18:00:00', '2017-04-13 13:02:57'),
(6, 5, 'test456', 1, '2017-04-12 18:00:00', '2017-04-13 13:02:57'),
(7, 6, 'bcvbcvbcv', 1, '2017-04-17 18:00:00', '2017-04-18 07:40:03'),
(8, 7, 'shdgfhsdgfh', 1, '2017-04-17 18:00:00', '2017-04-18 08:07:51'),
(9, 8, 'dfgdfgdf<div>dfgdf</div><div>gdfgdfg</div><div>rakib</div>', 1, '2017-04-17 18:00:00', '2017-04-18 08:48:31'),
(10, 9, '\r\n                                                                <p>jfbgjsdhfgjsdgfj sdfjhsdjfgjs sdjhfgsdjhfgjsd sjdgfjsdhgf sdfsdfsd</p><p></p>\r\n                                                            ', 1, '2017-04-17 18:00:00', '2017-04-18 09:02:27'),
(11, 10, 'note1 note2', 1, '2017-04-17 18:00:00', '2017-04-18 10:28:33'),
(12, 11, 'note1 note5 note7', 1, '2017-04-17 18:00:00', '2017-04-18 10:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active 0=blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `code`, `client_id`, `doctor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '000001\n', 3, 1, 1, '2017-03-14 05:00:00', '2017-03-14 20:12:34'),
(2, '000002\n', 6, 1, 1, '2017-03-15 05:00:00', '2017-03-15 23:53:06'),
(3, '000003\n', 1, 1, 1, '2017-04-12 18:00:00', '2017-04-13 07:25:45'),
(4, '000004\n', 4, 1, 1, '2017-04-12 18:00:00', '2017-04-13 12:59:53'),
(5, '000005\n', 0, 1, 1, '2017-04-12 18:00:00', '2017-04-13 13:02:57'),
(6, '000006\n', 1, 1, 1, '2017-04-17 18:00:00', '2017-04-18 07:40:03'),
(7, '000007\n', 4, 1, 1, '2017-04-17 18:00:00', '2017-04-18 08:07:51'),
(8, '000008\n', 1, 1, 1, '2017-04-17 18:00:00', '2017-04-18 08:48:31'),
(9, '000009\n', 1, 1, 1, '2017-04-17 18:00:00', '2017-04-18 08:54:55'),
(10, '000010\n', 4, 1, 1, '2017-04-17 18:00:00', '2017-04-18 10:28:33'),
(11, '000011\n', 4, 1, 1, '2017-04-17 18:00:00', '2017-04-18 10:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active 0=blocked',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `designation`, `address`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'SuperAdmin', '12 mirpur ', '+08801345364564', 1, '2016-11-10 12:44:59', '2016-11-19 07:02:25'),
(6, 'admin', 'admin', '123 mirpur', '+8801000000000', 1, '2016-11-19 19:12:55', '2016-11-19 19:12:55'),
(7, 'assistant', 'assistant', '123 mirpur', '+8801000000000', 1, '2016-11-19 19:12:55', '2016-11-19 19:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `test_list`
--

CREATE TABLE `test_list` (
  `id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '1=active,0=inactive',
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_list`
--

INSERT INTO `test_list` (`id`, `prescription_id`, `test_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 7, NULL, '1970-01-01', '2017-04-18 08:07:51'),
(2, 8, 8, NULL, '1970-01-01', '2017-04-18 08:48:31'),
(3, 8, 8, NULL, '1970-01-01', '2017-04-18 08:48:32'),
(4, 9, 5, NULL, '1970-01-01', '2017-04-18 08:54:56'),
(5, 9, 8, NULL, '1970-01-01', '2017-04-18 08:54:56'),
(6, 9, 9, NULL, '1970-01-01', '2017-04-18 08:54:56'),
(7, 10, 5, NULL, '1970-01-01', '2017-04-18 10:28:33'),
(8, 10, 7, NULL, '1970-01-01', '2017-04-18 10:28:33'),
(9, 11, 5, NULL, '1970-01-01', '2017-04-18 10:30:43'),
(10, 11, 7, NULL, '1970-01-01', '2017-04-18 10:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `test_notes`
--

CREATE TABLE `test_notes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_notes`
--

INSERT INTO `test_notes` (`id`, `title`, `created_at`, `updated_at`) VALUES
(5, 'ECG', '2017-04-13', '2017-04-13 12:37:11'),
(6, '123', '2017-04-13', '2017-04-13 12:50:54'),
(7, 'rakib', '2017-04-13', '2017-04-13 13:06:04'),
(8, '123', '2017-04-13', '2017-04-13 13:17:05'),
(9, '456', '2017-04-13', '2017-04-13 13:17:05'),
(11, '121', '2017-04-13', '2017-04-13 13:37:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `known_case_list`
--
ALTER TABLE `known_case_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_list`
--
ALTER TABLE `medicine_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `note_list`
--
ALTER TABLE `note_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_list`
--
ALTER TABLE `test_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_notes`
--
ALTER TABLE `test_notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `known_case_list`
--
ALTER TABLE `known_case_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `medicine_list`
--
ALTER TABLE `medicine_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `note_list`
--
ALTER TABLE `note_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `test_list`
--
ALTER TABLE `test_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `test_notes`
--
ALTER TABLE `test_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
