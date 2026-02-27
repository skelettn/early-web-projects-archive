<?php

namespace KIJU\Database;

use Exception;
use PDOException;
use \PDO;
use \PDOStatement;

/**
 * Classe permettant de gérer la base de données
 *
 * Cette classe permet d'appeler la base de données pour différentes actions
 */
class Database
{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    /**
     * Constructeur
     *
     * @param string $db_name Nom de la base de données
     * @param string $db_user Nom d'utilisateur de la base de données
     * @param string $db_pass Mot de passe de la base de données
     * @param string $db_host Hostname de la base de données
     * @return void
     */
    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost')
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /**
     * Récupère le PDO de la base de données
     *
     * @return object|null
     */
    public function getPDO(): ?object
    {
        try {
            if ($this->pdo === null) {
                $pdo = new PDO('mysql:dbname=' . $this->db_name . ';host=' . $this->db_host, $this->db_user, $this->db_pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->pdo = $pdo;
            }
            return $this->pdo;
        } catch (PDOException $e) {
            echo "kiju_dev_error_1";
            return null;
        }
    }

    /**
     * Exécute une requete SQL
     * 
     * @param string $query Requête SQL
     * @param array $params Paramètres de la requête SQL
     * @return PDOStatement $statement Status de la requête
     */
    public function executeQuery($query, $params = []): PDOStatement
    {
        try {
            $statement = $this->pdo->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (PDOException $e) {
            die("kiju_dev_error_1: " . $e->getMessage());
        }
    }
}
