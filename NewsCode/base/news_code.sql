-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 oct. 2021 à 21:09
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `news_code`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Revue de presse'),
(2, 'Sport'),
(3, 'Santé'),
(4, 'Educations'),
(5, 'Politiques');

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `liens` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `category`, `liens`) VALUES
(1, 'Sport Football', 'Alors que Neymar s\'est enfin décidé à prolonger avec le Paris Saint-Germain jusqu\'en 2025, la clause de son contrat est maintenant connue. Selon UOL, le Brésilien a fixé une clause qu\'il lui permettait de prolonger son contrat d\'un an avec le club, jusqu\'', 1.9, 'm1.jpg', 1, 'https://madeinfoot.ouest-france.fr/infos/article-mercato-psg-la-clause-du-nouveau-contrat-de-neymar-est-connue-343662.html'),
(2, 'Politique Sénégal', 'Les deux projets de loi examinés ont été approuvés par 70 députés présents alors que 11 ont voté contre, a déclaré le président de l\'Assemblée nationale Moustapha Niasse. Le nombre de députés présents, sur les 165 de l\'Assemblée, n\'a pas été communiqué. \r', 2.5, 'm2.jpg', 1, 'https://www.nouvelobs.com/monde/20210625.AFP0014/senegal-les-deputes-renforcent-les-lois-antiterroristes-des-manifestants-arretes.html'),
(3, 'Santé Sénégal', 'Le 31 décembre 2019, les autorités chinoises ont informé l’Organisation Mondiale de la Santé (OMS) d’un groupe de cas de pneumonie d’origine inconnue survenus dans la ville de Wuhan, Province de Hubei. Le 07 janvier 2020, un nouveau type de coronavirus, d', 1.9, 'm3.png', 1, 'https://www.sante.gouv.sn/activit%C3%A9s/s%C3%A9n%C3%A9gal-sant%C3%A9'),
(4, 'Education Sénégal', 'Au cours des dernières années, les questions d’éducation ont de plus en plus été au centre des préoccupations des hommes politiques, comme, d’une manière plus générale, de l’intelligentsia africaine dans son ensemble, et ont revêtu une importance et une a', 1.9, 'm4.jpg', 1, 'https://scienceetbiencommun.pressbooks.pub/educationmoumouni/chapter/problemes-deducation-et-taches-de-lenseignement-dans-les-conditions-de-lafrique-noire-contemporaine/'),
(7, 'Tennis', 'Onze ans plus tard, sur le gazon de Majorque, Novak Djokovic devait retrouver le goût d\'une finale en double sur le circuit ! Il devait viser le deuxième titre de sa carrière. Associé à l\'Espagnol Carlos Gomez-Herrera, 31 ans n°359 en simple et 253e en do', 1.9, 'sp1.jpg', 2, 'https://www.tennisactu.net/news-atp-majorque-djokovic-et-gomez-herrera-debutent-en-double-ce-mardi-91418.html'),
(8, 'Jeux olympiques', 'Égalité des sexes\r\nL\'égalité des sexes est une priorité absolue pour le Mouvement olympique. Les deux axes principaux consistent à offrir aux femmes athlètes un accès plus facile au sport en général et aux Jeux Olympiques en particulier et à augmenter le ', 1.5, 'sp2.jpg', 2, 'https://olympics.com/cio/au-dela-des-jeux'),
(9, 'Euro 2020', 'La journée de mercredi marquait la fin des phases de groupes de cet Euro 2020. Pas le temps de savourer la qualification pour toutes les nations qualifiées, puisque les huitièmes de finale vont démarrer dès samedi à 18 heures. Le Pays de Galles et le Dane', 1.9, 'sp3.jpg', 2, 'https://fr.uefa.com/uefaeuro-2020/news/0253-0d82273efe72-a11ff7db68b7-1000--le-calendrier-des-matches-de-l-uefa-euro-2020/'),
(28, 'Au Sénégal, la situation reste explosive après l’arrestation d’Ousmane Sonko', 'es échauffourées à Dakar et les soulèvements ailleurs dans le pays dans la journée du samedi rappellent que les feux de la contestation sont toujours ardents. Le pays, l’un des plus stables en Afrique de l’Ouest, traverse sa pire crise politique et social', 1.9, 'po1.jpg', 5, 'https://www.la-croix.com/Monde/Au-Senegal-situation-reste-explosive-larrestation-dOusmane-Sonko-2021-03-07-1201144251'),
(35, 'Basketball', 'Update : ESPN et Yahoo! Sports annoncent que Jason Kidd a bien été engagé comme nouveau coach de Dallas, moyennant un contrat de quatre ans. Nico Harrison sera lui le nouveau GMTandis que Rick Carlisle s’est engagé pour quatre ans avec les Pacers', 5.9, 'sp4.jpg', 2, 'https://www.basketusa.com/news/631821/un-contrat-de-quatre-ans-pour-jason-kidd-avec-les-mavs/'),
(36, 'Covid Vaccination', 'Afin de préparer les moyens logistiques nécessaires et favoriser l’accès de tous à la vaccination, le Ministère de la Santé et de l\'Action Sociale (MSAS) et le gouvernement mettent en place un recensement des sénégalais voulant se faire vacciner.', 0.49, 'sa1.jpg', 3, 'https://www.sec.gouv.sn/actualit%C3%A9/campagne-de-vaccination-contre-la-covid-19'),
(37, 'Education en France', 'L\'instruction est obligatoire et gratuite de l\'âge de 3 jusqu\'à l\'âge de 16 ans; elle comprend trois années d\'enseignement préélémentaire (à l\'école maternelle), cinq années d\'enseignement primaire (à l\'école élémentaire) puis cinq années d\'enseignement s', 0.63, 'edu1.jpg', 4, 'https://eacea.ec.europa.eu/national-policies/eurydice/france/organisation-education-system-and-its-structure_fr'),
(38, 'Education au Canada', 'Au Canada, on peut inscrire ses enfants à l’école publique gratuite ou à l’école privée. Les écoles publiques ont une très bonne réputation, 95% des élèves canadiens y sont d’ailleurs inscrits. Le système éducatif canadien est très proche du système améri', 0.46, 'edu2.jpg', 4, 'https://etablissement.org/ontario/education/ecole-elementaire-et-ecole-secondaire/renseignements-d-ordre-general-sur-l-ecole/inscrire-mon-enfant-a-l-ecole/');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `password`, `email`, `profil`, `first_name`, `last_name`) VALUES
(1, 'assane21', 'assane2021', 'thiobane@gmail.com', 'editeur', 'assane', 'thiobane'),
(2, 'jules21', 'jules2021', 'jules@gmail.com', 'visiteur', 'jules ', 'diop'),
(3, 'tine21', 'tine2021', 'tine@gmail.com', 'administrateur', 'babacar', 'tine'),
(6, 'nidma21', 'ndima2021', 'ndima@gmail.com', 'visiteur', 'fatou', 'thiobane');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
