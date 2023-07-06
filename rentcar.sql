-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 04:19 PM
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
-- Database: `rentcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price1` int(6) NOT NULL,
  `image` varchar(225) NOT NULL,
  `price2` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `name`, `price1`, `image`, `price2`) VALUES
(63, '2020 Perodua Alza', 12, 'rent4.jpg', 90),
(64, '2022 Perodua Bezza', 10, 'rent3.jpg', 80),
(65, '2019 Perodua Axia', 8, 'rent2.jpg', 60),
(66, '2019 Perodua Myvi', 8, 'rent1.jpg', 60);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `full_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `username` varchar(20) CHARACTER SET latin1 NOT NULL,
  `noTell` int(10) NOT NULL,
  `password` int(15) NOT NULL,
  `stu_id` int(10) NOT NULL,
  `university` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`full_name`, `email`, `username`, `noTell`, `password`, `stu_id`, `university`) VALUES
('Bakri', 'Bakri@gmail.com', '1234', 158351098, 1234, 2021115581, 'Teknologi Mara');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `stu_id` int(10) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` int(20) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `level` varchar(15) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`stu_id`, `username`, `password`, `name`, `level`) VALUES
(12, '4321', 4321, 'winne', 'admin'),
(2021115581, '1234', 1234, 'Bakri', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(2, 0, 'bakri', 'bakri@gmail.com', '213', 'test'),
(3, 0, 'Name', 'name@gmail.com', '332', 'hello!');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `location_pickup` varchar(50) NOT NULL,
  `location_dropoof` varchar(50) NOT NULL,
  `date_pickup` date NOT NULL,
  `date_dropoof` date NOT NULL,
  `stu_id` int(10) NOT NULL,
  `car_id` int(10) NOT NULL,
  `model` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`location_pickup`, `location_dropoof`, `date_pickup`, `date_dropoof`, `stu_id`, `car_id`, `model`) VALUES
('Kuching', 'Samarahan', '2023-01-11', '2023-02-03', 2021115581, 55, '');

-- --------------------------------------------------------

--
-- Table structure for table `rentform`
--

CREATE TABLE `rentform` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `stu_id` int(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `location_pickup` varchar(20) NOT NULL,
  `location_dropoff` varchar(20) NOT NULL,
  `pickupD` date NOT NULL,
  `dropoffD` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentform`
--

INSERT INTO `rentform` (`id`, `full_name`, `stu_id`, `model`, `location_pickup`, `location_dropoff`, `pickupD`, `dropoffD`) VALUES
(1, 'Bakri Kri', 0, '2022 Perodua Bezza', 'kotaSamarahan', 'desaIlmu', '2023-02-22', '2023-02-23'),
(7, 'Testing', 0, '2019 Perodua Axia', 'desaIlmu', 'desaIlmu', '2023-02-13', '2023-02-14'),
(8, 'Testing', 0, '2019 Perodua Axia', 'desaIlmu', 'desaIlmu', '2023-02-13', '2023-02-14'),
(9, 'Testing', 0, '2019 Perodua Axia', 'desaIlmu', 'desaIlmu', '2023-02-13', '2023-02-14'),
(10, 'Testing', 0, '2019 Perodua Axia', 'desaIlmu', 'desaIlmu', '2023-02-13', '2023-02-14'),
(11, 'Corn', 0, '2019 Perodua Myvi', 'ks2', 'ks2', '2023-02-07', '2023-02-08'),
(12, 'Cornealia', 5861, '2019 Perodua Myvi', 'ks2', 'ks2', '2023-02-19', '2023-02-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `stu_id` varchar(255) NOT NULL,
  `hp_num` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `c_pass` varchar(255) NOT NULL,
  `gender` enum('m','f','o') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `stu_id`, `hp_num`, `university`, `password`, `c_pass`, `gender`) VALUES
(1, 'hello', 'hello1', 'hello@gmail.com', '43', '213', 'uitmks1', 'hello123', 'hello123', ''),
(3, 'Cornealia R', 'corn', 'corn@gmail.com', '5861', '445', 'uitmks2', 'corn123', 'corn123', ''),
(4, 'Aircond', 'Air123', 'air33@gmail.com', '678', '435', 'uitmks2', 'air123', 'air123', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rentform`
--
ALTER TABLE `rentform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `stu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021115582;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `stu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2021115582;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rentform`
--
ALTER TABLE `rentform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
