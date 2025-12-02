-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/12/2025 às 04:23
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `wda_crud`
--
CREATE DATABASE wda_crud;
USE wda_crud;

-- --------------------------------------------------------

--
-- Estrutura para tabela `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cpf_cnpj` varchar(14) NOT NULL,
  `birthdate` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `hood` varchar(100) NOT NULL,
  `zip_code` varchar(8) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `ie` varchar(14) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `customers`
--

INSERT INTO `customers` (`id`, `name`, `cpf_cnpj`, `birthdate`, `address`, `hood`, `zip_code`, `city`, `state`, `phone`, `mobile`, `ie`, `created`, `modified`) VALUES
(3, 'Joaozinho Bueno', '123.456.789-00', '2025-09-02 00:00:00', 'Rua do PHP, 132', 'Internet', '12345678', 'Sorocaba', 'SP', '15 44444444', '15 24252659', '12345678932', '2025-09-20 22:44:59', '2025-09-20 22:44:59'),
(6, 'Doidinho do centro', '56891234802', '1993-12-16 00:00:00', 'Calçada', 'Centro', '18185000', 'Sorocity', 'SP', 'orelhao', 'orelhao tbm', '12345678932', '2025-12-01 18:46:36', '2025-12-01 18:46:36');

-- --------------------------------------------------------

--
-- Estrutura para tabela `motos`
--

CREATE TABLE `motos` (
  `id` int(11) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL,
  `motor` varchar(20) DEFAULT NULL,
  `datacad` datetime DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `motos`
--

INSERT INTO `motos` (`id`, `modelo`, `marca`, `motor`, `datacad`, `foto`) VALUES
(2, 'da Barbie', 'Honda', '400 cavalos', '2025-11-17 18:27:09', 'barbieradical.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `user`, `password`, `foto`, `role`) VALUES
(6, 'Administrador do site', 'admin', '$2y$10$BNMhVO4q/9Q/u6Oue6SK5eTwknwqNef/kaqwhIqFY/tWsPIlEwavq', 'adminpfp.jpg', 'admin'),
(11, 'Matheus Monteiro', 'papaiem2', '$2y$10$mEAXHRznQQR3x6YkRrFVAua2KedVjitg6u.H7.GLrmF2M3nUjYZtO', 'lorax.jpg', 'user'),
(12, 'Amilton Solovi Filho', 'amiltpiraporajumper', '15112008', 'solovi.jpg', 'user'),
(13, 'Iris Ismerim', 'gigiolover', 'ilovegigio', 'aisha.jpg', 'user'),
(14, 'Giovana Alves', 'gigasalles', 'gigasalles', 'afreim.png', 'user'),
(15, 'Leonardo Lago', 'leleodamamae4', 'sabina', 'frog.jpg', 'user');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `motos`
--
ALTER TABLE `motos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `motos`
--
ALTER TABLE `motos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
