-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 07:19 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `labor`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ca_id` int(11) NOT NULL,
  `ca_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ca_id`, `ca_name`) VALUES
(4, 'colorwork'),
(7, 'WallWork'),
(8, 'LaborWork'),
(9, 'Digging'),
(10, 'Construction'),
(11, 'Demolition');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `ci_id` int(11) NOT NULL,
  `ci_name` varchar(150) NOT NULL,
  `ci_sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`ci_id`, `ci_name`, `ci_sid`) VALUES
(104, 'Surat', 20),
(105, 'Ahmedabad', 20),
(106, 'Vadodara', 20),
(107, 'Navsari', 20),
(108, 'Gandhidham', 20),
(109, 'Firozobad', 19),
(110, 'Jahanpanah', 19),
(111, 'Tughlqabad', 19),
(112, 'Spokane', 23),
(113, 'Seattle', 23),
(114, 'Tacoma', 23),
(115, 'Sacramento', 25),
(116, 'Fresno', 25),
(117, 'Bakersfield', 25);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(14, 'America'),
(16, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_firstname` varchar(40) NOT NULL,
  `c_lastname` varchar(40) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_address` varchar(128) NOT NULL,
  `c_location` varchar(200) NOT NULL,
  `c_country` int(11) NOT NULL,
  `c_state` int(11) NOT NULL,
  `c_city` int(11) NOT NULL,
  `c_pincode` varchar(6) NOT NULL,
  `c_password` varchar(40) NOT NULL,
  `c_about` varchar(200) NOT NULL,
  `c_image` varchar(200) NOT NULL,
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `c_dflag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_firstname`, `c_lastname`, `c_email`, `c_phone`, `c_address`, `c_location`, `c_country`, `c_state`, `c_city`, `c_pincode`, `c_password`, `c_about`, `c_image`, `c_date`, `c_dflag`) VALUES
(65, 'Manan', 'Mandviya', 'manan@gmail.com', '8897790788', '', '', 16, 20, 107, '', '2211@hh', '', 'Manan1590638262avatar-5.jpg', '2020-05-28 03:54:36', 0),
(66, 'Jay', 'Mavani', 'jay@gmail.com', '9979201234', '', '', 16, 19, 110, '', '2211@hh', 'I want color worker', 'Jay1590638497avatar-9.jpg', '2020-05-28 04:00:14', 0),
(67, 'Khushal', 'Mangukiya', 'khushal@gmail.com', '8293994055', '', '', 16, 20, 104, '', '2211@hh', '', 'Khushal1590639389avatar.jpg', '2020-05-28 04:10:34', 0),
(68, 'Harshit', 'Mangukiya', 'harshit@gmail.com', '8160119898', '', '', 16, 20, 104, '', '2211@hh', 'I want well trained labors', 'Harshit1590639744avatar-11.jpg', '2020-05-28 04:18:27', 0),
(69, 'Ravi', 'Maniya', 'ravi@gmail.com', '9867345690', '', '', 16, 19, 110, '396007', '2211@hh', '', 'Ravi1590640106avatar-10.jpg', '2020-05-28 04:25:26', 0),
(70, 'Manvik', 'Nakrani', 'manvik@gmail.com', '9867454595', '', '', 16, 20, 106, '', '2211@hh', '', 'Manvik1590640821avatar-6.jpg', '2020-05-28 04:39:08', 0),
(71, 'Hardik', 'Ragani', 'hardik@gmail.com', '9956728494', '', '', 16, 20, 108, '', '2211@hh', '', 'Hardik1590641010person_2.jpg', '2020-05-28 04:42:09', 0),
(72, 'Jaypal', 'Nakrani', 'jaypal@gmail.com', '9856738434', '', '', 16, 20, 107, '', '2211@hh', '', 'Jaypal1590641166person_1.jpg', '2020-05-28 04:45:37', 0),
(73, 'Rita', 'Maniya', 'rita@gmail.com', '9853474833', '', '', 16, 19, 111, '', '2211@hh', '', 'Rita1590641533avatar-2.jpg', '2020-05-28 04:51:31', 0),
(74, 'Vivek', 'Gopani', 'vivek@gmail.com', '9857638534', '', '', 16, 20, 106, '', '2211@hh', '', 'Vivek1590641696avatar-8.jpg', '2020-05-28 04:54:28', 0),
(76, 'Yagnik', 'Maniya', 'mangukiyaharshit@gmail.com', '9876238455', '', '', 16, 20, 105, '', '2211@hh', '', 'Yagnik1590987027images (18).jpg', '2020-05-28 05:35:05', 0),
(77, 'harshit', 'mangukiya', 'admin@gmail.com', '', '', '', 16, 19, 105, '', '2211@hh', '', '', '2020-05-28 05:51:10', 1),
(78, 'Abhishek', 'Maniya', 'abhishek@gmail.com', '4872394024', '', '', 16, 20, 105, '', '2211@hh', '', 'Abhishek1590646695user.jpg', '2020-05-28 06:13:20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hiredlabor`
--

CREATE TABLE `hiredlabor` (
  `h_id` int(11) NOT NULL,
  `h_customerid` int(11) NOT NULL,
  `h_laborid` int(11) NOT NULL,
  `h_totalcharge` int(11) NOT NULL,
  `h_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `h_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hiredlabor`
--

INSERT INTO `hiredlabor` (`h_id`, `h_customerid`, `h_laborid`, `h_totalcharge`, `h_date`, `h_flag`) VALUES
(98, 76, 83, 400, '2020-05-28 05:44:09', 2),
(99, 76, 83, 400, '2020-05-28 05:46:30', 3),
(100, 76, 83, 400, '2020-05-28 05:47:52', 4),
(101, 68, 89, 500, '2020-05-28 07:03:46', 1),
(102, 76, 90, 400, '2020-05-28 08:44:23', 2),
(103, 76, 84, 500, '2020-05-29 04:15:11', 1),
(104, 76, 83, 400, '2020-05-29 04:31:22', 4),
(105, 76, 88, 600, '2020-05-31 05:47:45', 1),
(106, 76, 83, 400, '2020-05-31 14:46:42', 4),
(107, 76, 85, 600, '2020-06-01 15:46:30', 1),
(108, 76, 85, 600, '2020-06-01 15:49:02', 1),
(109, 76, 89, 500, '2020-06-01 16:11:30', 2),
(110, 76, 89, 500, '2020-06-01 16:35:26', 4),
(111, 76, 89, 500, '2020-06-01 16:38:52', 4),
(112, 76, 89, 500, '2020-06-01 16:42:10', 4),
(113, 76, 89, 500, '2020-06-01 16:43:44', 4),
(114, 76, 89, 500, '2020-06-01 16:53:38', 4),
(115, 76, 89, 500, '2020-06-01 16:56:44', 4),
(116, 76, 89, 500, '2020-06-01 17:06:57', 4),
(117, 76, 89, 500, '2020-06-01 17:08:45', 4),
(118, 76, 89, 500, '2020-06-01 17:11:16', 2),
(119, 76, 89, 500, '2020-06-01 17:13:49', 4),
(120, 76, 89, 500, '2020-06-01 17:18:08', 3),
(121, 76, 83, 400, '2020-06-02 05:33:51', 4),
(122, 76, 86, 300, '2020-06-02 08:59:22', 1),
(123, 76, 83, 400, '2020-06-03 04:00:54', 2),
(124, 76, 83, 400, '2020-06-03 08:47:56', 4),
(125, 76, 83, 400, '2020-06-03 15:22:10', 1),
(126, 76, 83, 400, '2020-06-03 15:24:08', 4),
(127, 76, 83, 400, '2020-06-03 16:35:02', 1),
(128, 76, 83, 400, '2020-06-03 16:35:56', 1),
(129, 76, 83, 400, '2020-06-03 16:37:37', 1),
(130, 76, 83, 400, '2020-06-03 16:39:11', 1),
(131, 76, 83, 400, '2020-06-03 16:40:25', 1),
(132, 76, 83, 400, '2020-06-03 16:42:53', 4);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `i_id` int(11) NOT NULL,
  `i_name` varchar(200) NOT NULL,
  `i_flag` int(11) NOT NULL,
  `i_laborid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`i_id`, `i_name`, `i_flag`, `i_laborid`) VALUES
(229, '1590645560images (1).jpg', 1, 83),
(230, '1590645560images (2).jpg', 1, 83),
(231, '1590645560images (8).jpg', 1, 83),
(232, 'd9CQQcQOtvs', 2, 83),
(233, '8-xxNNfnpDk', 2, 89),
(234, 'vVeHUxT9tKY', 2, 89),
(235, '1590656715images (1).jpg', 1, 90),
(236, '1590656715images (2).jpg', 1, 90),
(237, '1590656715images (3).jpg', 1, 90),
(238, '1590656715images (6).jpg', 1, 90),
(239, '1590656715images (7).jpg', 1, 90),
(240, '8-xxNNfnpDk', 2, 90),
(241, '1590904537images (1).jpg', 1, 83),
(244, 'se9DDAwwGQY', 2, 83);

-- --------------------------------------------------------

--
-- Table structure for table `labor`
--

CREATE TABLE `labor` (
  `l_id` int(11) NOT NULL,
  `l_firstname` varchar(40) NOT NULL,
  `l_lastname` varchar(40) NOT NULL,
  `l_gender` varchar(10) NOT NULL,
  `l_age` int(11) NOT NULL,
  `l_email` varchar(100) NOT NULL,
  `l_phone` varchar(10) NOT NULL,
  `l_aadharno` varchar(12) NOT NULL,
  `l_address` varchar(128) NOT NULL,
  `l_location` varchar(200) NOT NULL,
  `l_country` int(11) NOT NULL,
  `l_state` int(11) NOT NULL,
  `l_city` int(11) NOT NULL,
  `l_pincode` varchar(6) NOT NULL,
  `l_password` varchar(40) NOT NULL,
  `l_about` varchar(200) NOT NULL,
  `l_image` varchar(200) NOT NULL,
  `l_status` varchar(20) NOT NULL,
  `l_charge` int(11) NOT NULL,
  `l_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `l_categoryid` int(11) NOT NULL,
  `l_leaderid` int(11) NOT NULL,
  `l_dflag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labor`
--

INSERT INTO `labor` (`l_id`, `l_firstname`, `l_lastname`, `l_gender`, `l_age`, `l_email`, `l_phone`, `l_aadharno`, `l_address`, `l_location`, `l_country`, `l_state`, `l_city`, `l_pincode`, `l_password`, `l_about`, `l_image`, `l_status`, `l_charge`, `l_date`, `l_categoryid`, `l_leaderid`, `l_dflag`) VALUES
(83, 'Ramesh', 'Dalal', 'male', 27, 'mangukiyaharshit@gmail.com', '9992201023', '123455667788', '1,shiv soci,katargam', '', 16, 20, 104, '395004', '2211hh', '', '1590645171avatar-17.jpg', 'unavailable', 400, '2020-05-28 03:20:57', 4, 85, 0),
(84, 'Karan', 'Maniya', 'male', 29, '', '9979201178', '998897572856', '18,adajan,surat', '', 16, 20, 104, '395006', '2211hh', '', '', 'unavailable', 500, '2020-05-28 03:23:53', 7, 83, 0),
(85, 'Jaydip', 'Mavani', 'male', 28, '', '8897790789', '992266839045', '7,archna soci,near main road', '', 16, 20, 107, '395007', '2211hh', '', '1590649002images (2).jpg', 'unavailable', 600, '2020-05-28 03:35:58', 8, 0, 0),
(86, 'Jay', 'Savliya', 'male', 34, '', '9426390117', '123478904567', '19,ved road,near circle road', '', 16, 20, 107, '395007', '2211hh', '', '', 'unavailable', 300, '2020-05-28 03:39:14', 9, 85, 0),
(87, 'Jivan', 'Pariwala', 'male', 35, '', '9979201179', '123445577940', '12,shiv dhara soci,near market', '', 16, 20, 106, '345005', '2211hh', '', '', 'available', 600, '2020-05-28 03:43:09', 10, 0, 0),
(88, 'Abhi', 'Goliwala', 'male', 38, '', '9979201180', '235678909045', '1,vashudev flat,near ved road', '', 16, 20, 105, '394005', '2211hh', '', '', 'unavailable', 600, '2020-05-28 03:45:50', 11, 0, 0),
(89, 'Harshil', 'Nakrani', 'male', 27, 'kinal.mangukiya@gmail.com', '8160119895', '112294053995', '12,gokul flat,near highway road', '', 16, 20, 106, '456006', '2211hh', '', '1590646198images (7).jpg', 'available', 500, '2020-05-28 03:50:21', 8, 0, 0),
(90, 'Parth', 'Gopani', 'male', 25, '', '8160119896', '122395888304', '17,somnath soci,near temple', '', 16, 20, 105, '345004', '2211hh', '', '', 'available', 400, '2020-05-28 04:58:11', 7, 0, 0),
(91, 'Utsav', 'Nakrani', 'male', 26, '', '8160119897', '222334348593', '1,archsoci,near hirbag', '', 16, 20, 104, '395008', '2211hh', '', '', 'available', 500, '2020-05-28 05:00:46', 4, 0, 0),
(92, 'Kinal', 'Nakrani', 'female', 34, '', '8160119898', '452945863934', '23,rampark soci', '', 16, 20, 105, '395006', '2211hh', '', '', 'available', 600, '2020-05-28 05:04:04', 4, 0, 0),
(94, 'Manvik', 'Gopani', 'male', 34, '', '9426390118', '233849273482', '1,jalaram soci,', '', 16, 20, 105, '234007', '2211hh', '', '', 'available', 500, '2020-05-28 05:23:45', 7, 0, 0),
(95, 'Gopal', 'Gopani', 'female', 34, 'gopal@gmail.com', '8160119899', '123456798472', '1,gopinath soci,', 'katargam', 16, 20, 104, '345006', '2211hh', 'i am a labor', '1590721916images (3).jpg', 'available', 500, '2020-05-29 03:11:56', 8, 86, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `p_customerid` int(11) NOT NULL,
  `p_method` varchar(128) NOT NULL,
  `p_totalpayment` int(11) NOT NULL,
  `p_date` date NOT NULL,
  `p_enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `p_customerid`, `p_method`, `p_totalpayment`, `p_date`, `p_enddate`) VALUES
(95, 65, 'online', 150, '2020-05-28', '2020-08-26'),
(96, 66, 'online', 200, '2020-05-28', '2021-05-28'),
(97, 67, 'online', 100, '2020-05-28', '2020-06-27'),
(98, 68, 'online', 150, '2020-05-28', '2020-08-26'),
(99, 69, 'online', 150, '2020-05-28', '2020-08-26'),
(100, 70, 'online', 150, '2020-05-28', '2020-08-26'),
(101, 71, 'online', 200, '2020-05-28', '2021-05-28'),
(102, 73, 'online', 150, '2020-05-28', '2020-08-26'),
(103, 74, 'online', 150, '2020-05-28', '2020-08-26'),
(104, 76, 'online', 150, '2020-05-28', '2020-08-26'),
(105, 78, 'online', 150, '2020-05-28', '2020-08-26'),
(106, 72, 'online', 100, '2020-06-02', '2020-07-02');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `r_id` int(11) NOT NULL,
  `r_customerid` int(11) NOT NULL,
  `r_laborid` int(11) NOT NULL,
  `r_rating` int(11) NOT NULL,
  `r_review` varchar(200) NOT NULL,
  `r_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `r_hid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `r_customerid`, `r_laborid`, `r_rating`, `r_review`, `r_date`, `r_hid`) VALUES
