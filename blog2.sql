-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : Dim 28 fév. 2021 à 14:18
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP DATABASE IF EXISTS blog2;
CREATE DATABASE blog2;

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(1, 'android'),
(2, 'php'),
(3, 'javascript'),
(4, 'java'),
(5, 'python');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(255) NOT NULL,
  `commentator_id` int(255) NOT NULL,
  `post_id` int(255) NOT NULL,
  `comment` text DEFAULT NULL,
  `date_com` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `commentator_id`, `post_id`, `comment`, `date_com`) VALUES
(1, 2, 1, 'à la maison je n\'y arriverai pas.\r\nJe préfère être dans un club, il y a une dynamique, j\'imagine qu\'il y a des projets à développer ...\r\nIl me faut un cadre, avec un bouquin je n’avancerai pas, j\'ai déjà essayé', '2017-07-30 20:38:08'),
(2, 4, 1, 'yes i am\r\ntestetsttestttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', '2021-02-28 10:50:55');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(255) NOT NULL,
  `poster_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date_post` datetime DEFAULT NULL,
  `category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `poster_id`, `title`, `description`, `date_post`, `category_id`) VALUES
(1, 1, 'Groupe programmation Android', 'Bonjour,\r\n \r\nJe suis à la recherche d\'un groupe/club ou formation de programmation avec des sessions le week-end ou le soir ?\r\n \r\nJe souhaite apprendre à programmer en Java pour développer des applications voire application Android.\r\n \r\nMerci', '2017-06-28 20:16:44', 1),
(2, 1, 'Groupe programmation Android', 'Bonjour,\r\n \r\nJe suis à la recherche d\'un groupe/club ou formation de programmation avec des sessions le week-end ou le soir ?\r\n \r\nJe souhaite apprendre à programmer en Java pour développer des applications voire application Android.\r\n \r\nMerci', '2017-07-10 20:21:06', 1),
(3, 1, 'Search Android Partner and PHP', 'I am looking to team up with an android expert able to do amazing things with a mobile phone', '2017-07-18 23:56:54', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'apocalypse', '936c19a5a54758a9547a066ca2c867e5', 'fernandez45@hotmail.com', 1),
(2, 'carookhan', '936c19a5a54758a9547a066ca2c867e5', 'le_debutant@yahoo.fr', 1),
(4, 'yougoxes', '12b4ca614c78b00f09b45a36f1417d1a', 'maelpineau63@gmail.com', 2),
(5, 'dylan', 'b83560f2b16554f458b7c36147b05c33', 'dylanvole@gmail.com', 1),
(6, 'Admin', '372eeffaba2b5b61fb02513ecb84f1ff', 'administrateur@gmail.com', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentator_id` (`commentator_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poster_id` (`poster_id`),
  ADD KEY `post_ibfk_2_idx` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`commentator_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`poster_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
