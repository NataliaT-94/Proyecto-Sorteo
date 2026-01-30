CREATE SCHEMA `sorteomvc` ;

CREATE TABLE `sorteomvc`.`cliente` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `telefono` INT NULL,
  `precioTotal` DECIMAL(10,2) NULL,
  `compraConfirmada` TINYINT(1) NULL,
  PRIMARY KEY (`id`));


CREATE TABLE `sorteomvc`.`producto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(255) NULL,
  `fecha` DATE NULL,
  `imagen` VARCHAR(255) NULL,
  `precio` INT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `sorteomvc`.`numero` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` INT NULL,
  `vendido` TINYINT(1) NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `sorteomvc`.`compranumero` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `clienteId` INT NOT NULL,
  `numeroId` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `clienteId_idx` (`clienteId` ASC) ,
  INDEX `numeroId_idx` (`numeroId` ASC) ,
  CONSTRAINT `clienteId`
    FOREIGN KEY (`clienteId`)
    REFERENCES `sorteomvc`.`cliente` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `numeroId`
    FOREIGN KEY (`numeroId`)
    REFERENCES `sorteomvc`.`numero` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);