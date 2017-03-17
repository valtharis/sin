<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoryController extends Controller
{
    //
    public function get(){
        $id = request()->route("id");
        if(is_null($id)){
            $categories = Category::all();
            return view("categories", ["categories"=>$categories]);
        }
        $category = Category::find($id);
        if(is_null($category)){
            return redirect(route("category.get"));
        }
        return view("category", ["category"=>$category]);
    }
    public function create(){
        $data = request()->all();
        $name = array_get($data, "name");
        if(is_null($name) || strlen($name) == 0 ){
            return redirect(route("category.get"));
        }
        $category = new Category();
        $category->name = $name;
        $category->save();
        return redirect(route("category.get"));
    }
}
