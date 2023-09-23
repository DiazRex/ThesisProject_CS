-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 08:17 PM
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
-- Database: `thesisweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `default_questions`
--

CREATE TABLE `default_questions` (
  `id` int(11) NOT NULL,
  `question_title` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `question_type` enum('multiple_choice','identification','true_false','') NOT NULL,
  `question_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `default_questions`
--

INSERT INTO `default_questions` (`id`, `question_title`, `answer`, `question_type`, `question_image`) VALUES
(1, 'How do you print a statement \'Hello World\' in C#?', 'a', 'multiple_choice', 'none'),
(2, 'C# supports object-oriented programming concepts such as __, which allows a class to inherit the properties and behaviors of another class.', 'inheritance', 'identification', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `identification`
--

CREATE TABLE `identification` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `identification`
--

INSERT INTO `identification` (`id`, `question_id`, `answer`) VALUES
(2, 2, 'inheritance');

-- --------------------------------------------------------

--
-- Table structure for table `multiple_choice`
--

CREATE TABLE `multiple_choice` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `a` varchar(255) NOT NULL,
  `b` varchar(255) NOT NULL,
  `c` varchar(255) NOT NULL,
  `d` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multiple_choice`
--

INSERT INTO `multiple_choice` (`id`, `question_id`, `a`, `b`, `c`, `d`) VALUES
(1, 1, 'Console.Write(\"Hello World\");', 'system.out.println(\"Hello world\");', 'print(\"Hello world\")', 'cout << \"Hello world;');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `question_type` enum('multiple_choice','identification','true_false','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`id`, `question_id`, `question_type`) VALUES
(1, 1, 'multiple_choice'),
(2, 2, 'identification');

-- --------------------------------------------------------

--
-- Table structure for table `thesisdata`
--

CREATE TABLE `thesisdata` (
  `ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PassW` varchar(50) NOT NULL,
  `RoleSTI` varchar(100) NOT NULL,
  `ProfileP` varchar(255) NOT NULL,
  `FirstN` varchar(100) NOT NULL,
  `LastN` varchar(100) NOT NULL,
  `SectionN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thesisdata`
--

INSERT INTO `thesisdata` (`ID`, `Username`, `Email`, `PassW`, `RoleSTI`, `ProfileP`, `FirstN`, `LastN`, `SectionN`) VALUES
(1, 'AdminAcc', 'Admin@gmail.com', 'Admin0123', 'Admin', 'uploads/64341413a35fa.jpg', 'AdminFrt', 'AdminLst', 'Control'),
(45, 'KoroSensei', 'KoroSensei@gmail.com', 'Tch123', 'Teacher', 'uploads/64343aeb1842a.jpg', 'TestTeacher', 'CalTeacher', 'Faculty'),
(46, 'CalStudent', 'CalStudent@gmail.com', 'S123', 'Student', 'uploads/64343cae4f10b.jpg', 'TestStudent', 'CalStudent', 'Cs601'),
(47, 'CalStudent_2', 'CalStudent_2@gmail.com', 'S0123', 'Student', 'uploads/64343d6a424cd.jpg', 'TestStudent_2', 'CalStudent_2', 'Cs501'),
(48, 'CalStudent_3', 'CalStudent_3@gmail.com', 'St0123', 'Student', 'uploads/64343e1eb5db4.jpg', 'TestStudent_3', 'CalStudent_3', 'Cs601'),
(64, 'SampleAcc', 'SampleAcc@gmail.com', '123a', 'Student', 'uploads/647f556b59d1b.jpg', 'Sample', 'Diaz', 'CS501');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `default_questions`
--
ALTER TABLE `default_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identification`
--
ALTER TABLE `identification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multiple_choice`
--
ALTER TABLE `multiple_choice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thesisdata`
--
ALTER TABLE `thesisdata`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `default_questions`
--
ALTER TABLE `default_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `identification`
--
ALTER TABLE `identification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `multiple_choice`
--
ALTER TABLE `multiple_choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thesisdata`
--
ALTER TABLE `thesisdata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
