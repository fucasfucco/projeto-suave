-- MySQL dump 10.13  Distrib 8.0.25, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: seller
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sellers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `totalAmmount` int DEFAULT NULL,
  `address` json DEFAULT NULL,
  `sellerComission` int NOT NULL,
  `shipping` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `creationDate` datetime NOT NULL,
  `description` text,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellers`
--

LOCK TABLES `sellers` WRITE;
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
INSERT INTO `sellers` VALUES (1,'sellerExample',91,'{\"CEP\": \"99300-00\", \"city\": \"Soledade\", \"state\": \"Rio Grande do Sul\", \"number\": \"562\", \"street\": \"João Provin\", \"district\": \"Ipiranga\"}',23,'sedex','enabled','2021-06-07 19:24:39','this seller hasn\'t any description',0),(3,'Lucas Gois da Silva',0,'{\"CEP\": \"asfasfas\", \"city\": \"asfasfas\", \"state\": \"asfasfasf\", \"number\": \"2\", \"street\": \"sadasdas\", \"district\": \"asdasdasd\"}',2,'asdasdas','sasdasd','2021-06-09 15:19:41','asdas',0),(6,'sellerExample',0,'{\"CEP\": \"99300-00\", \"city\": \"Soledade\", \"state\": \"Rio Grande do Sul\", \"number\": \"562\", \"street\": \"João Provin\", \"district\": \"Ipiranga\"}',23,'sedex','enabled','2021-06-09 15:27:04','this seller hasn\'t any description',0),(7,'sellerExample',0,'{\"CEP\": \"99300-00\", \"city\": \"Soledade\", \"state\": \"Rio Grande do Sul\", \"number\": \"562\", \"street\": \"João Provin\", \"district\": \"Ipiranga\"}',23,'sedex','enabled','2021-06-09 15:27:04','this seller hasn\'t any description',0),(9,'sellerExample',0,'{\"CEP\": \"99300-00\", \"city\": \"Soledade\", \"state\": \"Rio Grande do Sul\", \"number\": \"562\", \"street\": \"João Provin\", \"district\": \"Ipiranga\"}',23,'sedex','enabled','2021-06-09 15:27:05','this seller hasn\'t any description',0),(10,'sellerExample',0,'{\"CEP\": \"99300-00\", \"city\": \"Soledade\", \"state\": \"Rio Grande do Sul\", \"number\": \"562\", \"street\": \"João Provin\", \"district\": \"Ipiranga\"}',23,'sedex','enabled','2021-06-09 15:27:06','this seller hasn\'t any description',0),(11,'sellerExample',0,'{\"CEP\": \"99300-00\", \"city\": \"Soledade\", \"state\": \"Rio Grande do Sul\", \"number\": \"562\", \"street\": \"João Provin\", \"district\": \"Ipiranga\"}',23,'sedex','enabled','2021-06-09 15:27:06','this seller hasn\'t any description',0),(12,'sellerExample',0,'{\"CEP\": \"99300-00\", \"city\": \"Soledade\", \"state\": \"Rio Grande do Sul\", \"number\": \"562\", \"street\": \"João Provin\", \"district\": \"Ipiranga\"}',23,'sedex','enabled','2021-06-09 15:27:07','this seller hasn\'t any description',0),(13,'sellerExample',0,'{\"CEP\": \"99300-00\", \"city\": \"Soledade\", \"state\": \"Rio Grande do Sul\", \"number\": \"562\", \"street\": \"João Provin\", \"district\": \"Ipiranga\"}',23,'sedex','enabled','2021-06-09 15:27:07','this seller hasn\'t any description',0),(14,'sellerExample',0,'{\"CEP\": \"99300-00\", \"city\": \"Soledade\", \"state\": \"Rio Grande do Sul\", \"number\": \"562\", \"street\": \"João Provin\", \"district\": \"Ipiranga\"}',23,'sedex','enabled','2021-06-09 15:27:08','this seller hasn\'t any description',0),(15,'sellerExample',0,'{\"CEP\": \"99300-00\", \"city\": \"Soledade\", \"state\": \"Rio Grande do Sul\", \"number\": \"562\", \"street\": \"João Provin\", \"district\": \"Ipiranga\"}',23,'sedex','enabled','2021-06-09 15:27:08','this seller hasn\'t any description',0);
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-28 20:51:00
