-- MySQL dump 10.13  Distrib 5.1.73, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: pihome
-- ------------------------------------------------------
-- Server version	5.1.73

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
-- Table structure for table `pi_admin`
--

DROP TABLE IF EXISTS `pi_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `pass` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi_admin`
--

LOCK TABLES `pi_admin` WRITE;
/*!40000 ALTER TABLE `pi_admin` DISABLE KEYS */;
INSERT INTO `pi_admin` VALUES (1,'admin','admin');
/*!40000 ALTER TABLE `pi_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi_devices`
--

DROP TABLE IF EXISTS `pi_devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi_devices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `device` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  `letter` varchar(55) COLLATE latin1_german1_ci NOT NULL,
  `code` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '00000',
  `status` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  `sort` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  `aktiv` varchar(55) COLLATE latin1_german1_ci NOT NULL DEFAULT '0',
  `type` varchar(256) COLLATE latin1_german1_ci DEFAULT 'light',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi_devices`
--

LOCK TABLES `pi_devices` WRITE;
/*!40000 ALTER TABLE `pi_devices` DISABLE KEYS */;
INSERT INTO `pi_devices` VALUES (1,'1','Lamp A','A','00000','0','0','1','switch'),(2,'1','Lamp B','B','00000','0','0','1','switch'),(3,'1','Lamp C','C','00000','0','0','1','switch'),(4,'1','Lamp D','D','00000','0','0','1','switch'),(5,'2','Lamp Test','A','pin11','-100','0','1','sensor'),(6,'4','lamp test 24','A','pin66','100','0','1','sensor'),(7,'1','test','A','pin07','0','1','1','sensor');
/*!40000 ALTER TABLE `pi_devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pi_rooms`
--

DROP TABLE IF EXISTS `pi_rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pi_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room` varchar(255) COLLATE latin1_german1_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pi_rooms`
--

LOCK TABLES `pi_rooms` WRITE;
/*!40000 ALTER TABLE `pi_rooms` DISABLE KEYS */;
INSERT INTO `pi_rooms` VALUES (1,'My Room'),(2,'Bathroom'),(3,'Living Room');
/*!40000 ALTER TABLE `pi_rooms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-08 13:09:43
