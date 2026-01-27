CREATE TABLE `sorteomvc`.`usuario` (
  `usuarioId` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NULL,
  `telefono` INT NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(10) NULL,
  `token` VARCHAR(15) NULL,
  `admin` TINYINT(1) NULL,
  `confirmacion` TINYINT(1) NULL,
  PRIMARY KEY (`usuarioId`));


CREATE TABLE `sorteomvc`.`producto` (
  `productoId` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NULL,
  `precio` DECIMAL(10,2) NULL,
  `fecha` DATE NULL,
  `descripcion` VARCHAR(255) NULL,
  `imagen` VARCHAR(255) NULL,
  PRIMARY KEY (`productoId`));

CREATE TABLE `sorteomvc`.`compra` (
  `compraId` INT NOT NULL AUTO_INCREMENT,
  `productoId` INT NOT NULL,
  `usuarioId` INT NOT NULL,
  `numero` INT NULL,
  `precioTotal` DECIMAL(10,2) NULL,
  `compraConfirmada` TINYINT(1) NULL,
  PRIMARY KEY (`compraId`),
  INDEX `productoId_idx` (`productoId` ASC),
  INDEX `usuarioId_idx` (`usuarioId` ASC) ,
  CONSTRAINT `productoId`
    FOREIGN KEY (`productoId`)
    REFERENCES `sorteomvc`.`producto` (`productoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `usuarioId`
    FOREIGN KEY (`usuarioId`)
    REFERENCES `sorteomvc`.`usuario` (`usuarioId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `sorteomvc`.`sorteo` (
  `sorteoId` INT NOT NULL AUTO_INCREMENT,
  `productoId` INT NOT NULL,
  `compraId` INT NOT NULL,
  `fechaSorteo` DATE NULL,
  `numeroGanador` INT NULL,
  PRIMARY KEY (`sorteoId`),
  INDEX `idx_sorteo_producto` (`productoId`),
  INDEX `idx_sorteo_compra` (`compraId`),
  CONSTRAINT `fk_sorteo_producto`
    FOREIGN KEY (`productoId`)
    REFERENCES `sorteomvc`.`producto` (`productoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sorteo_compra`
    FOREIGN KEY (`compraId`)
    REFERENCES `sorteomvc`.`compra` (`compraId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);
