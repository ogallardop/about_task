CREATE DATABASE aboutdb;

CREATE TABLE `aboutdb`.`customer` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `status` VARCHAR(45) NULL,
  `country` VARCHAR(255) NULL,
  `address` VARCHAR(255) NULL,
  `postal_code` VARCHAR(20) NULL,
  PRIMARY KEY (`id`));

INSERT INTO `aboutdb`.`customer` (`name`, `email`, `status`, `country`, `address`)
VALUES ('Oscar', 'oscar.gallardo@outlook.com', 'Registered', 'Germany', 'ups');
