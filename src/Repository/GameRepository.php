<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\Console;
use App\Entity\Game;

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
      
        $sql = "INSERT INTO video_game (title, type, publish_at, id_console) VALUES (:title, :type, :publish_at, :id_console)";

        // Préparer la requête
        $query = $this->connect->prepare($sql);

        $query->bindValue(':title', $game->getTitle(), \PDO::PARAM_STR);
        $query->bindValue(':type', $game->getType(), \PDO::PARAM_STR);
        $query->bindValue(':publish_at', $game->getPublishAt(), \PDO::PARAM_STR);
        
        // Si getConsole() retourne un objet Console, on récupère son ID. 
        // Si getConsole() retourne directement un entier/ID, adapte selon ton entité.
        $query->bindValue(':id_console', $game->getConsole()->getId(), \PDO::PARAM_INT);

        //Exécuter la requête
        $query->execute();
    }
    
    /**
     * Méthode qui retourne la liste des jeux (Game)
     * @return array<Game> Retourne le tableau des jeux (Game)
     * @throws \Exception Erreurs SQL
     */
   
        public function findAllGames(): array 
    {
        $sql = "SELECT video_game.title, video_game.type, video_game.publish_at, console.name AS console_name 
                FROM video_game 
                INNER JOIN console ON video_game.id_console = console.id";
                
        $query = $this->connect->prepare($sql);
        $query->execute();
        
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
