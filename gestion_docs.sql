-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 sep. 2025 à 08:49
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
(1, 'Jeremie bisimwa', 'jeremi@gmail.com', 'fc852b8065b97c81c33dccaa3e2f1a0cd74dccfe', 'administrateur', 'IMG_0582.PNG', '2025-06-10 16:05:11'),
(2, 'Afia dorcas', 'adolphe@gmail.com', '4aff48958f8f555afdde6bc438be8bbf96947e7d', 'administrateur', NULL, '2025-06-10 16:47:19'),
(3, 'Jean raha', 'jean@gmail.com', 'ad882a447898b0242730d9780726102e73be49b4', 'administrateur', NULL, '2025-06-11 09:44:32');

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
(1, 1, 'Julia julian', 'congolaise', 'etudiant', 'cpgl', '2025-06-12', '2026-06-12', 'IMG_0582.PNG', '257101', '2025-06-10 16:07:38', 'valide'),
(2, 1, 'Rukundo gaspard', 'burundaise', 'etudiant', 'passe-port', '2025-06-19', '2035-06-20', 'IMG_0580.JPG', '257202', '2025-06-10 16:09:37', 'valide'),
(4, 2, 'Adolphe  bhg', 'congolaise', 'developpeur', 'passe-port', '2025-06-25', '2025-06-19', 'IMG_0569.JPG', '257403', '2025-06-10 16:49:49', 'expiré'),
(5, 1, 'Jeremie', 'congolaise', 'developpeur', 'passe-port', '2025-06-19', '2035-06-19', 'IMG_0581.JPG', '257504', '2025-06-11 08:27:54', 'valide'),
(6, 1, 'Julia ishimiye', 'burundaise', 'professeur', 'cpgl', '2025-06-11', '2025-06-10', 'IMG_0580.JPG', '257605', '2025-06-11 08:35:51', 'expiré'),
(7, 1, 'Adolphe ', 'congolaise', 'etudiant', 'cpgl', '2025-06-12', '2026-06-12', 'IMG_0582.PNG', '257706', '2025-06-11 09:31:10', 'valide'),
(8, 1, 'Jeremie bisimwa', 'congolaise', 'etudiant', 'passe-port', '2025-06-18', '2035-06-20', 'IMG_0582.PNG', '257807', '2025-06-12 09:22:01', 'valide'),
(9, 1, 'Afia dorcas', 'francaise', 'professeur', 'passe-port', '2025-06-12', '2025-06-20', 'IMG_0582.PNG', '257908', '2025-06-12 09:26:25', 'expiré');

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
(1, 1, 2, '257202', 'sortie', 'uvira', 'vacances', '2025-06-10 16:15:11'),
(2, 2, 4, '257403', 'entrer', 'bujumbura', 'travail', '2025-06-10 16:51:30'),
(3, 1, 8, '257807', 'entrer', 'bukavu', 'vacances', '2025-06-12 09:23:27');

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
(9, '257908', 'Un nouveau passe-port a été enregistré au nom de : Afia dorcas', 'enregistrement', '2025-06-12 09:26:26');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `entrer_sortie`
--
ALTER TABLE `entrer_sortie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
