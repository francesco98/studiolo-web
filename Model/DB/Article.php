<?php

namespace Model\DB;

use Model\AbstractModel;

/*
    Classe (model) relativo alla tabella contact sul database
    NB.: il nome della classe deve corrispondere al nome della tabella
*/
class Article extends AbstractModel {

    //Campi della tabella contact sul database (necessario protected o public)
    protected $id;
    protected $title;
    protected $text;
    protected $date;

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

    public function getTitle() {
        return $this->title;
    }

    public function getText() {
        return $this->text;
    }

    public function getDate() {
        return $this->date;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setText($text) {
        $this->text = $text;
    }
}