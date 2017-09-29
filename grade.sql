-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 10.129.76.12
-- Tempo de geração: 22/09/2017 às 15:27
-- Versão do servidor: 5.6.26-log
-- Versão do PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `rtve_3`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `dia`
--

CREATE TABLE IF NOT EXISTS `dia` (
`id` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Fazendo dump de dados para tabela `dia`
--

INSERT INTO `dia` (`id`, `data`) VALUES
(89, '2017-09-14'),
(90, '2017-09-15'),
(91, '2017-09-16'),
(92, '2017-09-17'),
(93, '2017-09-18'),
(94, '2017-09-19'),
(95, '2017-09-20'),
(96, '2017-09-21'),
(97, '2017-09-22'),
(98, '2017-09-23'),
(99, '2017-09-24'),
(100, '2017-09-13'),
(101, '2017-09-12'),
(102, '2017-09-11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `dia_programa`
--

CREATE TABLE IF NOT EXISTS `dia_programa` (
  `fk_dia` int(11) NOT NULL,
  `fk_programa` int(11) NOT NULL,
  `hora` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `dia_programa`
--

INSERT INTO `dia_programa` (`fk_dia`, `fk_programa`, `hora`) VALUES
(89, 136, '23:30'),
(89, 135, '23:00'),
(89, 134, '22:30'),
(89, 133, '22:16'),
(89, 132, '21:02'),
(89, 130, '19:41'),
(89, 129, '18:10'),
(89, 128, '16:10'),
(89, 127, '17:03'),
(89, 126, '02:45'),
(89, 125, '02:30'),
(89, 124, '02:00'),
(89, 123, '01:15'),
(89, 121, '00:15'),
(89, 120, '10:24'),
(89, 119, '09:00'),
(89, 118, '15:15'),
(89, 110, '10:15'),
(89, 105, '03:00'),
(89, 104, '15:05'),
(89, 103, '07:00'),
(89, 101, '10:00'),
(89, 100, '11:30'),
(89, 99, '13:35'),
(89, 95, '08:00'),
(89, 93, '06:25'),
(89, 92, '05:00'),
(89, 91, '04:00'),
(90, 136, '23:30'),
(90, 135, '23:00'),
(90, 134, '22:30'),
(90, 133, '22:16'),
(90, 132, '21:02'),
(90, 130, '19:41'),
(90, 129, '18:10'),
(90, 128, '16:10'),
(90, 127, '17:03'),
(90, 126, '02:45'),
(90, 125, '02:30'),
(90, 124, '02:00'),
(90, 123, '01:15'),
(90, 121, '00:15'),
(90, 120, '10:24'),
(90, 119, '09:00'),
(90, 118, '15:15'),
(90, 110, '10:15'),
(90, 105, '03:00'),
(90, 104, '15:05'),
(90, 103, '07:00'),
(90, 101, '10:00'),
(90, 100, '11:30'),
(90, 99, '13:35'),
(90, 95, '08:00'),
(90, 93, '06:25'),
(90, 92, '05:00'),
(90, 91, '04:00'),
(91, 136, '23:30'),
(91, 135, '23:00'),
(91, 134, '22:30'),
(91, 133, '22:16'),
(91, 132, '21:02'),
(91, 130, '19:41'),
(91, 129, '18:10'),
(91, 128, '16:10'),
(91, 127, '17:03'),
(91, 126, '02:45'),
(91, 125, '02:30'),
(91, 124, '02:00'),
(91, 123, '01:15'),
(91, 121, '00:15'),
(91, 120, '10:24'),
(91, 119, '09:00'),
(91, 118, '15:15'),
(91, 110, '10:15'),
(91, 105, '03:00'),
(91, 104, '15:05'),
(91, 103, '07:00'),
(91, 101, '10:00'),
(91, 100, '11:30'),
(91, 99, '13:35'),
(91, 95, '08:00'),
(91, 93, '06:25'),
(91, 92, '05:00'),
(91, 91, '04:00'),
(92, 136, '23:30'),
(92, 135, '23:00'),
(92, 134, '22:30'),
(92, 133, '22:16'),
(92, 132, '21:02'),
(92, 130, '19:41'),
(92, 129, '18:10'),
(92, 128, '16:10'),
(92, 127, '17:03'),
(92, 126, '02:45'),
(92, 125, '02:30'),
(92, 124, '02:00'),
(92, 123, '01:15'),
(92, 121, '00:15'),
(92, 120, '10:24'),
(92, 119, '09:00'),
(92, 118, '15:15'),
(92, 110, '10:15'),
(92, 105, '03:00'),
(92, 104, '15:05'),
(92, 103, '07:00'),
(92, 101, '10:00'),
(92, 100, '11:30'),
(92, 99, '13:35'),
(92, 95, '08:00'),
(92, 93, '06:25'),
(92, 92, '05:00'),
(92, 91, '04:00'),
(93, 136, '23:30'),
(93, 135, '23:00'),
(93, 134, '22:30'),
(93, 133, '22:16'),
(93, 132, '21:02'),
(93, 130, '19:41'),
(93, 129, '18:10'),
(93, 128, '16:10'),
(93, 127, '17:03'),
(93, 126, '02:45'),
(93, 125, '02:30'),
(93, 124, '02:00'),
(93, 123, '01:15'),
(93, 121, '00:15'),
(93, 120, '10:24'),
(93, 119, '09:00'),
(93, 118, '15:15'),
(93, 110, '10:15'),
(93, 105, '03:00'),
(93, 104, '15:05'),
(93, 103, '07:00'),
(93, 101, '10:00'),
(93, 100, '11:30'),
(93, 99, '13:35'),
(93, 95, '08:00'),
(93, 93, '06:25'),
(93, 92, '05:00'),
(93, 91, '04:00'),
(94, 136, '23:30'),
(94, 135, '23:00'),
(94, 134, '22:30'),
(94, 133, '22:16'),
(94, 132, '21:02'),
(94, 130, '19:41'),
(94, 129, '18:10'),
(94, 128, '16:10'),
(94, 127, '17:03'),
(94, 126, '02:45'),
(94, 125, '02:30'),
(94, 124, '02:00'),
(94, 123, '01:15'),
(94, 121, '00:15'),
(94, 120, '10:24'),
(94, 119, '09:00'),
(94, 118, '15:15'),
(94, 110, '10:15'),
(94, 105, '03:00'),
(94, 104, '15:05'),
(94, 103, '07:00'),
(94, 101, '10:00'),
(94, 100, '11:30'),
(94, 99, '13:35'),
(94, 95, '08:00'),
(94, 93, '06:25'),
(94, 92, '05:00'),
(94, 91, '04:00'),
(95, 136, '23:30'),
(95, 135, '23:00'),
(95, 134, '22:30'),
(95, 133, '22:16'),
(95, 132, '21:02'),
(95, 130, '19:41'),
(95, 129, '18:10'),
(95, 128, '16:10'),
(95, 127, '17:03'),
(95, 126, '02:45'),
(95, 125, '02:30'),
(95, 124, '02:00'),
(95, 123, '01:15'),
(95, 121, '00:15'),
(95, 120, '10:24'),
(95, 119, '09:00'),
(95, 118, '15:15'),
(95, 110, '10:15'),
(95, 105, '03:00'),
(95, 104, '15:05'),
(95, 103, '07:00'),
(95, 101, '10:00'),
(95, 100, '11:30'),
(95, 99, '13:35'),
(95, 95, '08:00'),
(95, 93, '06:25'),
(95, 92, '05:00'),
(95, 91, '04:00'),
(96, 136, '23:30'),
(96, 135, '23:00'),
(96, 134, '22:30'),
(96, 133, '22:16'),
(96, 132, '21:02'),
(96, 130, '19:41'),
(96, 129, '18:10'),
(96, 128, '16:10'),
(96, 127, '17:03'),
(96, 126, '02:45'),
(96, 125, '02:30'),
(96, 124, '02:00'),
(96, 123, '01:15'),
(96, 121, '00:15'),
(96, 120, '10:24'),
(96, 119, '09:00'),
(96, 118, '15:15'),
(96, 110, '10:15'),
(96, 105, '03:00'),
(96, 104, '15:05'),
(96, 103, '07:00'),
(96, 101, '10:00'),
(96, 100, '11:30'),
(96, 99, '13:35'),
(96, 95, '08:00'),
(96, 93, '06:25'),
(96, 92, '05:00'),
(96, 91, '04:00'),
(97, 136, '23:30'),
(97, 135, '23:00'),
(97, 134, '22:30'),
(97, 133, '22:16'),
(97, 132, '21:02'),
(97, 130, '19:41'),
(97, 129, '18:10'),
(97, 128, '16:10'),
(97, 127, '17:03'),
(97, 126, '02:45'),
(97, 125, '02:30'),
(97, 124, '02:00'),
(97, 123, '01:15'),
(97, 121, '00:15'),
(97, 120, '10:24'),
(97, 119, '09:00'),
(97, 118, '15:15'),
(97, 110, '10:15'),
(97, 105, '03:00'),
(97, 104, '15:05'),
(97, 103, '07:00'),
(97, 101, '10:00'),
(97, 100, '11:30'),
(97, 99, '13:35'),
(97, 95, '08:00'),
(97, 93, '06:25'),
(97, 92, '05:00'),
(97, 91, '04:00'),
(98, 136, '23:30'),
(98, 135, '23:00'),
(98, 134, '22:30'),
(98, 133, '22:16'),
(98, 132, '21:02'),
(98, 130, '19:41'),
(98, 129, '18:10'),
(98, 128, '16:10'),
(98, 127, '17:03'),
(98, 126, '02:45'),
(98, 125, '02:30'),
(98, 124, '02:00'),
(98, 123, '01:15'),
(98, 121, '00:15'),
(98, 120, '10:24'),
(98, 119, '09:00'),
(98, 118, '15:15'),
(98, 110, '10:15'),
(98, 105, '03:00'),
(98, 104, '15:05'),
(98, 103, '07:00'),
(98, 101, '10:00'),
(98, 100, '11:30'),
(98, 99, '13:35'),
(98, 95, '08:00'),
(98, 93, '06:25'),
(98, 92, '05:00'),
(98, 91, '04:00'),
(99, 136, '23:30'),
(99, 135, '23:00'),
(99, 134, '22:30'),
(99, 133, '22:16'),
(99, 132, '21:02'),
(99, 130, '19:41'),
(99, 129, '18:10'),
(99, 128, '16:10'),
(99, 127, '17:03'),
(99, 126, '02:45'),
(99, 125, '02:30'),
(99, 124, '02:00'),
(99, 123, '01:15'),
(99, 120, '10:24'),
(99, 119, '09:00'),
(99, 118, '15:15'),
(99, 110, '10:15'),
(99, 105, '03:00'),
(99, 104, '15:05'),
(99, 103, '07:00'),
(99, 101, '10:00'),
(99, 100, '11:30'),
(99, 99, '13:35'),
(99, 95, '08:00'),
(99, 93, '06:25'),
(99, 92, '05:00'),
(99, 91, '04:00'),
(100, 136, '23:30'),
(100, 135, '23:00'),
(100, 134, '22:30'),
(100, 133, '22:16'),
(100, 132, '21:02'),
(100, 130, '19:41'),
(100, 129, '18:10'),
(100, 128, '16:10'),
(100, 127, '17:03'),
(100, 126, '02:45'),
(100, 125, '02:30'),
(100, 124, '02:00'),
(100, 123, '01:15'),
(100, 121, '00:15'),
(100, 120, '10:24'),
(100, 119, '09:00'),
(100, 118, '15:15'),
(100, 110, '10:15'),
(100, 105, '03:00'),
(100, 104, '15:05'),
(100, 103, '07:00'),
(100, 101, '10:00'),
(100, 100, '11:30'),
(100, 99, '13:35'),
(100, 95, '08:00'),
(100, 93, '06:25'),
(100, 92, '05:00'),
(100, 91, '04:00'),
(101, 136, '23:30'),
(101, 135, '23:00'),
(101, 134, '22:30'),
(101, 133, '22:16'),
(101, 132, '21:02'),
(101, 130, '19:41'),
(101, 129, '18:10'),
(101, 128, '16:10'),
(101, 127, '17:03'),
(101, 126, '02:45'),
(101, 125, '02:30'),
(101, 124, '02:00'),
(101, 123, '01:15'),
(101, 121, '00:15'),
(101, 120, '10:24'),
(101, 119, '09:00'),
(101, 118, '15:15'),
(101, 110, '10:15'),
(101, 105, '03:00'),
(101, 104, '15:05'),
(101, 103, '07:00'),
(101, 101, '10:00'),
(101, 100, '11:30'),
(101, 99, '13:35'),
(101, 95, '08:00'),
(101, 93, '06:25'),
(101, 92, '05:00'),
(101, 91, '04:00'),
(102, 136, '23:30'),
(102, 135, '23:00'),
(102, 134, '22:30'),
(102, 133, '22:16'),
(102, 132, '21:02'),
(102, 130, '19:41'),
(102, 129, '18:10'),
(102, 128, '16:10'),
(102, 127, '17:03'),
(102, 126, '02:45'),
(102, 125, '02:30'),
(102, 124, '02:00'),
(102, 123, '01:15'),
(102, 121, '00:15'),
(102, 120, '10:24'),
(102, 119, '09:00'),
(102, 118, '15:15'),
(102, 110, '10:15'),
(102, 105, '03:00'),
(102, 104, '15:05'),
(102, 103, '07:00'),
(102, 101, '10:00'),
(102, 100, '11:30'),
(102, 99, '13:35'),
(102, 95, '08:00'),
(102, 93, '06:25'),
(102, 92, '05:00'),
(102, 91, '04:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
`id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `hora` varchar(5) NOT NULL,
  `img_capa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `img_destaque` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `video_destaque` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cc` int(11) NOT NULL,
  `ad` int(11) NOT NULL,
  `er` int(11) NOT NULL,
  `ga` int(11) NOT NULL,
  `violencia` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `drogas` int(11) NOT NULL,
  `classificacao` int(11) NOT NULL,
  `link` varchar(200) NOT NULL,
  `link_mais` varchar(200) NOT NULL,
  `filme_titulo` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `filme_elenco` varchar(400) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `filme_direcao` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `filme_nacionalidade` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `filme_genero` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `filme_outros` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

--
-- Fazendo dump de dados para tabela `programa`
--

INSERT INTO `programa` (`id`, `titulo`, `subtitulo`, `descricao`, `hora`, `img_capa`, `img_destaque`, `video_destaque`, `cc`, `ad`, `er`, `ga`, `violencia`, `sexo`, `drogas`, `classificacao`, `link`, `link_mais`, `filme_titulo`, `filme_elenco`, `filme_direcao`, `filme_nacionalidade`, `filme_genero`, `filme_outros`) VALUES
(90, 'Estacao Plural', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '03:00', '../imagens_capa/Estação Plural.jpg', '../imagens_destaque/Estação Plural.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(91, 'Guilhermina e Candelario', 'As aventuras na floresta amazonica', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '04:00', '../imagens_capa/Guilhermina e o Candelário.jpg', '../imagens_destaque/Guilhermina e o Candelário.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(92, 'Nova Africa', 'Comunidades Quilombolas do Sul da Africa', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '05:00', '../imagens_capa/Entre Fronteiras da África.jpg', '../imagens_destaque/Nova Africa.jpg', '', 1, 1, 1, 1, 0, 1, 0, 18, 'hhtp://www.google.com.br', '', '', '', '', '', '', ''),
(93, 'Vila Sesamo', 'Animacao Garantida ', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '06:25', '../imagens_capa/Sesamo.jpg', '../imagens_destaque/Sesamo.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(94, 'Campeonato Brasileiro Serie C', 'Crack x Ceara', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '07:00', '../imagens_capa/Serie C.png', '../imagens_destaque/Serie C.jpg', '', 1, 1, 1, 1, 0, 0, 0, 16, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(95, 'Tromba Trem', 'Essa galeria vai aprontar muito', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '08:00', '../imagens_capa/Tromba Trem.png', '../imagens_destaque/Tromba Trem.jpg', '', 1, 1, 1, 1, 0, 0, 0, 14, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(96, 'Universo Z', 'Conheca o Alfateto da Lingua Brasileira', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '09:00', '../imagens_capa/Universo Z.jpg', '../imagens_destaque/Universo Z.jpg', '', 1, 1, 1, 1, 0, 0, 0, 14, 'http://www.google.com.br', '', 'rettert', '', '', '', 'ertetert', ''),
(97, 'Cocorico', 'A avesturas do galo', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '10:00', '../imagens_capa/Cocoricó na Cidade.png', '../imagens_destaque/Cocoricó na Cidade.jpg', '', 1, 1, 0, 1, 0, 0, 0, 10, '', '', '', '', '', '', '', ''),
(98, 'O Show da Luna', 'As aventuras da Luna e seus amigos', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '11:00', '../imagens_capa/O Show da Luna.jpg', '../imagens_destaque/O Show da Luna.jpg', '', 0, 1, 0, 1, 0, 0, 0, 16, '', '', '', '', '', '', '', ''),
(99, 'SOS Fada Manu', 'AS aventura de Fada Manu', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '13:35', '../imagens_capa/SOS Fada Manu.jpg', '../imagens_destaque/SOS Fada Manu.jpg', '', 1, 1, 0, 0, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(100, 'SOS Fada Manu', 'As aventura de Fada Manu', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '11:30', '../imagens_capa/Ernesto, O Exterminador de Seres Mostruosos.png', '../imagens_destaque/Ernesto, O Exterminador de Seres Mostruosos.jpg', '', 1, 1, 0, 0, 0, 0, 0, 0, 'http://www.google.com.br', '', 'Teste', '', '', '', '', ''),
(101, 'Cocorico', 'A avesturas do galo', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '10:00', '../imagens_capa/Cocoricó na Cidade.png', '../imagens_destaque/Cocoricó na Cidade.jpg', '', 1, 1, 0, 1, 0, 0, 0, 10, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(103, 'Campeonato Brasileiro Serie C', 'Crack x Ceara', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '07:00', '../imagens_capa/Serie C.png', '../imagens_destaque/Serie C.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(104, 'Nova ', 'Comunidades Quilombolas do Sul da Africa', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '15:05', '../imagens_capa/Entre Fronteiras da África.jpg', '', 'https://www.youtube.com/embed/Tbg2Rsd7jaY', 1, 1, 1, 1, 0, 0, 0, 18, 'hhtp://www.google.com.br', '', 'asd', 'sss', '', '', '', ''),
(105, 'Estacao Plural', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '03:00', '../imagens_capa/Estação Plural.jpg', '../imagens_destaque/Estação Plural.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(110, 'Estacao Plural', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '10:15', '../imagens_capa/Detetive do Prédio Azul.jpg', '../imagens_destaque/Detetives do Prédio Azul.jpeg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', 'Kindergarten Cop', 'Arnold Schwarzenegger, Penelope Ann Miller, Pamela Reed, Linda Hunt, Carroll Baker, Richard Tyson|| Elenco de dublagem: Kimble: Garcia Junior / Phoebe: Sumara Louise / Crisp: Marco Antonio / Joyce: Isis Koschdoski / Scholowski: Nelly Amaral / Eleanor: Sônia De Moraes', 'Ivan Reitman', 'Americana', 'Comédia', ''),
(117, 'Nova Africa', 'Comunidades Quilombolas do Sul da Africa', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '11:10', '../imagens_capa/Entre Fronteiras da África.jpg', '', 'https://www.youtube.com/embed/JSBKcdJywIw', 1, 1, 1, 0, 0, 0, 0, 10, 'http://www.google.com.br', '', 'Sweet Home Alabama', 'Reese Whiterspoon, Patrick Dempsey, Josh Lucas, Candice Bergen, Mary Kay Place, Fred Ward|| Elenco de dublagem: Melanie: Adriana Torres / Jack: Felipe Grinnan / Andrew; Marco Antônio Costa / Kate: Geisa Vidal / Pearl: Carmem Sheila / Earl: Carlos Seidl', 'Andy Tennant', 'Americana', 'Comédi', ''),
(118, 'Estacao Plural', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '15:15', '../imagens_capa/Detetive do Prédio Azul.jpg', '../imagens_destaque/Detetives do Prédio Azul.jpeg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', 'http://www.google.com', '', '', '', '', '', ''),
(119, 'Universo Z', 'Conheca o Alfateto da Lingua Brasileira', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '09:00', '../imagens_capa/Universo Z.jpg', '../imagens_destaque/Universo Z.jpg', '', 1, 1, 1, 1, 0, 0, 0, 14, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(120, 'Universo YY', 'Conheca o Alfateto da Lingua Brasileira', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '10:24', '../imagens_capa/Universo Z.jpg', '../imagens_destaque/Universo Z.jpg', '', 1, 1, 1, 1, 0, 0, 0, 14, 'http://www.google.com.br', '', 'Titulo Teste', '', '', '', '', ''),
(121, 'Cena Musical', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '00:15', '../imagens_capa/Cena Musical.jpg', '../imagens_destaque/Cena Musical.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, '', 'http://www.google.com.br', '', '', '', '', '', ''),
(122, 'Camarote.21', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '00:30', '../imagens_capa/Camarote 21.jpg', '../imagens_destaque/Camarote 21.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(123, 'Conhecendo Museus', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '01:15', '../imagens_capa/Conhecendo Museus.jpg', '../imagens_destaque/Conhecendo Museus.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(124, 'Carrapatos e Catapultas', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '02:00', '../imagens_capa/Carrapatos e Catapultas.jpg', '../imagens_destaque/Carrapatos e Catapultas.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(125, 'Alto Falante', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '02:30', '../imagens_capa/DOC TV.jpg', '../imagens_destaque/Alto Falante.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(126, 'Caminhos da Reportagem', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '02:45', '../imagens_capa/Caminhos da Reportagem.jpg', '../imagens_destaque/Caminhos da Reportagem.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(127, 'Estudio Movel', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '17:03', '../imagens_capa/Estúdio Móvel.jpg', '../imagens_destaque/Estúdio Móvel.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', 'https://www.youtube.com/watch?v=4_maSKZItJk', '', '', '', '', '', ''),
(128, 'Cozinha Amazonica', 'Comunidades Quilombolas do Sul da Africa', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '16:10', '../imagens_capa/Cozinha Amazônica.jpg', '../imagens_destaque/Cozinha Amazônica.jpg', '', 1, 1, 1, 0, 0, 0, 0, 10, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(129, 'Festival Mazaropi', 'Comunidades Quilombolas do Sul da Africa', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '18:10', '../imagens_capa/Festival Mazzaropi.jpg', '../imagens_destaque/Festival Mazzaropi.jpg', '', 1, 1, 1, 0, 0, 0, 0, 10, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(130, 'Limites Humanos', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '19:41', '../imagens_capa/Limites Humamos.jpg', '../imagens_destaque/Limites Humanos.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(131, 'Media Nacional', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '20:00', '../imagens_capa/Media Nacional.jpg', '../imagens_destaque/Manos e Minas.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(132, 'Ser Saudavel', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '21:02', '../imagens_capa/Ser Saudável.png', '../imagens_destaque/Ser Saudável.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(133, 'Sementes', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '22:16', '../imagens_capa/Sementes.jpg', '../imagens_destaque/Sementes.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(134, 'Via Legal', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '22:30', '../imagens_capa/Via Legal.jpg', '../imagens_destaque/Via Legal.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(135, 'Triip e Troop', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '23:00', '../imagens_capa/Trip e Troop.jpg', '../imagens_destaque/Trip e Troop.jpg', '', 1, 1, 1, 1, 0, 0, 0, 0, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(136, 'SOS Fada Manu', 'Comunidades Quilombolas do Sul da Africa', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '23:30', '../imagens_capa/SOS Fada Manu.jpg', '../imagens_destaque/SOS Fada Manu.jpg', '', 1, 1, 1, 1, 0, 0, 0, 10, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(143, 'Universo YY', 'Conheca o Alfateto da Lingua Brasileira', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '10:24', '../imagens_capa/Universo Z.jpg', '../imagens_destaque/Universo Z.jpg', '', 1, 1, 0, 1, 0, 0, 0, 14, 'http://www.google.com.br', '', 'Titulo Teste', 'retertertertert', 'rtertert', 'ertert', '', ''),
(144, 'Universo YY', 'Conheca o Alfateto da Lingua Brasileira', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '10:24', '../imagens_capa/Universo Z.jpg', '../imagens_destaque/Universo Z.jpg', '', 1, 1, 0, 1, 0, 0, 0, 14, 'http://www.google.com.br', '', 'Titulo Teste', 'retertertertert', 'rtertert', 'ertert', '', ''),
(145, 'SOS Fada Manu', 'Comunidades Quilombolas do Sul da Africa', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien. Nunc leo justo, sodales eget urna at, pharetra vulputate turpis. Maecenas fermentum, felis non tristique f', '23:30', '../imagens_capa/SOS Fada Manu.jpg', '../imagens_destaque/SOS Fada Manu.jpg', '', 1, 1, 0, 1, 0, 0, 0, 10, 'http://www.google.com.br', '', '', '', '', '', '', ''),
(146, 'Estacao Plural', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '15:15', '../imagens_capa/Detetive do Prédio Azul.jpg', '../imagens_destaque/Detetives do Prédio Azul.jpeg', '', 1, 1, 0, 1, 0, 0, 0, 0, 'http://www.google.com.br', 'http://www.google.com', '', '', '', '', '', ''),
(147, 'Estacao Plural', 'Diversidade Sexual', 'Cras egestas sapien ullamcorper tincidunt semper. Ut nec diam quis odio malesuada tempor. Aenean quis lectus vulputate libero porttitor ullamcorper id pulvinar tellus. Nulla ante libero, aliquam eu sollicitudin malesuada, facilisis sit amet enim. Pellentesque luctus sodales ornare. Suspendisse finibus, mauris sed malesuada vehicula, urna leo tempus est, sed malesuada metus ipsum vel sapien.', '10:15', '../imagens_capa/Detetive do Prédio Azul.jpg', '../imagens_destaque/Café Filosófico.jpg', '', 1, 1, 0, 1, 0, 0, 0, 0, 'http://www.google.com.br', 'http://www.google.com', 'Kindergarten Cop', 'Arnold Schwarzenegger, Penelope Ann Miller, Pamela Reed, Linda Hunt, Carroll Baker, Richard Tyson|| Elenco de dublagem: Kimble: Garcia Junior / Phoebe: Sumara Louise / Crisp: Marco Antonio / Joyce: Isis Koschdoski / Scholowski: Nelly Amaral / Eleanor: Sônia De Moraes', 'Ivan Reitman', 'Americana', 'Comédia', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`) VALUES
(1, 'ASCOM', 'ef07d02679a60bd25676b8c1b9d803fa'),
(2, 'toor', '5c448724481c36f82faef2546aef67f6');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `dia`
--
ALTER TABLE `dia`
 ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `dia_programa`
--
ALTER TABLE `dia_programa`
 ADD KEY `fk_dia` (`fk_dia`), ADD KEY `fk_programa` (`fk_programa`);

--
-- Índices de tabela `programa`
--
ALTER TABLE `programa`
 ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `dia`
--
ALTER TABLE `dia`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de tabela `programa`
--
ALTER TABLE `programa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `dia_programa`
--
ALTER TABLE `dia_programa`
ADD CONSTRAINT `dia_programa_ibfk_1` FOREIGN KEY (`fk_dia`) REFERENCES `dia` (`id`),
ADD CONSTRAINT `dia_programa_ibfk_2` FOREIGN KEY (`fk_programa`) REFERENCES `programa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
