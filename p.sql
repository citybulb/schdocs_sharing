-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2019 at 09:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p`
--

-- --------------------------------------------------------

--
-- Table structure for table `up`
--

CREATE TABLE `up` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `access` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'In use',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `up`
--

INSERT INTO `up` (`id`, `name`, `access`, `type`, `time`) VALUES
(47, 'Research Methodology.pdf', '  ', 'In use', '2019-05-22 07:09:01'),
(49, 'CIT413.pdf', 'IMT  CPT', 'In use', '2019-05-23 06:35:49'),
(51, 'CPT416Presentation.pptx', '  ', 'In use', '2019-05-23 11:32:23'),
(52, 'MIS.pptx', '', 'In use', '2019-05-23 11:35:28'),
(53, 'SRS ASSIGNMENT.docx', 'IMT  ', 'In use', '2019-05-23 13:02:33'),
(54, 'DATA COMPRESSION.pptx', '', 'In use', '2019-05-23 16:54:11'),
(55, 'IMT412_Slide2_Basic Concepts.ppt', '', 'In use', '2019-05-23 18:32:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dept` tinytext NOT NULL,
  `type` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dept`, `type`, `password`) VALUES
(2, 'Emmanuel Onimisi', 'kalu.francis@st.futminna.edu.ng', 'IMT', 'Student', '@#632319e5f22b0b4a633579fadc6cae31$'),
(3, 'Hamza Aliyu', 'hamza.aliyu@st.futminna.edu.ng', 'IMT', 'Staff', '@#700c8b805a3e2a265b01c77614cd8b21$');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `up`
--
ALTER TABLE `up`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `up`
--
ALTER TABLE `up`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
