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
    public function addGame(Game $game): void
    {
        $sql = "INSERT INTO video_game (title, type, publish_at, console_id) VALUES (:title, :type, :publish_at, :console_id)";
        $req = $this->connect->prepare($sql);
        $req->bindValue(":title", $game->getTitle(), \PDO::PARAM_STR);
        $req->bindValue(":type", $game->getType(), \PDO::PARAM_STR);
        $req->bindValue(":publish_at", $game->getPublishAt()->format("Y-m-d"), \PDO::PARAM_STR);
        $req->bindValue(":console_id", $game->getConsoleId(), \PDO::PARAM_INT);
        $req->execute();
    }

    /**
     * Méthode qui retourne la liste des jeux (Game)
     * @return array<Game> Retourne le tableau des jeux (Game)
     * @throws \Exception Erreurs SQL
     */
    public function findAllGames(): array
    {
        $sql = "SELECT video_game.id, title, type, publish_at, console.name AS console_name FROM video_game INNER JOIN console ON video_game.console_id = console.id";
        $req = $this->connect->prepare($sql);
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
}
