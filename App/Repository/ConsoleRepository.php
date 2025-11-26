<?php

namespace App\Repository;

use App\Database\Mysql;
use App\Model\Console;

class ConsoleRepository
{
    // Attribut
    private \PDO $connect;

    // Constructeur
    public function __construct()
    {
        // Injection des dépendances
        $this->connect = (new Mysql)->connectBDD();
    }

    // Méthodes
    /**
     * Méthode qui retourne la liste des consoles (Console)
     * @return array<Console> Retourne le tableau des consoles (Console)
     * @throws \Exception Erreurs SQL
     */
    public function findAllConsoles(): array 
    {
        try {
            // 1. Écrire la requête SQL
            $sql = "SELECT id, name, manufacturer FROM console";

            // 2. Préparer la requête
            $stmt = $this->connect->prepare($sql);

            // 3. Exécuter la requête
            $stmt->execute();

            // 4. Récupérer les résultats
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $consoles = [];
            foreach ($rows as $row) {
                $consoles[] = new Console(
                    $row['id'],
                    $row['name'],
                    $row['manufacturer']
                );
            }

            return $consoles;

        } catch (\PDOException $e) {
            throw new \Exception("Erreur SQL : " . $e->getMessage());
        }
    }
}
