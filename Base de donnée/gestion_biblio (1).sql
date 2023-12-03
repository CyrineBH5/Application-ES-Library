-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 25 mai 2023 à 02:39
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_biblio`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `num_tel` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `date_naissance`, `adresse`, `num_tel`, `login`, `password`) VALUES
(4, 'BH', 'Henda', '2023-05-25', 'Ben arous', 94043009, 'henda@gmail.com', 'henda2003');

-- --------------------------------------------------------

--
-- Structure de la table `livreq`
--

CREATE TABLE `livreq` (
  `id` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Image` text NOT NULL,
  `titre` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `auteur` varchar(40) NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `date_edition` date NOT NULL,
  `nb_dispo` int(11) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livreq`
--

INSERT INTO `livreq` (`id`, `ISBN`, `Image`, `titre`, `description`, `auteur`, `categorie`, `date_edition`, `nb_dispo`, `etat`) VALUES
(1, 735211299, 'atomic.jpg', 'Atomic', 'Atomic Habits will reshape the way you think about progress and success, and give you the tools and strategies you need to transform your habits--whether you are a team looking to win a championship, an organization hoping to redefine an industry, or simply an individual who wishes to quit smoking, lose weight, reduce stress, or achieve any other goal.', 'James', 'Education', '2018-10-16', 3, 0),
(20, 2147483647, 'cottage.jpg', 'The cottage', 'After losing her job and boyfriend, Jan Hamlin is in desperate need of a fresh start. So she jumps at the chance to rent a secluded cottage on the edge of Coleshaw Woods\r\nA tap at the window…', 'Lisa Stone', 'Thriller', '2021-11-09', 350, 0),
(21, 2147483647, 'cherished.jpg', 'The Cherished', 'For fans of Claire Legrand, Rory Power, and Danielle Vega comes a visceral horror thriller in the vein of Midsommar, as one girl inherits a mysterious house from her estranged grandmother—and a letter with sinister instructions.', 'Patricia Ward', 'Horror', '2023-04-18', 30, 0),
(22, 2147483647, 'lake.jpg', 'The Lake House', 'Claire’s grown up triple-checking locks. Counting her steps. Second-guessing every decision. It’s just how she’s wired – her worst-case scenarios never actually come true.\r\n\r\nUntil she arrives at an off-the-grid summer camp to find a blackened, burned husk instead of a lodge – and no survivors, except her and two other late arrivals: Reyva and Mariana.\r\n\r\nWhen the three girls find a dead body in the woods, they realize none of this is an accident. Someone, something, is hunting them. Something that hides in the shadows. Something that refuses to let them leave.', 'Sarah Beth Durst', 'Mystery', '2023-04-25', 1, 0),
(26, 2147483647, 'snow.jpg', 'Snow &amp; Poison', 'Raven-black hair, red lips, and skin as white as snow—Lady Sophie has led a sheltered life. . . . But that tale ends here.\r\n\r\nDuchy of Bavaria, 1621. The palace is abuzz with excitement. The widowed Duke Maximilian is marrying a lady named Claudia, and at last, introducing his daughter Sophie to Bavaria’s high society.\r\n\r\nAt the ball, Sophie charms the dashing Prince Philip, heir to the Spanish throne. But as days pass and Sophie and Philip fall deeply and dangerously in love, the king of Spain orders Philip’s return home and his engagement to a princess.\r\n\r\nHeartbroken, Sophie finds comfort in Claudia. But might the rumors of her stepmother&#039;s dealings with magic be true? And when conflict between kingdoms puts a target on Sophie’s back, can a vanished witch be the key ally she needs? A new tale begins: one where Sophie must shield her heart, fight for life life, and protect her home.', 'Melissa Cruz', 'Fantasy', '2023-04-10', 12, 0),
(27, 2147483647, 'patrick.png', 'Le Nom du Vent', 'Le Nom du Vent&quot; est le premier tome d&#039;une trilogie épique de fantasy. L&#039;histoire suit les aventures de Kvothe, un jeune musicien prodige qui se retrouve mêlé à des événements extraordinaires dans un monde rempli de magie et de mystère.\r\n', 'Patrick Rothfuss', 'Fantasy', '2007-03-27', 1, 0),
(28, 1250857430, 'divine.jpg', 'Divine Rivals', 'When two young rival journalists find love through a magical connection, they must face the depths of hell, in a war among gods, to seal their fate forever.\r\n\r\nAfter centuries of sleep, the gods are warring again. But eighteen-year-old Iris Winnow just wants to hold her family together. Her mother is suffering from addiction and her brother is missing from the front lines. Her best bet is to win the columnist promotion at the Oath Gazette.\r\n\r\nTo combat her worries, Iris writes letters to her brother and slips them beneath her wardrobe door, where they vanish—into the hands of Roman Kitt, her cold and handsome rival at the paper. When he anonymously writes Iris back, the two of them forge a connection that will follow Iris all the way to the front lines of battle: for her brother, the fate of mankind, and love.\r\n\r\nShadow and Bone meets Lore in Rebecca Ross&#039;s Divine Rivals, an epic enemies-to-lovers fantasy novel filled with hope and heartbreak, and the unparalleled power of love.', 'Rebecca Ross', 'Romance', '2023-04-04', 3, 0),
(29, 2147483647, 'kate.jpg', 'Nightbirds', 'In a dazzling new fantasy world full of whispered secrets and political intrigue, the magic of women is outlawed but four girls with unusual powers have the ability to change it all.\r\n\r\nThe Nightbirds are Simta’s best kept secret. Teenage girls from the Great Houses with magic coursing through their veins, the Nightbirds have the unique ability to gift their magic to others with a kiss. Magic—especially the magic of women—is outlawed and the city’s religious sects would see them burned if discovered. But protected by the Great Houses, the Nightbirds are safe well-guarded treasures.\r\n\r\nAs this Season’s Nightbirds, Matilde, Aesa, and Sayer spend their nights bestowing their unique brands of magic to well-paying clients. Once their Season is through, they&#039;re each meant to marry a Great House lord and become mothers to the next generation of Nightbirds before their powers fade away. But Matilde, Aesa, and Sayer have other plans. They know their lives as Nightbirds aren&#039;t just temporary, but a complete lie and yearn for something more.\r\n\r\nWhen they discover that there are other girls like them and that their magic is more than they were ever told, they see the carefully crafted Nightbird system for what it is: a way to keep them in their place, first as daughters and then as wives. Now they must make a choice—to stay in their gilded cage or to remake the city that put them there in the first place.', 'Kate J. Armstrong', 'Fantasy', '2023-02-28', 9, 0),
(30, 974810451, 'bewitched.jpg', 'Bewitched', 'At age twenty, Selene Bowers desperately hopes to be accepted into Henbane Coven, an academy for young witches. Since one of the requirements for entry is to connect with her powers via a quest through the wilderness, Selene books a trip to South America. When a nefarious supernatural force tries to drag her plane from the sky, Selene&#039;s magic awakens to save her life―at a cost. Using her powers devours her memories, one by one.\r\n\r\nWorse, when Selene braves the jungle and discovers the source of the attack, she finds herself awakening an ancient evil, Memnon the Cursed, who mistakes Selene for his long-dead wife. The wife who betrayed him. Selene manages to escape and begin her studies at Henbane, but when Memnon turns up at the coven and witches are found dead across campus, Selene becomes entangled in a dangerous plot. Accused of the murders on the basis of her memory loss, Selene must rely on Memnon&#039;s help for answers―and his plans for her will change everything.', 'Laura Thalassa', 'Magic', '2009-04-18', 7, 0),
(31, 978126450, 'kingdom.jpg', 'Kingdom of Blood and Salt', 'An epic enemies-to-lovers fantasy romance perfect for fans of Jennifer L. Armentrout, Raven Kennedy, and Sarah J Maas.\r\n\r\nAfter spending years training to defend my people from our enemies, I never expected that my enemy would be the one keeping me alive.\r\n\r\nAthos is the last human city. A treaty with the Fae keeps the fae, the vampires, and the wolf shifters at bay, while we fight against the dragons at our border. Being a human in this world is dangerous and we all make sacrifices to survive.\r\n\r\nWhen the delegation sent by the Fae King arrives to claim the human tributes required by our treaty, I never expected to forge a connection with their leader.\r\n\r\nRyvin is as dangerous as he is handsome. I know he’s my enemy, and I know I’m supposed to hate him, but with each passing day, he’s more difficult to resist.\r\n\r\nBut things are changing in Athos. Humans no longer want to bend to the Fae King.\r\n\r\nAlliances blur and centuries of lies begin to unravel.\r\n\r\nAnd I’m faced with a choice.\r\n\r\nNo matter how much I hate him, Ryvin might be the key to preventing war.\r\n\r\nBut it may mean sacrificing everything….\r\n\r\nKingdom of Blood and Salt is the first book in a fantasy romance trilogy with fae, vampires, and shifters. This enemies to lovers series contains violence, mature language, and spice. This is a NA/adult fantasy romance and steam level will increase as the series progresses. Mind the cliff.', 'Alexis Calder', 'Magic', '2023-03-30', 2, 0),
(32, 593539583, 'ascension.jpg', 'Ascension', 'A mind-bending speculative thriller in which the sudden appearance of a mountain in the middle of the Pacific Ocean leads a group of scientists to a series of jaw-dropping revelations that challenge the notion of what it means to be human\r\n\r\nAn enormous snow-covered mountain has appeared in the Pacific Ocean. No one knows when exactly it showed up, precisely how big it might be, or how to explain its existence. When Harold Tunmore, a scientist of mysterious phenomena, is contacted by a shadowy organization to help investigate, he has no idea what he is getting into as he and his team set out for the mountain.\r\n\r\nThe higher Harold’s team ascends, the less things make sense. Time moves differently, turning minutes into hours, and hours into days. Amid the whipping cold of higher elevation, the climbers’ limbs numb and memories of their lives before the mountain begin to fade. Paranoia quickly turns to violence among the crew, and slithering, ancient creatures pursue them in the snow. Still, as the dangers increase, the mystery of the mountain compels them to its peak, where they are certain they will find their answers. Have they stumbled upon the greatest scientific discovery known to man or the seeds of their own demise?\r\n\r\nFramed by the discovery of Harold Tunmore’s unsent letters to his family and the chilling and provocative story they tell, Ascension considers the limitations of science and faith and examines both the beautiful and the unsettling sides of human nature.', 'Nicholas Binge', 'Science Fiction', '2007-08-25', 3, 0),
(33, 1496742621, 'grow.jpg', 'Where Ivy Dares to Grow', 'Mexican Gothic meets Outlander in this spellbinding, atmospheric timeslip debut novel, as a woman struggling with her mental health spends the winter with her cruel in-laws in their eerie, haunting manor that sweeps her back through time and into the arms of her fiancé&#039;s mysterious, alluring 19th century ancestor.\r\n\r\nTraveling to be with her fiancé’s terminally ill mother in her last days, Saoirse Read expected her introduction to the family’s ancestral home would be bittersweet. But the stark thrust of Langdon Hall against the cliff and the hundred darkened windows in its battered walls are almost as forbidding as the woman who lies wasting inside. Her fiancé’s parents make no secret of their distaste for Saoirse, and their feelings have long since spread to their son. Or perhaps it is only the shadows of her mind suggesting she’s unwelcome, seizing on her fears while her beloved grieves?\r\n\r\nAs Saoirse takes to wandering the estate’s winding, dreamlike gardens, overgrown and half-wild with neglect, she slips back through time to 1818. There she meets Theo Page, a man like her fiancé but softer, with all the charms of that gentler age, and who clearly harbors a fervent interest in her. As it becomes clear that Theo is her fiancé’s ancestor, and the tenuous peace of Langdon Hall crumbles around her, Saoirse finds she’s no longer sure which dreams and doubts belong to the present—and which might not be dreams at all . . .', 'Marielle Thompson', 'Romance', '1999-01-27', 5, 0);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `cin` int(11) NOT NULL,
  `Image` text NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `num_tel` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id`, `cin`, `Image`, `nom`, `prenom`, `date_naissance`, `adresse`, `num_tel`, `login`, `password`) VALUES
