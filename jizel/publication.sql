-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 09:24 PM
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
-- Database: `publication`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
  `commentaire` varchar(500) NOT NULL,
  `date` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `commentaire` (`commentaire`, `date`, `id`, `id_admin`, `id_publication`) VALUES
('Covid-19, grippe, bronchiolite : qui doit se faire vacciner et quand ?', '2023-12-22 21:22:42', 74, 1, 76);

-- --------------------------------------------------------

--
-- Table structure for table `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `publication` varchar(2555) NOT NULL,
  `date` datetime NOT NULL,
  `etat` int(11) NOT NULL,
  `nom` varchar(55) NOT NULL,
  `image` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publication`
--

INSERT INTO `publication` (`id`, `publication`, `date`, `etat`, `nom`, `image`) VALUES
(76, '36 895 nouveaux cas ont été déclarés par les laboratoires de biologie médicale cette semaine-là, contre 35 003 la semaine précédente. Cela représente un taux d\'incidence de 54 cas pour 100 000 habitants dans l\'Hexagone, contre 52 précédemment. Ce taux d\'incidence diffère en fonction des régions : 57 départements enregistrent un taux compris entre 20 et 50 cas par 100 000 habitants, alors que quatre départements sont, eux, particulièrement touchés par le virus dont le niveau de circulation augmente en flèche. Il s\'agit du Bas-Rhin, du Haut-Rhin, de la Moselle et de la Meuse. Ils enregistrent chacun un taux d\'incidence qui dépasse les 150 cas pour 100 000 habitants.', '2023-12-22 21:22:07', 0, 'Covid-19 : le niveau de circulation continue d’augmente', 'C:\\xampp\\htdocs\\siwar\\vue/uploads/1.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
