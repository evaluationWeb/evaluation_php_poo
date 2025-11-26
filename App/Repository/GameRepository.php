<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Console;
use App\Model\Game;

class GameRepository
{
    //Attribut
    private \PDO $connect;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->connect = (new Mysql)->connectBDD();
    }

    //Méthodes

    /**
     * Méthode qui ajoute une jeu (Game) en BDD
     * @return void
     * @throws \Exception Erreurs SQL
     */
    public function saveGame(Game $game): void
    {
        try {
            $sql = "INSERT INTO video_games (name, type, publish_at, id_console) 
                    VALUES (:title, :type, :publish_at, :console_id)";

            $stmt = $this->connect->prepare($sql);

            $stmt->bindValue(':title', $game->getTitle(), \PDO::PARAM_STR);
            $stmt->bindValue(':type', $game->getType(), \PDO::PARAM_STR);

            $publishAt = $game->getPublishAt()->format('Y-m-d');
            $stmt->bindValue(':publish_at', $publishAt, \PDO::PARAM_STR);

            $stmt->bindValue(':console_id', $game->getConsole()->getConsoleId(), \PDO::PARAM_INT);

            $stmt->execute();
        } catch (\PDOException $e) {
            throw new \Exception("Erreur SQL lors de l’insertion du jeu : " . $e->getMessage());
        }
    }

    /**
     * Méthode qui retourne la liste des jeux (Game)
     * @return array<Game> Retourne le tableau des jeux (Game)
     * @throws \Exception Erreurs SQL
     */
    public function findAllGames(): array
    {
        try {
            $sql = "SELECT vg.id, vg.name AS title, vg.type, vg.publish_at,
                       c.id AS console_id, c.name AS console_name, c.manufacturer
                FROM video_games vg
                INNER JOIN console c ON vg.id_console = c.id";

            $stmt = $this->connect->prepare($sql);
            $stmt->execute();

            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $games = [];
            foreach ($rows as $row) {
                $console = new \App\Model\Console(
                    (int) $row['console_id'],
                    $row['console_name'],
                    $row['manufacturer']
                );

                $games[] = new \App\Model\Game(
                    (int) $row['id'],
                    $row['title'],
                    $row['type'],
                    new \DateTime($row['publish_at']),
                    $console
                );
            }

            return $games;
        } catch (\PDOException $e) {
            throw new \Exception("Erreur SQL lors de la récupération des jeux : " . $e->getMessage());
        }
    }
}
