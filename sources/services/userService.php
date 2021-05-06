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

        /* Initialisation du tableau pour la reponse */
        $users = [];

        /* Reponse du serveur */
        $response = $this->userRepos->findAll();
        
        
        /* Methode qui map la response en liste d utilisateurs dans users */
        foreach ($response as $user) {

            /* Insere la reponse dans le tableau de retour */
            array_push($users, new UserDTO($user['id_user'], $user['pseudo'], $user['email'], $user['password']));
        }

        /* Retourne le tableau d utilisateur */
        return $users;
    }
    
    /**
     * Methode qui recupere un utilisateur par son id
     */
    public function findOne($id) {

        /* Reponse du serveur */
        $response = $this->userRepos->findOne($id);

        /* Objet utilise pour la reponse */
        return new UserDTO($response['id_user'], $response['pseudo'], $response['email'], $response['password']);
    }

    /**
     * Methode qui met a jour un utilisateur
     */
    public function update($request) {

        /* Objet utilise pour la requete */
        $userDTO = new UserDTO($request['id_user'], $request['pseudo'], $request['email'], $request['password']);
        
        /* Reponse du serveur */
        $response = $this->userRepos->update($userDTO);

        /* Objet utilise pour la reponse */
        return new UserDTO($response['id_user'], $response['pseudo'], $response['email'], $response['password']);
    }

    /**
     * Methode qui ajoute un utilisateur
     */
    public function add($request) {

        /* Requete qui recupere tous les emails */
        $emails = $this->findAllEmails();
        $emailsToCheck = [];

        foreach ($emails as $email) {
            array_push($emailsToCheck, $email['email']);
        }

        /* Condition si l email est deja utilise */
        if(!in_array($request['email'] , $emailsToCheck)) {
            return $this->addUser($request);
        }
        else {
            return null;
        }
    }

    private function addUser($request) {

         /* Objet utilise pour la requete */
         $userSearch = new UserSearchDTO($request["pseudo"], $request['email'], $request['password']);
        
         /* Reponse du serveur */
         $response = $this->userRepos->add($userSearch);

         /* Objet utilise pour la reponse */
         return new UserDTO($response['id_user'], $response['pseudo'], $response['email'], $response['password']);
    }

    /**
     * Methode qui supprime un utilisateur
     */
    public function delete($id) {

        /* Requete au serveur */
        $this->userRepos->delete($id);
    }

    /**
     * Methode qui recupere tous les emails
     */
    public function findAllEmails() {

        /* Requete au serveur */
        return $this->userRepos->findAllEmails();
    }

    /**
     * Methode qui recupere tous les emails
     */
    public function findByEmail($request) {

        /* Objet utilise pour la requete */
        $userSearch = new UserSearchDTO("", $request['email'], $request['password']);
        
        /* Reponse du serveur */
        $response = $this->userRepos->findByEmail($request['email']);
        
        if($response != null)
            /* Objet utilise pour la reponse */
            return new UserDTO($response['id_user'], $response['pseudo'], $response['email'], $response['password']);
        else
            return null;
    }
}
