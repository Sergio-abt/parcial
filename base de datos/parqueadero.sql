-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2021 a las 08:28:20
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `parqueadero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bahia`
--

CREATE TABLE `bahia` (
  `idBahia` int(10) NOT NULL,
  `idParqueadero` int(10) NOT NULL,
  `Ubicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bahia`
--

INSERT INTO `bahia` (`idBahia`, `idParqueadero`, `Ubicacion`) VALUES
(1, 4, 'piso 5'),
(2, 1, 'piso 1'),
(4, 3, 'piso 3'),
(5, 5, 'piso 4'),
(7, 6, 'piso 6'),
(9, 2, 'piso 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idPago` int(10) NOT NULL,
  `idBahia` int(10) NOT NULL,
  `idVehiculo` int(10) NOT NULL,
  `Tiempo` int(100) NOT NULL,
  `Costo` int(100) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`idPago`, `idBahia`, `idVehiculo`, `Tiempo`, `Costo`, `Fecha`) VALUES
(1, 2, 1, 30, 10000, '2021-10-12'),
(2, 9, 2, 60, 20000, '2021-10-29'),
(3, 4, 5, 45, 15000, '2021-10-15'),
(4, 5, 4, 20, 10000, '2021-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parqueadero`
--

CREATE TABLE `parqueadero` (
  `idParqueadero` int(10) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Ubicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `parqueadero`
--

INSERT INTO `parqueadero` (`idParqueadero`, `Nombre`, `Ubicacion`) VALUES
(1, 'Parking', 'piso 1'),
(2, 'Parking car', 'Piso 2'),
(3, 'Carsleep', 'piso 3'),
(4, 'ParkCar', 'piso 5'),
(5, 'Parqueadero', 'piso 4'),
(6, 'Cars', 'Piso 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(10) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(20) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `num_documento` int(10) NOT NULL,
  `Direccion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `Nombre`, `Apellido`, `Telefono`, `num_documento`, `Direccion`) VALUES
(16, 'Nicole ', 'Martinez ', 1234567890, 5575575, 'carrera 2'),
(17, 'laura', 'pineda', 2147483647, 2147483647, 'carrera 18'),
(18, 'Jhon', 'Quintero', 2147483647, 2147483647, 'carrera13'),
(19, 'Jairo', 'Lopez', 2147483647, 2147483647, 'carrera 27'),
(20, 'Daniela', 'Perez', 2147483647, 2147483647, 'calle 45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `idTarifa` int(10) NOT NULL,
  `costo` int(100) NOT NULL,
  `idTipo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`idTarifa`, `costo`, `idTipo`) VALUES
(1, 10000, 1),
(2, 20000, 2),
(3, 30000, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovehiculo`
--

CREATE TABLE `tipovehiculo` (
  `idTipo` int(10) NOT NULL,
  `Clase` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipovehiculo`
--

INSERT INTO `tipovehiculo` (`idTipo`, `Clase`) VALUES
(1, 'Automovil'),
(2, 'Camioneta'),
(3, 'Camion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idVehiculo` int(10) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `placa` varchar(6) NOT NULL,
  `idPersona` int(10) NOT NULL,
  `idTipo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`idVehiculo`, `Marca`, `placa`, `idPersona`, `idTipo`) VALUES
(1, 'Audi', 'DDT987', 16, 1),
(2, 'BMW', 'DDT987', 17, 1),
(3, 'Chevrolet', 'YTU846', 19, 2),
(4, 'Volvo', 'GET373', 20, 2),
(5, 'Jac', 'DTE740', 18, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bahia`
--
ALTER TABLE `bahia`
  ADD PRIMARY KEY (`idBahia`),
  ADD UNIQUE KEY `idParqueadero` (`idParqueadero`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idPago`),
  ADD UNIQUE KEY `idVehiculo` (`idVehiculo`),
  ADD UNIQUE KEY `idBahia` (`idBahia`);

--
-- Indices de la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
  ADD PRIMARY KEY (`idParqueadero`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`idTarifa`),
  ADD UNIQUE KEY `idTipo` (`idTipo`);

--
-- Indices de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idVehiculo`),
  ADD UNIQUE KEY `idPersona` (`idPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idPago` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `parqueadero`
--
ALTER TABLE `parqueadero`
  MODIFY `idParqueadero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  MODIFY `idTipo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idVehiculo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bahia`
--
ALTER TABLE `bahia`
  ADD CONSTRAINT `bahia_ibfk_1` FOREIGN KEY (`idParqueadero`) REFERENCES `parqueadero` (`idParqueadero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_ibfk_2` FOREIGN KEY (`idBahia`) REFERENCES `bahia` (`idBahia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD CONSTRAINT `tarifa_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipovehiculo` (`idTipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`idTipo`) REFERENCES `tipovehiculo` (`idTipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
