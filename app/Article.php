<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table="articles";
    protected $fillable = ['title', 'content'];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment', 'article_id');
    }

    public static function newFromStd(\stdClass $std, $fill = ['*'], $exists = true)
    {
        $instance = new static;
        $values = ($fill == ['*'])
            ? (array) $std
            : array_intersect_key( (array) $std, array_flip($fill));
        $instance->setRawAttributes($values, true);
        $instance->exists = $exists;
        return $instance;
    }
}
