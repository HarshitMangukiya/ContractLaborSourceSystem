-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2020 at 03:57 PM
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
(1, 'plaster'),
(4, 'colorwork');

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
(3, 'surad', 4),
(23, 'dfgfd', 15),
(24, 'SURAT', 15),
(25, 'dfcg', 15),
(26, 'vxcv', 15),
(27, 'vxcv', 15),
(28, 'vxcvxdd', 4),
(78, 'SURAT', 4),
(98, 'fg', 15),
(99, 'sfref', 4),
(100, 'df', 4);

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
(3, 'uk'),
(4, 'australia'),
(5, 'india');

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
  `c_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_firstname`, `c_lastname`, `c_email`, `c_phone`, `c_address`, `c_location`, `c_country`, `c_state`, `c_city`, `c_pincode`, `c_password`, `c_about`, `c_image`, `c_date`) VALUES
(7, 'sdsf', 'dfdfg', 'dfgfdgd', '435454', 'cgfcfxcvc', '', 5, 4, 3, '395004', '3434', 'fcgvbcregrfdg', 'sdsf1588479695b2.jpg', '2020-05-02 12:05:46'),
(8, 'HARDIK', 'MANGUKIYA', 'gfhgfh@gmail.com', '34394859', '41,KRUSHNA JIVAN SOC,SINAGANPOR CIRCLE,COUZWAY ROAD , VED ROAD,SURAT', 'surat', 5, 4, 28, '395004', '333', 'dsfsf', 'HARDIK1588735793property-3.jpg', '2020-05-06 03:29:53'),
(9, '', '', '', '', '', '', 4, 15, 25, '', '', '', '1588735993banner-3.jpg', '2020-05-06 03:33:13'),
(10, 'HARDIK', 'MANGUKIYAfdgdgfd', 'gfhgfh@gmail.com', '34394859', '41,KRUSHNA JIVAN SOC,SINAGANPOR CIRCLE,COUZWAY ROAD , VED ROAD,SURAT', '', 4, 15, 23, '395004', '2211', '', 'HARDIK1588752364service-2.jpg', '2020-05-06 08:06:04'),
(11, 'fddd', 'MANGUKIYA', 'sdfdff', '', '41,KRUSHNA JIVAN SOC,SINAGANPOR CIRCLE,COUZWAY ROAD , VED ROAD,SURAT', '', 4, 15, 24, '395004', '', '', 'fddd1588820388avatar-5.jpg', '2020-05-07 02:59:48'),
(12, 'dsfd', 'dfgdfg', 'sdfsdf@gmail.com', '3354354', 'NULL', 'NULL', 5, 16, 24, 'NULL', '34545', 'NULL', 'NULL', '2020-05-09 11:40:35'),
(14, 'fcxg', 'ccvb', 'gfhgfh@gmail.com', '45445', 'NULL', 'NULL', 5, 16, 24, 'NULL', '342', 'NULL', 'NULL', '2020-05-09 11:41:57'),
(15, '$firstname', '$lastname', '$email', '$phone', '', '', 5, 16, 24, '', '$password', '', '', '2020-05-09 11:47:35'),
(17, 'xcv', 'cvvc', 'vivek.mangukiya7030@gmail.com', '34394859', '', '', 5, 16, 24, '', '344', '', '', '2020-05-09 11:50:39'),
(18, 'YOGIh', 'RANGANI', 'harshitmangukiya@gmail.com', '8160119895', '5,GOPINATH ROW HOUSE , OPP HARI OM MILL , VED ROAD ,SURAT', 'surat', 5, 4, 3, '395005', '2211', 'i am man harshit', 'YOGI1589204209avatar-7.jpg', '2020-05-09 11:51:45'),
(19, 'dfcv', 'cxbv', 'sdfsdf@gmail.com', '8160119895', '', '', 5, 16, 24, '', '2211', '', '', '2020-05-13 15:27:59'),
(21, 'sdfd', 'fdgdf', 'gfhgfh@gmail.com', '343984', 'sdsdsd', 'SURAT', 4, 15, 24, '234567', '3434', 'rsdffd', '', '2020-05-13 15:28:43'),
(22, 'cxc', 'fdcf', 'harshit@gmail.com', '1112233445', '', '', 5, 16, 24, '', '2211', '', '', '2020-05-19 07:39:17'),
(23, 'kah', 'man', 'harshitman@gmail.com', '8160119895', '', '', 5, 16, 24, '', '2211', '', '', '2020-05-19 07:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `hiredlabor`
--

CREATE TABLE `hiredlabor` (
  `h_id` int(11) NOT NULL,
  `h_customerid` int(11) NOT NULL,
  `h_laborid` int(11) NOT NULL,
  `h_totallabor` int(11) NOT NULL,
  `h_totalcharge` int(11) NOT NULL,
  `h_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `h_flag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hiredlabor`
--

INSERT INTO `hiredlabor` (`h_id`, `h_customerid`, `h_laborid`, `h_totallabor`, `h_totalcharge`, `h_date`, `h_flag`) VALUES
(34, 10, 26, 1, 4005, '2020-05-18 07:13:07', 0),
(35, 21, 24, 1, 500, '2020-05-18 08:36:28', 0),
(38, 23, 31, 1, 222, '2020-05-19 08:29:32', 0),
(39, 23, 37, 1, 222, '2020-05-19 08:38:24', 0),
(41, 18, 40, 1, 444, '2020-05-19 13:55:32', 0);

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
(76, '1588740382service-2.jpg', 1, 24),
(77, '1588740253service-3.jpg', 2, 24),
(79, '1588740589service.jpg', 2, 24),
(80, '1588917114avatar.jpg', 1, 24),
(81, '1588917128avatar-14.png', 1, 24),
(82, '1588917139avatar-7.jpg', 1, 24),
(132, '1589809701blog-3.jpg', 1, 26),
(139, '1589809736blog-4.jpg', 1, 26),
(160, '1589810149blog-3.jpg', 1, 26),
(162, '1589865728blog-7.jpg', 1, 26);

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
  `l_leaderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labor`
--

INSERT INTO `labor` (`l_id`, `l_firstname`, `l_lastname`, `l_gender`, `l_age`, `l_email`, `l_phone`, `l_aadharno`, `l_address`, `l_location`, `l_country`, `l_state`, `l_city`, `l_pincode`, `l_password`, `l_about`, `l_image`, `l_status`, `l_charge`, `l_date`, `l_categoryid`, `l_leaderid`) VALUES
(24, 'harshit', 'MANGUKIYA', 'male', 32, 'mangukiyaharshit@gmail.com', '8160119895', '232333344444', '12,archand,soci', 'surat', 4, 15, 24, '395004', '11233', 'fdkjgflk fglmkmfdlm tfjntfg, sdkd', '1588737407floor-plans.png', 'unavailable', 500, '2020-05-06 03:55:43', 1, 28),
(26, 'egf', 'dfd', 'female', 22, 'mangukiyaharshit@gmail.com', '8899778822', '23983489344', '41,KRUSHNA JIVAN SOC,SINAGANPOR CIRCLE,COUZWAY ROAD , VED ROAD,SURAT', 'surat', 5, 4, 78, '395004', '2211', 'i am well tranined worker in my worker group', '1589600046avatar.jpg', 'unavailable', 4005, '2020-05-06 08:47:59', 4, 31),
(28, 'HARDIK', 'MANGUKIYA', 'female', 23, '', '', '', '41,KRUSHNA JIVAN SOC,SINAGANPOR CIRCLE,COUZWAY ROAD , VED ROAD,SURAT', '', 5, 4, 3, '395004', '', 'dsfg fgbfh fdbf gdffdb dfgbfgg', '1588831623avatar-8.jpg', 'unavailable', 444, '2020-05-07 06:07:03', 1, 0),
(31, 'esfs', 'sdsfd', 'female', 23, 'gfhgfh@gmail.com', '34394859', '34874387', 'dsfkljfjk', 'surat', 5, 4, 28, '395004', '2``', '', '1589166209avatar-5.jpg', 'unavailable', 222, '2020-05-11 03:03:29', 1, 0),
(37, 'jay', 'mangukiya', 'female', 22, 'mangukiyajay@gmail.com', '8160119895', '2223444544', '5,gopi,soci', 'surat', 4, 15, 24, '234567', '2211', 'saffsx', '1589859155blog-7.jpg', 'unavailable', 222, '2020-05-15 06:03:44', 4, 0),
(40, 'dfdg', 'fgggfh', 'female', 23, 'gfhgfh@gmail.com', '9920111897', '2334243345', 'dsfkljfjk', 'vapi', 5, 4, 3, '395004', '2211', 'fxcxcv', '', 'unavailable', 444, '2020-05-15 08:22:57', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `p_customerid` int(11) NOT NULL,
  `p_method` varchar(128) NOT NULL,
  `p_totalpayment` int(11) NOT NULL,
  `p_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`p_id`, `p_customerid`, `p_method`, `p_totalpayment`, `p_date`) VALUES
(1, 23, 'online', 39, '2020-05-19 07:56:35'),
(2, 23, 'online', 39, '2020-05-19 07:58:09'),
(3, 23, 'online', 99, '2020-05-19 08:02:37'),
(4, 23, 'online', 69, '2020-05-19 08:02:50'),
(5, 23, 'online', 69, '2020-05-19 08:02:52'),
(6, 23, 'online', 69, '2020-05-19 08:04:05'),
(7, 23, 'online', 39, '2020-05-19 08:05:02'),
(8, 23, 'online', 69, '2020-05-19 08:06:39'),
(9, 23, 'online', 69, '2020-05-19 08:06:53'),
(10, 23, 'online', 99, '2020-05-19 08:07:01'),
(11, 23, 'online', 99, '2020-05-19 08:11:44'),
(12, 23, 'online', 99, '2020-05-19 08:15:33'),
(13, 23, 'online', 99, '2020-05-19 08:15:47'),
(14, 23, 'online', 99, '2020-05-19 08:15:55'),
(15, 23, 'online', 99, '2020-05-19 08:17:36'),
(16, 23, 'online', 39, '2020-05-19 08:17:48'),
(17, 23, 'online', 39, '2020-05-19 08:17:58'),
(18, 18, 'online', 99, '2020-05-19 08:56:53');

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
  `r_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`r_id`, `r_customerid`, `r_laborid`, `r_rating`, `r_review`, `r_date`) VALUES
(1, 10, 24, 2, 'cxbb', '2020-05-08 07:53:49'),
(2, 11, 26, 4, 'fgfdff', '2020-05-08 07:54:14'),
(7, 8, 28, 5, 'xcvxcvc', '2020-05-08 08:15:31'),
(8, 7, 28, 1, 'dvsvdxv', '2020-05-08 08:16:55');

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
(4, 'sadsssfdfg', 5),
(15, 'khsddfdf', 4),
(16, 'gujarat', 5);

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
  ADD KEY `r_laborid` (`r_laborid`);

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
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `ci_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `hiredlabor`
--
ALTER TABLE `hiredlabor`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT for table `labor`
--
ALTER TABLE `labor`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`r_customerid`) REFERENCES `customer` (`c_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`r_laborid`) REFERENCES `labor` (`l_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`s_cid`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
