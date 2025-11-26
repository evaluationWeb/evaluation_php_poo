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
     * Méthode qui ajoute un jeu (Game) en BDD.
     * @param Game $game Jeu à ajouter
     * @return void
     * @throws \Exception Erreurs SQL
     */
    public function saveGame(Game $game): void
    {
        try {
            //Récupération de la date de publication au format SQL (YYYY-MM-DD)
            $publishAt = $game->getPublishAt();
            $publishAtFormatted = null;
            if ($publishAt instanceof \DateTimeInterface) {
                $publishAtFormatted = $publishAt->format('Y-m-d');
            }

            //Récupération de la console associée pour la clé étrangère id_console
            $console = $game->getConsole();
            $idConsole = $console?->getId();

            //Requête SQL d'insertion du jeu
            $sql = "INSERT INTO video_game(title, type, publish_at, id_console) VALUES(:title, :type, :publish_at, :id_console)";

            //Préparation de la requête
            $req = $this->connect->prepare($sql);

            //Assignation des paramètres avec les getters du modèle Game
            $req->bindValue(':title', $game->getTitle(), \PDO::PARAM_STR);
            $req->bindValue(':type', $game->getType(), \PDO::PARAM_STR);
            $req->bindValue(':publish_at', $publishAtFormatted, \PDO::PARAM_STR);
            $req->bindValue(':id_console', $idConsole, \PDO::PARAM_INT);

            //Exécution de la requête
            $req->execute();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
    
    /**
     * Méthode qui retourne la liste des jeux.
     * @return array Retourne le tableau des jeux
     * @throws \Exception Erreurs SQL
     */
    public function findAllGames(): array 
    {
        try {
            //Requête SQL : récupérer tous les jeux avec le nom de la console associée
            $sql = "SELECT vg.title, vg.type, vg.publish_at, c.name AS console_name
                    FROM video_game AS vg
                    INNER JOIN console AS c ON vg.id_console = c.id
                    ORDER BY vg.title";

            //Préparation de la requête
            $req = $this->connect->prepare($sql);

            //Exécution de la requête
            $req->execute();

            //Récupération de tous les jeux sous forme de tableau
            $games = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo $e->getMessage();
            $games = [];
        }

        //Retourne la liste des jeux
        return $games;
    }
}
?>
