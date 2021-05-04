<?php

namespace App\Core;
use App\Controllers\MainController;

class Main {

    private $param;

    public function start() {

        /* Condition si pas de parametres */
        if($_GET === []) {

            /* Instanciation du controller de base */
            $controller = new MainController;
            $controller->index();

        } 
        else {
           
            /* Recuperation des parametres */
            $this->param = $_GET;
            

            /* Format et instancie le controller passe en parametre */
            $controller = $this->initController();

            /* Recupere l action passe en parametre */
            $action = $this->extractAction();

            /* Condition si $action existe */
            if(method_exists($controller, $action)) {
                $this->initAction($controller, $action);
            } 
            else {
                $this->pageNotFound();
            }
          
        }
    }

    /**
     * Methode qui initialise le controller passe en parametre
     */
    private function initController() {
        
        $controller = '\\App\\Controllers\\'.ucfirst(array_shift($this->param)).'Controller';
        return new $controller();
    }

    /**
     * Methode qui renvoi la methode a initie de la classe envoyee en parametre
     */
    private function extractAction() {
        return (isset($this->param['action'])) ? array_shift($this->param) : 'index';
    }

    /**
     * Methode qui intie la methode requise du controller passe en parametre
     */
    private function initAction($controller, $action) {

        (isset($this->param)) ? $controller->$action($this->param) : $controller->$action();
    }

    /**
     * Methode qui renvoi un message d erreur : page introuvable 
     */
    private function pageNotFound() {

        http_response_code(404);
        echo "page recherchée introuvable";
    }
}
