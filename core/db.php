<?php

namespace App\Core;

use PDO;
use PDOException;

class Db extends PDO {
    
    private static $instance;

    /* Initialisation des paramatres de connexion */
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = '';
    private const DBNAME = 'demo';

    private function __construct() {
        
        /* Initialisation de la connexion */
        $pdo = 'mysql:dbname=' . self::DBNAME . ';host=' . self::DBHOST;
        
        try {
            
            parent::__construct($pdo, self::DBUSER, self::DBPASS);
            $this->setattribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {

            /* Gestion d erreur */
            die($e->getMessage());
        }
    }
    
    /* Export en singleton */ 
    public static function getInstance() {

        /* Condition si deja instancie */
        if(self::$instance === null)
            self::$instance = new self();

        return self::$instance;
    }
}
