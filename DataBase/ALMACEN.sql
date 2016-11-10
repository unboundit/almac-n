-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ALMACEN
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ALMACEN
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ALMACEN` DEFAULT CHARACTER SET utf8 ;
USE `ALMACEN` ;

-- -----------------------------------------------------
-- Table `ALMACEN`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `rol` TINYINT(1) NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALMACEN`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`categorias` (
  `id_categorias` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  PRIMARY KEY (`id_categorias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALMACEN`.`articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`articulos` (
  `id_articulo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `descripcion` VARCHAR(255) NULL,
  `unidades` INT NULL,
  `escala` VARCHAR(45) NULL,
  `tamaño` VARCHAR(45) NULL,
  `articuloscol` VARCHAR(45) NULL,
  `categorias_id_categorias` INT NOT NULL,
  PRIMARY KEY (`id_articulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALMACEN`.`paquetes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`paquetes` (
  `id_paquetes` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_paquetes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALMACEN`.`Existencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`Existencias` (
  `idExistencias` INT NULL,
  `Cont` INT NULL,
  `articulos_id_articulo` INT NOT NULL,
  PRIMARY KEY (`idExistencias`, `articulos_id_articulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALMACEN`.`SalidaAlmacen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`SalidaAlmacen` (
  `idSalidaAlmacen` INT NULL,
  `fecha` DATE NULL,
  PRIMARY KEY (`idSalidaAlmacen`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALMACEN`.`Sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`Sucursal` (
  `idSucursal` INT NOT NULL,
  `NomSucursal` VARCHAR(45) NULL,
  PRIMARY KEY (`idSucursal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALMACEN`.`SalidaAlmacen_has_Sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`SalidaAlmacen_has_Sucursal` (
  `SalidaAlmacen_idSalidaAlmacen` INT NOT NULL,
  `Sucursal_idSucursal` INT NOT NULL,
  PRIMARY KEY (`SalidaAlmacen_idSalidaAlmacen`, `Sucursal_idSucursal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALMACEN`.`Entrada_Sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`Entrada_Sucursal` (
  `idEntrada_Sucursal` INT NOT NULL,
  `paquete` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  `SalidaAlmacen_idSalidaAlmacen` INT NOT NULL,
  PRIMARY KEY (`idEntrada_Sucursal`, `SalidaAlmacen_idSalidaAlmacen`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALMACEN`.`paquetes_has_SalidaAlmacen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`paquetes_has_SalidaAlmacen` (
  `paquetes_id_paquetes` INT NOT NULL,
  `SalidaAlmacen_idSalidaAlmacen` INT NOT NULL,
  `Sucursal_idSucursal` INT NOT NULL,
  PRIMARY KEY (`paquetes_id_paquetes`, `SalidaAlmacen_idSalidaAlmacen`, `Sucursal_idSucursal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ALMACEN`.`articulos_has_paquetes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ALMACEN`.`articulos_has_paquetes` (
  `articulos_id_articulo` INT NOT NULL,
  `paquetes_id_paquetes` INT NOT NULL,
  `cantidad` INT NULL,
  PRIMARY KEY (`articulos_id_articulo`, `paquetes_id_paquetes`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
