-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 21 Mars 2017 à 16:05
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `s4`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `jour` datetime NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `image` text,
  `corps` longtext NOT NULL,
  `validation` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `a_valider`
--

CREATE TABLE `a_valider` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `formation` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_article` int(11) NOT NULL,
  `id_commentaire` int(11) NOT NULL,
  `jour` datetime NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `commente` text NOT NULL,
  `validation` tinyint(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mailExpe` varchar(50) DEFAULT NULL,
  `mailDest` varchar(50) DEFAULT NULL,
  `DateH` datetime DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `forum`
--

INSERT INTO `forum` (`id`, `nom`, `description`) VALUES
(1, 'Methane', 'Cette partie du forum traitera de la methanisation'),
(2, 'Energie', 'Cette partie du forum traitera de l\'energie');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_topic` int(11) UNSIGNED NOT NULL,
  `id_auteur` int(11) UNSIGNED NOT NULL,
  `contenu` text COLLATE latin1_general_ci NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `post`
--

INSERT INTO `post` (`id`, `id_topic`, `id_auteur`, `contenu`, `date_creation`) VALUES
(1, 1, 1, 'Bonne idée. Merci!!', '2016-11-27 18:21:54'),
(2, 1, 2, 'Je pense que tu devrais appeler l\'équipe Think Tank initiaux', '2016-11-27 18:21:29'),
(3, 1, 1, 'Je n\'arrive pas à créer mon site!', '2016-11-27 10:12:47'),
(13, 29, 8, '<p>Voila voila...</p>\r\n', '2017-01-17 12:40:19'),
(14, 30, 8, '<p>Hello!</p>\r\n', '2017-01-17 12:40:48'),
(15, 1, 19, 'test120', '2017-03-21 15:43:09');

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_forum` int(11) UNSIGNED NOT NULL,
  `id_auteur` int(11) UNSIGNED NOT NULL,
  `titre` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `date_creation` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`id`, `id_forum`, `id_auteur`, `titre`, `date_creation`) VALUES
(1, 1, 8, 'Comment%20faire%3F', '2017-01-17 12:28:15'),
(29, 1, 8, 'Mon%20autre%20sujet', '2017-01-17 12:40:19'),
(30, 1, 8, 'Encore%20un%20sujet%21', '2017-01-17 12:40:48'),
(31, 1, 19, 'Test', '2017-03-21 16:00:42');

-- --------------------------------------------------------
--
-- Structure de la table `devoir_create`
--

CREATE TABLE `devoir_create` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `formation` varchar(255) DEFAULT NULL,
  `groupe` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `groupe` varchar(255) NOT NULL,
  `formation` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `pseudo`, `email`, `mdp`, `type`, `formation`) VALUES
(18, 'Hellegouarc\'h', 'pascale', 'Hellegouarc\'h pascale', 'pascale@gmail.com', '6e2ff91336d0acd3f5aa1f3fb89e4d458f6a8184', 'Administrateur', NULL),
(19, 'Rastouil', 'Sara', 'Rastouil Sara', 'sara.rastouil@gmail.com', 'd235db12624dee982601a09e459ce3b091d79eb3', 'Etudiant', 'Informatique'),
(20, 'Lutumba', 'Jonathan', 'Lutumba Jonathan', 'jonathan.Lutumba@gmail.com', 'a64c42660585b17444fc16e6a5ef0aa3808bfd33', 'Professeur', NULL),
(21, 'Lefevre', 'Jordan', 'Lefevre Jordan', 'jordan.Lefevre@gmail.com', '7733f86989d1b107ad9f5e0bc35c98ab7079203e', 'Ancien_Etudiant', NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `a_valider`
--
ALTER TABLE `a_valider`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_article` (`id_article`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auteur_post` (`id_auteur`),
  ADD KEY `id_topic_post` (`id_topic`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_auteur` (`id_auteur`),
  ADD KEY `id_forum_topic` (`id_forum`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `a_valider`
--
ALTER TABLE `a_valider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
