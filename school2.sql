-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 11 Mai 2018 à 22:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `school2`
--

-- --------------------------------------------------------

--
-- Structure de la table `annees`
--

CREATE TABLE IF NOT EXISTS `annees` (
  `id_annee` int(11) NOT NULL AUTO_INCREMENT,
  `annee` varchar(22) NOT NULL,
  PRIMARY KEY (`id_annee`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `annees`
--

INSERT INTO `annees` (`id_annee`, `annee`) VALUES
(1, '2015-2016'),
(2, '2016-2017'),
(3, '2017-2018');

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `id_annee` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `id_programm` int(11) NOT NULL,
  `nom` varchar(22) DEFAULT NULL,
  PRIMARY KEY (`id_classe`),
  KEY `id_annee` (`id_annee`),
  KEY `id_niveau` (`id_niveau`),
  KEY `id_group` (`id_group`),
  KEY `id_program` (`id_programm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `classes`
--

INSERT INTO `classes` (`id_classe`, `id_annee`, `id_niveau`, `id_group`, `id_programm`, `nom`) VALUES
(30, 3, 11, 6, 1, NULL),
(31, 2, 9, 5, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `emploitemps`
--

CREATE TABLE IF NOT EXISTS `emploitemps` (
  `id_emploi` int(11) NOT NULL AUTO_INCREMENT,
  `id_classe` int(11) NOT NULL,
  `id_jour` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_horaire` int(11) NOT NULL,
  PRIMARY KEY (`id_emploi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `emploitemps`
--

INSERT INTO `emploitemps` (`id_emploi`, `id_classe`, `id_jour`, `id_matiere`, `id_prof`, `id_salle`, `id_horaire`) VALUES
(1, 30, 1, 1, 6, 1, 1),
(2, 30, 3, 2, 6, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE IF NOT EXISTS `etudiants` (
  `id_eleve` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance` date NOT NULL,
  `nationalite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_Pere` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_Mere` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fix` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse_travail` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_urgence` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_classe` int(11) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id_eleve`),
  KEY `fk` (`id_classe`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `etudiants`
--

INSERT INTO `etudiants` (`id_eleve`, `id_user`, `nom`, `prenom`, `date_naissance`, `nationalite`, `ville`, `rue`, `province`, `sexe`, `nom_Pere`, `nom_Mere`, `phone`, `fix`, `photo`, `adresse_travail`, `phone_urgence`, `email`, `id_classe`, `date_inscription`) VALUES
(1, 1, 'elatifi', 'ghizlane', '2018-05-17', 'marrocaine', 'TAHNNAOUT', 'Lotissement Kairaouane Quartier Kairaouane, 261', 'AL haouz', '0', 'ghizlane elatifi', 'ghizlane elatifi', '670448107', '0670448107', '95888.2018-05-07.1525702185.png', 'Lotissement Kairaouane Quartier Kairaouane', '0670448107', 'ghizlan.atifi@gmail.com', 30, '2018-05-07'),
(2, 1, 'khaldi', 'khalid', '2009-05-04', 'marrocaine', 'TAHNNAOUT', 'Lotissement Kairaouane Quartier Kairaouane, 261', 'AL haouz', '1', 'ghizlane elatifi', 'ghizlane elatifi', '0670448107', '0670448107', '61129.2018-05-09.1525873420.png', 'Lotissement Kairaouane Quartier Kairaouane', '0670448107', 'khalid.khaldi@gmail.com', 31, '2017-05-09');

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=115 ;

--
-- Contenu de la table `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `color`, `created_at`, `updated_at`) VALUES
(106, 'absence', '2018-04-22 02:21:52', '2018-04-22 03:21:55', '#dcd93f', '2018-04-22 12:22:28', '2018-04-26 09:16:16'),
(108, 'reunion', '2018-04-22 11:14:34', '2018-04-22 12:14:43', '#b60303', '2018-04-26 09:15:01', '2018-04-26 09:15:01'),
(109, 'testTime', '2018-04-22 06:00:00', '2018-04-22 07:00:46', '#0800c0', '2018-04-26 10:29:08', '2018-04-26 10:29:08'),
(111, 'exam java', '2018-04-24 08:00:00', '2018-04-26 10:00:00', '#1dcf5d', '2018-04-26 10:50:26', '2018-05-02 19:35:16'),
(112, 'testTime2', '2018-04-22 06:00:00', '2018-04-22 07:00:00', '#66d5c9', '2018-04-26 12:54:35', '2018-04-26 12:54:35'),
(113, 'testTime3', '2018-04-22 06:00:00', '2018-04-22 07:00:00', '#eb8181', '2018-04-26 12:55:02', '2018-04-26 12:55:02'),
(114, 'testTime4', '2018-04-22 06:00:00', '2018-04-22 07:00:00', '#b19494', '2018-04-26 12:55:32', '2018-04-26 12:55:32');

-- --------------------------------------------------------

--
-- Structure de la table `frais`
--

CREATE TABLE IF NOT EXISTS `frais` (
  `id_frais` int(11) NOT NULL AUTO_INCREMENT,
  `id_annee` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `id_fraistype` int(11) NOT NULL,
  `montant` float NOT NULL,
  PRIMARY KEY (`id_frais`),
  KEY `id_annee` (`id_annee`),
  KEY `fj` (`id_niveau`),
  KEY `fd` (`id_fraistype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fraisetudiants`
--

CREATE TABLE IF NOT EXISTS `fraisetudiants` (
  `id_frais_etudiant` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleve` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  `montant` double DEFAULT NULL,
  `id_frais` int(11) NOT NULL,
  PRIMARY KEY (`id_frais_etudiant`),
  KEY `id_niveau` (`id_niveau`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fraistype`
--

CREATE TABLE IF NOT EXISTS `fraistype` (
  `id_fraistype` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(22) NOT NULL,
  PRIMARY KEY (`id_fraistype`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `fraistype`
--

INSERT INTO `fraistype` (`id_fraistype`, `type`) VALUES
(1, 'scolarite'),
(2, 'transport');

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id_group` int(11) NOT NULL AUTO_INCREMENT,
  `groupe` varchar(22) NOT NULL,
  `capacite` int(40) NOT NULL DEFAULT '20',
  `id_niveau` int(11) NOT NULL,
  PRIMARY KEY (`id_group`),
  KEY `FK_PersonOrder` (`id_niveau`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `groups`
--

INSERT INTO `groups` (`id_group`, `groupe`, `capacite`, `id_niveau`) VALUES
(4, 'g11', 20, 9),
(5, 'g12', 20, 9),
(6, 'g31', 20, 11);

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

CREATE TABLE IF NOT EXISTS `horaires` (
  `id_horaire` int(11) NOT NULL AUTO_INCREMENT,
  `heure` varchar(22) NOT NULL,
  PRIMARY KEY (`id_horaire`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `horaires`
--

INSERT INTO `horaires` (`id_horaire`, `heure`) VALUES
(1, '09h00-10h30'),
(2, '10h30-12h00'),
(3, '13h00-14h30'),
(4, '14h30-16h00'),
(5, '16h00-17h30');

-- --------------------------------------------------------

--
-- Structure de la table `jours`
--

CREATE TABLE IF NOT EXISTS `jours` (
  `id_jour` int(11) NOT NULL AUTO_INCREMENT,
  `jour` varchar(22) NOT NULL,
  PRIMARY KEY (`id_jour`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `jours`
--

INSERT INTO `jours` (`id_jour`, `jour`) VALUES
(1, 'Lundi'),
(2, 'Mardi'),
(3, 'Mercredi'),
(4, 'Jeudi'),
(5, 'Vendredi'),
(6, 'Samedi');

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE IF NOT EXISTS `matieres` (
  `id_matiere` int(11) NOT NULL AUTO_INCREMENT,
  `matiere` varchar(35) NOT NULL,
  PRIMARY KEY (`id_matiere`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `matieres`
--

INSERT INTO `matieres` (`id_matiere`, `matiere`) VALUES
(1, 'math'),
(2, 'anglais'),
(3, 'management de projet'),
(4, 'projet tutore'),
(5, 'comptabilite');

-- --------------------------------------------------------

--
-- Structure de la table `mat_prog`
--

CREATE TABLE IF NOT EXISTS `mat_prog` (
  `id_matprog` int(11) NOT NULL AUTO_INCREMENT,
  `id_matiere` int(11) NOT NULL,
  `id_programm` int(11) NOT NULL,
  `id_annee` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  PRIMARY KEY (`id_matprog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `mat_prog`
--

INSERT INTO `mat_prog` (`id_matprog`, `id_matiere`, `id_programm`, `id_annee`, `id_niveau`) VALUES
(1, 1, 1, 3, 9),
(2, 2, 1, 3, 9),
(3, 1, 1, 3, 10),
(4, 2, 1, 4, 10),
(5, 1, 1, 2, 9);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2018_03_21_170553_create_role_table', 1),
(9, '2018_03_22_211616_create_eleves_table', 1),
(10, '2018_04_20_081857_create_tasks_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `niveaux`
--

CREATE TABLE IF NOT EXISTS `niveaux` (
  `id_niveau` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` varchar(22) NOT NULL,
  `description` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`id_niveau`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `niveaux`
--

INSERT INTO `niveaux` (`id_niveau`, `niveau`, `description`) VALUES
(9, '1', NULL),
(10, '2', NULL),
(11, '3', NULL),
(12, '4', 'aaa'),
(13, '5', 'qqq'),
(15, '6', 'fff');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE IF NOT EXISTS `professeurs` (
  `id_prof` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(22) NOT NULL,
  `prenom` varchar(22) NOT NULL,
  `sexe` varchar(22) NOT NULL,
  `date_naissance` varchar(22) NOT NULL,
  `telephone` varchar(33) NOT NULL,
  `Nationalite` varchar(22) NOT NULL,
  `email` varchar(55) NOT NULL,
  `ville` varchar(22) NOT NULL,
  `rue` varchar(33) NOT NULL,
  `province` varchar(22) NOT NULL,
  `diplome` varchar(55) NOT NULL,
  `niveau_scolaire` varchar(22) NOT NULL,
  `id_user` int(11) NOT NULL,
  `updated_at` varchar(22) NOT NULL,
  `created_at` varchar(22) NOT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `professeurs`
--

INSERT INTO `professeurs` (`id_prof`, `nom`, `prenom`, `sexe`, `date_naissance`, `telephone`, `Nationalite`, `email`, `ville`, `rue`, `province`, `diplome`, `niveau_scolaire`, `id_user`, `updated_at`, `created_at`) VALUES
(6, 'Bader', 'khaldi', '1', '2018-05-23', 'd', 'd', 'aa@aa.com', 'd', 'd', 'd', 'd', 'd', 1, '2018-05-02 19:59:42', '2018-05-02 19:57:18');

-- --------------------------------------------------------

--
-- Structure de la table `programms`
--

CREATE TABLE IF NOT EXISTS `programms` (
  `id_programm` int(11) NOT NULL AUTO_INCREMENT,
  `programe` varchar(22) NOT NULL,
  PRIMARY KEY (`id_programm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `programms`
--

INSERT INTO `programms` (`id_programm`, `programe`) VALUES
(1, 'commerce'),
(2, 'management'),
(3, 'sport');

-- --------------------------------------------------------

--
-- Structure de la table `recus`
--

CREATE TABLE IF NOT EXISTS `recus` (
  `id_reçus` int(11) NOT NULL AUTO_INCREMENT,
  `id_eleve` int(11) DEFAULT NULL,
  `id_transaction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_reçus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `recus`
--

INSERT INTO `recus` (`id_reçus`, `id_eleve`, `id_transaction`) VALUES
(1, 10, 63),
(3, 10, 69),
(4, NULL, NULL),
(5, 10, 70),
(6, NULL, NULL),
(7, 10, 71),
(8, NULL, NULL),
(9, 1, 72),
(10, NULL, NULL),
(11, 1, 73);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Receptionist', NULL, NULL),
(3, 'Manger', NULL, NULL),
(4, 'CEO', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `salles`
--

CREATE TABLE IF NOT EXISTS `salles` (
  `id_salle` int(11) NOT NULL AUTO_INCREMENT,
  `salle` varchar(22) NOT NULL,
  PRIMARY KEY (`id_salle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `salles`
--

INSERT INTO `salles` (`id_salle`, `salle`) VALUES
(1, 'SA1'),
(2, 'SA2');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `task_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id_transaction` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `type_paiement` varchar(55) DEFAULT NULL,
  `paye` double NOT NULL,
  `id_eleve` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_frais_etudiant` int(11) NOT NULL,
  `id_frais` int(11) NOT NULL,
  PRIMARY KEY (`id_transaction`),
  KEY `id_frais_etudiant` (`id_frais_etudiant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `email`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES
(1, 1, 'izza', 'izza', 'izza@gmail.com', '$2y$10$CGG5LmMckJM27le/nT3jw.9kCLvZnz6Kw.f6avOTbO3CAvP/c8keu', 'zVHYHnmFiUdHLfoL8IxlOzDXgjC8d0ekrfClcyMcoWxNCHVdf4DramlOrVqW', 1, NULL, NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`id_annee`) REFERENCES `annees` (`id_annee`),
  ADD CONSTRAINT `classes_ibfk_2` FOREIGN KEY (`id_niveau`) REFERENCES `niveaux` (`id_niveau`),
  ADD CONSTRAINT `classes_ibfk_3` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id_group`),
  ADD CONSTRAINT `classes_ibfk_4` FOREIGN KEY (`id_programm`) REFERENCES `programms` (`id_programm`);

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `fk` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`);

--
-- Contraintes pour la table `frais`
--
ALTER TABLE `frais`
  ADD CONSTRAINT `fd` FOREIGN KEY (`id_fraistype`) REFERENCES `fraistype` (`id_fraistype`),
  ADD CONSTRAINT `fj` FOREIGN KEY (`id_niveau`) REFERENCES `niveaux` (`id_niveau`),
  ADD CONSTRAINT `fm` FOREIGN KEY (`id_annee`) REFERENCES `annees` (`id_annee`);

--
-- Contraintes pour la table `fraisetudiants`
--
ALTER TABLE `fraisetudiants`
  ADD CONSTRAINT `fraisetudiants_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `niveaux` (`id_niveau`);

--
-- Contraintes pour la table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`id_niveau`) REFERENCES `niveaux` (`id_niveau`);

--
-- Contraintes pour la table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`id_frais_etudiant`) REFERENCES `fraisetudiants` (`id_frais_etudiant`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
