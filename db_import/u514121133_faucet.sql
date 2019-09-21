-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 21/09/2019 às 15:45
-- Versão do servidor: 10.2.23-MariaDB
-- Versão do PHP: 7.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u514121133_faucet`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cotacao`
--

CREATE TABLE `cotacao` (
  `id_cotacao` int(11) NOT NULL,
  `ummhash` varchar(140) NOT NULL,
  `valordogeumhash` varchar(150) NOT NULL,
  `valorumhashdogeshotoshi` varchar(150) NOT NULL,
  `updated_at` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cotacao`
--

INSERT INTO `cotacao` (`id_cotacao`, `ummhash`, `valordogeumhash`, `valorumhashdogeshotoshi`, `updated_at`) VALUES
(1, 'MC4zNDYyNTk3OA==', 'MC4wMDAwMDAzNQ==', 'MzQ=', '2019-09-21 15:16:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `movimentado`
--

CREATE TABLE `movimentado` (
  `id_movimentado` int(11) NOT NULL,
  `data_hora` timestamp NULL DEFAULT current_timestamp(),
  `shatoshi_pago` varchar(45) NOT NULL,
  `id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `movimentado`
--

INSERT INTO `movimentado` (`id_movimentado`, `data_hora`, `shatoshi_pago`, `id_usuarios`) VALUES
(75, '2019-09-19 12:13:38', '34816', 9),
(76, '2019-09-19 12:14:46', '34816', 9),
(77, '2019-09-19 19:02:19', '34816', 9),
(78, '2019-09-20 11:16:25', '34816', 9),
(79, '2019-09-20 11:21:29', '34816', 9),
(80, '2019-09-20 11:24:01', '34816', 9),
(81, '2019-09-20 11:26:07', '34816', 9),
(82, '2019-09-20 11:27:30', '34816', 9),
(83, '2019-09-20 11:28:52', '34816', 9),
(84, '2019-09-20 11:30:28', '34816', 9),
(85, '2019-09-20 11:31:21', '34816', 9),
(86, '2019-09-20 11:32:28', '34816', 9),
(87, '2019-09-20 11:33:20', '34816', 9),
(88, '2019-09-20 11:34:31', '34816', 9),
(89, '2019-09-20 11:35:54', '34816', 9),
(90, '2019-09-20 11:36:27', '34816', 9),
(91, '2019-09-20 11:42:12', '168960', 9),
(92, '2019-09-20 12:13:41', '33792', 9),
(93, '2019-09-20 12:14:33', '34816', 9),
(94, '2019-09-20 12:14:55', '34816', 9),
(95, '2019-09-20 12:16:07', '34816', 9),
(96, '2019-09-20 12:16:59', '34816', 9),
(97, '2019-09-20 12:18:11', '34816', 9),
(98, '2019-09-20 12:19:34', '34816', 9),
(99, '2019-09-20 12:22:26', '34816', 9),
(100, '2019-09-20 12:23:48', '34816', 9),
(101, '2019-09-20 12:24:30', '34816', 9),
(102, '2019-09-20 12:25:52', '34816', 9),
(103, '2019-09-20 12:27:14', '34816', 9),
(104, '2019-09-20 12:27:56', '34816', 9),
(105, '2019-09-20 12:29:09', '34816', 9),
(106, '2019-09-20 12:31:21', '32768', 9),
(107, '2019-09-20 12:33:13', '32768', 9),
(108, '2019-09-20 12:34:15', '32768', 9),
(109, '2019-09-20 12:34:37', '32768', 9),
(110, '2019-09-20 12:36:20', '32768', 9),
(111, '2019-09-20 12:37:54', '33792', 9),
(112, '2019-09-20 12:39:16', '33792', 9),
(113, '2019-09-20 12:40:23', '33792', 9),
(114, '2019-09-20 12:41:35', '33792', 9),
(115, '2019-09-20 12:42:57', '33792', 9),
(116, '2019-09-20 12:44:50', '33792', 9),
(117, '2019-09-20 12:46:13', '33792', 9),
(118, '2019-09-20 12:47:25', '33792', 9),
(119, '2019-09-20 12:49:08', '33792', 9),
(120, '2019-09-20 12:50:10', '33792', 9),
(121, '2019-09-20 12:51:03', '32768', 9),
(122, '2019-09-20 12:53:38', '33792', 9),
(123, '2019-09-20 12:55:31', '33792', 9),
(124, '2019-09-20 12:56:13', '33792', 9),
(125, '2019-09-20 12:57:05', '33792', 9),
(126, '2019-09-20 12:57:42', '33792', 9),
(127, '2019-09-20 12:59:54', '33792', 9),
(128, '2019-09-20 13:00:36', '33792', 9),
(129, '2019-09-20 13:01:18', '33792', 9),
(130, '2019-09-20 13:03:20', '33792', 9),
(131, '2019-09-20 13:04:32', '33792', 9),
(132, '2019-09-20 13:05:25', '33792', 9),
(133, '2019-09-20 13:07:08', '33792', 9),
(134, '2019-09-20 13:08:10', '33792', 9),
(135, '2019-09-20 13:09:54', '33792', 9),
(136, '2019-09-20 13:11:27', '33792', 9),
(137, '2019-09-20 13:13:38', '33792', 9),
(138, '2019-09-20 13:15:00', '33792', 9),
(139, '2019-09-20 13:15:22', '33792', 9),
(140, '2019-09-20 13:17:04', '33792', 9),
(141, '2019-09-20 13:18:06', '33792', 9),
(142, '2019-09-20 13:18:59', '33792', 9),
(143, '2019-09-20 13:20:01', '33792', 9),
(144, '2019-09-20 13:20:53', '33792', 9),
(145, '2019-09-20 13:27:06', '33792', 9),
(146, '2019-09-20 13:27:47', '33792', 9),
(147, '2019-09-20 13:28:19', '33792', 9),
(148, '2019-09-20 13:29:01', '33792', 9),
(149, '2019-09-20 13:29:42', '33792', 9),
(150, '2019-09-20 13:31:05', '33792', 9),
(151, '2019-09-20 13:31:46', '33792', 9),
(152, '2019-09-20 13:33:13', '33792', 9),
(153, '2019-09-20 13:34:35', '33792', 9),
(154, '2019-09-20 13:36:16', '33792', 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `saldo` varchar(150) NOT NULL,
  `id_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `carteira` varchar(255) NOT NULL,
  `comfirmar` varchar(15) DEFAULT NULL,
  `updated_at` varchar(80) DEFAULT NULL,
  `id_user_ref` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `carteira`, `comfirmar`, `updated_at`, `id_user_ref`) VALUES
(9, 'DCMKcQPAzwF7zevqXb6JTENVmum7PyXA4t', 'true', NULL, ''),
(10, 'DQVRaJdB7MepZwryNbiz8KrCJjsGeffsxQ', 'true', NULL, ''),
(11, 'DDqcFGvCnZjQBVW3Ac2qTsJt6bi7AShszU', 'true', NULL, ''),
(12, 'D9W8d5uZ8YzeX3wAgw8EsY1DiFwCTrzhBc', 'true', NULL, ''),
(13, 'DD3fyS3oy5wtGxEgq4U1AAZz9xkFquHLgs', 'true', NULL, ''),
(14, 'DP5T2wrwzUFRfRjRPvpigY5kaUszcJ7dr2', 'true', NULL, '9');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cotacao`
--
ALTER TABLE `cotacao`
  ADD PRIMARY KEY (`id_cotacao`);

--
-- Índices de tabela `movimentado`
--
ALTER TABLE `movimentado`
  ADD PRIMARY KEY (`id_movimentado`,`id_usuarios`),
  ADD KEY `fk_movimentado_usuarios1_idx` (`id_usuarios`);

--
-- Índices de tabela `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`,`id_usuarios`),
  ADD KEY `fk_saldo_usuarios_idx` (`id_usuarios`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD UNIQUE KEY `carteira_UNIQUE` (`carteira`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cotacao`
--
ALTER TABLE `cotacao`
  MODIFY `id_cotacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `movimentado`
--
ALTER TABLE `movimentado`
  MODIFY `id_movimentado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de tabela `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `movimentado`
--
ALTER TABLE `movimentado`
  ADD CONSTRAINT `fk_movimentado_usuarios1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`);

--
-- Restrições para tabelas `saldo`
--
ALTER TABLE `saldo`
  ADD CONSTRAINT `fk_saldo_usuarios` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id_usuarios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
