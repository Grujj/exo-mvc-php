<?php

namespace App\Controllers;
use App\services\UsersService;

class UserController extends Controller {

    private $usersService;

    public function __construct() {
        $this->usersService = new UsersService();
    }

    /**
     * Methode appelee si pas d'action renseigne
     */
    public function index(){
        $users = $this->usersService->findAll();
        var_dump($users);
        include_once "./views/user/index.php";
    }

    /**
     * Methode si findone est renseigne en action
     */
    public function findOne($tab) {
        $user = $this->usersService->findOne($tab['id']);
        var_dump($user);
        include_once "./views/user/index.php";    
    }
}
