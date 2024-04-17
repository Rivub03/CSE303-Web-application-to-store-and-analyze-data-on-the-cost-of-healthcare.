-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2024 at 11:33 AM
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
-- Database: `healthcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `ID` int(11) NOT NULL,
  `Item` text NOT NULL,
  `Cost` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`ID`, `Item`, `Cost`) VALUES
(1, 'Paracetamol', 200),
(5, 'Ace++', 20),
(6, 'Fexo', 15),
(7, 'Ace++', 20);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `DID` int(11) NOT NULL,
  `HID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Specialization` varchar(255) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`DID`, `HID`, `Name`, `Specialization`, `Price`) VALUES
(1, 1, 'Rivu', 'Cardiologist', 300),
(2, 1, 'Rafi', 'Neurologist', 200),
(3, 2, 'Sarara', 'Dermatologist', 500),
(3, 3, 'Aurpa', 'Cardiologist', 500),
(5, 18, 'Anika', 'Pediatrician', 400),
(6, 18, 'Rahim', 'Orthopedic Surgeon', 600),
(7, 19, 'Sadia', 'Gynecologist', 700),
(8, 21, 'Kabir', 'Oncologist', 800),
(9, 3, 'Liza', 'Psychiatrist', 550),
(10, 4, 'Farhan', 'Urologist', 900);

-- --------------------------------------------------------

--
-- Table structure for table `healthcareprovider`
--

CREATE TABLE `healthcareprovider` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `healthcareprovider`
--

INSERT INTO `healthcareprovider` (`ID`, `Name`, `Address`, `Type`, `Price`) VALUES
(1, 'Apollo', 'Mohammadpur, Dhaka', 'Private', 1000),
(2, 'Square', 'Mirpur, Dhaka', 'Private', 2000),
(3, 'Ibne Sina', 'Banglamotor', 'Private', 700),
(4, 'Evercare', 'Bashundhara', 'Private', 2000),
(5, 'Mothercare', 'Lalmatia', 'Private', 500),
(6, 'Al Hilal', 'Kazipara', 'Private', 900),
(9, 'Labaid', 'Dhanmondi', 'Private', 2000),
(18, 'HealthPlus', 'Gulshan, Dhaka', 'Private', 1500),
(19, 'CareFirst', 'Uttara, Dhaka', 'Private', 800),
(20, 'Wellness Center', 'Banani, Dhaka', 'Private', 1200),
(21, 'Prime Hospital', 'Baridhara, Dhaka', 'Private', 1800),
(22, 'Sunrise Clinic', 'Tejgaon, Dhaka', 'Private', 600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`DID`,`HID`),
  ADD KEY `FK` (`HID`);

--
-- Indexes for table `healthcareprovider`
--
ALTER TABLE `healthcareprovider`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `FK` FOREIGN KEY (`HID`) REFERENCES `healthcareprovider` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
