-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2019 at 09:37 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raj_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `consult_doct` varchar(100) NOT NULL,
  `addr` text NOT NULL,
  `appint_date` date NOT NULL,
  `date1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `mobile`, `gender`, `age`, `consult_doct`, `addr`, `appint_date`, `date1`) VALUES
(1, 'Ram', '123', 'male', '23', 'Dr. Rajesh Soni', 'sadasd', '2019-01-13', '2019-01-12 06:58:01'),
(2, 'ram1', '22222', 'female', '22', 'Dr. Rajshri Soni', 'wewe', '0000-00-00', '2019-01-12 07:01:22'),
(3, 'ram1', '22222', 'female', '22', 'Dr. Rajshri Soni', 'wewe', '0000-00-00', '2019-01-12 07:01:22'),
(4, 'ggg', '44444', 'male', '22', 'Dr. Rajesh Soni', 'sdsdf', '0000-00-00', '2019-01-12 07:02:18'),
(5, 'hh', 'sdsf', 'male', '', 'Dr. Rajshri Soni', 'dsdsfdf', '2019-01-08', '2019-01-12 07:02:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
