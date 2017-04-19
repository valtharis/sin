<?php

namespace App\Http\Controllers;
use App\Http\Logic\ArticleLogic;
use App\Http\Logic\CategoryLogic;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;


class ManageController extends Controller
{
    //
    public function __construct(){
        $this->categoryLogic = new CategoryLogic();
        $this->articleLogic = new ArticleLogic();
    }
    public function index(){
        return view("manage.index");
    }

    public function showCategory(){
        $id = request()->route("id");
        if(!is_null($id)){
            $data = $this->categoryLogic->get($id);
            return view("manage.category", ["category"=>$data]);
        }
        $data = $this->categoryLogic->get();
        return view("manage.categories", ["categories"=>$data]);
    }

    public function storeCategory(){
        $data = request()->all();
        $rules = [
            "name" => "required|string|min:2|max:32"
        ];
        $validator = Validator::make($data, $rules);
        if($validator->errors()->count()>0){
            return back()->withErrors($validator);
        }
        $this->categoryLogic->create($data);
        return redirect()->route("get.manage.category");
    }

    public function updateCategory(){
        $id = request()->route("id");
        $data = request()->all();
        $rules = [
            "name" => "required|string|min:2|max:32"
        ];
        $validator = Validator::make($data, $rules);
        if($validator->errors()->count()>0){
            return back()->withErrors($validator);
        }
        $this->categoryLogic->update($id, $data);
        return redirect()->route("get.manage.category", ["id"=>$id]);
    }

    public function DeleteCategory(){
        $id = request()->route("id");
        try {
            $this->categoryLogic->delete($id);
            return redirect()->route("get.manage.category");
        }catch (\Exception $e){
            return redirect()->route("get.manage.category", ["id"=>$id])->with(["errors"=>new MessageBag(["Cannot be removed while contains articles."])]);
        }
    }


    public function showArticle(){
        $id = request()->route("id");
        $categories = $this->categoryLogic->get();
        if(!is_null($id)){
            $data = $this->articleLogic->get($id);
            return view("manage.article", ["article"=>$data, "categories"=>$categories]);
        }
        $data = $this->articleLogic->get();
        return view("manage.articles", ["articles"=>$data, "categories"=>$categories]);
    }

    public function storeArticle(){
        $data = request()->all();
        $rules = [
            "title" => "required|string|min:2|max:32",
            "content" => "required|string|min:3|max:600",
            "category_id" => "required|integer|exists:categories,id"
        ];
        $validator = Validator::make($data, $rules);
        if($validator->errors()->count()>0){
            return back()->withErrors($validator);
        }
        $category_id = array_get($data, "category_id");
        unset($data['category_id']);
        $this->articleLogic->create($data, $category_id);
        return redirect()->route("get.manage.article");
    }

    public function updateArticle(){
        $id = request()->route("id");
        $data = request()->all();
        $rules = [
            "title" => "required|string|min:2|max:32",
            "content" => "required|string|min:3|max:600",
            "category_id" => "required|integer|exists:categories,id"
        ];
        $validator = Validator::make($data, $rules);
        if($validator->errors()->count()>0){
            return back()->withErrors($validator);
        }
        $category_id = array_get($data, "category_id");
        unset($data['category_id']);
        $this->articleLogic->update($id, $data, $category_id);
        return redirect()->route("get.manage.article", ["id"=>$id]);
    }

    public function DeleteArticle(){
        $id = request()->route("id");
        $this->articleLogic->delete($id);
        return redirect()->route("get.manage.article");
    }
}
