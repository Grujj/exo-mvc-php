<?php
namespace App\services;
use App\repos\MovieRepos;

class MovieService {

    private $movieRepos;

    public function __construct() {
        $this->movieRepos = new MovieRepos();
    }

    /**
     * Methode qui recupere tous les utilisateurs
     */
    public function findAll() {
        return $this->movieRepos->findAll();
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {
        return $this->movieRepos->findOne($id);
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update($user) {
        return $this->movieRepos->update($user);
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add($user) {
        return $this->movieRepos->add($user);
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($id) {
        return $this->movieRepos->delete($id);
    }
}
