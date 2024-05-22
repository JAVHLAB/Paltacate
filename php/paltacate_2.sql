-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2024 a las 23:22:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `paltacate`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `ID_comentario` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `ID_receta` int(11) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `fecha_comentario` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ID_ingredientes` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasos_preparacion`
--

CREATE TABLE `pasos_preparacion` (
  `ID_preparacion` int(11) NOT NULL,
  `ID_receta` int(11) DEFAULT NULL,
  `numero_paso` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `ID_perfil` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `redes_sociales` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `ID_recetas` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `dificultad` enum('Fácil','Moderado','Difícil') DEFAULT NULL,
  `tiempo_preparacion` int(11) DEFAULT NULL,
  `fecha_publicacion` timestamp NULL DEFAULT current_timestamp(),
  `porciones` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas_ingredientes`
--

CREATE TABLE `recetas_ingredientes` (
  `ID_receta` int(11) NOT NULL,
  `ID_ingrediente` int(11) NOT NULL,
  `cantidad` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `ID_reporte` int(11) NOT NULL,
  `ID_comentario` int(11) DEFAULT NULL,
  `ID_moderador` int(11) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_reporte` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID_rol` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `nombre_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nombre`, `email`, `contrasena`, `nombre_usuario`) VALUES
(17, 'Pedro Jimenez', 'usuario1@hotmail.com', '175cd98cbe4a6e3507c38a3c83c030b6a6cb78eec099f24ed3', 'usuario1'),
(18, 'Juan Ponce', 'usuario2@gmail.com', 'f50b2cc31671e9e10a330450d99f15e941ea2fa4278517a80d', 'usuario2'),
(19, 'Jacinto Benitez', 'usuario3@hotmail.com', '92e7bb0778aa6468d8d8633eaef8c9eca640d6ef1a8fa57c42', '@@@Qs)__)(////'),
(20, 'Pedro Jimenez', 'hola@hola.com', 'e83e8535d6f689493e5819bd60aa3e5fdcba940e6d111ab6fb', 'hola'),
(21, 'Pedro Jimenez', 'angelram06@hotmail.com', 'd11e48cd4de9c64d5cd373fe868f45e06f5ee910cba49e4fdf', 'gato'),
(22, 'JOSE', 'chihiro@gmail.com', '3b3f8012175395480b36d2e7c2202f95accf04cfb579f0ed0c', 'JOSE2128'),
(23, 'usuario21', 'usuario21@gmail.com', '3d2a57bcfa35836dc11901e35edb4f98957a5ca033546dc74e', 'usuario21'),
(24, 'JOSE', 'ilomilo@gmail.com', '37a52fcc8b80a6141098666a5a1602783d46dd78bfdf0ad0e4', 'usuario22'),
(25, 'JOSE', '50usuario23@gmail.com', 'eac21ff546360e757aa04585a6cdadc8b4bc874373ab5ccb36', 'usuario23'),
(26, 'JOSE', '50usuario2323@gmail.com', 'eac21ff546360e757aa04585a6cdadc8b4bc874373ab5ccb36', 'usuario23copia'),
(27, 'JOSE', 'jose@gmail.com', '6e18c732251f1bbeeff46b5106be66b51a241265f8897a62ab', 'josejose'),
(28, 'Hola', 'Hola2121@gmail.com', '495a6b7eaa0e98a626e68aaac4c91b84349632e4cca71b5598', 'Hola2121'),
(29, 'lapicito', 'lapicito@gmail.com', '7fc700258fd90ef0a811bbbc5657e5948b697ae721e5817f6a', 'lapicito'),
(30, 'joselito', 'joselito@gmail.com', '6cc187ab2cd2c26dfa11e25fbac8bfee5f3248e95be937a436', 'joselito'),
(31, 'lolololo', 'lolololo@gmail.com', '$2y$10$tzvH3UwACRD9lwSNmlEKgO3L5E8w9JIz1TjuLg4V/fy', 'lolololo'),
(32, 'joselito ramirez', 'joselito232das@gmail.com', '$2y$10$Wa9c4L7xZRfcWaOvPakZC.2swYTfYhvUV5AdCIaM0R6', 'joselito_ramirez'),
(33, 'lunch', 'lunch@gmail.com', '', 'lunch2121'),
(34, 'gondola', 'gondola@gmail.com', '', 'gondola22'),
(35, 'dances', 'dances@gmail.com', '', 'dances22'),
(36, 'theone', 'theone@gmail.com', '', 'theone21'),
(37, 'theone', 'theone22@gmail.com', '0f280094c68dc3b2f4824315174119b63283e28a', 'theone22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_roles`
--

CREATE TABLE `usuarios_roles` (
  `ID_usuario` int(11) NOT NULL,
  `ID_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID_comentario`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_receta` (`ID_receta`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`ID_ingredientes`);

--
-- Indices de la tabla `pasos_preparacion`
--
ALTER TABLE `pasos_preparacion`
  ADD PRIMARY KEY (`ID_preparacion`),
  ADD KEY `ID_receta` (`ID_receta`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`ID_perfil`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`ID_recetas`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `recetas_ingredientes`
--
ALTER TABLE `recetas_ingredientes`
  ADD PRIMARY KEY (`ID_receta`,`ID_ingrediente`),
  ADD KEY `ID_ingrediente` (`ID_ingrediente`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`ID_reporte`),
  ADD KEY `ID_comentario` (`ID_comentario`),
  ADD KEY `ID_moderador` (`ID_moderador`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- Indices de la tabla `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  ADD PRIMARY KEY (`ID_usuario`,`ID_rol`),
  ADD KEY `ID_rol` (`ID_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `ID_ingredientes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pasos_preparacion`
--
ALTER TABLE `pasos_preparacion`
  MODIFY `ID_preparacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `ID_recetas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `ID_reporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`ID_receta`) REFERENCES `recetas` (`ID_recetas`);

--
-- Filtros para la tabla `pasos_preparacion`
--
ALTER TABLE `pasos_preparacion`
  ADD CONSTRAINT `pasos_preparacion_ibfk_1` FOREIGN KEY (`ID_receta`) REFERENCES `recetas` (`ID_recetas`);

--
-- Filtros para la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`);

--
-- Filtros para la tabla `recetas_ingredientes`
--
ALTER TABLE `recetas_ingredientes`
  ADD CONSTRAINT `recetas_ingredientes_ibfk_1` FOREIGN KEY (`ID_receta`) REFERENCES `recetas` (`ID_recetas`),
  ADD CONSTRAINT `recetas_ingredientes_ibfk_2` FOREIGN KEY (`ID_ingrediente`) REFERENCES `ingredientes` (`ID_ingredientes`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`ID_comentario`) REFERENCES `comentarios` (`ID_comentario`),
  ADD CONSTRAINT `reportes_ibfk_2` FOREIGN KEY (`ID_moderador`) REFERENCES `usuarios` (`ID_usuario`);

--
-- Filtros para la tabla `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  ADD CONSTRAINT `usuarios_roles_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`),
  ADD CONSTRAINT `usuarios_roles_ibfk_2` FOREIGN KEY (`ID_rol`) REFERENCES `roles` (`ID_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
