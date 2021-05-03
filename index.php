<?php
use App\Autoloader;
use App\Core\Main;

require_once 'autoloader.php';

/* Appel de l autoloader */
Autoloader::register();

/**
 * On instancie notre routeur
 */

$app = new Main();
$app->start();
