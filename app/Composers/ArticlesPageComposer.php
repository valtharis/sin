<?php
namespace App\Composers;

use App\Article;
use App\Http\Logic\ArticleLogic;
use Illuminate\Support\Collection;

class ArticlesPageComposer
{
    public function __construct(){
        $this->articleLogic = new ArticleLogic();
    }
    public function rowsSplit(Collection $items, $rowSize = 3){
        $rows = new Collection();
        for($i=0;$i<$items->count();$i+=$rowSize){
            $rows->push($this->articleLogic->makeShort($items->slice($i, $rowSize)));
        }
        return $rows;
    }

    public function compose($view){
        $articles = $this->articleLogic->get();



        $data = [
            "rows" => $this->rowsSplit($articles)
        ];
        $view->with($data);
    }
}