(34, 76, 83, 3, 'dsxv', '2020-06-03 15:11:31', 124),
(35, 76, 83, 4, 'fcgcbv ', '2020-06-03 15:25:12', 126);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(150) NOT NULL,
  `s_cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`s_id`, `s_name`, `s_cid`) VALUES
(19, 'Delhi', 16),
(20, 'Gujarat', 16),
(21, 'Goa', 16),
(22, 'Haryana', 16),
(23, 'Washington', 14),
(24, 'Florida', 14),
(25, 'California', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ci_id`),
  ADD KEY `ci_sid` (`ci_sid`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `c_country` (`c_country`),
  ADD KEY `c_state` (`c_state`),
  ADD KEY `c_city` (`c_city`);

--
-- Indexes for table `hiredlabor`
--
ALTER TABLE `hiredlabor`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `h_customerid` (`h_customerid`),
  ADD KEY `h_laborid` (`h_laborid`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `i_laborid` (`i_laborid`);

--
-- Indexes for table `labor`
--
ALTER TABLE `labor`
  ADD PRIMARY KEY (`l_id`),
  ADD KEY `l_country` (`l_country`),
  ADD KEY `l_state` (`l_state`),
  ADD KEY `l_city` (`l_city`),
  ADD KEY `labor_ibfk_4` (`l_categoryid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_customerid` (`p_customerid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `r_customerid` (`r_customerid`),
  ADD KEY `r_laborid` (`r_laborid`),
  ADD KEY `r_hid` (`r_hid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_cid` (`s_cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `hiredlabor`
--
ALTER TABLE `hiredlabor`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
--
-- AUTO_INCREMENT for table `labor`
--
ALTER TABLE `labor`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_3` FOREIGN KEY (`ci_sid`) REFERENCES `state` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`c_country`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_2` FOREIGN KEY (`c_state`) REFERENCES `state` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_ibfk_3` FOREIGN KEY (`c_city`) REFERENCES `city` (`ci_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hiredlabor`
--
ALTER TABLE `hiredlabor`
  ADD CONSTRAINT `hiredlabor_ibfk_1` FOREIGN KEY (`h_customerid`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hiredlabor_ibfk_2` FOREIGN KEY (`h_laborid`) REFERENCES `labor` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`i_laborid`) REFERENCES `labor` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `labor`
--
ALTER TABLE `labor`
  ADD CONSTRAINT `labor_ibfk_1` FOREIGN KEY (`l_country`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labor_ibfk_2` FOREIGN KEY (`l_state`) REFERENCES `state` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labor_ibfk_3` FOREIGN KEY (`l_city`) REFERENCES `city` (`ci_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `labor_ibfk_4` FOREIGN KEY (`l_categoryid`) REFERENCES `category` (`ca_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`p_customerid`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`r_customerid`) REFERENCES `customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`r_laborid`) REFERENCES `labor` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`r_hid`) REFERENCES `hiredlabor` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`s_cid`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
