-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/10/2023 às 00:03
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `acessar`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `login` varchar(6) NOT NULL,
  `senha` varchar(8) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `adm` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nomemae` varchar(80) NOT NULL,
  `datanasc` varchar(12) NOT NULL,
  `email` varchar(80) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `fixo` varchar(30) NOT NULL,
  `sexo` char(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `complemento` varchar(50) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(30) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`login`, `senha`, `nome`, `adm`, `id`, `cpf`, `nomemae`, `datanasc`, `email`, `celular`, `fixo`, `sexo`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `uf`) VALUES
('pedro', 'pedro', 'PEDRO ARTHUR OLIVEIRA MOREIRA DA SILVA', 1, 1, '08824345786', 'NORMA OLIVEIRA DA SILVA', '1981-07-13', 'arthurpedro1981@gmail.com', '21964789318', '2137322732', 'M', '20751200', 'FIGUEIREDO PIMENTEL', '422', 'BL 03 APT 603', 'PIEDADE', 'RIO DE JANEIRO', 'RJ'),
('daniel', 'danielk', 'fgrgewrgfjwegfoi', 0, 41, '111.111.111-11', 'Pedro Arthur Oliveira Moreira Da Silva', '13/08/1981', 'carlos@teste.com', '(21) 96478-9318', '21565666', 'M', '20751200', 'Rua Figueiredo Pimentel', '44', 'DFSDFF', 'Abolição', 'Rio de Janeiro', 'RJ');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
