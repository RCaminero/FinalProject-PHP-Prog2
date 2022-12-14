-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.14-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para sublime_detalle
CREATE DATABASE IF NOT EXISTS `sublime_detalle` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sublime_detalle`;

-- Volcando estructura para tabla sublime_detalle.articulo
CREATE TABLE IF NOT EXISTS `articulo` (
  `Id_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `Proveedor_id_proveedor` int(11) NOT NULL,
  `Categoria_articulo_id_categoria_articulo` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Precio` int(11) DEFAULT NULL,
  `Precio_unidad` int(20) NOT NULL,
  `Itbis` int(20) DEFAULT NULL,
  `Precio_Total` int(20) NOT NULL,
  `Envio` int(20) DEFAULT NULL,
  `Stock` int(20) NOT NULL,
  `Imagen` varchar(50) DEFAULT NULL,
  `Imagen1` varchar(50) DEFAULT NULL,
  `Imagen2` varchar(50) DEFAULT NULL,
  `Imagen3` varchar(50) DEFAULT NULL,
  `Estado_articulo` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`Id_articulo`) USING BTREE,
  KEY `Proveedor_id_proveedor` (`Proveedor_id_proveedor`),
  KEY `Categoria_articulo_id_categoria_articulo` (`Categoria_articulo_id_categoria_articulo`),
  CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`Proveedor_id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON UPDATE CASCADE,
  CONSTRAINT `articulo_ibfk_2` FOREIGN KEY (`Categoria_articulo_id_categoria_articulo`) REFERENCES `categoria_articulo` (`Id_categoria_articulo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sublime_detalle.articulo: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` (`Id_articulo`, `Proveedor_id_proveedor`, `Categoria_articulo_id_categoria_articulo`, `Nombre`, `Descripcion`, `Precio`, `Precio_unidad`, `Itbis`, `Precio_Total`, `Envio`, `Stock`, `Imagen`, `Imagen1`, `Imagen2`, `Imagen3`, `Estado_articulo`) VALUES
	(2, 1, 2, 'Botella de agua 20 oz', 'Botella de agua esmaltada de 20 onz con tapa tipo llavero.', 450, 165, 5, 170, 100, 116, 'img/productos/botellaaluminio.jpg', '', '', '', 'A'),
	(3, 1, 4, 'Taza porcelana 11 oz', 'Taza porcelana blanca para sublimación de 11onz.', 300, 50, 5, 55, 100, 97, 'img/productos/tazablanca.jpg', '', '', '', 'A'),
	(4, 1, 4, 'Taza con cuchara 11 oz', 'Taza multicolor con cuchara.', 400, 145, 5, 150, 100, 195, 'img/productos/cucharitarosa.jpg', 'img/productos/cucharitanegro.jpg', 'img/productos/cucharitarojo.jpg', 'img/productos/cucharitaazulito.jpg', 'A'),
	(5, 1, 4, 'Taza con Interior de color 11 oz', 'Taza con asa e interior multicolor.', 350, 80, 5, 85, 100, 92, 'img/productos/interiorrosa.jpg', 'img/productos/interiornegro.jpg', 'img/productos/interiorrojo.jpg', 'img/productos/interiorazulito.jpg', 'A'),
	(6, 1, 4, 'Taza color cambiante (Mágica)', 'Taza porcelana mágica.', 400, 150, 5, 155, 100, 400, 'img/productos/tazamagica.jpg', '', '', '', 'A'),
	(7, 1, 2, 'Botella de cola 25 oz', 'Esmaltada, con condiciones térmicas.', 800, 465, 5, 470, 100, 196, 'img/productos/botellacola.jpg', '', '', '', 'A'),
	(8, 1, 2, 'Jarra Térmica 14 oz', 'Jarra térmica de 14 onz tipo coffe.', 600, 345, 5, 350, 100, 99, 'img/productos/jarratermica.jpg', '', '', '', 'A'),
	(9, 4, 5, 'Portarreatrato A4', 'Portarretrato a4 para imagenes.', 500, 125, 5, 130, 100, 100, 'img/productos/PortarretratoA4.jpg', '', '', '', 'A'),
	(10, 4, 5, 'Portarretrato A5', 'Tamaño normal, para fotos y lettering.', 450, 100, 10, 110, 100, 100, 'img/productos/PortarretratoLetter.jpg', '', '', '', 'A'),
	(11, 1, 5, 'Llaveros plásticos formas variadas', 'Plástico comprimido y duradero.', 250, 65, 5, 70, 100, 100, 'img/productos/llaverorectan.jpg', '', '', '', 'A'),
	(12, 1, 5, 'Bolas Navidad Sublimables', 'Bolas de navidad para insercción de imagenes y lettering.', 200, 85, 5, 90, 100, 150, 'img/productos/bolasnavidad.jpg', '', '', '', 'A'),
	(13, 4, 1, 'Cojín Cuadrado en algodón egipcio', 'Cojin tradicional.', 550, 100, 0, 100, 0, 150, 'img/productos/cojin.jpg', '', '', '', 'A'),
	(14, 4, 1, 'Cojin en forma de corazón', 'Cojin en piel de melocotón.', 550, 100, 30, 130, 100, 347, 'img/productos/cojincorazon.jpg', '', '', '', 'A'),
	(15, 1, 1, 'Gorras Trucker', 'Gorras listas para sublimacion y vinil textil.', 300, 170, 0, 170, 50, 197, 'img/productos/gorra1.jpg', 'img/productos/gorra.jpg', '', '', 'A'),
	(16, 1, 1, 'Delantal con bolsillos', 'Delantal one size con bolsillos para imágenes y sublimación.', 500, 250, 0, 250, 0, 96, 'img/productos/delantal.jpg', '', '', '', 'A'),
	(19, 1, 3, 'Rompecabezas rectángular 120 pcs', 'En cartón escarchado.', 300, 85, 5, 90, 100, 98, 'img/productos/rompecabezas.jpg', '', '', '', 'A'),
	(20, 1, 5, 'Destapador metalizado', 'Para diseños pequeños de ambos lados.', 250, 85, 5, 90, 100, 240, 'img/productos/destapador.jpg', '', '', '', 'A'),
	(21, 1, 3, 'Rompecabezas tipo corazón 80 pcs', 'En cartón escarchado.', 350, 55, 5, 60, 100, 100, 'img/productos/cojincorazon.jpg', '', '', '', 'A');
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;

-- Volcando estructura para tabla sublime_detalle.categoria_articulo
CREATE TABLE IF NOT EXISTS `categoria_articulo` (
  `Id_categoria_articulo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(25) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Estado_categoria_articulo` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`Id_categoria_articulo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sublime_detalle.categoria_articulo: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `categoria_articulo` DISABLE KEYS */;
INSERT INTO `categoria_articulo` (`Id_categoria_articulo`, `Nombre`, `Descripcion`, `Estado_categoria_articulo`) VALUES
	(1, 'Textiles', 'Aqui se encontraran todos los articulos realizados con telas', 'A'),
	(2, 'Termos ', 'Aqui se tendrán los termos de distintas formas, colores y material, ya sean plasticos o de metal', 'A'),
	(3, 'Rompecabezas', 'Rompecabezas de distintas formas y piezas', 'A'),
	(4, 'Tazas', 'Tendrá todos los tipos de tazas por colores, tamaños y funciones', 'A'),
	(5, 'Regalos', 'Aqui tendran variados articulos para regalos.', 'A');
/*!40000 ALTER TABLE `categoria_articulo` ENABLE KEYS */;

-- Volcando estructura para tabla sublime_detalle.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `Id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Id_usuario` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `Apellido` varchar(75) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Estado_cliente` enum('A','I') NOT NULL DEFAULT 'A',
  `Comentario` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`Id_cliente`) USING BTREE,
  KEY `Id_usuario` (`Id_usuario`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sublime_detalle.cliente: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`Id_cliente`, `Id_usuario`, `Nombre`, `Apellido`, `Direccion`, `Telefono`, `Estado_cliente`, `Comentario`) VALUES
	(1, 6, 'Emmanuel', 'Portorreal Vasquez', 'Residencial Don Luis Despradel', '829-656-9655', 'A', NULL),
	(2, 10, 'Christopher Adhonis', 'Diaz Holguin', 'Camaguey, Las Maras', '829-852-0255', 'A', NULL),
	(3, 9, 'Ramon Antonio', 'Diaz Acosta', 'Camaguey, Las Mras', '829-260-1987', 'A', NULL),
	(4, 7, 'Mildred Altagracia', 'Holguín Acosta', 'Camaguey, Las Mras', '829-899-5429', 'A', NULL),
	(5, 8, 'Wendy', 'Holguin', 'Camaguey,Las Maras', '849-852-7413', 'A', NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla sublime_detalle.comentario
CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `Comentario_fk_id_usuario` (`id_usuario`),
  CONSTRAINT `Comentario_fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`Id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sublime_detalle.comentario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;

-- Volcando estructura para tabla sublime_detalle.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `Id_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `Id_rol_empleado` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Estado_empleado` enum('A','I') NOT NULL DEFAULT 'A',
  `Fecha_nacimiento` date NOT NULL,
  `Sexo` enum('F','M') DEFAULT NULL,
  PRIMARY KEY (`Id_empleado`),
  KEY `Empleado_Id_rol_empleado` (`Id_rol_empleado`),
  KEY `Id_usuario` (`Id_usuario`),
  CONSTRAINT `Empleado_Id_rol_empleado` FOREIGN KEY (`Id_rol_empleado`) REFERENCES `rol_empleado` (`Id_rol_empleado`) ON UPDATE CASCADE,
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sublime_detalle.empleado: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` (`Id_empleado`, `Id_rol_empleado`, `Id_usuario`, `Nombre`, `Apellido`, `Estado_empleado`, `Fecha_nacimiento`, `Sexo`) VALUES
	(1, 1, 4, 'Genesis Stephania ', 'Diaz Holguin', 'A', '2000-07-10', 'F'),
	(2, 2, 5, 'Roberlina Nayeli', 'Caminero Holguin', 'A', '2002-08-15', 'F');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Volcando estructura para tabla sublime_detalle.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente_id_cliente` int(11) NOT NULL,
  `Empleado_id_empleado` int(11) NOT NULL,
  `Comentario` text DEFAULT NULL,
  `Fecha_pedido` date NOT NULL DEFAULT current_timestamp(),
  `Fecha_entrega` date DEFAULT NULL,
  `Estado_pago` enum('P','N') NOT NULL,
  `Estado_pedido` enum('A','C') NOT NULL DEFAULT 'A',
  `Metodo_pago` enum('PayPal','Contraentrega') NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `Cliente_id_cliente` (`Cliente_id_cliente`),
  KEY `Empleado_id_empleado` (`Empleado_id_empleado`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Empleado_id_empleado`) REFERENCES `empleado` (`Id_empleado`) ON UPDATE CASCADE,
  CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`Cliente_id_cliente`) REFERENCES `cliente` (`Id_cliente`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=232 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sublime_detalle.pedido: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`id_pedido`, `Cliente_id_cliente`, `Empleado_id_empleado`, `Comentario`, `Fecha_pedido`, `Fecha_entrega`, `Estado_pago`, `Estado_pedido`, `Metodo_pago`) VALUES
	(217, 1, 1, 'Entregado.', '2020-11-27', '2020-11-29', 'P', 'A', 'PayPal'),
	(218, 1, 1, NULL, '2020-11-27', NULL, 'P', 'A', 'PayPal'),
	(219, 1, 1, NULL, '2020-11-28', NULL, 'N', 'C', 'PayPal'),
	(223, 1, 1, NULL, '2020-11-29', NULL, 'N', 'A', 'Contraentrega'),
	(224, 1, 1, NULL, '2020-11-30', NULL, 'N', 'A', 'Contraentrega'),
	(225, 1, 1, NULL, '2020-11-30', NULL, 'N', 'A', 'Contraentrega'),
	(226, 1, 1, NULL, '2020-11-30', NULL, 'N', 'A', 'Contraentrega'),
	(227, 1, 1, NULL, '2020-11-30', NULL, 'N', 'A', 'Contraentrega'),
	(228, 1, 1, NULL, '2020-11-30', NULL, 'N', 'A', 'Contraentrega'),
	(229, 1, 1, NULL, '2020-11-30', NULL, 'N', 'A', 'Contraentrega'),
	(230, 1, 1, NULL, '2020-11-30', NULL, 'N', 'A', 'Contraentrega'),
	(231, 1, 1, NULL, '2021-02-15', NULL, 'N', 'A', 'Contraentrega');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;

-- Volcando estructura para tabla sublime_detalle.pedido_detalle
CREATE TABLE IF NOT EXISTS `pedido_detalle` (
  `id_pedido_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `Pedido_id_pedido` int(11) NOT NULL,
  `Articulo_id_articulo` int(11) NOT NULL,
  `Frase` varchar(100) NOT NULL,
  `Color_articulo` enum('Azul','Negro','Blanco','Rosa','Rojo') NOT NULL,
  `Color_letras` enum('Azul','Negro','Blanco','Rosa','Rojo','Amarillo','Verde','Morado') NOT NULL,
  `Imagen_referencia` varchar(200) DEFAULT NULL,
  `Envoltura` enum('Si','No') NOT NULL,
  `Precio_envoltura` int(10) DEFAULT 100,
  `Precio` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Estado_pedido_detalle` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_pedido_detalle`),
  KEY `Articulo_id_articulo` (`Articulo_id_articulo`),
  KEY `Pedido_id_pedido` (`Pedido_id_pedido`),
  CONSTRAINT `pedido_detalle_ibfk_1` FOREIGN KEY (`Pedido_id_pedido`) REFERENCES `pedido` (`id_pedido`) ON UPDATE CASCADE,
  CONSTRAINT `pedido_detalle_ibfk_2` FOREIGN KEY (`Articulo_id_articulo`) REFERENCES `articulo` (`id_articulo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COMMENT='\r\n';

-- Volcando datos para la tabla sublime_detalle.pedido_detalle: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `pedido_detalle` DISABLE KEYS */;
INSERT INTO `pedido_detalle` (`id_pedido_detalle`, `Pedido_id_pedido`, `Articulo_id_articulo`, `Frase`, `Color_articulo`, `Color_letras`, `Imagen_referencia`, `Envoltura`, `Precio_envoltura`, `Precio`, `Cantidad`, `Total`, `Estado_pedido_detalle`) VALUES
	(120, 217, 8, 'Roberlina', 'Azul', 'Blanco', 'img/imagenes_clientes/BANDERA2.png', 'Si', 100, 600, 1, 600, 'A'),
	(121, 218, 15, 'jaja', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'No', 100, 300, 1, 300, 'A'),
	(123, 219, 2, 'Hola', 'Negro', 'Blanco', NULL, 'No', 100, 500, 3, 1500, 'A'),
	(127, 219, 16, 'Hola', 'Blanco', 'Rosa', NULL, 'No', 100, 400, 3, 1200, 'A'),
	(128, 223, 3, 'Prueba', 'Blanco', 'Blanco', 'img/imagenes_clientes/', 'No', 100, 300, 3, 900, 'A'),
	(129, 223, 2, 'Prueba2', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'Si', 100, 450, 4, 1800, 'A'),
	(130, 224, 5, 'Te amo', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'Si', 100, 350, 1, 350, 'A'),
	(131, 224, 14, 'Holis', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'No', 100, 550, 1, 550, 'A'),
	(132, 224, 19, 'keloke', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'Si', 100, 300, 1, 300, 'A'),
	(133, 225, 19, 'keloke', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'Si', 100, 300, 1, 300, 'A'),
	(134, 225, 5, 'hola', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'No', 100, 350, 1, 350, 'A'),
	(135, 225, 4, 'jjj', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'No', 100, 400, 1, 400, 'A'),
	(136, 225, 15, 'jjjjjjjjjj', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'No', 100, 300, 1, 300, 'A'),
	(137, 226, 15, 'jjjjjjjjjj', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'No', 100, 300, 1, 300, 'A'),
	(138, 227, 7, 'kk', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'Si', 100, 800, 1, 800, 'A'),
	(139, 228, 7, 'j', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'No', 100, 800, 1, 800, 'A'),
	(140, 229, 5, 'j', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'Si', 100, 350, 1, 350, 'A'),
	(141, 229, 14, 'j', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'Si', 100, 550, 1, 550, 'A'),
	(142, 230, 4, 'j', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'No', 100, 400, 1, 400, 'A'),
	(143, 230, 14, 'jjjjjjjjjjj', 'Negro', 'Blanco', 'img/imagenes_clientes/', 'Si', 100, 550, 1, 550, 'A'),
	(144, 231, 7, 'Naye', 'Azul', 'Rosa', 'img/imagenes_clientes/sublime.png', 'Si', 100, 800, 1, 800, 'A');
/*!40000 ALTER TABLE `pedido_detalle` ENABLE KEYS */;

-- Volcando estructura para tabla sublime_detalle.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(75) NOT NULL,
  `Telefono` varchar(20) NOT NULL,
  `Direccion` varchar(150) NOT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Pag_web` varchar(500) DEFAULT NULL,
  `Estado_proveedor` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sublime_detalle.proveedor: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` (`id_proveedor`, `Nombre`, `Telefono`, `Direccion`, `Descripcion`, `Pag_web`, `Estado_proveedor`) VALUES
	(1, 'Tekgraf', '829-521-1992', 'Av. Estrella Sadhalá #75, Santiago De Los Caballeros 51000', 'Tekgraf es una compañia dedicada a la venta de Equipos y Materiales para impresión digital, rotulación, sublimación, transfer, plotter, corte entre ot', 'https://www.tekgraf.com.do/', 'A'),
	(2, 'EmiGroup Rd', '829-532-4365', 'Calle Buen Pastor #8, Santo Domingo. República Dominicana.', 'Empresa dedicada a la distribución de productos en distintas áreas, para las necesidades en tus negocios.\r\nSuplidora para maquina de corte Cricut', 'https://emigrouprd.com/', 'A'),
	(4, 'M&T confecciones', '829-260-1987', 'Camaguey, las maras C/P', 'Empresa dedicada a la confeccion y realizacion de productos textiles', NULL, 'A');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla sublime_detalle.rol_empleado
CREATE TABLE IF NOT EXISTS `rol_empleado` (
  `Id_rol_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Estado_rol` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`Id_rol_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sublime_detalle.rol_empleado: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `rol_empleado` DISABLE KEYS */;
INSERT INTO `rol_empleado` (`Id_rol_empleado`, `Nombre`, `Descripcion`, `Estado_rol`) VALUES
	(1, 'Propietario', 'Creadora de toda la empresa desde cero', 'A'),
	(2, 'Diseñadora pag.web', 'Socia para la creacion de la pag.web de la empresa', 'A');
/*!40000 ALTER TABLE `rol_empleado` ENABLE KEYS */;

-- Volcando estructura para tabla sublime_detalle.tipo_acceso
CREATE TABLE IF NOT EXISTS `tipo_acceso` (
  `Id_tipo_acceso` int(11) NOT NULL AUTO_INCREMENT,
  `Nivel` enum('Admin','User','Empleado') NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Estado_tipo_acceso` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`Id_tipo_acceso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sublime_detalle.tipo_acceso: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_acceso` DISABLE KEYS */;
INSERT INTO `tipo_acceso` (`Id_tipo_acceso`, `Nivel`, `Descripcion`, `Estado_tipo_acceso`) VALUES
	(1, 'Admin', 'Poseerá todos los privilegios del sistema', 'A'),
	(2, 'User', 'Solo tendrá el privilegio de ver y comprar nuestros articulos', 'A'),
	(3, 'Empleado', 'Este tendra acceso a los reportes necesarios para la toma de decisiones', 'A');
/*!40000 ALTER TABLE `tipo_acceso` ENABLE KEYS */;

-- Volcando estructura para tabla sublime_detalle.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Id_tipo_acceso` int(11) NOT NULL,
  `Usuario` varchar(75) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Estado_usuario` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`Id_usuario`),
  KEY `Id_tipo_acceso` (`Id_tipo_acceso`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Id_tipo_acceso`) REFERENCES `tipo_acceso` (`Id_tipo_acceso`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla sublime_detalle.usuario: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`Id_usuario`, `Id_tipo_acceso`, `Usuario`, `Password`, `Estado_usuario`) VALUES
	(4, 1, 'GénesisDH', 'genesis10221', 'A'),
	(5, 1, 'RoberlinaCH', 'nayeli123', 'A'),
	(6, 2, 'EmmanuelPV', '123456', 'A'),
	(7, 2, 'MildredHA', 'mildred123', 'A'),
	(8, 2, 'WendyHH', 'wendy123', 'A'),
	(9, 2, 'TonyDA', 'Tony123', 'A'),
	(10, 2, 'ChristopherDH', 'crio123', 'I');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
