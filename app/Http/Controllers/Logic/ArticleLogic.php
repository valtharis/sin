<?php
namespace App\Http\Logic;

use App\Article;
use App\Category;
use Illuminate\Support\Collection;
use DB;


class ArticleLogic
{

    public function get($id = null)
    {
        if (!is_null($id)) {
            return Article::find($id);
        }
        return Article::all();
    }

    public function create($data, $category_id)
    {
        $obj = new Article();
        $container = Category::find($category_id);
        $obj->fill($data);
        $obj->category()->associate($container);
        $obj->save();
        return $obj;
    }

    public function update($id, $data, $category_id = null)
    {
        $obj = Article::find($id);
        if (!is_null($obj)) {
            $obj->update($data);
        }
        if (!is_null($category_id)) {
            $container = Category::find($category_id);
            $obj->category()->dissociate();
            $obj->category()->associate($container);
            $obj->save();
        }
    }

    public function delete($id)
    {
        $obj = Article::find($id);
        if (!is_null($obj)) {
            return $obj->forceDelete();
        }
    }

    public function makeShort($articles, $length=300){
        if($articles instanceof Collection){
            return $articles->map(function($article) use($length){
                $article->content = substr($article->content, 0, $length)."...";
                return $article;
            });
        }
        if($articles instanceof Article){
            $articles->content = substr($articles->content, 0, $length)."...";
            return $articles;
        }
        return null;
    }

    public function getComments($id){
        $article = Article::find($id);
        if(!is_null($article)){
            return $article->comments;
        }
        return new Collection();
    }

    public function search($phrase){
        $phrase = trim($phrase);
        $results = DB::table('articles')
            ->orWhere('title', 'LIKE', '%'.$phrase.'%')
            ->orWhere('content', 'LIKE', '%'.$phrase.'%')
            ->get();
        $collection = new Collection();
        foreach ($results as $result){
            $collection->push(Article::newFromStd($result));
        }
        return $collection;
    }

}