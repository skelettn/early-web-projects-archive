-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 02 août 2021 à 15:34
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coolink_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(255) NOT NULL,
  `comment_subject` varchar(255) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `firelink`
--

CREATE TABLE `firelink` (
  `id` int(11) NOT NULL,
  `unique_id` text NOT NULL,
  `mail` varchar(255) NOT NULL,
  `motdepasse` text NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `registerdate` varchar(32) NOT NULL,
  `confirm_key` text NOT NULL,
  `confirme` text NOT NULL,
  `prenomfamille` text NOT NULL,
  `avatar` text NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `ismoderateur` tinyint(1) NOT NULL,
  `isban` tinyint(1) NOT NULL,
  `ban_reason` text NOT NULL,
  `isconfirme` tinyint(1) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `website_title` text NOT NULL,
  `website_description` text NOT NULL,
  `website_picture` varchar(255) NOT NULL,
  `website_theme` varchar(255) NOT NULL,
  `website_color` text NOT NULL,
  `website_font` text NOT NULL,
  `beta_access` tinyint(1) NOT NULL,
  `website_statut` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `firelink`
--

INSERT INTO `firelink` (`id`, `unique_id`, `mail`, `motdepasse`, `pseudo`, `registerdate`, `confirm_key`, `confirme`, `prenomfamille`, `avatar`, `isadmin`, `ismoderateur`, `isban`, `ban_reason`, `isconfirme`, `premium`, `website_title`, `website_description`, `website_picture`, `website_theme`, `website_color`, `website_font`, `beta_access`, `website_statut`) VALUES
(5, '0d8e79abe6302d8db053b6be78b3a784', 'user@example.com', 'a7bf62303a7ae730c73ec4c421b92646a137272e', 'Shonned', '02/03/2021 à 21:27:19', '', '1', 'Kilian', 'c47eab241599440477807391b0263645.png', 0, 0, 0, '', 0, 1, '', '', '60adf956838768dc0c43714933be198c.gif', 'themebase', '', '', 1, 1),
(6, 'b4c1928d995e93a1363fc92b83a712f8', 'user@example.com', '9cf95dacd226dcf43da376cdb6cbba7035218921', 'Sh0nned', '02/08/2021 à 15:19:04', '', '1', 'Kilian Peyron', '', 0, 0, 0, '', 0, 1, 'Ma page', 'c\'est ma page', '0', '', '#000000', 'Lato', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `firelinkurlshortner`
--

CREATE TABLE `firelinkurlshortner` (
  `id` int(11) NOT NULL,
  `orig_url` varchar(255) NOT NULL,
  `unique_exten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `firelinkurlshortner`
--

INSERT INTO `firelinkurlshortner` (`id`, `orig_url`, `unique_exten`) VALUES
(1, 'https://www.shorturl.at/', 'a7b'),
(2, 'https://www.shorturl.at/', '50c'),
(3, 'https://www.shorturl.at/', '749'),
(4, 'https://www.shorturl.at/', '067'),
(5, 'https://www.shorturl.at/', '9c3'),
(6, 'https://www.shorturl.at/', '5a0'),
(7, 'http://firelnk.gg', '991'),
(8, 'http://firelnk.gg', 'd17'),
(9, 'http://firelnk.gg', 'd8f'),
(10, 'http://firelnk.gg', '1f0'),
(11, 'http://firelnk.gg', '209'),
(12, 'http://firelnk.gg', '3ba'),
(13, 'http://firelnk.gg', '6d8'),
(14, 'http://firelnk.gg', '1e3'),
(15, 'http://firelnk.gg', 'efc'),
(16, 'https://www.shorturl.at/', 'bfe'),
(17, 'https://www.shorturl.at/', 'f1e');

-- --------------------------------------------------------

--
-- Structure de la table `my_links`
--

CREATE TABLE `my_links` (
  `id` int(11) NOT NULL,
  `unique_id` text NOT NULL,
  `link_id` text NOT NULL,
  `link_title` text NOT NULL,
  `link_theme` text NOT NULL,
  `link_redirection` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `my_links`
--

INSERT INTO `my_links` (`id`, `unique_id`, `link_id`, `link_title`, `link_theme`, `link_redirection`) VALUES
(1, 'b4c1928d995e93a1363fc92b83a712f8', '394279', 'YouTube', 'themered', 'http://youtube.com'),
(2, 'b4c1928d995e93a1363fc92b83a712f8', '61507862', 'FB', 'themeblue', 'http://fb.com');

-- --------------------------------------------------------

--
-- Structure de la table `recuperation`
--

CREATE TABLE `recuperation` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `confirme` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `report_firelink`
--

CREATE TABLE `report_firelink` (
  `id` int(11) NOT NULL,
  `report_type` varchar(255) NOT NULL,
  `linkreport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Index pour la table `firelink`
--
ALTER TABLE `firelink`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `firelinkurlshortner`
--
ALTER TABLE `firelinkurlshortner`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `my_links`
--
ALTER TABLE `my_links`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recuperation`
--
ALTER TABLE `recuperation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `report_firelink`
--
ALTER TABLE `report_firelink`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `firelink`
--
ALTER TABLE `firelink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `firelinkurlshortner`
--
ALTER TABLE `firelinkurlshortner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `my_links`
--
ALTER TABLE `my_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `recuperation`
--
ALTER TABLE `recuperation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `report_firelink`
--
ALTER TABLE `report_firelink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
