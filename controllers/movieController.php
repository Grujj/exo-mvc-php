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

        include_once "./views/movie/index.php";
    }

    /**
     * Methode qui retourne tous les films
     */
    public function findAll(){

        $this->movies = $this->movieService->findAll();

        include_once "./views/movie/index.php";
    }

    /**
     * Methode qui retourne un film par son id
     */
    public function findOne($request) {

        $this->movies = $this->movieService->findOne($request['id']);

        include_once "./views/movie/index.php";    
    }

    /**
     * Methode qui ajoute un film
     */
    public function add() {

        $movieSearch = new MovieSearchDTO($_POST["title"], $_POST['poster']);
        $this->movies = $this->movieService->add($movieSearch);

        include_once "./views/movie/index.php";    
    }

    /**
     * Methode qui met a jour un film
     */
    public function update() {

        $this->movies = $this->movieService->update($_POST);
        
        include_once "./views/movie/index.php";    
    }

    /**
     * Methode qui supprime un film
     */
    public function delete($request) {

        $this->movieService->delete($request['id']);

        include_once "./views/movie/index.php";    
    }


}