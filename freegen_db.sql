-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 11 nov. 2022 à 11:31
-- Version du serveur : 10.3.36-MariaDB-0+deb10u2
-- Version de PHP : 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `freegen_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `connecte` tinyint(1) NOT NULL,
  `affiche` tinyint(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `alerts`
--

INSERT INTO `alerts` (`id`, `connecte`, `affiche`, `type`, `titre`, `contenu`, `date_time`) VALUES
(1, 1, 1, 'info', 'Bienvenue sur FreeGen, merci à Ceed#2117 d\'avoir partagé la source.', 'Merci de reporter tous les bugs sur le Github.', '2021-06-20 21:41:57');

-- --------------------------------------------------------

--
-- Structure de la table `cracks`
--

CREATE TABLE `cracks` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` text NOT NULL,
  `url_dl` text NOT NULL,
  `verouillage` int(11) NOT NULL DEFAULT 0,
  `vip` int(11) NOT NULL DEFAULT 0,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `generateur` varchar(255) DEFAULT NULL,
  `icon_gen` text NOT NULL,
  `stock_ajoute` int(11) NOT NULL DEFAULT 0,
  `faitpar` varchar(255) DEFAULT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `generateurs`
--

CREATE TABLE `generateurs` (
  `id` int(11) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` text NOT NULL,
  `icon_gif` text NOT NULL,
  `misenavant` int(11) NOT NULL DEFAULT 0,
  `table_stockage` varchar(30) NOT NULL,
  `verouillage` int(11) NOT NULL DEFAULT 0,
  `vip` int(11) NOT NULL DEFAULT 0,
  `tw` tinyint(1) NOT NULL DEFAULT 0,
  `linkvertise` varchar(100) NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `generateursvip`
--

CREATE TABLE `generateursvip` (
  `id` int(11) NOT NULL,
  `stock` int(11) DEFAULT 0,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` text NOT NULL,
  `icon_gif` text NOT NULL,
  `misenavant` int(11) NOT NULL DEFAULT 0,
  `table_stockage` varchar(30) NOT NULL,
  `verouillage` int(11) NOT NULL DEFAULT 0,
  `vip` int(11) NOT NULL DEFAULT 0,
  `tw` tinyint(1) NOT NULL DEFAULT 0,
  `linkvertise` varchar(100) NOT NULL DEFAULT '0',
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `grades`
--

INSERT INTO `grades` (`id`, `nom`, `permissions`, `date_time`) VALUES
(1, 'Utilisateur', '', '0000-00-00 00:00:00'),
(2, 'VIP', 'vipcheck', '0000-00-00 00:00:00'),
(3, 'VIP+', '', '0000-00-00 00:00:00'),
(4, 'Discord Booster', '', '0000-00-00 00:00:00'),
(5, 'Twittos', 'lounge', '0000-00-00 00:00:00'),
(6, 'Ami', 'lounge', '0000-00-00 00:00:00'),
(7, 'Support', 'index, utilisateurs, lounge', '0000-00-00 00:00:00'),
(8, 'Fournisseur', 'index, generateurs, generateursvip, restock, lounge', '0000-00-00 00:00:00'),
(9, 'Responsable', 'index, utilisateurs, utilisateur, generateurs, generateursvip, restock, lounge', '0000-00-00 00:00:00'),
(10, 'Administrateur', '*', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `historiques`
--

CREATE TABLE `historiques` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `compte` text NOT NULL,
  `favori` tinyint(1) NOT NULL DEFAULT 0,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `grade` enum('1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '1',
  `expiration` date DEFAULT NULL,
  `banni` tinyint(1) NOT NULL DEFAULT 0,
  `twitter` varchar(255) DEFAULT NULL,
  `discord` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `deletehash` varchar(255) DEFAULT NULL,
  `generations` int(11) NOT NULL DEFAULT 0,
  `generations_jour` int(11) NOT NULL DEFAULT 0,
  `derniere_generation` datetime DEFAULT NULL,
  `migre` tinyint(1) NOT NULL DEFAULT 0,
  `date_time_inscription` datetime NOT NULL,
  `ip_inscription` varchar(255) NOT NULL,
  `date_time_connexion` datetime DEFAULT NULL,
  `ip_connexion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `membres_old`
--

CREATE TABLE `membres_old` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `generations` int(11) NOT NULL,
  `date_time_inscription` text NOT NULL,
  `ip_inscription` text NOT NULL,
  `date_time_connexion` text NOT NULL,
  `ip_connexion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `montant` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

CREATE TABLE `parametres` (
  `nom` varchar(100) NOT NULL,
  `valeur` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `parametres`
--

INSERT INTO `parametres` (`nom`, `valeur`, `date_time`) VALUES
('generations_booster', '30', '2020-05-22 17:31:01'),
('generations_giant', '70', '2020-05-22 17:30:56'),
('generations_non_vip', '25', '2020-05-14 01:30:00'),
('generations_StarterPro', '50', '2020-05-14 19:23:05'),
('generations_totales', '0', '2020-04-21 00:00:00'),
('inscription', '1', '2020-05-21 11:46:07'),
('limite_comptes_nonvip', '1', '2022-11-08 10:59:50'),
('maintenance', '0', '2020-05-21 18:02:58');

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cracks`
--
ALTER TABLE `cracks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `generateurs`
--
ALTER TABLE `generateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `generateursvip`
--
ALTER TABLE `generateursvip`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historiques`
--
ALTER TABLE `historiques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `membres_old`
--
ALTER TABLE `membres_old`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parametres`
--
ALTER TABLE `parametres`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `cracks`
--
ALTER TABLE `cracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `generateurs`
--
ALTER TABLE `generateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `generateursvip`
--
ALTER TABLE `generateursvip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `historiques`
--
ALTER TABLE `historiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `membres_old`
--
ALTER TABLE `membres_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
