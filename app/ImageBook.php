<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageBook extends Model
{
    //
    protected $table = "image_book";

    public function books(){
        return $this->belongsTo("App\Book");
    }
}
