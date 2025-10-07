-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/10/2025 às 01:06
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `formula`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `country`
--

CREATE TABLE `country` (
  `idCountry` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `driver`
--

CREATE TABLE `driver` (
  `idDriver` int(11) NOT NULL,
  `number` smallint(6) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `level` tinyint(4) DEFAULT 1,
  `color` varchar(20) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idCountry` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lap`
--

CREATE TABLE `lap` (
  `idLap` int(11) NOT NULL,
  `plusTime` decimal(5,2) NOT NULL,
  `idRace` int(11) DEFAULT NULL,
  `idDriver` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `race`
--

CREATE TABLE `race` (
  `idRace` int(11) NOT NULL,
  `allLaps` smallint(6) NOT NULL,
  `lastLap` smallint(6) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `idTrack` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `shareddriver`
--

CREATE TABLE `shareddriver` (
  `idSharedDriver` int(11) NOT NULL,
  `isActive` tinyint(1) DEFAULT 1,
  `dateShared` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `track`
--

CREATE TABLE `track` (
  `idTrack` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `baseLap` decimal(6,3) NOT NULL,
  `length` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `lastLogin` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`idCountry`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Índices de tabela `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`idDriver`),
  ADD KEY `FK_Driver_User` (`idUser`),
  ADD KEY `FK_Driver_Country` (`idCountry`);

--
-- Índices de tabela `lap`
--
ALTER TABLE `lap`
  ADD PRIMARY KEY (`idLap`),
  ADD KEY `FK_Lap_Race` (`idRace`),
  ADD KEY `FK_Lap_Driver` (`idDriver`);

--
-- Índices de tabela `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`idRace`),
  ADD KEY `FK_Race_Track` (`idTrack`),
  ADD KEY `FK_Race_User` (`idUser`);

--
-- Índices de tabela `shareddriver`
--
ALTER TABLE `shareddriver`
  ADD PRIMARY KEY (`idSharedDriver`);

--
-- Índices de tabela `track`
--
ALTER TABLE `track`
  ADD PRIMARY KEY (`idTrack`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `country`
--
ALTER TABLE `country`
  MODIFY `idCountry` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `driver`
--
ALTER TABLE `driver`
  MODIFY `idDriver` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `lap`
--
ALTER TABLE `lap`
  MODIFY `idLap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `race`
--
ALTER TABLE `race`
  MODIFY `idRace` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `shareddriver`
--
ALTER TABLE `shareddriver`
  MODIFY `idSharedDriver` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `track`
--
ALTER TABLE `track`
  MODIFY `idTrack` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `FK_Driver_Country` FOREIGN KEY (`idCountry`) REFERENCES `country` (`idCountry`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Driver_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE;

--
-- Restrições para tabelas `lap`
--
ALTER TABLE `lap`
  ADD CONSTRAINT `FK_Lap_Driver` FOREIGN KEY (`idDriver`) REFERENCES `driver` (`idDriver`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Lap_Race` FOREIGN KEY (`idRace`) REFERENCES `race` (`idRace`) ON DELETE CASCADE;

--
-- Restrições para tabelas `race`
--
ALTER TABLE `race`
  ADD CONSTRAINT `FK_Race_Track` FOREIGN KEY (`idTrack`) REFERENCES `track` (`idTrack`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Race_User` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
