<?php

namespace App\Controllers;
use App\services\MovieService;
use App\models\MovieSearchDTO;

class MovieController extends Controller {

    private $movieService;
    public $movies;

    public function __construct() {

        $this->movieService = new MovieService();
        $this->movies = [];
    }

    /**
     * Methode qui retourne tous les films
     */
    public function index(){

        /* Template a affiche */
        include_once "./views/movie/index.php";
    }

    /**
     * Methode qui retourne tous les films
     */
    public function findAll(){

        /* Reponse ajoutee au tableau des films */
        $response = $this->movieService->findAll();

        /* Gestion de la reponse */
        $this->handleResponse($response);

        /* Template a afficher */
        include_once "./views/movie/index.php";
    }

    /**
     * Methode qui retourne un film par son id
     */
    public function findOne($request) {

        /* Reponse recue par le serveur */
        $response = $this->movieService->findOne($request['id']);

        /* Gestion de la reponse */
        $this->handleResponse($response);

        /* Template a afficher */
        include_once "./views/movie/index.php";    
    }

    /**
     * Methode qui ajoute un film
     */
    public function add() {

        /* Objet utilise pour la requete au serveur */
        $movieSearch = new MovieSearchDTO($_POST["title"], $_POST['poster']);

        /* Reponse recue par le serveur */
        $response = $this->movieService->add($movieSearch);

        /* Gestion de la reponse */
        $this->handleResponse($response);

        /* Template a afficher */
        include_once "./views/movie/index.php";    
    }

    /**
     * Methode qui met a jour un film
     */
    public function update() {

        /* Reponse recue par le serveur */
        $response = $this->movieService->update($_POST);

        /* Gestion de la reponse */
        $this->handleResponse($response);
        
        /* Template a afficher */
        include_once "./views/movie/index.php";    
    }

    /**
     * Methode qui supprime un film
     */
    public function delete($request) {

        /* Requete de suppression au serveur */
        $this->movieService->delete($request['id']);

        /* Template a afficher */
        include_once "./views/movie/index.php";    
    }

    /**
     * Methode qui gere la reponse recue du serveur
     */
    private function handleResponse($response) {

        /* Condition si la reponse est un tableau */
        if(gettype($response) == "array"){
            $this->movies = $response;
        }
        else {
            array_push($this->movies, $response);
        }
    }


}