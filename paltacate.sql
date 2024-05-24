-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 03:39 AM
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
(73, 'Carne', '250', 'grs'),
(73, 'Dientes de Ajo', '2', 'piezas'),
(73, 'Tortillas', '1', 'kilo'),
(73, 'Cebolla Morada', '1', 'pieza'),
(73, 'Oregano', '4', 'pizcas'),
(80, 'Agua', '1', 'litro'),
(80, 'Gelatina', '1', 'sobre'),
(81, 'Zapallo Redondo', '1', 'pieza'),
(81, 'Morron Rojo', '1', 'pieza'),
(81, 'Agua', '500', 'ml'),
(82, 'Elote', '4', 'tazas'),
(82, 'Mantequilla', '2', 'cucharadas'),
(82, 'Sal', '3', 'pizcas'),
(82, 'Mayonesa', '2', 'cucharadas'),
(82, 'Salsa', '1', 'botella'),
(83, 'Leche', '300', 'ml'),
(83, 'Cereal', '300', 'g'),
(84, 'Leche', '150', 'ml'),
(87, 'Cono Helado', '6', 'conos'),
(87, 'Chocolate', '1', 'taza'),
(87, 'Nuez', '1', 'taza'),
(87, 'Fresas', '3', 'tazas'),
(88, 'Librillo', '2', 'kilos');

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

CREATE TABLE `perfil` (
  `ID_usuario` int(11) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL,
  `insta` text DEFAULT NULL,
  `redX` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`ID_usuario`, `foto_perfil`, `insta`, `redX`) VALUES
(56, 'img/desconocido.jpg', NULL, NULL),
(57, 'img/desconocido.jpg', NULL, NULL),
(58, 'img/desconocido.jpg', NULL, NULL),
(59, '/mg/desconocido.jpg', NULL, NULL),
(60, '\"img/desconocido.jpg\"', NULL, NULL),
(61, NULL, NULL, NULL),
(62, NULL, NULL, NULL);

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
  `preparacion` text NOT NULL,
  `url` varchar(60) NOT NULL,
  `calificacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recetas`
--

