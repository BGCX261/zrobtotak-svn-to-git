SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


-- -----------------------------------------------------
-- Table `uzytkownicy`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `uzytkownicy` (
  `id_uzytkownika` INT NOT NULL AUTO_INCREMENT ,
  `haslo` VARCHAR(20) NOT NULL ,
  `email` VARCHAR(40) NOT NULL ,
  `zdjecie` VARCHAR(60) NULL ,
  `imie` VARCHAR(20) NULL ,
  `nazwisko` VARCHAR(45) NULL ,
  `miasto` VARCHAR(40) NULL ,
  `o_sobie` VARCHAR(255) NULL ,
  `zainteresowania` VARCHAR(255) NULL ,
  PRIMARY KEY (`id_uzytkownika`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `kategorie`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `kategorie` (
  `nr_kategorii` INT NOT NULL ,
  `nazwa` VARCHAR(45) NULL ,
  `nr_nadkategorii` INT NOT NULL ,
  PRIMARY KEY (`nr_kategorii`) ,
  INDEX `fk_kategorie_kategorie1` (`nr_nadkategorii` ASC) ,
  CONSTRAINT `fk_kategorie_kategorie1`
    FOREIGN KEY (`nr_nadkategorii` )
    REFERENCES `kategorie` (`nr_kategorii` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `porady`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `porady` (
  `nr_porady` INT NOT NULL ,
  `wstep` VARCHAR(45) NULL ,
  `tresc` TEXT NULL ,
  `liczba_odslon` INT NULL ,
  `termin_dodania` DATE NULL ,
  `stopien_trudnosci` VARCHAR(15) NULL ,
  `autor` INT NOT NULL ,
  `nr_kategorii` INT NOT NULL ,
  PRIMARY KEY (`nr_porady`) ,
  INDEX `fk_porady_uzytkownicy1` (`autor` ASC) ,
  INDEX `fk_porady_kategorie1` (`nr_kategorii` ASC) ,
  CONSTRAINT `fk_porady_uzytkownicy1`
    FOREIGN KEY (`autor` )
    REFERENCES `uzytkownicy` (`id_uzytkownika` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_porady_kategorie1`
    FOREIGN KEY (`nr_kategorii` )
    REFERENCES `kategorie` (`nr_kategorii` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `komentarze`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `komentarze` (
  `nr_komentarza` INT NOT NULL ,
  `tresc` TEXT NULL ,
  `id_uzytkownika` INT NOT NULL ,
  `nr_porady` INT NOT NULL ,
  PRIMARY KEY (`nr_komentarza`) ,
  INDEX `fk_komentarze_uzytkownicy1` (`id_uzytkownika` ASC) ,
  INDEX `fk_komentarze_porady1` (`nr_porady` ASC) ,
  CONSTRAINT `fk_komentarze_uzytkownicy1`
    FOREIGN KEY (`id_uzytkownika` )
    REFERENCES `uzytkownicy` (`id_uzytkownika` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_komentarze_porady1`
    FOREIGN KEY (`nr_porady` )
    REFERENCES `porady` (`nr_porady` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oceny`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `oceny` (
  `id_uzytkownika` INT NOT NULL ,
  `nr_porady` INT NOT NULL ,
  `wartosc` INT NOT NULL ,
  INDEX `fk_oceny_uzytkownicy1` (`id_uzytkownika` ASC) ,
  INDEX `fk_oceny_porady1` (`nr_porady` ASC) ,
  PRIMARY KEY (`id_uzytkownika`, `nr_porady`) ,
  CONSTRAINT `fk_oceny_uzytkownicy1`
    FOREIGN KEY (`id_uzytkownika` )
    REFERENCES `uzytkownicy` (`id_uzytkownika` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_oceny_porady1`
    FOREIGN KEY (`nr_porady` )
    REFERENCES `porady` (`nr_porady` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tagi`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tagi` (
  `nr_taga` INT NOT NULL ,
  `nazwa` VARCHAR(45) NULL ,
  PRIMARY KEY (`nr_taga`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oznaczenia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `oznaczenia` (
  `tagi_nr_taga` INT NOT NULL ,
  `porady_nr_porady` INT NOT NULL ,
  PRIMARY KEY (`tagi_nr_taga`, `porady_nr_porady`) ,
  INDEX `fk_tagi_has_porady_tagi1` (`tagi_nr_taga` ASC) ,
  INDEX `fk_tagi_has_porady_porady1` (`porady_nr_porady` ASC) ,
  CONSTRAINT `fk_tagi_has_porady_tagi1`
    FOREIGN KEY (`tagi_nr_taga` )
    REFERENCES `tagi` (`nr_taga` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tagi_has_porady_porady1`
    FOREIGN KEY (`porady_nr_porady` )
    REFERENCES `porady` (`nr_porady` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
