-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 01 Avril 2021 à 14:43
-- Version du serveur :  5.7.32-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `timarche`
--

-- --------------------------------------------------------

--
-- Structure de la table `producteur`
--

CREATE TABLE `producteur` (
  `id` int(11) NOT NULL,
  `agriculteur` varchar(255) NOT NULL,
  `produit` varchar(255) NOT NULL,
  `miniature` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `secteur` varchar(255) NOT NULL,
  `valeur` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `producteur`
--

INSERT INTO `producteur` (`id`, `agriculteur`, `produit`, `miniature`, `prix`, `secteur`, `valeur`) VALUES
(13, 'abel', 'ah-keng', 'nnnnnn', 2000, 'sud', 'kilo');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adresse_mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `secteur` varchar(255) NOT NULL,
  `siret` bigint(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse_mail`, `adresse`, `pass`, `secteur`, `siret`) VALUES
(1, 'LAVIT', 'swann', 'lavit@swann', 'ffffff', '$2y$10$t23noX2kz28kK/rKoopSQuR2w6UI.in5Mn/uvIiPZKV49h14/UnpG', 'sud', 12345678912345),
(2, 'jean', 'bob', 'jean@bob', 'sesesesese', '$2y$10$Akr434VV9oLwQXOWAIjmieWdc6cbhMn./lvyfU72lMJ0voeKTp/fW', 'est', 32567897894567),
(3, 'jean', 'marie', 'admin@admin', 'admin', '$2y$10$LUxbT.FYicKwSpLytzptjOMrOvm8YG.Vi4cxVGUgKb1V3qCbcuPd6', 'nord', 12345678912345),
(4, 'LAVIT', 'swann', 'test@com.fr', '160 chemin boeuf', '$2y$10$ffskhVQU2COshEsRDqhLtOyEzss8uLRdURaVZ.4xbEMwlyXSKJZr6', 'est', 12345678912345),
(5, 'Louise ', 'Johan', 'louise@com.fr', '32 chemin brede', '$2y$10$80b8Xw5SSwJrvDkoRPc2ZOVPpsw4HEefWp8RtxzMmknVrwMH.VsTq', 'sud', 12345678912345);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `producteur`
--
ALTER TABLE `producteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `producteur`
--
ALTER TABLE `producteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
