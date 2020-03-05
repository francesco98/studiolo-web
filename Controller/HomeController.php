<?php

namespace Controller;

use View\Render;

class HomeController {

    public function index() {
        return Render::index("Home", ['text' => "Hello World!"]);
    }

}