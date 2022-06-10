-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 10 juin 2022 à 14:48
-- Version du serveur : 5.7.34
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `charlotte`
--

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE `evenements` (
  `id_evenement` int(10) NOT NULL,
  `id_organisateur` varchar(10) NOT NULL,
  `titre_evenement` varchar(255) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `type_evenement` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code_postal` int(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `signalement` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`id_evenement`, `id_organisateur`, `titre_evenement`, `date_debut`, `date_fin`, `type_evenement`, `adresse`, `code_postal`, `ville`, `description`, `signalement`) VALUES
(1, '2', 'La Grosse Bringue', '2024-07-27', '2024-07-28', 'Musique', '27 Rue du Capitaine Dreyfus', 93100, 'Montreuil', 'Venez danser jusqu\'au bout de la nuit avec Les Fêteuses. Au programme : gros son et grosse bouffe ! \r\nRetrouvez nous chez Louise, au 27 Rue du Capitaine Dreyfus à Montreuil à partir de 19h, on vous attend !', 'non'),
(2, '2', 'Cocktail & Grosse Céramique', '2024-08-09', '2024-08-09', 'Loisirs', '6 ter Rue Galilée', 93100, 'Montreuil', 'Tout est dans le titre, venez découvrir l\'art de la céramique tout en sirotant les meilleurs cocktails de votre vie !\r\nLes ateliers se déroulent tous les samedis à 18h à l\'atelier \"Le Tabouret\" à Montreuil', 'non'),
(7, '2', 'Gros Pique-Nique', '2024-07-26', '2024-07-26', 'Loisirs', '12 Avenue Faidherbe', 93100, 'Montreuil', 'Bronzage et saucisson avec Les Fêteuses. Le parc des Guillands organise un évènements musical pour le 3 juillet, pour l\'occasion, nous tiendrons un stand de charcuterie et servirons des rafraichissements ! ', 'non'),
(18, '4', 'Pharaon des deux terres', '2024-07-26', '2024-07-26', 'Loisirs', 'Rue de Rivoli', 75001, 'Paris', 'Au 8e siècle av. J.-C., en Nubie, un royaume s’organise autour de sa capitale Napata. Vers 730 av. J.-C., le souverain Piânkhi entreprend de conquérir l’Égypte et inaugure la dynastie des pharaons koushites. Ses successeurs, pharaons de la 25e dynastie, régneront durant plus de cinquante ans sur un royaume s’étendant du Delta du Nil jusqu’au confluent du Nil Blanc et du Nil Bleu. Le plus connu d’entre eux est sans conteste Taharqa.\r\n\r\nL’exposition met en lumière le rôle de premier plan de ce vaste royaume, situé dans ce qui est aujourd’hui le nord du Soudan. Elle est en lien avec la mission archéologique du musée du Louvre au Soudan qui, pendant 10 ans, a concentré ses recherches sur le site de Mouweis et les poursuivra aujourd’hui, à El-Hassa, 30 km plus au nord et non loin des pyramides de Méroé.', 'non'),
(19, '4', 'Venus d\'ailleurs', '2024-07-26', '2024-07-26', 'Autre', 'Rue de Rivoli', 75001, 'Paris', 'À l\'occasion de sa 6ème saison, la Petite Galerie propose un voyage dans le temps et autour du monde avec l\'exposition \"Venus d\'ailleurs. Matériaux et objets voyageurs\". \r\n\r\nLa Petite Galerie accompagne ainsi le cycle d\'expositions que le musée du Louvre consacre aux découvertes et explorations de contrées proches et lointaines : \"Paris-Athènes. Naissance de la Grèce moderne 1675-1919\" en septembre et \"Pharaon des deux terres. L\'Épopée africaine des rois de Napata\" au printemps. \r\n\r\nÀ travers les matériaux et les objets, elle se propose d’évoquer les échanges entre des mondes lointains, échanges plus anciens que les explorations. Depuis la plus haute Antiquité, la cornaline, le lapis-lazuli, l’ébène ou encore l’ivoire circulent le long des routes du commerce : ces matériaux sont précieux aussi parce qu’ils viennent de loin.\r\n\r\nCette fascination s’enrichit des mythes qui entourent leur origine. Aux pierres, coquillages et plantes s’ajoutent les animaux vivants, qui voyagent entre les continents, souvent au gré de la politique : les foules comme les artistes découvrent autruches, girafes et éléphants. Les objets fabriqués par l’homme suivent les mêmes routes et, au-delà de l’engouement bien connu des Européens pour l’exotisme, ces multiples aller-retour tissent une histoire plus complexe : formes, techniques, thèmes s’entremêlent pour créer des objets nouveaux qui reflètent toute la complexité de notre monde telle qu’elle pouvait être perçue en Europe depuis la fin du Moyen Âge.', 'non'),
(20, '4', 'L\'âge d\'or de la renaissance portugaise', '2024-07-31', '2024-08-22', 'Film et médias', 'Rue de Rivoli', 75001, 'Paris', 'Pour la première fois, les visiteurs du Louvre sont invités à découvrir l’art raffiné et merveilleusement exécuté des peintres actifs à Lisbonne au Portugal dans la première moitié du 16e siècle.\r\n\r\nAvec le mécénat des rois Manuel Ier (1495-1521) et Jean III (1521-1557) qui s’entourent de peintres de cour et commandent de nombreux retables, la peinture portugaise connaît alors un âge d’or.\r\n\r\nÀ Lisbonne, capitale du royaume tournée vers l’océan, l’arrivée de peintres flamands infléchit l’histoire de la peinture européenne. Après les premiers feux de Nuno Gonçalves (actif à partir de 1450 et avant 1492), les ateliers lisboètes, fédérés autour de Jorge Afonso (actif entre 1504 et 1540), adoptent une nouvelle manière de peindre, fondée sur une parfaite maîtrise de la technique à l’huile.\r\n\r\nCes peintres conjuguent des paysages bleutés empreints de poésie, des tissus et des accessoires précieux, des détails d’architectures raffinées à un sens aigu et parfois cocasse de l’observation et de la narration, opérant une synthèse très originale entre les inventions picturales de la Renaissance flamande et italienne et la culture portugaise.\r\n\r\n', 'non');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_utilisateur` int(10) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nom_organisation` varchar(255) DEFAULT NULL,
  `numero_siret` varchar(14) DEFAULT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `statut` varchar(255) NOT NULL,
  `acces` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `prenom`, `nom`, `email`, `nom_organisation`, `numero_siret`, `mot_de_passe`, `statut`, `acces`) VALUES
(1, 'Anne-Catherine', 'MICHAUD', 'admin@charlotte.com', 'Merci Charlotte !', '09031995202401', '98df645d40f076e1082d9fbdfdb275e7', 'administrateur', 'oui'),
(2, 'Madeleine', 'SAINT-MICHEL', 'lesfeteuses@gmail.com', 'Les Fêteuses', '12345678909876', '98df645d40f076e1082d9fbdfdb275e7', 'organisateur', 'oui'),
(3, 'John', 'DOE', 'utilisateur@charlotte.fr', '', '', 'ab4f63f9ac65152575886860dde480a1', 'normal', 'oui'),
(4, 'Michel', 'LACLOTTE', 'musee@louvre.fr', 'Musée du Louvre', '11111111111111', '98df645d40f076e1082d9fbdfdb275e7', 'organisateur', 'oui'),
(5, 'Emilie', 'HUON', 'emiliehuon@gmail.com', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'utilisateur', 'oui'),
(21, 'jean', 'PIERRE', 'user@gmail.com', '', '', 'ab4f63f9ac65152575886860dde480a1', 'utilisateur', 'oui'),
(22, 'jean', 'PIERRE', 'jean@gg.fr', 'jeanpierre', '11111111111111', 'ab4f63f9ac65152575886860dde480a1', 'organisateur', 'oui'),
(23, 'Alexandre', 'MEYER', 'am@test.fr', 'Fonderie', '00000000000000', 'dcddb75469b4b4875094e14561e573d8', 'organisateur', 'non');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id_evenement`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id_evenement` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_utilisateur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
