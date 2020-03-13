<?php

namespace Model\DB;

use Model\AbstractModel;

class Article extends AbstractModel {
    protected $id;
    protected $title;
    protected $text;
    protected $date;

    protected static function getPrimaryKey() {
        return 
        [
            'id'
        ];
    }

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