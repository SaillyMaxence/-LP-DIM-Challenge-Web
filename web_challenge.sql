-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 26 avr. 2019 à 15:47
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web_challenger`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `EventId` int(10) NOT NULL,
  `EventTitre` varchar(64) DEFAULT NULL,
  `EventMessage` mediumtext,
  `EventDateDebut` datetime DEFAULT NULL,
  `EventDateFin` datetime DEFAULT NULL,
  `EventPriority` int(10) NOT NULL DEFAULT '0',
  `EventVisibility` int(11) NOT NULL DEFAULT '0',
  `EventCreator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`EventId`, `EventTitre`, `EventMessage`, `EventDateDebut`, `EventDateFin`, `EventPriority`, `EventVisibility`, `EventCreator`) VALUES
(56, 'test', 'test  2', '2019-04-26 13:00:00', '2019-04-26 13:00:00', 2, 1, 'sailly.maxence'),
(58, 'bienvenue !', 'Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)Ã  l\'IUT :)', '2019-04-25 14:45:00', '2019-04-30 17:45:00', 0, 0, 'synave.remi'),
(59, 'test maxence', 'test maxeeeeeeeeeeeeeeeeence', '2019-04-19 00:00:00', '2019-04-30 16:45:00', 0, 1, 'sailly.maxence'),
(60, 'test maxence', 'test maxeeeeeeeeeeeeeeeeence', '2019-04-19 00:00:00', '2019-04-30 16:45:00', 0, 1, 'sailly.maxence'),
(61, 'oui', 'oui', '2019-04-01 02:15:00', '2019-04-21 12:45:00', 1, 0, 'sailly.maxence'),
(62, 'test encore', 'RDV chez Maxence', '2019-04-26 14:15:00', '2019-04-26 14:15:00', 0, 0, 'fernandez.marguerite'),
(63, 'test', 'test', '2019-04-02 06:30:00', '2019-04-06 07:35:00', 1, 0, 'fernandez.marguerite'),
(64, 'mzekrzrlk', 'mlefeglklkr', '2019-04-23 15:55:00', '2019-04-29 17:50:00', 0, 0, 'fernandez.marguerite');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `UserId` int(10) NOT NULL,
  `UserName` varchar(64) DEFAULT NULL,
  `UserRole` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`UserId`, `UserName`, `UserRole`) VALUES
(1, 'sailly.maxence', b'1'),
(7, 'synave.remi', b'1'),
(8, 'warin.bruno', b'0'),
(10, 'fernandez.marguerite', b'0'),
(11, 'pacou.anne', b'0'),
(12, 'grioche.vincent', b'0');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `EventId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
