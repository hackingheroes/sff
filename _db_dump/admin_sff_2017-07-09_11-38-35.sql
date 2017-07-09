-- MySQL dump 10.13  Distrib 5.5.55, for Linux (x86_64)
--
-- Host: localhost    Database: admin_sff
-- ------------------------------------------------------
-- Server version	5.5.55

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
-- Current Database: `admin_sff`
--


--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fields` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `position` text NOT NULL,
  `status` varchar(15) NOT NULL,
  `type` varchar(25) NOT NULL,
  `city` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `starttime` varchar(100) NOT NULL,
  `endtime` varchar(100) NOT NULL,
  `last_modifier` bigint(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fields`
--

LOCK TABLES `fields` WRITE;
/*!40000 ALTER TABLE `fields` DISABLE KEYS */;
INSERT INTO `fields` VALUES (1,'Szkola Podstawowa nr 17','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.9378021026096!2d18.053149215299186!3d51.752460900577155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac5f581d220b5%3A0xe3a81317a3737cd7!2sSzko%C5%82a+Podstawowa+nr+17!5e0!3m2!1spl!2spl!4v1493395834416\" width=\"600\" height=\"450\" frameborder=\"0\"  allowfullscreen></iframe>','free','football','Kalisz','','1495791917','1495791917',2),(2,'Szkola podstawowa nr 10','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3494.0639222482305!2d18.077375243196588!3d51.7389558711635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spl!2spt!4v1493475779571\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','basketball','Kalisz','','1495217963','1495232363',0),(3,'Szkola Podstwowa nr 7','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.5910403662715!2d18.068220515417284!3d51.75880137967725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac58e9d0b2adf%3A0x330cc3fd1a671c2!2sSzko%C5%82a+Podstawowa+nr+7!5e0!3m2!1spl!2spt!4v1493476131885\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Kalisz','','1496011883','1496011883',2),(4,'Pola Marsowe','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d873.3405432397283!2d18.05376337700744!3d51.74803053240067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac5f7b6ae0981%3A0xe286f995b7680a4e!2sPola+Marsowe%2C+62-800+Kalisz%2C+Polska!5e0!3m2!1spl!2spt!4v1493476333884\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','basketball','Kalisz','','1495730529','1495730529',9),(5,'Orlik ul.Podmiejska','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.825396429894!2d18.059827615417113!3d51.75451627967653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac5f4cc9051e9%3A0xfd2589c2d6f1f8f6!2sStadion+Orlik!5e0!3m2!1spl!2spt!4v1493476667268\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Kalisz','','1495793808','1495793808',2),(16,'Parque de Jogos Rei Ramiro','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3004.9415225183266!2d-8.629538284895489!3d41.13580251951714!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd24653d2cffffff%3A0x59c565b1d05fdaab!2sParque+de+Jogos+Rei+Ramiro!5e0!3m2!1spl!2spl!4v1493552128440\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Gaia','','1495221710','1495225310',0),(6,'Orlik ul.Podmiejska','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.825396429894!2d18.059827615417113!3d51.75451627967653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac5f4cc9051e9%3A0xfd2589c2d6f1f8f6!2sStadion+Orlik!5e0!3m2!1spl!2spt!4v1493477109390\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','basketball','Kalisz','','1495219685','1495219685',0),(7,'Pola Marsowe ','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2470.2062782780904!2d18.052272515416764!3d51.747551479675344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac5f7b6ae0981%3A0xe286f995b7680a4e!2sPola+Marsowe%2C+62-800+Kalisz%2C+Polska!5e0!3m2!1spl!2spt!4v1493477322115\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Kalisz','','1496175279','1496175279',2),(8,'Szkola Podstawowa nr 7 ','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.5910403662715!2d18.068220515417284!3d51.75880137967725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac58e9d0b2adf%3A0x330cc3fd1a671c2!2sSzko%C5%82a+Podstawowa+nr+7!5e0!3m2!1spl!2spt!4v1493477531612\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','basketball','Kalisz','','1495220363','1495227563',0),(9,'Szkola Podstawowa nr 10','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2470.6630171122706!2d18.077101215416345!3d51.7391986796738!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac5dd622978d7%3A0x377bf58849077cd2!2sSzko%C5%82a+Podstawowa+nr+10!5e0!3m2!1spl!2spt!4v1493477709512\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Kalisz','','1495487147','1495501847',0),(10,'Orlik ul.Graniczna','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2476.813661082528!2d17.796092015774374!3d51.62662247965488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ab443ed74dd1d%3A0x526ee12e85357311!2sOrlik!5e0!3m2!1spl!2spt!4v1493546155814\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Ostrów Wielkopolski','','','2017-05-21 13:07',0),(11,'Orlik ul.Graniczna','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2476.813661082528!2d17.796092015774374!3d51.62662247965488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ab443ed74dd1d%3A0x526ee12e85357311!2sOrlik!5e0!3m2!1spl!2spt!4v1493546155814\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','basketball','Ostrów Wielkopolski','','1493680628','1493684228',0),(12,'Orlik','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4812.6257585186095!2d17.827574435251496!3d51.62644753839375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ab424361f2f09%3A0x417438bb5c09959f!2sBoisko+Orlik!5e0!3m2!1spl!2spt!4v1493546585632\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Ostrów Wielkopolski','','1495793585','1495797185',0),(13,'Orlik','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4812.6257585186095!2d17.827574435251496!3d51.62644753839375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ab424361f2f09%3A0x417438bb5c09959f!2sBoisko+Orlik!5e0!3m2!1spl!2spt!4v1493546585632\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','basketball','Ostrów Wielkopolski','','1495221629','1495225229',0),(14,'Vitalis Park','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1501.844090154913!2d-8.608236512235601!3d41.163154973181655!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9c9791707040d579!2sVitalis+Park+%2F+Antigo+Est%C3%A1dio+da+Constitui%C3%A7%C3%A3o!5e0!3m2!1spl!2spt!4v1493546815329\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Porto','','','2017-05-22 10:12',0),(15,'Estadio do Dragao','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3003.751659858593!2d-8.585779685021484!3d41.161769979285516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246502a2a20bf7%3A0x1ad7c8d540f6cbe8!2zRXN0w6FkaW8gZG8gRHJhZ8Ojbw!5e0!3m2!1spl!2spt!4v1493546932004\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Porto','','1495446730','1495446730',0),(17,'GaiaSoccer - Futebol Indoor','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3006.940986239915!2d-8.605785484896828!3d41.09213602220964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd247b105fb4b929%3A0x3d5209246a6fc553!2sGaiaSoccer+-+Futebol+Indoor!5e0!3m2!1spl!2spl!4v1493552382680\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Gaia','','1494879443','1494883043',0),(18,'Orlik na Majkowie ','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2468.834573809097!2d18.07979038271397!3d51.77263132296584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac5788c71eb5f%3A0x7c88229b3ada83cf!2sGimnazjum+nr+1+im.+Prymasa+Tysi%C4%85clecia!5e0!3m2!1spl!2spt!4v1493676485883\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Kalisz','Spoko boisko w milym sasiedztwie.','2017-05-30 21:12','2017-05-30 21:22',1),(19,'Orlik na Majkowie ','<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9874.934456192685!2d18.0815821!3d51.7744769!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7c88229b3ada83cf!2sGimnazjum+nr+1+im.+Prymasa+Tysi%C4%85clecia!5e0!3m2!1spl!2spl!4v1493824421151\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','basketball','Kalisz','Kozacko','1495221811','1495225411',0),(20,'IV Liceum Ogólnoksztalcace ','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2469.928790692212!2d18.063372515778948!3d51.75262567967609!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ac5f341b9cdd3%3A0xff19f96487a20a7a!2sIV+Liceum+Og%C3%B3lnokszta%C5%82c%C4%85ce+im.+Ignacego+Jana+Paderewskiego!5e0!3m2!1spl!2spl!4v1493835402555\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','free','football','Kalisz','Miejsce slynnych fakultetów. Mozna tu czesto spotkac Sebe.','1495412636','1495412636',0);
/*!40000 ALTER TABLE `fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `email` varchar(40) NOT NULL,
  `rank` varchar(30) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'filipek','filipek123','twoja@stara.pl','admin'),(2,'1mkmk','mkmk123','mkmaciek@onet.pl','admin'),(3,'test','test','dominik@hackingheroes.org','other'),(4,'sda','dsada','dsada@wp.pl','user'),(5,'sdasd','sdada','sdauisda@wp.pl','user'),(7,'1sda','dsdasda','sdasda@wp.pl','user'),(8,'sdasda','dsdasd','asdasdasda@wp.pl','user'),(9,'dominik','testtest','dominik@hackingheroes.org','user');
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

-- Dump completed on 2017-07-09  4:38:41

