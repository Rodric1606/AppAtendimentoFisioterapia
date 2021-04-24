-- Banco de dados: `projeto_aplicacao_web`
--

-- --------------------------------------------------------
Estrutura da tabela `usuarios`
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
(1, 'Diego', 'diegocruz@gmail.com', 'diegocruz@gmail.com', '$2y$10$S4DQk5iIiGsY8VLPA8OCR.Rdw5YrNYBOkNeRhF16bb8yTv1UofzoC'),
(5, 'Rodrigo Cardozo', 'rodrigocardozo@gmail.com', 'rodrigocardozo@gmail.com', '$2y$10$XqwfnpV4Ys0RkPE3cgxlmejcv2RXhG.aRDIsd5DTF6EOwx3lw/mt2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- --------------------------------------------------------
-- nOVA TABELA
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
(2, 'Diego Cruz', 'Gabriel Borges', '2021-04-08', '00:40:00', 'Pico de Fluxo de Tosse', 11.2);


--------------------------------------------------------------------
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
(1, 'João'),
(2, 'Pedro'),
(3, 'Maria'),
(4, 'Rodrigo'),
(5, 'Beatriz'),
(6, 'Cristina'),
(7, 'Diego'),
(8, 'Jorge'),
(9, 'Patricia'),
(10, 'Gisele');

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `idprocedimento` int(11) NOT NULL,
  `nome_procedimento` varchar(25) NOT NULL,
  `valor_procedimento` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `procedimento`
--

INSERT INTO `procedimento` (`idprocedimento`, `nome_procedimento`, `valor_procedimento`) VALUES
(1, 'Medek', 90),
(2, 'Pedia', 60),
(3, 'Bobath', 30),
(4, 'Respiratoria', 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `terapeuta`
--

CREATE TABLE `terapeuta` (
  `idterapeuta` int(11) NOT NULL,
  `nome_terapeuta` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `terapeuta`
--

INSERT INTO `terapeuta` (`idterapeuta`, `nome_terapeuta`) VALUES
(1, 'Mariela'),
(2, 'Vania'),
(3, 'Carol'),
(4, 'Marjorie'),
(5, 'Barbara'),
(6, 'Maiara');

--
-- Índices para tabelas despejadas
--

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
  ADD PRIMARY KEY (`idprocedimento`);

--
-- Índices para tabela `terapeuta`
--
ALTER TABLE `terapeuta`
  ADD PRIMARY KEY (`idterapeuta`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `horarioatendimento`
--
ALTER TABLE `horarioatendimento`
  MODIFY `idhorario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `idprocedimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `terapeuta`
--
ALTER TABLE `terapeuta`
  MODIFY `idterapeuta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
