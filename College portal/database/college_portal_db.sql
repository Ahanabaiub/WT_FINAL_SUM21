-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 10:25 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college_portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(9) NOT NULL,
  `cid` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `cid`, `name`, `password`) VALUES
(1, 2000, 'Ahanab Shakil', '1234'),
(2, 2001, 'Ataur Rahman', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `department_id`, `year`) VALUES
(1, 'PHYSICS-1', 1, 1),
(2, 'PHYSICS-2', 1, 2),
(3, 'CHEMISTRY-1', 1, 1),
(4, 'CHEMISTRY-2', 1, 2),
(5, 'MATH-1', 1, 1),
(6, 'MATH-2', 1, 2),
(7, 'FINANCE-1', 2, 1),
(8, 'FINANCE-2', 2, 2),
(9, 'BIOLOGY-1', 1, 1),
(10, 'BIOLOGY-2', 1, 2),
(11, 'BANGLA-1', 1, 1),
(12, 'BANGLA-2', 1, 2),
(13, 'ENGLISH-1', 1, 1),
(14, 'ENGLISH-2', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(9) NOT NULL,
  `d_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `d_name`) VALUES
(1, 'Science'),
(2, 'Commerce'),
(3, 'Arts');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(9) NOT NULL,
  `name` varchar(20) NOT NULL,
  `course_id` int(5) NOT NULL,
  `capacity` int(5) NOT NULL,
  `teacher_id` int(5) NOT NULL,
  `year` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `course_id`, `capacity`, `teacher_id`, `year`) VALUES
(1, 'A', 1, 50, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(9) NOT NULL,
  `cid` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(9) NOT NULL,
  `address` varchar(80) NOT NULL,
  `dob` varchar(12) NOT NULL,
  `year` int(3) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `cid`, `name`, `department_id`, `address`, `dob`, `year`, `blood`, `password`, `created`) VALUES
(2, 1000, 'Shakil Siam', 1, 'Sector 06, Uttara, Dhaka', '25/11/2000', 1, 'A+', '1234', '2021-07-20 07:48:01'),
(6, 1001, 'Rifat', 1, 'Bashundhara, Dhaka', '10/12/2000', 1, 'B+', '1234', '2021-07-20 13:03:28'),
(7, 1002, 'Tonni', 1, 'Bashundhara, Dhaka', '09/06/1999', 1, 'O+', '1234', '2021-07-20 13:04:31'),
(8, 1003, 'Fahim', 3, 'Mohammadpur, Dhaka', '07/04/1996', 2, 'AB+', '1234', '2021-07-20 13:34:07'),
(9, 1004, 'Al Hossen', 2, 'Nikunja 02, Dhaka', '10/11/1997', 2, 'O+', '1234', '2021-07-22 08:40:21'),
(10, 1005, 'Saiful Islam', 1, 'Faidabad, Dhaka', '10/04/1998', 1, 'AB+', '1234', '2021-07-23 19:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(9) NOT NULL,
  `cid` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `cid`, `name`, `department_id`, `password`, `address`, `created`) VALUES
(1, 3000, 'Tanvir Ahmed', 1, '1234', 'Bashundhara, Dhaka.', '2021-07-22 08:59:15'),
(2, 3001, 'Raihan Ahmed', 1, '1234', 'Rampura, Dhaka', '2021-07-22 09:00:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courses_dept` (`department_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sections_teachers` (`teacher_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student` (`department_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_students_dept` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_courses_dept` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `fk_sections_teachers` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_student` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_students_dept` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
