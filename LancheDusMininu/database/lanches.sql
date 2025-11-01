-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/10/2025 às 01:06
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
-- Banco de dados: `database-web`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `lanches`
--

CREATE TABLE `lanches` (
  `id` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lanches`
--

INSERT INTO `lanches` (`id`, `imagem`, `titulo`, `descricao`, `preco`) VALUES
(1, 'assets/img/img-1.png', 'X VGtariano', 'Ovo, Mussarela, Palmito, Tomate Seco, Alface, Rúcula e Tomate no Pão de Hambúrguer', 29.40),
(2, 'assets/img/img-1.png', 'Batata Individual com Molho Cheddar e Farofa de Bacon', '(150Gr Crua) Batata com Molho Cheddar e Farofa de Bacon', 17.50),
(3, 'assets/img/img-1.png', 'Mozza Burger', 'Hambúrguer 200gr, Queijo Mussarela Empanada, Bacon Molho Especial, Pão Brioche', 29.70),
(4, 'assets/img/img-1.png', 'Cheddar Burger', 'Hambúrguer 180gr, Queijo Cheddar, Cebola Caramelizada e Pão Australiano', 27.90),
(5, 'assets/img/img-1.png', 'Combo Familiar', '4 Hambúrgueres + 2 Batatas Grandes + 2 Refrigerantes 2L', 99.90),
(6, 'assets/img/img-1.png', 'Milkshake', 'Milkshake cremoso nos sabores Chocolate, Morango e Ovomaltine', 14.90),
(7, 'assets/img/img-1.png', 'Onion Rings', 'Cebolas empanadas crocantes acompanhadas de molho especial', 16.90),
(8, 'assets/img/img-1.png', 'Smash Burger', 'Duas carnes 100gr prensadas na chapa, queijo e molho da casa', 24.90),
(9, 'assets/img/img-1.png', 'Hot Dog Especial', 'Salsicha dupla, purê, batata palha, queijo e molho especial da casa', 15.90);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `lanches`
--
ALTER TABLE `lanches`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lanches`
--
ALTER TABLE `lanches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
