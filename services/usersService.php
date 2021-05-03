<?php
namespace App\services;
use App\repos\UsersRepos;

class UsersService {

    private $usersRepos;

    public function __construct() {
        $this->usersRepos = new UsersRepos();
    }

    /**
     * Methode qui recupere tous les utilisateurs
     */
    public function findAll() {
        return $this->usersRepos->findAll();
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {
        return $this->usersRepos->findOne($id);
    }
}
