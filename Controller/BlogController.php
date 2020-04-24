<?php

namespace Controller;

use Model\DB\Article;
use View\Render;

class BlogController {

    //index
    public function index() {
        //recupero tutti gli articoli
        $articles = Article::findAll();
        //passo alla view, titolo e il relativi articoli
        return Render::blog("Blog", ["articles" => $articles]);
    }

    //per caricare singolo articolo
    public function article($request) {
        //ottengo i parametri della richiesta
        $params = $request->getParams();
        $idArticle = $params->id;

        //cerco l articolo
        $article = Article::find(['id' => $idArticle]);
        //passo alla view, titolo e il relativo articolo
        return Render::article("Articolo", $article);
    }
}