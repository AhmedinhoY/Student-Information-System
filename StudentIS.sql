-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2023 at 05:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressID` int(9) NOT NULL,
  `country` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `houseNumber` int(5) NOT NULL,
  `road` int(5) NOT NULL,
  `block` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressID`, `country`, `city`, `houseNumber`, `road`, `block`) VALUES
(1, 'Bahrain', 'Sitra', 1111, 111, 111);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `fullName`, `picture`, `email`, `password`, `CPR`, `gender`, `phoneNumber`, `officeNumber`) VALUES
(1, 'Ahmed Yusuf Ahmed', '', 'ayousifadmin@uob.edu.bh', 'Ahmedahmed1', '021111111', 'male', 36111111, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `classroomID` int(9) NOT NULL,
  `campus` enum('Sakheer','Isa Town','Manama') NOT NULL,
  `section` varchar(10) NOT NULL,
  `capacity` int(3) NOT NULL,
  `type` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`classroomID`, `campus`, `section`, `capacity`, `type`) VALUES
(1, 'Sakheer', 'S40-2046', 40, 'Study classroom'),
(2, 'Sakheer', 'S40-2050', 45, 'Study classroom');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` varchar(9) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `courseDescription` varchar(255) NOT NULL,
  `credits` int(3) NOT NULL,
  `pre-requisite` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `courseDescription`, `credits`, `pre-requisite`) VALUES
('ITCS255', 'Discrete Mathematics II', 'Discrete Mathematics II', 3, 'ITCS254'),
('ITCS489', 'Software Engineering II', 'Software Engineering II', 3, 'ITCS389');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseAttendance`
--

INSERT INTO `courseAttendance` (`attendanceID`, `studentID`, `courseID`, `instructorID`, `section`, `date`, `lecturesDay`, `status`, `year`, `semester`) VALUES
(1, 202003838, 'ITCS489', 2, 1, '2023-05-16', 'UTH', 'present', 2023, '2'),
(2, 202003838, 'ITCS255', 1, 2, '2023-05-15', 'MW', 'absent with excuse', 2023, '2'),
(3, 202003838, 'ITCS489', 2, 1, '2023-05-14', 'UTH', 'absent', 2023, '2');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseTiming`
--

INSERT INTO `courseTiming` (`courseID`, `instructorID`, `section`, `classroomID`, `lecturesDay`, `lecturesTime`, `year`, `semester`, `examDate`, `examTime`, `examPlace`) VALUES
('ITCS255', 1, 3, 2, 'MW', '9:30-10:45', 2023, '2', '2023-06-05', '8:30-10:30', 'TBA'),
('ITCS489', 2, 1, 1, 'UTH', '11:00-11:50', 2023, '2', '2023-06-07', '13:30-15:30', 'TBA'),
('ITCS489', 2, 2, 1, 'UTH', '12:00-12:50', 2023, '2', '2023-06-07', '13:30-15:30', 'TBA');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `studentID` int(9) NOT NULL,
  `courseID` varchar(9) NOT NULL,
  `instructorID` int(9) NOT NULL,
  `grade` enum('A','A-','B+','B','B-','C+','C','C-','D+','D','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(9) NOT NULL,
  `fullName` varchar(80) NOT NULL,
  `picture` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `CPR` varchar(9) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `officeNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `fullName`, `picture`, `email`, `password`, `CPR`, `gender`, `phoneNumber`, `jobTitle`, `officeNumber`) VALUES
(1, 'DR. Ali Hassan AlSaffar', '', 'aalsaffar@uob.edu.bh', 'Aalsaffar1', '011111111', 'male', 34111111, 'Assistant Proffesor', 'S40-2060'),
(2, 'Dr. Taher Saleh Khaid Homeed', '', 'tskhomeed@uob.edu.bh', 'Tskhomeed1', '022222222', 'male', 34222222, 'Assistant Professor', 'S40-2061');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentClassroom`
--

INSERT INTO `studentClassroom` (`studentClassroomID`, `studentID`, `section`, `courseID`, `instructorID`, `classroomID`, `year`, `semester`) VALUES
(1, 202003838, 1, 'ITCS489', 2, 1, 2023, '2'),
(2, 202003838, 3, 'ITCS255', 1, 2, 2023, '2');

-- --------------------------------------------------------

--
-- Table structure for table `studentInfo`
--

CREATE TABLE `studentInfo` (
  `studentID` int(9) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `picture` text NOT NULL,
  `CPR` varchar(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `addressID` int(9) DEFAULT NULL,
  `college` varchar(255) NOT NULL,
  `major` varchar(255) NOT NULL,
  `minor` varchar(255) DEFAULT NULL,
  `CGPA` decimal(3,2) NOT NULL,
  `MCGPA` decimal(3,2) NOT NULL,
  `passedCH` int(3) NOT NULL,
  `academicStatus` varchar(20) NOT NULL,
  `enrollmentStatus` varchar(20) NOT NULL,
  `advisorID` int(9) NOT NULL,
  `yearOfJoin` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentInfo`
