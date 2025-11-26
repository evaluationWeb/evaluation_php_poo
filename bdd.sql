CREATE DATABASE IF NOT EXISTS games CHARSET utf8mb4;
USE games;

CREATE TABLE IF NOT EXISTS console(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    name VARCHAR(50) NOT NULL,
    manufacturer VARCHAR(50) NOT NULL
)ENGINE=InnoDB;

-- le MLD suggérait un type VARCHAR(50) pour l'identifiant, j'ai choisi un INT AUTO_INCREMENT
-- pour rester cohérents avec la classe Game (id:int) et les bonnes pratiques SQL.
CREATE TABLE IF NOT EXISTS video_game(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title VARCHAR(50) NOT NULL,
    type VARCHAR(50) NOT NULL,
    publish_at DATE NOT NULL,
    -- Choix du nom de la clé étrangère : "id_console" pour suivre le MLD et les conventions utilisées durant les cours.
    id_console INT NOT NULL
)ENGINE=InnoDB;

ALTER TABLE video_game
ADD CONSTRAINT fk_video_game_console
FOREIGN KEY(id_console)
REFERENCES console(id);

INSERT INTO console (name, manufacturer) VALUES
('PlayStation 5', 'Sony'),
('Switch', 'Nintendo'),
('Xbox Series X', 'Microsoft'),
('Steam Deck', 'Valve');