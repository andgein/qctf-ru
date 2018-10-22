-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2018 at 11:28 AM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qctf.ru`
--

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `shortname` varchar(32) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `index_text` text NOT NULL,
  `rules` text NOT NULL,
  `date` varchar(30) NOT NULL,
  `past` tinyint(4) NOT NULL,
  `schedule` text NOT NULL,
  `results` mediumtext NOT NULL,
  `show_schedule` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `contest` varchar(32) NOT NULL,
  `photo` varchar(200) NOT NULL COMMENT 'Из папки /static/people/. Можно не указывать тогда возьмём файл <Имя>.jpg',
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `order` int(11) DEFAULT NULL COMMENT 'Порядок людей на странице. Можно не указывать, тогда упорядочи по айдишникам. Используйте, если надо вставить кого-нибудь в начало или в середине'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `contest` varchar(32) NOT NULL,
  `shortname` varchar(32) NOT NULL,
  `city` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `users_limit` int(11) NOT NULL,
  `external_users` tinyint(4) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_registration_open` tinyint(1) NOT NULL DEFAULT '1',
  `show_to_all` tinyint(1) NOT NULL DEFAULT '1',
  `email` text NOT NULL,
  `schedule` text NOT NULL,
  `additional_info` text NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `sponsors` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` int(11) NOT NULL,
  `contest` varchar(32) NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `place` int(11) NOT NULL,
  `participant1` varchar(255) NOT NULL,
  `email1` varchar(255) NOT NULL,
  `participant2` varchar(255) NOT NULL,
  `email2` varchar(255) NOT NULL,
  `participant3` varchar(255) NOT NULL,
  `email3` varchar(255) NOT NULL,
  `participant4` varchar(255) NOT NULL,
  `email4` varchar(255) NOT NULL,
  `computers` int(11) NOT NULL,
  `persInf` tinyint(1) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`shortname`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contest` (`contest`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contest` (`contest`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place` (`place`),
  ADD KEY `place_2` (`place`),
  ADD KEY `contest` (`contest`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`contest`) REFERENCES `contests` (`shortname`);

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`contest`) REFERENCES `contests` (`shortname`) ON DELETE NO ACTION;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `registrations_ibfk_1` FOREIGN KEY (`contest`) REFERENCES `contests` (`shortname`),
  ADD CONSTRAINT `registrations_ibfk_2` FOREIGN KEY (`place`) REFERENCES `places` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
