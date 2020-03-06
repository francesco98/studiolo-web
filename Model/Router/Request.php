<?php

namespace Model\Router;

/*
  Questa classe si preoccupa di analizzare la variabile
  superglobal $_SERVER, realizzando per ogni key un attributo
  con corrispettivo valore
*/

class Request
{
  function __construct()
  {
    $this->build();
  }

  //Costruisce l'istanza con i relativi attributi
  private function build()
  {
    foreach($_SERVER as $key => $value)
    {
      $this->{$this->toCamelCase($key)} = $value;
    }
  }

  //Trasforma da snake case a cammel case
  private function toCamelCase($string)
  {
    $result = strtolower($string);
        
    preg_match_all('/_[a-z]/', $result, $matches);

    foreach($matches[0] as $match)
    {
        $c = str_replace('_', '', strtoupper($match));
        $result = str_replace($match, $c, $result);
    }

    return $result;
  }

  //TODO: estrarre parametri da richiesta HTTP POST o GET
}