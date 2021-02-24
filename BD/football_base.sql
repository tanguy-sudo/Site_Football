-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 fév. 2021 à 23:46
-- Version du serveur :  8.0.21
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `football_base`
--
CREATE DATABASE IF NOT EXISTS `football_base` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `football_base`;

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `id_absence` int NOT NULL AUTO_INCREMENT,
  `codeAbsence` enum('Blessé','Non-licencié','Suspendu','Absent') NOT NULL,
  `date` date NOT NULL,
  `id_Effectif` int NOT NULL,
  PRIMARY KEY (`id_absence`),
  KEY `FKid_Effectif` (`id_Effectif`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `calendrierrencontre`
--

DROP TABLE IF EXISTS `calendrierrencontre`;
CREATE TABLE IF NOT EXISTS `calendrierrencontre` (
  `id_rencontre` int NOT NULL AUTO_INCREMENT,
  `categorie` varchar(255) NOT NULL DEFAULT 'seniors',
  `competition` enum('Amical','Coupe de France','Coupe de l''Anjou','Coupe des Pays de la loire','Coupe des Réserves','D1 Groupe A','D4 Groupe E','D5 Groupe A') NOT NULL,
  `equipe` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `equipeAdverse` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `terrain` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rencontre`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `calendrierrencontre`
--

INSERT INTO `calendrierrencontre` (`id_rencontre`, `categorie`, `competition`, `equipe`, `equipeAdverse`, `date`, `heure`, `terrain`, `site`) VALUES
(1, 'seniors', 'Amical', 'SeniorsA', 'Ambillou ASVR 1', '2020-08-16', '14:45:00', 'Stade Alphonse leroi 1', 'Ambillou'),
(2, 'seniors', 'Coupe de l\'Anjou', 'SeniorsB', 'Valanjou AS 2', '2020-08-23', '15:00:00', 'Stade de contades', 'Allonnes'),
(3, 'seniors', 'Coupe des Pays de la loire', 'SeniorsA', 'Angers NDC 2', '2020-08-23', '15:00:00', 'Stade andré bertin 1', 'Bellevigne en Layon'),
(4, 'seniors', 'D4 Groupe E', 'SeniorsC', 'St Hilaire Vihiers 4', '2020-08-23', '15:00:00', 'Terrain A', 'Martigne');

-- --------------------------------------------------------

--
-- Structure de la table `convocation`
--

DROP TABLE IF EXISTS `convocation`;
CREATE TABLE IF NOT EXISTS `convocation` (
  `id_convocation` int NOT NULL AUTO_INCREMENT,
  `messageRdv` varchar(255) NOT NULL,
  `id_rencontre` int NOT NULL,
  PRIMARY KEY (`id_convocation`),
  KEY `FKid_rencontre` (`id_rencontre`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `convocation`
--

INSERT INTO `convocation` (`id_convocation`, `messageRdv`, `id_rencontre`) VALUES
(1, 'Venez habillé il fait froid', 1);

-- --------------------------------------------------------

--
-- Structure de la table `convoquee`
--

DROP TABLE IF EXISTS `convoquee`;
CREATE TABLE IF NOT EXISTS `convoquee` (
  `id_convoquee` int NOT NULL AUTO_INCREMENT,
  `id_effectif` int NOT NULL,
  `id_convocation` int NOT NULL,
  PRIMARY KEY (`id_convoquee`),
  KEY `FKid_Effectif` (`id_effectif`),
  KEY `FKid_convocation` (`id_convocation`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `convoquee`
--

INSERT INTO `convoquee` (`id_convoquee`, `id_effectif`, `id_convocation`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `effectif`
--

DROP TABLE IF EXISTS `effectif`;
CREATE TABLE IF NOT EXISTS `effectif` (
  `id_effectif` int NOT NULL AUTO_INCREMENT,
  `typeLicence` varchar(255) NOT NULL DEFAULT 'Libre',
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  PRIMARY KEY (`id_effectif`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `effectif`
--

INSERT INTO `effectif` (`id_effectif`, `typeLicence`, `prenom`, `nom`) VALUES
(1, 'Libre', 'Al', 'Ambiqué'),
(2, 'Libre', 'Bonnie', 'Dée'),
(3, 'Libre', 'Ève', 'Anescense'),
(4, 'Libre', 'Hal', 'Aniche'),
(5, 'Libre', 'Hubert', 'Gamote'),
(6, 'Libre', 'Jean', 'Tanlelou'),
(7, 'Libre', 'José', 'Patelefaire'),
(8, 'Libre', 'Marie', 'Covert'),
(9, 'Libre', 'Marie', 'Nière'),
(10, 'Libre', 'Marie', 'Rouanna'),
(11, 'Libre', 'Marion', 'Lait'),
(12, 'Libre', 'Marty', 'Ni'),
(13, 'Libre', 'Maude', 'Cologne'),
(14, 'Libre', 'Mehdi', 'Zan'),
(15, 'Libre', 'Mélusine', 'Engraiv'),
(16, 'Libre', 'Mouss', 'Tache'),
(17, 'Libre', 'Otto', 'Psie'),
(18, 'Libre', 'Paul', 'Iglotte'),
(19, 'Libre', 'Pierre', 'Oglyphe'),
(20, 'Libre', 'Sam', 'Soule'),
(21, 'Libre', 'Sophie', 'Stiqué'),
(22, 'Libre', 'Terry', 'Dicule'),
(23, 'Libre', 'Théo', 'Jasmin'),
(24, 'Libre', 'Jean-Pascal', 'Micheaux'),
(25, 'Libre', 'José', 'Milhaud'),
(26, 'Libre', 'Emmanuel', 'Barbeau'),
(27, 'Libre', 'Norbert', 'Bruguière'),
(28, 'Libre', 'François', 'Gagnon'),
(29, 'Libre', 'Marcel', 'Ardouin'),
(30, 'Libre', 'Léopold', 'D\'Aboville'),
(31, 'Libre', 'Abelin', 'Delaplace'),
(32, 'Libre', 'Anatole', 'Bonnot'),
(33, 'Libre', 'Alex', 'Compere'),
(34, 'Libre', 'Amandine', 'Dupuy'),
(35, 'Libre', 'Lydie', 'De Verley'),
(36, 'Libre', 'Lise', 'Trémaux'),
(37, 'Libre', 'Haydée', 'Batteux'),
(38, 'Libre', 'Anita', 'Jégou'),
(39, 'Libre', 'Guillemette', 'Jacquemoud'),
(40, 'Libre', 'Annie', 'Chappelle'),
(41, 'Libre', 'Aliénor', 'Courvoisier'),
(42, 'Libre', 'Clotilde', 'Rouzet'),
(43, 'Libre', 'Vanessa', 'Toutain');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `type` enum('entraineur','secretaire') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `adresseEmail` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `type`, `adresseEmail`, `motDePasse`) VALUES
(1, 'Brosseau', 'Aurélien', 'entraineur', 'aurelien.brosseau@hotmail.com', 'mdpaurelien'),
(2, 'Gaudreau', 'Frank', 'secretaire', 'frank.gaudreau@hotmail.com', 'mdpfrank');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
