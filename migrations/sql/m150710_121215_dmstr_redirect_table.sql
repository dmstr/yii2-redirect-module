CREATE TABLE IF NOT EXISTS `dmstr_redirect` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type` VARCHAR(10) NOT NULL,
  `from_domain` VARCHAR(255) NULL,
  `to_domain` VARCHAR(255) NULL,
  `from_path` VARCHAR(255) NULL,
  `to_path` VARCHAR(255) NULL,
  `status_code` INT(3) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id`))
  ENGINE = InnoDB