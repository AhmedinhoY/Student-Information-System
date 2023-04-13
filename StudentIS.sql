-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 13, 2023 at 01:58 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `classroomID` int(9) NOT NULL,
  `section` varchar(10) NOT NULL,
  `availableTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` varchar(9) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `courseDescription` varchar(255) NOT NULL,
  `credits` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examID` int(9) NOT NULL,
  `examName` varchar(255) NOT NULL,
  `examDate` datetime NOT NULL,
  `examPlaceID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `studentID` int(9) NOT NULL,
  `courseID` varchar(9) NOT NULL,
  `istructorID` int(9) NOT NULL,
  `grade` enum('A','A-','B+','B','B-','C+','C','C-','D+','D','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff/admin`
--

CREATE TABLE `staff/admin` (
  `staff/adminID` int(9) NOT NULL,
  `fullName` varchar(80) NOT NULL,
  `picture` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `CPR` int(9) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `officeNumber` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentAcademicInfo`
--

CREATE TABLE `studentAcademicInfo` (
  `studentID` int(9) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `studentClassroom`
--

CREATE TABLE `studentClassroom` (
  `studentID` int(9) NOT NULL,
  `instructorID` int(9) NOT NULL,
  `courseID` varchar(10) NOT NULL,
  `classroomID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentInfo`
--

CREATE TABLE `studentInfo` (
  `studentID` int(9) NOT NULL,
  `fullName` varchar(80) NOT NULL,
  `picture` text NOT NULL,
  `CPR` int(9) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `addressID` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressID`);

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
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examID`),
  ADD KEY `examPlace` (`examPlaceID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD KEY `studentID` (`studentID`),
  ADD KEY `courseID` (`courseID`),
  ADD KEY `istructorID` (`istructorID`);

--
-- Indexes for table `staff/admin`
--
ALTER TABLE `staff/admin`
  ADD PRIMARY KEY (`staff/adminID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`);

--
-- Indexes for table `studentAcademicInfo`
--
ALTER TABLE `studentAcademicInfo`
  ADD KEY `sID` (`studentID`),
  ADD KEY `advisorID` (`advisorID`);

--
-- Indexes for table `studentClassroom`
--
ALTER TABLE `studentClassroom`
  ADD KEY `classroomID` (`classroomID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `instructorID` (`instructorID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `studentInfo`
--
ALTER TABLE `studentInfo`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD UNIQUE KEY `sID` (`studentID`) USING BTREE,
  ADD UNIQUE KEY `CPR` (`CPR`),
  ADD KEY `addressID` (`addressID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`examPlaceID`) REFERENCES `classroom` (`classroomID`);

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `studentinfo` (`studentID`),
  ADD CONSTRAINT `grade_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`),
  ADD CONSTRAINT `grade_ibfk_3` FOREIGN KEY (`istructorID`) REFERENCES `staff/admin` (`staff/adminID`);

--
-- Constraints for table `studentAcademicInfo`
--
ALTER TABLE `studentAcademicInfo`
  ADD CONSTRAINT `studentacademicinfo_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `studentinfo` (`studentID`),
  ADD CONSTRAINT `studentacademicinfo_ibfk_2` FOREIGN KEY (`advisorID`) REFERENCES `staff/admin` (`staff/adminID`);

--
-- Constraints for table `studentClassroom`
--
ALTER TABLE `studentClassroom`
  ADD CONSTRAINT `studentclassroom_ibfk_1` FOREIGN KEY (`classroomID`) REFERENCES `classroom` (`classroomID`),
  ADD CONSTRAINT `studentclassroom_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `studentinfo` (`studentID`),
  ADD CONSTRAINT `studentclassroom_ibfk_3` FOREIGN KEY (`instructorID`) REFERENCES `staff/admin` (`staff/adminID`),
  ADD CONSTRAINT `studentclassroom_ibfk_4` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`);

--
-- Constraints for table `studentInfo`
--
ALTER TABLE `studentInfo`
  ADD CONSTRAINT `studentinfo_ibfk_2` FOREIGN KEY (`addressID`) REFERENCES `address` (`addressID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
