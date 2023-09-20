-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/09/2023 às 00:04
-- Versão do servidor: 8.0.33
-- Versão do PHP: 8.2.4

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
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `chamado_id` bigint NOT NULL,
  `chamado_hash` varchar(255) DEFAULT NULL,
  `chamado_setor` varchar(255) NOT NULL,
  `chamado_solicitante` varchar(255) NOT NULL,
  `chamado_email_solicitante` varchar(255) NOT NULL,
  `chamado_assunto` varchar(100) NOT NULL,
  `chamado_descricao` varchar(255) NOT NULL,
  `chamado_criado_em` datetime DEFAULT NULL,
  `chamado_status` varchar(100) NOT NULL,
  `usuario_id_fk` bigint DEFAULT NULL,
  `setor_id_fk` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `chamados`
--

INSERT INTO `chamados` (`chamado_id`, `chamado_hash`, `chamado_setor`, `chamado_solicitante`, `chamado_email_solicitante`, `chamado_assunto`, `chamado_descricao`, `chamado_criado_em`, `chamado_status`, `usuario_id_fk`, `setor_id_fk`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Divisão de Arquivo', 'Hall Jordan', 'hall.jordan@detran.com', 'Monitor', 'O monitor está ligado mas não dá imagem', '2023-06-03 09:30:00', 'Fechado', 1, 1),
(2, 'c81e728d9d4c2f636f067f89cc14862c', 'Divisão de Serviços Gerais', 'Half Jones', 'half.jones@detran.com', 'Gabinete fazendo barulho', 'Sempre que ligo o computador, começa a fazer um barulho muito alto vindo dele', '2023-06-03 09:45:00', 'Fechado', 1, 2),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Divisão de Almoxarifado e Patrimônio', 'Nathan Drake', 'nathan.drake@detran.com', 'Sem água no bebedouro', 'Estou com sede e não tem água no bebedouro', '2023-06-03 10:00:00', 'Fechado', 2, 3),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 'Divisão de Protocolo', 'Lara Croft', 'lara.croft@detran.com', 'Computador desligando sozinho', 'O computador sempre desliga sozinho depois de 5 minutos de uso', '2023-06-04 07:30:00', 'Fechado', 2, 4),
(5, 'e4da3b7fbbce2345d7772b0674a318d5', 'Divisão de Almoxarifado e Patrimônio', 'Robert Garcia', 'robert.garcia@detran.com', 'Solicito Token de acesso', 'Preciso do Token de acesso para o sistema de atendimento do Gabinete Administrativo do Almoxarifado', '2023-06-04 07:45:00', 'Fechado', 1, 3),
(6, '1679091c5a880faf6fb5e6087eb1b2dc', 'Divisão Financeira', 'Sonya Blade', 'sonya.blade@detran.com', 'Portal de serviços financeiros fora do ar', 'O portal de serviços do departamento financeiro está caindo e não estamos conseguindo seguir com nossas funções', '2023-06-04 08:30:00', 'Fechado', 2, 6),
(7, '8f14e45fceea167a5a36dedd4bea2543', 'Divisão de Protocolo', 'Mary Jane', 'mary.jane@detran.com', 'Usuário bloqueado', 'Estou tentando acessar o Sistema de Protocolo, mas está aparecendo que meu perfil foi bloqueado', '2023-06-04 08:45:00', 'Fechado', 2, 4),
(8, 'c9f0f895fb98ab9159f51fd0297e236d', 'Divisão de Licitações', 'Johnny Blaze', 'johnny.blaze@detran.com', 'Não estou conseguindo anexar documentos ao DG', 'Estou tentando enviar documentos em pdf para o DG,  mas o sitema está mostrando que não tem documento anexado depois que eu clico em enviar ', '2023-06-04 09:00:00', 'Fechado', 2, 8),
(9, '45c48cce2e2d7fbdea1afc51c7c6ad26', 'Divisão de Contabilidade e Arrecadação', 'Dominic Torreto', 'dominic.torreto@detran.com', 'Outro', 'Meu computador está desligando sozinho depois de 5 minutos de uso. E tem momentos em que ele não liga mais, tenho que esperar 30 minutos para conseguir liga-lo novamente.', '2023-07-11 10:50:58', 'Fechado', 4, 7),
(10, 'd3d9446802a44259755d38e6d163e820', 'Divisão Financeira', 'Albert Wesker', 'albert.wesker@detran.com.br', 'Outro', 'A toda a Divisão Financeira está sem conexão com o sistema de lançamento dos orçamentos.', '2023-07-11 18:16:37', 'Fechado', 4, 6),
(11, '6512bd43d9caa6e02c990b0a82652dca', 'Divisão de Serviços Gerais', 'Jack Rain', 'jack.rain@detran.com', 'Outro', 'Estou com o perfil bloqueado na plataforma de serviços.', '2023-07-12 17:30:40', 'Fechado', 2, 2),
(12, 'c20ad4d76fe97759aa27a0c99bff6710', 'Divisão de Protocolo', 'Clint Barton', 'clint.barton@detran.com', 'Outro', 'O cabo do monitor do computador do atendente está com mal contato, a imagem do monitor fica amarelada e há vezes em que a imagem some como se tivesse desconectado o cabo do monitor voltando apenas se mexer no cabo.', '2023-07-15 10:14:25', 'Fechado', 1, 4),
(13, 'c51ce410c124a10e0db5e4b97fc2af39', 'Divisão de Protocolo', 'Barbara Gordon', 'barbara.gordon@detran.com', 'Outro', 'Solicito adaptador de cabo VGA para HDMI para uso no datashow', '2023-07-15 08:30:12', 'Fechado', 2, 4),
(14, 'aab3238922bcc25a6f606eb525ffdc56', 'Divisão de Protocolo', 'Peter Parker', 'peter.parker@detran.com', 'Outro', 'Solicito a instalação de uma impressora no setor de protocolo.', '2023-07-15 10:15:15', 'Fechado', 2, 4),
(15, '9bf31c7ff062936a96d3c8bd1f8f2ff3', 'Divisão de Fiscalização', 'Leona Heidern', 'leona.heidern', 'Outro', 'Preciso de Token para acesso ao sistemas FisDetran.', '2023-08-10 09:30:10', 'Fechado', 1, 9),
(16, 'c74d97b01eae257e44aa9d5bade97baf', 'Divisão de Serviços Gerais', 'Iara Flor', 'iara.flor@detran.com', 'Internet', 'Toda a divisão está sem internet', '2023-08-11 08:45:13', 'Em atendimento', 1, 2),
(17, '70efdf2ec9b086079795c442636b55fb', 'Divisão de Licitações', 'Barry Burton', 'barry.burton@detran.com', 'Outro', 'Impressora desconectou da rede, não estamos conseguindo reconecta-la novamente.', '2023-08-13 09:12:40', 'Aberto', 1, 8),
(18, '6f4922f45568161a8cdf4ad2299f6d23', 'Divisão Financeira', 'Wallace Gromit', 'wallace.gromit@detran.com', 'Outro', 'Meu perfil de acesso a plataforma de lançamentos está bloqueado.', '2023-08-13 10:44:57', 'Aberto', 2, 6),
(19, '1f0e3dad99908345f7439f8ffabdffc4', 'Divisão de Defesa Prévia', 'Sara Pezzini', 'sara.pezzini@detran.com', 'Internet', 'A divisão está com oscilação na rede desde ontem. ', '2023-08-13 11:37:21', 'Aberto', 2, 10),
(20, '98f13708210194c475687be6106a3b84', 'Divisão de Transporte', 'Ryu Hayabusa', 'ryu.hayabusa@detran.com', 'Outro', 'Preciso de liberação do meu perfil de acesso para a plataforma de solicitação de veiculos.', '2023-08-23 09:31:35', 'Aberto', 1, 5),
(21, '3c59dc048e8850243be8079a5c74d079', 'Divisão de Licitações', 'Leia Organa', 'leia.organa@detran.com', 'Outro', 'Uma das máquinas entregue na semana passada teve curto circuito.', '2023-09-05 11:20:27', 'Em atendimento', 2, 8),
(22, 'b6d767d2f8ed5d21a44b0e5886680cb9', 'Divisão de Protocolo', 'Rebecca Chambers', 'rebecca.chambers@detran.com', 'Outro', 'Solicito Token de acesso ao sistema Detran net.', '2023-09-05 11:42:29', 'Aberto', 2, 4),
(23, '37693cfc748049e45d87b8c7d8b9aacd', 'Divisão de Arquivo', 'Wilson Fisk', 'wilson.fisk@detran.com', 'Internet', 'Dois computadores não estão conectados a internet.', '2023-09-11 08:13:39', 'Aberto', 1, 1),
(24, '1ff1de774005f8da13f42943881c655f', 'Divisão de Almoxarifado e Patrimônio', 'Matt Murdock', 'matt.murdock@detran.com', 'Outro', 'Não estou conseguindo logar no detran net, está aparecendo que meu perfil foi bloqueado. ', '2023-09-12 09:44:54', 'Em atendimento', 4, 3),
(25, '8e296a067a37563370ded05f5a3bf3ec', 'Divisão de Fiscalização', 'Milles Moralez', 'milles.moralez@detran.com', 'Outro', 'Impressora parou de funcionar novamente.', '2023-09-13 08:46:29', 'Aberto', 4, 9),
(26, '4e732ced3463d06de0ca9a15b6153677', 'Divisão de Contabilidade e Arrecadação', 'Gordon Freeman', 'gordon.freeman@detran.com', 'Monitor', 'Meu monitor não está ligando.', '2023-09-14 10:37:09', 'Em atendimento', 2, 7),
(27, '02e74f10e0327ad868d138f2b4fdd6f0', 'Divisão de Serviços Gerais', 'Gwen Stacy', 'gwen.stacy@detran.com', 'Internet', 'A máquina 02 e 07 estão sem internet.', '2023-09-15 08:02:48', 'Aberto', 2, 2),
(28, '33e75ff09dd601bbe69f351039152189', 'Divisão de Arquivo', 'Harry Osborn', 'harry.osborn@detran.com', 'Outro', 'Preciso de Token de acesso para os seguintes servidores: marko.flint, jessica.drew e lana.lang.', '2023-09-15 08:45:15', 'Aberto', 4, 1),
(29, '6ea9ab1baa0efb9e19094440c317e21b', 'Divisão de Defesa Prévia', 'Ivan Drago', 'ivan.drago@detran.com', 'Internet', 'A unidade A e B estão sem acesso a rede.', '2023-09-15 09:26:16', 'Em atendimento', 2, 10),
(30, '34173cb38f07f89ddbebc2ac9128303f', 'Divisão de Almoxarifado e Patrimônio', 'Jéssica Drew', 'jessica.drew@detran.com', 'Outro', 'O meu computador não está mais ligando.', '2023-09-15 10:37:07', 'Aberto', 4, 3),
(31, 'c16a5320fa475530d9583c34fd356ef5', 'Divisão de Contabilidade e Arrecadação', 'Robert Garcia', 'robert.garcia@detran.com', 'Outro', 'Preciso de Token de acesso para o portal ContDetran.', '2023-09-18 08:48:23', 'Aberto', 1, 7),
(32, '6364d3f0f495b6ab9dcf8d3b5c6e0b01', 'Divisão de Protocolo', 'Martha Wayne', 'martha.wayne@detran.com', 'Outro', 'Duas máquinas estão com problema, uma está travando muito e a outra não está ligando', '2023-09-18 08:52:35', 'Finalizado', 1, 4),
(33, '182be0c5cdcd5072bb1864cdee4d3d6e', 'Divisão de Protocolo', 'Scott Summers', 'scott.summers@detran.com', 'Outro', 'Meu perfil do detran.net está bloqueado, minha matricula é 43197-43', '2023-09-18 08:58:10', 'Aberto', NULL, 4),
(34, 'e369853df766fa44e1ed0ff613f563bd', 'Divisão de Fiscalização', 'Jane Foster', 'jane.foster@detran.com', 'Outro', 'A impressora está com papel preso.', '2023-09-19 07:59:30', 'Em atendimento', 4, 9),
(35, '1c383cd30b7c298ab50293adfecb7b18', 'Divisão de Transporte', 'Jean Grey', 'jean.grey@detran.com', 'Internet', 'Algumas máquinas estão sem conexão com a rede.', '2023-09-20 08:02:24', 'Aberto', NULL, 5),
(36, '19ca14e7ea6328a42e0eb13d585e4c22', 'Divisão de Almoxarifado e Patrimônio', 'Oliver Queen', 'oliver.queen@detran.com', 'Outro', 'Preciso da troca de duas máquinas que estão travando e desligando sozinhas', '2023-09-20 08:16:32', 'Em atendimento', 1, 3),
(37, 'a5bfc9e07964f8dddeb95fc584cd965d', 'Divisão de Almoxarifado e Patrimônio', 'Jay Garrick', 'jay.garrick@detran.com', 'Outro', 'Preciso de acesso ao portal do DetranAlmox.', '2023-09-20 08:23:23', 'Aberto', 2, 3),
(38, 'a5771bce93e200c36f7cd9dfd0e5deaa', 'Divisão de Protocolo', 'Victor Von Doom', 'victor.doom@detran.com', 'Outro', 'Preciso de auxilio no cadastro dos novos servidores, pois não tenho acesso ao sistema de cadastro.', '2023-09-20 08:25:36', 'Em atendimento', 4, 4),
(39, 'd67d8ab4f4c10bf22aa353e27879133c', 'Divisão de Defesa Prévia', 'Carl Johnson', 'carl.johnson@detran.com', 'Outro', 'A máquina de batimento de ponto está com a data incorreta.', '2023-09-20 16:45:30', 'Aberto', NULL, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `setores`
--

CREATE TABLE `setores` (
  `setor_id` bigint NOT NULL,
  `setor_nome` varchar(150) NOT NULL,
  `setor_is_ativo` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `setores`
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
(10, 'Divisão de Defesa Prévia', 0),
(11, 'Divisão de Diretoria e Equipe', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` bigint NOT NULL,
  `usuario_nome` varchar(255) NOT NULL,
  `usuario_senha` varchar(255) NOT NULL,
  `usuario_email` varchar(100) NOT NULL,
  `usuario_criado_em` datetime NOT NULL,
  `usuario_is_ativo` tinyint NOT NULL,
  `usuario_is_admin` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_senha`, `usuario_email`, `usuario_criado_em`, `usuario_is_ativo`, `usuario_is_admin`) VALUES
(1, 'Admin', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'admin@detran.com', '2023-06-01 07:30:00', 1, 1),
(2, 'Paulo Henrique', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'paulo.henrique@detran.com', '2023-06-01 07:45:00', 1, 0),
(3, 'Anderson Silva', '$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.', 'anderson.silva@detran.com', '2023-06-01 08:00:00', 0, 0),
(4, 'John Wick', '$2y$10$RfExwjssHYRewG7.xwGcEukVEmlS2xueXkSN3iaAcwUhFqdcrHF0u', 'john.wick@detran.com', '2023-09-11 11:00:23', 1, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`chamado_id`),
  ADD KEY `fk_chamados_usuarios_idx` (`usuario_id_fk`),
  ADD KEY `fk_chamados_setores1_idx` (`setor_id_fk`);

--
-- Índices de tabela `setores`
--
ALTER TABLE `setores`
  ADD PRIMARY KEY (`setor_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `chamado_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `setores`
--
ALTER TABLE `setores`
  MODIFY `setor_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `chamados`
--
ALTER TABLE `chamados`
  ADD CONSTRAINT `fk_chamados_setores1` FOREIGN KEY (`setor_id_fk`) REFERENCES `setores` (`setor_id`),
  ADD CONSTRAINT `fk_chamados_usuarios` FOREIGN KEY (`usuario_id_fk`) REFERENCES `usuarios` (`usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
