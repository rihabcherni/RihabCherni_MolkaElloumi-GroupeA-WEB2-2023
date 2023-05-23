-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 17 mai 2023 à 22:15
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
-- Base de données : `student_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`admin_id`, `firstName`, `lastName`, `Email`, `photo`, `password`, `address`, `phone`, `created_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin.png', 'password1', '123 Main St', '23564781', '2023-05-17 16:08:36');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `duration` varchar(70) DEFAULT NULL,
  `nature` varchar(20) DEFAULT NULL,
  `summary` text DEFAULT NULL,
  `number_of_page` int(11) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `duration`, `nature`, `summary`, `number_of_page`, `picture`, `student_id`) VALUES
(1, 'Les Misérables', 'Victor Hugo', '1200 pages', 'Roman historique', 'Le roman suit le destin de plusieurs personnages...', 1200, 'image1.jpg', 1),
(2, 'L\'Étranger', 'Albert Camus', '123 pages', 'Roman philosophique', 'L\'histoire d\'un homme qui est considéré comme étra...', 123, 'image2.jpg', 2),
(3, '1984', 'George Orwell', '328 pages', 'Roman de science-fic', 'Un monde futuriste dystopique où la surveillance d...', 328, 'image3.jpg', 3),
(4, 'Le Comte de Monte-Cr', 'Alexandre Dumas', '1235 pages', 'Roman d\'aventure', 'L\'histoire d\'Edmond Dantès, qui est injustement em...', 1235, 'image4.jpg', 4),
(5, 'Le Petit Prince', 'Antoine de Saint-Exupéry', '96 pages', 'Conte philosophique', 'L\'histoire d\'un jeune prince qui quitte sa planète...', 96, 'image5.jpg', 5);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `category` varchar(40) NOT NULL,
  `student_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id`, `name`, `logo`, `category`, `student_id`) VALUES
(1, 'Club de football', 'image1.jpg', 'Sport', 1),
(2, 'Club de musique', 'image2.jpg', 'Culture', 2),
(3, 'Club de débat', 'image3.jpg', 'Culture', 1),
(4, 'Club de théâtre', 'image4.jpg', 'Culture', 1),
(5, 'Club d\'informatique', 'image5.jpg', 'Science', 3);

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `nature` varchar(20) DEFAULT NULL,
  `domain_study` varchar(20) DEFAULT NULL,
  `level` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`id`, `name`, `nature`, `domain_study`, `level`, `description`, `student_id`) VALUES
(1, 'Introduction to Comp', 'Cours magistral', 'Informatique', 'Première année', 'Un cours d\'introduction à l\'informatique qui couvre les bases des algorithmes et de la programmation.', 1),
(2, 'Microéconomie', 'Cours magistral', 'Économie', 'Deuxième année', 'Un cours sur les concepts fondamentaux de la microéconomie.', 2),
(3, 'Introduction à la ps', 'Cours magistral', 'Psychologie', 'Première année', 'Un cours d\'introduction à la psychologie qui couvre les principes de base de la discipline.', 3),
(4, 'Théorie de la relati', 'Cours magistral', 'Physique', 'Troisième année', 'Un cours sur la théorie de la relativité restreinte.', 4),
(5, 'Marketing Digital', 'Cours en ligne', 'Marketing', 'Master', 'Un cours en ligne sur le marketing digital, y compris les stratégies et les outils utilisés dans le domaine.', 5),
(6, 'Example Course 1', 'Example Nature 1', 'Example Domain 1', 'Première année', 'Example Description 1', 1),
(7, 'Example Course 2', 'Example Nature 2', 'Example Domain 2', 'Example Level 2', 'Example Description 2', 2),
(8, 'Example Course 3', 'Cours magistral', 'Example Domain 3', 'Master', 'Example Description 3', 3),
(9, 'Example Course 4', 'Example Nature 4', 'Example Domain 4', 'Master', 'Example Description 4', 4),
(10, 'Example Course 5', 'Example Nature 5', 'Example Domain 5', 'Première année', 'Example Description 5', 5),
(11, 'Example Course 6', 'Example Nature 6', 'Example Domain 6', 'Troisième année', 'Example Description 6', 1),
(12, 'Example Course 7', 'Example Nature 7', 'Example Domain 7', 'Troisième année', 'Example Description 7', 2),
(13, 'Example Course 8', 'Example Nature 8', 'Example Domain 8', 'Example Level 8', 'Example Description 8', 3),
(14, 'Example Course 9', 'Example Nature 9', 'Example Domain 9', 'Première année', 'Example Description 9', 4),
(15, 'Example Course 10', 'Example Nature 10', 'Example Domain 10', 'Deuxième année', 'Example Description 10', 5),
(16, 'Example Course 11', 'Example Nature 11', 'Example Domain 11', 'Deuxième année', 'Example Description 11', 1),
(18, 'Example Course 13', 'Example Nature 13', 'Example Domain 13', 'Troisième année', 'Example Description 13', 3),
(19, 'Example Course 14', 'Example Nature 14', 'Example Domain 14', 'Troisième année', 'Example Description 14', 4);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `skill` varchar(30) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `skills`
--

