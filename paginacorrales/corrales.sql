-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2023 a las 02:25:14
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
-- Base de datos: `corrales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crias`
--

CREATE TABLE `crias` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `DESCRIPCION` text DEFAULT NULL,
  `PESO` decimal(11,0) NOT NULL,
  `COSTO` double NOT NULL,
  `ESTADO` tinyint(1) NOT NULL DEFAULT 0,
  `FECHA_REGISTRO` date DEFAULT NULL,
  `ID_proveedor` int(11) NOT NULL,
  `PROVEEDOR` varchar(50) NOT NULL,
  `CUARENTENA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `crias`
--

INSERT INTO `crias` (`ID`, `NOMBRE`, `DESCRIPCION`, `PESO`, `COSTO`, `ESTADO`, `FECHA_REGISTRO`, `ID_proveedor`, `PROVEEDOR`, `CUARENTENA`) VALUES
(1, 'Pollo Claudio', 'Cria de pollo color blanco.', 1, 100, 1, '2023-04-13', 0, 'Bachoco', '2023-04-26'),
(2, 'Clara', 'Cria bovin blanca con negro', 150, 6000, 0, '2023-04-27', 0, 'Sukarne', NULL),
(3, 'Mariana', 'Cria Bovina de color negro.', 533, 334, 0, '2023-04-20', 0, 'Sonora Carnes', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `ID_pro` int(11) NOT NULL,
  `NOMBRE_pro` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`ID_pro`, `NOMBRE_pro`) VALUES
(1, 'Bachoco'),
(2, 'Sukarne'),
(3, 'Proveedor 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensores`
--

CREATE TABLE `sensores` (
  `ID_Sensor` int(11) NOT NULL,
  `FECHA_REGISTRO` date DEFAULT NULL,
  `FRECUENCIA_C` float DEFAULT NULL,
  `PRESION` float DEFAULT NULL,
  `FRECUENCIA_R` float DEFAULT NULL,
  `TEMPERATURA` float DEFAULT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `ID_Cria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sensores`
--

INSERT INTO `sensores` (`ID_Sensor`, `FECHA_REGISTRO`, `FRECUENCIA_C`, `PRESION`, `FRECUENCIA_R`, `TEMPERATURA`, `NOMBRE`, `ID_Cria`) VALUES
(8, '2023-04-12', 53, 54, 64, 34, 'Mariana', NULL),
(77, '2023-04-18', 43, 534, 34, 443, 'Pollo Claudio', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`) VALUES
('administrador', '123456789');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crias`
--
ALTER TABLE `crias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`ID_pro`);

--
-- Indices de la tabla `sensores`
--
ALTER TABLE `sensores`
  ADD PRIMARY KEY (`ID_Sensor`),
  ADD KEY `ID_Cria` (`ID_Cria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `crias`
--
ALTER TABLE `crias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `ID_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sensores`
--
ALTER TABLE `sensores`
  ADD CONSTRAINT `sensores_ibfk_1` FOREIGN KEY (`ID_Cria`) REFERENCES `crias` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
