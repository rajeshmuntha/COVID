-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 01, 2023 at 04:33 AM
-- Server version: 8.0.25
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+08:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidreports`
--

-- --------------------------------------------------------

--
-- Table structure for table `authenticate`
--

CREATE TABLE `authenticate` (
  `id` int NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dgn` varchar(100) NOT NULL,
  `role` int NOT NULL,
  `status` int NOT NULL,
  `value` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authenticate`
--

INSERT INTO `authenticate` (`id`, `user_id`, `pass`, `name`, `dgn`, `role`, `status`, `value`) VALUES
(1, '0255', '98806e75519d8c3c39e19a0c81905c0a', 'Rajasekhar A', 'Manager IT', 1, 1, 0),
(2, 'Admin', 'fb09653d37c658bffdd5921620a8fbbd', 'Rajasekhar A', 'CTO', 1, 1, 0),
(3, 'R0255', 'dd28e50635038e9cf3a648c2dd17ad0a', 'RAJASEKHAR A', 'MANAGER IT', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kit_approved`
--

CREATE TABLE `kit_approved` (
  `id` int NOT NULL,
  `kit_id` int NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kit_approved`
--

INSERT INTO `kit_approved` (`id`, `kit_id`, `date`) VALUES
(1, 1, '2021-02-15 08:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `author` varchar(100) NOT NULL,
  `msg` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `author`, `msg`, `status`, `date`) VALUES
(1, 'R0003', 'Hello Testing', '1', '2021-02-24 15:05:43'),

(2, 'R0030', 'PLS CHANGE GENDER TO MALE FOR THIS PATIENT BELOW\r\nNAME : PHOON KAI XIONG\r\nIC NO : 921027145485', '1', '2021-04-23 07:58:43');

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE `m_status` (
  `id` int NOT NULL,
  `m_id` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_status`
--

INSERT INTO `m_status` (`id`, `m_id`, `date`) VALUES
(1, '25', '2021-02-15 09:17:12'),
(2, '50', '2021-04-24 16:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `id` int NOT NULL,
  `mode` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `p_id` int NOT NULL,
  `process_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`id`, `mode`, `address`, `street`, `contact`, `p_id`, `process_id`) VALUES
(1, 'CASH', 'CASH', 'CASH', '+601111280599', 1, '1'),
(2, 'ONLINE', 'ONLINE', 'ONLINE', '+601111280599', 2, '2'),
(3, 'DEBIT / CREDIT', 'DEBIT/CREDIT', 'DEBIT/CREDIT', '+601111280599', 3, '3'),
(4, 'PERODUA', 'KOTA', 'KOTA', '+601111280599', 4, '4'),
(5, 'TERMIC', 'THERMIK TECHNOLOGIES SDN BHD', 'Lot 63, Jalan Kenanga 8A, \r\nBukit Beruntung Industrial Park, Bandar Bukit Beruntung, 48300 Rawang, Selangor.', '+601111280599', 5, '4'),
(6, 'SCIENTEX', 'SCIENTEX GREAT WALL SDN BHD', 'BLOCK B-1, C-1, D, LOT 1608\r\nRAWANG INTIGRATED INDUSTRIAL PARK\r\nJALAN RAWANG BATANG BERJUNTAI\r\n48000 RAWANG S.D.E', '03 6092 3333', 40, '4');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `icno` varchar(100) NOT NULL,
  `validation` varchar(100) NOT NULL,
  `phno` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `pincode` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `t_type` varchar(100) NOT NULL,
  `t_location` varchar(100) NOT NULL,
  `rm_online` varchar(100) NOT NULL,
  `rm_cash` varchar(100) NOT NULL,
  `p_mode` varchar(100) NOT NULL,
  `p_id` varchar(100) NOT NULL,
  `p_ref` varchar(100) NOT NULL,
  `reg_date` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `sys_date` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `f_name`, `l_name`, `gender`, `dob`, `icno`, `validation`, `phno`, `email`, `address`, `street`, `pincode`, `state`, `t_type`, `t_location`, `rm_online`, `rm_cash`, `p_mode`, `p_id`, `p_ref`, `reg_date`, `author`, `status`, `sys_date`, `time`) VALUES
(1, 'SRI RAGHAVENTHAR A/L KUNASEGARAN', '', 'Male', '1991-10-21', '911021145661', 'Z47PSH', '0', '', '', '', '', 'Selangor', '2', 'Walk-Thru', 'RM50.00', '0', '1', '1', 'RTK', '2023-06-01', '', 1, '2023-06-01', '2023-06-01 03:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `pay_mode`
--

CREATE TABLE `pay_mode` (
  `id` int NOT NULL,
  `mode` varchar(100) NOT NULL,
  `id_mode` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_mode`
--

INSERT INTO `pay_mode` (`id`, `mode`, `id_mode`) VALUES
(1, 'CASH', 1),
(2, 'ONLINE', 2),
(3, 'DEBIT / CREDIT', 3),
(4, 'PANEL', 4),
(5, 'CHEQUE', 5);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int NOT NULL,
  `r_id` varchar(100) NOT NULL,
  `icno` varchar(100) NOT NULL,
  `t_type` varchar(100) NOT NULL,
  `r_case` varchar(100) NOT NULL,
  `validation` varchar(100) NOT NULL,
  `e_gene` varchar(100) NOT NULL,
  `rdrp` varchar(100) NOT NULL,
  `ngene` varchar(100) NOT NULL,
  `ct_value` varchar(100) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `r_id`, `icno`, `t_type`, `r_case`, `validation`, `e_gene`, `rdrp`, `ngene`, `ct_value`, `uid`, `date`) VALUES
(1, '1', '911021145661', '2', '2', 'Z47PSH', '0', '0', '0', '0', 'DR0006', '2023-06-01 03:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `test_cost`
--

CREATE TABLE `test_cost` (
  `id` int NOT NULL,
  `p_id` int NOT NULL,
  `test_id` int NOT NULL,
  `cost` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_cost`
--

INSERT INTO `test_cost` (`id`, `p_id`, `test_id`, `cost`) VALUES
(1, 4, 1, '200'),
(2, 4, 2, '150'),
(3, 4, 3, '130'),
(4, 4, 4, '230'),
(5, 5, 1, '200'),
(6, 5, 2, '150'),
(7, 5, 3, '120'),
(8, 5, 4, '230'),
(9, 6, 1, '200'),
(10, 6, 2, '150'),
(11, 6, 3, '115'),
(12, 6, 4, '230'),
(13, 7, 1, '200'),
(14, 7, 2, '150'),
(15, 7, 3, '125'),
(16, 7, 4, '230'),
(17, 8, 1, '200'),
(18, 8, 2, '150'),
(19, 8, 3, '140'),
(20, 8, 4, '230'),
(21, 9, 1, '200'),
(22, 9, 2, '150'),
(23, 9, 3, '132'),
(24, 9, 4, '230'),
(25, 10, 1, '200'),
(26, 10, 2, '150'),
(27, 10, 3, '100'),
(28, 10, 4, '230'),
(29, 11, 1, '200'),
(30, 11, 2, '150'),
(31, 11, 3, '100'),
(32, 11, 4, '230'),
(33, 12, 1, '200'),
(34, 12, 2, '150'),
(35, 12, 3, '100'),
(36, 12, 4, '230'),
(37, 13, 1, '200'),
(38, 13, 2, '150'),
(39, 13, 3, '100'),
(40, 13, 4, '230'),
(41, 14, 1, '200'),
(42, 14, 2, '150'),
(43, 14, 3, '100'),
(44, 14, 4, '230'),
(45, 15, 1, '200'),
(46, 15, 2, '150'),
(47, 15, 3, '100'),
(48, 15, 4, '230'),
(49, 16, 1, '200'),
(50, 16, 2, '150'),
(51, 16, 3, '100'),
(52, 16, 4, '230'),
(53, 17, 1, '200'),
(54, 17, 2, '150'),
(55, 17, 3, '100'),
(56, 17, 4, '230');

-- --------------------------------------------------------

--
-- Table structure for table `test_location`
--

CREATE TABLE `test_location` (
  `id` int NOT NULL,
  `location` varchar(100) NOT NULL,
  `location_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_location`
--

INSERT INTO `test_location` (`id`, `location`, `location_id`) VALUES
(1, 'Walk-Thru', 1),
(2, 'SC-Walk-Thru', 2),
(3, 'KD-Walk-Thru', 3),
(4, 'Onsite', 4),
(5, 'RT-Walk-Thru', 5),
(6, 'AG-Walk-Thru', 6),
(7, 'CH-Walk-Thru', 7),
(8, 'ADLS-Walk-Thru', 8);

-- --------------------------------------------------------

--
-- Table structure for table `test_type`
--

CREATE TABLE `test_type` (
  `id` int NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_type`
--

INSERT INTO `test_type` (`id`, `test_type`, `status`) VALUES
(1, 'rT-PCR', 1),
(2, 'RTK-Antigen', 1),
(3, 'RTK-Antigen(PERKESO)', 1),
(4, 'Antibody IGM/IGG', 1),
(5, 'Rapid PCR/Molecular', 1),
(6, 'SALIVA PCR', 1),
(7, 'INFLUENZA A & B', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authenticate`
--
ALTER TABLE `authenticate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kit_approved`
--
ALTER TABLE `kit_approved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_status`
--
ALTER TABLE `m_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_mode`
--
ALTER TABLE `pay_mode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_cost`
--
ALTER TABLE `test_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_location`
--
ALTER TABLE `test_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_type`
--
ALTER TABLE `test_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authenticate`
--
ALTER TABLE `authenticate`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `kit_approved`
--
ALTER TABLE `kit_approved`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90419;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `m_status`
--
ALTER TABLE `m_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101496;

--
-- AUTO_INCREMENT for table `pay_mode`
--
ALTER TABLE `pay_mode`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101102;

--
-- AUTO_INCREMENT for table `test_cost`
--
ALTER TABLE `test_cost`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `test_location`
--
ALTER TABLE `test_location`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test_type`
--
ALTER TABLE `test_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
