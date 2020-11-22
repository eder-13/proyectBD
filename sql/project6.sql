-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: project6
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `CodA` varchar(5) NOT NULL,
  `nameA` varchar(30) DEFAULT NULL,
  `CodCC` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`CodA`),
  KEY `CodCC` (`CodCC`),
  CONSTRAINT `area_ibfk_1` FOREIGN KEY (`CodCC`) REFERENCES `centroc` (`CodCC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
INSERT INTO `area` VALUES ('A001','Inf','CC01'),('A002','Contabilidad','CC01'),('A003','Relaciones Exteriores','CC02');
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banco`
--

DROP TABLE IF EXISTS `banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banco` (
  `CodB` varchar(5) NOT NULL,
  PRIMARY KEY (`CodB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco`
--

LOCK TABLES `banco` WRITE;
/*!40000 ALTER TABLE `banco` DISABLE KEYS */;
INSERT INTO `banco` VALUES ('B001');
/*!40000 ALTER TABLE `banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `centroc`
--

DROP TABLE IF EXISTS `centroc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `centroc` (
  `CodCC` varchar(5) NOT NULL,
  `nameCC` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`CodCC`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `centroc`
--

LOCK TABLES `centroc` WRITE;
/*!40000 ALTER TABLE `centroc` DISABLE KEYS */;
INSERT INTO `centroc` VALUES ('CC01','Costo1'),('CC02','randomName');
/*!40000 ALTER TABLE `centroc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `date`
--

DROP TABLE IF EXISTS `date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `date` (
  `date` date NOT NULL,
  `weekstart` date DEFAULT NULL,
  `ind` char(1) DEFAULT NULL,
  PRIMARY KEY (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `date`
--

LOCK TABLES `date` WRITE;
/*!40000 ALTER TABLE `date` DISABLE KEYS */;
INSERT INTO `date` VALUES ('2020-10-10','2020-10-05','F'),('2020-11-16','2020-11-16','X'),('2020-11-17','2020-11-16','X'),('2020-11-18','2020-11-16','X'),('2020-11-19','2020-11-16','X'),('2020-11-20','2020-11-16','X'),('2020-11-22','2020-11-16','D'),('2020-11-29','2020-11-16','D');
/*!40000 ALTER TABLE `date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horasextras`
--

DROP TABLE IF EXISTS `horasextras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horasextras` (
  `costoHExtra` int(2) DEFAULT NULL,
  `cantHExtra` int(2) NOT NULL,
  PRIMARY KEY (`cantHExtra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horasextras`
--

LOCK TABLES `horasextras` WRITE;
/*!40000 ALTER TABLE `horasextras` DISABLE KEYS */;
INSERT INTO `horasextras` VALUES (0,0),(10,1),(10,2),(10,3),(15,4),(15,5),(20,6),(20,7);
/*!40000 ALTER TABLE `horasextras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obrero`
--

DROP TABLE IF EXISTS `obrero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obrero` (
  `CodO` varchar(5) NOT NULL,
  `nameO` varchar(30) DEFAULT NULL,
  `lastnameO` varchar(30) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `CodA` varchar(5) DEFAULT NULL,
  `CodB` varchar(5) DEFAULT NULL,
  `nroCuenta` varchar(20) NOT NULL,
  PRIMARY KEY (`CodO`),
  KEY `CodA` (`CodA`),
  KEY `CodB` (`CodB`),
  CONSTRAINT `obrero_ibfk_1` FOREIGN KEY (`CodA`) REFERENCES `area` (`CodA`),
  CONSTRAINT `obrero_ibfk_2` FOREIGN KEY (`CodB`) REFERENCES `banco` (`CodB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obrero`
--

LOCK TABLES `obrero` WRITE;
/*!40000 ALTER TABLE `obrero` DISABLE KEYS */;
INSERT INTO `obrero` VALUES ('O001','Juan','Perez','1990-11-17','A001','B001','4567-1234-1234'),('O002','Pedro','Ramos','1995-12-03','A001','B001','1111-2222-3333'),('O003','Alicia','Smith','1987-11-20','A001','B001','1234-6577-2343'),('O004','David','Escariz','1985-11-19','A002','B001','2344-6142-4191');
/*!40000 ALTER TABLE `obrero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajo`
--

DROP TABLE IF EXISTS `trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajo` (
  `min` int(5) DEFAULT NULL,
  `horasExtras` int(2) DEFAULT NULL,
  `CodO` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `CodT` varchar(5) NOT NULL,
  PRIMARY KEY (`CodO`,`date`,`CodT`),
  KEY `date` (`date`),
  KEY `CodT` (`CodT`),
  CONSTRAINT `trabajo_ibfk_1` FOREIGN KEY (`CodO`) REFERENCES `obrero` (`CodO`),
  CONSTRAINT `trabajo_ibfk_2` FOREIGN KEY (`date`) REFERENCES `date` (`date`),
  CONSTRAINT `trabajo_ibfk_3` FOREIGN KEY (`CodT`) REFERENCES `turno` (`CodT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajo`
--

LOCK TABLES `trabajo` WRITE;
/*!40000 ALTER TABLE `trabajo` DISABLE KEYS */;
INSERT INTO `trabajo` VALUES (10,0,'O001','2020-11-17','T001'),(5,0,'O001','2020-11-18','T003'),(5,2,'O002','2020-11-18','T002'),(3,0,'O002','2020-11-19','T001'),(5,4,'O002','2020-11-29','T001'),(0,0,'O003','2020-11-17','T002'),(20,3,'O004','2020-11-20','T003'),(10,7,'O004','2020-11-22','T001');
/*!40000 ALTER TABLE `trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turno` (
  `CodT` varchar(5) NOT NULL,
  `costoT` int(3) DEFAULT NULL,
  PRIMARY KEY (`CodT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES ('T001',10),('T002',12),('T003',14);
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-22 18:38:37
