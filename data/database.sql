-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  sam. 19 déc. 2020 à 16:51
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `ucg_cinema`
--
CREATE DATABASE IF NOT EXISTS `ucg_cinema_v2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ucg_cinema_v2`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Action'),
(2, 'Aventure'),
(3, 'Documentaire'),
(4, 'Combat'),
(5, 'Horreur');

-- --------------------------------------------------------

--
-- Structure de la table `favorie`
--

CREATE TABLE `favorie` (
  `id` int(11) NOT NULL,
  `filmID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `affiche` varchar(255) DEFAULT NULL,
  `dateSortir` datetime NOT NULL,
  `categorieID` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `titre`, `description`, `auteur`, `affiche`, `dateSortir`, `categorieID`, `dateCreation`, `dateModification`) VALUES
(3, 'Joker', 'Joker', 'dcdcd', '5fde244bf22a8.jpg', '2020-12-10 00:00:00', 2, '2020-12-19 17:03:23', '2020-12-19 17:03:23'),
(4, 'avenger', 'avenger', 'avenger', '5fde255af16ce.jpg', '2020-12-15 00:00:00', 1, '2020-12-19 17:07:54', '2020-12-19 17:07:54');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `genre` varchar(5) NOT NULL,
  `role` varchar(10) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `cgu` tinyint(1) DEFAULT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModification` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `genre`, `role`, `avatar`, `dateNaissance`, `cgu`, `dateCreation`, `dateModification`) VALUES
(2, 'paul@gmail.com', '$2y$10$BCD6sDYaqpXJLis6KhbcEOCHhJgOyBLjVn4JeeDPLAl50s/DXo5Y6', 'paul@gmail.com', 'H', 'ROLE_USER', NULL, '1898-10-10', 1, '2020-12-12 17:01:46', '2020-12-12 17:01:46'),
(3, 'admin@gmail.com', '$2y$10$BCD6sDYaqpXJLis6KhbcEOCHhJgOyBLjVn4JeeDPLAl50s/DXo5Y6', 'admin@gmail.com', 'F', 'ROLE_ADMIN', NULL, '1898-10-10', 1, '2020-12-12 17:01:46', '2020-12-12 17:01:46');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `favorie`
--
ALTER TABLE `favorie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film_id` (`filmID`),
  ADD KEY `user_id` (`userID`);

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `categorie_id` (`categorieID`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `favorie`
--
ALTER TABLE `favorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `favorie`
--
ALTER TABLE `favorie`
  ADD CONSTRAINT `film_id` FOREIGN KEY (`filmID`) REFERENCES `film` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`userID`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `categorie_id` FOREIGN KEY (`categorieID`) REFERENCES `categorie` (`id`);