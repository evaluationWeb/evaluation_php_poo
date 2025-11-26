-- Ecrire votre code SQL dans ce fichier
CREATE DATABASE IF NOT EXISTS games CHARSET utf8mb4;
USE games;

CREATE TABLE IF NOT EXISTS `console`(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`name` VARCHAR(50) UNIQUE NOT NULL,
manufacturer VARCHAR(50)
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS video_games(
id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
`name` VARCHAR(50) UNIQUE NOT NULL,
`type` VARCHAR(25),
publish_at DATETIME,
id_console INT,
FOREIGN KEY(id_console) REFERENCES `console`(id)
)ENGINE=InnoDB;

INSERT INTO `console` (`name`, manufacturer) 
VALUES ('PlayStation 5', 'Sony'),
       ('Switch', 'Nintendo'),
       ('Xbox Series X', 'Microsoft'),
       ('Steam Deck', 'Valve');