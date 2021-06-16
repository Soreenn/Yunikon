-- MySQL Script generated by MySQL Workbench
-- Wed Jun 16 16:38:44 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Yunikon
-- -----------------------------------------------------
-- DB of a website.
DROP SCHEMA IF EXISTS `Yunikon` ;

-- -----------------------------------------------------
-- Schema Yunikon
--
-- DB of a website.
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Yunikon` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `Yunikon` ;

-- -----------------------------------------------------
-- Table `Yunikon`.`Users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Yunikon`.`Users` ;

CREATE TABLE IF NOT EXISTS `Yunikon`.`Users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `eMail` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `phoneNumber` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `exhibitor` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `eMail_UNIQUE` (`eMail` ASC) VISIBLE,
  UNIQUE INDEX `phoneNumber_UNIQUE` (`phoneNumber` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Yunikon`.`Events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Yunikon`.`Events` ;

CREATE TABLE IF NOT EXISTS `Yunikon`.`Events` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `startingDate` DATE NOT NULL,
  `endingDate` DATE NOT NULL,
  `location` VARCHAR(45) NOT NULL,
  `description` VARCHAR(255) NULL,
  `image` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Yunikon`.`Tickets`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `Yunikon`.`Tickets` ;

CREATE TABLE IF NOT EXISTS `Yunikon`.`Tickets` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `U_Number` INT NOT NULL,
  `startingDate` DATE NOT NULL,
  `endingDate` DATE NOT NULL,
  `price` INT NOT NULL,
  `description` VARCHAR(255) NULL,
  `Event_id` INT NOT NULL,
  `Users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `U_Numbers_UNIQUE` (`U_Number` ASC) VISIBLE,
  INDEX `fk_Tickets_Events1_idx` (`Event_id` ASC) VISIBLE,
  INDEX `fk_Tickets_Users1_idx` (`Users_id` ASC) VISIBLE,
  CONSTRAINT `fk_Tickets_Events1`
    FOREIGN KEY (`Event_id`)
    REFERENCES `Yunikon`.`Events` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Tickets_Users1`
    FOREIGN KEY (`Users_id`)
    REFERENCES `Yunikon`.`Users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
