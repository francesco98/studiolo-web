<?php

namespace Controller;

use Model\DB\Contact;
use View\Render;

class HomeController {

    //index
    public function index() {
        //passo aalla view il titolo e relative variabili
        return Render::index("Home", []);
    }
}
