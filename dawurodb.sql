-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 10:53 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dawurodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryid` int(11) NOT NULL,
  `categoryname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryid`, `categoryname`) VALUES
(1, 'ASC event');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventid` int(11) NOT NULL,
  `eventdate` date DEFAULT NULL,
  `eventtime` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `otherfile` varchar(255) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `postdate` date DEFAULT NULL,
  `eventtitle` varchar(100) DEFAULT NULL,
  `senderid` int(11) DEFAULT NULL,
  `venue` varchar(100) NOT NULL,
  `eventcat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventid`, `eventdate`, `eventtime`, `description`, `image`, `otherfile`, `status`, `postdate`, `eventtitle`, `senderid`, `venue`, `eventcat`) VALUES
(1, '2018-02-01', '2018-02-24 20:46:05', 'It will be full of fun. You cant afford to miss it. Barima Nkwan all the way.', 'daw.jpg', NULL, 'approved', '2018-02-01', 'Barima Nkwan', 1, 'Motulsky Hall', 1),
(2, '2018-02-01', '2018-02-24 21:03:07', 'It will be full of fun. You cant afford to miss it. Wosuro aa wonni all the way.', 'daw2.jpg', NULL, 'unapproved', '2018-02-01', 'Wosuro aa wonni', 1, 'Dufie Platinum Hostel', 1),
(6, '2018-02-26', '11:11', 'Come', '1519657610_ashdaw.jpg', NULL, 'approved', '0000-00-00', 'Semester at Sea', 1, 'Motulsky', 1),
(8, '2018-02-28', '14:22', 'Come and drink soup', '1519826030_Programmer HD Wallpaper by PCbots.png', NULL, 'approved', '0000-00-00', 'Sankwan', 1, 'Motulsky', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `category`, `email`, `password`) VALUES
(1, 'Elvis Okoh-Asirifi', 'Student', 'elv@ash.edu.gh', '12345'),
(2, 'Abigail Thompson', 'admin', 'abi@tom.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventid`),
  ADD KEY `senderid` (`senderid`),
  ADD KEY `catkey` (`eventcat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `catkey` FOREIGN KEY (`eventcat`) REFERENCES `categories` (`categoryid`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`senderid`) REFERENCES `user` (`userid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
