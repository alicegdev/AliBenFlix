-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 11 mai 2022 à 17:00
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alibenflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `actor`
--

INSERT INTO `actor` (`id`, `lastName`, `firstName`, `picture`) VALUES
(1, 'Pitt', 'Brad', 'http://www.cinemapassion.com/photos-personnalites/Brad-Pitt-photo-252.jpg'),
(2, 'Thurman', 'Uma', 'https://cde.peru.com/ima/0/0/7/9/7/797109.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'horreur'),
(2, 'thriller'),
(3, 'romance'),
(4, 'historique'),
(5, 'mafia'),
(6, 'comédie musicale'),
(7, 'comédie'),
(8, 'drame');

-- --------------------------------------------------------

--
-- Structure de la table `lastwatched`
--

CREATE TABLE `lastwatched` (
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` varchar(200) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `synopsis` varchar(500) NOT NULL,
  `picture` varchar(600) NOT NULL,
  `averageRating` float DEFAULT NULL,
  `show` tinyint(1) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`id`, `name`, `synopsis`, `picture`, `averageRating`, `show`, `added_at`) VALUES
(1, 'Squid Game', 'Tentés par un prix alléchant en cas de victoire, des centaines de joueurs désargentés acceptent de s\'affronter lors de jeux pour enfants aux enjeux mortels.', 'https://lanticapitaliste.org/sites/default/files/styles/largeur_content_hauteur_complet/public/squidgame.jpeg?itok=lIQ7krOV', NULL, 1, '2022-02-17 14:41:43'),
(2, 'La Casa de Papel', ' Un homme mystérieux, surnommé le Professeur, planifie le meilleur braquage jamais réalisé. Pour exécuter son plan, il recrute huit des meilleurs malfaiteurs en Espagne qui n\'ont rien à perdre. ... Le but est d\'infiltrer la Banque d\'Espagne afin de dérober 90 tonnes d\'or.', 'https://media.vogue.fr/photos/5d0ba7fb36e61b2c529b1ab0/master/w_1600,c_limit/LaCASA_PART3_Vertical-Main_RGB_FR.jpg', NULL, 1, '2022-02-17 14:41:43'),
(3, 'Chroniques de Bridgerton', 'À Londres, pendant la Régence, Daphne Bridgerton, fille aînée d\'une puissante dynastie, est censée se trouver un mari, mais la concurrence est rude et ses envies sont ailleurs...', 'https://fr.web.img2.acsta.net/pictures/20/11/02/17/06/0435875.jpg', NULL, 1, '2022-02-17 14:41:43');

-- --------------------------------------------------------

--
-- Structure de la table `movie_actor`
--

CREATE TABLE `movie_actor` (
  `id` int(11) NOT NULL,
  `movie_fk` int(11) NOT NULL,
  `actorMovie_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_fk` int(11) NOT NULL,
  `genreMovie_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_fk`, `genreMovie_fk`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Structure de la table `movie_rating`
--

CREATE TABLE `movie_rating` (
  `id` int(11) NOT NULL,
  `movie_fk` int(11) NOT NULL,
  `ratingMovie_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `movie_realisator`
--

CREATE TABLE `movie_realisator` (
  `id` int(11) NOT NULL,
  `movie_fk` int(11) NOT NULL,
  `realisatorMovie_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `preferences_actor`
--

CREATE TABLE `preferences_actor` (
  `id` int(11) NOT NULL,
  `actorPref_fk` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `preferences_actor`
--

INSERT INTO `preferences_actor` (`id`, `actorPref_fk`, `user_fk`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `preferences_genre`
--

CREATE TABLE `preferences_genre` (
  `id` int(11) NOT NULL,
  `genrePref_fk` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `preferences_genre`
--

INSERT INTO `preferences_genre` (`id`, `genrePref_fk`, `user_fk`) VALUES
(1, 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `preferences_realisator`
--

CREATE TABLE `preferences_realisator` (
  `id` int(11) NOT NULL,
  `realisatorPref_fk` int(11) NOT NULL,
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `preferences_realisator`
--

INSERT INTO `preferences_realisator` (`id`, `realisatorPref_fk`, `user_fk`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `rating`
--

CREATE TABLE `rating` (
  `id` int(4) NOT NULL,
  `stars` int(1) NOT NULL,
  `comment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `realisator`
--

CREATE TABLE `realisator` (
  `id` int(11) NOT NULL,
  `lastName` varchar(40) NOT NULL,
  `firstName` varchar(40) NOT NULL,
  `picture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `realisator`
--

INSERT INTO `realisator` (`id`, `lastName`, `firstName`, `picture`) VALUES
(1, 'Tarantino', 'Quentin', 'https://media.gettyimages.com/photos/quentin-tarantino-attends-the-closing-ceremony-screening-of-the-the-picture-id1151625686?k=20&m=1151625686&s=612x612&w=0&h=Arxw3b1YDe_m1nhyozLAGB_b09SgfWYbdFCIacVLbVQ='),
(2, 'Scorsese', 'Martin', 'https://www.bing.com/th?id=ODL.d60237204f8505bc86f092d7a4a8aac7&w=298&h=204&c=12&rs=1&qlt=99&pcl=faf9f7&o=6&pid=13.1');

-- --------------------------------------------------------

--
-- Structure de la table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(4) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_password` varchar(40) NOT NULL,
  `rating_fk` int(11) DEFAULT NULL,
  `lastWatched_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `user_password`, `rating_fk`, `lastWatched_fk`) VALUES
(2, 'Goarnisson', 'Alice', 'alice.goarnisson@gmail.com', 'de5949721e6352f01dfef317c3e898a8', NULL, NULL),
(3, 'Brulaire', 'Benjamin', 'benjamin.brulaire@gmail.com', '975029dd20b23af76de814031e8a467d', NULL, NULL),
(4, 'Martins', 'Antonio', 'antonio.martins@gmail.com', '6eec935362cc86ff5a6d833ca91bc786', NULL, NULL),
(5, 'Gaillard', 'Martine', 'rosasmart13@gmail.com', '7ebcb1d56c1c442f8a915254daa14fa0', NULL, NULL),
(9, 'Brulaire', 'Benjamin', 'benjamin.brulaire@gmail.com', '362e115fe52f1d4b4992dc48d4ab7d06', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lastwatched`
--
ALTER TABLE `lastwatched`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sender` (`sender`),
  ADD UNIQUE KEY `receiver` (`receiver`);

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movie_fk` (`movie_fk`),
  ADD UNIQUE KEY `actorMovie_fk` (`actorMovie_fk`);

--
-- Index pour la table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movie_fk` (`movie_fk`),
  ADD UNIQUE KEY `genreMovie_fk` (`genreMovie_fk`);

--
-- Index pour la table `movie_rating`
--
ALTER TABLE `movie_rating`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movie_fk` (`movie_fk`),
  ADD UNIQUE KEY `ratingMovie_fk` (`ratingMovie_fk`);

--
-- Index pour la table `movie_realisator`
--
ALTER TABLE `movie_realisator`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `movie_fk` (`movie_fk`),
  ADD UNIQUE KEY `realisatorMovie_fk` (`realisatorMovie_fk`);

--
-- Index pour la table `preferences_actor`
--
ALTER TABLE `preferences_actor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actorPref_fk` (`actorPref_fk`),
  ADD KEY `user_fk` (`user_fk`);

--
-- Index pour la table `preferences_genre`
--
ALTER TABLE `preferences_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_fk`),
  ADD KEY `genrePref_fk` (`genrePref_fk`) USING BTREE;

--
-- Index pour la table `preferences_realisator`
--
ALTER TABLE `preferences_realisator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `realisatorPref_fk` (`realisatorPref_fk`) USING BTREE,
  ADD KEY `user_fk` (`user_fk`) USING BTREE;

--
-- Index pour la table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `realisator`
--
ALTER TABLE `realisator`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lastWatched_fk` (`lastWatched_fk`),
  ADD UNIQUE KEY `rating_fk` (`rating_fk`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `lastwatched`
--
ALTER TABLE `lastwatched`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `movie_actor`
--
ALTER TABLE `movie_actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `movie_rating`
--
ALTER TABLE `movie_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `movie_realisator`
--
ALTER TABLE `movie_realisator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `preferences_actor`
--
ALTER TABLE `preferences_actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `preferences_genre`
--
ALTER TABLE `preferences_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `preferences_realisator`
--
ALTER TABLE `preferences_realisator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `realisator`
--
ALTER TABLE `realisator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `movie_actor_ibfk_1` FOREIGN KEY (`movie_fk`) REFERENCES `movie` (`id`),
  ADD CONSTRAINT `movie_actor_ibfk_2` FOREIGN KEY (`actorMovie_fk`) REFERENCES `actor` (`id`);

--
-- Contraintes pour la table `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD CONSTRAINT `movie_genre_ibfk_1` FOREIGN KEY (`genreMovie_fk`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `movie_genre_ibfk_2` FOREIGN KEY (`movie_fk`) REFERENCES `movie` (`id`);

--
-- Contraintes pour la table `movie_rating`
--
ALTER TABLE `movie_rating`
  ADD CONSTRAINT `movie_rating_ibfk_1` FOREIGN KEY (`ratingMovie_fk`) REFERENCES `rating` (`id`),
  ADD CONSTRAINT `movie_rating_ibfk_2` FOREIGN KEY (`movie_fk`) REFERENCES `movie` (`id`);

--
-- Contraintes pour la table `movie_realisator`
--
ALTER TABLE `movie_realisator`
  ADD CONSTRAINT `movie_realisator_ibfk_1` FOREIGN KEY (`realisatorMovie_fk`) REFERENCES `realisator` (`id`),
  ADD CONSTRAINT `movie_realisator_ibfk_2` FOREIGN KEY (`movie_fk`) REFERENCES `movie` (`id`);

--
-- Contraintes pour la table `preferences_actor`
--
ALTER TABLE `preferences_actor`
  ADD CONSTRAINT `preferences_actor_ibfk_2` FOREIGN KEY (`actorPref_fk`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `preferences_actor_ibfk_3` FOREIGN KEY (`user_fk`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `preferences_genre`
--
ALTER TABLE `preferences_genre`
  ADD CONSTRAINT `preferences_genre_ibfk_2` FOREIGN KEY (`genrePref_fk`) REFERENCES `genre` (`id`),
  ADD CONSTRAINT `preferences_genre_ibfk_3` FOREIGN KEY (`user_fk`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `preferences_realisator`
--
ALTER TABLE `preferences_realisator`
  ADD CONSTRAINT `preferences_realisator_ibfk_2` FOREIGN KEY (`realisatorPref_fk`) REFERENCES `realisator` (`id`),
  ADD CONSTRAINT `preferences_realisator_ibfk_3` FOREIGN KEY (`user_fk`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
