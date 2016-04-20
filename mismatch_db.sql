-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: mismatch_db
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
-- Table structure for table `mismatch_category`
--

DROP TABLE IF EXISTS `mismatch_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mismatch_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mismatch_category`
--

LOCK TABLES `mismatch_category` WRITE;
/*!40000 ALTER TABLE `mismatch_category` DISABLE KEYS */;
INSERT INTO `mismatch_category` VALUES (1,'Appearance'),(2,'Entertainment'),(3,'Food'),(4,'People'),(5,'Activities');
/*!40000 ALTER TABLE `mismatch_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mismatch_response`
--

DROP TABLE IF EXISTS `mismatch_response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mismatch_response` (
  `response_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `response` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`response_id`)
) ENGINE=InnoDB AUTO_INCREMENT=376 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mismatch_response`
--

LOCK TABLES `mismatch_response` WRITE;
/*!40000 ALTER TABLE `mismatch_response` DISABLE KEYS */;
INSERT INTO `mismatch_response` VALUES (1,1,1,2),(2,1,2,2),(3,1,3,2),(4,1,4,1),(5,1,5,1),(6,1,6,1),(7,1,7,2),(8,1,8,2),(9,1,9,1),(10,1,10,1),(11,1,11,1),(12,1,12,2),(13,1,13,1),(14,1,14,2),(15,1,15,1),(16,1,16,2),(17,1,17,1),(18,1,18,1),(19,1,19,2),(20,1,20,1),(21,1,21,1),(22,1,22,2),(23,1,23,1),(24,1,24,2),(25,1,25,1),(26,7,1,1),(27,7,2,2),(28,7,3,1),(29,7,4,2),(30,7,5,1),(31,7,6,2),(32,7,7,1),(33,7,8,1),(34,7,9,2),(35,7,10,2),(36,7,11,1),(37,7,12,2),(38,7,13,1),(39,7,14,1),(40,7,15,2),(41,7,16,1),(42,7,17,2),(43,7,18,2),(44,7,19,2),(45,7,20,1),(46,7,21,2),(47,7,22,2),(48,7,23,1),(49,7,24,1),(50,7,25,2),(51,2,1,1),(52,2,2,1),(53,2,3,2),(54,2,4,2),(55,2,5,2),(56,2,6,2),(57,2,7,2),(58,2,8,2),(59,2,9,1),(60,2,10,1),(61,2,11,2),(62,2,12,1),(63,2,13,1),(64,2,14,2),(65,2,15,2),(66,2,16,2),(67,2,17,1),(68,2,18,2),(69,2,19,1),(70,2,20,2),(71,2,21,1),(72,2,22,2),(73,2,23,2),(74,2,24,1),(75,2,25,1),(76,11,1,1),(77,11,2,1),(78,11,3,1),(79,11,4,1),(80,11,5,1),(81,11,6,2),(82,11,7,1),(83,11,8,1),(84,11,9,2),(85,11,10,2),(86,11,11,2),(87,11,12,1),(88,11,13,1),(89,11,14,1),(90,11,15,2),(91,11,16,1),(92,11,17,2),(93,11,18,2),(94,11,19,1),(95,11,20,2),(96,11,21,2),(97,11,22,1),(98,11,23,2),(99,11,24,1),(100,11,25,2),(101,12,1,2),(102,12,2,2),(103,12,3,1),(104,12,4,1),(105,12,5,1),(106,12,6,2),(107,12,7,2),(108,12,8,1),(109,12,9,2),(110,12,10,1),(111,12,11,1),(112,12,12,2),(113,12,13,2),(114,12,14,2),(115,12,15,2),(116,12,16,1),(117,12,17,1),(118,12,18,2),(119,12,19,1),(120,12,20,1),(121,12,21,1),(122,12,22,2),(123,12,23,1),(124,12,24,2),(125,12,25,2),(126,8,1,2),(127,8,2,2),(128,8,3,1),(129,8,4,1),(130,8,5,2),(131,8,6,1),(132,8,7,1),(133,8,8,2),(134,8,9,1),(135,8,10,1),(136,8,11,2),(137,8,12,2),(138,8,13,2),(139,8,14,2),(140,8,15,1),(141,8,16,1),(142,8,17,1),(143,8,18,2),(144,8,19,1),(145,8,20,1),(146,8,21,1),(147,8,22,1),(148,8,23,2),(149,8,24,2),(150,8,25,1),(151,3,1,1),(152,3,2,1),(153,3,3,1),(154,3,4,2),(155,3,5,2),(156,3,6,2),(157,3,7,1),(158,3,8,1),(159,3,9,2),(160,3,10,1),(161,3,11,1),(162,3,12,1),(163,3,13,1),(164,3,14,1),(165,3,15,1),(166,3,16,2),(167,3,17,2),(168,3,18,2),(169,3,19,1),(170,3,20,1),(171,3,21,1),(172,3,22,1),(173,3,23,1),(174,3,24,2),(175,3,25,2),(176,4,1,1),(177,4,2,2),(178,4,3,1),(179,4,4,1),(180,4,5,2),(181,4,6,1),(182,4,7,1),(183,4,8,2),(184,4,9,1),(185,4,10,2),(186,4,11,2),(187,4,12,1),(188,4,13,2),(189,4,14,2),(190,4,15,1),(191,4,16,1),(192,4,17,2),(193,4,18,1),(194,4,19,1),(195,4,20,2),(196,4,21,2),(197,4,22,1),(198,4,23,2),(199,4,24,1),(200,4,25,1),(201,5,1,2),(202,5,2,2),(203,5,3,2),(204,5,4,1),(205,5,5,1),(206,5,6,2),(207,5,7,2),(208,5,8,2),(209,5,9,1),(210,5,10,1),(211,5,11,2),(212,5,12,1),(213,5,13,2),(214,5,14,1),(215,5,15,2),(216,5,16,2),(217,5,17,1),(218,5,18,1),(219,5,19,2),(220,5,20,1),(221,5,21,2),(222,5,22,2),(223,5,23,1),(224,5,24,1),(225,5,25,1),(226,6,1,2),(227,6,2,1),(228,6,3,2),(229,6,4,1),(230,6,5,2),(231,6,6,1),(232,6,7,1),(233,6,8,1),(234,6,9,2),(235,6,10,1),(236,6,11,1),(237,6,12,2),(238,6,13,2),(239,6,14,2),(240,6,15,1),(241,6,16,2),(242,6,17,1),(243,6,18,1),(244,6,19,2),(245,6,20,1),(246,6,21,1),(247,6,22,2),(248,6,23,2),(249,6,24,2),(250,6,25,1),(251,9,1,2),(252,9,2,1),(253,9,3,1),(254,9,4,2),(255,9,5,2),(256,9,6,2),(257,9,7,2),(258,9,8,2),(259,9,9,1),(260,9,10,1),(261,9,11,2),(262,9,12,1),(263,9,13,2),(264,9,14,1),(265,9,15,2),(266,9,16,1),(267,9,17,1),(268,9,18,1),(269,9,19,2),(270,9,20,1),(271,9,21,1),(272,9,22,2),(273,9,23,2),(274,9,24,1),(275,9,25,1),(276,10,1,1),(277,10,2,2),(278,10,3,2),(279,10,4,2),(280,10,5,2),(281,10,6,2),(282,10,7,1),(283,10,8,2),(284,10,9,2),(285,10,10,1),(286,10,11,1),(287,10,12,2),(288,10,13,1),(289,10,14,2),(290,10,15,1),(291,10,16,1),(292,10,17,1),(293,10,18,1),(294,10,19,1),(295,10,20,1),(296,10,21,1),(297,10,22,1),(298,10,23,1),(299,10,24,2),(300,10,25,2),(301,13,1,1),(302,13,2,1),(303,13,3,2),(304,13,4,1),(305,13,5,1),(306,13,6,2),(307,13,7,2),(308,13,8,2),(309,13,9,1),(310,13,10,2),(311,13,11,2),(312,13,12,2),(313,13,13,2),(314,13,14,2),(315,13,15,1),(316,13,16,2),(317,13,17,1),(318,13,18,1),(319,13,19,2),(320,13,20,1),(321,13,21,1),(322,13,22,2),(323,13,23,1),(324,13,24,1),(325,13,25,1),(326,14,1,2),(327,14,2,2),(328,14,3,2),(329,14,4,2),(330,14,5,1),(331,14,6,1),(332,14,7,1),(333,14,8,2),(334,14,9,1),(335,14,10,1),(336,14,11,1),(337,14,12,1),(338,14,13,2),(339,14,14,2),(340,14,15,2),(341,14,16,2),(342,14,17,1),(343,14,18,2),(344,14,19,1),(345,14,20,1),(346,14,21,2),(347,14,22,2),(348,14,23,2),(349,14,24,1),(350,14,25,2),(351,15,1,2),(352,15,2,2),(353,15,3,2),(354,15,4,1),(355,15,5,1),(356,15,6,1),(357,15,7,2),(358,15,8,1),(359,15,9,2),(360,15,10,2),(361,15,11,2),(362,15,12,2),(363,15,13,1),(364,15,14,2),(365,15,15,2),(366,15,16,2),(367,15,17,2),(368,15,18,2),(369,15,19,2),(370,15,20,2),(371,15,21,1),(372,15,22,1),(373,15,23,1),(374,15,24,2),(375,15,25,1);
/*!40000 ALTER TABLE `mismatch_response` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mismatch_topic`
--

DROP TABLE IF EXISTS `mismatch_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mismatch_topic` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(48) DEFAULT NULL,
  `category` varchar(48) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mismatch_topic`
--

LOCK TABLES `mismatch_topic` WRITE;
/*!40000 ALTER TABLE `mismatch_topic` DISABLE KEYS */;
INSERT INTO `mismatch_topic` VALUES (1,'Tattoos','Appearance',1),(2,'Gold chains','Appearance',1),(3,'Body piercings','Appearance',1),(4,'Cowboy boots','Appearance',1),(5,'Long hair','Appearance',1),(6,'Reality TV','Entertainment',2),(7,'Professional wrestling','Entertainment',2),(8,'Horror movies','Entertainment',2),(9,'Easy listening music','Entertinment',2),(10,'The opera','Entertainment',2),(11,'Sushi','Food',3),(12,'Spam','Food',3),(13,'Spicy food','Food',3),(14,'Peanut butter & banana sandwiches','Food',3),(15,'Martinis','Food',3),(16,'Howard Stern','People',4),(17,'Bill Gates','Peopel',4),(18,'Barbara Streisand','People',4),(19,'Hugh Hefner','People',4),(20,'Martha Stewart','People',4),(21,'Yoga','Activities',5),(22,'Weightlifting','Activities',5),(23,'Cube puzzles','Activities',5),(24,'Karaoke','Activities',5),(25,'Hiking','Activities',5);
/*!40000 ALTER TABLE `mismatch_topic` ENABLE KEYS */;
UNLOCK TABLES;

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

-- Dump completed on 2016-04-20 20:28:05
