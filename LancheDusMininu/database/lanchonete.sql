-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/11/2025 às 01:30
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
-- Banco de dados: `lanchonete`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `cod_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero_casa` int(11) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`cod_cliente`, `nome`, `endereco`, `numero_casa`, `telefone`) VALUES
(1, 'teste', 'teste', 123, '18996102559'),
(2, 'teste', 'teste', 123, '18996102559');

-- --------------------------------------------------------

--
-- Estrutura para tabela `composicao`
--

CREATE TABLE `composicao` (
  `cod_prato` int(11) NOT NULL,
  `cod_ingrediente` int(11) NOT NULL,
  `quantidade` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `cod_fornecedor` int(11) NOT NULL,
  `razao_social` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingredientes`
--

CREATE TABLE `ingredientes` (
  `cod_ingrediente` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ingredientes`
--

INSERT INTO `ingredientes` (`cod_ingrediente`, `descricao`, `valor_unitario`) VALUES
(1, 'Teste', 1.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedidos`
--

CREATE TABLE `itens_pedidos` (
  `cod_pedido` int(11) NOT NULL,
  `cod_prato` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itens_pedidos`
--

INSERT INTO `itens_pedidos` (`cod_pedido`, `cod_prato`, `quantidade`, `valor_unitario`) VALUES
(8, 7, 1, 16.90),
(8, 8, 1, 24.90),
(9, 4, 1, 27.90),
(9, 8, 1, 24.90);

-- --------------------------------------------------------

--
-- Estrutura para tabela `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `cod_pedido` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `preco_total` decimal(10,2) NOT NULL,
  `data_pedido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`cod_pedido`, `cod_cliente`, `preco_total`, `data_pedido`) VALUES
(1, 2, 55.80, '2025-11-02 17:18:21'),
(2, 2, 47.80, '2025-11-02 17:20:40'),
(3, 2, 54.70, '2025-11-02 18:01:02'),
(4, 2, 21.90, '2025-11-02 18:05:13'),
(5, 2, 21.90, '2025-11-02 18:05:46'),
(6, 2, 30.90, '2025-11-02 18:10:34'),
(7, 2, 30.90, '2025-11-02 18:15:22'),
(8, 2, 47.80, '2025-11-02 18:16:52'),
(9, 2, 58.80, '2025-11-03 23:19:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pratos`
--

CREATE TABLE `pratos` (
  `cod_prato` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pratos`
--

INSERT INTO `pratos` (`cod_prato`, `imagem`, `titulo`, `descricao`, `valor_unitario`) VALUES
(1, 'assets/img/img-1.png', 'X VGtariano', 'Ovo, Mussarela, Palmito, Tomate Seco, Alface, Rúcula e Tomate no Pão de Hambúrguer', 29.40),
(2, 'assets/img/img-1.png', 'Batata Individual com Molho Cheddar e Farofa de Bacon', '(150Gr Crua) Batata com Molho Cheddar e Farofa de Bacon', 17.50),
(3, 'assets/img/img-1.png', 'Mozza Burger', 'Hambúrguer 200gr, Queijo Mussarela Empanada, Bacon Molho Especial, Pão Brioche', 29.70),
(4, 'assets/img/img-1.png', 'Cheddar Burger', 'Hambúrguer 180gr, Queijo Cheddar, Cebola Caramelizada e Pão Australiano', 27.90),
(5, 'assets/img/img-1.png', 'Combo Familiar', '4 Hambúrgueres + 2 Batatas Grandes + 2 Refrigerantes 2L', 99.90),
(6, 'assets/img/img-1.png', 'Milkshake', 'Milkshake cremoso nos sabores Chocolate, Morango e Ovomaltine', 14.90),
(7, 'assets/img/img-1.png', 'Onion Rings', 'Cebolas empanadas crocantes acompanhadas de molho especial', 16.90),
(8, 'assets/img/img-1.png', 'Smash Burger', 'Duas carnes 100gr prensadas na chapa, queijo e molho da casa', 24.90),
(9, 'assets/img/img-1.png', 'Hot Dog Especial', 'Salsicha dupla, purê, batata palha, queijo e molho especial da casa', 15.90);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('OZZcRunJffqQQWrFP1Yn44aprKP10JePEEuMdF4q', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czoyMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwIjtzOjU6InJvdXRlIjtzOjU6ImluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6InNUSm9DUjFmQUt3VTQ4VnpUNk8yNFRWZVFxQ01neW03TGVCMG1aQWsiO3M6NzoidXN1YXJpbyI7YToyOntzOjExOiJjb2RfdXN1YXJpbyI7aTo0O3M6MTI6Im5vbWVfdXN1YXJpbyI7czo1OiJUZXN0ZSI7fX0=', 1762216179);

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `cod_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nome_usuario`, `nome`, `senha`, `email`) VALUES
(1, 'VISITANTE', 'VISITANTE', '123', 'visitante@gmail.com'),
(3, 'teste 1123', 'Teste nome 123', 'senha123', 'teste@teste.com'),
(4, 'Teste', 'teste completo', 'senha', 'teste@teste.com'),
(5, 'Usuario', 'Nome Usuario Completo', 'senha1234', 'teste@teste.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Índices de tabela `composicao`
--
ALTER TABLE `composicao`
  ADD PRIMARY KEY (`cod_prato`,`cod_ingrediente`),
  ADD KEY `cod_ingrediente` (`cod_ingrediente`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`cod_fornecedor`);

--
-- Índices de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`cod_ingrediente`);

--
-- Índices de tabela `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  ADD PRIMARY KEY (`cod_pedido`,`cod_prato`),
  ADD KEY `cod_prato` (`cod_prato`);

--
-- Índices de tabela `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Índices de tabela `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `cod_cliente` (`cod_cliente`);

--
-- Índices de tabela `pratos`
--
ALTER TABLE `pratos`
  ADD PRIMARY KEY (`cod_prato`);

--
-- Índices de tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `cod_fornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `cod_ingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `cod_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `pratos`
--
ALTER TABLE `pratos`
  MODIFY `cod_prato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `composicao`
--
ALTER TABLE `composicao`
  ADD CONSTRAINT `composicao_ibfk_1` FOREIGN KEY (`cod_prato`) REFERENCES `pratos` (`cod_prato`),
  ADD CONSTRAINT `composicao_ibfk_2` FOREIGN KEY (`cod_ingrediente`) REFERENCES `ingredientes` (`cod_ingrediente`);

--
-- Restrições para tabelas `itens_pedidos`
--
ALTER TABLE `itens_pedidos`
  ADD CONSTRAINT `itens_pedidos_ibfk_1` FOREIGN KEY (`cod_pedido`) REFERENCES `pedidos` (`cod_pedido`),
  ADD CONSTRAINT `itens_pedidos_ibfk_2` FOREIGN KEY (`cod_prato`) REFERENCES `pratos` (`cod_prato`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `clientes` (`cod_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
