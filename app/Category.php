<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories";

    public static function getFeature()
    {
        return self::where("is_feature", 1)->orderBy("updated_at")->get();
    }
    public static function getBook($id)
    {
        return self::where("id", $id)->orderBy("updated_at")->first();
    }
    public function books()
    {
        return $this->belongsToMany('App\Book');
    }
}
