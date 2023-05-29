-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2023 at 07:48 AM
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
-- Database: `StudentIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(9) NOT NULL,
  `fullName` varchar(80) NOT NULL,
  `picture` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `CPR` varchar(9) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `officeNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `fullName`, `picture`, `email`, `password`, `CPR`, `gender`, `phoneNumber`, `officeNumber`) VALUES
(1, 'Ahmed Yusuf Ahmed', '', 'aadmin@uob.edu.bh', '$2y$10$uAQY6kbYmrPypkY/q8csbunRbvy662R.Eoy0h4OmjcSOWVRrEML0e', '021111111', 'male', 36111111, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `classroomID` int(9) NOT NULL,
  `collegeID` int(11) NOT NULL,
  `room` varchar(10) NOT NULL,
  `capacity` int(3) NOT NULL,
  `type` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`classroomID`, `collegeID`, `room`, `capacity`, `type`) VALUES
(1, 1, 'S40-2046', 40, 'Study classroom'),
(2, 1, 'S40-2050', 45, 'Study classroom'),
(5, 1, 'S40-2047', 35, 'Study classroom'),
(11, 1, 'S40-2049', 50, 'Study classroom'),
(12, 1, 'S40-2048', 50, 'Study classroom'),
(13, 1, 'S40-2045', 45, 'Study classroom');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `collegeID` int(11) NOT NULL,
  `collegeName` varchar(255) NOT NULL,
  `collegeNumber` varchar(4) NOT NULL,
  `place` enum('Sakheer','Isa Town','Manama') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`collegeID`, `collegeName`, `collegeNumber`, `place`) VALUES
(1, 'College of Information Technology', 'S40', 'Sakheer');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` varchar(9) NOT NULL,
  `collegeID` int(11) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `courseDescription` varchar(255) NOT NULL,
  `credits` int(3) NOT NULL,
  `pre-requisite` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `collegeID`, `courseName`, `courseDescription`, `credits`, `pre-requisite`) VALUES
('ITCE314', 1, 'Computer Networks I', 'Computer Networks I', 3, 'ITCS114'),
('ITCS113', 1, 'Computer Programming I', 'Computer Programming I', 3, '--'),
('ITCS114', 1, 'Computer Programming II', 'Computer Programming II', 3, 'ITCS113'),
('ITCS214', 1, 'Data Structures', 'Data Structures', 3, 'ITCS214'),
('ITCS254', 1, 'Discrete Structures I', 'Discrete Structures I', 3, 'ITCS113'),
('ITCS255', 1, 'Discrete Mathematics II', 'Discrete Mathematics II', 3, 'ITCS254'),
('ITCS285', 1, 'Database Management Systems', 'Database Management Systems', 3, 'ITCS214'),
('ITCS316', 1, 'Human-Computer Interaction', 'Human-Computer Interaction', 3, 'ITCS214'),
('ITCS317', 1, 'Formal Languages and Automata', 'Formal Languages and Automata', 3, 'ITCS214'),
('ITCS321', 1, 'Computer Organization and Assembly Language', 'Computer Organization and Assembly Language', 3, 'ITCS114'),
('ITCS333', 1, 'Internet Software Development', 'Internet Software Development', 3, 'ITCS285'),
('ITCS347', 1, 'Algorithms Design and Analysis', 'Algorithms Design and Analysis', 3, 'ITCS255'),
('ITCS389', 1, 'Software Engineering I', 'Software Engineering I', 3, 'ITCS285'),
('ITCS489', 1, 'Software Engineering II', 'Software Engineering II', 3, 'ITCS389');

-- --------------------------------------------------------

--
-- Table structure for table `courseAttendance`
--

CREATE TABLE `courseAttendance` (
  `attendanceID` int(11) NOT NULL,
  `studentID` int(9) NOT NULL,
  `courseID` varchar(9) NOT NULL,
  `instructorID` int(9) NOT NULL,
  `section` int(11) NOT NULL,
  `date` date NOT NULL,
  `lecturesDay` varchar(5) NOT NULL,
  `status` enum('present','absent','absent with excuse') NOT NULL,
  `year` year(4) NOT NULL,
  `semester` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courseAttendance`
--

INSERT INTO `courseAttendance` (`attendanceID`, `studentID`, `courseID`, `instructorID`, `section`, `date`, `lecturesDay`, `status`, `year`, `semester`) VALUES
(1, 202003838, 'ITCS285', 2, 1, '2023-05-16', 'UTH', 'present', '2023', '1'),
(2, 202003838, 'ITCS255', 1, 2, '2023-05-15', 'MW', 'absent with excuse', '2023', '1'),
(3, 202003838, 'ITCS285', 2, 1, '2023-05-14', 'UTH', 'absent', '2023', '1');

