<?php

namespace App\Controller;

use App\Controller\AbstractController;
use App\Repository\ConsoleRepository;
use App\Repository\GameRepository;
use App\Entity\Console;
use App\Entity\Game;
use App\Utils\Tools;

class GameController extends AbstractController
{
    // Attributs
    private ConsoleRepository $consoleRepository;
    private GameRepository $gameRepository;

    // Constructeur
    public function __construct()
    {
        // Injection des dépendances
        $this->consoleRepository = new ConsoleRepository();
        $this->gameRepository = new GameRepository();
    }

    // Méthodes

    /**
     * Méthode pour ajouter un Jeu (Game)
     * @return mixed Retourne le template
     */
    public function addGame(): void 
    {
        // Initialiser un tableau associatif $data vide
        $data = [];

        // Vérifier si le formulaire a été soumis en POST[cite: 3]
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Vérifier que les champs obligatoires sont remplis
            if (!empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['publish_at']) && !empty($_POST['id_console'])) {
                
                // Nettoyer les entrées avec Tools::sanitize()
                $title = Tools::sanitize($_POST['title']);
                $type = Tools::sanitize($_POST['type']);
                $publishAt = Tools::sanitize($_POST['publish_at']);
                $idConsole = Tools::sanitize($_POST['id_console']);

                // Instancier l'objet Console
                $console = new Console();
                $console->setId((int)$idConsole);

                // Instancier un objet Game et renseigner ses propriétés[cite: 3]
                $game = new Game();
                $game->setTitle($title);
                $game->setType($type);
                $game->setPublishAt($publishAt);
                $game->setConsole($console);

                // Appeler la méthode saveGame() de GameRepository
                $this->gameRepository->saveGame($game);

                // Renseigner $data['valid'] pour le message de succès[cite: 3]
                $data['valid'] = "Le jeu a été enregistré avec succès !";

            } else {
                // Renseigner $data['error'] si des champs sont absents
                $data['error'] = "Veuillez remplir tous les champs obligatoires.";
            }
        }

        // Récupérer la liste des consoles pour le menu déroulant du formulaire[cite: 4]
        $data['consoles'] = $this->consoleRepository->findAllConsoles();

        // Afficher le template avec render()[cite: 4]
        $this->render('add_game', 
            'Ajouter un jeu vidéo',
            $data);
    }

    /**
     * Méthode pour afficher la liste des Jeux (Game)
     * @return void Retourne le template
     */
    public function showAllGames(): void
    {
        $gameRepository = new GameRepository();

        $games = $gameRepository->findAllGames();

        $this->render('show_all_games', 'Liste des jeux', [
        'games' => $games
    ]);
    }
}