<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Composers\ArticlesPageComposer;
use App\Http\Logic\ArticleLogic;
use App\Http\Logic\CategoryLogic;
use Illuminate\Http\Request;

use App\Http\Requests;

class BlogController extends Controller
{
    //
    public function __construct(){
        $this->articleLogic = new ArticleLogic();
        $this->categoryLogic = new CategoryLogic();
        $this->articlesPageComposer = new ArticlesPageComposer();
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

    public function postSearch(){
        $data = request()->get("search");
        $articles = $this->articleLogic->search($data);
        $data = [
            'phrase' => $data,
            'size' => $articles->count(),
            'rows'=> $this->articlesPageComposer->rowsSplit($articles)
        ];
        return view('blog.search', $data);
    }
    public function getSearch(){
        return redirect()->route("get.blog.home");
    }
}
