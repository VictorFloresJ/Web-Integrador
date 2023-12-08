-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2023 a las 20:45:34
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `piratekeys`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `clave_compra` varchar(255) NOT NULL,
  `id_videojuego` int(11) NOT NULL,
  `id_plataforma` int(11) NOT NULL,
  `tarjeta` varchar(40) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_compra` date NOT NULL,
  `clave` varchar(255) NOT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_videojuego` int(11) NOT NULL,
  `id_plataforma` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_videojuego`, `id_plataforma`, `cantidad`, `precio`) VALUES
(1, 1, 12, 66.76),
(1, 2, 1, 71.37),
(1, 3, 1, 76.55),
(1, 4, 1, 38.64),
(2, 1, 1, 33.56),
(2, 2, 1, 71.88),
(2, 3, 1, 78.73),
(2, 4, 1, 48.00),
(3, 1, 1, 73.79),
(3, 2, 1, 44.97),
(3, 3, 1, 73.49),
(3, 4, 1, 52.53),
(4, 1, 1, 62.18),
(4, 2, 1, 73.31),
(4, 3, 1, 50.01),
(4, 4, 1, 50.13),
(5, 1, 1, 70.61),
(5, 2, 1, 72.66),
(5, 3, 1, 71.47),
(5, 4, 1, 59.39),
(6, 1, 1, 52.53),
(6, 2, 1, 54.49),
(6, 3, 1, 34.85),
(6, 4, 1, 30.80),
(7, 1, 1, 69.42),
(7, 2, 1, 74.73),
(7, 3, 1, 35.38),
(7, 4, 1, 72.72),
(8, 1, 1, 77.46),
(8, 2, 1, 39.13),
(8, 3, 1, 33.27),
(8, 4, 1, 68.96),
(9, 1, 1, 64.98),
(9, 2, 1, 38.01),
(9, 3, 1, 65.13),
(9, 4, 1, 31.61),
(10, 1, 1, 32.68),
(10, 2, 1, 38.56),
(10, 3, 1, 64.76),
(10, 4, 1, 78.11),
(11, 1, 1, 66.27),
(11, 2, 1, 67.03),
(11, 3, 1, 56.36),
(11, 4, 1, 50.68),
(12, 1, 1, 54.32),
(12, 2, 1, 39.55),
(12, 3, 1, 54.79),
(12, 4, 1, 75.32),
(13, 1, 1, 32.21),
(13, 2, 1, 55.10),
(13, 3, 1, 48.85),
(13, 4, 1, 48.97),
(14, 1, 1, 68.29),
(14, 2, 1, 64.53),
(14, 3, 1, 37.77),
(14, 4, 1, 65.28),
(15, 1, 1, 33.08),
(15, 2, 1, 39.57),
(15, 3, 1, 68.62),
(15, 4, 1, 44.38),
(16, 1, 1, 36.06),
(16, 2, 1, 67.14),
(16, 3, 1, 47.52),
(16, 4, 1, 56.19),
(17, 1, 1, 58.38),
(17, 2, 1, 43.33),
(17, 3, 1, 61.52),
(17, 4, 1, 47.61),
(18, 1, 1, 73.49),
(18, 2, 1, 44.64),
(18, 3, 1, 72.70),
(18, 4, 1, 49.59),
(19, 1, 1, 49.83),
(19, 2, 1, 70.40),
(19, 3, 1, 72.50),
(19, 4, 1, 71.30),
(20, 1, 1, 59.01),
(20, 2, 1, 51.14),
(20, 3, 1, 48.69),
(20, 4, 1, 60.02),
(21, 1, 1, 74.01),
(21, 2, 1, 60.02),
(21, 3, 1, 48.06),
(21, 4, 1, 30.26),
(22, 1, 1, 77.10),
(22, 2, 1, 64.74),
(22, 3, 1, 62.38),
(22, 4, 1, 37.69),
(23, 1, 1, 71.29),
(23, 2, 1, 63.39),
(23, 3, 1, 73.08),
(23, 4, 1, 45.24),
(24, 1, 1, 76.97),
(24, 2, 1, 69.13),
(24, 3, 1, 34.74),
(24, 4, 1, 36.31),
(25, 1, 1, 47.32),
(25, 2, 1, 47.66),
(25, 3, 1, 66.37),
(25, 4, 1, 58.85),
(26, 1, 1, 65.15),
(26, 2, 1, 69.19),
(26, 3, 1, 70.52),
(26, 4, 1, 65.00),
(27, 1, 1, 33.44),
(27, 2, 1, 42.22),
(27, 3, 1, 30.79),
(27, 4, 1, 47.26),
(28, 1, 1, 63.94),
(28, 2, 1, 47.91),
(28, 3, 1, 67.74),
(28, 4, 1, 64.97),
(29, 1, 1, 41.64),
(29, 2, 1, 33.29),
(29, 3, 1, 61.54),
(29, 4, 1, 77.80),
(30, 1, 1, 74.41),
(30, 2, 1, 58.64),
(30, 3, 1, 39.95),
(30, 4, 1, 43.83),
(31, 1, 1, 69.32),
(31, 2, 1, 35.11),
(31, 3, 1, 37.60),
(31, 4, 1, 52.65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `id_videojuego` int(11) DEFAULT NULL,
  `id_plataforma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `keys`
