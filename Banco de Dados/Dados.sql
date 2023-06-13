-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema db_digital
-- -----------------------------------------------------
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Correntista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Correntista` (
  `Id_Correntista` INT NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `CPF` CHAR(11) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `Senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Id_Correntista`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Conta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Conta` (
  `Id_Conta` INT NOT NULL,
  `Numero` INT(20) NOT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  `Senha` VARCHAR(45) NOT NULL,
  `id_correntista` INT NOT NULL,
  PRIMARY KEY (`Id_Conta`),
  INDEX `id_correntista_idx` (`id_correntista` ASC) VISIBLE,
  CONSTRAINT `id_correntista`
    FOREIGN KEY (`id_correntista`)
    REFERENCES `mydb`.`Correntista` (`Id_Correntista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Chave_Pix`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Chave_Pix` (
  `Id_Chave` INT NOT NULL,
  `Chave` VARCHAR(45) NOT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  `id_conta` INT NOT NULL,
  PRIMARY KEY (`Id_Chave`),
  INDEX `id_conta_idx` (`id_conta` ASC) VISIBLE,
  CONSTRAINT `id_conta`
    FOREIGN KEY (`id_conta`)
    REFERENCES `mydb`.`Conta` (`Id_Conta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Transacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Transacao` (
  `Id_Transacao` INT NOT NULL,
  `Valor` DOUBLE NOT NULL,
  `Data_Evento` TIMESTAMP NOT NULL,
  PRIMARY KEY (`Id_Transacao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Conta_Transacao_assoc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Conta_Transacao_assoc` (
  `id_Conta_Transacao` INT NOT NULL,
  `Id_Conta_Remetente` INT NOT NULL,
  `Id_Conta-Destinatario` INT NOT NULL,
  `id_Transacao` INT NOT NULL,
  PRIMARY KEY (`id_Conta_Transacao`),
  INDEX `id_conta_remetente_idx` (`Id_Conta_Remetente` ASC) VISIBLE,
  INDEX `id_conta_destinatario_idx` (`Id_Conta-Destinatario` ASC) VISIBLE,
  INDEX `id_transacao_idx` (`id_Transacao` ASC) VISIBLE,
  CONSTRAINT `id_conta_remetente`
    FOREIGN KEY (`Id_Conta_Remetente`)
    REFERENCES `mydb`.`Conta` (`Id_Conta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_conta_destinatario`
    FOREIGN KEY (`Id_Conta-Destinatario`)
    REFERENCES `mydb`.`Conta` (`Id_Conta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_transacao`
    FOREIGN KEY (`id_Transacao`)
    REFERENCES `mydb`.`Transacao` (`Id_Transacao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
