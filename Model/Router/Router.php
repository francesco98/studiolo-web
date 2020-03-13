<?php

namespace Model\Router;

/*
  Questa classe si preoccupa di realizzare il routing
  per richieste HTTP GET o POST. 
  Utilizza un oggetto Request
*/

class Router
{
  private $request;
  private $supportedHttpMethods = ["GET", "POST"];

  function __construct(Request $request)
  {
   $this->request = $request;
  }

  /*
    Questo metodo viene chiamato quando un metodo è inesistente.
    la chiamata al metodo "get" o "post" provocherà la chiamata a __call con
    $name = "get" e $args un array contentente tutti i parametri
  */
  function __call($name, $args)
  {
    /*
      Equivalente a:
      $route = $args[0];
      $method = $args[1];
    */
    list($route, $method) = $args;

    //Se il nome del metodo ("get" o "post") non è contenuto in quelli ammissibili
    if(!in_array(strtoupper($name), $this->supportedHttpMethods))
    {
      $this->invalidMethodHandler();
    }

    //Assegno il metodo per quel route di quel tipo ("get" o "post")
    $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
  }

  /**
   * Rimuove gli slash alla fine del route
   * @param route (string)
   */
  private function formatRoute($route)
  {
    $result = rtrim($route, '/');
    if ($result === '')
    {
      return '/';
    }
    return $result;
  }

  private function invalidMethodHandler()
  {
    header("{$this->request->serverProtocol} 405 Method Not Allowed");
  }

  private function defaultRequestHandler()
  {
    header("{$this->request->serverProtocol} 404 Not Found");
  }

  /**
   * Risolve uno specifico route
   */
  function resolve()
  {
    $methodDictionary = $this->{strtolower($this->request->requestMethod)};
    $formatedRoute = $this->formatRoute(parse_url($this->request->requestUri, PHP_URL_PATH));
    $method = $methodDictionary[$formatedRoute];

    if(is_null($method))
    {
      $this->defaultRequestHandler();
      return;
    }

    echo call_user_func_array($method, array($this->request));
  }

  function __destruct()
  {
    $this->resolve();
  }
}