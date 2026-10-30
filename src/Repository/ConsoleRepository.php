<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Entity\Console;

class ConsoleRepository
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
     * Méthode qui retourne la liste des consoles (Console)
     * @return array<Console> Retourne le tableau des consoles (Console)
     * @throws \Exception Erreurs SQL
     */
   public function findAllConsoles(): array 
    {
        //  requête SELECT récupérant id, name et manufacturer
        $sql = "SELECT id, name, manufacturer FROM console";

        // Préparer et exécuter la requête
        $query = $this->connect->prepare($sql);
        $query->execute();

        //tableau associatif avec fetchAll(PDO::FETCH_ASSOC)
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}
