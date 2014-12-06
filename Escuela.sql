/*
SQLyog Ultimate v9.02 
MySQL - 5.6.16 : Database - phpobjetos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`phpobjetos` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `phpobjetos`;

/*Table structure for table `grupo_alumno` */

DROP TABLE IF EXISTS `grupo_alumno`;

CREATE TABLE `grupo_alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idg` int(11) DEFAULT NULL,
  `idalumno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `grupo_alumno` */

LOCK TABLES `grupo_alumno` WRITE;

UNLOCK TABLES;

/*Table structure for table `grupos` */

DROP TABLE IF EXISTS `grupos`;

CREATE TABLE `grupos` (
  `idg` int(11) NOT NULL AUTO_INCREMENT,
  `namegroup` varchar(900) DEFAULT NULL,
  PRIMARY KEY (`idg`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `grupos` */

LOCK TABLES `grupos` WRITE;

insert  into `grupos`(`idg`,`namegroup`) values (1,'tic-51'),(2,'tic-52'),(3,'tic-53');

UNLOCK TABLES;

/*Table structure for table `maestromateria` */

DROP TABLE IF EXISTS `maestromateria`;

CREATE TABLE `maestromateria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_maestro` int(11) DEFAULT NULL,
  `id_materia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `maestromateria` */

LOCK TABLES `maestromateria` WRITE;

insert  into `maestromateria`(`id`,`id_maestro`,`id_materia`) values (10,2,1),(3,4,3),(4,4,4),(5,3,2),(11,2,2),(9,2,3);

UNLOCK TABLES;

/*Table structure for table `materias` */

DROP TABLE IF EXISTS `materias`;

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `nombremateria` varchar(100) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `materias` */

LOCK TABLES `materias` WRITE;

insert  into `materias`(`id_materia`,`nombremateria`,`estatus`) values (1,'mate','activo'),(2,'progra','activo'),(3,'poo','activo'),(4,'ingles','activo');

UNLOCK TABLES;

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(70) DEFAULT NULL,
  `ApellidoP` varchar(90) DEFAULT NULL,
  `ApellidoM` varchar(90) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Calle` varchar(100) DEFAULT NULL,
  `NumExterior` int(11) DEFAULT NULL,
  `NumInterior` int(11) DEFAULT NULL,
  `Colonia` varchar(70) DEFAULT NULL,
  `Municipio` varchar(90) DEFAULT NULL,
  `Estado` varchar(70) DEFAULT NULL,
  `Cp` int(11) DEFAULT NULL,
  `Correo` varchar(30) DEFAULT NULL,
  `Usuario` varchar(70) DEFAULT NULL,
  `Contrasena` varchar(100) DEFAULT NULL,
  `Nivel` int(11) DEFAULT NULL,
  `Estatus` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`id`,`Nombre`,`ApellidoP`,`ApellidoM`,`Telefono`,`Calle`,`NumExterior`,`NumInterior`,`Colonia`,`Municipio`,`Estado`,`Cp`,`Correo`,`Usuario`,`Contrasena`,`Nivel`,`Estatus`) values (1,'alfredo','Hernandez','Serrano',2147483647,'Mariano Escobedo',47,47,'La Crespa','Toluca','Edo. MÃ©xico',50016,'bluck_230492@hotmail.com','fredy','123456',3,'Activo'),(2,'cinthia','loreto','torres',1234,'1234',1234,1234,'independencia','metepec','mexico',98,'hola@hotmail.com','empezar','empezar',2,'Activo'),(3,'rodrigo','perez','palomares',1111,'99999',3333,55555,'carranza','toluca','mexico',876,'miguel@hotmail.com','1234','1234',2,'Activo'),(4,'josea angel','villanueva','lara',2147483647,'de los santos',489487,57587,'santa anna','metepec','oaxaca',78978,'sexy69@hotmail.com','1234','1234',2,'Activo');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
