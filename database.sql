-- MySQL dump 10.13  Distrib 8.0.41, for Linux (x86_64)
--
-- Host: localhost    Database: webapp
-- ------------------------------------------------------
-- Server version	8.0.41-0ubuntu0.24.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(2000) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'hacking','posts about hacking'),(2,'general','general posts');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_tags` (
  `post_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_tags`
--

LOCK TABLES `post_tags` WRITE;
/*!40000 ALTER TABLE `post_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `post_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author_id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `publication_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Hacker','Yallah Haj Yashar',1,1,'2025-02-06 12:35:07'),(2,'Yallah ??','Yallah Haj Yashar',1,1,'2025-02-06 12:35:30'),(3,'Hacker','Pourya#2025-Feb-6',1,1,'2025-02-06 12:36:28'),(4,'Pourya#2025-Feb-6','',1,1,'2025-02-06 12:36:44'),(5,'<Img Src=OnXSS OnError=confirm(\"xss\")>','<Img Src=OnXSS OnError=confirm(\"xss\")>',1464,1,'2025-02-06 13:57:05');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `tag_id` int NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `bio` varchar(2000) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(32) DEFAULT NULL,
  `registration_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `token` (`token`)
) ENGINE=InnoDB AUTO_INCREMENT=1468 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'voorivex','y.shahinzadeh@gmail.com','Yashar','Shahinzadeh','Yallah, Haj yashar hoodi haye ma chid shod 😔 #owasp-zero-b','123qwe!@#QWE','920dba9f387a7505649c66560eb3833d','2023-09-16 14:19:59'),(2,'mamad','mamad@gmail.com',NULL,NULL,NULL,'mamad_secure','null','2023-09-16 15:15:48'),(3,'test1','test@test.com',NULL,NULL,NULL,'test',NULL,'2023-09-24 10:07:53'),(11,'test2','test2@gmail.com',NULL,NULL,NULL,'test2',NULL,'2023-09-24 10:37:26'),(12,'bTKt','',NULL,NULL,NULL,'Gsdk',NULL,'2023-09-25 18:59:06'),(1449,'moein','moeinefn@gmail.com',NULL,NULL,NULL,'nosafe','b268d93183a51579632d540bfe2ff5d7','2023-09-27 12:57:26'),(1452,'a','b',NULL,NULL,NULL,'0',NULL,'2023-10-01 16:19:05'),(1453,'mamad12321','mamad12321@gmail.com',NULL,NULL,NULL,'mamad12321',NULL,'2023-10-19 13:31:33'),(1454,'sos','sos@sos.com','\">','','\">','sos',NULL,'2023-10-27 10:24:55'),(1455,'sajjad.null','asdfsadf@gmail.com',NULL,NULL,NULL,'123qwe',NULL,'2025-02-06 11:36:29'),(1456,'VAHID','gerdwiesler1@gmail.com',NULL,NULL,NULL,'123456',NULL,'2025-02-06 11:36:41'),(1457,'hacker','hacker@gmail.com',NULL,NULL,NULL,'123456',NULL,'2025-02-06 11:42:14'),(1458,'\" order by 1000//','asda@gmail.com',NULL,NULL,NULL,'safda',NULL,'2025-02-06 12:31:35'),(1459,'uname','moz@gmail.com',NULL,NULL,NULL,'wename',NULL,'2025-02-06 12:35:33'),(1461,'yasharisthebest','ys@gmail.com',NULL,NULL,NULL,'yowasp11403',NULL,'2025-02-06 12:42:30'),(1462,'mamadhacker','mamadhacker@gmail.com',NULL,NULL,NULL,'123qwe!@#QWE',NULL,'2025-02-06 12:43:04'),(1463,'hoody','1231@gmail.com',NULL,NULL,NULL,'asdfasfda',NULL,'2025-02-06 12:46:35'),(1464,'hamoon0a','crypto3@gmail.com',NULL,NULL,NULL,'fuckinghell',NULL,'2025-02-06 13:03:35'),(1465,'sajjad_nul','sajjad@hoodi.com',NULL,NULL,NULL,'هوددددددییییی',NULL,'2025-02-06 13:04:28'),(1466,'test','example@gmail.com',NULL,NULL,NULL,'12345',NULL,'2025-02-06 13:41:39'),(1467,'I want a hoodie.','sajad@gmail.com',NULL,NULL,NULL,'sajad',NULL,'2025-02-06 13:44:23');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-06 13:57:48
