-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 05:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketingapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Id` int(11) NOT NULL,
  `EventName` text NOT NULL,
  `EventDescription` varchar(50) NOT NULL,
  `Location` text NOT NULL,
  `Date` date NOT NULL,
  `EventTime` text NOT NULL,
  `TotalCapacity` int(11) NOT NULL,
  `VIPCapacity` int(11) NOT NULL,
  `RegularCapacity` int(11) NOT NULL,
  `VIPTicketCost` decimal(10,0) NOT NULL,
  `RegularTicketCost` decimal(10,0) NOT NULL,
  `CreatedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Id`, `EventName`, `EventDescription`, `Location`, `Date`, `EventTime`, `TotalCapacity`, `VIPCapacity`, `RegularCapacity`, `VIPTicketCost`, `RegularTicketCost`, `CreatedBy`) VALUES
(3, 'Churchill Show Garden City', 'Welcome to Thee Churchil show', 'Nairobi', '2021-01-11', '20:50', 500, 100, 400, '400', '400', 1),
(4, 'Churchill Show Kitengela', 'Be prepared to laugh', 'Kitengela', '2021-01-01', '20:20', 500, 100, 400, '400', '400', 1),
(9, 'Churchill Show Kitengela', 'This is a test', 'Kitengela', '2021-01-01', '23:15', 500, 100, 400, '400', '400', 1),
(10, 'Churchill Show Garden City', 'adszfxdgcfhvb', 'Nairobi', '2021-01-11', '', 500, 100, 400, '400', '400', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `TicketNumber` int(11) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `EventId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `AmountPaid` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Name`, `Email`, `PhoneNumber`, `Password`) VALUES
(1, 'Ivy Kamonya', 'ivykamonya@gmail.com', '0701989898', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_Events_Users` (`CreatedBy`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`TicketNumber`),
  ADD KEY `FK_Tickets_Users` (`UserId`),
  ADD KEY `FK_Tickets_Events` (`EventId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TicketNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `FK_Events_Users` FOREIGN KEY (`CreatedBy`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `FK_Tickets_Events` FOREIGN KEY (`EventId`) REFERENCES `events` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Tickets_Users` FOREIGN KEY (`UserId`) REFERENCES `users` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
