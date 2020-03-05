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

$router = new Router(new Request());

$router->get('/', function() {
  $homeController = new HomeController();
  return $homeController->index();
});

$router->get('/profile', function($request) {
  return <<<HTML
  <h1>Profile</h1>
HTML;
});

$router->post('/data', function($request) {
  return json_encode($request->getBody());
});