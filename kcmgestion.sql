-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 03 sep. 2021 à 11:46
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kcmgestion`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `nom_client` varchar(64) NOT NULL,
  `adresse_client` varchar(128) DEFAULT NULL,
  `telephone` varchar(255) NOT NULL,
  `user_create` varchar(64) DEFAULT NULL,
  `dateCreate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `nom_client`, `adresse_client`, `telephone`, `user_create`, `dateCreate`) VALUES
(37, 'Champion', 'Adidogomé', '22 56 39 87', NULL, NULL),
(38, 'Bon Pasteur', 'Adidogomé', '25 46 89 21', NULL, NULL),
(39, 'Samaritaine', 'Bé-Klikamé', '98 75 46 23', NULL, NULL),
(43, 'Ramco', 'Assivito', '22 36 54 12 / 90 75 46 98', 'Epiphane', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_com` int(11) NOT NULL,
  `reference_commande` varchar(128) NOT NULL,
  `date_com` date DEFAULT NULL,
  `livraison` varchar(16) NOT NULL,
  `user_create` varchar(16) DEFAULT NULL,
  `dateCreate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_com`, `reference_commande`, `date_com`, `livraison`, `user_create`, `dateCreate`) VALUES
(5, 'Com 001', '2021-09-03', 'livre', NULL, '2021-09-03'),
(6, 'Com 002', '2021-09-09', 'non_livre', NULL, '2021-09-03'),
(7, 'Cm 003', '2021-09-09', 'livre', NULL, '2021-09-03');

-- --------------------------------------------------------

--
-- Structure de la table `composition_produit`
--

CREATE TABLE `composition_produit` (
  `id_comp` int(11) NOT NULL,
  `id_typeY` int(11) NOT NULL,
  `id_typeI` int(11) NOT NULL,
  `dateCreate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `composition_produit`
--

INSERT INTO `composition_produit` (`id_comp`, `id_typeY`, `id_typeI`, `dateCreate`) VALUES
(1, 39, 6, '2021-09-02'),
(2, 39, 8, '2021-09-02'),
(3, 39, 4, '2021-09-02'),
(4, 39, 3, '2021-09-02'),
(5, 39, 1, '2021-09-02'),
(6, 40, 2, '2021-09-02'),
(7, 40, 8, '2021-09-02'),
(8, 40, 3, '2021-09-02'),
(9, 40, 1, '2021-09-02'),
(10, 40, 7, '2021-09-02'),
(11, 38, 2, '2021-09-02'),
(12, 38, 3, '2021-09-02'),
(13, 38, 1, '2021-09-02'),
(14, 40, 7, '2021-09-02');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id_compte` int(11) NOT NULL,
  `nom_societe` varchar(32) NOT NULL,
  `emailSocet` varchar(128) NOT NULL,
  `adresseSociet` varchar(255) NOT NULL,
  `telComp` varchar(255) NOT NULL,
  `produitGest` varchar(64) NOT NULL,
  `user_create` varchar(16) DEFAULT NULL,
  `dateCreate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id_compte`, `nom_societe`, `emailSocet`, `adresseSociet`, `telComp`, `produitGest`, `user_create`, `dateCreate`) VALUES
(5, 'KCMGESTION', 'kcm@gmail.com', 'Agbalépedo pas loin du carréfour Bodjona, Lomé-TOGO', '93 13 28 44 / 97 98 24 24 / 90 85 08 28', 'Yaourt', '2021:08:19', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `distributions`
--

CREATE TABLE `distributions` (
  `idDis` int(11) NOT NULL,
  `ref_dis` varchar(64) NOT NULL,
  `date_livraison` date DEFAULT NULL,
  `date_paiment` date DEFAULT NULL,
  `id_livreur` int(11) NOT NULL,
  `idClient` int(11) DEFAULT NULL,
  `etat_paie_Dis` varchar(64) NOT NULL,
  `user_create` varchar(16) DEFAULT NULL,
  `dateCreate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `distributions`
--

INSERT INTO `distributions` (`idDis`, `ref_dis`, `date_livraison`, `date_paiment`, `id_livreur`, `idClient`, `etat_paie_Dis`, `user_create`, `dateCreate`) VALUES
(1, 'dis 001', '2021-08-12', '2021-08-05', 2, 37, 'payer', NULL, '2021-08-26'),
(4, 'dis 002', '2021-08-04', '2021-08-05', 1, 38, 'non_payer', NULL, '2021-08-27'),
(5, 'dis 003', '2021-08-04', '0000-00-00', 1, 43, 'non_payer', NULL, '2021-08-27'),
(6, 'dis 004', '2021-08-03', '2021-08-06', 2, 38, 'non_payer', NULL, '2021-08-31'),
(7, 'dis 004', '2021-08-03', '2021-08-04', 2, 37, 'non_payer', NULL, '2021-08-31'),
(8, 'Dis 01', '2021-09-02', '2021-09-09', 1, 38, 'payer', NULL, '2021-09-03'),
(9, 'Dis 01', '2021-09-02', '2021-09-09', 1, 37, 'non_payer', NULL, '2021-09-03'),
(10, 'Dis 01', '2021-09-02', '2021-09-09', 1, 39, 'non_payer', NULL, '2021-09-03');

-- --------------------------------------------------------

--
-- Structure de la table `distribu_com`
--

CREATE TABLE `distribu_com` (
  `id_dis_com` int(11) NOT NULL,
  `id_com_liv` int(11) NOT NULL,
  `id_clt` int(11) NOT NULL,
  `id_livreurCom` int(11) NOT NULL,
  `date_livraison` date DEFAULT NULL,
  `date_paiment_com` date DEFAULT NULL,
  `etat_paiement` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `distribu_com`
--

INSERT INTO `distribu_com` (`id_dis_com`, `id_com_liv`, `id_clt`, `id_livreurCom`, `date_livraison`, `date_paiment_com`, `etat_paiement`) VALUES
(6, 5, 37, 1, '2021-09-04', '2021-09-10', 'payer'),
(7, 5, 39, 1, '2021-09-04', '2021-09-10', 'payer'),
(8, 7, 38, 1, '2021-09-10', '2021-09-09', 'payer'),
(9, 7, 37, 1, '2021-09-10', '2021-09-09', 'non_payer');

-- --------------------------------------------------------

--
-- Structure de la table `distribu_produit`
--

CREATE TABLE `distribu_produit` (
  `id_dis_prod` int(11) NOT NULL,
  `id_distribu` int(11) NOT NULL,
  `idProduits_dis` int(11) NOT NULL,
  `quantite_venduPro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `distribu_produit`
--

INSERT INTO `distribu_produit` (`id_dis_prod`, `id_distribu`, `idProduits_dis`, `quantite_venduPro`) VALUES
(12, 8, 25, 2),
(13, 9, 24, 3),
(15, 10, 24, 3);

-- --------------------------------------------------------

--
-- Structure de la table `facture_achat`
--

CREATE TABLE `facture_achat` (
  `id_fac_ach` int(11) NOT NULL,
  `designation_ach` varchar(64) NOT NULL,
  `dateFactAchat` date DEFAULT NULL,
  `id_fourni` int(11) NOT NULL,
  `id_ing` varchar(255) NOT NULL,
  `user_create` varchar(16) DEFAULT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `facture_achat`
--

INSERT INTO `facture_achat` (`id_fac_ach`, `designation_ach`, `dateFactAchat`, `id_fourni`, `id_ing`, `user_create`, `date_create`) VALUES
(12, 'Fact 001', '2021-09-16', 9, '2,3,4', 'Epiphane', '2021-09-02'),
(13, 'Fact 002', '2021-09-09', 5, '3,4,8', 'Epiphane', '2021-09-02');

-- --------------------------------------------------------

--
-- Structure de la table `fact_com_paie`
--

CREATE TABLE `fact_com_paie` (
  `id_fact` int(11) NOT NULL,
  `designation_paie` varchar(64) NOT NULL,
  `id_DisCom_fact` int(11) NOT NULL,
  `user_create` varchar(16) DEFAULT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fact_com_paie`
--

INSERT INTO `fact_com_paie` (`id_fact`, `designation_paie`, `id_DisCom_fact`, `user_create`, `date_create`) VALUES
(9, 'Fact 001', 6, NULL, '2021-09-03'),
(12, 'Fact 0015', 8, NULL, '2021-09-03');

-- --------------------------------------------------------

--
-- Structure de la table `fact_dis_paie`
--

CREATE TABLE `fact_dis_paie` (
  `id_paie_dis` int(11) NOT NULL,
  `designationPaie` varchar(128) NOT NULL,
  `id_dis_line` int(11) NOT NULL,
  `user_create` varchar(64) DEFAULT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fact_dis_paie`
--

INSERT INTO `fact_dis_paie` (`id_paie_dis`, `designationPaie`, `id_dis_line`, `user_create`, `date_create`) VALUES
(8, 'Fact bon 005', 8, NULL, '2021-09-03');

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_four` int(11) NOT NULL,
  `nom_four` varchar(64) NOT NULL,
  `adresse_four` varchar(128) DEFAULT NULL,
  `tel_four` varchar(255) NOT NULL,
  `typeFourni` varchar(16) NOT NULL,
  `user_create` varchar(32) DEFAULT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_four`, `nom_four`, `adresse_four`, `tel_four`, `typeFourni`, `user_create`, `date_create`) VALUES
(1, 'DADI Koévie', 'Grand Marché', '92 25 74 16 / 98 65 47 47', 'Locaux', NULL, '2021-08-11'),
(4, 'KOBOE Antoinette', 'Adidogmé', '22 15 45 78 /   96 52 32 14', 'Locaux', NULL, '2021-08-12'),
(5, 'FADZO Dovie', 'Parie Centre', '0033 25 445 12 44', 'Etrangé', NULL, '2021-08-12'),
(8, 'KOFFA ', 'Berlin', '0044 567 987 34', 'Etrangé', NULL, '2021-08-21'),
(9, 'AKOUN', 'Agoé Assiyéyé', '78 45 65 41 / 97 47 45 12', 'Locaux', NULL, '2021-09-01');

-- --------------------------------------------------------

--
-- Structure de la table `ingrediants`
--

CREATE TABLE `ingrediants` (
  `id_ingrediant` int(11) NOT NULL,
  `id_type_ing` int(11) NOT NULL,
  `id_fou` int(11) DEFAULT NULL,
  `user_create` varchar(64) DEFAULT NULL,
  `dateCreate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingrediants`
--

INSERT INTO `ingrediants` (`id_ingrediant`, `id_type_ing`, `id_fou`, `user_create`, `dateCreate`) VALUES
(46, 2, 9, NULL, '2021-09-01'),
(47, 2, 1, NULL, '2021-09-01'),
(48, 8, 5, NULL, '2021-09-01'),
(49, 8, 4, NULL, '2021-09-01'),
(50, 8, 8, NULL, '2021-09-01'),
(51, 4, 9, NULL, '2021-09-01'),
(52, 4, 1, NULL, '2021-09-01'),
(53, 4, 5, NULL, '2021-09-01'),
(54, 4, 4, NULL, '2021-09-01'),
(55, 4, 8, NULL, '2021-09-01'),
(56, 3, 9, NULL, '2021-09-02'),
(57, 3, 1, NULL, '2021-09-02'),
(58, 3, 5, NULL, '2021-09-02');

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

CREATE TABLE `livreur` (
  `idLivreur` int(11) NOT NULL,
  `nom_dis` varchar(64) NOT NULL,
  `telephone_dis` varchar(255) NOT NULL,
  `user_create` varchar(64) DEFAULT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livreur`
--

INSERT INTO `livreur` (`idLivreur`, `nom_dis`, `telephone_dis`, `user_create`, `date_create`) VALUES
(1, 'AKOH Nestor', '98 65 23 14', NULL, '2021-08-05'),
(2, 'ESSO Kokou', '92 45 68 75', NULL, '2021-08-05');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id_not` int(11) NOT NULL,
  `suject_not` varchar(255) NOT NULL,
  `date_debut_noti` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `statu_notif` int(11) NOT NULL,
  `user_create` varchar(8) DEFAULT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id_not`, `suject_not`, `date_debut_noti`, `datefin`, `statu_notif`, `user_create`, `date_create`) VALUES
(1, 'Livraison à des Grossis au grand marché de Lomé', '2021-08-15', '2021-08-27', 1, NULL, '2021-08-13'),
(2, 'Livraison au marché à Agoé Assiyéyé', '2021-08-05', '2021-09-05', 1, NULL, '2021-08-21'),
(3, 'Livraison au marché à Adidogmé', '2021-08-06', '2021-08-28', 1, NULL, '2021-08-21'),
(4, 'Livraison à des Grossis au grand marché de Lomé', '2021-09-04', '2021-09-03', 1, NULL, '2021-09-02');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id_prod` int(11) NOT NULL,
  `id_yaourt` int(11) NOT NULL,
  `quantite_pro` int(11) NOT NULL,
  `prix_produit` float NOT NULL,
  `niveauPro` varchar(16) NOT NULL,
  `user_create` varchar(16) DEFAULT NULL,
  `date_create` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id_prod`, `id_yaourt`, `quantite_pro`, `prix_produit`, `niveauPro`, `user_create`, `date_create`) VALUES
(24, 38, 23, 500, 'no_finish', NULL, '2021-09-03'),
(25, 40, 43, 650, 'no_finish', NULL, '2021-09-03');

-- --------------------------------------------------------

--
-- Structure de la table `prod_commande`
--

CREATE TABLE `prod_commande` (
  `id_prd_q_com` int(11) NOT NULL,
  `id_comma_pro` int(11) NOT NULL,
  `id_produit_com` int(11) NOT NULL,
  `quantite_com` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prod_commande`
--

INSERT INTO `prod_commande` (`id_prd_q_com`, `id_comma_pro`, `id_produit_com`, `quantite_com`) VALUES
(21, 5, 25, 4),
(22, 6, 24, 2),
(24, 7, 24, 2),
(25, 7, 25, 2);

-- --------------------------------------------------------

--
-- Structure de la table `prod_fac_achats`
--

CREATE TABLE `prod_fac_achats` (
  `id_proAch` int(11) NOT NULL,
  `idFacAchats` int(11) DEFAULT NULL,
  `id_ingred_achts` int(11) NOT NULL,
  `prixUnitaire_act` int(11) NOT NULL,
  `quantite_act` int(11) NOT NULL,
  `uniteFac` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prod_fac_achats`
--

INSERT INTO `prod_fac_achats` (`id_proAch`, `idFacAchats`, `id_ingred_achts`, `prixUnitaire_act`, `quantite_act`, `uniteFac`) VALUES
(21, 12, 2, 1400, 20, ''),
(22, 12, 3, 2500, 15, ''),
(23, 12, 4, 1550, 12, ''),
(24, 13, 3, 2500, 15, ''),
(25, 13, 4, 1550, 12, ''),
(26, 13, 8, 860, 20, '');

-- --------------------------------------------------------

--
-- Structure de la table `stock_facture_acht`
--

CREATE TABLE `stock_facture_acht` (
  `id_stock_fac_a` int(11) NOT NULL,
  `id_ing_pro` int(11) NOT NULL,
  `id_fact_ach` int(11) DEFAULT NULL,
  `prixUnitaire_prod` int(11) NOT NULL,
  `quantite_pro_ach` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stock_facture_acht`
--

INSERT INTO `stock_facture_acht` (`id_stock_fac_a`, `id_ing_pro`, `id_fact_ach`, `prixUnitaire_prod`, `quantite_pro_ach`) VALUES
(13, 2, 12, 1400, 17),
(14, 3, 12, 2500, 23),
(15, 4, 12, 1550, 12),
(16, 3, 13, 2500, 23),
(17, 4, 13, 1550, 12),
(18, 8, 13, 860, 25);

-- --------------------------------------------------------

--
-- Structure de la table `type_ingrediant`
--

CREATE TABLE `type_ingrediant` (
  `id_TIng` int(11) NOT NULL,
  `references_ing` varchar(64) NOT NULL,
  `nom_ing` varchar(64) NOT NULL,
  `prixUnitaireIng` int(11) NOT NULL,
  `quantiteIng` int(11) NOT NULL,
  `user_create` varchar(64) DEFAULT NULL,
  `dateCreate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_ingrediant`
--

INSERT INTO `type_ingrediant` (`id_TIng`, `references_ing`, `nom_ing`, `prixUnitaireIng`, `quantiteIng`, `user_create`, `dateCreate`) VALUES
(1, '200 mg', 'Sucre', 1200, 15, NULL, '2021-09-01'),
(2, '50 ml', 'Arôme nature', 1400, 17, NULL, '2021-09-01'),
(3, '500g ', 'Lait ', 2500, 23, NULL, '2021-09-01'),
(4, '50 g', 'Chocolat', 1550, 12, NULL, '2021-09-01'),
(6, '50 ml', 'Arôme Chocolat', 560, 25, NULL, '2021-09-01'),
(7, '200 ml', 'Vanille', 1500, 41, NULL, '2021-09-01'),
(8, '80 ml', 'Arôme Vanille', 860, 25, NULL, '2021-09-01');

-- --------------------------------------------------------

--
-- Structure de la table `type_yaout`
--

CREATE TABLE `type_yaout` (
  `id_ty` int(11) NOT NULL,
  `ref_yaourt` varchar(64) NOT NULL,
  `nom_yaourt` varchar(64) NOT NULL,
  `user_create` varchar(64) DEFAULT NULL,
  `dateCreate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `type_yaout`
--

INSERT INTO `type_yaout` (`id_ty`, `ref_yaourt`, `nom_yaourt`, `user_create`, `dateCreate`) VALUES
(38, '20 ml', 'Yaourt Nature', NULL, '2021-09-02'),
(39, '100 ml', 'Yaourt Choco', NULL, '2021-09-02'),
(40, '15 ml', 'Yaourt Vanille', NULL, '2021-09-02');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `dateCreate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `dateCreate`) VALUES
(1, 'Epiphane', 'phane@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL),
(2, 'Jules', 'jule@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL),
(3, 'Richard', 'ri12@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `yaourt`
--

CREATE TABLE `yaourt` (
  `id_yaourt` int(11) NOT NULL,
  `ing_id` int(11) NOT NULL,
  `yaourt_id` int(11) NOT NULL,
  `quantiteDispoY` int(11) NOT NULL,
  `niveau_production` varchar(128) NOT NULL,
  `user_create` varchar(64) DEFAULT NULL,
  `dateCreate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `yaourt`
--

INSERT INTO `yaourt` (`id_yaourt`, `ing_id`, `yaourt_id`, `quantiteDispoY`, `niveau_production`, `user_create`, `dateCreate`) VALUES
(1, 2, 38, 14, 'oui', 'Epiphane', '2021-09-02'),
(2, 3, 38, 14, 'oui', 'Epiphane', '2021-09-02'),
(3, 2, 38, 14, 'oui', 'Epiphane', '2021-09-02'),
(4, 3, 38, 14, 'oui', 'Epiphane', '2021-09-02'),
(5, 2, 38, 14, 'oui', 'Epiphane', '2021-09-02'),
(6, 3, 38, 14, 'oui', 'Epiphane', '2021-09-02'),
(7, 2, 38, 12, 'oui', 'Epiphane', '2021-09-02'),
(8, 3, 38, 12, 'oui', 'Epiphane', '2021-09-02'),
(9, 2, 38, 14, 'oui', 'Epiphane', '2021-09-02'),
(10, 3, 38, 10, 'oui', 'Epiphane', '2021-09-02'),
(16, 2, 40, 5, 'oui', 'Epiphane', '2021-09-02'),
(17, 3, 40, 4, 'oui', 'Epiphane', '2021-09-02'),
(18, 8, 40, 4, 'oui', 'Epiphane', '2021-09-02');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_com`);

--
-- Index pour la table `composition_produit`
--
ALTER TABLE `composition_produit`
  ADD PRIMARY KEY (`id_comp`),
  ADD KEY `id_typeI` (`id_typeI`),
  ADD KEY `id_typeY` (`id_typeY`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_compte`);

--
-- Index pour la table `distributions`
--
ALTER TABLE `distributions`
  ADD PRIMARY KEY (`idDis`),
  ADD KEY `id_livreur` (`id_livreur`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `distribu_com`
--
ALTER TABLE `distribu_com`
  ADD PRIMARY KEY (`id_dis_com`),
  ADD KEY `id_com_liv` (`id_com_liv`),
  ADD KEY `id_livreurCom` (`id_livreurCom`),
  ADD KEY `id_clt` (`id_clt`);

--
-- Index pour la table `distribu_produit`
--
ALTER TABLE `distribu_produit`
  ADD PRIMARY KEY (`id_dis_prod`),
  ADD KEY `idProduits_dis` (`idProduits_dis`),
  ADD KEY `id_distribu` (`id_distribu`);

--
-- Index pour la table `facture_achat`
--
ALTER TABLE `facture_achat`
  ADD PRIMARY KEY (`id_fac_ach`),
  ADD KEY `id_fourni` (`id_fourni`);

--
-- Index pour la table `fact_com_paie`
--
ALTER TABLE `fact_com_paie`
  ADD PRIMARY KEY (`id_fact`),
  ADD KEY `id_DisCom_fact` (`id_DisCom_fact`);

--
-- Index pour la table `fact_dis_paie`
--
ALTER TABLE `fact_dis_paie`
  ADD PRIMARY KEY (`id_paie_dis`),
  ADD KEY `id_dis_line` (`id_dis_line`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_four`);

--
-- Index pour la table `ingrediants`
--
ALTER TABLE `ingrediants`
  ADD PRIMARY KEY (`id_ingrediant`),
  ADD KEY `id_fou` (`id_fou`),
  ADD KEY `id_type_ing` (`id_type_ing`);

--
-- Index pour la table `livreur`
--
ALTER TABLE `livreur`
  ADD PRIMARY KEY (`idLivreur`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_not`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id_prod`),
  ADD KEY `id_yaourt` (`id_yaourt`);

--
-- Index pour la table `prod_commande`
--
ALTER TABLE `prod_commande`
  ADD PRIMARY KEY (`id_prd_q_com`),
  ADD KEY `prod_commande_ibfk_1` (`id_comma_pro`),
  ADD KEY `id_produit_com` (`id_produit_com`);

--
-- Index pour la table `prod_fac_achats`
--
ALTER TABLE `prod_fac_achats`
  ADD PRIMARY KEY (`id_proAch`),
  ADD KEY `idFacAchats` (`idFacAchats`),
  ADD KEY `id_ingred_achts` (`id_ingred_achts`);

--
-- Index pour la table `stock_facture_acht`
--
ALTER TABLE `stock_facture_acht`
  ADD PRIMARY KEY (`id_stock_fac_a`),
  ADD KEY `id_fact_ach` (`id_fact_ach`),
  ADD KEY `id_ing_pro` (`id_ing_pro`);

--
-- Index pour la table `type_ingrediant`
--
ALTER TABLE `type_ingrediant`
  ADD PRIMARY KEY (`id_TIng`);

--
-- Index pour la table `type_yaout`
--
ALTER TABLE `type_yaout`
  ADD PRIMARY KEY (`id_ty`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Index pour la table `yaourt`
--
ALTER TABLE `yaourt`
  ADD PRIMARY KEY (`id_yaourt`),
  ADD KEY `yaourt_ibfk_1` (`ing_id`),
  ADD KEY `yaourt_id` (`yaourt_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `composition_produit`
--
ALTER TABLE `composition_produit`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_compte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `distributions`
--
ALTER TABLE `distributions`
  MODIFY `idDis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `distribu_com`
--
ALTER TABLE `distribu_com`
  MODIFY `id_dis_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `distribu_produit`
--
ALTER TABLE `distribu_produit`
  MODIFY `id_dis_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `facture_achat`
--
ALTER TABLE `facture_achat`
  MODIFY `id_fac_ach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `fact_com_paie`
--
ALTER TABLE `fact_com_paie`
  MODIFY `id_fact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `fact_dis_paie`
--
ALTER TABLE `fact_dis_paie`
  MODIFY `id_paie_dis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_four` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `ingrediants`
--
ALTER TABLE `ingrediants`
  MODIFY `id_ingrediant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT pour la table `livreur`
--
ALTER TABLE `livreur`
  MODIFY `idLivreur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_not` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `prod_commande`
--
ALTER TABLE `prod_commande`
  MODIFY `id_prd_q_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `prod_fac_achats`
--
ALTER TABLE `prod_fac_achats`
  MODIFY `id_proAch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `stock_facture_acht`
--
ALTER TABLE `stock_facture_acht`
  MODIFY `id_stock_fac_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `type_ingrediant`
--
ALTER TABLE `type_ingrediant`
  MODIFY `id_TIng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `type_yaout`
--
ALTER TABLE `type_yaout`
  MODIFY `id_ty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `yaourt`
--
ALTER TABLE `yaourt`
  MODIFY `id_yaourt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `composition_produit`
--
ALTER TABLE `composition_produit`
  ADD CONSTRAINT `composition_produit_ibfk_1` FOREIGN KEY (`id_typeI`) REFERENCES `type_ingrediant` (`id_TIng`),
  ADD CONSTRAINT `composition_produit_ibfk_2` FOREIGN KEY (`id_typeY`) REFERENCES `type_yaout` (`id_ty`);

--
-- Contraintes pour la table `distributions`
--
ALTER TABLE `distributions`
  ADD CONSTRAINT `distributions_ibfk_2` FOREIGN KEY (`id_livreur`) REFERENCES `livreur` (`idLivreur`),
  ADD CONSTRAINT `distributions_ibfk_3` FOREIGN KEY (`idClient`) REFERENCES `clients` (`id_client`);

--
-- Contraintes pour la table `distribu_com`
--
ALTER TABLE `distribu_com`
  ADD CONSTRAINT `distribu_com_ibfk_1` FOREIGN KEY (`id_clt`) REFERENCES `clients` (`id_client`),
  ADD CONSTRAINT `distribu_com_ibfk_2` FOREIGN KEY (`id_livreurCom`) REFERENCES `livreur` (`idLivreur`);

--
-- Contraintes pour la table `distribu_produit`
--
ALTER TABLE `distribu_produit`
  ADD CONSTRAINT `distribu_produit_ibfk_1` FOREIGN KEY (`idProduits_dis`) REFERENCES `produits` (`id_prod`),
  ADD CONSTRAINT `distribu_produit_ibfk_2` FOREIGN KEY (`id_distribu`) REFERENCES `distributions` (`idDis`);

--
-- Contraintes pour la table `facture_achat`
--
ALTER TABLE `facture_achat`
  ADD CONSTRAINT `facture_achat_ibfk_1` FOREIGN KEY (`id_fourni`) REFERENCES `fournisseur` (`id_four`);

--
-- Contraintes pour la table `fact_com_paie`
--
ALTER TABLE `fact_com_paie`
  ADD CONSTRAINT `fact_com_paie_ibfk_1` FOREIGN KEY (`id_DisCom_fact`) REFERENCES `distribu_com` (`id_dis_com`);

--
-- Contraintes pour la table `fact_dis_paie`
--
ALTER TABLE `fact_dis_paie`
  ADD CONSTRAINT `fact_dis_paie_ibfk_1` FOREIGN KEY (`id_dis_line`) REFERENCES `distributions` (`idDis`);

--
-- Contraintes pour la table `ingrediants`
--
ALTER TABLE `ingrediants`
  ADD CONSTRAINT `ingrediants_ibfk_1` FOREIGN KEY (`id_fou`) REFERENCES `fournisseur` (`id_four`),
  ADD CONSTRAINT `ingrediants_ibfk_2` FOREIGN KEY (`id_type_ing`) REFERENCES `type_ingrediant` (`id_TIng`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_yaourt`) REFERENCES `type_yaout` (`id_ty`);

--
-- Contraintes pour la table `prod_commande`
--
ALTER TABLE `prod_commande`
  ADD CONSTRAINT `prod_commande_ibfk_1` FOREIGN KEY (`id_produit_com`) REFERENCES `produits` (`id_prod`),
  ADD CONSTRAINT `prod_commande_ibfk_2` FOREIGN KEY (`id_comma_pro`) REFERENCES `commande` (`id_com`);

--
-- Contraintes pour la table `prod_fac_achats`
--
ALTER TABLE `prod_fac_achats`
  ADD CONSTRAINT `prod_fac_achats_ibfk_1` FOREIGN KEY (`idFacAchats`) REFERENCES `facture_achat` (`id_fac_ach`),
  ADD CONSTRAINT `prod_fac_achats_ibfk_2` FOREIGN KEY (`id_ingred_achts`) REFERENCES `type_ingrediant` (`id_TIng`);

--
-- Contraintes pour la table `stock_facture_acht`
--
ALTER TABLE `stock_facture_acht`
  ADD CONSTRAINT `stock_facture_acht_ibfk_1` FOREIGN KEY (`id_fact_ach`) REFERENCES `facture_achat` (`id_fac_ach`),
  ADD CONSTRAINT `stock_facture_acht_ibfk_2` FOREIGN KEY (`id_ing_pro`) REFERENCES `type_ingrediant` (`id_TIng`);

--
-- Contraintes pour la table `yaourt`
--
ALTER TABLE `yaourt`
  ADD CONSTRAINT `yaourt_ibfk_1` FOREIGN KEY (`ing_id`) REFERENCES `type_ingrediant` (`id_TIng`),
  ADD CONSTRAINT `yaourt_ibfk_2` FOREIGN KEY (`yaourt_id`) REFERENCES `type_yaout` (`id_ty`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
