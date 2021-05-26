-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 26, 2021 at 02:51 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(5) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `libelle`, `active`) VALUES
(1, 'Menu ', 'Oui'),
(2, 'Boisson', 'Oui'),
(3, 'Desserts', 'Oui'),
(4, 'Entrée', 'Oui'),
(5, 'Plateaux', 'Oui');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `montant` int(5) NOT NULL,
  `date_commande` datetime NOT NULL,
  `etat_commande` int(2) NOT NULL DEFAULT '0',
  `nom_commande` varchar(30) NOT NULL,
  `mail_commande` varchar(50) NOT NULL,
  `adr_commande` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `detail_commande`
--

CREATE TABLE `detail_commande` (
  `id_commande` int(5) NOT NULL,
  `id_produit` int(5) NOT NULL,
  `quantite` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(5) NOT NULL,
  `id_categorie` int(5) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `prix` int(10) NOT NULL,
  `stock` int(3) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `id_categorie`, `titre`, `description`, `prix`, `stock`, `photo`) VALUES
(1, 1, 'Midi Classique', '12 pièces\r\n6 sushis saumon\r\n6 california saumon', 14, 100, 'menu1.png'),
(2, 1, 'Midi Duo ', '24 pièces\r\n12 sushis saumon\r\n12 california saumon', 22, 150, 'menu2.png'),
(3, 1, 'Midi Saumon ', '15 pièces\r\n3 sushi saumon\r\n3 sashimi saumon\r\n3 spring saumon\r\n6 rainbow avocat fresh', 14, 200, 'menu3.png'),
(4, 2, 'Coco-Cola', '33cl', 3, 200, 'boisson1.png'),
(5, 2, 'Orangina', '33cl', 3, 200, 'boisson2.png'),
(6, 2, 'Ice Tea', '33cl', 3, 200, 'boisson3.png'),
(18, 3, 'Glace au chocolat', 'Boule de glace au chocolat', 4, 30, 'glace-chocolat.jpg'),
(19, 3, 'Glace à la fraise', 'Boule de glace à la fraise', 4, 30, 'glace-fraise.jpg'),
(20, 3, 'Glace au citron', 'Boule de glace au citron', 4, 30, 'glace-citron.jpg'),
(21, 3, 'Glace à la pistache', 'Boule de glace à la pistache', 4, 30, 'glace-pistache.jpg'),
(22, 2, 'Perrier', '33cl', 3, 120, 'perrier.jpg'),
(23, 4, 'Gyoza au porc', '4 pièces', 8, 34, 'entree1.jpg'),
(24, 4, 'Salade de chou', 'sauce vinaigrée', 3, 24, 'entree2.jpg'),
(25, 4, 'Soupe miso', 'Bol de soupe miso du chef', 3, 25, 'entree3.jpg'),
(26, 4, 'Riz nature', 'Bol de riz nature', 2, 50, 'entree4.jpg'),
(27, 5, 'Super mix', '24 pièces\r\n6 spring saumon\r\n6 california saumon\r\n6 egg thon cuit mayonnaise\r\n6 rainbow avocat fresh', 24, 34, 'plateau1.jpg'),
(28, 5, 'Original', '7 pièces \r\n3 sushi saumon\r\n2 sushi crevettes\r\n2 california', 9, 43, 'plateau2.jpg'),
(29, 5, 'California Mix', '8 pièces', 13, 54, 'plateau4.jpg'),
(30, 5, 'Plateau suprise', 'Surprenez-vous !  ', 12, 45, 'plateau5.jpg'),
(31, 1, 'Menu Famille', 'Mix à deguster à plusieurs', 22, 60, 'menu7.jpg'),
(32, 4, 'California classique', '4 california', 7, 45, 'entree5.jpg'),
(33, 4, 'Brochette poulet', '5 brochettes poulet', 7, 34, 'entree8.jpeg'),
(34, 2, 'Fanta', '33cl', 3, 45, 'boisson4.jpg'),
(35, 4, 'Tempura crevette', '5 tempuras ', 6, 35, 'entree6.jpg'),
(36, 1, 'Nouilles poulet', 'Assiette de nouille au poulet', 9, 45, 'menuc1.jpg'),
(37, 2, 'Evian', '33cl', 3, 35, 'boisson5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_user` int(5) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` text NOT NULL,
  `adresse` text NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `mail`, `mdp`, `adresse`, `ville`, `code_postal`, `statut`) VALUES
(1, 'Benovici', 'Lea', 'lea@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '10 rue chance', 'Paris', 75003, 0),
(2, 'beno', 'raph', 'raph@gmail.com', '55f63a97aee05dec574284677eb868c83b3fba7c', '23 rue abc', 'paris', 75003, 0),
(7, 'test', 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '1 rue av', 'paris', 75003, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `FK_COMMANDE_USER` (`id_user`);

--
-- Indexes for table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD KEY `FK_DETAIL_COMMANDE` (`id_commande`),
  ADD KEY `FK_DETAIL_USER` (`id_produit`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `FK_CATEGORIE_PRODUIT` (`id_categorie`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_COMMANDE_USER` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Constraints for table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD CONSTRAINT `FK_DETAIL_COMMANDE` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `FK_DETAIL_USER` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_CATEGORIE_PRODUIT` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);