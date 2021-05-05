<?php

namespace App\Controllers;
use App\services\UserService;
use App\models\UserSearchDTO;

class UserController extends Controller {

    private $userService;
    public $users;

    public function __construct() {

        $this->userService = new UserService();
        $this->users = [];
    }

    /**
     * Methode qui retourne tous les utilisateurs
     */
    public function index(){

        /* Template a afficher */
        include_once "./views/user/index.php";
    }

    /**
     * Methode qui retourne tous les utilisateurs
     */
    public function findAll(){

        /* Reponse recue par le serveur */
        $response = $this->userService->findAll();
        
        /* Gestion de la reponse */
        $this->handleResponse($response);

        /* Template a afficher */
        include_once "./views/user/index.php";
    }

    /**
     * Methode qui retourne un utilisateur par son id
     */
    public function findOne($request) {

        /* Reponse recue par le serveur */
        $response = $this->userService->findOne($request['id']);

        /* Gestion de la reponse */
        $this->handleResponse($response);

        /* Template a afficher */
        include_once "./views/user/index.php";    
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add() {

        /* Objet utilise pour la requete au serveur */
        $userSearch = new UserSearchDTO($_POST["pseudo"], $_POST['email'], $_POST['password']);

        /* Reponse recue par le serveur */
        $response = $this->userService->add($userSearch);
        
        /* Gestion de la reponse */
        $this->handleResponse($response);

        /* Template a afficher */
        include_once "./views/user/index.php";    
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update() {

        /* Reponse recue par le serveur */
        $response = $this->userService->update($_POST);

        /* Gestion de la reponse */
        $this->handleResponse($response);
        
        /* Template a afficher */
        include_once "./views/user/index.php";    
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($request) {

        /* Requete envoyee au serveur */
        $this->userService->delete($request['id']);

        /* Template a afficher */
        include_once "./views/user/index.php";    
    }
    
    /**
     * Methode qui gere la reponse recue du serveur
     */
    private function handleResponse($response) {

        /* Condition si la reponse est un tableau */
        if(gettype($response) == "array"){
            $this->users = $response;
        }
        else {
            array_push($this->users, $response);
        }
    }


}
