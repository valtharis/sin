<?php
namespace App\Http\Logic;

use App\Article;
use App\Comment;

class CommentLogic
{

    public function get($id = null)
    {
        if (!is_null($id)) {
            return Comment::find($id);
        }
        return Comment::all();
    }

    public function create($data, $article_id)
    {
        $obj = new Comment();
        $container = Article::find($article_id);
        $obj->fill($data);
        $obj->article()->associate($container);
        $obj->save();
        return $obj;
    }

    public function update($id, $data, $article_id = null)
    {

    }

    public function delete($id)
    {
        $obj = Comment::find($id);
        if (!is_null($obj)) {
            return $obj->forceDelete();
        }
    }

    public function like($id){
        $comment = Comment::find($id);
        if(is_null($comment)){
            return;
        }
        $comment->likes_count = $comment->likes_count+1;
        return $comment->save();
    }


}