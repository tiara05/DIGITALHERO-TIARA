-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2025 at 10:24 AM
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
-- Database: `rentalps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '$2y$12$XWgFR3WvSnCCs5RsZxBOzeZH6jXm.3ClKvosCL9kJ0CcAYZvjXNb2', '2025-03-15 22:45:33', '2025-03-15 22:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

CREATE TABLE `availabilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `rental_type` enum('PS4','PS5') NOT NULL,
  `available_units` int(11) NOT NULL DEFAULT 5,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`id`, `booking_date`, `start_time`, `end_time`, `rental_type`, `available_units`, `created_at`, `updated_at`) VALUES
(1, '2025-03-15', '10:00:00', '11:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(2, '2025-03-15', '10:00:00', '11:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(3, '2025-03-15', '11:00:00', '12:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(4, '2025-03-15', '11:00:00', '12:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(5, '2025-03-15', '12:00:00', '13:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(6, '2025-03-15', '12:00:00', '13:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(7, '2025-03-15', '13:00:00', '14:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(8, '2025-03-15', '13:00:00', '14:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(9, '2025-03-15', '14:00:00', '15:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(10, '2025-03-15', '14:00:00', '15:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(11, '2025-03-15', '15:00:00', '16:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(12, '2025-03-15', '15:00:00', '16:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(13, '2025-03-15', '16:00:00', '17:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(14, '2025-03-15', '16:00:00', '17:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(15, '2025-03-15', '17:00:00', '18:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(16, '2025-03-15', '17:00:00', '18:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(17, '2025-03-16', '10:00:00', '11:00:00', 'PS4', 1, '2025-03-14 20:44:06', '2025-03-15 19:13:51'),
(18, '2025-03-16', '10:00:00', '11:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(19, '2025-03-16', '11:00:00', '12:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(20, '2025-03-16', '11:00:00', '12:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(21, '2025-03-16', '12:00:00', '13:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(22, '2025-03-16', '12:00:00', '13:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(23, '2025-03-16', '13:00:00', '14:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(24, '2025-03-16', '13:00:00', '14:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(25, '2025-03-16', '14:00:00', '15:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(26, '2025-03-16', '14:00:00', '15:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(27, '2025-03-16', '15:00:00', '16:00:00', 'PS4', 4, '2025-03-14 20:44:06', '2025-03-15 19:36:09'),
(28, '2025-03-16', '15:00:00', '16:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(29, '2025-03-16', '16:00:00', '17:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(30, '2025-03-16', '16:00:00', '17:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(31, '2025-03-16', '17:00:00', '18:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(32, '2025-03-16', '17:00:00', '18:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(33, '2025-03-17', '10:00:00', '11:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(34, '2025-03-17', '10:00:00', '11:00:00', 'PS5', 3, '2025-03-14 20:44:06', '2025-03-15 19:42:34'),
(35, '2025-03-17', '11:00:00', '12:00:00', 'PS4', 4, '2025-03-14 20:44:06', '2025-03-15 19:50:57'),
(36, '2025-03-17', '11:00:00', '12:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(37, '2025-03-17', '12:00:00', '13:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(38, '2025-03-17', '12:00:00', '13:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(39, '2025-03-17', '13:00:00', '14:00:00', 'PS4', 2, '2025-03-14 20:44:06', '2025-03-15 19:47:56'),
(40, '2025-03-17', '13:00:00', '14:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(41, '2025-03-17', '14:00:00', '15:00:00', 'PS4', 4, '2025-03-14 20:44:06', '2025-03-15 19:45:14'),
(42, '2025-03-17', '14:00:00', '15:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(43, '2025-03-17', '15:00:00', '16:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(44, '2025-03-17', '15:00:00', '16:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(45, '2025-03-17', '16:00:00', '17:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(46, '2025-03-17', '16:00:00', '17:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(47, '2025-03-17', '17:00:00', '18:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(48, '2025-03-17', '17:00:00', '18:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(49, '2025-03-18', '10:00:00', '11:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(50, '2025-03-18', '10:00:00', '11:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(51, '2025-03-18', '11:00:00', '12:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(52, '2025-03-18', '11:00:00', '12:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(53, '2025-03-18', '12:00:00', '13:00:00', 'PS4', 3, '2025-03-14 20:44:06', '2025-03-16 00:36:22'),
(54, '2025-03-18', '12:00:00', '13:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(55, '2025-03-18', '13:00:00', '14:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(56, '2025-03-18', '13:00:00', '14:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(57, '2025-03-18', '14:00:00', '15:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(58, '2025-03-18', '14:00:00', '15:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(59, '2025-03-18', '15:00:00', '16:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(60, '2025-03-18', '15:00:00', '16:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(61, '2025-03-18', '16:00:00', '17:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(62, '2025-03-18', '16:00:00', '17:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(63, '2025-03-18', '17:00:00', '18:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(64, '2025-03-18', '17:00:00', '18:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(65, '2025-03-19', '10:00:00', '11:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(66, '2025-03-19', '10:00:00', '11:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(67, '2025-03-19', '11:00:00', '12:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(68, '2025-03-19', '11:00:00', '12:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(69, '2025-03-19', '12:00:00', '13:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(70, '2025-03-19', '12:00:00', '13:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(71, '2025-03-19', '13:00:00', '14:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(72, '2025-03-19', '13:00:00', '14:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(73, '2025-03-19', '14:00:00', '15:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(74, '2025-03-19', '14:00:00', '15:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(75, '2025-03-19', '15:00:00', '16:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(76, '2025-03-19', '15:00:00', '16:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(77, '2025-03-19', '16:00:00', '17:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(78, '2025-03-19', '16:00:00', '17:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(79, '2025-03-19', '17:00:00', '18:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(80, '2025-03-19', '17:00:00', '18:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(81, '2025-03-20', '10:00:00', '11:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(82, '2025-03-20', '10:00:00', '11:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(83, '2025-03-20', '11:00:00', '12:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(84, '2025-03-20', '11:00:00', '12:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(85, '2025-03-20', '12:00:00', '13:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(86, '2025-03-20', '12:00:00', '13:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(87, '2025-03-20', '13:00:00', '14:00:00', 'PS4', 3, '2025-03-14 20:44:06', '2025-03-15 20:27:23'),
(88, '2025-03-20', '13:00:00', '14:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(89, '2025-03-20', '14:00:00', '15:00:00', 'PS4', 3, '2025-03-14 20:44:06', '2025-03-15 20:18:02'),
(90, '2025-03-20', '14:00:00', '15:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(91, '2025-03-20', '15:00:00', '16:00:00', 'PS4', 4, '2025-03-14 20:44:06', '2025-03-15 21:52:29'),
(92, '2025-03-20', '15:00:00', '16:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(93, '2025-03-20', '16:00:00', '17:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(94, '2025-03-20', '16:00:00', '17:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(95, '2025-03-20', '17:00:00', '18:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(96, '2025-03-20', '17:00:00', '18:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(97, '2025-03-21', '10:00:00', '11:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(98, '2025-03-21', '10:00:00', '11:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(99, '2025-03-21', '11:00:00', '12:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(100, '2025-03-21', '11:00:00', '12:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(101, '2025-03-21', '12:00:00', '13:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(102, '2025-03-21', '12:00:00', '13:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(103, '2025-03-21', '13:00:00', '14:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(104, '2025-03-21', '13:00:00', '14:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(105, '2025-03-21', '14:00:00', '15:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(106, '2025-03-21', '14:00:00', '15:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(107, '2025-03-21', '15:00:00', '16:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(108, '2025-03-21', '15:00:00', '16:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(109, '2025-03-21', '16:00:00', '17:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(110, '2025-03-21', '16:00:00', '17:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(111, '2025-03-21', '17:00:00', '18:00:00', 'PS4', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06'),
(112, '2025-03-21', '17:00:00', '18:00:00', 'PS5', 5, '2025-03-14 20:44:06', '2025-03-14 20:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` varchar(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `rental_type` enum('PS4','PS5') NOT NULL,
  `total_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `status_barang` varchar(255) NOT NULL DEFAULT 'belum diambil',
  `kode_ps` varchar(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_name`, `alamat`, `telp`, `booking_date`, `start_time`, `end_time`, `rental_type`, `total_price`, `qty`, `payment_status`, `status_barang`, `kode_ps`, `created_at`, `updated_at`) VALUES
('S12514', 'as', 'saa', '12123', '2025-03-17', '10:00:00', '11:00:00', 'PS5', 40000, 1, 'paid', 'belum diambil', NULL, '2025-03-15 19:42:34', '2025-03-15 19:43:13'),
('S17120', 'sa', '12312', '1231322', '2025-03-17', '11:00:00', '12:00:00', 'PS4', 30000, 1, 'paid', 'belum diambil', NULL, '2025-03-15 19:50:57', '2025-03-15 19:52:17'),
('S29054', 'Tiara', 'Sidoarjo Kota', '81332496224', '2025-03-18', '12:00:00', '13:00:00', 'PS4', 60000, 2, 'paid', 'PS Sudah Dikembalikan', NULL, '2025-03-16 00:36:22', '2025-03-16 00:45:04'),
('S35168', 'ass', 'das', '1231', '2025-03-17', '14:00:00', '15:00:00', 'PS4', 30000, 1, 'paid', 'PS Sudah Diambil', NULL, '2025-03-15 19:45:14', '2025-03-16 02:09:56'),
('S37496', 'tia', 'sda', '121323', '2025-03-16', '15:00:00', '16:00:00', 'PS4', 80000, 1, 'paid', 'PS Sudah Dikembalikan', NULL, '2025-03-15 19:36:09', '2025-03-15 23:05:47'),
('S45581', 'bim', 'adsa', '2131231', '2025-03-17', '13:00:00', '14:00:00', 'PS4', 60000, 2, 'paid', 'belum diambil', NULL, '2025-03-15 19:14:53', '2025-03-15 19:16:06'),
('S51951', 'tia', 'sidoarjo', '08123232', '2025-03-20', '14:00:00', '15:00:00', 'PS4', 30000, 1, 'paid', 'PS Sudah Dikembalikan', 'PS4-2', '2025-03-15 20:18:02', '2025-03-16 02:19:05'),
('S53833', 'asa', 'asda', '1231231', '2025-03-17', '13:00:00', '14:00:00', 'PS4', 30000, 1, 'paid', 'belum diambil', NULL, '2025-03-15 19:47:56', '2025-03-15 19:49:19'),
('S56991', 'asaa', 'sdas', '1231231', '2025-03-20', '13:00:00', '14:00:00', 'PS4', 30000, 1, 'paid', 'belum diambil', NULL, '2025-03-15 20:03:14', '2025-03-15 20:04:25'),
('S83291', 'bim', 'sby', '21321312', '2025-03-20', '15:00:00', '16:00:00', 'PS4', 30000, 1, 'pending', 'belum diambil', NULL, '2025-03-15 21:52:29', '2025-03-15 21:52:29'),
('S87179', 'tiara', 'villa', '1234567', '2025-03-20', '13:00:00', '14:00:00', 'PS4', 30000, 1, 'paid', 'belum diambil', NULL, '2025-03-15 20:27:23', '2025-03-15 20:28:43'),
('S88835', 'sia', 'sby', '12132', '2025-03-17', '10:00:00', '11:00:00', 'PS5', 40000, 1, 'paid', 'belum diambil', NULL, '2025-03-15 19:40:53', '2025-03-15 19:41:45'),
('S98070', 'asa', 'adsa', '2312312', '2025-03-20', '14:00:00', '15:00:00', 'PS4', 30000, 1, 'paid', 'belum diambil', NULL, '2025-03-15 19:56:40', '2025-03-15 19:58:55');

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
(5, '2025_03_13_074258_create_bookings_table', 1),
(6, '2025_03_14_064258_create_availabilities_table', 1),
(7, '2025_03_16_054303_create_admins_table', 2),
(8, '2025_03_16_085504_create_playstations_table', 3);

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
-- Table structure for table `playstations`
--

CREATE TABLE `playstations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `slot` varchar(11) NOT NULL,
  `status` enum('tersedia','dipinjam') NOT NULL DEFAULT 'tersedia',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `playstations`
--

INSERT INTO `playstations` (`id`, `jenis`, `slot`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PS4', 'PS4-1', 'dipinjam', '2025-03-16 02:02:23', '2025-03-16 02:09:56'),
(2, 'PS4', 'PS4-2', 'tersedia', '2025-03-16 02:02:23', '2025-03-16 02:19:05'),
(3, 'PS4', 'PS4-3', 'tersedia', '2025-03-16 02:02:23', '2025-03-16 02:02:23'),
(4, 'PS4', 'PS4-4', 'tersedia', '2025-03-16 02:02:23', '2025-03-16 02:02:23'),
(5, 'PS4', 'PS4-5', 'tersedia', '2025-03-16 02:02:23', '2025-03-16 02:02:23'),
(6, 'PS5', 'PS5-1', 'tersedia', '2025-03-16 02:02:23', '2025-03-16 02:02:23'),
(7, 'PS5', 'PS5-2', 'tersedia', '2025-03-16 02:02:23', '2025-03-16 02:02:23'),
(8, 'PS5', 'PS5-3', 'tersedia', '2025-03-16 02:02:23', '2025-03-16 02:02:23'),
(9, 'PS5', 'PS5-4', 'tersedia', '2025-03-16 02:02:23', '2025-03-16 02:02:23'),
(10, 'PS5', 'PS5-5', 'tersedia', '2025-03-16 02:02:23', '2025-03-16 02:02:23');

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
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `playstations`
--
ALTER TABLE `playstations`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `availabilities`
--
ALTER TABLE `availabilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playstations`
--
ALTER TABLE `playstations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
