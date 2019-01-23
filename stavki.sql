-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Uporabnik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Uporabnik` (
  `idUporabnik` INT NOT NULL AUTO_INCREMENT,
  `uporabniskoIme` VARCHAR(45) NOT NULL,
  `geslo` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `nazivSlike` LONGTEXT NOT NULL,
  PRIMARY KEY (`idUporabnik`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Komentar`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Komentar` (
  `idKomentar` INT NOT NULL AUTO_INCREMENT,
  `vsebina` TEXT(100) NOT NULL,
  `cas` DATETIME NOT NULL,
  `Uporabnik_idUporabnik` INT NOT NULL,
  `Clanek_idClanek` INT NOT NULL,
  PRIMARY KEY (`idKomentar`, `Uporabnik_idUporabnik`),
  INDEX `fk_Komentar_Uporabnik1_idx` (`Uporabnik_idUporabnik` ASC),
  INDEX `fk_Komentar_Clanek_idx` (`Clanek_idClanek` ASC),
  CONSTRAINT `fk_Komentar_Uporabnik1`
    FOREIGN KEY (`Uporabnik_idUporabnik`)
    REFERENCES `mydb`.`Uporabnik` (`idUporabnik`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Komentar_Clanek`
    FOREIGN KEY (`Clanek_idClanek`)
    REFERENCES `mydb`.`Clanek` (`idClanek`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `mydb`.`Kategorije` (
  `idKategorije` INT NOT NULL AUTO_INCREMENT,
  `naziv` enum('humor','umetnost','zdravje','novice') COLLATE utf8_slovenian_ci NOT NULL,
  PRIMARY KEY (`idKategorije`,  `Clanek_Uporabnik_idUporabnik`)
  )
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `mydb`.`Clanek` (
  `idClanek` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  `vsebina` LONGTEXT NOT NULL,
  `nazivSlike` LONGTEXT NOT NULL,
  `datum` DATETIME NOT NULL,
  `Uporabnik_idUporabnik` INT NOT NULL,
  `Komentar_idKomentar` INT NOT NULL,
    `Kategorije_idKategorije` INT NOT NULL,
  PRIMARY KEY (`idClanek`, `Uporabnik_idUporabnik`, `Komentar_idKomentar`,`Kategorije_idKategorije` ),
  INDEX `fk_Clanek_Uporabnik_idx` (`Uporabnik_idUporabnik` ASC),
  INDEX `fk_Clanek_Kategorije_idx` (`Kategorije_idKategorije` ASC),
  CONSTRAINT `fk_Clanek_Uporabnik`
    FOREIGN KEY (`Uporabnik_idUporabnik`)
    REFERENCES `mydb`.`Uporabnik` (`idUporabnik`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
      CONSTRAINT `fk_Clanek_Kategorije`
    FOREIGN KEY (`Kategorije_idKategorije`)
    REFERENCES `mydb`.`Kategorije` (`idKategorije`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
