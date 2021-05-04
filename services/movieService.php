<?php
namespace App\services;
use App\repos\MovieRepos;
use App\models\MovieDTO;
use App\models\MovieSearchDTO;

class MovieService {

    private $movieRepos;

    public function __construct() {
        $this->movieRepos = new MovieRepos();
    }

    /**
     * Methode qui recupere tous les utilisateurs
     */
    public function findAll() {

        $response = $this->movieRepos->findAll();
        $movies = [];

        /* Methode qui map la response en liste d utilisateurs dans users */
        foreach ($response as $movie) {
            
            array_push($movies, new MovieDTO($movie['id_movie'], $movie['title'], $movie['poster'], $movie['id_critic']));
        }

        return $movies;
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {

        $response = $this->movieRepos->findOne($id);
        return new MovieDTO($response['id_movie'], $response['title'], $response['poster'], $response['id_critic']);
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update($request) {

        $movieDTO = new movieDTO($request['id_movie'], $request['title'], $request['poster'], $request['id_critic']);
        $response = $this->movieRepos->update($movieDTO);

        return new MovieDTO($response['id_movie'], $response['title'], $response['poster'], $response['id_critic']);
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add($request) {

        $movieSearch = new MovieSearchDTO($request["title"], $request['poster']);
        $response = $this->movieRepos->add($movieSearch);

        return new MovieDTO($response['id_movie'], $response['title'], $response['poster'], $response['id_critic']);
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($id) {
        $this->movieRepos->delete($id);
    }
}
