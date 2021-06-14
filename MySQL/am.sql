-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 02:26 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `am`
--

-- --------------------------------------------------------

--
-- Table structure for table `se_comps_student`
--

CREATE TABLE `se_comps_student` (
  `email` varchar(255) NOT NULL,
  `roll_no` int(3) NOT NULL,
  `em4` int(3) NOT NULL DEFAULT 0,
  `dbms` int(3) NOT NULL DEFAULT 0,
  `mp` int(3) NOT NULL DEFAULT 0,
  `os` int(3) NOT NULL DEFAULT 0,
  `aoa` int(11) NOT NULL DEFAULT 0,
  `sbl` int(11) NOT NULL DEFAULT 0,
  `pin` int(4) NOT NULL DEFAULT 0,
  `temp_ip` varchar(100) NOT NULL DEFAULT '0',
  `temp_date` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `se_comps_student`
--

INSERT INTO `se_comps_student` (`email`, `roll_no`, `em4`, `dbms`, `mp`, `os`, `aoa`, `sbl`, `pin`, `temp_ip`, `temp_date`) VALUES
('student1@gmail.com', 1, 8, 9, 8, 7, 5, 8, 0, '', ''),
('student2@gmail.com', 2, 7, 9, 9, 7, 8, 9, 0, '', ''),
('student3@gmail.com', 3, 7, 6, 5, 4, 5, 5, 0, '', ''),
('student4@gmail.com', 4, 6, 7, 6, 8, 8, 7, 0, '', ''),
('student5@gmail.com', 5, 8, 9, 8, 7, 7, 7, 0, '', ''),
('student6@gmail.com', 6, 8, 9, 8, 8, 6, 9, 0, '', ''),
('student7@gmail.com', 7, 5, 4, 5, 6, 3, 5, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `se_comps_teacher`
--

CREATE TABLE `se_comps_teacher` (
  `email` varchar(255) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `t_lec` int(11) NOT NULL DEFAULT 0,
  `id` int(11) NOT NULL,
  `pin` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `se_comps_teacher`
--

INSERT INTO `se_comps_teacher` (`email`, `subject`, `t_lec`, `id`, `pin`) VALUES
('teacher1@gmail.com', 'em4', 11, 1, 0),
('teacher2@gmail.com', 'dbms', 10, 2, 0),
('teacher3@gmail.com', 'mp', 10, 3, 0),
('teacher4@gmail.com', 'os', 10, 4, 0),
('teacher5@gmail.com', 'aoa', 10, 5, 0),
('teacher6@gmail.com', 'sbl', 10, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL,
  `stream` varchar(10) NOT NULL,
  `roll_no` int(4) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'student',
  `mod_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `username`, `pass`, `year`, `stream`, `roll_no`, `role`, `mod_date`) VALUES
('student1@gmail.com', 'student1', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', 'se', 'comps', 1, 'student', '2021-03-06 06:38:47'),
('student2@gmail.com', 'student2', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', 'se', 'comps', 2, 'student', '2021-03-06 06:38:47'),
('student3@gmail.com', 'student3', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', 'se', 'comps', 3, 'student', '2021-03-06 06:38:47'),
('student4@gmail.com', 'student4', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', 'se', 'comps', 4, 'student', '2021-03-06 06:38:47'),
('student5@gmail.com', 'student5', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', 'se', 'comps', 5, 'student', '2021-03-06 06:38:47'),
('student6@gmail.com', 'student6', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', 'se', 'comps', 6, 'student', '2021-03-06 06:39:21'),
('student7@gmail.com', 'student7', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', 'se', 'comps', 7, 'student', '2021-03-06 06:38:47'),
('teacher1@gmail.com', 'teacher1', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', '', '', 0, 'teacher', '2021-03-10 05:06:05'),
('teacher2@gmail.com', 'teacher2', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', '', '', 0, 'teacher', '2021-03-10 05:06:05'),
('teacher3@gmail.com', 'teacher3', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', '', '', 0, 'teacher', '2021-03-10 05:06:05'),
('teacher4@gmail.com', 'teacher4', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', '', '', 0, 'teacher', '2021-03-10 05:06:05'),
('teacher5@gmail.com', 'teacher5', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', '', '', 0, 'teacher', '2021-03-10 05:06:05'),
('teacher6@gmail.com', 'teacher6', '$2y$10$UEHx7J/NTDi2ICAavxBLV.FeCwaUIayBE/f.1swAzTw7bmQ9LMKpu', '', '', 0, 'teacher', '2021-03-10 05:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `valid_email`
--

CREATE TABLE `valid_email` (
  `email` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'not_registered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `valid_email`
--

INSERT INTO `valid_email` (`email`, `status`) VALUES
('student1@gmail.com', 'registered'),
('student2@gmail.com', 'registered'),
('student3@gmail.com', 'registered'),
('student4@gmail.com', 'registered'),
('student5@gmail.com', 'registered'),
('student6@gmail.com', 'registered'),
('student7@gmail.com', 'registered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `se_comps_student`
--
ALTER TABLE `se_comps_student`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `se_comps_teacher`
--
ALTER TABLE `se_comps_teacher`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `valid_email`
--
ALTER TABLE `valid_email`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