INSERT INTO `recetas` (`ID_recetas`, `ID_usuario`, `titulo`, `categoria`, `tiempo_preparacion`, `fecha_publicacion`, `porciones`, `descripcion`, `preparacion`, `url`, `calificacion`) VALUES
(73, 60, 'Tacos', 'Platillo típico', 60, '2024-05-23 09:50:34', 5, 'Como bien sabemos los tacos mexicanos pueden tener diferentes rellenos: Podemos hacer tacos de carne, tacos de pollo, vegetarianos, lo que sea! Todo queda bien dentro de un taco. Vamos a revisar algunas de las recetas de tacos mas tradicionales que preparan en México, y por qué no algunas alternativas para innovar en casa.', 'Cortar los morrones y la cebolla en juliana, el ajo y el chile bien bien pequeño y el tomate en cubitos. Reservar por separado.\r\nCortar la carne en tiritas y en un bol salpimentar, agregar la mitad del zumo de lima o limón y dejar macerando unos 20 minutos.\r\nSi quieren, en este paso pueden hacer la magia que les guste para darle sabor a la carne: ponerle mostaza, un chorro de cerveza… Lo que ustedes quieran. La idea es que los tacos de carne queden bien sabrosos así que todo vale. \r\nEn una sartén poner un chorro de aceite, el chile seco y el orégano y calentar unos 2 o 3 minutos. Agregar el ajo y el chile y sofreír unos minutos más.\r\nAgregar la carne y saltear. Después de 5 minutos, a mitad de cocción, sumar el tomate y terminar de cocinar.\r\nPor otro lado, saltear el resto de las verduras hasta que estén cocidas pero OJO: que estén firmes.\r\nMezclar las dos preparaciones y rectificamos con sal y pimienta de ser necesario. Le agregamos el resto del zumo de lima o limón y el cilantro deshojado.', '../recetas/receta-Tacos.php', 0),
(80, 57, 'Gelatina', 'Postre', 30, '2024-05-23 13:39:53', 2, 'Cómo hacer gelatina\r\nDescubrí esta rica receta de cómo hacer gelatina para disfrutar con toda la familia. Animate a prepararla y sorprendé a todos.', '1.  Colocar el contenido del sobre de la gelatina de frutillas con el agua hirviendo en un bol y mezclar hasta disolver. Dividir en dos partes iguales.\r\n2.  Añadir a una parte 250 cc del agua fría y una vez que la preparación se enfríe, incorporar las frutillas picadas. Colocar en flaneritas, rellenándolas hasta sus ¾ partes, y llevar a la heladera hasta que la preparación esté bien fría y haya tomado consistencia.\r\n3.  Mezclar la otra parte de gelatina con la Leche Condensada Nestlé y el resto del agua fría. Verter esta preparación en cada moldecito hasta llenarlo por completo y llevar nuevamente a la heladera hasta que el postre esté bien frío y haya tomado consistencia. Desmoldar pasando por agua caliente.', '../recetas/receta-Gelatina.php', 0),
(81, 59, 'Carbonada', 'Plato fuerte', 25, '2024-05-23 13:52:21', 2, 'COCINA BIEN', '¡A cocinar!\r\n1.  Lavá el zapallo. Cortá la tapa y con una cuchara desprendé los filamentos y las semillas.\r\n2.  Cubrí el zapallo y su tapa con papel metálico, colocalos en una asadera con 2 cm de agua y cocinalos en un horno precalentado a temperatura media (180 ºC) durante 1 hora aprox. o hasta que quede tierno.\r\n3.  En una cacerola verté el aceite y dorá la carne. Agregá las cebollas y el morrón picados, rehogar todo junto.Sumá los tomates picados y pelados con su jugo, las zanahorias peladas cortadas en rodajas, y las papas peladas en cubos. Condimentá con pimentón, el ají molido y el orégano.\r\n4.  Agregá los Cubos de Caldo Maggi sabor Carne y el agua caliente (debe cubrir todos los ingredientes). Cociná a fuego bajo hasta que todo esté tierno, aprox. 50 minutos.\r\n5.  Incorporá los damascos, las rodajas de choclo, y salpimentar.\r\n6.  Retirá el papel del zapallo y rellená con la carbonada. Colocá la tapa al zapallo.Si se desea, espolvoreá con perejil.', '../recetas/receta-Carbonada.php', 0),
(82, 59, 'Elote En Vaso', 'Platillo típico', 30, '2024-05-23 13:56:53', 4, 'ELOTE EN VASO', '\r\nPorciones: 4 a 6\r\n\r\n1.- Derrite la mantequilla en una sartén grande a fuego medio. Agrega el maíz y cocina hasta que esté muy caliente, aproximadamente 7 minutos. Sazona con sal, y revuelve con frecuencia.\r\n\r\n2.- Bate la crema y la mayonesa en un tazón mediano aparte, separa.\r\n\r\n3.- Coloca ½ taza de maíz en un vaso para servir, agrega 2 cucharadas de mayonesa y crema. Cubre con otra ½ taza de maíz.\r\n\r\n4.- Cubre con 1 cucharada de la mezcla de mayonesa/crema, una mizca de chile y ñimón en polvo, cilantro, 1 cucharada de queso cotija y jugo de limón.\r\n\r\n5.- Repite con los ingredientes restantes.\r\n\r\n¡Disfruta!', '../recetas/receta-Elote+En+Vaso.php', 0),
(83, 59, 'Cereal con leche', 'Plato fuerte', 3, '2024-05-23 14:04:17', 1, 'CEREAL PARA FINAL DE SEMESTRE', 'Sirve la leche y el cereal en un plato ondo.', '../recetas/receta-Cereal+con+leche.php', 0),
(84, 59, 'Platano', 'Vegano', 12, '2024-05-23 15:06:09', 12, 'Vegano', 'hola', '../recetas/receta-Platano.php', 0),
(87, 61, 'Cono De Fresa', 'Postre', 5, '2024-05-24 01:05:40', 2, 'Las fresas con chocolate son el tipo de postre que nunca pasa de moda y hasta se venden ramos hechos con estas frutas. Para darle un giro a la versión clásica, servimos las fresas con chocolate en cono o barquillo para helado. ¡Le fascinarán a chicos y grandes!\r\n\r\n¿Sabías qué? Las fresas son una fruta rica en nutrientes como vitamina C, antioxidantes, hierro, calcio, potasio y ácido fólico. ¿A ti te gustan las fresas?', 'Pasa el borde del cono sobre el chocolate y después por la nuez. Rellena con la crema de galleta, agrega las fresas y añade más chocolate y nuez.', '../recetas/receta-Cono+De+Fresa.php', 0),
(88, 62, 'Menudo', 'Plato fuerte', 120, '2024-05-24 01:35:35', 5, 'MENUDO PARA LA FAMILIA', 'MEJOR COMPRARLO', '../recetas/receta-Menudo.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `receta_imagen`
--

CREATE TABLE `receta_imagen` (
  `ID_recetas` int(11) NOT NULL,
  `img_uno` varchar(100) DEFAULT NULL,
  `img_dos` varchar(100) DEFAULT NULL,
  `img_tres` varchar(100) DEFAULT NULL,
  `img_cuatro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `receta_imagen`
--

INSERT INTO `receta_imagen` (`ID_recetas`, `img_uno`, `img_dos`, `img_tres`, `img_cuatro`) VALUES
(73, '../fotosrecetas/tacos.jpg', NULL, NULL, NULL),
(80, '../fotosrecetas/gelatina.jpg', NULL, NULL, NULL),
(81, '../fotosrecetas/carbonada.jpg', NULL, NULL, NULL),
(82, '../fotosrecetas/elote.jpg', NULL, NULL, NULL),
(83, '../fotosrecetas/2Cereals and Milk_1.png', NULL, NULL, NULL),
(84, '../fotosrecetas/taquitos-ahogados.jpg', NULL, NULL, NULL),
(87, '../fotosrecetas/Conos.webp', NULL, NULL, NULL),
(88, '../fotosrecetas/menudo.jpg', NULL, NULL, NULL);

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
(57, 'Pancho', 'Pan@hotmail.com', '372e2bfce3ebbfb491390abd393287cb9704e911', 'Panchito21'),
(58, 'ilomilo', 'ilomilo@ilomilo.com', '1668d9e78c4f0dc869a3455ef1423471d9d637bb', 'ilomilo21'),
(59, 'blue banisters', 'blue@hotmail.com', '5ec61214566eda7662fe4bd6886d38c2fc80bc8c', 'blueblue'),
(60, 'texas arcadia', 'arcadia21@gmail.com', '8337651428a27349c5f1f7b9162246ca02703a28', 'arcadia21'),
(61, 'Jose Angel Rodriguez Ramirez', 'hola@hola.com', 'abd11f71bd257f36e8e1f9db7c47739884d70d2a', 'salvando2024'),
(62, 'Jose Angel Rodriguez Ramirez', 'Pandas21@gmail.com', 'e832e40d3e6aefd5d66503d41ef195dd77fcc727', 'Pandas21');

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
(57, 1),
(58, 1),
(60, 1),
(61, 1),
(62, 1);

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
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indexes for table `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`ID_recetas`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indexes for table `receta_imagen`
--
ALTER TABLE `receta_imagen`
  ADD KEY `ID_recetas` (`ID_recetas`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_rol`);

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
-- AUTO_INCREMENT for table `recetas`
--
ALTER TABLE `recetas`
  MODIFY `ID_recetas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `ID_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
-- Constraints for table `receta_imagen`
--
ALTER TABLE `receta_imagen`
  ADD CONSTRAINT `receta_imagen_ibfk_1` FOREIGN KEY (`ID_recetas`) REFERENCES `recetas` (`ID_recetas`);

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
