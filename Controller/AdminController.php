<?php

namespace Controller;

use Model\DB\Article;
use View\Render;

class AdminController {

    public function index() {
        $articles = Article::findAll();

        return Render::listArticles("Lista Articoli", ["articles" => $articles]);
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