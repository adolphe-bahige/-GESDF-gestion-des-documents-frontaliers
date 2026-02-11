-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 11 fév. 2026 à 11:26
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_docs`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `role`, `photo`, `created_at`) VALUES
(4, 'Adolphe', 'adolphe@gmail.com', 'fc852b8065b97c81c33dccaa3e2f1a0cd74dccfe', 'administrateur', 'IMG-20240206-WA0070.jpg', '2025-11-04 13:47:02');

-- --------------------------------------------------------

--
-- Structure de la table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `profession` varchar(100) DEFAULT NULL,
  `type_document` varchar(100) DEFAULT NULL,
  `validity` date DEFAULT NULL,
  `invalidity` date DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `num_document` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `statut` varchar(20) DEFAULT 'valide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `documents`
--

INSERT INTO `documents` (`id`, `id_admin`, `name`, `nationality`, `profession`, `type_document`, `validity`, `invalidity`, `photo`, `num_document`, `created_at`, `statut`) VALUES
(10, 4, 'Jeremie bisimwa', 'congolaise', 'developpeur', 'cpgl', '2025-01-20', '2026-01-21', 'IMG-20240206-WA0069.jpg', '2571001', '2025-11-04 13:52:49', 'expiré'),
(11, 4, 'Johnson jc', 'congolaise', 'etudiant', 'cpgl', '2024-02-10', '2025-02-11', 'Screenshot_20240130-160853.png', '2571102', '2025-11-04 14:04:23', 'expiré'),
(12, 4, 'Donnel irakoze', 'burundaise', 'Entrepreneur', 'passe-port', '2022-04-20', '2032-04-21', '1754912442554.jpg', '2571203', '2025-11-04 14:32:30', 'valide');

-- --------------------------------------------------------

--
-- Structure de la table `entrer_sortie`
--

CREATE TABLE `entrer_sortie` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_document` int(11) DEFAULT NULL,
  `num_document` varchar(255) DEFAULT NULL,
  `enter_sortie` varchar(255) DEFAULT NULL,
  `lieu_dest` varchar(255) DEFAULT NULL,
  `motif` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `entrer_sortie`
--

INSERT INTO `entrer_sortie` (`id`, `id_admin`, `id_document`, `num_document`, `enter_sortie`, `lieu_dest`, `motif`, `created_at`) VALUES
(1, NULL, 2, '257202', 'sortie', 'uvira', 'vacances', '2025-06-10 16:15:11'),
(2, NULL, 4, '257403', 'entrer', 'bujumbura', 'travail', '2025-06-10 16:51:30'),
(3, NULL, 8, '257807', 'entrer', 'bukavu', 'vacances', '2025-06-12 09:23:27'),
(4, 4, 10, '2571001', 'entrer', 'bujumbura', 'Etudes', '2025-11-04 14:07:04'),
(5, 4, 12, '2571203', 'sortie', 'goma', 'Tourisme ', '2025-11-04 14:33:02');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `num_document` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `actions` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `num_document`, `message`, `actions`, `created_at`) VALUES
(1, '257101', 'Un nouveau cpgl a été enregistré au nom de : Julia', 'enregistrement', '2025-06-10 16:07:39'),
(2, '257202', 'Un nouveau passe-port a été enregistré au nom de : Rukundo gaspard', 'enregistrement', '2025-06-10 16:09:38'),
(3, '257303', 'Un nouveau cpgl a été enregistré au nom de : Adolphe ', 'enregistrement', '2025-06-10 16:12:51'),
(4, '257403', 'Un nouveau passe-port a été enregistré au nom de : Adolphe ', 'enregistrement', '2025-06-10 16:49:49'),
(5, '257504', 'Un nouveau passe-port a été enregistré au nom de : Jeremie', 'enregistrement', '2025-06-11 08:27:55'),
(6, '257605', 'Un nouveau cpgl a été enregistré au nom de : Julia ishimiye', 'enregistrement', '2025-06-11 08:35:51'),
(7, '257706', 'Un nouveau cpgl a été enregistré au nom de : Adolphe ', 'enregistrement', '2025-06-11 09:31:10'),
(8, '257807', 'Un nouveau passe-port a été enregistré au nom de : Jeremie bisimwa', 'enregistrement', '2025-06-12 09:22:01'),
(9, '257908', 'Un nouveau passe-port a été enregistré au nom de : Afia dorcas', 'enregistrement', '2025-06-12 09:26:26'),
(10, '2571001', 'Un nouveau cpgl a été enregistré au nom de : Jeremie bisimwa', 'enregistrement', '2025-11-04 13:52:49'),
(11, '2571102', 'Un nouveau cpgl a été enregistré au nom de : Johnson jc', 'enregistrement', '2025-11-04 14:04:23'),
(12, '2571203', 'Un nouveau passe-port a été enregistré au nom de : Donnel irakoze', 'enregistrement', '2025-11-04 14:32:30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN KEY ADMIN` (`id_admin`);

--
-- Index pour la table `entrer_sortie`
--
ALTER TABLE `entrer_sortie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN KEY ADMIN` (`id_admin`),
  ADD KEY `FOREIGN KEY DOCUMENT` (`id_document`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `entrer_sortie`
--
ALTER TABLE `entrer_sortie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entrer_sortie`
--
ALTER TABLE `entrer_sortie`
  ADD CONSTRAINT `entrer_sortie_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
