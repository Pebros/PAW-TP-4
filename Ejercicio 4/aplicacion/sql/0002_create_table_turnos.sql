USE paw;

use paw;

CREATE TABLE `turnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_del_paciente` text,
  `email` text,
  `telefono` text,
  `edad` int(11) DEFAULT NULL,
  `talla_de_calzado` int(11) DEFAULT NULL,
  `altura` decimal(10,0) DEFAULT NULL,
  `fecha_de_nacimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `color_de_pelo` text,
  `fecha_del_turno` date,
  `horario_del_turno` text,
  `imagen_diagnostico` longtext,
  `tipoImagen` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;