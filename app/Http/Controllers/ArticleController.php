<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;

class ArticleController extends Controller
{
    //
    public function get(){
        $id = request()->route("id");
        if(is_null($id)){
            $articles = Article::all();
            return view("articles", ["articles"=>$articles]);
        }
        $article = Article::find($id);
        if(is_null($article)){
            return redirect(route("article.get"));
        }
        return view("article", ["article"=>$article]);
    }
}
