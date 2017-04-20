<?php

namespace App\Http\Controllers;

use App\Http\Logic\ArticleLogic;
use App\Http\Logic\CommentLogic;
use Validator;


class XhrController extends Controller
{
    public function __construct(){
        $this->commentLogic = new CommentLogic();
        $this->articleLogic = new ArticleLogic();
    }
    //
    public function getComment(){
        $id = request()->route("id");
        return response()->json($this->commentLogic->get($id));
    }

    public function deleteComment(){
        $id = request()->route("id");
        return response()->json($this->commentLogic->delete($id));
    }

    public function getCommentByArticle(){
        $id = request()->route("id");
        return response()->json($this->articleLogic->getComments($id));
    }

    public function postCommentArticle(){
        $id = request()->route("id");
        $data = request()->only(["author", "content"]);
        $rules = [
            "author" => "required|string|min:2|max:32",
            "content" => "required|string|min:3|max:300",
        ];
        $validator = Validator::make($data, $rules);
        if($validator->errors()->count()>0){
            return response()->json($validator->getMessageBag()->all(), 400);
        }
        return response()->json($this->commentLogic->create($data, $id));
    }

    public function putCommentLike(){
        $id = request()->route("id");
        return response()->json($this->commentLogic->like($id));
    }
}
