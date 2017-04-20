<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table="comments";
    protected $fillable = ["author", "content", "likes_count"];
    
    public function article(){
        return $this->belongsTo('App\Article');
    }
}
