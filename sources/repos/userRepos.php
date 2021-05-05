<?php
namespace App\Sources\Repos;
use App\Core\Db;
use PDO;

class UserRepos extends Db {

    /* Lien a la base de donnees */
    private $db;

    public function __construct() {

        /* Instanciation du singleton */
        $this->db = Db::getInstance();
    }
    
    /**
     * Methode qui recupere tous les utilisateurs
     */
    public function findAll() {

        /* Requete SQL */
        $sql = "
            SELECT * 
            FROM exo_mvc.users 
        ";

        /* Preparation de la requete */
        $statement = $this->db->prepare($sql);

        /* Execution de la requete */
        $statement->execute();
        
        /* Retourne les utilsateurs trouves */
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {

        /* Requete SQL */
        $sql = "
            SELECT * 
            FROM exo_mvc.users 
            WHERE id_user = ?
        ";

        /* Preparation de la requete */
        $statement = $this->db->prepare($sql);

        /* Execution de la requete */
        $statement->execute([$id]);

        /* Retourne l utilisateur trouve */
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update($user) {

        /* Requete SQL */
        $sql = "
            UPDATE users
            SET pseudo = ?,
            email = ?,
            password = ?
            WHERE id_user = ?";

        /* Preparation de la requete */
        $statement = $this->db->prepare($sql);

        /* Execution de la requete */
        $statement->execute([$user->pseudo, $user->email, $user->password, $user->id]);

        /* Retourne l utilisateur mis a jour */
        return $this->findOne($user->id);
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add($user) {

        /* Requete SQL */
        $sql = "
            INSERT INTO users (pseudo, email, password)
            VALUES (?, ?, ?)
        ";

        /* Preparation de la requete */
        $statement = $this->db->prepare($sql);

        /* Execution de la requete */
        $statement->execute([$user->getPseudo(), $user->getEmail(), $user->getPassword()]);

        /* Retourne l utilisateur ajoute */
        return $this->findOne($this->db->lastInsertId());
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($id) {

        /* Requete SQL */
        $sql = "
            DELETE FROM `users`
            WHERE id_user = ?
        ";

        /* Preparation de la requete */
        $statement = $this->db->prepare($sql);
        
        /* Execution de la requete */
        $statement->execute([$id]);
    }
}