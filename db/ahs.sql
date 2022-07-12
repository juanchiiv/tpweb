-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2022 a las 21:57:32
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

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_episodio`, `id_usuario`, `comentario`, `puntuacion`) VALUES
(1, 1, 1, 'xmvbncmbvc', 4),
(5, 1, 5, 'hfdhdhfdhf', 5),
(6, 1, 5, 'vdfdffdbfdbd', 1);

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
(1, 'Piloto', 'La familia Harmon - Ben (Dylan McDermott), Vivien (Connie Britton) y Violet (Taissa Farmiga) - se mudan de Boston a Los Ángeles después que Vivien tiene un aborto involuntario y Ben tiene una aventura con una de sus estudiantes. La familia se muda a una mansión restaurada, sin saber que está encantada por sus expropietarios. Cuando Vivien intenta hacer frente a su vecina instrusa, Constance (Jessica Lange), Violet se conecta con el adolescente Tate (Evan Peters).', 3.18, 1),
(2, 'Home invasion', 'Ben Harmon (Dylan McDermott) se dirige a Boston para hablar con la estudiante que tuvo la aventura en el primer episodio (la estrella invitada Kate Mara). Mientras está ausente, su esposa, Vivien (Connie Britton), y su hija, Violet (Taissa Farmiga), lidian con tres invasores quiénes quieren volver a representar un asesinato que ocurrió en la casa en 1968.', 2.46, 1),
(3, 'Welcome to briarcliff', 'El episodio introduce al elenco principal, y narra el intento de la reportera Lana Winters (Sarah Paulson) de denunciar los tratos sadísticos de la Hermana Jude (Jessica Lange) en su hospital psiquiátrico, así como el injusto confinamiento de Kit Walker (Evan Peters) en la institución.', 3.85, 2),
(8, 'Bitchcraft', 'El episodio presenta un grupo de cuatro jóvenes brujas, las cuales asisten a una escuela en New Orleans donde aprenderán a controlar sus poderes. Al mismo tiempo, se cuenta la historia de Madame Delphine LaLaurie, una cruel dama de sociedad del siglo XIX que mutilaba y torturaba a sus esclavos.', 5.54, 3),
(9, 'Boy parts', 'Aún tratando de seguir siendo joven y hermosa, Fiona interroga a su nueva rehén: Madame Delphine LaLaurie. Delphine cuenta que hace 180 años atrás una sacerdotisa vudú llamada Marie Laveau le dio un elixir inmortal, mató a su familia, y la enterró viva. Con la esperanza de volverse inmortal, Fiona visita a Laveau, quien aún vive y trabaja en un salón de belleza. Fiona y Laveau crean una nueva rivalidad entre las brujas de Salem y los practicantes de vudú. Mientras tanto, Zoe y Madison deciden lanzar un hechizo de resurrección con el fin de traer de vuelta a Kyle a la vida, pero Kyle regresa como un monstruo asustado, enojado y solitario. En la escuela, Cordelia y su marido, Hank, tienen problemas para concebir a un niño, por lo que realizan un ritual de fertilidad.', 4.51, 3),
(13, 'Monster among us', 'El episodio nos transporta al año 1952 y nos presenta a Elsa Mars (Jessica Lange), quien dirige uno de los últimos espectáculos de fenómenos (llamados freaks) de los Estados Unidos en la aldea de Júpiter, Florida, y también el reclutamiento, por parte de Elsa, de las gemelas unidas Bette y Dot Tattler (Sarah Paulson). También presenta al resto de sus artistas del espectáculo de freaks y al payaso asesino conocido como Twisty (John Carroll Lynch). El episodio es el segundo más largo en la historia de la serie, llegando a poco más de una hora de duración sin comerciales. Este episodio es notable en la serie, ya que es el primer episodio de estreno de una temporada que no presenta flashbacks a otro año.', 6.13, 4),
(14, 'Massacres and Matinees', 'En este episodio, se impone un toque de queda en Júpiter, mientras la policía investiga el Espectáculo de Freaks cuando sospechan que un policía fue asesinado en el lugar.', 4.53, 4),
(25, 'Checking in', 'Unas turistas suecas sufren un repentino ataque producido por una criatura extraña que aparece en su habitación del hotel donde se alojan. Iris, la gerente del centro, decide trasladarlas de departamento pero su intención queda anulada por la presencia de otras criaturas cuyo origen es desconocido. Así, se van sucediendo una serie de catástrofes imposibles de parar a mano de unos personajes totalmente peculiares. Entre ellos, la dueña del edificio, la condesa Elizabeth, quien tiene por costumbre llevar a cabo prácticas fuera de lo común.', 5.81, 5);

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
(2, 'juanchi', '$2y$10$dbiO57Eq8bSSENTqY2F3zOx1wHwGvHKTLhOmy/Q/yHgCU73FqXTf.', 'juanchiilobe@gmail.com', 'admin'),
(5, 'Martin', '$2y$10$R2yVIRoI14AvtMc.pFWOCeADV.mbRXDwXM4puTIfuwTHYBa0KQD/i', 'martin@gmail.com', 'usuario');

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
(6, 'Roanoke');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `episodios`
--
ALTER TABLE `episodios`
  MODIFY `id_episodios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
  MODIFY `id_temporada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
