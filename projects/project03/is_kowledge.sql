-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: is_knowledge
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
-- Table structure for table `is_knowledge_blog`
--

DROP TABLE IF EXISTS `is_knowledge_blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is_knowledge_blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post` varchar(255) DEFAULT NULL,
  `approved` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`blog_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_knowledge_blog`
--

LOCK TABLES `is_knowledge_blog` WRITE;
/*!40000 ALTER TABLE `is_knowledge_blog` DISABLE KEYS */;
INSERT INTO `is_knowledge_blog` VALUES (2,'My Second Try','2016-04-10 18:14:03','This should display',0),(18,'Test 7','2016-04-12 20:58:25','Test 7!',1),(21,'Test 10','2016-04-12 22:02:40','Test 10',0),(22,'Test 11','2016-04-12 22:02:43','Test 11',0),(23,'Test 12','2016-04-12 22:02:55','Test 12',0),(24,'Test 12','2016-04-12 22:02:59','Test 12',0),(25,'Test 13','2016-04-13 02:35:07','Test 13',1),(27,'I love bulldogs!','2016-04-13 03:10:13','Bulldogs are so cute!',1),(31,'I love dogs!','2016-04-13 03:40:11','I love Dogs!',1),(32,'Red','2016-04-13 03:19:15','My favorite color is red and my favorite movie is Red!',1),(33,'Test ','2016-04-13 03:19:31','Test 15',0),(34,'Test ','2016-04-13 03:20:42','Test 15',0),(36,'I want this approved!','2016-04-13 20:07:23','Please approve this!',1);
/*!40000 ALTER TABLE `is_knowledge_blog` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-13 20:23:39
