-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-06-2017 a las 23:17:53
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ResidenciaTapPatio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Aprobacion`
--

CREATE TABLE `Aprobacion` (
  `IdAprobacion` int(11) NOT NULL,
  `NombreSupervisor` varchar(45) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Barriles`
--

CREATE TABLE `Barriles` (
  `ID_Barriles` int(11) NOT NULL,
  `Folio_Barril` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_Barril` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `RelacionCantidad` int(11) NOT NULL,
  `Fecha_Recibo` date NOT NULL,
  `Fecha_Caducidad` date NOT NULL,
  `LitrosRecibidos` float NOT NULL,
  `Proveedor` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cantidad`
--

CREATE TABLE `Cantidad` (
  `ID_litros` int(11) NOT NULL,
  `Cantidad_Existente_MiliLitros` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE `Categorias` (
  `IdCategoria1` int(11) NOT NULL,
  `NombreCategoria` varchar(25) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Categorias`
--

INSERT INTO `Categorias` (`IdCategoria1`, `NombreCategoria`) VALUES
(16, 'Vinos'),
(17, 'CervezaArtesanal'),
(18, 'ComidaRapida'),
(19, 'Tarro'),
(20, 'CervezaComercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CategoriasVenTurno`
--

CREATE TABLE `CategoriasVenTurno` (
  `IDCategoriasVendidas` int(11) NOT NULL,
  `NombreCategoria` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `NumeroVendidos` varchar(45) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DatosCorte`
--

CREATE TABLE `DatosCorte` (
  `ID_Corte` int(11) NOT NULL,
  `Nombre_Cajero` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `NumClientes` int(11) NOT NULL,
  `Dolares_Recibidos` float NOT NULL,
  `Dolares_Retirados` float NOT NULL,
  `Efectivo_Recibidos` float NOT NULL,
  `Efectivo_retirados` float NOT NULL,
  `Total_corte` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Datosrecibo`
--

CREATE TABLE `Datosrecibo` (
  `ID_Recibo` int(11) NOT NULL,
  `Fecha_Recibo` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_empleado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `SubTotal` float NOT NULL,
  `IVA` float NOT NULL,
  `Total` float NOT NULL,
  `Efectivo_Recibido` float NOT NULL,
  `Dolares_Recibido` float NOT NULL,
  `Cambio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Dias_Vigentes`
--

CREATE TABLE `Dias_Vigentes` (
  `ID_Dia` int(11) NOT NULL,
  `Nombre_Dia` varchar(10) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Dolar`
--

CREATE TABLE `Dolar` (
  `ID_Dolar` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Personal`
--

CREATE TABLE `Personal` (
  `IdPersonal` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Personal`
--

INSERT INTO `Personal` (`IdPersonal`, `Nombre`) VALUES
(1, 'Uriel Ventura'),
(2, 'Atziara Patron'),
(3, 'Noe godinez'),
(4, 'Alejandra'),
(5, 'Diana Solano'),
(6, 'atziara patron'),
(7, 'pako');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `ID_Productos` int(11) NOT NULL,
  `Nombre_Producto` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `Precio` float NOT NULL,
  `Descripcion` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `Categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Productos`
--

INSERT INTO `Productos` (`ID_Productos`, `Nombre_Producto`, `Precio`, `Descripcion`, `Categoria`) VALUES
(1, 'Alejandra', 45, 'q', 16),
(2, 'totopos', 12.3, '222', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ProductosBebibles`
--

CREATE TABLE `ProductosBebibles` (
  `IdProductosBebibles` int(11) NOT NULL,
  `NombreBebida` varchar(60) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `Descripcion` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Categoria` int(11) DEFAULT NULL,
  `Cantidad` float DEFAULT NULL,
  `CantidadExistente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ProductosVendidos`
--

CREATE TABLE `ProductosVendidos` (
  `ID_ProductosVendidos` int(11) NOT NULL,
  `NombreProducto` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Promos`
--

CREATE TABLE `Promos` (
  `ID_Promo` int(11) NOT NULL,
  `Nombre_Promo` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `Descripcion_Promo` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `Precio` float NOT NULL,
  `ID_Categoriap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Retiro`
--

CREATE TABLE `Retiro` (
  `ID_Retiro` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_Empleado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Cantidad` float NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Numero_ID` int(11) NOT NULL,
  `IdAprobacionRel` int(11) NOT NULL,
  `NumeroSesion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Sesion`
--

CREATE TABLE `Sesion` (
  `IdSesion` int(11) NOT NULL,
  `Usuario` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Estado` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `DolarActual` float NOT NULL,
  `EfectivoActual` float NOT NULL,
  `NumeroClientes` int(11) NOT NULL,
  `VentaTotalActualE` float NOT NULL,
  `VentaTotalActualD` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TablaProducto`
--

CREATE TABLE `TablaProducto` (
  `ID_Producto` int(11) NOT NULL,
  `Nombre_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TablaRelacion1Dias`
--

CREATE TABLE `TablaRelacion1Dias` (
  `ID_RelacionDia` int(11) NOT NULL,
  `RelacionIDPromo` int(11) NOT NULL,
  `RelacionIDdia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TablaRelacion2Recibo`
--

CREATE TABLE `TablaRelacion2Recibo` (
  `ID_Relacion2Recibo` int(11) NOT NULL,
  `ID_Recibo` int(11) NOT NULL,
  `ID_Productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TablaRelacion3Categorias`
--

CREATE TABLE `TablaRelacion3Categorias` (
  `ID_Relacion3Categoria` int(11) NOT NULL,
  `ID_Corte` int(11) NOT NULL,
  `ID_CategoriasVen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tabla_RelacionPromo_Produc`
--

CREATE TABLE `Tabla_RelacionPromo_Produc` (
  `ID_Relacion` int(11) NOT NULL,
  `ID_Producto` int(11) NOT NULL,
  `ID_Promo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tabla_TipoCambio`
--

CREATE TABLE `Tabla_TipoCambio` (
  `ID_TipoCambio` int(11) NOT NULL,
  `Tipo_Cambio` varchar(45) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TipoUsuario`
--

CREATE TABLE `TipoUsuario` (
  `IdTipoUsuario` int(11) NOT NULL,
  `Tipo` varchar(50) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `TipoUsuario`
--

INSERT INTO `TipoUsuario` (`IdTipoUsuario`, `Tipo`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `IdUsuarios` int(11) NOT NULL,
  `NumUsuario` int(11) NOT NULL,
  `Password` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `IdPersonal` int(11) NOT NULL,
  `IdTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`IdUsuarios`, `NumUsuario`, `Password`, `IdPersonal`, `IdTipo`) VALUES
(1, 1170390, '06d75ffee9776ad3b5551404e88b8125871c12a8', 1, 1),
(7, 12345678, '95fc1befa0cc68ea265157fa5ab94f5dc397a3dd', 7, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Aprobacion`
--
ALTER TABLE `Aprobacion`
  ADD PRIMARY KEY (`IdAprobacion`);

--
-- Indices de la tabla `Barriles`
--
ALTER TABLE `Barriles`
  ADD PRIMARY KEY (`ID_Barriles`),
  ADD KEY `Relacion_Cantidad_idx` (`RelacionCantidad`);

--
-- Indices de la tabla `Cantidad`
--
ALTER TABLE `Cantidad`
  ADD PRIMARY KEY (`ID_litros`);

--
-- Indices de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  ADD PRIMARY KEY (`IdCategoria1`);

--
-- Indices de la tabla `CategoriasVenTurno`
--
ALTER TABLE `CategoriasVenTurno`
  ADD PRIMARY KEY (`IDCategoriasVendidas`);

--
-- Indices de la tabla `DatosCorte`
--
ALTER TABLE `DatosCorte`
  ADD PRIMARY KEY (`ID_Corte`);

--
-- Indices de la tabla `Datosrecibo`
--
ALTER TABLE `Datosrecibo`
  ADD PRIMARY KEY (`ID_Recibo`);

--
-- Indices de la tabla `Dias_Vigentes`
--
ALTER TABLE `Dias_Vigentes`
  ADD PRIMARY KEY (`ID_Dia`);

--
-- Indices de la tabla `Dolar`
--
ALTER TABLE `Dolar`
  ADD PRIMARY KEY (`ID_Dolar`);

--
-- Indices de la tabla `Personal`
--
ALTER TABLE `Personal`
  ADD PRIMARY KEY (`IdPersonal`);

--
-- Indices de la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD PRIMARY KEY (`ID_Productos`),
  ADD KEY `Categoria_idx` (`Categoria`);

--
-- Indices de la tabla `ProductosBebibles`
--
ALTER TABLE `ProductosBebibles`
  ADD PRIMARY KEY (`IdProductosBebibles`),
  ADD KEY `CategoriaB_idx` (`Categoria`),
  ADD KEY `CantidadB_idx` (`CantidadExistente`);

--
-- Indices de la tabla `ProductosVendidos`
--
ALTER TABLE `ProductosVendidos`
  ADD PRIMARY KEY (`ID_ProductosVendidos`);

--
-- Indices de la tabla `Promos`
--
ALTER TABLE `Promos`
  ADD PRIMARY KEY (`ID_Promo`),
  ADD KEY `ID_Categoria_idx` (`ID_Categoriap`);

--
-- Indices de la tabla `Retiro`
--
ALTER TABLE `Retiro`
  ADD PRIMARY KEY (`ID_Retiro`),
  ADD KEY `Relacion_TipoCambio_idx` (`Tipo`),
  ADD KEY `Relacion_Aprobacion_idx` (`IdAprobacionRel`);

--
-- Indices de la tabla `Sesion`
--
ALTER TABLE `Sesion`
  ADD PRIMARY KEY (`IdSesion`);

--
-- Indices de la tabla `TablaProducto`
--
ALTER TABLE `TablaProducto`
  ADD PRIMARY KEY (`ID_Producto`);

--
-- Indices de la tabla `TablaRelacion1Dias`
--
ALTER TABLE `TablaRelacion1Dias`
  ADD PRIMARY KEY (`ID_RelacionDia`),
  ADD KEY `RelacionPromo_idx` (`RelacionIDPromo`),
  ADD KEY `RelacionDia_idx` (`RelacionIDdia`);

--
-- Indices de la tabla `TablaRelacion2Recibo`
--
ALTER TABLE `TablaRelacion2Recibo`
  ADD PRIMARY KEY (`ID_Relacion2Recibo`),
  ADD KEY `Relacion_recibo_idx` (`ID_Recibo`),
  ADD KEY `Relacion_Producto_idx` (`ID_Productos`);

--
-- Indices de la tabla `TablaRelacion3Categorias`
--
ALTER TABLE `TablaRelacion3Categorias`
  ADD PRIMARY KEY (`ID_Relacion3Categoria`),
  ADD KEY `RelacionCorte_idx` (`ID_Corte`),
  ADD KEY `RelacionCategoria_idx` (`ID_CategoriasVen`);

--
-- Indices de la tabla `Tabla_RelacionPromo_Produc`
--
ALTER TABLE `Tabla_RelacionPromo_Produc`
  ADD PRIMARY KEY (`ID_Relacion`),
  ADD KEY `RelacionProducto_idx` (`ID_Producto`),
  ADD KEY `RelacionProm_idx` (`ID_Promo`);

--
-- Indices de la tabla `Tabla_TipoCambio`
--
ALTER TABLE `Tabla_TipoCambio`
  ADD PRIMARY KEY (`ID_TipoCambio`);

--
-- Indices de la tabla `TipoUsuario`
--
ALTER TABLE `TipoUsuario`
  ADD PRIMARY KEY (`IdTipoUsuario`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`IdUsuarios`),
  ADD KEY `Personal_idx` (`IdPersonal`),
  ADD KEY `TipoUsuario_idx` (`IdTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Aprobacion`
--
ALTER TABLE `Aprobacion`
  MODIFY `IdAprobacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Barriles`
--
ALTER TABLE `Barriles`
  MODIFY `ID_Barriles` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Cantidad`
--
ALTER TABLE `Cantidad`
  MODIFY `ID_litros` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  MODIFY `IdCategoria1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `CategoriasVenTurno`
--
ALTER TABLE `CategoriasVenTurno`
  MODIFY `IDCategoriasVendidas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `DatosCorte`
--
ALTER TABLE `DatosCorte`
  MODIFY `ID_Corte` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Datosrecibo`
--
ALTER TABLE `Datosrecibo`
  MODIFY `ID_Recibo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Dias_Vigentes`
--
ALTER TABLE `Dias_Vigentes`
  MODIFY `ID_Dia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Dolar`
--
ALTER TABLE `Dolar`
  MODIFY `ID_Dolar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Personal`
--
ALTER TABLE `Personal`
  MODIFY `IdPersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `Productos`
--
ALTER TABLE `Productos`
  MODIFY `ID_Productos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ProductosBebibles`
--
ALTER TABLE `ProductosBebibles`
  MODIFY `IdProductosBebibles` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ProductosVendidos`
--
ALTER TABLE `ProductosVendidos`
  MODIFY `ID_ProductosVendidos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Promos`
--
ALTER TABLE `Promos`
  MODIFY `ID_Promo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Retiro`
--
ALTER TABLE `Retiro`
  MODIFY `ID_Retiro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Sesion`
--
ALTER TABLE `Sesion`
  MODIFY `IdSesion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `TablaProducto`
--
ALTER TABLE `TablaProducto`
  MODIFY `ID_Producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `TablaRelacion1Dias`
--
ALTER TABLE `TablaRelacion1Dias`
  MODIFY `ID_RelacionDia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `TablaRelacion2Recibo`
--
ALTER TABLE `TablaRelacion2Recibo`
  MODIFY `ID_Relacion2Recibo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `TablaRelacion3Categorias`
--
ALTER TABLE `TablaRelacion3Categorias`
  MODIFY `ID_Relacion3Categoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Tabla_RelacionPromo_Produc`
--
ALTER TABLE `Tabla_RelacionPromo_Produc`
  MODIFY `ID_Relacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `Tabla_TipoCambio`
--
ALTER TABLE `Tabla_TipoCambio`
  MODIFY `ID_TipoCambio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `TipoUsuario`
--
ALTER TABLE `TipoUsuario`
  MODIFY `IdTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `IdUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Barriles`
--
ALTER TABLE `Barriles`
  ADD CONSTRAINT `Relacion_Cantidad` FOREIGN KEY (`RelacionCantidad`) REFERENCES `Cantidad` (`ID_litros`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Productos`
--
ALTER TABLE `Productos`
  ADD CONSTRAINT `Categoria` FOREIGN KEY (`Categoria`) REFERENCES `Categorias` (`IdCategoria1`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ProductosBebibles`
--
ALTER TABLE `ProductosBebibles`
  ADD CONSTRAINT `CantidadB` FOREIGN KEY (`CantidadExistente`) REFERENCES `Cantidad` (`ID_litros`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `CategoriaB` FOREIGN KEY (`Categoria`) REFERENCES `Categorias` (`IdCategoria1`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Promos`
--
ALTER TABLE `Promos`
  ADD CONSTRAINT `ID_Categoria` FOREIGN KEY (`ID_Categoriap`) REFERENCES `Categorias` (`IdCategoria1`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Retiro`
--
ALTER TABLE `Retiro`
  ADD CONSTRAINT `Relacion_Aprobacion` FOREIGN KEY (`IdAprobacionRel`) REFERENCES `Aprobacion` (`IdAprobacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Relacion_TipoCambio` FOREIGN KEY (`Tipo`) REFERENCES `Tabla_TipoCambio` (`ID_TipoCambio`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `TablaRelacion1Dias`
--
ALTER TABLE `TablaRelacion1Dias`
  ADD CONSTRAINT `RelacionDia` FOREIGN KEY (`RelacionIDdia`) REFERENCES `Dias_Vigentes` (`ID_Dia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `RelacionPromo` FOREIGN KEY (`RelacionIDPromo`) REFERENCES `Promos` (`ID_Promo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `TablaRelacion2Recibo`
--
ALTER TABLE `TablaRelacion2Recibo`
  ADD CONSTRAINT `Relacion_Producto` FOREIGN KEY (`ID_Productos`) REFERENCES `ProductosVendidos` (`ID_ProductosVendidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Relacion_recibo` FOREIGN KEY (`ID_Recibo`) REFERENCES `Datosrecibo` (`ID_Recibo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `TablaRelacion3Categorias`
--
ALTER TABLE `TablaRelacion3Categorias`
  ADD CONSTRAINT `RelacionCategoria` FOREIGN KEY (`ID_CategoriasVen`) REFERENCES `CategoriasVenTurno` (`IDCategoriasVendidas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `RelacionCorte` FOREIGN KEY (`ID_Corte`) REFERENCES `DatosCorte` (`ID_Corte`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Tabla_RelacionPromo_Produc`
--
ALTER TABLE `Tabla_RelacionPromo_Produc`
  ADD CONSTRAINT `RelacionProducto` FOREIGN KEY (`ID_Producto`) REFERENCES `TablaProducto` (`ID_Producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `RelacionProm` FOREIGN KEY (`ID_Promo`) REFERENCES `Promos` (`ID_Promo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Personal` FOREIGN KEY (`IdPersonal`) REFERENCES `Personal` (`IdPersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TipoUsuario` FOREIGN KEY (`IdTipo`) REFERENCES `TipoUsuario` (`IdTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
