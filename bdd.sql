-- Ecrire votre code SQL dans ce fichier
CREATE DATABASE IF NOT EXISTS games;
use games;

CREATE TABLE console(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    manufacturer VARCHAR(100) NOT NULL
);

CREATE TABLE video_game (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    type VARCHAR(100) NOT NULL,
    publish_at DATE NOT NULL,
    console_id INT NOT NULL,
    FOREIGN Key (console_id) REFERENCES console(id)
);

INSERT INTO console (name,manufacturer) VALUES
('PlayStation 5', 'Sony'),
('Switch', 'Nintendo'),
('Xbox Series X', 'Microsoft'),
('Steam Deck', 'Valve');