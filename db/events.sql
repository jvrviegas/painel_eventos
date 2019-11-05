-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 05-Nov-2019 às 11:52
-- Versão do servidor: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `painel_eventos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speaker` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `place` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `vacancies` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `performed_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workload` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_status` enum('Aberta','Encerrada') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `event_title`, `speaker`, `subject`, `place`, `address`, `start_date`, `end_date`, `vacancies`, `price`, `note`, `image`, `performed_by`, `workload`, `created_at`, `updated_at`, `tipo`, `subscription_status`) VALUES
(3, '1º Seminário de Enfermagem do Coren-MA: O papel do Enfermeiro Responsável Técnico', 'Fiscais do Coren-MA', 'Durante o evento, serão abordados vários assuntos que competem ao Enfermeiro Responsável Técnico durante o exercício de suas atividades na unidade de saúde. O objetivo é aprimorar essas atividades para melhorar o processo de enfermagem e, consequentemente, prestar uma assistência melhor ao paciente.', 'Auditório do Coren-MA', 'Rua Carutapera, nº 3, Jardim Renascença', '2019-10-30', '2019-11-05', 150, NULL, NULL, 'events/October2019/5RsouvWOpzjs4Kez8jGd.jpg', NULL, 10, '2019-10-29 17:40:05', '2019-10-29 17:40:05', 'Seminário', 'Aberta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
