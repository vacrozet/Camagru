-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 28 Avril 2017 à 16:55
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `camagru`
--
CREATE DATABASE IF NOT EXISTS `camagru` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `camagru`;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `index` int(11) NOT NULL,
  `login` varchar(520) NOT NULL,
  `password` varchar(520) NOT NULL,
  `nom` varchar(520) DEFAULT NULL,
  `prenom` varchar(520) DEFAULT NULL,
  `adresse` varchar(520) DEFAULT NULL,
  `CP` varchar(5) DEFAULT NULL,
  `Ville` varchar(520) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `mail` varchar(520) NOT NULL,
  `Actif` varchar(520) NOT NULL,
  `admin` varchar(520) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`index`, `login`, `password`, `nom`, `prenom`, `adresse`, `CP`, `Ville`, `numero`, `mail`, `Actif`, `admin`) VALUES(1, 'vacrozet', 'c7f0cefb862a18a00b03eccb8b90a1d045a71d18f9540f5f7bac579b644f7c9db9f3c46954425c47dbc5649496d26e08b0664a22029456b3a62740a338150317', 'crozet', 'valentin', '270, rue des fargets', '71570', 'Romaneche-thorins', '0637879360', 'crozet.valentin.42@gmail.com', 'OUI', 'OUI');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`index`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