--

INSERT INTO `keys` (`id`, `clave`, `id_videojuego`, `id_plataforma`) VALUES
(24, '656973541e269', 1, 1),
(25, '6569735a1c780', 1, 2),
(26, '6569735de0064', 1, 3),
(27, '6569736178412', 1, 4),
(28, '656974088651c', 2, 1),
(29, '656974088685d', 2, 2),
(30, '6569740886b09', 2, 3),
(31, '65697408870c4', 2, 4),
(32, '6569740887312', 3, 1),
(33, '6569740887596', 3, 2),
(34, '65697408877ba', 3, 3),
(35, '65697408879dc', 3, 4),
(36, '6569740887c06', 4, 1),
(37, '6569740887eaf', 4, 2),
(38, '65697408880b8', 4, 3),
(39, '65697408882cf', 4, 4),
(40, '65697408884ff', 5, 1),
(41, '6569740888730', 5, 2),
(42, '656974088895e', 5, 3),
(43, '6569740888be7', 5, 4),
(44, '6569740888e19', 6, 1),
(45, '6569740889040', 6, 2),
(46, '65697408891f1', 6, 3),
(47, '656974088942e', 6, 4),
(48, '65697408896dd', 7, 1),
(49, '65697408898f9', 7, 2),
(50, '6569740889b1c', 7, 3),
(51, '6569740889d30', 7, 4),
(52, '6569740889f52', 8, 1),
(53, '656974088a109', 8, 2),
(54, '656974088a2b4', 8, 3),
(55, '656974088a464', 8, 4),
(56, '656974088a612', 9, 1),
(57, '656974088a7c7', 9, 2),
(58, '656974088a977', 9, 3),
(59, '656974088ab38', 9, 4),
(60, '656974088ad30', 10, 1),
(61, '656974088aed8', 10, 2),
(62, '656974088b055', 10, 3),
(63, '656974088b205', 10, 4),
(64, '656974088b3b5', 11, 1),
(65, '656974088b569', 11, 2),
(66, '656974088b71a', 11, 3),
(67, '656974088b8d3', 11, 4),
(68, '656974088ba80', 12, 1),
(69, '656974088bc37', 12, 2),
(70, '656974088bddd', 12, 3),
(71, '656974088bf6b', 12, 4),
(72, '656974088c121', 13, 1),
(73, '656974088c2cf', 13, 2),
(74, '656974088c485', 13, 3),
(75, '656974088c631', 13, 4),
(76, '656974088c7eb', 14, 1),
(77, '656974088c996', 14, 2),
(78, '656974088cb42', 14, 3),
(79, '656974088ccf5', 14, 4),
(80, '656974088cea8', 15, 1),
(81, '656974088d057', 15, 2),
(82, '656974088d205', 15, 3),
(83, '656974088d3b7', 15, 4),
(84, '656974088d570', 16, 1),
(85, '656974088d71f', 16, 2),
(86, '656974088d8af', 16, 3),
(87, '656974088da5b', 16, 4),
(88, '656974088dc11', 17, 1),
(89, '656974088ddbf', 17, 2),
(90, '656974088df6f', 17, 3),
(91, '656974088e121', 17, 4),
(92, '656974088e2d4', 18, 1),
(93, '656974088e49b', 18, 2),
(94, '656974088e643', 18, 3),
(95, '656974088e7ee', 18, 4),
(96, '656974088e99b', 19, 1),
(97, '656974088eb4c', 19, 2),
(98, '656974088ecfb', 19, 3),
(99, '656974088eead', 19, 4),
(100, '656974088f037', 20, 1),
(101, '656974088f1e2', 20, 2),
(102, '656974088f392', 20, 3),
(103, '656974088f53a', 20, 4),
(104, '656974088f6ec', 21, 1),
(105, '656974088f89a', 21, 2),
(106, '656974088fa4e', 21, 3),
(107, '656974088fc03', 21, 4),
(108, '656974088fd7b', 22, 1),
(109, '656974088ff28', 22, 2),
(110, '65697408900d8', 22, 3),
(111, '65697408902a2', 22, 4),
(112, '6569740890452', 23, 1),
(113, '6569740890605', 23, 2),
(114, '65697408907b3', 23, 3),
(115, '6569740890968', 23, 4),
(116, '6569740890b21', 24, 1),
(117, '6569740890cca', 24, 2),
(118, '6569740890e77', 24, 3),
(119, '656974089102b', 24, 4),
(120, '65697408911da', 25, 1),
(121, '656974089138e', 25, 2),
(122, '6569740891674', 25, 3),
(123, '6569740891827', 25, 4),
(124, '65697408919d4', 26, 1),
(125, '6569740891b86', 26, 2),
(126, '6569740891d37', 26, 3),
(127, '6569740891ef5', 26, 4),
(128, '65697408920a1', 27, 1),
(129, '6569740892286', 27, 2),
(130, '656974089242e', 27, 3),
(131, '65697408925e4', 27, 4),
(132, '6569740892792', 28, 1),
(133, '6569740892940', 28, 2),
(134, '6569740892b49', 28, 3),
(135, '6569740892cfe', 28, 4),
(136, '6569740892ee6', 29, 1),
(137, '6569740893068', 29, 2),
(138, '656974089321d', 29, 3),
(139, '65697408933cf', 29, 4),
(140, '656974089357c', 30, 1),
(141, '6569740893765', 30, 2),
(142, '6569740893a87', 30, 3),
(143, '6569740893c39', 30, 4),
(144, '6569740893de4', 31, 1),
(145, '6569740893f93', 31, 2),
(146, '656974089414b', 31, 3),
(147, '65697408942ff', 31, 4),
(148, '6569f70479e65', 1, 1),
(149, '6569f70483be2', 1, 1),
(150, '6569f70483eb1', 1, 1),
(151, '6569f70484107', 1, 1),
(152, '6569f7048431d', 1, 1),
(153, '6569f7048451a', 1, 1),
(154, '6569f70484711', 1, 1),
(155, '6569f704849b6', 1, 1),
(156, '6569f70484ba6', 1, 1),
(157, '6569f70484da6', 1, 1),
(158, '6569f70484f9c', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `id` int(11) NOT NULL,
  `nombre_plataforma` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`id`, `nombre_plataforma`) VALUES
