-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2026 at 06:42 PM
-- Server version: 10.11.16-MariaDB
-- PHP Version: 8.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_tracker`
--

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
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `circular_no` varchar(100) DEFAULT NULL,
  `circular_publish_date` date DEFAULT NULL,
  `application_start_date` date DEFAULT NULL,
  `application_end_date` date DEFAULT NULL,
  `tracking_no` varchar(50) DEFAULT NULL,
  `job_title` varchar(255) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `discipline` varchar(100) DEFAULT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `ministry` varchar(255) DEFAULT NULL,
  `exam_taker` varchar(255) DEFAULT NULL,
  `number_of_post` int(11) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `application_fee` decimal(10,2) DEFAULT NULL,
  `req_edu` longtext DEFAULT NULL,
  `website` varchar(500) DEFAULT NULL,
  `circular_link` varchar(1000) DEFAULT NULL,
  `application_date` date DEFAULT NULL,
  `admit_publish_date` date DEFAULT NULL,
  `aptitude_date` date DEFAULT NULL,
  `preli_date` date DEFAULT NULL,
  `written_date` date DEFAULT NULL,
  `viva_date` date DEFAULT NULL,
  `medical_date` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `aptitude_result` enum('Pending','Pass','Fail','Absent') DEFAULT 'Pending',
  `preli_result` enum('Pending','Pass','Fail','Absent') DEFAULT 'Pending',
  `written_result` enum('Pending','Pass','Fail','Absent') DEFAULT 'Pending',
  `viva_result` enum('Pending','Pass','Fail','Absent') DEFAULT 'Pending',
  `final_result` enum('Pending','Selected','Rejected') DEFAULT 'Pending',
  `exam_type` varchar(100) DEFAULT NULL,
  `exam_centre` varchar(255) DEFAULT NULL,
  `registration_no` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_type` enum('BCS','Government','Bank','Railway','University','Autonomous','Private') DEFAULT NULL,
  `priority` enum('High','Medium','Low') DEFAULT 'Medium',
  `preli_exam_taker` varchar(255) DEFAULT NULL,
  `preli_time` time DEFAULT NULL,
  `preli_centre` varchar(255) DEFAULT NULL,
  `written_exam_taker` varchar(255) DEFAULT NULL,
  `written_time` time DEFAULT NULL,
  `written_centre` varchar(255) DEFAULT NULL,
  `aptitude_exam_taker` varchar(255) DEFAULT NULL,
  `aptitude_time` time DEFAULT NULL,
  `aptitude_centre` varchar(255) DEFAULT NULL,
  `viva_exam_taker` varchar(255) DEFAULT NULL,
  `viva_time` time DEFAULT NULL,
  `viva_centre` varchar(255) DEFAULT NULL,
  `medical_exam_taker` varchar(255) DEFAULT NULL,
  `medical_time` time DEFAULT NULL,
  `medical_centre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `circular_no`, `circular_publish_date`, `application_start_date`, `application_end_date`, `tracking_no`, `job_title`, `department`, `discipline`, `organization`, `ministry`, `exam_taker`, `number_of_post`, `grade`, `salary`, `application_fee`, `req_edu`, `website`, `circular_link`, `application_date`, `admit_publish_date`, `aptitude_date`, `preli_date`, `written_date`, `viva_date`, `medical_date`, `joining_date`, `aptitude_result`, `preli_result`, `written_result`, `viva_result`, `final_result`, `exam_type`, `exam_centre`, `registration_no`, `status`, `username`, `password`, `remarks`, `created_at`, `updated_at`, `job_type`, `priority`, `preli_exam_taker`, `preli_time`, `preli_centre`, `written_exam_taker`, `written_time`, `written_centre`, `aptitude_exam_taker`, `aptitude_time`, `aptitude_centre`, `viva_exam_taker`, `viva_time`, `viva_centre`, `medical_exam_taker`, `medical_time`, `medical_centre`) VALUES
(1, '14.35.0000.000.020.11.0074.26.17', '2026-09-14', NULL, NULL, NULL, 'Assistant Manager (Technical)', NULL, NULL, 'Teletalk Bangladesh Limited', NULL, NULL, NULL, '9', NULL, NULL, 'BSc in EEE or CSE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Result Pending', NULL, NULL, NULL, '2026-11-10 04:26:27', '2026-11-19 12:37:30', NULL, 'Medium', 'BUET', NULL, 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '28.02.0000.000.011.26.0027.26.453', '2026-09-29', NULL, '2026-11-30', NULL, 'Assistant Manager (Engg.)', NULL, 'CSE/IT', 'Bangladesh 0il, Gas and Mineral Gorporation (Petrobangla)', NULL, 'BUET', 25, '9', '44000', 223.00, 'A B.Sc. in Engineering degree in Computer Science (CS), Computer Science and Engineering (CSE), Computer Science and Technology (CST), ICT/ICE, or Software Engineering from a recognized university with no prior experience required, or a 4-year Diploma in Engineering in a relevant discipline alongside at least 5 years of work experience in a government, semi-government, or autonomous organization.', NULL, 'http://bogmc.teletalk.com.bd/bogmc_2026/docs/20260929.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Preliminary + Written', 'Dhaka', NULL, 'Applied', 'Y6TEJH7R', '5NE7TYYZ', NULL, '2026-11-16 06:09:14', '2026-11-19 06:22:04', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, 'Assistant Programmer', NULL, NULL, 'Bangladesh Investment Development Authority (BIDA)', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 22:10:09', '2026-11-16 23:40:32', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '56.02.0000.000.023.11.0004.26-150', '2026-08-29', NULL, NULL, NULL, 'Assistant Programmer', NULL, NULL, 'Bangladesh Hi-Tech Park Authority', NULL, NULL, 8, NULL, NULL, NULL, 'CSE/EEE', NULL, 'https://bhtpa.teletalk.com.bd/bhtpa2026/docs/Bhtpa_circular_2026.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', '5W32FLGQ', NULL, NULL, '2026-11-16 22:28:34', '2026-11-16 22:56:42', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '30.31.0000.000.211.01.0039.26-8914', '2026-07-20', '2026-07-27', '2026-08-16', NULL, 'Assistant Programmer', NULL, NULL, 'Civil Aviation Authority of Bangladesh (CAAB)', NULL, 'CAAB', 2, '9', '22000', 223.00, 'A Bachelor’s (Honors) or equivalent degree with at least a 2nd class or equivalent CGPA in Computer Science (CS), Computer Science and Engineering (CSE), Electrical and Electronics Engineering (EEE), or Information and Communication Technology (ICT) from a recognized university.', NULL, 'https://caab.teletalk.com.bd/caab_2026/docs/CAAB202607201.pdf', NULL, NULL, NULL, NULL, '2026-12-04', NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', 'Preliminary + Written', 'Kurmitola High School And College, Khilkhet, Dhaka', '11000485', 'Exam Scheduled', 'MF3ZB8WH', 'K648542G', NULL, '2026-11-16 23:01:37', '2026-11-19 11:39:16', NULL, 'Medium', NULL, NULL, NULL, NULL, '15:30:00', 'Kurmitola High School And College, Khilkhet, Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, 'AD (MIS)', NULL, NULL, 'Bangladesh Securities and Exchange Commission', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 23:03:32', '2026-11-16 23:03:32', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '99-130/2025 Sl no: 109(Non cadre)', NULL, NULL, NULL, NULL, 'Assistant Programmer', NULL, NULL, NULL, 'Different Ministry', 'BPSC', 17, NULL, NULL, NULL, 'BSc in CSE/EEE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, 'Dhaka', '001356', 'Applied', 'NXSDIUVFOE', NULL, NULL, '2026-11-16 23:07:43', '2026-11-16 23:32:15', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, 'Junior Instructor', NULL, NULL, 'Technical School & College', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 23:32:59', '2026-11-16 23:32:59', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, 'Assistant Programmer', NULL, NULL, 'বহিরাগমন ও পাসপোর্ট অধিদপ্তর', NULL, NULL, 2, NULL, '22000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 23:33:42', '2026-11-16 23:34:06', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, 'Head Master', NULL, NULL, 'Govt. Primary School', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 23:35:39', '2026-11-16 23:35:39', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, 'Admin Officer', NULL, NULL, NULL, 'Different Ministry', NULL, NULL, NULL, '16000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 23:36:19', '2026-11-16 23:36:57', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, 'Inspector', NULL, NULL, 'মাদকদ্রব্য নিয়ন্ত্রণ অধিদপ্তর', 'Ministry of Home Affairs', 'BPSC', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-11-14', NULL, NULL, NULL, NULL, 'Pending', 'Absent', 'Pending', 'Pending', 'Pending', 'Preliminary', 'Sher-e-Bangla Nagar Govt. Girls High School, Sher-e-Bangla Nagar, Dhaka', NULL, 'Absent', 'NAQEQNGHPB', NULL, NULL, '2026-11-16 23:37:35', '2026-11-19 08:56:57', NULL, 'Medium', 'BPSC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, 'Sub Assistant Settlement Officer', NULL, NULL, 'ভূমি রেকর্ড ও জরিপ অধিদপ্তর', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 23:38:29', '2026-11-16 23:38:29', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL, 'Instructor', NULL, NULL, 'COOP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 23:39:00', '2026-11-16 23:39:00', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL, 'Upazila Rural Dev. Officer', NULL, NULL, 'BRDB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 23:39:30', '2026-11-16 23:39:30', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL, 'IT Officer', NULL, NULL, 'RCPSC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 23:41:30', '2026-11-16 23:41:30', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, '26011400000002', 'Assistant Programmer', NULL, NULL, 'ISTCL', NULL, NULL, 8, NULL, '22000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, '10655', 'Applied', NULL, NULL, NULL, '2026-11-16 23:42:02', '2026-11-16 23:48:26', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL, 'Jr. Admin. Assistant', NULL, NULL, 'Power Grid Company of Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Applied', NULL, NULL, NULL, '2026-11-16 23:49:01', '2026-11-16 23:49:01', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL, 'No job title', NULL, NULL, 'Biman Bangladesh Airlines', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:50:02', '2026-11-16 23:50:02', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL, NULL, 'IT Officer', NULL, NULL, 'CEPZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:50:37', '2026-11-16 23:50:37', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL, NULL, 'SAE', NULL, NULL, 'Power Grid Company of Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:51:10', '2026-11-16 23:51:10', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL, NULL, 'SAE (Computer)', NULL, NULL, 'Dhaka Electric Supply Company Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:51:42', '2026-11-16 23:52:42', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL, NULL, 'AGM (Administration/HR)', NULL, NULL, 'BREB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:53:09', '2026-11-16 23:53:09', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, NULL, NULL, NULL, NULL, 'AME', NULL, NULL, 'Bangladesh Agricultural Research Institute', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:53:40', '2026-11-16 23:53:40', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, NULL, NULL, NULL, NULL, NULL, 'AGM (O&M/P&M/E&C)', NULL, NULL, 'BREB', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, 'Mirpur College, Section-2, Mirpur, Dhaka', NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:54:08', '2026-11-16 23:54:50', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, NULL, NULL, NULL, NULL, NULL, 'Assistant Engineer', NULL, NULL, 'West Zone Power Distribution Company Limited', NULL, 'KUET', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, 'Khulna', NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:56:15', '2026-11-16 23:57:07', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, NULL, NULL, NULL, NULL, NULL, 'AD (Engineering & Operations)', NULL, NULL, 'Bangladesh Telecommunication Regulatory Commission', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:57:50', '2026-11-16 23:57:50', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, NULL, NULL, NULL, NULL, NULL, '49th BCS', NULL, NULL, NULL, NULL, 'Bangladesh Public Service Commission', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:58:21', '2026-11-16 23:58:57', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, NULL, NULL, NULL, NULL, NULL, '47th BCS (Lecturer)', NULL, NULL, NULL, NULL, 'Bangladesh Public Service Commission', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-16 23:59:26', '2026-11-16 23:59:50', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, NULL, NULL, NULL, NULL, NULL, 'Sub Assistant Engineer', NULL, NULL, 'Bangladesh Railway', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Selected', NULL, NULL, NULL, '2026-11-17 00:00:32', '2026-11-17 00:00:32', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL, 'AE (X-Ray)', NULL, NULL, 'National electro medical maintence workshop and training center', 'Ministry of Health Education and Family Welfare', NULL, 7, NULL, '22000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, 'O7343767D ', NULL, '2026-11-17 00:07:37', '2026-11-17 00:12:59', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, NULL, NULL, NULL, NULL, NULL, 'SAE', NULL, NULL, 'West Zone Power Distribution Company Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-17 00:13:54', '2026-11-17 00:13:54', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, NULL, NULL, NULL, NULL, NULL, 'Assistant Manager (Engineering)', NULL, 'Computer', 'BSCPLC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-17 00:14:40', '2026-11-17 00:15:07', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, NULL, NULL, NULL, NULL, NULL, 'Lecturer (ICT)', NULL, NULL, 'CU Laboratory School & College', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-17 00:15:46', '2026-11-17 00:15:46', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, NULL, NULL, NULL, NULL, NULL, 'Sub-Inspector of Food', NULL, NULL, 'DGFOOD', NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-17 00:17:37', '2026-11-17 00:17:37', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, NULL, NULL, NULL, NULL, NULL, 'SAE (Access Control and Security Alarm)', NULL, NULL, 'NPCBL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Rejected', NULL, NULL, NULL, '2026-11-17 00:18:05', '2026-11-17 00:18:05', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, NULL, NULL, NULL, NULL, NULL, 'JAM (ICT)', NULL, NULL, 'North-West Power Generation Company Limited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Absent', NULL, NULL, NULL, '2026-11-17 00:22:12', '2026-11-20 00:07:14', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, NULL, NULL, NULL, NULL, NULL, 'Engineer (Cyber Security)', NULL, NULL, 'NPCBL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Absent', NULL, NULL, NULL, '2026-11-17 00:22:39', '2026-11-20 00:06:56', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, NULL, NULL, NULL, NULL, NULL, 'Engineer (Software/Programming)', NULL, NULL, 'NPCBL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Absent', NULL, NULL, NULL, '2026-11-17 00:23:03', '2026-11-19 13:17:36', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, NULL, NULL, NULL, NULL, NULL, 'Engineer (Server)', NULL, NULL, 'NPCBL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Absent', NULL, NULL, NULL, '2026-11-17 00:23:30', '2026-11-20 00:06:37', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, NULL, NULL, NULL, NULL, 'Section Engineer (Signaling and Telecommunications)', NULL, NULL, 'DMTCL', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Absent', NULL, NULL, NULL, '2026-11-17 00:23:59', '2026-11-20 00:06:22', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, NULL, NULL, NULL, NULL, NULL, 'AE (ICT)', NULL, NULL, 'Electricity Generation Company of Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Absent', NULL, NULL, NULL, '2026-11-17 00:24:26', '2026-11-20 00:06:06', NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, NULL, NULL, NULL, NULL, 'Deputy Assistant Director (License)', NULL, NULL, 'Bangladesh Telecommunication Regulatory Commission', NULL, NULL, NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', NULL, NULL, NULL, 'Absent', NULL, NULL, NULL, '2026-11-17 00:24:55', '2026-11-20 00:05:45', NULL, 'Medium', NULL, NULL, NULL, 'BUET', NULL, 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, NULL, NULL, NULL, NULL, NULL, 'Assistant Teacher', NULL, NULL, 'School', NULL, 'Non-Government Teachers\' Registration & Certification Authority (NTRCA)', NULL, '10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'Pending', 'Pending', 'Pending', 'Rejected', 'Preliminary', 'GAZIPUR', '313023500', 'Rejected', 'FYBWWG', NULL, 'Preliminary Subject: [CODE: 300] BENGALI, ENGLISH, GENERAL\r\nVENUE Name: BANGLADESH RICE RESEARCH INSTITUTE (BRRI)\r\nHIGH SCHOOL, SADAR, GAZIPUR \r\nVENUE ID: 1556', '2026-11-17 04:44:45', '2026-11-20 00:04:02', NULL, 'Medium', 'NTRCA', NULL, 'Gazipur', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_11_10_081319_create_job_applications_table', 2),
(5, '2026_11_18_235221_add_stage_details_to_job_applications_table', 3);

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
('2ZbOwDPocWIHy0uwyqolbzFYYhBqYQCQMVHb09J0', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/158.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczQ0SU5QbUo4TnNrcjdZckdZSkVEY2NOUVpvRnl4NzNtd1VkN3hXNiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYWxlbmRhcj9tb250aD0yMDI2LTEwIjtzOjU6InJvdXRlIjtzOjEzOiJqb2JzLmNhbGVuZGFyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1795106411),
('M4ReqaFMtpRtviU1jKy5qyfJQuEfutTS4rFuBDol', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOHd4NUxoU2tHUzAxOE84RmtqTUhPQ0VHT1BKN2dzcWdQeXh4b1BGMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo5OiJkYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1795066012),
('S78JX93bQzT1Kdv0D6VAWknFKxqt6IHX8u3OcWNX', NULL, '192.168.3.132', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/158.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiV2UwYkM4azRTcTliQ1RoQW9tT3VaUFFpbXIwc3Vrc0Z6U1VnbHJxdCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xOTIuMTY4LjMuNjQ6ODAwMC9qb2JzLzEyIjtzOjU6InJvdXRlIjtzOjk6ImpvYnMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1795060488),
('TqdgSRCKKFk9lprfmzkfrZzF3tRLLIpIIVmfaV9i', NULL, '192.168.3.227', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/158.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiS3czeUJCUnF2TWVtYTIydkpqY2I3UkRVeGJGQ3dNVWdmTllYT1Z1UyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xOTIuMTY4LjMuNjQ6ODAwMCI7czo1OiJyb3V0ZSI7czo5OiJkYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1795105221),
('XV2Amwl2KeCGLybETjB7uIZMFPWtuv4TLPEauBkb', NULL, '192.168.3.227', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/158.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGk3N2xRUmNLaVdqT3Rzdm1jOTBRSjFhQlZ5N3R0VktFaGpaakhLZiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xOTIuMTY4LjMuNjQ6ODAwMC9qb2JzLzM5IjtzOjU6InJvdXRlIjtzOjk6ImpvYnMuc2hvdyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1795065456),
('Y8oUbgZh8WabBG8ed9et9QQLjVf0q7RYT9AC8srm', NULL, '192.168.3.132', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/158.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1dtZDZvTnZyZUZHb01UZGx3MG4xcFVJaDlqblZMNFo0M2xjV3luOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xOTIuMTY4LjMuNjQ6ODAwMCI7czo1OiJyb3V0ZSI7czo5OiJkYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1795106595);

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

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
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
