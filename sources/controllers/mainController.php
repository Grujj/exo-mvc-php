<?php

namespace App\Sources\Controllers;

class MainController {
    
    /**
     * Methode qui appelle une classe par defaut 
     * si on ne renseigne pas de parametre dans l url
     */
    public function index() {
        
        include_once './ressources/views/home.php';
    }
}
