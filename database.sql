-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2018 at 12:45 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

DROP database IF exists areufree;
CREATE database areufree;

use areufree;

GRANT all privileges ON *.* to 'root'@'localhost';
flush privileges;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `areufree`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignations`
--

CREATE TABLE `assignations` (
  `assignation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gaps`
--

CREATE TABLE `gaps` (
  `gap_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `poll_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `place` varchar(255) DEFAULT NULL,
  `author` int(11) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignations`
--
ALTER TABLE `assignations`
  ADD PRIMARY KEY (`assignation_id`),
  ADD KEY `gap_id` (`gap_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gaps`
--
ALTER TABLE `gaps`
  ADD PRIMARY KEY (`gap_id`),
  ADD KEY `poll_id` (`poll_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`poll_id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `author` (`author`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignations`
--
ALTER TABLE `assignations`
  MODIFY `assignation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gaps`
--
ALTER TABLE `gaps`
  MODIFY `gap_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignations`
--
ALTER TABLE `assignations`
  ADD CONSTRAINT `assignations_ibfk_1` FOREIGN KEY (`gap_id`) REFERENCES `gaps` (`gap_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `gaps`
--
ALTER TABLE `gaps`
  ADD CONSTRAINT `gaps_ibfk_1` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`poll_id`) ON DELETE CASCADE;

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

INSERT INTO `users`(`name`, `username`, `email`, `password`) VALUES
("Yeray Lage", "ylagef", "ylagef@gmail.com", "$2y$10$IREYLr/UASL47YBjmZjOfubY9EF5aX16NZTg.eLbfw4YepP7E1Ure"), /* Password=ylagef*/
("Iván Fernández", "ivanf", "ivanf@gmail.com", "$2y$10$uwhCOnikRus.4DP7uGzc3OHi884j0wmxybvfKSWFn7SmZ4fxSsWqK"), /* Password=ivanf*/
("Josemi Morán", "josemim", "josemim@gmail.com", "$2y$10$mp7dLV62IVQsBkJ3DyxlJOrtq0jr9LYyVmwVqGhJCQZkAC4Ez6L4W"), /* Password=josemim*/
("Arturo González", "arturog", "arturog@gmail.com", "$2y$10$GwBFRSN5oyy0pz/8rDnVa.SGJP9yHFTnAcrspqaF4SjuDP02yKP/O"), /* Password=arturog*/
("Ruth", "root", "root@root.com", "$2y$10$xtCMMIHQAS7Zm7qe8CejkuSNbFQ4WVr2SX4ys2ulUBMu9AKY08F3S"); /* Password=root*/

INSERT INTO `polls` (`poll_id`, `title`, `place`, `author`,`url`) VALUES
(1, 'Cena de Navidad', 'Graduado', 1,'75A75A50327C82B073970AEC7CA4A891'),
(2, 'Examen teórico TSW', 'ESEI', 2,'DCD14BB11DD2323815D3FCA3C3E23993'),
(3, 'Solteros vs Casados', null, 1,'F18773A6C56819253AD4723F79D70AE7'),
(4, 'Foro Empleo', 'Universidad de Vigo', 3,'69CC56944036C23D1DF5E5BFD7C885F9'),
(5, 'Cumpleaños Arturo', null, 4,'F783FD3A37BDA054972B73608E477EAA'),
(6, 'Final Liga Universitaria', 'Gimnasio Uvigo', 3,'85D958AC151EF0695FDAF79CB013A2D5');

INSERT INTO `gaps` (`gap_id`, `poll_id`, `start_date`, `end_date`) VALUES
(1, 1, '2018-11-06 22:00:00', '2018-10-06 23:59:00'),
(2, 1, '2018-11-07 22:00:00', '2018-10-06 23:59:00'),
(3, 1, '2018-11-08 22:00:00', '2018-10-06 23:59:00'),
(4, 1, '2018-11-09 22:00:00', '2018-10-06 23:59:00'),
(5, 2, '2018-11-10 10:00:00', '2018-10-06 12:00:00'),
(6, 2, '2018-11-10 16:00:00', '2018-10-06 18:00:00'),
(7, 3, '2018-11-01 18:00:00', '2018-10-06 20:00:00'),
(8, 3, '2018-11-02 18:00:00', '2018-10-06 20:00:00'),
(9, 4, '2018-11-03 10:00:00', '2018-10-06 21:00:00'),
(10, 4, '2018-11-04 11:00:00', '2018-10-06 21:00:00'),
(11, 5, '2018-11-10 20:00:00', '2018-10-06 22:00:00'),
(12, 5, '2018-11-11 22:00:00', '2018-10-06 23:00:00'),
(13, 6, '2018-11-20 18:00:00', '2018-10-06 22:00:00'),
(14, 6, '2018-11-22 10:00:00', '2018-10-06 14:00:00');

INSERT INTO `assignations` (`assignation_id`, `user_id`, `gap_id`) VALUES
(1, 1, 1),
(2, 1, 14),
(3, 1, 3),
(4, 1, 4),
(5, 1, 6),
(6, 1, 8),
(7, 1, 10),
(8, 1, 11),
(9, 2, 1),
(10, 2, 3),
(11, 2, 5),
(12, 2, 7),
(13, 3, 1),
(14, 3, 2),
(15, 3, 4),
(16, 3, 7),
(17, 4, 2),
(18, 4, 3),
(19, 5, 2),
(20, 5, 3);

COMMIT;