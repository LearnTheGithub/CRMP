-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 09:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crmp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `type` varchar(100) NOT NULL,
  `available` varchar(10) NOT NULL DEFAULT 'yes',
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'NO',
  `contact` varchar(12) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`type`, `available`, `name`, `email`, `status`, `contact`, `city`) VALUES
('Website Design & Development', 'true', '', '', 'NO', '', ''),
('SEO (Search Engine Optimization)', 'true', '', '', 'NO', '', ''),
('Web Hosting Services', 'true', '', '', 'NO', '', ''),
('Ecommerce Development', 'true', '', '', 'NO', '', ''),
('Online Payment Integration', 'true', '', '', 'NO', '', ''),
('Dash board Application', 'true', '', '', 'NO', '', ''),
('NewsLetter Design', 'true', '', '', 'NO', '', ''),
('SMO (Social Media Optimization)', 'true', '', '', 'NO', '', ''),
('Dynamic Website Design', 'true', '', '', 'NO', '', ''),
(' Domain Registration', 'true', '', '', 'NO', '', ''),
('Website Maintenance', 'true', '', '', 'NO', '', ''),
('Logo Design', 'true', '', '', 'NO', '', ''),
('Open Source Customization', 'true', '', '', 'NO', '', ''),
('Devops ', 'true', 'TEJVEER SHARMA', 'tejveersharma384@gmail.com', 'yes', '9045704462', ''),
('Devops ', 'true', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('Dynamic Website Design', 'true', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
(' Domain Registration', 'true', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('Logo Design', 'true', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('Ecommerce Development', 'true', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('Dynamic Website Design', 'yes', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('', 'not', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('Open Source Customization', 'yes', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('', 'not', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('Dash board Application', 'yes', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('Website Design & Development', 'yes', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('Ecommerce Development', 'yes', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('Dash board Application', 'yes', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('android applicatin', 'yes', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh'),
('android application', 'not', 'tejveer sharma', 'tejveersharma384@gmail.com', 'NO', '9045704462', 'aligarh');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Sno` int(3) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Sno`, `type`) VALUES
(1, 'Website Design & Development'),
(2, 'Ecommerce Development'),
(3, 'Ecommerce Development'),
(4, 'Online Payment Integration'),
(5, 'Dash board Application'),
(6, 'NewsLetter Design'),
(7, 'Social Media Optimization'),
(8, 'Dynamic Website Design'),
(9, 'Domain Registration'),
(10, 'Website Maintenance'),
(11, 'Logo Design'),
(12, 'Open Source Customization'),
(13, 'Devops'),
(14, 'Full Stack developement'),
(15, 'Front end development');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `date`) VALUES
(1, '2021-03-05 10:55:59.720346'),
(0, '2021-03-01 03:05:31.406476');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `ticket` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `priority` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'open',
  `posting_tIme` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `remark` varchar(100) NOT NULL,
  `remark_time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `type`, `subject`, `ticket`, `email`, `priority`, `status`, `posting_tIme`, `remark`, `remark_time`) VALUES
(1, 'Billing', '', 'This is problem description. i want solution as sooon as possible.', 'tejveersharma384@gmail.com', 'Urgent', 'open', '2021-03-06 16:01:55.025899', '', '2021-03-06 16:01:55.025899'),
(3, 'Option 1', 'problem 2', 'lskdfjlksdjfl klksjflkajf ', 'tejveersharma384@gmail.com', 'Non Urgent', 'close', '2021-03-09 09:20:34.654429', '', '2021-03-09 09:20:34.654429');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `Time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `contact`, `id`, `name`, `gender`, `address`, `image`, `Time`) VALUES
('tejveersharma384@gmail.com', '123', '9045704462', 1, 'Tejveer Sharma', 'M', 'Suraksha Vihar Aligarh', '', '2021-03-01 07:42:36.959922'),
('ravi123@gmail.com', 'ravi1234', '9012121212', 2, 'ravi', 'm', 'rampur gabhaana aligarh', '', '2021-03-01 07:42:36.959922'),
('ramprassh@gmail.com', 'sldfjklksdfj', '9034232323', 3, 'Ram Prakash', 'M', 'ram pyari viahar', '', '2021-03-02 07:42:36.959922'),
('hardik@gmail.com', 'skldjflkj', '9090909090', 7, 'Hardik', 'M', 'Eitah mainpuri aligarh', '', '2021-03-05 11:02:00.000000'),
('user@gmail.com', '1234', '9045704444', 8, 'Ramesh', 'm', 'Address 1 CITY STATE', '', '2021-03-18 08:23:12.195000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
