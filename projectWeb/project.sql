-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 01:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `dewanmasreview`
--

CREATE TABLE `dewanmasreview` (
  `review_ID` int(11) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `star` int(5) NOT NULL,
  `review` varchar(500) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dewanmasreview`
--

INSERT INTO `dewanmasreview` (`review_ID`, `user_ID`, `name`, `star`, `review`, `timestamp`) VALUES
(8, 1, 'Yuenwong', 4, 'This place provides quite a huge space! There are tons of events made in this place!', '2023-01-06 09:29:48.796830');

-- --------------------------------------------------------

--
-- Table structure for table `gokartreview`
--

CREATE TABLE `gokartreview` (
  `review_ID` int(11) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `star` int(5) NOT NULL,
  `review` varchar(500) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `golfreview`
--

CREATE TABLE `golfreview` (
  `review_ID` int(11) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `star` int(5) NOT NULL,
  `review` varchar(500) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golfreview`
--

INSERT INTO `golfreview` (`review_ID`, `user_ID`, `name`, `star`, `review`, `timestamp`) VALUES
(9, 1, 'Yuenwong', 5, 'This place is so big! And the place doesn\'t cost us a lot of money to enter as well :D', '2023-01-07 07:44:12.715817');

-- --------------------------------------------------------

--
-- Table structure for table `kayakreview`
--

CREATE TABLE `kayakreview` (
  `review_ID` int(11) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `star` int(5) NOT NULL,
  `review` varchar(500) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kayakreview`
--

INSERT INTO `kayakreview` (`review_ID`, `user_ID`, `name`, `star`, `review`, `timestamp`) VALUES
(49, 2, 'Foo Ye', 3, 'The lake is quite dirty to be honest', '2023-01-05 16:09:44.883672'),
(51, 1, 'Yuenwong', 4, 'I had a fun day there with some friends.', '2023-01-06 13:05:13.863491');

-- --------------------------------------------------------

--
-- Table structure for table `lakereview`
--

CREATE TABLE `lakereview` (
  `review_ID` int(11) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `star` int(5) NOT NULL,
  `review` varchar(500) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sportreview`
--

CREATE TABLE `sportreview` (
  `review_ID` int(11) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `star` int(5) NOT NULL,
  `review` varchar(500) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sportreview`
--

INSERT INTO `sportreview` (`review_ID`, `user_ID`, `name`, `star`, `review`, `timestamp`) VALUES
(8, 1, 'Yuenwong', 4, 'The place is enormous, with gyms, bicycles, and equipments!', '2023-01-07 10:29:21.408125');

-- --------------------------------------------------------

--
-- Table structure for table `untareview`
--

CREATE TABLE `untareview` (
  `review_ID` int(11) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `star` int(5) NOT NULL,
  `review` varchar(500) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `datereg` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `datereg`) VALUES
(1, 'Yuenwong', 'yuenwong@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2022-12-21 15:52:35.578757'),
(2, 'Foo Ye', 'fooye123@gmail.com', '4176ce4d266bc7710dd56e323b9a2c2713b58edb', '2023-01-05 23:21:20.979438');

-- --------------------------------------------------------

--
-- Table structure for table `vmallreview`
--

CREATE TABLE `vmallreview` (
  `review_ID` int(11) NOT NULL,
  `user_ID` int(5) NOT NULL,
  `name` varchar(40) NOT NULL,
  `star` int(5) NOT NULL,
  `review` varchar(500) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vmallreview`
--

INSERT INTO `vmallreview` (`review_ID`, `user_ID`, `name`, `star`, `review`, `timestamp`) VALUES
(4, 1, 'Yuenwong', 3, 'Moderate', '2023-01-06 13:39:25.817429');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dewanmasreview`
--
ALTER TABLE `dewanmasreview`
  ADD PRIMARY KEY (`review_ID`);

--
-- Indexes for table `gokartreview`
--
ALTER TABLE `gokartreview`
  ADD PRIMARY KEY (`review_ID`);

--
-- Indexes for table `golfreview`
--
ALTER TABLE `golfreview`
  ADD PRIMARY KEY (`review_ID`);

--
-- Indexes for table `kayakreview`
--
ALTER TABLE `kayakreview`
  ADD PRIMARY KEY (`review_ID`);

--
-- Indexes for table `lakereview`
--
ALTER TABLE `lakereview`
  ADD PRIMARY KEY (`review_ID`);

--
-- Indexes for table `sportreview`
--
ALTER TABLE `sportreview`
  ADD PRIMARY KEY (`review_ID`);

--
-- Indexes for table `untareview`
--
ALTER TABLE `untareview`
  ADD PRIMARY KEY (`review_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vmallreview`
--
ALTER TABLE `vmallreview`
  ADD PRIMARY KEY (`review_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dewanmasreview`
--
ALTER TABLE `dewanmasreview`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gokartreview`
--
ALTER TABLE `gokartreview`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `golfreview`
--
ALTER TABLE `golfreview`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kayakreview`
--
ALTER TABLE `kayakreview`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `lakereview`
--
ALTER TABLE `lakereview`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sportreview`
--
ALTER TABLE `sportreview`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `untareview`
--
ALTER TABLE `untareview`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vmallreview`
--
ALTER TABLE `vmallreview`
  MODIFY `review_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
