-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 09:15 AM
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
-- Database: `car_rental_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(5) NOT NULL,
  `image` varchar(500) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `seat` int(2) NOT NULL,
  `gear` varchar(20) NOT NULL,
  `luggage` int(2) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `state` varchar(30) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `bankAccount` varchar(20) NOT NULL,
  `price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `image`, `name`, `description`, `seat`, `gear`, `luggage`, `startDate`, `endDate`, `state`, `bank`, `bankAccount`, `price`) VALUES
(1, 'images/civic.jpg', 'Honda Civic', 'A white color Honda Civic car', 5, 'Auto', 3, '2023-01-14', '2023-01-21', 'Johor', 'Maybank', '1234567890', 120),
(2, 'images/vios.jpeg', 'Toyota Vios', 'Welcome', 5, 'Auto', 3, '2023-01-14', '2023-01-25', 'Johor', 'RHB', '0987654321', 100),
(3, 'images/myvi.jpg', 'Myvi', 'Best Malaysia car', 5, 'Auto', 3, '2023-01-14', '2023-01-26', 'Johor', 'OCBC', '3456789872', 60),
(4, 'images/saga.jpg', 'Proton Saga', 'Local car', 5, 'Auto', 2, '2023-01-13', '2023-01-31', 'Johor', 'UUM Bank', '6574839212', 50);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(5) NOT NULL,
  `carID` int(5) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pickDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `reserveID` int(5) NOT NULL,
  `reserveName` varchar(50) NOT NULL,
  `reservePhone` varchar(15) NOT NULL,
  `receipt` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `carID`, `state`, `pickDate`, `returnDate`, `reserveID`, `reserveName`, `reservePhone`, `receipt`) VALUES
(3, 1, 'Johor', '2023-01-18', '2023-01-20', 1, 'Wong', '123124342', 'images/e_reciept.png'),
(7, 4, 'Johor', '2023-01-15', '2023-01-16', 1, 'Wong', '444', 'images/e_reciept.png'),
(8, 2, 'Johor', '2023-01-20', '2023-01-21', 1, 'Wong', '4444', 'images/e_reciept.png'),
(9, 2, 'Johor', '2023-01-15', '2023-01-16', 1, 'Wong', '555', 'images/e_reciept.png'),
(10, 2, 'Johor', '2023-01-17', '2023-01-18', 1, 'Wong', '666', 'images/e_reciept.png');

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
(1, 'Yuenwong', 'yuenwong00821@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-01-12 20:49:50.872572'),
(2, 'Halo World', 'halo@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-01-12 22:41:02.063949');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
