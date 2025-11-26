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
     * Méthode pour ajouter un jeu.
     * Il est demandé addGame dans les consignes.
     * Prépare les données et affiche le formulaire d'ajout de jeu.
     * Gère également la logique d'ajout du jeu en BDD.
     *
     * @return mixed Retourne le template
     */
    public function addGame(): mixed
    {
        //Tableau avec les messages et données pour la vue
        $data = [];

        //Tester si le formulaire est soumis
        if (isset($_POST['submit'])) {
            //Récupérer les champs du formulaire
            $title      = $_POST['title'] ?? '';
            $type       = $_POST['type'] ?? '';
            $publish_at = $_POST['publish_at'] ?? '';
            $id_console = $_POST['id_console'] ?? '';

            //Tester si tous les champs obligatoires sont renseignés
            if ($title !== '' && $type !== '' && $publish_at !== '' && $id_console !== '') {
                //Nettoyer les entrées utilisateur
                $title      = Tools::sanitize($title);
                $type       = Tools::sanitize($type);
                $publish_at = Tools::sanitize($publish_at);
                $id_console = Tools::sanitize($id_console);

                //Initialiser la date de publication
                $publishAtDate = new \DateTime($publish_at);

                //Créer l'objet Game et setter ses attributs
                $game = new Game();
                $game->setTitle($title);
                $game->setType($type);
                $game->setPublishAt($publishAtDate);

                //Créer l'objet Console associé
                $console = new Console();
                $console->setId((int) $id_console);
                $game->setConsole($console);

                //Enregistrer le jeu en BDD
                $this->gameRepository->saveGame($game);

                //Message de validation
                $data['valid'] = 'Le jeu a été ajouté en BDD.';
            } else {
                //Message d'erreur si des champs sont manquants
                $data['error'] = 'Tous les champs doivent être renseignés.';
            }
        }

        //Récupérer la liste des consoles pour le formulaire
        $consoles = $this->consoleRepository->findAllConsoles();

        $data['consoles'] = $consoles;

        //Afficher la vue d'ajout de jeu
        return $this->render('add_game', 'Ajouter un jeu', $data);
    }

    /**
     * Méthode pour afficher la liste des jeux.
     *
     * @return mixed Retourne le template
     */
    public function showAllGames(): mixed 
    {
        //Récupération de la liste des jeux
        $games = $this->gameRepository->findAllGames();

        $data = [];
        $data['games'] = $games;

        return $this->render('show_all_games', 'Liste des jeux', $data);
    }
}
?>
