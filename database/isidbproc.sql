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
/*INSERT INTO `modules` VALUES (1,'/home','','Home for dashboard','1',1,NULL,'2016-07-13 20:37:38','2016-07-13 20:37:38'),(2,'/user','','Module for user management','1',1,NULL,'2016-07-13 20:38:20','2016-07-13 20:38:20'),(3,'/master/#','','Module for master data parent','1',1,NULL,'2016-07-13 20:39:14','2016-07-13 20:39:14'),(4,'/master/action','','Module for Action Control Management','1',1,1,'2016-07-13 20:40:30','2016-07-13 20:41:32'),(9,'/master/brand','','Module for Brand Management','1',1,NULL,'2016-07-13 20:48:22','2016-07-13 20:48:22'),(12,'/master/group','','Module for Group Management','1',1,NULL,'2016-07-13 20:49:51','2016-07-13 20:49:51'),(13,'/master/holiday','','Module for Holiday Management','1',1,NULL,'2016-07-13 20:50:21','2016-07-13 20:50:21'),(14,'/master/industry','','Module for Industry Management','1',1,NULL,'2016-07-13 20:52:45','2016-07-13 20:52:45'),(16,'/master/media','','Module for Media Management','1',1,NULL,'2016-07-13 20:53:57','2016-07-13 20:53:57'),(17,'/master/mediacategory','','Module for Media Category Management','1',1,NULL,'2016-07-13 20:55:05','2016-07-13 20:55:05'),(18,'/master/mediagroup','','Module for Media Group Management','1',1,NULL,'2016-07-13 20:56:55','2016-07-13 20:56:55'),(19,'/master/menu','','Module for Menu Management','1',1,NULL,'2016-07-13 20:57:30','2016-07-13 20:57:30'),(20,'/master/module','','Module for Module Management','1',1,NULL,'2016-07-13 20:58:39','2016-07-13 20:58:39'),(21,'/master/paper','','Module for Paper Type Management','1',1,1,'2016-07-13 20:59:21','2016-07-13 21:00:11'),(23,'/master/religion','','Module for Religion Management','1',1,NULL,'2016-07-13 21:00:40','2016-07-13 21:00:40'),(24,'/master/role','','Module for Role Management','1',1,NULL,'2016-07-13 21:01:10','2016-07-13 21:01:10'),(25,'/master/subindustry','','Module for Sub Industry Management','1',1,NULL,'2016-07-13 21:01:46','2016-07-13 21:01:46'),(26,'/master/unit','','Module for Unit Management','1',1,NULL,'2016-07-13 21:02:11','2016-07-13 21:02:11'),(27,'/master/flowgroup','','Module for Flow Group Management','1',1,NULL,'2016-07-20 21:38:03','2016-07-20 21:38:03'),(30,'/master/flow','','Flow Management','1',1,NULL,'2016-08-22 01:16:35','2016-08-22 01:16:35'),(31,'/master/notificationtype','','Module for Master Notification Type','1',1,NULL,'2016-08-31 20:40:21','2016-08-31 20:40:21'),(35,'/config/#','','Module for configuration','1',1,1,'2016-10-04 21:46:46','2016-10-04 21:48:07'),(36,'/config/setting','','Module for application settings','1',1,NULL,'2016-10-04 21:49:26','2016-10-04 21:49:26'),(37,'/config/announcement','','Module for Announcement Management','1',1,NULL,'2016-10-05 22:05:23','2016-10-05 22:05:23'),(43,'/master/publisher','','Module for Publisher Management','1',1,NULL,'2016-10-30 21:23:53','2016-10-30 21:23:53'),(55,'/config/log','','Module for User Log','1',1,NULL,'2017-01-26 07:55:25','2017-01-26 07:55:25'),(59,'/master/company',NULL,'Module for master company','1',1,NULL,'2017-03-06 21:11:16','2017-03-06 21:11:16'),(60,'/master/division',NULL,'Module for Division Management','1',1,NULL,'2017-03-06 21:11:46','2017-03-06 21:11:46'),(61,'/master/rule',NULL,'Module for rule management','1',1,NULL,'2017-03-06 23:47:19','2017-03-06 23:47:19'); */;
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `notification_types`
--

