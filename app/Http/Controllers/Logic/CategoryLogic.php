<?php
namespace App\Http\Logic;
use App\Category;


class CategoryLogic{

    public function get($id = null){
        if(!is_null($id)){
            return Category::find($id);
        }
        return Category::all();
    }

    public function create($data){
        $obj = new Category();
        $obj->fill($data);
        $obj->save();
        return $obj;
    }

    public function update($id, $data){
        $obj = Category::find($id);
        if(!is_null($obj)){
            $obj->update($data);
        }
    }

    public function delete($id){
        $obj = Category::find($id);
        if(!is_null($obj)){
            return $obj->forceDelete();
        }
    }

}