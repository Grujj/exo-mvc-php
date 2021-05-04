<?php
namespace App\repos;
use App\Core\Db;
use PDO;

class UserRepos extends Db {
    private $db;

    public function __construct() {

        /* Instanciation du singleton */
        $this->db = Db::getInstance();
    }
    
    /**
     * Methode qui recupere tous les utilisateurs
     */
    public function findAll() {

        $sql = "
            SELECT * 
            FROM exo_mvc.users 
        ";

        $statement = $this->db->prepare($sql);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {

        $sql = "
            SELECT * 
            FROM exo_mvc.users 
            WHERE id_user = ?
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update($user) {

        $sql = "
            UPDATE users
            SET pseudo = ?,
            email = ?,
            password = ?
            WHERE id_user = ?";

        $statement = $this->db->prepare($sql);

        $statement->execute([$user->pseudo, $user->email, $user->password, $user->id]);

        return $this->findOne($user->id);
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add($user) {

        $sql = "
            INSERT INTO users (pseudo, email, password)
            VALUES (?, ?, ?)
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$user->pseudo, $user->email, $user->password]);

        return $this->findOne($this->db->lastInsertId());
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($id) {

        $sql = "
            DELETE FROM `users`
            WHERE id_user = ?
        ";

        $statement = $this->db->prepare($sql);
        
        $statement->execute([$id]);
    }
}