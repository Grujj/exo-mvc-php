<?php
namespace App\Sources\Repos;
use App\Core\Db;
use PDO;

class MovieRepos extends Db {
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
            FROM exo_mvc.movies 
        ";

        $statement = $this->db->prepare($sql);
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {

        $sql = "
            SELECT * 
            FROM exo_mvc.movies 
            WHERE id_movie = ?
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$id]);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update($movie) {

        $sql = "
            UPDATE movies
            SET title = ?,
            poster = ?,
            WHERE id_movie = ?";

        $statement = $this->db->prepare($sql);

        $statement->execute([$movie->pseudo, $movie->email, $movie->password, $movie->id]);

        return $this->findOne($movie->id);
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add($movie) {

        $sql = "
            INSERT INTO movies (title, poster)
            VALUES (?, ?)
        ";

        $statement = $this->db->prepare($sql);

        $statement->execute([$movie->title, $movie->poster]);

        return $this->findOne($this->db->lastInsertId());
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($id) {

        $sql = "
            DELETE FROM `movies`
            WHERE id_movie = ?
        ";

        $statement = $this->db->prepare($sql);
        
        $statement->execute([$id]);
    }
}