(60, 9178451, 'team-4.jpg', 'dandeni', 'eya', '2002-07-14', 'ben arous', 92003001, 'eyadandeni@gmail.com', '8e19c34eb8939b4bf807da74e5b791c8'),
(61, 9643514, 'team-2.jpg', 'Ben Hlila', 'Cyrine', '2003-01-16', 'Ezzahra', 21360057, 'syrine@gmail.com', 'c50b6c61dba4e03c59018bea39773b0c');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `num_tel` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `Image` text NOT NULL,
  `titre` varchar(50) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `categorie` varchar(50) NOT NULL,
  `date_edition` date NOT NULL,
  `date_reservation` date NOT NULL,
  `etat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `user_id`, `username`, `adresse`, `num_tel`, `ISBN`, `Image`, `titre`, `auteur`, `categorie`, `date_edition`, `date_reservation`, `etat`) VALUES
(11, 0, 'Ben Hlila Cyrine', 'Rades', 52697485, 2147483647, 'cottage.jpg', 'The cottage', 'Lisa Stone', 'Thriller', '2021-11-09', '2023-05-24', 'Refused'),
(13, 0, 'Ben Saleh imed', 'Rades', 52697485, 735211299, 'atomic.jpg', 'Atomic', 'James', 'Education', '2018-10-16', '2023-05-24', 'Accepted'),
(15, 59, 'dandeni eya', 'ben arous', 92003001, 735211299, 'atomic.jpg', 'Atomic', 'James', 'Education', '2018-10-16', '2023-05-24', 'In progress'),
(25, 59, 'dandeni eya', 'ben arous', 92003001, 2147483647, 'lake.jpg', 'The Lake House', 'Sarah Beth Durst', 'Mystery', '2023-04-25', '2023-05-25', 'In progress'),
(35, 61, 'Ben Hlila Cyrine', 'Ezzahra', 21360057, 2147483647, 'cottage.jpg', 'The cottage', 'Lisa Stone', 'Thriller', '2021-11-09', '2023-05-25', 'In progress'),
(37, 61, 'Ben Hlila Cyrine', 'Ezzahra', 21360057, 2147483647, 'kate.jpg', 'Nightbirds', 'Kate J. Armstrong', 'Fantasy', '2023-02-28', '2023-05-25', 'Accepted'),
(39, 61, 'Ben Hlila Cyrine', 'Ezzahra', 21360057, 974810451, 'bewitched.jpg', 'Bewitched', 'Laura Thalassa', 'Magic', '2009-04-18', '2023-05-25', 'Refused'),
(40, 61, 'Ben Hlila Cyrine', 'Ezzahra', 21360057, 2147483647, 'snow.jpg', 'Snow &amp; Poison', 'Melissa Cruz', 'Fantasy', '2023-04-10', '2023-05-25', 'In progress'),
(41, 60, 'dandeni eya', 'ben arous', 92003001, 1250857430, 'divine.jpg', 'Divine Rivals', 'Rebecca Ross', 'Romance', '2023-04-04', '2023-05-25', 'Accepted');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livreq`
--
ALTER TABLE `livreq`
  ADD PRIMARY KEY (`id`,`ISBN`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`,`cin`) USING BTREE;

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `livreq`
--
ALTER TABLE `livreq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
