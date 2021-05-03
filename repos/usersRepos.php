<?php
namespace App\repos;
use App\Core\Db;
use PDO;

class UsersRepos extends Db {
    private $db;

    public function __construct() {

        /* Instanciation du singleton */
        $this->db = Db::getInstance();
    }
    
    /**
     * Methode qui recupere tous les utilisateurs
     */
    public function findAll() {
        $find = $this->db->query('SELECT * FROM exo_mvc.users');
        $find = $find->fetchAll(PDO::FETCH_OBJ);
        return $find;
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {
        $find = $this->db->query('SELECT * FROM exo_mvc.users WHERE id='.$id);
        $try = $find->fetchAll(PDO::FETCH_OBJ);
        return $try;
    }
}