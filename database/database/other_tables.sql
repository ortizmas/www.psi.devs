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
   `classroom_id` INT(10) UNSIGNED NOT NULL,
   `description` VARCHAR(191) NULL DEFAULT NULL COLLATE 'utf8mb4_unicode_ci',
   `created_at` TIMESTAMP NULL DEFAULT NULL,
   `updated_at` TIMESTAMP NULL DEFAULT NULL,
   PRIMARY KEY (`id`) USING BTREE,
   INDEX `annotations_classroom_id_foreign` (`classroom_id`) USING BTREE,
   CONSTRAINT `annotations_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `psi_test`.`classrooms` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
    COLLATE='utf8mb4_unicode_ci'
    ENGINE=InnoDB
;