<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Console;

class ConsoleRepository
{
    //Attributs
    private \PDO $connect;

    //Constructeur
    public function __construct()
    {
        //Injection de dependance
        $this->connect = (new Mysql)->connectBDD();
    }

    //Méthodes
    /**
     * Méthode qui retourne la liste des consoles.
     * @return array Retourne le tableau des consoles
     * @throws \Exception Erreurs SQL
     */
    public function findAllConsoles(): array 
    {
        try {
            //Requête SQL : récupérer toutes les consoles
            $sql = "SELECT id, name, manufacturer FROM console ORDER BY name";
            //Préparation de la requête
            $req = $this->connect->prepare($sql);
            //Exécution de la requête
            $req->execute();
            //Récupération de toutes les consoles sous forme de tableau associatif
            $consoles = $req->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo $e->getMessage();
            $consoles = [];
        }

        //Retourne la liste des consoles
        return $consoles;
    }
}
?>
