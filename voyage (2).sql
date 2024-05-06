-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 04 mai 2024 à 23:13
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `voyage`
--

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `idclient` int(8) NOT NULL,
  `nbrp` int(100) NOT NULL,
  `destination` varchar(80) NOT NULL,
  `dateres` datetime NOT NULL,
  `prixt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idclient`, `nbrp`, `destination`, `dateres`, `prixt`) VALUES
(12345678, 2, 'soussee', '2024-04-28 00:00:00', 751),
(15478955, 5, 'sousse', '2024-04-29 11:12:51', 230),
(65498231, 4, 'hammamet', '2024-04-30 00:00:00', 230),
(66665555, 3, 'hammamet', '2024-04-29 16:54:42', 650);

-- --------------------------------------------------------

--
-- Structure de la table `voyagee`
--

CREATE TABLE `voyagee` (
  `idvoyage` int(8) NOT NULL,
  `description` text NOT NULL,
  `datedepart` date NOT NULL,
  `dateretour` date NOT NULL,
  `idclient` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`idclient`);

--
-- Index pour la table `voyagee`
--
ALTER TABLE `voyagee`
  ADD PRIMARY KEY (`idvoyage`),
  ADD KEY `idclient` (`idclient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `idclient` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87654322;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `voyagee`
--
ALTER TABLE `voyagee`
  ADD CONSTRAINT `voyagee_ibfk_1` FOREIGN KEY (`idvoyage`) REFERENCES `reservation` (`idclient`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
