<?php

namespace App\Sources\Controllers;
use App\Sources\Services\MovieService;

class MovieController extends Controller {

    private $template;
    private $movieService;
    public $movies;

    public function __construct() {

        $this->template = "./ressources/views/movie/index.php";
        $this->movieService = new MovieService();
        $this->movies = [];
    }

    /**
     * Methode qui retourne tous les films
     */
    public function index(){

        /* Template a affiche */
        include_once $this->template;
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
        include_once './ressources/views/movie/displayAllMovies.php';
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
        include_once './ressources/views/movie/displayMovieDetails.php';  
    }

    /**
     * Methode qui ajoute un film
     */
    public function add() {

        /* Condition pour traiter le formulaire */
        if(isset($_POST) && sizeof($_POST) > 0) {

            /* Reponse recue par le serveur */
            $response = $this->movieService->add($_POST);

            /* Gestion de la reponse */
            $this->handleResponse($response);

            /* Template a afficher */
            include_once $this->template;
        }
        else {
            
            include_once './ressources/views/movie/formAddMovie.php';
        }
           
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
        include_once $this->template; 
    }

    /**
     * Methode qui supprime un film
     */
    public function delete($request) {

        /* Requete de suppression au serveur */
        $this->movieService->delete($request['id']);

        /* Template a afficher */
        include_once $this->template;
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