-- --------------------------------------------------------

--
-- Table structure for table `courseTiming`
--

CREATE TABLE `courseTiming` (
  `courseID` varchar(9) NOT NULL,
  `instructorID` int(9) NOT NULL,
  `section` int(2) NOT NULL,
  `classroomID` int(9) NOT NULL,
  `lecturesDay` varchar(5) NOT NULL,
  `lecturesTime` varchar(11) NOT NULL,
  `year` year(4) NOT NULL,
  `semester` enum('1','2','3') NOT NULL,
  `examDate` varchar(10) NOT NULL,
  `examTime` varchar(11) NOT NULL,
  `examPlace` varchar(8) NOT NULL DEFAULT 'TBA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courseTiming`
--

INSERT INTO `courseTiming` (`courseID`, `instructorID`, `section`, `classroomID`, `lecturesDay`, `lecturesTime`, `year`, `semester`, `examDate`, `examTime`, `examPlace`) VALUES
('ITCS316', 7, 1, 1, 'UTH', '9:00-9:50', '2023', '2', '2023-06-08', '11:30-13:30', 'TBA'),
('ITCS317', 6, 1, 11, 'UTH', '11:00-11:50', '2023', '2', '2023-06-13', '14:30-16:30', 'TBA'),
('ITCS321', 4, 1, 5, 'UTH', '10:00-10:50', '2023', '2', '2023-06-04', '11:30-13:30', 'TBA'),
('ITCS333', 5, 1, 2, 'MW', '11:00-12:15', '2023', '2', '2023-06-12', '14:30-16:30', 'TBA'),
('ITCS347', 3, 1, 2, 'MW', '9:30-10:45', '2023', '2', '2023-06-05', '8:30-10:30', 'TBA'),
('ITCS389', 2, 1, 1, 'UTH', '11:00-11:50', '2023', '2', '2023-06-07', '13:30-15:30', 'TBA'),
('ITCS389', 2, 2, 1, 'UTH', '12:00-12:50', '2023', '2', '2023-06-07', '13:30-15:30', 'TBA');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `studentID` int(9) NOT NULL,
  `courseID` varchar(9) NOT NULL,
  `instructorID` int(9) NOT NULL,
  `grade` enum('A','A-','B+','B','B-','C+','C','C-','D+','D','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `majorID` int(11) NOT NULL,
  `majorName` varchar(255) NOT NULL,
  `collegeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`majorID`, `majorName`, `collegeID`) VALUES
(1, 'B.Sc. in Computer Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(9) NOT NULL,
  `fullName` varchar(80) NOT NULL,
  `picture` text DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `CPR` varchar(9) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `collegeID` int(11) NOT NULL,
  `officeNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `fullName`, `picture`, `email`, `password`, `CPR`, `gender`, `phoneNumber`, `jobTitle`, `collegeID`, `officeNumber`) VALUES
(1, 'Dr. Ali Hassan AlSaffar', NULL, 'aalsaffar@uob.edu.bh', '$2y$10$ZNGd4FmE.fsWb/28QPyGuuKbZFANRYGt9F3X2ohvGZpZ8YR0DevkC', '011111111', 'male', 34111111, 'Proffesor', 1, 'S40-2060'),
(2, 'Dr. Taher Saleh Khaid Homeed', NULL, 'tskhomeed@uob.edu.bh', '$2y$10$Y298qHpLTgH/YdxBiqhQ5uJxElJFPouJHOjCoPFRx1UHUBKynuNfq', '021222222', 'male', 34222222, 'Professor', 1, 'S40-2061'),
(3, 'Dr. Youssef Bin Mohammed Harrath', NULL, 'ybmharrath@uob.edu.bh', '$2y$10$VnyrhB47lPLAqiUEwn7xrOrAZgsonM5kS.c931U3SY8WnCux3x9yW', '030333333', 'male', 35111111, 'Proffesor', 1, NULL),
(4, 'Dr. ABDULFATTAH MAHMOOD SALMAN', NULL, 'amsalman@uob.edu.bh', '$2y$10$E4L8tXyGqMolpCE2Voy9yuyBr0Qnio9HCW6JKvNQAmYk3PhckezA2', '031111122', 'male', 38111111, 'Proffesor', 1, NULL),
(5, 'Dr. Faisal Abdulhameed Alqaed', NULL, 'faalqaed@uob.edu.bh', '$2y$10$CbYzuMgFL7gkhRspCh9Qw.AHua3wIv2YSlvgly.B8bE5WWZ6STdZK', '031111113', 'male', 38111112, 'Proffesor', 1, NULL),
(6, 'Dr. Hesham Mohammed Alammal', NULL, 'hmalammal@uob.edu.bh', '$2y$10$deenWEulbz9YNJY4/nXqw.wiw4AGTxeu1CnM2LjicMPHZ2WVhbH9K', '010512555', 'male', 38111116, 'Proffesor', 1, NULL),
(7, 'Dr. Hadeel Shawket Alobaidy', NULL, 'hsalobaidy@uob.edu.bh', '$2y$10$VOOHFUY7zSDndct.cpBeDOz7mUA2sWAMCUBuexkJ8EwiHE/o9soUi', '990212345', 'female', 36777712, 'Proffesor', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `studentClassroom`
--

CREATE TABLE `studentClassroom` (
  `studentClassroomID` int(11) NOT NULL,
  `studentID` int(9) NOT NULL,
  `section` int(2) NOT NULL,
  `courseID` varchar(9) NOT NULL,
  `instructorID` int(9) NOT NULL,
  `classroomID` int(9) NOT NULL,
  `year` year(4) NOT NULL,
  `semester` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentClassroom`
--

INSERT INTO `studentClassroom` (`studentClassroomID`, `studentID`, `section`, `courseID`, `instructorID`, `classroomID`, `year`, `semester`) VALUES
(3, 202003838, 1, 'ITCS113', 1, 1, '2021', '1'),
(1, 202003838, 1, 'ITCS254', 1, 1, '2022', '1'),
(6, 202003838, 1, 'ITCS285', 1, 2, '2023', '1'),
(14, 202003838, 1, 'ITCS321', 4, 5, '2023', '2'),
(13, 202003838, 1, 'ITCS347', 3, 2, '2023', '2'),
(16, 202003838, 1, 'ITCS389', 2, 1, '2023', '2'),
(7, 202003838, 2, 'ITCS255', 1, 1, '2023', '1'),
(4, 202003838, 3, 'ITCS114', 2, 2, '2021', '2'),
(2, 202003838, 3, 'ITCS214', 1, 2, '2022', '1');

-- --------------------------------------------------------

--
-- Table structure for table `studentInfo`
--

CREATE TABLE `studentInfo` (
  `studentID` int(9) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `picture` text DEFAULT NULL,
  `CPR` varchar(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `collegeID` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `majorID` int(11) NOT NULL,
  `CGPA` decimal(3,2) NOT NULL,
  `MCGPA` decimal(3,2) NOT NULL,
  `passedCH` int(3) NOT NULL,
  `academicStatus` varchar(20) NOT NULL,
  `enrollmentStatus` varchar(20) NOT NULL,
  `advisorID` int(9) NOT NULL,
  `yearOfJoin` varchar(15) NOT NULL,
  `flat` varchar(4) DEFAULT NULL,
  `building` varchar(4) DEFAULT NULL,
  `road` varchar(4) DEFAULT NULL,
  `block` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentInfo`
--

INSERT INTO `studentInfo` (`studentID`, `fullName`, `picture`, `CPR`, `email`, `password`, `phoneNumber`, `collegeID`, `gender`, `majorID`, `CGPA`, `MCGPA`, `passedCH`, `academicStatus`, `enrollmentStatus`, `advisorID`, `yearOfJoin`, `flat`, `building`, `road`, `block`) VALUES
(202003838, 'Ahmed Yusuf Ahmed Saleh', NULL, '021201111', '202003838@stu.uob.edu.bh', '$2y$10$nx6dgnkuZ6n9u4.tW7tBkOHDKQLoVj4rf8McFue6mJMXncnvUR04C', 36728829, 1, 'male', 1, 4.00, 4.00, 75, 'Excellence', 'Enrolled', 1, '2020', '', '2013', '587', '605');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `CPR` (`CPR`);

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`classroomID`),
  ADD KEY `collegeID` (`collegeID`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`collegeID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `collegeID` (`collegeID`);

--
-- Indexes for table `courseAttendance`
--
ALTER TABLE `courseAttendance`
  ADD PRIMARY KEY (`attendanceID`),
  ADD UNIQUE KEY `attendanceID` (`attendanceID`,`studentID`,`courseID`,`instructorID`,`section`,`date`,`lecturesDay`,`status`,`year`,`semester`),
  ADD KEY `courseattendance_ibfk_2` (`courseID`),
  ADD KEY `instructorID` (`instructorID`),
  ADD KEY `section` (`section`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `courseTiming`
--
ALTER TABLE `courseTiming`
  ADD UNIQUE KEY `courseID` (`courseID`,`instructorID`,`section`,`classroomID`,`lecturesDay`,`lecturesTime`,`year`,`semester`,`examDate`,`examTime`,`examPlace`),
  ADD KEY `coursetiming_ibfk_1` (`classroomID`),
  ADD KEY `instructorID` (`instructorID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD KEY `grade_ibfk_1` (`studentID`),
  ADD KEY `grade_ibfk_2` (`courseID`),
  ADD KEY `instructorID` (`instructorID`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`majorID`),
  ADD KEY `collegeID` (`collegeID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `CPR` (`CPR`),
  ADD KEY `collegeID` (`collegeID`);

--
-- Indexes for table `studentClassroom`
--
ALTER TABLE `studentClassroom`
  ADD PRIMARY KEY (`studentClassroomID`),
  ADD UNIQUE KEY `studentID` (`studentID`,`section`,`courseID`,`instructorID`,`classroomID`,`year`,`semester`,`studentClassroomID`) USING BTREE,
  ADD KEY `studentclassroom_ibfk_2` (`classroomID`),
  ADD KEY `studentclassroom_ibfk_3` (`courseID`),
  ADD KEY `studentclassroom_ibfk_4` (`instructorID`);

--
-- Indexes for table `studentInfo`
--
ALTER TABLE `studentInfo`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `CPR` (`CPR`),
  ADD KEY `advisorID` (`advisorID`),
  ADD KEY `collegeID` (`collegeID`),
  ADD KEY `majorID` (`majorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `classroomID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `collegeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courseAttendance`
--
ALTER TABLE `courseAttendance`
  MODIFY `attendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `majorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studentClassroom`
--
ALTER TABLE `studentClassroom`
  MODIFY `studentClassroomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `classroom_ibfk_1` FOREIGN KEY (`collegeID`) REFERENCES `college` (`collegeID`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`collegeID`) REFERENCES `college` (`collegeID`);

--
-- Constraints for table `courseAttendance`
--
ALTER TABLE `courseAttendance`
  ADD CONSTRAINT `courseattendance_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `courseattendance_ibfk_3` FOREIGN KEY (`instructorID`) REFERENCES `staff` (`staffID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `courseattendance_ibfk_4` FOREIGN KEY (`section`) REFERENCES `studentClassroom` (`studentClassroomID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `courseattendance_ibfk_5` FOREIGN KEY (`studentID`) REFERENCES `studentInfo` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `courseTiming`
--
ALTER TABLE `courseTiming`
  ADD CONSTRAINT `coursetiming_ibfk_2` FOREIGN KEY (`instructorID`) REFERENCES `staff` (`staffID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `coursetiming_ibfk_3` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `coursetiming_ibfk_4` FOREIGN KEY (`classroomID`) REFERENCES `classroom` (`classroomID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `studentClassroom` (`studentID`),
  ADD CONSTRAINT `grade_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `studentClassroom` (`courseID`),
  ADD CONSTRAINT `grade_ibfk_3` FOREIGN KEY (`instructorID`) REFERENCES `studentClassroom` (`instructorID`);

--
-- Constraints for table `major`
--
ALTER TABLE `major`
  ADD CONSTRAINT `major_ibfk_1` FOREIGN KEY (`collegeID`) REFERENCES `college` (`collegeID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`collegeID`) REFERENCES `college` (`collegeID`);

--
-- Constraints for table `studentClassroom`
--
ALTER TABLE `studentClassroom`
  ADD CONSTRAINT `studentclassroom_ibfk_3` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `studentclassroom_ibfk_4` FOREIGN KEY (`instructorID`) REFERENCES `staff` (`staffID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `studentclassroom_ibfk_5` FOREIGN KEY (`studentID`) REFERENCES `studentInfo` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `studentclassroom_ibfk_6` FOREIGN KEY (`classroomID`) REFERENCES `classroom` (`classroomID`);

--
-- Constraints for table `studentInfo`
--
ALTER TABLE `studentInfo`
  ADD CONSTRAINT `studentinfo_ibfk_3` FOREIGN KEY (`advisorID`) REFERENCES `staff` (`staffID`),
  ADD CONSTRAINT `studentinfo_ibfk_4` FOREIGN KEY (`collegeID`) REFERENCES `college` (`collegeID`),
  ADD CONSTRAINT `studentinfo_ibfk_5` FOREIGN KEY (`majorID`) REFERENCES `major` (`majorID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
