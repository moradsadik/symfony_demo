-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 14 juil. 2020 à 01:48
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db`
--

-- --------------------------------------------------------

--
-- Structure de la table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `artist`
--

INSERT INTO `artist` (`id`, `name`, `prenom`, `avatar`, `updated_at`) VALUES
(1, 'John', 'doe', 'avatar1.png', '2020-07-13 23:45:29'),
(2, 'Melanie', 'doe', 'avatar4.jpg', '2020-07-13 23:45:46'),
(3, 'Clark', 'doe', 'avatar2.jpg', '2020-07-13 23:46:01'),
(4, 'Lisa', 'doe', 'avatar3.jpg', '2020-07-13 23:46:14'),
(5, 'Emelie', 'doe', 'computer-icons-avatar-woman-user-avatar.jpg', '2020-07-13 23:49:26'),
(6, 'sophie', 'doe', 'female-avatar-png-5.png', '2020-07-13 23:50:05'),
(7, 'cedric', 'doe', 'avatar-user-computer-icons-software-developer-avatar.jpg', '2020-07-13 23:50:27');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`) VALUES
(1, 'jour 1', 'jour-1'),
(2, 'jour 2', 'jour-2'),
(3, 'jour 3', 'jour-3');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `titre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_debut` datetime NOT NULL,
  `date_fin` datetime NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `category_id`, `artist_id`, `titre`, `description`, `date_debut`, `date_fin`, `location`) VALUES
