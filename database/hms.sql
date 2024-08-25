-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2022 at 09:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAdminLog` ()   SELECT * FROM adminlog$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getStudentlog` ()   SELECT * FROM userlog$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `reg_date`, `updation_date`) VALUES
(1, 'admin', 'admin@test.com', 'Test@1234', '2022-11-05 21:00:00', '2022-11-07'),
(2, 'admin2', 'admin2@test.com', 'admin2', '2022-11-27 10:16:55', '2022-11-30');

--
-- Triggers `admin`
--
DELIMITER $$
CREATE TRIGGER `adminlogged` AFTER INSERT ON `admin` FOR EACH ROW INSERT INTO adminlog VALUES(id,NEW.id,"localhost",CURRENT_TIMESTAMP)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adminlog`
--

CREATE TABLE `adminlog` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `ip` varbinary(16) NOT NULL,
  `logintime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adminlog`
--

INSERT INTO `adminlog` (`id`, `adminid`, `ip`, `logintime`) VALUES
(0, 2, 0x6c6f63616c686f7374, '2022-11-27 10:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `admittedtable`
--

CREATE TABLE `admittedtable` (
  `id` int(5) NOT NULL,
  `decision` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admittedtable`
--

INSERT INTO `admittedtable` (`id`, `decision`) VALUES
(1, 'admitted'),
(2, 'not admitted');

-- --------------------------------------------------------

