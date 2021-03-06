<?php
//Mostra gli errori sul browser
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Include tutte le dipendenze
define("__DOCUMENT_ROOT__", filter_input(INPUT_SERVER, 'DOCUMENT_ROOT'));
require __DOCUMENT_ROOT__ . '/vendor/autoload.php';

use Controller\HomeController;
use Controller\BlogController;
use Controller\ContactsController;
use Controller\AdminController;

use Model\Router\Request;
use Model\Router\Router;

//Realizzo l'istanza del Router
$router = new Router(new Request());

//Realizzo le regole di routing
$router->get('/', function($request) {
  $homeController = new HomeController();
  return $homeController->index();
});

//Controller per la pagina blog
$router->get('/blog', function($request) {
  $blogController = new BlogController();
  return $blogController->index();
});

$router->get('/article', function($request) {
  $blogController = new BlogController();
  return $blogController->article($request);
});

//Controller per la pagina contattaci
$router->get('/contacts', function($request) {
  $contactsController = new ContactsController();
  return $contactsController->index();
});

$router->post('/processform', function($request) {
  $contactsController = new ContactsController();
  return $contactsController->processForm($request);
});

//Controller per admin
$router->get('/admin', function($request) {
  $adminController = new AdminController();
  return $adminController->index();
});
$router->post('/processadmin', function($request) {
  $adminController = new AdminController();
  return $adminController->processLogin($request);
});

$router->get('/logout', function($request) {
  $adminController = new AdminController();
  return $adminController->logout();
});

$router->get('/modifyArticle', function($request) {
  $adminController = new AdminController();
  return $adminController->modifyArticle($request);
});

$router->post('/processedit', function($request) {
  $adminController = new AdminController();
  return $adminController->processEdit($request);
});
