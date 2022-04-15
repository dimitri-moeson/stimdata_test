-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 15 avr. 2022 à 13:07
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données :  `stimdata_test`
--
CREATE DATABASE IF NOT EXISTS `stimdata_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `stimdata_test`;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Tronquer la table avant d'insérer `utilisateurs`
--

TRUNCATE TABLE `utilisateurs`;
--
-- Déchargement des données de la table `utilisateurs`
--

INSERT IGNORE INTO `utilisateurs` (`id`, `login`, `pswd`) VALUES
(1, 'test', '81dc9bdb52d04dc20036dbd8313ed055'), -- test/1234
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229'); -- demo/demo
COMMIT;
