-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 10 sep. 2022 à 14:34
-- Version du serveur : 10.3.34-MariaDB-0ubuntu0.20.04.1
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tousvosfilms`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `pp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `actor`
--

INSERT INTO `actor` (`id`, `name`, `title`, `pp`) VALUES
(1, 'tom-holland', 'Tom Holland', 'https://media.gqmagazine.fr/photos/62136e9a7062f69af08326cf/1:1/w_900,h_900,c_limit/tom%20holland%20cover.jpg'),
(2, 'tobey-maguire', 'Tobey Maguire', 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/Tobey_Maguire_2014.jpg/260px-Tobey_Maguire_2014.jpg'),
(3, 'andrew-garfield', 'Andrew Garfield', 'https://pyxis.nymag.com/v1/imgs/773/34f/9eeeb9b8aac206c0fc68563c086b296a6c-01-andrew-garfield.rsquare.w330.jpg'),
(4, 'zendaya', 'Zendaya', 'https://static.wikia.nocookie.net/disney/images/6/6d/Zendaya_2021.png'),
(5, 'mark-wahlberg', 'Mark Wahlberg', 'https://fr.web.img6.acsta.net/pictures/17/07/12/16/23/035660.jpg'),
(6, 'sophia-taylor-ali', 'Sophia Taylor Ali', 'https://musicimage.xboxlive.com/catalog/video.contributor.24369b00-0200-11db-89ca-0019b92a3933/image?locale=fr-be&target=circle'),
(7, 'chris-rock', 'Chris Rock', 'https://fr.web.img5.acsta.net/pictures/15/10/21/17/20/113837.jpg'),
(8, 'marisol-nichols', 'Marisol Nichols', 'https://fr.web.img2.acsta.net/pictures/17/01/30/16/57/404265.jpg'),
(9, 'max-minghella', 'Max Minghella', 'https://fr.web.img3.acsta.net/pictures/17/04/07/12/17/416594.jpg'),
(10, 'tobin-bell', 'Tobin Bell', 'https://images.mubicdn.net/images/cast_member/40428/cache-170089-1548963149/image-w856.jpg?size=800x'),
(11, 'robert-pattinson', 'Robert Pattinson', 'https://cdn-elle.ladmedia.fr/var/plain_site/storage/images/people/la-vie-des-people/news/robert-pattinson-sa-petite-amie-suki-waterhouse-a-pleure-devant-the-batman-3993015/96143073-1-fre-FR/Robert-Pattinson-sa-petite-amie-Suki-Waterhouse-a-pleure-devant-The-Batman.jpg'),
(12, 'zoe-kravitz', 'Zoë Kravitz', 'https://fr.web.img5.acsta.net/pictures/20/01/07/12/54/3975258.jpg'),
(13, 'paul-dano', 'Paul Dano', 'https://fr.web.img5.acsta.net/pictures/20/02/24/16/11/1210686.jpg'),
(14, 'colin-farrell', 'Colin Farrell', 'https://fr.web.img3.acsta.net/pictures/15/05/15/15/43/007127.jpg'),
(15, 'vin-diesel', 'Vin Diesel', 'https://fr.web.img6.acsta.net/pictures/15/10/14/11/30/335169.jpg'),
(16, 'michelle-rodriguez', 'Michelle Rodriguez', 'https://fr.web.img4.acsta.net/pictures/19/05/22/10/29/0914375.jpg'),
(17, 'john-cena', 'John Cena', 'https://fr.web.img4.acsta.net/pictures/17/06/14/13/48/489688.jpg'),
(18, 'tom-hardy', 'Tom Hardy', 'https://fr.web.img6.acsta.net/c_310_420/pictures/16/01/19/11/06/274206.jpg'),
(19, 'woody-harrelson', 'Woody Harrelson', 'https://fr.web.img6.acsta.net/pictures/15/11/09/16/08/462420.jpg'),
(20, 'jake-gyllenhaal', 'Jake Gyllenhaal', 'https://fr.web.img3.acsta.net/pictures/17/04/18/16/41/286790.jpg'),
(21, 'timothee-chalamet', 'Timothée Chalamet', 'https://fr.web.img5.acsta.net/pictures/21/07/13/15/57/1740452.jpg'),
(22, 'oscar-isaac', 'Oscar Isaac', 'https://fr.web.img2.acsta.net/pictures/20/01/03/10/24/4239906.jpg'),
(23, 'harry-styles', 'Harry Styles', 'https://cdn-elle.ladmedia.fr/var/plain_site/storage/images/people/la-vie-des-people/news/harry-styles-en-robe-des-personnalites-prennent-sa-defense-suite-aux-critiques-3891298/94048087-1-fre-FR/Harry-Styles-en-robe-des-personnalites-prennent-sa-defense-suite-aux-critiques.jpg'),
(24, 'angelina-jolie', 'Angelina Jolie', 'https://fwcdn.pl/ppo/03/29/329/449952.2.jpg'),
(25, 'bryce-dallas-howard', 'Bryce Dallas Howard', 'https://fr.web.img6.acsta.net/pictures/19/09/09/13/35/2436508.jpg'),
(26, 'chris-pratt', 'Chris Pratt', 'https://fr.web.img5.acsta.net/c_310_420/pictures/15/07/27/13/07/079239.jpg'),
(27, 'james-mcavoy', 'James McAvoy', 'https://fr.web.img6.acsta.net/c_310_420/pictures/15/07/24/14/42/247703.jpg'),
(28, 'jessica-chastain', 'Jessica Chastain', 'https://fr.web.img2.acsta.net/pictures/16/05/13/10/55/131905.jpg'),
(29, 'bill-hader', 'Bill Hader', 'https://fr.web.img5.acsta.net/pictures/19/09/04/10/56/2683487.jpg'),
(30, 'kit-harington', 'Kit Harington', 'https://fr.web.img5.acsta.net/c_310_420/pictures/17/07/13/11/23/574012.jpg'),
(31, 'bryan-cranston', 'Bryan Cranston', 'https://fr.web.img4.acsta.net/pictures/19/10/23/12/10/3830800.jpg'),
(32, 'jane-kaczmarek', 'Jane Kaczmarek', 'https://fr.web.img6.acsta.net/pictures/16/06/29/10/55/005380.jpg'),
(33, 'frankie-muniz', 'Frankie Muniz', 'https://fr.web.img2.acsta.net/pictures/15/07/21/10/28/200809.jpg'),
(34, 'daniel-radcliffe', 'Daniel Radcliffe', 'https://www.gala.fr/imgre/fit/http.3A.2F.2Fprd2-bone-image.2Es3-website-eu-west-1.2Eamazonaws.2Ecom.2Fgal.2F2020.2F06.2F09.2F4bd27102-7105-487d-b7dd-ef0491f7bd89.2Ejpeg/420x420/quality/80/focus-point/1655%2C1926/daniel-radcliffe-harry-potter-sort-du-silence-apres-les-tweets-transphobes-de-j-k-rowling.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `code`
--

CREATE TABLE `code` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `logged` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `code`
--

INSERT INTO `code` (`id`, `email`, `code`, `logged`) VALUES
(42, 'user@example.com', '521453', 1),
(45, 'user@example.com ', '994268', 1),
(54, 'user@example.com', '427011', 1);

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `version` varchar(255) NOT NULL,
  `maintenance` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `config`
--

INSERT INTO `config` (`id`, `version`, `maintenance`) VALUES
(1, '22.1', 0);

-- --------------------------------------------------------

--
-- Structure de la table `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `profile` text NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `type` text NOT NULL,
  `cover` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `list`
--

INSERT INTO `list` (`id`, `uid`, `profile`, `name`, `title`, `type`, `cover`) VALUES
(17, '9f80f66f9af4c8640489e20a48d81626', 'Shonned', 'ca-chapitre-2', 'Ça : Chapitre 2', 'movie', 'ca-chapitre-2.jpg'),
(18, '9f80f66f9af4c8640489e20a48d81626', 'Shonned', 'harry-potter-et-le-prisonnier-d-azkaban', 'Harry Potter et le Prisonnier d\'Azkaban', 'movie', 'harry-potter-et-le-prisonnier-d-azkaban.jpg'),
(19, '9f80f66f9af4c8640489e20a48d81626', 'Shonned', 'uncharted', 'Uncharted', 'movie', 'uncharted.jpg'),
(20, '9f80f66f9af4c8640489e20a48d81626', 'Juju', 'malcolm', 'Malcolm', 'show', 'malcolm.jpg'),
(23, '9f80f66f9af4c8640489e20a48d81626', 'Place', 'uncharted', 'Uncharted', 'movie', 'uncharted.jpg'),
(24, '9f80f66f9af4c8640489e20a48d81626', 'Kiki', 'dune', 'Dune', 'movie', 'dune.jpg'),
(26, '9f80f66f9af4c8640489e20a48d81626', 'Bobyy', 'uncharted', 'Uncharted', 'movie', 'uncharted.jpg'),
(28, '9f80f66f9af4c8640489e20a48d81626', 'Couc', 'uncharted', 'Uncharted', 'movie', 'uncharted.jpg'),
(29, '9f80f66f9af4c8640489e20a48d81626', 'Couc', 'les-eternels', 'Les Éternels', 'movie', 'les-eternels.jpg'),
(31, '9f80f66f9af4c8640489e20a48d81626', 'Couc', 'malcolm', 'Malcolm', 'show', 'malcolm.jpg'),
(32, '9f80f66f9af4c8640489e20a48d81626', 'Place', 'malcolm', 'Malcolm', 'show', 'malcolm.jpg'),
(33, '8fda271b76c953bf222b9384e9cdcfb7', 'cccccccc', 'ca-chapitre-2', 'Ça : Chapitre 2', 'movie', 'ca-chapitre-2.jpg'),
(34, '8fda271b76c953bf222b9384e9cdcfb7', 'cccccccc', 'malcolm', 'Malcolm', 'show', 'malcolm.jpg'),
(35, '9f80f66f9af4c8640489e20a48d81626', 'Bobyy', 'malcolm', 'Malcolm', 'show', 'malcolm.jpg'),
(36, '9f80f66f9af4c8640489e20a48d81626', 'Croks', 'ted', 'Ted', 'movie', 'ted.jpg'),
(38, '9f80f66f9af4c8640489e20a48d81626', 'Shonned', 'spider-man-far-from-home', 'Spider-Man: Far From Home', 'movie', 'spider-man-far-from-home.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `uid` text NOT NULL,
  `name` text NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`id`, `uid`, `name`, `avatar`) VALUES
(12, '9f80f66f9af4c8640489e20a48d81626', 'Place', 'randm-7'),
(13, '7077219b0dc4d03535d07091647ddb65', 'KPPP', 'randm-5'),
(14, '9f80f66f9af4c8640489e20a48d81626', 'Bobyy', 'randm-5'),
(15, '9f80f66f9af4c8640489e20a48d81626', 'Kiki', 'randm-2'),
(16, '9f80f66f9af4c8640489e20a48d81626', 'Couc', 'breaking-bad-8'),
(17, '07c4779ef18f667deb5f7d3249d1493d', 'juliettee', 'hp-8'),
(18, '8fda271b76c953bf222b9384e9cdcfb7', 'cccccccc', 'hp-7'),
(19, '9f80f66f9af4c8640489e20a48d81626', 'Croks', 'randm-4');

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `seasons` text NOT NULL,
  `date` text NOT NULL,
  `cover` text NOT NULL,
  `background` text NOT NULL,
  `stars` text NOT NULL,
  `director` text NOT NULL,
  `genre` text NOT NULL,
  `category` text NOT NULL,
  `cast` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`id`, `name`, `title`, `description`, `seasons`, `date`, `cover`, `background`, `stars`, `director`, `genre`, `category`, `cast`) VALUES
(1, 'malcolm', 'Malcolm', 'Petit génie malgré lui, Malcolm vit dans une famille hors du commun. Le jeune surdoué n\'hésite pas à se servir de son intelligence pour faire les 400 coups avec ses frères.', '6', '2000', 'malcolm.jpg', 'malcolm.jpg', '9.5', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tvf_plus` tinyint(1) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `email`, `password`, `username`, `tvf_plus`, `avatar`, `level`) VALUES
(1, '9f80f66f9af4c8640489e20a48d81626', 'user@example.com', '$2y$10$dzAz.QskMyia3N8BA1cMRulibjtJdmIdn94kJBi7Y/eeYj05JfrQK', 'Shonned', 0, '', 4),
(2, '50adb554a0416febfdb5400990ef5994', 'user@example.com', '$2y$10$sMpdJI1N48/eceUPHQcBreRnAGf5jV.pnSyQL.CwF4E.YGFtLJCv2', 'Shon2', 0, '', 0),
(3, '7077219b0dc4d03535d07091647ddb65', 'user@example.com', '', 'meetcomett', 0, '', 0),
(4, '07c4779ef18f667deb5f7d3249d1493d', 'user@example.com ', '', 'juju', 0, '', 0),
(5, '8fda271b76c953bf222b9384e9cdcfb7', 'user@example.com', '', '200000', 0, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cover` text NOT NULL,
  `background` text NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `stars` text NOT NULL,
  `date` text NOT NULL,
  `type` text NOT NULL,
  `showname` text NOT NULL,
  `nbseason` text NOT NULL,
  `season` text NOT NULL,
  `director` text NOT NULL,
  `genre` text NOT NULL,
  `category` text NOT NULL,
  `cast` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`id`, `name`, `cover`, `background`, `title`, `description`, `stars`, `date`, `type`, `showname`, `nbseason`, `season`, `director`, `genre`, `category`, `cast`, `link`) VALUES
(1, 'spider-man-no-way-home', 'spider-man-no-way-home.jpg', 'spider-man-no-way-home.jpg', 'Spider-Man: No Way Home', 'Avec l\'identité de Spiderman désormais révélée, celui-ci est démasqué et n\'est plus en mesure de séparer sa vie normale en tant que Peter Parker des enjeux élevés d\'être un superhéros. Lorsque Peter demande de l\'aide au docteur Strange, les enjeux deviennent encore plus dangereux, l\'obligeant à découvrir ce que signifie vraiment être Spiderman.', '8.3', '2021', 'movie', '', '', '', 'Brian Avery Galligan, David H. Venghaus Jr., George Cottle, Jon Watts', 'Action, Adventure, Disney, Fantasy, Science Fiction', 'action', 'tom-holland tobey-maguire andrew-garfield zendaya', 'https://uqload.com/embed-skw7i2m6l487.html'),
(2, 'uncharted', 'uncharted.jpg', 'uncharted.jpg', 'Uncharted', 'Le chasseur de trésors Victor Sully Sullivan recrute Nathan Drake pour l\'aider à récupérer une fortune vieille de 500 ans amassée par l\'explorateur Ferdinand Magellan.', '8.7', '2022', 'movie', '', '', '', 'Mathias Datow, Ruben Fleischer', 'Action, Aventure', 'aventure', 'tom-holland mark-wahlberg sophia-taylor-ali', 'https://uqload.com/embed-1t02mim6c1h2.html'),
(3, 'spirale-l-heritage-de-saw', 'saw9.jpg', 'saw9.jpg', 'Spirale L\'Héritage de Saw', 'Travaillant dans l\'ombre d\'un vétéran estimé de la police, le détective téméraire Ezekiel \"Zeke\" Banks et son partenaire débutant enquêtent sur des meurtres rappelant étrangement le passé macabre de la ville. Piégé dans un mystère qui ne cesse de s\'épaissir, Zeke se retrouve la cible d\'un jeu morbide.', '7.5', '2021', 'movie', '', '', '', 'Darren Lynn Bousman', 'Horreur, Thriller', 'horreur', 'chris-rock marisol-nichols max-minghella tobin-bell', 'https://uqload.com/embed-815qzrcl9sqz.html'),
(4, 'the-batman', 'thebatman.jpg', 'thebatman.jpg', 'The Batman', 'Dans sa deuxième année de lutte contre le crime, le milliardaire et justicier masqué Batman explore la corruption qui sévit à Gotham et notamment comment elle pourrait être liée à sa propre famille, les Wayne, à qui il doit toute sa fortune. En parallèle, il enquête sur les meurtres d\'un tueur en série qui se fait connaître sous le nom de Sphinx et sème des énigmes cruelles sur son passage.', '8.8', '2022', 'movie', '', '', '', 'Matt Reeves', 'Action, Aventure', 'action', 'robert-pattinson zoe-kravitz paul-dano colin-farrell', 'https://uqload.com/embed-6ic8h7gc2b22.html'),
(5, 'fast-and-furius-9', 'f&f9.jpg', 'f&f9.jpg', 'Fast and Furious 9', 'Dom Toretto mène une vie tranquille avec Letty et son fils, mais ils savent que le danger est toujours présent. Son équipe et lui tentent de mettre fin à un complot mondial ourdi par l\'assassin le plus doué et le pilote le plus performant qu\'ils aient jamais rencontré: le frère délaissé de Dom.', '8.2', '2021', 'movie', '', '', '', 'Justin Lin', 'Action, Aventure', 'action', 'vin-diesel michelle-rodriguez john-cena', 'https://uqload.com/embed-1n0t0oopk78z.html'),
(6, 'venom-2', 'venom2.jpg', 'venom2.jpg', 'Venom : Let There Be Carnage', 'Après avoir choisi le journaliste d\'enquête Eddie Brock comme hôte, le symbiote extraterrestre Venom doit affronter un nouvel ennemi du nom de Carnage, qui se trouve à être l\'alter ego du tueur en série Cletus Kasady.', '8.1', '2021', 'movie', '', '', '', 'Andy Serkis', 'Action, Thriller', 'action', 'tom-hardy tom-holland woody-harrelson', 'https://uqload.com/embed-sfha8owxf1rh.html'),
(7, 'spider-man-far-from-home', 'spider-man-far-from-home.jpg', 'spider-man-far-from-home.jpg', 'Spider-Man: Far From Home', 'L\'araignée sympa du quartier décide de rejoindre ses meilleurs amis Ned, MJ, et le reste de la bande pour des vacances en Europe. Cependant, le projet de Peter de laisser son costume de super-héros derrière lui pendant quelques semaines est rapidement compromis quand il accepte à contrecoeur d\'aider Nick Fury à découvrir le mystère de plusieurs attaques de créatures, qui ravagent le continent !', '8.5', '2019', 'movie', '', '', '', 'Jon Watts', 'Action, Adventure, Disney, Fantasy, Science Fiction', 'action', 'tom-holland zendaya jake-gyllenhaal', 'https://uqload.com/embed-ogu6iazz97vh.html'),
(8, 'dune', 'dune.jpg', 'dune.jpg', 'Dune', 'Paul Atreides, un jeune homme brillant et doué au destin plus grand que lui-même, doit se rendre sur la planète la plus dangereuse de l\'univers afin d\'assurer l\'avenir de sa famille et de son peuple.', '8.1', '2021', 'movie', '', '', '', 'Denis Villeneuve', 'Action, Science-fiction', 'science-fiction', 'timothee-chalamet zendaya oscar-isaac', 'https://uqload.com/embed-dtesgf00smhn.html'),
(9, 'les-eternels', 'les-eternels.jpg', 'les-eternels.jpg', 'Les Éternels', 'Après les événements d\'\"Avengers : Endgame\", une tragédie imprévue oblige les Éternels à sortir de l\'ombre et à se rassembler à nouveau face à l\'ennemi le plus ancien de la race humaine : les Déviants.', '7.5', '2021', 'movie', '', '', '', 'Chloé Zhao', 'Action, Science-fiction', 'action', 'harry-styles angelina-jolie kit-harington', 'https://uqload.com/embed-qz9hmgpbi0zo.html'),
(10, 'jurassic-world-fallen-kingdom', 'jurassic-world-fallen-kingdom.jpg', 'jurassic-world-fallen-kingdom.jpg', 'Jurassic World: Fallen Kingdom', 'Cela fait maintenant trois ans que les dinosaures se sont échappés de leurs enclos et ont détruit le parc à thème et complexe de luxe Jurassic World. Isla Nublar a été abandonnée par les humains alors que les dinosaures survivants sont livrés à eux-mêmes dans la jungle. Lorsque le volcan inactif de l\'île commence à rugir, Owen et Claire s\'organisent pour sauver les dinosaures restants de l\'extinction.', '8.6', '2018', 'movie', '', '', '', 'Juan Antonio Bayona', 'Action, Aventure', 'action', 'bryce-dallas-howard chris-pratt', 'https://uqload.com/embed-pz65ot1udkge.html'),
(11, 'ca-chapitre-2', 'ca-chapitre-2.jpg', 'ca-chapitre-2.jpg', 'Ça : Chapitre 2', 'Utilisateurs de Google\r\nVingt-sept ans après les événements de la première attaque, le clown diabolique Pennywise revient hanter les rues de Derry, une ville paisible dans le Maine. Les membres du Club des Ratés, désormais adultes, se retrouvent alors après avoir été séparés les uns des autres depuis longtemps.', '8.3', '2019', 'movie', '', '', '', 'Andrés Muschietti', 'Horreur, Thriller', 'horreur', 'james-mcavoy jessica-chastain bill-hader', 'https://uqload.com/embed-4lysqu7hr479.html'),
(12, 'malcolm-saison-1-episode-1', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP1 | Je ne suis pas un monstre', 'Malcolm a été qualifié de génie et est transféré dans la classe Krelboyne.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-05uofug0vx93.html'),
(13, 'malcolm-saison-1-episode-2', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP2 | Alerte rouge', 'Loïs trouve sa robe d\'anniversaire rouge détruite et soupçonne ses enfants.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-myd1bgzisld2.html'),
(14, 'malcolm-saison-1-episode-3', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP3 | Seuls à la maison', 'Francis rentre pour garder les enfants quand Hal et Loïs s\'absentent', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranstonjane-kaczmarekfrankie-muniz', 'https://uqload.com/embed-5ezlu8oxnq7f.html'),
(15, 'malcolm-saison-1-episode-4', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP4 | Honte', 'Malcolm se retrouve contrarié par un nouveau tyran, Kevin.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-gdahacglxf1m.html'),
(16, 'malcolm-saison-1-episode-5', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP5 | Changement de famille', 'La famille vie dans une caravane quand leur maison est fumigée.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-m4osectigw6q.html'),
(17, 'malcolm-saison-1-episode-6', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP6 | Poquito Cabeza', 'Malcolm passe la nuit chez Stevie.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-raaqg0yrqo1q.html'),
(18, 'malcolm-saison-1-episode-7', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP7 | La Petite Évasion', 'Francis s\'échappe de l\'école militaire pour rendre visite à sa petite amie.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', ''),
(19, 'malcolm-saison-1-episode-8', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP8 | Panique au pique-nique', 'La famille se rend au pique-nique de la classe pour les élèves doués', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', ''),
(20, 'malcolm-saison-1-episode-9', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP9 | Ma mère, ce héros', 'Loïs est licenciée après que Dewey a volé une bouteille de cognac.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-ph75k52f33q5.html'),
(21, 'malcolm-saison-1-episode-10', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP10 | À fond la caisse', 'Hal prend un jour de congé et emmène les garçons aux courses de stock-car.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-91dhre5knds4.html'),
(22, 'malcolm-saison-1-episode-11', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP11 | Les Funérailles', 'Tante Helen meurt et la famille se prépare pour les funérailles.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-gcopin6b7jg3.html'),
(23, 'malcolm-saison-1-episode-12', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP12 | Pom pom boy', 'Reese rejoint les pom-pom girls. Il a le béguin pour l\'une des filles.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-98zz7uwe96wo.html'),
(24, 'malcolm-saison-1-episode-13', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP13 | Le Mot de trop', 'Hal enseigne à Malcolm comment faire du patin à roulettes et Malcolm jure.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-qrio5phyu343.html'),
(25, 'malcolm-saison-1-episode-14', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP14 | Le Robot-tueur', 'Loïs rend visite à Francis à l\'école militaire après une urgence médicale.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-juutdv3x73ip.html'),
(26, 'malcolm-saison-1-episode-15', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP15 | Lundimanche', 'Loïs a la grippe et ignore qu\'elle a passé deux jours au lit.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-judt4ige7ys5.html'),
(27, 'malcolm-saison-1-episode-16', 'malcolm.jpg', 'malcolm.jpg', 'Malcolm S1:EP16 | Le Liquidateur', 'La famille va au parc aquatique sauf Dewey, qui doit rester à la maison.', '9.5', '2000', 'show', 'malcolm', '6', '1', 'Linwood Boomer', 'Sitcom, Comédie', 'comedie', 'bryan-cranston jane-kaczmarek frankie-muniz', 'https://uqload.com/embed-fhri6861ort3.html'),
(28, 'harry-potter-a-l-ecole-des-sorciers', 'harry-potter-a-l-ecole-des-sorciers.jpg', 'harry-potter-a-l-ecole-des-sorciers.jpg', 'Harry Potter à l\'école des sorciers', 'Harry Potter, un jeune orphelin, est élevé par son oncle et sa tante qui le détestent. Alors qu\'il était haut comme trois pommes, ces derniers lui ont raconté que ses parents étaient morts dans un accident de voiture.', '9.3', '2001', 'movie', '', '', '', 'Chris Columbus', 'Aventure, Fantastique', 'aventure', 'daniel-radcliffe rupert-grint emma-watson', 'https://video-embed-imdb.xyz/s/?id=671'),
(29, 'harry-potter-et-la-chambre-des-secrets', 'harry-potter-et-la-chambre-des-secrets.jpg', 'harry-potter-et-la-chambre-des-secrets.jpg', 'Harry Potter et la Chambre des secrets', 'Alors que l\'oncle Vernon, la tante Pétunia et son cousin Dudley reçoivent d\'importants invités à dîner, Harry Potter est contraint de passer la soirée dans sa chambre. Dobby, un elfe, fait alors son apparition.', '9.1', '2002', 'movie', '', '', '', 'Chris Columbus', 'Aventure, Fantastique', 'aventure', 'daniel-radcliffe rupert-grint emma-watson', 'https://video-embed-imdb.xyz/s/?id=672'),
(30, 'harry-potter-et-le-prisonnier-d-azkaban', 'harry-potter-et-le-prisonnier-d-azkaban.jpg', 'harry-potter-et-le-prisonnier-d-azkaban.jpg', 'Harry Potter et le Prisonnier d\'Azkaban', 'Sirius Black, un dangereux sorcier criminel, s\'échappe de la sombre prison d\'Azkaban avec un seul et unique but : se venger d\'Harry Potter, entré avec ses amis Ron et Hermione en troisième année à l\'école de sorcellerie de Poudlard, où ils auront aussi à faire avec les terrifiants Détraqueurs.', '9.1', '2004', 'movie', '', '', '', 'Alfonso Cuarón', 'Aventure, Fantastique', 'aventure', 'daniel-radcliffe rupert-grint emma-watson', 'https://uqload.com/embed-eky7zolkhg8w.html'),
(31, 'harry-potter-et-la-coupe-de-feu', 'harry-potter-et-la-coupe-de-feu.jpg', 'harry-potter-et-la-coupe-de-feu.jpg', 'Harry Potter et la Coupe de feu', 'La quatrième année à l\'école de Poudlard est marquée par le Tournoi des trois sorciers. Les participants sont choisis par la fameuse coupe de feu, qui est à l\'origine d\'un scandale. Elle sélectionne Harry Potter tandis qu\'il n\'a pas l\'âge légal requis.', '9.1', '2005', 'movie', '', '', '', 'Mike Newell', 'Aventure', 'aventure', 'daniel-radcliffe rupert-grint emma-watson', 'https://uqload.com/embed-y0woupva2tvy.html'),
(32, 'ted', 'ted.jpg', 'ted.jpg', 'Ted', 'Noël 1985, dans la proche banlieue de Boston. Petit garçon solitaire, John Bennett, 8 ans, ne rêve que d\'une chose : avoir enfin un ami. Lorsque ses parents lui offrent un ours en peluche, il est fou de joie. Il le surnomme Ted et formule le vu que son nounours prenne vie. Et, petit miracle de Noël, à son réveil, John réalise que Ted s\'est effectivement animé. Trente ans plus tard, John et Ted sont toujours les meilleurs amis du monde.', '8.6', '2012', 'movie', '', '', '', 'Seth MacFarlane', 'Comédie', 'comedie', 'mark-wahlberg', 'https://uqload.com/embed-vem1uj54yib4.html'),
(33, 'harry-potter-et-l-ordre-du-phoenix', 'harry-potter-et-l-ordre-du-phoenix.jpg', 'harry-potter-et-l-ordre-du-phoenix.jpg', 'Harry Potter et l\'Ordre du Phénix', 'À sa cinquième année à l\'école de sorcellerie de Poudlard, Harry Potter passe pour un illuminé, le ministre de la magie Cornelius Fudge ayant officiellement réfuté les révélations de l\'adolescent et de son directeur, Dumbleore, disant que le terrifiant Lord Voldermort est de retour.', '9.1', '2007', 'movie', '', '', '', 'David Yates', 'Aventure', 'aventure', 'daniel-radcliffe rupert-grint emma-watson', 'https://video-embed-imdb.xyz/s/?id=675'),
(34, 'harry-potter-et-le-prince-de-sang-mele', 'harry-potter-et-le-prince-de-sang-mele.jpg', 'harry-potter-et-le-prince-de-sang-mele.jpg', 'Harry Potter et le Prince de sang-mêlé', 'Cette sixième année scolaire de Harry Potter à l\'école de sorciers commence par une dispute avec son ennemi juré Draco Malfoy, en qui les forces des ténèbres placent désormais leurs espoirs.', '9.1', '2009', 'movie', '', '', '', 'David Yates', 'Aventure', 'aventure', 'daniel-radcliffe rupert-grint emma-watson', 'https://video-embed-imdb.xyz/s/?id=767'),
(35, 'harry-potter-et-les-reliques-de-la-mort', 'harry-potter-et-les-reliques-de-la-mort.jpg', 'harry-potter-et-les-reliques-de-la-mort.jpg', 'Harry Potter et les reliques de la mort', 'Sans les conseils et la protection de leurs professeurs, Harry, Ron et Hermione ont pour mission de détruire les horcruxes, les origines de l\'immortalité de Voldemort. Bien que plus que jamais ils doivent compter l\'un sur l\'autre, les forces du mal menacent de les désunir.', '8.9', '2010', 'movie', '', '', '', 'David Yates', 'Aventure', 'aventure', 'daniel-radcliffe rupert-grint emma-watson', 'https://uqload.com/embed-9ghv23lc0t32.html'),
(36, 'harry-potter-et-les-reliques-de-la-mort-partie-2', 'harry-potter-et-les-reliques-de-la-mort-partie-2.jpg', 'harry-potter-et-les-reliques-de-la-mort-partie-2.jpg', 'Harry Potter et les reliques de la mort - Partie 2', 'Dans la deuxième partie de cette finale épique, la bataille entre les forces du bien et celles du mal du monde des magiciens dégénère en une guerre tous azimuts. Les enjeux n\'ont jamais été si grands et personne n\'est en sécurité.', '8.8', '2011', 'movie', '', '', '', 'David Yates', 'Aventure', 'aventure', 'daniel-radcliffe rupert-grint emma-watson', 'https://video-embed-imdb.xyz/s/?id=12445');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `code`
--
ALTER TABLE `code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
