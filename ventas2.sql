-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2019 a las 04:32:34
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
(3, 3, 3, 1, 'Cuadernos', 'Rallado', 50, 2.5, '2019-08-12'),
(4, 4, 4, 1, 'Cartulina', 'Blanca', 80, 0.35, '2019-08-12'),
(6, 1, 6, 1, 'Clip', 'Normales', 50, 0.15, '2019-08-12'),
(7, 2, 7, 1, 'Alicia', 'FantasÃ­a y felicidad', 150, 15, '2019-08-12'),
(8, 2, 8, 1, 'Ciudades de papel', 'Cuento de realidad clasica', 45, 60, '2019-08-12'),
(9, 1, 9, 1, 'Engrapadora', '50/60 paginas', 20, 5.75, '2019-08-12'),
(10, 1, 10, 1, 'Perforadora', '30/40 paginas', 20, 4.6, '2019-08-12'),
(11, 2, 11, 1, 'Estrategias', 'Aprende a resolver muchos problemas con estrategia ', 20, 55, '2019-08-12'),
(12, 2, 12, 1, 'Principito', 'Libro de fantacia', 50, 5.5, '2019-08-12'),
(13, 3, 13, 1, 'Colores', 'Facela, la mejor marca', 70, 2.35, '2019-08-12'),
(14, 3, 14, 1, 'Compas', 'PequeÃ±o', 25, 1.75, '2019-08-12'),
(15, 3, 15, 1, 'GeometrÃ­a', 'Estuche de GeometrÃ­a completo', 25, 5.75, '2019-08-12'),
(16, 3, 16, 1, 'Lapiz', 'Facela, la mejor marca', 1000, 0.15, '2019-08-12'),
(20, 1, 20, 0, 'Ram', 'ram 4gb', 130, 50, '2019-08-14'),
(21, 3, 21, 3, 'Bic intenso', 'Lapicero bic punta gruesa', 100, 0.2, '2019-08-18');

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
(4, 1, 'Papeleria', '2019-08-12');

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
  `dui` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `apellido`, `direccion`, `email`, `telefono`, `dui`) VALUES
(5, 'julio', 'rivas', 'san miguel', 'no tiene', '72828007', '054616465'),
(6, 'mauricio', 'cruz', 'lolotique', 'mcruz@gmail.com', '75220232', '02466425-0'),
(14, 'Antonio', 'Romero', 'Santiago de Maria', 'anromero@gmail.com', '22577777', '04581237-2'),
(16, 'Ana', 'Canales', 'Bo. San Nicolas', 'ana@hotmail.com', '70000001', '05426485-0');

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
(3, 3, 'cuadernos.png', '../../archivos/cuadernos.png', '2019-08-12'),
(4, 4, 'carulina.png', '../../archivos/carulina.png', '2019-08-12'),
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
(20, 1, 'ram.jpg', '../../archivos/ram.jpg', '2019-08-14'),
(21, 3, 'lapicero.png', '../../archivos/lapicero.png', '2019-08-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `fechaPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `id_producto`, `id_usuario`, `precio`, `fechaPedido`) VALUES
(1, 0, 7, 3, 15, 2019),
(2, 0, 6, 3, 0, 2019);

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
(8, 'cliente', 'cliente', 'cliente', '8cb2237d0679ca88db6464eac60da96345513964', 3, 0, '2019-08-18'),
(9, 'yenifer', 'calderon', 'yeni', 'aa342f5cc82d97b096efc2df70651a8a2de6b06f', 0, 0, '2019-08-18'),
(10, 'yeni', 'calderon', 'yeni', 'aa342f5cc82d97b096efc2df70651a8a2de6b06f', 3, 0, '2019-08-18'),
(11, 'sofia', 'sofia', 'sofia', 'bb4cc6ab038155f5c550175a090fbb3da5c9b762', 3, 0, '2019-08-18'),
(12, 'jose', 'jose', 'jose', '4a3487e57d90e2084654b6d23937e75af5c8ee55', 3, 0, '2019-08-18'),
(13, 'edwin', 'edwin', 'edwin', '3c7a591985b5e780ebcc40916fdeb443b8541c2a', 3, 0, '2019-08-18'),
(14, 'elias', 'elias', 'elias', '31cc0cbf2a284c9e9ab9489a1b9d091fc8f6c726', 3, 0, '2019-08-18'),
(15, 'carolina', 'alvarado', 'caroal@hotmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1, 0, '2019-08-18'),
(16, 'ruth', 'rivas', 'ruth', 'b69f673cb3a23c41a5673e788cdfbc767a959e52', 3, 0, '2019-08-18'),
(17, 'carlos', 'sagastizado', 'carlos@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 2, 0, '2019-08-18');

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
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `fechaCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `id_cliente`, `id_producto`, `id_usuario`, `precio`, `cantidad`, `fechaCompra`) VALUES
(1, 0, 3, 0, 2.5, 1, '2019-08-14'),
(2, 3, 11, 0, 55, 1, '2019-08-14'),
(3, 8, 5, 0, 0.25, 1, '2019-08-16'),
(4, 6, 19, 0, 0.15, 1, '2019-08-16'),
(4, 6, 19, 0, 0.15, 1, '2019-08-16'),
(5, 8, 8, 0, 60, 1, '2019-08-16'),
(6, 12, 3, 0, 2.5, 1, '2019-08-16'),
(6, 12, 3, 0, 2.5, 1, '2019-08-16'),
(7, 14, 3, 0, 2.5, 1, '2019-08-16'),
(8, 14, 10, 0, 4.6, 1, '2019-08-16'),
(8, 14, 10, 0, 4.6, 1, '2019-08-16'),
(9, 4, 8, 0, 60, 1, '2019-08-16'),
(10, 4, 10, 0, 4.6, 1, '2019-08-16'),
(11, 9, 12, 0, 5.5, 1, '2019-08-16'),
(12, 10, 3, 3, 2.5, 1, '2019-08-16'),
(13, 5, 10, 3, 4.6, 1, '2019-08-16'),
(14, 0, 2, 3, 25, 1, '2019-08-16'),
(15, 3, 2, 3, 25, 1, '2019-08-17'),
(15, 3, 5, 3, 0.25, 1, '2019-08-17'),
(15, 3, 3, 3, 2.5, 1, '2019-08-17'),
(16, 5, 3, 3, 2.5, 1, '2019-08-18'),
(16, 5, 10, 3, 4.6, 1, '2019-08-18'),
(17, 5, 21, 2, 0.2, 1, '2019-08-18'),
(18, 0, 4, 3, 0.35, 1, '2019-08-19'),
(18, 0, 3, 3, 2.5, 1, '2019-08-19'),
(18, 0, 6, 3, 0.15, 1, '2019-08-19');

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
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
