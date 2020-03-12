<?php
namespace Controller; 
use Model\DB\Contact;
use View\Render;

class ContactsController{
    public function processForm($request){
        $params = $request->getParams();
        $contact = new Contact();
        $contact->setName($params->uni);
        $contact->setEmail($params->email);
        $contact->setMessage($params->message);
        $contact->save();
        return Render::contacts("Contattaci", ["message"=>'Grazie per averci scritto. <br/> Riceverai presto una risposta dal nostro team di esperti!']);
    }
}