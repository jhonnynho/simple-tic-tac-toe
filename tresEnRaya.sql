-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-04-2018 a las 05:18:37
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tresenraya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `board`
--

CREATE TABLE `board` (
  `pos1` varchar(11) NOT NULL,
  `pos2` varchar(11) NOT NULL,
  `pos3` varchar(11) NOT NULL,
  `pos4` varchar(11) NOT NULL,
  `pos5` varchar(11) NOT NULL,
  `pos6` varchar(11) NOT NULL,
  `pos7` varchar(11) NOT NULL,
  `pos8` varchar(11) NOT NULL,
  `pos9` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `players`
--

CREATE TABLE `players` (
  `playerOneTurn` tinyint(1) NOT NULL,
  `playerTwoTurn` tinyint(1) NOT NULL,
  `playerOneWin` tinyint(1) NOT NULL,
  `playerTwoWin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `players`
--

INSERT INTO `players` (`playerOneTurn`, `playerTwoTurn`, `playerOneWin`, `playerTwoWin`) VALUES
(1, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
