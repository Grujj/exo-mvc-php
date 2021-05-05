<?php 
namespace App\Sources\Models;
class UserDTO {

    private $id_user;
    private $pseudo;
    private $email;
    private $password;

    public function __construct($id_user, $pseudo, $email, $password) {
        $this->setIdUser($id_user);
        $this->setPseudo($pseudo);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function setIdUser(int $id_user) {
        $this->id_user = $id_user;
    }

    public function getIdUser() {
        return $this->id_user;
    }

    public function setPseudo(string $pseudo) {
        $this->pseudo = $pseudo;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }
    public function getPassword() {
        return $this->password;
    }
    
}