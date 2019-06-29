-- MySQL dump 10.13  Distrib 5.5.57, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: tolet
-- ------------------------------------------------------
-- Server version	5.5.57-0ubuntu0.14.04.1

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accountable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `period_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `accounts_accountable_type_accountable_id_index` (`accountable_type`,`accountable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'App\\Room',1,'Rent','KES',2,20000.00,1,NULL,'2019-01-26 10:15:31','2019-06-18 16:40:27'),(2,'App\\Room',2,'Rent','KES',2,15000.00,1,'2019-05-01 11:28:42','2019-01-26 11:05:38','2019-05-01 11:28:42'),(3,'App\\Room',1,'Water','KES',2,400.00,1,NULL,'2019-01-26 12:50:19','2019-01-26 12:50:19'),(4,'App\\Room',1,'Wi-fi','KES',2,1000.00,1,'2019-05-09 21:55:40','2019-01-26 12:56:38','2019-05-09 21:55:40'),(5,'App\\Room',1,'standing  chart','KES',2,199.00,1,'2019-02-07 17:49:25','2019-02-07 17:49:03','2019-02-07 17:49:25'),(6,'App\\Room',12,'Rent','KES',2,10000.00,1,'2019-05-01 11:29:08','2019-03-13 09:18:36','2019-05-01 11:29:08'),(7,'App\\Room',1,'Service Charge','KES',2,15000.00,1,NULL,'2019-04-16 13:48:14','2019-04-16 13:48:14'),(8,'App\\Room',3,'Garbage','KES',2,200.00,1,NULL,'2019-04-22 17:01:16','2019-04-22 17:01:16'),(9,'App\\Room',5,'Rent','KES',2,10000.00,1,NULL,'2019-05-08 07:25:46','2019-05-08 07:25:46'),(10,'App\\Room',5,'water','KES',2,2300.00,1,NULL,'2019-05-08 07:26:10','2019-05-08 07:29:01'),(11,'App\\Room',5,'parking','JMD',2,100.00,1,NULL,'2019-05-08 07:26:29','2019-05-08 07:28:06'),(12,'App\\Room',17,'Rent','KES',2,10000.00,1,NULL,'2019-06-25 07:35:32','2019-06-25 07:35:32');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isApproved` int(11) DEFAULT NULL,
  `suspended` int(11) DEFAULT NULL,
  `total_listings` int(10) unsigned NOT NULL DEFAULT '0',
  `total_units` int(10) unsigned NOT NULL DEFAULT '0',
  `total_tenants` int(10) unsigned NOT NULL DEFAULT '0',
  `approved_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `profilepic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `agents_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agents`
--

LOCK TABLES `agents` WRITE;
/*!40000 ALTER TABLE `agents` DISABLE KEYS */;
INSERT INTO `agents` VALUES (1,'wambui','wambui.njage@gmail.com','$2y$10$kNsd0ST3mXCLCsb8zh9LoumC1FZiAckX618.j2ZstTZKT.Ix..fme','+254721840501',1,NULL,2,17,16,NULL,NULL,NULL,'2019-06-11 06:13:19','2019-06-18 17:18:17',NULL,NULL),(4,'Kingsley','amaitsakingsley@gmail.com','$2y$10$.zaFHS/HMPz2fSRUzjGfu.w2FIU14siF2sWk7KkuG3UiBXKiXYOB.','+254721751366',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-05-22 18:55:23','2019-05-22 18:55:23',NULL,NULL),(5,'kings','mangwels@outlook.com','$2y$10$wE9N0Sm/BaPXWyHsI9aTKujnAGSOxFqwC1fDvoE11JodkNoqnQVNe','+254254721751366',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-08 06:47:20','2019-06-08 06:47:20',NULL,NULL),(6,'sxsx','sxa@ss.com','$2y$10$ok8hH/1fn4tGCEAGieahM.QQIXNoPHLSGI6NEAQ2lNXP58anlsbGe','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 06:16:18','2019-06-10 06:16:18',NULL,NULL),(7,'sxsx','sxa@sqqqs.com','$2y$10$y7XcUfyHGlhcWaeiX/P0j.rTy6J4BrZqNqb.ojo/TOD0XSTkN2ujq','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 06:16:34','2019-06-10 06:16:34',NULL,NULL),(8,'sxsx','sxa@saaqqqs.com','$2y$10$.jXQ76nAyEIEEM83Arr6Yum5ZyuyiEPRz.Xx12/Kbv5eYIMfox0Dq','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 06:18:25','2019-06-10 06:18:25',NULL,NULL),(9,'zdcda','sXsawedsx@jhnsk.com','$2y$10$huth1eUoI37OiyFS1QY7l.m2yWhIHHW9Hn5nlxZz4MDLmxQBasRCa','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 06:47:27','2019-06-10 06:47:27',NULL,NULL),(10,'zdcda','sXsawedxsx@jhnsk.com','$2y$10$hRoMZsGOxbstFLR8bFFX0ua.WTDyp/pePi/DwfQisDUtY5vUeuaOO','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 06:58:34','2019-06-10 06:58:34',NULL,NULL),(11,'sdcas','jdhscnsjd@hjs.com','$2y$10$3nM.wYLfE4mPlmgQwRh//u5DsMjCAvJgYRBRikLcyTnpMQSXtcbE6','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 06:59:35','2019-06-10 06:59:35',NULL,NULL),(12,'sdcas','jdhscnsjd@hjs.cosm','$2y$10$RbuVsvNFJs6ZRZ7BbHRJCecZqG32zvu5RkIEBuaC4Z7TLL9N2ILCC','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 07:01:42','2019-06-10 07:01:42',NULL,NULL),(13,'sdcas','jdhscnsjd@hjs.cosms','$2y$10$1WziQW37mPxd3v.v2/Wnmezoj/oFAFMCkMkXEzbJzQ5evi5sy9PIS','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 07:02:02','2019-06-10 07:02:02',NULL,NULL),(14,'dascs','asdcac@jbmsnxd.com','$2y$10$LUwcwvUIm0KJf0VS8LTUNeVVqu0sOi6XJAqigczGRjKCm6rIvydYa','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 07:24:35','2019-06-10 07:24:35',NULL,NULL),(15,'asasasa','asssadadss@hjskm.com','$2y$10$Q/DYwVq9Lhll/x/I1yUTduso6AEKN8hoPGosigVeokHhn.bkDZo0e','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 07:33:00','2019-06-10 07:33:00',NULL,NULL),(16,'asxsd','aedrfgtdrs@sjkd.com','$2y$10$mKMJVNM5sI0bGcpchMcZvukMOFg7yJRGjmQPzDk606.v9sUwwJGt6','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 07:53:10','2019-06-10 07:53:10',NULL,NULL),(17,'xdfsd','asdxasd@jhsg.com','$2y$10$8NZhNg3Nd7j7MIQPC3IdPeENehiMbpyENnim8BLpSQ5KuVYRiSaUm','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 08:03:34','2019-06-10 08:03:34',NULL,NULL),(18,'asdsadas','asdse@jkhsdsd.com','$2y$10$bTFvlNDvFgJ9O/28jF7GWut2Kb53LkD1k7ii3rKoieNeCsaIT.Emy','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 08:28:52','2019-06-10 08:28:52',NULL,NULL),(19,'sdxsdxas','asxdaSDxas@jsd.com','$2y$10$hhID.r3lFuWxcGtMiTt2B.kqU.7lrEQndZuw2bNe0/tAGSoIqmA8K','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 08:40:26','2019-06-10 08:40:26',NULL,NULL),(20,'John','jonh@mail.com','$2y$10$TBKP3iZd.XtPE95e/cUqxuNtz0YSBG8w2dE30N061vzcaODH5NQz6','+2540000000',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 08:45:32','2019-06-10 08:45:32',NULL,NULL),(21,'John','peter@mail.com','$2y$10$.M0AuW9yZo9SXE.qjkrSbOCSRsHtHi8FqPYSI3sBQJ8798rFxvNqq','+2540000000',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 08:50:27','2019-06-10 08:50:27',NULL,NULL),(22,'aaaaaa','aaaaaaaaaaaa@jhsg.com','$2y$10$lPir1z3HN9z.TbOmJCE8i.xqoUwau.Dao.fAbycDNCluZUG3sYqYy','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 08:58:39','2019-06-10 08:58:39',NULL,NULL),(23,'aaaaaa','aaaaaaa1aaaaa@jhsg.com','$2y$10$/1mTD1TgUOPfIu4S177wd.7GNbrfUQ7SGlEdJ6h5hbyE298OPdl0y','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 08:58:59','2019-06-10 08:58:59',NULL,NULL),(24,'aaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa@jhasmbd.com','$2y$10$u2FGN7oJX0On7J58QJD.eOSL944MjseRSfvRjOAyQvpRQ/FB0sDrG','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 08:59:56','2019-06-10 08:59:56',NULL,NULL),(25,'asdasds','asadasds@ajbsajks.com','$2y$10$DO6G/3bC0wBKO0SLwDu/3.v8uvf.j7c1luSTy38g172D6LwjRlwsy','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 09:06:16','2019-06-10 09:06:16',NULL,NULL),(26,'fgxfd','fsddfdfsdf@ahs.com','$2y$10$pvLIqehGMr.Rr0J7kGFNXOVVz8LHALtIOYdPNPo1y7agYtoVxbQmm','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 09:09:57','2019-06-10 09:09:57',NULL,NULL),(27,'asdxasdas','asdasdas@jhsdg.com','$2y$10$3NYjHLskoNIx68RxPhPXzudLBAieChXpKdruB007IbySaQswUyh5G','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 09:11:02','2019-06-10 09:11:02',NULL,NULL),(28,'sdsdsad','zsdcads@jhsdgsd.com','$2y$10$IPxow9ZQTcRi/yY./bntvOlbu4ZewKG/bN1lhIxuikhNVw6tepjjS','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 09:12:02','2019-06-10 09:12:02',NULL,NULL),(33,'asaxs','dfadszcszdcd@hskbsa.cpm','$2y$10$g0yt2BL1Jq4u2yUbJHjk8uE55a1pWA20LjyYRtEX9AqeLoDpUo7/O','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 12:15:54','2019-06-10 12:15:54',NULL,NULL),(34,'asaxs','dfadszcszdcd@hskbasa.cpm','$2y$10$N4L6pRbnVIE1QS1HaVCwdeILMK3OfdTVgrjesU93DmV4OC3beLO..','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 12:17:52','2019-06-10 12:17:52',NULL,NULL),(35,'asaxs','dfadszcszdcd@hsskbasa.cpm','$2y$10$n/39AXc/yZ6IzRL81esmROfp9RXd/eTXJ15aHZazpTCvKGZ8EGgV6','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 12:18:32','2019-06-10 12:18:32',NULL,NULL),(36,'asaxs','dfadszcszdcd@hsskbaasa.cpm','$2y$10$VEldzwRBUhPnbrQziUTQvOoEtfI4Kku.zqaQBTDC5ZSlfJShpLL0S','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 12:19:04','2019-06-10 12:19:04',NULL,NULL),(37,'asdxas','aassssssssssss@ahja.com','$2y$10$XGRhUIPp/zbJ0QOtkb/NP.BCD3IvvFwwcE5w6XzGEieo5vK2sL57a','+297721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 12:48:36','2019-06-10 12:48:36',NULL,NULL),(38,'qqqqqqq','qqqqqq@gmail.com','$2y$10$aAGTqdMkS6juezCIZChlaenP1F9RwklKCqQrmudeQnAwl.RFH51Ba','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 12:49:12','2019-06-10 12:49:12',NULL,NULL),(39,'aaaaaa','aaaaaaaaa@jsas.com','$2y$10$TmzgWBRnbZWoBTLVYZdZg.ElWf4/0a.aMImyEX0QEtfsk.CQz1EH6','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 12:52:41','2019-06-10 12:52:41',NULL,NULL),(40,'aaaaaa','aqqqqqqqaaaaaaaa@jsas.com','$2y$10$8nwiSiOZcI38zxLUurCrX.U1AK4Hucbk.S9ISl.WVzM8U3tJtO7Ym','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 12:53:00','2019-06-10 12:53:00',NULL,NULL),(41,'aaaaaa','aqqeadqqqqqssssaaaaaaaa@jsas.com','$2y$10$t7ZTb3/YMK3WiCuaDugXLebThvonmL1UKQX6HmFBaSWXnA0AsbVTC','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 12:56:37','2019-06-10 12:56:37',NULL,NULL),(42,'aaaaaa','aqqeadqqqqqssssaaaaaaaaaaaaa@jsas.com','$2y$10$fM8O22dqJpXOfRsClz.hMe0V2QO6StbJP65MTd69wRAdfmV1w3EIm','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 13:01:45','2019-06-11 06:16:15',NULL,NULL),(43,'aaaaaa','aqqeadqqqqqssssaaaaaasaaaaaaaaa@jsas.com','$2y$10$xk.lTDX2szs2mrHCB.x0KO1vfY5IHRwDAIRaqTTv9coxEnnTFuvg2','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 13:05:22','2019-06-10 13:05:22',NULL,NULL),(44,'aaaaaa','aqqeadqqqqqssssaaaaaasaaaaaaaaaaaaaaaaaa@jsas.com','$2y$10$1pdn1KgppPU.VcrtDz7Un.jYMzMzzKbvb5z/CXRzOIrakDZ/.fWyO','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 13:05:39','2019-06-10 13:05:39',NULL,NULL),(45,'aaaaaa','aqqeadqqqqqssssaaaaasasaaaaaaaaaaaaaaaaaa@jsas.com','$2y$10$94CYAk2S2wXtbRTuY9pzfurTkgh.YyCSL8dpkNSDuCaLETTeSVSzC','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 13:06:38','2019-06-10 13:06:38',NULL,NULL),(46,'aSDxas','asdxasxdasxas2@gjhSMX.com','$2y$10$0P0PK3ndXQQlFNRUiI8E6eBGENSZK/yAjiivM8aq4fqunXUMPlnpa','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 13:08:02','2019-06-10 13:08:02',NULL,NULL),(47,'aSDxas','asdxasxdasxas2@gjaShSMX.com','$2y$10$FIoihk0586KtB.xptHpx6uYSH469zcTwdku1A1tuxWlLd6ZE/mdtC','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 13:08:25','2019-06-10 13:08:25',NULL,NULL),(48,'aSDxas','asdxasxdasxas2@gjaShSMxxxX.com','$2y$10$1c0b5mbclMf36TehQvhVFemuZwplOD2F5VWnMP0mU/fglAyrdG4Py','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 13:31:15','2019-06-10 13:31:15',NULL,NULL),(49,'SDsddc','sdas@hwsj.xom','$2y$10$8tIxTTwEmz6xk7OD8fect.hIfCMbDibOMeBZiAQNb6wRAoJVtYxN6','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-10 14:12:33','2019-06-10 14:12:33',NULL,NULL),(51,'Tolet Digital Agency Ltd','info@gmail.com','$2y$10$g8SDwjHQoRrNdUS/81hsoemxAGY5/MUIsxvwtjYHjFbz21QU81IqK','+254723529662',1,NULL,0,0,0,NULL,NULL,NULL,'2019-06-11 06:44:18','2019-06-11 08:50:00',NULL,NULL),(52,'sxasxa','wambui.njagi@craftsilicon.com','$2y$10$SdJeQjezm6pvwR0gPsfcO.VadVAsfw2EPwpx9JJNz8b7LPvHekyQ2','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-18 10:17:33','2019-06-18 10:17:33',NULL,NULL),(53,'erferfer','tfghbjwesd@ghsd.com','$2y$10$le30JAAKq45yqkXPah2iZOLwQd2JtWgDZAHc6VaEAgWlJVRpBlkOK','+254721840501',NULL,NULL,0,0,0,NULL,NULL,NULL,'2019-06-28 07:44:16','2019-06-28 07:44:16',NULL,NULL);
/*!40000 ALTER TABLE `agents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complains`
--

DROP TABLE IF EXISTS `complains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tenant_id` int(10) unsigned NOT NULL,
  `complain` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressable_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `complains_addressable_type_addressable_id_index` (`addressable_type`,`addressable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complains`
--

LOCK TABLES `complains` WRITE;
/*!40000 ALTER TABLE `complains` DISABLE KEYS */;
INSERT INTO `complains` VALUES (2,1,'test 1','App\\Owner',1,'2019-02-03 09:30:36','2019-02-03 09:30:36'),(3,1,'np7yy','App\\Owner',1,'2019-02-18 14:43:31','2019-02-18 14:43:31'),(4,1,'test 3','App\\Agent',1,'2019-04-06 07:57:44','2019-04-06 07:57:44'),(5,1,'test 2','App\\Agent',1,'2019-05-09 21:53:26','2019-05-09 21:53:26');
/*!40000 ALTER TABLE `complains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property` varchar(100) DEFAULT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `payee` varchar(100) DEFAULT NULL,
  `details` varchar(200) DEFAULT NULL,
  `frequency` varchar(100) DEFAULT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `payment_method` varchar(100) DEFAULT NULL,
  `payment_reference` varchar(100) DEFAULT NULL,
  `addressable_id` varchar(100) DEFAULT NULL,
  `addressable_type` varchar(100) DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `approvedon` datetime DEFAULT NULL,
  `declinedon` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agent_id` varchar(20) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `duedate` datetime DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expenses`
--

LOCK TABLES `expenses` WRITE;
/*!40000 ALTER TABLE `expenses` DISABLE KEYS */;
INSERT INTO `expenses` VALUES (1,'1','1','dfgvbhjn','fjnk','4',200,'fcjnk','cfghbjnk','App\\Agent','1',NULL,NULL,NULL,'2019-01-30 09:45:21','2019-01-30 09:45:21','2019-01-24 07:13:58','1','',NULL,''),(2,'1','1','ghbjnk','fgvhjk','Quarterly',5153,'',NULL,NULL,NULL,NULL,NULL,NULL,'2019-01-25 07:42:06',NULL,'2019-01-25 07:42:06','','management fees','2019-01-25 00:00:00','DZD'),(3,'3','3','dcx','2532','Monthly',1,'',NULL,'19','App\\Owner',NULL,NULL,NULL,'2019-01-25 12:11:02',NULL,'2019-01-25 12:11:02','','Bank service charges','2019-01-19 00:00:00','DZD'),(4,'3','4','wedwa','sssssssss','Monthly',122,'',NULL,'19','App\\Owner',NULL,NULL,NULL,'2019-01-25 12:23:29',NULL,'2019-01-25 12:23:29','','insurance','2019-01-25 00:00:00','DZD'),(5,'3','3','22','wqs','Quarterly',22,'',NULL,'19','App\\Owner',NULL,NULL,NULL,'2019-01-25 12:25:00',NULL,'2019-01-25 12:25:00','','insurance','2019-01-12 00:00:00','GHS'),(6,'3','2','121','1212','Yearly',12,'Mobile payments','12','19','App\\Owner',NULL,NULL,NULL,'2019-01-30 09:45:05','2019-01-30 09:45:05','2019-01-25 12:40:50','1','license and permits','2019-01-26 00:00:00','DZD'),(7,'1','1','tolet','test 2','Weekly',4668,'Cash','jhfuj','1','App\\Owner',0,NULL,'2019-06-18 11:03:49','2019-06-18 11:03:49',NULL,'2019-01-26 10:25:49','1','insurance','2019-01-26 00:00:00','KES'),(8,'1','1','12312','121231','Weekly',2312,'Bank','12312','1','App\\Owner',1,'2019-05-29 15:54:04',NULL,'2019-05-29 16:14:22','2019-05-29 16:14:22','2019-01-30 12:37:31','1','management fees','2019-01-11 00:00:00','DZD'),(9,'1','6','oscar omole','test 1','Weekly',100,'Cheque','hjkkkfh23','1','App\\Vendor',1,'2019-06-18 11:03:55',NULL,'2019-06-18 11:03:55',NULL,'2019-02-06 13:50:35','1','Bank service charges','2019-02-06 00:00:00','DZD');
/*!40000 ALTER TABLE `expenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rental_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) DEFAULT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `paid` decimal(15,2) DEFAULT NULL,
  `balance` decimal(15,2) DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receipt_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoices_rental_id_month_year_unique` (`rental_id`,`month`,`year`),
  UNIQUE KEY `invoices_invoice_id_unique` (`invoice_id`),
  UNIQUE KEY `invoices_hash_unique` (`hash`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,'1000','0GjaGNS4efxgWaFVLUIl9MpwddUVMcGq',1,1,1,2019,2,NULL,'KES',15000.00,15000.00,0.00,'2019-01-26 11:36:43','CASH','Oscar Omole','cash',NULL,NULL,NULL,NULL,'2019-01-26 11:34:33','2019-01-26 11:36:43'),(6,'1001','O9bTTujcpxD96OrHe47UirxpYmS6eqT5',1,1,1,2019,3,NULL,'KES',15000.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-01-26 11:34:44','2019-01-26 11:34:44'),(7,'1002','Siwa4WV9qMtorCa9IX2hh3hNLoQZ2XKO',1,1,1,2019,4,NULL,'KES',16400.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-03-13 09:15:46','2019-03-13 09:15:46'),(8,'1003','4jQidcoE7UdkR5z0pSavYWvvifIxM3k2',1,1,1,2019,5,NULL,'KES',16400.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-04-02 12:21:08','2019-04-02 12:21:08'),(9,'1004','aKaHyrzuFUsenraWA6YtNya9I0TnWBbV',1,1,1,2019,6,NULL,'KES',31400.00,1400.00,30000.00,'2019-05-13 21:56:48','CASH','kings','qwerty',NULL,NULL,NULL,NULL,'2019-05-08 09:10:16','2019-05-13 21:56:48'),(10,'1005','yoPsj0ggMrUCbH4FzBhwGPmlZNfMgnq1',1,1,1,2019,7,NULL,'KES',30400.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-14 16:54:59','2019-05-14 16:54:59'),(11,'1006','1UWoKzr8AuPAmb7o5R5lFbQHKRKh94Pq',1,1,1,2019,8,NULL,'KES',30400.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-05-14 16:57:30','2019-05-14 16:57:30'),(100,'1007','AYgjsfYBisblLGZQQBvyfjsrX3sZ1ux7',1,1,1,2020,1,NULL,'KES',30400.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-06-18 10:59:53','2019-06-18 10:59:53');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listings`
