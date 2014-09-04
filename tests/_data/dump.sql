-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: homestead
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credentials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `service_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credentials`
--

LOCK TABLES `credentials` WRITE;
/*!40000 ALTER TABLE `credentials` DISABLE KEYS */;
INSERT INTO `credentials` VALUES (1,'Annetta Graham','sam46','IS9s&0n','Necessitatibus nesciunt ullam sapiente et et. Provident voluptas exercitationem aut ad consequatur illo. Ipsa excepturi dignissimos consequatur et atque dignissimos.','2014-09-04 03:43:51','2014-09-04 03:43:51'),(2,'Breana Breitenberg','chadd65','YE5v0Tl#h|RAn^K>Z$','Necessitatibus earum aut aut sunt quis qui voluptatem. Voluptas minima qui dignissimos recusandae. Eius esse tempore doloribus nihil quidem quos. Tempora labore fuga enim molestiae.','2014-09-04 03:43:51','2014-09-04 03:43:51'),(3,'Prof. Duncan Barton','kertzmann.avery','H\"C44\'','Eos cum et doloribus ullam. Et dolores esse dicta sequi.\nEt sit quam a dignissimos et. Error velit neque perspiciatis ut.','2014-09-04 03:43:51','2014-09-04 03:43:51'),(4,'Ms. Camila Wisoky','osimonis','=N*b*MX','Asperiores reiciendis deleniti impedit et asperiores. Accusamus ut et velit impedit ea accusantium. Debitis harum nisi possimus fugit adipisci. Vero necessitatibus et voluptatem nostrum est.','2014-09-04 03:43:51','2014-09-04 03:43:51'),(5,'Timmothy Bahringer I','teagan.simonis','!NT2EouLkK}%_gRl','Omnis adipisci dolores expedita alias asperiores sed sint. Quisquam quae blanditiis corporis quasi placeat. Omnis quas voluptas eaque aut distinctio sapiente asperiores.','2014-09-04 03:43:51','2014-09-04 03:43:51'),(6,'Mr. Jett Balistreri','garrick94','_W09no+J;V84\\','Ea in quas vitae. Ea voluptatem rerum eius error enim expedita. Laborum dicta quis enim accusamus nisi et et.','2014-09-04 03:43:51','2014-09-04 03:43:51'),(7,'Gina Parisian PhD','romaine.murphy','Pq]:B>','Et aut ut eum ad nihil doloremque. Odio et non soluta earum velit harum sequi. Modi itaque facilis exercitationem dolor nobis aut voluptatem.','2014-09-04 03:43:51','2014-09-04 03:43:51'),(8,'Lexus Batz','hayden67','n[,.D26`NftZ','Nobis sunt aspernatur autem repellat voluptas ducimus. Qui et tenetur magni similique. Incidunt voluptatibus quos minima porro.','2014-09-04 03:43:51','2014-09-04 03:43:51'),(9,'Prof. Russel Kohler II','leon.kulas','J/S%<PJJz#VO{S*','Sit qui temporibus labore mollitia quo ratione non nihil. Dolorem dolorem eos quia eos reprehenderit accusantium. Modi aut doloribus est occaecati quia in error qui.','2014-09-04 03:43:51','2014-09-04 03:43:51'),(10,'Marcus Tromp','colt99','Sc@[?ad?ce49yJ','Officia incidunt rem officiis veritatis quibusdam ex. Quis quisquam quia harum ea nihil maxime expedita. Perspiciatis non et ut in.','2014-09-04 03:43:51','2014-09-04 03:43:51');
/*!40000 ALTER TABLE `credentials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Users','{\"users\":1}','2014-09-04 03:43:51','2014-09-04 03:43:51'),(2,'Admins','{\"admin\":1,\"users\":1}','2014-09-04 03:43:51','2014-09-04 03:43:51');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marketingretainers`
--

DROP TABLE IF EXISTS `marketingretainers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marketingretainers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hours` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `strategist_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_manager_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domain` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marketingretainers`
--

LOCK TABLES `marketingretainers` WRITE;
/*!40000 ALTER TABLE `marketingretainers` DISABLE KEYS */;
INSERT INTO `marketingretainers` VALUES (1,'Thiel-Maggio','20','1','1','gibsoncollier.com','2014-09-04 03:43:51','2014-09-04 03:43:51'),(2,'Christiansen-Bechtelar','20','1','1','mooremurray.info','2014-09-04 03:43:51','2014-09-04 03:43:51'),(3,'Skiles, Spencer and Bauch','20','1','1','runteleannon.com','2014-09-04 03:43:51','2014-09-04 03:43:51'),(4,'Kuhn-Schimmel','20','1','1','graham.com','2014-09-04 03:43:51','2014-09-04 03:43:51'),(5,'Hayes-Lowe','20','1','1','ernserruecker.com','2014-09-04 03:43:51','2014-09-04 03:43:51'),(6,'Wilkinson-Jakubowski','20','1','1','franecki.org','2014-09-04 03:43:51','2014-09-04 03:43:51'),(7,'Leannon, Donnelly and Schmidt','20','1','1','altenwerth.com','2014-09-04 03:43:51','2014-09-04 03:43:51'),(8,'Schmitt-Stark','20','1','1','blanda.org','2014-09-04 03:43:51','2014-09-04 03:43:51'),(9,'Beer Group','20','1','1','lesch.com','2014-09-04 03:43:51','2014-09-04 03:43:51'),(10,'Bernhard Inc','20','1','1','nader.net','2014-09-04 03:43:51','2014-09-04 03:43:51');
/*!40000 ALTER TABLE `marketingretainers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2012_12_06_225921_migration_cartalyst_sentry_install_users',1),('2012_12_06_225929_migration_cartalyst_sentry_install_groups',1),('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot',1),('2012_12_06_225988_migration_cartalyst_sentry_install_throttle',1),('2014_09_03_122737_create_organizations_table',1),('2014_09_03_123223_create_supportcontracts_table',1),('2014_09_03_123413_create_marketingretainers_table',1),('2014_09_03_123738_create_credentials_table',1),('2014_09_03_130607_create_people_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizations`
--

DROP TABLE IF EXISTS `organizations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organizations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agency_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salesperson_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_manager_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizations`
--

LOCK TABLES `organizations` WRITE;
/*!40000 ALTER TABLE `organizations` DISABLE KEYS */;
INSERT INTO `organizations` VALUES (1,'RocketFuel','88 Union Ave','7th Floor','Memphis','TN','38103','(901) 522-0205','','','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(2,'Ladarius Robel PhD','707 Demetrius Shore Apt. 370','Apt. 780','Rossborough','ND','10055-3788','989.586.3716x2587','','','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(3,'Mr. Giovanny Corkery V','831 Tara Pine Suite 887','Apt. 321','Naderhaven','UT','93049','184-891-4032','','','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(4,'Athena Ledner','5999 Lind Mount Apt. 271','Suite 665','East Myrl','SC','48073','953-721-7301x404','','','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(5,'Neva Hudson','80688 Melissa Place','Suite 907','North Mathias','MN','64111-7727','05967546923','','','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(6,'Thalia Murray','947 Wilford Loaf Suite 428','Suite 440','West Litzy','IN','12750','(366)790-1544x066','','','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(7,'Simone Smith','42493 Wyman Parkway','Apt. 382','Bayerton','SC','69172-9787','(346)328-9913x013','','','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(8,'Prof. Miller Feeney IV','88229 Nigel Well','Suite 809','Lake Alveraview','AR','31304','633.384.9274x5263','','','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(9,'Barney Rohan','532 Frami Crossing Apt. 364','Suite 756','Sanfordfurt','NJ','22453-1428','1-185-408-7564x5971','','','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(10,'Maryjane Davis','9891 Turcotte Freeway','Apt. 928','New Jeremyland','VT','27871','1-224-760-4957','','','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(11,'Miss Leonie Koss V','75840 Anika Road','Apt. 107','New Savanna','HI','91960','1-280-364-5220x6425','','','','2014-09-04 03:43:51','2014-09-04 03:43:51');
/*!40000 ALTER TABLE `organizations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `organization_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `office_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'Joe Ferguson','1','88 Union Ave','7th Floor','Memphis','TN','38103','(901) 522-0205','(901) 949-8986','joe@gorocketfuel.com','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(2,'Laurie Wiza','2','60377 Kuphal Keys Apt. 088','Suite 181','North Heberport','TX','19118','767.981.5661x7240','(276)138-8994x699','wflatley@kassulkepredovic.com','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(3,'Bud Kovacek Jr.','2','625 Thiel Islands Suite 412','Apt. 018','South Celestino','MT','64915-2885','(462)778-7678','052.057.3812x11412','elian19@cruickshank.com','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(4,'Jan Funk','2','2278 Monroe Port Suite 764','Apt. 211','East Nickolasborough','CO','30519-4647','00767038069','1-281-780-6267x6618','oceane41@gaylord.com','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(5,'Mr. Logan Kuhn Jr.','2','3427 Flatley Falls','Apt. 220','North Gastonton','DC','94850','638-277-8684x67030','(717)260-8750x612','leuschke.fabiola@hotmail.com','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(6,'Vincent Parisian IV','2','35089 Sarah Ridge Suite 382','Suite 931','Port Bert','DE','57314-3802','1-562-671-6321x8707','1-839-337-5688x4635','harris.nils@gmail.com','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(7,'Prof. Clementine Sauer','2','554 Lauriane Points','Suite 156','Ernserton','NE','93007-8982','(178)582-2245','1-350-489-0726x185','elenora.renner@hotmail.com','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(8,'Mrs. Daphne Erdman Jr.','2','53414 Senger Inlet','Apt. 233','New Prudence','IL','97868','+66(1)1644165239','855-187-3678','americo73@klein.com','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(9,'Russell Dietrich','2','861 Gladyce Ways','Apt. 912','Rodstad','GA','37361-9005','+01(2)2311300088','220-966-9090x65191','merlin.reilly@terry.com','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(10,'Daisy Berge','2','04519 Ayla Garden Suite 016','Suite 613','South Kaya','FL','89542','(544)124-8125x026','(178)549-5766','salvatore.bergnaum@yahoo.com','','2014-09-04 03:43:51','2014-09-04 03:43:51'),(11,'Dominic Becker','2','187 Breitenberg Flat','Apt. 990','O\'Connellchester','NH','89459-9517','(740)780-4150x050','785-648-1043','princess.feil@hotmail.com','','2014-09-04 03:43:51','2014-09-04 03:43:51');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supportcontracts`
--

DROP TABLE IF EXISTS `supportcontracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supportcontracts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hours` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `designer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `developer_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `platform` text COLLATE utf8_unicode_ci NOT NULL,
  `domain` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supportcontracts`
--

LOCK TABLES `supportcontracts` WRITE;
/*!40000 ALTER TABLE `supportcontracts` DISABLE KEYS */;
INSERT INTO `supportcontracts` VALUES (1,'Davis-Luettgen','20','0000-00-00','0000-00-00','1','1','Veniam autem tempore et fugit sed. Voluptas quia quibusdam facere porro officia sed. Vero officia modi ratione magnam voluptas ex est. Dolorem aut et eos repudiandae rerum.','botsford.com','2014-09-04 03:43:51','2014-09-04 03:43:51'),(2,'Bosco Inc','20','0000-00-00','0000-00-00','1','1','Asperiores et inventore at. Atque voluptatibus omnis nihil quidem. Consectetur explicabo aut quia qui. Ut voluptate aut harum qui animi et.','lakinanderson.net','2014-09-04 03:43:51','2014-09-04 03:43:51'),(3,'Pacocha Inc','20','0000-00-00','0000-00-00','1','1','Vel exercitationem dolor et sit inventore qui. Repellat facere quibusdam ea non facilis et non nostrum. Exercitationem autem et nihil ut consequuntur.','turnercollier.com','2014-09-04 03:43:51','2014-09-04 03:43:51'),(4,'Dooley-Schneider','20','0000-00-00','0000-00-00','1','1','Alias quo quia aspernatur sint voluptatum laudantium molestiae. Eum aliquid voluptatum quasi ab animi.','considine.org','2014-09-04 03:43:51','2014-09-04 03:43:51'),(5,'Predovic PLC','20','0000-00-00','0000-00-00','1','1','Quod ex excepturi odit omnis ducimus. Magnam qui quae non eos corrupti ullam dignissimos. Perferendis aut voluptatem magni ipsum illum est inventore. Fuga quia fuga quam ratione fugiat.','mueller.com','2014-09-04 03:43:51','2014-09-04 03:43:51'),(6,'Zulauf-Lesch','20','0000-00-00','0000-00-00','1','1','Corporis eos mollitia ex qui omnis non. Magnam qui sapiente consequatur atque aperiam voluptatem molestias. Veniam et exercitationem ut possimus. Ut doloribus ratione amet rerum.','monahanortiz.info','2014-09-04 03:43:51','2014-09-04 03:43:51'),(7,'Pollich and Sons','20','0000-00-00','0000-00-00','1','1','Facere qui ducimus fugiat accusamus. Dolores ut veniam quidem aut. Aliquid similique aut qui reprehenderit non illo et.','whitehand.info','2014-09-04 03:43:51','2014-09-04 03:43:51'),(8,'Bailey-Goyette','20','0000-00-00','0000-00-00','1','1','Quia ullam aut ab quis molestias maiores. Ipsam dolores dicta officiis ullam consequatur deserunt consequatur. Nihil cum quia voluptate et nemo sit odit.','wiegandbatz.com','2014-09-04 03:43:51','2014-09-04 03:43:51'),(9,'Gleason Inc','20','0000-00-00','0000-00-00','1','1','Molestias corporis qui possimus accusantium et natus. Atque quas aut officiis dolores ipsum. Non pariatur est magni et.','okuneva.info','2014-09-04 03:43:51','2014-09-04 03:43:51'),(10,'Connelly, McGlynn and Orn','20','0000-00-00','0000-00-00','1','1','Fugiat adipisci non animi quis cupiditate et. Rerum voluptas consequuntur sunt quibusdam beatae. Magnam vel esse vero harum quis. Placeat aut veniam vel illum quia temporibus atque sunt.','lesch.com','2014-09-04 03:43:51','2014-09-04 03:43:51');
/*!40000 ALTER TABLE `supportcontracts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `throttle`
--

LOCK TABLES `throttle` WRITE;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@admin.com','admin','$2y$10$ukGHjR5JwDlwYhScNOLeXeOVpMyNhUwXuqu3I7TbPsleRNmJeR2uK',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-09-04 03:43:51','2014-09-04 03:43:51'),(2,'user@user.com','','$2y$10$ELevYWIffg3DwdzmRk9HPuYwadGwdSCrCXB7X1QDkHQCGnEN20gwK',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2014-09-04 03:43:51','2014-09-04 03:43:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1),(1,2),(2,1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-04  3:44:29
