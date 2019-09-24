-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2019 at 04:53 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calltronix`
--

-- --------------------------------------------------------

--
-- Table structure for table `call_type`
--

CREATE TABLE `call_type` (
  `id` int(11) NOT NULL,
  `call_type_id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `call_type`
--

INSERT INTO `call_type` (`id`, `call_type_id`, `name`) VALUES
(1, '5d8a2d07a6335', 'Others'),
(2, '5d8a2d07a8ed0', 'Inquiry');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `client_name` varchar(225) NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `contact_type_id` varchar(225) NOT NULL,
  `call_type_id` varchar(225) NOT NULL,
  `source_name_id` varchar(225) NOT NULL,
  `store_name_id` varchar(225) NOT NULL,
  `question_type_id` varchar(225) NOT NULL,
  `question_sub_type_id` varchar(225) NOT NULL,
  `disposition_name_id` varchar(225) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `ticket_id`, `client_name`, `mobile_no`, `contact_type_id`, `call_type_id`, `source_name_id`, `store_name_id`, `question_type_id`, `question_sub_type_id`, `disposition_name_id`, `date_created`) VALUES
(1, 1104, 'Harlan Maldonado', 2147483647, '5d8a2d07a522d', '5d8a2d07a6335', '5d8a2d07a6501', '5d8a2d07a6720', '5d8a2d07a6934', '5d8a2d07a6b90', '5d8a2d07a6caa', '2019-09-13 17:48:56'),
(2, 1103, 'Troy Stafford', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07a6501', '5d8a2d07a902a', '5d8a2d07a6934', '5d8a2d07a921e', '5d8a2d07a921e', '2019-09-13 17:44:13'),
(3, 1102, 'Rooney Kemp', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07aa43f', '5d8a2d07a6720', '5d8a2d07aa4fe', '5d8a2d07aa5b1', '5d8a2d07aa662', '2019-09-13 17:28:14'),
(4, 1101, 'Matthew Whitaker', 2147483647, '5d8a2d07abd6f', '5d8a2d07a6335', '5d8a2d07abe80', '5d8a2d07a902a', '5d8a2d07a6934', '5d8a2d07a6b90', '5d8a2d07abf79', '2019-09-13 17:23:12'),
(5, 1100, 'Seth Arnold', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07aa43f', '5d8a2d07ad9ef', '5d8a2d07adad4', '5d8a2d07adbbf', '5d8a2d07adc99', '2019-09-13 17:15:36'),
(6, 1099, 'Xavier Wyatt', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07abe80', '5d8a2d07ad9ef', '5d8a2d07adad4', '5d8a2d07adbbf', '5d8a2d07adc99', '2019-09-13 17:11:05'),
(7, 1098, 'Dieter Copeland', 2147483647, '5d8a2d07abd6f', '5d8a2d07a6335', '5d8a2d07abe80', '5d8a2d07ad9ef', '5d8a2d07adad4', '5d8a2d07adbbf', '5d8a2d07abf79', '2019-09-13 17:09:27'),
(8, 1097, 'Arden Strong', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07aa43f', '5d8a2d07ad9ef', '5d8a2d07adad4', '5d8a2d07adbbf', '5d8a2d07b254f', '2019-09-13 17:03:54'),
(9, 1096, 'Nasim Gardner', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07abe80', '5d8a2d07b4e80', '5d8a2d07adad4', '5d8a2d07b533c', '5d8a2d07b548d', '2019-09-13 16:43:17'),
(10, 1095, 'Henry Solis', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07aa43f', '5d8a2d07ad9ef', '5d8a2d07adad4', '5d8a2d07adbbf', '5d8a2d07adc99', '2019-09-13 16:41:33'),
(11, 1094, 'Theodore Le', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07aa43f', '5d8a2d07b4e80', '5d8a2d07adad4', '5d8a2d07b533c', '5d8a2d07b548d', '2019-09-13 16:36:48'),
(12, 1093, 'Owen Gibbs', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07aa43f', '5d8a2d07b4e80', '5d8a2d07adad4', '5d8a2d07bb78e', '5d8a2d07b548d', '2019-09-13 16:32:24'),
(13, 1092, 'Kareem Turner', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07aa43f', '5d8a2d07b4e80', '5d8a2d07adad4', '5d8a2d07b533c', '5d8a2d07b548d', '2019-09-13 16:29:14'),
(14, 1091, 'Matthew Vega', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07abe80', '5d8a2d07ad9ef', '5d8a2d07adad4', '5d8a2d07adbbf', '5d8a2d07adc99', '2019-09-13 16:25:47'),
(15, 1090, 'Keith Copeland', 2147483647, '5d8a2d07a522d', '5d8a2d07a8ed0', '5d8a2d07aa43f', '5d8a2d07b4e80', '5d8a2d07adad4', '5d8a2d07b533c', '5d8a2d07b548d', '2019-09-13 16:23:05');

-- --------------------------------------------------------

--
-- Table structure for table `contact_type`
--

CREATE TABLE `contact_type` (
  `id` int(11) NOT NULL,
  `contact_type_id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_type`
--

INSERT INTO `contact_type` (`id`, `contact_type_id`, `name`) VALUES
(1, '5d8a2d07a522d', 'Contact'),
(2, '5d8a2d07abd6f', 'Non contact');

-- --------------------------------------------------------

--
-- Table structure for table `disposition_name`
--

CREATE TABLE `disposition_name` (
  `id` int(11) NOT NULL,
  `disposition_name_id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposition_name`
--

INSERT INTO `disposition_name` (`id`, `disposition_name_id`, `name`) VALUES
(1, '5d8a2d07a6caa', 'Compliment'),
(2, '5d8a2d07a921e', 'Supplier Inquiry'),
(3, '5d8a2d07aa662', 'Items Left on The Counter '),
(4, '5d8a2d07abf79', 'Disconnected '),
(5, '5d8a2d07adc99', 'Product Availability (Not under promotion)'),
(6, '5d8a2d07b254f', 'Price Inquiry (Not under promotion)'),
(7, '5d8a2d07b548d', 'Product availability (Under promotion)');

-- --------------------------------------------------------

--
-- Table structure for table `question_sub_type`
--

CREATE TABLE `question_sub_type` (
  `id` int(11) NOT NULL,
  `question_sub_type_id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_sub_type`
--

INSERT INTO `question_sub_type` (`id`, `question_sub_type_id`, `name`) VALUES
(1, '5d8a2d07a6b90', 'Career Inquiry'),
(2, '5d8a2d07a9158', 'Supplier Inquiry'),
(3, '5d8a2d07aa5b1', 'Items left on the counter '),
(4, '5d8a2d07adbbf', 'Product Availabilty (Not Under Promotion)'),
(5, '5d8a2d07b533c', 'Product Availabilty (Under Promotions)'),
(6, '5d8a2d07bb78e', 'Product Specification');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `id` int(11) NOT NULL,
  `question_type_id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`id`, `question_type_id`, `name`) VALUES
(1, '5d8a2d07a6934', 'General Inquiry'),
(2, '5d8a2d07aa4fe', 'Items left on the counter'),
(3, '5d8a2d07adad4', 'Product');

-- --------------------------------------------------------

--
-- Table structure for table `source_name`
--

CREATE TABLE `source_name` (
  `id` int(11) NOT NULL,
  `source_name_id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `source_name`
--

INSERT INTO `source_name` (`id`, `source_name_id`, `name`) VALUES
(1, '5d8a2d07a6501', 'Email'),
(2, '5d8a2d07aa43f', 'Outbound'),
(3, '5d8a2d07abe80', 'Inbound');

-- --------------------------------------------------------

--
-- Table structure for table `store_name`
--

CREATE TABLE `store_name` (
  `id` int(11) NOT NULL,
  `store_name_id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_name`
--

INSERT INTO `store_name` (`id`, `store_name_id`, `name`) VALUES
(1, '5d8a2d07a6720', 'KSRT_Sarit Center'),
(2, '5d8a2d07a902a', 'KRIV_2 Rivers'),
(3, '5d8a2d07ad9ef', 'KGLR_Galleria Shopping Mall'),
(4, '5d8a2d07b4e80', 'KHUB_Kenya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `call_type`
--
ALTER TABLE `call_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_type`
--
ALTER TABLE `contact_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disposition_name`
--
ALTER TABLE `disposition_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_sub_type`
--
ALTER TABLE `question_sub_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `source_name`
--
ALTER TABLE `source_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_name`
--
ALTER TABLE `store_name`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `call_type`
--
ALTER TABLE `call_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact_type`
--
ALTER TABLE `contact_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `disposition_name`
--
ALTER TABLE `disposition_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question_sub_type`
--
ALTER TABLE `question_sub_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `source_name`
--
ALTER TABLE `source_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_name`
--
ALTER TABLE `store_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
