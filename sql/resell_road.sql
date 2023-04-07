-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 07 avr. 2023 à 23:30
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `resell_road`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_desc` text NOT NULL,
  `comment_time` time NOT NULL DEFAULT current_timestamp(),
  `comment_date` date NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `user_pseudo` varchar(60) NOT NULL,
  `item_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_desc`, `comment_time`, `comment_date`, `user_id`, `user_pseudo`, `item_id`, `project_id`) VALUES
(17, 'très bel article , tu la trouvé ou?', '00:00:02', '2023-04-06', 2, 'john', 7, 12),
(26, 'Super article je recommande', '21:37:50', '2023-04-07', 3, 'lucas', 7, 12),
(27, 'Oh la chance , c\'est un super article que tu as dégoté!', '23:08:22', '2023-04-07', 2, 'john', 11, 13);

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_title` varchar(60) NOT NULL,
  `item_desc` text NOT NULL,
  `item_sale` int(11) NOT NULL,
  `item_purchase` int(11) NOT NULL,
  `item_img` text NOT NULL,
  `item_date` date NOT NULL DEFAULT current_timestamp(),
  `project_id` int(11) NOT NULL,
  `item_brand` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`item_id`, `item_title`, `item_desc`, `item_sale`, `item_purchase`, `item_img`, `item_date`, `project_id`, `item_brand`) VALUES
(7, 't shirt adidas blanc', 'Article trouvé en friperie. Il est en très bon état , la taille est M', 35, 10, 'assets/item/168044817921390910302057274409.jpg', '2023-04-02', 12, 'Adidas'),
(10, 'Chaussure nike dior', 'chaussure en état neuve pointure 44', 1500, 120, 'assets/item/1680901526531218337461190284.jpg', '2023-04-07', 13, 'Nike / Dior'),
(11, 'sweatshirt Nike Dior', 'pull en très bon état trouvé en magasin seconde main', 1200, 150, 'assets/item/1680901639177975184639868610.jpg', '2023-04-07', 13, 'Nike / Dior'),
(12, 'veste Snipes mcdo', 'veste en taille L , très bon état', 250, 110, 'assets/item/16809018787730103791885713963.jpg', '2023-04-07', 11, 'Snipes / mcdo'),
(13, 'Veste nike dior', 'veste très bon etat taille M', 1500, 250, 'assets/item/1680902109104651355738005643.jpg', '2023-04-07', 13, 'Nike / Dior');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(70) NOT NULL,
  `project_desc` text NOT NULL,
  `project_curramount` varchar(40) NOT NULL,
  `project_goalamount` varchar(40) NOT NULL,
  `project_img` text NOT NULL,
  `project_nbelement` int(11) NOT NULL,
  `project_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `project`
--

INSERT INTO `project` (`project_id`, `project_title`, `project_desc`, `project_curramount`, `project_goalamount`, `project_img`, `project_nbelement`, `project_date`) VALUES
(11, 'Snipes X Mcdo', 'collab Aout 2022 - style retro vintage', '140', '800', 'assets/project/168005163413418947451932044693.jpg', 1, '2023-03-29'),
(12, 'Drop Adidas', 'adidas 1990', '25', '1000', 'assets/project/1680297863710152182548384786.jpg', 3, '2023-03-31'),
(13, 'Dior nike', 'collab de nike et dior , l\'union de la marque de luxe et la célèbre marque streetwears', '3680', '2500', 'assets/project/168031172915222014591754623648.jpg', 3, '2023-04-01'),
(14, 'Karl Lagerfeld', 'marque du célèbre couturier karl lagerfeld', '0', '3000', 'assets/project/16803120205364025941416641508.jpg', 0, '2023-04-01'),
(15, 'Hugo boss', 'Marque deluxe implanté à Paris depuis 1967', '0', '1500', 'assets/project/1680312102485390106259500746.jpg', 0, '2023-04-01'),
(17, 'Lacoste', 'Drop de vêtement retro lacoste 1989', '0', '1000', 'assets/project/168090121111864415771623601144.png', 0, '2023-04-04'),
(18, 'Polo ralph lauren', 'Drop vêtement retro Polo ralph lauren 1990', '0', '780', 'assets/project/168090128415220023001982291124.jpg', 0, '2023-04-04'),
(19, 'nike', 'Drop nike retro 1970', '0', '890', 'assets/project/16809013548122419451629325871.png', 0, '2023-04-04');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_pseudo` varchar(50) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` text NOT NULL,
  `user_secret` text NOT NULL,
  `user_type` int(11) NOT NULL,
  `user_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_pseudo`, `user_email`, `user_password`, `user_secret`, `user_type`, `user_date`) VALUES
(1, 'john', 'john.admin@gmail.com', 'aq13f98b157a2f5de1b84774795d3d8c213cb467d1c25', '659dcab6186cf88b7401dae26f8aa3eaf97cf2411679764425', 2, '2023-03-25'),
(2, 'lucas', 'lucas@gmail.com', 'aq120ac771dff442238145de848c37e23511248640325', '0a7cac69ae2d8feba8647b6ae160e3482790320f1680813558', 1, '2023-04-06');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_userComment` (`user_id`),
  ADD KEY `fk_itemComment` (`item_id`),
  ADD KEY `fk_projectComment` (`project_id`);

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_projectitem` (`project_id`);

--
-- Index pour la table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_itemComment` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`),
  ADD CONSTRAINT `fk_projectComment` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`),
  ADD CONSTRAINT `fk_userComment` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_projectitem` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
