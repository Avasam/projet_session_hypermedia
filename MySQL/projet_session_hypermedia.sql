-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 23 Mai 2017 à 06:01
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_session_hypermedia`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE `categorie` (
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `categorie`:
--

--
-- Vider la table avant d'insérer `categorie`
--

TRUNCATE TABLE `categorie`;
--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`nom`) VALUES
('Boissons'),
('Fruits et légumes'),
('Pain et céréales'),
('Pâtes'),
('Produits laitiers'),
('Sucreries et collations'),
('Viandes');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `no_client` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `courriel` varchar(254) NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `administrateur` tinyint(1) NOT NULL DEFAULT '0',
  `panier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `client`:
--   `panier`
--       `commande` -> `no_commande`
--   `panier`
--       `commande` -> `no_commande`
--

--
-- Vider la table avant d'insérer `client`
--

TRUNCATE TABLE `client`;
--
-- Contenu de la table `client`
--

INSERT INTO `client` (`no_client`, `nom`, `courriel`, `mot_de_passe`, `administrateur`, `panier`) VALUES
(1, 'Samuel Therrien', 'samuel.06@hotmail.com', 'admin123', 1, NULL),
(2, 'Patrik Artur ', 'artur@gmail.com', 'admin123', 1, NULL),
(3, 'Generic Bob ', 'bob@gmail.com', 'password', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE `commande` (
  `no_commande` int(11) NOT NULL,
  `paiement` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `commande`:
--

--
-- Vider la table avant d'insérer `commande`
--

TRUNCATE TABLE `commande`;
--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`no_commande`, `paiement`) VALUES
(1, '2017-04-18'),
(2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `no_produit` int(4) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` decimal(5,2) NOT NULL,
  `rabais_pct` int(2) NOT NULL DEFAULT '0',
  `rabais_abs` decimal(5,2) NOT NULL DEFAULT '0.00',
  `description` longtext,
  `image` varchar(255) NOT NULL DEFAULT 'default.png',
  `categorie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `produit`:
--   `categorie`
--       `categorie` -> `nom`
--

--
-- Vider la table avant d'insérer `produit`
--

TRUNCATE TABLE `produit`;
--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`no_produit`, `nom`, `prix`, `rabais_pct`, `rabais_abs`, `description`, `image`, `categorie`) VALUES
(16, 'Lait Natrel 3%', '2.00', 0, '0.00', 'Du lait à 3% de Natrel', 'natrel3.png', 'Produits laitiers'),
(17, 'Brownies', '3.50', 2, '0.00', 'Délicieux petits gâteaux au chocolat.', 'brownie.png', 'Sucreries et collations'),
(18, 'Jus d\'orange Tropicana', '2.25', 0, '0.50', 'Jus d\'Orange à 100% (sans pulpes)', 'orangetropicana.png', 'Boissons'),
(19, 'Froot Loops', '4.00', 1, '1.00', 'Froot Loops TM', 'frootloops.png', NULL),
(20, 'Barre Mars', '1.19', 0, '0.00', NULL, '', 'Sucreries et collations');

-- --------------------------------------------------------

--
-- Structure de la table `produit_commande`
--

DROP TABLE IF EXISTS `produit_commande`;
CREATE TABLE `produit_commande` (
  `no_commande` int(11) NOT NULL,
  `no_produit` int(4) NOT NULL,
  `quantite` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `produit_commande`:
--   `no_commande`
--       `commande` -> `no_commande`
--   `no_produit`
--       `produit` -> `no_produit`
--

--
-- Vider la table avant d'insérer `produit_commande`
--

TRUNCATE TABLE `produit_commande`;
--
-- Contenu de la table `produit_commande`
--

INSERT INTO `produit_commande` (`no_commande`, `no_produit`, `quantite`) VALUES
(1, 16, 1),
(1, 19, 1),
(2, 16, 1),
(2, 17, 1),
(2, 18, 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit_favoris`
--

DROP TABLE IF EXISTS `produit_favoris`;
CREATE TABLE `produit_favoris` (
  `no_client` int(11) NOT NULL,
  `no_produit` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONS POUR LA TABLE `produit_favoris`:
--   `no_client`
--       `client` -> `no_client`
--   `no_produit`
--       `produit` -> `no_produit`
--   `no_client`
--       `client` -> `no_client`
--   `no_produit`
--       `produit` -> `no_produit`
--

--
-- Vider la table avant d'insérer `produit_favoris`
--

TRUNCATE TABLE `produit_favoris`;
--
-- Contenu de la table `produit_favoris`
--

INSERT INTO `produit_favoris` (`no_client`, `no_produit`) VALUES
(3, 17),
(3, 20);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`nom`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`no_client`),
  ADD KEY `panier` (`panier`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`no_commande`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`no_produit`),
  ADD KEY `categorie` (`categorie`);

--
-- Index pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD PRIMARY KEY (`no_commande`,`no_produit`),
  ADD KEY `produit_commande_fk2` (`no_produit`);

--
-- Index pour la table `produit_favoris`
--
ALTER TABLE `produit_favoris`
  ADD PRIMARY KEY (`no_client`,`no_produit`),
  ADD KEY `produit_favoris_fk2` (`no_produit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `no_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `no_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `no_produit` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_fk1` FOREIGN KEY (`panier`) REFERENCES `commande` (`no_commande`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`nom`);

--
-- Contraintes pour la table `produit_commande`
--
ALTER TABLE `produit_commande`
  ADD CONSTRAINT `produit_commande_fk1` FOREIGN KEY (`no_commande`) REFERENCES `commande` (`no_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_commande_fk2` FOREIGN KEY (`no_produit`) REFERENCES `produit` (`no_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit_favoris`
--
ALTER TABLE `produit_favoris`
  ADD CONSTRAINT `produit_favoris_fk1` FOREIGN KEY (`no_client`) REFERENCES `client` (`no_client`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `produit_favoris_fk2` FOREIGN KEY (`no_produit`) REFERENCES `produit` (`no_produit`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
