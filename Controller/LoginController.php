<?php
namespace Controller;
use View\Render;

class LoginController {

    //Pagina Home
    public function login() {
        return Render::login("Login", []);
    }
    public function processLogin(){
        return;
    }
}