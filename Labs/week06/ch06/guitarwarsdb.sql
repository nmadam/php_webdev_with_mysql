-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: guitarwarsdb
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

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
-- Table structure for table `guitarwars`
--

DROP TABLE IF EXISTS `guitarwars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `guitarwars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(32) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `screenshot` varchar(255) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guitarwars`
--

LOCK TABLES `guitarwars` WRITE;
/*!40000 ALTER TABLE `guitarwars` DISABLE KEYS */;
INSERT INTO `guitarwars` VALUES (1,'2008-04-22 14:37:34','Paco Jastorius',127650,NULL,1),(2,'2008-04-22 21:27:54','Nevil Johansson',98430,NULL,0),(3,'2008-04-23 09:06:35','Eddie Vanilli',345900,NULL,0),(4,'2008-04-23 09:12:53','Belita Chevy',282470,NULL,0),(6,'2008-04-23 14:09:50','Kenny Lavitz',64930,NULL,0),(11,'2016-02-17 22:58:11','Kevin',240000,'kevin.jpg',1),(12,'2016-02-17 23:11:29','Nancy',80000,'EDR HighScore.png',1),(13,'2016-02-17 23:15:48','Olivia',213980,'213980.jpg',1),(14,'2016-02-22 01:39:31','Elephant',50000000,'hahaha.jpg',1),(15,'2016-02-22 21:23:31','Adam',51258745,'hiscore.png',0),(16,'2016-02-22 21:35:00','Kurt',555555,'hiscore.png',0),(17,'2016-02-24 20:40:26','Kurt',25212558,'kevin.jpg',1);
/*!40000 ALTER TABLE `guitarwars` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-02-24 20:46:34
