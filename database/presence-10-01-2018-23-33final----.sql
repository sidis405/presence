# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: presence
# Generation Time: 2018-01-10 22:33:01 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table doors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `doors`;

CREATE TABLE `doors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `doors` WRITE;
/*!40000 ALTER TABLE `doors` DISABLE KEYS */;

INSERT INTO `doors` (`id`, `name`, `slug`, `created_at`, `updated_at`)
VALUES
	(1,'Front Door','front-door','2018-01-10 21:06:53','2018-01-10 21:06:53'),
	(2,'Back Door','back-door','2018-01-10 21:07:01','2018-01-10 21:07:01');

/*!40000 ALTER TABLE `doors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table employees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_movement_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;

INSERT INTO `employees` (`id`, `name`, `slug`, `avatar`, `last_movement_id`, `created_at`, `updated_at`)
VALUES
	(1,'Kris Moen','kris-moen','https://lorempixel.com/100/100/?47179',9,'2018-01-10 21:50:12','2018-01-10 22:06:42'),
	(2,'Christophe Harber','christophe-harber','https://lorempixel.com/100/100/?38421',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(3,'Rhoda Huels III','rhoda-huels-iii','https://lorempixel.com/100/100/?51420',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(4,'Prof. Leonard Jacobi','prof-leonard-jacobi','https://lorempixel.com/100/100/?80406',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(5,'Miss Kathlyn Graham','miss-kathlyn-graham','https://lorempixel.com/100/100/?54223',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(6,'Ebba Trantow','ebba-trantow','https://lorempixel.com/100/100/?29392',11,'2018-01-10 21:50:12','2018-01-10 22:06:43'),
	(7,'Lesley Beatty V','lesley-beatty-v','https://lorempixel.com/100/100/?45783',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(8,'Hyman Moen PhD','hyman-moen-phd','https://lorempixel.com/100/100/?45121',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(9,'Jaeden Ward','jaeden-ward','https://lorempixel.com/100/100/?80999',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(10,'Opal Hoeger Sr.','opal-hoeger-sr','https://lorempixel.com/100/100/?55098',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(11,'Ali Breitenberg','ali-breitenberg','https://lorempixel.com/100/100/?42196',7,'2018-01-10 21:50:12','2018-01-10 22:06:39'),
	(12,'Miss Laury Emard','miss-laury-emard','https://lorempixel.com/100/100/?37795',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(13,'Dangelo Sipes','dangelo-sipes','https://lorempixel.com/100/100/?92828',8,'2018-01-10 21:50:12','2018-01-10 22:06:41'),
	(14,'Mrs. Jailyn Legros','mrs-jailyn-legros','https://lorempixel.com/100/100/?33427',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(15,'Jennie O\'Reilly','jennie-oreilly','https://lorempixel.com/100/100/?71803',NULL,'2018-01-10 21:50:12','2018-01-10 21:50:12'),
	(16,'Karine Buckridge DVM','karine-buckridge-dvm','https://lorempixel.com/100/100/?79181',10,'2018-01-10 21:50:12','2018-01-10 22:06:43');

/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2018_01_10_205103_create_doors_table',2),
	(4,'2018_01_10_205142_create_employees_table',3),
	(5,'2018_01_10_205149_create_movements_table',3);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table movements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `movements`;

CREATE TABLE `movements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `door_id` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'out',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `movements` WRITE;
/*!40000 ALTER TABLE `movements` DISABLE KEYS */;

INSERT INTO `movements` (`id`, `employee_id`, `door_id`, `type`, `created_at`, `updated_at`)
VALUES
	(1,11,1,'in','2018-01-10 22:01:28','2018-01-10 22:01:28'),
	(2,11,1,'in','2018-01-10 22:04:06','2018-01-10 22:04:06'),
	(3,11,1,'in','2018-01-10 22:06:16','2018-01-10 22:06:16'),
	(4,11,1,'out','2018-01-10 22:06:36','2018-01-10 22:06:36'),
	(5,11,1,'in','2018-01-10 22:06:37','2018-01-10 22:06:37'),
	(6,11,1,'out','2018-01-10 22:06:38','2018-01-10 22:06:38'),
	(7,11,1,'in','2018-01-10 22:06:39','2018-01-10 22:06:39'),
	(8,13,1,'in','2018-01-10 22:06:41','2018-01-10 22:06:41'),
	(9,1,1,'in','2018-01-10 22:06:42','2018-01-10 22:06:42'),
	(10,16,1,'in','2018-01-10 22:06:43','2018-01-10 22:06:43'),
	(11,6,1,'in','2018-01-10 22:06:43','2018-01-10 22:06:43');

/*!40000 ALTER TABLE `movements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Admin','admin@admin.com','$2y$10$zjVvWjORKDM5MrVa91NBru.8aJXCyyjesLG09lyGZ5nsYqAIa.DWe',NULL,'2018-01-10 20:49:03','2018-01-10 20:49:03');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
