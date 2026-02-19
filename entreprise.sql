-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 19 fév. 2026 à 22:54
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `entreprise`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `sujet` varchar(150) DEFAULT NULL,
  `message` text,
  `date_envoi` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `nom`, `prenom`, `telephone`, `email`, `sujet`, `message`, `date_envoi`) VALUES
(1, 'barr', 'rach', '80999900', 'rachidabarro78@gmail.com', 'commande', 'ggjhhj', '2026-02-09 16:24:07'),
(2, 'barr', 'rach', '80999900', 'rachidabarro78@gmail.com', 'commande', 'fghjk', '2026-02-09 17:14:20'),
(3, 'barr', 'rach', '80999900', 'rachidabarro78@gmail.com', 'commande', 'passez une commande', '2026-02-09 22:41:31'),
(4, 'barro', 'rachida', '80999900', 'rachidabarro78@gmail.com', 'vbjkjh', 'sdfgh', '2026-02-10 07:50:08');

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

DROP TABLE IF EXISTS `livraisons`;
CREATE TABLE IF NOT EXISTS `livraisons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `libelle_produit` varchar(150) NOT NULL,
  `quantite` decimal(4,2) NOT NULL,
  `prix_unitaire` int NOT NULL,
  `prix_total` int NOT NULL,
  `statut` enum('NON PAYÉE','PAYÉE') DEFAULT 'NON PAYÉE',
  `mode_paiement` enum('Espèces','Mobile Money','Carte bancaire','Autre') DEFAULT 'Espèces',
  `date_commande` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livraisons`
--

INSERT INTO `livraisons` (`id`, `nom`, `prenom`, `telephone`, `lieu`, `libelle_produit`, `quantite`, `prix_unitaire`, `prix_total`, `statut`, `mode_paiement`, `date_commande`) VALUES
(1, 'barro', 'rachida', '80999900', 'bonheur ville', 'Pincée Rouge', 12.00, 4000, 48000, 'NON PAYÉE', 'Mobile Money', '2026-02-06 09:26:58'),
(2, 'kone', 'salima', '80999900', 'bonheur ville', 'Simple Blanc 1L', 17.00, 5250, 89250, 'PAYÉE', 'Mobile Money', '2026-02-06 09:30:34'),
(3, 'barro', 'rachida', '80999900', 'katre', 'Pincée Rouge', 3.00, 4000, 12000, 'NON PAYÉE', 'Espèces', '2026-02-06 09:53:04'),
(4, 'barr', 'rach', '80999900', 'bonheur ville', 'Simple Blanc 0,5L', 12.00, 3000, 36000, 'NON PAYÉE', 'Espèces', '2026-02-09 16:54:27'),
(5, 'barr', 'rach', '80999900', 'bonheur ville', 'Simple Blanc 0,5L', 12.00, 3000, 36000, 'NON PAYÉE', 'Espèces', '2026-02-09 17:14:33'),
(6, 'barr', 'rach', '80999900', 'bonheur ville', 'Simple Blanc 1L', 12.00, 5250, 63000, 'NON PAYÉE', 'Espèces', '2026-02-09 22:31:16'),
(7, 'barro', 'rachida', '80999900', 'kar', 'Pincée Rouge', 12.00, 4000, 48000, 'PAYÉE', 'Mobile Money', '2026-02-10 07:46:25');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
