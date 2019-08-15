-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2019 a las 05:03:38
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_imagen` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_producto`, `id_categoria`, `id_imagen`, `id_usuario`, `nombre`, `descripcion`, `cantidad`, `precio`, `fechaCaptura`) VALUES
(1, 1, 1, 1, 'Tijera', 'PequeÃ±a para uso fÃ¡cil', 100, 5, '2019-08-12'),
(2, 2, 2, 1, 'El cipitillo', 'Libro para niÃ±os ', 5, 25, '2019-08-12'),
(3, 3, 3, 1, 'Cuadernos', 'Rallado', 50, 2.5, '2019-08-12'),
(4, 4, 4, 1, 'Cartulina', 'Blanca', 80, 0.35, '2019-08-12'),
(5, 4, 5, 1, 'Folder', 'TamaÃ±o carta', 50, 0.25, '2019-08-12'),
(6, 1, 6, 1, 'Clic', 'Normales', 50, 0.15, '2019-08-12'),
(7, 2, 7, 1, 'Alicia', 'FantasÃ­a y felicidad', 150, 15, '2019-08-12'),
(8, 2, 8, 1, 'Ciudades de papel', 'Cuento de realidad clasica', 45, 60, '2019-08-12'),
(9, 1, 9, 1, 'Engrapadora', 'Grande', 20, 5.75, '2019-08-12'),
(10, 1, 10, 1, 'Perforadora', 'Grande', 20, 4.6, '2019-08-12'),
(11, 2, 11, 1, 'Estrategias', 'Aprende a resolver muchos problemas con estrategia ', 20, 55, '2019-08-12'),
(12, 2, 12, 1, 'Principito', 'Libro de fantacia', 50, 5.5, '2019-08-12'),
(13, 3, 13, 1, 'Colores', 'Facela, la mejor marca', 70, 2.35, '2019-08-12'),
(14, 3, 14, 1, 'Compas', 'PequeÃ±o', 25, 1.75, '2019-08-12'),
(15, 3, 15, 1, 'GeometrÃ­a', 'Estuche de GeometrÃ­a completo', 25, 5.75, '2019-08-12'),
(16, 3, 16, 1, 'Lapiz', 'Facela, la mejor marca', 1000, 0.15, '2019-08-12'),
(17, 4, 17, 1, 'Bond papel', 'Papel de color', 50, 5.75, '2019-08-12'),
(18, 4, 18, 1, 'Cuadriculas', 'PÃ¡ginas cuadriculadas', 60, 0.2, '2019-08-12'),
(19, 4, 19, 0, 'Papel de color', 'papel bond de color', 200, 0.15, '2019-08-13'),
(20, 1, 20, 0, 'ram', 'ram 4gb', 130, 50, '2019-08-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombreCategoria` varchar(150) DEFAULT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `id_usuario`, `nombreCategoria`, `fechaCaptura`) VALUES
(1, 1, 'Oficina', '2019-08-12'),
(2, 1, 'Libros', '2019-08-12'),
(3, 1, 'Estudiantes', '2019-08-12'),
(4, 1, 'Papeleria', '2019-08-12'),
(5, 0, 'libros terror', '2019-08-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido` varchar(200) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `telefono` varchar(200) DEFAULT NULL,
  `rfc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `direccion`, `email`, `telefono`, `rfc`) VALUES
(3, 'julio', 'rivas', 'san miguel', 'no tiene', '72828007', '054616465'),
(4, 'julio', 'rivas', 'san miguel', 'no tiene', '72828007', '054616465'),
(5, 'julio', 'rivas', 'san miguel', 'no tiene', '72828007', '054616465'),
(6, 'mauricio', 'cruz', 'lolotique', 'hola', '75220232', '024664'),
(7, 'mauricio', 'cruz', 'lolotique', 'hola', '75220232', '024664'),
(8, 'mauricio', 'cruz', 'lolotique', 'hola', '75220232', '024664'),
(9, 'mauricio', 'cruz', 'lolotique', 'hola', '75220232', '024664'),
(10, 'mauricio', 'cruz', 'lolotique', 'hola', '75220232', '024664'),
(11, 'mauricio', 'cruz', 'lolotique', 'hola', '75220232', '024664'),
(12, 'u', 'u', 'u', 'u', 'u', 'u'),
(13, 'o', 'o', 'o', 'o', 'o', 'o'),
(14, 'hola', 'hola', 'hola', 'hola', 'hola', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `fechaSubida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `id_categoria`, `nombre`, `ruta`, `fechaSubida`) VALUES
(1, 1, 'tijera.png', '../../archivos/tijera.png', '2019-08-12'),
(2, 2, 'cipitio.jpg', '../../archivos/cipitio.jpg', '2019-08-12'),
(3, 3, 'cuadernos.png', '../../archivos/cuadernos.png', '2019-08-12'),
(4, 4, 'carulina.png', '../../archivos/carulina.png', '2019-08-12'),
(5, 4, 'Folder.png', '../../archivos/Folder.png', '2019-08-12'),
(6, 1, 'clip.png', '../../archivos/clip.png', '2019-08-12'),
(7, 2, 'alicia.png', '../../archivos/alicia.png', '2019-08-12'),
(8, 1, 'ciudades-de-papel.png', '../../archivos/ciudades-de-papel.png', '2019-08-12'),
(9, 1, 'engrapadora.png', '../../archivos/engrapadora.png', '2019-08-12'),
(10, 1, 'perforadora.png', '../../archivos/perforadora.png', '2019-08-12'),
(11, 2, 'estrategias.png', '../../archivos/estrategias.png', '2019-08-12'),
(12, 2, 'Principito.jpg', '../../archivos/Principito.jpg', '2019-08-12'),
(13, 3, 'colores.png', '../../archivos/colores.png', '2019-08-12'),
(14, 3, 'compas.png', '../../archivos/compas.png', '2019-08-12'),
(15, 3, 'geometria.png', '../../archivos/geometria.png', '2019-08-12'),
(16, 3, 'lapiz.png', '../../archivos/lapiz.png', '2019-08-12'),
(17, 4, 'bond-color.png', '../../archivos/bond-color.png', '2019-08-12'),
(18, 4, 'cuadriculas.jpg', '../../archivos/cuadriculas.jpg', '2019-08-12'),
(19, 4, 'bond-color.png', '../../archivos/bond-color.png', '2019-08-13'),
(20, 1, 'ram.jpg', '../../archivos/ram.jpg', '2019-08-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` tinytext,
  `tipo` int(50) NOT NULL,
  `estado` int(50) NOT NULL,
  `fechaCaptura` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `email`, `password`, `tipo`, `estado`, `fechaCaptura`) VALUES
(1, 'Carlos', 'Sagastizado', 'sagas1416', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 1, '2019-08-12'),
(2, 'sara', 'rivas', 'sarairivas', '8cb2237d0679ca88db6464eac60da96345513964', 2, 0, '2019-08-13'),
(3, 'carlos', 'carlos', 'carlos1', 'ab5e2bca84933118bbc9d48ffaccce3bac4eeb64', 1, 0, '2019-08-13'),
(4, 'alba', 'decoo', 'alba16', 'c474c5338fd7280ce2797ca8be4e29c8f3e519ca', 3, 0, '2019-08-13'),
(5, 'yo', 'yo', 'yo', 'c41975d1dae1cc69b16ad8892b8c77164e84ca39', 0, 0, '2019-08-13'),
(6, 'ella', 'ella', 'ella', '5edf31da3f42a518437a149eb6d70cd01c02c3cd', 0, 0, '2019-08-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `fechaCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_producto`, `id_usuario`, `precio`, `fechaCompra`) VALUES
(1, 0, 3, 0, 2.5, '2019-08-14'),
(2, 3, 11, 0, 55, '2019-08-14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
