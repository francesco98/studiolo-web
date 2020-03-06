<?php
//Mostra gli errori sul browser
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Include tutte le dipendenze
define("__DOCUMENT_ROOT__", filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));
require __DOCUMENT_ROOT__ . '/vendor/autoload.php';

use Controller\HomeController;
use Model\Router\Request;
use Model\Router\Router;

//Realizzo l'istanza del Router
$router = new Router(new Request());

//Realizzo le regole di routing
$router->get('/', function($request) {
  $homeController = new HomeController();
  return $homeController->index();
});