<?php

namespace Controller;

use Model\DB\Contact;
use View\Render;

class ContactsController
{
    //index
    public function index()
    {
        //passo aalla view il titolo e relative variabili
        return Render::contacts("Contattaci", []);
    }

    //funzione per il form di contatto
    public function processForm($request)
    {
        //ottengo i parametri
        $params = $request->getPostParams();
        $response = [];

        //check se i campi sono validi
        if (
            ContactsController::is_valid_field($params->uni, 50) &&
            ContactsController::is_valid_field($params->email, 100) &&
            ContactsController::is_valid_field($params->message, 500) &&
            filter_var($params->email, FILTER_VALIDATE_EMAIL)
        ) {
            //istanzio oggetto contact
            $contact = new Contact();
            //effettuo le varie query
            $contact->setName($params->uni);
            $contact->setEmail($params->email);
            $contact->setMessage($params->message);
            $contact->save();

            //gestione messaggi di feedback
            $response["result"] = true;
            $response["message"] = "Grazie per averci scritto.<br/>Riceverai presto una risposta dal nostro team di esperti!";
        } else {
            //gestione messaggi di feedback
            $response["result"] = false;
            $response["message"] = "Si &egrave verificato un errore, compila correttamente tutti i campi!";
        }
        
        //passo aalla view il titolo e relative variabili
        return Render::contacts("Contattaci", $response);
    }

    //funzione per il controllo di validità dei campi
    private static function is_valid_field($field, $max)
    {
        return !is_null($field) && strlen(trim($field)) >= 3 && strlen(trim($field)) < $max;
    }
}
