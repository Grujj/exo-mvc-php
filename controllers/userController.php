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

        include_once "./views/user/index.php";
    }

    /**
     * Methode qui retourne tous les utilisateurs
     */
    public function findAll(){

        $this->users = $this->userService->findAll();

        include_once "./views/user/index.php";
    }

    /**
     * Methode qui retourne un utilisateur par son id
     */
    public function findOne($request) {

        $this->users = $this->userService->findOne($request['id']);

        include_once "./views/user/index.php";    
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add() {

        $userSearch = new UserSearchDTO($_POST["pseudo"], $_POST['email'], $_POST['password']);
        $this->users = $this->userService->add($userSearch);

        include_once "./views/user/index.php";    
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update() {

        $this->users = $this->userService->update($_POST);
        
        include_once "./views/user/index.php";    
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($request) {

        $this->userService->delete($request['id']);

        include_once "./views/user/index.php";    
    }


}
