-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 07:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_abdul_hadi_petadoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `adopt_a_pet`
--

CREATE TABLE `adopt_a_pet` (
  `adopt_a_pet` int(10) DEFAULT NULL,
  `id` int(11) NOT NULL,
  `fk_animals` int(11) DEFAULT NULL,
  `fk_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adopt_a_pet`
--

INSERT INTO `adopt_a_pet` (`adopt_a_pet`, `id`, `fk_animals`, `fk_users`) VALUES
(1, 1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `animalsname` varchar(40) NOT NULL,
  `img` varchar(200) NOT NULL,
  `description` char(100) NOT NULL,
  `hobbies` char(100) NOT NULL,
  `address` char(60) NOT NULL,
  `age` int(11) NOT NULL,
  `sise` enum('Small','Large','Senior') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `animalsname`, `img`, `description`, `hobbies`, `address`, `age`, `sise`) VALUES
(1, 'bbaa', 'literature.webp', 'ssss', 'ssss', 'Nordwestbahnstraße, 101/2/8', 9, 'Small'),
(4, 'aaa', 'literature.webp', 'sss', 'sss', 'Nordwestbahnstraße', 5, 'Large'),
(11, 'cas', '6348b75e41215.png', 'qqqqw', 'nbmbhmb', ' cbfgxv', 30, 'Senior');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `E_Mail` char(60) NOT NULL,
  `PASSWORD` char(255) NOT NULL,
  `dateofbirth` date NOT NULL,
  `status` enum('user','adm','super') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `E_Mail`, `PASSWORD`, `dateofbirth`, `status`) VALUES
(2, 'ame', 'Shrineh', 'amersh99.as@gmail.com', 'a320480f534776bddb5cdb54b1e93d210a3c7d199e80a23c1b2178497b184c76', '0000-00-00', 'user'),
(3, 'Abdul Hadi', 'SHRINEH', 'alhade1988@hotmail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '0000-00-00', 'adm'),
(5, 'Abdul', 'Hadi', 'test@gmaill.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', '0000-00-00', 'super');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adopt_a_pet`
--
ALTER TABLE `adopt_a_pet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users` (`fk_users`),
  ADD KEY `fk_animals` (`fk_animals`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description` (`description`),
  ADD UNIQUE KEY `hobbies` (`hobbies`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `E_Mail` (`E_Mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adopt_a_pet`
--
ALTER TABLE `adopt_a_pet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adopt_a_pet`
--
ALTER TABLE `adopt_a_pet`
  ADD CONSTRAINT `adopt_a_pet_ibfk_1` FOREIGN KEY (`fk_users`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `adopt_a_pet_ibfk_2` FOREIGN KEY (`fk_animals`) REFERENCES `animals` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
