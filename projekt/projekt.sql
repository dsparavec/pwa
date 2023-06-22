-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 23, 2019 at 10:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--
CREATE DATABASE IF NOT EXISTS `projekt` DEFAULT CHARACTER SET utf8 COLLATE utf8_croatian_ci;
USE `projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Maja', 'Majic', 'mmajic', '$2y$10$RlJBLcaHOI1Le3WTsakwU.lEY2qTznFFjCvNoBnM285lOdEMrQa7u', 1),
(3, 'Dominik', 'Sparavec', 'dsparavec', '$2y$10$2tywxEtLDkJaaq8s0YTF6e.eUhqjyRV6qTYTEZAiAxQSGq.LlroM6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sadrzaj` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `sadrzaj`, `slika`, `kategorija`, `arhiva`) VALUES
(6, '23.06.2019', 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur', 'Tincidunt lobortis feugiat vivamus at augue eget arcu dictum varius. Imperdiet proin fermentum leo vel orci porta. Sagittis nisl rhoncus mattis rhoncus. Proin sagittis nisl rhoncus mattis rhoncus. Convallis aenean et tortor at risus viverra adipiscing. Sed odio morbi quis commodo odio aenean sed adipiscing diam. Ipsum dolor sit amet consectetur adipiscing. Mauris rhoncus aenean vel elit. Turpis tincidunt id aliquet risus. Habitant morbi tristique senectus et netus et malesuada fames. Sed sed risus pretium quam vulputate. Dignissim cras tincidunt lobortis feugiat.', 'harald_juhnke.jpg', 'sport', 0),
(7, '23.06.2019', 'Vitae purus faucibus ornare', 'Leo vel orci porta non pulvinar neque', 'Nunc lobortis mattis aliquam faucibus purus in massa tempor. Urna id volutpat lacus laoreet non curabitur. Viverra mauris in aliquam sem fringilla ut morbi. Egestas dui id ornare arcu odio. Mattis enim ut tellus elementum sagittis vitae.', 'klinsmann_junior.jpg', 'kultura', 0),
(8, '23.06.2019', 'Sem integer vitae justo', 'Auctor neque vitae tempus quam pellentesque.', 'Adipiscing diam donec adipiscing tristique risus nec feugiat in fermentum. Bibendum ut tristique et egestas. Vulputate dignissim suspendisse in est ante in. Faucibus nisl tincidunt eget nullam non. Libero volutpat sed cras ornare arcu dui. ', 'mariella_ahrens.jpg', 'kultura', 0),
(9, '23.06.2019', 'Pharetra massa massa ultricies', 'Gravida dictum fusce ut placerat orci.', ' Aliquet bibendum enim facilisis gravida neque convallis a cras. Cursus mattis molestie a iaculis at erat pellentesque adipiscing. Sollicitudin tempor id eu nisl nunc mi ipsum faucibus. In est ante in nibh mauris cursus mattis. ', 'paderborn-coach.jpg', 'sport', 0),
(10, '23.06.2019', 'Gravida dictum fusce', 'Faucibus nisl tincidunt eget nullam non', 'Facilisi etiam dignissim diam quis enim lobortis. Viverra orci sagittis eu volutpat odio facilisis mauris. Vulputate odio ut enim blandit. Nulla aliquet porttitor lacus luctus accumsan tortor posuere.', 'alba-coach.jpg', 'sport', 1),
(11, '23.06.2019', ' Viverra mauris in', 'Auctor neque vitae tempus', 'Habitant morbi tristique senectus et netus et malesuada fames. Orci sagittis eu volutpat odio. Et egestas quis ipsum suspendisse ultrices gravida dictum fusce. ', 'alba-coach.jpg', 'sport', 0),
(12, '23.06.2019', 'Enim ut tellus elementum', 'Pulvinar neque laoreet suspendisse interdum', 'Gravida arcu ac tortor dignissim convallis aenean et. Enim ut tellus elementum sagittis vitae et. Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a. Fringilla urna porttitor rhoncus dolor purus non enim.', 'sachen_mode.jpg', 'kultura', 0),
(13, '23.06.2019', ' Diam vulputate ut pharetra', 'Orci sagittis eu volutpat odio. Et egestas quis', 'Enim ut tellus elementum sagittis vitae et. Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a. Fringilla urna porttitor rhoncus dolor purus non enim. Auctor elit sed vulputate mi sit amet mauris commodo quis.', 'mariella_ahrens.jpg', 'kultura', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
