CREATE DATABASE  IF NOT EXISTS `nigeria` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `nigeria`;
-- MySQL dump 10.13  Distrib 8.0.16, for macos10.14 (x86_64)
--
-- Host: 127.0.0.1    Database: nigeria
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ahe_examiners`
--

DROP TABLE IF EXISTS `ahe_examiners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ahe_examiners` (
  `id_examiner` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(45) DEFAULT NULL,
  `date_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fl_act` varchar(1) NOT NULL,
  PRIMARY KEY (`id_examiner`),
  UNIQUE KEY `id_examiner_UNIQUE` (`id_examiner`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='- wszyscy egzaminatorzy';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ahe_logs`
--

DROP TABLE IF EXISTS `ahe_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ahe_logs` (
  `id_tech` int(11) NOT NULL,
  `operation` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL COMMENT '- status (zlecone, w trakcie , zakończone ok, zakończone blad) [‘Z’,’I’,’O’,B’]',
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `date_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tech`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='- logi operacji';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ahe_modules`
--

DROP TABLE IF EXISTS `ahe_modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ahe_modules` (
  `id_module` int(11) NOT NULL AUTO_INCREMENT,
  `modul_name` varchar(255) DEFAULT NULL,
  `date_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fl_act` varchar(1) NOT NULL,
  PRIMARY KEY (`id_module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='- wszystkie moduły, słownik';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ahe_reports`
--

DROP TABLE IF EXISTS `ahe_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ahe_reports` (
  `id_tech` int(11) NOT NULL,
  `id_gen` int(11) DEFAULT NULL,
  `id_record` int(11) DEFAULT NULL,
  `id_template` int(11) DEFAULT NULL,
  `report_record` varchar(45) DEFAULT NULL,
  `date_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tech`),
  KEY `id_template_fk_idx` (`id_template`),
  CONSTRAINT `id_template_fk` FOREIGN KEY (`id_template`) REFERENCES `ahe_reports_template` (`id_tech`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='- wygenerowane wyniki wybranego raportu';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ahe_reports_template`
--

DROP TABLE IF EXISTS `ahe_reports_template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ahe_reports_template` (
  `id_tech` int(11) NOT NULL,
  `id_template` int(11) DEFAULT NULL,
  `template_select` varchar(45) DEFAULT NULL,
  `date_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fl_act` varchar(1) NOT NULL,
  PRIMARY KEY (`id_tech`),
  KEY `id_template` (`id_template`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='- szablony raportów (zapytania sparametryzowane)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ahe_students`
--

DROP TABLE IF EXISTS `ahe_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ahe_students` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(45) DEFAULT NULL,
  `index_id` int(11) DEFAULT NULL,
  `index_number` int(11) DEFAULT NULL,
  `date_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fl_act` varchar(1) NOT NULL,
  PRIMARY KEY (`id_student`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='- wszyscy studenci, słownik';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ahe_students_cards`
--

DROP TABLE IF EXISTS `ahe_students_cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ahe_students_cards` (
  `id_tech` int(11) NOT NULL AUTO_INCREMENT,
  `id_student` int(11) DEFAULT NULL,
  `id_subject` int(11) DEFAULT NULL,
  `id_examiner` int(11) DEFAULT NULL,
  `realization_semestr` varchar(45) DEFAULT NULL,
  `rating` DECIMAL(2,1) DEFAULT NULL,
  `add_info` varchar(45) DEFAULT NULL,
  `progress` int(11) DEFAULT NULL,
  `date_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fl_act` varchar(1) NOT NULL,
  PRIMARY KEY (`id_tech`),
  KEY `id_student_fk_idx` (`id_student`),
  KEY `id_subject_fk_idx` (`id_subject`),
  KEY `id_examiner_fk_idx` (`id_examiner`),
  CONSTRAINT `id_examiner_fk` FOREIGN KEY (`id_examiner`) REFERENCES `ahe_examiners` (`id_examiner`),
  CONSTRAINT `id_student_fk` FOREIGN KEY (`id_student`) REFERENCES `ahe_students` (`id_student`),
  CONSTRAINT `id_subject_fk` FOREIGN KEY (`id_subject`) REFERENCES `ahe_subjects` (`id_subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='- zaimportowane karty studentów';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ahe_subjects`
--

DROP TABLE IF EXISTS `ahe_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ahe_subjects` (
  `id_subject` int(11) NOT NULL AUTO_INCREMENT,
  `id_module` int(11) DEFAULT NULL,
  `subject_name` varchar(45) DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL COMMENT '(kod przedmiotu), nie robimy maski – tylko string',
  `form` varchar(2) DEFAULT NULL COMMENT '(forma  zajęć) [  ‘Ć’, ‘L’, ‘P’, ‘PZ’, ‘S’ ,’SO’, ‘W’, ‘WA’]',
  `settlement` varchar(1) DEFAULT NULL COMMENT 'settlement (sposób rozliczania) [‘E’,’Z’]',
  `date_mod` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fl_act` varchar(1) NOT NULL,
  PRIMARY KEY (`id_subject`),
  KEY `id_module_fk_idx` (`id_module`),
  CONSTRAINT `id_module_fk` FOREIGN KEY (`id_module`) REFERENCES `ahe_modules` (`id_module`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='- wszystkie przedmioty, słownik';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-02 21:42:36
