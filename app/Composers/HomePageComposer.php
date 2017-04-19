<?php
namespace App\Composers;

use App\Article;
use App\Http\Logic\ArticleLogic;

class HomePageComposer
{
    public function __construct(){
        $this->articleLogic = new ArticleLogic();
    }

    private function header(){
        $article = Article::orderBy('created_at', 'desc')->first();
        return $this->articleLogic->makeShort($article);
    }

    private function latest(){
        $articles = Article::orderBy('created_at', 'desc')->skip(1)->limit(3)->get();
        return $this->articleLogic->makeShort($articles);
    }

    public function compose($view){

        $data = [
            "header" => $this->header(),
            "latest" => $this->latest()
        ];
        $view->with($data);
    }
}