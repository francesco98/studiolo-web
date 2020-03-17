<?php

namespace Controller;

use Model\DB\Article;
use View\Render;

class AdminController {
    public function index()
    {
        $this->startSession();

        if (isset($_SESSION['login']) == 1) {
            return $this->home();
        } else {
            return $this->login();
        }
    }

    public function logout()
    {
        $this->startSession();

        session_unset();
        session_destroy();

        header("Location: /");
    }

    public function processLogin($request)
    {
        $params = $request->getPostParams();

        if (!is_null($params->user) && !is_null($params->password) && $params->user == "admin" && $params->password == "admin") {
            $this->startSession();
            $_SESSION['login'] = 1;

            header("Location: /admin");
        } else {
            header("Location: /");
        }
    }

    private function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
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

    public function modifyArticle($request) {
        $params = $request->getParams();
        
        $op = $params->op;
        $article = new Article();

        if($op == "update"){
            $idArticle = $params->id;
            $article = Article::find(['id' => $idArticle]);
        }

        return Render::modifyArticle("Articolo", $article);
    
    }
}
