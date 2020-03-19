<?php

namespace Controller;

use Model\DB\Contact;
use View\Render;

class ContactsController
{

    public function index()
    {
        return Render::contacts("Contattaci", []);
    }

    public function processForm($request)
    {
        $params = $request->getPostParams();

        $response = [];

        if (
            ContactsController::is_valid_field($params->uni, 50) &&
            ContactsController::is_valid_field($params->email, 100) &&
            ContactsController::is_valid_field($params->message, 500) &&
            filter_var($params->email, FILTER_VALIDATE_EMAIL)
        ) {

            $contact = new Contact();
            $contact->setName($params->uni);
            $contact->setEmail($params->email);
            $contact->setMessage($params->message);

            $contact->save();

            $response["result"] = true;
            $response["message"] = "Grazie per averci scritto.<br/>Riceverai presto una risposta dal nostro team di esperti!";
        } else {
            $response["result"] = false;
            $response["message"] = "Si &egrave verificato un errore, compila correttamente tutti i campi!";
        }

        return Render::contacts(
            "Contattaci",
            $response
        );
    }


    private static function is_valid_field($field, $max)
    {
        return !is_null($field) && strlen(trim($field)) >= 3 && strlen(trim($field)) < 50;
    }
}
