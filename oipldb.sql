-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2025 at 04:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oipldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_table`
--

CREATE TABLE `enquiry_table` (
  `enquiry_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `enquiry_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `enquiry_table`
--

INSERT INTO `enquiry_table` (`enquiry_id`, `name`, `email_id`, `mobile_number`, `message`, `enquiry_date`) VALUES
(2, 'jgdjgj', 'jfkhjh755@fkh.ij', '6757512345', 'bjkjdjj', '2025-10-14 16:26:08'),
(3, 'Deepak', 'Deepak@gmail.com', '1122334455', 'fdghfghfgfdfg', '2025-11-08 19:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `questions_table`
--

CREATE TABLE `questions_table` (
  `question_id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `option_a` varchar(1000) NOT NULL,
  `option_b` varchar(1000) NOT NULL,
  `option_c` varchar(1000) NOT NULL,
  `option_d` varchar(1000) NOT NULL,
  `correct_answer` varchar(1000) NOT NULL,
  `date_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `questions_table`
--

INSERT INTO `questions_table` (`question_id`, `subject_name`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `date_time`) VALUES
(2, 'IT Tools', 'Which is an input device?', 'Monitor', 'Microphone', 'Printer', 'Speaker', 'Microphone', '2025-11-21'),
(3, 'Python', 'Which is not a data type in python?', 'int', 'float', 'string', 'struct', 'struct', '2025-11-21'),
(4, 'Python', 'Which operator is used for exponentiation in python?', '^ (Carrot)', '& (Ampsersand)', '* (Asterick)', '** (Double Asterick)', '** (Double Asterick)', '2025-11-21'),
(5, 'Web Design', 'Which language is used to building web page structure?', 'HTML', 'CSS', 'JavaScript', 'All of these', 'HTML', '2025-11-21');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration_table`
--

CREATE TABLE `student_registration_table` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `email_id` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_status` tinyint(1) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_registration_table`
--

INSERT INTO `student_registration_table` (`student_id`, `student_name`, `mobile_number`, `email_id`, `password`, `verification_status`, `date_time`) VALUES
(9, 'amit', '1234567890', 'amit@yahoo.com', '$2y$10$SXfyQysMH/kxp/SVP/llcOM7rGMXAGsLCnjCSm9RMsAvqr7O5e9H.', 1, '2025-10-23 17:03:41'),
(10, 'Deepak', '1234561232', 'deepak@yahoo.com', '$2y$10$5rKcUpFoh9qnpLSN4VwyI./9jKVkUjWrmr4WJUZlR7MxO.JFaQr5O', 1, '2025-10-28 10:39:08'),
(11, 'Admin', '9999999999', 'admin@oipl.com', '$2y$10$m8oOeAhZYOuKQED/0oOlleYdw4VhPktq4H0hLyRPO.c68pCnA4BpO', 1, '2025-10-28 11:33:40'),
(12, 'Pawan', '6666888899', 'pawan@gmail.com', '$2y$10$oSOfes6ViQpvB3x2DHxQe.egxM9W6lYPMm1eyQUoi9g5/njP6g1lq', 0, '2025-10-28 00:41:21'),
(13, 'Ajay Kumar', '8888999900', 'ajay@gmail.com', '$2y$10$cVs3MRCmMl6XYAyD6ApnT.zHItXH6IKiV94LnquC.KDSs70Zm0ONu', 1, '2025-10-28 20:32:39'),
(14, 'Pankaj', '3757356890', 'pankaj@gmail.com', '$2y$10$3VBeI1kJe1gwfxl0mfDhu.S1NmwbOR3d/3lENSZxYTWiq.vPQqnSO', 0, '2025-11-09 19:10:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiry_table`
--
ALTER TABLE `enquiry_table`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `questions_table`
--
ALTER TABLE `questions_table`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `student_registration_table`
--
ALTER TABLE `student_registration_table`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiry_table`
--
ALTER TABLE `enquiry_table`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions_table`
--
ALTER TABLE `questions_table`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_registration_table`
--
ALTER TABLE `student_registration_table`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
