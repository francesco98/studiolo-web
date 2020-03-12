<?php

namespace Controller;

use Model\DB\Contact;
use View\Render;

class BlogController {

    public function index() {

            // Esempio di utilizzo
            $contact = Contact::find(['id' => 1]);
            //$contact->setName("ProvaName");
            //$contact->setEmail("ProvaName");
            //$contact->setMessage("ProvaName");
            //$contact = $contact->save();
            print_r($contact);

        return Render::blog("Blog", []);
    }
}