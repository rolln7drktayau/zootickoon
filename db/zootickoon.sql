-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 15 mai 2022 à 14:02
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zootickoon`
--

-- --------------------------------------------------------

--
-- Structure de la table `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE IF NOT EXISTS `animal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `imgURL` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id_idx` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `animal`
--

INSERT INTO `animal` (`id`, `name`, `category_id`, `imgURL`) VALUES
(5, 'Panda Géant', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(6, 'Tigre', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(7, 'Cerf', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(8, 'Lynx', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(9, 'Pic Vert', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(10, 'Pic Noir', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(11, 'Gorille', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(12, 'Guépard', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(13, 'Diable de Tasmanie', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(14, 'Grenouille des bois', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(15, 'Bouquetin', 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(16, 'Marmotte', 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(17, 'Chamois', 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(18, 'Renard', 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(19, 'Grand Tétras (Coq des Bruyères)', 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(20, 'Mouflon', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(21, 'Biche', 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(22, 'Baleine', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(23, 'Girafe', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(24, 'Dauphin', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(25, 'Marsouin', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(26, 'Cachalot', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(27, 'Orques', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(28, 'Bélouga', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(29, 'Narval', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(30, 'Phoques', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(31, 'Otaries', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(32, 'Morse', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(33, 'Léopard de Mer', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(34, 'Hippopotame', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(35, 'Eléphant de Mer', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(36, 'Lamantin', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(37, 'Dugong', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(38, 'Panthère', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(39, 'Chimpanzé', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(40, 'Lycaon', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(41, 'Tamanoir', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(42, 'Ours Brun', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(43, 'Panda', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(44, 'Panda roux', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(45, 'test', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(46, 'test', 1, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(47, 'test', 2, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/Lion_d%27Afrique.jpg/435px-Lion_d%27Afrique.jpg'),
(48, 'cac', 1, 'cac');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Aquatic'),
(2, 'Forest'),
(3, 'Mountain'),
(4, 'Savana');

-- --------------------------------------------------------

--
-- Structure de la table `issue`
--

DROP TABLE IF EXISTS `issue`;
CREATE TABLE IF NOT EXISTS `issue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  `author` int(11) NOT NULL,
  `date_issue` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_fk_idx` (`author`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `issue`
--

INSERT INTO `issue` (`id`, `description`, `author`, `date_issue`, `statut`) VALUES
(1, 'test', 3, '2022-05-15 12:10:30', 1),
(2, 'test', 3, '2022-05-15 12:10:30', 1),
(3, 'dgfqsfqsfq', 3, '2022-05-15 12:10:30', 0),
(4, 'issues', 3, '2022-05-15 12:10:30', 0),
(5, 'animal escape', 3, '2022-05-15 12:10:30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `shop`
--

DROP TABLE IF EXISTS `shop`;
CREATE TABLE IF NOT EXISTS `shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `statut` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shop`
--

INSERT INTO `shop` (`id`, `name`, `description`, `price`, `statut`, `quantity`) VALUES
(1, 'Key Ring Tiger', 'Key Ring Tiger', '5', NULL, NULL),
(2, 'Key Ring Panda', 'Key Ring Tiger', '5', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `shop_order`
--

DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE IF NOT EXISTS `shop_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `statut` int(11) NOT NULL DEFAULT '0',
  `date_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `item_id_idx` (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shop_order`
--

INSERT INTO `shop_order` (`id`, `user_id`, `item_id`, `statut`, `date_order`) VALUES
(2, 3, 1, 1, '2022-05-15 12:10:54'),
(3, 3, 1, 0, '2022-05-15 12:10:54'),
(4, 3, 2, 0, '2022-05-15 12:10:54'),
(5, 3, 2, 0, '2022-05-15 12:10:54'),
(6, 3, 2, 0, '2022-05-15 12:10:54'),
(7, 3, 1, 0, '2022-05-15 12:27:18'),
(8, 3, 2, 0, '2022-05-15 12:40:16');

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`id`, `name`, `description`, `price`) VALUES
(1, 'Solo pass', 'Solo pass', '5'),
(2, 'Duo pass', 'Duo pass', '5'),
(3, 'Family pass', 'Family pass', '30');

-- --------------------------------------------------------

--
-- Structure de la table `ticket_order`
--

DROP TABLE IF EXISTS `ticket_order`;
CREATE TABLE IF NOT EXISTS `ticket_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `statut` int(11) DEFAULT '0',
  `date_order` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  KEY `ticket_id_idx` (`ticket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ticket_order`
--

INSERT INTO `ticket_order` (`id`, `user_id`, `ticket_id`, `statut`, `date_order`) VALUES
(2, 3, 1, 1, '2022-05-14 22:00:00'),
(4, 3, 3, 0, '2022-05-15 12:27:25'),
(5, 5, 1, 0, '2022-05-15 13:53:10');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pass` varchar(400) NOT NULL,
  `right` int(45) DEFAULT '3',
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `pass`, `right`, `date`) VALUES
(3, 'admin', 'admin', 'admin@gmail.com', '$2y$10$EFfOWPU3R48nuzSSYu5/qeLQgpwBZg1PatGW6OaiXaC3wpHvoL9P6', 1, '2022-05-15 12:09:45'),
(5, 'simpleuser', 'simpleuser', 'simpleuser@gmail.com', '$2y$10$euW6i8eX/.E1onxbFJ6KrOf1PPTuHJodcyI2eIBKc8u0gGRS1U44u', 3, '2022-05-15 13:40:03');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `shop_order`
--
ALTER TABLE `shop_order`
  ADD CONSTRAINT `item_id` FOREIGN KEY (`item_id`) REFERENCES `shop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `ticket_order`
--
ALTER TABLE `ticket_order`
  ADD CONSTRAINT `ticket_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ticket_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
