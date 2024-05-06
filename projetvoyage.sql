-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 mai 2024 à 17:01
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetvoyage`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `iduser` int(8) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(12) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`iduser`, `nom`, `prenom`, `email`, `code`, `adresse`, `numero`, `rol`) VALUES
(1020, 'haji', 'ayoub', 'hadji.ayoub2003@yahoo.fr', '12345678', 'djerba', '52733276', 'admin'),
(1022, 'haji', 'ayoub', 'haji.ayoub@esprit.tn', '12121212', 'djerba', '98423335', 'user'),
(1023, 'ayoub2003', 'haji', 'haji.ayoub@esprit.tn', 'azertyuio', 'djerba', '98423335', 'user'),
(1024, 'juboboiub', 'att', 'farhanshoukat0412@gmail.com', '123654789', 'djerba', '14789632', 'user'),
(1025, 'achref', 'bbd', 'haji.ayoub@esprit.tn', 'aaaaaaaa', 'djerba', '14785236', 'user'),
(1026, 'benhamed', 'ahmed', 'hadji.ayoub2003@gmail.com', '147852369', 'djerba', '98423335', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1027;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