--

INSERT INTO `studentInfo` (`studentID`, `fullName`, `picture`, `CPR`, `email`, `password`, `phoneNumber`, `gender`, `addressID`, `college`, `major`, `minor`, `CGPA`, `MCGPA`, `passedCH`, `academicStatus`, `enrollmentStatus`, `advisorID`, `yearOfJoin`) VALUES
(202003838, 'Ahmed Yusuf Ahmed Saleh', '', '021201111', '202003838@stu.uob.edu.bh', '$2y$10$nx6dgnkuZ6n9u4.tW7tBkOHDKQLoVj4rf8McFue6mJMXncnvUR04C', 36728829, 'male', 1, 'College of Information Technology', 'B.Sc. in Computer Science', NULL, '4.00', '4.00', 75, 'Excellence', 'Enrolled', 1, 2020);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

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
  ADD PRIMARY KEY (`classroomID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `courseAttendance`
--
ALTER TABLE `courseAttendance`
  ADD PRIMARY KEY (`attendanceID`),
  ADD UNIQUE KEY `attendanceID` (`attendanceID`,`studentID`,`courseID`,`instructorID`,`section`,`date`,`lecturesDay`,`status`,`year`,`semester`),
  ADD KEY `courseattendance_ibfk_1` (`studentID`),
  ADD KEY `courseattendance_ibfk_2` (`courseID`),
  ADD KEY `instructorID` (`instructorID`),
  ADD KEY `section` (`section`);

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
  ADD KEY `studentID` (`studentID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `CPR` (`CPR`);

--
-- Indexes for table `studentClassroom`
--
ALTER TABLE `studentClassroom`
  ADD PRIMARY KEY (`studentClassroomID`),
  ADD UNIQUE KEY `studentID` (`studentID`,`section`,`courseID`,`instructorID`,`classroomID`,`year`,`semester`,`studentClassroomID`) USING BTREE,
  ADD KEY `classroomID` (`classroomID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `instructorID` (`instructorID`);

--
-- Indexes for table `studentInfo`
--
ALTER TABLE `studentInfo`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `sID` (`studentID`) USING BTREE,
  ADD UNIQUE KEY `CPR` (`CPR`),
  ADD KEY `addressID` (`addressID`),
  ADD KEY `advisorID` (`advisorID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courseAttendance`
--
ALTER TABLE `courseAttendance`
  MODIFY `attendanceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `studentClassroom`
--
ALTER TABLE `studentClassroom`
  MODIFY `studentClassroomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courseAttendance`
--
ALTER TABLE `courseAttendance`
  ADD CONSTRAINT `courseattendance_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `studentInfo` (`studentID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `courseattendance_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `courseattendance_ibfk_3` FOREIGN KEY (`instructorID`) REFERENCES `staff` (`staffID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `courseattendance_ibfk_4` FOREIGN KEY (`section`) REFERENCES `studentClassroom` (`studentClassroomID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `courseTiming`
--
ALTER TABLE `courseTiming`
  ADD CONSTRAINT `coursetiming_ibfk_1` FOREIGN KEY (`classroomID`) REFERENCES `classroom` (`classroomID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `coursetiming_ibfk_2` FOREIGN KEY (`instructorID`) REFERENCES `staff` (`staffID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `coursetiming_ibfk_3` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `studentInfo` (`studentID`),
  ADD CONSTRAINT `grade_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`);

--
-- Constraints for table `studentClassroom`
--
ALTER TABLE `studentClassroom`
  ADD CONSTRAINT `studentclassroom_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `studentInfo` (`studentID`),
  ADD CONSTRAINT `studentclassroom_ibfk_2` FOREIGN KEY (`classroomID`) REFERENCES `classroom` (`classroomID`),
  ADD CONSTRAINT `studentclassroom_ibfk_3` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`),
  ADD CONSTRAINT `studentclassroom_ibfk_4` FOREIGN KEY (`instructorID`) REFERENCES `staff` (`staffID`);

--
-- Constraints for table `studentInfo`
--
ALTER TABLE `studentInfo`
  ADD CONSTRAINT `studentinfo_ibfk_2` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`),
  ADD CONSTRAINT `studentinfo_ibfk_3` FOREIGN KEY (`advisorID`) REFERENCES `staff` (`staffID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
