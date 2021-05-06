<?php
namespace App\Sources\Repos;
use App\Core\Db;
use PDO;

class MovieRepos extends Db {

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
            FROM exo_mvc.movies 
        ";

        /* Preparation de la requete */
        $statement = $this->db->prepare($sql);

        /* Execution de la requete */
        $statement->execute();
        
        /* Retourne les films trouves */
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {

        /* Requete SQL */
        $sql = "
            SELECT * 
            FROM exo_mvc.movies 
            WHERE id_movie = ?
        ";

        /* Preparation de la requete */
        $statement = $this->db->prepare($sql);

        /* Execution de la requete */
        $statement->execute([$id]);

        /* Retourne le film trouve */
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update($movie) {

        /* Requete SQL */
        $sql = "
            UPDATE movies
            SET title = ?,
            poster_src = ?,
            WHERE id_movie = ?";

        /* Preparation de la requete */
        $statement = $this->db->prepare($sql);

        /* Execution de la requete */
        $statement->execute([$movie->getTitle(), $movie->getPosterSrc()]);

        /* Retourne le film mis a jour */
        return $this->findOne($movie->id);
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add($movie) {

        /* Requete SQL */
        $sql = "
            INSERT INTO movies (title, poster_src, poster_alt, critic, description)
            VALUES (?, ?, ?, ?, ?)
        ";

        /* Preparation de la requete */
        $statement = $this->db->prepare($sql);

        /* Execution de la requete */
        $statement->execute([$movie->getTitle(), $movie->getPosterSrc(), $movie->getPosterAlt(), $movie->getCritic(), $movie->getDescription()]);

        /* Retourne le film ajoute */
        return $this->findOne($this->db->lastInsertId());
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($id) {

        /* Requete SQL */
        $sql = "
            DELETE FROM `movies`
            WHERE id_movie = ?
        ";

        /* Preparation de la requete */
        $statement = $this->db->prepare($sql);
        
        /* Execution de la requete */
        $statement->execute([$id]);
    }
}