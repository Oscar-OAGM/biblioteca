-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2023 a las 02:57:50
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blibioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cliente_id` int(11) NOT NULL,
  `isbn_libro` int(11) DEFAULT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `correo_electronico` varchar(250) DEFAULT NULL,
  `descrpcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cliente_id`, `isbn_libro`, `nombre`, `telefono`, `direccion`, `correo_electronico`, `descrpcion`) VALUES
(1, 1, 'Juan', 12345678, 'Villa Canales', 'juanc@gmail.com', 'Conserje'),
(1234, 1, 'Oscar', 51025975, '3ra calle a 7-90', 'gmoadrian05@gmail.com', 'Jefe'),
(3121, 1, 'Pedro', 23123312, 'Villa Hermosa', 'pedro02@gmail,com', 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_libro`
--

CREATE TABLE `cliente_libro` (
  `cliente_id` int(11) NOT NULL,
  `isbn_libro` int(11) DEFAULT NULL,
  `cantidad_unidades` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente_libro`
--

INSERT INTO `cliente_libro` (`cliente_id`, `isbn_libro`, `cantidad_unidades`) VALUES
(1, 1, 6),
(1234, 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libreria`
--

CREATE TABLE `libreria` (
  `cliente_id` int(11) NOT NULL,
  `encargado` varchar(250) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `nif` varchar(250) DEFAULT NULL,
  `dueno` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libreria`
--

INSERT INTO `libreria` (`cliente_id`, `encargado`, `descuento`, `nif`, `dueno`) VALUES
(1, 'Juan', 25, '9912-A', 'Oscar'),
(1234, 'Samuel', 12, '9912-V', 'Samantha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `isbn_libro` int(11) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL,
  `pvp` int(11) DEFAULT NULL,
  `ano_edicion` int(11) DEFAULT NULL,
  `paginas` int(11) DEFAULT NULL,
  `codigo_barra` int(11) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`isbn_libro`, `nombre`, `pvp`, `ano_edicion`, `paginas`, `codigo_barra`, `descripcion`) VALUES
(1, 'Oscar', 2, 1993, 100, 123412, 'Libro de Sociales'),
(2, 'Juan', 2, 2005, 150, 234561, 'Libro de Matematica'),
(3, 'Samuel', 3, 2000, 412, 1234215, 'Libro de Ciencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `particular`
--

CREATE TABLE `particular` (
  `cliente_id` int(11) NOT NULL,
  `apellidos` varchar(250) DEFAULT NULL,
  `dni` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `particular`
--

INSERT INTO `particular` (`cliente_id`, `apellidos`, `dni`) VALUES
(1, 'gomez', '577'),
(1234, 'juan', '00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `pedido_id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `isbn_libro` int(11) DEFAULT NULL,
  `importe` int(11) DEFAULT NULL,
  `forma_pago` varchar(250) DEFAULT NULL,
  `objeto_adjunto` varchar(250) DEFAULT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `fecha_envio` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`pedido_id`, `cliente_id`, `isbn_libro`, `importe`, `forma_pago`, `objeto_adjunto`, `fecha_entrada`, `fecha_envio`, `fecha_entrega`, `fecha_pago`) VALUES
(2, 1, 1, 214, 'Efectivo', 'Libro', '2023-07-20', '2023-07-26', '2023-08-05', '2023-08-04'),
(40, 1, 1, 214, 'Efectivo', 'Droga', '2023-07-19', '2023-07-22', '2023-07-28', '2023-07-27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cliente_id`),
  ADD KEY `isbn_FK` (`isbn_libro`);

--
-- Indices de la tabla `cliente_libro`
--
ALTER TABLE `cliente_libro`
  ADD PRIMARY KEY (`cliente_id`),
  ADD KEY `libro_fk` (`isbn_libro`);

--
-- Indices de la tabla `libreria`
--
ALTER TABLE `libreria`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`isbn_libro`);

--
-- Indices de la tabla `particular`
--
ALTER TABLE `particular`
  ADD PRIMARY KEY (`cliente_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedido_id`),
  ADD KEY `cliente4_fk` (`cliente_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `isbn_FK` FOREIGN KEY (`isbn_libro`) REFERENCES `libro` (`isbn_libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_libro`
--
ALTER TABLE `cliente_libro`
  ADD CONSTRAINT `cliente3_FK` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_fk` FOREIGN KEY (`isbn_libro`) REFERENCES `libro` (`isbn_libro`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libreria`
--
ALTER TABLE `libreria`
  ADD CONSTRAINT `cliente_FK` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `particular`
--
ALTER TABLE `particular`
  ADD CONSTRAINT `cliente2_FK` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `cliente4_fk` FOREIGN KEY (`cliente_id`) REFERENCES `cliente_libro` (`cliente_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
