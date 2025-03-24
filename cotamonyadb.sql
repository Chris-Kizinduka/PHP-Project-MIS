-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2017 at 06:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cotamonyadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contractperiod`
--

CREATE TABLE IF NOT EXISTS `contractperiod` (
  `cid` int(11) NOT NULL,
  `periodname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractperiod`
--

INSERT IGNORE INTO `contractperiod` (`cid`, `periodname`) VALUES
(1, ' 1_year'),
(2, '2_years');

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE IF NOT EXISTS `function` (
  `function_id` int(11) NOT NULL,
  `fcname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `function`
--

INSERT IGNORE INTO `function` (`function_id`, `fcname`) VALUES
(1, 'Admin'),
(2, 'Accountant'),
(3, 'Percepteur');

-- --------------------------------------------------------

--
-- Table structure for table `leasing`
--

CREATE TABLE IF NOT EXISTS `leasing` (
  `leasing_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `cid` int(11) NOT NULL,
  `due_amount` varchar(50) NOT NULL,
  `member_id` int(11) NOT NULL,
  `moto_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leasing`
--

INSERT IGNORE INTO `leasing` (`leasing_id`, `start_date`, `end_date`, `cid`, `due_amount`, `member_id`, `moto_id`, `status`) VALUES
(1, '2017-10-17', '2018-10-12', 1, '2000000', 2, 26, 'activeted'),
(5, '2017-10-17', '2018-10-12', 1, '2500000', 11, 25, 'activeted'),
(6, '2017-10-17', '2018-10-12', 1, '2500000', 1, 28, 'activeted'),
(7, '2017-10-17', '2018-10-12', 1, '2000000', 4, 29, 'activeted'),
(8, '2017-10-17', '2018-10-12', 1, '2500000', 7, 27, 'activeted');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `m_image` varchar(100) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `n_ID` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `place_of_residence` varchar(30) NOT NULL,
  `fmly_m_name` varchar(50) NOT NULL,
  `fmly_m_phone` varchar(20) NOT NULL,
  `fmly_m_id` varchar(20) NOT NULL,
  `function` varchar(20) NOT NULL,
  `driving_license_no` varchar(30) DEFAULT NULL,
  `license_category` varchar(20) DEFAULT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT IGNORE INTO `member` (`member_id`, `fname`, `lname`, `m_image`, `dob`, `gender`, `n_ID`, `status`, `phone_number`, `place_of_residence`, `fmly_m_name`, `fmly_m_phone`, `fmly_m_id`, `function`, `driving_license_no`, `license_category`, `date_created`) VALUES
(1, 'Faustin', 'havugimana', 'd.jpg', '1996-03-03', 'male', '1199623357789', 'Married', '0788944100', 'kigali', 'Iradukunda gervais', '0786673455', '11993445677', 'Driver', '1199623357789', 'A', '0000-00-00'),
(2, 'claude', 'habarugira', 'm_images/Frank 20170404_201326.jpg', '1994-05-02', 'male', '1199423357789', 'Married', '0788678543', 'kigali', 'mujawamariya claudine', '0786670405', '1198544567724', 'shareholder', '1199623357789', 'A', '2017-09-19'),
(3, 'jules', 'niyogakiza', '', '1994-05-02', 'male', '1199423357789', 'Single', '0788678543', 'kigali', 'mujawamariya claudine', '0786670405', '1198544567724', 'Driver', '1199623357789', 'A', '2017-09-19'),
(4, 'Bosco', ' Niyobuhungiro', 'm_images/jackson.jpg', '1986-08-08', 'male', '11986233577894', 'Single', '0788678543', 'Kigali', 'claude barame', '0786670405', '11985445677243', 'Driver', '1199623357789', 'A', '2017-09-24'),
(6, 'Eliab', 'Ishimwe', 'm_images/elab.jpg', '1989-02-06', 'male', '1199123357789', 'Single', '0788678543', 'Kigali', 'Habagusenga Innocent', '0786670405', '1198544567724', 'Employee', '1199623357789', 'A', '2017-09-24'),
(7, 'Christian', 'Rugira', 'm_images/chris.jpg', '1996-02-04', 'male', '11986233577894', 'Single', '0788678543', 'Kigali', 'Tumukunde yvette', '0786670405', '11985445677243', 'Driver', '1199623357789', 'A', '2017-09-24'),
(9, 'Nicole', 'Niyigena', 'm_images/edovia.jpg', '1991-08-03', 'female', '1199623357789', 'Single', '0788678543', 'Kigali', 'Iradukunda damascene', '0786670405', '1198544567724', 'Employee', '', '', '2017-09-24'),
(10, 'Wellars', 'Rutamu', 'm_images/wellars green card.jpg', '1990-10-30', 'male', '11986233577894', 'Single', '0788678543', 'Kigali', 'Alice', '0786670405', '1198544567724', 'Driver', '1199623357789', 'A', '2017-10-05'),
(11, 'Iradukunda', 'Jervais', 'm_images/becka.jpg', '1992-04-27', 'male', '11986233577894', 'Single', '0788678543', 'Kigali', 'Umuhoza Aline', '0786670405', '1198544567724', 'Driver', '1199623357789', 'A', '2017-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE IF NOT EXISTS `model` (
  `model_id` int(11) NOT NULL,
  `marque` varchar(20) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT IGNORE INTO `model` (`model_id`, `marque`, `supplier_id`) VALUES
(1, 'TVS', 3),
(2, 'SUZUKI', 2),
(3, 'YAMAHA', 1),
(5, 'madeinRwanda', 4);

-- --------------------------------------------------------

--
-- Table structure for table `moto`
--

CREATE TABLE IF NOT EXISTS `moto` (
  `moto_id` int(11) NOT NULL,
  `plate_number` varchar(20) NOT NULL,
  `motoimage` varchar(100) NOT NULL,
  `model_id` int(11) NOT NULL,
  `property_value` varchar(30) NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moto`
--

INSERT IGNORE INTO `moto` (`moto_id`, `plate_number`, `motoimage`, `model_id`, `property_value`, `status`) VALUES
(25, 'RD 210 H', 'moto_images/TVS-Phoenix-125.jpg', 1, '1500000', 'leased'),
(26, 'RC 348 K', 'moto_images/3310.jpg', 1, '1500000', 'leased'),
(27, 'RB 453 K', 'moto_images/TVS-Phoenix-125.jpg', 1, '1400000', 'leased'),
(28, 'RA 234 S', 'moto_images/TVS-Phoenix-125.jpg', 1, '1400000', 'leased'),
(29, 'RA 400 K', 'moto_images/TVS-Phoenix-125.jpg', 1, '1500000', 'leased'),
(31, 'RD 601 H', 'moto_images/3310.jpg', 2, '1400000', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `moto_payment`
--

CREATE TABLE IF NOT EXISTS `moto_payment` (
  `moto_pay_id` int(11) NOT NULL,
  `paid_amount` varchar(20) NOT NULL,
  `date_paid` date NOT NULL,
  `leasing_id` int(11) NOT NULL,
  `dueamount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moto_payment`
--

INSERT IGNORE INTO `moto_payment` (`moto_pay_id`, `paid_amount`, `date_paid`, `leasing_id`, `dueamount`) VALUES
(1, '7000', '2017-10-03', 5, '2500000'),
(2, '8000', '2017-10-03', 6, '2000000'),
(3, '807000', '2017-10-03', 1, '2000000'),
(4, '2500000', '2017-10-03', 7, '2500000'),
(9, '1193000', '2017-10-10', 1, '2000000'),
(10, '70000', '2017-10-22', 5, '2500000'),
(11, '7000', '2017-10-22', 5, '2500000'),
(12, '7000', '2017-10-22', 5, '2500000'),
(13, '8000', '2017-10-22', 5, '2500000'),
(14, '10000', '2017-10-22', 5, '2500000'),
(15, '7000', '2017-10-22', 5, '2500000'),
(16, '15000', '2017-10-22', 6, '2500000'),
(17, '8000', '2017-10-22', 6, '2500000'),
(18, '8000', '2017-10-22', 6, '2500000'),
(19, '8000', '2017-10-22', 6, '2500000'),
(20, '8000', '2017-10-22', 5, '2500000'),
(21, '10000', '2017-10-22', 5, '2500000'),
(22, '10000', '2017-10-22', 5, '2500000'),
(23, '10000', '2017-10-22', 6, '2500000'),
(24, '7000', '2017-10-22', 6, '2500000'),
(25, '7000', '2017-10-25', 5, '2500000'),
(26, '7000', '2017-10-26', 8, '2500000');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `pay_id` int(11) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `p_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `paymenttypes_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT IGNORE INTO `payment` (`pay_id`, `amount`, `p_date`, `description`, `paymenttypes_id`, `member_id`) VALUES
(1, '5000', '2017-09-22', '', 1, 1),
(26, '5000', '2017-09-25', 'asd', 1, 6),
(27, '5000', '2017-09-25', '', 1, 1),
(28, '5000', '2017-09-25', 'asd', 1, 6),
(29, '5000', '2017-09-25', 'ae', 1, 1),
(32, '3000', '2017-10-04', '', 3, 3),
(33, '2000', '2017-10-04', 'addg', 2, 2),
(34, '2000', '2017-10-10', '', 2, 7),
(35, '5000', '2017-10-10', '', 1, 9),
(36, '2000', '2017-10-11', '', 2, 10),
(37, '2000', '2017-10-11', '', 2, 11),
(38, '2000', '2017-10-11', '', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE IF NOT EXISTS `payment_types` (
  `paymenttypes_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `amount_to_pay` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_types`
--

INSERT IGNORE INTO `payment_types` (`paymenttypes_id`, `type_name`, `amount_to_pay`) VALUES
(1, 'Contribution', '5000'),
(2, 'Parkingfees', '2000'),
(3, 'Charges', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL,
  `suppliername` varchar(30) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT IGNORE INTO `supplier` (`supplier_id`, `suppliername`, `phone_number`, `Address`, `Email`) VALUES
(1, 'YamahaDealer', '0788306783', '', ''),
(2, 'Rwandamotor LTD', '0788904567', '', ''),
(3, 'TVS SAMEER HUSSEIN', '0788694595', '', ''),
(4, 'RMC', '54678', '', ''),
(5, 'RMC', '0785', '', ''),
(6, 'RMC1', '078859900', 'KK 367 Ave', 'rma@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `function_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT IGNORE INTO `users` (`user_id`, `firstname`, `lastname`, `phonenumber`, `email`, `username`, `password`, `function_id`) VALUES
(2, 'Gad', 'Hategekimana', '0788455568', 'gadhategeka@gmail.com', 'gad', '202cb962ac59075b964b07152d234b70', 2),
(3, 'Emile', 'Habagusenga', '0788345678', 'emilehaba@gmail.com', 'Emile', 'c20ad4d76fe97759aa27a0c99bff6710', 3),
(4, 'Aime christian', 'Nzisungimana', '0786596395', 'chrisaime2@gmail.com', 'chrisaime', 'caf1a3dfb505ffed0d024130f58c5cfa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contractperiod`
--
-- ALTER TABLE `contractperiod`
  -- ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `function`
--
-- ALTER TABLE `function`
  -- ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `leasing`
--
-- ALTER TABLE `leasing`
  -- ADD PRIMARY KEY (`leasing_id`),
  -- ADD KEY `member_id` (`member_id`),
  -- ADD KEY `moto_id` (`moto_id`),
  -- ADD KEY `cid` (`cid`);

--
-- Indexes for table `member`
--
-- ALTER TABLE `member`
  -- ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `model`
--
-- ALTER TABLE `model`
  -- ADD PRIMARY KEY (`model_id`),
  -- ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `moto`
--
-- ALTER TABLE `moto`
  -- ADD PRIMARY KEY (`moto_id`),
  -- ADD KEY `model_id` (`model_id`);

--
-- Indexes for table `moto_payment`
--
-- ALTER TABLE `moto_payment`
  -- ADD PRIMARY KEY (`moto_pay_id`),
  -- ADD KEY `leasing_id` (`leasing_id`);

--
-- Indexes for table `payment`
--
-- ALTER TABLE `payment`
  -- ADD PRIMARY KEY (`pay_id`),
  -- ADD KEY `paymenttypes_id` (`paymenttypes_id`),
  -- ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `payment_types`
--
-- ALTER TABLE `payment_types`
  -- ADD PRIMARY KEY (`paymenttypes_id`);

--
-- Indexes for table `supplier`
--
-- ALTER TABLE `supplier`
  -- ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
-- ALTER TABLE `users`
   -- ADD PRIMARY KEY (`user_id`),
  -- ADD KEY `function_id` (`function_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contractperiod`
--
-- ALTER TABLE `contractperiod`
  -- MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `function`
--
-- ALTER TABLE `function`
  -- MODIFY `function_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leasing`
--
-- ALTER TABLE `leasing`
  -- MODIFY `leasing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `member`
--
-- ALTER TABLE `member`
  -- MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `model`
--
-- ALTER TABLE `model`
  -- MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `moto`
--
-- ALTER TABLE `moto`
  -- MODIFY `moto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `moto_payment`
--
-- ALTER TABLE `moto_payment`
  -- MODIFY `moto_pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `payment`
--
-- ALTER TABLE `payment`
  -- MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `payment_types`
--
-- ALTER TABLE `payment_types`
  -- MODIFY `paymenttypes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `supplier`
--
-- ALTER TABLE `supplier`
  -- MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
-- ALTER TABLE `users`
 -- MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
