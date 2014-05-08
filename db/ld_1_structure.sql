-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "auto_modeliai" ----------------------------
CREATE TABLE `auto_modeliai` ( 
	`id` MediumInt( 8 ) UNSIGNED NOT NULL, 
	`modelis` VarChar( 60 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, 
	`gamintojo_id` MediumInt( 8 ) UNSIGNED NOT NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB;
-- ---------------------------------------------------------


-- CREATE TABLE "gamintojai" -------------------------------
CREATE TABLE `gamintojai` ( 
	`id` MediumInt( 8 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`pavadinimas` VarChar( 120 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 103;
-- ---------------------------------------------------------


-- CREATE TABLE "imokos" -----------------------------------
CREATE TABLE `imokos` ( 
	`id` MediumInt( 8 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`suma` Float( 12, 0 ) NOT NULL, 
	`imoketa` Date NULL, 
	`paskirtis` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 107;
-- ---------------------------------------------------------


-- CREATE TABLE "imokos_uz_auto" ---------------------------
CREATE TABLE `imokos_uz_auto` ( 
	`id` MediumInt( 8 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`auto_id` MediumInt( 8 ) UNSIGNED NOT NULL, 
	`imokos_id` MediumInt( 8 ) UNSIGNED NOT NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 16;
-- ---------------------------------------------------------


-- CREATE TABLE "migrations" -------------------------------
CREATE TABLE `migrations` ( 
	`migration` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, 
	`batch` Int( 11 ) NOT NULL
 )
CHARACTER SET = utf8
COLLATE = utf8_unicode_ci
ENGINE = InnoDB;
-- ---------------------------------------------------------


-- CREATE TABLE "registruoti_auto" -------------------------
CREATE TABLE `registruoti_auto` ( 
	`id` MediumInt( 8 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`modelio_id` MediumInt( 8 ) UNSIGNED NULL, 
	`savininko_id` MediumInt( 8 ) UNSIGNED NULL, 
	`valst_nr` VarChar( 15 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, 
	`kebulo_nr` VarChar( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, 
	`iregistruota` Date NOT NULL, 
	`auto_rusis` Enum( 'lengvasis', 'krovininis', 'keleivinis' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 27;
-- ---------------------------------------------------------


-- CREATE TABLE "savininkai" -------------------------------
CREATE TABLE `savininkai` ( 
	`id` MediumInt( 8 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`vardas` VarChar( 45 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, 
	`pavarde` VarChar( 80 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, 
	`asmens_kodas` Decimal( 20, 0 ) UNSIGNED NOT NULL, 
	`lytis` Enum( 'vyras', 'moteris', 'kita' ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
	 PRIMARY KEY ( `id` )
, 
	CONSTRAINT `h` UNIQUE( `asmens_kodas` ) )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 107;
-- ---------------------------------------------------------


-- CREATE TABLE "tech_apziura" -----------------------------
CREATE TABLE `tech_apziura` ( 
	`id` MediumInt( 8 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`auto_id` MediumInt( 8 ) UNSIGNED NOT NULL, 
	`tech_apziuros_data` Date NOT NULL, 
	`komentarai` Text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, 
	`atlikta` TinyInt( 4 ) NULL, 
	`tech_apziura_galioja_iki` Date NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 107;
-- ---------------------------------------------------------


-- CREATE INDEX "gamintojo_id" -----------------------------
CREATE INDEX `gamintojo_id` USING BTREE ON `auto_modeliai`( `gamintojo_id` );
-- ---------------------------------------------------------


-- CREATE INDEX "auto_id" ----------------------------------
CREATE INDEX `auto_id` USING BTREE ON `imokos_uz_auto`( `auto_id` );
-- ---------------------------------------------------------


-- CREATE INDEX "imokos_id" --------------------------------
CREATE INDEX `imokos_id` USING BTREE ON `imokos_uz_auto`( `imokos_id` );
-- ---------------------------------------------------------


-- CREATE INDEX "modelio_id" -------------------------------
CREATE INDEX `modelio_id` USING BTREE ON `registruoti_auto`( `modelio_id` );
-- ---------------------------------------------------------


-- CREATE INDEX "savininko_id" -----------------------------
CREATE INDEX `savininko_id` USING BTREE ON `registruoti_auto`( `savininko_id` );
-- ---------------------------------------------------------


-- CREATE INDEX "auto_id" ----------------------------------
CREATE INDEX `auto_id` USING BTREE ON `tech_apziura`( `auto_id` );
-- ---------------------------------------------------------


-- CREATE LINK "auto_modeliai_ibfk_1" ----------------------
ALTER TABLE `auto_modeliai` ADD CONSTRAINT `auto_modeliai_ibfk_1` FOREIGN KEY ( `gamintojo_id` ) REFERENCES `gamintojai`( `id` ) ON DELETE Cascade ON UPDATE Cascade;
-- ---------------------------------------------------------


-- CREATE LINK "imokos_uz_auto_ibfk_1" ---------------------
ALTER TABLE `imokos_uz_auto` ADD CONSTRAINT `imokos_uz_auto_ibfk_1` FOREIGN KEY ( `auto_id` ) REFERENCES `registruoti_auto`( `id` ) ON DELETE Cascade ON UPDATE Cascade;
-- ---------------------------------------------------------


-- CREATE LINK "imokos_uz_auto_ibfk_2" ---------------------
ALTER TABLE `imokos_uz_auto` ADD CONSTRAINT `imokos_uz_auto_ibfk_2` FOREIGN KEY ( `imokos_id` ) REFERENCES `imokos`( `id` ) ON DELETE Cascade ON UPDATE Cascade;
-- ---------------------------------------------------------


-- CREATE LINK "registruoti_auto_ibfk_1" -------------------
ALTER TABLE `registruoti_auto` ADD CONSTRAINT `registruoti_auto_ibfk_1` FOREIGN KEY ( `savininko_id` ) REFERENCES `savininkai`( `id` ) ON DELETE Cascade ON UPDATE Cascade;
-- ---------------------------------------------------------


-- CREATE LINK "registruoti_auto_ibfk_3" -------------------
ALTER TABLE `registruoti_auto` ADD CONSTRAINT `registruoti_auto_ibfk_3` FOREIGN KEY ( `modelio_id` ) REFERENCES `auto_modeliai`( `id` ) ON DELETE Cascade ON UPDATE Cascade;
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


