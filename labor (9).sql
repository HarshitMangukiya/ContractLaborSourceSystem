-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 04:57 AM
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
(10, 'HARDIK', 'MANGUKIYAfdgdgfd', 'gfhgfh@gmail.com', '34394859', '41,KRUSHNA JIVAN SOC,SINAGANPOR CIRCLE,COUZWAY ROAD , VED ROAD,SURAT', '', 4, 15, 23, '395004', '', '', 'HARDIK1588752364service-2.jpg', '2020-05-06 08:06:04'),
(11, 'fddd', 'MANGUKIYA', 'sdfdff', '', '41,KRUSHNA JIVAN SOC,SINAGANPOR CIRCLE,COUZWAY ROAD , VED ROAD,SURAT', '', 4, 15, 24, '395004', '', '', 'fddd1588820388avatar-5.jpg', '2020-05-07 02:59:48');

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
  `h_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(82, '1588917139avatar-7.jpg', 1, 24);

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
(24, 'harshit', 'MANGUKIYA', 'male', 32, 'mangukiyaharshit@gmail.com', '8160119895', '232333344444', '12,archand,soci', 'surat', 4, 15, 24, '395004', '11233', 'fdkjgflk fglmkmfdlm tfjntfg, sdkd', '1588737407floor-plans.png', 'available', 500, '2020-05-06 03:55:43', 1, 28),
(26, 'egf', 'dfd', 'female', 34, 'mangukiyaharshit@gmail.com', '8899778822', '23983489348', '41,KRUSHNA JIVAN SOC,SINAGANPOR CIRCLE,COUZWAY ROAD , VED ROAD,SURAT', '', 5, 4, 78, '395004', '', 'i am well tranined worker in my worker group', '1588754879avatar-2.jpg', 'available', 300, '2020-05-06 08:47:59', 4, 28),
(28, 'HARDIK', 'MANGUKIYA', 'female', 23, '', '', '', '41,KRUSHNA JIVAN SOC,SINAGANPOR CIRCLE,COUZWAY ROAD , VED ROAD,SURAT', '', 5, 4, 3, '395004', '', 'dsfg fgbfh fdbf gdffdb dfgbfgg', '1588831623avatar-8.jpg', 'available', 444, '2020-05-07 06:07:03', 1, 0),
(30, 'asdsad', 'sdsd', '', 0, '', '', '', '', '', 4, 15, 23, '', '', '', '', '', 0, '2020-05-08 08:19:11', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `p_id` int(11) NOT NULL,
  `p_hiredid` int(11) NOT NULL,
  `p_customerid` int(11) NOT NULL,
  `p_method` varchar(128) NOT NULL,
  `p_totalpayment` int(11) NOT NULL,
  `p_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 7, 28, 1, 'dvsvdxv', '2020-05-08 08:16:55'),
(9, 7, 30, 1, 'sdfdfdg', '2020-05-08 08:19:47');

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
(15, 'khsddfdf', 4);

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
  ADD KEY `p_hiredid` (`p_hiredid`),
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
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `hiredlabor`
--
ALTER TABLE `hiredlabor`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `labor`
--
ALTER TABLE `labor`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`p_hiredid`) REFERENCES `hiredlabor` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
