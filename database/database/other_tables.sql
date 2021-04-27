CREATE TABLE `bonuses` (
	`id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`course_id` INT(10) UNSIGNED NOT NULL,
	`name` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`slug` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`description` VARCHAR(191) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`video` VARCHAR(191) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`file` VARCHAR(191) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
	`status` TINYINT(1) NOT NULL DEFAULT '1',
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `bonuses_course_id_foreign` (`course_id`) USING BTREE,
	CONSTRAINT `bonuses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `psi_test`.`courses` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;

CREATE TABLE `annotations` (
   `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
   `user_id` INT(10) UNSIGNED NOT NULL,
   `course_id` INT(10) UNSIGNED NOT NULL,
   `classroom_id` INT(10) UNSIGNED NOT NULL,
   `description` VARCHAR(191) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
   `created_at` TIMESTAMP NULL DEFAULT NULL,
   `updated_at` TIMESTAMP NULL DEFAULT NULL,
   PRIMARY KEY (`id`) USING BTREE,
   INDEX `annotations_user_id_foreign` (`user_id`) USING BTREE,
   INDEX `annotations_course_id_foreign` (`course_id`) USING BTREE,
   INDEX `annotations_classroom_id_foreign` (`classroom_id`) USING BTREE,
   CONSTRAINT `annotations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `psi_test`.`users` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
   CONSTRAINT `annotations_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `psi_test`.`courses` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
   CONSTRAINT `annotations_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `psi_test`.`classrooms` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
    COLLATE='utf8mb4_unicode_ci'
    ENGINE=InnoDB
;

CREATE TABLE `annotations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `course_id` int(10) unsigned NOT NULL,
  `classroom_id` int(10) unsigned NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `annotations_user_id_foreign` (`user_id`),
  KEY `annotations_course_id_foreign` (`course_id`),
  KEY `annotations_classroom_id_foreign` (`classroom_id`),
  CONSTRAINT `annotations_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  CONSTRAINT `annotations_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `annotations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `bonuses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bonuses_course_id_foreign` (`course_id`),
  CONSTRAINT `bonuses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;