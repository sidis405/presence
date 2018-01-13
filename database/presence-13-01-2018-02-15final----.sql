# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.20)
# Database: presence
# Generation Time: 2018-01-13 01:15:54 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table employees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `employees`;

CREATE TABLE `employees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_presence_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;

INSERT INTO `employees` (`id`, `name`, `slug`, `avatar`, `last_presence_id`, `created_at`, `updated_at`)
VALUES
	(1,'Eden Sauer','eden-sauer','/uploads/b8dfefe6f02d7be40f037f104a6610a2.jpg',2,'2018-01-11 11:11:50','2018-01-12 23:44:13'),
	(2,'Jamir Jacobson Sr.','jamir-jacobson-sr','/uploads/3299131526976ed56f50f88a5b0128c2.jpg',NULL,'2018-01-11 11:11:50','2018-01-12 23:42:08'),
	(3,'Tiana Williamson','tiana-williamson','/uploads/92cef05bc73b941d84ccee1a2725c92f.jpg',NULL,'2018-01-11 11:11:50','2018-01-11 11:11:50'),
	(4,'Hettie Zulauf','hettie-zulauf','/uploads/0aa6ff6d24901843f3a41d5fa3af7743.jpg',NULL,'2018-01-11 11:11:50','2018-01-11 11:45:11'),
	(5,'Kendall Roob','kendall-roob','/uploads/7a55dc59e32d34d6f364c8a4a8cfe6fc.jpg',7,'2018-01-11 11:11:50','2018-01-13 01:13:24'),
	(6,'Carolyn Price','carolyn-price','/uploads/cd5d13b1a37d9b160800adf75b2fcd96.jpg',NULL,'2018-01-11 11:11:50','2018-01-11 11:40:15'),
	(7,'Hector Nienow','hector-nienow','/uploads/e2a9f18f54462dbf483b9a7ea49ae1e5.jpg',1,'2018-01-11 11:11:50','2018-01-12 23:43:32'),
	(8,'Prof. Elinor Davis','prof-elinor-davis','/uploads/7067f83abb62f197e7b9d57a616ff9c1.jpg',NULL,'2018-01-11 11:11:50','2018-01-11 11:41:42'),
	(9,'Prof. Luther Harvey Jr.','prof-luther-harvey-jr','/uploads/6d92c3afd584814e0528c93627ff3a90.jpg',NULL,'2018-01-11 11:11:50','2018-01-11 11:52:20'),
	(10,'Amelia Jakubowski','amelia-jakubowski','/uploads/160c4777af534e6ace093f180887668f.jpg',5,'2018-01-11 11:11:50','2018-01-13 00:34:31'),
	(11,'Cyril Kuhlman','cyril-kuhlman','/uploads/78481572b11e28e5f57a15c357575c7e.jpg',8,'2018-01-11 11:11:50','2018-01-13 01:15:03'),
	(12,'Juston Orn','juston-orn','/uploads/310690072292416c5988744f67131ecd.jpg',NULL,'2018-01-11 11:11:50','2018-01-12 21:40:48'),
	(13,'Nils Gerlach','nils-gerlach','/uploads/f8a1c7efdf9d1796f3cd4f1d23c8a5be.jpg',NULL,'2018-01-11 11:11:50','2018-01-11 11:40:36'),
	(14,'Prof. Wilfredo Wisozk IV','prof-wilfredo-wisozk-iv','/uploads/c73a3fe34a4142250a8559590fa60154.jpg',NULL,'2018-01-11 11:11:50','2018-01-12 22:39:32'),
	(15,'Daisha Kuhic','daisha-kuhic','/uploads/5920f3938d5c43f7a5f189366360f7d4.jpg',NULL,'2018-01-11 11:11:50','2018-01-11 14:03:28'),
	(16,'Dr. Juvenal Wisoky Jr.','dr-juvenal-wisoky-jr','/uploads/0de6e92c1d6bd9ca128167d0b6b312d0.jpg',NULL,'2018-01-11 11:11:50','2018-01-12 23:11:10');

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
	(4,'2018_01_10_205142_create_employees_table',3),
	(5,'2018_01_10_205149_create_movements_table',3);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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



# Dump of table presences
# ------------------------------------------------------------

DROP TABLE IF EXISTS `presences`;

CREATE TABLE `presences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `dirty_close` tinyint(4) NOT NULL DEFAULT '0',
  `override` int(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `presences` WRITE;
/*!40000 ALTER TABLE `presences` DISABLE KEYS */;

INSERT INTO `presences` (`id`, `employee_id`, `dirty_close`, `override`, `created_at`, `updated_at`)
VALUES
	(1,7,1,1,'2018-01-12 23:43:32','2018-01-13 00:08:22'),
	(2,1,1,1,'2018-01-12 23:44:13','2018-01-13 00:08:08'),
	(3,10,0,0,'2018-01-13 00:33:45','2018-01-13 00:33:45'),
	(4,10,0,0,'2018-01-13 00:33:54','2018-01-13 00:33:54'),
	(5,10,0,0,'2018-01-04 00:34:31','2018-01-04 00:35:37'),
	(6,11,0,0,'2018-01-13 00:35:09','2018-01-13 00:35:38'),
	(7,5,0,0,'2018-01-13 01:11:24','2018-01-13 01:14:11'),
	(8,11,1,0,'2018-01-13 01:15:03','2018-01-13 01:15:13');

/*!40000 ALTER TABLE `presences` ENABLE KEYS */;
UNLOCK TABLES;


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
