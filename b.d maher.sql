-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour lmsmaster
CREATE DATABASE IF NOT EXISTS `lmsmaster` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lmsmaster`;

-- Listage de la structure de la table lmsmaster. categeories
CREATE TABLE IF NOT EXISTS `categeories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.categeories : ~0 rows (environ)
DELETE FROM `categeories`;
/*!40000 ALTER TABLE `categeories` DISABLE KEYS */;
INSERT INTO `categeories` (`id`, `nom`, `created_at`, `updated_at`) VALUES
	(1, 'Web', '2020-05-28 10:59:01', '2020-05-28 10:59:01');
/*!40000 ALTER TABLE `categeories` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reponse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cour_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_cour_id_foreign` (`cour_id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_cour_id_foreign` FOREIGN KEY (`cour_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.comments : ~0 rows (environ)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `commentaire`, `reponse`, `cour_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'test test', '', 1, 1, '2020-05-28 12:47:19', '2020-05-28 12:47:19'),
	(2, 'hello there', '', 1, 7, '2020-05-29 11:43:37', '2020-05-29 11:43:37');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. cours
CREATE TABLE IF NOT EXISTS `cours` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ordre` int(11) NOT NULL,
  `formation_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cours_formation_id_foreign` (`formation_id`),
  CONSTRAINT `cours_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.cours : ~5 rows (environ)
DELETE FROM `cours`;
/*!40000 ALTER TABLE `cours` DISABLE KEYS */;
INSERT INTO `cours` (`id`, `titre`, `description`, `file`, `ordre`, `formation_id`, `created_at`, `updated_at`) VALUES
	(1, 'HTML Basic', 'this cours is for the basics', '1590778042.pdf', 1, 1, '2020-05-28 12:23:33', '2020-05-29 18:47:22'),
	(2, 'CSS Basic', 'in this course you will learn the basic of css test', '1590682450.pdf', 1, 2, '2020-05-28 13:22:16', '2020-05-28 16:14:10'),
	(3, 'JS Basic', 'here you will learn the js basics', '1590673461.mp4', 1, 3, '2020-05-28 13:44:21', '2020-05-28 13:44:21'),
	(4, 'Css Basics part 2', 'Css Basics part 2', '1590679248.png', 2, 2, '2020-05-28 15:20:48', '2020-05-28 15:20:48'),
	(5, 'Css Basics part 3', 'Css Basics part 3', '1590681552.mp4', 3, 2, '2020-05-28 15:42:01', '2020-05-28 15:59:12');
