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
    public function addGame(): void{
    $data = [];

        $consoleRepo = new ConsoleRepository();
        $consoles = $consoleRepo->findAllConsoles();

        $data['consoles'] = $consoles;

        $this->render('template_add_game.php', 'Ajouter un jeu', $data);
    }
    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return mixed Retourne le template
     */
    public function saveGame(): mixed 
    {
        return "template avec la méthode render";
    }

    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed 
    {
        return "template avec la méthode render";
    }
}
