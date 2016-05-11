-- phpMyAdmin SQL Dump
-- version 4.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2016 at 07:27 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamsterhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ancestors` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `depth` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `state` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `thread_id`, `author_id`, `body`, `ancestors`, `depth`, `created_at`, `state`) VALUES
(1, 2, 2, 'Je devrais y jouer, à ce qu\'il paraît je ne suis plus humain, je suis performant tel une machine au boulot !', '', 0, '2016-05-11 07:24:34', 0),
(2, 2, 1, 'Euh oui c\'est bien qu\'au boulot alors ...', '1', 1, '2016-05-11 07:25:16', 0),
(3, 6, 1, 'On met ça à fond à Vizapp !!', '', 0, '2016-05-11 07:25:35', 0),
(4, 6, 2, 'Non, écouteurs sinon jte défonce', '3', 1, '2016-05-11 07:25:59', 0),
(5, 4, 2, 'J\'ai vu toutes ses vidéos :)', '', 0, '2016-05-11 07:26:20', 0),
(6, 5, 2, '"J\'ai 24 ans je fais ce que je veux ..."', '', 0, '2016-05-11 07:26:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL,
  `birthdate` date NOT NULL,
  `image_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`, `birthdate`, `image_name`, `updated_at`) VALUES
(1, 'romain', 'romain', 'romain@sup.fr', 'romain@sup.fr', 1, 'tt6cqtfufbk848wk4gsw00kkkgsosos', '$2y$13$tt6cqtfufbk848wk4gsw0uljTtpPvWfqxryYDjeR3ZkMmTla.4Q6i', '2016-05-11 07:24:47', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '2006-01-01', NULL, NULL),
(2, 'clement', 'clement', 'clement@sup.fr', 'clement@sup.fr', 1, 'ijztp1f8xi8gwsco00s4csos8k4w0wo', '$2y$13$ijztp1f8xi8gwsco00s4ce1zw7pAkdXVk90wEL96tq8gbFRLzIs5y', '2016-05-11 07:25:45', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL, '1916-01-01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `id` int(11) NOT NULL,
  `permalink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_commentable` tinyint(1) NOT NULL,
  `num_comments` int(11) NOT NULL,
  `last_comment_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `permalink`, `is_commentable`, `num_comments`, `last_comment_at`) VALUES
(2, 'http://localhost:8000/watch/2', 1, 2, '2016-05-11 07:25:16'),
(4, 'http://localhost:8000/watch/4', 1, 1, '2016-05-11 07:26:20'),
(5, 'http://localhost:8000/watch/5', 1, 1, '2016-05-11 07:26:39'),
(6, 'http://localhost:8000/watch/6', 1, 2, '2016-05-11 07:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `author_id`, `url`, `title`, `description`, `upload_date`) VALUES
(1, 1, 'https://www.youtube.com/watch?v=qOb5u5PfMlc', 'De l\'eau', 'A voir ! Ca va vous rappeler des souvenirs', '2016-05-11 07:19:26'),
(2, 1, 'https://www.youtube.com/watch?v=UZQaZRzX0aY', 'Impossible', 'Ce n\'est plus des êtres humains désormais, c\'est des machines ...', '2016-05-11 07:20:41'),
(3, 2, 'https://www.youtube.com/watch?v=wTcNtgA6gHs', 'GoPro en 4K', 'J\'ai la fibre chez moi enfin ! Je peux enfin 4kter !!!', '2016-05-11 07:21:50'),
(4, 2, 'https://www.youtube.com/watch?v=pUmzk2NKkk4', 'Millionnaire', 'Il a du talent le petit en After Effects damnnnn', '2016-05-11 07:22:17'),
(5, 2, 'https://www.youtube.com/watch?v=sowBHnhu5Dg', 'McWalter', 'Qu\'est-ce que j\'ai ri, la suite vite j\'en peux plus ...', '2016-05-11 07:22:55'),
(6, 2, 'https://www.youtube.com/watch?v=J2X5mJ3HDYE', 'Deaf Kev', 'Pour se motiver.', '2016-05-11 07:23:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9474526CE2904019` (`thread_id`),
  ADD KEY `IDX_9474526CF675F31B` (`author_id`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7CC7DA2CF675F31B` (`author_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_9474526CE2904019` FOREIGN KEY (`thread_id`) REFERENCES `thread` (`id`),
  ADD CONSTRAINT `FK_9474526CF675F31B` FOREIGN KEY (`author_id`) REFERENCES `fos_user` (`id`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_7CC7DA2CF675F31B` FOREIGN KEY (`author_id`) REFERENCES `fos_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
