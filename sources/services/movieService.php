<?php
namespace App\Sources\Services;
use App\Sources\Repos\MovieRepos;
use App\Sources\Models\MovieDTO;
use App\Sources\Models\MovieSearchDTO;

class MovieService {

    private $movieRepos;

    public function __construct() {
        $this->movieRepos = new MovieRepos();
    }

    /**
     * Methode qui recupere tous les utilisateurs
     */
    public function findAll() {

        /* Initialisation du tableau pour la reponse */
        $movies = [];

        /* Reponse du serveur */
        $response = $this->movieRepos->findAll();
        
        /* Methode qui map la response en liste d utilisateurs dans users */
        foreach ($response as $movie) {
            
            /* Insere la reponse dans le tableau de retour */
            array_push($movies, new MovieDTO($movie['id_movie'], $movie['title'], $movie['poster_src'], $movie['poster_alt'], $movie['critic'], $movie['description']));
        }

        /* Retourne le tableau de film */
        return $movies;
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {

        /* Reponse du serveur */
        $response = $this->movieRepos->findOne($id);

        /* Objet utilise pour la reponse */
        return new MovieDTO($response['id_movie'], $response['title'], $response['poster_src'], $response['poster_alt'], $response['critic'], $response['description']);
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update($request) {

        /* Objet utilise pour la requete */
        $movieDTO = new MovieDTO($request['id_movie'], $request['title'], $request['poster_src'], $request['poster_alt'], $request['critic'], $request['description']);
    
        /* Reponse du serveur */
        $response = $this->movieRepos->update($movieDTO);

        /* Objet utilise pour la reponse */
        return new MovieDTO($response['id_movie'], $response['title'], $response['poster_src'], $response['poster_alt'], $response['critic'], $response['description']);
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add($request) {

        /* Objet utilise pour la requete */
        $movieSearch = new MovieSearchDTO($request["title"], $request['poster_src'], $request['poster_alt'], $request['critic'], $request['description']);
       
        /* Reponse du serveur */
        $response = $this->movieRepos->add($movieSearch);

        /* Objet utilise pour la reponse */
        return new MovieDTO($response['id_movie'], $response['title'], $response['poster_src'], $response['poster_alt'], $response['critic'], $response['description']);
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($id) {

        /* Requete au serveur */
        $this->movieRepos->delete($id);
    }
}
