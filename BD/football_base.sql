-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 27 mars 2021 à 11:36
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
  `codeAbsence` enum('Blessé','Suspendu','Absent') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL,
  `id_Effectif` int NOT NULL,
  PRIMARY KEY (`id_absence`),
  KEY `FKid_Effectif` (`id_Effectif`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id_absence`, `codeAbsence`, `date`, `id_Effectif`) VALUES
(1, 'Blessé', '2020-08-16', 1),
(99, 'Blessé', '2021-04-11', 2),
(10, 'Suspendu', '2021-02-21', 3),
(63, 'Blessé', '2021-04-15', 1),
(50, 'Blessé', '2021-03-10', 1),
(59, 'Blessé', '2021-04-11', 1),
(60, 'Blessé', '2021-04-12', 1),
(61, 'Blessé', '2021-04-13', 1),
(64, 'Blessé', '2021-04-16', 1),
(65, 'Blessé', '2021-04-17', 1),
(67, 'Blessé', '2021-03-11', 71),
(102, 'Blessé', '2021-04-05', 31),
(98, 'Blessé', '2021-04-11', 31),
(77, 'Blessé', '2021-03-01', 31),
(78, 'Absent', '2021-03-08', 4),
(105, 'Blessé', '2021-04-08', 31),
(97, 'Blessé', '2021-03-15', 31),
(100, 'Blessé', '2021-03-24', 31),
(101, 'Blessé', '2021-04-04', 31),
(103, 'Blessé', '2021-04-06', 31),
(104, 'Blessé', '2021-04-07', 31),
(106, 'Blessé', '2021-04-09', 31),
(107, 'Blessé', '2021-04-10', 31),
(108, 'Blessé', '2021-04-17', 31),
(109, 'Blessé', '2021-04-16', 31),
(110, 'Blessé', '2021-04-15', 31),
(111, 'Blessé', '2021-04-14', 31),
(112, 'Blessé', '2021-04-13', 31),
(113, 'Blessé', '2021-04-12', 31),
(114, 'Suspendu', '2021-04-18', 31),
(115, 'Suspendu', '2021-04-19', 31),
(116, 'Suspendu', '2021-04-20', 31),
(117, 'Suspendu', '2021-04-21', 31),
(118, 'Suspendu', '2021-04-22', 31),
(119, 'Suspendu', '2021-04-23', 31),
(120, 'Suspendu', '2021-04-24', 31),
(121, 'Blessé', '2021-04-18', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `calendrierrencontre`
--

INSERT INTO `calendrierrencontre` (`id_rencontre`, `categorie`, `competition`, `equipe`, `equipeAdverse`, `date`, `heure`, `terrain`, `site`) VALUES
(2, 'seniors', 'Coupe de l\'Anjou', 'SeniorsB', 'Valanjou AS 2', '2020-08-23', '15:00:00', 'Stade de contades', 'Allonnes'),
(3, 'seniors', 'Coupe des Pays de la loire', 'SeniorsA', 'Angers NDC 2', '2020-08-23', '15:00:00', 'Stade andré bertin 1', 'Bellevigne en Layon'),
(4, 'seniors', 'D4 Groupe E', 'SeniorsC', 'St Hilaire Vihiers 4', '2020-08-23', '15:00:00', 'Terrain A', 'Martigne'),
(65, 'seniors', 'Coupe des Réserves', 'SeniorsA', 'Pellouailles Corze 1', '2021-04-11', '10:00:00', 'Stade Raymond Gaboriau 1', 'Sevremoine'),
(66, 'seniors', 'Coupe des Pays de la loire', 'SeniorsB', 'Bouchemaine Es 3', '2021-04-11', '15:00:00', 'Stade Julien Lambert 1', 'St Melaine Sur Aubance'),
(67, 'seniors', 'Coupe de l\'Anjou', 'SeniorsC', 'Valanjou As 2', '2021-04-11', '17:00:00', 'Terrain A', 'Stade Municipal'),
(68, 'seniors', 'Coupe de France', 'SeniorsA', 'AMBILLOU ASVR 2', '2021-04-18', '14:00:00', 'Stade andré laurent', 'Ambillou'),
(69, 'seniors', 'Coupe des Réserves', 'SeniorsB', 'CORON OSTVC 2', '2021-04-18', '16:00:00', 'STADE DES RONDIÈRES', 'LES ROSIERS SUR LOIRE'),
(70, 'seniors', 'D4 Groupe E', 'SeniorsC', 'SAUMUR OFC 3', '2021-04-18', '10:00:00', 'TERRAIN A', 'MARTIGNE');

-- --------------------------------------------------------

--
-- Structure de la table `convocation`
--

DROP TABLE IF EXISTS `convocation`;
CREATE TABLE IF NOT EXISTS `convocation` (
  `id_convocation` int NOT NULL AUTO_INCREMENT,
  `messageRdv` varchar(255) NOT NULL,
  `publier` tinyint(1) NOT NULL DEFAULT '0',
  `id_rencontre` int NOT NULL,
  PRIMARY KEY (`id_convocation`),
  KEY `FKid_rencontre` (`id_rencontre`)
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `convocation`
--

INSERT INTO `convocation` (`id_convocation`, `messageRdv`, `publier`, `id_rencontre`) VALUES
(1, 'Venez habillé il fait froid', 1, 2),
(2, 'derrière le gymnase', 1, 3),
(3, 'En face d\'une superette ', 1, 4),
(126, 'il pleut', 0, 68),
(125, 'testC', 0, 67),
(123, 'testA', 0, 65),
(124, 'testB', 0, 66),
(127, 'il fait beau', 0, 69),
(128, 'il fait froid', 0, 70);

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
) ENGINE=MyISAM AUTO_INCREMENT=1119 DEFAULT CHARSET=utf8;

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
(12, 12, 1),
(13, 14, 2),
(14, 15, 2),
(15, 16, 2),
(16, 17, 2),
(17, 18, 2),
(18, 19, 2),
(19, 20, 2),
(20, 21, 2),
(21, 22, 2),
(22, 23, 2),
(23, 24, 2),
(24, 25, 2),
(25, 26, 2),
(26, 27, 3),
(27, 28, 3),
(28, 29, 3),
(29, 30, 3),
(30, 31, 3),
(31, 32, 3),
(32, 33, 3),
(33, 34, 3),
(34, 35, 3),
(35, 36, 3),
(36, 37, 3),
(37, 38, 3),
(38, 39, 3),
(39, 40, 3),
(40, 41, 3),
(1109, 35, 128),
(1108, 36, 128),
(1107, 30, 128),
(1106, 7, 127),
(1098, 4, 127),
(1097, 28, 127),
(1096, 3, 127),
(1095, 26, 127),
(1094, 42, 126),
(1093, 63, 126),
(1092, 56, 126),
(1091, 2, 126),
(1077, 12, 125),
(1076, 46, 125),
(1054, 26, 123),
(1053, 42, 123),
(1052, 63, 123),
(1105, 25, 127),
(1104, 47, 127),
(1103, 24, 127),
(1102, 6, 127),
(1101, 50, 127),
(1090, 44, 126),
(1087, 32, 126),
(1086, 34, 126),
(1085, 41, 126),
(1084, 33, 126),
(1083, 1, 126),
(1082, 31, 126),
(1081, 15, 125),
(1080, 14, 125),
(1079, 13, 125),
(1078, 53, 125),
(1075, 45, 125),
(1089, 40, 126),
(1100, 5, 127),
(1099, 37, 127),
(1088, 38, 126),
(1117, 46, 128),
(1116, 45, 128),
(1115, 11, 128),
(1114, 10, 128),
(1113, 9, 128),
(1112, 8, 128),
(1111, 48, 128),
(1110, 29, 128),
(1074, 11, 125),
(1073, 10, 125),
(1118, 12, 128),
(1072, 9, 125),
(1051, 56, 123),
(1065, 7, 124),
(1064, 25, 124),
(1063, 47, 124),
(1062, 24, 124),
(1050, 44, 123),
(1049, 40, 123),
(1048, 38, 123),
(1047, 32, 123),
(1046, 34, 123),
(1061, 6, 124),
(1071, 8, 125),
(1070, 48, 125),
(1069, 29, 124),
(1068, 35, 124),
(1067, 36, 124),
(1066, 30, 124),
(1045, 41, 123),
(1044, 33, 123),
(1060, 50, 124),
(1059, 5, 124),
(1058, 37, 124),
(1057, 4, 124),
(1056, 28, 123),
(1055, 3, 123);

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
  `Licence` varchar(3) DEFAULT 'oui',
  PRIMARY KEY (`id_effectif`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `effectif`
--

INSERT INTO `effectif` (`id_effectif`, `typeLicence`, `prenom`, `nom`, `Licence`) VALUES
(1, 'Libre', 'Al', 'Ambiqué', 'oui'),
(2, 'Libre', 'Bonnie', 'Dée', 'oui'),
(3, 'Libre', 'Ève', 'Anescense', 'oui'),
(4, 'Libre', 'Hal', 'Aniche', 'oui'),
(5, 'Libre', 'Hubert', 'Gamote', 'oui'),
(6, 'Libre', 'Jean', 'Tanlelou', 'oui'),
(7, 'Libre', 'José', 'Patelefaire', 'oui'),
(8, 'Libre', 'Marie', 'Covert', 'oui'),
(9, 'Libre', 'Marie', 'Nière', 'oui'),
(10, 'Libre', 'Marie', 'Rouanna', 'oui'),
(11, 'Libre', 'Marion', 'Lait', 'oui'),
(12, 'Libre', 'Marty', 'Ni', 'oui'),
(13, 'Libre', 'Maude', 'Cologne', 'oui'),
(14, 'Libre', 'Mehdi', 'Zan', 'oui'),
(15, 'Libre', 'Mélusine', 'Engraiv', 'oui'),
(16, 'Libre', 'Mouss', 'Tache', 'oui'),
(17, 'Libre', 'Otto', 'Psie', 'oui'),
(18, 'Libre', 'Paul', 'Iglotte', 'oui'),
(19, 'Libre', 'Pierre', 'Oglyphe', 'oui'),
(20, 'Libre', 'Sam', 'Soule', 'oui'),
(21, 'Libre', 'Sophie', 'Stiqué', 'oui'),
(22, 'Libre', 'Terry', 'Dicule', 'oui'),
(23, 'Libre', 'Théo', 'Jasmin', 'oui'),
(24, 'Libre', 'Jean-Pascal', 'Micheaux', 'oui'),
(25, 'Libre', 'José', 'Milhaud', 'oui'),
(26, 'Libre', 'Emmanuel', 'Barbeau', 'oui'),
(27, 'Libre', 'Norbert', 'Bruguière', 'oui'),
(28, 'Libre', 'François', 'Gagnon', 'oui'),
(29, 'Libre', 'Marcel', 'Ardouin', 'oui'),
(30, 'Libre', 'Léopold', 'D\'Aboville', 'oui'),
(31, 'Libre', 'Abelin', 'Delaplace', 'oui'),
(32, 'Libre', 'Anatole', 'Bonnot', 'oui'),
(33, 'Libre', 'Alex', 'Compere', 'oui'),
(34, 'Libre', 'Amandine', 'Dupuy', 'oui'),
(35, 'Libre', 'Lydie', 'De Verley', 'oui'),
(36, 'Libre', 'Lise', 'Trémaux', 'oui'),
(37, 'Libre', 'Haydée', 'Batteux', 'oui'),
(38, 'Libre', 'Anita', 'Jégou', 'oui'),
(39, 'Libre', 'Guillemette', 'Jacquemoud', 'non'),
(40, 'Libre', 'Annie', 'Chappelle', 'oui'),
(41, 'Libre', 'Aliénor', 'Courvoisier', 'oui'),
(42, 'Libre', 'Clotilde', 'Rouzet', 'oui'),
(43, 'Libre', 'Vanessa', 'Toutain', 'oui'),
(44, 'Libre', 'Blaise', 'Cochet', 'oui'),
(45, 'Libre', 'Marius', 'Jacquier', 'oui'),
(46, 'Libre', 'Martial', 'Couturier', 'oui'),
(47, 'Libre', 'Jérémie', 'Arsenault', 'oui'),
(48, 'Libre', 'Marcel', 'Descombes', 'oui'),
(49, 'Libre', 'Valentin', 'Morel', 'oui'),
(50, 'Libre', 'Ignace', 'Brunelle', 'oui'),
(51, 'Libre', 'Robin', 'Delon', 'non'),
(52, 'Libre', 'Timothé', 'Lefrançois', 'oui'),
(53, 'Libre', 'Mathis', 'Pierlot', 'oui'),
(56, 'Libre', 'celia', 'robin', 'oui'),
(57, 'Libre', 'johan', 'larc', 'non'),
(62, 'Libre', 'loupo', 'nathanaël', 'non'),
(59, 'Libre', 'laure', 'leon', 'non'),
(63, 'Libre', 'charles', 'leon', 'oui');

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
  `motDePasse` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `nom`, `prenom`, `type`, `adresseEmail`, `motDePasse`) VALUES
(1, 'Brosseau', 'Aurélien', 'entraineur', 'aurelien.brosseau@hotmail.com', '$2y$13$myy9JFVc8tcQAG.xBSShn.BFBIy01zaB11jGsOHevPELFWYaOS0LO'),
(2, 'Gaudreau', 'Frank', 'secretaire', 'frank.gaudreau@hotmail.com', '$2y$13$/s.h3gxsmOAzyyFHOwgtueevBUxfQYhl/mkEWLxOCqhTCZUkUBCL6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
