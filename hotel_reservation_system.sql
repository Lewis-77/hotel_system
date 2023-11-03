-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2023 at 10:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_reservation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `user_id` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `feedback_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `room_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `reservation_type` varchar(255) NOT NULL,
  `number_guests` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `bed_quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `capacity`, `bed_quantity`, `price`, `images`, `status`) VALUES
(1, 'Deluxe Room', '2', 'Double Bed or Two Single Beds', '50$', 'deluxe1.jpg', 0),
(2, 'Deluxe Room', '3', 'Double Bed or Two Single Beds', '50$', 'deluxe1.jpg', 0),
(3, 'Deluxe Room', '3', 'Double Bed or Two Single Beds', '50$', 'deluxe1.jpg', 0),
(4, 'Deluxe Room', '3', 'Double Bed or Two Single Beds', '50$', 'deluxe1.jpg', 0),
(5, 'Deluxe Room', '3', 'Double Bed or Two Single Beds', '50$', 'deluxe1.jpg', 0),
(6, 'Deluxe Room', '3', 'Double Bed or Two Single Beds', '50$', 'deluxe1.jpg', 0),
(8, 'Deluxe Room', '3', 'Double Bed or Two Single Beds', '50$', 'deluxe1.jpg', 0),
(9, 'Deluxe Room', '3', 'Double Bed or Two Single Beds', '50$', 'deluxe1.jpg', 0),
(10, 'Deluxe Room', '3', 'Double Bed or Two Single Beds', '50$', 'deluxe1.jpg', 0),
(11, 'Junior Suite Room', '3', 'Double Bed or Two Single Beds', '65$', 'juniorSui1.jpg', 0),
(12, 'Junior Suite Room', '3', 'Double Bed or Two Single Beds', '65$', 'juniorSui1.jpg', 0),
(13, 'Junior Suite Room', '3', 'Double Bed or Two Single Beds', '65$', 'juniorSui1.jpg', 0),
(14, 'Junior Suite Room', '3', 'Double Bed or Two Single Beds', '65$', 'juniorSui1.jpg', 0),
(15, 'Junior Suite Room', '3', 'Double Bed or Two Single Beds', '65$', 'juniorSui1.jpg', 0),
(16, 'Junior Suite Room', '3', 'Double Bed or Two Single Beds', '65$', 'juniorSui1.jpg', 0),
(17, 'Junior Suite Room', '3', 'Double Bed or Two Single Beds', '65$', 'juniorSui1.jpg', 0),
(18, 'Junior Suite Room', '3', 'Double Bed or Two Single Beds', '65$', 'juniorSui1.jpg', 0),
(19, 'Junior Suite Room', '3', 'Double Bed or Two Single Beds', '65$', 'juniorSui1.jpg', 0),
(20, 'Junior Suite Room', '3', 'Double Bed or Two Single Beds', '65$', 'juniorSui1.jpg', 0),
(21, 'Suite Room', '3', 'Double Bed or Two Single Beds', '75$', 'suite.jpeg', 0),
(22, 'Suite Room', '3', 'Double Bed or Two Single Beds', '75$', 'suite.jpeg', 0),
(23, 'Suite Room', '3', 'Double Bed or Two Single Beds', '75$', 'suite.jpeg', 0),
(24, 'Suite Room', '3', 'Double Bed or Two Single Beds', '75$', 'suite.jpeg', 0),
(25, 'Suite Room', '3', 'Double Bed or Two Single Beds', '75$', 'suite.jpeg', 0),
(26, 'Suite Room', '3', 'Double Bed or Two Single Beds', '75$', 'suite.jpeg', 0),
(27, 'Suite Room', '3', 'Double Bed or Two Single Beds', '75$', 'suite.jpeg', 0),
(28, 'Suite Room', '3', 'Double Bed or Two Single Beds', '75$', 'suite.jpeg', 0),
(29, 'Suite Room', '3', 'Double Bed or Two Single Beds', '75$', 'suite.jpeg', 0),
(30, 'Suite Room', '3', 'Double Bed or Two Single Beds', '75$', 'suite.jpeg', 0),
(31, 'Executive Suite Room', '2', 'King Size Bed', '100$', 'executive.jpg', 0),
(32, 'Executive Suite Room', '2', 'King Size Bed', '100$', 'executive.jpg', 0),
(33, 'Executive Suite Room', '2', 'King Size Bed', '100$', 'executive.jpg', 0),
(74, 'Executive Suite Room', '2', 'King Size Bed', '100$', 'executive.jpg', 0),
(75, 'Executive Suite Room', '2', 'King Size Bed', '100$', 'executive.jpg', 0),
(76, 'Executive Suite Room', '2', 'King Size Bed', '100$', 'executive.jpg', 0),
(77, 'Executive Suite Room', '2', 'King Size Bed', '100$', 'executive.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `phone_number` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `email`, `phone_number`, `password`) VALUES
(12, 'Phone', 'Myint', 'PhoneMyint', 'phonemyint@gmail.com', '092101098', '123asd!@#ASD'),
(13, 'Thida', 'Lwin', 'ThidaLwin', 'Lwin@gmail.com', '095555555', '!23Thida123'),
(14, 'Shwe ', 'Ou', 'ShweOu', 'ou@gmail.com', '0944444', 'HelloChingu!123'),
(15, 'Bhone', 'Wint', 'BhoneWint', 'bwn@gmail.com', '12345', 'HelloChingu!123'),
(16, 'Thida', 'Lwin', 'ThidaLwin', 'thida@gamil.com', '09888888888', '!123asdASD'),
(18, 'ho', 'ho', 'hoho', 'hoho@gmail.com', '0912312313', '123asd!@#ASD'),
(19, 'something', 'Wint', 'somethingWint', 'ddee@gmail.com', '0922233344', '123asd!@#ASD'),
(20, 'something', 'myat', 'somethingmyat', 'bhonewint@gmail.com', '0922233344', '123asd!@#ASD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `payment_id` (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
