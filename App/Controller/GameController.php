<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Model\Console;
use App\Model\Game;
use App\Utils\Tools;


class GameController extends AbstractController
{
    //Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;

    //Constructeur
    public function __construct()
    {
        //Injection des dependances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    //Méthodes

    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return mixed Retourne le template
     */
    public function addGame(): mixed
    {
        $consoles = $this->consoleRepository->findAllConsoles();
        $data = ["consoles" => $consoles];
        if (!empty($_POST)) {
            if (!empty($_POST["title"]) && !empty($_POST["type"]) && !empty($_POST["publish_at"]) && !empty($_POST["console_id"])) {
                $game = new Game();
                $game->setTitle(Tools::sanitize($_POST["title"]));
                $game->setType(Tools::sanitize($_POST["type"]));
                $publishAt = new \DateTimeImmutable($_POST["publish_at"]);
                $game->setPublishAt($publishAt);
                $game->setConsoleId((int)Tools::sanitize($_POST["console_id"]));

                $this->gameRepository->addGame($game);
                $data["valid"] = "Le jeu a été ajouté avec succés";
            } else {
                $data["error"] = "Veuillez remplir tous les champs";
            }
        }
        return $this->render("add_game", "Ajouter un jeu", $data);
    }

    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed
    {
        $games = $this->gameRepository->findAllGames();
        return $this->render("show_all_ames", "Liste des jeux", ["games" => $games]);
    }
}
