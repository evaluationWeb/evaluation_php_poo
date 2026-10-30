-- 1. Création et sélection de la base de données
CREATE DATABASE IF NOT EXISTS games;
USE games;

-- 2. Création de la table console
CREATE TABLE IF NOT EXISTS console (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    manufacturer VARCHAR(50) NOT NULL
);

-- 3. Création de la table video_game (avec la clé étrangère)
CREATE TABLE IF NOT EXISTS video_game (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    type VARCHAR(50) NOT NULL,
    publish_at DATE NOT NULL,
    id_console INT NOT NULL,
    CONSTRAINT fk_video_game_console FOREIGN KEY (id_console) REFERENCES console(id)
);

-- 4. Insertion des 4 consoles de base
INSERT INTO console (name, manufacturer) VALUES 
('PlayStation 5', 'Sony'),
('Switch', 'Nintendo'),
('Xbox Series X', 'Microsoft'),
('Steam Deck', 'Valve');