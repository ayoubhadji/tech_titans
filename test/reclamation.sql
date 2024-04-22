-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 04:42 PM
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
-- Database: `reclamation`
--

-- --------------------------------------------------------

--
-- Table structure for table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `email` varchar(64) NOT NULL,
  `reclamation` varchar(2555) NOT NULL,
  `etat` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `tel` varchar(24) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reclamation`
--

INSERT INTO `reclamation` (`id`, `nom`, `email`, `reclamation`, `etat`, `date`, `tel`, `category`) VALUES
(219, 'abir gamoudi', 'abir.gamoudi@esprit.tn', '******* ', 1, '2023-12-17 21:04:14', '56360000', 'Drugs'),
(220, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'biensure', 0, '2023-12-17 21:04:49', '54649999', 'Others'),
(221, 'abeeir gumoudi', 'abeeirgamudi@gmail.com', 'wow ', 0, '2023-12-17 21:05:36', '99253433', 'Shop'),
(222, 'mohamed fares', 'mohamed.fares@esprit.tn', 'hello **** ', 1, '2023-12-17 21:06:06', '21325765', 'Drugs'),
(223, 'mohamed fares', 'mohamed.fares@esprit.tn', '', 0, '2023-12-17 21:25:09', '21325765', 'Appointment'),
(224, 'mohamed fares', 'mohamed.fares@esprit.tn', 'oki oki ', 1, '2023-12-17 21:25:31', '21325765', 'Appointment'),
(225, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'biensur *****', 0, '2023-12-17 21:48:50', '99253433', 'Others'),
(226, 'basma ', 'basma.gamoudi@esprit.tn', 'hello', 1, '2023-12-17 21:54:29', '99253433', 'Appointment'),
(227, 'basma ', 'abir.gamoudi@esprit.tn', '****', 0, '2023-12-17 22:32:41', '99253433', 'Drugs'),
(228, 'basma ', 'abir.gamoudi@esprit.tn', 'bhbh', 0, '2023-12-17 22:34:07', '99253433', 'Shop'),
(229, 'basma ', 'abir.gamoudi@esprit.tn', '****', 0, '2023-12-17 22:39:22', '99253433', 'Appointment'),
(231, 'basma ', 'abir.gamoudi@esprit.tn', 'bien sur', 1, '2023-12-17 22:42:21', '99253433', 'Appointment'),
(232, 'basma ', 'abir.gamoudi@esprit.tn', '****', 0, '2023-12-17 22:47:29', '99253433', 'Drugs'),
(233, 'basma ', 'abir.gamoudi@esprit.tn', 'ya raby', 0, '2023-12-17 22:52:07', '99253433', 'Appointment'),
(234, 'basma ', 'abir.gamoudi@esprit.tn', 'ya raby', 0, '2023-12-17 23:00:16', '99253433', 'Appointment'),
(235, 'basma ', 'abir.gamoudi@esprit.tn', 'ya raby', 0, '2023-12-17 23:01:23', '99253433', 'Appointment'),
(236, 'basma ', 'abir.gamoudi@esprit.tn', 'ah', 0, '2023-12-17 23:01:40', '99253433', 'Appointment'),
(238, 'basma ', 'abeeirgamudi@gmail.com', 'claim', 0, '2023-12-17 23:09:52', '99253433', 'Appointment'),
(239, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'claim 2', 0, '2023-12-17 23:11:20', '54649999', 'Drugs'),
(240, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'bhb', 0, '2023-12-17 23:12:58', '54649999', 'Shop'),
(241, 'abir gamoudi', 'abir.gamoudi@esprit.tn', ' nn', 0, '2023-12-17 23:13:14', '54649999', 'Drugs'),
(242, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'bb', 0, '2023-12-17 23:14:11', '54649999', 'Drugs'),
(243, 'abir gamoudi', 'abir.gamoudi@esprit.tn', '****', 0, '2023-12-18 12:50:24', '54649999', 'Drugs'),
(244, 'abeeir gamudi', 'abeeirgamudi@gmail.com', 'essaye ', 0, '2023-12-18 13:01:34', '98253433', 'Others'),
(245, 'abir gamoudi', 'abir.gamoudi@esprit.tn', '****', 0, '2023-12-18 13:02:24', '99253433', 'Appointment'),
(248, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'drugs', 0, '2023-12-18 15:38:30', '54545863', 'Others'),
(251, 'nour', 'abir.gamoudi@esprit.tn', 'hello', 1, '2023-12-18 17:07:40', '54545863', 'Drugs'),
(252, 'nour', 'abir.gamoudi@esprit.tn', 'biensure', 0, '2023-12-19 12:27:15', '54545863', 'Drugs'),
(253, 'nour', 'abir.gamoudi@esprit.tn', 'hi', 0, '2023-12-19 12:31:01', '54545863', 'Appointment'),
(255, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'hello', 0, '2023-12-19 12:40:00', '99253433', 'Shop'),
(256, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'heyy', 0, '2023-12-19 12:43:31', '99253433', 'Shop'),
(257, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'hey ', 1, '2023-12-19 13:14:02', '99253433', 'Appointment'),
(258, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'hello', 1, '2023-12-19 16:14:34', '99253433', 'Drugs'),
(259, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'abir', 1, '2023-12-19 16:21:50', '99253433', 'Others'),
(260, 'abir gamoudi', 'abir.gamoudi@esprit.tn', 'hmdoulh **** ***', 1, '2023-12-19 16:29:14', '99253433', 'Appointment'),
(261, 'abir gamoudi', 'abir.gamoudi@esprit.tn', '**** 2', 1, '2023-12-19 16:38:36', '99253433', 'Appointment');

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

CREATE TABLE `reponse` (
  `id` int(11) NOT NULL,
  `reponse` varchar(2555) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `id_reclamation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reponse`
--

INSERT INTO `reponse` (`id`, `reponse`, `id_admin`, `date`, `id_reclamation`) VALUES
(71, 'fff', 1, '2023-12-11 22:02:13', 166),
(92, 'ok !!!', 1, '2023-12-17 21:04:25', 219),
(93, 'oki', 1, '2023-12-17 21:25:41', 224),
(94, ':(', 1, '2023-12-17 21:53:39', 222),
(95, 'hi', 1, '2023-12-17 21:54:43', 226),
(98, 'hello', 1, '2023-12-18 17:07:54', 251),
(99, 'hey', 1, '2023-12-19 13:14:28', 257),
(100, 'hello\r\n', 1, '2023-12-19 16:15:03', 258),
(101, 'hy', 1, '2023-12-19 16:22:18', 259),
(102, 'hmdoulh', 1, '2023-12-19 16:29:35', 260),
(103, 'hmdl', 1, '2023-12-19 16:39:44', 261);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT for table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