--

DROP TABLE IF EXISTS `listings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_type_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `payment_options_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `land` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latlong` point DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_units` int(10) unsigned NOT NULL DEFAULT '0',
  `total_tenants` int(10) unsigned NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listings`
--

LOCK TABLES `listings` WRITE;
/*!40000 ALTER TABLE `listings` DISABLE KEYS */;
INSERT INTO `listings` VALUES (1,1,1,1,1,'Cool Breez Apartments','awd','KEN',NULL,NULL,'yellow',NULL,12,13,0,NULL,'2019-01-26 08:25:45','2019-06-18 09:15:48'),(2,1,2,1,1,'SHADES APARTMENTS',NULL,'KEN',NULL,NULL,NULL,NULL,0,0,NULL,'2019-02-18 14:40:51','2019-02-18 14:38:53','2019-02-18 14:40:51'),(3,2,3,1,1,'Maggi Villa Apartments','Ght346 kiambu','KEN',NULL,NULL,'purple',NULL,5,3,1,NULL,'2019-03-13 09:11:04','2019-06-18 17:18:17'),(4,1,1,1,1,'kjdsnkde','ede','KEN',NULL,NULL,'ede',NULL,0,0,NULL,'2019-05-01 10:44:13','2019-04-17 17:31:07','2019-05-01 10:44:13');
/*!40000 ALTER TABLE `listings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenances`
--

DROP TABLE IF EXISTS `maintenances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maintenances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `approved` int(11) DEFAULT NULL,
  `property` varchar(200) NOT NULL,
  `unit` varchar(200) NOT NULL,
  `maintenancetype` varchar(200) DEFAULT NULL,
  `duedate` datetime DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `cause` varchar(200) DEFAULT NULL,
  `addressable_type` varchar(200) DEFAULT NULL,
  `addressable_id` bigint(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `agent_id` bigint(100) DEFAULT NULL,
  `cost` varchar(100) NOT NULL,
  `fileurl` varchar(100) DEFAULT NULL,
  `approvedon` date DEFAULT NULL,
  `declinedon` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenances`
--

LOCK TABLES `maintenances` WRITE;
/*!40000 ALTER TABLE `maintenances` DISABLE KEYS */;
INSERT INTO `maintenances` VALUES (4,NULL,'3','3','Periodic Maintenance','2019-01-18 00:00:00','Repair','aaaaaa','Renters Fault','App\\Owner',19,'2019-01-17 09:22:57','2019-01-17 09:22:57',NULL,1,'',NULL,NULL,NULL),(5,NULL,'3','3','Periodic Maintenance','2019-01-19 00:00:00','Repair','aaaaaaaaa','Renters Fault','App\\Owner',19,'2019-01-17 10:12:16','2019-01-17 10:12:16',NULL,1,'',NULL,NULL,NULL),(6,NULL,'3','4','Periodic Maintenance','2019-01-26 00:00:00','Repair','aaaaaaaaaa','General Fault','App\\Owner',19,'2019-01-17 10:13:08','2019-01-17 10:13:08',NULL,1,'',NULL,NULL,NULL),(7,NULL,'1','1','Periodic Maintenance','2019-01-26 00:00:00','overhaul','sdcscsC','General Fault','App\\Owner',19,'2019-01-25 12:47:53','2019-01-25 12:47:53',NULL,1,'123',NULL,NULL,NULL),(8,0,'1','1','Preventive Maintenance','2019-01-26 00:00:00','Repair','test2','Renters Fault','App\\Owner',1,'2019-01-26 10:23:40','2019-06-15 14:04:52',NULL,1,'200',NULL,NULL,'2019-06-15'),(9,0,'1','1','Periodic Maintenance','2019-05-07 00:00:00','overhaul','qw, wlwldmledmkffmlmlmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmjjjjjjjjjjjjjjjjjj ejbefe','General Fault','App\\Vendor',3,'2019-05-07 08:05:23','2019-05-09 22:25:49',NULL,1,'3000',NULL,NULL,'2019-05-09');
/*!40000 ALTER TABLE `maintenances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (33,'2014_10_12_000000_create_users_table',1),(34,'2014_10_12_100000_create_password_resets_table',1),(35,'2018_06_07_063346_create_property_types_table',1),(36,'2018_06_13_081508_create_agents_table',1),(37,'2018_06_13_090757_create_owners_table',1),(38,'2018_06_13_091808_create_tenants_table',1),(39,'2018_06_14_091534_create_listings_table',1),(40,'2018_06_19_062856_create_rooms_table',1),(41,'2018_06_19_075616_create_room_types_table',1),(42,'2018_06_25_061519_create_rentals_table',1),(43,'2018_07_09_083533_create_accounts_table',1),(44,'2018_07_09_084648_create_periods_table',1),(45,'2018_08_06_125330_create_invoices_table',1),(46,'2018_09_26_052648_create_notifications_table',1),(47,'2018_09_26_063632_create_complains_table',1),(48,'2018_09_26_063632_create_tasks_table',1),(49,'2019_05_02_083716_create_payment_options_table',1),(50,'2019_05_06_202855_create_payment_types',2),(51,'2019_06_29_075642_create_accounts_table',0),(52,'2019_06_29_075642_create_agents_table',0),(53,'2019_06_29_075642_create_complains_table',0),(54,'2019_06_29_075642_create_expenses_table',0),(55,'2019_06_29_075642_create_invoices_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notices` (
  `move_date` date DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `addressable_type` varchar(100) DEFAULT NULL,
  `addressable_id` bigint(20) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `file` varchar(100) DEFAULT NULL,
  `nodeposit` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `createdby` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notices`
--

LOCK TABLES `notices` WRITE;
/*!40000 ALTER TABLE `notices` DISABLE KEYS */;
INSERT INTO `notices` VALUES ('2019-01-24','reason','App\\Agent',1,'commnet',NULL,1,'2019-01-02 07:52:44','2019-01-02 07:52:44',NULL,1,1,'0000-00-00 00:00:00'),('2019-01-22','this is the reason','App\\Owner',19,'this is the comment',NULL,1,'2019-01-02 07:54:48','2019-01-02 08:18:59',NULL,2,1,'2019-01-02 08:18:59'),('2019-01-02','another reason','App\\Agent',1,'another comment',NULL,1,'2019-01-02 08:01:00','2019-01-02 08:18:51',NULL,3,1,'2019-01-02 08:18:51'),('2019-01-02','another reason','App\\Agent',1,'another comment',NULL,1,'2019-01-02 08:01:38','2019-01-02 08:01:38',NULL,4,1,NULL);
/*!40000 ALTER TABLE `notices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
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
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_listings` int(10) unsigned NOT NULL DEFAULT '0',
  `total_units` int(10) unsigned NOT NULL DEFAULT '0',
  `total_tenants` int(10) unsigned NOT NULL DEFAULT '0',
  `isApproved` int(11) DEFAULT NULL,
  `suspended` int(11) DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alternative_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternative_phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addressable_id` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `addressable_type` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `agent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `owners_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
INSERT INTO `owners` VALUES (1,'wambui owner','wambui.njage@gmail.com','$2y$10$oRdn8vgpheKzqyQMlymWc.mmF3OxjKAS/fPOhBtP1X/FYwlOFGePW','0721840501','KEN',1,12,13,1,NULL,NULL,NULL,NULL,'2019-01-26 08:02:05','2019-06-18 09:15:48','wambui.njasge@gmail.com','0711840501',NULL,NULL,NULL,NULL),(2,'Oscar Omole','oscaromole@gmail.com','$2y$10$5pYkCzbzfyKcDWpEfPFefepd2BqDxcnTtwgpbCN5GPIe3VtCSNaBy','0723529662','KEN',0,0,0,NULL,NULL,NULL,NULL,NULL,'2019-01-26 11:29:34','2019-05-04 14:04:14','oscarndony@gmail.com','0723529662',NULL,NULL,NULL,NULL),(3,'Tolet Digital Agency Ltd','test2@gmail.com','$2y$10$ywd0KAcm/kw7ihd9gge4JOmMCINeIE8xYFXNuxDgjv5M07B3KEZlK','0723466676','KEN',1,5,3,NULL,NULL,NULL,NULL,NULL,'2019-03-13 09:08:56','2019-06-18 17:18:17','tolet@gmail.com','07345266277',NULL,NULL,NULL,NULL),(4,'JH morgan Properties','jh@gmail.com','$2y$10$6ba78eNrYtz1L0TYPaJ5fuGyIeR2ld5MN6iqAVm.HqDVwr5X46H.6','072345667128','KEN',0,0,0,NULL,NULL,NULL,NULL,NULL,'2019-06-13 14:45:04','2019-06-13 14:45:04','gh@nm.com','0783r537672',NULL,NULL,NULL,NULL),(5,'hello word','hello@hss.com','$2y$10$FONTzH5O.zD8TvcLkuKaD.bClfcEBGiXGyqsSeh/7ZqVzjkliVK5a','0721840501','KEN',0,0,0,NULL,NULL,NULL,NULL,NULL,'2019-06-28 11:54:28','2019-06-28 11:54:28','hello@hsss.com','0721870501',NULL,NULL,NULL,NULL),(6,'hello word','sadxasdas@ghas.com','$2y$10$sHetalHEuZ5ZJ2cwaomuA.48nbtjrKIJtv3A7/jlhyMAWXKWcg8Zq','0721840501','AZE',0,0,0,NULL,NULL,NULL,NULL,NULL,'2019-06-28 11:55:39','2019-06-28 11:55:39','asddddas@gths.com','0721840501',NULL,NULL,NULL,NULL),(7,'hello word','aSaxxsa@hs.com','$2y$10$KqMZSfvSTzCg2.sh3UUjb.A2EEsQJAGICmAo0OEN.wvM73PHOJ.z2','0721840501','BGD',0,0,0,NULL,NULL,NULL,NULL,NULL,'2019-06-28 12:19:00','2019-06-28 12:19:00','asghjbsdm@hsx.xxx','0721840501',NULL,NULL,NULL,NULL),(8,'hello word','asdEdfWSEw@jas.com','$2y$10$2RGuSHBby7etWMyziBvgL.6LNV51wtuqrx/VY0MpfQRGdF0FVyd4y','0721840501','BEL',0,0,0,NULL,NULL,NULL,NULL,NULL,'2019-06-28 12:30:39','2019-06-28 12:30:39','ghwjasjiklas@hjs.com','0721840501',NULL,NULL,NULL,NULL),(9,'sadcas','sxdasxas@ghas.com','$2y$10$R5p87B5R4w.8GikdZutL3OouTO8VmzNDM78jufkbLKLArcfg9wLvi','0721840501','BGD',0,0,0,NULL,NULL,NULL,NULL,NULL,'2019-06-28 12:32:52','2019-06-28 12:32:52','asfvjhas@hja.com','0721840501',NULL,NULL,NULL,NULL),(10,'hello word','sfsddsds@jhwsx.com','$2y$10$X.ZX.smG1qSaDKXYYy.v/eQS9gKaw9QANBxCApRJf73XV/XR3aur.','0721840501','BEN',0,0,0,NULL,NULL,NULL,NULL,NULL,'2019-06-28 12:35:15','2019-06-28 12:35:15','awygjbhasdn@gyjhwa.com','0721840501',NULL,NULL,NULL,NULL),(11,'sadcas','aaaa@ha.com','$2y$10$9bGIT6ox4YqQkxkFenIbDuOrPydnwVCZOPrpqVWnUz4TqP2L9Y0vO','0721840501','BDI',0,0,0,NULL,NULL,NULL,NULL,NULL,'2019-06-28 12:47:50','2019-06-28 12:47:50','assx@sm.com','0721840501',NULL,NULL,NULL,NULL),(12,'sadcas','ssssssssssss@jha.com','$2y$10$.6/I93helbEjwZNaGCcq8OjtM.nhMyYOi8bXvb6gB6AMz8sNLHcgW','0721840501','BEL',0,0,0,NULL,NULL,NULL,NULL,NULL,'2019-06-28 12:59:49','2019-06-28 12:59:49','SSGHJAS@HA.COM','0721840501',NULL,NULL,NULL,'1');
/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('wambui.njage@gmail.com','$2y$10$kgJBYeDdEFkxy8JCOrQ.pelmZomRvkM.iBHUQypxPKQxHiq3fhSme','2019-06-28 10:39:36');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_options`
--

DROP TABLE IF EXISTS `payment_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_options`
--

LOCK TABLES `payment_options` WRITE;
/*!40000 ALTER TABLE `payment_options` DISABLE KEYS */;
INSERT INTO `payment_options` VALUES (1,'Bank','Payment option through bank account',NULL,NULL),(2,'Mobile payments','Payment through mobile money',NULL,NULL),(3,'Online Payments','Payment through online platforms',NULL,NULL),(4,'Cheque','Payment through bank cheques',NULL,NULL);
/*!40000 ALTER TABLE `payment_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_types`
--

DROP TABLE IF EXISTS `payment_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_options_id` int(10) unsigned NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_types`
--

LOCK TABLES `payment_types` WRITE;
/*!40000 ALTER TABLE `payment_types` DISABLE KEYS */;
INSERT INTO `payment_types` VALUES (1,1,'Account Number',NULL,NULL),(2,2,'MPESA',NULL,NULL),(3,2,'AIRTEL MONEY',NULL,NULL),(4,3,'PAYPAL',NULL,NULL),(5,4,'Account Name',NULL,NULL);
/*!40000 ALTER TABLE `payment_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periods`
--

DROP TABLE IF EXISTS `periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `periods_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periods`
--

LOCK TABLES `periods` WRITE;
/*!40000 ALTER TABLE `periods` DISABLE KEYS */;
INSERT INTO `periods` VALUES (1,'Weekly',NULL,NULL,NULL),(2,'Monthly',NULL,NULL,NULL),(3,'Fortnight',NULL,NULL,NULL),(4,'Daily',NULL,NULL,NULL),(5,'Yealy',NULL,NULL,NULL),(6,'Quarterly',NULL,NULL,NULL),(7,'Once',NULL,'2019-05-08 10:36:33','2019-05-08 10:36:33');
/*!40000 ALTER TABLE `periods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `property_types`
--

DROP TABLE IF EXISTS `property_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `property_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `property_types`
--

LOCK TABLES `property_types` WRITE;
/*!40000 ALTER TABLE `property_types` DISABLE KEYS */;
INSERT INTO `property_types` VALUES (1,'Apartments/ Flats','Apartment',NULL,NULL,NULL),(2,'Office Space',NULL,NULL,NULL,NULL),(3,'Furnished Aparment',NULL,NULL,NULL,NULL),(4,'Masionette',NULL,NULL,NULL,NULL),(5,'Bungalow',NULL,NULL,NULL,NULL),(6,'Industrial Property',NULL,NULL,NULL,NULL),(7,'Penthouse/Cottages',NULL,NULL,NULL,NULL),(8,'Showrooms',NULL,NULL,NULL,NULL),(9,'Villa',NULL,NULL,NULL,NULL),(10,'Studios',NULL,NULL,NULL,NULL),(11,'Townhouse',NULL,NULL,NULL,NULL),(12,'Hostels',NULL,NULL,NULL,NULL),(13,'Hotel',NULL,NULL,NULL,NULL),(14,'Warehouse & Go Downs\r\n',NULL,NULL,NULL,NULL),(15,'Shopping Store',NULL,NULL,'2019-06-12 08:33:24','2019-06-12 08:33:24');
/*!40000 ALTER TABLE `property_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rentals`
--

DROP TABLE IF EXISTS `rentals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rentals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rentable_id` bigint(20) unsigned NOT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `agent_id` int(11) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `rental_to` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rentals_rentable_type_rentable_id_index` (`rentable_type`,`rentable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rentals`
--

LOCK TABLES `rentals` WRITE;
/*!40000 ALTER TABLE `rentals` DISABLE KEYS */;
INSERT INTO `rentals` VALUES (1,'App\\Room',1,1,1,1,NULL,NULL,'2019-01-26 08:41:20','2019-01-26 08:41:20'),(2,'App\\Room',2,NULL,1,NULL,'2019-01-26 11:01:55',NULL,'2019-01-26 11:01:48','2019-01-26 11:01:55'),(3,'App\\Room',10,1,1,NULL,NULL,NULL,'2019-05-08 08:26:44','2019-05-08 08:26:44'),(4,'App\\Room',8,1,1,NULL,NULL,NULL,'2019-05-08 08:27:22','2019-05-08 08:27:22'),(5,'App\\Room',16,12,1,NULL,NULL,NULL,'2019-06-18 08:43:15','2019-06-18 08:43:15'),(6,'App\\Room',17,13,1,NULL,NULL,NULL,'2019-06-18 08:45:49','2019-06-18 08:45:49'),(7,'App\\Room',17,14,1,NULL,NULL,NULL,'2019-06-18 08:57:28','2019-06-18 08:57:28'),(8,'App\\Room',9,15,1,NULL,NULL,NULL,'2019-06-18 08:58:19','2019-06-18 08:58:19'),(9,'App\\Room',17,16,1,NULL,NULL,NULL,'2019-06-18 08:59:14','2019-06-18 08:59:14'),(10,'App\\Room',17,17,1,NULL,NULL,NULL,'2019-06-18 09:07:06','2019-06-18 09:07:06'),(11,'App\\Room',13,18,1,NULL,NULL,NULL,'2019-06-18 09:08:41','2019-06-18 09:08:41'),(12,'App\\Room',17,19,1,NULL,NULL,NULL,'2019-06-18 09:13:00','2019-06-18 09:13:00'),(13,'App\\Room',17,20,1,NULL,NULL,NULL,'2019-06-18 09:14:35','2019-06-18 09:14:35'),(14,'App\\Room',17,21,1,NULL,NULL,NULL,'2019-06-18 09:15:13','2019-06-18 09:15:13'),(15,'App\\Room',17,22,1,NULL,NULL,NULL,'2019-06-18 09:15:48','2019-06-18 09:15:48'),(16,'App\\Room',13,23,1,NULL,NULL,NULL,'2019-06-18 10:43:39','2019-06-18 10:43:39'),(17,'App\\Room',19,23,1,NULL,NULL,NULL,'2019-06-18 17:18:17','2019-06-18 17:18:17');
/*!40000 ALTER TABLE `rentals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_types`
--

DROP TABLE IF EXISTS `room_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_types`
--

LOCK TABLES `room_types` WRITE;
/*!40000 ALTER TABLE `room_types` DISABLE KEYS */;
INSERT INTO `room_types` VALUES (1,'1 Bed Room',NULL,NULL,NULL,NULL),(2,'Bedsitter',NULL,NULL,NULL,NULL),(3,'2 Bedroom',NULL,NULL,NULL,NULL),(4,'Shopping Store',NULL,NULL,NULL,NULL),(5,'Office Space',NULL,NULL,NULL,'2019-04-30 15:44:42');
/*!40000 ALTER TABLE `room_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `listing_id` int(11) NOT NULL,
  `room_types_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_tenants` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,1,2,'h4','23',35400.00,1,NULL,'2019-01-26 08:27:59','2019-06-18 16:40:27'),(2,1,1,'413','1bd',0.00,0,'2019-05-01 11:28:42','2019-01-26 11:00:05','2019-05-01 11:28:42'),(3,1,2,'412','Bedsitter',200.00,0,NULL,'2019-01-26 12:51:05','2019-04-22 17:01:16'),(4,1,2,'401','bedsitter',0.00,0,NULL,'2019-02-04 16:11:44','2019-02-04 16:11:44'),(5,1,4,'j12 west wing','2000',12400.00,0,NULL,'2019-02-04 16:12:52','2019-05-08 07:29:01'),(6,1,4,'west wing j1','2400',0.00,0,NULL,'2019-02-04 16:13:18','2019-02-04 16:13:18'),(7,1,5,'east wing 2','2000',0.00,0,NULL,'2019-02-04 16:21:53','2019-02-04 16:21:53'),(8,1,2,'402','bedsitter',0.00,1,NULL,'2019-02-04 16:22:16','2019-05-08 08:27:22'),(9,1,4,'hjt12','1088',0.00,1,NULL,'2019-02-04 16:22:35','2019-06-18 08:58:19'),(10,1,3,'403','2brd',0.00,1,NULL,'2019-02-04 16:22:57','2019-05-08 08:26:44'),(11,1,4,'west r123','34500',0.00,0,NULL,'2019-02-04 16:23:15','2019-02-04 16:23:15'),(12,3,1,'413','1 Bedroom',0.00,0,'2019-05-01 11:29:08','2019-03-13 09:12:21','2019-05-01 11:29:08'),(13,3,1,'413','1Bdroom',0.00,2,NULL,'2019-04-24 15:18:32','2019-06-18 10:43:39'),(14,3,5,'west wing','2000',0.00,0,NULL,'2019-05-07 16:08:00','2019-05-07 16:08:00'),(15,3,5,'East Wing J2','1300',0.00,0,NULL,'2019-05-07 16:08:34','2019-05-07 16:08:34'),(16,1,1,'WEST WING J1','1BRD',0.00,1,NULL,'2019-05-08 07:58:33','2019-06-18 08:43:15'),(17,1,1,'west wing j4','200',10000.00,8,NULL,'2019-05-21 16:16:46','2019-06-25 07:35:32'),(18,3,1,'909','1bedroom',0.00,0,NULL,'2019-05-29 16:18:26','2019-05-29 16:18:26'),(19,3,4,'408/1','20900',0.00,1,NULL,'2019-06-18 17:17:10','2019-06-18 17:18:17');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tasktype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `priortylevel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addressable_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'1',NULL,'Administrative','2019-04-19 00:00:00','High','App\\Agent','1','wambui.njage@gmail.com','szxszx this is more',NULL,NULL,NULL,'2019-04-05 07:05:15','2019-04-05 07:58:33',NULL),(2,'1',NULL,'Administrative','2019-05-02 06:32:04','Medium','App\\Owner','1','wambui.njage@gmail.com','sxsxs',NULL,NULL,NULL,'2019-04-05 07:05:45','2019-05-02 06:32:04','2019-05-02'),(3,'1',NULL,'Maintance Request','2019-04-05 07:09:35','Normal','App\\Agent','1','wambui.njage@gmail.com','sXsXs',NULL,NULL,NULL,'2019-04-05 07:06:06','2019-04-05 07:09:35','2019-04-05'),(4,'1',NULL,'Maintance Request','2019-04-06 00:00:00','Medium','App\\Agent','1','wambui.njage@gmail.com','test 2 vjiuihuoijo  vhfguygug8 knoijojiouj v  bv h  crdtdrtdrtrdjh',NULL,NULL,NULL,'2019-04-05 15:13:50','2019-04-06 07:37:49',NULL),(5,'1',NULL,'Administrative','2019-04-06 00:00:00','Medium','App\\Agent','1','wambui.njage@gmail.com','collect check',NULL,NULL,NULL,'2019-04-06 07:51:30','2019-04-06 07:55:29',NULL),(6,'1',NULL,'Administrative','2019-04-12 00:00:00','Medium','App\\Owner','1','wambui.njage@gmail.com','test 3',NULL,NULL,NULL,'2019-04-12 05:59:54','2019-04-12 05:59:54',NULL),(7,'2',NULL,'Maintance Request','2019-05-10 12:05:07','Medium','App\\Vendor','3','wambui.njage@gmail.com','asxas',NULL,NULL,NULL,'2019-05-02 07:15:33','2019-05-02 07:15:33',NULL),(8,'10',NULL,'Administrative','2019-06-21 00:00:00','Medium','App\\Agent','1','wambui.njage@gmail.com','test',NULL,NULL,NULL,'2019-06-21 15:42:26','2019-06-21 15:42:26',NULL),(9,'16',NULL,'Maintance Request','2019-06-22 00:00:00','Medium','App\\Owner','3','wambui.njage@gmail.com','test 3',NULL,NULL,NULL,'2019-06-21 15:43:00','2019-06-21 15:43:00',NULL);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tenants`
--

DROP TABLE IF EXISTS `tenants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tenants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aphone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aemail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isApproved` int(11) DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `idnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profilepic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tenants_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tenants`
--

LOCK TABLES `tenants` WRITE;
/*!40000 ALTER TABLE `tenants` DISABLE KEYS */;
INSERT INTO `tenants` VALUES (1,'Wambui Tenant Njage','wambui.njage@gmail.com','$2y$10$P3w68M.4E94fcKkYsmbcWOLUxtxTVZMoDFYNmAFuD1IzbTcBqGmVu','0721840501','0711840501','wmbui.njage@gmail.com','KEN',1,NULL,NULL,NULL,NULL,'2019-01-26 08:41:20','2019-06-13 11:50:08','1235153','http://tolet-agency-wambuinjage.legacy.cs50.io/storage/tenantppic/1.png',''),(2,'asdxf','amaitsakingsley@gmail.com','$2y$10$NjtXhSTVYu5nPqXq7n2hCeEP4UqdlGSs1SErNQQoGrQT7v1OAHniW','0721840501','0721840301','amaitsakaaaingsley@gmail.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:13:15','2019-06-18 08:13:15','',NULL,NULL),(3,'asdxf','amaitsakinsssgsley@gmail.com','$2y$10$Ik2FO/owwPT8eeVaMdCU2Obcemz6DMxzjymuqEgVNmuSs6eNqdjNm','0721840501','0721840301','amaitsakaaaingsley@gmail.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:23:50','2019-06-18 08:23:50','',NULL,NULL),(4,'asdxf','amaitsakinsssgxxxsley@gmail.com','$2y$10$5/QPNDP4hj90F0KvnQw0I.ssCeJ0rIp9uyYoBI2a0uVSg/OIx3MIe','0721840501','0721840301','amaitsakaaaingsley@gmail.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:24:40','2019-06-18 08:24:40','',NULL,NULL),(5,'aas','sdxdcf@hgabssa.com','$2y$10$L7h9K3c.Q90sm1DSk8vfuu/emHmkI5OingfdMf5fjbxKzN8/X4OOi','0721840501','0721840501','asguijhkneasd@has.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:33:50','2019-06-18 08:33:50','',NULL,NULL),(6,'aas','sdxdcf@hgassbssa.com','$2y$10$35TOwWks1/ygSMr6Ri3MPO4nxoPfGYk7eyot1.QNo3oqenWPz7C/G','0721840501','0721840501','asguijhkneasd@has.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:34:24','2019-06-18 08:34:24','',NULL,NULL),(7,'aas','sdxdcf@hgassbssaaaaa.com','$2y$10$8RVtDXxngIQ8l3mvP5XGTeWM3HqzzWPb/Pjk.ZU78glHaKiXQncc.','0721840501','0721840501','asguijhkneasd@has.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:35:57','2019-06-18 08:35:57','',NULL,NULL),(8,'xcdszds','sssssss@hjsmbn.com','$2y$10$F7V4O9kReR8cHQXxGt5NlOCN5pYdWkmgrEjkQneWwnOdCs/p56wDi','0721840501','0721840501','tfugvybjknlmea@hbans.cm','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:37:23','2019-06-18 08:37:23','',NULL,NULL),(9,'xxxxxxxx','sdsd@ghas.com','$2y$10$9UcDprs3oafJDUR9QU.Lne8NSWWiwumKf.s8K9xlz7gtVbfikvv6.','0721840501','0721840501','daca@hiks.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:38:06','2019-06-18 08:38:06','',NULL,NULL),(10,'sZXsx','waasdcsfd@ghas.com','$2y$10$/ZPLIZrGlW4y.LzuaZuq.uKz.An8QB02lmzgPJI0oUjUIzJOg222S','0721840501','0721840501','qwtghvjbnmasd@ghbsn.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:40:07','2019-06-18 08:40:07','',NULL,NULL),(11,'sZXsx','waasdcsfd@ghas.comsss','$2y$10$86Ao4gma2Xjsl8KK7Dg9ceK.bRjBCCoA/9Uu8Vedzu/tr8KPe1cdG','0721840501','0721840501','qwtghvjbnmasd@ghbsn.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:41:53','2019-06-18 08:41:53','',NULL,NULL),(12,'scfgbjh','wesrdtfghj@tghasn.com','$2y$10$Dwyi4E1ZhbjCx630.4ur9OiJLa5.wfWXa5EQ6jyMf26AFLyfzhm8O','0721840501','0721840501','ertjhnkwased@ghas.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:43:15','2019-06-18 08:43:15','',NULL,NULL),(13,'sxdfcghbj','awedfrgh@fgbcvas.com','$2y$10$4N45fNumvC9c1h0tgucLq.kZEex8vj6T4lnB/NxL5sAoaEYXC05o.','0721840501','0721840501','drjhk@hjebs.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:45:49','2019-06-18 08:45:49','',NULL,NULL),(14,'fxcvxcfv','asdujhknsdm@ghs.com','$2y$10$k3ivloDEDE.pKtQQ8/SZ0.iQt4gIjcxJNg1CaBgGP1H2fpmWSJnd6','0721840501','0721840501','sayugbjhksdnk.d@hsdnm.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:57:28','2019-06-18 08:57:28','',NULL,NULL),(15,'serdfbjhnk','wesdfcsd@dcds.com','$2y$10$662X.28tcUwGXcj98G3Dw.ZmUDzXj9s0Sxc5XbWjMn1qsWrjJ8uQG','+254721840501','+254721840501','tfjhknsel@gasbn.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:58:19','2019-06-18 08:58:19','',NULL,NULL),(16,'dfgbjhkn','fgcbjhnk@hdjs.com','$2y$10$HiWr76HAXkpooILsWwUBouFhN7sZzb5uIZYmzUfPioE8yf2DqPtfW','0721840501','0721840501','fgcbsssjhnk@hdjs.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 08:59:14','2019-06-18 08:59:14','',NULL,NULL),(17,'xdfcgbjh','TFGBJHSD@GJEH.COM','$2y$10$izsbV93LzypxOsCkOHN0xu3QGUW4eNJtdlq48PuRImm4JK6d2T3MK','0721840500','0721840501','TYGHJBSEDM@GHANS.CO','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 09:07:06','2019-06-18 09:07:06',NULL,NULL,NULL),(18,'asxas','dtfjhbsmdncd@jhs.com','$2y$10$oZto0XeerAGGcVumQDO7XOgwwwB4niidyZ9rLJ/.r4f7b10oo4/Iq','0721840591','0721840501','tfuvjhbnmas@ghans.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 09:08:41','2019-06-18 09:08:41',NULL,NULL,NULL),(19,'sdfcse','sdfcdfv@tfgheja.com','$2y$10$CLrQJYZe1ti2qOPMdXn8jup0mPTNxJdwbrFGaQ8zTNE3Dkysnf/Ce','0721840501','0721840501','yufgbjhsd@hjas.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 09:13:00','2019-06-18 09:13:00',NULL,NULL,NULL),(20,'sdfcse','sdfcdfv@tfgheja.coms','$2y$10$akxlHh8hnmahkY.NbgRQb.o0XGpLKxeyVJ1Gbab7pn6U/JygzuZjK','0721840501','0721840501','yufgbjhsd@hjas.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 09:14:35','2019-06-18 09:14:35',NULL,NULL,NULL),(21,'sdfcse','sdfcdfv@tfgheja.comsfghj','$2y$10$B/abL7PpHJFxK0Adbm/SA.VP.zwLOQUCT0NHYeYHN/5mJxp8Zyu1e','0721840501','0721840501','yufgbjhsd@hjas.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 09:15:13','2019-06-18 09:15:13',NULL,NULL,NULL),(22,'sdfcse','sdfcdfv@tfghejcfgha.com','$2y$10$Ivrv9mCf6v.i36HjiMtG6.40h.N0ZuV9nvIzipQE2pSIA4dWSqeCC','0721840501','0721840501','yufgbjhsd@hjas.com','KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 09:15:48','2019-06-18 09:15:48',NULL,NULL,NULL),(23,'oscar omole','oscaromole@gmail.com','$2y$10$Th2nQnoRV6Q55aC2d6ao1.H9y6jEqLMYGHbF26fDV4UQiYeP5z/2W','0723529662','0706125125',NULL,'KEN',NULL,NULL,NULL,NULL,NULL,'2019-06-18 10:43:39','2019-06-18 10:43:39',NULL,NULL,NULL);
/*!40000 ALTER TABLE `tenants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isApproved` int(11) DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'Kingsley','amaitsakingsley@gmail.com','$2y$10$dANnNo4DPKdtlcGIahiWk.nIQf8z2ioQpFBIpfdu3cB4VAQGJ0OvK','+254721751366',NULL,NULL,NULL,NULL,NULL,'2019-05-22 18:55:23','2019-05-22 18:55:23'),(5,'kings','mangwels@outlook.com','$2y$10$KSKBxLLR4KxqyNmPS.pAKeyrN6kTwmqJr6XgjKwe2Uyyad63X8.bq','+254254721751366',NULL,NULL,NULL,NULL,'B7QZPwYJkL4BX05atL8okaxxb8DF7fPTgOdNKvfoN62oGYti5WRPpKZIK4Ch','2019-06-08 06:47:20','2019-06-08 06:47:20'),(6,'sxsx','sxa@ss.com','$2y$10$Jyp0BfcmrLQlBckFWoHV/OABDo463amn5nuzY4es20mkKyWP520DC','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 06:16:18','2019-06-10 06:16:18'),(7,'sxsx','sxa@sqqqs.com','$2y$10$4cXbA8nyiPynuj6HL9o0GOqm91KaeSZgY5Ic.fKNZXTCrLwPs3E1m','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 06:16:34','2019-06-10 06:16:34'),(8,'sxsx','sxa@saaqqqs.com','$2y$10$YjbXaJpALboeGkFZQiVT3.t6FVFU4JdAGCz8/tTnw7tuQ00fv2H6i','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 06:18:25','2019-06-10 06:18:25'),(9,'zdcda','sXsawedsx@jhnsk.com','$2y$10$i4enbegBCAJyJd1NVbt/iOwV9vp4IoGbOo.e0e3Kkr92wr3Phe8bi','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 06:47:27','2019-06-10 06:47:27'),(10,'zdcda','sXsawedxsx@jhnsk.com','$2y$10$s8xYCvA7t/cRWqODcf4hM.wNdPLEt/xSy1My.rLuSBNRM3m1GE5ee','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 06:58:34','2019-06-10 06:58:34'),(11,'sdcas','jdhscnsjd@hjs.com','$2y$10$tmrgRgYeztWtXMqbB.7o3uOhEzh/O4giIK30xv7lW2SUCFVdhpRm.','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 06:59:35','2019-06-10 06:59:35'),(12,'sdcas','jdhscnsjd@hjs.cosm','$2y$10$z4vkSNXQ1NdTo5r1w73hPeoOg./0qq5fGm8ISOsVI.f/Tr1SuLibm','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 07:01:42','2019-06-10 07:01:42'),(13,'sdcas','jdhscnsjd@hjs.cosms','$2y$10$efEK0CHEgp2Gv1erG00x.ux1YjH53rBCj.pck9dGQ/vYqltpcmi/y','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 07:02:02','2019-06-10 07:02:02'),(14,'dascs','asdcac@jbmsnxd.com','$2y$10$MKE32FFxfd6wlrMOqSFgG.o1FEGJBj..RpSbUFZCX4S1xnQCxHR/a','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 07:24:35','2019-06-10 07:24:35'),(15,'asasasa','asssadadss@hjskm.com','$2y$10$qiH16JY7NeyvAqZyLI06Ce1gAY5W93F/YPvjxatNaA2.j6MUoNZGy','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 07:33:00','2019-06-10 07:33:00'),(16,'asxsd','aedrfgtdrs@sjkd.com','$2y$10$c9Rq1ixjR.TqatnIfnuRFOHa7ibhMsPeSceO.CUxCD9HnJLqi36cK','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 07:53:10','2019-06-10 07:53:10'),(17,'xdfsd','asdxasd@jhsg.com','$2y$10$D43kWGawF6Qi.PCoejq0rOVsv0Aljq.hhzzjMizmanA9VxdcosvMy','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 08:03:34','2019-06-10 08:03:34'),(18,'asdsadas','asdse@jkhsdsd.com','$2y$10$D9G/ivybH/RW1p4t5azNTe4jFlmnb1cuFw3pAplN4oZBrEIFZZ.Pe','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 08:28:51','2019-06-10 08:28:51'),(19,'sdxsdxas','asxdaSDxas@jsd.com','$2y$10$c70cVfeGRrGNMF4VAVC15eUtrfFCDVYdA1fLwuG5TGfqGIvqyW5gy','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 08:40:26','2019-06-10 08:40:26'),(20,'John','jonh@mail.com','$2y$10$1QY03xIq2Eryny3JGdiLPujgFOnTNhYnbNOXcM3MoIejH1rswWjCi','+2540000000',NULL,NULL,NULL,NULL,'ADCpQUwa60WT2IrOFt70ohRnXcZObZL626yYvuxPWlT3JopbCS9vUkjYFWna','2019-06-10 08:45:32','2019-06-10 08:45:32'),(21,'John','peter@mail.com','$2y$10$.p7uCd4.3VqF55WB4lC1u.4pZGUSfwB.jeY4J/hC9B/Vb9ciqZzM.','+2540000000',NULL,NULL,NULL,NULL,NULL,'2019-06-10 08:50:27','2019-06-10 08:50:27'),(22,'aaaaaa','aaaaaaaaaaaa@jhsg.com','$2y$10$IE2DkUS/f0nmgSBAA3zEauQChNt.8dTclZlRzqssKJx/9Wk3lvlHq','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 08:58:39','2019-06-10 08:58:39'),(23,'aaaaaa','aaaaaaa1aaaaa@jhsg.com','$2y$10$.HHfk/yxWEBvIAW1sE.A3uljA2rcqAmpzIfEFtTTrmxG3bbePyv8K','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 08:58:59','2019-06-10 08:58:59'),(24,'aaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa@jhasmbd.com','$2y$10$cslIMc5Aw3U83V22FwgIme4GZYwntc7ObR3w/CkviRkVfAJfTMMKG','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 08:59:56','2019-06-10 08:59:56'),(25,'asdasds','asadasds@ajbsajks.com','$2y$10$pL7JF.yLKC9TqWRai3YXXu.t9FZDFMCIvOx247NJMU.B7uEqCvQim','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 09:06:16','2019-06-10 09:06:16'),(26,'fgxfd','fsddfdfsdf@ahs.com','$2y$10$raIlPPBuLFx670nXazg9aOv876NvVwYzA9qYxq06XLFYjiyVFHfXu','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 09:09:57','2019-06-10 09:09:57'),(27,'asdxasdas','asdasdas@jhsdg.com','$2y$10$aevEwE1wU5zS8E6fzxZukuUzLQyon7XSyP5dgkRpd9na71oPSmiMG','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 09:11:02','2019-06-10 09:11:02'),(28,'sdsdsad','zsdcads@jhsdgsd.com','$2y$10$kkHGqyyGFWqfxLp.F3fOx.3H4vNXJYSiClYWN3jSpqQ/si2MKw3qO','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 09:12:02','2019-06-10 09:12:02'),(33,'asaxs','dfadszcszdcd@hskbsa.cpm','$2y$10$N8A0cl4EqwLP7Y1k0IFdh./cI5j7miE4/MCDL4CtaPCw.FjMn7XrO','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 12:15:54','2019-06-10 12:15:54'),(34,'asaxs','dfadszcszdcd@hskbasa.cpm','$2y$10$1C7RtY41FIhsG/2QZirQ0.qyfv0QZJvGsWu0joj8RENOPlkcp84Q2','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 12:17:52','2019-06-10 12:17:52'),(35,'asaxs','dfadszcszdcd@hsskbasa.cpm','$2y$10$2AIX2kF9NJbPbDzua4kcY.ndMuVNcsVC.YR2W8mIW.kE9HkonxPhm','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 12:18:32','2019-06-10 12:18:32'),(36,'asaxs','dfadszcszdcd@hsskbaasa.cpm','$2y$10$QzZcetcn4bZ7/TKSo0tC1O513tP3KnDpkX91PgBzJyXG4QcN6VPDS','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 12:19:03','2019-06-10 12:19:03'),(37,'asdxas','aassssssssssss@ahja.com','$2y$10$Iogq.T.FtQ/7nMMMFcgKne7dH3mcM7H4xV0kTvJpz0VADo975Tuhe','+297721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 12:48:36','2019-06-10 12:48:36'),(38,'qqqqqqq','qqqqqq@gmail.com','$2y$10$hFH1VsxnYu3jmz5Psj.MUuL4JbZdui8PhHxgE4M7LXPpQwaU2N1lS','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 12:49:12','2019-06-10 12:49:12'),(39,'aaaaaa','aaaaaaaaa@jsas.com','$2y$10$Mrpxdt1yBMjnoc31QMlSc.8mYvOETEvLYVtbGCUQwW/riGx/ImBs.','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 12:52:41','2019-06-10 12:52:41'),(40,'aaaaaa','aqqqqqqqaaaaaaaa@jsas.com','$2y$10$Wh1C4CqTvn8H4mM8ssU20OkzELJzeoJE9JPl4w1U2yw2F2CYJCOFy','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 12:52:59','2019-06-10 12:52:59'),(41,'aaaaaa','aqqeadqqqqqssssaaaaaaaa@jsas.com','$2y$10$ie8onp1ePWYTh7sFD/q0E.J7sgwqm5xvvT./q6LFjL/ClFm3x8TBq','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 12:56:37','2019-06-10 12:56:37'),(42,'aaaaaa','aqqeadqqqqqssssaaaaaaaaaaaaa@jsas.com','$2y$10$z/0go79TO2s82gCflrd0UuOOPpwi7tBPsqLngslh5g3Nkj844F4t6','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 13:01:45','2019-06-10 13:01:45'),(43,'aaaaaa','aqqeadqqqqqssssaaaaaasaaaaaaaaa@jsas.com','$2y$10$5zWqC.2saWe0fMHqjlzeK.CAzyxj8FTsLbGzAKR9SJBW6TyF5NrMC','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 13:05:22','2019-06-10 13:05:22'),(44,'aaaaaa','aqqeadqqqqqssssaaaaaasaaaaaaaaaaaaaaaaaa@jsas.com','$2y$10$F1RM8FvUDCrUdlQaejrVO.pyd3RFtjfHu.lY47MBiYJYjv.KAKq1a','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 13:05:39','2019-06-10 13:05:39'),(45,'aaaaaa','aqqeadqqqqqssssaaaaasasaaaaaaaaaaaaaaaaaa@jsas.com','$2y$10$39U98QHqmGEcC5X5vK/EWuyN3.YB4GNKbQlbzsBOwEseVun7M4Q5q','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 13:06:38','2019-06-10 13:06:38'),(46,'aSDxas','asdxasxdasxas2@gjhSMX.com','$2y$10$OGBWGX8W8ZHNtNbPsaJgEO5PAVeZgVwMAqXCacrPjtBEX7XHGdOYi','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 13:08:02','2019-06-10 13:08:02'),(47,'aSDxas','asdxasxdasxas2@gjaShSMX.com','$2y$10$arMfglrxfAK8gjytn8ytCOkZD5KEDPHbG.etGlhoKnQgDaDkEwGeW','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 13:08:25','2019-06-10 13:08:25'),(48,'aSDxas','asdxasxdasxas2@gjaShSMxxxX.com','$2y$10$SPhSzaZKOcL8EMdUz8QZyO/H135V/lNuKSw03fM4L8qZse5vgRpt.','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 13:31:15','2019-06-10 13:31:15'),(49,'SDsddc','sdas@hwsj.xom','$2y$10$LGESX2MZzxvrADxHRIKWbeO9lIq9joQIiN0svZypzD9vEnNtFhfwS','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-10 14:12:33','2019-06-10 14:12:33'),(50,'wambui','wambui.njage@gmail.com','$2y$10$xwqxpZg0MEWHAnOShR3g5OBc0XkHKKY7mZoKjt1yZ3g.aliPIuxRi','+254721840501',NULL,NULL,NULL,NULL,NULL,'2019-06-11 06:13:19','2019-06-14 09:24:59'),(51,'Tolet Digital Agency Ltd','info@gmail.com','$2y$10$vAQG.ZCe3J51/UotaA5AyuexDRZ4/c7axb9BBSbPMzbPjpKoRjOIe','+254723529662',NULL,NULL,NULL,NULL,NULL,'2019-06-11 06:44:18','2019-06-11 06:44:18');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `alternative_email` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `serviceoffered` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `agent_id` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `approved` int(11) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'sxdcfsdzf','wambui.njage@gmail.com','0721840501','sxdads@sjxdn.com','electrician','Provide data for','KEN',NULL,'2019-04-05 12:56:11','2019-06-14 09:23:07','1',NULL,1,'$2y$10$yO4kM0wqCZMOsfZmTDNP/.iMc0f4jcKC92jotbaGvqF028EuQTk5O',''),(2,'sdscasdc','sdxasdx@dsdjk.com','0721840501','sdxs@sjhs.com','electrician','Provide data for','KEN','2019-04-11 11:52:13','2019-04-05 13:15:51','2019-04-11 11:52:13','1',NULL,NULL,'',''),(3,'rsrfrse','wambui.njassge@gmail.com','0721840501','dzc@sddx.com','plumber','Provide data for','KEN',NULL,'2019-04-05 13:23:02','2019-05-08 08:08:54','1',NULL,1,'$2y$10$ZfeUy0dUkv5cCtoVOtc4g.NPfEOcFxPBKVTyyEg3FJuSWOiR55w0u',''),(4,'oscar omole','oscaromole@gmail.com','0723529662','ndony@gmail.com','electrician','Provide data for','KEN','2019-04-11 10:03:57','2019-04-06 07:45:29','2019-04-11 10:03:57','1',NULL,NULL,'',''),(5,'erea','rfsre@fd.vom','0721840501','sedfse@sedf.com','plumber','Provide data for','KEN',NULL,'2019-04-11 11:27:17','2019-04-11 11:27:17','1',NULL,NULL,'',''),(6,'edsdcsdc','sxd@sx.com','0721840501','sxd@sx.coms','electrician','Provide data for','KEN',NULL,'2019-04-11 11:47:23','2019-05-08 07:54:54','1',NULL,1,'aQVKgz0amx',''),(7,'TEHBFGRGF','sxd@sx.comQQQQQ','0721840501','sxd@sx.comSSS','plumber','Provide data for','KEN',NULL,'2019-04-11 11:51:29','2019-04-11 11:51:29','1',NULL,NULL,'',''),(8,'sdcsd','wsdew@ghkdbjsx.com','0721840501','adca@dsxsd.com','security','Provide data for','KEN',NULL,'2019-04-11 11:55:32','2019-04-11 11:55:32','1',NULL,NULL,'',''),(9,'aSZA','Aszaw@WAS.SOCM','0721840501','ASWS@WS.COM','plumber','Provide data for','KEN',NULL,'2019-04-11 11:56:49','2019-05-08 07:01:49','1',NULL,1,'','');
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-29  8:01:20
