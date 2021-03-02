-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2021 at 08:26 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scrum bord`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `Color` varchar(255) NOT NULL DEFAULT 'white',
  `Status` varchar(255) NOT NULL DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `Id` int(11) NOT NULL,
  `description` text NOT NULL,
  `Progress` varchar(255) NOT NULL DEFAULT '0',
  `Assigned_To` int(11) NOT NULL,
  `Task_name` varchar(255) NOT NULL,
  `projectId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Color` varchar(255) NOT NULL,
  `ColorName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Color`, `ColorName`) VALUES
(1, 'Aat', '#1874cd', 'DodgerBlue3'),
(2, 'Irian', '#00cd00', 'Green3'),
(3, 'Cinthya', '#a020f0', 'Purple'),
(4, 'Henk', '#ff7f00', 'DarkOrange1'),
(5, 'Marcel', '#dc143c', 'crimson'),
(6, 'Wim', '#c6e2ff', 'SlateGray1'),
(7, 'Sander', '#ffd700', 'Gold'),
(8, 'Sen', '#adff2f', 'GreenYellow'),
(9, '', '#ff69b4', 'HotPink'),
(10, '', '#8b4513', 'SaddleBrown'),
(11, '', '#fff68f', 'Khaki'),
(12, '', '#483d8b', 'DarkSlateBlue'),
(13, '', '#FFC0CB', 'Pink'),
(14, 'William', '#ff00ff', 'Magenta'),
(15, '', '#838b83', 'Honeydew4'),
(16, '', '#00f5ff', 'Turquoise1'),
(17, '', '#008b8b', 'DarkCyan'),
(18, '', '#0000cd', 'MediumBlue'),
(19, '', '#f5f5f5', 'WhiteSmoke'),
(20, '', '#000000', 'black'),
(21, '', '#6b8e23', 'OliveDrab');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `projectId` (`projectId`),
  ADD KEY `Assinged_To` (`Assigned_To`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projects` (`Id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`Assigned_To`) REFERENCES `users` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
