-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: proyecto
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Articulos`
--

DROP TABLE IF EXISTS `Articulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Articulos` (
  `CodArt` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(15) DEFAULT NULL,
  `Marca` varchar(15) DEFAULT NULL,
  `Precio` decimal(5,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodArt`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Articulos`
--

LOCK TABLES `Articulos` WRITE;
/*!40000 ALTER TABLE `Articulos` DISABLE KEYS */;
INSERT INTO `Articulos` VALUES (1,'Raqueta tenis','Wilson',39.00,10),(2,'Balon futbol','Nike',20.00,10),(4,'Raqueta padel','Varlion',32.00,10),(5,'Balon rugby','Gilbert',24.00,10),(6,'Balon futbol sa','Kispta',8.00,10),(7,'Balon sala','Kispta',8.00,10),(8,'Balon basket','Spalding',25.00,10),(9,'Raqueta tenis','Babolat',45.00,10),(10,'Raqueta padel','Bullpadel',38.00,10),(11,'Raqueta padel','Fila',30.00,10),(12,'Raqueta tenis','Dunlop',54.00,10);
/*!40000 ALTER TABLE `Articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Mensajes`
--

DROP TABLE IF EXISTS `Mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Mensajes` (
  `CodMen` int(11) NOT NULL AUTO_INCREMENT,
  `Destinatario` int(11) DEFAULT NULL,
  `Remitente` int(11) DEFAULT NULL,
  `Asunto` varchar(25) DEFAULT NULL,
  `Cuerpo` varchar(200) DEFAULT NULL,
  `hora_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `leido` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`CodMen`),
  KEY `Destinatario` (`Destinatario`),
  KEY `Remitente` (`Remitente`),
  CONSTRAINT `Mensajes_ibfk_1` FOREIGN KEY (`Destinatario`) REFERENCES `Usuarios` (`CodUsu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Mensajes_ibfk_2` FOREIGN KEY (`Remitente`) REFERENCES `Usuarios` (`CodUsu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Mensajes`
--

LOCK TABLES `Mensajes` WRITE;
/*!40000 ALTER TABLE `Mensajes` DISABLE KEYS */;
INSERT INTO `Mensajes` VALUES (2,2,3,'Partido de tenis','A las 16:00','2019-01-17 11:44:33',1),(4,3,2,'Partido de padel','A las 20:00','2019-01-17 12:50:23',1),(5,3,2,'Partido de padel','A las 20:00','2019-01-17 16:11:41',0),(6,3,2,'Partido de padel','A las 20:00','2019-01-17 16:29:17',0),(7,3,2,'Partido de padel','A las 20:00','2019-01-17 16:29:18',0),(10,2,3,'Partido de padel','A las 20:00','2019-01-17 16:56:46',1),(18,5,2,'Partido','partido    ','2019-01-17 17:51:25',1),(19,5,2,'Partido','partido    ','2019-01-17 17:52:45',1),(20,5,2,'Partido','partido    ','2019-01-17 17:53:24',1),(21,5,2,'Partido','partido    ','2019-01-17 17:54:25',0),(22,5,2,'Partido','partido    ','2019-01-17 17:55:04',0),(23,5,2,'Partido','partido    ','2019-01-17 17:55:22',0),(24,5,2,'Partido','partido    ','2019-01-17 17:55:29',0),(26,5,2,'Partido','partido    ','2019-01-17 17:55:56',1),(27,9,2,'Partido','    partido de futbol a las 7 ','2019-01-17 22:13:33',1),(28,2,3,'Partido de padel','A las 20:00','2019-01-18 00:00:08',1),(29,2,6,'Partido','Me parto con el ivan    ','2019-01-18 09:08:25',1),(31,2,23,'j','    kko','2019-01-18 11:16:56',1);
/*!40000 ALTER TABLE `Mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pedidos`
--

DROP TABLE IF EXISTS `Pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pedidos` (
  `CodPed` int(11) NOT NULL AUTO_INCREMENT,
  `CodUsu` int(11) DEFAULT NULL,
  `CodArt` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodPed`),
  KEY `CodUsu` (`CodUsu`),
  KEY `CodArt` (`CodArt`),
  CONSTRAINT `Pedidos_ibfk_1` FOREIGN KEY (`CodUsu`) REFERENCES `Usuarios` (`CodUsu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Pedidos_ibfk_2` FOREIGN KEY (`CodArt`) REFERENCES `Articulos` (`CodArt`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pedidos`
--

LOCK TABLES `Pedidos` WRITE;
/*!40000 ALTER TABLE `Pedidos` DISABLE KEYS */;
INSERT INTO `Pedidos` VALUES (22,3,2,2),(23,3,4,3),(24,3,1,4),(28,6,1,10),(29,6,1,1),(30,6,1,1),(34,10,1,1),(46,2,12,2),(47,2,9,1),(48,2,2,3),(49,2,1,2),(50,5,2,2),(51,5,10,1),(52,2,12,5),(53,23,2,2);
/*!40000 ALTER TABLE `Pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pistas`
--

DROP TABLE IF EXISTS `Pistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Pistas` (
  `CodPis` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(15) DEFAULT NULL,
  `Descripcion` varchar(150) DEFAULT NULL,
  `Precio` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`CodPis`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pistas`
--

LOCK TABLES `Pistas` WRITE;
/*!40000 ALTER TABLE `Pistas` DISABLE KEYS */;
INSERT INTO `Pistas` VALUES (2,'futbol','futbol 7',10.50),(3,'futbol sala','césped',3.50),(4,'tenis','césped',4.00),(5,'pádel','pared de cristal',3.50),(6,'baloncesto','pista cubierta',7.50);
/*!40000 ALTER TABLE `Pistas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Reservas`
--

DROP TABLE IF EXISTS `Reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Reservas` (
  `CodRes` int(11) NOT NULL AUTO_INCREMENT,
  `CodUsu` int(11) DEFAULT NULL,
  `CodPis` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`CodRes`),
  KEY `CodUsu` (`CodUsu`),
  KEY `CodPis` (`CodPis`),
  CONSTRAINT `Reservas_ibfk_1` FOREIGN KEY (`CodUsu`) REFERENCES `Usuarios` (`CodUsu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Reservas_ibfk_2` FOREIGN KEY (`CodPis`) REFERENCES `Pistas` (`CodPis`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Reservas`
--

LOCK TABLES `Reservas` WRITE;
/*!40000 ALTER TABLE `Reservas` DISABLE KEYS */;
INSERT INTO `Reservas` VALUES (101,2,6,'2019-02-08','10:00:00'),(102,2,6,'2019-02-07','12:00:00'),(103,2,2,'2019-02-07','12:00:00'),(104,2,2,'2019-02-07','14:00:00'),(110,4,6,'2019-03-10','08:00:00'),(111,4,6,'2019-05-10','08:00:00'),(112,4,6,'2019-07-10','08:00:00'),(113,4,6,'2019-08-10','08:00:00'),(114,4,6,'2019-09-10','08:00:00'),(116,2,3,'2019-05-18','10:00:00'),(117,2,3,'2019-04-11','10:00:00'),(127,2,3,'2019-02-10','08:00:00'),(128,3,3,'2019-02-10','10:00:00'),(129,5,4,'2019-02-10','12:00:00'),(130,5,4,'2019-02-10','12:00:00'),(131,5,4,'2019-02-10','12:00:00'),(132,2,3,'2019-02-10','17:00:00'),(133,3,2,'2019-02-10','20:00:00'),(134,5,4,'2019-03-10','12:00:00'),(135,2,4,'2019-03-10','12:00:00'),(136,3,4,'2019-03-10','13:00:00'),(137,2,3,'2019-03-10','17:00:00'),(138,3,4,'2019-03-10','18:00:00'),(139,6,2,'2019-03-10','13:00:00'),(141,2,3,'2019-03-10','20:00:00'),(142,6,3,'2019-03-10','19:00:00'),(144,6,3,'2019-03-10','14:00:00'),(145,6,3,'2019-04-10','14:00:00'),(147,6,3,'2019-04-10','19:00:00'),(148,6,3,'2019-05-10','14:00:00'),(150,6,3,'2019-05-10','19:00:00'),(151,6,3,'2019-06-10','14:00:00'),(153,6,3,'2019-06-10','14:00:00'),(154,6,3,'2019-07-10','14:00:00'),(156,6,3,'2019-07-10','19:00:00'),(157,6,3,'2019-08-10','14:00:00'),(159,6,3,'2019-08-10','19:00:00'),(160,6,3,'2019-01-10','14:00:00'),(162,6,3,'2019-01-10','19:00:00'),(163,6,3,'2019-01-10','15:00:00'),(164,1,2,'2019-01-10','15:00:00'),(165,6,2,'2019-01-10','17:00:00'),(167,6,3,'2019-01-10','19:00:00'),(168,3,2,'2019-01-10','14:00:00'),(169,6,3,'2019-11-10','19:00:00'),(170,6,3,'2019-11-10','20:00:00'),(179,2,2,'2019-12-01','18:00:00'),(180,3,2,'2019-12-01','12:00:00'),(181,3,2,'2019-12-01','13:00:00'),(182,2,5,'2019-08-23','11:00:00'),(184,2,5,'2019-08-23','10:00:00'),(185,2,3,'2019-01-25','11:00:00'),(187,2,3,'2019-01-25','10:00:00'),(189,2,3,'2019-01-25','13:00:00'),(191,2,4,'2019-01-25','12:00:00');
/*!40000 ALTER TABLE `Reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuarios`
--

DROP TABLE IF EXISTS `Usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuarios` (
  `CodUsu` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(15) DEFAULT NULL,
  `Apellidos` varchar(50) DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `pass` varchar(5) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tipo` varchar(5) DEFAULT NULL,
  `Nickname` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CodUsu`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuarios`
--

LOCK TABLES `Usuarios` WRITE;
/*!40000 ALTER TABLE `Usuarios` DISABLE KEYS */;
INSERT INTO `Usuarios` VALUES (1,'Administrador','  ','  ','00000','root@root.com','root',NULL),(2,'Manuel','Garcia Lebrato','ciudad aljarafe conj 21 4 6','12345','mgls93@gmail.com',NULL,'Manuel123'),(3,'Manolo','Garcia Belloso','Ciudad Aljarafe conj 21 4 6','12345','mgb@gmail.com',NULL,'Manolo123'),(4,'Jorge','Romero Rodriguez','Calle Clavel 14 ','12345','jrr@gmail.com',NULL,NULL),(5,'Antonio','Moreno Alonso','ciudad aljarafe conj 20 4 5','12345','ama@gmail.com',NULL,NULL),(6,'Claudia','Moreno Rodriguez','Calle Estrella vega 9 5 b','12345','cmr@gmail.com',NULL,NULL),(7,'Isabel ','Martinez Lebrato','ciudad aljarafe conj 21 4 6','12345','iml@gmail.com',NULL,NULL),(8,'Julian','Lebrato Martinez','Calle Barcelona 5','12345','jlm@gmail.com',NULL,NULL),(9,'Clara','Lebrato Vazquez','Calle Montecarmelo 53','12345','clv@gmail.com',NULL,NULL),(10,'Mamen','Moreno Tudela','Nuestra SeÃ±ora del Rosario','12345','mmt@gmail.com',NULL,NULL),(11,'Ivan','Triguero Curado','Los palacios Calle Picasso','12345','itc@gmail.com',NULL,NULL),(12,'Jorge','Vega','triana n3 4 a','12345','jvp@gmail.com',NULL,NULL),(13,'Pepe','Garcia Belloso','calle petunia n 18','12345','pgb@gmail.com',NULL,NULL),(14,'Juan','MOreno','montellano','12345','jmm@gmail.com',NULL,NULL),(16,'paco','fiestas','guillena','12345','pcfiestas@gmail.com',NULL,NULL),(18,'Carlos','valenzuela','republica argentina n 3','12345','cv@gmail.com',NULL,NULL),(19,'juan diego','perez','triana n6 ','12345','jdp@gmail.com',NULL,NULL),(20,'ricardo','lucas','triana n 9','12345','rc@gmail.com',NULL,NULL),(21,'manuel','perez','mairena n3','12345','mperez@gmail.com',NULL,NULL),(22,'Alberto','Moron','calle triana n 1','12345','am@gmail.com',NULL,NULL),(23,'Juan','moreno galbarro','calle san jacinto','12345','abc@gmail.com',NULL,NULL);
/*!40000 ALTER TABLE `Usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-22  7:59:52
