<?php

//import de l'autoload
include 'vendor/autoload.php';
include 'env.php';

//récupération de l'url
$url = parse_url($_SERVER["REQUEST_URI"]);
$path = isset($url["path"]) ? $url["path"] : "/";
//Import des classes
use App\Controller\HomeController;
use App\Controller\GameController;

//Instance des controllers
$homeController = new HomeController();
$gameController = new GameController();

//Router
switch ($path) {
    case '/':
        $homeController->index();
        break;
    case '/game/add':
        //Route pour l'ajout d'un jeu
        $gameController->addGame();
        break;
    case '/games':
        //Route pour l'affichage de la liste des jeux
        $gameController->showAllGames();
        break;
    default:
        //Route par défaut
        http_response_code(404);
        echo 'Page non trouvée';
        break;
}
?>
