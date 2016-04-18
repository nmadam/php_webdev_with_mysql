-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: mismatch
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
-- Table structure for table `mismatch_user`
--

DROP TABLE IF EXISTS `mismatch_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mismatch_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `join_date` datetime DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `city` varchar(32) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `picture` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mismatch_user`
--

LOCK TABLES `mismatch_user` WRITE;
/*!40000 ALTER TABLE `mismatch_user` DISABLE KEYS */;
INSERT INTO `mismatch_user` VALUES (1,'','','2008-06-03 14:51:46','Sidney','Kelsow','F','1984-07-19','Tempe','AZ','sidneypic.jpg'),(2,'','','2008-06-03 14:52:09','Nevil','Johansson','M','1973-05-13','Reno','NV','nevilpic.jpg'),(3,'','','2008-06-03 14:53:05','Alex','Cooper','M','1974-09-13','Boise','ID','alexpic.jpg'),(4,'','','2008-06-03 14:58:40','Susannah','Daniels','F','1977-02-23','Pasadena','CA','susannahpic.jpg'),(5,'','','2008-06-03 15:00:37','Ethel','Heckel','F','1943-03-27','Wichita','KS','ethelpic.jpg'),(6,'','','2008-06-03 15:00:48','Oscar','Klugman','M','1968-06-04','Providence','RI','oscarpic.jpg'),(7,'','','2008-06-03 15:01:08','Belita','Chevy','F','1975-07-08','El Paso','TX','belitapic.jpg'),(8,'','','2008-06-03 15:01:19','Jason','Filmington','M','1969-09-24','Hollywood','CA','jasonpic.jpg'),(9,'','','2008-06-03 15:01:51','Dierdre','Pennington','F','1970-04-26','Cambridge','MA','dierdrepic.jpg'),(10,'','','2008-06-03 15:02:02','Paul','Hillsman','M','1964-12-18','Charleston','SC','paulpic.jpg'),(11,'','','2008-06-03 15:02:13','Johan','Nettles','M','1981-11-03','Athens','GA','johanpic.jpg'),(12,'jimi','2aa36f17507f2c75df2e24aa63c7dabcaf86926e','2016-03-02 01:39:55',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'nmadam','aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d','2016-03-02 06:45:22','Nancy','Adam','F','2000-01-01','Rockford','IL','bulldog.jpeg'),(14,'Barney','4598a39a7c81b8cd12ed04cced44c077fe0a72b9','2016-03-02 06:56:50',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(15,'Fred','e2bd94525b8dbd41a713e7e96455815df24f6e04','2016-03-02 07:57:04','Fred','Flinstone','M','1500-02-02','Rubbleton','TX','stones.jpeg'),(16,'Harry','64de3ff53843156d769278248f83d016e310c1ef','2016-03-02 22:19:00','Harry','Potter','M','2016-03-02','Madison','WI','harry.jpeg'),(17,'donald','5ece240085b9ad85b64896082e3761c54ef581de','2016-03-22 16:33:49',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `mismatch_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-18 21:41:26
