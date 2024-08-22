-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2022 a las 14:44:46
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basededadesbr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `Id` int(4) NOT NULL,
  `Nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`Id`, `Nom`) VALUES
(1, 'Camisetes'),
(2, 'Sudaderes'),
(3, 'Pantalons'),
(4, 'Sabates');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comanda`
--

CREATE TABLE `comanda` (
  `Id` int(4) NOT NULL,
  `Data` date NOT NULL,
  `PreuTotal` float(6,2) NOT NULL,
  `ElementsTotal` int(4) NOT NULL,
  `UsuariId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comanda`
--

INSERT INTO `comanda` (`Id`, `Data`, `PreuTotal`, `ElementsTotal`, `UsuariId`) VALUES
(19, '2022-01-02', 44.98, 2, 2),
(20, '2022-01-02', 41.98, 2, 2),
(21, '2022-01-02', 79.98, 2, 1),
(22, '2022-01-02', 30.98, 2, 1),
(23, '2022-01-13', 69.98, 2, 2),
(24, '2022-01-17', 34.99, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineescomanda`
--

CREATE TABLE `lineescomanda` (
  `Id` int(4) NOT NULL,
  `Quantitat` int(4) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Preu` float(6,2) NOT NULL,
  `Imatge` varchar(100) NOT NULL,
  `ComandaId` int(4) NOT NULL,
  `ProducteId` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lineescomanda`
--

INSERT INTO `lineescomanda` (`Id`, `Quantitat`, `Nom`, `Preu`, `Imatge`, `ComandaId`, `ProducteId`) VALUES
(3, 1, 'Sudadara amb estampat espiral', 34.99, '', 19, 5),
(4, 1, 'Camiseta loose fit básica\r\n', 9.99, '', 19, 1),
(5, 2, 'Pantaló xinès balloon fit pinces', 20.99, '', 20, 8),
(6, 1, 'Sudadara amb estampat espiral', 34.99, '../practica/img/sudaderas/2a.jpg', 21, 5),
(7, 1, 'Sabates casual peces', 44.99, '../practica/img/zapatos/3a.jpg', 21, 12),
(8, 1, 'Camiseta loose fit básica\r\n', 9.99, '../practica/img/camisetas/1a.jpg', 22, 1),
(9, 1, 'Jeans slim fit 90\'s', 20.99, '../practica/img/pantalones/3a.jpg', 22, 9),
(10, 2, 'Sudadara amb estampat espiral', 34.99, '../practica/img/sudaderas/2a.jpg', 23, 5),
(11, 1, 'Sudadara amb estampat espiral', 34.99, '../practica/img/sudaderas/2a.jpg', 24, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productes`
--

CREATE TABLE `productes` (
  `Id` int(4) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `Preu` float(6,2) NOT NULL,
  `Descripcio` varchar(1000) NOT NULL,
  `Imatge1` varchar(100) NOT NULL,
  `Imatge2` varchar(100) NOT NULL,
  `Imatge3` varchar(100) NOT NULL,
  `CategoriaId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productes`
--

INSERT INTO `productes` (`Id`, `Nom`, `Preu`, `Descripcio`, `Imatge1`, `Imatge2`, `Imatge3`, `CategoriaId`) VALUES
(1, 'Camiseta loose fit básica\r\n', 9.99, 'Camiseta en punt de cotó gruixut amb coll rodó. Tall relaxat oversize. Color blanc.', '../practica/img/camisetas/1a.jpg', '../practica/img/camisetas/1b.jpg', '../practica/img/camisetas/1c.jpg', 1),
(2, 'Camiseta loose fit básica', 9.99, 'Camiseta en punt de cotó gruixut amb coll rodó. Tall relaxat oversize. Color beix.', '../practica/img/camisetas/2a.jpg', '../practica/img/camisetas/2b.jpg', '../practica/img/camisetas/2c.jpg', 1),
(3, 'Camiseta loose fit básica', 9.99, 'Camiseta en punt de cotó gruixut amb coll rodó. Tall relaxat oversize. Color negre.', '../practica/img/camisetas/3a.jpg', '../practica/img/camisetas/3b.jpg', '../practica/img/camisetas/3c.jpg', 1),
(4, 'Sudadera Relaxed Fit', 22.99, 'Dessuadora amb caputxa folrada en punt amb cordó dʻajust. Model amb tanca de cremallera, butxaques inserides al biaix i punys i baix en punt elàstic de canalé. Interior raspallat suau.', '../practica/img/sudaderas/1a.jpg', '../practica/img/sudaderas/1b.jpg', '../practica/img/sudaderas/1c.jpg', 2),
(5, 'Sudadara amb estampat espiral', 34.99, 'Sudadera en teixit suau amb estampació d\'espiral. Caputxa de doble capa amb cordó d´ajust i front creuat, butxaca cangur i punys i baix en punt elàstic de canalé. Interior raspallat suau.', '../practica/img/sudaderas/2a.jpg', '../practica/img/sudaderas/2b.jpg', '../practica/img/sudaderas/2c.jpg', 2),
(6, 'Sudadera amb caputxa Regular Fit', 34.99, 'Sudadera de tall estàndard amb butxaca cangur i caputxa de doble capa, creuada davant, amb cordó dʻajust. Punys i baix en punt elàstic de canalé. Interior raspallat suau. Estampació de passatge darrere.', '../practica/img/sudaderas/3a.jpg', '../practica/img/sudaderas/3b.jpg', '../practica/img/sudaderas/3c.jpg', 2),
(7, 'Pantaló càrrec color block caqui\r\n', 15.99, 'Pantalons tipus càrrec color block en tons caquis, amb butxaques, cintura amb travetes i tanca de cremallera i botó.', '../practica/img/pantalones/1a.jpg', '../practica/img/pantalones/1b.jpg', '../practica/img/pantalones/1c.jpg', 3),
(8, 'Pantaló xinès balloon fit pinces', 20.99, 'Pantalons xinesos balloon fit amb detall de pinces davanteres, amb butxaques, cintura amb travetes, tanca de botó i cremallera i en 100% cotó.', '../practica/img/pantalones/2a.jpg', '../practica/img/pantalones/2b.jpg', '../practica/img/pantalones/2c.jpg', 3),
(9, 'Jeans slim fit 90\'s', 20.99, 'Texans slim fit d\'inspiració 90\'s, amb disseny de cinc butxaques, cintura amb travetes, tanca de botó i cremallera i confeccionats en cotó.', '../practica/img/pantalones/3a.jpg', '../practica/img/pantalones/3b.jpg', '../practica/img/pantalones/3c.jpg', 3),
(10, 'Bota acordonada pis track', 39.99, 'Sabata tipus bota acordonada disponible en diversos colors amb tancament mitjançant cremallera a la part interna. Sola tipus track. Alçada de la sola 4.2 cm.', '../practica/img/zapatos/1a.jpg', '../practica/img/zapatos/1b.jpg', '../practica/img/zapatos/1c.jpg', 4),
(11, 'Sabata esportiva alta', 44.99, 'Sabata esportiva alta en pell sintètica amb puntera al davant sintètic. Collarí encoixinat, cordons i llengüeta davant, i traus en un lateral. Folre de piqué i plantilles de lona. Soles de goma amb disseny. Grossor de la sola 3 cm.', '../practica/img/zapatos/2a.jpg', '../practica/img/zapatos/2b.jpg', '../practica/img/zapatos/2c.jpg', 4),
(12, 'Sabates casual peces', 44.99, 'Sabatilla esportiva en pell sintètica amb panells davant sintètic, collarí i llengüeta lleugerament encoixinats, i cordons davant. Folre i plantilles de pell sintètica. Sola llisa de goma amb disseny. Confeccionades amb polièster parcialment reciclat. Grossor de la sola 3,2 cm.', '../practica/img/zapatos/3a.jpg', '../practica/img/zapatos/3b.jpg', '../practica/img/zapatos/3c.jpg', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int(4) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `citynumber` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `nom`, `email`, `password`, `address`, `city`, `citynumber`) VALUES
(1, 'arnau', 'arnau@gmail.com', '$2y$10$g3P.fLlssGahUjs.UMevgeqgyrJ/kuooOF0IgexDG8G94e992zk/u', 'calle arnau', 'barcelona', '12345'),
(2, 'alejo', 'alejo@gmail.com', '$2y$10$dMCRH8abOTGdUsf8WpZ9Z.iX5R.DGk/ujCvPY00fV1KGcWtg4bRg2', 'calle uab', 'sant adria', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `lineescomanda`
--
ALTER TABLE `lineescomanda`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `productes`
--
ALTER TABLE `productes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CategoriaId` (`CategoriaId`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comanda`
--
ALTER TABLE `comanda`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `lineescomanda`
--
ALTER TABLE `lineescomanda`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productes`
--
ALTER TABLE `productes`
  MODIFY `Id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comanda`
--
ALTER TABLE `comanda`
  ADD CONSTRAINT `comanda_ibfk_1` FOREIGN KEY (`UsuariId`) REFERENCES `usuaris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lineescomanda`
--
ALTER TABLE `lineescomanda`
  ADD CONSTRAINT `lineescomanda_ibfk_1` FOREIGN KEY (`ComandaId`) REFERENCES `comanda` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lineescomanda_ibfk_2` FOREIGN KEY (`ProducteId`) REFERENCES `productes` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productes`
--
ALTER TABLE `productes`
  ADD CONSTRAINT `productes_ibfk_1` FOREIGN KEY (`CategoriaId`) REFERENCES `categories` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
