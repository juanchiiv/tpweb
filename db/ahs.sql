-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2022 a las 00:57:50
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_episodio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `puntuacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Volcado de datos para la tabla `episodios`
--

INSERT INTO `episodios` (`id_episodios`, `nombre`, `descripcion`, `audiencia`, `id_temporada_FK`) VALUES
(1, 'piloto', 'whbbjwfhbwfejwefhbwfjwbf', 3.18, 1),
(2, 'home invasion', 'hhrwgfhjfwehfjefhw', 2.46, 1),
(3, 'welcome to briarcliff', 'hhrwgfhjfwehfjefhw', 3.85, 2),
(8, 'Boy parts', 'hjsgfhjd', 2.5, 5),
(9, 'Boy parts', 'Aún tratando de seguir siendo joven y hermosa, Fiona interroga a su nueva rehén: Madame Delphine LaLaurie. Delphine cuenta que hace 180 años atrás una sacerdotisa vudú llamada Marie Laveau le dio un elixir inmortal, mató a su familia, y la enterró viva. Con la esperanza de volverse inmortal, Fiona visita a Laveau, quien aún vive y trabaja en un salón de belleza. Fiona y Laveau crean una nueva rivalidad entre las brujas de Salem y los practicantes de vudú. Mientras tanto, Zoe y Madison deciden lanzar un hechizo de resurrección con el fin de traer de vuelta a Kyle a la vida, pero Kyle regresa como un monstruo asustado, enojado y solitario. En la escuela, Cordelia y su marido, Hank, tienen problemas para concebir a un niño, por lo que realizan un ritual de fertilidad.', 4.51, 3),
(13, 'lkshfkdshf', 'dsfhfds', 232, 2),
(14, 'Boy parts', 'kjdkjasnklsakl', 4.51, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_usuario`, `nombre`, `password`, `email`, `rol`) VALUES
(1, 'lautaro', '$2y$10$5bsZ6NLEQ7LPDO.hvVzyUeDAiPbB.pQOIWL4qauo2OLj5WxHmhmVW', 'laulamenza22@live.com.ar', 'admin'),
(2, 'juanchi', '$2y$10$dbiO57Eq8bSSENTqY2F3zOx1wHwGvHKTLhOmy/Q/yHgCU73FqXTf.', 'juanchiilobe@gmail.com', 'admin');

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
(3, 'Coven'),
(4, 'Freak Show'),
(5, ' Hotel'),
(6, 'kaklsfla');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_episodio` (`id_episodio`),
  ADD KEY `comentario_usuario` (`id_usuario`);

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
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `episodios`
--
ALTER TABLE `episodios`
  MODIFY `id_episodios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
  MODIFY `id_temporada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentario_episodio` FOREIGN KEY (`id_episodio`) REFERENCES `episodios` (`id_episodios`),
  ADD CONSTRAINT `comentario_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `login` (`id_usuario`);

--
-- Filtros para la tabla `episodios`
--
ALTER TABLE `episodios`
  ADD CONSTRAINT `temporada_episodio` FOREIGN KEY (`id_temporada_FK`) REFERENCES `temporada` (`id_temporada`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
