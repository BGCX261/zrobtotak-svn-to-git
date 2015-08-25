SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;

-- -----------------------------------------------------
-- Table `mydb`.`category`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`category` (
  `id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `description` MEDIUMTEXT NULL ,
  `image` VARCHAR(255) NULL ,
  `categoryup_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_category_category` (`categoryup_id` ASC) ,
  CONSTRAINT `fk_category_category`
    FOREIGN KEY (`categoryup_id` )
    REFERENCES `mydb`.`category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `mydb`.`advice`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`advice` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `slug` VARCHAR(255) NOT NULL ,
  `rating` SMALLINT NULL ,
  `description` TEXT NULL ,
  `instruction` TEXT NULL ,
  `created_at` TIMESTAMP NOT NULL ,
  `active` TINYINT(1)  NOT NULL DEFAULT false ,
  `movie` VARCHAR(255) NULL DEFAULT NULL ,
  `level` SMALLINT NULL ,
  `visited` INT NOT NULL DEFAULT 0 ,
  `title` VARCHAR(255) NOT NULL ,
  `category_id` INT NOT NULL ,
  `category_categoryup_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_advice_category` (`category_id` ASC, `category_categoryup_id` ASC) ,
  CONSTRAINT `fk_advice_category`
    FOREIGN KEY (`category_id` , `category_categoryup_id` )
    REFERENCES `mydb`.`category` (`id` , `categoryup_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `mydb`.`tags`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tags` (
  `id` INT NOT NULL ,
  `names` VARCHAR(45) NOT NULL ,
  `advice_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tags_advice` (`advice_id` ASC) ,
  CONSTRAINT `fk_tags_advice`
    FOREIGN KEY (`advice_id` )
    REFERENCES `mydb`.`advice` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;


-- -----------------------------------------------------
-- Table `mydb`.`images`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`images` (
  `url` VARCHAR(255) NULL ,
  `advice_id` INT NOT NULL ,
  `text` TEXT NULL ,
  `id` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_images_advice` (`advice_id` ASC) ,
  CONSTRAINT `fk_images_advice`
    FOREIGN KEY (`advice_id` )
    REFERENCES `mydb`.`advice` (`id` )
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = ascii;


-- -----------------------------------------------------
-- Table `mydb`.`comments`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`comments` (
  `id` INT NOT NULL ,
  `created_at` TIMESTAMP NOT NULL ,
  `text` MEDIUMTEXT NULL ,
  `rating` SMALLINT NULL ,
  `advice_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_comments_advice` (`advice_id` ASC) ,
  CONSTRAINT `fk_comments_advice`
    FOREIGN KEY (`advice_id` )
    REFERENCES `mydb`.`advice` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_polish_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
