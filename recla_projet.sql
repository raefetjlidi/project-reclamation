-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 12 déc. 2021 à 21:59
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `recla_projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `motif`
--

CREATE TABLE `motif` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `motif`
--

INSERT INTO `motif` (`id`, `type`) VALUES
(23, 'Dr'),
(24, 'Dd'),
(25, 'Dr'),
(26, 'Dr'),
(27, 'Dd'),
(28, 'Dr'),
(29, 'Dr'),
(30, 'Dr'),
(31, 'Dr'),
(32, 'Demande_devis'),
(33, 'Demande_devis'),
(34, 'Demande_devis'),
(35, 'Demande_Divers'),
(36, 'Reclamation'),
(37, 'Reclamation'),
(38, 'Reclamation'),
(39, 'Reclamation'),
(40, 'Reclamation'),
(41, 'Demande_devis'),
(42, 'Demande_Divers'),
(43, 'Demande_Divers'),
(44, 'Demande_Divers'),
(45, 'Demande_Divers'),
(46, 'Demande_Divers'),
(47, 'Demande_Divers'),
(48, 'Demande_Divers'),
(49, 'Demande_devis'),
(50, 'Demande_devis'),
(51, 'Demande_Divers'),
(52, 'Demande_devis'),
(53, 'Demande_Divers'),
(54, 'Demande_Divers'),
(55, 'Demande_Divers'),
(56, 'Demande_Divers'),
(57, 'Demande_Divers'),
(58, 'Demande_Divers'),
(59, 'Demande_Divers'),
(60, 'Demande_Divers'),
(61, 'Reclamation'),
(62, 'Reclamation'),
(63, 'Demande_devis'),
(64, 'Demande_Divers'),
(65, 'Demande_Divers');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE `reclamation` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `explication` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reclamation`
--

INSERT INTO `reclamation` (`id`, `name`, `email`, `phone`, `subject`, `explication`) VALUES
(121, 'raeft', 'test@fff.com', 58313907, 'Raeft', 'dsfkdsjfsk'),
(122, 'test', 'test@fff.com', 588888, 'dsfdsfds', 'dsfsdfsfdsfd'),
(123, 'sdfsdfs', 'sdfsdfds', 45454, '445', 'dsfsdfsdfsdf\r\n'),
(124, 'sdfsdfs', 'sdfsdfds', 45454, '445', 'dsfsdfsdfsdf\r\n'),
(125, 'test', 'test@fff.com', 555555, 'aaaa', 'dsfsdfsdf');

-- --------------------------------------------------------

--
-- Structure de la table `reclamation_motif`
--

CREATE TABLE `reclamation_motif` (
  `motif_id` int(11) DEFAULT NULL,
  `recla_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reclamation_motif`
--

INSERT INTO `reclamation_motif` (`motif_id`, `recla_id`) VALUES
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(NULL, NULL),
(62, 121),
(63, 122),
(64, 124),
(65, 125);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reclamation_motif`
--
ALTER TABLE `reclamation_motif`
  ADD KEY `motif_id` (`motif_id`),
  ADD KEY `recla_id` (`recla_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `motif`
--
ALTER TABLE `motif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `reclamation`
--
ALTER TABLE `reclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reclamation_motif`
--
ALTER TABLE `reclamation_motif`
  ADD CONSTRAINT `reclamation_motif_ibfk_1` FOREIGN KEY (`motif_id`) REFERENCES `motif` (`id`),
  ADD CONSTRAINT `reclamation_motif_ibfk_2` FOREIGN KEY (`recla_id`) REFERENCES `reclamation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
