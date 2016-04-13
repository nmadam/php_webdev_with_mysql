-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: exercise_logger
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
-- Table structure for table `exercise_log`
--

DROP TABLE IF EXISTS `exercise_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `exercise_date` date DEFAULT NULL,
  `exercise_type` varchar(255) DEFAULT NULL,
  `exercise_time_in_minutes` int(11) DEFAULT NULL,
  `exercise_heart_rate` int(11) DEFAULT NULL,
  `calories_burned` int(11) DEFAULT NULL,
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `exercise_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `exercise_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_log`
--

LOCK TABLES `exercise_log` WRITE;
/*!40000 ALTER TABLE `exercise_log` DISABLE KEYS */;
INSERT INTO `exercise_log` VALUES (24,10,'2016-03-23','Running',15,90,38),(25,10,'2016-03-18','Swimming',30,100,121),(27,8,'2016-02-04','Walking',90,75,388),(28,9,'2016-03-23','Running',40,120,316),(29,9,'2016-03-21','Running',60,110,383),(30,9,'2016-03-18','Running',35,100,171),(32,12,'2016-03-21','Running',20,75,-17),(33,12,'2016-03-18','Running',25,82,5),(34,6,'2016-03-23','Walking',25,90,77),(35,6,'2016-03-21','Walking',45,95,163),(36,6,'2016-03-18','Pilates',45,80,91),(37,11,'2016-03-23','Yoga',60,100,240),(38,11,'2016-03-21','Pilates',30,95,104),(39,11,'2016-03-21','Walking',30,110,152),(40,5,'2016-03-18','Running',45,100,183),(41,5,'2016-03-23','Swimming',75,85,136),(42,13,'2016-03-21','Yoga',45,100,219);
/*!40000 ALTER TABLE `exercise_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercise_user`
--

DROP TABLE IF EXISTS `exercise_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercise_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_first_name` varchar(255) DEFAULT NULL,
  `user_last_name` varchar(255) DEFAULT NULL,
  `user_gender` char(1) DEFAULT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_weight` int(11) DEFAULT NULL,
  `picture` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercise_user`
--

LOCK TABLES `exercise_user` WRITE;
/*!40000 ALTER TABLE `exercise_user` DISABLE KEYS */;
INSERT INTO `exercise_user` VALUES (5,'dduck','5ece240085b9ad85b64896082e3761c54ef581de','Donald','Duck','M','1955-10-10',100,'donald.png'),(6,'nmadam','aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d','Nancy','Adam','F','1971-04-04',180,'dog chocolage.jpe'),(7,'barney','5ce94cfcdc2372ed797364c927560f497a5969d8',NULL,NULL,NULL,NULL,NULL,NULL),(8,'Fred','e2bd94525b8dbd41a713e7e96455815df24f6e04','Fred','Flinstone','M','1975-12-12',250,'stones.jpeg'),(9,'Harry','955346bb4d013fda2604ecac8a5696f27d2781bf','Harry','Potter','M','1995-07-07',90,'harry.jpeg'),(10,'calvin','c00a3057e1daef83aec2643d3987f592fd7bb1de','Calvin','Hobbes','M','1995-07-07',50,'bulldog.jpeg'),(11,'Rebel','b2ffdbeb87e8e6331d350b482b328d309bc5a321','Rebel','Wilson','F','1980-05-30',180,'stones.jpeg'),(12,'kevin','77e4c401984e5d311e746b4f0797a24e3276f694','Kevin','Minion','M','2007-09-09',25,'minions.jpe'),(13,'Olivia','006b8c5903d21c1d960e20b6c54711c1584275fd','Olivia','Newton','F','1965-08-08',135,'kittens.jpe');
/*!40000 ALTER TABLE `exercise_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-24  7:54:28
