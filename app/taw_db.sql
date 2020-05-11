CREATE TABLE `fabricantes` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255),
  `direccion` varchar(255),
  `correo` varchar(255),
  `telefono` varchar(255),
  `categoria_id` int NOT NULL
);

CREATE TABLE `categorias` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255)
);

CREATE TABLE `categorias_fabricante` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255)
);

CREATE TABLE `productos` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255),
  `fabricante_id` int NOT NULL,
  `categoria_id` int NOT NULL,
  `precio_venta` decimal,
  `precio_compra` decimal,
  `descripcion` varchar(255),
  `creado` datetime DEFAULT (now())
);

ALTER TABLE `fabricantes` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categorias_fabricante` (`id`);

ALTER TABLE `productos` ADD FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

ALTER TABLE `productos` ADD FOREIGN KEY (`fabricante_id`) REFERENCES `fabricantes` (`id`);
