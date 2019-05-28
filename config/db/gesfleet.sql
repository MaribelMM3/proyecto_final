-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema gesfleet
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `gesfleet` ;

-- -----------------------------------------------------
-- Schema gesfleet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gesfleet` DEFAULT CHARACTER SET utf8 ;
USE `gesfleet` ;

-- -----------------------------------------------------
-- Table `gesfleet`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gesfleet`.`users` ;

CREATE TABLE IF NOT EXISTS `gesfleet`.`users` (
  `ID` INT(11) NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(100) NULL DEFAULT NULL,
  `psw` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`ID`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `gesfleet`.`users_reg`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gesfleet`.`users_reg` ;

CREATE TABLE IF NOT EXISTS `gesfleet`.`users_reg` (
  `name_user` VARCHAR(100) NOT NULL,
  `data_reg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`name_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `gesfleet`;

DELIMITER $$

USE `gesfleet`$$
DROP TRIGGER IF EXISTS `gesfleet`.`gesfleet` $$
USE `gesfleet`$$
CREATE
DEFINER=`root`@`localhost`
TRIGGER `gesfleet`.`gesfleet`
AFTER INSERT ON `gesfleet`.`users`
FOR EACH ROW
BEGIN
	insert into users_reg values (new.user, default);
END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Table `gesfleet`.`select_prov` - //Popup REGISTRAR VEHÍCULO desplegable abuelo
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gesfleet`.`select_terr` ;

CREATE TABLE IF NOT EXISTS `gesfleet`.`select_terr` (
  `id_terr` INT NOT NULL AUTO_INCREMENT,
  `nom_terr` VARCHAR(45) NULL,
  PRIMARY KEY (`id_terr`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gesfleet`.`select_prov` - //Popup REGISTRAR VEHÍCULO desplegable padre
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gesfleet`.`select_prov` ;

CREATE TABLE IF NOT EXISTS `gesfleet`.`select_prov` (
  `id_prov` INT NOT NULL AUTO_INCREMENT,
  `nom_prov` VARCHAR(45) NULL,
  `select_terr_id_terr` INT NOT NULL,
  PRIMARY KEY (`id_prov`, `select_terr_id_terr`),
  INDEX `fk_select_prov_select_terr_idx` (`select_terr_id_terr` ASC),
  CONSTRAINT `fk_select_prov_select_terr`
    FOREIGN KEY (`select_terr_id_terr`)
    REFERENCES `gesfleet`.`select_terr` (`id_terr`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gesfleet`.`select_project` - //Popup REGISTRAR VEHÍCULO desplegable nieto
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gesfleet`.`select_project` ;

CREATE TABLE IF NOT EXISTS `gesfleet`.`select_project` (
  `id_project` INT NOT NULL AUTO_INCREMENT,
  `nom_project` VARCHAR(45) NULL,
  `select_prov_id_prov` INT NOT NULL,
  PRIMARY KEY (`id_project`, `select_prov_id_prov`),
  INDEX `fk_select_project_select_prov_idx` (`select_prov_id_prov` ASC),
  CONSTRAINT `fk_select_project_select_prov`
    FOREIGN KEY (`select_prov_id_prov`)
    REFERENCES `gesfleet`.`select_prov` (`id_prov`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `gesfleet`.`inventario` - //Vista de tabla (cuerpo) vehículos en Inventario
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gesfleet`.`inventario` ;

CREATE TABLE IF NOT EXISTS `inventario` (
  `id_vehiculo` int(255) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(7) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `territorio` varchar(100) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `proyecto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_vehiculo`),
  UNIQUE KEY `Matricula` (`matricula`)
) ENGINE=InnoDB;

