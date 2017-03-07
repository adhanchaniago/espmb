-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: db_proc
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'/home','Home for dashboard','1',1,1,'2016-07-13 20:37:38','2016-07-13 20:37:38'),(2,'/user','Module for user management','1',1,1,'2016-07-13 20:38:20','2016-07-13 20:38:20'),(3,'/master/#','Module for master data parent','1',1,1,'2016-07-13 20:39:14','2016-07-13 20:39:14'),(4,'/master/action','Module for Action Control Management','1',1,1,'2016-07-13 20:40:30','2016-07-13 20:41:32'),(9,'/master/brand','Module for Brand Management','1',1,1,'2016-07-13 20:48:22','2016-07-13 20:48:22'),(12,'/master/group','Module for Group Management','1',1,1,'2016-07-13 20:49:51','2016-07-13 20:49:51'),(13,'/master/holiday','Module for Holiday Management','1',1,1,'2016-07-13 20:50:21','2016-07-13 20:50:21'),(14,'/master/industry','Module for Industry Management','1',1,1,'2016-07-13 20:52:45','2016-07-13 20:52:45'),(16,'/master/media','Module for Media Management','1',1,1,'2016-07-13 20:53:57','2016-07-13 20:53:57'),(17,'/master/mediacategory','Module for Media Category Management','1',1,1,'2016-07-13 20:55:05','2016-07-13 20:55:05'),(18,'/master/mediagroup','Module for Media Group Management','1',1,1,'2016-07-13 20:56:55','2016-07-13 20:56:55'),(19,'/master/menu','Module for Menu Management','1',1,1,'2016-07-13 20:57:30','2016-07-13 20:57:30'),(20,'/master/module','Module for Module Management','1',1,1,'2016-07-13 20:58:39','2016-07-13 20:58:39'),(21,'/master/paper','Module for Paper Type Management','1',1,1,'2016-07-13 20:59:21','2016-07-13 21:00:11'),(23,'/master/religion','Module for Religion Management','1',1,1,'2016-07-13 21:00:40','2016-07-13 21:00:40'),(24,'/master/role','Module for Role Management','1',1,1,'2016-07-13 21:01:10','2016-07-13 21:01:10'),(25,'/master/subindustry','Module for Sub Industry Management','1',1,1,'2016-07-13 21:01:46','2016-07-13 21:01:46'),(26,'/master/unit','Module for Unit Management','1',1,1,'2016-07-13 21:02:11','2016-07-13 21:02:11'),(27,'/master/flowgroup','Module for Flow Group Management','1',1,1,'2016-07-20 21:38:03','2016-07-20 21:38:03'),(30,'/master/flow','Flow Management','1',1,1,'2016-08-22 01:16:35','2016-08-22 01:16:35'),(31,'/master/notificationtype','Module for Master Notification Type','1',1,1,'2016-08-31 20:40:21','2016-08-31 20:40:21'),(35,'/config/#','Module for configuration','1',1,1,'2016-10-04 21:46:46','2016-10-04 21:48:07'),(36,'/config/setting','Module for application settings','1',1,1,'2016-10-04 21:49:26','2016-10-04 21:49:26'),(37,'/config/announcement','Module for Announcement Management','1',1,1,'2016-10-05 22:05:23','2016-10-05 22:05:23'),(43,'/master/publisher','Module for Publisher Management','1',1,1,'2016-10-30 21:23:53','2016-10-30 21:23:53'),(55,'/config/log','Module for User Log','1',1,1,'2017-01-26 07:55:25','2017-01-26 07:55:25'),(59,'/master/company','Module for master company','1',1,1,'2017-03-06 21:11:16','2017-03-06 21:11:16'),(60,'/master/division','Module for Division Management','1',1,1,'2017-03-06 21:11:46','2017-03-06 21:11:46'),(61,'/master/rule','Module for rule management','1',1,1,'2017-03-06 23:47:19','2017-03-06 23:47:19');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-07 15:57:56
