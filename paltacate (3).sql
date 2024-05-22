-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 01:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paltacate`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
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
-- Table structure for table `ingredientes`
--

CREATE TABLE `ingredientes` (
  `ID_recetas` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `cantidad` varchar(40) DEFAULT NULL,
  `unidad` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ingredientes`
--

INSERT INTO `ingredientes` (`ID_recetas`, `nombre`, `cantidad`, `unidad`) VALUES
(26, 'Leche', '500', 'Ml'),
(26, 'Cereal', '400', 'Mg');

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
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
-- Table structure for table `recetas`
--

CREATE TABLE `recetas` (
  `ID_recetas` int(11) NOT NULL,
  `ID_usuario` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `tiempo_preparacion` int(11) DEFAULT NULL,
  `fecha_publicacion` timestamp NULL DEFAULT current_timestamp(),
  `porciones` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `preparacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recetas`
--

INSERT INTO `recetas` (`ID_recetas`, `ID_usuario`, `titulo`, `categoria`, `tiempo_preparacion`, `fecha_publicacion`, `porciones`, `descripcion`, `preparacion`) VALUES
(26, 57, 'cereal', 'Plato fuerte', 1, '2024-05-22 23:16:51', 1, 'CENA DE FORANEO', 'Sirvelo en un plato y disfruta');

-- --------------------------------------------------------

--
-- Table structure for table `reportes`
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID_rol` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID_rol`, `nombre`) VALUES
(1, 'normal'),
(2, 'moderador'),
(3, 'administrador');

-- --------------------------------------------------------

--
-- Table structure for table `user_preferencias`
--

CREATE TABLE `user_preferencias` (
  `prefencias` varchar(30) DEFAULT NULL,
  `ID_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `nombre_usuario` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nombre`, `email`, `contrasena`, `nombre_usuario`) VALUES
(56, 'jose angel', 'jose.rodriguez6015@alumnos.udg.mx', 'cc88dcb51e5654eb08468e8aa64ab59abd9dab3b', 'joseAngel21'),
(57, 'Pancho', 'Pan@hotmail.com', '372e2bfce3ebbfb491390abd393287cb9704e911', 'Panchito21');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_roles`
--

CREATE TABLE `usuarios_roles` (
  `ID_usuario` int(11) NOT NULL,
  `ID_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios_roles`
--

INSERT INTO `usuarios_roles` (`ID_usuario`, `ID_rol`) VALUES
(56, 1),
(57, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`ID_comentario`),
  ADD KEY `ID_usuario` (`ID_usuario`),
  ADD KEY `ID_receta` (`ID_receta`);

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD KEY `ID_recetas` (`ID_recetas`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`ID_perfil`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indexes for table `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`ID_recetas`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indexes for table `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`ID_reporte`),
  ADD KEY `ID_comentario` (`ID_comentario`),
  ADD KEY `ID_moderador` (`ID_moderador`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_rol`);

--
-- Indexes for table `user_preferencias`
--
ALTER TABLE `user_preferencias`
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- Indexes for table `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  ADD PRIMARY KEY (`ID_usuario`,`ID_rol`),
  ADD KEY `ID_rol` (`ID_rol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `ID_comentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perfil`
--
ALTER TABLE `perfil`
  MODIFY `ID_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recetas`
--
ALTER TABLE `recetas`
  MODIFY `ID_recetas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `reportes`
--
ALTER TABLE `reportes`
  MODIFY `ID_reporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`ID_receta`) REFERENCES `recetas` (`ID_recetas`);

--
-- Constraints for table `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `ingredientes_ibfk_1` FOREIGN KEY (`ID_recetas`) REFERENCES `recetas` (`ID_recetas`);

--
-- Constraints for table `perfil`
--
ALTER TABLE `perfil`
  ADD CONSTRAINT `perfil_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`);

--
-- Constraints for table `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`);

--
-- Constraints for table `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`ID_comentario`) REFERENCES `comentarios` (`ID_comentario`),
  ADD CONSTRAINT `reportes_ibfk_2` FOREIGN KEY (`ID_moderador`) REFERENCES `usuarios` (`ID_usuario`);

--
-- Constraints for table `user_preferencias`
--
ALTER TABLE `user_preferencias`
  ADD CONSTRAINT `user_preferencias_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`);

--
-- Constraints for table `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  ADD CONSTRAINT `usuarios_roles_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuarios` (`ID_usuario`),
  ADD CONSTRAINT `usuarios_roles_ibfk_2` FOREIGN KEY (`ID_rol`) REFERENCES `roles` (`ID_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
