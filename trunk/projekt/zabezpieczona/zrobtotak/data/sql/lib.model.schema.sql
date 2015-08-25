
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- categories
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;


CREATE TABLE `categories`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`slug` VARCHAR(255)  NOT NULL,
	`description` TEXT,
	`image` VARCHAR(255),
	`categoryup_id` INTEGER,
	PRIMARY KEY (`id`),
	UNIQUE KEY `categories_U_1` (`name`),
	UNIQUE KEY `categories_U_2` (`slug`),
	INDEX `I_referenced_advice_FK_2_1` (`categoryup_id`),
	INDEX `categories_FI_1` (`categoryup_id`),
	CONSTRAINT `categories_FK_1`
		FOREIGN KEY (`categoryup_id`)
		REFERENCES `advice` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tags
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;


CREATE TABLE `tags`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`names` VARCHAR(255)  NOT NULL,
	`advice_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `tags_FI_1` (`advice_id`),
	CONSTRAINT `tags_FK_1`
		FOREIGN KEY (`advice_id`)
		REFERENCES `advice` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- images
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `images`;


CREATE TABLE `images`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`url` VARCHAR(255)  NOT NULL,
	`text` VARCHAR(400),
	`advice_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `images_FI_1` (`advice_id`),
	CONSTRAINT `images_FK_1`
		FOREIGN KEY (`advice_id`)
		REFERENCES `advice` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- comments
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;


CREATE TABLE `comments`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`created_at` DATETIME,
	`text` TEXT,
	`rating` SMALLINT,
	`advice_id` INTEGER,
	`user_id` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `comments_FI_1` (`advice_id`),
	CONSTRAINT `comments_FK_1`
		FOREIGN KEY (`advice_id`)
		REFERENCES `advice` (`id`)
		ON UPDATE CASCADE
		ON DELETE CASCADE,
	INDEX `comments_FI_2` (`user_id`),
	CONSTRAINT `comments_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE SET NULL
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- advice
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `advice`;


CREATE TABLE `advice`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`slug` VARCHAR(400)  NOT NULL,
	`rating` SMALLINT default 0,
	`description` TEXT,
	`instruction` TEXT,
	`created_at` DATETIME,
	`active` TINYINT default 0,
	`movie` VARCHAR(400),
	`level` SMALLINT,
	`visited` INTEGER default 1,
	`title` VARCHAR(400)  NOT NULL,
	`category_id` INTEGER,
	`category_upcategory_id` INTEGER,
	`user_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `advice_FI_1` (`category_id`),
	CONSTRAINT `advice_FK_1`
		FOREIGN KEY (`category_id`)
		REFERENCES `categories` (`id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `advice_FI_2` (`category_upcategory_id`),
	CONSTRAINT `advice_FK_2`
		FOREIGN KEY (`category_upcategory_id`)
		REFERENCES `categories` (`categoryup_id`)
		ON UPDATE SET NULL
		ON DELETE SET NULL,
	INDEX `advice_FI_3` (`user_id`),
	CONSTRAINT `advice_FK_3`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
