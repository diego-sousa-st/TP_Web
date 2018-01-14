-- phpMyAdmin SQL Dump
-- version 4.2.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 02-Ago-2016 às 15:52
-- Versão do servidor: 5.6.17-log

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orientacoes`
--
create database orientacoes;
use orientacoes;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ALUNO`
--

CREATE TABLE IF NOT EXISTS `ALUNO` (
  `Matricula` int(9) unsigned NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cidade` varchar(30) DEFAULT NULL,
  `UF` enum('RJ','MG','ES','SP') DEFAULT NULL,
  `CRA` tinyint(2) DEFAULT NULL,
  `Curso` tinyint(2) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ALUNO`
--

INSERT INTO `ALUNO` (`Matricula`, `Nome`, `Cidade`, `UF`, `CRA`, `Curso`) VALUES
(1, 'Tiago Antônio Paraízo', 'Florestal', 'MG', NULL, 10),
(2, 'Willian Silva', 'Quatis', 'RJ', NULL, 10),
(3, 'Ighor Sousa Maia', 'Campo Belo', 'MG', NULL, 14),
(4, 'Bruno Donizeti da Silva', 'Lavras', 'MG', NULL, 14),
(5, 'Aline Pereira Honorato Rosa', 'Varginha', 'MG', NULL, 1),
(6, 'Carolina Antunes Cardoso Pedroso', 'Delfinópolis', 'MG', NULL, 1),
(7, 'Denise de Fátima Oliveira Gonçalves Lacerda', 'Nova Serrana', 'MG', NULL, 1),
(8, 'Flávia Cristina de Araújo Santos', 'Lavras', 'MG', NULL, 1),
(9, 'Janaína Rocha do Nascimento', 'São João Del Rei', 'MG', NULL, 1),
(10, 'Thiago Almeida Silva', 'Estrela do Indaiá', 'MG', NULL, 1),
(11, 'Ediméia Deolindo Braz Paula', 'Boa Esperança', 'MG', NULL, 1),
(12, 'Mírian Rodrigues da Silva Braga', 'Lavras', 'MG', NULL, 1),
(13, 'Célio Ferreira Santos', 'Tiradentes', 'MG', NULL, 1),
(14, 'Thiago de Carvalho Soares', 'Pouso Alegre', 'MG', NULL, 1),
(15, 'João Paulo Vilela Pereira', NULL, NULL, NULL, 10),
(38314, 'Hermano Lourenço Souza Lustosa', 'Teresópolis', 'RJ', NULL, 2),
(201110716, 'Lucas Otávio Goulart Daquina', 'São José dos Campos', 'SP', 54, 10),
(201110861, 'Gustavo Andrade Penha', 'Varginha', 'MG', 49, 10),
(201111287, 'Igor Gonçalves de Sousa Salvati', 'Juiz de Fora', 'MG', 65, 10),
(201120530, 'Pedro Henrique Ramos Souza', 'Conselheiro Pena', 'MG', 81, 10),
(201210263, 'Gabriela Aparecida Santiago', 'São Tiago', 'MG', NULL, 10),
(201221490, 'Deniscley Marfran Antônio Ferreira', 'Ribeirão Vermelho', 'MG', 62, 10),
(201311125, 'Breno Avelar Guerra', 'Sete Lagoas', 'MG', NULL, 14),
(201320613, 'Gustavo Dimas Franco Freitas', 'Perdões', 'MG', 76, 10),
(201321016, 'Renan Douglas Gatto de Oliveira', 'Itajubá', 'MG', 65, 14),
(201420429, 'Roberto Gonçalves Santos Júnior', 'Belo Horizonte', 'MG', NULL, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `AREA`
--

CREATE TABLE IF NOT EXISTS `AREA` (
`ID` int(10) unsigned NOT NULL,
  `Nome` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `AREA`
--

INSERT INTO `AREA` (`ID`, `Nome`) VALUES
(1, 'Banco de Dados'),
(2, 'Sistemas Distribuídos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `CURSO`
--

CREATE TABLE IF NOT EXISTS `CURSO` (
  `Codigo` tinyint(2) unsigned NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Instituicao` varchar(10) NOT NULL,
  `forma` enum('Presencial','EAD') NOT NULL DEFAULT 'Presencial',
  `Sigla` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `CURSO`
--

INSERT INTO `CURSO` (`Codigo`, `Nome`, `Instituicao`, `forma`, `Sigla`) VALUES
(1, 'Latto Sensu em Uso Educacional da Internet', 'UAB', 'EAD', 'UEI'),
(2, 'Strictu Sensu em Modelagem Computacional', 'LNCC/MCTI', 'Presencial', 'MC'),
(3, 'Bacharelado em Ciência da Computação', 'UNIFESO', 'Presencial', 'BCC'),
(10, 'Bacharelado em Ciência da Computação', 'UFLA', 'Presencial', 'BCC'),
(14, 'Bacharelado em Sistemas de Informação', 'UFLA', 'Presencial', 'BSI');

-- --------------------------------------------------------

--
-- Estrutura da tabela `INSTITUICAO`
--

CREATE TABLE IF NOT EXISTS `INSTITUICAO` (
  `Sigla` varchar(10) NOT NULL,
  `Nome` varchar(45) NOT NULL,
  `Cidade` varchar(30) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `Pais` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `INSTITUICAO`
--

INSERT INTO `INSTITUICAO` (`Sigla`, `Nome`, `Cidade`, `UF`, `Pais`) VALUES
('LNCC/MCTI', 'Laboratório Nacional de Computação Científica', 'Petrópolis', 'RJ', 'Brasil'),
('UAB', 'Universidade Aberta do Brasil', 'Lavras', 'MG', 'Brasil'),
('UFLA', 'Universidade Federal de Lavras', 'Lavras', 'MG', 'Brasil'),
('UFSC', 'Universidade Federal de Santa Catarina', 'Florianópolis', 'SC', 'Brasil'),
('UNIFESO', 'Centro Universitário Serra dos Órgãos', 'Teresópolis', 'RJ', 'Brasil');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ORIENTACAO`
--

CREATE TABLE IF NOT EXISTS `ORIENTACAO` (
`ID` int(10) unsigned NOT NULL,
  `Aluno` int(9) unsigned NOT NULL,
  `Professor` tinyint(3) unsigned NOT NULL,
  `Tipo` enum('TCC','TCC-EST','EST','MONITORIA','IC','TCC-POS') DEFAULT NULL,
  `Tema` varchar(150) DEFAULT NULL,
  `Inicio` year(4) DEFAULT NULL,
  `Fim` year(4) DEFAULT NULL,
  `Cancelado` enum('S') DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ORIENTACAO`
--

INSERT INTO `ORIENTACAO` (`ID`, `Aluno`, `Professor`, `Tipo`, `Tema`, `Inicio`, `Fim`, `Cancelado`) VALUES
(1, 38314, 1, 'IC', 'Uma avaliação do uso do SciDB para o armazenamento de dados gerados por simulações numéricas', 2013, 2014, NULL),
(2, 201111287, 1, 'TCC', 'Um aplicativo para smartphone para apoio à realização descentralizada de teste de avaliação', 2014, 2015, 'S'),
(3, 38314, 2, 'IC', 'Uma avaliação do uso do SciDB para o armazenamento de dados gerados por simulações numéricas', 2013, 2014, NULL),
(4, 1, 1, 'TCC', 'Modelagem e implementação de um banco de dados NoSQL orientado a família de colunas', 2014, 2016, NULL),
(5, 201321016, 1, 'TCC-EST', 'Relatório de estágio supervisionado realizado no Laboratório de Estudos e Projetos em Manejo Florestal - LEMAF - UFLA', 2014, 2016, NULL),
(6, 6, 1, 'TCC-POS', 'O Uso de Recursos Educacionais da Internet na Escola', 2015, 2016, NULL),
(7, 7, 1, 'TCC-POS', 'O Uso do Blog como Ferramenta de Ensino e Aprendizagem', 2015, 2016, NULL),
(8, 8, 1, 'TCC-POS', 'O Uso de Repositórios Educaionais na Prática Docente', 2015, 2016, NULL),
(9, 10, 1, 'TCC-POS', 'Uso de Recursos Interativos da Web para Apoio no Processo Ensino-Aprendizagem de Alunos do Ensino Médio', 2015, 2016, NULL),
(10, 11, 1, 'TCC-POS', 'Tecnologia da Informação na Educação: Inclusão e Desafios', 2015, 2016, NULL),
(11, 12, 1, 'TCC-POS', 'Jogos Digitais Educacionais como Facilitadores do Ensino e Aprendizagem no Ensino Fundamental I', 2015, 2016, NULL),
(12, 201110861, 1, 'TCC-EST', 'Estágio Supervisionado: desenvolvimento de um CMS com ASP.NET e MVC', 2014, NULL, NULL),
(13, 201210263, 1, 'TCC', 'Modelagem e implementação de um banco de dados NoSQL Chave-valor', 2014, NULL, NULL),
(14, 201320613, 1, 'IC', 'Avaliação do uso de sistemas de bancos de dados NoSQL virtualizados', 2016, NULL, NULL),
(15, 201221490, 1, 'TCC', 'Armazenamento de dados gerados por métodos numéricos usando o SciDB', 2016, NULL, NULL),
(16, 201110716, 1, 'TCC', 'Modelagem de bancos de dados Geográficos', 2016, NULL, NULL),
(17, 201120530, 1, 'TCC-EST', 'Estágio Supervisionado no LEMAF/UFLA', 2016, NULL, NULL),
(18, 201420429, 1, 'EST', 'Estágio Supervisionado no LEMAF/UFLA', 2016, NULL, NULL),
(19, 3, 1, 'TCC', 'Modelagem e implementação de um banco de dados orientado a documentos', 2015, NULL, NULL),
(20, 4, 1, 'TCC', 'Modelagem e implementação de um banco de dados orientado a grafos', 2015, NULL, NULL),
(21, 201311125, 1, 'TCC', 'Comparativo entre visualizadores para Sistemas de informação Geograficos', 2016, NULL, NULL),
(22, 5, 1, 'TCC-POS', 'A Inserção Tecnológica na Educação do Campo: Desafios e Vivências', 2015, NULL, NULL),
(23, 9, 1, 'TCC-POS', 'Uma possibilidade de aprendizagem do Xadrez através do Uso Educacional da Internet', 2015, NULL, NULL),
(24, 13, 1, 'TCC-POS', 'O uso do Ciberespaço como apoio às práticas pedagógicas: O Blog como o elo entre professores e alunos pela aprendizagem (A)Efetiva-colaborativa', 2015, NULL, NULL),
(25, 14, 1, 'TCC-POS', 'Uso Educacional do Blog para aplicação da Lei 10.639/03', 2015, NULL, NULL),
(26, 15, 1, 'MONITORIA', 'Monitor da disciplina Banco de Dados I - UFLA', 2016, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `PESQUISA`
--

CREATE TABLE IF NOT EXISTS `PESQUISA` (
  `Professor` tinyint(3) unsigned NOT NULL,
  `Area` int(10) unsigned NOT NULL DEFAULT '0',
  `Linha` varchar(75) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `PESQUISA`
--

INSERT INTO `PESQUISA` (`Professor`, `Area`, `Linha`) VALUES
(1, 1, 'Bancos de dados NoSQL'),
(1, 1, 'Gerenciamento de dados de simulações numéricas'),
(1, 1, 'Implementação de Sistemas Gerenciadores de Bancos de Dados SGBD'),
(1, 1, 'Sistemas de informação Geográfica SIG'),
(1, 1, 'Teoria Relacional'),
(2, 1, 'Banco de dados de Hipóteses'),
(2, 1, 'Bancos de dados científicos'),
(2, 1, 'Gerência e Análise em Big Data'),
(2, 1, 'Otimização de consultas em SGBDs distribuídos'),
(2, 1, 'QEF - Framework para sistema de processamento de dados'),
(2, 1, 'Workflows científicos'),
(3, 1, 'Funções de similaridade e casamento de padrões'),
(3, 1, 'Gerenciamento de dados Web'),
(3, 1, 'Gerenciameto de dados heterogêneos'),
(3, 1, 'Integração de Dados'),
(3, 1, 'XML'),
(4, 1, 'Análise, indexação e recuperação de dados complexos'),
(4, 1, 'Bancos de dados Espacial e Espaçotemporal'),
(4, 1, 'Data Warehouses'),
(4, 1, 'Integração de dados Heterogêneos'),
(4, 1, 'Semântica dos dados'),
(4, 1, 'Sistemas baseados em conhecimento'),
(4, 1, 'Workflows científicos'),
(5, 2, 'Arquitetura de redes de computadores e protocolos de alto-desempenho'),
(5, 2, 'Arquitetura de sistemas distribuídos'),
(5, 2, 'Balanceamento de carga para aplicações em ambientes distribuídos'),
(5, 2, 'Cluster de workstations (e PCs) para aplicações científicas e engenharia'),
(5, 2, 'Computação Paralela e de alto-desempenho'),
(5, 2, 'Internet das coisas'),
(5, 2, 'Redes Wireless'),
(5, 2, 'Sistemas de Cluster e Grid computacionais');

-- --------------------------------------------------------

--
-- Estrutura da tabela `PROFESSOR`
--

CREATE TABLE IF NOT EXISTS `PROFESSOR` (
`ID` tinyint(3) unsigned NOT NULL,
  `Nome` varchar(30) DEFAULT NULL,
  `Instituicao` varchar(10) NOT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Pagina` varchar(150) DEFAULT NULL,
  `Lattes` bigint(16) unsigned zerofill DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `PROFESSOR`
--

INSERT INTO `PROFESSOR` (`ID`, `Nome`, `Instituicao`, `Email`, `Pagina`, `Lattes`) VALUES
(1, 'Ramon Gomes Costa', 'UFLA', 'ramon.costa@dcc.ufla.br', NULL, 0161357943312722),
(2, 'Fábio André Machado Porto', 'LNCC/MCTI', 'fporto@lncc.br', 'http://http://dexl.lncc.br', 6418711808050575),
(3, 'Carina Friedrich Dorneles', 'UFSC', 'dorneles@inf.ufsc.br', 'http://www.inf.ufsc.br/~dorneles', 0378897709136226),
(4, 'Renato Fileto', 'UFSC', 'fileto@inf.ufsc.br', 'http://www.inf.ufsc.br/~fileto', 6405951782839858),
(5, 'Mário Antônio Ribeiro Dantas', 'UFSC', 'mario@inf.ufsc.br', 'http://www.inf.ufsc.br/~mario', 2900995280822495);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ALUNO`
--
ALTER TABLE `ALUNO`
 ADD PRIMARY KEY (`Matricula`);

--
-- Indexes for table `AREA`
--
ALTER TABLE `AREA`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Nome` (`Nome`);

--
-- Indexes for table `CURSO`
--
ALTER TABLE `CURSO`
 ADD PRIMARY KEY (`Codigo`), ADD KEY `Instituicao` (`Instituicao`);

--
-- Indexes for table `INSTITUICAO`
--
ALTER TABLE `INSTITUICAO`
 ADD PRIMARY KEY (`Sigla`);

--
-- Indexes for table `ORIENTACAO`
--
ALTER TABLE `ORIENTACAO`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `Aluno` (`Aluno`,`Professor`,`Tipo`);

--
-- Indexes for table `PESQUISA`
--
ALTER TABLE `PESQUISA`
 ADD PRIMARY KEY (`Professor`,`Area`,`Linha`), ADD KEY `FK_Area` (`Area`);

--
-- Indexes for table `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
 ADD PRIMARY KEY (`ID`), ADD KEY `FK_Instituicao` (`Instituicao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AREA`
--
ALTER TABLE `AREA`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ORIENTACAO`
--
ALTER TABLE `ORIENTACAO`
MODIFY `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
MODIFY `ID` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `CURSO`
--
ALTER TABLE `CURSO`
ADD CONSTRAINT `CURSO_ibfk_1` FOREIGN KEY (`Instituicao`) REFERENCES `INSTITUICAO` (`Sigla`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `PESQUISA`
--
ALTER TABLE `PESQUISA`
ADD CONSTRAINT `FK_Area` FOREIGN KEY (`Area`) REFERENCES `AREA` (`ID`) ON UPDATE CASCADE,
ADD CONSTRAINT `FK_Professor` FOREIGN KEY (`Professor`) REFERENCES `PROFESSOR` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
ADD CONSTRAINT `FK_Instituicao` FOREIGN KEY (`Instituicao`) REFERENCES `INSTITUICAO` (`Sigla`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
