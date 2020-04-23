﻿--
-- Script was generated by Devart dbForge Studio 2019 for MySQL, Version 8.2.23.0
-- Product home page: http://www.devart.com/dbforge/mysql/studio
-- Script date 23.04.2020 17:11:11
-- Server version: 5.5.5-10.3.13-MariaDB-log
-- Client version: 4.1
--

-- 
-- Disable foreign keys
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Set SQL mode
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE create_product;

--
-- Drop table `product`
--
DROP TABLE IF EXISTS product;

--
-- Drop table `recept`
--
DROP TABLE IF EXISTS recept;

--
-- Drop table `gruppa`
--
DROP TABLE IF EXISTS gruppa;

--
-- Drop table `operation`
--
DROP TABLE IF EXISTS operation;

--
-- Drop table `postavshik`
--
DROP TABLE IF EXISTS postavshik;

--
-- Drop table `user`
--
DROP TABLE IF EXISTS user;

--
-- Set default database
--
USE create_product;

--
-- Create table `user`
--
CREATE TABLE user (
  user_id INT(11) NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(55) DEFAULT NULL,
  lastname VARCHAR(55) DEFAULT NULL,
  strana VARCHAR(55) DEFAULT NULL,
  god VARCHAR(55) DEFAULT NULL,
  PRIMARY KEY (user_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `postavshik`
--
CREATE TABLE postavshik (
  postavshik_id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(255) DEFAULT NULL,
  adress VARCHAR(255) DEFAULT NULL,
  telefon VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (postavshik_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 2,
AVG_ROW_LENGTH = 16384,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `operation`
--
CREATE TABLE operation (
  operation_id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (operation_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `gruppa`
--
CREATE TABLE gruppa (
  group_id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  PRIMARY KEY (group_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 8192,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create table `recept`
--
CREATE TABLE recept (
  recept_id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  opisanie VARCHAR(255) DEFAULT NULL,
  user_id INT(11) DEFAULT NULL,
  operation_id INT(11) DEFAULT NULL,
  group_id INT(11) DEFAULT NULL,
  postavshik_id INT(11) DEFAULT NULL,
  PRIMARY KEY (recept_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE recept 
  ADD CONSTRAINT FK_recept_group_group_id FOREIGN KEY (group_id)
    REFERENCES gruppa(group_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE recept 
  ADD CONSTRAINT FK_recept_operation_operation_id FOREIGN KEY (operation_id)
    REFERENCES operation(operation_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE recept 
  ADD CONSTRAINT FK_recept_postavshik_postavshik_id FOREIGN KEY (postavshik_id)
    REFERENCES postavshik(postavshik_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create foreign key
--
ALTER TABLE recept 
  ADD CONSTRAINT FK_recept_user_user_id FOREIGN KEY (user_id)
    REFERENCES user(user_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Create table `product`
--
CREATE TABLE product (
  product_id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(50) DEFAULT NULL,
  recept_id INT(11) DEFAULT NULL,
  PRIMARY KEY (product_id)
)
ENGINE = INNODB,
AUTO_INCREMENT = 4,
AVG_ROW_LENGTH = 5461,
CHARACTER SET utf8mb4,
COLLATE utf8mb4_unicode_ci;

--
-- Create foreign key
--
ALTER TABLE product 
  ADD CONSTRAINT FK_product_recept_recept_id FOREIGN KEY (recept_id)
    REFERENCES recept(recept_id) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- 
-- Dumping data for table user
--
INSERT INTO user VALUES
(1, 'fff', ' aaa', 'kazakstan', '2015');

-- 
-- Dumping data for table postavshik
--
INSERT INTO postavshik VALUES
(1, 'fff', 'fff', '88005553535');

-- 
-- Dumping data for table operation
--
INSERT INTO operation VALUES
(1, 'Выпекать'),
(2, 'Сеять'),
(3, 'Крошить  ');

-- 
-- Dumping data for table gruppa
--
INSERT INTO gruppa VALUES
(1, 'Выпечка'),
(2, 'Овощи'),
(3, 'Фрукты');

-- 
-- Dumping data for table recept
--
INSERT INTO recept VALUES
(1, 'fdf', 'dfdf', 1, 1, 1, 1),
(2, 'fdf', 'dfdf', 1, 1, 1, 1),
(3, 'fsdfs', 'dsfdsfs', 1, 2, 2, 1);

-- 
-- Dumping data for table product
--
INSERT INTO product VALUES
(1, '1111', 1),
(2, '1111', 1),
(3, 'fdsfsf', 1);

-- 
-- Restore previous SQL mode
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Enable foreign keys
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;