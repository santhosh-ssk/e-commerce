-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: ecommerce
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `ADDRESS`
--

DROP TABLE IF EXISTS `ADDRESS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ADDRESS` (
  `addr_id` int(11) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(100) DEFAULT NULL,
  `street_name` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`addr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ADDRESS`
--

LOCK TABLES `ADDRESS` WRITE;
/*!40000 ALTER TABLE `ADDRESS` DISABLE KEYS */;
INSERT INTO `ADDRESS` VALUES (11,'no 8','bharthi nagar','t.nagar','600017'),(12,'No 8','Bharthi Nagar','T.Nagar','600017'),(13,'No 8','Bharthi Nagar','T.Nagar','600017'),(14,'No 8','Bharthi Nagar','T.Nagar','600017'),(15,'No 8','Bharthi Nagar','T.Nagar','600017'),(16,'No 8','Bharthi Nagar','T.Nagar','600017'),(17,'No 8','Bharthi Nagar','T.Nagar','600017'),(18,'No 8','Bharthi Nagar','T.Nagar','600017'),(19,'No 8','Bharthi Nagar','T.Nagar','600017'),(20,'No 8','Bharthi Nagar','T.Nagar','600017'),(21,'No 8','Bharthi Nagar','T.Nagar','600017'),(22,'No 8','Bharthi Nagar','T.Nagar','600017'),(23,'No 8','Bharthi Nagar','T.Nagar','600017'),(24,'No 8','Bharthi Nagar','T.Nagar','600017'),(25,'No 8','Bharthi Nagar','T.Nagar','600017'),(26,'No 8','Bharthi Nagar','T.Nagar','600017'),(27,'No 8','Bharthi Nagar','T.Nagar','600017'),(28,'No 8','Bharthi Nagar','T.Nagar','600017'),(29,'No 8','Bharthi Nagar','T.Nagar','600017'),(30,'12','qwerty street','chennai','600017'),(31,'No 8','Bharthi Nagar','T.Nagar','600017'),(32,'No 8','Bharthi Nagar','T.Nagar','600017'),(33,'No 8','Bharthi Nagar','T.Nagar','600017'),(34,'No 8','Bharthi Nagar','T.Nagar','600017'),(35,'No 8','Bharthi Nagar','T.Nagar','600017'),(36,'No 8','Bharthi Nagar','T.Nagar','600017'),(37,'No 8','Bharthi Nagar','T.Nagar','600017'),(38,'No 8','Bharthi Nagar','T.Nagar','600017'),(39,'No 8','Bharathi Nagar','chennai','600017'),(40,'No 8','Bharathi Nagar','chennai','600017'),(41,'No 8','Bharathi Nagar','chennai','600017'),(42,'No 8','Bharathi Nagar','chennai','600017');
/*!40000 ALTER TABLE `ADDRESS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BRAND`
--

DROP TABLE IF EXISTS `BRAND`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BRAND` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BRAND`
--

LOCK TABLES `BRAND` WRITE;
/*!40000 ALTER TABLE `BRAND` DISABLE KEYS */;
/*!40000 ALTER TABLE `BRAND` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BRAND_PRODUCT`
--

DROP TABLE IF EXISTS `BRAND_PRODUCT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BRAND_PRODUCT` (
  `brand_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  KEY `brand_id` (`brand_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `BRAND_PRODUCT_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `BRAND` (`brand_id`),
  CONSTRAINT `BRAND_PRODUCT_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `PRODUCT` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BRAND_PRODUCT`
--

LOCK TABLES `BRAND_PRODUCT` WRITE;
/*!40000 ALTER TABLE `BRAND_PRODUCT` DISABLE KEYS */;
/*!40000 ALTER TABLE `BRAND_PRODUCT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CATEGORY`
--

DROP TABLE IF EXISTS `CATEGORY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CATEGORY` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CATEGORY`
--

LOCK TABLES `CATEGORY` WRITE;
/*!40000 ALTER TABLE `CATEGORY` DISABLE KEYS */;
/*!40000 ALTER TABLE `CATEGORY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CATEGORY_MAP`
--

DROP TABLE IF EXISTS `CATEGORY_MAP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CATEGORY_MAP` (
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `sub_category_id` (`sub_category_id`),
  CONSTRAINT `CATEGORY_MAP_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `CATEGORY` (`category_id`),
  CONSTRAINT `CATEGORY_MAP_ibfk_2` FOREIGN KEY (`sub_category_id`) REFERENCES `SUB_CATEGORY` (`sub_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CATEGORY_MAP`
--

LOCK TABLES `CATEGORY_MAP` WRITE;
/*!40000 ALTER TABLE `CATEGORY_MAP` DISABLE KEYS */;
/*!40000 ALTER TABLE `CATEGORY_MAP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCT`
--

DROP TABLE IF EXISTS `PRODUCT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCT` (
  `prod_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text,
  `category` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `netweight` varchar(100) DEFAULT NULL,
  `mrpprice` varchar(100) DEFAULT NULL,
  `category_map_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `category_map_id` (`category_map_id`),
  CONSTRAINT `PRODUCT_ibfk_1` FOREIGN KEY (`category_map_id`) REFERENCES `CATEGORY_MAP` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCT`
--

LOCK TABLES `PRODUCT` WRITE;
/*!40000 ALTER TABLE `PRODUCT` DISABLE KEYS */;
/*!40000 ALTER TABLE `PRODUCT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCT_TAG`
--

DROP TABLE IF EXISTS `PRODUCT_TAG`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCT_TAG` (
  `tag_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  KEY `tag_id` (`tag_id`),
  KEY `prod_id` (`prod_id`),
  CONSTRAINT `PRODUCT_TAG_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `TAG` (`tag_id`),
  CONSTRAINT `PRODUCT_TAG_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `PRODUCT` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCT_TAG`
--

LOCK TABLES `PRODUCT_TAG` WRITE;
/*!40000 ALTER TABLE `PRODUCT_TAG` DISABLE KEYS */;
/*!40000 ALTER TABLE `PRODUCT_TAG` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SHOP`
--

DROP TABLE IF EXISTS `SHOP`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SHOP` (
  `shop_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `description` text,
  `phone` varchar(10) DEFAULT NULL,
  `addr_id` int(11) DEFAULT NULL,
  `is_auth` int(11) DEFAULT '0',
  `status` varchar(100) DEFAULT 'In Progress',
  PRIMARY KEY (`shop_id`),
  KEY `addr_id` (`addr_id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `SHOP_ibfk_2` FOREIGN KEY (`addr_id`) REFERENCES `ADDRESS` (`addr_id`),
  CONSTRAINT `SHOP_ibfk_3` FOREIGN KEY (`owner_id`) REFERENCES `USER` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SHOP`
--

LOCK TABLES `SHOP` WRITE;
/*!40000 ALTER TABLE `SHOP` DISABLE KEYS */;
INSERT INTO `SHOP` VALUES (6,'ABC',36,'ABC provides readymade children dresses','9900099000',41,1,'Accepted'),(7,'ABC',36,'ABC provides readymade children dresses','9900099000',42,0,'In Progress');
/*!40000 ALTER TABLE `SHOP` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SHOP_PRODUCT`
--

DROP TABLE IF EXISTS `SHOP_PRODUCT`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SHOP_PRODUCT` (
  `shop_id` int(11) DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `images` text,
  `discount_perc` float DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  KEY `prod_id` (`prod_id`),
  KEY `brand_id` (`brand_id`),
  KEY `shop_id` (`shop_id`),
  CONSTRAINT `SHOP_PRODUCT_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `PRODUCT` (`prod_id`),
  CONSTRAINT `SHOP_PRODUCT_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `BRAND` (`brand_id`),
  CONSTRAINT `SHOP_PRODUCT_ibfk_4` FOREIGN KEY (`shop_id`) REFERENCES `SHOP` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SHOP_PRODUCT`
--

LOCK TABLES `SHOP_PRODUCT` WRITE;
/*!40000 ALTER TABLE `SHOP_PRODUCT` DISABLE KEYS */;
/*!40000 ALTER TABLE `SHOP_PRODUCT` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUB_CATEGORY`
--

DROP TABLE IF EXISTS `SUB_CATEGORY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUB_CATEGORY` (
  `sub_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sub_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUB_CATEGORY`
--

LOCK TABLES `SUB_CATEGORY` WRITE;
/*!40000 ALTER TABLE `SUB_CATEGORY` DISABLE KEYS */;
/*!40000 ALTER TABLE `SUB_CATEGORY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TAG`
--

DROP TABLE IF EXISTS `TAG`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TAG` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TAG`
--

LOCK TABLES `TAG` WRITE;
/*!40000 ALTER TABLE `TAG` DISABLE KEYS */;
/*!40000 ALTER TABLE `TAG` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER`
--

DROP TABLE IF EXISTS `USER`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT 'user',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER`
--

LOCK TABLES `USER` WRITE;
/*!40000 ALTER TABLE `USER` DISABLE KEYS */;
INSERT INTO `USER` VALUES (35,'admin','$2y$10$JVUiOl/0cTpHnPBOpJr5b.YBM4TJbEt0L6IYZ80TYc2hdJK674QOa','admin@gmail.com','admin'),(36,'user','$2y$10$uoiJbnXJ4NxFCfp/gpcjc.6OTHsAd6B/hMEqJBAtOOSkHCKyctLka','user@gmail.com','user'),(45,'christopher daniel','$2y$10$2az1YGtH1.eN9rpfPpY3M.K1pU9rQ5NoXk43palZY2ttepfga0kRi','chris@mail.com','user'),(54,'user2','$2y$10$5kqjWu1TjZC4j1FgjboXDeZslNSM.EiwbVtyBa/Q7/lmmDDFLOFsS','user2@gmail.com','user');
/*!40000 ALTER TABLE `USER` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USER_TOKEN`
--

DROP TABLE IF EXISTS `USER_TOKEN`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USER_TOKEN` (
  `user_id` int(11) NOT NULL,
  `token` text NOT NULL,
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `USER_TOKEN_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `USER` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USER_TOKEN`
--

LOCK TABLES `USER_TOKEN` WRITE;
/*!40000 ALTER TABLE `USER_TOKEN` DISABLE KEYS */;
INSERT INTO `USER_TOKEN` VALUES (35,'0ad7bac02e5e5b273200a2be2bbbdd39'),(36,'0bf8d3b473494467317c62220cb34e36'),(45,'6fa7fa9af3491d06f5e7812c83df775f'),(54,'73a8ed62326495a00909636fd429f3d4');
/*!40000 ALTER TABLE `USER_TOKEN` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-30 23:06:37
