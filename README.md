**Proyecto final para el curso de Riesgo Tecnológico de la Facultad de Ciencias de la UNAM.**



**Integrantes del equipo:**

Luis Enrique Zamudio Cervantes

Camacho González Pablo

Gónzalez Huerta Francisco Javier

Mayesell Colorado Sergio

Martínez Martínez Julio César


**Especificaciones técnicas:**

CodeIgniter 3

MySQL 5.6

Bootstrap 3

Apache 2.4

CentOS


**Script para base de datos:**

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT '',
  `reset_password` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pets`;

CREATE TABLE `pets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `especie` varchar(250) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `breed` varchar(250) DEFAULT NULL,
  `size` varchar(250) DEFAULT NULL,
  `sterilization` tinyint(1) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `date_register` datetime NOT NULL,
  `approved` tinyint(1) DEFAULT '0',
  `user_request` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_request` (`user_request`),
  CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`user_request`) REFERENCES `users` (`id`),
  CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pet_vaccine`;

CREATE TABLE `pet_vaccine` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pet_id` int(11) unsigned NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pet_id` (`pet_id`),
  CONSTRAINT `pet_vaccine_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pets` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

**Nota importante**

Si se desea probar el proyecto de manera local, es necesario configurar la 
salida de correo como SMTP en el archivo application/helpers/app_helper.php 
en la función "sendMail" . Además de cambiar la configuración para la conexión en la base de datos ubicado en el archivo application/config/database.php
