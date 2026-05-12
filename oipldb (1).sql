-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2026 at 12:39 PM
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
(6, 'Vandana shukla', 'vandanagd12@gmail.com', '7379952364', 'Respected sir&#10;I am vandana shukla student of ccc batch2016. Sir I had lost my certificate. by my mistakes. Therefore, I request to you to provide me my registration number to get my certificate. Thank you!', '2025-12-09 10:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers_table`
--

CREATE TABLE `exam_answers_table` (
  `answer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `question_id` int(11) NOT NULL,
  `selected_answer` varchar(2000) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_answers_table`
--

INSERT INTO `exam_answers_table` (`answer_id`, `user_id`, `user_name`, `question_id`, `selected_answer`, `datetime`) VALUES
(276, 17, 'Shubham Sharma', 202, 'URL', '2026-01-11 18:54:40'),
(277, 17, 'Shubham Sharma', 186, 'Computer security', '2026-01-11 18:54:40'),
(278, 17, 'Shubham Sharma', 280, 'Specific software', '2026-01-11 18:54:41'),
(279, 17, 'Shubham Sharma', 232, 'Outline view', '2026-01-11 18:54:42'),
(280, 17, 'Shubham Sharma', 267, 'Blue', '2026-01-11 18:54:43'),
(281, 17, 'Shubham Sharma', 212, '', '2026-01-10 17:04:04'),
(282, 17, 'Shubham Sharma', 261, '.ODT', '2026-01-11 18:54:52'),
(283, 17, 'Shubham Sharma', 264, 'Ctrl + S', '2026-01-11 18:54:53'),
(284, 17, 'Shubham Sharma', 250, 'Ctrl + D', '2026-01-11 18:54:54'),
(285, 17, 'Shubham Sharma', 222, '', '2026-01-10 17:04:04'),
(286, 17, 'Shubham Sharma', 201, '', '2026-01-10 17:04:04'),
(287, 17, 'Shubham Sharma', 275, '', '2026-01-10 17:04:04'),
(288, 17, 'Shubham Sharma', 196, '', '2026-01-10 17:04:04'),
(289, 17, 'Shubham Sharma', 276, 'None of the above', '2026-01-10 20:12:31'),
(290, 17, 'Shubham Sharma', 269, '', '2026-01-10 17:04:04'),
(291, 17, 'Shubham Sharma', 211, '', '2026-01-10 17:04:04'),
(292, 17, 'Shubham Sharma', 207, '', '2026-01-10 17:04:04'),
(293, 17, 'Shubham Sharma', 198, '', '2026-01-10 17:04:04'),
(294, 17, 'Shubham Sharma', 271, '', '2026-01-10 17:04:04'),
(295, 17, 'Shubham Sharma', 246, '16348', '2026-01-11 18:55:01'),
(296, 17, 'Shubham Sharma', 210, 'Digital Subscriber Line', '2026-01-11 18:55:02'),
(297, 17, 'Shubham Sharma', 214, 'Advanced Research Project Agency Network ', '2026-01-11 18:55:02'),
(298, 17, 'Shubham Sharma', 277, 'Default programs', '2026-01-11 18:55:03'),
(299, 17, 'Shubham Sharma', 248, 'Alt + D', '2026-01-11 18:55:03'),
(300, 17, 'Shubham Sharma', 252, 'SUM(J14:J16)', '2026-01-11 18:55:04'),
(331, 19, 'Pawan Kumar', 211, 'Mesh', '2026-01-12 16:15:38'),
(332, 19, 'Pawan Kumar', 188, 'Programming on machine with your own intelligence', '2026-01-12 16:15:41'),
(333, 19, 'Pawan Kumar', 244, 'Freeze', '2026-01-12 16:15:44'),
(334, 19, 'Pawan Kumar', 220, 'Overhead', '2026-01-12 16:15:46'),
(335, 19, 'Pawan Kumar', 225, 'Portrait', '2026-01-12 16:15:48'),
(336, 19, 'Pawan Kumar', 234, 'Presentation', '2026-01-12 16:15:52'),
(337, 19, 'Pawan Kumar', 250, 'Ctrl + 1', '2026-01-12 16:15:55'),
(338, 19, 'Pawan Kumar', 191, 'Bill Gates', '2026-01-12 16:15:57'),
(339, 19, 'Pawan Kumar', 233, 'Untitled1', '2026-01-12 16:15:59'),
(340, 19, 'Pawan Kumar', 194, 'Bharat Interface to Money', '2026-01-12 16:16:01'),
(341, 19, 'Pawan Kumar', 238, 'Filter', '2026-01-12 16:16:03'),
(342, 19, 'Pawan Kumar', 232, 'Notes view', '2026-01-12 16:16:06'),
(343, 19, 'Pawan Kumar', 210, 'TDM', '2026-01-12 16:16:09'),
(344, 19, 'Pawan Kumar', 221, 'Pagedown', '2026-01-12 16:16:11'),
(345, 19, 'Pawan Kumar', 266, 'Menu bar', '2026-01-12 16:16:13'),
(346, 19, 'Pawan Kumar', 197, 'Content mixing system', '2026-01-12 16:16:15'),
(347, 19, 'Pawan Kumar', 231, 'F5', '2026-01-12 16:16:19'),
(348, 19, 'Pawan Kumar', 205, 'IP Address', '2026-01-12 16:16:23'),
(349, 19, 'Pawan Kumar', 256, 'Left', '2026-01-12 16:16:25'),
(350, 19, 'Pawan Kumar', 226, '', '2026-01-12 16:15:35'),
(351, 19, 'Pawan Kumar', 242, '', '2026-01-12 16:15:35'),
(352, 19, 'Pawan Kumar', 237, '', '2026-01-12 16:15:35'),
(353, 19, 'Pawan Kumar', 189, 'ATM', '2026-01-12 16:16:31'),
(354, 19, 'Pawan Kumar', 268, 'Delete comment', '2026-01-12 16:16:33'),
(355, 19, 'Pawan Kumar', 215, 'Ctrl + S', '2026-01-12 16:16:35'),
(356, 19, 'Pawan Kumar', 230, 'Ctrl + W', '2026-01-12 16:16:37'),
(357, 19, 'Pawan Kumar', 209, '128 bits', '2026-01-12 16:16:40'),
(358, 19, 'Pawan Kumar', 228, 'Ctrl + H', '2026-01-12 16:16:43'),
(359, 19, 'Pawan Kumar', 199, 'To Provide fair and unbiased to citizens', '2026-01-12 16:17:16'),
(360, 19, 'Pawan Kumar', 186, 'Computer security', '2026-01-12 16:17:36'),
(361, 15, 'Raj Kumar', 229, '', '2026-01-16 16:04:32'),
(362, 15, 'Raj Kumar', 257, '', '2026-01-16 16:04:32'),
(363, 15, 'Raj Kumar', 194, '', '2026-01-16 16:04:32'),
(364, 15, 'Raj Kumar', 264, '', '2026-01-16 16:04:32'),
(365, 15, 'Raj Kumar', 211, '', '2026-01-16 16:04:32'),
(366, 15, 'Raj Kumar', 210, '', '2026-01-16 16:04:32'),
(367, 15, 'Raj Kumar', 197, '', '2026-01-16 16:04:32'),
(368, 15, 'Raj Kumar', 226, '', '2026-01-16 16:04:32'),
(369, 15, 'Raj Kumar', 202, '', '2026-01-16 16:04:32'),
(370, 15, 'Raj Kumar', 284, '', '2026-01-16 16:04:32'),
(371, 15, 'Raj Kumar', 200, '', '2026-01-16 16:04:32'),
(372, 15, 'Raj Kumar', 243, '', '2026-01-16 16:04:32'),
(373, 15, 'Raj Kumar', 224, '', '2026-01-16 16:04:32'),
(374, 15, 'Raj Kumar', 212, '', '2026-01-16 16:04:32'),
(375, 15, 'Raj Kumar', 215, '', '2026-01-16 16:04:32'),
(376, 15, 'Raj Kumar', 204, '', '2026-01-16 16:04:32'),
(377, 15, 'Raj Kumar', 275, '', '2026-01-16 16:04:32'),
(378, 15, 'Raj Kumar', 192, '', '2026-01-16 16:04:32'),
(379, 15, 'Raj Kumar', 244, '', '2026-01-16 16:04:32'),
(380, 15, 'Raj Kumar', 256, '', '2026-01-16 16:04:32'),
(381, 15, 'Raj Kumar', 280, '', '2026-01-16 16:04:32'),
(382, 15, 'Raj Kumar', 225, '', '2026-01-16 16:04:32'),
(383, 15, 'Raj Kumar', 258, '', '2026-01-16 16:04:32'),
(384, 15, 'Raj Kumar', 186, '', '2026-01-16 16:04:32'),
(385, 15, 'Raj Kumar', 220, '', '2026-01-16 16:04:32'),
(386, 15, 'Raj Kumar', 222, '', '2026-01-16 16:04:32'),
(387, 15, 'Raj Kumar', 230, '', '2026-01-16 16:04:32'),
(388, 15, 'Raj Kumar', 240, '', '2026-01-16 16:04:32'),
(389, 15, 'Raj Kumar', 187, '', '2026-01-16 16:04:32'),
(390, 15, 'Raj Kumar', 237, '', '2026-01-16 16:04:32'),
(391, 22, 'Sunaina', 263, 'Edit', '2026-04-05 23:21:49'),
(392, 22, 'Sunaina', 255, 'File', '2026-04-05 23:21:53'),
(393, 22, 'Sunaina', 195, 'Port', '2026-04-05 23:21:56'),
(394, 22, 'Sunaina', 254, 'Ctrl + V', '2026-04-05 23:22:00'),
(395, 22, 'Sunaina', 190, 'Unfind Pay Interface', '2026-04-05 23:22:04'),
(396, 22, 'Sunaina', 284, '1st', '2026-04-05 23:22:09'),
(397, 22, 'Sunaina', 202, 'URL', '2026-04-05 23:22:13'),
(398, 22, 'Sunaina', 192, 'John Mashey', '2026-04-05 23:22:18'),
(399, 22, 'Sunaina', 227, 'Slide show', '2026-04-05 23:22:22'),
(400, 22, 'Sunaina', 262, 'Export as image', '2026-04-05 23:22:27'),
(401, 23, 'Anushka Singh', 230, 'Ctrl + W', '2026-04-06 23:13:34'),
(402, 23, 'Anushka Singh', 224, 'Only JPG Images', '2026-04-06 23:14:13'),
(403, 23, 'Anushka Singh', 274, 'Mail merge', '2026-04-06 23:14:28'),
(404, 23, 'Anushka Singh', 282, 'Hard Disk', '2026-04-06 23:15:03'),
(405, 23, 'Anushka Singh', 197, 'Mail server', '2026-04-06 23:15:16'),
(406, 23, 'Anushka Singh', 191, 'Kevin Asthon', '2026-04-06 23:15:21'),
(407, 23, 'Anushka Singh', 215, 'Ctrl + P', '2026-04-06 23:15:36'),
(408, 23, 'Anushka Singh', 262, 'Export Directly as PDF', '2026-04-06 23:16:04'),
(409, 23, 'Anushka Singh', 241, 'CTRL + SHIFT + P', '2026-04-06 23:16:15'),
(410, 23, 'Anushka Singh', 217, 'First slide', '2026-04-06 23:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `exam_details_table`
--

CREATE TABLE `exam_details_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_left_in_seconds` int(11) NOT NULL,
  `exam_attempted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_details_table`
--

INSERT INTO `exam_details_table` (`id`, `user_id`, `time_left_in_seconds`, `exam_attempted`) VALUES
(16, 17, 100, 1),
(17, 15, 0, 1),
(18, 19, 0, 1),
(19, 15, 0, 1),
(20, 22, 0, 1),
(21, 23, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_reports_table`
--

CREATE TABLE `exam_reports_table` (
  `report_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email_id` varchar(300) NOT NULL,
  `total_question_given` int(11) NOT NULL,
  `total_attempted` int(11) NOT NULL,
  `correct_answers` int(11) NOT NULL,
  `wrong_answers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mocktest_performance_table`
--

CREATE TABLE `mocktest_performance_table` (
  `test_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `subject_name` varchar(200) NOT NULL,
  `total_questions` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `datetime` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mocktest_performance_table`
--

INSERT INTO `mocktest_performance_table` (`test_id`, `user_id`, `user_name`, `subject_name`, `total_questions`, `score`, `datetime`) VALUES
(12, 19, 'Pawan Kumar', 'IT Tools', 10, 8, '2025-12-28'),
(13, 15, 'Raj Kumar', 'Web Design', 10, 4, '2025-12-28'),
(14, 15, 'Raj Kumar', 'Web Design', 10, 2, '2025-12-29'),
(15, 15, 'Raj Kumar', 'Web Design', 10, 4, '2025-12-29'),
(16, 15, 'Raj Kumar', 'Web Design', 30, 13, '2026-01-08'),
(17, 15, 'Raj Kumar', 'IT Tools', 25, 5, '2026-01-11'),
(18, 15, 'Raj Kumar', 'IoT', 20, 9, '2026-03-18'),
(19, 22, 'Sunaina', 'IoT', 20, 16, '2026-04-05'),
(20, 23, 'Anushka Singh', 'IT Tools', 20, 7, '2026-04-06'),
(21, 23, 'Anushka Singh', 'IT Tools', 20, 17, '2026-04-06'),
(22, 15, 'Raj Kumar', 'OOPs', 2, 1, '2026-05-06'),
(23, 15, 'Raj Kumar', 'OOPs', 20, 5, '2026-05-07'),
(24, 15, 'Raj Kumar', 'OOPs', 20, 4, '2026-05-07');

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
(1, 'IoT', 'The term IoT was coined in year?', '1998', '1999', '2010', '2005', '1999', '2025-12-26'),
(2, 'IoT', 'The size of MAC address is ________ bits.', '16', '32', '48', '56', '48', '2025-12-26'),
(3, 'IoT', 'In context to advantages of IOT, Which of the following is incorrect?', 'Reduces waste', 'Security', 'Enhanced data collection', 'Improve customer satisfaction', 'Enhanced data collection', '2025-12-26'),
(4, 'IoT', 'The total resistance of three resistors connected in parallel will be _______ as  to the individual value of resistor.', 'less', 'high', 'same', 'Depends on the temperature', 'less', '2025-12-26'),
(5, 'IoT', 'Capacitor block AC and allows DC to pass through.', 'true', 'false', 'not ascertain', 'it purely depends on the value of capacitor', 'false', '2025-12-26'),
(6, 'IoT', 'Microcontroller used in Arduino UNO prototyping board is', 'ATmega328m', 'ATmega328p', 'ATmega2560', 'ATmega356p', 'ATmega328p', '2025-12-26'),
(7, 'IoT', 'The size of bits in IPv4 addressing is', '16', '32', '48', '56', '32', '2025-12-26'),
(8, 'IoT', 'The pre-built circuit boards that fits on the top of Arduino or any other development board are known as', 'Vero board', 'FRC connectors', 'Shields', 'Breadboard', 'Shields', '2025-12-26'),
(9, 'IoT', 'Which layer in the TCP/IP stack is equivalent to the Transport layer of the OSI model.', 'Application', 'Transport', 'Internet', 'Network', 'Transport', '2025-12-26'),
(10, 'IoT', 'Each IP packet contains', 'Source and destination IP address', 'Source IP address only', 'Destination IP address only', 'Either of source or destination IP address', 'Source and destination IP address', '2025-12-26'),
(11, 'IoT', 'Which language is best suited for IoT analytics.', 'PHP', 'Java', 'Python', 'Scala', 'Python', '2025-12-26'),
(12, 'IoT', 'At which layer of OSI model, router works.', 'Transport layer', 'Session layer', 'Datalink layer', 'Network layer', 'Network layer', '2025-12-26'),
(13, 'IoT', ' Which of the following is not a main element of IoT.', 'People', 'Process', 'Security', 'Things', 'Security', '2025-12-26'),
(14, 'IoT', 'To easily interface add-on modules with Arduino, we can use', 'General PCB', 'Connectivity circuit boards', 'Arduino Shields', 'Other high end Arduino boards', 'Arduino Shields', '2025-12-26'),
(15, 'IoT', 'Which symbol is used in Arduino to calculate modulo.', '#', '$', '%', '!', '%', '2025-12-26'),
(16, 'IoT', 'Botnet is often used to launch ___________ attack', 'DoS', 'DDoS', 'Brute force', 'Passive', 'DDoS', '2025-12-26'),
(17, 'IoT', 'The IIoT stands for', 'Indepth Internet of T', 'Innovative Internet of Things', 'Industrial Internet of Things', 'Information Internet of Things', 'Industrial Internet of Things', '2025-12-26'),
(18, 'IoT', 'The default method(s) in Arduino program is/are', 'onlyloop()', 'only setup()', 'setup() and loop()', 'can be either loop() or setup()', 'setup() and loop()', '2025-12-26'),
(19, 'IoT', 'Which of the following communication medium supports highest data rate?', 'Optical fiber', 'Wifi', 'Ethernet', 'Bluetooth', 'Optical fiber', '2025-12-26'),
(20, 'IoT', 'Which layer in the TCP/IP stack is equivalent to the Datalink layer of the OSI model.', 'Application', 'Host-to-host', 'Internet', 'Network Access', 'Network Access', '2025-12-26'),
(21, 'IoT', 'Which of the following is not a standard protocol used in IoT domain?', 'Wifi', 'Z-wave', 'Zigbee', 'LoMe', 'LoMe', '2025-12-26'),
(22, 'IoT', 'Which of the following is known as lightweight protocol?', 'MQTT', 'TCP', 'IP', 'HTTP', 'MQTT', '2025-12-26'),
(23, 'IoT', 'MQTT protocol is based upon', 'Client server architecture', 'Publish subscribe architecture', 'Both of these', 'None of these', 'Publish subscribe architecture', '2025-12-26'),
(24, 'IoT', 'Statement required in Arduino program to generate one second delay is:', 'delay(100);', 'delay(1000);', 'delay(10000);', 'delay(1);', 'delay(1000);', '2025-12-26'),
(25, 'IoT', 'IIoT targets applications related to :', 'Health and fitness', 'Entertainment', 'Both of these', 'None of these', 'None of these', '2025-12-26'),
(26, 'IoT', 'The count of PWM pins in Arduino UNO is:', '2', '3', '5', '6', '6', '2025-12-26'),
(27, 'IoT', 'The analogRead method in Arduino UNO returns value range', '0-255', '0-511', '0-1023', '0-4095', '0-1023', '2025-12-26'),
(28, 'IoT', 'Open source operating system is', 'Arduino', 'Windows', 'Linux', 'Mac', 'Linux', '2025-12-26'),
(29, 'IoT', 'Single line comment in C Language starts with', '#', '//', '!--', '/*', '//', '2025-12-26'),
(30, 'IoT', 'Which of the following Function is called only once in Arduino program?', 'loop()', 'setup()', 'delay()', 'digitalWrite()', 'setup()', '2025-12-26'),
(31, 'IoT', 'The founder of Arduino project is ____________', 'Kevin Asthon', 'Massimo Banzi', 'Jim Hungton', 'Massimo Berry', 'Massimo Banzi', '2025-12-26'),
(32, 'IoT', '_________ board of Arduino family can be used to sewn into clothing.', 'Arduino nano', 'Lilypad', 'Arduino uno', 'Arduino mega', 'Lilypad', '2025-12-26'),
(33, 'IoT', 'Which of the following option is not available in Arduino IDE software?', 'Compile', 'Verify', 'Terminate', 'Serial Monitor', 'Terminate', '2025-12-26'),
(34, 'IoT', 'Program written in Arduino IDE is known as', 'Code', 'Source code', 'Sketch', 'Paint', 'Sketch', '2025-12-26'),
(35, 'IoT', 'Which of the transmission media contains central conductor and shield?', 'Coaxial cable', 'Twisted pair cable', 'Fiber-optic cable', 'None of these', 'Coaxial cable', '2025-12-26'),
(36, 'IoT', 'Radio waves are', 'Omni-directional', 'Uni-directional', 'Bi-directional', 'None of these', 'Omni-directional', '2025-12-26'),
(37, 'IoT', 'Which of the transmission media uses light as medium of data transfer?', 'Coaxial cable', 'Twisted pair cable', 'Fiber optic cable', 'None of these', 'Fiber optic cable', '2025-12-26'),
(38, 'IoT', 'Which type of the signal is used for satellite or wireless LAN communication', 'Radio wave', 'Micro wave', 'Infrared', 'None of these', 'Micro wave', '2025-12-26'),
(39, 'IoT', 'Which of the transmission media highest data transmission rate?', 'Coaxial cable', 'Twisted pair cable', 'Fiber-optic cable', 'None of these', 'Fiber-optic cable', '2025-12-26'),
(40, 'IoT', 'The basic categorization of transmission media is ', 'Guided and unguided', 'Determinate and indeterminate', 'Fixed and unfixed', 'None of these', 'Guided and unguided', '2025-12-26'),
(41, 'IoT', 'Which of the following is/are correct in context to twisted pair cable?', 'More the twist better is the data carrying capability', 'Less twist more data rate', 'Data-rate does not depend on twist in the cable', 'None of these', 'More the twist better is the data carrying capability', '2025-12-26'),
(42, 'IoT', 'The method of communication in which data transmission takes place in either directions, but one at a time', 'Full duplex', 'Half duplex', 'Simplex', 'None of these', 'Half duplex', '2025-12-26'),
(43, 'IoT', 'In communication satellite multiple repeaters are generally known as', 'Modulators', 'Earth Stations', 'Transponders', 'None of these', 'Transponders', '2025-12-26'),
(44, 'IoT', 'Which of the following device perform modulation and demodulation?', 'Switch', 'Modulator', 'Modem', 'None of these', 'Modem', '2025-12-26'),
(45, 'IoT', 'In an IoT ecosystem, devices with unique identities having monitoring, and remote sensing capabilities are known as', 'Things', 'Motors', 'Monitoring devices', 'Edge monitors', 'Things', '2025-12-26'),
(46, 'IoT', 'A typical IoT system design which refers to the individual node devices and their protocols that are utilized to create a functional IoT ecosystem, is termed as', 'Logical design', 'Physical design', 'Both of these', 'None of these', 'Logical design', '2025-12-26'),
(47, 'IoT', 'The different type of communication models available in an IoT ecosystem typically fall in following category/categories', 'Request-response model', 'Push-pull model', 'Publish-subscribe model', 'All of these', 'All of these', '2025-12-26'),
(48, 'IoT', '__________ is a IoT system design which depicts how actually the components\nshould be arranged to complete a particular function', 'Logical design', 'Physical design', 'Both of these', 'None of these', 'Physical design', '2025-12-26'),
(49, 'IoT', 'IEEE 802.16 protocol stack is commonly referred as', 'LoRa', 'Bluetooth', 'WiMax', 'None of these', 'WiMax', '2025-12-26'),
(50, 'IoT', 'IoT application layer protocol include', 'MQTT', 'HTTP', 'Only MQTT', 'Both MQTT and HTTP', 'Both MQTT and HTTP', '2025-12-26'),
(51, 'IoT', 'Bits at physical layer are converted to frames at ________ layer of OSI model', 'Application layer', 'Network layer', 'Data link layer', 'Transport layer', 'Data link layer', '2025-12-26'),
(52, 'IoT', '___________ type of fiber cable suffers from high signal dispersion.', 'Single mode', 'Multimode', 'None of these', 'Both of these', 'Multimode', '2025-12-26'),
(53, 'IoT', 'The main function of transport layer in ISO-OSI model is', 'Node to node delivery', 'Process-to-process delivery', 'Synchronization', 'None of these', 'Node to node delivery', '2025-12-26'),
(54, 'IoT', 'A typical microcontroller contains', 'Timers', 'Memory', ' I/O ports', 'All of these', 'All of these', '2025-12-26'),
(55, 'IoT', 'The advantages of microcontroller in an electronic device include', 'Saving cost', 'Making circuit compact', 'Save power consumption', 'All of these', 'All of these', '2025-12-26'),
(56, 'IoT', 'Sensors which produce continuous signals that are proportional to the sensed\nparameter are', 'Analog sensor', 'Digital sensor', 'Light sensor', 'Dust sensor', 'Analog sensor', '2025-12-26'),
(57, 'IoT', 'Device used to convert light energy into electrical energy is', 'Turbine', 'Windmill', 'Solar cell', 'None of these', 'Solar cell', '2025-12-26'),
(58, 'IoT', 'Protocols used for I/O (input/output) sensor interfacing is/are', 'SPI', 'I2C', 'UART', 'All of these', 'All of these', '2025-12-26'),
(59, 'IoT', ' IEEE protocol commonly referred as WiFi is', '802.15', '802.3', '802.11', '802.16', '802.11', '2025-12-27'),
(60, 'IoT', 'Collection of standards for Low-rate wireless personal area network i.e. -LR-WPAN', '802.15', '802.3', '802.11', '802.16', '802.15', '2025-12-27'),
(61, 'IoT', 'Latest version of the Internet Protocol (IPv6) and Low-power Wireless Personal Area Networks is acronym as', '6LoWPAN', 'LoRa', 'LoRaWAN', 'None of these', '6LoWPAN', '2025-12-27'),
(62, 'IoT', 'The process flow of four stage IoT solution Architecture includes', 'Sensor/actuators, data acquisition, edge IT, data center/cloud', ' data acquisition, Sensor/actuators, edge IT, data center/cloud', 'Sensor/actuators, data acquisition, data center/cloud, edge IT', 'Sensor/actuators, edge IT, data acquisition, data center/cloud', 'Sensor/actuators, data acquisition, edge IT, data center/cloud', '2025-12-27'),
(63, 'IoT', 'HC-05 Bluetooth module can be used in programming to work as', 'Slave only', 'Master only', 'Master and slave', 'None of these', 'Master and slave', '2025-12-27'),
(64, 'IoT', '______________ is the rate at which the number of signal elements or changes to the signal occurs per second when it passes through communication channel', 'Data rate', 'Bits rate', 'Baud rate', 'None of these', 'Baud rate', '2025-12-27'),
(65, 'IoT', 'The total Bits transmitted in one-unit time is referred as', 'Data rate', 'Bits rate', 'Baud rate', 'None of these', 'Bits rate', '2025-12-27'),
(66, 'IoT', '____________ pins in Arduino reads data from analog sensor and convert value into digital value', 'Analog', 'Digital', 'Power', 'None of these', 'Analog', '2025-12-27'),
(67, 'IoT', 'AnalogWrite method can be used for', 'PWM pins', 'Hybrid pins', 'Digital pins', 'None of these', 'PWM pins', '2025-12-27'),
(68, 'IoT', 'In ATmega328p, the letter p stands for ', 'Picopower', 'Preprocessing', 'Precise', 'Popular', 'Picopower', '2025-12-27'),
(69, 'IoT', 'Inductance is measured in', 'Ohm', 'Farad', 'Henry', 'Coulomb', 'Henry', '2025-12-27'),
(70, 'IoT', 'In Arduino programming, ____________ function is used to configure the pins as\ninput or output', 'pinMode()', 'digitalWrite()', 'analogWrite()', 'setPin()', 'pinMode()', '2025-12-27'),
(71, 'IoT', 'SI unit of resistance is ', 'Ohm', 'Farad', 'Henry', 'Coulomb', 'Ohm', '2025-12-27'),
(72, 'IoT', 'In Arduino programming, ____________ function is used to make digital pin HIGH', 'pinMode()', 'digitalWrite()', 'analogWrite()', 'setPin()', 'digitalWrite()', '2025-12-27'),
(73, 'IoT', 'In Arduino programming, digital pins have ___________possible values', 'Only one', 'Two', 'Three', 'Any number of values', 'Two', '2025-12-27'),
(74, 'IoT', 'Capacitance is measured in ', 'Ohm', 'Farad', 'Henry', 'Coulomb', 'Farad', '2025-12-27'),
(75, 'IoT', 'The property of any conductor that opposes the flow of electric current through it is known as ', 'Capacitance', 'Resistance', 'Inductance', 'None of these', 'Resistance', '2025-12-27'),
(76, 'IoT', '___________is an indispensable tool for testing, diagnosing, and troubleshooting electrical circuits, components, and devices.', 'Soldering iron', 'Digital multimeter', 'Voltmeter', 'Ammeter', 'Digital multimeter', '2025-12-27'),
(77, 'IoT', '________ is flooding the Internet with many copies of same message (typically\nemail)', 'Spam', 'Injection', 'Spoofing', 'DoS attack', 'Spam', '2025-12-27'),
(78, 'IoT', '______________is a type of social engineering where an attacker sends a fraudulent message designed to trick a person into revealing sensitive information ', 'Phishing', 'Surfing', 'DDoS', 'Revealing', 'Phishing', '2025-12-27'),
(79, 'IoT', 'In C programming language, preprocessors are specified with _____________symbol', '#', '$', '^', '&', '#', '2025-12-27'),
(80, 'IoT', ' In C programming language, the output of following statement is 1 < 2 ? return 1: return 2;', '1', '2', 'Depends on copmpiler', 'Compile time error', 'Compile time error', '2025-12-27'),
(81, 'IoT', 'Which of the following is not logical operator in C language?', '&&', '||', '!', '|', '|', '2025-12-27'),
(82, 'IoT', 'In C language, the bitwise complement operator is', '!', '|', '~', '&', '~', '2025-12-27'),
(83, 'IoT', ' ______________is a program which enters computer system by secretly attaching\nitself with valid computer program and later steals information', 'Phishing', 'Surfing', 'Trojan horse', 'Wamp', 'Trojan horse', '2025-12-27'),
(84, 'IoT', '_____________ is used for serial communication with devices connected with\nArduino', 'I2C', 'SPI', 'UART', 'None of these', 'UART', '2025-12-27'),
(85, 'IoT', '______ is the act of secretly listening to the private conversation or communications of others without their consent in order to gather information.', 'Phishing', 'Surfing', 'Trojan horse', 'Eavesdropping', 'Eavesdropping', '2025-12-27'),
(86, 'IoT', '. _____________ malware is designed to launch botnet attack, primarily targeting online consumer devices such as IP cameras and home routers', 'Darkmotel', 'Mirai', 'Petye', 'Whitehorse', 'Mirai', '2025-12-27'),
(87, 'IoT', 'The process of reading is commonly known as ', 'Encoding', 'Decoding', 'Codification', 'None of these', 'Decoding', '2025-12-27'),
(88, 'Web Design', 'HTML stands for __________', 'Hyper Text Markup Language', 'Hyper Text Machine Language', 'Hyper Text Marking Language', 'High Text Marking Language', 'Hyper Text Markup Language', '2025-12-27'),
(89, 'Web Design', 'Which of the following is used to read an HTML page and render it?', 'Web server', 'Web network', 'Web browser', 'Web matrix', 'Web browser', '2025-12-27'),
(90, 'Web Design', 'What is the correct syntax of doctype in HTML5?', '</doctype html>', '<doctype html>', '<doctype html!>', '<!doctype html>', '<!doctype html>', '2025-12-27'),
(91, 'Web Design', 'Which of the following tag is used for inserting the largest heading in HTML?', '<head>', '<h1>', '<h6>', 'heading', '<h1>', '2025-12-27'),
(92, 'Web Design', 'In which part of the HTML metadata is contained?', 'Head tag', 'Title tag', 'Html tag', 'Body tag', 'Head tag', '2025-12-27'),
(93, 'Web Design', 'Which of the following is not a HTML5 tag?', '<track>', '<video>', '<slider>', '<source>', '<slider>', '2025-12-27'),
(94, 'Web Design', 'How do we write comments in HTML?', '</.............>', '<!............>', '</.............../>', '<!--........-->', '<!--........-->', '2025-12-27'),
(95, 'Web Design', 'Which of the following elements in HTML5 defines video or movie content?', '<video>', '<movie>', '<audio>', '<media>', '<video>', '2025-12-27'),
(96, 'Web Design', 'Which of the following is not the element associated with the HTML table layout?', 'alignment', 'color', 'size', 'spanning', 'color', '2025-12-27'),
(97, 'Web Design', 'Which element is used for or styling HTML5 layout?', 'CSS', 'JQuery', 'JavaScript', 'PHP', 'CSS', '2025-12-27'),
(98, 'Web Design', 'Which HTML tag is used for making character appearance bold?', '<u>content</u>', '<b>content</b>', '<br>content</br>', '<i>content</i>', '<b>content</b>', '2025-12-27'),
(99, 'Web Design', ' Which HTML tag is used to insert an image?', '<img url=\"htmllogo.jpg\"/>', '<img alt=\"htmllogo.jpg\"/>', '<img src=\"htmllogo.jpg\"/>', '<img link=\"htmllogo.jpg\"/>', '<img src=\"htmllogo.jpg\"/>', '2025-12-27'),
(100, 'Web Design', 'HTML is a subset of ________', 'SGMT', 'SGML', 'SGME', 'XHTML', 'SGML', '2025-12-27'),
(101, 'Web Design', 'Which character is used to represent that a tag is closed in HTML?', '#', '!', '/', '\\', '/', '2025-12-27'),
(102, 'Web Design', 'Among the following, which is the HTML paragraph tag?', '<p>', '<pre>', '<hr>', '<a>', '<p>', '2025-12-27'),
(103, 'Web Design', 'In HTML, which attribute is used to create a link that opens in a new window tab?', 'src=\"_blank\"', 'alt=\"_blank\"', 'target=\"_blank\"', 'target=\"_self\"', 'target=\"_blank\"', '2025-12-27'),
(104, 'Web Design', 'Which of the following HTML tag is used to create an unordered list?', '<ol>', '<ul>', '<li>', '<dl>', '<ul>', '2025-12-27'),
(105, 'Web Design', 'Which HTML element is used for abbreviation or acronym?', '<abbr>', '<blockquote>', '<q>', '<em>', '<abbr>', '2025-12-27'),
(106, 'Web Design', 'Which of the following HTML tag is used to add a row in a table?', '<th>', '<td>', '<tr>', '<tt>', '<tr>', '2025-12-27'),
(107, 'Web Design', 'Which of the following tag is used to create a text area in HTML Form?', '<text></text>', '<textarea></textarea>', '<input type=\"text\"/>', '<input type=\"textarea\"/>', '<textarea></textarea>', '2025-12-27'),
(108, 'Web Design', 'To show deleted text, which HTML element is used?', '<del>', '<em>', '<strong>', '<ins>', '<del>', '2025-12-27'),
(109, 'Web Design', 'Which tag is used to create a dropdown in HTML Form?', '<input>', '<select>', '<text>', '<textarea>', '<select>', '2025-12-27'),
(110, 'Web Design', 'Which tag is used to create a numbered list in HTML?', '<ol>', '<ul>', '<li>', '<dl>', '<ol>', '2025-12-27'),
(111, 'Web Design', 'How to create a checkbox in HTML Form?', '<input type=\"text\">', '<input type=\"textarea\">', '<input type=\"checkbox\">', '<input type=\"check\">', '<input type=\"checkbox\">', '2025-12-27'),
(112, 'Web Design', 'Which of the following extension is used to save an HTML file?', '.hl', '.h', '.htl', '.html', '.html', '2025-12-27'),
(113, 'Web Design', 'Which tag is used to create a blank line in HTML?', '<b>', '<br>', '<em>', '<a>', '<br>', '2025-12-27'),
(114, 'Web Design', 'Which HTML tag is used to convert the plain text into italic format?', '<b>', '<p>', '<i>', '<a>', '<i>', '2025-12-27'),
(115, 'Web Design', 'What is the use of <hr/> tag in HTML?', 'For making content appearance italics', ' To create vertical rule between sections', 'To create a line break', 'To create horizontal rule between sections', 'To create horizontal rule between sections', '2025-12-27'),
(116, 'Web Design', 'Which attribute is not essential under <iframe>?', 'frame border', 'width', 'height', 'src', 'frame border', '2025-12-27'),
(117, 'Web Design', 'Which tag is used to underline the text in HTML?', '<p>', '<u>', '<i>', '<ul>', '<u>', '2025-12-27'),
(118, 'Web Design', 'Which attribute specifies a unique alphanumeric identifier to be associated with an element?', 'type', 'article', 'id', 'class', 'id', '2025-12-27'),
(119, 'Web Design', 'Which HTML element is used for YouTube videos?', '<samp>', '<small>', '<frame>', '<iframe>', '<iframe>', '2025-12-27'),
(120, 'Web Design', 'For displaying data in JavaScript, we can’t use ____________.', 'document.write()', 'console.log()', 'innerHTML', 'document.getElementById()', 'document.getElementById()', '2025-12-27'),
(121, 'Web Design', 'For testing we should use ________', 'document.write()', 'console.log()', 'window.alert()', 'innerHTML', 'console.log()', '2025-12-27'),
(122, 'Web Design', 'Which of the following keyword stops the execution of JavaScript?', 'break', 'return', 'debugger', 'try....catch', 'break', '2025-12-27'),
(123, 'Web Design', 'JavaScript numbers are stored as ______________.', 'integers', 'double precision floating point', 'double', 'floating point', 'double precision floating point', '2025-12-27'),
(124, 'Web Design', 'Which method is not used for converting variables to number?', 'parseInt()', 'Number()', 'parseFloat()', 'valueOf()', 'valueOf()', '2025-12-27'),
(125, 'Web Design', 'In HTML, the tags are __________.', 'in upper case', 'case-sensitive', 'in lower case', 'not case-sensitive', 'not case-sensitive', '2025-12-27'),
(126, 'Web Design', 'Which tag is used in HTML5 for the initialization of the document type?', '<Doctype HTML>', '<!DOCTYPE html>', '<Doctype>', '<\\Doctype html>', '<!DOCTYPE html>', '2025-12-27'),
(127, 'Web Design', 'What is the correct way in which we can start an ordered list that has the numeric value count of 5?', '<ol type=\"1\" start=\"5\">', '<ol type=\"1\" num=\"5\">', '<ol type=\"1\" begin=\"5\">', '<ol type=\"1\" initial=\"5\">', '<ol type=\"1\" start=\"5\">', '2025-12-27'),
(128, 'Web Design', 'Which HTML tag do we use for displaying the power in the expressions.', '<p>', '<sup>', '<sub>', 'None of the above', '<sup>', '2025-12-28'),
(129, 'Web Design', 'In HTML, the correct way of commenting out something would be using', '## and #', '<!-- and -->', '</– and -/->', '<!– and -!>', '<!-- and -->', '2025-12-28'),
(130, 'Web Design', 'Text within STRONG tag is displayed as ________.', 'Indented', 'Italic', 'List', 'Bold', 'Bold', '2025-12-28'),
(131, 'Web Design', 'TD tag is used for _______.', 'Table row', 'Table records', 'Table heading', 'Row heading', 'Table records', '2025-12-28'),
(132, 'Web Design', 'The extension of JavaScript file is', '.html', '.js', '.css', '.ajs', '.js', '2025-12-28'),
(133, 'Web Design', '\"Yahoo\", \"Infoseek\" and \"Lycos\" are _______.', 'Search engines', 'News groups', 'Browsers', 'None of the above', 'Search engines', '2025-12-28'),
(134, 'Web Design', 'What is search engine?', 'Program that search documents', 'A program that searches engines for specified keywords', 'A machinery engine that search data', 'A hardware component', 'Program that search documents', '2025-12-28'),
(135, 'Web Design', 'HTML document start and end with which tag pairs?', 'HTML', 'WEB', 'BODY', 'HEAD', 'HTML', '2025-12-28'),
(136, 'Web Design', '<br> Tag is used for ______', 'Line break', 'Horizontal row', 'Heading', 'Underline', 'Line break', '2025-12-28'),
(137, 'Web Design', 'In HTML the character H stands for ?', 'Hyphenation', 'Hyper text', 'Hypertext marking', 'Hyphenation test', 'Hyper text', '2025-12-28'),
(138, 'Web Design', 'What does the CSS stands for?', 'Creating Style Sheets', 'Cascading Style Sheets', 'Computer Style Sheets', 'Colorful Style Sheets', 'Cascading Style Sheets', '2025-12-28'),
(139, 'Web Design', 'What is the full form of HTTP?', 'Hyphenation text test program', 'Hypertext transfer protocol', 'Hypertext transfer package', 'None of the above', 'Hypertext transfer protocol', '2025-12-28'),
(140, 'Web Design', 'Expand WAN', 'World area network', 'Web area network', 'Wide area network', 'None of the above', 'Wide area network', '2025-12-28'),
(141, 'Web Design', 'Who is making the Web standards?', 'Mozilla', 'Microsoft', 'The World Wide Web Consortium', 'NVIDIA', 'The World Wide Web Consortium', '2025-12-28'),
(142, 'Web Design', 'Which of the following protocol is used by electronic mail?', 'Telnet', 'FTP', 'SMTP', 'RDP', 'SMTP', '2025-12-28'),
(143, 'Web Design', 'Which of the following is suitable for networking in a building?', 'WAN', 'LAN', 'MAN', 'BAN', 'LAN', '2025-12-28'),
(144, 'Web Design', 'Which of the following is not a search engine?', 'Google', 'Yahoo', 'Twitter', 'Alta Vista', 'Twitter', '2025-12-28'),
(145, 'Web Design', 'While working on a JavaScript project, in your JavaScript application, which function would you use to send messages to users requesting for text input?', 'Display()', 'Prompt()', 'Alert()', 'Confirm()', 'Prompt()', '2025-12-28'),
(146, 'Web Design', 'The rules with regards to conduct for Internet users is known as', 'Mosaic', 'Internet Protocol', 'Protocol', 'Netiquette', 'Netiquette', '2025-12-28'),
(147, 'Web Design', 'A spider is ', 'A computer virus', 'A browser', 'A program that catalogs websites', 'A hacker community', 'A program that catalogs websites', '2025-12-28'),
(148, 'Web Design', 'FTP does not use', 'Two transfer mode', 'Control connection to remote computer before file can be transferred', 'User Datagram Protocol', 'Authorization of a user through login and password verification', 'User Datagram Protocol', '2025-12-28'),
(149, 'Web Design', 'The HTML tags that create a table header are _______', '<head> </head>', '<top></top>', '<th> </th>', '<td> </td>', '<th> </th>', '2025-12-28'),
(150, 'Web Design', 'Which of the following is the correct HTML for inserting background image?', '<back ground img=\"background.gif\">', '<img src=\"background.gif\" background/>', '<a href=\"background.gif\">', '<body background=\"background.gif\">', '<body background=\"background.gif\">', '2025-12-28'),
(151, 'Web Design', 'The main function of a browser is to', 'Compile HTML', 'Interpret HTML', 'De-compile HTML', 'Interpret CGI programs', 'Interpret HTML', '2025-12-28'),
(152, 'Web Design', 'In <img src=\"C:/picture/bbi.gif\" align=\"middle\">, align is _____', 'A tag', 'The head', 'The body', 'An attribute', 'An attribute', '2025-12-28'),
(153, 'Web Design', ' Web pages are uniquely defined using', 'IP addresses', 'URL', 'Domain', 'Filename', 'URL', '2025-12-28'),
(154, 'Web Design', 'Which of the following services are available on the World Wide Web?', 'Encryption', 'HTTP', 'HTML', 'Firewalls', 'HTTP', '2025-12-28'),
(155, 'Web Design', 'iframe tag in HTML is used to display a web page within a web page.', 'True', 'False', 'Can\'t say', 'None of these', 'True', '2025-12-28'),
(156, 'Web Design', 'A Web site\'s home page is normally named home.htm or home.html?', 'True', 'False', 'Can\'t say', 'None of these', 'False', '2025-12-28'),
(157, 'Web Design', 'Domain names are converted to _____________', 'A binary string', 'alphanumeric string', 'IP addresses', 'A hexadecimal string', 'IP addresses', '2025-12-28'),
(158, 'Web Design', 'A search engine is a program to search______', 'For information', 'webpages', 'webpages for specified index terms', 'webpages for information using specified search terms', 'webpages for information using specified search terms', '2025-12-28'),
(159, 'Web Design', 'XML is ', 'A superset of HTML', 'Extensible markup language', 'Part of DHTML', 'Presentation language', 'Extensible markup language', '2025-12-28'),
(160, 'Web Design', 'A world wide web contains webpages', 'residing in many computers', 'created using HTML', 'with links to other webpages', ' residing in many computers linked together using HTML', ' residing in many computers linked together using HTML', '2025-12-28'),
(161, 'Web Design', 'Plug-in is a ________', 'Software', 'Hardware', 'Software and hardware both used for specific purpose', 'Flash player', 'Software', '2025-12-28'),
(162, 'Web Design', 'E-mail message can be protected by____', 'Encryption', 'Caching', 'Mirroring', 'Shadowing', 'Encryption', '2025-12-28'),
(163, 'Web Design', 'IP address of a packet is normally analyzed by', 'CPU', 'Router', 'Modem', 'Hub', 'Router', '2025-12-28'),
(164, 'Web Design', 'What are meta tags used for?', 'To store information usually relevant to browsers and search engines', 'To only store information usually relevant to browsers', 'To only store information about search engines', ' To store information about external links', 'To store information usually relevant to browsers and search engines', '2025-12-28'),
(165, 'Web Design', 'Search engines has software bots called?', 'Crawler robot', 'Crawl bot', 'Web bot', 'Web robot', 'Web robot', '2025-12-28'),
(166, 'Web Design', 'Which file controls how many frames will appear?', 'Frameset', 'Master document', 'Template', 'Timeline', 'Frameset', '2025-12-28'),
(167, 'Web Design', 'Which tag is a container?', '<body>', '<br>', '<hr>', '<td>', '<body>', '2025-12-28'),
(168, 'Web Design', 'Which of the following CSS selectors are used to specify a group of elements?', 'Tag', 'Id', 'Class', 'Both class and tag', 'Class', '2025-12-28'),
(169, 'Web Design', 'Which of the following has introduced text, list, box, margin, border, color, and background properties?', 'HTML', 'PHP', 'Ajax', 'CSS', 'CSS', '2025-12-28'),
(170, 'Web Design', 'Which of the following CSS framework is used to create a responsive design?', 'Django', 'Rails', 'Larawell', 'W3CSS', 'W3CSS', '2025-12-28'),
(171, 'Web Design', 'Which of the following CSS selector is used to specify a rule to bind a particular unique element?', 'Tag', 'Id', 'Class', 'Both class and tag', 'Id', '2025-12-28'),
(172, 'Web Design', 'Which of the following CSS property is used to make the text bold?', 'text-decoration:bold', 'font-weight:bold', 'font-style:bold', 'text-align:bold', 'font-weight:bold', '2025-12-28'),
(173, 'Web Design', 'Which of the following is the correct way to apply CSS Styles?', 'In an external CSS file', 'Inside an HTML element', 'inside the <head> section of an HTML page', 'All of the mentioned', 'All of the mentioned', '2025-12-28'),
(174, 'Web Design', 'Which of the following CSS property sets the font size of text?', 'text', 'size', 'text-size', 'font-size', 'font-size', '2025-12-28'),
(175, 'Web Design', 'Which of the following is not the property of the CSS box model?', 'margin', 'color', 'width', 'height', 'color', '2025-12-28'),
(176, 'Web Design', 'Which of the following CSS property is used to set the color of the text?', 'text-decoration', 'pallet', 'colour', 'color', 'color', '2025-12-28'),
(177, 'Web Design', 'Which of the following CSS Property controls how an element is positioned?', 'static', 'position', 'fix', 'set', 'position', '2025-12-28'),
(178, 'Web Design', 'Which of the following property is used to align the text in a table?', 'text-align', 'align', 'text', 'None of the mentioned', 'align', '2025-12-28'),
(179, 'Web Design', 'What is the preferred way for adding a background color in HTML?', '<body background=\"yellow\">', '<background>yellow</background>', '<body style=\"background-color:yellow\">', '<background color=\"yellow\">text</background>', '<body style=\"background-color:yellow\">', '2025-12-28'),
(180, 'Web Design', 'What is the correct HTML for creating a hyperlink?', '<a name=\"\">Text</a>', '<a>Text</a>', '<a href=\"http://www.example.com\">Example</a>', '<a url=\"http://www.example.com\">Example</a>', '<a href=\"http://www.example.com\">Example</a>', '2025-12-28'),
(181, 'Web Design', 'Which of these tags are all <table> tags?', '<table><head><tfoot>', '<table><tr><td>', '<table><tr><tt>', '<thead><body><tr>', '<table><tr><td>', '2025-12-28'),
(182, 'Web Design', 'Which of the following JavaScript cannot do?', 'JavaScript can react to events', 'JavaScript can manipulate HTML elements', 'JavaScript can be used to validate data', 'All of the Above', 'All of the Above', '2025-12-28'),
(183, 'Web Design', '_____ keyword is used to declare variables in javascript.', 'var', 'dim', 'string', 'None of these', 'var', '2025-12-28'),
(184, 'Web Design', 'Using _______ statement is how you test for a specific condition?', 'select', 'if', 'switch', 'for', 'if', '2025-12-28'),
(185, 'IT Tools', 'Which of the following is not an objective of network security?', 'Confidentiality', 'Integrity', 'Availability', 'Hacking', 'Hacking', '2025-12-28'),
(186, 'IT Tools', 'Which of the following is defined as an attempt to steal, spy, damage or destroy computer systems, networks, or their associated information?', 'Cyber attack', 'Computer security', 'Cryptography', 'Digital Hacking', 'Cyber attack', '2025-12-28'),
(187, 'IT Tools', 'Who is known as the -Father of AI\"?', 'Fisher Ada', 'Alan Turing', 'John McCarthy', 'Allen Newell', 'John McCarthy', '2025-12-28'),
(188, 'IT Tools', 'Artificial Intelligence is about_____.', 'Playing a game on computer', 'Making a machine intelligent', 'Programming on machine with your own intelligence', 'Putting your intelligence in machine', 'Making a machine intelligent', '2025-12-28'),
(189, 'IT Tools', 'What is the name of the first recognized IoT device?', 'Smart Watch', 'ATM', 'Radio', 'Video Game', 'ATM', '2025-12-28'),
(190, 'IT Tools', 'What is the meaning of UPI?', 'Unified Payment Interface', 'Unfind Pay Interface', 'Immediate Payment Interface', 'None of these', 'Unified Payment Interface', '2025-12-28'),
(191, 'IT Tools', 'Who invented the term Internet of Things?', 'Bill Gates', 'Kevin Asthon', 'Steve Jobs', 'McDonald', 'Kevin Asthon', '2025-12-28'),
(192, 'IT Tools', 'Who was the first to use the term Big Data?', 'Steve Jobs', 'Bill Gates', 'John Mashey', 'John Bredi', 'John Mashey', '2025-12-28'),
(193, 'IT Tools', 'Startup is started for whom?', 'Doctors', 'Entrepreneurs', 'Students', 'Youngsters', 'Entrepreneurs', '2025-12-28'),
(194, 'IT Tools', 'What does BHIM stand for?', 'Bharat Interface for Money', 'Bharat Interface to Money', 'Bharat Internet for Money', 'Bharat Interaction for Money', 'Bharat Interface for Money', '2025-12-28'),
(195, 'IT Tools', 'An endpoint of an inter-process communication flow across a computer network is', 'Socket', 'Pipe', 'Port', 'Machine', 'Socket', '2025-12-28'),
(196, 'IT Tools', 'To join the internet, the computer has to be connected to a ______.', 'Internet architecture board', 'Internet society', 'Internet service provider', 'Different computer', 'Internet service provider', '2025-12-28'),
(197, 'IT Tools', 'Mail Access starts with the client when user needs to download Email from the', 'Mail host', 'Mail server', 'Content mixing system', 'Email Server', 'Mail server', '2025-12-28'),
(198, 'IT Tools', 'What services are available on the UMANG?', ' EPFO/Pension/CBSE', 'Ticket Booking', 'PNR Status', 'Maps', ' EPFO/Pension/CBSE', '2025-12-28'),
(199, 'IT Tools', 'Which description is appropriate among the following for ‘E-Governance’?', 'To engage enable and empower citizens', 'To Provide fair and unbiased to citizens', 'To provide technology driven governance', 'To ensure people’s faith in E-Commerce', 'To engage enable and empower citizens', '2025-12-28'),
(200, 'IT Tools', 'E-commerce involves buying and selling of:', 'International Goods', 'Electronic Goods', 'Computer Products', 'Product and Services over internet', 'Product and Services over internet', '2025-12-28'),
(201, 'IT Tools', 'An Email Message that has failed to reach its destination is called', 'Junk Email', 'Trash', 'Spam', 'Bounced Mail', 'Bounced Mail', '2025-12-28'),
(202, 'IT Tools', 'Web Pages are uniquely identified by using', 'IP Address', 'Domain', 'URL', 'File Name', 'URL', '2025-12-28'),
(203, 'IT Tools', 'Which term is mostly used by Twitter users', 'Posts', 'Tweets', 'Twinks', 'Tweats', 'Tweets', '2025-12-28'),
(204, 'IT Tools', 'Which social network is considered the most popular for business to business marketing?', 'Facebook', 'Orkut', 'Instagram', 'Linkedin', 'Linkedin', '2025-12-28'),
(205, 'IT Tools', 'An internet service that allows the user to move a file.', 'SMTP', 'DHCP', 'FTP', 'IP Address', 'FTP', '2025-12-28'),
(206, 'IT Tools', 'MAC Address is of how many bits?', '48 bits', '32 bits', '64 bits', '8 bits', '48 bits', '2025-12-28'),
(207, 'IT Tools', 'How many bit is the first octet of the ‘Class C’ IP address?', '4 bits', '8 bits', '32 bits', '128 bits', '8 bits', '2025-12-28'),
(208, 'IT Tools', 'Which is the transmission media that can carry huge data to large distances with less delay or latency?', 'Wireless or RF or Microwave Frequency', 'Coaxial Cables', 'Optical Fiber Cables', 'Twisted Pair Cables', 'Optical Fiber Cables', '2025-12-28'),
(209, 'IT Tools', 'How many bits are in Version 6 of IP address?', '64 bits', '32 bits', '128 bits', '256 bits', '128 bits', '2025-12-28'),
(210, 'IT Tools', 'The dedicated connection that establishes a permanent switched circuit that is always ready to carry network traffic is', 'Wireless Local Loop', 'TDM', 'Leased line', 'Digital Subscriber Line', 'Leased line', '2025-12-28'),
(211, 'IT Tools', 'Which network topology requires a central controller or hub?', 'Star', 'Mesh', 'Ring', 'Bus', 'Star', '2025-12-28'),
(212, 'IT Tools', '_____ option helps you to save an unfinished email without sending it', 'Trash', 'Inbox', 'Send Items', 'Save as Draft', 'Save as Draft', '2025-12-28'),
(213, 'IT Tools', 'Which of the following icon is used to add an attachment to an email?', 'Stationary Icon', 'Paper clip icon', 'GIF icon', 'Emoji icon', 'Paper clip icon', '2025-12-28'),
(214, 'IT Tools', 'ARPANET Stands for', 'Advanced Research Programmed Auto Network', 'Advanced Research Project Agency Network ', 'Advanced Research Project Automatic Network', 'Advanced Research Project Authorized Network', 'Advanced Research Project Agency Network ', '2025-12-28'),
(215, 'IT Tools', 'Which of the following shortcut is used to print impress presentation?', 'Ctrl + T', 'Ctrl + E', 'Ctrl + S', 'Ctrl + P', 'Ctrl + P', '2025-12-30'),
(216, 'IT Tools', 'Which of the following shortcut key is used to stop the slide show?', 'Esc key', 'Ctrl + O', 'Ctrl + N', 'Ctrl + K', 'Esc key', '2025-12-30'),
(217, 'IT Tools', 'Which of the following is a slide that is used as a starting point for other slides?', 'First slide', 'Master slide', 'Minor slide', 'Last slide', 'First slide', '2025-12-30'),
(218, 'IT Tools', 'LibreOffice Impress file is saved in which of the following extension?', '.ODS', '.ODP', '.PPT', '.ODT', '.ODP', '2025-12-30'),
(219, 'IT Tools', 'Which Shortcut key is used to start Slide Show from first slide?', 'F3', 'F4', 'F5', 'F6', 'F5', '2025-12-30'),
(220, 'IT Tools', 'What is the slide transition in LibreOffice Impress?', 'Letter', 'A special effect used to show a slide-show', 'Overhead', 'A type of slide', 'A special effect used to show a slide-show', '2025-12-30'),
(221, 'IT Tools', 'Which shortcut key is used to jump at the first slide?', 'Home', 'Pageup', 'Pagedown', 'End', 'End', '2025-12-30'),
(222, 'IT Tools', 'Which shortcut key is used to add a new slide in Libre office Impress?', 'Ctrl + N', 'Ctrl + M', 'Ctrl + S', 'Ctrl + T', 'Ctrl + M', '2025-12-30'),
(223, 'IT Tools', 'Which of the following is the shortcut key for checking the spelling in impress?', 'F5', 'F6', 'F3', 'F7', 'F7', '2025-12-30'),
(224, 'IT Tools', 'Which Objects can be added into the presentation?', 'Picture, Not Movie', 'Both Movie and Picture', 'Movie but not Picture', 'Only JPG Images', 'Both Movie and Picture', '2025-12-30'),
(225, 'IT Tools', 'What is default orientation of slide in Libre Office Impress?', 'Landscape', 'Portrait', 'Horizontal', 'Vertical', 'Landscape', '2025-12-30'),
(226, 'IT Tools', 'What is the minimum Zoom size in Libre Office impress?', '5%', '10%', '20%', '15%', '5%', '2025-12-30'),
(227, 'IT Tools', 'In Libre Office Impress slide sorter is found in which menu?', 'Insert', 'Format', 'Slide show', 'View', 'View', '2025-12-30'),
(228, 'IT Tools', 'What is the shortcut key to insert a hyperlink in the slide?', 'Ctrl + H', 'Ctrl + K', 'Ctrl + A', 'Ctrl + M', 'Ctrl + K', '2025-12-30'),
(229, 'IT Tools', 'Which of the following menu is used to change the layout of a slide?', 'Format', 'Slide show', 'Slide', 'Tools', 'Slide', '2025-12-30'),
(230, 'IT Tools', 'Which of the following shortcut key can be used to close the libre office window-', 'Ctrl + N', 'Ctrl + M', 'Ctrl + W', 'Ctrl + P', 'Ctrl + W', '2025-12-30'),
(231, 'IT Tools', 'In Libre Office Impress the shortcut key to insert a text box is ', 'F5', 'F8', 'F3', 'F2', 'F2', '2025-12-30'),
(232, 'IT Tools', 'In LibreOffice impress which view contains only Text?', 'Normal view', 'Outline view', 'Notes view', 'Slide sorter view', 'Outline view', '2025-12-30'),
(233, 'IT Tools', 'In LibreOffice impress, by default the presentation is saved as', 'Show1', 'Presentation1', 'Untitled1', 'Slide1', 'Untitled1', '2025-12-30'),
(234, 'IT Tools', 'Which type of program is Libreoffice impress?', 'Presentation', 'Word processing', 'Spreadsheet', 'Draw', 'Presentation', '2025-12-30'),
(235, 'IT Tools', 'The cell reference for a range of cells that starts in cell C1 and goes over to column H and down to row 10 is?\n', 'C1:10H', 'C1:H10', 'C1-H10', 'C1:H:10', 'C1:H10', '2025-12-30'),
(236, 'IT Tools', 'The short cut key Ctrl + H is used to________?', 'Open Find Dialog box', 'Open find & replace dialog box', 'Font dialog box', 'Format dialog box', 'Open find & replace dialog box', '2025-12-30'),
(237, 'IT Tools', 'One cell format can be copied to another cell by using?', 'Format setting', 'Format checking', 'Clone formatting', 'Cloning', 'Clone formatting', '2025-12-30'),
(238, 'IT Tools', 'If we want to arrange data in ascending or descending order which option should be chosen?', 'Filter', 'Sort', 'List', 'Arrange', 'Sort', '2025-12-30'),
(239, 'IT Tools', 'What is the intersection of a column and a row on a worksheet called?', 'Column', 'Value', 'Address', 'Cell', 'Cell', '2025-12-30'),
(240, 'IT Tools', 'What is the file extension of Libre Spreadsheet document?', '.ODF', '.ODT', '.ODS', '.OBT', '.ODS', '2025-12-30'),
(241, 'IT Tools', 'Which shortcut is used for printing the sheet?', 'CTRL + P', 'CTRL + SHIFT + P', 'ALT + P', 'CTRL + ALT + P', 'CTRL + P', '2025-12-30'),
(242, 'IT Tools', 'The DSUM function is a built-in function in Calc that is categorized as a ____Function?', 'Logical', 'Database', 'Statistical', 'Financial', 'Database', '2025-12-30'),
(243, 'IT Tools', '__________uses filter criteria from specified cells?', 'AutoFilter', 'Advanced', 'Standard', 'Sorting', 'Advanced', '2025-12-30'),
(244, 'IT Tools', 'Which option is used to restrict scrolling of row and column?', 'Pause', 'Stop', 'Freeze', 'Scroll Off', 'Freeze', '2025-12-30'),
(245, 'IT Tools', 'The CALC __________ function counts matching records in a database using criteria and an optional field', 'DCOUNT', 'DCOUNTA', 'DSUM', 'SUM', 'DCOUNT', '2025-12-30'),
(246, 'IT Tools', 'Maximum number of rows in a Libre Spreadsheet is__?', '1048576', '16348', '1084576', '1024598', '1048576', '2025-12-30'),
(247, 'IT Tools', 'How do you change column width to fit the contents?', 'Single-click the boundary to the left to the column heading', 'Double click the boundary to the right of the column heading', 'Press Alt and single click anywhere in the column', 'Press CTRL and double click anywhere in the column', 'Double click the boundary to the right of the column heading', '2025-12-30'),
(248, 'IT Tools', 'What is shortcut key to enter current date in a cell in Libre Spreadsheet?', 'Ctrl + ]', 'Alt + D', 'Ctrl + ;', 'Shift + K', 'Ctrl + ;', '2025-12-30'),
(249, 'IT Tools', 'In Libre Spreadsheet, Rows are labelled as ____?', 'A,B,C,.........', '1,2,3,........', 'A1,B1,C1,..............', '1A,1B,1C,.........', '1,2,3,........', '2025-12-30'),
(250, 'IT Tools', 'What is the shortcut key to open format cell option dialogue box?', 'Ctrl + F', 'Ctrl + D', 'Ctrl + L', 'Ctrl + 1', 'Ctrl + 1', '2025-12-30'),
(251, 'IT Tools', 'What is the default alignment of Numeric Cell data?', 'Left', 'Right', 'Center', 'Justified', 'Right', '2025-12-30'),
(252, 'IT Tools', 'Which of these is a correct formula?', '=SUM(J14:J16)', '=SUM(J14?J16)', 'SUM(J14:J16)', 'J14+J15+J16', '=SUM(J14:J16)', '2025-12-30'),
(253, 'IT Tools', 'What is the use of filter in Calc?', 'See only specific data', 'Arrange data', 'Copy data', 'Making chart', 'See only specific data', '2025-12-30'),
(254, 'IT Tools', 'What is the shortcut to paste special in calc?', 'Ctrl + Shift + V', 'Ctrl + V', 'Ctrl + C', 'Ctrl + Shift + S', 'Ctrl + Shift + V', '2025-12-30'),
(255, 'IT Tools', 'Watermark option is available in which menu?', 'File', 'Tools', 'Insert', 'Format', 'Format', '2025-12-30'),
(256, 'IT Tools', 'What is the default alignment in libre writer?', 'Right', 'Left', 'Center', 'Justify', 'Left', '2025-12-30'),
(257, 'IT Tools', 'By default, the page size of Libre office writer is _____', 'A4', 'A5', 'Legal', 'Letter', 'A4', '2025-12-30'),
(258, 'IT Tools', 'In hyperlink dialog box which option is not available', 'Internet', 'Mail', 'Document', 'File Attachment', 'File Attachment', '2025-12-30'),
(259, 'IT Tools', 'Rulers option is available in which menu', 'File', 'Insert', 'Table', 'View', 'View', '2025-12-30'),
(260, 'IT Tools', 'What is the Default view in LibreOffice writer?', 'Normal View', 'Web view', 'Slide view', 'Print Layout view', 'Normal View', '2025-12-30'),
(261, 'IT Tools', 'What is the File Extension for Libre office Writer?', '.OFT', '.ODT', '.OOT', '.OBD', '.ODT', '2025-12-30'),
(262, 'IT Tools', 'Which of the following feature is not available in Export As option', 'Export as PDF', 'Export as EPUB', 'Export as image', 'Export Directly as PDF', 'Export as image', '2025-12-30'),
(263, 'IT Tools', 'Template option is available under which menu', 'Edit', 'Insert', 'File', 'View', 'File', '2025-12-30'),
(264, 'IT Tools', 'What is the shortcut key of Save As option in Libre Office?', 'Ctrl + Shift + S', 'Ctrl + S', 'Ctrl + Shift + N', 'Shift + S', 'Ctrl + Shift + S', '2025-12-30'),
(265, 'IT Tools', 'What is the shortcut key of LibreOffice_Help?', 'F11', 'F12', 'F1', 'F7', 'F1', '2025-12-30'),
(266, 'IT Tools', 'Which bar is located just below the title bar?', 'Status bar', 'Menu bar', 'Tool bar', 'Formatting bar', 'Menu bar', '2025-12-30'),
(267, 'IT Tools', 'In Libre, writer by default Highlighter color?', 'Red', 'Green', 'Blue', 'Yellow', 'Yellow', '2025-12-30'),
(268, 'IT Tools', 'Which of the following option is not a part of comment pop up', 'Reply comment', 'Delete comment', 'Delete all comments', 'Reply and delete comment', 'Reply and delete comment', '2025-12-30'),
(269, 'IT Tools', 'Default text in LibreOffice Writer is', 'Amiri', 'Linex biolinum G', 'Calibri', 'Liberation Serif', 'Liberation Serif', '2025-12-30'),
(270, 'IT Tools', 'What is the shortcut key of Ruler in libreoffice writer?', 'Ctrl + Shift + R', 'Ctrl + S', 'Ctrl + Shift + N', 'Alt + R', 'Ctrl + Shift + R', '2025-12-30'),
(271, 'IT Tools', 'What is the maximum zoom in of libre Writer?', '500', '600', '550', '700', '600', '2025-12-30'),
(272, 'IT Tools', 'Which option is selected for case sensitive matching?', 'Match only', 'Case match', 'Match case', 'Case only', 'Match case', '2025-12-30'),
(273, 'IT Tools', 'What is the Short cut key for Superscript?', 'Ctrl + Shift + P', 'Ctrl + Shift + D', 'Ctrl + P', 'Shift + P', 'Ctrl + Shift + P', '2025-12-30'),
(274, 'IT Tools', 'Which option help us to send same letter to different persons?', 'Mail merge', 'Macros', 'Multiple Letter', 'Template', 'Mail merge', '2025-12-30'),
(275, 'IT Tools', 'What is the shortcut key for taking screenshot of entire display and save?', 'Window key + PrtScr', 'Window key + L', 'Window key + D', 'Window key + M', 'Window key + PrtScr', '2025-12-30'),
(276, 'IT Tools', 'A new printer can be added by the printer and scanner option in______', 'Control panel', 'Dynamic data exchange', 'File manager', 'None of the above', 'Control panel', '2025-12-30'),
(277, 'IT Tools', 'Which component gives you access to all of your computer setting and enable you to install and remove program?', 'Start menu', 'File explorer', 'Control panel', 'Default programs', 'Control panel', '2025-12-30'),
(278, 'IT Tools', 'What is the shortcut key to snap app to right?', 'Window key + right arrow', 'Window key + up arrow', 'Window key + left arrow', 'Window key + down arrow', 'Window key + right arrow', '2025-12-30'),
(279, 'IT Tools', 'Operating System of a computer serves as a software interface between the user and ___________', 'Memory', 'Hardware', 'Peripheral', 'Screen', 'Hardware', '2025-12-30'),
(280, 'IT Tools', 'What is another name for application software?', 'End-user software', 'Utility software', 'Specific software', 'All of these', 'End-user software', '2025-12-30'),
(281, 'IT Tools', 'The saving of data and instruction to make them available for later use is a job of:', 'Cache unit', 'Input unit', 'Output unit', 'Storage unit', 'Storage unit', '2025-12-30'),
(282, 'IT Tools', 'Which of the following storage devices can store maximum amount of data?', 'Floppy Disk', 'Compact Disk', 'Hard Disk', 'Magneto Optic Disk', 'Hard Disk', '2025-12-30'),
(283, 'IT Tools', 'The Arithmetic and Logic Unit of computer respond to command coming from_____', 'Primary memory', 'Control unit', 'Cache memory', 'External memory', 'Control unit', '2025-12-30'),
(284, 'IT Tools', 'In Which Generation Time sharing, Real time Network and Distributed Operating Systems were used?\n', '1st', '4th', '2nd', '5th', '4th', '2025-12-30'),
(285, 'Web Design', 'Which HTML tag is used to define a hyperlink', '<link>', '<a>', '<href>', '<hyper>', '<a>', '2026-01-08'),
(286, 'Web Design', 'Which attribute specifies an alternate text for an image?', 'title', 'src', 'alt', 'longdesc', 'alt', '2026-01-08'),
(287, 'Web Design', 'Which HTML5 element is used to define navigation links?', '<navigate>', '<nav>', '<menu>', '<section>', '<nav>', '2026-01-08'),
(288, 'Web Design', 'What is the correct HTML element for the largest heading?', '<heading>', '<h6>', '<head>', '<h1>', '<h1>', '2026-01-08');
INSERT INTO `questions_table` (`question_id`, `subject_name`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_answer`, `date_time`) VALUES
(289, 'Web Design', 'Which tag is used to embed a video in HTML5?', '<media>', '<movie>', '<video>', '<embed>', '<video>', '2026-01-08'),
(290, 'Web Design', 'Which doctype is correct for HTML5?', '<!DOCTYPE HTML>', '<!DOCTYPE HTML5>', '<!HTML>', '<!DOCTYPE XHTML>', '<!DOCTYPE HTML>', '2026-01-08'),
(291, 'Web Design', 'Which tag is used to create a dropdown list?', '<input>', '<select>', '<option>', '<list>', '<select>', '2026-01-08'),
(292, 'Web Design', 'Which attribute is used to open a link in a new tab?', 'open', 'new', 'target = \"_blank\"', 'window = \"_new\"', 'target = \"_blank\"', '2026-01-08'),
(293, 'Web Design', 'Which semantic element is used for self-contained content?', '<section>', '<article>', '<aside>', '<div>', '<article>', '2026-01-08'),
(294, 'Web Design', 'What is the purpose of the <meta charset=\"UTF-8\"> tag?', 'Page title', 'Character encoding', 'SEO optimization', 'Responsive Layout', 'Character encoding', '2026-01-08'),
(295, 'Web Design', 'Which CSS property is used to change text color?', 'text-color', 'font-color', 'color', 'foreground', 'color', '2026-01-08'),
(296, 'Web Design', 'Which selector selects all <p> elements inside a <div>?', 'div + p', 'div > p', 'div p', 'div.p', 'div p', '2026-01-08'),
(297, 'Web Design', 'What does CSS stand for?', 'Creative Style Sheets', 'Colorful Style Sheets', 'Cascading Style Sheets', 'Computer Style Sheets', 'Cascading Style Sheets', '2026-01-08'),
(298, 'Web Design', 'Which property controls the space inside an element?', 'margin', 'padding', 'border', 'spacing', 'padding', '2026-01-08'),
(299, 'Web Design', 'Which position value places an element relative to its first positioned ancestor?', 'static', 'relative', 'absolute', 'fixed', 'absolute', '2026-01-08'),
(300, 'Web Design', 'Which CSS property is used to create animations?', 'transform', 'transition', 'animation', 'effect', 'animation', '2026-01-08'),
(301, 'Web Design', 'What is the default display value of a <div> element?', 'inline', 'inline-block', 'block', 'none', 'block', '2026-01-08'),
(302, 'Web Design', 'Which unit is relative to the root element font size?', 'em', '%', 'px', 'rem', 'rem', '2026-01-08'),
(303, 'Web Design', 'Which CSS property is used to control element stacking order?', 'layer', 'index', 'z-index', 'stack', 'z-index', '2026-01-08'),
(304, 'Web Design', 'Which pseudo-class is triggered when the user hovers over an element?', ':active', ':hover', ':focus', ':visited', ':hover', '2026-01-08'),
(305, 'Web Design', 'Which keyword is used to declare a variable in JavaScript?', 'var', 'let', 'const', 'all of these', 'all of these', '2026-01-08'),
(306, 'Web Design', 'Which function is used to print messages to the browser console?', 'print()', 'console.log()', 'log()', 'alert()', 'console.log()', '2026-01-08'),
(307, 'Web Design', 'Which operator is used for strict equality?', '==', '=', '===', '!=', '===', '2026-01-08'),
(308, 'Web Design', 'What will typeof null return?', 'null', 'object', 'undefined', 'number', 'object', '2026-01-08'),
(309, 'Web Design', 'Which method converts JSON data into a JavaScript object?', 'JSON.stringify()', 'JSON.parse()', 'JSON.convert()', 'JSON.object()', 'JSON.parse()', '2026-01-08'),
(310, 'Web Design', 'Which event occurs when a user clicks an HTML element?', 'onmouseover', 'onchange', 'onclick', 'onload', 'onclick', '2026-01-08'),
(311, 'Web Design', 'What is a closure in JavaScript?', 'A loop', 'A function inside another function', 'A function with preserved data', 'Both B and C', 'Both B and C', '2026-01-08'),
(312, 'Web Design', 'Which statement is used to handle errors?', 'catch', 'throw', 'try ..... catch', 'error', 'try ..... catch', '2026-01-08'),
(313, 'Web Design', 'Which array method removes the last element?', 'shift()', 'pop()', 'splice()', 'slice()', 'pop()', '2026-01-08'),
(314, 'Web Design', 'What does NaN stand for?', 'Not a Number', 'New and Null', 'No assigned Number', 'Negative Number', 'Not a Number', '2026-01-08'),
(315, 'Web Design', 'AngularJS is maintained by:', 'Facebook', 'Microsoft', 'Google', 'Amazon', 'Google', '2026-01-08'),
(316, 'Web Design', 'Which directive is used for two-way data binding?', 'ng-bind', 'ng-model', 'ng-repeat', 'ng-init', 'ng-model', '2026-01-08'),
(317, 'Web Design', 'Which AngularJS component is used to define application logic?', 'module', 'controller', 'directive', 'filter', 'controller', '2026-01-08'),
(318, 'Web Design', 'Which directive is used to repeat HTML elements?', 'ng-loop', 'ng-repeat', 'ng-for', 'ng-each', 'ng-repeat', '2026-01-08'),
(319, 'Web Design', 'What is $scope in AngularJS?', 'Database', 'Model', 'Controller logic', 'View container', 'Model', '2026-01-08'),
(320, 'Web Design', 'Which filter formats date in AngularJS?', 'dateFormat', 'formatDate', 'date', 'time', 'date', '2026-01-08'),
(321, 'Web Design', 'Which directive is used to bind HTML content?', 'ng-html', 'ng-bind-html', 'ng-content', 'ng-template', 'ng-bind-html', '2026-01-08'),
(322, 'Web Design', 'Which service is used for HTTP requests?', '$http', '$ajax', '$request', '$fetch', '$http', '2026-01-08'),
(323, 'Web Design', 'Which directive is used for conditional display?', 'ng-if', 'ng-show', 'ng-hide', 'All of the above', 'All of the above', '2026-01-08'),
(324, 'Web Design', 'Which AngularJS expression symbol is used?', '{ {     } }', '[ [   ] ]', '( (      ) )', '< <     > >', '{ {     } }', '2026-01-08'),
(325, 'Web Design', 'Which pseudo-class selects an element when it is the first child of its parent?', ':first', ':first-of-type', ':first-child', ':child-first', ':first-child', '2026-01-08'),
(326, 'Web Design', 'What is the difference between :nth-child() and :nth-of-type()?', 'No difference', 'nth-child counts only specific tags', 'nth-of-type counts same element type only', 'both count classes only', 'nth-of-type counts same element type only', '2026-01-08'),
(327, 'Web Design', 'Which pseudo-class selects an input element when it is focused?', ':hover', ':active', ':focus', ':enabled', ':focus', '2026-01-08'),
(328, 'Web Design', 'Which media query is used to apply styles for screens smaller than 768px? \n@media (max-width: 768px) {}', 'Desktop design', 'Print design', 'Mobile / tablet design', 'Animation design', 'Mobile / tablet design', '2026-01-08'),
(329, 'Web Design', 'What is the correct use of calc() in CSS?', 'width: calc(100% - 50px);', 'width: calc(100% -50px)', 'width: calc(100% minus 50px);', 'width: calc(100%-50px);', 'width: calc(100% - 50px);', '2026-01-08'),
(330, 'Web Design', 'Which position value removes the element from the normal document flow?', 'relative', 'static', 'absolute', 'inherit', 'absolute', '2026-01-08'),
(331, 'Web Design', 'An element with position: absolute is positioned relative to', 'Browser window always', 'Nearest positioned ancestor', 'Parent element only', 'Document body only', 'Nearest positioned ancestor', '2026-01-08'),
(332, 'Web Design', 'Which CSS unit is best suited for responsive typography?', 'px', 'cm', 'em / rem', 'pt', 'em / rem', '2026-01-08'),
(333, 'Web Design', 'Which pseudo-class targets links that have already been visited?', ':link', ':active', ':hover', ':visited', ':visited', '2026-01-08'),
(334, 'Web Design', 'What will be the width of the element?\ndiv { width: calc(50% + 100px); }', 'Half of screen only', 'Half of parent + 100px ', 'Fixed 100px', 'Full width', 'Half of parent + 100px ', '2026-01-08'),
(335, 'Web Design', 'What will be the output\nlet x = 10; \n{\nlet x = 20;\n}\nconsole.log(x);', '20', '10', 'undefined', 'error', '10', '2026-01-08'),
(336, 'Web Design', 'What will be the output\nvar a = 5;\nvar a = 10;\nconsole.log(a);', '5', '10', 'error', 'undefined', '10', '2026-01-08'),
(337, 'Web Design', 'What will be the output?\nconst a = 10;\na = 20;\nconsole.log(a);', '10', '20', 'undefined', 'error', 'error', '2026-01-08'),
(338, 'Web Design', 'What will be the output?\nfor (let i=0; i<3; i++) {\nconsole.log(i);\n}', '0 1 2', '1 2 3', '0 1 2 3', 'error', '0 1 2', '2026-01-08'),
(339, 'Web Design', 'Which pseudo-element is used to style the first letter of a text?', ':first-letter', '::first-letter', '::letter', ':first-char', '::first-letter', '2026-01-08'),
(340, 'Web Design', 'Which pseudo-element is used to insert content before an element?', '::before', '::start', '::prepend', '::content', '::before', '2026-01-08'),
(341, 'Web Design', 'Which property is mandatory when using ::before or ::after?', 'display', 'position', 'content', 'z-index', 'content', '2026-01-08'),
(342, 'Web Design', 'What will be the output? p::first-line {color:red;}', 'Entire paragraph becomes red', 'Only first word becomes red', 'Only first line becomes red', 'No effect', 'Only first line becomes red', '2026-01-08'),
(343, 'Web Design', 'Which pseudo-element is commonly used to create decorative icons without HTML markup?', '::marker', '::before', '::first-letter', '::selection', '::before', '2026-01-08'),
(344, 'Web Design', 'What will this CSS do? \np::after { content:\"*\"; }', 'Adds a star before paragraph', 'Adds a start after paragraph', 'Replaces paragraph text', 'Removes paragraph text', 'Adds a start after paragraph', '2026-01-08'),
(345, 'Web Design', 'Which pseudo-element styles the part of text selected by the user?', '::hover', '::active', '::selection', '::highlight', '::selection', '2026-01-08'),
(346, 'Web Design', 'Which pseudo-element is used to style list item markers?', '::bullet', '::list', '::marker', '::item', '::marker', '2026-01-08'),
(347, 'Web Design', 'Can pseudo-elements be positioned absolutely?', 'No, never', 'Yes, if position is applied', 'Only relative positioning', 'Only fixed positioning', 'Yes, if position is applied', '2026-01-08'),
(348, 'Web Design', 'How many pseudo-elements can be applied to a single element at once?', 'One', 'Two', 'Three', 'Multiple', 'Two', '2026-01-08'),
(349, 'Web Design', 'What is the purpose of clip-path in CSS?', 'To resize elements', 'To hide overflow', 'To create custom shapes by clipping', 'To animate elements', 'To create custom shapes by clipping', '2026-01-08'),
(350, 'Web Design', 'Which function is used to create a circular clip?', 'round()', 'circle()', 'ellipse()', 'arc()', 'circle()', '2026-01-08'),
(351, 'Web Design', 'What does this code do?\nclip-path: circle(50%);', 'Crops half the image', 'Creates a circular mask', 'Adds border-radius', 'Hides the element', 'Creates a circular mask', '2026-01-08'),
(352, 'Web Design', 'Which clip-path function allows custom polygon shapes?', 'shape()', 'polygon()', 'path()', 'rect()', 'polygon()', '2026-01-08'),
(353, 'Web Design', 'What do the values represent in polygon()?\nclip-path: polygon(0 0, 100% 0, 100% 100%);', 'Angles', 'Colors', 'X and Y coordinates', 'Border widths', 'X and Y coordinates', '2026-01-08'),
(354, 'Web Design', 'Which unit is commonly used inside clip-path?', 'px only', '% only', '% and px', 'em only', '% and px', '2026-01-08'),
(355, 'Web Design', 'Which property is required to hide the clipped area?', 'display : none;', 'overflow: hidden;', 'clip-path: itself;', 'visibility : hidden;', 'clip-path: itself;', '2026-01-08'),
(356, 'OOPs', 'In object oriented Programming the program is divided into __________.', 'class', 'object', 'function', 'none of these', 'object', '2026-05-05'),
(357, 'OOPs', 'Which one is the Object Oriented Programming language?', 'Cobol', 'C', 'C++', 'Both C and C++', 'C++', '2026-05-05'),
(358, 'OOPs', 'The wrapping up of data and functions into a single unit is called ____', 'Inheritance', 'Encapsulation', 'Data Hiding', 'Polymorphism', 'Encapsulation', '2026-05-06'),
(359, 'OOPs', 'The process by which objects of one class acquire the properties of objects of another class is called ______', 'Abstraction', 'Inheritance', 'Encapsulation', 'Polymorphism', 'Inheritance', '2026-05-06'),
(360, 'OOPs', 'In OOP which concept provides the idea of reusability', 'Inheritance', 'Encapsulation', 'Data Hiding', 'Polymorphism', 'Inheritance', '2026-05-06'),
(361, 'OOPs', 'The process of making an operator to exhibit different behaviors in different instances is called _______', 'Function overloading', 'Operator overloading', 'Inheritance', 'None of these', 'Operator overloading', '2026-05-06'),
(362, 'OOPs', 'The process of making a function to exhibit different behaviors in different instances is called _______', 'Function overloading', 'Operator overloading', 'Inheritance', 'None of these', 'Function overloading', '2026-05-06'),
(363, 'OOPs', 'Objects communicate with one another by using ______', 'Message passing', 'Operator overloading', 'Inheritance', 'Both A and B', 'Message passing', '2026-05-06'),
(364, 'OOPs', 'We can eliminate redundant code and extend the use of existing class by using ______', 'Inheritance', 'Operator overloading', 'Encapsulation', 'Both A and B', 'Inheritance', '2026-05-06'),
(365, 'OOPs', 'The ________ principle helps the programmer to build secure programs.', 'Operator overloading', 'Encapsulation', 'Data Hiding', 'Polymorphism', 'Data Hiding', '2026-05-06'),
(366, 'OOPs', 'What are the basic run time entities in an object oriented program?', 'Objects', 'Functions', 'Data', 'None of these', 'Objects', '2026-05-06'),
(367, 'OOPs', 'OOPs follows ______ approach during program design.', 'Top down', 'Bottom up', 'Both A and B', 'None of these', 'Bottom up', '2026-05-06'),
(368, 'OOPs', 'The technique of Hiding internal details in an object is called _______', 'Encapsulation', 'Functions', 'Abstraction', 'Inheritance', 'Abstraction', '2026-05-06'),
(369, 'OOPs', 'Classes are _______ datatypes.', 'Derived', 'User defined', 'Built in', 'Both A and C', 'User defined', '2026-05-06'),
(370, 'OOPs', '_______ provides interface between the object’s data and program.', 'Object', 'Functions', 'Class', 'Polymorphism', 'Functions', '2026-05-06'),
(371, 'OOPs', '_________ refers to the linking of procedure call to the code to be executed in response to the call.', 'Polymorphism', 'Functions', 'Dynamic Binding', 'Object', 'Dynamic Binding', '2026-05-06'),
(372, 'OOPs', 'A _______ for an object is a request for execution of a procedure.', 'object', 'functions', 'dynamic binding', 'message', 'message', '2026-05-06'),
(373, 'OOPs', 'The << operator is known as _______.', 'put to', 'get from', 'insertion', 'both A and C', 'both A and C', '2026-05-06'),
(374, 'OOPs', 'The >> operator is known as ________', 'Put to', 'Get from', 'Extraction', 'Both B and C', 'Both B and C', '2026-05-07'),
(375, 'OOPs', '_____ contains function prototype for the standard input and output functions.', 'iomanip.h', 'iostream.h', 'stdlib.h', 'Both A and B', 'iostream.h', '2026-05-07'),
(376, 'OOPs', 'In C++ default return type for all the functions is ______', 'int', 'void', 'float', 'None of these', 'int', '2026-05-07'),
(377, 'OOPs', 'Multiple use of input and output operator is called __________', 'Polymorphism', 'Inheritance', 'Cascading', 'None of these', 'Cascading', '2026-05-07'),
(378, 'OOPs', 'Which of the following is not a feature of OOPs.', 'Polymorphism', 'Inheritance', 'Dynamic Binding', 'None of these', 'None of these', '2026-05-07'),
(379, 'OOPs', '______ relationship indicates that the change to an independent thing will affect the dependent thing', 'Inheritance', 'Dependency', 'Association', 'Aggregation', 'Dependency', '2026-05-07'),
(380, 'OOPs', '______ can represent items of varying data types to an item.', 'Class', 'Array', 'Structures', 'Object', 'Structures', '2026-05-07'),
(381, 'OOPs', '_______ are the smallest or the atomic elements of a language', 'Identifiers', 'Literals', 'Keywords', 'Tokens', 'Tokens', '2026-05-07'),
(382, 'OOPs', 'Blanks, tabs, newlines, form feeds and comments are collectively called _____', 'Blank fields', 'White space', 'Null Values', 'Literals', 'White space', '2026-05-07'),
(383, 'OOPs', 'The instructions, which are used in programming, are called ________', 'Data type', 'Keywords', 'Objects', 'Identifiers', 'Keywords', '2026-05-07'),
(384, 'OOPs', '_____ are the reserved words of the programming language', 'Tokens', 'Literals', 'Separators', 'Keywords', 'Keywords', '2026-05-07'),
(385, 'OOPs', '______ refer to the names of variables, functions, arrays, classes, etc.', 'Identifiers', 'Operators', 'Punctuators', 'Manipulators', 'Identifiers', '2026-05-07'),
(386, 'OOPs', 'Write the range of value of the data type ‘char’', '0 to 128', '0 to  255', '-255 to 255', '-128 to 127', '-128 to 127', '2026-05-07'),
(387, 'OOPs', 'Write the range of value of the data type ‘int’', '-32768 to 32767', '0 to 65535', '0 to 65536', '0 to 32768', '-32768 to 32767', '2026-05-07'),
(388, 'OOPs', 'The standard ASCII characters have numeric values from ____ to ______', '0 to 128', '0 to 127', '0 to 255', '0 to 256', '0 to 127', '2026-05-07'),
(389, 'OOPs', 'A ______ is the name of the storage location', 'Identifier', 'Variable', 'Keyword', 'Token', 'Variable', '2026-05-07'),
(390, 'OOPs', 'Array indexing always starts with the number', '0', '1', '2', '\\0', '0', '2026-05-07'),
(391, 'OOPs', 'We declare a function with ______ if it does not have any return type', 'long', 'double', 'void', 'int', 'void', '2026-05-07'),
(392, 'OOPs', 'Which of the following is selection statement in C++', 'break', 'goto', 'exit', 'switch', 'switch', '2026-05-07'),
(393, 'OOPs', 'There is a unique function in C++ program by where all C++ programs start their execution', 'start()', 'begin()', 'main()', 'output()', 'main()', '2026-05-07'),
(394, 'OOPs', 'A block comment can be written by', 'Starting every line with double slashes (//)', 'Starting with /* and ending with */', 'Starting with //* and ending with *//', 'Starting with <!? and ending with ?!>', 'Starting with /* and ending with */', '2026-05-07'),
(395, 'OOPs', 'Which of the following is not a correct variable type?', 'Float', 'Real', 'Int', 'Double', 'Real', '2026-05-07'),
(396, 'OOPs', 'By default, the members of a C++ class are:', 'Private', 'Public', 'Protected', 'None of these', 'Private', '2026-05-07'),
(397, 'OOPs', 'C++ is originally developed by', 'Nicolas Wirth', 'Dennis Ritchi', 'Bjarne Stroustrup', 'Ken Thompson', 'Bjarne Stroustrup', '2026-05-07'),
(398, 'OOPs', 'Identify the unary operator.', '?', '++', '+', '%', '++', '2026-05-07'),
(399, 'OOPs', '_______ statement is used to print a blank line in CPP program', '\"\\n\"', 'endl', 'Both A and B', 'None of these', 'Both A and B', '2026-05-07'),
(400, 'OOPs', '______ refers to the use of the same thing for different purpose', 'Function declaration', 'Overloading', 'Function calling', 'Prototyping', 'Overloading', '2026-05-07'),
(401, 'OOPs', 'The functions declared inside the class is known as ______', 'Data members', 'Library functions', 'Member functions', 'User defined functions', 'Member functions', '2026-05-07'),
(402, 'OOPs', 'The binding of data and functions together into a single class?type is referred to as _______', 'Abstraction', 'Encapsulation', 'Inheritance', 'Polymorphism', 'Encapsulation', '2026-05-07'),
(403, 'OOPs', 'When a function is defined inside a class, it is treated as_____', 'Inline functions', 'Inside function', 'Inline definition', 'Data function', 'Inline functions', '2026-05-07'),
(404, 'OOPs', 'Calling a member function by using its name from another member function of the same class is known as _______', 'Grouping of member function', 'Member function group', 'Nesting of member function', 'Nested group of member function', 'Nesting of member function', '2026-05-07'),
(405, 'OOPs', 'Which feature of OOP allows a class to acquire properties of another class?', 'Encapsulation', 'Inheritance', 'Polymorphism', 'Abstraction', 'Inheritance', '2026-05-07'),
(406, 'OOPs', 'Which access specifier makes class members accessible only within the same class?', 'public', 'protected', 'private', 'global', 'private', '2026-05-07'),
(407, 'OOPs', 'What is the correct way to declare a class in C++?', 'create class MyClass { };', 'class MyClass { };', 'MyClass class { };', 'define class MyClass { };', 'class MyClass { };', '2026-05-07'),
(408, 'OOPs', 'Which keyword is used to create an object dynamically in C++?', 'create', 'malloc', 'alloc', 'new', 'new', '2026-05-07'),
(409, 'OOPs', 'Which type of inheritance allows a class to inherit from more than one base class', 'Single Inheritance', 'Hierarchical Inheritance', 'Multiple Inheritance', 'Multi-level Inheritance', 'Multiple Inheritance', '2026-05-07'),
(410, 'OOPs', 'Which keyword is used for runtime polymorphism in C++?', 'static', 'virtual', 'friend', 'inline', 'virtual', '2026-05-07'),
(411, 'OOPs', 'What is a constructor in C++?', 'A function used to destroy objects', 'A special function used to initialize objects', 'A function used for inheritance', 'A variable inside a class', 'A special function used to initialize objects', '2026-05-07'),
(412, 'OOPs', 'Which of the following is not a principle of OOP?', 'Encapsulation', 'Inheritance', 'Compilation', 'Polymorphism', 'Compilation', '2026-05-07'),
(413, 'OOPs', 'Which operator is used to access members of a class through an object?', ': (colon)', '-> (arrow)', '. (dot)', ':: (double colon)', '. (dot)', '2026-05-07'),
(414, 'OOPs', 'What is the main purpose of a destructor in C++?', 'To initialize objects', 'To allocate memory', 'To free resources before object destruction', 'To inherit classes', 'To free resources before object destruction', '2026-05-07'),
(415, 'OOPs', 'Which of the following is true about constructors?', 'Constructors can have a return type', 'Constructors can not be overloaded', 'Constructors have the same name as the class', 'Constructors must be virtual', 'Constructors have the same name as the class', '2026-05-07'),
(416, 'OOPs', 'What is compile-time polymorphism achieved through?', 'Virtual functions', 'Function overloading', 'Inheritance', 'Dynamic binding', 'Function overloading', '2026-05-07'),
(417, 'OOPs', 'Which inheritance type forms a “chain” of classes?', 'Multiple inheritance', 'Hierarchical inheritance', 'Multilevel inheritance', 'Hybrid inheritance', 'Multilevel inheritance', '2026-05-07'),
(418, 'OOPs', 'Which keyword is used to inherit a class in C++?', 'extends', 'inherits', 'derived', ':', ':', '2026-05-07'),
(419, 'OOPs', 'What is data hiding in OOP?', 'Showing all data publicly', 'Restricting access to data members', 'Using inheritance', 'Creating multiple objects', 'Restricting access to data members', '2026-05-07'),
(420, 'OOPs', 'Which function is automatically called when an object goes out of scope?', 'Constructor', 'Main function', 'Destructor', 'Friend function', 'Destructor', '2026-05-07'),
(421, 'OOPs', 'Which concept is demonstrated when a derived class provides a specific implementation of a base class function?', 'Function Overloading', 'Function Overriding', 'Encapsulation', 'Data Hiding', 'Function Overriding', '2026-05-07'),
(422, 'OOPs', 'Which of the following is necessary for achieving runtime polymorphism?', 'Static functions', 'Friend functions', 'Virtual functions', 'Inline functions', 'Virtual functions', '2026-05-07'),
(423, 'OOPs', 'What will happen if a base class destructor is not declared virtual?', 'Program becomes faster', 'Derived class destructor may not execute correctly', 'Constructors stop working', 'Multiple inheritance becomes impossible', 'Derived class destructor may not execute correctly', '2026-05-07'),
(424, 'OOPs', 'Which inheritance type may cause the “Diamond Problem”', 'Single inheritance', 'Multilevel inheritance', 'Multiple inheritance', 'Hierarchical inheritance', 'Multiple inheritance', '2026-05-07'),
(425, 'OOPs', 'Which keyword is used to prevent multiple copies of a base class in inheritance?', 'static', 'friend', 'virtual', 'const', 'virtual', '2026-05-07'),
(426, 'OOPs', 'Which of the following statements about abstract classes is correct', 'Objects of abstract classes can be created', 'Abstract classes cannot contain constructors', 'A class with at least one pure virtual function is abstract', 'Abstract classes cannot be inherited', 'A class with at least one pure virtual function is abstract', '2026-05-07'),
(427, 'OOPs', 'Which feature allows the same function name to behave differently based on object type', 'Encapsulation', 'Abstraction', 'Polymorphism', 'Inheritance', 'Polymorphism', '2026-05-07'),
(428, 'OOPs', 'What will happen if a pure virtual function is not overridden in a derived class?', 'The program runs normally', 'The derived class also becomes abstract', 'The function becomes static', 'Runtime error occurs', 'The derived class also becomes abstract', '2026-05-07'),
(429, 'OOPs', 'Which of the following is true about friend functions?', 'They are member functions', 'They can access private members of a class', 'They cannot access protected members', 'They are inherited automatically', 'They can access private members of a class', '2026-05-07'),
(430, 'OOPs', 'Which mechanism is used to achieve abstraction in C++?', 'Virtual functions and abstract classes', 'Arrays', 'Pointers only', 'Constructors only', 'Virtual functions and abstract classes', '2026-05-07'),
(431, 'OOPs', 'Which of the following correctly describes a virtual function', 'A function that cannot be inherited', 'A function resolved at compile time', 'A function used for dynamic binding', 'A private member function', 'A function used for dynamic binding', '2026-05-07'),
(432, 'OOPs', 'Which programming paradigm focuses on objects and classes?', 'Functional Programming', 'Procedural Programming', 'Object-Oriented Programming', 'Logic Programming', 'Object-Oriented Programming', '2026-05-07'),
(433, 'OOPs', 'Which operator is used with cout?', '>>', '<<', '::', '==', '<<', '2026-05-07'),
(434, 'OOPs', 'Which keyword dynamically allocates memory in C++?', 'alloc', 'malloc', 'new', 'create', 'new', '2026-05-07'),
(435, 'OOPs', 'Which keyword is used to free dynamically allocated memory?', 'remove', 'free', 'delete', 'clear', 'delete', '2026-05-07'),
(436, 'OOPs', 'Which keyword is used to define a class?', 'object', 'define', 'structure', 'class', 'class', '2026-05-07'),
(437, 'OOPs', 'What is an object?', 'Blueprint of class', 'Operator', 'Function of class', 'Instance of class', 'Instance of class', '2026-05-07'),
(438, 'OOPs', 'Which access specifier provides maximum data hiding?', 'public', 'protected', 'private', 'global', 'private', '2026-05-07'),
(439, 'OOPs', 'Which function is automatically called when an object is created?', 'Destructor', 'Constructor', 'Friend Function', 'Static Function', 'Constructor', '2026-05-07'),
(440, 'OOPs', 'What is constructor overloading?', 'Multiple destructors', 'Multiple constructors with different parameters', 'Copying constructors', 'Inheritance of constructors', 'Multiple constructors with different parameters', '2026-05-07'),
(441, 'OOPs', 'Which memory area stores dynamically allocated objects?', 'Heap', 'Stack', 'Register', 'Cache', 'Heap', '2026-05-07'),
(442, 'OOPs', 'What is an abstract class?', 'Class without objects', 'Class with only constructors', 'Empty class', 'Class having at least one pure virtual function', 'Class having at least one pure virtual function', '2026-05-07'),
(443, 'OOPs', 'Which inheritance mode keeps public members public?', 'public inheritance', 'protected inheritance', 'private inheritance', 'friend inheritance', 'public inheritance', '2026-05-07'),
(444, 'OOPs', 'Which problem occurs in multiple inheritance?', 'Syntax Error', 'Dangling Pointer', 'Memory Leak', 'Diamond Problem', 'Diamond Problem', '2026-05-07'),
(445, 'OOPs', 'What is operator overloading?', 'Redefining operators for user-defined types', 'Loading operators dynamically', 'Overriding operators in inheritance', 'Using many operators together', 'Redefining operators for user-defined types', '2026-05-07'),
(446, 'OOPs', 'Aggregation represents:', 'IS-A relationship', 'ONLY-A relationship', 'NONE relationship', 'HAS-A relationship', 'HAS-A relationship', '2026-05-07'),
(447, 'OOPs', 'What is a template in C++?', 'Predefined class', 'Generic programming feature', 'Memory allocation technique', 'Destructor type', 'Generic programming feature', '2026-05-07'),
(448, 'OOPs', 'Which keyword is used for templates?', 'generic', 'class', 'template', 'typename', 'template', '2026-05-07'),
(449, 'OOPs', 'What is function overriding?', 'Same function name with different parameters', 'Using virtual functions only', 'Overloading constructors', 'Redefining base class function in derived class', 'Redefining base class function in derived class', '2026-05-07'),
(450, 'OOPs', 'Which header file is used for file handling in C++?', '<math.h>', '<string>', '<conio.h>', '<fstream>', '<fstream>', '2026-05-07'),
(451, 'OOPs', 'Which class is used to write into files?', 'ofstream', 'ifstream', 'fstreamin', 'ostream', 'ofstream', '2026-05-07'),
(452, 'OOPs', 'Which class is used to read from files?', 'ifstream', 'ofstream', 'ostream', 'istream', 'ifstream', '2026-05-07'),
(453, 'OOPs', 'Which keyword is used to handle exceptions', 'error', 'catch', 'throwable', 'final', 'catch', '2026-05-07'),
(454, 'OOPs', 'Which keyword is used to generate an exception?', 'catch', 'throw', 'try', 'exception', 'throw', '2026-05-07'),
(455, 'OOPs', 'Which block is used to monitor exceptions?', 'catch', 'monitor', 'try', 'throw', 'try', '2026-05-07'),
(456, 'OOPs', 'What is a namespace in C++?', 'Memory area', 'Exception handler', 'Operator type', 'Collection of classes and functions', 'Collection of classes and functions', '2026-05-07');

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
(15, 'Raj Kumar', '1122334455', 'raj@gmail.com', '$2y$10$oTdtcdnRfJSDyHn7oENc..pqsCXNwwzVcB3HD1oDqcFjWwRvtOVYi', 1, '2025-11-29 20:17:06'),
(17, 'Shubham Sharma', '9140309348', 'admin@oipl.com', '$2y$10$SmG/Nw4XoFLLlTpcK5kVKORfi0asLuLw1VCP8DUE8DWyobbrLRVgW', 1, '2025-12-09 16:12:28'),
(19, 'Pawan Kumar', '7777888899', 'pawan@gmail.com', '$2y$10$iMVll0znCD.KjoVWlugECeywCccz5jtPd/68IeK3tHnwd5fCdbFCS', 1, '2025-12-28 20:28:11'),
(22, 'Sunaina', '9898989898', 'sunaina@gmail.com', '$2y$10$msL.aaG93/ymxeLuAoH9GuwjqQiOSZsgEVZ/wGcLaKVS/WxS8UkAG', 1, '2026-04-05 23:08:59'),
(23, 'Anushka Singh', '8090551787', 'anushka@g-mail.com', '$2y$10$vd4qOWhHE.v8toFocC1s3.wZorC332nbuZs8sYXAqogLYbfjb1Jl2', 1, '2026-04-06 22:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `subject_table`
--

CREATE TABLE `subject_table` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject_table`
--

INSERT INTO `subject_table` (`subject_id`, `subject_name`) VALUES
(1, 'IT Tools'),
(2, 'Web Design'),
(3, 'IoT'),
(4, 'Python'),
(5, 'OOPs');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings_table`
--

CREATE TABLE `website_settings_table` (
  `setting_id` int(11) NOT NULL,
  `setting_key` varchar(100) NOT NULL,
  `setting_value` text NOT NULL,
  `data_type` enum('string','int','bool','json') DEFAULT 'string',
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_settings_table`
--

INSERT INTO `website_settings_table` (`setting_id`, `setting_key`, `setting_value`, `data_type`, `update_time`) VALUES
(1, 'exam_questions_limit', '10', 'int', '2026-05-05 07:35:28'),
(2, 'exam_subject_name', 'Web Design', 'string', '2026-05-05 11:24:04'),
(3, 'mocktest_questions_limit', '20', 'int', '2026-05-05 07:35:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiry_table`
--
ALTER TABLE `enquiry_table`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `exam_answers_table`
--
ALTER TABLE `exam_answers_table`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `exam_details_table`
--
ALTER TABLE `exam_details_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_reports_table`
--
ALTER TABLE `exam_reports_table`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `mocktest_performance_table`
--
ALTER TABLE `mocktest_performance_table`
  ADD PRIMARY KEY (`test_id`);

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
-- Indexes for table `subject_table`
--
ALTER TABLE `subject_table`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `website_settings_table`
--
ALTER TABLE `website_settings_table`
  ADD PRIMARY KEY (`setting_id`),
  ADD UNIQUE KEY `setting_key` (`setting_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiry_table`
--
ALTER TABLE `enquiry_table`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_answers_table`
--
ALTER TABLE `exam_answers_table`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `exam_details_table`
--
ALTER TABLE `exam_details_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `exam_reports_table`
--
ALTER TABLE `exam_reports_table`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mocktest_performance_table`
--
ALTER TABLE `mocktest_performance_table`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `questions_table`
--
ALTER TABLE `questions_table`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT for table `student_registration_table`
--
ALTER TABLE `student_registration_table`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subject_table`
--
ALTER TABLE `subject_table`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `website_settings_table`
--
ALTER TABLE `website_settings_table`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
