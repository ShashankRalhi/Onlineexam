-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 12:56 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `ques` varchar(1000) NOT NULL,
  `op1` varchar(100) NOT NULL,
  `op2` varchar(100) NOT NULL,
  `op3` varchar(100) NOT NULL,
  `op4` varchar(100) NOT NULL,
  `ans` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `subject`, `ques_id`, `ques`, `op1`, `op2`, `op3`, `op4`, `ans`) VALUES
(16, 'HTML', 1, 'what is html', 'serever-side lang', 'clint-side lang', 'both', 'none', 'serever-side lang'),
(17, 'HTML', 2, 'HTML Editior', 'NotePad', 'World Pad', 'Power Point', 'None', 'NotePad'),
(18, 'HTML', 3, 'What is the use of <p> tag?', 'No Such tag', 'For image ', 'for paragraph', 'none', 'for paragraph'),
(19, 'HTML', 4, 'Which symbol is used to identify id selector?', '@', '#', '.', 'None', '#'),
(24, 'HTML', 6, 'How to declare form?', 'form{}', 'form[]', 'form.', 'None', 'None'),
(25, 'HTML', 5, 'what is the use you tr?', 'table column', 'table row', 'both', 'none', 'table row'),
(27, 'HTML', 7, 'Which method is used to send data via a form ?', 'GET', 'POST', 'Both', 'none', 'Both'),
(28, 'HTML', 8, 'What is the use of anchor tag?', 'Hyperlink', 'Uploading', 'Downloading', 'None', 'Hyperlink'),
(29, 'HTML', 9, 'Can we use html with external css ?', 'Yes', 'No', 'Maybe', 'Maybe Not', 'Yes'),
(30, 'HTML', 10, 'Can html allows multipage seletion or insertion ?', 'May Be ', 'Maybe Not', 'Yes', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `email`, `password`, `dt`) VALUES
(1, 'Shashank Ralhi', 'shashank@ralhi.com', '147', '2020-10-26 19:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `result` varchar(100) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `username`, `subject`, `result`, `dt`) VALUES
(1, 'Shashank Ralhi', 'HTML', 'PASS', '2020-10-31 16:33:28'),
(3, 'Shashank Ralhi', 'HTML', 'PASS', '2020-10-31 16:47:53'),
(4, 'Shashank Ralhi', 'HTML', 'PASS', '2020-10-31 16:49:29'),
(5, 'Shashank Ralhi', 'HTML', 'PASS', '2020-10-31 17:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `dt`) VALUES
(7, 'HTML', '2020-10-28 23:00:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
