-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema test2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema test2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `test2` DEFAULT CHARACTER SET latin1 ;
USE `test2` ;

-- -----------------------------------------------------
-- Table `test2`.`Post`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test2`.`Post` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `text` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 196
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `test2`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `test2`.`User` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `lastName` VARCHAR(255) NULL DEFAULT NULL,
  `age` INT(11) NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 138
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
