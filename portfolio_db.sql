-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2026 at 09:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issuer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` year NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int DEFAULT '0',
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `title`, `issuer`, `year`, `description`, `image`, `sort_order`, `tags`) VALUES
(1, 'Computer Networking Bootcamp', 'Huawei', 2025, 'Learn networking fundamentals, basic network configuration and troubleshooting.', 'assets/sertif-1.png', 1, 'Subnetting,Network Topology,Routing'),
(2, 'Implementation Data Science Course', 'Dicoding', 2026, 'Covered data wrangling, visualization with Pandas & Matplotlib, and basic statistical analysis.', 'assets/sertif-2.png', 2, 'Python,Pandas,Data'),
(3, 'UI/UX Design Fundamentals', 'INFORSA', 2023, 'Explored user research, wireframing, prototyping, and usability testing principles.', 'assets/sertif-3.png', 3, 'Figma,UX,Design');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` int NOT NULL,
  `year` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `year`, `role`, `place`, `sort_order`) VALUES
(1, '2026 - Now', 'Lab Assistant — Analytic & Visualization Data', 'Universitas Mulawarman', 1),
(2, '2026 - Now', 'Secretary —  Desa Energi Berdikari Programs', 'Sobat Bumi Samarinda', 2),
(3, '2025', 'Lab Assistant — Basic Programming', 'Universitas Mulawarman', 3),
(4, '2025', 'Secretary —  Professional Skill Development Department', 'Information System Association', 4);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_extra` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campus` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cert_sub` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_sub` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `name`, `tagline`, `description`, `description_extra`, `email`, `location`, `campus`, `cert_sub`, `contact_sub`) VALUES
(1, 'Nayla Camelia Indraswari', 'Information Systems Undergraduate,  Tech Enthusiast', 'I am an Information Systems student passionate about technology, leadership, and self-development. I enjoy building digital projects and continuously improving my skills.', 'Strong foundation in web development, UI/UX design, and data analysis, with a focus on building functional web solutions, intuitive user interfaces, and data-driven insights.', 'naylacame@gmail.com', 'Samarinda, kalimantan Timur', 'Universitas Mulawarman', 'A collection of courses and programs I\'ve completed to strengthen my technical and analytical skills.', 'I\'m currently open to internship opportunities and freelance projects. Whether you have a question or just want to say hi — my inbox is always open!');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL,
  `sort_order` int DEFAULT '0'
) ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `level`, `sort_order`) VALUES
(1, 'HTML & CSS', 90, 1),
(2, 'Dart', 85, 2),
(3, 'Tableau', 85, 3),
(4, 'Python', 80, 4);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int NOT NULL,
  `label` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `label`, `icon`, `link`, `sort_order`) VALUES
(1, 'GitHub', 'bi-github', 'https://github.com/naylacamelia', 1),
(2, 'LinkedIn', 'bi-linkedin', 'https://www.linkedin.com/in/nayla-camelia-indraswari-0b16ab317', 2),
(3, 'Instagram', 'bi-instagram', 'https://www.instagram.com/naylacamellia/', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