(1, 1, 1, 'Johne doe - song 1', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mis', '2015-01-01 18:00:00', '2015-01-01 19:00:00', '48.767631802739345,2.338890373190186'),
(2, 1, 2, 'Melanie doe - song 1', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mis', '2015-01-01 19:00:00', '2015-01-01 20:00:00', '48.7660689701724,2.3406362063702884'),
(3, 1, 3, 'Clark doe - song 1', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mis', '2015-01-01 20:00:00', '2015-01-01 21:00:00', '48.76639426964708,2.338822580123106'),
(4, 1, 4, 'Lisa doe - song 1', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mis', '2015-01-01 21:00:00', '2015-01-01 22:00:00', '48.76730651128116,2.340218387397948'),
(5, 2, 5, 'Emelie doe - song 1', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mis', '2015-01-02 18:00:00', '2015-01-02 19:00:00', '48.76879152035513,2.33822434052053'),
(6, 2, 6, 'Sophie doe - song 1', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mis', '2015-01-02 19:00:00', '2015-01-02 20:00:00', '48.76713325736189,2.339547163348566'),
(7, 2, 7, 'Cederic doe - song 1', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mis', '2015-01-02 20:00:00', '2015-01-02 21:00:00', '48.768183379091745,2.3426240081389165');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `category` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_publish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `faq`
--

INSERT INTO `faq` (`id`, `category`, `question`, `answer`, `status`, `date_publish`) VALUES
(1, 'Artist', 'artist question 1', '<p>artist response1</p>', 'Publier', '2015-01-01 00:00:00'),
(2, 'Artist', 'artist question 2', '<p>artist response 2</p>', 'Publier', '2015-01-01 00:00:00'),
(3, 'Artist', 'artist question 3', '<p>artist response 3</p>', 'Publier', '2015-01-01 00:00:00'),
(4, 'Paiement', 'paiement question 1', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mise en page est achev&eacute;e. G&eacute;n&eacute;ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum</p>', 'Publier', '2015-01-01 00:00:00'),
(5, 'Paiement', 'paiement question 2', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mise en page est achev&eacute;e. G&eacute;n&eacute;ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum</p>', 'Publier', '2015-01-01 00:00:00'),
(6, 'Paiement', 'paiement question 3', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mise en page est achev&eacute;e. G&eacute;n&eacute;ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum</p>', 'Publier', '2015-01-01 00:00:00'),
(7, 'Rencontre', 'rencontre question 1', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mise en page est achev&eacute;e. G&eacute;n&eacute;ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum</p>', 'Publier', '2015-01-01 00:00:00'),
(8, 'Rencontre', 'rencontre question 2', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mise en page est achev&eacute;e. G&eacute;n&eacute;ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum</p>', 'Publier', '2015-01-01 00:00:00'),
(9, 'Rencontre', 'rencontre question 2', '<p>Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilis&eacute;e &agrave; titre provisoire pour calibrer une mise en page, le texte d&eacute;finitif venant remplacer le faux-texte d&egrave;s qu&#39;il est pr&ecirc;t ou que la mise en page est achev&eacute;e. G&eacute;n&eacute;ralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum</p>', 'Publier', '2015-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200614130232', '2020-06-14 13:16:52');

-- --------------------------------------------------------

--
-- Structure de la table `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partner`
--

INSERT INTO `partner` (`id`, `name`, `description`, `service`, `logo`, `updated_at`) VALUES
(1, 'partenaire 1', '<p>partenaire 1</p>', 'restaruration', 'logo_CT9HTWUMLVTKSOA_KFC.jpg', '2020-07-13 23:56:23'),
(2, 'partenaire 2', '<p>partenaire 2</p>', 'restaruration', 'mcdonald.jpg', '2020-07-13 23:57:14'),
(3, 'partenaire 3', '<p>partenaire 3</p>', 'transport', 'logo-Uber.jpg', '2020-07-13 23:58:32');

-- --------------------------------------------------------

--
-- Structure de la table `place`
--

CREATE TABLE `place` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat_lng` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_open` datetime DEFAULT NULL,
  `datetime_close` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `place`
--

INSERT INTO `place` (`id`, `name`, `description`, `type`, `lat_lng`, `datetime_open`, `datetime_close`, `active`) VALUES
(1, 'place 1', '<p>place</p>', 'Boutique', '48.76631648083395,2.3405327942609326', NULL, NULL, 1),
(2, 'place 2', '<p>place 2</p>', 'Boutique', '48.766422556458316,2.3388922437873827', NULL, NULL, 1),
(3, 'place 3', '<p>place 3</p>', 'Toilette', '48.768961232881594,2.3384066579783807', NULL, NULL, 1),
(4, 'place 4', '<p>place 4</p>', 'Parking', '48.76844502216593,2.3400517228664524', NULL, NULL, 1),
(5, 'place 5', '<p>place 5</p>', 'Buvette', '48.76786516270476,2.3399860125695287', NULL, NULL, 1),
(6, 'place 6', '<p>place 6</p>', 'Restaurant', '48.768148021814994,2.3426490451556563', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `rencontre`
--

CREATE TABLE `rencontre` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `utilisateur_id` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `lat_lng` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `social`
--

INSERT INTO `social` (`id`, `name`, `link`) VALUES
(1, 'facebook', 'https://www.facebook.com'),
(2, 'Twitter', 'https://www.twitter.com'),
(3, 'Youtube', 'https://www.youtube.com'),
(4, 'Instagram', 'https://www.instagram.com');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `email`, `password`, `roles`) VALUES
(1, 'root', 'root@root.com', '$2y$13$TBKJzDTdofA9XUy8hRksTOOzSbPJ1NAW6s.j52HrXrOZlFTpo2aMy', 'a:1:{i:0;s:15:\"ROLE_SUPERADMIN\";}'),
(2, 'admin', 'admin@admin.com', '$2y$13$c.yco7w0SChvpVnE7R8GD.Y3I24kVVaECar8bVuKtZpspFZez06by', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(3, 'user', 'user@user.com', '$2y$13$B4NTZ58JY5Mw3t6RxhzPAepl2lATF7VgjR1tshhVs.XhtSxW.cKke', 'a:1:{i:0;s:9:\"ROLE_USER\";}');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_3BAE0AA712469DE2` (`category_id`),
  ADD KEY `IDX_3BAE0AA7B7970CF8` (`artist_id`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A8A6C8DF675F31B` (`author_id`);

--
-- Index pour la table `rencontre`
--
ALTER TABLE `rencontre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_460C35EDB7970CF8` (`artist_id`),
  ADD KEY `IDX_460C35EDFB88E14F` (`utilisateur_id`);

--
-- Index pour la table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `place`
--
ALTER TABLE `place`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rencontre`
--
ALTER TABLE `rencontre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `FK_3BAE0AA712469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_3BAE0AA7B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8DF675F31B` FOREIGN KEY (`author_id`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `rencontre`
--
ALTER TABLE `rencontre`
  ADD CONSTRAINT `FK_460C35EDB7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`),
  ADD CONSTRAINT `FK_460C35EDFB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
