<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\Http\Requests;

class CommentController extends Controller
{
    //
        public function xhrCreate(){
        $data = request()->json();
        $author = array_get($data, "author");
        $content = array_get($data, "content");
        $article_id = array_get($data, "article_id");
        var_dump($data);
//        $comment = new Comment();
//        $article = Article::find($article_id);
//        $comment->article()->associate($article);
//        $comment->author = $author;
//        $comment->content = $content;
//        $comment->likes_count = 0;
//        $comment->save();
//        return response()->json(["data"=>"ok"]);
        
    }
}
