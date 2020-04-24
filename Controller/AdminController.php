<?php

namespace Controller;

use Model\DB\Article;
use Model\DB\Contact;
use View\Render;

class AdminController
{

    //index
    public function index()
    {
        //start della sessione
        $this->startSession();
        //controllo se utente è loggato, senno lo mando al login
        if ($this->isLogged()) {
            return $this->home();
        } else {
            return $this->login();
        }
    }

    //funzione per effettuare login
    public function processLogin($request)
    {
        //ottengo i paramentri della richiesta
        $params = $request->getPostParams();

        //controllo le credenziali
        if (!is_null($params->user) && !is_null($params->password) && $params->user == "admin" && $params->password == "studioloMMTP") {
            //session
            $this->startSession();
            $_SESSION['login'] = 1;
            //redirect
            header("Location: /admin");
        } else {
            //redirect
            header("Location: /admin?error");
        }
    }

    //logout
    public function logout()
    {
        //session
        $this->startSession();
        //distruggo la session
        session_unset();
        session_destroy();
        //redirect
        header("Location: /");
    }

    //modifica articolo
    public function modifyArticle($request)
    {
        //controllo se è loggato
        if ($this->isLogged()) {
            //ottengo parametri richiesta
            $params = $request->getParams();
            $op = $params->op;
            //istanzio oggetto article
            $article = new Article();
            if ($op == "update" || $op == "delete") {
                $idArticle = $params->id;
                $article = Article::find(['id' => $idArticle]);
            }
            //passo alla view, il titolo e le relative variabili
            return Render::modifyArticle("Articolo", ['op' => $op, 'article' => $article]);
        } else {
            //redirect
            header("Location: /admin");
        }
    }

    //edit dell articolo
    public  function processEdit($request)
    {
        //controllo se è loggato
        if ($this->isLogged()) {
            //parametri della richiesta
            $params = $request->getPostParams();

            //Modifica o Elimina
            $which = strtoupper($params->which);

            //Inserisci o aggiorna
            $op = strtoupper($params->op);

            $id = $params->id;
            $title = $params->title;
            $text = $params->text;

            if ($which == "DELETE") {
                $article = Article::find(['id' => $id]);
                $article->delete();
            } else if ($which == "EDIT") {
                //controllo il tipo di operazione
                if ($op == "INSERT") {
                    //istanzio oggetto articolo, in quanto op. di insert
                    $article = new Article();
                } else if ($op == "UPDATE") {
                    //recupero oggetto articolo in base all id
                    $article = Article::find(['id' => $id]);
                }
                //effettuo le modifiche all' oggetto
                $article->setTitle($title);
                $article->setText($text);
                $article->save();
            } else {
                //effettuo il logout
                $this->logout();
            }
        }
        //redirect
        header("Location: /admin");
    }

    //start della session
    private function startSession()
    {
        //check se esiste la session, la starto
        if (session_status() == PHP_SESSION_NONE) {
            //start session
            session_start();
        }
    }

    //controllo se è loggato
    private function isLogged()
    {
        //session
        $this->startSession();
        return isset($_SESSION['login']) && $_SESSION['login'] == 1;
    }

    //home
    private function home()
    {
        //recupero gli oggetti in questione
        $articles = Article::findAll();
        $contacts = Contact::findAll();
        //passo gli oggetti alla view, e il relativo titolo
        return Render::listArticles("Lista Articoli", ["articles" => $articles, "contacts" => $contacts]);
    }
    
    //Render della pagina login
    private function login()
    {
        return Render::login("Login", []);
    }
}
