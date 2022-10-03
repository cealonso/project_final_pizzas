-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: login
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(64) NOT NULL,
  `email` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` char(2) DEFAULT 'SI',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'joel','5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5','joel@gmail.com','2022-07-06 23:23:50','SI'),(2,'pamela','d3a50c7f9a396c36afbcb87d0a3245b834f4c30dcfc3e67fdc428409fb264f40','pamela@gmail.com','2022-07-06 23:24:29','SI'),(3,'maria','8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','mariadb@gmail.com','2022-07-06 23:25:25','SI'),(4,'mario','b4728a4cdc82644eb648f4f4a26844e94557d56356b1b615c6698e81f7907601','mario@gmail.com','2022-07-11 21:36:17','SI'),(5,'marta','1559dc6836c651c9ddfe573694f48c116b9613542a2a7ccbbfde452560a18a1f','marta@gmail.com','2022-07-11 21:36:17','SI'),(6,'claudio','8cface989a3a91edb14989e82ff3ab67cfd3046906d0cee828f8882a8e137823','claudio@oracle.com','2022-08-03 23:10:03','SI');
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

-- Dump completed on 2022-09-28 20:45:02
