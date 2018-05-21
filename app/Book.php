<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = "books";


    public static function getFeature($count){
        return self::where("is_feature",1)->orderBy("updated_at")->limit(5)->get();
    }
    public function category()
    {
        return $this->belongsToMany('App\Category');
    }
    public function images(){
        return $this->hasMany("App\ImageBook");
    }
}
