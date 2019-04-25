-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 07 fév. 2019 à 11:17
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
-- Base de données :  `web_challenge`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `EVENTS` (
  `EventId` int(10) NOT NULL,
  `EventTitre` varchar(64) DEFAULT NULL,
  `EventMessage` varchar(512) DEFAULT NULL,
  `EventDateDebut` datetime DEFAULT NULL,
  `EventDateFin` datetime DEFAULT NULL,
  `EventIsActiv` tinyint(6) DEFAULT NULL,
  `photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `EVENTS` (`EventId`, `EventTitre`, `EventMessage`, `EventDateDebut`, `EventDateFin`, `EventIsActiv`, `photo`) VALUES
(21, NULL, NULL, NULL, NULL, NULL, ''),
(22, 'test', 'test', '2019-02-01 00:00:00', '2019-02-01 00:00:00', 1, ''),
(23, 'test', '<div>testjkaezjkrkjr</div>', '2019-02-08 00:00:00', '2019-02-26 00:00:00', NULL, ''),
(24, 'test', '<div>test</div>', '2019-02-14 00:00:00', '2019-02-16 00:00:00', 1, '../src/image/21121win_20190207_08_44_26_pro.jpg'),
(25, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '../src/image/811887win_20190207_08_44_26_pro.jpg'),
(26, 'TESSST', '<div>OUI</div>', '2019-02-12 00:00:00', '2019-02-22 00:00:00', 1, '../src/image/965407iutlittoral-logo.png'),
(27, '', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `rights`
--

CREATE TABLE `RIGHTS` (
  `RightId` int(10) NOT NULL,
  `RightType` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `userrights`
--

CREATE TABLE `USERRIGHTS` (
  `UserRightId` int(10) NOT NULL,
  `RightId` int(10) DEFAULT NULL,
  `UserId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `USERS` (
  `UserId` int(10) NOT NULL,
  `UserName` varchar(64) DEFAULT NULL,
  `UserProfilePicture` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `events`
--
ALTER TABLE `EVENTS`
  ADD PRIMARY KEY (`EventId`);

--
-- Index pour la table `rights`
--
ALTER TABLE `RIGHTS`
  ADD PRIMARY KEY (`RightId`);

--
-- Index pour la table `userrights`
--
ALTER TABLE `USERRIGHTS`
  ADD PRIMARY KEY (`UserRightId`),
  ADD KEY `FK_UserRights_RightId` (`RightId`),
  ADD KEY `FK_UserRights_UserId` (`UserId`);

--
-- Index pour la table `users`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `EVENTS`
  MODIFY `EventId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `rights`
--
ALTER TABLE `RIGHTS`
  MODIFY `RightId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `userrights`
--
ALTER TABLE `USERRIGHTS`
  MODIFY `UserRightId` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `USERS`
  MODIFY `UserId` int(10) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `userrights`
--
ALTER TABLE `USERRIGHTS`
  ADD CONSTRAINT `FK_UserRights_RightId` FOREIGN KEY (`RightId`) REFERENCES `RIGHTS` (`RightId`),
  ADD CONSTRAINT `FK_UserRights_UserId` FOREIGN KEY (`UserId`) REFERENCES `USERS` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
