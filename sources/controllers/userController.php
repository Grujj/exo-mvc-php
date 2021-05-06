<?php

namespace App\Sources\Controllers;
use App\Sources\Services\UserService;

class UserController extends Controller {

    private $template;
    private $userService;
    public $users;
    public $message;

    public function __construct() {

        $this->template = "./ressources/views/user/index.php";
        $this->userService = new UserService();
        $this->users = [];
        $this->message = "";
    }

    /**
     * Methode qui retourne tous les utilisateurs
     */
    public function index(){

        /* Template a afficher */
        include_once $this->template;
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
        include_once './ressources/views/user/displayAllUsers.php';
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
        include_once $this->template;   
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add() {

        /* Traitement du formulaire */
        if(isset($_POST) && sizeof($_POST) > 0){

            /* Reponse recue par le serveur */
            $response = $this->userService->add($_POST);
            
            /* Condition si ajout fait */
            if($response != null) {

                /* Gestion de la reponse */
                $this->handleResponse($response);

                /* Template a afficher */
                include_once $this->template; 
            }
            else {

                $this->message = "Email indisponible";

                include_once './ressources/views/user/formAddUser.php';
            }
             
        }
        else {

            include_once './ressources/views/user/formAddUser.php';
        }
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
        include_once $this->template;   
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($request) {

        /* Requete envoyee au serveur */
        $this->userService->delete($request['id']);

        /* On reaffiche la liste d utilisateur */
        $this->findAll();
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

    /**
     * Methode qui gere la connection au compte d un utilisateur
     */
    public function connect() {

        /* Traitement du formulaire */
        if(isset($_POST) && sizeof($_POST) > 0){

            $response = $this->userService->findByEmail($_POST);

            /* Condition si ajout fait */
            if($response != null) {

                session_start();

                /* Gestion de la reponse */
                $_SESSION['user'] = $response;

                /* Template a afficher */
                include_once './ressources/views/home.php'; 
            }
            else {

                $this->message = "Utilisateur introuvable";

                include_once './ressources/views/user/formAddUser.php';
            }
        }
        else {

            include_once './ressources/views/user/formConnection.php';
        }
    }

    /**
     * Methode qui gere la deconnection d un utilisateur
     */
    public function disconnect() {

        session_destroy();

        include_once './ressources/views/home.php';
    }


}
