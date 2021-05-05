<?php
namespace App\Sources\Services;
use App\Sources\Repos\UserRepos;
use App\Sources\Models\UserDTO;
use App\Sources\Models\UserSearchDTO;
class UserService {

    private $userRepos;

    public function __construct() {
        $this->userRepos = new UserRepos();
    }

    /**
     * Methode qui recupere tous les utilisateurs
     */
    public function findAll() {

        $response = $this->userRepos->findAll();
        $users = [];
        
        /* Methode qui map la response en liste d utilisateurs dans users */
        foreach ($response as $user) {
            array_push($users, new UserDTO($user['id_user'], $user['pseudo'], $user['email'], $user['password']));
        }

        return $users;
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {

        $response = $this->userRepos->findOne($id);
        return new UserDTO($response['id_user'], $response['pseudo'], $response['email'], $response['password']);
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update($request) {

        $userDTO = new UserDTO($request['id_user'], $request['pseudo'], $request['email'], $request['password']);
        $response = $this->userRepos->update($userDTO);

        return new UserDTO($response['id_user'], $response['pseudo'], $response['email'], $response['password']);
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add($request) {

        $userSearch = new UserSearchDTO($request["pseudo"], $request['email'], $request['password']);
        $response = $this->userRepos->add($userSearch);

        return new UserDTO($response['id_user'], $response['pseudo'], $response['email'], $response['password']);
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($id) {
        $this->userRepos->delete($id);
    }
}
