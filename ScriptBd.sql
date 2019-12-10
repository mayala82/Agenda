CREATE DATABASE `agenda` /*!40100 DEFAULT CHARACTER SET latin1 */;
use agenda;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `psw` varchar(250) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
CREATE TABLE `usuarios_eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_usuario` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `dia_completo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuarios_eventos_ibfk_1` (`fk_usuario`),
  CONSTRAINT `usuarios_eventos_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;