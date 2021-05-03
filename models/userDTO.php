<?php 

class UserDTO {

    private $id;
    private $pseudo;
    private $email;
    private $password;

    public function __construct($id, $pseudo, $email, $password) {
        $this->setId($id);
        $this->setPseudo($pseudo);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
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