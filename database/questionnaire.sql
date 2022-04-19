-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 07 avr. 2022 à 14:16
-- Version du serveur : 8.0.28
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `questionnaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int NOT NULL AUTO_INCREMENT,
  `qno` int NOT NULL,
  `question` text NOT NULL,
  `ans1` text NOT NULL,
  `ans2` text NOT NULL,
  `ans3` text NOT NULL,
  `ans4` text NOT NULL,
  `correct_answer` varchar(1) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`qid`, `qno`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_answer`) VALUES
(9, 5, 'Le microprocesseur a &eacute;t&eacute; introduit dans quelle g&eacute;n&eacute;ration d&rsquo;ordinateur ?', 'Deuxi&egrave;me g&eacute;n&eacute;ration', 'Troisi&egrave;me g&eacute;n&eacute;ration', 'Quatri&egrave;me g&eacute;n&eacute;ration', 'Tout les r&eacute;ponses sont vrais.', 'a'),
(8, 3, 'Le syst&egrave;me binaire utilise la base ______ ?', '16', '8', '10', '2', 'd'),
(7, 2, 'Lequel des langages suivants est mieux adapt&eacute; au programmation structur&eacute; ?', 'PL/SQL', 'FORTRAN', 'PASCAL', 'PROLOG', 'c'),
(6, 1, 'Laquelle des m&eacute;moires suivantes est non volatile ?', 'SRAM', 'DRAM', 'ROM', 'Tout les r&eacute;ponses sont vrais.', 'a'),
(5, 4, 'Un programme qui convertit le langage assembleur en langage machine est appel&eacute; _______ ?', 'Assembleur', 'Interpr&egrave;teur', 'Compilateur', 'Comparateur', 'a'),
(10, 6, 'Quel protocole fournit un service de messagerie entre diff&eacute;rents h&ocirc;tes ?', 'FTP', 'TELNET', 'SMTP', 'SNMP', 'c'),
(11, 7, 'Le cerveau de tout syst&egrave;me informatique est _________ ?', 'Unit&eacute; de contr&ocirc;le', 'M&eacute;moire', 'CPU', 'Aucune de ces r&eacute;ponses n&rsquo;est vraie.', 'a');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `played_on` varchar(225) NOT NULL,
  `score` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `played_on`, `score`) VALUES
(1, 'Elliot', 'elliotaversenq@gmail.com', '2022-02-09 00:13:28', 2),
(2, 'Ezjfez', 'ezjfezgf@gmao.com', '2022-02-10 08:32:02', 1),
(3, 'Efnje', 'efnje@gmi.com', '2022-02-09 10:50:02', 1),
(4, 'Bot', 'ia@email.com', '2022-02-09 10:41:33', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
