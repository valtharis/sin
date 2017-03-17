<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table="articles";
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment', 'article_id');
    }
}
