-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2021 at 12:20 PM
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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `type` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'NO',
  `contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`type`, `name`, `email`, `status`, `contact`) VALUES
('Website Design & Development', '', '', 'NO', ''),
('SEO (Search Engine Optimization)', '', '', 'NO', ''),
('Web Hosting Services', '', '', 'NO', ''),
('Ecommerce Development', '', '', 'NO', ''),
('Online Payment Integration', '', '', 'NO', ''),
('Dash board Application', '', '', 'NO', ''),
('NewsLetter Design', '', '', 'NO', ''),
('SMO (Social Media Optimization)', '', '', 'NO', ''),
('Dynamic Website Design', '', '', 'NO', ''),
(' Domain Registration', '', '', 'NO', ''),
('Website Maintenance', '', '', 'NO', ''),
('Logo Design', '', '', 'NO', ''),
('Open Source Customization', '', '', 'NO', '');

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
('hardik@gmail.com', 'skldjflkj', '9090909090', 7, 'Hardik', 'M', 'Eitah mainpuri aligarh', '', '2021-03-05 11:02:00.000000');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
