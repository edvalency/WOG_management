-- phpMyAdmin SQL Dump
-- version 5.0.4deb2ubuntu5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 19, 2022 at 12:09 PM
-- Server version: 10.5.13-MariaDB-0ubuntu0.21.10.1
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wog_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `date` varchar(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gc_dues`
--

CREATE TABLE `gc_dues` (
  `date` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gc_dues`
--

INSERT INTO `gc_dues` (`date`, `name`, `amount`) VALUES
('14/01/2022', 'Edwin Ofosuhene', 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `fullname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(13) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `hometown` varchar(15) NOT NULL,
  `region` varchar(20) NOT NULL,
  `residence` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `fathersname` varchar(50) NOT NULL,
  `fatherstat` varchar(5) NOT NULL,
  `mothersname` varchar(50) NOT NULL,
  `motherstat` varchar(5) NOT NULL,
  `next_of_kin` varchar(50) NOT NULL,
  `next_of_kin_contact` varchar(13) DEFAULT NULL,
  `relation_to_nok` varchar(15) NOT NULL,
  `email_of_nok` varchar(30) DEFAULT NULL,
  `dept` varchar(60) DEFAULT NULL,
  `baptism_stat` varchar(3) NOT NULL,
  `date_baptised` date NOT NULL,
  `yom` varchar(4) NOT NULL,
  `profession` varchar(15) NOT NULL,
  `present_occupation` varchar(30) NOT NULL,
  `name_of_company` varchar(70) NOT NULL,
  `employment_stat` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`fullname`, `dob`, `contact`, `gender`, `hometown`, `region`, `residence`, `email`, `fathersname`, `fatherstat`, `mothersname`, `motherstat`, `next_of_kin`, `next_of_kin_contact`, `relation_to_nok`, `email_of_nok`, `dept`, `baptism_stat`, `date_baptised`, `yom`, `profession`, `present_occupation`, `name_of_company`, `employment_stat`) VALUES
('Edwin Ofosuhene', '1977-12-30', '+233553798229', 'Male', 'Akim Oda', 'Eastern', 'GA-077-6362', 'edwinofosuhene31@gmail.com', 'Evans Abrokwah', 'dead', 'Comfort Adzomadi', 'alive', 'Morgan Abrokwah', '+233244291433', 'Nephew', 'morgan@gmail.com', 'Game Changers Generation', 'Yes', '2021-12-01', '2021', 'Web Developer', 'Web Development', 'Self', 'Student'),
('Alex Abrokwah', '1978-06-29', '+233249889357', 'Male', 'Akim Oda', 'Eastern', 'GA-076-0325', 'recordscloud0@gmail.com', 'Evans Abrokwah', 'dead', 'Comfort Adzomadi', 'alive', 'Morgan Abrokwah', '+233244291433', 'Son', 'morgan@gmail.com', 'Men\'s Fellowship', 'Yes', '2008-12-16', '1998', 'Teacher', 'Teaching', 'Accra Technical University', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `offertory`
--

CREATE TABLE `offertory` (
  `date` varchar(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offertory`
--

INSERT INTO `offertory` (`date`, `amount`) VALUES
('14/01/2022', 146),
('17/01/2022', 11);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `profileimg` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`profileimg`) VALUES
('hey there');

-- --------------------------------------------------------

--
-- Table structure for table `tithes`
--

CREATE TABLE `tithes` (
  `date` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tithes`
--

INSERT INTO `tithes` (`date`, `name`, `amount`) VALUES
('14/11/2021', 'Edwin Ofosuhene', '12'),
('23/12/2021', 'Edwin Ofosuhene', '10'),
('14/01/2022', 'Edwin Ofosuhene', '11'),
('14/01/2022', 'Alex Abrokwah', '122');

-- --------------------------------------------------------

--
-- Table structure for table `welfare`
--

CREATE TABLE `welfare` (
  `month` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `welfare`
--

INSERT INTO `welfare` (`month`, `year`, `name`, `amount`) VALUES
('February', '2021', 'Edwin Ofosuhene', 10),
('March', '2021', 'Edwin Ofosuhene', 10),
('April', '2021', 'Edwin Ofosuhene', 10),
('May', '2021', 'Edwin Ofosuhene', 10),
('April', '2021', '', 1),
('January', '2022', 'Alex Abrokwah', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
