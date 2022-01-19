-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jan-2022 às 16:52
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `w16_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

DROP TABLE IF EXISTS `cidades`;
CREATE TABLE `cidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nome_da_cidade` varchar(255) NOT NULL,
  `latitude` double(20,5) NOT NULL,
  `longitude` double(20,5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome_da_cidade`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Criciúma', 165.16516, 651.65165, '2022-01-19 16:45:52', '2022-01-19 17:01:44'),
(2, 'Tubarão', 121.39011, 168.38821, '2022-01-19 16:45:52', '2022-01-19 16:45:52'),
(4, 'São Paulo', 122.56560, 163.96980, '2022-01-19 16:45:52', '2022-01-19 16:45:52'),
(5, 'Rio de Janeiro', 516.16516, 198.19819, '2022-01-19 16:53:08', '2022-01-19 16:53:08'),
(7, 'Araranguá', 516.51616, 919.81988, '2022-01-19 17:32:38', '2022-01-19 17:32:38');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2022_01_18_181541_create_cidades_table', 1),
(15, '2022_01_18_182138_create_postos_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postos`
--

DROP TABLE IF EXISTS `postos`;
CREATE TABLE `postos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cidade_id` bigint(20) UNSIGNED NOT NULL,
  `reservatorio` int(11) NOT NULL,
  `latitude` double(20,5) NOT NULL,
  `longitude` double(20,5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `postos`
--

INSERT INTO `postos` (`id`, `cidade_id`, `reservatorio`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 1, 50, 111.11111, 111.11111, '2022-01-19 16:45:52', '2022-01-19 17:20:17'),
(2, 2, 20, 746.57301, 145.47761, '2022-01-19 16:45:52', '2022-01-19 16:45:52'),
(3, 4, 9, 222.22222, 0.00000, '2022-01-19 16:45:52', '2022-01-19 17:20:57'),
(4, 2, 30, 198.19819, 819.81981, '2022-01-19 17:15:26', '2022-01-19 17:15:26'),
(6, 4, 50, 198.19819, 519.81981, '2022-01-19 17:32:20', '2022-01-19 17:32:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@teste.com', NULL, '$2y$10$VUlmmGy2fUmjwyTkQ0ico.Lv8pvmJHkFjSOXRq97PpbpgmXTWSHqC', NULL, '2022-01-19 16:45:52', '2022-01-19 17:42:50'),
(2, 'Usuário', 'teste@teste.com', NULL, '$2y$10$MmfT3rNbgMdNCt4FsLzL9uU7kX.n8XSRa2kFpMgq/PWU/NDI/pvxa', NULL, '2022-01-19 17:57:52', '2022-01-19 18:48:46'),
(3, 'Ciclano', 'ciclano@teste.com', NULL, '$2y$10$bfnwSkqs1IoCYG0N0d582eUiioNJevsMori1iLeAMDWBG4CfzSc2a', NULL, '2022-01-19 18:51:16', '2022-01-19 18:51:16');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `postos`
--
ALTER TABLE `postos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postos_cidade_id_foreign` (`cidade_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `postos`
--
ALTER TABLE `postos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `postos`
--
ALTER TABLE `postos`
  ADD CONSTRAINT `postos_cidade_id_foreign` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
