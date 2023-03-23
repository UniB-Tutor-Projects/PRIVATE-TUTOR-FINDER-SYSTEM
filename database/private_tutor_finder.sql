-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 09:47 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `private tutor finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(256) NOT NULL,
  `admin_password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'Administrator', 'admin12345');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` int(11) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `appointment_time_start` time NOT NULL,
  `appointment_time_end` time NOT NULL,
  `appointment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `tutor_id`, `subject_id`, `appointment_time_start`, `appointment_time_end`, `appointment_date`) VALUES
(1, 1, 1, '12:30:00', '14:40:00', '2023-03-24'),
(2, 1, 3, '15:00:00', '17:00:00', '2023-03-30'),
(3, 4, 3, '21:46:00', '22:46:00', '2023-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pricing_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `pricing_value` int(20) NOT NULL,
  `pricing_comment` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(256) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `subject_code`, `tutor_id`) VALUES
(1, 'Computational Thinking', 'COME2103', 1),
(3, 'Data Structures', 'COME2105', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutor_id` int(11) NOT NULL,
  `tutor_name` varchar(30) NOT NULL,
  `age` int(4) NOT NULL,
  `gender` tinytext NOT NULL,
  `certificate` varchar(256) NOT NULL,
  `subject_tutoring` varchar(256) NOT NULL,
  `tutor_phone` int(13) NOT NULL,
  `tutor_email` varchar(256) NOT NULL,
  `tutor_address` varchar(256) NOT NULL,
  `tutor_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutor_id`, `tutor_name`, `age`, `gender`, `certificate`, `subject_tutoring`, `tutor_phone`, `tutor_email`, `tutor_address`, `tutor_pwd`) VALUES
(1, 'ShadowWalker', 26, 'male', 'Masters', 'Computational Thinking', 64290623, 'kundegodfrey84@gmail.com', 'Bamenda', '$2y$10$NJxCGo7Rd0XQSo5Mr5alA.gSbWLL2AfBm639XwlJ5xJs2i7JnQgk6'),
(4, 'Edrick', 19, 'male', 'Advance Level', 'Data Structures', 677802114, 'deman@mail.com', 'Bambili', '$2y$10$yqzF/kTcka2vOEXj3YY4v.KjzhAElPH6SW//Klzvx/EQz0BdQUpiu'),
(5, 'Ngu', 18, 'male', 'Advance Level', 'PHP Backend', 677802114, 'juniorngu84@gmail.com', 'Bambili', '$2y$10$D5MD56WpG4MzBoATTwX0FeF.sjS.aQrCTA66cLJCZyaVTcCpAbZYu');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `age` int(128) NOT NULL,
  `gender` tinytext NOT NULL,
  `phone_number` int(13) NOT NULL,
  `email` varchar(256) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `user_pwd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `age`, `gender`, `phone_number`, `email`, `address`, `user_pwd`) VALUES
(2, 'Junior', 19, 'male', 677802114, 'juniorngu84@gmail.com', 'Bambui-Bamenda', '$2y$10$HrNtxHwy4JOi7NdMi2rC0uFkYLg3kioaQMnNlEHc8rVqVpJ5JeKAe'),
(5, 'UniB', 30, 'male', 689345256, 'Unib@mail.com', 'Commercial Avenue', '$2y$10$4j/C67t2KSY3Q5gIBzBdI.mADnr9eSqweSoZP8povTd0JGVH3a7Im');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pricing_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pricing_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
