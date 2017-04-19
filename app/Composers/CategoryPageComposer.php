<?php
namespace App\Composers;

use App\Article;
use App\Http\Logic\ArticleLogic;
use App\Http\Logic\CategoryLogic;
use Illuminate\Support\Collection;

class CategoryPageComposer
{
    public function __construct(){
        $this->articlesPageComposer = new ArticlesPageComposer();
        $this->categoryLogic = new CategoryLogic();
    }

    public function compose($view){
        $category_id = request()->route("id");
        $category = $this->categoryLogic->get($category_id);

        $data = [
            "category" => $category,
            "rows" => $this->articlesPageComposer->rowsSplit($category->articles)
        ];
        $view->with($data);
    }
}