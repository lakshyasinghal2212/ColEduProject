-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: coledu
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `cid` varchar(100) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `discipline` varchar(100) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES ('CS-101','Data base management system','Computer Science/Information Technology','https://nptel.ac.in/courses/106105175','IIT Kharagpur','8 week'),('CS-102','Data Structures and Algorithms','Computer Science/Information Technology','https://nptel.ac.in/courses/106106127','IIT Madras','12 week'),('CS-103','Theory of Computation','Computer Science/Information Technology','https://nptel.ac.in/courses/106104148','IIT Kanpur','8 week'),('CS-104','Computer Networks and Internet Protocol','Computer Science/Information Technology','https://nptel.ac.in/courses/106105183','IIT Kharagpur','12 week'),('CS-105','Computer architecture and organization','Computer Science/Information Technology','https://nptel.ac.in/courses/106105163','IIT Kharagpur','12 week'),('CS-106','Operating System Fundamentals','Computer Science/Information Technology','https://nptel.ac.in/courses/106105214','IIT Kharagpur','12 week'),('CS-107','Compiler Design','Computer Science/Information Technology','https://nptel.ac.in/courses/106106237','IIT Madras','13 week'),('CS-108','Algorithms: Design and Analysis','Computer Science/Information Technology','https://nptel.ac.in/courses/106106131','IIT Madras','8 week'),('CS-109','Digital Logic','Computer Science/Information Technology','https://nptel.ac.in/courses/106108099','IISc Bangalore','8 lecture'),('CS-110','Engineering Mathematics - I','Computer Science/Information Technology','https://nptel.ac.in/courses/111105121','IIT Kharagpur','12 week'),('CS-111','Engineering Mathematics - II','Computer Science/Information Technology','https://nptel.ac.in/courses/111105134','IIT Kharagpur','12 week');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Discipline` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration`
--

LOCK TABLES `registration` WRITE;
/*!40000 ALTER TABLE `registration` DISABLE KEYS */;
INSERT INTO `registration` VALUES (1,'MANISH KUMAR','7231857665','mk2614708@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','Computer Science/Information Technology');
/*!40000 ALTER TABLE `registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `takes`
--

DROP TABLE IF EXISTS `takes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `takes` (
  `id` int DEFAULT NULL,
  `cid` varchar(100) DEFAULT NULL,
  KEY `id` (`id`),
  KEY `cid` (`cid`),
  CONSTRAINT `takes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `registration` (`id`),
  CONSTRAINT `takes_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `takes`
--

LOCK TABLES `takes` WRITE;
/*!40000 ALTER TABLE `takes` DISABLE KEYS */;
INSERT INTO `takes` VALUES (1,'CS-101'),(1,'CS-102'),(1,'CS-108'),(1,'CS-107'),(1,'CS-105'),(1,'CS-104');
/*!40000 ALTER TABLE `takes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-21 11:39:45
