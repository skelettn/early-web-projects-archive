-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 10 nov. 2023 à 00:56
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
  `Expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `auth_token`
--

INSERT INTO `auth_token` (`id`, `Token`, `UserID`, `Expiration`) VALUES
(24, '7f7906789845eadb1fbc2635221db616c56073fe5a70d6d2e48042e16eeddeee', 4, 1702158779);

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
(2, '322687303106', 1, 'Music', '', 'https://assets.kiju.me/img/communities/Banner/Music_Community_Banner.png', 1, 0, '0000-00-00 00:00:00'),
(3, '804284772602', 1, 'Gaming', '', 'https://assets.kiju.me/img/communities/Banner/Gaming_Community_Banner.png', 1, 0, '0000-00-00 00:00:00'),
(4, '204187237411', 1, 'Cinema', '', 'https://assets.kiju.me/img/communities/Banner/Cinema_Community_Banner.png', 1, 0, '0000-00-00 00:00:00'),
(5, '921325043616', 1, 'Kiju Updates', 'News for Kiju', 'https://medias.kiju.me/?get=650ef36c24bb29.62901376a8.jpg', 0, 0, '0000-00-00 00:00:00'),
(6, '177526485886', 4, '', '', '', 0, 0, '0000-00-00 00:00:00'),
(7, '487645355706', 4, 'Kiju Alpha', '', '', 0, 0, '0000-00-00 00:00:00');

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
(12, 4, 6, '2023-10-09 21:34:30'),
(13, 4, 7, '2023-11-06 21:37:59'),
(14, 4, 2, '2023-11-08 21:34:27');

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
(24, 4, 776204, 1);

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
(12, 3, 4, '2023-10-09 21:31:53'),
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
(3, 'Problème de fermeture des fenêtres', 1);

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
(35, 1, 87, '2023-09-30 12:49:18'),
(36, 1, 89, '2023-10-03 16:49:45'),
(39, 1, 88, '2023-10-04 23:46:34'),
(56, 4, 91, '2023-10-05 09:17:43'),
(58, 4, 97, '2023-10-16 20:52:13'),
(62, 4, 87, '2023-10-31 16:38:36'),
(64, 4, 106, '2023-11-08 20:24:49'),
(65, 4, 88, '2023-11-09 23:30:28');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `PostID` int(11) NOT NULL,
  `PostUniqueID` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RefID` int(11) DEFAULT NULL,
  `Content` text NOT NULL,
  `Media` text NOT NULL,
  `MediaType` varchar(30) NOT NULL,
  `CommunityID` int(11) NOT NULL,
  `CreationDate` datetime NOT NULL,
  `Deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`PostID`, `PostUniqueID`, `UserID`, `RefID`, `Content`, `Media`, `MediaType`, `CommunityID`, `CreationDate`, `Deleted`) VALUES
(87, 'aqdknyvn5gyWiqZS7WKS', 3, NULL, 'Kiju change de look à l\'approche de la beta fermée. https://kiju.me ✍', '64f64ebd1009a1.62506954b3.jpg', 'picture', 1, '2023-09-04 23:40:13', 0),
(88, '8aHWw8kjgHyArA3hMIqd', 1, NULL, 'cc', '', '', 1, '2023-10-03 16:49:34', 0),
(89, 'we77DDV8aZdpCNNBnBnR', 1, 88, 'cccc', '', '', 1, '2023-10-03 16:49:41', 0),
(90, 'iTdbwkzQWra07tjAPRyQ', 1, 89, 'cccc', '', '', 1, '2023-10-03 16:49:58', 0),
(91, 'iUxBHB59xLfYU4ciLjDa', 4, NULL, 'Hey', '', '', 1, '2023-10-04 23:57:10', 0),
(92, 'tvjWD2JaniHZcHs8TcvR', 4, NULL, 'hey', '', '', 1, '2023-10-05 09:51:00', 0),
(93, '4EHgwNEEPlrM1nRd36Mb', 4, NULL, 'cc', '', '', 1, '2023-10-05 10:01:49', 0),
(94, 'BoL5DoOl9u2ljTAObrQU', 4, NULL, 'hey', '', '', 1, '2023-10-05 10:06:04', 0),
(95, 'J9ZGXY9OHN9zb3nNi95C', 4, NULL, 'Ce post a été supprimé.', '', '', 1, '2023-10-05 16:03:02', 1),
(96, 'bTOPX90HIsLz0NABDziC', 4, NULL, 'Ce post a été supprimé.', '', '', 1, '2023-10-05 17:09:03', 1),
(97, 'Qs28mzTlmtXjlkb6IovX', 4, NULL, '20.0', '', '', 1, '2023-10-11 21:11:47', 0),
(98, 'LJSzGb4UosMPMvASpVgO', 4, NULL, 'ccc', '', '', 1, '2023-10-19 09:24:18', 0),
(99, '1tRa4ZHVeN9dU1G04you', 4, NULL, 'ccccc', '', '', 1, '2023-10-19 09:24:22', 0),
(100, 'SYztq0FogyFCdBDgo6Nn', 4, NULL, 'cccc', '', '', 1, '2023-10-19 09:24:46', 0),
(101, '2L9LozvevM576cFsfJOb', 4, NULL, 'ccccccc', '', '', 1, '2023-10-19 09:24:50', 0),
(102, 'XVb0pg3a4YEHjqq1Qynu', 4, 101, 'hey', '', '', 1, '2023-10-24 18:39:35', 0),
(103, '6P8HNhh8Uf2FJRgj8hSs', 4, NULL, 'cccc', '', '', 1, '2023-10-24 19:26:54', 0),
(104, 'iliCTSUXNIaxRVVECl0c', 4, NULL, 'ccccccc', '', '', 1, '2023-10-24 19:27:03', 0),
(105, 'LyxouTdH60hId8lwRmMo', 4, NULL, 'vsff', '', '', 1, '2023-10-24 19:27:22', 0),
(106, '5Erwl5WDF7M86X7dmPOL', 4, NULL, 'Hey Léo', '', '', 1, '2023-10-27 12:13:57', 0),
(107, 'i8o3LGl958yrKtWtLTdm', 4, NULL, 'Nouveau design de communauté', '', '', 1, '2023-11-08 21:28:28', 0);

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
(19, 1, 87, '2023-09-30 12:49:23'),
(20, 1, 88, '2023-10-03 16:49:46'),
(26, 4, 106, '2023-10-27 12:14:37'),
(27, 4, 107, '2023-11-08 21:44:32');

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
(2, '11.0', 0, 'Amélioration de la structure serveur pour une meilleure maintenabilité.;Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(3, '12.0', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(4, '13.0', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(5, '14.0', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\r\n'),
(6, '15.0', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(7, '16.0', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\r\n'),
(8, '16.1', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(9, '17.0', 1, 'Amélioration de notre page d\'accueil.;Il est désormais possible de créer ses communautés (beta).;Accédez à votre Hub pour avoir accès aux services de Kiju.;Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(10, '18.0', 0, 'Amélioration de la recherche.;Cette dernière version contient des correctifs et des améliorations des performances.'),
(11, '19.0', 1, 'Dernière ligne droite avant le lancement en version bêta publique.; Accédez à votre espace compte pour modifier vos informations sur tous les services Kiju.;Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(12, '19.1', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n'),
(13, '20.0', 0, 'Cette dernière version contient des correctifs et des améliorations des performances.\n');

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

INSERT INTO `user` (`UserID`, `Username`, `Name`, `Email`, `ProfilePicture`, `Birth`, `Loc`, `Bio`, `Link`, `IsVerified`, `CreationDate`) VALUES
(1, 'Demo1', 'Démo', 'user@example.com', 'https://assets.kiju.me/img/new/Base.png', '0000-00-00 00:00:00', '', '', '', 1, '2023-05-30 19:24:10'),
(2, 'Demo2', '', 'user@example.com', 'https://assets.kiju.me/img/new/Base.png', '0000-00-00 00:00:00', '', '', '', 1, '2023-06-01 20:31:19'),
(3, 'Kiju', '', 'user@example.com', 'https://assets.kiju.me/img/new/Base.png', '0000-00-00 00:00:00', '', '', '', 1, '2023-06-02 21:51:46'),
(4, 'Shonned', 'Kilian', 'user@example.com', 'https://assets.kiju.me/img/avatar-default-ptzr6kmg652a2w4lsbc7yrspm9r4z4y5wcvej6fgkg.png', '27 Décembre 2003', '', '', '', 0, '2023-10-04 23:27:38'),
(5, 'default', 'default', 'user@example.com', '', '2023-11-01 19:46:15', '', '', '', 0, '2023-11-01 19:46:15');

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
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `FK_Posts_UserID` (`UserID`),
  ADD KEY `FK_Posts_CommunityID` (`CommunityID`),
  ADD KEY `FK_Posts_PostID` (`RefID`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `community`
--
ALTER TABLE `community`
  MODIFY `CommunityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `community_member`
--
ALTER TABLE `community_member`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `email_authentication`
--
ALTER TABLE `email_authentication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `follower`
--
ALTER TABLE `follower`
  MODIFY `FollowerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `issues`
--
ALTER TABLE `issues`
  MODIFY `IssueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `like`
--
ALTER TABLE `like`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT pour la table `repost`
--
ALTER TABLE `repost`
  MODIFY `RepostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_Posts_CommunityID` FOREIGN KEY (`CommunityID`) REFERENCES `community` (`CommunityID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Posts_PostID` FOREIGN KEY (`RefID`) REFERENCES `post` (`PostID`),
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
