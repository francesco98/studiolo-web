<?php

namespace View;

use stdClass;

class Render
{
    public static function __callStatic($name, $args)
    {
        $object = new stdClass();
        $utilityObject = self::createUtilityClass($args[0]);

        $header = __DOCUMENT_ROOT__ . "/View/common/header.php";
        $footer = __DOCUMENT_ROOT__ . "/View/common/footer.php";

        $file = __DOCUMENT_ROOT__ . "/View/template/" . $name . ".php";

        //Controllo se mi è stato fornito un array oppure un object
        if (is_array($args[1])) {
            $object = self::createClass($args[1]);
        } else if (is_object($args[1])) {
            $object = $args[1];
        }

        if (file_exists($file)) {
            ob_start();
            
            include $header;
            include $file;
            include $footer;

            $render = ob_get_clean();
            return $render;
        }
    }

    private static function createClass($array)
    {
        $class = new stdClass();

        foreach ($array as $key => $value) {
            $class->{$key} = $value;
        }

        return $class;
    }

    private static function createUtilityClass($pageTitle) {
        $utilityObject = new stdClass();
        $utilityObject->title = $pageTitle;
        $utilityObject->getStyle = function($n) {
            return  "resources/css/" . $n . ".css"; 
        };

        return $utilityObject;
    }
}