--
-- Stand-in structure for view `courseidname`
-- (See below for the actual view)
--
CREATE TABLE `courseidname` (
`course_id` int(11)
,`course_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_sn` varchar(255) NOT NULL,
  `course_fn` varchar(255) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_sn`, `course_fn`, `posting_date`) VALUES
(9, 'CS9999', 'PDB', 'Principles of Database Design', '2022-11-26 22:31:31'),
(10, 'CS8288', 'DSI', 'Data Structures I', '2022-11-26 23:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `healthrecordstable`
--

CREATE TABLE `healthrecordstable` (
  `rec_id` int(11) NOT NULL,
  `health_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthrecordstable`
--

INSERT INTO `healthrecordstable` (`rec_id`, `health_status`) VALUES
(1, 'Cleared'),
(3, 'With-Held'),
(5, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `roomno` int(11) NOT NULL,
  `room_type` varchar(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `mealplan` int(11) NOT NULL,
  `datefrom` date NOT NULL,
  `duration` int(11) NOT NULL,
  `admission_decision` varchar(500) NOT NULL,
  `regno` int(11) NOT NULL,
  `firstName` varchar(500) NOT NULL,
  `lastName` varchar(500) NOT NULL,
  `gender` varchar(250) NOT NULL,
  `contactno` bigint(11) NOT NULL,
  `emailaddr` varchar(500) NOT NULL,
  `econtactno` bigint(11) NOT NULL,
  `parent` varchar(500) NOT NULL,
  `prelation` varchar(500) NOT NULL,
  `pcontact` bigint(11) NOT NULL,
  `addr` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `postcode` int(11) NOT NULL,
  `health_record` varchar(500) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `roomno`, `room_type`, `fees`, `mealplan`, `datefrom`, `duration`, `admission_decision`, `regno`, `firstName`, `lastName`, `gender`, `contactno`, `emailaddr`, `econtactno`, `parent`, `prelation`, `pcontact`, `addr`, `city`, `state`, `postcode`, `health_record`, `postingDate`, `updationDate`) VALUES
(27, 201, '2', 10000, 1, '2022-12-01', 6, '', 0, 'Jack', 'Jill', 'male', 9999999999, 'jackjill@gmail.com', 0, 'George Jill', 'Father', 9898989898, '999', 'Oklahoma City', 'Oklahoma', 73008, 'Done', '2022-11-26 22:47:59', ''),
(28, 401, '1', 15000, 1, '2022-12-01', 6, '', 0, 'Brian', 'Conner', 'male', 8989898989, 'brianoconner@gmail.com', 0, 'Paul Walker', 'Father', 7878787878, '404', 'Tulsa', 'Oklahoma', 74055, 'Done', '2022-11-26 22:55:28', ''),
(30, 301, '3', 7500, 1, '2022-12-03', 6, '', 0, 'Lisa', 'Manobal', 'female', 32719972022, 'lalisa@gmail.com', 0, 'Jennie', 'Mother', 7676767676, '111', 'Oklahoma City', 'Oklahoma', 70007, 'Done', '2022-11-26 23:05:19', ''),
(31, 402, '1', 15000, 0, '2022-12-03', 6, '', 0, 'Murph', 'Cooper', 'female', 4058941111, 'murphc@gmail.com', 0, 'Cooper', 'Father', 4058942222, '404', 'Oklahoma City', 'Oklahoma', 70009, 'Done', '2022-11-26 23:19:14', ''),
(32, 202, '2', 10000, 0, '2022-12-02', 6, '', 0, 'Ram', 'Kumar', 'male', 9888988889, 'rk@gmail.com', 0, 'Rita Kumar', 'Mother', 8988899888, '888', 'Houston', 'Texas', 77888, NULL, '2022-11-26 23:27:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_type` varchar(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_type`, `room_no`, `fees`, `posting_date`) VALUES
(14, '2', 201, 10000, '2022-11-26 22:41:12'),
(15, '3', 301, 7500, '2022-11-26 22:42:17'),
(16, '1', 401, 15000, '2022-11-26 22:42:38'),
(17, '1', 402, 15000, '2022-11-26 22:43:13'),
(18, '2', 202, 10000, '2022-11-26 22:43:30');

-- --------------------------------------------------------

--
-- Stand-in structure for view `roomtypefees`
-- (See below for the actual view)
--
CREATE TABLE `roomtypefees` (
`typeofroom` varchar(11)
,`roomfee` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `State` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `State`) VALUES
(40, 'Oklahoma'),
(41, 'Texas');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userIp` varbinary(16) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `userId`, `userEmail`, `userIp`, `city`, `country`, `loginTime`) VALUES
(31, 51, 'rk@gmail.com', 0x3a3a31, '', '', '2022-11-26 23:25:07'),
(32, 51, 'rk@gmail.com', 0x3a3a31, '', '', '2022-11-27 08:43:09'),
(33, 50, 'murphc@gmail.com', 0x3a3a31, '', '', '2022-11-27 20:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE `userregistration` (
  `id` int(11) NOT NULL,
  `regNo` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contactNo` bigint(20) NOT NULL,
  `emailaddr` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(45) NOT NULL,
  `passUdateDate` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`id`, `regNo`, `firstName`, `lastName`, `gender`, `contactNo`, `emailaddr`, `password`, `regDate`, `updationDate`, `passUdateDate`) VALUES
(46, '0', 'Jack', 'Jill', 'male', 9999999999, 'jackjill@gmail.com', '9999999999', '2022-11-26 22:47:59', '', ''),
(47, '0', 'Brian', 'Conner', 'male', 8989898989, 'brianoconner@gmail.com', '8989898989', '2022-11-26 22:55:28', '', ''),
(48, '0', 'Jessie', 'Pinkman', 'male', 1212121212, 'jpinkman@gmail.com', '1212121212', '2022-11-26 22:59:20', '', ''),
(49, '0', 'Lisa', 'Manobal', 'female', 32719972022, 'lalisa@gmail.com', '32719972022', '2022-11-26 23:05:19', '', ''),
(50, '0', 'Murph', 'Cooper', 'female', 4058941111, 'murphc@gmail.com', '4058941111', '2022-11-26 23:19:14', '', ''),
(51, 'A22334455', 'Ram', 'Kumar', 'male', 9888988889, 'rk@gmail.com', 'zzzzzz', '2022-11-26 23:24:25', '27-11-2022 12:28:24', '');

-- --------------------------------------------------------

--
-- Structure for view `courseidname`
--
DROP TABLE IF EXISTS `courseidname`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `courseidname`  AS SELECT `courses`.`id` AS `course_id`, `courses`.`course_fn` AS `course_name` FROM `courses``courses`  ;

-- --------------------------------------------------------

--
-- Structure for view `roomtypefees`
--
DROP TABLE IF EXISTS `roomtypefees`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `roomtypefees`  AS SELECT DISTINCT `rooms`.`room_type` AS `typeofroom`, `rooms`.`fees` AS `roomfee` FROM `rooms``rooms`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminlog`
--
ALTER TABLE `adminlog`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `admittedtable`
--
ALTER TABLE `admittedtable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `healthrecordstable`
--
ALTER TABLE `healthrecordstable`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `rec_id` (`rec_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_type` (`room_type`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_type` (`room_type`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `State` (`State`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `userregistration`
--
ALTER TABLE `userregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admittedtable`
--
ALTER TABLE `admittedtable`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `healthrecordstable`
--
ALTER TABLE `healthrecordstable`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `userregistration`
--
ALTER TABLE `userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
