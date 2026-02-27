-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 16 déc. 2023 à 19:03
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kiju`
--

-- --------------------------------------------------------

--
-- Structure de la table `auth_token`
--

CREATE TABLE `auth_token` (
  `id` int(11) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Expiration` int(11) NOT NULL,
  `IP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auth_token`
--

INSERT INTO `auth_token` (`id`, `Token`, `UserID`, `Expiration`, `IP`) VALUES
(36, '830e09493df0f8dec70cbdbb28c766e0183816e185623f8e19c2a982cea85529', 4, 1703964578, '127.0.0.1'),
(37, 'ff52b3a1e1775ebb3e80c0448d581ff6469308e183fd87f15bbb381bcb48f04f', 4, 1704569878, '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `community`
--

CREATE TABLE `community` (
  `CommunityID` int(11) NOT NULL,
  `CommunityUID` varchar(255) NOT NULL,
  `OwnerID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Bio` text NOT NULL,
  `Banner` varchar(255) NOT NULL,
  `IsVerified` tinyint(1) NOT NULL,
  `Deleted` tinyint(1) NOT NULL,
  `CreationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `community`
--

INSERT INTO `community` (`CommunityID`, `CommunityUID`, `OwnerID`, `Name`, `Bio`, `Banner`, `IsVerified`, `Deleted`, `CreationDate`) VALUES
(1, '364041306413', 1, 'Global', '', 'https://assets.kiju.me/img/Global_Community_Banner.png', 1, 0, '2023-11-15 21:04:28'),
(2, '322687303106', 1, 'Global 2', '', 'https://assets.kiju.me/img/communities/Banner/Music_Community_Banner.png', 1, 0, '0000-00-00 00:00:00'),
(3, '804284772602', 1, 'Gaming', '', 'https://assets.kiju.me/img/communities/Banner/Gaming_Community_Banner.png', 1, 0, '0000-00-00 00:00:00'),
(4, '204187237411', 1, 'Cinema', '', 'https://assets.kiju.me/img/communities/Banner/Cinema_Community_Banner.png', 1, 0, '0000-00-00 00:00:00'),
(5, '921325043616', 1, 'Kiju Updates', 'News for Kiju', 'https://medias.kiju.me/?get=650ef36c24bb29.62901376a8.jpg', 0, 0, '0000-00-00 00:00:00'),
(8, '109734856738', 4, 'debug 10.16 2', 'Description', 'https://assets.kiju.me/img/Global_Community_Banner.png', 0, 0, '2023-11-12 12:09:58'),
(9, '152474178542', 4, '10.14 debug 3', '', 'https://assets.kiju.me/img/Global_Community_Banner.png', 0, 0, '2023-11-26 16:28:24'),
(10, '625374861095', 4, '10.15 debug1', '', '', 0, 0, '2023-12-02 14:01:10');

-- --------------------------------------------------------

--
-- Structure de la table `community_member`
--

CREATE TABLE `community_member` (
  `MemberID` int(11) NOT NULL,
  `CommunityUserID` int(11) NOT NULL,
  `CommunityID` int(11) NOT NULL,
  `CreationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `community_member`
--

INSERT INTO `community_member` (`MemberID`, `CommunityUserID`, `CommunityID`, `CreationDate`) VALUES
(2, 2, 1, '2023-06-01 20:31:47'),
(3, 3, 1, '2023-06-03 12:31:49'),
(4, 1, 3, '2023-06-04 15:01:39'),
(5, 1, 4, '2023-06-04 15:01:39'),
(9, 1, 1, '2023-09-03 19:37:20'),
(10, 1, 5, '2023-09-23 16:11:43'),
(11, 4, 1, '2023-10-04 23:27:38'),
(14, 4, 2, '2023-11-08 21:34:27'),
(15, 4, 8, '2023-11-12 12:09:58'),
(16, 4, 9, '2023-11-26 16:28:24'),
(17, 4, 10, '2023-12-02 14:01:10');

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `version` text NOT NULL,
  `kiju_maintenance` tinyint(1) NOT NULL,
  `ac_maintenance` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `config`
--

INSERT INTO `config` (`id`, `version`, `kiju_maintenance`, `ac_maintenance`) VALUES
(1, '0', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `email_authentication`
--

CREATE TABLE `email_authentication` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Code` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `email_authentication`
--

INSERT INTO `email_authentication` (`id`, `UserID`, `Code`, `Status`) VALUES
(40, 4, 958361, 1);

-- --------------------------------------------------------

--
-- Structure de la table `follower`
--

CREATE TABLE `follower` (
  `FollowerID` int(11) NOT NULL,
  `UserFollowedID` int(11) NOT NULL,
  `UserFollowerID` int(11) NOT NULL,
  `CreationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `follower`
--

INSERT INTO `follower` (`FollowerID`, `UserFollowedID`, `UserFollowerID`, `CreationDate`) VALUES
(2, 1, 3, '2023-06-03 13:32:17'),
(5, 2, 1, '2023-06-16 14:00:37'),
(10, 3, 1, '2023-10-03 16:49:05'),
(13, 1, 4, '2023-10-13 21:28:06');

-- --------------------------------------------------------

--
-- Structure de la table `issues`
--

CREATE TABLE `issues` (
  `IssueID` int(11) NOT NULL,
  `Detail` text NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `issues`
--

INSERT INTO `issues` (`IssueID`, `Detail`, `Status`) VALUES
(1, 'Les publications sont affichés dans les réponses', 1),
(2, 'Problème de chargement des publications', 1),
(3, 'Problème de fermeture des fenêtres', 1),
(4, 'Problème avec la création de communautés', 2);

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

CREATE TABLE `like` (
  `LikeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `CreationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `like`
--

INSERT INTO `like` (`LikeID`, `UserID`, `PostID`, `CreationDate`) VALUES
(36, 1, 89, '2023-10-03 16:49:45'),
(39, 1, 88, '2023-10-04 23:46:34'),
(56, 4, 91, '2023-10-05 09:17:43'),
(58, 4, 97, '2023-10-16 20:52:13'),
(68, 4, 88, '2023-11-18 17:02:03'),
(70, 4, 106, '2023-11-18 17:57:37'),
(72, 4, 128, '2023-11-22 21:22:10'),
(73, 4, 89, '2023-11-22 21:22:12'),
(81, 4, 105, '2023-12-02 13:15:08'),
(82, 4, 129, '2023-12-02 13:52:44'),
(83, 4, 140, '2023-12-02 14:00:59'),
(88, 4, 109, '2023-12-16 10:43:30'),
(91, 4, 107, '2023-12-16 17:28:46');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `MediaID` int(11) NOT NULL,
  `MediaUID` varchar(255) NOT NULL,
  `MediaURL` varchar(255) NOT NULL,
  `PostID` int(11) NOT NULL,
  `CreationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`MediaID`, `MediaUID`, `MediaURL`, `PostID`, `CreationDate`) VALUES
(8, '657de59973c0a6.61813223f9.png', 'https://medias.kiju.me/?get=657de59973c0a6.61813223f9.png', 149, '2023-12-16 18:59:53'),
(9, '657de599744cd8.2656433562.png', 'https://medias.kiju.me/?get=657de599744cd8.2656433562.png', 149, '2023-12-16 18:59:53'),
(10, '657de599746f75.2562809596.jpg', 'https://medias.kiju.me/?get=657de599746f75.2562809596.jpg', 149, '2023-12-16 18:59:53'),
(11, '657de59974d2c8.3517493658.png', 'https://medias.kiju.me/?get=657de59974d2c8.3517493658.png', 149, '2023-12-16 18:59:53');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `PostID` int(11) NOT NULL,
  `PostUniqueID` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RefID` int(11) DEFAULT NULL,
  `QuotedID` int(11) DEFAULT NULL,
  `Content` text NOT NULL,
  `CommunityID` int(11) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `Deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`PostID`, `PostUniqueID`, `UserID`, `RefID`, `QuotedID`, `Content`, `CommunityID`, `CreationDate`, `Deleted`) VALUES
(88, '8aHWw8kjgHyArA3hMIqd', 3, NULL, NULL, 'Ce post a été supprimé', 1, '2023-10-03 16:49:34', 1),
(89, 'we77DDV8aZdpCNNBnBnR', 3, 88, NULL, 'cccc', 1, '2023-10-03 16:49:41', 0),
(90, 'iTdbwkzQWra07tjAPRyQ', 3, 89, NULL, 'cccc #hey', 1, '2023-10-03 16:49:58', 0),
(91, 'iUxBHB59xLfYU4ciLjDa', 3, NULL, NULL, 'Hey', 1, '2023-10-04 23:57:10', 0),
(92, 'tvjWD2JaniHZcHs8TcvR', 3, NULL, NULL, 'hey #kiju', 1, '2023-10-05 09:51:00', 0),
(93, '4EHgwNEEPlrM1nRd36Mb', 3, NULL, NULL, 'cc', 1, '2023-10-05 10:01:49', 0),
(94, 'BoL5DoOl9u2ljTAObrQU', 3, NULL, NULL, 'hey', 1, '2023-10-05 10:06:04', 0),
(97, 'Qs28mzTlmtXjlkb6IovX', 3, NULL, NULL, '20.0', 1, '2023-10-11 21:11:47', 0),
(98, 'LJSzGb4UosMPMvASpVgO', 3, NULL, NULL, 'ccc', 1, '2023-10-19 09:24:18', 0),
(99, '1tRa4ZHVeN9dU1G04you', 3, NULL, NULL, 'ccccc', 1, '2023-10-19 09:24:22', 0),
(100, 'SYztq0FogyFCdBDgo6Nn', 3, NULL, NULL, 'cccc', 1, '2023-10-19 09:24:46', 0),
(101, '2L9LozvevM576cFsfJOb', 3, NULL, NULL, 'ccccccc', 1, '2023-10-19 09:24:50', 0),
(102, 'XVb0pg3a4YEHjqq1Qynu', 3, 101, NULL, 'hey', 1, '2023-10-24 18:39:35', 0),
(103, '6P8HNhh8Uf2FJRgj8hSs', 3, NULL, NULL, 'cccc', 1, '2023-10-24 19:26:54', 0),
(104, 'iliCTSUXNIaxRVVECl0c', 3, NULL, NULL, 'ccccccc', 1, '2023-10-24 19:27:03', 0),
(105, 'LyxouTdH60hId8lwRmMo', 3, NULL, NULL, 'vsff', 1, '2023-10-24 19:27:22', 0),
(106, '5Erwl5WDF7M86X7dmPOL', 3, NULL, NULL, 'Hey Léo', 1, '2023-10-27 12:13:57', 0),
(107, 'i8o3LGl958yrKtWtLTdm', 3, NULL, NULL, 'Nouveau design de communauté', 1, '2023-11-08 21:28:28', 0),
(108, 'oKBUkgT2nJvTNqKqE25t', 3, 102, NULL, 'cc', 1, '2023-11-12 23:45:02', 0),
(109, 'fXxUrS17c81ZFzgkqvGb', 3, NULL, NULL, 'Ce post a été supprimé', 1, '2023-11-18 17:27:56', 1),
(110, 'c5VCEQ09DUhvxQ0nH2he', 3, 109, NULL, 'réponse', 1, '2023-11-18 17:28:39', 0),
(111, 'C5vgkiSP30VhF2PQQzin', 3, 109, NULL, 'fichier', 1, '2023-11-18 17:33:30', 0),
(112, 'FNjCPfUJ1yi76rLxUExX', 4, NULL, NULL, 'cc', 1, '2023-11-18 18:22:48', 0),
(113, 'VZMBwDYLbfA0ouY9TU7y', 4, NULL, NULL, '21', 1, '2023-11-18 18:22:54', 0),
(114, 'fANfcM8fNYmTwJN0pKGK', 4, NULL, NULL, 'c', 1, '2023-11-18 18:28:35', 0),
(115, 'e3CncvgF3Ps4Py1wYr9k', 4, NULL, NULL, 'cc', 1, '2023-11-18 18:28:40', 0),
(116, 'thfFQ2FXxesAFIq1JREn', 4, NULL, NULL, 'cc', 1, '2023-11-18 18:28:44', 0),
(117, '9tO9nSwfziXzBCVmWDSX', 4, NULL, NULL, 'ccc', 1, '2023-11-22 09:34:32', 0),
(118, 'V5P8eAhJvSXsdtMp3BhF', 4, 88, NULL, '1', 1, '2023-11-22 21:20:56', 0),
(119, 'O6gKFVLyHsypGajJZVRo', 4, 88, NULL, '2', 1, '2023-11-22 21:21:25', 0),
(120, 'WOjkuK5zT5Q9DrISVIFT', 4, 88, NULL, '3', 1, '2023-11-22 21:21:30', 0),
(121, 'E5tSNtOCKmKJA3gdfpBn', 4, 88, NULL, '4', 1, '2023-11-22 21:21:33', 0),
(122, 'p3jpLLpIbDCCiBR9kcnQ', 4, 88, NULL, '5', 1, '2023-11-22 21:21:37', 0),
(123, 'ysw3gsiHZYKhOkI1BIKb', 4, 88, NULL, '6', 1, '2023-11-22 21:21:40', 0),
(124, 'FeJSJTjfLFtqHvTVBmXb', 4, 88, NULL, '7', 1, '2023-11-22 21:21:45', 0),
(125, '53B1ly9AcWRB8GXCjQpQ', 4, 88, NULL, '8', 1, '2023-11-22 21:21:50', 0),
(126, '08O4R0mukQ2P5G1YozSa', 4, 88, NULL, '9', 1, '2023-11-22 21:21:54', 0),
(127, 'hTvHTDw7X4TbWNQussxM', 4, 88, NULL, '10', 1, '2023-11-22 21:21:57', 0),
(128, 'LebV3Dbu9sqxpaif0jtX', 4, 88, NULL, '11', 1, '2023-11-22 21:22:01', 0),
(129, 'FNZlNHh2uQ1EBaiTwMDE', 4, 88, NULL, '12 NULL', 1, '2023-11-22 21:25:54', 0),
(130, 'Sddc2RwqNeaBN8pToLu8', 4, NULL, NULL, 'Ce post a été supprimé', 1, '2023-11-22 21:31:39', 1),
(132, 'reeTFItTZ5f8yu30l5pV', 4, NULL, NULL, '10.14 Debug 1', 1, '2023-11-26 15:57:05', 0),
(133, 'Vm3xcZdD18vbtnLzZEmC', 4, NULL, NULL, '10.14 debug 2', 1, '2023-11-26 16:22:42', 0),
(134, '3p36ZLBGr5Ve5vJederw', 4, NULL, NULL, '10.14 debug 3#kiju', 1, '2023-11-26 16:28:20', 0),
(135, 'tnDCd13gO7YioVRhkZNt', 4, 109, NULL, 'szzfzf #kiju', 1, '2023-11-26 16:43:04', 0),
(136, '26vugWyaObf0XHI5cAFQ', 4, 109, NULL, '#cc jadore', 1, '2023-11-26 16:43:10', 0),
(137, 'fF5DnvLGEfE5lrX6AyBk', 4, NULL, NULL, 'Ce post a été supprimé.', 1, '2023-11-26 17:27:51', 1),
(138, '9wgLGKzXsA0XIPKqkhaq', 4, NULL, NULL, '10.14 debug 4 #kiju @Kiju', 8, '2023-11-26 17:42:30', 0),
(139, 'aYTENTNkFICAolXcyAJi', 4, 129, NULL, 'rep', 1, '2023-12-02 13:47:12', 0),
(140, 'lCXASKnIBT0bYBiNXvOG', 4, NULL, NULL, 'ghr', 1, '2023-12-02 14:00:53', 0),
(141, 'ntm6aEku88NZeTqv4QUe', 4, NULL, NULL, 'Débug 10.15', 10, '2023-12-02 14:01:22', 0),
(142, 'MYetZBtvMAgtm4S8RYDN', 4, NULL, NULL, '#cc coucou', 1, '2023-12-02 17:43:23', 0),
(143, 'QOz6P8KoYi4nALjSJJYV', 4, 129, NULL, 'c', 1, '2023-12-08 16:33:29', 0),
(144, 'fKMqP2daHY6UbuWC7REJ', 4, NULL, NULL, '#10.16 cc', 1, '2023-12-10 16:10:35', 0),
(145, 'qsB5aR4lz0IG41oMN731', 4, NULL, NULL, 'Ce post a été supprimé.', 1, '2023-12-10 16:11:11', 1),
(146, 'mmOdqPnQerhlv1Yapohr', 4, NULL, NULL, 'Ce post a été supprimé.', 1, '2023-12-10 16:11:24', 1),
(147, 'I5GyrQCiZbhq4LNjiY3J', 4, 107, NULL, 'test image 2.0', 1, '2023-12-16 18:57:19', 0),
(148, 'pd0oxmCW8z7hJI8hJJxQ', 4, 107, NULL, 'test image 2.0', 1, '2023-12-16 18:58:04', 0),
(149, 'ninC4D0XmgwHENBc4v0Y', 4, 107, NULL, 'gegegge', 1, '2023-12-16 18:59:53', 0);

-- --------------------------------------------------------

--
-- Structure de la table `repost`
--

CREATE TABLE `repost` (
  `RepostID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL,
  `CreationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `repost`
--

INSERT INTO `repost` (`RepostID`, `UserID`, `PostID`, `CreationDate`) VALUES
(20, 1, 88, '2023-10-03 16:49:46'),
(28, 4, 89, '2023-11-22 21:22:13'),
(29, 4, 128, '2023-11-22 21:22:15'),
(32, 4, 132, '2023-12-01 14:43:44'),
(33, 4, 109, '2023-12-01 14:44:06'),
(34, 4, 97, '2023-12-02 13:14:54'),
(35, 4, 105, '2023-12-02 13:15:07'),
(36, 4, 129, '2023-12-02 13:52:45'),
(37, 4, 88, '2023-12-02 13:53:06'),
(38, 4, 142, '2023-12-02 17:43:42'),
(47, 4, 107, '2023-12-16 17:28:45');

-- --------------------------------------------------------

--
-- Structure de la table `update`
--

CREATE TABLE `update` (
  `UpdateID` int(11) NOT NULL,
  `Version` varchar(30) NOT NULL,
  `Major` tinyint(1) NOT NULL,
  `Content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `update`
--

INSERT INTO `update` (`UpdateID`, `Version`, `Major`, `Content`) VALUES
(1, '10.0', 1, 'Kiju fait peau neuve, découvrez le nouveau design et fonctionnalités disponibles.;Amélioration de la structure serveur pour une meilleure maintenabilité.;Cette dernière version contient des correctifs et des améliorations des performances.'),
(2, '10.1', 0, 'Amélioration de la structure serveur pour une meilleure maintenabilité.;Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(3, '10.2', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(4, '10.3', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(5, '10.4', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\r\n'),
(6, '10.5', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(7, '10.6', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\r\n'),
(8, '10.7', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(9, '10.8', 1, 'Amélioration de notre page d\'accueil.;Il est désormais possible de créer ses communautés (beta).;Accédez à votre Hub pour avoir accès aux services de Kiju.;Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(10, '10.9', 0, 'Amélioration de la recherche.;Cette dernière version contient des correctifs et des améliorations des performances.'),
(11, '10.10', 1, 'Dernière ligne droite avant le lancement en version bêta publique.; Accédez à votre espace compte pour modifier vos informations sur tous les services Kiju.;Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(12, '10.11', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(13, '10.12', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ProfilePicture` varchar(255) NOT NULL,
  `Banner` varchar(255) DEFAULT NULL,
  `Birth` text NOT NULL,
  `Loc` varchar(255) NOT NULL,
  `Bio` text NOT NULL,
  `Link` varchar(255) NOT NULL,
  `IsVerified` tinyint(1) NOT NULL,
  `CreationDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Name`, `Email`, `ProfilePicture`, `Banner`, `Birth`, `Loc`, `Bio`, `Link`, `IsVerified`, `CreationDate`) VALUES
(1, 'Demo1', 'Démo', 'user@example.com', 'https://assets.kiju.me/img/new/Base.png', '', '0000-00-00 00:00:00', '', '', '', 1, '2023-05-30 19:24:10'),
(2, 'Demo2', '', 'user@example.com', 'https://assets.kiju.me/img/new/Base.png', '', '0000-00-00 00:00:00', '', '', '', 1, '2023-06-01 20:31:19'),
(3, 'Kiju', 'Kiju', 'user@example.com', 'https://assets.kiju.me/img/1123/Social_Bg.jpg', '', '0000-00-00 00:00:00', '', '', '', 1, '2023-06-02 21:51:46'),
(4, 'Shonned', 'Kilian', 'user@example.com', 'https://assets.kiju.me/img/avatar-default-ptzr6kmg652a2w4lsbc7yrspm9r4z4y5wcvej6fgkg.png', 'https://versohydraulic.com/bitrix/templates/aspro-allcorp/components/bitrix/news.list/front-small-banners/images/background.webp', '27 Décembre 2003', 'Druillat', 'Je suis le fondateur de Kiju', '', 1, '2023-10-04 23:27:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `auth_token`
--
ALTER TABLE `auth_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_AuthTokens_UserID` (`UserID`);

--
-- Index pour la table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`CommunityID`),
  ADD KEY `FK_Communities_OwnerID` (`OwnerID`);

--
-- Index pour la table `community_member`
--
ALTER TABLE `community_member`
  ADD PRIMARY KEY (`MemberID`),
  ADD KEY `FK_CommunityMembers_CommunityUserID` (`CommunityUserID`),
  ADD KEY `FK_CommunityMembers_CommunityID` (`CommunityID`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `email_authentication`
--
ALTER TABLE `email_authentication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_EmailAuth_UserID` (`UserID`);

--
-- Index pour la table `follower`
--
ALTER TABLE `follower`
  ADD PRIMARY KEY (`FollowerID`),
  ADD KEY ` FK_Followers_UserFollowedID` (`UserFollowedID`),
  ADD KEY `FK_Followers_UserFollowerID` (`UserFollowerID`);

--
-- Index pour la table `issues`
--
ALTER TABLE `issues`
  ADD PRIMARY KEY (`IssueID`);

--
-- Index pour la table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`LikeID`),
  ADD KEY `FK_Likes_UserID` (`UserID`),
  ADD KEY `FK_Likes_PostID` (`PostID`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`MediaID`),
  ADD KEY ` FK_Media_PostID` (`PostID`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `FK_Posts_UserID` (`UserID`),
  ADD KEY `FK_Posts_CommunityID` (`CommunityID`),
  ADD KEY `FK_Posts_PostID` (`RefID`),
  ADD KEY `FK_Posts_QuotedID` (`QuotedID`);

--
-- Index pour la table `repost`
--
ALTER TABLE `repost`
  ADD PRIMARY KEY (`RepostID`),
  ADD KEY `FK_Shares_UserID` (`UserID`),
  ADD KEY ` FK_Shares_PostID` (`PostID`);

--
-- Index pour la table `update`
--
ALTER TABLE `update`
  ADD PRIMARY KEY (`UpdateID`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auth_token`
--
ALTER TABLE `auth_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `community`
--
ALTER TABLE `community`
  MODIFY `CommunityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `community_member`
--
ALTER TABLE `community_member`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `email_authentication`
--
ALTER TABLE `email_authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `follower`
--
ALTER TABLE `follower`
  MODIFY `FollowerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `issues`
--
ALTER TABLE `issues`
  MODIFY `IssueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `like`
--
ALTER TABLE `like`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `MediaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT pour la table `repost`
--
ALTER TABLE `repost`
  MODIFY `RepostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `update`
--
ALTER TABLE `update`
  MODIFY `UpdateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `auth_token`
--
ALTER TABLE `auth_token`
  ADD CONSTRAINT `FK_AuthTokens_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `community`
--
ALTER TABLE `community`
  ADD CONSTRAINT `FK_Communities_OwnerID` FOREIGN KEY (`OwnerID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `community_member`
--
ALTER TABLE `community_member`
  ADD CONSTRAINT `FK_CommunityMembers_CommunityID` FOREIGN KEY (`CommunityID`) REFERENCES `community` (`CommunityID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_CommunityMembers_CommunityUserID` FOREIGN KEY (`CommunityUserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `email_authentication`
--
ALTER TABLE `email_authentication`
  ADD CONSTRAINT `FK_EmailAuth_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `follower`
--
ALTER TABLE `follower`
  ADD CONSTRAINT ` FK_Followers_UserFollowedID` FOREIGN KEY (`UserFollowedID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Followers_UserFollowerID` FOREIGN KEY (`UserFollowerID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `FK_Likes_PostID` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Likes_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT ` FK_Media_PostID` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_Posts_CommunityID` FOREIGN KEY (`CommunityID`) REFERENCES `community` (`CommunityID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Posts_QuotedID` FOREIGN KEY (`QuotedID`) REFERENCES `post` (`PostID`),
  ADD CONSTRAINT `FK_Posts_RefID` FOREIGN KEY (`RefID`) REFERENCES `post` (`PostID`),
  ADD CONSTRAINT `FK_Posts_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `repost`
--
ALTER TABLE `repost`
  ADD CONSTRAINT ` FK_Shares_PostID` FOREIGN KEY (`PostID`) REFERENCES `post` (`PostID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Shares_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
