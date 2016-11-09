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
-- Table `mydb`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `rol` TINYINT(1) NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`categorias` (
  `id_categorias` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  PRIMARY KEY (`id_categorias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`paquetes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`paquetes` (
  `id_paquetes` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NULL,
  PRIMARY KEY (`id_paquetes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`articulos` (
  `id_articulo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `descripcion` VARCHAR(255) NULL,
  `unidades` INT NULL,
  `escala` VARCHAR(45) NULL,
  `tamaño` VARCHAR(45) NULL,
  `articuloscol` VARCHAR(45) NULL,
  `categorias_id_categorias` INT NOT NULL,
  `paquetes_id_paquetes` INT NOT NULL,
  PRIMARY KEY (`id_articulo`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
