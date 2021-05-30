-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Maio-2021 às 20:48
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_aplicacao_web`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fisioterapeuta`
--

CREATE TABLE `fisioterapeuta` (
  `idFisioterapeutas` int(11) NOT NULL,
  `nome_fisioterapeutas` varchar(100) NOT NULL,
  `email_fisio` varchar(100) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fisioterapeuta`
--

INSERT INTO `fisioterapeuta` (`idFisioterapeutas`, `nome_fisioterapeutas`, `email_fisio`, `created`) VALUES
(1, 'Mariela F. L. da Cruz', 'mariela.cruz@gmail.com', '2021-05-19 21:45:16'),
(2, 'Vânia Silva', 'vania.s@gmail.com', '2021-05-20 22:28:39'),
(3, 'Barbara Souza', 'barbarasouza@hotmail.com', '2021-05-20 22:32:01'),
(4, 'Carolina Oliveira', 'carol_oliveira@gmail.com', '2021-05-20 22:35:04'),
(5, 'Marjorie da Silva', 'marjorie_silva@hotmail.com', '2021-05-23 21:41:52');

-- --------------------------------------------------------

--
-- Estrutura da tabela `horarioatendimento`
--

CREATE TABLE `horarioatendimento` (
  `idhorario` int(11) NOT NULL,
  `duracao` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `horarioatendimento`
--

INSERT INTO `horarioatendimento` (`idhorario`, `duracao`) VALUES
(1, '00:30:00'),
(2, '00:45:00'),
(3, '01:00:00'),
(4, '01:30:00'),
(5, '02:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `nome_paciente` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `nome_paciente`) VALUES
(1, 'João da Silva'),
(2, 'Antônio do Santos'),
(3, 'Rodrigo Cardozo'),
(4, 'Diego Cruz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `idProcedimento` int(10) NOT NULL,
  `nome_procedimento` varchar(100) NOT NULL,
  `valor_procedimento` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `procedimento`
--

INSERT INTO `procedimento` (`idProcedimento`, `nome_procedimento`, `valor_procedimento`) VALUES
(1, 'Medek', 90),
(2, 'Pedia', 60),
(3, 'Bobath', 30),
(4, 'Respiratória', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registroatendimento`
--

CREATE TABLE `registroatendimento` (
  `idreg` int(5) NOT NULL,
  `nmfisioterapeura` varchar(120) NOT NULL,
  `nmpaciente` varchar(120) NOT NULL,
  `dtatendimento` date NOT NULL,
  `dtduracao` time NOT NULL,
  `dsprocedimento` varchar(240) NOT NULL,
  `vlreceber` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `registroatendimento`
--

INSERT INTO `registroatendimento` (`idreg`, `nmfisioterapeura`, `nmpaciente`, `dtatendimento`, `dtduracao`, `dsprocedimento`, `vlreceber`) VALUES
(1, 'Rodrigo Cardozo', 'Gabriel Borges', '2021-04-08', '02:00:00', 'Estesiometria', 84),
(2, 'Diego Cruz', 'Gabriel Borges', '2021-04-08', '00:40:00', 'Pico de Fluxo de Tosse', 11.2),
(0, 'Mariela F. L. da Cruz', 'João da Silva', '2021-05-24', '00:00:00', 'Medek', 0),
(0, 'Mariela F. L. da Cruz', 'João da Silva', '2021-05-24', '00:00:00', 'Medek', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `terapeutas`
--

CREATE TABLE `terapeutas` (
  `idterapeuta` int(11) NOT NULL,
  `nome_terapeuta` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `terapeutas`
--

INSERT INTO `terapeutas` (`idterapeuta`, `nome_terapeuta`) VALUES
(1, 'Mariela'),
(2, 'Vania'),
(3, 'Carol'),
(4, 'Marjorie'),
(5, 'Barbara'),
(6, 'Maiara');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome_usuario` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `senha` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome_usuario`, `email`, `usuario`, `senha`) VALUES
(1, 'Diego Michel da Cruz', 'diego.cruz@gmail.com', 'diego.cruz@gmail.com', '$2y$10$4Hsy31F6/jpOZsyMHa3XAeVcVDxHxX1VEOnVi9ITkYxgSBbt0M9GK');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fisioterapeuta`
--
ALTER TABLE `fisioterapeuta`
  ADD PRIMARY KEY (`idFisioterapeutas`);

--
-- Índices para tabela `horarioatendimento`
--
ALTER TABLE `horarioatendimento`
  ADD PRIMARY KEY (`idhorario`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`);

--
-- Índices para tabela `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`idProcedimento`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fisioterapeuta`
--
ALTER TABLE `fisioterapeuta`
  MODIFY `idFisioterapeutas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `horarioatendimento`
--
ALTER TABLE `horarioatendimento`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `idProcedimento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