LOCK TABLES `notification_types` WRITE;
/*!40000 ALTER TABLE `notification_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `papers`
--

LOCK TABLES `papers` WRITE;
/*!40000 ALTER TABLE `papers` DISABLE KEYS */;
INSERT INTO `papers` VALUES (1,1,'AP',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(2,1,'UPM',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(3,1,'HVS',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(4,1,'HSSD',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(5,1,'AK',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(6,1,'NEWSPRINT',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(7,1,'IVORY',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(8,1,'BC',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(9,1,'TIK',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(10,2,'AP',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(11,2,'UPM',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(12,2,'HVS',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(13,2,'HSSD',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(14,2,'AK',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(15,2,'NEWSPRINT',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(16,2,'IVORY',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(17,2,'BC',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(18,2,'TIK',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10');
/*!40000 ALTER TABLE `papers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `publishers`
--

LOCK TABLES `publishers` WRITE;
/*!40000 ALTER TABLE `publishers` DISABLE KEYS */;
INSERT INTO `publishers` VALUES (1,'CWM','Children Women Media','Children Women Media','1',1,0,'2016-10-30 21:41:49','2016-10-30 21:41:49'),(2,'GIM','General Interest Media','General Interest Media','1',1,0,'2016-10-30 21:42:47','2016-10-30 21:42:47'),(3,'OTO','Otomotif Media','Otomotif Media','1',1,1,'2016-10-30 21:43:08','2017-01-17 10:38:55'),(4,'DIGI','Digital Media','Digital Media','1',1,0,'2016-10-30 21:44:30','2016-10-30 21:44:30');
/*!40000 ALTER TABLE `publishers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `religions`
--

LOCK TABLES `religions` WRITE;
/*!40000 ALTER TABLE `religions` DISABLE KEYS */;
INSERT INTO `religions` VALUES (1,'Islam','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(2,'Kristen Katolik','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(3,'Kristen Protestan','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(4,'Hindu','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(5,'Budha','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(6,'Konghucu Edit','0',1,1,'2016-05-23 02:08:49','2016-05-23 02:10:41'),(7,'tujuh','1',1,0,'2016-05-25 01:58:21','2016-05-25 01:58:21');
/*!40000 ALTER TABLE `religions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `role_levels`
--

LOCK TABLES `role_levels` WRITE;
/*!40000 ALTER TABLE `role_levels` DISABLE KEYS */;
INSERT INTO `role_levels` VALUES (1,'Level 1','Staff','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(2,'Level 2','Superintendent','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(3,'Level 3','Manager','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(4,'Level 4','Division Head','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(5,'Level 5','General Manager','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(6,'Level 6','Administrator','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(7,'Level 7','Super Administrator','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33');
/*!40000 ALTER TABLE `role_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,7,'Super Administrator','Role for Super Administrator','1',1,1,'2016-05-19 02:00:10','2016-09-02 00:29:53'),(2,6,'Administrator','Role for Adminstrator','1',1,1,'2016-05-20 00:31:22','2016-09-02 00:30:33'),(3,1,'Operator','Role for operator','1',1,1,'2016-05-20 00:33:20','2016-07-13 21:35:02'),(4,1,'Secretary','Role untuk secretary','1',1,1,'2016-05-20 00:35:15','2016-07-13 21:39:09');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles_modules`
--

LOCK TABLES `roles_modules` WRITE;
/*!40000 ALTER TABLE `roles_modules` DISABLE KEYS */;
INSERT INTO `roles_modules` VALUES (16,1,2,1),(29,1,2,1),(30,1,2,1),(6,1,2,1),(19,1,2,1),(4,1,2,1),(21,1,2,1),(22,1,2,1),(23,1,2,1),(24,1,2,1),(25,1,2,1),(7,1,2,1),(7,33,2,1),(7,34,1,1),(7,34,2,1),(7,34,3,1),(7,34,4,1),(31,1,2,1),(31,33,2,1),(31,34,1,1),(31,34,2,1),(31,34,3,1),(31,34,4,1),(12,1,2,1),(12,29,2,1),(12,28,1,1),(12,28,2,1),(12,28,3,1),(12,28,4,1),(12,28,5,1),(12,28,6,1),(12,28,8,1),(12,38,1,1),(12,38,2,1),(12,38,3,1),(12,38,4,1),(12,38,5,1),(12,38,6,1),(12,38,8,1),(18,1,2,1),(18,29,2,1),(18,28,2,1),(18,28,3,1),(18,28,4,1),(18,28,5,1),(18,28,6,1),(18,28,8,1),(18,38,2,1),(18,38,3,1),(18,38,4,1),(18,38,5,1),(18,38,6,1),(18,38,8,1),(8,1,2,1),(8,3,2,1),(8,6,1,1),(8,6,2,1),(8,6,3,1),(8,7,1,1),(8,7,2,1),(8,7,3,1),(8,8,1,1),(8,8,2,1),(8,8,3,1),(8,40,1,1),(8,40,2,1),(8,40,3,1),(8,29,2,1),(8,41,1,1),(8,41,2,1),(8,41,3,1),(8,41,4,1),(8,41,5,1),(8,41,6,1),(8,41,8,1),(8,33,2,1),(8,34,1,1),(8,34,2,1),(8,34,3,1),(8,34,4,1),(8,45,2,1),(8,46,1,1),(8,46,2,1),(8,46,3,1),(8,46,4,1),(8,46,5,1),(8,46,6,1),(8,46,8,1),(9,1,2,1),(9,3,2,1),(9,6,1,1),(9,6,2,1),(9,6,3,1),(9,7,1,1),(9,7,2,1),(9,7,3,1),(9,8,1,1),(9,8,2,1),(9,8,3,1),(9,40,1,1),(9,40,2,1),(9,40,3,1),(9,29,2,1),(9,41,2,1),(9,41,3,1),(9,41,4,1),(9,41,5,1),(9,41,6,1),(9,41,8,1),(9,33,2,1),(9,34,1,1),(9,34,2,1),(9,34,3,1),(9,34,4,1),(9,45,2,1),(9,46,2,1),(9,46,3,1),(9,46,4,1),(9,46,5,1),(9,46,6,1),(9,46,8,1),(13,1,2,1),(13,52,2,1),(13,54,2,1),(13,54,3,1),(13,54,4,1),(13,54,5,1),(13,54,6,1),(13,54,8,1),(11,1,2,1),(11,52,2,1),(11,54,2,1),(11,54,5,1),(11,54,6,1),(11,54,8,1),(15,1,2,1),(15,52,2,1),(15,57,1,1),(15,57,2,1),(15,57,5,1),(15,57,6,1),(15,57,8,1),(14,1,2,1),(14,52,2,1),(14,57,1,1),(14,57,2,1),(14,57,5,1),(14,57,6,1),(14,57,8,1),(10,1,2,1),(10,3,2,1),(10,10,1,1),(10,10,2,1),(10,52,2,1),(10,53,1,1),(10,53,2,1),(10,53,5,1),(10,53,6,1),(10,53,8,1),(10,54,2,1),(10,54,5,1),(10,54,6,1),(10,54,8,1),(10,57,2,1),(10,57,5,1),(10,57,6,1),(10,57,8,1),(10,56,2,1),(10,56,5,1),(32,1,2,1),(32,52,2,1),(32,53,2,1),(32,53,5,1),(32,53,6,1),(32,53,8,1),(32,54,1,1),(32,54,2,1),(32,54,3,1),(32,54,5,1),(32,54,6,1),(32,54,8,1),(32,56,2,1),(32,56,5,1),(34,1,2,1),(34,3,2,1),(34,10,1,1),(34,10,2,1),(34,52,2,1),(34,53,2,1),(34,53,5,1),(34,53,6,1),(34,53,8,1),(34,54,2,1),(34,54,5,1),(34,54,6,1),(34,54,8,1),(34,57,2,1),(34,57,5,1),(34,57,6,1),(34,57,8,1),(34,56,2,1),(34,56,5,1),(33,1,2,1),(33,52,2,1),(33,57,2,1),(33,57,5,1),(33,57,6,1),(33,57,8,1),(2,1,2,1),(2,2,1,1),(2,2,2,1),(2,2,3,1),(2,3,2,1),(2,4,1,1),(2,4,2,1),(2,4,3,1),(2,9,1,1),(2,9,2,1),(2,9,3,1),(2,9,4,1),(2,12,1,1),(2,12,2,1),(2,12,3,1),(2,12,4,1),(2,13,1,1),(2,13,2,1),(2,13,3,1),(2,13,4,1),(2,14,1,1),(2,14,2,1),(2,14,3,1),(2,14,4,1),(2,16,1,1),(2,16,2,1),(2,16,3,1),(2,16,4,1),(2,17,1,1),(2,17,2,1),(2,17,3,1),(2,17,4,1),(2,18,1,1),(2,18,2,1),(2,18,3,1),(2,18,4,1),(2,19,1,1),(2,19,2,1),(2,19,3,1),(2,20,1,1),(2,20,2,1),(2,20,3,1),(2,31,1,1),(2,31,2,1),(2,31,3,1),(2,31,4,1),(2,21,1,1),(2,21,2,1),(2,21,3,1),(2,21,4,1),(2,23,1,1),(2,23,2,1),(2,23,3,1),(2,23,4,1),(2,24,1,1),(2,24,2,1),(2,24,3,1),(2,25,1,1),(2,25,2,1),(2,25,3,1),(2,25,4,1),(2,26,1,1),(2,26,2,1),(2,26,3,1),(2,26,4,1),(2,35,2,1),(2,37,1,1),(2,37,2,1),(2,37,3,1),(2,37,4,1),(2,36,2,1),(2,36,3,1),(3,1,2,1),(3,3,2,1),(3,4,2,1),(3,4,3,1),(3,9,1,1),(3,9,2,1),(3,9,3,1),(3,9,4,1),(3,12,1,1),(3,12,2,1),(3,12,3,1),(3,12,4,1),(3,13,1,1),(3,13,2,1),(3,13,3,1),(3,13,4,1),(3,14,1,1),(3,14,2,1),(3,14,3,1),(3,14,4,1),(3,16,1,1),(3,16,2,1),(3,16,3,1),(3,18,2,1),(3,18,3,1),(3,21,1,1),(3,21,2,1),(3,21,3,1),(3,21,4,1),(3,25,1,1),(3,25,2,1),(3,25,3,1),(3,25,4,1),(3,26,1,1),(3,26,2,1),(3,26,3,1),(3,26,4,1),(1,1,2,1),(1,2,1,1),(1,2,2,1),(1,2,3,1),(1,2,4,1),(1,3,2,1),(1,4,1,1),(1,4,2,1),(1,4,3,1),(1,4,4,1),(1,9,1,1),(1,9,2,1),(1,9,3,1),(1,9,4,1),(1,59,1,1),(1,59,2,1),(1,59,3,1),(1,59,4,1),(1,60,1,1),(1,60,2,1),(1,60,3,1),(1,60,4,1),(1,30,1,1),(1,30,2,1),(1,30,3,1),(1,30,4,1),(1,27,1,1),(1,27,2,1),(1,27,3,1),(1,27,4,1),(1,12,1,1),(1,12,2,1),(1,12,3,1),(1,12,4,1),(1,13,1,1),(1,13,2,1),(1,13,3,1),(1,13,4,1),(1,14,1,1),(1,14,2,1),(1,14,3,1),(1,14,4,1),(1,16,1,1),(1,16,2,1),(1,16,3,1),(1,16,4,1),(1,17,1,1),(1,17,2,1),(1,17,3,1),(1,17,4,1),(1,18,1,1),(1,18,2,1),(1,18,3,1),(1,18,4,1),(1,19,1,1),(1,19,2,1),(1,19,3,1),(1,19,4,1),(1,20,1,1),(1,20,2,1),(1,20,3,1),(1,20,4,1),(1,31,1,1),(1,31,2,1),(1,31,3,1),(1,31,4,1),(1,21,1,1),(1,21,2,1),(1,21,3,1),(1,21,4,1),(1,43,1,1),(1,43,2,1),(1,43,3,1),(1,43,4,1),(1,61,1,1),(1,61,2,1),(1,61,3,1),(1,61,4,1),(1,23,1,1),(1,23,2,1),(1,23,3,1),(1,23,4,1),(1,24,1,1),(1,24,2,1),(1,24,3,1),(1,24,4,1),(1,25,1,1),(1,25,2,1),(1,25,3,1),(1,25,4,1),(1,26,1,1),(1,26,2,1),(1,26,3,1),(1,26,4,1),(1,35,2,1),(1,37,1,1),(1,37,2,1),(1,37,3,1),(1,37,4,1),(1,36,1,1),(1,36,2,1),(1,36,3,1),(1,36,4,1),(1,55,2,1);
/*!40000 ALTER TABLE `roles_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `rules`
--

LOCK TABLES `rules` WRITE;
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;
INSERT INTO `rules` VALUES (1,'Kontrak','Kontrak','1',1,NULL,'2017-03-07 00:04:41','2017-03-07 00:04:41'),(2,'Report Pekerjaan','Report Pekerjaan','1',1,NULL,'2017-03-07 00:05:07','2017-03-07 00:05:07'),(3,'Invoice','Invoice','1',1,NULL,'2017-03-07 00:05:21','2017-03-07 00:05:21'),(4,'Faktur Pajak','Faktur Pajak','1',1,NULL,'2017-03-07 00:05:36','2017-03-07 00:05:36'),(5,'RAB','RAB','1',1,NULL,'2017-03-07 00:05:49','2017-03-07 00:05:49'),(6,'Surat Penawaran','Surat Penawaran','1',1,NULL,'2017-03-07 00:06:07','2017-03-07 00:06:07'),(7,'Kelengkapan Materi Promosi','Kelengkapan Materi Promosi','1',1,NULL,'2017-03-07 00:06:28','2017-03-07 00:06:28'),(8,'Surat Rekomendasi TI','Surat Rekomendasi TI','1',1,NULL,'2017-03-07 00:06:46','2017-03-07 00:06:46'),(9,'BPB (Bon Permintaan Barang)','BPB (Bon Permintaan Barang)','1',1,1,'2017-03-07 00:07:21','2017-03-07 00:08:34'),(10,'No IO dan Aset','No IO dan Aset','1',1,NULL,'2017-03-07 00:07:48','2017-03-07 00:07:48'),(11,'Matrik Otorisasi','Matrik Otorisasi','1',1,NULL,'2017-03-07 00:08:05','2017-03-07 00:08:05');
/*!40000 ALTER TABLE `rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'app_name','Application Setting','Application\'s Name','<i>e</i>-<b>SPMB</b>','1',1,1,'2017-02-28 17:00:00','2017-02-28 17:00:00'),(2,'headtitle','Head Title','Head Title','e-SPMB','1',1,1,'2017-02-28 17:00:00','2017-02-28 17:00:00');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `spmb_type_rule`
--

LOCK TABLES `spmb_type_rule` WRITE;
/*!40000 ALTER TABLE `spmb_type_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `spmb_type_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `spmb_types`
--

LOCK TABLES `spmb_types` WRITE;
/*!40000 ALTER TABLE `spmb_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `spmb_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `subindustries`
--

LOCK TABLES `subindustries` WRITE;
/*!40000 ALTER TABLE `subindustries` DISABLE KEYS */;
/*!40000 ALTER TABLE `subindustries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'cm','Centimeter','Centimeter','1',1,1,'2016-06-07 23:57:19','2016-06-07 23:59:51'),(2,'mm','Milimeter','Milimeter','1',1,0,'2016-06-07 23:57:40','2016-06-07 23:57:40'),(3,'px','Pixel','Pixels','1',1,0,'2016-06-08 00:00:15','2016-06-08 00:00:15'),(4,'delet','delete it','dekete it','0',1,1,'2016-06-08 00:03:13','2016-06-08 00:03:20'),(5,'mmk','Milimeter Kolom','Milimeter Kolom\r\n','1',1,0,'2016-06-15 00:31:10','2016-06-15 00:31:10');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `upload_files`
--

LOCK TABLES `upload_files` WRITE;
/*!40000 ALTER TABLE `upload_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'025407','soni@gramedia-majalah.com','$2y$10$.l.kwdKNvN2WjhVMM.DFE.rJHLMOk2H7Ub7Xu4R7yvbn8Ks8blieS','Soni','Rahayu','081111111111','1',1,'1990-01-01',NULL,NULL,'avatar.jpg','ACTIVE','1',1,1,'IVVFTcw3vwCOnb8DvqGHy9wudLaFmpoyQy5Ic2avqFcv4IoJjJzAY9xEl0z1','2017-03-01 19:28:32','2017-03-02 00:25:16'),(2,'000001','jakoeb@kompas.com','$2y$10$tXApGgxoZdYkRzd9tI1Pu.L8Qq1YT/oZacFrP2IcWTgsnX1qgVyWK','Jakoeb','Oetama','08212121212','1',7,'1950-01-01',NULL,NULL,'avatar.jpg','ACTIVE','1',1,1,NULL,'2017-03-02 00:11:10','2017-03-02 00:18:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (2,1),(1,1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users_media_groups`
--

LOCK TABLES `users_media_groups` WRITE;
/*!40000 ALTER TABLE `users_media_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_media_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users_medias`
--

LOCK TABLES `users_medias` WRITE;
/*!40000 ALTER TABLE `users_medias` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES (1,1),(8,1),(8,4),(8,7),(10,7),(11,2),(12,1),(5,1),(13,12),(9,18),(4,12),(15,9),(16,8),(17,2),(18,8),(14,9),(19,10),(20,13),(21,11),(23,11),(22,13),(24,32),(25,33),(26,34),(27,15),(2,2);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users_subindustries`
--

LOCK TABLES `users_subindustries` WRITE;
/*!40000 ALTER TABLE `users_subindustries` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_subindustries` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-07 15:41:39
