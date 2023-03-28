-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-03-2023 a las 10:45:31
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papeleria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `codigo` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `unidades` int(20) NOT NULL,
  `precio` varchar(10) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `codigocat` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`codigo`, `nombre`, `unidades`, `precio`, `foto`, `codigocat`) VALUES
(2, 'Boligrafo', 250, '1 Euro', '<img src=\"img/boligrafo.jpg\">', 6),
(3, 'Lápiz', 350, '1 Euro', '<img src=\"img/lapiz.jpg\" width=\'75\' height=\'75\'>', 7),
(4, 'Borrador', 500, '0,60 Euros', '<img src=\"img/borrador.jpg\" width=\'75\' height=\'75\'', 5),
(5, 'Cuaderno Rayas', 150, '2 Euros', '<img src=\"img/rayas.jpg\" width=\'75\' height=\'75\'>', 4),
(6, 'Cuaderno Cuadros', 260, '2 Euros', '<img src=\"img/cuadros.jpg\" width=\'75\' height=\'75\'>', 4),
(7, 'Pinturas de Cera', 320, '2,5 Euros', '<img src=\"img/ceras.jpg\" width=\'75\' height=\'75\'>', 1),
(8, 'Bolígrafo borrable', 150, '1,90 Euros', '<img src=\"img/boligrafo3.jpg\">', 6),
(9, 'Bolígrafo Pilot', 300, '1,5 Euros', '<img src=\"img/boligrafo2.jpg\">', 6),
(10, 'Borrador Milan', 320, '0,60 Euros', '<img src=\"img/borrador3.jpg\">', 5),
(11, 'Borrador Standler', 200, '1,15 Euros', '<img src=\"img/borrador2.jpg\">', 5),
(12, 'Ceras Manley', 75, '1,90 Euros', '<img src=\"img/ceras2.jpg\">', 2),
(13, 'Ceras Das Color', 200, '2,35 Euros', '<img src=\"img/ceras3.jpg\">', 2),
(14, 'Ceras Dasc', 30, '3,20 Euros', '<img src=\"img/ceras4.jpg\" width=\"75\" height=\"75\">', 3),
(15, 'Cuaderno Pasta Dura', 120, '2,10 Euros', '<img src=\"img/cuaderno3.jpg\">', 4),
(16, 'Lápiz Standler', 300, '2,20 Euros', '<img src=\"img/lapiz2.jpg\" width=\"75\" height=\"75\">', 7),
(17, 'Tijeras Zurdos', 124, '1,80 Euros', '<img src=\"img/tijeras2.jpg\" width=\"75\" height=\"75\"', 3),
(18, 'Tijeras milan zurdos', 320, '3,50 Euros', '<img src=\"img/tijeras3.jpg\" width=\"75\" height=\"75\"', 3),
(19, 'Mochila Carro', 100, '12 Euros', '<img src=\"img/mochilacarro.jpg\">', 8),
(22, 'Mochila escolar', 100, '15', '<img src=\"img/mochila_escolar.jpg\">', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `codigocat` int(10) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`codigocat`, `nombre`, `descripcion`) VALUES
(1, 'Pinturas', 'Distintos tipos de p'),
(2, 'Ceras', 'Distintos tipos de c'),
(3, 'Tijeras', 'Tipos de tijeras'),
(4, 'Cuaderno', 'Tipos de cuadernos'),
(5, 'Borradores', 'Tipos de borradores'),
(6, 'Boligrafo', 'tipos de boligrafos'),
(7, 'lapiz', 'tipos de lapiz'),
(8, 'mochilas', 'tipos de mochilas'),
(9, 'Otros', 'Otros productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `contraseña_usuario` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre_usuario`, `contraseña_usuario`) VALUES
('usuario2', '12345'),
('usuario3', '12345'),
('usuario4', '12345'),
('usuario5', '12345'),
('Usuario6', '12345A'),
('usuario7', '12345'),
('Dami1', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `codigocat` (`codigocat`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`codigocat`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `codigo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`codigocat`) REFERENCES `categorias` (`codigocat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
