<?php

namespace Controller;

use Model\DB\Article;
use View\Render;

class BlogController {

    public function index() {
        $articles = Article::findAll();

        return Render::blog("Blog", ["articles" => $articles]);
    }

    public function article($request) {
        $params = $request->getParams();
        
        $idArticle = $params->id;

        $article = Article::find(['id' => $idArticle]);

        return Render::article("Articolo", $article);
    
    }
}