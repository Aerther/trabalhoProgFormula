-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/10/2025 às 23:26
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
  `name` varchar(100) NOT NULL,
  `linkFlag` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `country`
--

INSERT INTO `country` (`idCountry`, `name`, `linkFlag`) VALUES
(1, 'Lituânia', 'https://flagsapi.com/LT/flat/64.png'),
(2, 'Chile', 'https://flagsapi.com/CL/flat/64.png'),
(3, 'Benin', 'https://flagsapi.com/BJ/flat/64.png'),
(4, 'Ilhas Malvinas', 'https://flagsapi.com/FK/flat/64.png'),
(5, 'Geórgia', 'https://flagsapi.com/GE/flat/64.png'),
(6, 'Chipre', 'https://flagsapi.com/CY/flat/64.png'),
(7, 'Gana', 'https://flagsapi.com/GH/flat/64.png'),
(8, 'Bélgica', 'https://flagsapi.com/BE/flat/64.png'),
(9, 'Cuba', 'https://flagsapi.com/CU/flat/64.png'),
(10, 'Andorra', 'https://flagsapi.com/AD/flat/64.png'),
(11, 'Argentina', 'https://flagsapi.com/AR/flat/64.png'),
(12, 'El Salvador', 'https://flagsapi.com/SV/flat/64.png'),
(13, 'Uzbequistão', 'https://flagsapi.com/UZ/flat/64.png'),
(14, 'Belize', 'https://flagsapi.com/BZ/flat/64.png'),
(15, 'Letónia', 'https://flagsapi.com/LV/flat/64.png'),
(16, 'Costa do Marfim', 'https://flagsapi.com/CI/flat/64.png'),
(17, 'França', 'https://flagsapi.com/FR/flat/64.png'),
(18, 'Marianas Setentrionais', 'https://flagsapi.com/MP/flat/64.png'),
(19, 'Congo', 'https://flagsapi.com/CG/flat/64.png'),
(20, 'Bangladesh', 'https://flagsapi.com/BD/flat/64.png'),
(21, 'Palau', 'https://flagsapi.com/PW/flat/64.png'),
(22, 'Afeganistão', 'https://flagsapi.com/AF/flat/64.png'),
(23, 'Etiópia', 'https://flagsapi.com/ET/flat/64.png'),
(24, 'Nova Caledónia', 'https://flagsapi.com/NC/flat/64.png'),
(25, 'Turquemenistão', 'https://flagsapi.com/TM/flat/64.png'),
(26, 'Jordânia', 'https://flagsapi.com/JO/flat/64.png'),
(27, 'Montserrat', 'https://flagsapi.com/MS/flat/64.png'),
(28, 'Bulgária', 'https://flagsapi.com/BG/flat/64.png'),
(29, 'Santa Lúcia', 'https://flagsapi.com/LC/flat/64.png'),
(30, 'Senegal', 'https://flagsapi.com/SN/flat/64.png'),
(31, 'Uruguai', 'https://flagsapi.com/UY/flat/64.png'),
(32, 'Guiné-Bissau', 'https://flagsapi.com/GW/flat/64.png'),
(33, 'Filipinas', 'https://flagsapi.com/PH/flat/64.png'),
(34, 'Tanzânia', 'https://flagsapi.com/TZ/flat/64.png'),
(35, 'Ilha de Man', 'https://flagsapi.com/IM/flat/64.png'),
(36, 'Sudão', 'https://flagsapi.com/SD/flat/64.png'),
(37, 'Serra Leoa', 'https://flagsapi.com/SL/flat/64.png'),
(38, 'Chade', 'https://flagsapi.com/TD/flat/64.png'),
(39, 'Vanuatu', 'https://flagsapi.com/VU/flat/64.png'),
(40, 'Ruanda', 'https://flagsapi.com/RW/flat/64.png'),
(41, 'Palestina', 'https://flagsapi.com/PS/flat/64.png'),
(42, 'Togo', 'https://flagsapi.com/TG/flat/64.png'),
(43, 'Emirados Árabes Unidos', 'https://flagsapi.com/AE/flat/64.png'),
(44, 'Antártida', 'https://flagsapi.com/AQ/flat/64.png'),
(45, 'Comores', 'https://flagsapi.com/KM/flat/64.png'),
(46, 'Kosovo', 'https://flagsapi.com/XK/flat/64.png'),
(47, 'Moldávia', 'https://flagsapi.com/MD/flat/64.png'),
(48, 'Quirguistão', 'https://flagsapi.com/KG/flat/64.png'),
(49, 'Cabo Verde', 'https://flagsapi.com/CV/flat/64.png'),
(50, 'Estados Unidos', 'https://flagsapi.com/US/flat/64.png'),
(51, 'Venezuela', 'https://flagsapi.com/VE/flat/64.png'),
(52, 'Ilhas Pitcairn', 'https://flagsapi.com/PN/flat/64.png'),
(53, 'Mayotte', 'https://flagsapi.com/YT/flat/64.png'),
(54, 'Timor-Leste', 'https://flagsapi.com/TL/flat/64.png'),
(55, 'Ilhas Salomão', 'https://flagsapi.com/SB/flat/64.png'),
(56, 'Saint-Pierre e Miquelon', 'https://flagsapi.com/PM/flat/64.png'),
(57, 'Equador', 'https://flagsapi.com/EC/flat/64.png'),
(58, 'Malta', 'https://flagsapi.com/MT/flat/64.png'),
(59, 'República Centro-Africana', 'https://flagsapi.com/CF/flat/64.png'),
(60, 'Tonga', 'https://flagsapi.com/TO/flat/64.png'),
(61, 'Grécia', 'https://flagsapi.com/GR/flat/64.png'),
(62, 'Áustria', 'https://flagsapi.com/AT/flat/64.png'),
(63, 'São Cristóvão e Nevis', 'https://flagsapi.com/KN/flat/64.png'),
(64, 'Nigéria', 'https://flagsapi.com/NG/flat/64.png'),
(65, 'Niue', 'https://flagsapi.com/NU/flat/64.png'),
(66, 'Chéquia', 'https://flagsapi.com/CZ/flat/64.png'),
(67, 'San Marino', 'https://flagsapi.com/SM/flat/64.png'),
(68, 'Países Baixos Caribenhos', 'https://flagsapi.com/BQ/flat/64.png'),
(69, 'Catar', 'https://flagsapi.com/QA/flat/64.png'),
(70, 'Wallis e Futuna', 'https://flagsapi.com/WF/flat/64.png'),
(71, 'Guatemala', 'https://flagsapi.com/GT/flat/64.png'),
(72, 'Tunísia', 'https://flagsapi.com/TN/flat/64.png'),
(73, 'Butão', 'https://flagsapi.com/BT/flat/64.png'),
(74, 'Macau', 'https://flagsapi.com/MO/flat/64.png'),
(75, 'Santa Helena, Ascensão e Tristão da Cunha', 'https://flagsapi.com/SH/flat/64.png'),
(76, 'Samoa', 'https://flagsapi.com/WS/flat/64.png'),
(77, 'Tajiquistão', 'https://flagsapi.com/TJ/flat/64.png'),
(78, 'Saara Ocidental', 'https://flagsapi.com/EH/flat/64.png'),
(79, 'Israel', 'https://flagsapi.com/IL/flat/64.png'),
(80, 'Somália', 'https://flagsapi.com/SO/flat/64.png'),
(81, 'São Bartolomeu', 'https://flagsapi.com/BL/flat/64.png'),
(82, 'Guernsey', 'https://flagsapi.com/GG/flat/64.png'),
(83, 'Ilhas Turks e Caicos', 'https://flagsapi.com/TC/flat/64.png'),
(84, 'Finlândia', 'https://flagsapi.com/FI/flat/64.png'),
(85, 'Lesoto', 'https://flagsapi.com/LS/flat/64.png'),
(86, 'Rússia', 'https://flagsapi.com/RU/flat/64.png'),
(87, 'Irlanda', 'https://flagsapi.com/IE/flat/64.png'),
(88, 'Azerbeijão', 'https://flagsapi.com/AZ/flat/64.png'),
(89, 'Jamaica', 'https://flagsapi.com/JM/flat/64.png'),
(90, 'Suazilândia', 'https://flagsapi.com/SZ/flat/64.png'),
(91, 'Gabão', 'https://flagsapi.com/GA/flat/64.png'),
(92, 'Camboja', 'https://flagsapi.com/KH/flat/64.png'),
(93, 'Arábia Saudita', 'https://flagsapi.com/SA/flat/64.png'),
(94, 'Micronésia', 'https://flagsapi.com/FM/flat/64.png'),
(95, 'Coreia do Norte', 'https://flagsapi.com/KP/flat/64.png'),
(96, 'Guiné Equatorial', 'https://flagsapi.com/GQ/flat/64.png'),
(97, 'Gronelândia', 'https://flagsapi.com/GL/flat/64.png'),
(98, 'México', 'https://flagsapi.com/MX/flat/64.png'),
(99, 'Brasil', 'https://flagsapi.com/BR/flat/64.png'),
(100, 'Nauru', 'https://flagsapi.com/NR/flat/64.png'),
(101, 'Irão', 'https://flagsapi.com/IR/flat/64.png'),
(102, 'Angola', 'https://flagsapi.com/AO/flat/64.png'),
(103, 'Aruba', 'https://flagsapi.com/AW/flat/64.png'),
(104, 'Ilhas Cocos (Keeling)', 'https://flagsapi.com/CC/flat/64.png'),
(105, 'Myanmar', 'https://flagsapi.com/MM/flat/64.png'),
(106, 'Egito', 'https://flagsapi.com/EG/flat/64.png'),
(107, 'Itália', 'https://flagsapi.com/IT/flat/64.png'),
(108, 'Austrália', 'https://flagsapi.com/AU/flat/64.png'),
(109, 'Botswana', 'https://flagsapi.com/BW/flat/64.png'),
(110, 'Cidade do Vaticano', 'https://flagsapi.com/VA/flat/64.png'),
(111, 'Reunião', 'https://flagsapi.com/RE/flat/64.png'),
(112, 'Libéria', 'https://flagsapi.com/LR/flat/64.png'),
(113, 'Portugal', 'https://flagsapi.com/PT/flat/64.png'),
(114, 'Anguilla', 'https://flagsapi.com/AI/flat/64.png'),
(115, 'Síria', 'https://flagsapi.com/SY/flat/64.png'),
(116, 'Dinamarca', 'https://flagsapi.com/DK/flat/64.png'),
(117, 'Albânia', 'https://flagsapi.com/AL/flat/64.png'),
(118, 'Eslováquia', 'https://flagsapi.com/SK/flat/64.png'),
(119, 'ilha da Curação', 'https://flagsapi.com/CW/flat/64.png'),
(120, 'Zâmbia', 'https://flagsapi.com/ZM/flat/64.png'),
(121, 'São Tomé e Príncipe', 'https://flagsapi.com/ST/flat/64.png'),
(122, 'Bahamas', 'https://flagsapi.com/BS/flat/64.png'),
(123, 'Holanda', 'https://flagsapi.com/NL/flat/64.png'),
(124, 'Samoa Americana', 'https://flagsapi.com/AS/flat/64.png'),
(125, 'Bolívia', 'https://flagsapi.com/BO/flat/64.png'),
(126, 'Território Britânico do Oceano Índico', 'https://flagsapi.com/IO/flat/64.png'),
(127, 'Alemanha', 'https://flagsapi.com/DE/flat/64.png'),
(128, 'Eritreia', 'https://flagsapi.com/ER/flat/64.png'),
(129, 'Estónia', 'https://flagsapi.com/EE/flat/64.png'),
(130, 'Mali', 'https://flagsapi.com/ML/flat/64.png'),
(131, 'Kuwait', 'https://flagsapi.com/KW/flat/64.png'),
(132, 'República Democrática do Congo', 'https://flagsapi.com/CD/flat/64.png'),
(133, 'Hungria', 'https://flagsapi.com/HU/flat/64.png'),
(134, 'Líbia', 'https://flagsapi.com/LY/flat/64.png'),
(135, 'Montenegro', 'https://flagsapi.com/ME/flat/64.png'),
(136, 'Paraguai', 'https://flagsapi.com/PY/flat/64.png'),
(137, 'Perú', 'https://flagsapi.com/PE/flat/64.png'),
(138, 'Burundi', 'https://flagsapi.com/BI/flat/64.png'),
(139, 'Laos', 'https://flagsapi.com/LA/flat/64.png'),
(140, 'Sudão do Sul', 'https://flagsapi.com/SS/flat/64.png'),
(141, 'Ilhas Caimão', 'https://flagsapi.com/KY/flat/64.png'),
(142, 'Macedónia do Norte', 'https://flagsapi.com/MK/flat/64.png'),
(143, 'Marrocos', 'https://flagsapi.com/MA/flat/64.png'),
(144, 'Líbano', 'https://flagsapi.com/LB/flat/64.png'),
(145, 'Alândia', 'https://flagsapi.com/AX/flat/64.png'),
(146, 'Guiné', 'https://flagsapi.com/GN/flat/64.png'),
(147, 'Nicarágua', 'https://flagsapi.com/NI/flat/64.png'),
(148, 'Guadalupe', 'https://flagsapi.com/GP/flat/64.png'),
(149, 'Sri Lanka', 'https://flagsapi.com/LK/flat/64.png'),
(150, 'Ilha Heard e Ilhas McDonald', 'https://flagsapi.com/HM/flat/64.png'),
(151, 'China', 'https://flagsapi.com/CN/flat/64.png'),
(152, 'Bahrein', 'https://flagsapi.com/BH/flat/64.png'),
(153, 'Ilhas Marshall', 'https://flagsapi.com/MH/flat/64.png'),
(154, 'Ucrânia', 'https://flagsapi.com/UA/flat/64.png'),
(155, 'África do Sul', 'https://flagsapi.com/ZA/flat/64.png'),
(156, 'São Vincente e Granadinas', 'https://flagsapi.com/VC/flat/64.png'),
(157, 'Seicheles', 'https://flagsapi.com/SC/flat/64.png'),
(158, 'República Dominicana', 'https://flagsapi.com/DO/flat/64.png'),
(159, 'Indonésia', 'https://flagsapi.com/ID/flat/64.png'),
(160, 'Malawi', 'https://flagsapi.com/MW/flat/64.png'),
(161, 'Camarões', 'https://flagsapi.com/CM/flat/64.png'),
(162, 'Madagáscar', 'https://flagsapi.com/MG/flat/64.png'),
(163, 'Kiribati', 'https://flagsapi.com/KI/flat/64.png'),
(164, 'Fiji', 'https://flagsapi.com/FJ/flat/64.png'),
(165, 'Polinésia Francesa', 'https://flagsapi.com/PF/flat/64.png'),
(166, 'Paquistão', 'https://flagsapi.com/PK/flat/64.png'),
(167, 'Ilhas Faroé', 'https://flagsapi.com/FO/flat/64.png'),
(168, 'Suriname', 'https://flagsapi.com/SR/flat/64.png'),
(169, 'Djibouti', 'https://flagsapi.com/DJ/flat/64.png'),
(170, 'Gâmbia', 'https://flagsapi.com/GM/flat/64.png'),
(171, 'Mongólia', 'https://flagsapi.com/MN/flat/64.png'),
(172, 'Zimbabwe', 'https://flagsapi.com/ZW/flat/64.png'),
(173, 'Islândia', 'https://flagsapi.com/IS/flat/64.png'),
(174, 'Haiti', 'https://flagsapi.com/HT/flat/64.png'),
(175, 'Roménia', 'https://flagsapi.com/RO/flat/64.png'),
(176, 'Costa Rica', 'https://flagsapi.com/CR/flat/64.png'),
(177, 'Croácia', 'https://flagsapi.com/HR/flat/64.png'),
(178, 'Vietname', 'https://flagsapi.com/VN/flat/64.png'),
(179, 'Coreia do Sul', 'https://flagsapi.com/KR/flat/64.png'),
(180, 'Ilha Norfolk', 'https://flagsapi.com/NF/flat/64.png'),
(181, 'Canadá', 'https://flagsapi.com/CA/flat/64.png'),
(182, 'Liechtenstein', 'https://flagsapi.com/LI/flat/64.png'),
(183, 'Mónaco', 'https://flagsapi.com/MC/flat/64.png'),
(184, 'Porto Rico', 'https://flagsapi.com/PR/flat/64.png'),
(185, 'Tuvalu', 'https://flagsapi.com/TV/flat/64.png'),
(186, 'Guiana Francesa', 'https://flagsapi.com/GF/flat/64.png'),
(187, 'São Martinho', 'https://flagsapi.com/MF/flat/64.png'),
(188, 'Maurício', 'https://flagsapi.com/MU/flat/64.png'),
(189, 'Ilhas Geórgia do Sul e Sandwich do Sul', 'https://flagsapi.com/GS/flat/64.png'),
(190, 'Papua Nova Guiné', 'https://flagsapi.com/PG/flat/64.png'),
(191, 'Cazaquistão', 'https://flagsapi.com/KZ/flat/64.png'),
(192, 'Malásia', 'https://flagsapi.com/MY/flat/64.png'),
(193, 'Uganda', 'https://flagsapi.com/UG/flat/64.png'),
(194, 'Burkina Faso', 'https://flagsapi.com/BF/flat/64.png'),
(195, 'Granada', 'https://flagsapi.com/GD/flat/64.png'),
(196, 'Singapura', 'https://flagsapi.com/SG/flat/64.png'),
(197, 'Ilhas Cook', 'https://flagsapi.com/CK/flat/64.png'),
(198, 'Maldivas', 'https://flagsapi.com/MV/flat/64.png'),
(199, 'Iémen', 'https://flagsapi.com/YE/flat/64.png'),
(200, 'Ilhas Virgens dos Estados Unidos', 'https://flagsapi.com/VI/flat/64.png'),
(201, 'Jersey', 'https://flagsapi.com/JE/flat/64.png'),
(202, 'Martinica', 'https://flagsapi.com/MQ/flat/64.png'),
(203, 'Ilhas Virgens', 'https://flagsapi.com/VG/flat/64.png'),
(204, 'Antígua e Barbuda', 'https://flagsapi.com/AG/flat/64.png'),
(205, 'Panamá', 'https://flagsapi.com/PA/flat/64.png'),
(206, 'Tailândia', 'https://flagsapi.com/TH/flat/64.png'),
(207, 'Suécia', 'https://flagsapi.com/SE/flat/64.png'),
(208, 'Argélia', 'https://flagsapi.com/DZ/flat/64.png'),
(209, 'Moçambique', 'https://flagsapi.com/MZ/flat/64.png'),
(210, 'Namíbia', 'https://flagsapi.com/NA/flat/64.png'),
(211, 'Barbados', 'https://flagsapi.com/BB/flat/64.png'),
(212, 'Ilhas Svalbard e Jan Mayen', 'https://flagsapi.com/SJ/flat/64.png'),
(213, 'Hong Kong', 'https://flagsapi.com/HK/flat/64.png'),
(214, 'Honduras', 'https://flagsapi.com/HN/flat/64.png'),
(215, 'Japão', 'https://flagsapi.com/JP/flat/64.png'),
(216, 'Ilhas Menores Distantes dos Estados Unidos', 'https://flagsapi.com/UM/flat/64.png'),
(217, 'Guam', 'https://flagsapi.com/GU/flat/64.png'),
(218, 'Bielorússia', 'https://flagsapi.com/BY/flat/64.png'),
(219, 'Bermudas', 'https://flagsapi.com/BM/flat/64.png'),
(220, 'Bósnia e Herzegovina', 'https://flagsapi.com/BA/flat/64.png'),
(221, 'Gibraltar', 'https://flagsapi.com/GI/flat/64.png'),
(222, 'Quénia', 'https://flagsapi.com/KE/flat/64.png'),
(223, 'Nova Zelândia', 'https://flagsapi.com/NZ/flat/64.png'),
(224, 'Terras Austrais e Antárticas Francesas', 'https://flagsapi.com/TF/flat/64.png'),
(225, 'Tokelau', 'https://flagsapi.com/TK/flat/64.png'),
(226, 'Guiana', 'https://flagsapi.com/GY/flat/64.png'),
(227, 'Nepal', 'https://flagsapi.com/NP/flat/64.png'),
(228, 'Índia', 'https://flagsapi.com/IN/flat/64.png'),
(229, 'Trinidade e Tobago', 'https://flagsapi.com/TT/flat/64.png'),
(230, 'Luxemburgo', 'https://flagsapi.com/LU/flat/64.png'),
(231, 'Suíça', 'https://flagsapi.com/CH/flat/64.png'),
(232, 'Ilha Formosa', 'https://flagsapi.com/TW/flat/64.png'),
(233, 'Iraque', 'https://flagsapi.com/IQ/flat/64.png'),
(234, 'Noruega', 'https://flagsapi.com/NO/flat/64.png'),
(235, 'Omã', 'https://flagsapi.com/OM/flat/64.png'),
(236, 'Reino Unido', 'https://flagsapi.com/GB/flat/64.png'),
(237, 'Dominica', 'https://flagsapi.com/DM/flat/64.png'),
(238, 'Espanha', 'https://flagsapi.com/ES/flat/64.png'),
(239, 'Sérvia', 'https://flagsapi.com/RS/flat/64.png'),
(240, 'Eslovénia', 'https://flagsapi.com/SI/flat/64.png'),
(241, 'Arménia', 'https://flagsapi.com/AM/flat/64.png'),
(242, 'Níger', 'https://flagsapi.com/NE/flat/64.png'),
(243, 'Ilha Bouvet', 'https://flagsapi.com/BV/flat/64.png'),
(244, 'Ilha do Natal', 'https://flagsapi.com/CX/flat/64.png'),
(245, 'Colômbia', 'https://flagsapi.com/CO/flat/64.png'),
(246, 'Polónia', 'https://flagsapi.com/PL/flat/64.png'),
(247, 'Turquia', 'https://flagsapi.com/TR/flat/64.png'),
(248, 'Brunei', 'https://flagsapi.com/BN/flat/64.png'),
(249, 'Mauritânia', 'https://flagsapi.com/MR/flat/64.png');

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
  `idCountry` int(11) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0,
  `dateShared` datetime DEFAULT NULL,
  `dateCreated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `driverrace`
--

CREATE TABLE `driverrace` (
  `idDriver` int(11) NOT NULL,
  `idRace` int(11) NOT NULL,
  `Position` int(11) DEFAULT NULL
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
-- Estrutura para tabela `liked`
--

CREATE TABLE `liked` (
  `idDriver` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `reaction` int(11) NOT NULL DEFAULT 0
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
  `lastLogin` timestamp NULL DEFAULT current_timestamp()
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
-- Índices de tabela `driverrace`
--
ALTER TABLE `driverrace`
  ADD PRIMARY KEY (`idDriver`,`idRace`),
  ADD KEY `driverrace_ibfk_2` (`idRace`);

--
-- Índices de tabela `lap`
--
ALTER TABLE `lap`
  ADD PRIMARY KEY (`idLap`),
  ADD KEY `FK_Lap_Race` (`idRace`),
  ADD KEY `FK_Lap_Driver` (`idDriver`);

--
-- Índices de tabela `liked`
--
ALTER TABLE `liked`
  ADD PRIMARY KEY (`idDriver`,`idUser`),
  ADD KEY `idUser` (`idUser`);

--
-- Índices de tabela `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`idRace`),
  ADD KEY `FK_Race_Track` (`idTrack`),
  ADD KEY `FK_Race_User` (`idUser`);

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
  MODIFY `idCountry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de tabela `driver`
--
ALTER TABLE `driver`
  MODIFY `idDriver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
-- AUTO_INCREMENT de tabela `track`
--
ALTER TABLE `track`
  MODIFY `idTrack` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- Restrições para tabelas `driverrace`
--
ALTER TABLE `driverrace`
  ADD CONSTRAINT `driverrace_ibfk_1` FOREIGN KEY (`idDriver`) REFERENCES `driver` (`idDriver`) ON DELETE CASCADE,
  ADD CONSTRAINT `driverrace_ibfk_2` FOREIGN KEY (`idRace`) REFERENCES `race` (`idRace`) ON DELETE CASCADE;

--
-- Restrições para tabelas `lap`
--
ALTER TABLE `lap`
  ADD CONSTRAINT `FK_Lap_Driver` FOREIGN KEY (`idDriver`) REFERENCES `driver` (`idDriver`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Lap_Race` FOREIGN KEY (`idRace`) REFERENCES `race` (`idRace`) ON DELETE CASCADE;

--
-- Restrições para tabelas `liked`
--
ALTER TABLE `liked`
  ADD CONSTRAINT `idDriver` FOREIGN KEY (`idDriver`) REFERENCES `driver` (`idDriver`) ON DELETE CASCADE,
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE;

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
