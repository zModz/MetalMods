-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Maio-2022 às 17:35
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projectmusic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `musicas`
--

CREATE TABLE `musicas` (
  `id_m` int(11) NOT NULL,
  `nome_m` varchar(200) NOT NULL,
  `artista_m` varchar(200) NOT NULL,
  `album_m` varchar(200) NOT NULL,
  `ano_m` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `musicas`
--

INSERT INTO `musicas` (`id_m`, `nome_m`, `artista_m`, `album_m`, `ano_m`) VALUES
(1, 'Raisehell.exe', 'The Dead Rabbitts', 'Rumination', 2022),
(2, 'Dead By Daylight', 'The Dead Rabbitts, Mizo Mabbitt', 'Rumination', 2022),
(3, 'Escaping The Fate', 'The Dead Rabbitts', 'Rumination', 2022),
(4, 'Product To Blame', 'The Dead Rabbitts', 'Rumination', 2022),
(5, 'Echo', 'The Dead Rabbitts', 'Rumination', 2022),
(6, 'Options', 'The Dead Rabbitts, Chloe Ozwell', 'Rumination', 2022),
(7, 'In Your Dreams', 'The Dead Rabbitts', 'Rumination', 2022),
(8, 'Rumination', 'The Dead Rabbitts', 'Rumination', 2022),
(9, 'Acceptance', 'The Dead Rabbitts', 'Rumination', 2022),
(10, 'Nail In The Casket', 'The Dead Rabbitts', 'Rumination', 2022),
(11, 'Halo', 'The Dead Rabbitts', 'Rumination', 2022),
(12, 'Prize Pig', 'The Dead Rabbitts', 'Rumination', 2022),
(13, 'The Edge', 'The Dead Rabbitts, Ronnie Winter', 'Rumination', 2022),
(14, 'Going Under', 'Evanescence', 'Fallen', 2003),
(15, 'Bring Me to Life', 'Evanescence', 'Fallen', 2003),
(16, 'Everybody\'s Fool', 'Evanescence', 'Fallen', 2003),
(17, 'My Immortal', 'Evanescence', 'Fallen', 2003),
(18, 'Haunted', 'Evanescence', 'Fallen', 2003),
(19, 'Tourniquet', 'Evanescence', 'Fallen', 2003),
(20, 'Imaginary', 'Evanescence', 'Fallen', 2003),
(21, 'Taking Over Me', 'Evanescence', 'Fallen', 2003),
(22, 'Hello', 'Evanescence', 'Fallen', 2003),
(23, 'My Last Breath', 'Evanescence', 'Fallen', 2003),
(24, 'Whisper', 'Evanescence', 'Fallen', 2003),
(25, 'Intro', 'Breaking Benjamin', 'Phobia', 2006),
(26, 'The Diary Of Jane', 'Breaking Benjamin', 'Phobia', 2006),
(27, 'Breath', 'Breaking Benjamin', 'Phobia', 2006),
(28, 'You', 'Breaking Benjamin', 'Phobia', 2006),
(29, 'Evil Angel', 'Breaking Benjamin', 'Phobia', 2006),
(30, 'Until The End', 'Breaking Benjamin', 'Phobia', 2006),
(31, 'Dance With The Devil', 'Breaking Benjamin', 'Phobia', 2006),
(32, 'Topless', 'Breaking Benjamin', 'Phobia', 2006),
(33, 'Here We Are', 'Breaking Benjamin', 'Phobia', 2006),
(34, 'Unknown Soldier', 'Breaking Benjamin', 'Phobia', 2006),
(35, 'Had Enough', 'Breaking Benjamin', 'Phobia', 2006),
(36, 'You Fight Me', 'Breaking Benjamin', 'Phobia', 2006),
(37, 'Outro', 'Breaking Benjamin', 'Phobia', 2006),
(38, 'Dear Diary,', 'Bring Me The Horizon', 'POST HUMAN: SURVIVAL HORROR', 2020),
(39, 'Parasite Eve', 'Bring Me The Horizon', 'POST HUMAN: SURVIVAL HORROR', 2020),
(40, 'Teardrops', 'Bring Me The Horizon', 'POST HUMAN: SURVIVAL HORROR', 2020),
(41, 'Obey', 'Bring Me The Horizon, YUNGBLUD', 'POST HUMAN: SURVIVAL HORROR', 2020),
(42, 'Itch For The Cure', 'Bring Me The Horizon', 'POST HUMAN: SURVIVAL HORROR', 2020),
(43, 'Kingslayer', 'Bring Me The Horizon, BABYMETAL', 'POST HUMAN: SURVIVAL HORROR', 2020),
(44, '1x1', 'Bring Me The Horizon, Nova Twins', 'POST HUMAN: SURVIVAL HORROR', 2020),
(45, 'Ludens', 'Bring Me The Horizon', 'POST HUMAN: SURVIVAL HORROR', 2020),
(46, 'One Day The Only Butterflies Left Will Be In Your Chest As You March Towards Your Death', 'Bring Me The Horizon, Amy Lee', 'POST HUMAN: SURVIVAL HORROR', 2020),
(47, 'Alerion', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(48, 'Final Episode', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(49, 'A Candlelit Dinner With Inamorta', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(50, 'Nobody Don\'t Dance No More', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(51, 'Hey There Mr. Brooks', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(52, 'Hiatus', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(53, 'If You Can\'t Ride Two Horses at Once.. You Should Get Out Of The Circus', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(54, 'A Single Moment Of Sincerity', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(55, 'Not The American Average', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(56, 'I Used To Have a Best Friend', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(57, 'A Prophecy', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(58, 'I Was Once, Possibily, Maybe, Perhaps a Cowboy King', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(59, 'When Everyday\'s The Weekend', 'Asking Alexandria', 'Stand Up And Scream', 2009),
(60, 'Death Inside', 'Memphis May Fire', 'Death Inside - Single', 2021),
(61, '24:7', 'The Dead Rabbitts', 'Break the Static', 2019),
(62, 'Car Radio', 'Twenty-One Pilots', 'Vessel', 2013);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `musicas`
--
ALTER TABLE `musicas`
  ADD PRIMARY KEY (`id_m`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `musicas`
--
ALTER TABLE `musicas`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
