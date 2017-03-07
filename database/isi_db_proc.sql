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
-- Table structure for table `action_types`
--

DROP TABLE IF EXISTS `action_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `action_types` (
  `action_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_type_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_type_desc` text COLLATE utf8mb4_unicode_ci,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`action_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `action_types`
--

LOCK TABLES `action_types` WRITE;
/*!40000 ALTER TABLE `action_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `action_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actions`
--

DROP TABLE IF EXISTS `actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions` (
  `action_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `action_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_alias` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_desc` text COLLATE utf8mb4_unicode_ci,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`action_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions`
--

LOCK TABLES `actions` WRITE;
/*!40000 ALTER TABLE `actions` DISABLE KEYS */;
INSERT INTO `actions` VALUES (1,'Create','C','Action Control to Create New Item','1',1,1,'2017-03-01 19:28:32','2017-03-01 19:28:32'),(2,'Read','R','Action Control to Read/View Item','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(3,'Update','U','Action Control to Update Item','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(4,'Delete','D','Action Control to Delete Item','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(5,'Download','DL','Action Control to Download Item','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(6,'Upload','UL','Action Control to Upload Item','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33');
/*!40000 ALTER TABLE `actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actions_modules`
--

DROP TABLE IF EXISTS `actions_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actions_modules` (
  `action_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actions_modules`
--

LOCK TABLES `actions_modules` WRITE;
/*!40000 ALTER TABLE `actions_modules` DISABLE KEYS */;
INSERT INTO `actions_modules` VALUES (1,2),(2,2),(3,2),(4,2),(2,1),(2,4),(1,5),(2,5),(3,5),(4,5),(2,6),(1,7),(2,7),(3,7),(4,7),(1,8),(2,8),(3,8),(4,8),(1,9),(2,9),(3,9),(4,9),(1,10),(2,10),(3,10),(4,10),(1,11),(2,12),(1,13),(1,14),(2,14),(3,14),(4,14),(2,3),(1,4),(3,4),(4,4),(1,6),(3,6),(4,6),(2,11),(3,11),(4,11),(1,12),(3,12),(4,12),(2,13),(3,13),(4,13),(1,15),(2,15),(3,15),(4,15),(1,16),(2,16),(3,16),(4,16),(1,17),(2,17),(3,17),(4,17),(1,18),(2,18),(3,18),(4,18),(1,19),(2,19),(3,19),(4,19),(1,20),(2,20),(3,20),(4,20),(1,21),(2,21),(3,21),(4,21),(1,22),(2,22),(3,22),(4,22),(1,23),(2,23),(3,23),(4,23),(1,24),(2,24),(3,24),(4,24),(1,25),(2,25),(3,25),(4,25),(1,26),(2,26),(3,26),(4,26),(1,27),(2,27),(3,27),(4,27),(1,28),(2,28),(3,28),(4,28),(5,28),(6,28),(2,29),(1,30),(2,30),(3,30),(4,30),(1,31),(2,31),(3,31),(4,31),(8,28),(1,32),(2,32),(3,32),(4,32),(2,33),(1,34),(2,34),(3,34),(4,34),(2,35),(1,36),(2,36),(3,36),(4,36),(1,37),(2,37),(3,37),(4,37),(1,38),(2,38),(3,38),(4,38),(5,38),(6,38),(8,38),(1,39),(2,39),(3,39),(4,39),(1,40),(2,40),(3,40),(4,40),(1,41),(2,41),(3,41),(4,41),(5,41),(6,41),(8,41),(1,42),(2,42),(3,42),(4,42),(1,43),(2,43),(3,43),(4,43),(1,44),(2,44),(3,44),(4,44),(2,45),(1,46),(2,46),(3,46),(4,46),(5,46),(6,46),(8,46),(2,47),(1,48),(2,48),(3,48),(4,48),(5,48),(6,48),(8,48),(1,49),(2,49),(3,49),(4,49),(1,50),(2,50),(3,50),(4,50),(1,51),(2,51),(3,51),(4,51),(2,52),(1,53),(2,53),(3,53),(4,53),(1,54),(2,54),(3,54),(4,54),(5,54),(6,54),(8,54),(2,55),(2,56),(5,56),(8,53),(1,57),(2,57),(3,57),(4,57),(5,57),(6,57),(8,57),(2,58),(5,58),(5,53),(6,53),(1,59),(2,59),(3,59),(4,59),(1,60),(2,60),(3,60),(4,60),(1,61),(2,61),(3,61),(4,61);
/*!40000 ALTER TABLE `actions_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcements`
--

DROP TABLE IF EXISTS `announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcements` (
  `announcement_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `announcement_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcement_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `announcement_startdate` date NOT NULL,
  `announcement_enddate` date NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcements`
--

LOCK TABLES `announcements` WRITE;
/*!40000 ALTER TABLE `announcements` DISABLE KEYS */;
/*!40000 ALTER TABLE `announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `approval_types`
--

DROP TABLE IF EXISTS `approval_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `approval_types` (
  `approval_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `approval_type_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`approval_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `approval_types`
--

LOCK TABLES `approval_types` WRITE;
/*!40000 ALTER TABLE `approval_types` DISABLE KEYS */;
INSERT INTO `approval_types` VALUES (1,'Submitted','1',1,1,'2015-12-31 17:00:00','2015-12-31 17:00:00'),(2,'Approved','1',1,1,'2015-12-31 17:00:00','2015-12-31 17:00:00'),(3,'Rejected','1',1,1,'2015-12-31 17:00:00','2015-12-31 17:00:00'),(4,'Finished','1',1,1,'2015-12-31 17:00:00','2015-12-31 17:00:00');
/*!40000 ALTER TABLE `approval_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `brand_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subindustry_id` int(11) NOT NULL,
  `brand_code` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'AG01','PT Penerbitan Sarana Bobo','1',1,NULL,'2017-03-06 21:19:17','2017-03-06 21:19:17'),(2,'AE01','PT Samindra Utama','1',1,1,'2017-03-06 21:19:44','2017-03-06 21:20:13'),(3,'AH01','PT Prima Media Kawanku','1',1,NULL,'2017-03-06 21:20:34','2017-03-06 21:20:34'),(4,'AJ01','PT Intirsari Mediatama','1',1,NULL,'2017-03-06 21:21:22','2017-03-06 21:21:22'),(5,'AL01','PT Dunia Otomotifindo','1',1,NULL,'2017-03-06 21:21:43','2017-03-06 21:21:43'),(6,'AQ01','PT Mediarona Dirgantara','1',1,NULL,'2017-03-06 21:22:06','2017-03-06 21:22:06'),(7,'AR01','PT Infometro Mediatama','1',1,NULL,'2017-03-06 21:22:32','2017-03-06 21:22:32'),(8,'AS01','PT Media Boga Utama','1',1,NULL,'2017-03-06 21:23:15','2017-03-06 21:23:15'),(9,'AN01','PT Prima Infosaranamedia','1',1,NULL,'2017-03-06 21:23:38','2017-03-06 21:23:38'),(10,'AO01','PT Penerbit Media Motorindo','1',1,NULL,'2017-03-06 21:24:01','2017-03-06 21:24:01');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configs` (
  `config_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config_key` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_desc` text COLLATE utf8mb4_unicode_ci,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`config_id`),
  UNIQUE KEY `configs_config_key_unique` (`config_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configs`
--

LOCK TABLES `configs` WRITE;
/*!40000 ALTER TABLE `configs` DISABLE KEYS */;
/*!40000 ALTER TABLE `configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisions`
--

DROP TABLE IF EXISTS `divisions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `divisions` (
  `division_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `division_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`division_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisions`
--

LOCK TABLES `divisions` WRITE;
/*!40000 ALTER TABLE `divisions` DISABLE KEYS */;
INSERT INTO `divisions` VALUES (1,2,'AE01040100','Tabloid Nova','1',1,1,'2017-03-06 21:26:45','2017-03-06 21:27:47'),(2,2,'AE01630100','By Product Nova','1',1,NULL,'2017-03-06 21:27:20','2017-03-06 21:27:20');
/*!40000 ALTER TABLE `divisions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloads` (
  `download_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `upload_file_id` int(11) NOT NULL,
  `download_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_os` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `download_browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`download_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloads`
--

LOCK TABLES `downloads` WRITE;
/*!40000 ALTER TABLE `downloads` DISABLE KEYS */;
/*!40000 ALTER TABLE `downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flow_groups`
--

DROP TABLE IF EXISTS `flow_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flow_groups` (
  `flow_group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `flow_group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flow_group_desc` text COLLATE utf8mb4_unicode_ci,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`flow_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flow_groups`
--

LOCK TABLES `flow_groups` WRITE;
/*!40000 ALTER TABLE `flow_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `flow_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flows`
--

DROP TABLE IF EXISTS `flows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flows` (
  `flow_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `flow_group_id` int(11) NOT NULL,
  `flow_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flow_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flow_no` int(11) NOT NULL,
  `flow_prev` int(11) NOT NULL,
  `flow_next` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `flow_by` enum('AUTHOR','GROUP','INDUSTRY','PIC','MEDIA','MANUAL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `flow_parallel` enum('true','false') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `flow_condition` enum('EQUAL','NOT_EQUAL','GREATER','LESS','GREATER_EQUAL','LESS_EQUAL') COLLATE utf8mb4_unicode_ci NOT NULL,
  `flow_condition_value` int(11) NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`flow_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flows`
--

LOCK TABLES `flows` WRITE;
/*!40000 ALTER TABLE `flows` DISABLE KEYS */;
/*!40000 ALTER TABLE `flows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'IT','IT','1',1,NULL,'2017-03-02 00:10:06','2017-03-02 00:10:06');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `holidays`
--

DROP TABLE IF EXISTS `holidays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `holidays` (
  `holiday_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `holiday_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holiday_date` date NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `holidays`
--

LOCK TABLES `holidays` WRITE;
/*!40000 ALTER TABLE `holidays` DISABLE KEYS */;
/*!40000 ALTER TABLE `holidays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `implementations`
--

DROP TABLE IF EXISTS `implementations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `implementations` (
  `implementation_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `implementation_month` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `implementation_month_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`implementation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `implementations`
--

LOCK TABLES `implementations` WRITE;
/*!40000 ALTER TABLE `implementations` DISABLE KEYS */;
INSERT INTO `implementations` VALUES (1,'01','January','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(2,'02','February','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(3,'03','March','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(4,'04','April','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(5,'05','May','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(6,'06','June','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(7,'07','July','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(8,'08','August','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(9,'09','September','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(10,'10','October','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(11,'11','November','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(12,'12','December','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33');
/*!40000 ALTER TABLE `implementations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `industries`
--

DROP TABLE IF EXISTS `industries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `industries` (
  `industry_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `industry_code` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry_desc` text COLLATE utf8mb4_unicode_ci,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`industry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `industries`
--

LOCK TABLES `industries` WRITE;
/*!40000 ALTER TABLE `industries` DISABLE KEYS */;
/*!40000 ALTER TABLE `industries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_os` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_browser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=354 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'127.0.0.1','PC','user','Linux','Firefox',1,'2017-03-02 02:20:13','2017-03-02 02:20:13'),(2,'127.0.0.1','PC','user','Linux','Firefox',1,'2017-03-02 02:20:14','2017-03-02 02:20:14'),(3,'127.0.0.1','PC','user/apiList','Linux','Firefox',1,'2017-03-02 02:20:14','2017-03-02 02:20:14'),(4,'127.0.0.1','PC','config/log','Linux','Firefox',1,'2017-03-02 02:20:19','2017-03-02 02:20:19'),(5,'127.0.0.1','PC','config/log','Linux','Firefox',1,'2017-03-02 02:20:19','2017-03-02 02:20:19'),(6,'127.0.0.1','PC','config/log/apiList','Linux','Firefox',1,'2017-03-02 02:20:21','2017-03-02 02:20:21'),(7,'127.0.0.1','PC','profile','Linux','Firefox',1,'2017-03-02 02:21:47','2017-03-02 02:21:47'),(8,'127.0.0.1','PC','profile','Linux','Firefox',1,'2017-03-02 02:21:48','2017-03-02 02:21:48'),(9,'127.0.0.1','PC','/','Linux','Firefox',1,'2017-03-02 02:32:45','2017-03-02 02:32:45'),(10,'127.0.0.1','PC','/','Linux','Firefox',1,'2017-03-02 02:32:47','2017-03-02 02:32:47'),(11,'127.0.0.1','PC','profile','Linux','Firefox',1,'2017-03-02 02:32:52','2017-03-02 02:32:52'),(12,'127.0.0.1','PC','profile','Linux','Firefox',1,'2017-03-02 02:32:54','2017-03-02 02:32:54'),(13,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 02:34:25','2017-03-02 02:34:25'),(14,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 02:42:21','2017-03-02 02:42:21'),(15,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 02:43:24','2017-03-02 02:43:24'),(16,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 02:44:51','2017-03-02 02:44:51'),(17,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 02:44:53','2017-03-02 02:44:53'),(18,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 02:48:32','2017-03-02 02:48:32'),(19,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 02:48:32','2017-03-02 02:48:32'),(20,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 02:51:06','2017-03-02 02:51:06'),(21,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 02:51:10','2017-03-02 02:51:10'),(22,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 03:11:54','2017-03-02 03:11:54'),(23,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-02 03:11:55','2017-03-02 03:11:55'),(24,'127.0.0.1','PC','/','Linux','Firefox',1,'2017-03-02 19:16:33','2017-03-02 19:16:33'),(25,'127.0.0.1','PC','/','Linux','Firefox',1,'2017-03-02 19:16:34','2017-03-02 19:16:34'),(26,'127.0.0.1','PC','/','Linux','Firefox',1,'2017-03-05 21:44:17','2017-03-05 21:44:17'),(27,'127.0.0.1','PC','/','Linux','Firefox',1,'2017-03-05 21:44:18','2017-03-05 21:44:18'),(28,'127.0.0.1','PC','user','Linux','Firefox',1,'2017-03-05 21:44:21','2017-03-05 21:44:21'),(29,'127.0.0.1','PC','user','Linux','Firefox',1,'2017-03-05 21:44:21','2017-03-05 21:44:21'),(30,'127.0.0.1','PC','user/apiList','Linux','Firefox',1,'2017-03-05 21:44:22','2017-03-05 21:44:22'),(31,'127.0.0.1','PC','/','Linux','Firefox',1,'2017-03-06 21:06:38','2017-03-06 21:06:38'),(32,'127.0.0.1','PC','/','Linux','Firefox',1,'2017-03-06 21:06:40','2017-03-06 21:06:40'),(33,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 21:06:48','2017-03-06 21:06:48'),(34,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 21:06:49','2017-03-06 21:06:49'),(35,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 21:06:50','2017-03-06 21:06:50'),(36,'127.0.0.1','PC','master/module/create','Linux','Firefox',1,'2017-03-06 21:06:53','2017-03-06 21:06:53'),(37,'127.0.0.1','PC','master/module/create','Linux','Firefox',1,'2017-03-06 21:06:54','2017-03-06 21:06:54'),(38,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 21:07:19','2017-03-06 21:07:19'),(39,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 21:11:16','2017-03-06 21:11:16'),(40,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 21:11:16','2017-03-06 21:11:16'),(41,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 21:11:16','2017-03-06 21:11:16'),(42,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 21:11:17','2017-03-06 21:11:17'),(43,'127.0.0.1','PC','master/module/create','Linux','Firefox',1,'2017-03-06 21:11:23','2017-03-06 21:11:23'),(44,'127.0.0.1','PC','master/module/create','Linux','Firefox',1,'2017-03-06 21:11:24','2017-03-06 21:11:24'),(45,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 21:11:46','2017-03-06 21:11:46'),(46,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 21:11:47','2017-03-06 21:11:47'),(47,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 21:11:47','2017-03-06 21:11:47'),(48,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 21:11:48','2017-03-06 21:11:48'),(49,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 21:12:06','2017-03-06 21:12:06'),(50,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 21:12:06','2017-03-06 21:12:06'),(51,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 21:12:07','2017-03-06 21:12:07'),(52,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 21:12:08','2017-03-06 21:12:08'),(53,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 21:12:10','2017-03-06 21:12:10'),(54,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 21:12:10','2017-03-06 21:12:10'),(55,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 21:12:12','2017-03-06 21:12:12'),(56,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 21:12:16','2017-03-06 21:12:16'),(57,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 21:12:17','2017-03-06 21:12:17'),(58,'127.0.0.1','PC','master/menu/apiList','Linux','Firefox',1,'2017-03-06 21:12:18','2017-03-06 21:12:18'),(59,'127.0.0.1','PC','master/menu/create','Linux','Firefox',1,'2017-03-06 21:12:27','2017-03-06 21:12:27'),(60,'127.0.0.1','PC','master/menu/create','Linux','Firefox',1,'2017-03-06 21:12:28','2017-03-06 21:12:28'),(61,'127.0.0.1','PC','master/menu/apiCountChild','Linux','Firefox',1,'2017-03-06 21:12:52','2017-03-06 21:12:52'),(62,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 21:13:06','2017-03-06 21:13:06'),(63,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 21:13:08','2017-03-06 21:13:08'),(64,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 21:13:08','2017-03-06 21:13:08'),(65,'127.0.0.1','PC','master/menu/apiList','Linux','Firefox',1,'2017-03-06 21:13:09','2017-03-06 21:13:09'),(66,'127.0.0.1','PC','master/menu/create','Linux','Firefox',1,'2017-03-06 21:13:13','2017-03-06 21:13:13'),(67,'127.0.0.1','PC','master/menu/create','Linux','Firefox',1,'2017-03-06 21:13:14','2017-03-06 21:13:14'),(68,'127.0.0.1','PC','master/menu/apiCountChild','Linux','Firefox',1,'2017-03-06 21:13:34','2017-03-06 21:13:34'),(69,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 21:13:44','2017-03-06 21:13:44'),(70,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 21:13:45','2017-03-06 21:13:45'),(71,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 21:13:46','2017-03-06 21:13:46'),(72,'127.0.0.1','PC','master/menu/apiList','Linux','Firefox',1,'2017-03-06 21:13:47','2017-03-06 21:13:47'),(73,'127.0.0.1','PC','master/role','Linux','Firefox',1,'2017-03-06 21:13:53','2017-03-06 21:13:53'),(74,'127.0.0.1','PC','master/role','Linux','Firefox',1,'2017-03-06 21:13:53','2017-03-06 21:13:53'),(75,'127.0.0.1','PC','master/role/apiList','Linux','Firefox',1,'2017-03-06 21:13:55','2017-03-06 21:13:55'),(76,'127.0.0.1','PC','master/role/1/edit','Linux','Firefox',1,'2017-03-06 21:13:58','2017-03-06 21:13:58'),(77,'127.0.0.1','PC','master/role/1/edit','Linux','Firefox',1,'2017-03-06 21:14:00','2017-03-06 21:14:00'),(78,'127.0.0.1','PC','master/role/1','Linux','Firefox',1,'2017-03-06 21:14:07','2017-03-06 21:14:07'),(79,'127.0.0.1','PC','master/role','Linux','Firefox',1,'2017-03-06 21:14:12','2017-03-06 21:14:12'),(80,'127.0.0.1','PC','master/role','Linux','Firefox',1,'2017-03-06 21:14:13','2017-03-06 21:14:13'),(81,'127.0.0.1','PC','master/role/apiList','Linux','Firefox',1,'2017-03-06 21:14:13','2017-03-06 21:14:13'),(82,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-06 21:15:14','2017-03-06 21:15:14'),(83,'127.0.0.1','PC','home','Linux','Firefox',1,'2017-03-06 21:15:15','2017-03-06 21:15:15'),(84,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:15:20','2017-03-06 21:15:20'),(85,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:15:21','2017-03-06 21:15:21'),(86,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:15:22','2017-03-06 21:15:22'),(87,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:16:18','2017-03-06 21:16:18'),(88,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:16:19','2017-03-06 21:16:19'),(89,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:16:34','2017-03-06 21:16:34'),(90,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:19:17','2017-03-06 21:19:17'),(91,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:19:17','2017-03-06 21:19:17'),(92,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:19:17','2017-03-06 21:19:17'),(93,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:19:18','2017-03-06 21:19:18'),(94,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:19:22','2017-03-06 21:19:22'),(95,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:19:22','2017-03-06 21:19:22'),(96,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:19:35','2017-03-06 21:19:35'),(97,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:19:35','2017-03-06 21:19:35'),(98,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:19:36','2017-03-06 21:19:36'),(99,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:19:44','2017-03-06 21:19:44'),(100,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:19:44','2017-03-06 21:19:44'),(101,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:19:45','2017-03-06 21:19:45'),(102,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:19:45','2017-03-06 21:19:45'),(103,'127.0.0.1','PC','master/company/2/edit','Linux','Firefox',1,'2017-03-06 21:19:54','2017-03-06 21:19:54'),(104,'127.0.0.1','PC','master/company/2/edit','Linux','Firefox',1,'2017-03-06 21:19:54','2017-03-06 21:19:54'),(105,'127.0.0.1','PC','master/company/2','Linux','Firefox',1,'2017-03-06 21:20:01','2017-03-06 21:20:01'),(106,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:20:01','2017-03-06 21:20:01'),(107,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:20:01','2017-03-06 21:20:01'),(108,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:20:02','2017-03-06 21:20:02'),(109,'127.0.0.1','PC','master/company/2/edit','Linux','Firefox',1,'2017-03-06 21:20:06','2017-03-06 21:20:06'),(110,'127.0.0.1','PC','master/company/2/edit','Linux','Firefox',1,'2017-03-06 21:20:07','2017-03-06 21:20:07'),(111,'127.0.0.1','PC','master/company/2','Linux','Firefox',1,'2017-03-06 21:20:13','2017-03-06 21:20:13'),(112,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:20:13','2017-03-06 21:20:13'),(113,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:20:14','2017-03-06 21:20:14'),(114,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:20:15','2017-03-06 21:20:15'),(115,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:20:18','2017-03-06 21:20:18'),(116,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:20:20','2017-03-06 21:20:20'),(117,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:20:34','2017-03-06 21:20:34'),(118,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:20:34','2017-03-06 21:20:34'),(119,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:20:35','2017-03-06 21:20:35'),(120,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:20:36','2017-03-06 21:20:36'),(121,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:20:40','2017-03-06 21:20:40'),(122,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:20:41','2017-03-06 21:20:41'),(123,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:21:22','2017-03-06 21:21:22'),(124,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:21:22','2017-03-06 21:21:22'),(125,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:21:23','2017-03-06 21:21:23'),(126,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:21:24','2017-03-06 21:21:24'),(127,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:21:27','2017-03-06 21:21:27'),(128,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:21:28','2017-03-06 21:21:28'),(129,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:21:43','2017-03-06 21:21:43'),(130,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:21:43','2017-03-06 21:21:43'),(131,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:21:44','2017-03-06 21:21:44'),(132,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:21:45','2017-03-06 21:21:45'),(133,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:21:48','2017-03-06 21:21:48'),(134,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:21:49','2017-03-06 21:21:49'),(135,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:22:06','2017-03-06 21:22:06'),(136,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:22:07','2017-03-06 21:22:07'),(137,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:22:08','2017-03-06 21:22:08'),(138,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:09','2017-03-06 21:22:09'),(139,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:22:12','2017-03-06 21:22:12'),(140,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:22:14','2017-03-06 21:22:14'),(141,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:22:31','2017-03-06 21:22:31'),(142,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:22:32','2017-03-06 21:22:32'),(143,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:22:33','2017-03-06 21:22:33'),(144,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:33','2017-03-06 21:22:33'),(145,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:40','2017-03-06 21:22:40'),(146,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:41','2017-03-06 21:22:41'),(147,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:43','2017-03-06 21:22:43'),(148,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:44','2017-03-06 21:22:44'),(149,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:45','2017-03-06 21:22:45'),(150,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:46','2017-03-06 21:22:46'),(151,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:47','2017-03-06 21:22:47'),(152,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:48','2017-03-06 21:22:48'),(153,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:50','2017-03-06 21:22:50'),(154,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:51','2017-03-06 21:22:51'),(155,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:22:55','2017-03-06 21:22:55'),(156,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:23:00','2017-03-06 21:23:00'),(157,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:23:01','2017-03-06 21:23:01'),(158,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:23:15','2017-03-06 21:23:15'),(159,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:23:15','2017-03-06 21:23:15'),(160,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:23:16','2017-03-06 21:23:16'),(161,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:23:17','2017-03-06 21:23:17'),(162,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:23:20','2017-03-06 21:23:20'),(163,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:23:21','2017-03-06 21:23:21'),(164,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:23:37','2017-03-06 21:23:37'),(165,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:23:38','2017-03-06 21:23:38'),(166,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:23:39','2017-03-06 21:23:39'),(167,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:23:39','2017-03-06 21:23:39'),(168,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:23:43','2017-03-06 21:23:43'),(169,'127.0.0.1','PC','master/company/create','Linux','Firefox',1,'2017-03-06 21:23:44','2017-03-06 21:23:44'),(170,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:24:01','2017-03-06 21:24:01'),(171,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:24:01','2017-03-06 21:24:01'),(172,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:24:02','2017-03-06 21:24:02'),(173,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:24:03','2017-03-06 21:24:03'),(174,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:24:12','2017-03-06 21:24:12'),(175,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:24:12','2017-03-06 21:24:12'),(176,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:24:13','2017-03-06 21:24:13'),(177,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:24:13','2017-03-06 21:24:13'),(178,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:24:15','2017-03-06 21:24:15'),(179,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:24:15','2017-03-06 21:24:15'),(180,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:24:16','2017-03-06 21:24:16'),(181,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:24:16','2017-03-06 21:24:16'),(182,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:25:11','2017-03-06 21:25:11'),(183,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:25:11','2017-03-06 21:25:11'),(184,'127.0.0.1','PC','master/division/apiList','Linux','Firefox',1,'2017-03-06 21:25:12','2017-03-06 21:25:12'),(185,'127.0.0.1','PC','master/division/create','Linux','Firefox',1,'2017-03-06 21:25:16','2017-03-06 21:25:16'),(186,'127.0.0.1','PC','master/division/create','Linux','Firefox',1,'2017-03-06 21:25:18','2017-03-06 21:25:18'),(187,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:26:19','2017-03-06 21:26:19'),(188,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:26:45','2017-03-06 21:26:45'),(189,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:26:45','2017-03-06 21:26:45'),(190,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:26:46','2017-03-06 21:26:46'),(191,'127.0.0.1','PC','master/division/apiList','Linux','Firefox',1,'2017-03-06 21:26:47','2017-03-06 21:26:47'),(192,'127.0.0.1','PC','master/division/create','Linux','Firefox',1,'2017-03-06 21:26:52','2017-03-06 21:26:52'),(193,'127.0.0.1','PC','master/division/create','Linux','Firefox',1,'2017-03-06 21:26:53','2017-03-06 21:26:53'),(194,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:27:19','2017-03-06 21:27:19'),(195,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:27:20','2017-03-06 21:27:20'),(196,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:27:20','2017-03-06 21:27:20'),(197,'127.0.0.1','PC','master/division/apiList','Linux','Firefox',1,'2017-03-06 21:27:21','2017-03-06 21:27:21'),(198,'127.0.0.1','PC','master/division/1/edit','Linux','Firefox',1,'2017-03-06 21:27:25','2017-03-06 21:27:25'),(199,'127.0.0.1','PC','master/division/1/edit','Linux','Firefox',1,'2017-03-06 21:27:26','2017-03-06 21:27:26'),(200,'127.0.0.1','PC','master/division/1','Linux','Firefox',1,'2017-03-06 21:27:34','2017-03-06 21:27:34'),(201,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:27:34','2017-03-06 21:27:34'),(202,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:27:35','2017-03-06 21:27:35'),(203,'127.0.0.1','PC','master/division/apiList','Linux','Firefox',1,'2017-03-06 21:27:36','2017-03-06 21:27:36'),(204,'127.0.0.1','PC','master/division/1/edit','Linux','Firefox',1,'2017-03-06 21:27:40','2017-03-06 21:27:40'),(205,'127.0.0.1','PC','master/division/1/edit','Linux','Firefox',1,'2017-03-06 21:27:41','2017-03-06 21:27:41'),(206,'127.0.0.1','PC','master/division/1','Linux','Firefox',1,'2017-03-06 21:27:46','2017-03-06 21:27:46'),(207,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:27:47','2017-03-06 21:27:47'),(208,'127.0.0.1','PC','master/division','Linux','Firefox',1,'2017-03-06 21:27:47','2017-03-06 21:27:47'),(209,'127.0.0.1','PC','master/division/apiList','Linux','Firefox',1,'2017-03-06 21:27:48','2017-03-06 21:27:48'),(210,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:31:40','2017-03-06 21:31:40'),(211,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:31:40','2017-03-06 21:31:40'),(212,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:31:42','2017-03-06 21:31:42'),(213,'127.0.0.1','PC','master/company/2','Linux','Firefox',1,'2017-03-06 21:31:45','2017-03-06 21:31:45'),(214,'127.0.0.1','PC','master/company/2','Linux','Firefox',1,'2017-03-06 21:31:56','2017-03-06 21:31:56'),(215,'127.0.0.1','PC','master/company/2','Linux','Firefox',1,'2017-03-06 21:32:45','2017-03-06 21:32:45'),(216,'127.0.0.1','PC','master/company/2','Linux','Firefox',1,'2017-03-06 21:32:46','2017-03-06 21:32:46'),(217,'127.0.0.1','PC','master/company/2','Linux','Firefox',1,'2017-03-06 21:36:53','2017-03-06 21:36:53'),(218,'127.0.0.1','PC','master/company/2','Linux','Firefox',1,'2017-03-06 21:36:53','2017-03-06 21:36:53'),(219,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:37:06','2017-03-06 21:37:06'),(220,'127.0.0.1','PC','master/company','Linux','Firefox',1,'2017-03-06 21:37:07','2017-03-06 21:37:07'),(221,'127.0.0.1','PC','master/company/apiList','Linux','Firefox',1,'2017-03-06 21:37:08','2017-03-06 21:37:08'),(222,'127.0.0.1','PC','/','Linux','Firefox',1,'2017-03-06 23:33:29','2017-03-06 23:33:29'),(223,'127.0.0.1','PC','/','Linux','Firefox',1,'2017-03-06 23:33:29','2017-03-06 23:33:29'),(224,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 23:46:54','2017-03-06 23:46:54'),(225,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 23:46:54','2017-03-06 23:46:54'),(226,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 23:46:55','2017-03-06 23:46:55'),(227,'127.0.0.1','PC','master/module/create','Linux','Firefox',1,'2017-03-06 23:47:02','2017-03-06 23:47:02'),(228,'127.0.0.1','PC','master/module/create','Linux','Firefox',1,'2017-03-06 23:47:02','2017-03-06 23:47:02'),(229,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 23:47:19','2017-03-06 23:47:19'),(230,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 23:47:20','2017-03-06 23:47:20'),(231,'127.0.0.1','PC','master/module','Linux','Firefox',1,'2017-03-06 23:47:20','2017-03-06 23:47:20'),(232,'127.0.0.1','PC','master/module/apiList','Linux','Firefox',1,'2017-03-06 23:47:20','2017-03-06 23:47:20'),(233,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 23:47:43','2017-03-06 23:47:43'),(234,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 23:47:43','2017-03-06 23:47:43'),(235,'127.0.0.1','PC','master/menu/apiList','Linux','Firefox',1,'2017-03-06 23:47:44','2017-03-06 23:47:44'),(236,'127.0.0.1','PC','master/menu/create','Linux','Firefox',1,'2017-03-06 23:47:48','2017-03-06 23:47:48'),(237,'127.0.0.1','PC','master/menu/create','Linux','Firefox',1,'2017-03-06 23:47:48','2017-03-06 23:47:48'),(238,'127.0.0.1','PC','master/menu/apiCountChild','Linux','Firefox',1,'2017-03-06 23:48:08','2017-03-06 23:48:08'),(239,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 23:48:30','2017-03-06 23:48:30'),(240,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 23:48:31','2017-03-06 23:48:31'),(241,'127.0.0.1','PC','master/menu','Linux','Firefox',1,'2017-03-06 23:48:31','2017-03-06 23:48:31'),(242,'127.0.0.1','PC','master/menu/apiList','Linux','Firefox',1,'2017-03-06 23:48:31','2017-03-06 23:48:31'),(243,'127.0.0.1','PC','master/role','Linux','Firefox',1,'2017-03-06 23:48:40','2017-03-06 23:48:40'),(244,'127.0.0.1','PC','master/role','Linux','Firefox',1,'2017-03-06 23:48:40','2017-03-06 23:48:40'),(245,'127.0.0.1','PC','master/role/apiList','Linux','Firefox',1,'2017-03-06 23:48:40','2017-03-06 23:48:40'),(246,'127.0.0.1','PC','master/role/1/edit','Linux','Firefox',1,'2017-03-06 23:48:44','2017-03-06 23:48:44'),(247,'127.0.0.1','PC','master/role/1/edit','Linux','Firefox',1,'2017-03-06 23:48:45','2017-03-06 23:48:45'),(248,'127.0.0.1','PC','master/role/1','Linux','Firefox',1,'2017-03-06 23:48:51','2017-03-06 23:48:51'),(249,'127.0.0.1','PC','master/role','Linux','Firefox',1,'2017-03-06 23:48:56','2017-03-06 23:48:56'),(250,'127.0.0.1','PC','master/role','Linux','Firefox',1,'2017-03-06 23:48:56','2017-03-06 23:48:56'),(251,'127.0.0.1','PC','master/role/apiList','Linux','Firefox',1,'2017-03-06 23:48:57','2017-03-06 23:48:57'),(252,'127.0.0.1','PC','master/role/1','Linux','Firefox',1,'2017-03-06 23:50:51','2017-03-06 23:50:51'),(253,'127.0.0.1','PC','master/role/1','Linux','Firefox',1,'2017-03-06 23:50:51','2017-03-06 23:50:51'),(254,'127.0.0.1','PC','master/role/1','Linux','Firefox',1,'2017-03-06 23:51:07','2017-03-06 23:51:07'),(255,'127.0.0.1','PC','master/role/1','Linux','Firefox',1,'2017-03-06 23:51:07','2017-03-06 23:51:07'),(256,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-06 23:51:22','2017-03-06 23:51:22'),(257,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-06 23:51:22','2017-03-06 23:51:22'),(258,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-06 23:51:23','2017-03-06 23:51:23'),(259,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-06 23:52:28','2017-03-06 23:52:28'),(260,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-06 23:52:28','2017-03-06 23:52:28'),(261,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-06 23:52:29','2017-03-06 23:52:29'),(262,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-06 23:52:55','2017-03-06 23:52:55'),(263,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-06 23:52:55','2017-03-06 23:52:55'),(264,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-06 23:52:56','2017-03-06 23:52:56'),(265,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-06 23:53:18','2017-03-06 23:53:18'),(266,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-06 23:53:18','2017-03-06 23:53:18'),(267,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-06 23:53:20','2017-03-06 23:53:20'),(268,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-06 23:55:17','2017-03-06 23:55:17'),(269,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-06 23:55:18','2017-03-06 23:55:18'),(270,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:04:41','2017-03-07 00:04:41'),(271,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:04:41','2017-03-07 00:04:41'),(272,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:04:42','2017-03-07 00:04:42'),(273,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:04:42','2017-03-07 00:04:42'),(274,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:04:46','2017-03-07 00:04:46'),(275,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:04:46','2017-03-07 00:04:46'),(276,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:07','2017-03-07 00:05:07'),(277,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:07','2017-03-07 00:05:07'),(278,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:07','2017-03-07 00:05:07'),(279,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:05:08','2017-03-07 00:05:08'),(280,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:05:11','2017-03-07 00:05:11'),(281,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:05:11','2017-03-07 00:05:11'),(282,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:21','2017-03-07 00:05:21'),(283,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:21','2017-03-07 00:05:21'),(284,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:21','2017-03-07 00:05:21'),(285,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:05:22','2017-03-07 00:05:22'),(286,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:05:25','2017-03-07 00:05:25'),(287,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:05:25','2017-03-07 00:05:25'),(288,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:36','2017-03-07 00:05:36'),(289,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:36','2017-03-07 00:05:36'),(290,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:36','2017-03-07 00:05:36'),(291,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:05:37','2017-03-07 00:05:37'),(292,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:05:42','2017-03-07 00:05:42'),(293,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:05:42','2017-03-07 00:05:42'),(294,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:49','2017-03-07 00:05:49'),(295,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:49','2017-03-07 00:05:49'),(296,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:05:50','2017-03-07 00:05:50'),(297,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:05:50','2017-03-07 00:05:50'),(298,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:05:54','2017-03-07 00:05:54'),(299,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:05:54','2017-03-07 00:05:54'),(300,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:06:07','2017-03-07 00:06:07'),(301,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:06:07','2017-03-07 00:06:07'),(302,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:06:08','2017-03-07 00:06:08'),(303,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:06:08','2017-03-07 00:06:08'),(304,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:06:12','2017-03-07 00:06:12'),(305,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:06:12','2017-03-07 00:06:12'),(306,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:06:28','2017-03-07 00:06:28'),(307,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:06:28','2017-03-07 00:06:28'),(308,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:06:29','2017-03-07 00:06:29'),(309,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:06:29','2017-03-07 00:06:29'),(310,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:06:33','2017-03-07 00:06:33'),(311,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:06:33','2017-03-07 00:06:33'),(312,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:06:46','2017-03-07 00:06:46'),(313,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:06:46','2017-03-07 00:06:46'),(314,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:06:47','2017-03-07 00:06:47'),(315,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:06:47','2017-03-07 00:06:47'),(316,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:06:51','2017-03-07 00:06:51'),(317,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:06:52','2017-03-07 00:06:52'),(318,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:07:21','2017-03-07 00:07:21'),(319,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:07:21','2017-03-07 00:07:21'),(320,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:07:22','2017-03-07 00:07:22'),(321,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:07:22','2017-03-07 00:07:22'),(322,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:07:26','2017-03-07 00:07:26'),(323,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:07:26','2017-03-07 00:07:26'),(324,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:07:48','2017-03-07 00:07:48'),(325,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:07:48','2017-03-07 00:07:48'),(326,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:07:48','2017-03-07 00:07:48'),(327,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:07:49','2017-03-07 00:07:49'),(328,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:07:52','2017-03-07 00:07:52'),(329,'127.0.0.1','PC','master/rule/create','Linux','Firefox',1,'2017-03-07 00:07:52','2017-03-07 00:07:52'),(330,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:08:05','2017-03-07 00:08:05'),(331,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:08:05','2017-03-07 00:08:05'),(332,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:08:05','2017-03-07 00:08:05'),(333,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:06','2017-03-07 00:08:06'),(334,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:10','2017-03-07 00:08:10'),(335,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:11','2017-03-07 00:08:11'),(336,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:13','2017-03-07 00:08:13'),(337,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:16','2017-03-07 00:08:16'),(338,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:17','2017-03-07 00:08:17'),(339,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:19','2017-03-07 00:08:19'),(340,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:21','2017-03-07 00:08:21'),(341,'127.0.0.1','PC','master/rule/9','Linux','Firefox',1,'2017-03-07 00:08:23','2017-03-07 00:08:23'),(342,'127.0.0.1','PC','master/rule/9','Linux','Firefox',1,'2017-03-07 00:08:24','2017-03-07 00:08:24'),(343,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:08:27','2017-03-07 00:08:27'),(344,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:08:27','2017-03-07 00:08:27'),(345,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:27','2017-03-07 00:08:27'),(346,'127.0.0.1','PC','master/rule/9/edit','Linux','Firefox',1,'2017-03-07 00:08:30','2017-03-07 00:08:30'),(347,'127.0.0.1','PC','master/rule/9/edit','Linux','Firefox',1,'2017-03-07 00:08:31','2017-03-07 00:08:31'),(348,'127.0.0.1','PC','master/rule/9','Linux','Firefox',1,'2017-03-07 00:08:34','2017-03-07 00:08:34'),(349,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:08:34','2017-03-07 00:08:34'),(350,'127.0.0.1','PC','master/rule','Linux','Firefox',1,'2017-03-07 00:08:34','2017-03-07 00:08:34'),(351,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:35','2017-03-07 00:08:35'),(352,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:41','2017-03-07 00:08:41'),(353,'127.0.0.1','PC','master/rule/apiList','Linux','Firefox',1,'2017-03-07 00:08:43','2017-03-07 00:08:43');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_categories`
--

DROP TABLE IF EXISTS `media_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_categories` (
  `media_category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `media_category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `media_category_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`media_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_categories`
--

LOCK TABLES `media_categories` WRITE;
/*!40000 ALTER TABLE `media_categories` DISABLE KEYS */;
INSERT INTO `media_categories` VALUES (1,'MAGAZINE 1','ukuran majalah NORMAL','1',1,0,'2017-01-17 10:26:07','2017-01-17 10:26:07'),(2,'MAGAZINE 2','ukuran majalah NGI','1',1,0,'2017-01-17 10:26:07','2017-01-17 10:26:07'),(3,'MAGAZINE 3','ukuran majalah INTISARI','1',1,0,'2017-01-17 10:26:07','2017-01-17 10:26:07'),(4,'TABLOID','','1',1,0,'2017-01-17 10:26:07','2017-01-17 10:26:07'),(5,'WEBSITE','','1',1,0,'2017-01-17 10:26:07','2017-01-17 10:26:07'),(6,'MOBILE SITE','','1',1,0,'2017-01-17 10:26:07','2017-01-17 10:26:07'),(7,'CUSTOM PUBLISHING','','1',1,0,'2017-01-17 10:26:08','2017-01-17 10:26:08');
/*!40000 ALTER TABLE `media_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_editions`
--

DROP TABLE IF EXISTS `media_editions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_editions` (
  `media_edition_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `media_id` int(11) NOT NULL,
  `media_edition_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `media_edition_publish_date` date NOT NULL,
  `media_edition_deadline_date` date NOT NULL,
  `media_edition_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`media_edition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_editions`
--

LOCK TABLES `media_editions` WRITE;
/*!40000 ALTER TABLE `media_editions` DISABLE KEYS */;
INSERT INTO `media_editions` VALUES (1,6,'1/2016','0000-00-00','0000-00-00','test','0',1,1,'2016-06-10 02:03:24','2016-06-10 03:32:26'),(2,6,'2/2016','2016-01-08','2016-01-01','','0',1,1,'2016-06-10 02:06:13','2016-06-23 23:49:34'),(3,7,'1/2017','2017-01-03','2016-12-28','','1',1,0,'2016-06-10 02:07:21','2016-06-10 02:07:21'),(4,6,'3/2016','2016-02-17','2016-02-10','','1',1,0,'2016-06-10 02:45:27','2016-06-10 02:45:27'),(5,6,'4/2016','2016-03-01','2016-02-24','','1',1,0,'2016-06-10 03:29:54','2016-06-10 03:29:54'),(6,6,'5/2016','2016-05-01','2016-04-24','','0',1,1,'2016-06-10 03:30:28','2016-06-23 23:48:50'),(7,6,'1/2016','2016-01-01','2015-12-25','','1',1,0,'2016-06-10 03:33:07','2016-06-10 03:33:07'),(8,11,'I/HAI/2016','2016-01-04','2015-12-25','','0',1,1,'2016-06-14 00:25:49','2016-06-14 00:46:26'),(9,11,'II/HAI/2016','2016-01-11','2015-12-28','','1',1,0,'2016-06-14 00:29:24','2016-06-14 00:29:24'),(10,11,'III/HAI/2016','2016-01-18','2016-01-11','','1',1,0,'2016-06-14 00:30:03','2016-06-14 00:30:03'),(11,11,'IV/HAI/2016','2016-01-25','2016-01-14','','1',1,0,'2016-06-14 00:30:31','2016-06-14 00:30:31'),(12,11,'V/HAI/2016','2016-02-01','2016-01-25','','1',1,0,'2016-06-14 00:31:11','2016-06-14 00:31:11'),(13,11,'VI/HAI/2016','2016-02-08','2016-02-01','','1',1,0,'2016-06-14 00:31:52','2016-06-14 00:31:52'),(14,11,'VII/HAI/2016','2016-02-15','2016-02-08','','1',1,0,'2016-06-14 00:34:50','2016-06-14 00:34:50'),(15,11,'IX/HAI/2016','2016-03-02','2016-02-22','','1',1,1,'2016-06-14 00:49:35','2016-06-14 01:59:55'),(16,11,'X','2016-09-09','2016-09-03','','1',1,0,'2016-06-14 00:52:40','2016-06-14 00:52:40'),(17,6,'6','2016-06-06','2016-06-01','','1',1,1,'2016-06-14 00:57:15','2016-06-14 02:01:50'),(18,11,'7/2016','2016-08-17','2016-08-17','edited','0',1,1,'2016-06-14 01:03:08','2016-06-14 01:51:11'),(19,11,'XI','2016-10-10','2016-10-01','','1',1,0,'2016-06-14 01:06:29','2016-06-14 01:06:29'),(20,11,'VIII/2016','2016-08-20','2016-08-12','test','1',1,1,'2016-06-14 01:06:51','2016-06-14 02:00:22'),(21,7,'2/2016','2017-01-10','2017-01-03','','1',1,0,'2016-09-21 22:58:41','2016-09-21 22:58:41');
/*!40000 ALTER TABLE `media_editions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_groups`
--

DROP TABLE IF EXISTS `media_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_groups` (
  `media_group_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `publisher_id` int(11) DEFAULT NULL,
  `media_group_code` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `media_group_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `media_group_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`media_group_id`),
  UNIQUE KEY `media_groups_media_group_code_unique` (`media_group_code`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_groups`
--

LOCK TABLES `media_groups` WRITE;
/*!40000 ALTER TABLE `media_groups` DISABLE KEYS */;
INSERT INTO `media_groups` VALUES (1,2,'ANGG','ANGKASA GROUP','Angkasa, Angkasa.co.id, Commando','1',1,0,'2017-01-17 10:37:34','2017-01-17 10:37:34'),(2,3,'AUTG','AUTOBILD GROUP','autobild, autobild.co.id','1',1,0,'2017-01-17 10:37:34','2017-01-17 10:37:34'),(3,1,'BOBG','BOBO GROUP','bobo, bobo junior. Kidnesia.com','1',1,0,'2017-01-17 10:37:34','2017-01-17 10:37:34'),(4,1,'CEWG','CEWEKBANGET.ID GROUP','cewekbanget.id','1',1,0,'2017-01-17 10:37:34','2017-01-17 10:37:34'),(5,2,'HAIG','HAI GROUP','hai, hai-online.com, hai mobile stage','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(6,2,'IDEG','IDEA RUMAH GROUP','idea, idea book, ideaonline.co.id, rumah, rumahguide.id','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(7,2,'INFG','INFOKOMPUTER GROUP','infokomputer, infokomputer.com','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(8,2,'INTG','INTISARI GROUP','intisari, intisari by product, intisari-online.com','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(9,1,'MOMG','DISNEY MOMBI  GROUP','awd, awd by product, barbie, disney junior, disney & me, mombi, mombi sd, cars, princess','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(10,3,'MPLG','MOTORPLUS GROUP','motorplus, motorplus by product, motorplus-online.com','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(11,1,'NAKG','NAKITA GROUP','nakita, tabloid-nakita.com','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(12,2,'NGIG','NATIONAL GEOGRAPHIC INDONESIA GROUP','national geographic indonesia, national geographic traveler, nationalgeographic.co.id, fotokita.net, digital camera, digitalcamera.co.id','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(13,1,'NOVG','NOVA GROUP','nova, tabloidnova.com, warta klub nova, mobil nova','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(14,3,'OTOG','OTOMOTIF GROUP','otomotif, otomotif by product, otomotifnet.com, jip, jip.co.id','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(15,3,'OPLG','OTOPLUS GROUP','otoplus, otoplus by product, otoplus.id','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(16,1,'SASG','SAJIANSEDAP GROUP','saji, sedap, sajiansedap.com, sedap pemula, sedap by product, saji by product','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35'),(17,1,'XYKG','XYKIDS GROUP','xykids, national geographic kids','1',1,0,'2017-01-17 10:37:35','2017-01-17 10:37:35');
/*!40000 ALTER TABLE `media_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `medias`
--

DROP TABLE IF EXISTS `medias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `medias` (
  `media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `media_group_id` int(11) NOT NULL,
  `media_category_id` int(11) NOT NULL,
  `media_code` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `media_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `media_logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'logo.jpg',
  `media_circulation` int(11) DEFAULT NULL,
  `media_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `medias`
--

LOCK TABLES `medias` WRITE;
/*!40000 ALTER TABLE `medias` DISABLE KEYS */;
INSERT INTO `medias` VALUES (1,1,1,'NOVA','Tabloid Nova','logo.jpg',NULL,'Tabloid Nova\r\n','1',1,0,'2016-06-09 00:17:42','2016-06-09 00:17:42'),(2,1,2,'NOVACOM','tabloidnova.com','logo.jpg',NULL,'tabloid-nova.com','1',1,1,'2016-06-09 00:18:55','2016-06-09 00:27:28'),(3,2,2,'delte','tete','logo.jpg',NULL,'fdfd','0',1,1,'2016-06-09 00:28:08','2016-06-09 00:28:14'),(4,1,1,'NAKITA','Tabloid Nakita','logo.jpg',NULL,'Tabloid Nakita','1',1,0,'2016-06-09 00:29:25','2016-06-09 00:29:25'),(5,3,2,'AUTOBOL','Autobild Online','autobild online.png',NULL,'Auto bild online berbah','1',1,1,'2016-06-09 01:05:30','2016-06-09 02:03:10'),(6,3,1,'AUTOBILD','Majalah Auto Bild','logo.jpg',50000,'Majalah Print Auto Bild','1',1,1,'2016-06-09 01:09:19','2016-12-20 03:52:52'),(7,1,1,'BOBO','Majalah Bobo','bobo_cover2.jpg',NULL,'majalah bobo','1',1,0,'2016-06-09 01:10:07','2016-06-09 01:10:07'),(8,1,2,'double','test double','20160609090245hai.jpg',NULL,'double','1',1,1,'2016-06-09 01:26:08','2016-06-09 02:02:45'),(9,2,2,'Laig','test','2016-06-09 08:27:54autobild online.png',NULL,'test','1',1,0,'2016-06-09 01:27:54','2016-06-09 01:27:54'),(10,1,2,'tiga','tiga','20160609083024autobild online.png',NULL,'test','1',1,0,'2016-06-09 01:30:24','2016-06-09 01:30:24'),(11,2,1,'HAI','Majalah Hai','20160609090748hai.jpg',NULL,'Majalah hai','1',1,0,'2016-06-09 02:07:48','2016-06-09 02:07:48'),(12,2,1,'KWKU','Majalah Kawanku','20160609090835kawanku3.jpg',NULL,'Majalah Kawanku','1',1,0,'2016-06-09 02:08:35','2016-06-09 02:08:35'),(13,1,2,'BOBOL','bobo.co.id','logo.jpg',NULL,'','1',1,0,'2016-11-02 02:05:12','2016-11-02 02:05:12');
/*!40000 ALTER TABLE `medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `menu_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` int(11) NOT NULL,
  `menu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `menu_desc` text COLLATE utf8_unicode_ci,
  `menu_icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,1,'Home','Menu for Home','zmdi zmdi-home',2,0,'1',1,1,'2016-07-13 21:05:14','2016-07-19 21:13:50'),(2,2,'Users Management','Menu for Users Management',NULL,2,0,'1',1,NULL,'2016-07-13 21:06:01','2016-07-13 21:06:01'),(3,3,'Master Data','Menu for Master Data',NULL,3,0,'1',1,NULL,'2016-07-13 21:06:47','2016-07-13 21:06:47'),(4,4,'Action Controls Management','Menu for Action Controls Management',NULL,1,3,'1',1,NULL,'2016-07-13 21:07:36','2016-07-13 21:07:36'),(9,9,'Brands Management','Menu for Brand Management',NULL,2,3,'1',1,1,'2016-07-13 21:11:56','2017-03-01 22:03:52'),(12,12,'Groups Management','Menu for Groups Management',NULL,7,3,'1',1,1,'2016-07-13 21:14:54','2017-03-06 21:13:44'),(13,13,'Holidays Management','Menu for Holiday Management',NULL,8,3,'1',1,1,'2016-07-13 21:15:37','2017-03-06 21:13:44'),(14,14,'Industries Management','Menu for Industries Management',NULL,9,3,'1',1,1,'2016-07-13 21:16:20','2017-03-06 21:13:44'),(16,16,'Media Management','Menu for Media Management',NULL,11,3,'1',1,1,'2016-07-13 21:18:05','2017-03-06 21:13:44'),(17,17,'Media Categories Management','Menu for Media Categories Management','zmdi zmdi-home',11,3,'1',1,1,'2016-07-13 21:18:46','2017-03-06 21:13:44'),(18,18,'Media Groups Management','Menu for Media Groups Management',NULL,13,3,'1',1,1,'2016-07-13 21:19:58','2017-03-06 21:13:44'),(19,19,'Menus Management','Menu for Menus Management',NULL,14,3,'1',1,1,'2016-07-13 21:20:30','2017-03-06 21:13:44'),(20,20,'Modules Management','Menu for Modules Management',NULL,16,3,'1',1,1,'2016-07-13 21:21:42','2017-03-06 21:13:44'),(21,21,'Paper Types Management','Menu for Paper Types Management',NULL,18,3,'1',1,1,'2016-07-13 21:22:20','2017-03-06 21:13:44'),(23,23,'Religions Management','Menu for Religions Management',NULL,21,3,'1',1,1,'2016-07-13 21:23:45','2017-03-06 23:48:30'),(24,24,'Roles Management','Menu for Roles Management',NULL,22,3,'1',1,1,'2016-07-13 21:24:30','2017-03-06 23:48:30'),(25,25,'Sub Industries Management','Menu for Sub Industries Management',NULL,23,3,'1',1,1,'2016-07-13 21:25:05','2017-03-06 23:48:30'),(26,26,'Units Management','Menu for Units Management',NULL,24,3,'1',1,1,'2016-07-13 21:25:57','2017-03-06 23:48:30'),(27,27,'Flow Groups Management','Menu for Flow Groups Management','zmdi zmdi-home',6,3,'1',1,1,'2016-07-20 21:39:34','2017-03-06 21:13:45'),(30,30,'Flows Management','Menu for Flows Management','zmdi zmdi-home',5,3,'1',1,1,'2016-08-22 01:18:20','2017-03-06 21:13:45'),(31,31,'Notification Types Management','Menu for Notification Types Management','zmdi zmdi-home',17,3,'1',1,1,'2016-08-31 20:41:45','2017-03-06 21:13:45'),(35,35,'Configurations','Menu for configurations parents','zmdi zmdi-settings',4,0,'1',1,1,'2016-10-04 21:53:14','2017-03-01 22:06:04'),(36,36,'Application Settings','Menu for application settings','zmdi zmdi-settings-square',2,35,'1',1,1,'2016-10-04 21:54:28','2016-10-05 22:22:33'),(37,37,'Announcement Management','Menu for announcement management','zmdi zmdi-info',1,35,'1',1,1,'2016-10-05 22:07:21','2016-10-05 22:22:33'),(43,43,'Publishers Management','Menu for Publishers Management','zmdi zmdi-link',19,3,'1',1,1,'2016-10-30 21:25:18','2017-03-06 21:13:45'),(55,55,'User Log','Menu for User Logs','zmdi zmdi-link',3,35,'1',1,NULL,'2017-01-26 07:56:16','2017-01-26 07:56:16'),(59,59,'Company Management','Menu for company management','zmdi zmdi-link',3,3,'1',1,NULL,'2017-03-06 21:13:08','2017-03-06 21:13:08'),(60,60,'Division Management','Menu for division management','zmdi zmdi-link',4,3,'1',1,NULL,'2017-03-06 21:13:45','2017-03-06 21:13:45'),(61,61,'Rules Management','Menu for rule management','zmdi zmdi-link',20,3,'1',1,NULL,'2017-03-06 23:48:30','2017-03-06 23:48:30');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus_modules`
--

DROP TABLE IF EXISTS `menus_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus_modules` (
  `menu_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus_modules`
--

LOCK TABLES `menus_modules` WRITE;
/*!40000 ALTER TABLE `menus_modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_05_11_093524_create_roles_table',1),(4,'2016_05_11_094826_create_users_roles_table',1),(5,'2016_05_11_094847_create_modules_table',1),(6,'2016_05_11_094858_create_menus_table',1),(7,'2016_05_11_094918_create_actions_table',1),(8,'2016_05_11_094929_create_configs_table',1),(9,'2016_05_11_094943_create_menus_modules_table',1),(10,'2016_05_11_094955_create_roles_modules_table',1),(11,'2016_05_12_071210_create_users_medias_table',1),(12,'2016_05_12_071232_create_users_subindustries_table',1),(13,'2016_05_12_071452_create_media_groups_table',1),(14,'2016_05_12_071922_create_media_categories_table',1),(15,'2016_05_12_072147_create_medias_table',1),(16,'2016_05_12_072517_create_media_editions_table',1),(17,'2016_05_12_072947_create_papers',1),(18,'2016_05_12_073325_create_units_table',1),(19,'2016_05_12_080341_create_holidays_table',1),(20,'2016_05_12_080353_create_religions_table',1),(21,'2016_05_12_080404_create_industries_table',1),(22,'2016_05_12_080412_create_subindustries_table',1),(23,'2016_05_12_080418_create_brands_table',1),(24,'2016_05_12_083339_create_flow_groups_table',1),(25,'2016_05_12_083347_create_flows_table',1),(26,'2016_05_12_084514_create_action_types_table',1),(27,'2016_05_26_072328_create_actions_modules_table',1),(28,'2016_06_10_043804_create_groups_table',1),(29,'2016_07_21_031419_create_users_groups_table',1),(30,'2016_08_19_083415_create_upload_files_table',1),(31,'2016_09_01_032400_create_notification_types_table',1),(32,'2016_09_01_032410_create_notifications_table',1),(33,'2016_09_02_040009_create_role_levels_table',1),(34,'2016_09_14_090001_create_download_table',1),(35,'2016_09_15_094726_create_approval_type_table',1),(36,'2016_10_05_043832_create_settings_table',1),(37,'2016_10_06_041740_create_announcements_table',1),(38,'2016_10_12_065451_create_implementations_table',1),(39,'2016_10_31_034256_create_table_publishers',1),(40,'2016_10_31_035006_update_table_media_groups_add_publisher_id_column',1),(41,'2016_11_01_040523_create_users_media_groups_table',1),(42,'2016_12_07_042548_create_logs_table',1),(43,'2016_12_20_104127_update_medias_table_add_column_media_circulation',1),(44,'2017_03_07_032539_create_company_table',2),(45,'2017_03_07_032546_create_division_table',2),(46,'2017_03_07_060854_create_rules_table',3),(47,'2017_03_07_060901_create_spmb_type_table',3),(48,'2017_03_07_061632_create_spmb_type_rule_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `module_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module_action` text CHARACTER SET utf8,
  `module_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'/home','','Home for dashboard','1',1,NULL,'2016-07-13 20:37:38','2016-07-13 20:37:38'),(2,'/user','','Module for user management','1',1,NULL,'2016-07-13 20:38:20','2016-07-13 20:38:20'),(3,'/master/#','','Module for master data parent','1',1,NULL,'2016-07-13 20:39:14','2016-07-13 20:39:14'),(4,'/master/action','','Module for Action Control Management','1',1,1,'2016-07-13 20:40:30','2016-07-13 20:41:32'),(9,'/master/brand','','Module for Brand Management','1',1,NULL,'2016-07-13 20:48:22','2016-07-13 20:48:22'),(12,'/master/group','','Module for Group Management','1',1,NULL,'2016-07-13 20:49:51','2016-07-13 20:49:51'),(13,'/master/holiday','','Module for Holiday Management','1',1,NULL,'2016-07-13 20:50:21','2016-07-13 20:50:21'),(14,'/master/industry','','Module for Industry Management','1',1,NULL,'2016-07-13 20:52:45','2016-07-13 20:52:45'),(16,'/master/media','','Module for Media Management','1',1,NULL,'2016-07-13 20:53:57','2016-07-13 20:53:57'),(17,'/master/mediacategory','','Module for Media Category Management','1',1,NULL,'2016-07-13 20:55:05','2016-07-13 20:55:05'),(18,'/master/mediagroup','','Module for Media Group Management','1',1,NULL,'2016-07-13 20:56:55','2016-07-13 20:56:55'),(19,'/master/menu','','Module for Menu Management','1',1,NULL,'2016-07-13 20:57:30','2016-07-13 20:57:30'),(20,'/master/module','','Module for Module Management','1',1,NULL,'2016-07-13 20:58:39','2016-07-13 20:58:39'),(21,'/master/paper','','Module for Paper Type Management','1',1,1,'2016-07-13 20:59:21','2016-07-13 21:00:11'),(23,'/master/religion','','Module for Religion Management','1',1,NULL,'2016-07-13 21:00:40','2016-07-13 21:00:40'),(24,'/master/role','','Module for Role Management','1',1,NULL,'2016-07-13 21:01:10','2016-07-13 21:01:10'),(25,'/master/subindustry','','Module for Sub Industry Management','1',1,NULL,'2016-07-13 21:01:46','2016-07-13 21:01:46'),(26,'/master/unit','','Module for Unit Management','1',1,NULL,'2016-07-13 21:02:11','2016-07-13 21:02:11'),(27,'/master/flowgroup','','Module for Flow Group Management','1',1,NULL,'2016-07-20 21:38:03','2016-07-20 21:38:03'),(30,'/master/flow','','Flow Management','1',1,NULL,'2016-08-22 01:16:35','2016-08-22 01:16:35'),(31,'/master/notificationtype','','Module for Master Notification Type','1',1,NULL,'2016-08-31 20:40:21','2016-08-31 20:40:21'),(35,'/config/#','','Module for configuration','1',1,1,'2016-10-04 21:46:46','2016-10-04 21:48:07'),(36,'/config/setting','','Module for application settings','1',1,NULL,'2016-10-04 21:49:26','2016-10-04 21:49:26'),(37,'/config/announcement','','Module for Announcement Management','1',1,NULL,'2016-10-05 22:05:23','2016-10-05 22:05:23'),(43,'/master/publisher','','Module for Publisher Management','1',1,NULL,'2016-10-30 21:23:53','2016-10-30 21:23:53'),(55,'/config/log','','Module for User Log','1',1,NULL,'2017-01-26 07:55:25','2017-01-26 07:55:25'),(59,'/master/company',NULL,'Module for master company','1',1,NULL,'2017-03-06 21:11:16','2017-03-06 21:11:16'),(60,'/master/division',NULL,'Module for Division Management','1',1,NULL,'2017-03-06 21:11:46','2017-03-06 21:11:46'),(61,'/master/rule',NULL,'Module for rule management','1',1,NULL,'2017-03-06 23:47:19','2017-03-06 23:47:19');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification_types`
--

DROP TABLE IF EXISTS `notification_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification_types` (
  `notification_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notification_type_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_type_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_type_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_type_desc` text COLLATE utf8mb4_unicode_ci,
  `notification_type_need_confirmation` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notification_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification_types`
--

LOCK TABLES `notification_types` WRITE;
/*!40000 ALTER TABLE `notification_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `notification_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notification_type_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_ref_id` int(11) NOT NULL,
  `notification_receiver` int(11) NOT NULL,
  `notification_senttime` datetime NOT NULL,
  `notification_readtime` datetime NOT NULL,
  `notification_status` int(11) NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `papers`
--

DROP TABLE IF EXISTS `papers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `papers` (
  `paper_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `paper_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `paper_width` double(8,2) NOT NULL,
  `paper_length` double(8,2) NOT NULL,
  `paper_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`paper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `papers`
--

LOCK TABLES `papers` WRITE;
/*!40000 ALTER TABLE `papers` DISABLE KEYS */;
INSERT INTO `papers` VALUES (1,1,'AP',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(2,1,'UPM',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(3,1,'HVS',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(4,1,'HSSD',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(5,1,'AK',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(6,1,'NEWSPRINT',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(7,1,'IVORY',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(8,1,'BC',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(9,1,'TIK',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(10,2,'AP',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(11,2,'UPM',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(12,2,'HVS',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(13,2,'HSSD',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(14,2,'AK',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(15,2,'NEWSPRINT',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(16,2,'IVORY',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(17,2,'BC',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10'),(18,2,'TIK',0.00,0.00,'','1',1,0,'2017-01-17 10:42:10','2017-01-17 10:42:10');
/*!40000 ALTER TABLE `papers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publishers`
--

DROP TABLE IF EXISTS `publishers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publishers` (
  `publisher_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `publisher_code` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `publisher_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`publisher_id`),
  UNIQUE KEY `publishers_publisher_code_unique` (`publisher_code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publishers`
--

LOCK TABLES `publishers` WRITE;
/*!40000 ALTER TABLE `publishers` DISABLE KEYS */;
INSERT INTO `publishers` VALUES (1,'CWM','Children Women Media','Children Women Media','1',1,0,'2016-10-30 21:41:49','2016-10-30 21:41:49'),(2,'GIM','General Interest Media','General Interest Media','1',1,0,'2016-10-30 21:42:47','2016-10-30 21:42:47'),(3,'OTO','Otomotif Media','Otomotif Media','1',1,1,'2016-10-30 21:43:08','2017-01-17 10:38:55'),(4,'DIGI','Digital Media','Digital Media','1',1,0,'2016-10-30 21:44:30','2016-10-30 21:44:30');
/*!40000 ALTER TABLE `publishers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `religions`
--

DROP TABLE IF EXISTS `religions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `religions` (
  `religion_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `religion_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`religion_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `religions`
--

LOCK TABLES `religions` WRITE;
/*!40000 ALTER TABLE `religions` DISABLE KEYS */;
INSERT INTO `religions` VALUES (1,'Islam','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(2,'Kristen Katolik','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(3,'Kristen Protestan','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(4,'Hindu','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(5,'Budha','1',1,1,'2016-05-19 02:00:10','2016-05-19 02:00:10'),(6,'Konghucu Edit','0',1,1,'2016-05-23 02:08:49','2016-05-23 02:10:41'),(7,'tujuh','1',1,0,'2016-05-25 01:58:21','2016-05-25 01:58:21');
/*!40000 ALTER TABLE `religions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_levels`
--

DROP TABLE IF EXISTS `role_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_levels` (
  `role_level_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_level_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_level_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_levels`
--

LOCK TABLES `role_levels` WRITE;
/*!40000 ALTER TABLE `role_levels` DISABLE KEYS */;
INSERT INTO `role_levels` VALUES (1,'Level 1','Staff','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(2,'Level 2','Superintendent','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(3,'Level 3','Manager','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(4,'Level 4','Division Head','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(5,'Level 5','General Manager','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(6,'Level 6','Administrator','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33'),(7,'Level 7','Super Administrator','1',1,1,'2017-03-01 19:28:33','2017-03-01 19:28:33');
/*!40000 ALTER TABLE `role_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_level_id` int(11) DEFAULT NULL,
  `role_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,7,'Super Administrator','Role for Super Administrator','1',1,1,'2016-05-19 02:00:10','2016-09-02 00:29:53'),(2,6,'Administrator','Role for Adminstrator','1',1,1,'2016-05-20 00:31:22','2016-09-02 00:30:33'),(3,1,'Operator','Role for operator','1',1,1,'2016-05-20 00:33:20','2016-07-13 21:35:02'),(4,1,'Secretary','Role untuk secretary','1',1,1,'2016-05-20 00:35:15','2016-07-13 21:39:09');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_modules`
--

DROP TABLE IF EXISTS `roles_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_modules` (
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_modules`
--

LOCK TABLES `roles_modules` WRITE;
/*!40000 ALTER TABLE `roles_modules` DISABLE KEYS */;
INSERT INTO `roles_modules` VALUES (16,1,2,1),(29,1,2,1),(30,1,2,1),(6,1,2,1),(19,1,2,1),(4,1,2,1),(21,1,2,1),(22,1,2,1),(23,1,2,1),(24,1,2,1),(25,1,2,1),(7,1,2,1),(7,33,2,1),(7,34,1,1),(7,34,2,1),(7,34,3,1),(7,34,4,1),(31,1,2,1),(31,33,2,1),(31,34,1,1),(31,34,2,1),(31,34,3,1),(31,34,4,1),(12,1,2,1),(12,29,2,1),(12,28,1,1),(12,28,2,1),(12,28,3,1),(12,28,4,1),(12,28,5,1),(12,28,6,1),(12,28,8,1),(12,38,1,1),(12,38,2,1),(12,38,3,1),(12,38,4,1),(12,38,5,1),(12,38,6,1),(12,38,8,1),(18,1,2,1),(18,29,2,1),(18,28,2,1),(18,28,3,1),(18,28,4,1),(18,28,5,1),(18,28,6,1),(18,28,8,1),(18,38,2,1),(18,38,3,1),(18,38,4,1),(18,38,5,1),(18,38,6,1),(18,38,8,1),(8,1,2,1),(8,3,2,1),(8,6,1,1),(8,6,2,1),(8,6,3,1),(8,7,1,1),(8,7,2,1),(8,7,3,1),(8,8,1,1),(8,8,2,1),(8,8,3,1),(8,40,1,1),(8,40,2,1),(8,40,3,1),(8,29,2,1),(8,41,1,1),(8,41,2,1),(8,41,3,1),(8,41,4,1),(8,41,5,1),(8,41,6,1),(8,41,8,1),(8,33,2,1),(8,34,1,1),(8,34,2,1),(8,34,3,1),(8,34,4,1),(8,45,2,1),(8,46,1,1),(8,46,2,1),(8,46,3,1),(8,46,4,1),(8,46,5,1),(8,46,6,1),(8,46,8,1),(9,1,2,1),(9,3,2,1),(9,6,1,1),(9,6,2,1),(9,6,3,1),(9,7,1,1),(9,7,2,1),(9,7,3,1),(9,8,1,1),(9,8,2,1),(9,8,3,1),(9,40,1,1),(9,40,2,1),(9,40,3,1),(9,29,2,1),(9,41,2,1),(9,41,3,1),(9,41,4,1),(9,41,5,1),(9,41,6,1),(9,41,8,1),(9,33,2,1),(9,34,1,1),(9,34,2,1),(9,34,3,1),(9,34,4,1),(9,45,2,1),(9,46,2,1),(9,46,3,1),(9,46,4,1),(9,46,5,1),(9,46,6,1),(9,46,8,1),(13,1,2,1),(13,52,2,1),(13,54,2,1),(13,54,3,1),(13,54,4,1),(13,54,5,1),(13,54,6,1),(13,54,8,1),(11,1,2,1),(11,52,2,1),(11,54,2,1),(11,54,5,1),(11,54,6,1),(11,54,8,1),(15,1,2,1),(15,52,2,1),(15,57,1,1),(15,57,2,1),(15,57,5,1),(15,57,6,1),(15,57,8,1),(14,1,2,1),(14,52,2,1),(14,57,1,1),(14,57,2,1),(14,57,5,1),(14,57,6,1),(14,57,8,1),(10,1,2,1),(10,3,2,1),(10,10,1,1),(10,10,2,1),(10,52,2,1),(10,53,1,1),(10,53,2,1),(10,53,5,1),(10,53,6,1),(10,53,8,1),(10,54,2,1),(10,54,5,1),(10,54,6,1),(10,54,8,1),(10,57,2,1),(10,57,5,1),(10,57,6,1),(10,57,8,1),(10,56,2,1),(10,56,5,1),(32,1,2,1),(32,52,2,1),(32,53,2,1),(32,53,5,1),(32,53,6,1),(32,53,8,1),(32,54,1,1),(32,54,2,1),(32,54,3,1),(32,54,5,1),(32,54,6,1),(32,54,8,1),(32,56,2,1),(32,56,5,1),(34,1,2,1),(34,3,2,1),(34,10,1,1),(34,10,2,1),(34,52,2,1),(34,53,2,1),(34,53,5,1),(34,53,6,1),(34,53,8,1),(34,54,2,1),(34,54,5,1),(34,54,6,1),(34,54,8,1),(34,57,2,1),(34,57,5,1),(34,57,6,1),(34,57,8,1),(34,56,2,1),(34,56,5,1),(33,1,2,1),(33,52,2,1),(33,57,2,1),(33,57,5,1),(33,57,6,1),(33,57,8,1),(2,1,2,1),(2,2,1,1),(2,2,2,1),(2,2,3,1),(2,3,2,1),(2,4,1,1),(2,4,2,1),(2,4,3,1),(2,9,1,1),(2,9,2,1),(2,9,3,1),(2,9,4,1),(2,12,1,1),(2,12,2,1),(2,12,3,1),(2,12,4,1),(2,13,1,1),(2,13,2,1),(2,13,3,1),(2,13,4,1),(2,14,1,1),(2,14,2,1),(2,14,3,1),(2,14,4,1),(2,16,1,1),(2,16,2,1),(2,16,3,1),(2,16,4,1),(2,17,1,1),(2,17,2,1),(2,17,3,1),(2,17,4,1),(2,18,1,1),(2,18,2,1),(2,18,3,1),(2,18,4,1),(2,19,1,1),(2,19,2,1),(2,19,3,1),(2,20,1,1),(2,20,2,1),(2,20,3,1),(2,31,1,1),(2,31,2,1),(2,31,3,1),(2,31,4,1),(2,21,1,1),(2,21,2,1),(2,21,3,1),(2,21,4,1),(2,23,1,1),(2,23,2,1),(2,23,3,1),(2,23,4,1),(2,24,1,1),(2,24,2,1),(2,24,3,1),(2,25,1,1),(2,25,2,1),(2,25,3,1),(2,25,4,1),(2,26,1,1),(2,26,2,1),(2,26,3,1),(2,26,4,1),(2,35,2,1),(2,37,1,1),(2,37,2,1),(2,37,3,1),(2,37,4,1),(2,36,2,1),(2,36,3,1),(3,1,2,1),(3,3,2,1),(3,4,2,1),(3,4,3,1),(3,9,1,1),(3,9,2,1),(3,9,3,1),(3,9,4,1),(3,12,1,1),(3,12,2,1),(3,12,3,1),(3,12,4,1),(3,13,1,1),(3,13,2,1),(3,13,3,1),(3,13,4,1),(3,14,1,1),(3,14,2,1),(3,14,3,1),(3,14,4,1),(3,16,1,1),(3,16,2,1),(3,16,3,1),(3,18,2,1),(3,18,3,1),(3,21,1,1),(3,21,2,1),(3,21,3,1),(3,21,4,1),(3,25,1,1),(3,25,2,1),(3,25,3,1),(3,25,4,1),(3,26,1,1),(3,26,2,1),(3,26,3,1),(3,26,4,1),(1,1,2,1),(1,2,1,1),(1,2,2,1),(1,2,3,1),(1,2,4,1),(1,3,2,1),(1,4,1,1),(1,4,2,1),(1,4,3,1),(1,4,4,1),(1,9,1,1),(1,9,2,1),(1,9,3,1),(1,9,4,1),(1,59,1,1),(1,59,2,1),(1,59,3,1),(1,59,4,1),(1,60,1,1),(1,60,2,1),(1,60,3,1),(1,60,4,1),(1,30,1,1),(1,30,2,1),(1,30,3,1),(1,30,4,1),(1,27,1,1),(1,27,2,1),(1,27,3,1),(1,27,4,1),(1,12,1,1),(1,12,2,1),(1,12,3,1),(1,12,4,1),(1,13,1,1),(1,13,2,1),(1,13,3,1),(1,13,4,1),(1,14,1,1),(1,14,2,1),(1,14,3,1),(1,14,4,1),(1,16,1,1),(1,16,2,1),(1,16,3,1),(1,16,4,1),(1,17,1,1),(1,17,2,1),(1,17,3,1),(1,17,4,1),(1,18,1,1),(1,18,2,1),(1,18,3,1),(1,18,4,1),(1,19,1,1),(1,19,2,1),(1,19,3,1),(1,19,4,1),(1,20,1,1),(1,20,2,1),(1,20,3,1),(1,20,4,1),(1,31,1,1),(1,31,2,1),(1,31,3,1),(1,31,4,1),(1,21,1,1),(1,21,2,1),(1,21,3,1),(1,21,4,1),(1,43,1,1),(1,43,2,1),(1,43,3,1),(1,43,4,1),(1,61,1,1),(1,61,2,1),(1,61,3,1),(1,61,4,1),(1,23,1,1),(1,23,2,1),(1,23,3,1),(1,23,4,1),(1,24,1,1),(1,24,2,1),(1,24,3,1),(1,24,4,1),(1,25,1,1),(1,25,2,1),(1,25,3,1),(1,25,4,1),(1,26,1,1),(1,26,2,1),(1,26,3,1),(1,26,4,1),(1,35,2,1),(1,37,1,1),(1,37,2,1),(1,37,3,1),(1,37,4,1),(1,36,1,1),(1,36,2,1),(1,36,3,1),(1,36,4,1),(1,55,2,1);
/*!40000 ALTER TABLE `roles_modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rules`
--

DROP TABLE IF EXISTS `rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rules` (
  `rule_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rule_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rule_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`rule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rules`
--

LOCK TABLES `rules` WRITE;
/*!40000 ALTER TABLE `rules` DISABLE KEYS */;
INSERT INTO `rules` VALUES (1,'Kontrak','Kontrak','1',1,NULL,'2017-03-07 00:04:41','2017-03-07 00:04:41'),(2,'Report Pekerjaan','Report Pekerjaan','1',1,NULL,'2017-03-07 00:05:07','2017-03-07 00:05:07'),(3,'Invoice','Invoice','1',1,NULL,'2017-03-07 00:05:21','2017-03-07 00:05:21'),(4,'Faktur Pajak','Faktur Pajak','1',1,NULL,'2017-03-07 00:05:36','2017-03-07 00:05:36'),(5,'RAB','RAB','1',1,NULL,'2017-03-07 00:05:49','2017-03-07 00:05:49'),(6,'Surat Penawaran','Surat Penawaran','1',1,NULL,'2017-03-07 00:06:07','2017-03-07 00:06:07'),(7,'Kelengkapan Materi Promosi','Kelengkapan Materi Promosi','1',1,NULL,'2017-03-07 00:06:28','2017-03-07 00:06:28'),(8,'Surat Rekomendasi TI','Surat Rekomendasi TI','1',1,NULL,'2017-03-07 00:06:46','2017-03-07 00:06:46'),(9,'BPB (Bon Permintaan Barang)','BPB (Bon Permintaan Barang)','1',1,1,'2017-03-07 00:07:21','2017-03-07 00:08:34'),(10,'No IO dan Aset','No IO dan Aset','1',1,NULL,'2017-03-07 00:07:48','2017-03-07 00:07:48'),(11,'Matrik Otorisasi','Matrik Otorisasi','1',1,NULL,'2017-03-07 00:08:05','2017-03-07 00:08:05');
/*!40000 ALTER TABLE `rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `setting_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `setting_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'app_name','Application Setting','Application\'s Name','<i>e</i>-<b>SPMB</b>','1',1,1,'2017-02-28 17:00:00','2017-02-28 17:00:00'),(2,'headtitle','Head Title','Head Title','e-SPMB','1',1,1,'2017-02-28 17:00:00','2017-02-28 17:00:00');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spmb_type_rule`
--

DROP TABLE IF EXISTS `spmb_type_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spmb_type_rule` (
  `spmb_type_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spmb_type_rule`
--

LOCK TABLES `spmb_type_rule` WRITE;
/*!40000 ALTER TABLE `spmb_type_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `spmb_type_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spmb_types`
--

DROP TABLE IF EXISTS `spmb_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spmb_types` (
  `spmb_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `spmb_type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`spmb_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spmb_types`
--

LOCK TABLES `spmb_types` WRITE;
/*!40000 ALTER TABLE `spmb_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `spmb_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subindustries`
--

DROP TABLE IF EXISTS `subindustries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subindustries` (
  `subindustry_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `industry_id` int(11) NOT NULL,
  `subindustry_code` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subindustry_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subindustry_desc` text COLLATE utf8mb4_unicode_ci,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`subindustry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subindustries`
--

LOCK TABLES `subindustries` WRITE;
/*!40000 ALTER TABLE `subindustries` DISABLE KEYS */;
/*!40000 ALTER TABLE `subindustries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `units` (
  `unit_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `unit_code` char(5) COLLATE utf8_unicode_ci NOT NULL,
  `unit_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit_desc` text COLLATE utf8_unicode_ci,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `units`
--

LOCK TABLES `units` WRITE;
/*!40000 ALTER TABLE `units` DISABLE KEYS */;
INSERT INTO `units` VALUES (1,'cm','Centimeter','Centimeter','1',1,1,'2016-06-07 23:57:19','2016-06-07 23:59:51'),(2,'mm','Milimeter','Milimeter','1',1,0,'2016-06-07 23:57:40','2016-06-07 23:57:40'),(3,'px','Pixel','Pixels','1',1,0,'2016-06-08 00:00:15','2016-06-08 00:00:15'),(4,'delet','delete it','dekete it','0',1,1,'2016-06-08 00:03:13','2016-06-08 00:03:20'),(5,'mmk','Milimeter Kolom','Milimeter Kolom\r\n','1',1,0,'2016-06-15 00:31:10','2016-06-15 00:31:10');
/*!40000 ALTER TABLE `units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `upload_files`
--

DROP TABLE IF EXISTS `upload_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `upload_files` (
  `upload_file_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `upload_file_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_file_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_file_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_file_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`upload_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `upload_files`
--

LOCK TABLES `upload_files` WRITE;
/*!40000 ALTER TABLE `upload_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `upload_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_gender` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion_id` int(11) NOT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_lastlogin` datetime DEFAULT NULL,
  `user_lastip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_status` enum('ACTIVE','INACTIVE','BLOCKED','EXPIRED') COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `users_user_name_unique` (`user_name`),
  UNIQUE KEY `users_user_email_unique` (`user_email`),
  KEY `users_user_firstname_user_phone_user_birthdate_index` (`user_firstname`,`user_phone`,`user_birthdate`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'025407','soni@gramedia-majalah.com','$2y$10$.l.kwdKNvN2WjhVMM.DFE.rJHLMOk2H7Ub7Xu4R7yvbn8Ks8blieS','Soni','Rahayu','081111111111','1',1,'1990-01-01',NULL,NULL,'avatar.jpg','ACTIVE','1',1,1,'IVVFTcw3vwCOnb8DvqGHy9wudLaFmpoyQy5Ic2avqFcv4IoJjJzAY9xEl0z1','2017-03-01 19:28:32','2017-03-02 00:25:16'),(2,'000001','jakoeb@kompas.com','$2y$10$tXApGgxoZdYkRzd9tI1Pu.L8Qq1YT/oZacFrP2IcWTgsnX1qgVyWK','Jakoeb','Oetama','08212121212','1',7,'1950-01-01',NULL,NULL,'avatar.jpg','ACTIVE','1',1,1,NULL,'2017-03-02 00:11:10','2017-03-02 00:18:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (2,1),(1,1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_media_groups`
--

DROP TABLE IF EXISTS `users_media_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_media_groups` (
  `user_id` int(11) NOT NULL,
  `media_group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_media_groups`
--

LOCK TABLES `users_media_groups` WRITE;
/*!40000 ALTER TABLE `users_media_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_media_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_medias`
--

DROP TABLE IF EXISTS `users_medias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_medias` (
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_medias`
--

LOCK TABLES `users_medias` WRITE;
/*!40000 ALTER TABLE `users_medias` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_medias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES (1,1),(8,1),(8,4),(8,7),(10,7),(11,2),(12,1),(5,1),(13,12),(9,18),(4,12),(15,9),(16,8),(17,2),(18,8),(14,9),(19,10),(20,13),(21,11),(23,11),(22,13),(24,32),(25,33),(26,34),(27,15),(2,2);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_subindustries`
--

DROP TABLE IF EXISTS `users_subindustries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_subindustries` (
  `user_id` int(11) NOT NULL,
  `subindustry_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

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

-- Dump completed on 2017-03-07 15:34:17
