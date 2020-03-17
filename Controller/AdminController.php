<?php

namespace Controller;

use Model\DB\Article;
use View\Render;

class AdminController
{
    public function index()
    {
        $this->startSession();

        if ($this->isLogged()) {
            return $this->home();
        } else {
            return $this->login();
        }
    }

    public function processLogin($request)
    {
        $params = $request->getPostParams();

        if (!is_null($params->user) && !is_null($params->password) && $params->user == "admin" && $params->password == "admin") {
            $this->startSession();
            $_SESSION['login'] = 1;

            header("Location: /admin");
        } else {
            header("Location: /admin?error");
        }
    }

    public function logout()
    {
        $this->startSession();

        session_unset();
        session_destroy();

        header("Location: /");
    }

    public function modifyArticle($request)
    {
        if ($this->isLogged()) {
            $params = $request->getParams();

            $op = $params->op;
            $article = new Article();

            if ($op == "update") {
                $idArticle = $params->id;
                $article = Article::find(['id' => $idArticle]);
            }

            return Render::modifyArticle("Articolo", ['op' => $op, 'article' => $article]);
        } else {
            header("Location: /admin");
        }
    }

    public  function processEdit($request)
    {
        if ($this->isLogged()) {
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

                if ($op == "INSERT") {
                    $article = new Article();
                } else if ($op == "UPDATE") {
                    $article = Article::find(['id' => $id]);
                }

                $article->setTitle($title);
                $article->setText($text);
                $article->save();
            } else {
                $this->logout();
            }
        }

        header("Location: /admin");
    }

    private function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    private function isLogged()
    {
        $this->startSession();
        return isset($_SESSION['login']) && $_SESSION['login'] == 1;
    }

    private function home()
    {
        $articles = Article::findAll();
        return Render::listArticles("Lista Articoli", ["articles" => $articles]);
    }

    private function login()
    {
        return Render::login("Login", []);
    }
}
