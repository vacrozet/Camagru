-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 30 Mai 2017 à 16:38
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `camagru_ok`
--
CREATE DATABASE IF NOT EXISTS `camagru_ok` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `camagru_ok`;

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `index` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL,
  `id_user_like` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Picture`
--

CREATE TABLE IF NOT EXISTS `Picture` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(45) NOT NULL,
  `path` varchar(45) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(520) NOT NULL,
  `password` varchar(520) NOT NULL,
  `mail` varchar(520) NOT NULL,
  `Actif` varchar(520) NOT NULL,
  `admin` varchar(520) NOT NULL,
  `nb_picture` int(11) NOT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`index`, `login`, `password`, `mail`, `Actif`, `admin`, `nb_picture`) VALUES(1, 'vacrozet', 'c7f0cefb862a18a00b03eccb8b90a1d045a71d18f9540f5f7bac579b644f7c9db9f3c46954425c47dbc5649496d26e08b0664a22029456b3a62740a338150317', 'crozet.valentin.42@gmail.com', 'OUI', 'OUI', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
