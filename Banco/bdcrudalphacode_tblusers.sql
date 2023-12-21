CREATE DATABASE  IF NOT EXISTS `bdcrudalphacode` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bdcrudalphacode`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: bdcrudalphacode
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tblusers` (
  `IdUser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(65) NOT NULL,
  `Email` varchar(65) NOT NULL,
  `DataDeNascimento` date DEFAULT NULL,
  `Profissao` varchar(65) NOT NULL,
  `TelefoneContato` varchar(65) NOT NULL,
  `CelularContato` varchar(65) NOT NULL,
  `NotificacaoEmail` tinyint(1) DEFAULT NULL,
  `NotificacaoWhatsapp` tinyint(1) DEFAULT NULL,
  `NotificacaoSMS` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusers`
--

LOCK TABLES `tblusers` WRITE;
/*!40000 ALTER TABLE `tblusers` DISABLE KEYS */;
INSERT INTO `tblusers` VALUES (1,'marcus Vinnicius souza','marcus@gmail.com','2023-12-15','adm','(11) 4033-2019','(11) 98493-2039',0,0,0),(8,'Marcus Vinncius','marcusvinniciusouza@gmail.com','2002-09-13','brasil','(11) 1111-111','(11) 11111-111',0,1,1),(19,'marcus true','marcus@gmail.com','2023-12-15','adm','(11) 4033-2019','(11) 98493-2039',1,0,0),(20,'marcus false','marcus@gmail.com','2023-12-15','adm','(11) 4033-2019','(11) 98493-2039',0,1,1),(24,'Marcus Vinncius','marquinhosvinni51@gmail.com','2009-09-13','Agiota','(11) 1111-111','(11) 11111-111',0,0,1);
/*!40000 ALTER TABLE `tblusers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-20 22:04:34
