<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';
    protected $table = 'books';
    protected $fillable = array('name', 'title', 'slug', 'description','price');

}
