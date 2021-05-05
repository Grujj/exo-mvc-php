<?php 
namespace App\Sources\Models;
class UserSearchDTO {

    private $pseudo;
    private $email;
    private $password;

    public function __construct($pseudo, $email, $password) {
        $this->setPseudo($pseudo);
        $this->setEmail($email);
        $this->setPassword($password);
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