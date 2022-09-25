-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: rosestone
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'admins-create','Create Admins','Create Admins','2022-09-25 13:52:05','2022-09-25 13:52:05'),(2,'admins-read','Read Admins','Read Admins','2022-09-25 13:52:05','2022-09-25 13:52:05'),(3,'admins-update','Update Admins','Update Admins','2022-09-25 13:52:05','2022-09-25 13:52:05'),(4,'admins-delete','Delete Admins','Delete Admins','2022-09-25 13:52:05','2022-09-25 13:52:05'),(5,'users-create','Create Users','Create Users','2022-09-25 13:52:05','2022-09-25 13:52:05'),(6,'users-read','Read Users','Read Users','2022-09-25 13:52:05','2022-09-25 13:52:05'),(7,'users-update','Update Users','Update Users','2022-09-25 13:52:06','2022-09-25 13:52:06'),(8,'users-delete','Delete Users','Delete Users','2022-09-25 13:52:06','2022-09-25 13:52:06'),(9,'payments-create','Create Payments','Create Payments','2022-09-25 13:52:06','2022-09-25 13:52:06'),(10,'payments-read','Read Payments','Read Payments','2022-09-25 13:52:06','2022-09-25 13:52:06'),(11,'payments-update','Update Payments','Update Payments','2022-09-25 13:52:06','2022-09-25 13:52:06'),(12,'payments-delete','Delete Payments','Delete Payments','2022-09-25 13:52:06','2022-09-25 13:52:06'),(13,'profile-read','Read Profile','Read Profile','2022-09-25 13:52:06','2022-09-25 13:52:06'),(14,'profile-update','Update Profile','Update Profile','2022-09-25 13:52:06','2022-09-25 13:52:06'),(15,'categories-create','Create Categories','Create Categories','2022-09-25 13:52:06','2022-09-25 13:52:06'),(16,'categories-read','Read Categories','Read Categories','2022-09-25 13:52:06','2022-09-25 13:52:06'),(17,'categories-update','Update Categories','Update Categories','2022-09-25 13:52:07','2022-09-25 13:52:07'),(18,'categories-delete','Delete Categories','Delete Categories','2022-09-25 13:52:07','2022-09-25 13:52:07'),(19,'subcategories-create','Create Subcategories','Create Subcategories','2022-09-25 13:52:07','2022-09-25 13:52:07'),(20,'subcategories-read','Read Subcategories','Read Subcategories','2022-09-25 13:52:07','2022-09-25 13:52:07'),(21,'subcategories-update','Update Subcategories','Update Subcategories','2022-09-25 13:52:07','2022-09-25 13:52:07'),(22,'subcategories-delete','Delete Subcategories','Delete Subcategories','2022-09-25 13:52:07','2022-09-25 13:52:07'),(23,'products-create','Create Products','Create Products','2022-09-25 13:52:07','2022-09-25 13:52:07'),(24,'products-read','Read Products','Read Products','2022-09-25 13:52:07','2022-09-25 13:52:07'),(25,'products-update','Update Products','Update Products','2022-09-25 13:52:08','2022-09-25 13:52:08'),(26,'products-delete','Delete Products','Delete Products','2022-09-25 13:52:08','2022-09-25 13:52:08'),(27,'projects-create','Create Projects','Create Projects','2022-09-25 13:52:08','2022-09-25 13:52:08'),(28,'projects-read','Read Projects','Read Projects','2022-09-25 13:52:08','2022-09-25 13:52:08'),(29,'projects-update','Update Projects','Update Projects','2022-09-25 13:52:08','2022-09-25 13:52:08'),(30,'projects-delete','Delete Projects','Delete Projects','2022-09-25 13:52:08','2022-09-25 13:52:08'),(31,'blogs-create','Create Blogs','Create Blogs','2022-09-25 13:52:08','2022-09-25 13:52:08'),(32,'blogs-read','Read Blogs','Read Blogs','2022-09-25 13:52:08','2022-09-25 13:52:08'),(33,'blogs-update','Update Blogs','Update Blogs','2022-09-25 13:52:08','2022-09-25 13:52:08'),(34,'blogs-delete','Delete Blogs','Delete Blogs','2022-09-25 13:52:08','2022-09-25 13:52:08'),(35,'company-create','Create Company','Create Company','2022-09-25 13:52:08','2022-09-25 13:52:08'),(36,'company-read','Read Company','Read Company','2022-09-25 13:52:08','2022-09-25 13:52:08'),(37,'company-update','Update Company','Update Company','2022-09-25 13:52:09','2022-09-25 13:52:09'),(38,'company-delete','Delete Company','Delete Company','2022-09-25 13:52:09','2022-09-25 13:52:09'),(39,'partners-create','Create Partners','Create Partners','2022-09-25 13:52:09','2022-09-25 13:52:09'),(40,'partners-read','Read Partners','Read Partners','2022-09-25 13:52:09','2022-09-25 13:52:09'),(41,'partners-update','Update Partners','Update Partners','2022-09-25 13:52:09','2022-09-25 13:52:09'),(42,'partners-delete','Delete Partners','Delete Partners','2022-09-25 13:52:09','2022-09-25 13:52:09'),(43,'contacts-read','Read Contacts','Read Contacts','2022-09-25 13:52:09','2022-09-25 13:52:09'),(44,'contacts-delete','Delete Contacts','Delete Contacts','2022-09-25 13:52:09','2022-09-25 13:52:09'),(45,'contacts-create','Create Contacts','Create Contacts','2022-09-25 13:52:16','2022-09-25 13:52:16'),(46,'contacts-update','Update Contacts','Update Contacts','2022-09-25 13:52:16','2022-09-25 13:52:16'),(47,'module_1_name-create','Create Module_1_name','Create Module_1_name','2022-09-25 13:52:23','2022-09-25 13:52:23'),(48,'module_1_name-read','Read Module_1_name','Read Module_1_name','2022-09-25 13:52:23','2022-09-25 13:52:23'),(49,'module_1_name-update','Update Module_1_name','Update Module_1_name','2022-09-25 13:52:23','2022-09-25 13:52:23'),(50,'module_1_name-delete','Delete Module_1_name','Delete Module_1_name','2022-09-25 13:52:23','2022-09-25 13:52:23');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-25 17:54:55
