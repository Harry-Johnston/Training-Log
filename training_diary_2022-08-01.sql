# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.38)
# Database: training_diary
# Generation Time: 2022-08-01 15:01:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table training_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `training_log`;

CREATE TABLE `training_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `exercise` varchar(500) NOT NULL DEFAULT '',
  `difficulty` varchar(100) DEFAULT NULL,
  `weight_added_kg` int(255) DEFAULT NULL,
  `comments` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `training_log` WRITE;
/*!40000 ALTER TABLE `training_log` DISABLE KEYS */;

INSERT INTO `training_log` (`id`, `date`, `exercise`, `difficulty`, `weight_added_kg`, `comments`)
VALUES
	(1,'2022-07-10','Max Hang','Hard',50,'What a tough session, glad to get back on it'),
	(2,'2022-07-10','Repeater','Easy',10,'easy, dont know why i even bother doing this'),
	(3,'2022-07-10','Bar Core','Moderate',NULL,'painful way to end the session but it feels good to get on it'),
	(4,'2022-04-16','Max Hang','Hard',35,NULL),
	(5,'2022-04-16','Board Session','Hard',NULL,'Brought the violence, fired the rig.'),
	(6,'2022-06-29','Board Session','Hard',NULL,'Why am i so weak!?!');

/*!40000 ALTER TABLE `training_log` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
