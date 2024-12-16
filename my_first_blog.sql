-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 déc. 2024 à 13:43
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
-- Base de données : `my_first_blog`
--
CREATE DATABASE IF NOT EXISTS `my_first_blog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `my_first_blog`;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_validated` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `post_id`, `content`, `creation_date`, `is_validated`) VALUES
(1, 2, 1, 'Merci pour cet éclairage sur le sport !', '2024-12-16 13:36:27', 1),
(2, 2, 2, 'Excellent article ! Les animes sont plus qu’un simple divertissement, c’est tout un art.', '2024-12-16 13:37:09', 1),
(3, 2, 3, 'L’IA pourrait vraiment changer le monde, mais il faut qu’on soit prêts à gérer ses risques.', '2024-12-16 13:37:59', 1),
(4, 4, 1, 'J’ai commencé à jouer récemment, et je ne m\'attendais pas à autant de plaisir. Super article !', '2024-12-16 13:38:41', 1),
(5, 3, 1, 'Très bon article, cela donne envie de s\'y mettre !', '2024-12-16 13:40:25', 1),
(6, 3, 2, 'Les animes m’ont toujours fait rêver. L’article résume bien l’essence de cette forme de divertissement.', '2024-12-16 13:40:44', 1),
(7, 3, 3, 'Je suis vraiment contre les intelligences artificielles, il faut protéger notre vie privée.', '2024-12-16 13:42:10', 1);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `chapo` varchar(300) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `title`, `chapo`, `content`, `creation_date`) VALUES
(1, 1, 'Le Badminton : Un Sport de Précision et de Vitesse', 'Le badminton, sport à la fois exigeant et passionnant, séduit de plus en plus de pratiquants à travers le monde. Mélange de technique, de rapidité et de stratégie, il offre des sensations uniques, que ce soit en compétition ou pour le loisir. Découvrez les secrets de ce sport de raquette en plein es', 'Le badminton est un sport qui se pratique avec une raquette légère et un volant, souvent en plumes ou en nylon, dont l\'objectif est de faire tomber ce dernier dans le camp adverse. Bien que souvent perçu comme un jeu de plage ou une activité récréative, le badminton est en réalité un sport de haut niveau, reconnu pour son exigence physique. Les compétitions internationales, comme les Championnats du Monde ou les Jeux Olympiques, révèlent la technicité de ce jeu et la rapidité avec laquelle les athlètes doivent réagir.\r\n\r\nL\'un des aspects les plus fascinants du badminton est sa rapidité. Le volant, qui peut atteindre des vitesses impressionnantes, demande une réactivité hors du commun. Lors d’un smash puissant, la balle peut dépasser les 200 km/h, défiant ainsi les réflexes du joueur adverse. Mais au-delà de la vitesse, le jeu exige aussi une excellente gestion de l\'espace et une anticipation des mouvements. Chaque frappe doit être réfléchie, car une erreur peut rapidement coûter un point. La coordination œil-main et la mobilité sur le terrain sont essentielles pour être performant.\r\n\r\nEn plus des compétences physiques, le badminton requiert une grande maîtrise tactique. Que ce soit en simple ou en double, les joueurs doivent savoir varier les types de frappes : des dégagements longs, des amortis délicats, des clears pour maintenir l’adversaire à distance, ou encore des attaques rapides pour surprendre. Les stratégies changent selon les adversaires et les situations du match, ce qui fait de chaque rencontre une véritable partie d\'échecs en mouvement. Les joueurs doivent constamment s\'adapter et anticiper les coups de leurs adversaires.\r\n\r\nEnfin, le badminton est un sport accessible à tous. Bien qu\'il existe des niveaux de compétition très élevés, il est facile à apprendre et peut être pratiqué de manière récréative. Peu importe l\'âge ou la condition physique, le badminton offre un excellent moyen de rester actif tout en s\'amusant. Dans les clubs, les jeunes débutants comme les joueurs expérimentés peuvent se retrouver pour partager des moments conviviaux autour de ce sport passionnant.', '2024-12-16 12:28:57'),
(2, 1, 'Les Animes : Une Fenêtre Sur Des Univers Imaginaires', 'Les animes, ces séries animées japonaises, ont conquis un public mondial grâce à leur diversité et leur richesse narrative. Alliant esthétique, émotion et aventure, ils sont devenus bien plus qu\'un simple divertissement. Découvrez pourquoi les animes captivent de plus en plus de spectateurs et comme', 'Les animes se distinguent par leur capacité à raconter des histoires captivantes dans des genres variés, allant de l’action épique à la romance en passant par la science-fiction ou le drame psychologique. Ce qui les rend uniques, c\'est la liberté créative qu\'ils offrent aux auteurs. Les univers imaginaires dans lesquels se déroulent les animes sont souvent incroyablement détaillés et originaux, permettant aux spectateurs de s\'évader dans des mondes aussi fantastiques que profondément humains. Qu’il s’agisse de luttes contre des créatures surnaturelles ou de récits de développement personnel, chaque anime possède son propre charme.\r\n\r\nL\'un des points forts des animes est la profondeur de leurs personnages. Contrairement à de nombreuses séries occidentales, les personnages d\'animes sont souvent plus nuancés et complexes, avec des histoires personnelles qui évoluent tout au long des épisodes. Ces personnages, qu\'ils soient des héros pleins de courage ou des anti-héros torturés, sont généralement très attachants, ce qui crée une connexion émotionnelle forte avec le public. Les animes abordent aussi des thèmes profonds tels que la quête de soi, la lutte contre l\'injustice, ou même des questionnements philosophiques sur la nature humaine.\r\n\r\nLes animes ont également une influence importante sur la culture populaire, et pas seulement au Japon. Depuis plusieurs décennies, ils ont conquis les écrans du monde entier, de l\'Amérique du Nord à l\'Europe. Des séries comme Dragon Ball, Naruto ou One Piece ont marqué plusieurs générations, devenant de véritables phénomènes. Aujourd\'hui, les animes sont non seulement diffusés à la télévision ou sur des plateformes de streaming, mais ils inspirent aussi des films, des jeux vidéo et des produits dérivés. Cette popularité internationale montre l\'impact croissant de cette forme d\'art.\r\n\r\nEnfin, l\'animation japonaise est un art à part entière, connu pour sa qualité visuelle unique. Le style graphique des animes, avec ses personnages aux grands yeux expressifs et ses décors détaillés, est devenu une signature reconnaissable. De plus, les animes sont souvent accompagnés de bandes-son inoubliables, qui contribuent à l\'intensité des scènes. Les techniques d\'animation utilisées sont constamment innovantes, avec des effets spéciaux impressionnants et des séquences d\'action fluides qui fascinent les amateurs du genre. Les animes ne sont donc pas seulement un moyen de raconter une histoire, mais aussi un véritable chef-d\'œuvre visuel et sonore.', '2024-12-16 12:31:23'),
(3, 1, 'L\'Intelligence Artificielle : Une Révolution pour le Futur', 'L\'intelligence artificielle (IA) est en train de transformer tous les secteurs de la société. Des voitures autonomes à la médecine de précision, l\'IA promet de révolutionner notre quotidien et d\'ouvrir la voie à de nouvelles innovations. Mais quels sont les défis et les opportunités liés à cette ava', 'L\'intelligence artificielle se définit comme la capacité des machines à imiter des fonctions humaines telles que la pensée, l\'apprentissage ou la prise de décision. Grâce aux algorithmes et aux réseaux neuronaux, l\'IA peut analyser des quantités massives de données, permettant ainsi de résoudre des problèmes complexes plus rapidement que l\'être humain. Cette capacité d\'analyse fait de l\'IA un outil précieux dans de nombreux domaines, comme la finance, où elle optimise les investissements, ou dans l\'industrie, où elle améliore les processus de production.\r\n\r\nDans le domaine de la santé, l\'IA est utilisée pour analyser des images médicales, prédire des maladies ou encore proposer des traitements personnalisés. Les algorithmes d\'IA peuvent détecter des signes précoces de maladies, parfois plus rapidement que les médecins, ce qui permet de sauver des vies. De plus, l\'IA pourrait faciliter l\'accès aux soins en rendant les diagnostics plus rapides et moins coûteux, notamment dans les pays en développement où les ressources médicales sont limitées.\r\n\r\nCependant, malgré ses nombreux avantages, l\'IA soulève également des questions éthiques et sociales importantes. La montée en puissance de l\'automatisation pourrait entraîner la disparition de certains emplois, notamment dans des secteurs comme le transport ou la logistique. De plus, la gestion des données personnelles et la sécurité sont des enjeux majeurs, car des algorithmes mal conçus pourraient avoir des conséquences désastreuses. Il est donc essentiel de réguler l\'usage de l\'IA et d\'assurer une transparence dans ses applications.\r\n\r\nEnfin, l\'IA ouvre un champ infini de possibilités pour l\'avenir. Dans quelques années, des technologies comme les voitures autonomes pourraient devenir la norme, et les robots pourraient accomplir des tâches humaines dans des environnements hostiles, comme l\'exploration spatiale. L\'IA ne se limite pas à la simple automatisation des tâches : elle pourrait être un levier majeur pour résoudre certains des plus grands défis de l\'humanité, comme la lutte contre le changement climatique ou la gestion des crises sanitaires mondiales.', '2024-12-16 12:31:53'),
(4, 1, 'Le Ski : Une Passion Qui Dépasse Les Frontières', 'Le ski, bien plus qu\'un simple sport d\'hiver, est une véritable passion qui rassemble des millions de pratiquants à travers le monde. Que ce soit pour les amateurs de sensations fortes ou ceux à la recherche de paysages époustouflants, le ski offre une expérience unique à chaque descente. Découvrez ', 'Le ski est un sport qui se pratique principalement en montagne, sur des pistes aménagées et balisées. Il existe différentes disciplines, comme le ski alpin, le ski de fond ou le freestyle, chacune ayant ses particularités et ses défis. Le ski alpin, par exemple, consiste à descendre des pentes plus ou moins raides en contrôlant sa vitesse et sa trajectoire, tandis que le ski de fond se pratique sur des terrains plats ou légèrement vallonnés, axé sur l\'endurance et la technique. Le freestyle, lui, attire les plus jeunes avec ses sauts et figures acrobatiques.\r\n\r\nL\'un des grands attraits du ski est l\'excitation qu\'il procure. Descendre une piste à toute vitesse, glisser sur la neige fraîche, tout en maîtrisant sa technique, procure des sensations fortes. Les montagnes, avec leurs panoramas époustouflants, ajoutent une dimension visuelle à cette expérience. Chaque station de ski propose des pistes adaptées à tous les niveaux, des débutants aux skieurs expérimentés, permettant ainsi à chacun de trouver son propre défi et de progresser à son rythme.\r\n\r\nAu-delà de l\'aspect sportif, le ski est aussi une activité de plein air qui permet de profiter de l’air pur des montagnes et d\'échapper à l\'agitation de la vie quotidienne. Que l\'on skie seul, en famille ou entre amis, la montagne devient un lieu de partage et de convivialité. Les stations de ski offrent de nombreuses autres activités après une journée sur les pistes, comme des promenades en raquettes, des séances de spa ou encore des dîners traditionnels savoyards, créant ainsi une atmosphère propice à la détente et à la rencontre.\r\n\r\nEnfin, le ski est un sport qui évolue constamment avec l\'innovation technologique. Les équipements, tels que les skis, les chaussures et les fixations, sont de plus en plus légers, performants et adaptés aux différents styles de pratique. Les stations de ski investissent également dans des infrastructures modernes, comme des remontées mécaniques plus rapides et écologiques, afin d\'offrir aux skieurs une expérience optimale. Grâce à ces avancées, le ski devient de plus en plus accessible et agréable, renforçant son attrait auprès des passionnés comme des novices.', '2024-12-16 12:32:29');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`) VALUES
(1, 'kayden', 'kbartholomot@gmail.com', '$2y$10$8.cSGNzvhVCD/m4ZSiWYN.e.acTOfbE2/IwjfPosfYAdeAZ1dxzFO', 1),
(2, 'zephyr', 'zephyr@gmail.com', '$2y$10$5IsxWFoACLdrjQYMPqYoEewNV3UKP1x6hqIiUvkELLMShjBWo9iYC', 0),
(3, 'galaxia', 'galaxia@bbox.fr', '$2y$10$mSDbQmbRhfrt9mKZocMmX.4fRi5HOjEWC89rAupu1iJKu6jN7J0my', 0),
(4, 'thalaska ', 'thalaska@orange.fr', '$2y$10$j6IBRDzOVclp6WiCmKA62uNWzHmAGWtN.31GVl8c.Nc4Vsy2Np55G', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_ibfk_1` (`author_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
