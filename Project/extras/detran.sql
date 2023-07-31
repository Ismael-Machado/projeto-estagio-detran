-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 31-Jul-2023 às 16:01
-- Versão do servidor: 8.0.33
-- versão do PHP: 8.0.26

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
-- Estrutura da tabela `chamados`
--

DROP TABLE IF EXISTS `chamados`;
CREATE TABLE IF NOT EXISTS `chamados` (
  `chamado_id` bigint NOT NULL AUTO_INCREMENT,
  `chamado_setor` varchar(255) NOT NULL,
  `chamado_solicitante` varchar(255) NOT NULL,
  `chamado_email_solicitante` varchar(255) NOT NULL,
  `chamado_assunto` varchar(100) NOT NULL,
  `chamado_descricao` varchar(255) NOT NULL,
  `chamado_criado_em` datetime NOT NULL,
  `chamado_status` varchar(100) NOT NULL,
  `usuario_id_fk` bigint NOT NULL,
  `setor_id_fk` bigint NOT NULL,
  PRIMARY KEY (`chamado_id`),
  KEY `fk_chamados_usuarios_idx` (`usuario_id_fk`),
  KEY `fk_chamados_setores1_idx` (`setor_id_fk`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`chamado_id`, `chamado_setor`, `chamado_solicitante`, `chamado_email_solicitante`, `chamado_assunto`, `chamado_descricao`, `chamado_criado_em`, `chamado_status`, `usuario_id_fk`, `setor_id_fk`) VALUES
(1, 'Divisão de Arquivo', 'Hall Jordan', 'hall.jordan@detran.com', 'Monitor', 'O monitor está ligado mas não dá imagem', '2023-06-03 09:30:00', 'Aberto', 1, 1),
(2, 'Divisão de Serviços Gerais', 'Half Jones', 'half.jones@detran.com', 'Gabinete fazendo barulho', 'Sempre que ligo o computador, começa a fazer um barulho muito alto vindo dele', '2023-06-03 09:45:00', 'Aberto', 1, 2),
(3, 'Divisão de Almoxarifado e Patrimônio', 'Nathan Drake', 'nathan.drake@detran.com', 'Sem água no bebedouro', 'Estou com sede e não tem água no bebedouro', '2023-06-03 10:00:00', 'Fechado', 2, 3),
(4, 'Divisão de Protocolo', 'Lara Croft', 'lara.croft@detran.com', 'Computador desligando sozinho', 'O computador sempre desliga sozinho depois de 5 minutos de uso', '2023-06-04 07:30:00', 'Em atendimento', 2, 4),
(5, 'Divisão de Almoxarifado e Patrimônio', 'Robert Garcia', 'robert.garcia@detran.com', 'Solicito Token de acesso', 'Preciso do Token de acesso para o sistema de atendimento do Gabinete Administrativo do Almoxarifado', '2023-06-04 07:45:00', 'Aberto', 1, 3),
(6, 'Divisão Financeira', 'Sonya Blade', 'sonya.blade@detran.com', 'Portal de serviços financeiros fora do ar', 'O portal de serviços do departamento financeiro está caindo e não estamos conseguindo seguir com nossas funções', '2023-06-04 08:30:00', 'Em atendimento', 2, 6),
(7, 'Divisão de Protocolo', 'Mary Jane', 'mary.jane@detran.com', 'Usuário bloqueado', 'Estou tentando acessar o Sistema de Protocolo, mas está aparecendo que meu perfil foi bloqueado', '2023-06-04 08:45:00', 'Aberto', 2, 4),
(8, 'Divisão de Licitações', 'Johnny Blaze', 'johnny.blaze@detran.com', 'Não estou conseguindo anexar documentos ao DG', 'Estou tentando enviar documentos em pdf para o DG,  mas o sitema está mostrando que não tem documento anexado depois que eu clico em enviar ', '2023-06-04 09:00:00', 'Aberto', 2, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

DROP TABLE IF EXISTS `setores`;
CREATE TABLE IF NOT EXISTS `setores` (
  `setor_id` bigint NOT NULL AUTO_INCREMENT,
  `setor_nome` varchar(150) NOT NULL,
  `setor_is_ativo` tinyint NOT NULL,
  PRIMARY KEY (`setor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(9, 'Divisão de Fiscalização', 0),
(10, 'Divisão de Defesa Prévia', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario_id` bigint NOT NULL AUTO_INCREMENT,
  `usuario_nome` varchar(255) NOT NULL,
  `usuario_senha` varchar(255) NOT NULL,
  `usuario_email` varchar(100) NOT NULL,
  `usuario_criado_em` datetime NOT NULL,
  `usuario_is_ativo` tinyint NOT NULL,
  `usuario_is_admin` tinyint NOT NULL,
  PRIMARY KEY (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_senha`, `usuario_email`, `usuario_criado_em`, `usuario_is_ativo`, `usuario_is_admin`) VALUES
(1, 'Admin', 'a', 'admin@detran.com', '2023-06-01 07:30:00', 1, 1),
(2, 'Paulo Henrique', 'a', 'paulo.henrique@detran.com', '2023-06-01 07:45:00', 1, 0),
(3, 'Anderson Silva', 'a', 'anderson.silva@detran.com', '2023-06-01 08:00:00', 0, 0);

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
