-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema u300697298_almcn
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema u300697298_almcn
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `u300697298_almcn` DEFAULT CHARACTER SET utf8 ;
USE `u300697298_almcn` ;

-- -----------------------------------------------------
-- Table `u300697298_almcn`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`usuarios` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `rol` TINYINT(1) NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u300697298_almcn`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`categorias` (
  `id_categorias` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  PRIMARY KEY (`id_categorias`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u300697298_almcn`.`escalas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`escalas` (
  `idescalas` INT NOT NULL AUTO_INCREMENT,
  `nomEscala` VARCHAR(10) NULL,
  PRIMARY KEY (`idescalas`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u300697298_almcn`.`articulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`articulos` (
  `id_articulo` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `descripcion` VARCHAR(255) NULL,
  `tamaño` VARCHAR(45) NULL,
  `categorias_id_categorias` INT NOT NULL,
  `escalas_idescalas` INT NOT NULL,
  PRIMARY KEY (`id_articulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u300697298_almcn`.`paquetes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`paquetes` (
  `id_paquetes` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  `canitdad` INT NULL,
  `articulos_id_articulo` INT NOT NULL,
  PRIMARY KEY (`id_paquetes`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u300697298_almcn`.`Existencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`Existencias` (
  `idExistencias` INT NULL,
  `Cont` INT NULL,
  `articulos_id_articulo` INT NOT NULL,
  `fecha` DATE NULL,
  PRIMARY KEY (`idExistencias`, `articulos_id_articulo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u300697298_almcn`.`SalidaAlmacen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`SalidaAlmacen` (
  `idSalidaAlmacen` INT NULL,
  `fecha` DATE NULL,
  PRIMARY KEY (`idSalidaAlmacen`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u300697298_almcn`.`Sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`Sucursal` (
  `idSucursal` INT NOT NULL,
  `NomSucursal` VARCHAR(45) NULL,
  PRIMARY KEY (`idSucursal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u300697298_almcn`.`SalidaAlmacen_has_Sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`SalidaAlmacen_has_Sucursal` (
  `SalidaAlmacen_idSalidaAlmacen` INT NOT NULL,
  `Sucursal_idSucursal` INT NOT NULL,
  PRIMARY KEY (`SalidaAlmacen_idSalidaAlmacen`, `Sucursal_idSucursal`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u300697298_almcn`.`Entrada_Sucursal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`Entrada_Sucursal` (
  `idEntrada_Sucursal` INT NOT NULL,
  `paquete` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  `SalidaAlmacen_idSalidaAlmacen` INT NOT NULL,
  PRIMARY KEY (`idEntrada_Sucursal`, `SalidaAlmacen_idSalidaAlmacen`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `u300697298_almcn`.`paquetes_has_SalidaAlmacen`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `u300697298_almcn`.`paquetes_has_SalidaAlmacen` (
  `paquetes_id_paquetes` INT NOT NULL,
  `SalidaAlmacen_idSalidaAlmacen` INT NOT NULL,
  `Sucursal_idSucursal` INT NOT NULL,
  PRIMARY KEY (`paquetes_id_paquetes`, `SalidaAlmacen_idSalidaAlmacen`, `Sucursal_idSucursal`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