(1, 'Xbox'),
(2, 'PlayStation'),
(3, 'Nintendo'),
(4, 'PC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(60) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_usuario`, `email`, `password`, `admin`) VALUES
(1, 'Enriqueta', 'Enriqueta@Enriqueta.com', 'root', 1),
(2, 'Manuel', 'Manuel@Manuel.com', 'root', 1),
(3, 'Víctor', 'Víctor@Víctor.com', 'root', 1),
(4, 'Javier', 'Javier@Javier.com', 'root', 1),
(5, 'Abner', 'Abner@Abner.com', 'root', 0),
(6, 'Alejandro', 'Alejandro@Alejandro.com', 'root', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id` int(11) NOT NULL,
  `nombre_videojuego` varchar(255) NOT NULL,
  `imagen_videojuego` varchar(255) NOT NULL,
  `descripcion` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id`, `nombre_videojuego`, `imagen_videojuego`, `descripcion`) VALUES
(1, 'Assassins Creed Valhalla', 'AssassinsCreedValhalla.jpg', 'El viaje de Eivor llega a su fin en Assassin\'s Creed Valhalla: El último capítulo, un nuevo paquete de historia gratuito que cierra la saga del Matalobos. Una historia común es una misión gratuita de Assassin\'s Creed Valhalla protagonizada por Roshan, de Assassin\'s Creed Mirage.\n\nForja tu propia leyenda vikinga a 60 FPS y en resolución 4K. Ponte en la piel de Eivor, una leyenda vikinga, y explora la Inglaterra de los años oscuros mientras saqueas a tus enemigos, haces prosperar tu asentamiento, consolidas tu poder político y luchas por ganarte un sitio entre los dioses en el Valhalla.\n\n- Dirige épicos saqueos vikingos contra fortalezas y tropas sajonas.\n- Lucha a dos manos con poderosas armas y revive el brutal estilo de combate de los vikingos.\n- Ponte a prueba con la mayor variedad de enemigos jamás vista en Assassin\'s Creed.\n- Forja el camino de tu personaje y el de tu clan con cada decisión que tomes.\n- Explora un mundo abierto ambientado en los años oscuros, desde las escarpadas costas de Noruega hasta los hermosos reinos de Inglaterra.'),
(2, 'Cyberpunk 2077', 'Cyberpunk2077.jpg', 'Cyberpunk 2077 es un RPG de aventura y acción de mundo abierto ambientado en la megalópolis de Night City, donde te pondrás en la piel de un mercenario o una mercenaria ciberpunk y vivirás su lucha a vida o muerte por la supervivencia. \n\nMejorado para la nueva generación y con contenido adicional gratuito. Personaliza tu personaje y tu estilo de juego a medida que aceptas trabajos, te labras una reputación y desbloqueas mejoras. Las relaciones que forjes y las decisiones que tomes darán forma al mundo que te rodea. Aquí nacen las leyendas. \n\n¿Cuál será la tuya?'),
(3, 'The Last of Us Part II', 'TheLastOfUsPartII.jpg', 'Cinco años después de su peligroso viaje a través de unos Estados Unidos pospandemia, Ellie y Joel logran establecerse en Jackson, Wyoming. \n\nVivir entre una próspera comunidad de sobrevivientes les ha concedido paz y estabilidad, a pesar de la amenaza constante de los infectados y de otros sobrevivientes más desesperados.\n\nCuando un evento violento interrumpe esa paz, Ellie se embarca en un viaje incesante para obtener justicia y llegar a un cierre. A medida que caza a los responsables uno por uno, deberá enfrentarse a las devastadoras repercusiones físicas y emocionales de sus acciones.'),
(4, 'Call of Duty: Warzone', 'CallOfDutyWarzone.jpg', 'Bienvenido a Warzone y Al Mazrah, el área metropolitana de la República de Adal y sus alrededores en la próxima versión de la gran experiencia gratuita del Battle Royale de Call of Duty. Al Mazrah es el mapa de Battle Royale más grande e inmersivo. \n\nAl Mazrah presenta innovaciones en la jugabilidad, 18 puntos de interés, mecánicas de jugador atrapantes y el nuevo modo Zona desmilitarizada de mundo abierto basado en objetivos. Aunque seas nuevo en Warzone o no conozcas el calor de Al Mazrah, aquí habrá algo para todos los jugadores de Call of Duty. \n\nMás adelante en la temporada, los operadores del Ritual oscuro invocarán monstruos por todo Al Mazrah, y solo tú y tu equipo podrán enviarlos de regreso a donde pertenecen.'),
(5, 'FIFA 22', 'FIFA22.jpg', 'EA SPORTS FC™ 24 es el comienzo del futuro del fútbol. Con este título innovador y auténtico, te sentirás mucho más cerca del juego gracias a una experiencia futbolística más real que nunca y a la compañía de los mejores jugadores de los equipos, ligas y competencias más grandes del mundo.\n\nDescubre un nivel de realismo sin igual en cada partido gracias a tres tecnologías revolucionarias: HyperMotionV, PlayStyles optimizado por Opta y el motor Frostbite™ mejorado.\n\nCon más de 19.000 jugadores licenciados, 700 equipos y 30 ligas, como UEFA Champions League masculina y femenina, EA SPORTS FC 24 brinda un nivel de autenticidad sin igual en el campo de juego.'),
(6, 'Red Dead Redemption 2', 'RedDeadRedemption2.jpg', 'Estados Unidos, 1899. El fin de la era del salvaje oeste ha comenzado. La ley da cacería a las últimas bandas de forajidos que quedan. Los que no se rinden o sucumben, terminan muertos.\n\nDespués de que un robo termina mal en el pueblo de Blackwater, Arthur Morgan y la banda Van der Linde se ven obligados a huir. Con agentes federales y los mejores cazarrecompensas de la nación pisándoles los talones, la banda debe robar y pelear, abriéndose camino por el inhóspito corazón de Estados Unidos para poder sobrevivir.\n\nA medida que las cada vez más profundas divisiones internas amenazan con separar a la banda, Arthur debe elegir entre sus propios ideales y su lealtad a la banda que lo vio crecer. \n\nDe los creadores de Grand Theft Auto V y Red Dead Redemption, Red Dead Redemption 2 es la extensa historia de la vida en Estados Unidos a principios de la era moderna.  '),
(7, 'Spider-Man: Miles Morales', 'SpiderManMilesMorales.jpg', 'En la última aventura del universo de Spider-Man de Marvel, el adolescente Miles Morales intenta ajustarse a su nuevo hogar mientras que sigue los pasos de su mentor, Peter Parker, para convertirse en el nuevo Spider-Man.\n\nPero cuando un feroz enfrentamiento por el poder amenaza con destruir su hogar, el aspirante a héroe entiende que un gran poder conlleva una gran responsabilidad. Para salvar a la Nueva York de Marvel, Miles debe adoptar el manto de Spider-Man y volverlo propio.'),
(8, 'Among Us', 'AmongUs.jpg', '¡Prepárate para la partida, pero ten cuidado con el impostor! Completa las tareas para mantener unida tu nave y regresar a la civilización, pero mantente alerta, ya que uno o más jugadores al azar entre la tripulación son impostores decididos a sabotear la nave y matar a todos.\n\nDependerá de los humanos restantes completar sus tareas e identificar a los impostores para expulsarlos al vacío. ¡Pero, cuidado! Los impostores usarán todos los trucos posibles para convencer a todos de que son miembros de la tripulación, así que no creas todo lo que te digan. ¡Asegúrate de que tu coartada se sostiene o quizá acabes expulsado injustamente!'),
(9, 'Fortnite', 'Fortnite.jpg', 'Crea, juega y pelea gratis con amigos en Fortnite.\n\nSé el último jugador de pie en Batalla campal y Cero construcción, disfruta de un concierto o evento en vivo, o descubre más de un millón de juegos realizados por creadores, como carreras, parkour, supervivencia contra zombis y más.\n\n¡Todo lo que buscas está en Fortnite!'),
(10, 'Apex Legends', 'ApexLegends.jpg', 'Entra en la experiencia de shooter de héroes de tipo Battle Royale de Respawn Entertainment, el estudio veterano responsable de la serie Titanfall.  \n\nApex Legends es un juego de disparos gratuito con un conjunto de héroes legendarios en constante expansión y de habilidades poderosas finamente ajustadas, repleto de cientos de cosméticos desbloqueables para cazar. \nForma un equipo para pelear por la fama y la fortuna en los márgenes de la Frontera, una región totalmente nueva del universo de Titanfall, y domina una lista de personajes diversos, un juego en equipo exigente y estratégico, y una amplia variedad de innovaciones que buscan revolucionar el género Battle Royale, desde partidas de 60 jugadores hasta modos y capturas por tiempo limitado.'),
(11, 'Valorant', 'Valorant.jpg', 'Combina tu estilo y experiencia en un escenario global y competitivo. Tienes 13 rondas para atacar y defender tu lado con armas precisas y habilidades tácticas. Además, al contar con una sola vida por ronda, tendrás que pensar más rápido que tu oponente si quieres sobrevivir. Enfréntate a enemigos en los modos competitivo y normal, así como en Deathmatch y Spike Rush.'),
(12, 'Minecraft', 'Minecraft.jpg', 'En Minecraft, tu aventura inicia con tu imaginación. Construye todo lo que puedas imaginar con recursos ilimitados en el modo creativo o emprende grandes expediciones en el modo supervivencia, viaja por tierras misteriosas y sumérgete en las profundidades de tus propios mundos infinitos. \n\n¿Te esconderás de los monstruos o crearás herramientas, armaduras y armas para defenderte? ¡No tienes por qué explorar a solas!\n\nCrea, explora y sobrevive a solas o con hasta 7 amigos de PlayStation Network.'),
(13, 'Overwatch', 'Overwatch.jpg', 'Forma equipo con amigos en Overwatch 2, una experiencia gratuita y siempre lista con 301+ héroes increíbles, 20+ mapas globales, seis modos distintos y mucho más. Ya seas un tanque, ataque o apoyo, Overwatch 2 tiene un héroe para ti. \n\nOverwatch 2 continuará evolucionando y expandiéndose con contenido de temporada regular que se lanzará cada nueve semanas. El camino por recorrer está repleto de contenido, objetos estéticos y mapas totalmente nuevos que convertirán la lucha en una verdadera experiencia de exploración. Los nuevos modos hacen que siempre haya una forma novedosa de jugar.'),
(14, 'Doom Eternal', 'DoomEternal.jpg', 'Los ejércitos del infierno invadieron la Tierra. Conviértete en el Slayer en una épica campaña de un jugador para conquistar demonios por dimensiones y detener la destrucción final de la humanidad. Lo único que temen... es a ti.\n\nExperimenta la combinación definitiva de velocidad y potencia en DOOM Eternal: el nuevo salto en combate de avance en primera persona.'),
(15, 'God of War', 'GodOfWar.jpg', 'Kratos vuelve a ser padre. Como mentor y protector de Atreus, un hijo determinado a ganarse el respeto de su padre, se ve obligado a contener la ira que durante tanto tiempo lo ha caracterizado mientras recorre un mundo lleno de peligros junto a su muchacho.\n\nTras cobrarse venganza de los dioses del Olimpo, Kratos ahora vive en el reino de las deidades y los monstruos nórdicos.\n\nEn este mundo hostil y despiadado, debe luchar por sobrevivir y enseñarle a su hijo a hacer lo mismo… pero sin repetir los errores que mancharon de sangre las manos del Fantasma de Esparta.\n\nEsta impactante reinvención de God of War toma todos los aspectos clásicos de la emblemática serie: un combate brutal, épicas luchas de jefes y una escala espectacular, y los combina con una increíble y emotiva trama que redefine el mundo de Kratos. '),
(16, 'The Witcher 3: Wild Hunt', 'TheWitcher3WildHunt.jpg', 'Eres Geralt de Rivia. A tu alrededor, los pueblos y asentamientos de los Reinos del Norte están desapareciendo a manos de un ejército invasor sobrenatural al que se conoce como Cacería salvaje, pues deja un rastro de destrucción y sangre tras su paso.\n\nMientras te preparas para un enfrentamiento encarnizado contra la Cacería salvaje, irás descubriendo una historia compleja y apasionante y conociendo a personajes inolvidables. Al explorar los Reinos del Norte, descubrirás que en cada pueblo y detrás de cada árbol y cada sombra hay misterios.'),
(17, 'Destiny 2', 'Destiny2.jpg', 'Sumérgete en el mundo de Destiny 2 para explorar los misterios del sistema solar y experimenta el MMO de acción definitivo.\n\nÚnete a millones de jugadores, crea a tu guardián y comienza a coleccionar armas y armaduras únicas para personalizar tu aspecto y estilo de juego.\n\nEmbárcate en desafiantes misiones cooperativas y varios modos JcJ competitivos. Experimenta la historia en evolución de Destiny 2 con amigos o explora las estrellas como una escuadra de un miembro. '),
(18, 'Halo Infinite', 'HaloInfinite.jpg', '¡La Temporada 5 ya está disponible!\nLa Temporada 5: Reckoning incluye un nuevo pase de batalla con recompensas con temática de los Flood, nuevos mapas, un nuevo modo de juego y una sofisticada caja de herramientas de IA para la Forja. Más adelante en esta temporada llegará también el modo Tiroteo: Rey de la colina, que ofrece un innovador giro a un clásico modo de supervivencia por oleadas en cooperativo.\nModo multijugador gratuito\nEl famoso modo multijugador de Halo regresa, reinventado y gratuito! Las actualizaciones de cada temporada hacen que la experiencia evolucione con eventos únicos, nuevos modos y mapas, y contenido centrado en la comunidad.\nBeta de la Forja:\nLa legendaria herramienta de creación de contenido de Halo está de vuelta y es más potente que nunca, con funciones avanzadas como un nuevo motor visual de secuencias de comandos, escala de objetos, herramientas de iluminación y audio, así como mejoras notables en la fidelidad y los límites de presupuesto de objetos. La Forja ahora también cuenta con la caja de herramientas de IA para que los jugadores puedan diseñar y añadir unidades de IA a sus creaciones. Ya sea para reconstruir experiencias icónicas de juegos anteriores de Halo o para crear algo completamente único, las posibilidades de inventar mapas y modos de juego personalizados son infinitas.\n\nJuego multigeneración y multiplataforma:'),
(19, 'Fall Guys', 'FallGuys.jpg', 'Fall Guys es un juego de fiesta royale multiplataforma de multijugador masivo donde tú y tus rivales compiten a lo largo de rondas ascendentes de caóticas y absurdas pistas de obstáculos hasta que solo queda un vencedor afortunado.\n\n¿Novato o pro? ¿Solo o en grupo? Fall Guys ofrece una alta concentración en constante cambio de risas y diversión. Lo único más importante que ganar es lucir tan ridículo como posible durante el proceso. ¡Ponte el disfraz más gracioso que tengas porque el espectáculo está por comenzar!'),
(20, 'Battlefield V', 'BattlefieldV.jpg', 'Vive el mayor conflicto de la historia con Battlefield™ V. La serie regresa a sus orígenes con una recreación jamás vista de la 2.ª Guerra Mundial. Disfruta el multijugador masivo con tu escuadrón en el enorme modo Grandes operaciones y el cooperativo Armas combinadas o enfrenta las Historias de guerra para un jugador. Disfruta el Battlefield más completo e inmersivo hasta la fecha en ubicaciones épicas y sorprendentes por todo el mundo. Incluye Tormenta de fuego, el Battle Royale reimaginado para Battlefield.'),
(21, 'Dark Souls', 'DarkSouls.jpg', 'Entonces llegó el Fuego. Vuelve a disfrutar del aclamado juego que definió el género con el que empezó todo. Gracias a una magnífica remasterización, podrás regresar a Lordran con unos impresionantes detalles en alta definición y a 60 fps.\nDARK SOULS: REMASTERED incluye el juego principal y el contenido descargable Artorias of the Abyss.'),
(22, 'Dark Souls 2', 'DarkSouls2.jpg', '- La edición definitiva de DARK SOULS™ II, incluido todo el contenido de DARK SOULS™ II publicado hasta la fecha en un solo paquete, ¡y mucho más!\n\n- Nuevos gráficos. Pasa de los 30 a los 60 FPS con una resolución de 1080p para obtener un nuevo nivel de fluidez. Los jugadores se asombrarán con el contraste dinámico y la fidelidad visual en comparación con el DARK SOULS™ II original.\n\n- Nueva experiencia y nuevos desafíos. Se replanteó la posición de los enemigos, lo que produce una dinámica de juego totalmente distinta a la experimentada anteriormente. ¡Las zonas seguras que recordaban algunos jugadores ya no lo son tanto!\n\nEl juego online se mejoró con la inclusión de un objeto especial para regular las almas obtenidas en batalla ya es posible realizar una búsqueda de jugadores más eficaz en las partidas online. El número de jugadores que pueden participar en una sesión online también aumentó de 4 a 6 personas, lo cual cambia por completo la dinámica del juego online.'),
(23, 'Dark Souls 3', 'DarkSouls3.jpg', 'DARK SOULS™ III, el ganador del premio “Mejor RPG” de Gamescom 2015 y de más de 35 premios y nominaciones del E3 2015, vuelve a superar los límites con su capítulo más nuevo y ambicioso de la serie aclamada por la crítica que redefinió el género.\nCuando se apaga el fuego y el mundo queda en ruinas, comienza tu travesía en un universo lleno de enemigos y ambientes colosales. Los jugadores se verán inmersos en un mundo oscuro con una atmósfera épica, una jugabilidad más rápida y una intensidad de combate amplificada. Los fanáticos y los recién llegados apreciarán por igual la jugabilidad satisfactoria y los gráficos inmersivos que caracterizan a la serie.\n¡Abraza la Oscuridad!'),
(24, 'Sekiro', 'Sekiro.jpg', 'Entra en una nueva experiencia de juego oscura y brutal de los creadores de Bloodborne y la serie Dark Souls.\n\nSekiro: Shadows Die Twice es una aventura de acción intensa en tercera persona ambientada en el sangriento Japón del siglo XIV.  Te pondrás en la piel de un guerrero deshonrado regresado del borde de la muerte cuya misión es rescatar a su maestro y vengarse de su archinémesis.\n\nMientras exploras un vasto mundo interconectado, enfrentarás cara a cara a enemigos míticos y entablarás duelos individuales. Desata un arsenal de armas prostéticas mortíferas y poderosas habilidades ninja para abatir a tus adversarios y combina el sigilo y la verticalidad para propinar la muerte desde las sombras.'),
(25, 'Elden Ring', 'EldenRing.jpg', 'En las Tierras Intermedias gobernadas por la reina Márika la Eterna, el Círculo de Elden, origen del Árbol Áureo, fue destruido.\n\nLos descendientes de Márika, todos semidioses, reclamaron los fragmentos del Círculo de Elden, conocidos como Grandes Ruinas. Fue entonces cuando la demencial corrupción de su renovada fuerza provocó una guerra: La Destrucción. Una guerra que supuso el abandono de la Voluntad Mayor.\n\nY ahora, la gracia que nos guía recaerá sobre el Sinluz desdeñado por la gracia del oro y exiliado de las Tierras Intermedias.\n\nTú que has muerto, pero vives con tu gracia perdida en el tiempo, recorres la senda hacia las Tierras Intermedias más allá del neblinoso mar para postrarte ante el Círculo de Elden.\n\nY conviértete en el señor del Círculo. '),
(26, 'Bloodborne', 'Bloodborne.jpg', 'Enfrenta tus pesadillas mientras buscas respuestas en la antigua ciudad de Yharnam, ahora maldecida por una enfermedad endémica que se propaga por las calles como un fuego arrasador. El peligro, la muerte y la locura merodean en cada esquina de este mundo oscuro y espantoso, y debes descubrir sus secretos más oscuros para poder sobrevivir.\n\n\n- Un nuevo mundo aterrador: Un viaje a una ciudad gótica horrorosa donde las pandillas desquiciadas y las criaturas horripilantes están al acecho en cada esquina.\n- Combate de acción estratégica: Armado con un arsenal de armería exclusivo, con armas y cuchillas, necesitarás ingenio, estrategia y reflejos para acabar con los enemigos ágiles e inteligentes que guardan los oscuros secretos de la ciudad.\n- Una nueva generación de RPG de acción: Entornos góticos asombrosamente detallados, iluminación ambiental y nuevas experiencias de avanzada en línea presentan el poder y las proezas del sistema PlayStation(R)4.\n- Chalice Dungeons en constante cambio para explorar: Usa los cálices sagrados para poder entrar a una red de enormes ruinas subterráneas, repletas de trampas, bestias y recompensas, para explorarla y conquistarla solo o con otros usuarios. Estos calabozos generados por medio de procedimientos ofrecen desafíos totalmente nuevos a dominar y los puedes cargar o compartir con tus amigos.'),
(27, 'Nier Automata', 'NierAutomata.jpg', 'NieR:Automata™ Game of the YoRHa Edition incluye el juego y un montón de contenidos descargables adicionales para disfrutar de este premiado juego de rol y acción posapocalíptico en todo su esplendor:\n\n• DLC 3C3C1D119440927*\n• Pod consola\n• Pod caja\n• Pod retro gris\n• Pod retro rojo\n• Grimoire Weiss\n• Cabeza de amazarashi\n• Máscara máquina\n• Tema dinámico para PS4™\n• Avatares para PS4™\n\n*Para disfrutar de estos contenidos tendrás que haber alcanzado un determinado punto de la historia principal del juego. Hay ciertas escenas de la historia principal en las que no es posible acceder a estos contenidos.\n\nUnos invasores de otro mundo han atacado inesperadamente desplegando su arma secreta: unas formas de vida mecánicas. Para obtener ventaja, se despliega una nueva unidad de infantería androide denominada YoRHa. NieR:Automata™, que ha recibido numerosos premios y críticas positivas, es un novedoso juego de rol que combina a la perfección una acción y una historia fascinantes.'),
(28, 'Devil May Cry V', 'DevilMayCryV.jpg', '¡¡DEVIL MAY CRY HA VUELTO, COLEGA!! Este legendario juego de acción espectacular regresa mejor que nunca en la versión definitiva de este galardonado superéxito.\n\nNuevas características:\n\n-Nuevo personaje jugable: el hermano y archirrival de Dante, Vergil\n- Modo Caballero oscuro legendario: un modo tipo horda extremadamente desafiante, con montones de enemigos\n- Modo Turbo: haz el juego aún más emocionante multiplicando la velocidad x1,2\n- Compatibilidad con trazado de rayos: esta tecnología de nueva generación lleva el ya prácticamente fotorrealista mundo de DMC5 a un nuevo nivel de incomparable espectacularidad gráfica sin parangón\n- Modo Alta frecuencia gráfica: para una acción superfluida\n\nNota: ciertos trofeos no pueden obtenerse jugando como Vergil.'),
(29, 'Bayonetta 2', 'Bayonetta2.jpg', 'Nacida de la unión prohibida entre los Sabios de Lumen y las Brujas de Umbra, la poderosa bruja Bayonetta viaja desde un pasado lejano al tiempo presente. Con su grácil estilo de lucha e incomparables poderes mágicos, es capaz de cautivar y aterrorizar a sus enemigos en sus momentos finales.\n\nArmada con mortales armas y habilidades, Bayonetta abruma a sus rivales con sus movimientos y ataques. Gracias a la magia, puede desatar una habilidad llamada Clímax de Umbra para invocar monstruos demoníacos y propinar poderosos ataques repetidamente.'),
(30, 'Rise Of The Tomb Raider', 'RiseOfTheTombRaider.jpg', 'Rise of the Tomb Raider: 20º aniversario incluye el aclamado juego nominado a más de 75 premios, Rise of the Tomb Raider, en el que Lara Croft se convierte en una superviviente en su primera expedición como saqueadora de tumbas en las zonas más peligrosas y remotas de Siberia.\n\nRise of the Tomb Raider: 20º aniversario también incluye nuevo contenido para un jugador “Lazos de sangre”, soporte para realidad virtual, nuevo modo Aguante cooperativo, nuevo modo de dificultad “Superviviente definitiva” para la campaña, el atuendo y la pistola del 20º aniversario y 5 atuendos clásicos de Lara. También todos los contenidos descargables lanzados previamente, como: Baba Yaga: El templo de la bruja, modo Aguante, El despertar de la fría oscuridad, 12 atuendos, 7 armas y 35 tarjetas de expedición. Con más de 50 horas de juego, es la versión más completa de la premiada experiencia.'),
(31, 'Shadow Of The Tomb Raider', 'ShadowOfTheTombRaider.jpg', 'Vive el momento más crucial de Lara Croft. En Shadow of the Tomb Raider, Lara debe dominar una selva mortal, superar tumbas aterradoras y perseverar en su hora más aciaga. Mientras trata de detener un apocalipsis maya, deberá convertirse en la saqueadora de tumbas que está destinada a ser.\n\nLucha por la supervivencia: domina la selva para sobrevivir. Explora entornos subacuáticos llenos de cavidades y profundos sistemas de túneles.\nSé uno con la selva: Lara debe aprovecharla para atacar y desaparecer como un jaguar, aterrando a sus enemigos.\nDescubre tumbas aterradoras y repletas de puzles letales que requieren técnicas avanzadas para acceder a ellas.\nDesentierra la historia viva: descubre la Ciudad Oculta y explora la mayor instalación jamás vista en Tomb Raider.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `fk_compras_videojuegos` (`id_videojuego`),
  ADD KEY `fk_compras_plataformas` (`id_plataforma`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_videojuego`,`id_plataforma`),
  ADD KEY `id_plataforma` (`id_plataforma`);

--
-- Indices de la tabla `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_videojuego` (`id_videojuego`),
  ADD KEY `id_plataforma` (`id_plataforma`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_compras_plataformas` FOREIGN KEY (`id_plataforma`) REFERENCES `plataformas` (`id`),
  ADD CONSTRAINT `fk_compras_videojuegos` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`id_plataforma`) REFERENCES `plataformas` (`id`);

--
-- Filtros para la tabla `keys`
--
ALTER TABLE `keys`
  ADD CONSTRAINT `keys_ibfk_1` FOREIGN KEY (`id_videojuego`) REFERENCES `videojuegos` (`id`),
  ADD CONSTRAINT `keys_ibfk_2` FOREIGN KEY (`id_plataforma`) REFERENCES `plataformas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