INSERT INTO `skills` (`id`, `student_id`, `skill`, `percentage`) VALUES
(1, 1, 'HTML', 100),
(2, 1, 'CSS', 90),
(3, 1, 'JavaScript', 75),
(4, 1, 'PHP', 80),
(5, 1, 'WordPress/CMS', 90),
(6, 2, 'HTML', 95),
(7, 2, 'CSS', 85),
(8, 2, 'JavaScript', 70),
(9, 2, 'PHP', 75),
(10, 2, 'WordPress/CMS', 80),
(11, 3, 'HTML', 85),
(12, 3, 'CSS', 80),
(13, 3, 'JavaScript', 65),
(14, 3, 'PHP', 70),
(15, 3, 'WordPress/CMS', 75),
(16, 4, 'HTML', 90),
(17, 4, 'CSS', 75),
(18, 4, 'JavaScript', 60),
(19, 4, 'PHP', 65),
(20, 4, 'WordPress/CMS', 70);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `phone` varchar(11) NOT NULL,
  `education_level` varchar(30) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`student_id`, `lastName`, `firstName`, `gender`, `Date_of_birth`, `phone`, `education_level`, `Photo`, `password`, `Email`, `address`, `created_at`) VALUES
(1, 'Dupont', 'Jean', 'Male', '1999-01-01', '1234567890', 'Bac+1', 'image1.jpg', 'mdp1', 'jean.dupont@mail.com', '123 Main St', '2023-05-17 16:11:22'),
(2, 'Martin', 'Emma', 'Female', '2000-02-02', '2345678901', 'Bac+2', 'image2.jpg', 'mdp2', 'emma.martin@mail.com', '456 Elm St', '2023-05-17 16:11:22'),
(3, 'Dubois', 'Lucas', 'Male', '1998-03-03', '3456789012', 'Bac+3', 'image3.jpg', 'mdp3', 'lucas.dubois@mail.com', '789 Oak Ave', '2023-05-17 16:11:22'),
(4, 'Durand', 'Manon', 'Female', '1997-04-04', '4567890123', 'Bac+1', 'image4.jpg', 'mdp4', 'manon.durand@mail.com', '321 Pine Ln', '2023-05-17 16:11:22'),
(5, 'Girard', 'Hugo', 'Male', '1996-05-05', '5678901234', 'Bac+2', 'image5.jpg', 'mdp5', 'hugo.girard@mail.com', '654 Cedar Rd', '2023-05-17 16:11:22'),
(54, 'Cherni', 'Rihab', 'Female', '2023-05-11', '25639844', 'College', 'api.jpg', '$2y$10$aaPlJ63CGz.W.08CybxlfeZ3DLk.64yXq.A0gkAzmGfo5KqmC/ANq', 'rihabcherni235@gmail.com', '26 rue ibn sina denden manouba', '2023-05-17 17:55:05');

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `importance` int(11) DEFAULT NULL,
  `nature` varchar(20) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `start_date`, `end_date`, `status`, `importance`, `nature`, `location`, `club_id`, `book_id`, `course_id`) VALUES
(1, 'Préparer une présent', '2023-04-15', '2023-04-23', 'En cours', 4, 'Travail de groupe', 'Salle de réunion B1', 1, NULL, 1),
(2, 'Faire des recherches', '2023-04-10', '2023-04-25', 'En cours', 5, 'Travail individuel', NULL, NULL, 2, NULL),
(3, 'Réviser pour l\'exame', '2023-04-20', '2023-04-23', 'Terminée', 3, 'Travail individuel', 'Bibliothèque universitaire', NULL, 4, NULL),
(4, 'Assister à la réunio', '2023-04-22', '2023-04-22', 'Terminée', 2, 'Réunion de club', 'Salle de réunion A3', 2, NULL, NULL),
(5, 'Rendre le livre empr', '2023-04-25', '2023-04-25', 'En cours', 1, 'Tâche administrative', 'Bibliothèque universitaire', NULL, 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Index pour la table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `phone` (`phone`);
ALTER TABLE `student` ADD FULLTEXT KEY `phone_2` (`phone`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Contraintes pour la table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Contraintes pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
