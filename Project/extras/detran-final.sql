-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 28-Fev-2024 às 20:06
-- Versão do servidor: 5.7.24
-- versão do PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `detran`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assuntos`
--

CREATE TABLE `assuntos` (
  `assunto_id` int(11) NOT NULL,
  `assunto_nome` varchar(255) NOT NULL,
  `assunto_is_ativo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `assuntos`
--

INSERT INTO `assuntos` (`assunto_id`, `assunto_nome`, `assunto_is_ativo`) VALUES
(1, 'Monitor', 1),
(2, 'Internet', 1),
(3, 'Sei', 1),
(4, 'Mouse ou teclado', 1),
(5, 'Outro', 1),
(6, 'Mouse ou teclado', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE `chamados` (
  `chamado_id` bigint(20) NOT NULL,
  `chamado_setor` varchar(255) NOT NULL,
  `chamado_solicitante` varchar(255) NOT NULL,
  `chamado_email_solicitante` varchar(255) NOT NULL,
  `chamado_assunto` varchar(100) NOT NULL,
  `chamado_descricao` varchar(255) NOT NULL,
  `chamado_criado_em` datetime NOT NULL,
  `chamado_status` varchar(100) NOT NULL,
  `chamado_token` varchar(35) NOT NULL,
  `usuario_id_fk` bigint(20) DEFAULT NULL,
  `setor_id_fk` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`chamado_id`, `chamado_setor`, `chamado_solicitante`, `chamado_email_solicitante`, `chamado_assunto`, `chamado_descricao`, `chamado_criado_em`, `chamado_status`, `chamado_token`, `usuario_id_fk`, `setor_id_fk`) VALUES
(1, 'Divisão de Arquivo', 'Hall Jordan', 'hall.jordan@detran.com', 'Monitor', 'O monitor está ligado mas não dá imagem', '2023-06-03 09:30:00', 'Aberto', '', 1, 1),
(2, 'Divisão de Serviços Gerais', 'Half Jones', 'half.jones@detran.com', 'Gabinete fazendo barulho', 'Sempre que ligo o computador, começa a fazer um barulho muito alto vindo dele', '2023-06-03 09:45:00', 'Aberto', '', 1, 2),
(30, 'Divisão de Fiscalização', 'Ismael', 'teste@teste', 'Sei não', 'Eita ferro', '2023-09-04 15:53:33', 'Finalizado', '', 2, 9),
(31, 'Divisão de Transporte', 'Ismael', 'ismael@detran.gov.br', 'Monitor', 'teste teste', '2023-09-04 17:00:01', 'Finalizado', '', 2, 5),
(32, 'Divisão Financeira', 'Ismael', 'ismael@detran.gov.br', 'Monitor', 'nada dinha ', '2023-09-04 17:13:28', 'Finalizado', '', 1, 6),
(33, 'Divisão de Arquivo', 'Ismael', 'ismael@detran.gov.br', 'Internet', 'minha nossa', '2023-09-04 17:18:12', 'Finalizado', '', 3, 1),
(34, 'Divisão Financeira', 'Ismael', 'ismael@detran.gov.br', 'Monitor', 'teste', '2023-09-04 17:21:38', 'Finalizado', '', 2, 6),
(35, 'Divisão de Protocolo', 'teste', 'teste@teste', 'Monitor', 'Eita ferro', '2023-09-14 09:39:32', 'Finalizado', '', 3, 4),
(36, 'Divisão de Serviços Gerais', 'teste', 'aaaaaa', 'Internet', 'minha nossa', '2023-09-14 11:22:42', 'Finalizado', '', 3, 2),
(37, 'Divisão de Arquivo', 'tes', 'teste@teste.com', 'Internet', 'teste teste', '2023-09-14 13:45:16', 'Em atendimento', '', 3, 1),
(38, 'Divisão de Serviços Gerais', 'teste', 'teste@teste', 'Monitor', 'teste teste', '2023-09-29 13:15:27', 'Em atendimento', '', 5, 2),
(39, 'Divisão de Protocolo', 'Ismael', '1', 'Internet', 'Eita ferro', '2023-09-29 13:18:39', 'Finalizado', '', 2, 4),
(40, 'Divisão de Protocolo', 'teste', 'teste@teste', 'Monitor', 'teste teste', '2023-12-06 10:56:23', 'Em atendimento', '', 1, 4),
(41, 'Divisão de Serviços Gerais', 'teste', 'teste@teste', 'Monitor', 'fafsafaea efaa fasc ', '2023-12-08 15:26:42', 'Em atendimento', '', 4, 2),
(42, 'Divisão de Serviços Gerais', 'Ismael', 'aaaaaa', 'Outro', 'Eita ferro', '2023-12-08 15:28:34', 'Finalizado', '', 2, 2),
(43, 'Divisão de Arquivo', 'teste', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-13 11:46:30', 'Finalizado', '', 3, 1),
(44, 'Divisão de Serviços Gerais', 'Ismael', 'teste@teste.com', '2', 'teste teste', '2023-12-13 11:55:14', 'Finalizado', '', 1, 2),
(45, 'Sei ', 'Ismael', 'teste@teste', '3', 'teste teste', '2023-12-13 11:56:18', 'Em atendimento', '', 3, 5),
(46, 'Divisão de Almoxarifado e Patrimônio', 'aaaaaa', 'aaaaaa', '5', 'teste teste', '2023-12-14 11:42:34', 'Em atendimento', '', NULL, 3),
(47, 'Sei ', 'teste', 'teste@teste', '3', 'teste teste', '2023-12-14 11:53:12', 'Finalizado', '', 4, 1),
(48, 'Divisão de Serviços Gerais', 'teste', 'teste@teste', 'Pei', 'papa lima', '2023-12-14 12:01:03', 'Finalizado', '', 4, 2),
(49, 'Divisão de Serviços Gerais', '', 'aaaaaa', 'Internet', 'teste teste', '2023-12-18 13:45:01', 'Em atendimento', '', NULL, 2),
(50, 'Divisão de Serviços Gerais', '', 'teste@teste', 'Internet', 'teste teste', '2023-12-20 11:20:28', 'Finalizado', '', 2, 2),
(51, 'Divisão de Protocolo', 'teste2', 'ismael@detran.gov.br', 'Monitor', '', '2023-12-20 12:08:37', 'Finalizado', '', 4, 4),
(52, 'Divisão de Almoxarifado e Patrimônio', 'teste', 'teste@teste.com', 'Sei', 'Eita ferro', '2023-12-26 13:47:52', 'Finalizado', '', 6, 3),
(53, 'Divisão de Serviços Gerais', 'teste', 'teste@teste.com', 'Sei', '', '2023-12-26 14:03:45', 'Finalizado', '', 6, 2),
(54, 'Divisão de Transporte', 'Ismael', 'ismael@detran.gov.br', 'Sei', 'teste teste', '2023-12-27 10:47:44', 'Finalizado', '', 6, 5),
(55, 'Divisão de Arquivo', 'teste', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-27 10:50:11', 'Finalizado', '', 6, 1),
(56, 'Divisão de Contabilidade e Arrecadação', 'teste', 'ismael@detran.gov.br', 'Internet', 'Eita ferro', '2023-12-27 10:56:31', 'Em atendimento', '', 4, 7),
(57, 'Divisão de Serviços Gerais', 'teste', 'ismael@detran.gov.br', 'Sei', 'teste teste', '2023-12-27 13:00:13', 'Em atendimento', '', 8, 2),
(58, 'Divisão de Arquivo', 'aaaaaa', 'teste@teste.com', 'Sei', 'teste teste', '2023-12-29 12:14:54', 'Aberto', '', NULL, 1),
(59, 'Divisão de Transporte', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:15:43', 'Aberto', '', NULL, 5),
(60, 'Divisão de Transporte', 'teste', 'teste@teste.com', 'Internet', 'Eita ferro', '2023-12-29 12:19:43', 'Aberto', '', NULL, 5),
(61, 'Divisão de Transporte', 'teste', 'teste@teste.com', 'Internet', 'Eita ferro', '2023-12-29 12:21:29', 'Aberto', '', NULL, 5),
(62, 'Divisão de Transporte', 'teste', 'teste@teste.com', 'Internet', 'Eita ferro', '2023-12-29 12:21:41', 'Aberto', '', NULL, 5),
(63, 'Divisão de Transporte', 'teste', 'teste@teste.com', 'Internet', 'Eita ferro', '2023-12-29 12:21:54', 'Em atendimento', '', 6, 5),
(64, 'Divisão de Protocolo', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:22:36', 'Aberto', '', NULL, 4),
(65, 'Divisão de Protocolo', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:23:38', 'Aberto', '', NULL, 4),
(66, 'Divisão de Protocolo', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:23:52', 'Aberto', '', NULL, 4),
(67, 'Divisão de Protocolo', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:24:04', 'Aberto', '', NULL, 4),
(68, 'Divisão de Protocolo', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:24:16', 'Aberto', '', NULL, 4),
(69, 'Divisão de Protocolo', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:24:58', 'Aberto', '', NULL, 4),
(70, 'Divisão de Protocolo', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:26:57', 'Aberto', '', NULL, 4),
(71, 'Divisão de Serviços Gerais', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:31:04', 'Aberto', '', NULL, 2),
(72, 'Divisão de Serviços Gerais', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:34:37', 'Aberto', '', NULL, 2),
(73, 'Divisão de Serviços Gerais', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:35:22', 'Aberto', '', NULL, 2),
(74, 'Divisão de Serviços Gerais', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:36:54', 'Aberto', '', NULL, 2),
(75, 'Divisão de Serviços Gerais', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:37:54', 'Aberto', '', NULL, 2),
(76, 'Divisão de Serviços Gerais', 'Ismael', 'teste@teste.com', 'Internet', 'teste teste', '2023-12-29 12:38:20', 'Aberto', '', NULL, 2),
(77, 'Divisão de Serviços Gerais', 'teste', 'teste@teste.com', 'Internet', 'Eita ferro', '2023-12-29 13:12:36', 'Aberto', '22A9DCPYGB', NULL, 2),
(78, 'Divisão de Serviços Gerais', 'Ismael', 'teste@teste.com', 'Internet', 'Eita ferro', '2023-12-29 13:20:22', 'Aberto', 'R8FHMUVQVX', NULL, 2),
(79, 'Divisão de Transporte', 'Ismael', 'teste@teste.com', 'Mouse ou teclado', 'Eita ferro', '2023-12-29 13:22:36', 'Aberto', 'X9FGGB6TCK', NULL, 5),
(80, 'Divisão de Transporte', 'Ismael', 'teste@teste.com', 'Mouse ou teclado', 'Eita ferro', '2023-12-29 13:28:48', 'Aberto', '5WEAMP67OC', NULL, 5),
(81, 'Divisão de Coleta', 'aaaaaa', 'teste@teste.com', 'Monitor', 'teste teste', '2023-12-29 13:31:55', 'Aberto', 'X3IR4LVPA0', NULL, 12),
(82, 'Divisão de Protocolo', 'teste', 'teste@teste.com', 'Internet', 'teste teste', '2024-02-28 14:26:43', 'Finalizado', 'VB04FEQGO4', 2, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE `setores` (
  `setor_id` bigint(20) NOT NULL,
  `setor_nome` varchar(150) NOT NULL,
  `setor_is_ativo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`setor_id`, `setor_nome`, `setor_is_ativo`) VALUES
(1, 'Divisão de Arquivo', 1),
(2, 'Divisão de Serviços Gerais', 1),
(3, 'Divisão de Almoxarifado e Patrimônio', 1),
(4, 'Divisão de Protocolo', 1),
(5, 'Divisão de Transporte', 1),
(6, 'Divisão Financeira', 1),
(7, 'Divisão de Contabilidade e Arrecadação', 1),
(8, 'Divisão de Licitações', 1),
(9, 'Divisão de Fiscalização', 1),
(10, 'Divisão de Defesa Prévia', 0),
(11, 'Divisão de Coleta', 1),
(12, 'Divisão de Coleta', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` bigint(20) NOT NULL,
  `usuario_nome` varchar(255) NOT NULL,
  `usuario_senha` varchar(255) NOT NULL,
  `usuario_email` varchar(100) NOT NULL,
  `usuario_criado_em` datetime NOT NULL,
  `usuario_is_ativo` tinyint(4) NOT NULL,
  `usuario_is_admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_senha`, `usuario_email`, `usuario_criado_em`, `usuario_is_ativo`, `usuario_is_admin`) VALUES
(1, 'Paulinho', '$2y$10$5hO7Fyw6Xx6XP4nqcMQm7.6jfZr4Zou72.Nw5x8NUZRNqvk8XEwuy', 'paulinho@ac.gov.br', '2023-12-26 00:00:00', 1, 1),
(2, 'Admin', '$2y$10$A4uplFhY0sR5i7F2ZXyNiePCrolAs9k.4BH2BjHcIuZLisDSvIZyu', 'admin@detran.com', '2023-06-01 07:30:00', 1, 1),
(3, 'Paulo Henrique', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'paulo.henrique@detran.com', '2023-06-01 07:45:00', 1, 0),
(4, 'Anderson Silva', '$2y$10$cIbgI.arAjpr9TZ5QxbG.um.Eb33qOBL9R9Gf/sZqr4W4TVLorCdG', 'anderson.silva@detran.com.br', '2023-06-01 08:00:00', 1, 0),
(5, 'Marcelo', '$2y$10$igfcw6tk6jGOGGp6A2ekeOwg2sMO3srORoFX3cvSytgBVnyngm1Rq', 'marcelo@detran.gov.br', '2023-12-26 12:00:07', 1, 1),
(6, 'Marcelo', '$2y$10$G47vTP//yOn7rXlzDCEbB.OlD2dHQuGMMkP9MDopQi.NI5WS11nC6', 'marcelo@ac.gov.br', '2023-12-21 12:21:09', 1, 0),
(7, 'teste', '$2y$10$7ijzRTUmvvLppqKxtzqUeuelGIOd2GbxCQtojiVc3i7lei/HWcJXa', 'teste@email.com', '2023-12-26 13:39:58', 0, 0),
(8, 'Marcelo', '$2y$10$wiBVj8mIV5LxYj92PGXuNOICeSMH5AFeus60Auf6uhltgqyNujG46', 'marcelo@ac.gov.br', '2023-12-25 13:47:24', 1, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assuntos`
--
ALTER TABLE `assuntos`
  ADD PRIMARY KEY (`assunto_id`);

--
-- Índices para tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`chamado_id`),
  ADD KEY `fk_chamados_usuarios_idx` (`usuario_id_fk`),
  ADD KEY `fk_chamados_setores1_idx` (`setor_id_fk`);

--
-- Índices para tabela `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`setor_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assuntos`
--
ALTER TABLE `assuntos`
  MODIFY `assunto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `chamado_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de tabela `setores`
--
ALTER TABLE `setores`
  MODIFY `setor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `chamados`
--
ALTER TABLE `chamados`
  ADD CONSTRAINT `fk_chamados_setores1` FOREIGN KEY (`setor_id_fk`) REFERENCES `setores` (`setor_id`),
  ADD CONSTRAINT `fk_chamados_usuarios` FOREIGN KEY (`usuario_id_fk`) REFERENCES `usuarios` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
