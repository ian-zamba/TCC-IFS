-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Abr-2021 às 01:33
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `mat_aluno` varchar(15) NOT NULL,
  `cpf_aluno` varchar(11) DEFAULT NULL,
  `nome_aluno` varchar(45) DEFAULT NULL,
  `rg_aluno` varchar(9) DEFAULT NULL,
  `cartao_sus` varchar(19) DEFAULT NULL,
  `nascimento` varchar(10) DEFAULT NULL,
  `sexo` char(1) DEFAULT NULL,
  `naturalidade` varchar(20) DEFAULT NULL,
  `endereco_aluno` varchar(50) DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `nome_pai` varchar(45) DEFAULT NULL,
  `cpf_pai` varchar(11) DEFAULT NULL,
  `telefone_pai` varchar(11) DEFAULT NULL,
  `nome_mae` varchar(45) DEFAULT NULL,
  `cpf_mae` varchar(11) DEFAULT NULL,
  `telefone_mae` varchar(11) DEFAULT NULL,
  `bolsa_fam` varchar(16) DEFAULT NULL,
  `status_aluno` enum('matriculado','concluido','transferido','desistente') DEFAULT NULL,
  `est_matric` tinyint(1) NOT NULL,
  `data_trans` varchar(10) DEFAULT NULL,
  `mat_func` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`mat_aluno`),
  KEY `fk_Mat_func` (`mat_func`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_turma`
--

DROP TABLE IF EXISTS `aluno_turma`;
CREATE TABLE IF NOT EXISTS `aluno_turma` (
  `cod_aluno_turma` int(11) NOT NULL AUTO_INCREMENT,
  `portugues` float DEFAULT NULL,
  `geografia` float DEFAULT NULL,
  `historia` float DEFAULT NULL,
  `ciencias` float DEFAULT NULL,
  `matematica` float DEFAULT NULL,
  `ed_fisica` float DEFAULT NULL,
  `artes` float DEFAULT NULL,
  `redacao` float DEFAULT NULL,
  `soc_cultura` float DEFAULT NULL,
  `avaliacao` varchar(2) DEFAULT NULL,
  `situacao` enum('aprovado','reprovado','matriculado') DEFAULT NULL,
  `faltas` int(11) DEFAULT NULL,
  `mat_aluno` varchar(15) DEFAULT NULL,
  `cod_turma` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_aluno_turma`),
  KEY `fk_Mat_aluno` (`mat_aluno`),
  KEY `fk_Cod_turma` (`cod_turma`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `mat_func` varchar(15) NOT NULL,
  `cpf_func` varchar(11) NOT NULL,
  `nome_func` varchar(45) NOT NULL,
  `rg_func` varchar(9) NOT NULL,
  `cargo_func` enum('diretor','professor','coordenador','assistente_administrativo','secretario','outros') NOT NULL,
  `endereco_func` varchar(300) NOT NULL,
  `telefone_func` varchar(11) NOT NULL,
  `email_func` varchar(200) NOT NULL,
  `senha_func` varchar(256) NOT NULL,
  `acesso_func` tinyint(1) NOT NULL,
  `status_func` tinyint(1) NOT NULL,
  PRIMARY KEY (`mat_func`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`mat_func`, `cpf_func`, `nome_func`, `rg_func`, `cargo_func`, `endereco_func`, `telefone_func`, `email_func`, `senha_func`, `acesso_func`, `status_func`) VALUES
('000', 'NÃO APAGAR', 'Sem Professor', '', 'outros', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `cod_turma` int(11) NOT NULL AUTO_INCREMENT,
  `nome_turma` varchar(20) NOT NULL,
  `turno` enum('Matutino','Vespertino') NOT NULL,
  `ano_turma` int(11) NOT NULL,
  `status_turma` int(1) NOT NULL,
  `ch_portugues` int(11) NOT NULL,
  `ch_geografia` int(11) NOT NULL,
  `ch_historia` int(11) NOT NULL,
  `ch_ciencias` int(11) NOT NULL,
  `ch_matematica` int(11) NOT NULL,
  `ch_fisica` int(11) NOT NULL,
  `ch_artes` int(11) NOT NULL,
  `ch_redacao` int(11) NOT NULL,
  `ch_soc_cultura` int(11) NOT NULL,
  `tem_alunosturma` varchar(3) NOT NULL,
  `mat_func` varchar(15) NOT NULL,
  PRIMARY KEY (`cod_turma`),
  KEY `fk_mat_func` (`mat_func`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
