-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 02 mars 2021 à 21:52
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `link7_bd`
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
  `prenomfamille` text NOT NULL,
  `avatar` text NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `ismoderateur` tinyint(1) NOT NULL,
  `isban` tinyint(1) NOT NULL,
  `ban_reason` text NOT NULL,
  `isconfirme` tinyint(1) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `logo_animate` tinyint(1) NOT NULL,
  `follow_btn` tinyint(1) NOT NULL,
  `website_title` varchar(255) NOT NULL,
  `website_description` varchar(255) NOT NULL,
  `website_button_name` varchar(255) NOT NULL,
  `website_button1_name` varchar(255) NOT NULL,
  `website_button2_name` varchar(255) NOT NULL,
  `website_button_theme` varchar(255) NOT NULL,
  `website_button1_theme` varchar(255) NOT NULL,
  `website_button2_theme` varchar(255) NOT NULL,
  `website_button_service` varchar(255) NOT NULL,
  `website_button1_service` varchar(255) NOT NULL,
  `website_button2_service` varchar(255) NOT NULL,
  `website_picture` varchar(255) NOT NULL,
  `website_theme` varchar(255) NOT NULL,
  `website_theme_galaxy_claimed` tinyint(1) NOT NULL,
  `website_theme_beta_claimed` tinyint(1) NOT NULL,
  `beta_access` tinyint(1) NOT NULL,
  `website_button_redirect` varchar(255) NOT NULL,
  `website_button1_redirect` varchar(255) NOT NULL,
  `website_button2_redirect` varchar(255) NOT NULL,
  `website_statut` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `firelink`
--

INSERT INTO `firelink` (`id`, `unique_id`, `mail`, `motdepasse`, `pseudo`, `registerdate`, `prenomfamille`, `avatar`, `isadmin`, `ismoderateur`, `isban`, `ban_reason`, `isconfirme`, `premium`, `logo_animate`, `follow_btn`, `website_title`, `website_description`, `website_button_name`, `website_button1_name`, `website_button2_name`, `website_button_theme`, `website_button1_theme`, `website_button2_theme`, `website_button_service`, `website_button1_service`, `website_button2_service`, `website_picture`, `website_theme`, `website_theme_galaxy_claimed`, `website_theme_beta_claimed`, `beta_access`, `website_button_redirect`, `website_button1_redirect`, `website_button2_redirect`, `website_statut`) VALUES
(5, '0d8e79abe6302d8db053b6be78b3a784', 'user@example.com', 'a7bf62303a7ae730c73ec4c421b92646a137272e', 'Shonned', '02/03/2021 à 21:27:19', 'Kilian', 'c47eab241599440477807391b0263645.png', 0, 0, 0, '', 0, 1, 0, 0, 'Kilian Jvn', 'a', '0', '0', '0', '0', '0', '0', '0', '0', '0', '60adf956838768dc0c43714933be198c.gif', 'themebase', 0, 0, 1, '0', '0', '0', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `firelinkurlshortner`
--
ALTER TABLE `firelinkurlshortner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
