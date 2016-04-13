-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: riskyjobs
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
-- Table structure for table `riskyjobs`
--

DROP TABLE IF EXISTS `riskyjobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `riskyjobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` mediumtext,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  `company` varchar(30) DEFAULT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `riskyjobs`
--

LOCK TABLES `riskyjobs` WRITE;
/*!40000 ALTER TABLE `riskyjobs` DISABLE KEYS */;
INSERT INTO `riskyjobs` VALUES (1,'Custard Walker','We need people willing to test the theory that you can walk on custard.\r\n\r\nWe\'re going to fill a swimming pool with custard, and you\'ll walk on it. \r\n\r\nCustard and other kinds of starchy fluids are known as non-Newtonian fluids. They become solid under high pressure (your feet while you walk) while remaining in their liquid form otherwise.\r\n\r\nTowel provided, own bathing suit, a must.\r\n\r\nNote: if you stand on for too long on the custard\'s surface, you will slowly sink. We are not liable for any custard sinkages.','Albuquerque','NM','87101','Pie Technologies','2008-07-24 11:25:27'),(2,'Shark Trainer','Training sharks to do cute tricks for the audiences at our new water theme park.\r\n\r\nYou\'ll spend time alone in the water with our shiver of sharks. You\'ll train the sharks at night, dawn and dusk when there are no visitors to the theme park. You\'ll also play with the sharks by splashing and making erratic movements.','Orlando','FL','32801','SharkBait, Inc.','2008-04-28 11:25:27'),(3,'Voltage Checker','You\'ll be out in the field checking a.c. and d.c. voltages in the range of 3 to 250 or more volts. You\'ll be equipped with a hand-held light emitting diode to indicate all voltages. You\'ll also check the polarity of d.c. voltages.','Durham','NC','27701','Shock Systems, LLC','2008-06-28 11:25:27'),(4,'Antenna Installer','You\'ll be installing antennas and other metallic broadcast receiving equipment on the roofs of Miami\'s highest buildings. You\'ll be kitted out in our highest quality safety gear: polyester boiler suit and plastic sneakers.','Miami','FL','33109','Heightened Attenuation, Inc.','2008-09-04 11:25:27'),(5,'Elephant Proctologist','Needed: experienced proctologist willing to work with large animals. Elephants at our zoo (in San Francisco) have been noted as having abnormally reddened posteriors. We seek experienced and trained professionals willing to diagnose, treat, and follow up with our valuable elephants.\r\n\r\nBenefits include an annual pass to the zoo.','San Francisco','CA','94102','Bay Area Pacaderm Project','2008-07-29 11:25:27'),(6,'Airplane Engine Cleaner','Jet airplanes needing engines cleaned. In need of clean-minded individuals willing to handle rust and grime removal, as well as occasional disposal of high-flying bird carcasses. Must be alert and able to communicate effectively, as we sometimes have anxious pilots eager to take off.','Ft. Hood','TX','76544','Turbinators','2008-08-17 11:25:27'),(7,'Matador','Bustling dairy farm looking for part-time matador to entertain spirited bull with mild case of ADD. Semaphore experience highly desirable.','Rutland','VT','05701','Mad About Milk Dairies','2008-03-11 12:11:17'),(8,'Paparazzo','Top celebrity photography firm looking for seasoned paparazzo to stalk temperamental lip-syncing pop star with history of road rage. Benefits do not include health insurance. ','Beverly Hills','CA','90210','Diva Pursuit, LLC','2008-03-24 11:25:27'),(9,'Tightrope Walker','Fledgling big top looking for three-ring professional with 1-3 years of experience to perform tightrope acrobatics with pudgy elephant. Willingness to sweep excrement a big plus. Excellent benefits including medical and dental plans, 401 (k), stock ownership and discount purchase plan, prescription coverage, merchandise discount, short and long term disability insurance, life and business travel insurance, vision discount plan, auto and home insurance discounts, medical care and dependent care reimbursement, educational assistance, paid vacation and holidays, and adoption assistance. Flexible starting salaries based on skills and abilities, experience and geographic market. Promotion opportunities based on performance The only thing stopping you from the highest wire in the big tent is your desire and work ethic...and your balance! Other duties include planning & organizing wires, handling minor elephant administration, processing comment cards from children. Leading by example (don\'t fall!), showing initiative and a sense of urgency and being results-driven help acrobatic professionals become successful. If you want to be challenged and your talent needs mentoring and opportunity, Bingling Brothers can offer you a fast track to success!','Laredo','TX','78040','Bingling Brothers Circus','2008-11-14 11:43:59'),(10,'Crocodile Dentist','Do you love animals and hate plaque?  Well, then this might be the job for you!  Our crocodile farm is in need of a Dentist to shine up the smiles of our beloved pets for an upcoming photo shoot with Reptile Weekly magazine.  An ideal candidate will have dental expertise, a positive attitude, and health insurance.','Everglades City','FL','34139','Ravenous Reptiles','2008-07-14 11:25:27'),(11,'Mime','We need some fresh new faces. Full health insurance and shin pads provided. Must love kids.','New York','NY','10001','Mime-R-Us','2008-11-02 11:25:27'),(12,'Pet Food Tester','We pride ourselves on how good our pet food tastes. Now you can help make our products even better. We’re hiring pet food tasters, apply now!','St. Louis','MO','63101','Pet Harvest','2008-11-09 11:25:27'),(13,'Prize Fighter','Up and coming super fly gnat weight boxer needs an opponent to help build his winning record. Slow feet, sloppy hands, and a glass jaw are preferred. No experience required. This is not a full-time salaried position. We\'ll meet you in the alley behind the rink to share the purse. Let Ron King make you a championship fighter, or at least help you lost to one!','Branson','MO','65615','Ron King Promotions','2008-11-14 11:31:08'),(14,'Toreador','Lovely bovines waiting for your superior non-violent cape waving skills. Must pass basic bull fighting aptitude test.','Boise','ID','83701','Get The Horns, LLC','2008-11-14 21:49:31'),(15,'Electric Bull Repairer','Hank\'s Honky Tonk needs an experienced electric bull repairer. Free rides (after you fix it) and half off hot wings are some of the benefits.','Allamuchy','NJ','07820','Hank\'s Honky Tonk','2008-07-27 11:22:28'),(16,'Master Cat Juggler','Are you a practitioner of the lost art of cat juggling? Banned in forty contries, only the Jim Ruiz Circus has refined cat juggling for the sophisticated tastes of the modern audience. Ply your trade with premiere cat jugglers at our circus, the only place on earth to master synchronized cat juggling. It\'s true, juggling them is even harder than herding them. We are an equal opportunity employer, and look forward to adding you to our team. Please be prepared to undergo a thorough battery of tests to prove your deft handling of felines. Only the cream of the crop will be accepted into our Master Cat Juggler program.','Apache Junction','AZ','85220','Jim Ruiz Circus','2008-11-14 21:13:35'),(17,'Tightrope Tester','If the thought of dangling for hours on end from great heights is your idea of a good time, then this job just may be for you. Every one of our tightropes goes through a rigorous 43 point test, culminating in a real live human hanging for a prolonged period of time. That could be you! We do provide safety nets but you\'ll need to bring your own helmet and gloves. Here at our manufacturing facility in Big Top, Montana, we offer an incredible employment package with benefits ranging from Bring Your Pet to Work Week and Formal Fridays. We will need three references, including your verified maximum hang time and number of past falls. We\'re the circus behind the circus!','Big Top','MT','59923','Taut Enterprises, Inc.','2008-11-14 21:17:16'),(18,'Firefighter','The City of Dataville is hiring firefighters. No experience required - you will be trained. Non-smokers preferred. You must be physically fit and not afraid of heights (or heat). Although not required, familiarity with the working end of an axe is a plus.','Dataville','OH','45448','City of Dataville','2008-05-22 09:54:32'),(19,'Golf Ball Picker Upper','Want to combine your love of golf and stunt driving into one exciting career? We have an opening for a golf ball picker upper that just might be for you. Get behind the wheel of the Range Raker 2000, and drive our golf range picking up balls while dodging the best efforts of fellow golfers to hit you. It\'s all part of the service we offer, and your job will be to serve as a challenging target while picking up balls.','Arkadelphia','AL','35033','Tee-Off Golf','2008-08-12 04:54:12');
/*!40000 ALTER TABLE `riskyjobs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-24  4:14:35
