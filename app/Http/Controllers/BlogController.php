<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Logic\ArticleLogic;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    //
    public function __construct(){
        $this->articleLogic = new ArticleLogic();
    }

    public function index(){
        return view('blog.index');
    }

    public function category(){
        $id = request()->route("id");
        if(!is_null($id)){
            return view('blog.category');
        }
        $categories = Category::all();
        $data = [
            'categories'=>$categories
        ];
        return view('blog.categories', $data);
    }

    public function article(){
        $id = request()->route("id");
        if(!is_null($id)){
            $articles = Article::find($id);
            $data = [
                'article'=>$articles
            ];
            return view('blog.article', $data);
        }
        $articles = Article::all();
        $data = [
            'articles'=>$this->articleLogic->makeShort($articles)
        ];
        return view('blog.articles', $data);
    }
}
