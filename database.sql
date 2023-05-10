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


INSERT INTO event (name,description,location,date) VALUES('Visite de nos ruches','Nous allons visiter nos ruches et en expliquer le fonctionnement aux visteurs.','Olivet Domaine de l‘Abeille Olivétaine.','2023-05-22');

INSERT INTO event (name,description,location,date) VALUES('Création de Ruches','Nous allons créer des Ruches sur notre nouveau domaine','Olivet Domaine Jean Pernaud','2023-07-10');

INSERT INTO event (name,description,location,date) VALUES('Découverte des abeilles','Nous allons faire découvrir les abeilles à nos visiteurs','Domaine de l’Abeille Olivetaine, Olivet','2023-05-20');

INSERT INTO event (name,description,location,date) VALUES('Journée découverte','Journée régionale de la recherche apicole au lycée agricole de Chartres. L\'évènement se tiendra de 14h à 17h30 en présence des classes de bac pro apiculture. Venez nombreux !','Lycée agricole de Chartres','2019-04-06');

INSERT INTO event (name,description,location,date) VALUES('Découverte des abeilles','Stand de l\'Abeille Olivetaine au salon des arts du jardin au parc floral d\'Orléans la source' ,'Parc floral d\'Orléans la Source','2019-04-06');

INSERT INTO event (name,description,location,date) VALUES('Assemblée générale de L\'abeille olivetaine','Assemblée ordinaire, à partir de 19h30','Olivet, Salle Champillou','2019-02-08');

INSERT INTO event (name,description,location,date) VALUES('Ateliers découverte des abeilles','Animations pour groupes scolaires','Parc floral d\'Orléans la Source','2015-04-01');

INSERT INTO event (name,description,location,date) VALUES('Assemblée générale de L\'abeille olivetaine','Assemblée générale de L\'abeille olivetaine à 20 H 30 (ouverture des portes dès 20 H), fin à 22 H 50 au plus tard.','Centre culturel d\'Yvremont, Olivet.','2015-02-06'); 


CREATE TABLE `faq` (
  `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `question` TEXT NOT NULL,
  `answer` TEXT NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `faq` (`question`, `answer`) VALUES
('Quelle quantité de miel peut-on récolter avec une ruche ? ', 'En moyenne chaque ruche permet de récolter 20 kg de miel par an, soit 80 pots de 250g ou 160 pots de 125g. Vous pourrez ainsi faire plaisir à vos collaborateurs, vos clients, vos prospects. Sans compter que les très bonnes années, la récolte peut atteindre 80 kg pour une seule ruche.'),
('Y-a-t’il des risques de piqûres ?', 'Il ne faut pas confondre la guêpe et le frelon, qui sont des insectes carnivores, avec l’abeille, qui se nourrit exclusivement d’eau, de pollen et de nectar. L’abeille est un insecte plutôt doux. Elle pique seulement si elle est attaquée ou dérangée, dans la ruche ou sur sa trajectoire d’envol. Réserver un endroit calme pour installer les ruches et les isoler sur les lieux fréquentés permet de se prémunir des risques de piqûres.'),
('Où peut-on installer des ruches ?', 'Les ruches sont implantées à un endroit calme auquel vous n’avez pas besoin d’accéder quotidiennement : balcon, terrasse, jardins, espaces verts, toits…. Dans les lieux fréquentés par le public, les ruches sont isolées par un enclos ou une palissade de 2m de hauteur.'),
('Où les abeilles vont-elles butiner en ville ?', 'Les abeilles butinent dans un rayon de 3km autour du rucher. Dès le premier jour d’installation, elles commencent à repérer les lieux et visiter les fleurs du quartier. En ville, la plus grande densité de végétaux mellifères se trouve dans les parcs et les jardins publics. Certains arbres des avenues sont également des sources nutritives pour les abeilles: robiniers, marronniers, tilleuls, sophora… En plus faible quantité, les balcons et terrasses privées peuvent fournir des essences intéressantes pour leur nectar et leur pollen.');

CREATE TABLE `picture` (
  `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `date` DATE NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `picture` (`name`, `date`) VALUES
('abeille1.jpg','2020-03-10'),
('apiculture.jpg','2021-04-15');

CREATE TABLE `link` (
  `id` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `webAdress` VARCHAR(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `link` (`name`, `webAdress`) VALUES
('Apiculture du haut bugey', 'https://www.apiculture-haut-bugey.com/'),
('L\'abeille noire', 'https://www.abeillenoire.eu/cms/'),
('Société Centrale d\'Apiculture', "https://www.la-sca.net/rucher-du-parc-georges-brassens");

