
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- login
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login`
(
    `loginIndex` INTEGER NOT NULL AUTO_INCREMENT,
    `uname` VARCHAR(255),
    `pass` VARCHAR(255),
    PRIMARY KEY (`loginIndex`),
    INDEX `uname_idx` (`uname`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- todo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `todo`;

CREATE TABLE `todo`
(
    `todoIndex` INTEGER NOT NULL AUTO_INCREMENT,
    `uname` VARCHAR(255) NOT NULL,
    `title` VARCHAR(255),
    `content` TEXT,
    `dateOfCreation` DATETIME,
    PRIMARY KEY (`todoIndex`),
    INDEX `uname` (`uname`),
    CONSTRAINT `todo_ibfk_1`
        FOREIGN KEY (`uname`)
        REFERENCES `login` (`uname`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
