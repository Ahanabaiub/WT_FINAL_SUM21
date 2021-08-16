-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2021 at 04:11 PM
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
-- Table structure for table `college_user`
--

CREATE TABLE `college_user` (
  `id` int(9) NOT NULL,
  `c_id` int(9) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college_user`
--

INSERT INTO `college_user` (`id`, `c_id`, `name`, `pass`) VALUES
(1, 4000, 'Rifat Ashraf', 1234);

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
(16, 'ACCOUNTING-1', 2, 1),
(17, 'ENGLISH-2', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher`
--

CREATE TABLE `course_teacher` (
  `id` int(9) NOT NULL,
  `section_id` int(9) NOT NULL,
  `course_id` int(9) NOT NULL,
  `teacher_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_teacher`
--

INSERT INTO `course_teacher` (`id`, `section_id`, `course_id`, `teacher_id`) VALUES
(1, 1, 1, 1),
(8, 1, 5, 4),
(9, 1, 9, 2),
(11, 2, 3, 7);

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
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(9) NOT NULL,
  `section_id` int(9) NOT NULL,
  `course_id` int(9) NOT NULL,
  `file_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `section_id`, `course_id`, `file_name`) VALUES
(19, 1, 1, 'W10_Lec10_JS_Theory.pdf'),
(21, 2, 2, 'MAES_LAB_01.pdf'),
(22, 1, 1, 'Lecture_02_WT_Lab.pdf'),
(23, 1, 1, 'W10_Lec11_JS_Lab.pdf'),
(24, 1, 5, 'Reference_paper.pdf'),
(25, 1, 5, 'Research_Proposal_Sample.pdf'),
(26, 1, 5, 'DataMining_Assignment.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(9) NOT NULL,
  `section_id` int(9) NOT NULL,
  `course_id` int(9) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `teacher_id` int(9) NOT NULL,
  `given_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `section_id`, `course_id`, `message`, `teacher_id`, `given_time`) VALUES
(3, 1, 1, 'class cancelled', 1, '2021-08-16 10:08:12'),
(4, 1, 1, 'Every one Bring Book tomorrow', 1, '2021-08-16 10:10:46'),
(5, 1, 1, 'Bring Book tomorrow', 1, '2021-08-16 11:46:59'),
(6, 1, 1, 'Dummy Notice', 1, '2021-08-16 14:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(9) NOT NULL,
  `department_id` int(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` int(20) NOT NULL,
  `session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `department_id`, `name`, `year`, `session`) VALUES
(1, 1, 'A', 1, '2021-2022'),
(2, 1, 'B', 1, '2021-2022'),
(3, 1, 'C', 1, '2021-2022'),
(9, 2, 'A', 1, '2021-2022'),
(10, 2, 'B', 1, '2021-2022'),
(16, 2, 'C', 1, '2021-2022'),
(23, 3, ' A', 1, ' 2021-2022');

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
  `section_id` int(9) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `cid`, `name`, `department_id`, `address`, `dob`, `year`, `blood`, `password`, `section_id`, `created`) VALUES
(2, 1000, 'Shakil Siam', 1, 'Sector 06, Uttara, Dhaka', '25/11/2000', 1, 'A+', '1234', 1, '2021-07-20 07:48:01'),
(6, 1001, 'Rifat', 1, 'Bashundhara, Dhaka', '10/12/2000', 1, 'B+', '1234', 1, '2021-07-20 13:03:28'),
(7, 1002, 'Tonni', 1, 'Bashundhara, Dhaka', '09/06/1999', 1, 'O+', '1234', 1, '2021-07-20 13:04:31'),
(8, 1003, 'Fahim', 3, 'Mohammadpur, Dhaka', '07/04/1996', 2, 'AB+', '1234', NULL, '2021-07-20 13:34:07'),
(9, 1004, 'Al Hossen', 2, 'Nikunja 02, Dhaka', '10/11/1997', 2, 'O+', '1234', NULL, '2021-07-22 08:40:21'),
(10, 1005, 'Saiful Islam', 1, 'Faidabad, Dhaka', '10/04/1998', 1, 'AB+', '1234', 1, '2021-07-23 19:47:07'),
(11, 1006, 'Rakib khan', 1, 'Faidabad, Dhaka', '10/10/2000', 1, 'AB+', '1234', 1, '2021-07-31 08:11:14'),
(12, 1007, 'Nazmul Ahmed', 1, 'Faidabad, Dhaka', '10/11/1997', 1, 'O+', '1234', NULL, '2021-08-07 19:24:06'),
(13, 1008, 'Rafiu Tahmid', 1, 'Joshimuddi, Dhaka', '10/05/1999', 1, 'O+', '1234', NULL, '2021-08-15 17:39:43'),
(14, 1010, 'Araf Hossain', 1, 'Uttara, sector 05, Dhaka', '05/04/1998', 1, 'A+', '1234', NULL, '2021-08-15 17:41:02');

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
(2, 3001, 'Raihan Ahmed', 1, '1234', 'Rampura, Dhaka', '2021-07-22 09:00:59'),
(4, 3002, 'Shafiqul Islam', 1, '1234', 'Motijhil, Dhaka', '2021-07-26 17:06:58'),
(5, 3003, 'Imtiaz Haque', 2, '1234', 'Bonani, Dhaka', '2021-07-26 17:11:15'),
(6, 3004, 'Mustafiz Ali', 1, '1234', 'Kalitola, Dhaka', '2021-08-07 11:53:17'),
(7, 3005, 'Fahad Ahmed', 1, '1234', 'Faidabad, Dhaka', '2021-08-07 17:41:44'),
(8, 3006, 'Faisal Choudhury', 1, '1234', 'Bonani, Dhaka', '2021-08-07 19:31:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college_user`
--
ALTER TABLE `college_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_courses_dept` (`department_id`);

--
-- Indexes for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_course_teacher_section` (`section_id`),
  ADD KEY `fk_course_teacher_course` (`course_id`),
  ADD KEY `fk_course_teacher_teacher` (`teacher_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sectionId_note` (`section_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notifi_secId` (`section_id`),
  ADD KEY `fk_notifi_courseId` (`course_id`),
  ADD KEY `fk_notifi_teacherId` (`teacher_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_section_dept` (`department_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_student` (`department_id`),
  ADD KEY `fk_student_sectionId` (`section_id`);

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
-- AUTO_INCREMENT for table `college_user`
--
ALTER TABLE `college_user`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course_teacher`
--
ALTER TABLE `course_teacher`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_courses_dept` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD CONSTRAINT `fk_course_teacher_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `fk_course_teacher_section` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `fk_course_teacher_teacher` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `fk_sectionId_note` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `fk_notifi_courseId` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `fk_notifi_secId` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `fk_notifi_teacherId` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `fk_section_dept` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_student_sectionId` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `fk_students_dept` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
