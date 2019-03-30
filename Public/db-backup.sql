-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 29, 2019 at 11:51 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `basic_web_application`
--
CREATE DATABASE IF NOT EXISTS `basic_web_application` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `basic_web_application`;
--
-- Database: `emily_week4`
--
CREATE DATABASE IF NOT EXISTS `emily_week4` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `emily_week4`;

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(10) UNSIGNED NOT NULL,
  `artistname` varchar(30) NOT NULL,
  `worktitle` varchar(50) NOT NULL,
  `worktype` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `artistname`, `worktitle`, `worktype`, `date`) VALUES
(14, 'Nice', 'Nice Work2', 'Cool Art2', '2019-03-12 03:17:11'),
(15, 'Cool Artist', 'Cool Work', 'Sculpture', '2019-03-12 03:18:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Database: `snake_tracker`
--
CREATE DATABASE IF NOT EXISTS `snake_tracker` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `snake_tracker`;

-- --------------------------------------------------------

--
-- Table structure for table `mealrecording`
--

CREATE TABLE `mealrecording` (
  `id` int(10) UNSIGNED NOT NULL,
  `foodtype` varchar(50) NOT NULL,
  `fooddate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shedrecording`
--

CREATE TABLE `shedrecording` (
  `id` int(10) UNSIGNED NOT NULL,
  `sheddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `uidUsers`, `emailUsers`, `pwdUsers`) VALUES
(3, 'boop', 'emilybarnwell2@gmail.com', '$2y$10$9..k1RskOEuH5ERlEHbWOuk5CJ.nY2jWluI1kS9oVYHG2mTpHDBb2'),
(4, 'Doop', 'emilybarnwell2@gmail.com', '$2y$10$8q/zz.bKrXZmkrxCkKVTb.ahzlh/VnWpfgLWkFhnjyGppNkaITTm2'),
(5, 'noop', 'AkaPanuka@gmail.com', '$2y$10$H1o7URqlxMlf9pBGlyNeH.dItQsDs1IKBNNVkSkQUhScUN8HCdNsG'),
(6, 'test', 'emilybarnwell2@gmail.com', '$2y$10$PPOcORYzgWDwUEZXEkp77eREWh45ccWxr.i02Z4I4tQZWKy2LYY32');

-- --------------------------------------------------------

--
-- Table structure for table `weightrecording`
--

CREATE TABLE `weightrecording` (
  `id` int(10) UNSIGNED NOT NULL,
  `weight` int(100) DEFAULT NULL,
  `weightdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mealrecording`
--
ALTER TABLE `mealrecording`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shedrecording`
--
ALTER TABLE `shedrecording`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- Indexes for table `weightrecording`
--
ALTER TABLE `weightrecording`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mealrecording`
--
ALTER TABLE `mealrecording`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `shedrecording`
--
ALTER TABLE `shedrecording`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `weightrecording`
--
ALTER TABLE `weightrecording`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
