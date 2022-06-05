-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2022 a las 00:40:31
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ahs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episodios`
--

CREATE TABLE `episodios` (
  `id_episodios` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `audiencia` double NOT NULL,
  `id_temporada_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `episodios` (`id_episodios`, `nombre`, `descripcion`, `audiencia`, `id_temporada_FK` ) VALUES
('1', 'piloto', 'whbbjwfhbwfejwefhbwfjwbf', '3.18', '1'),
('2', 'home invasion', 'hhrwgfhjfwehfjefhw', '2.46', '1' ),
('3', 'welcome to briarcliff', 'hhrwgfhjfwehfjefhw', '3.85', '2' ),
('4', 'tricks and treats', 'hhrwgfhjfwehfjefhw', '3.06', '2' ),
('5', 'bitchcraft', 'hhrwgfhjfwehfjefhw', '5.54', '3' ),
('6', 'boy parts', 'hhrwgfhjfwehfjefhw', '4.51', '3' );



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_usuario`, `nombre`, `password`, `email`) VALUES
(1, 'lautaro', '$2y$10$5bsZ6NLEQ7LPDO.hvVzyUeDAiPbB.pQOIWL4qauo2OLj5WxHmhmVW', 'laulamenza22@live.com.ar'),
(2, 'juanchi', '$2y$10$dbiO57Eq8bSSENTqY2F3zOx1wHwGvHKTLhOmy/Q/yHgCU73FqXTf.', 'juanchiilobe@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `id_temporada` int(11) NOT NULL,
  `nombre_temporada` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temporada`
--

INSERT INTO `temporada` (`id_temporada`, `nombre_temporada`) VALUES
(1, 'Murder house'),
(2, 'Asylum'),
(3, 'Coven');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `episodios`
--
ALTER TABLE `episodios`
  ADD PRIMARY KEY (`id_episodios`),
  ADD KEY `indice_temporada` (`id_temporada_FK`) USING BTREE;

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`id_temporada`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `episodios`
--
ALTER TABLE `episodios`
  MODIFY `id_episodios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
  MODIFY `id_temporada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `episodios`
--
ALTER TABLE `episodios`
  ADD CONSTRAINT `temporada_episodio` FOREIGN KEY (`id_temporada_FK`) REFERENCES `temporada` (`id_temporada`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
