<?php

namespace Controller;

use Model\DB\Contact;
use View\Render;

class HomeController {

    //Pagina Home
    public function index() {
        return Render::index("Home", []);
    }
}
