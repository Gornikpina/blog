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
  `Uporabnik_idUporabnik` INT NOT NULL,
  PRIMARY KEY (`idKomentar`, `Uporabnik_idUporabnik`),
  INDEX `fk_Komentar_Uporabnik1_idx` (`Uporabnik_idUporabnik` ASC),
  CONSTRAINT `fk_Komentar_Uporabnik1`
    FOREIGN KEY (`Uporabnik_idUporabnik`)
    REFERENCES `mydb`.`Uporabnik` (`idUporabnik`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Clanek`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Clanek` (
  `idClanek` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  `vsebina` LONGTEXT NOT NULL,
  `nazivSlike` LONGTEXT NOT NULL,
  `datum` DATETIME NOT NULL,
  `Uporabnik_idUporabnik` INT NOT NULL,
  `Komentar_idKomentar` INT NOT NULL,
  PRIMARY KEY (`idClanek`, `Uporabnik_idUporabnik`, `Komentar_idKomentar`),
  INDEX `fk_Clanek_Uporabnik_idx` (`Uporabnik_idUporabnik` ASC),
  INDEX `fk_Clanek_Komentar1_idx` (`Komentar_idKomentar` ASC),
  CONSTRAINT `fk_Clanek_Uporabnik`
    FOREIGN KEY (`Uporabnik_idUporabnik`)
    REFERENCES `mydb`.`Uporabnik` (`idUporabnik`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Clanek_Komentar1`
    FOREIGN KEY (`Komentar_idKomentar`)
    REFERENCES `mydb`.`Komentar` (`idKomentar`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Kategorije`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Kategorije` (
  `idKategorije` INT NOT NULL AUTO_INCREMENT,
  `naziv` VARCHAR(45) NOT NULL,
  `Clanek_idClanek` INT NOT NULL,
  `Clanek_Uporabnik_idUporabnik` INT NOT NULL,
  PRIMARY KEY (`idKategorije`, `Clanek_idClanek`, `Clanek_Uporabnik_idUporabnik`),
  INDEX `fk_Kategorije_Clanek1_idx` (`Clanek_idClanek` ASC, `Clanek_Uporabnik_idUporabnik` ASC),
  CONSTRAINT `fk_Kategorije_Clanek1`
    FOREIGN KEY (`Clanek_idClanek` , `Clanek_Uporabnik_idUporabnik`)
    REFERENCES `mydb`.`Clanek` (`idClanek` , `Uporabnik_idUporabnik`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
