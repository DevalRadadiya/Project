-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 03:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `avms`
--

-- --------------------------------------------------------

--
-- Table structure for table `apt_details`
--

CREATE TABLE `apt_details` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `house_number` varchar(255) NOT NULL,
  `floor_wing` varchar(255) NOT NULL,
  `owenership` varchar(255) NOT NULL,
  `createat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apt_details`
--

INSERT INTO `apt_details` (`id`, `name`, `phone_number`, `email`, `house_number`, `floor_wing`, `owenership`, `createat`, `updateat`) VALUES
(5, 'kamlesh', 75821256, 'kamlesh@gmail.com', '5', '5', 'Owner', '2023-02-15 10:11:06', '2023-02-27 09:12:31'),
(6, 'RAJESH', 7582, 'RAJESH@GMAIL.COM', '50', '8', 'Empty', '2023-02-15 10:12:46', '2023-03-09 02:11:51'),
(11, 'rajeshbhai', 9856471256, 'rajeshbhai@gmail.com', '25', '10', 'Owner', '2023-02-23 04:56:01', '2023-02-27 09:12:37'),
(12, 'deneshbhai', 8567489523, 'deneshbhai@gmail.com', '78', '20', 'Empty', '2023-02-23 04:56:27', '2023-02-27 09:12:40'),
(14, 'Kishan bhai', 9090909090, 'kishan@gmail.com', '1012', 'A3', 'Owner', '2023-03-09 00:50:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gatekeeper`
--

CREATE TABLE `gatekeeper` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gate` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `roll` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gatekeeper`
--

INSERT INTO `gatekeeper` (`id`, `name`, `phone_number`, `address`, `gate`, `password`, `createat`, `updateat`, `roll`) VALUES
(1, 'admin', 9632587410, '', '0', '123', '2023-02-20 03:35:32', '2023-03-02 16:43:28', 1),
(5, 'kaju', 8523657895, '', '45', '123', '2023-03-02 10:49:44', '2023-03-02 16:43:55', 2),
(6, 'raju', 7896541235, 'kkv chock rajkot-360002', '3', '123', '2023-03-02 16:17:59', NULL, 3),
(7, 'nimesh', 7856941258, '', '7', '123', '2023-03-02 16:25:29', '2023-03-02 16:30:12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_category`
--

CREATE TABLE `visitor_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `createat` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateat` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_category`
--

INSERT INTO `visitor_category` (`id`, `category_name`, `createat`, `updateat`) VALUES
(10, 'NewsPaper', '2023-02-23 04:52:51', NULL),
(11, 'Car Cleaner', '2023-02-27 09:17:57', NULL),
(12, 'Gardener', '2023-02-27 09:18:05', NULL),
(13, 'Driver', '2023-02-27 09:18:13', NULL),
(14, 'Cook', '2023-02-27 09:18:19', NULL),
(15, 'Maid', '2023-02-27 09:18:25', NULL),
(16, 'Milkman', '2023-02-27 09:19:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_details`
--

CREATE TABLE `visitor_details` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `apartment` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `whom_to_meet` varchar(255) NOT NULL,
  `reason_to_meet` varchar(255) NOT NULL,
  `createat` timestamp NOT NULL DEFAULT current_timestamp(),
  `out_remark` varchar(255) DEFAULT 'NULL',
  `out_time` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitor_details`
--

INSERT INTO `visitor_details` (`id`, `category_name`, `visitor_name`, `phone_number`, `address`, `apartment`, `floor`, `whom_to_meet`, `reason_to_meet`, `createat`, `out_remark`, `out_time`) VALUES
(17, 'milkman', 'kamleshbahi', 98745621235, 'RAJKOT', 'a12', '2', 'kamlesh', 'fadsfasf', '2023-02-27 07:01:10', 'dfadsffa', '2023-03-09 02:32:07'),
(18, 'NewsPaper', 'Umesh bhai', 9098769089, 'Rajkot', 'a16', 'A3', 'Kishan bhai', 'Paper aapvanu che', '2023-03-09 00:56:28', 'NULL', '2023-03-09 02:20:33'),
(20, 'Cook', 'bhishmabhai', 356289374, 'kothariya rajkot', 'a56', 'A3', 'Kishan bhai', 'for meeting', '2023-03-09 02:31:40', 'NULL', '2023-03-09 02:32:15'),
(21, 'Gardener', 'ridham', 989898989, 'rajkot', '', '20', 'deneshbhai', 'persoal reason', '2023-03-09 02:57:59', 'NULL', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_pass`
--

CREATE TABLE `visitor_pass` (
  `id` int(11) NOT NULL,
  `passnumber` bigint(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `apartment` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `pass_description` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `createat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `visitor_pass`
--

INSERT INTO `visitor_pass` (`id`, `passnumber`, `category_name`, `visitor_name`, `phone_number`, `address`, `apartment`, `floor`, `pass_description`, `from_date`, `to_date`, `createat`) VALUES
(4, 0, 'newspaper', 'Raju', 589632147, 'kkv chock rajkot-360001', '25', '4', 'to give paper', '2023-02-02', '2023-03-07', '2023-02-17 10:09:10'),
(5, 0, 'milkman', 'kishorbhai', 8562314785, 'kothariya chock', '6', '2', 'to give milk', '2023-02-08', '2023-01-21', '2023-02-21 09:19:35'),
(6, 0, 'driver', 'eklabbhai', 52369874152, 'kalavad road', '52', '1', 'to take car', '2023-02-07', '2023-02-24', '2023-02-22 15:43:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apt_details`
--
ALTER TABLE `apt_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gatekeeper`
--
ALTER TABLE `gatekeeper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_category`
--
ALTER TABLE `visitor_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_details`
--
ALTER TABLE `visitor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_pass`
--
ALTER TABLE `visitor_pass`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apt_details`
--
ALTER TABLE `apt_details`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gatekeeper`
--
ALTER TABLE `gatekeeper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visitor_category`
--
ALTER TABLE `visitor_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `visitor_details`
--
ALTER TABLE `visitor_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `visitor_pass`
--
ALTER TABLE `visitor_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
