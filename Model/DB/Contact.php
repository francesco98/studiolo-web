<?php

namespace Model\DB;

use Model\AbstractModel;

/*
    Classe (model) relativo alla tabella contact sul database
    NB.: il nome della classe deve corrispondere al nome della tabella
*/
class Contact extends AbstractModel {

    //Campi della tabella contact sul database (necessario protected o public)
    protected $id;
    protected $name;
    protected $email;
    protected $message;

    //Specifico i campi che compongono la chiave primaria
    protected static function getPrimaryKey() {
        return 
        [
            'id'
        ];
    }

    //Metodi getter e setter
    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setMessage($message) {
        $this->message = $message;
    }
}