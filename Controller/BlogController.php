<?php

namespace Controller;

use Model\DB\Contact;
use View\Render;

class BlogController {

    public function index() {

           

        return Render::blog("Blog", []);
    }
}