/*!40000 ALTER TABLE `cours` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. cours_user
CREATE TABLE IF NOT EXISTS `cours_user` (
  `user_id` bigint(20) unsigned NOT NULL,
  `cour_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`cour_id`),
  KEY `cours_user_cour_id_foreign` (`cour_id`),
  CONSTRAINT `cours_user_cour_id_foreign` FOREIGN KEY (`cour_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cours_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.cours_user : ~3 rows (environ)
DELETE FROM `cours_user`;
/*!40000 ALTER TABLE `cours_user` DISABLE KEYS */;
INSERT INTO `cours_user` (`user_id`, `cour_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL),
	(1, 3, NULL, NULL),
	(6, 1, NULL, NULL),
	(7, 1, NULL, NULL);
/*!40000 ALTER TABLE `cours_user` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.failed_jobs : ~0 rows (environ)
DELETE FROM `failed_jobs`;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. formations
CREATE TABLE IF NOT EXISTS `formations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etat` tinyint(1) NOT NULL,
  `formateur_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `formations_formateur_id_foreign` (`formateur_id`),
  KEY `formations_category_id_foreign` (`category_id`),
  CONSTRAINT `formations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categeories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `formations_formateur_id_foreign` FOREIGN KEY (`formateur_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.formations : ~3 rows (environ)
DELETE FROM `formations`;
/*!40000 ALTER TABLE `formations` DISABLE KEYS */;
INSERT INTO `formations` (`id`, `nom`, `description`, `prix`, `image`, `etat`, `formateur_id`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 'HTML 5', 'html 5 formation', 45.00, '1590663619.png', 1, 1, 1, '2020-05-28 11:00:19', '2020-05-28 11:00:19'),
	(2, 'CSS 3 Master', 'this formation is for the css 3', 45.00, '1590671396.png', 1, 2, 1, '2020-05-28 13:09:56', '2020-05-28 13:09:56'),
	(3, 'Javascript master', 'you wil master the javascript', 45.00, '1590673415.png', 1, 4, 1, '2020-05-28 13:43:35', '2020-05-28 13:43:35');
/*!40000 ALTER TABLE `formations` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. formation_user
CREATE TABLE IF NOT EXISTS `formation_user` (
  `user_id` bigint(20) unsigned NOT NULL,
  `formation_id` bigint(20) unsigned NOT NULL,
  `progression` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`formation_id`),
  KEY `formation_user_formation_id_foreign` (`formation_id`),
  CONSTRAINT `formation_user_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `formation_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.formation_user : ~10 rows (environ)
DELETE FROM `formation_user`;
/*!40000 ALTER TABLE `formation_user` DISABLE KEYS */;
INSERT INTO `formation_user` (`user_id`, `formation_id`, `progression`, `created_at`, `updated_at`) VALUES
	(1, 1, 0, NULL, NULL),
	(1, 2, 0, NULL, NULL),
	(1, 3, 0, NULL, NULL),
	(2, 1, 0, NULL, NULL),
	(2, 2, 0, NULL, NULL),
	(2, 3, 0, NULL, NULL),
	(5, 1, 0, NULL, NULL),
	(6, 1, 0, NULL, NULL),
	(6, 2, 0, NULL, NULL),
	(6, 3, 0, NULL, NULL),
	(7, 1, 0, NULL, NULL),
	(8, 3, 0, NULL, NULL);
/*!40000 ALTER TABLE `formation_user` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.migrations : ~18 rows (environ)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_04_22_122631_create_categeories_table', 1),
	(5, '2020_04_22_122905_create_formations_table', 1),
	(6, '2020_04_25_220717_create_cours_table', 1),
	(7, '2020_04_28_212231_formation_user', 1),
	(8, '2020_05_01_192456_create_cours_user_table', 1),
	(9, '2020_05_03_195452_create_comments_table', 1),
	(10, '2020_05_17_113831_create_roles_table', 1),
	(11, '2020_05_17_114054_create_role_user_table', 1),
	(12, '2020_05_22_072319_create_qcm_table', 1),
	(13, '2020_05_22_072349_create_questions_table', 1),
	(14, '2020_05_22_072413_create_questions_options_table', 1),
	(15, '2020_05_22_072900_create_reponses_table', 1),
	(16, '2020_05_22_073059_create_tests_table', 1),
	(17, '2020_05_22_073209_create_results_table', 1),
	(18, '2020_05_25_084914_update_responses_test_id_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.password_resets : ~0 rows (environ)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. qcms
CREATE TABLE IF NOT EXISTS `qcms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `formation_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `qcms_formation_id_foreign` (`formation_id`),
  CONSTRAINT `qcms_formation_id_foreign` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.qcms : ~0 rows (environ)
DELETE FROM `qcms`;
/*!40000 ALTER TABLE `qcms` DISABLE KEYS */;
INSERT INTO `qcms` (`id`, `created_at`, `updated_at`, `formation_id`, `title`) VALUES
	(1, '2020-05-28 12:27:52', '2020-05-28 12:27:52', 1, 'HTML  5 Qcm'),
	(2, '2020-05-29 19:15:03', '2020-05-29 19:15:03', 3, 'java');
/*!40000 ALTER TABLE `qcms` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qcm_id` bigint(20) unsigned NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci,
  `answer_explanation` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `questions_qcm_id_foreign` (`qcm_id`),
  CONSTRAINT `questions_qcm_id_foreign` FOREIGN KEY (`qcm_id`) REFERENCES `qcms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.questions : ~5 rows (environ)
DELETE FROM `questions`;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `created_at`, `updated_at`, `qcm_id`, `question_text`, `answer_explanation`) VALUES
	(1, '2020-05-28 12:30:05', '2020-05-28 12:30:05', 1, 'What does HTML stand for?', NULL),
	(2, '2020-05-28 12:31:35', '2020-05-28 12:31:35', 1, 'Who is making the Web standards', NULL),
	(3, '2020-05-28 12:32:14', '2020-05-28 12:32:14', 1, '5+5', NULL),
	(4, '2020-05-29 19:16:17', '2020-05-29 19:16:17', 2, '4+1!', NULL),
	(5, '2020-05-29 19:18:20', '2020-05-29 19:18:20', 2, '5+7!', NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. questions_options
CREATE TABLE IF NOT EXISTS `questions_options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question_id` bigint(20) unsigned NOT NULL,
  `option` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correct` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `questions_options_question_id_foreign` (`question_id`),
  CONSTRAINT `questions_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.questions_options : ~17 rows (environ)
DELETE FROM `questions_options`;
/*!40000 ALTER TABLE `questions_options` DISABLE KEYS */;
INSERT INTO `questions_options` (`id`, `created_at`, `updated_at`, `question_id`, `option`, `correct`) VALUES
	(1, '2020-05-28 12:30:05', '2020-05-28 12:30:05', 1, 'Hyper Text Markup Language', 1),
	(2, '2020-05-28 12:30:05', '2020-05-28 12:30:05', 1, 'Home Tool Markup Language', 0),
	(3, '2020-05-28 12:30:05', '2020-05-28 12:30:05', 1, 'Hyperlinks and Text Markup Language', 0),
	(4, '2020-05-28 12:31:35', '2020-05-28 12:31:35', 2, 'Google', 0),
	(5, '2020-05-28 12:31:35', '2020-05-28 12:31:35', 2, 'Facebook', 0),
	(6, '2020-05-28 12:31:35', '2020-05-28 12:31:35', 2, 'The World Wide Web Consortium', 1),
	(7, '2020-05-28 12:31:35', '2020-05-28 12:31:35', 2, 'Mozilla', 0),
	(8, '2020-05-28 12:32:14', '2020-05-28 12:32:14', 3, '7', 0),
	(9, '2020-05-28 12:32:15', '2020-05-28 12:32:15', 3, '10', 1),
	(10, '2020-05-28 12:32:15', '2020-05-28 12:32:15', 3, '12', 0),
	(11, '2020-05-28 12:32:15', '2020-05-28 12:32:15', 3, '5', 0),
	(12, '2020-05-29 19:16:18', '2020-05-29 19:16:18', 4, '5', 1),
	(13, '2020-05-29 19:16:18', '2020-05-29 19:16:18', 4, '4', 0),
	(14, '2020-05-29 19:16:18', '2020-05-29 19:16:18', 4, '2', 0),
	(15, '2020-05-29 19:18:20', '2020-05-29 19:18:20', 5, '10', 0),
	(16, '2020-05-29 19:18:20', '2020-05-29 19:18:20', 5, '12', 0),
	(17, '2020-05-29 19:18:20', '2020-05-29 19:18:20', 5, '101', 1),
	(18, '2020-05-29 19:18:20', '2020-05-29 19:18:20', 5, '14', 0),
	(19, '2020-05-29 19:18:20', '2020-05-29 19:18:20', 5, '17', 0);
/*!40000 ALTER TABLE `questions_options` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. reponses
CREATE TABLE IF NOT EXISTS `reponses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `test_id` int(10) unsigned DEFAULT NULL,
  `question_id` int(10) unsigned DEFAULT NULL,
  `correct` tinyint(4) DEFAULT '0',
  `option_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.reponses : ~20 rows (environ)
DELETE FROM `reponses`;
/*!40000 ALTER TABLE `reponses` DISABLE KEYS */;
INSERT INTO `reponses` (`id`, `user_id`, `test_id`, `question_id`, `correct`, `option_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, 1, 1, '2020-05-28 12:42:29', '2020-05-28 12:42:29'),
	(2, 1, 1, 2, 1, 6, '2020-05-28 12:42:29', '2020-05-28 12:42:29'),
	(3, 1, 1, 3, 0, 10, '2020-05-28 12:42:29', '2020-05-28 12:42:29'),
	(4, 5, 2, 1, 0, 2, '2020-05-28 14:15:35', '2020-05-28 14:15:35'),
	(5, 5, 2, 2, 0, 4, '2020-05-28 14:15:35', '2020-05-28 14:15:35'),
	(6, 5, 2, 3, 0, 10, '2020-05-28 14:15:35', '2020-05-28 14:15:35'),
	(7, 6, 3, 1, 0, 2, '2020-05-29 11:40:51', '2020-05-29 11:40:51'),
	(8, 6, 3, 2, 1, 6, '2020-05-29 11:40:51', '2020-05-29 11:40:51'),
	(9, 6, 3, 3, 0, 8, '2020-05-29 11:40:51', '2020-05-29 11:40:51'),
	(10, 7, 4, 1, 1, 1, '2020-05-29 11:45:34', '2020-05-29 11:45:34'),
	(11, 7, 4, 2, 1, 6, '2020-05-29 11:45:34', '2020-05-29 11:45:34'),
	(12, 7, 4, 3, 1, 9, '2020-05-29 11:45:35', '2020-05-29 11:45:35'),
	(13, 2, 5, 4, 1, 12, '2020-05-29 20:32:48', '2020-05-29 20:32:48'),
	(14, 2, 5, 5, 1, 17, '2020-05-29 20:32:48', '2020-05-29 20:32:48'),
	(15, 8, 6, 4, 0, 14, '2020-05-29 20:38:25', '2020-05-29 20:38:25'),
	(16, 8, 6, 5, 0, 16, '2020-05-29 20:38:25', '2020-05-29 20:38:25'),
	(17, 6, 7, 4, 1, 12, '2020-05-30 10:12:00', '2020-05-30 10:12:00'),
	(18, 6, 7, 5, 0, 19, '2020-05-30 10:12:00', '2020-05-30 10:12:00'),
	(19, 1, 8, 4, 1, 12, '2020-05-30 10:13:18', '2020-05-30 10:13:18'),
	(20, 1, 8, 5, 0, 18, '2020-05-30 10:13:18', '2020-05-30 10:13:18');
/*!40000 ALTER TABLE `reponses` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. results
CREATE TABLE IF NOT EXISTS `results` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `correct` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `question_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `results_user_id_foreign` (`user_id`),
  KEY `results_question_id_foreign` (`question_id`),
  CONSTRAINT `results_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`),
  CONSTRAINT `results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.results : ~0 rows (environ)
DELETE FROM `results`;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
/*!40000 ALTER TABLE `results` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.roles : ~2 rows (environ)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Admininistrateur', '2020-05-28 10:57:22', '2020-05-28 10:57:22'),
	(2, 'formateur', 'Formateur', '2020-05-28 10:57:22', '2020-05-28 10:57:22'),
	(3, 'user', 'Apprenant', '2020-05-28 10:57:22', '2020-05-28 10:57:22');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.role_user : ~15 rows (environ)
DELETE FROM `role_user`;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`id`, `role_id`, `user_id`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 1),
	(4, 2, 2),
	(5, 3, 2),
	(12, 3, 3),
	(14, 3, 4),
	(15, 2, 4),
	(16, 3, 5),
	(17, 3, 6),
	(18, 2, 6),
	(19, 3, 7),
	(21, 3, 8),
	(22, 3, 9),
	(23, 3, 10),
	(24, 2, 10);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. tests
CREATE TABLE IF NOT EXISTS `tests` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `qcm_id` int(10) unsigned DEFAULT NULL,
  `result` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.tests : ~8 rows (environ)
DELETE FROM `tests`;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
INSERT INTO `tests` (`id`, `user_id`, `qcm_id`, `result`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '66.67', '2020-05-28 12:42:29', '2020-05-28 12:42:29'),
	(2, 5, 1, '0', '2020-05-28 14:15:35', '2020-05-28 14:15:35'),
	(3, 6, 1, '33.33', '2020-05-29 11:40:51', '2020-05-29 11:40:51'),
	(4, 7, 1, '100', '2020-05-29 11:45:34', '2020-05-29 11:45:35'),
	(5, 2, 2, '100', '2020-05-29 20:32:47', '2020-05-29 20:32:48'),
	(6, 8, 2, '0', '2020-05-29 20:38:25', '2020-05-29 20:38:25'),
	(7, 6, 2, '50', '2020-05-30 10:11:59', '2020-05-30 10:12:00'),
	(8, 1, 2, '50', '2020-05-30 10:13:18', '2020-05-30 10:13:18');
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;

-- Listage de la structure de la table lmsmaster. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table lmsmaster.users : ~8 rows (environ)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'admin@gmail.com', 'null', NULL, '$2y$10$cIDfHuojxYI57U3CIPa.wOmq1NyJqn3GVZO.wXOWjG52fjryKF3iW', NULL, '2020-05-28 10:57:30', '2020-05-28 10:57:30'),
	(2, 'Formateur', 'formateur@gmail.com', 'null', NULL, '$2y$10$LhMOsJ1bbDVTdrwpRBmDOOEV07UV.xAvzwxkiwGIeNGj9L.LUzAyS', NULL, '2020-05-28 10:57:31', '2020-05-28 10:57:31'),
	(3, 'user', 'maher@gmail.com', 'null', NULL, '$2y$10$.itll6W7VQ/zhzEN9ayj2OcEuKcNVIdNB2bGkFpEscBSTBGyTA0Xi', NULL, '2020-05-28 10:57:31', '2020-05-28 10:57:31'),
	(4, 'chawki', 'chawki@gmail.com', 'null', NULL, '$2y$10$ccqRZr6dWuyOuMgZcA5U2.CWfgFlwGQYejjwPoj68ltUKZmDLYGiu', NULL, '2020-05-28 13:41:10', '2020-05-28 13:41:10'),
	(5, 'fedi', 'fedi@gmail.com', 'null', NULL, '$2y$10$ovTFdBetGjx3USVTPUskK.0yU5Abq7TmQwZz1IPFqABDIgeiz8nc2', NULL, '2020-05-28 13:50:53', '2020-05-28 13:50:53'),
	(6, 'formateur 3', 'formateur3@gmail.com', 'null', NULL, '$2y$10$55LmKINrM7z4mk3vj0CLQeF1He6gFhcwPclZnX1xAEI5Lybb1ttf2', NULL, '2020-05-29 10:37:51', '2020-05-29 10:37:51'),
	(7, 'apprenant', 'apprenant@gmail.com', 'null', NULL, '$2y$10$3pdiOTB53BkmbcTrRgHDMuveYEPNrUDW90PDZxMMGTeIykFVLiIkK', NULL, '2020-05-29 11:43:09', '2020-05-29 11:43:09'),
	(8, 'rayen', 'rayen@gmail.com', 'null', NULL, '$2y$10$82syOlDsndU4AT8iXRFk2ON3UBeID8DdnMTn51./rV2CqIc0DDl0G', NULL, '2020-05-29 20:37:32', '2020-05-29 20:37:32'),
	(9, 'rihab', 'rihab@gmail.com', 'null', NULL, '$2y$10$S1p6qCdiEtTUESmV/JhffuLh4oNvbp3auBSWsnjMtRQapWWijbiwi', NULL, '2020-05-29 21:05:43', '2020-05-29 21:05:43'),
	(10, 'massoudi', 'massoudich@gmail.com', 'null', NULL, '$2y$10$AoD8w48ibbHdhO.pDd03gOWXKFjm47whf63KkxRedM6DOGMCXdGhm', NULL, '2020-05-29 21:09:30', '2020-05-29 21:09:30');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
