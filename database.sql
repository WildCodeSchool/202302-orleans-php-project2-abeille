-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `simple-mvc`
--

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

CREATE TABLE `item` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `item`
--

INSERT INTO `item` (`id`, `title`) VALUES
(1, 'Stuff'),
(2, 'Doodads');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `partner` (
  `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` TEXT NOT NULL,
  `link` TEXT NOT NULL,
  `logo` VARCHAR(255)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `partner` (`name`, `link`, `logo`) VALUES
('Abeilles sentinelles', 'https://www.abeillesentinelle.net/', 'partner1.jpg'), ('Apiculture, Univers du miel', 'public/assets/images/beefriend.webp', NULL), ('La Santé Des Abeilles', 'https://www.anses.fr/fr/content/sant%C3%A9-des-abeilles', 'partner3.jpg');

CREATE TABLE `event` (
  `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `location` VARCHAR(150),
  `date` DATE NOT NULL);

INSERT INTO event (name,description,location,date) VALUES('Visite de nos ruches','Nous organisons la visite nos ruches aux visiteurs afin qu\'ils en comprennent le fonctionnement.','Domaine de l‘Abeille Olivetaine, Olivet.','2023-05-22');

INSERT INTO event (name,description,location,date) VALUES('Création de Ruches','Création de Ruches sur notre nouveau domaine','Domaine Jean Pernaud, Olivet','2023-07-10');

INSERT INTO event (name,description,location,date) VALUES('Découverte des abeilles','Nous allons faire découvrir les abeilles à nos visiteurs','Domaine de l’Abeille Olivetaine, Olivet','2023-05-10');

CREATE TABLE `faq` (
  `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `question` TEXT NOT NULL,
  `answer` TEXT NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `faq` (`question`, `answer`) VALUES
('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ac erat dui. In placerat orci. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt.'),
('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet arcu id eros suscipit ornare et eget urna. Vivamus. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras vel odio id elit tempor semper.');


