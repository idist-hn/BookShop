<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('slug', 255)->unique();
            $table->integer("is_feature");
            $table->timestamps();
        });
        Schema::create("book_category",function (Blueprint $table){
            $table->increments('id');
            $table->integer("category_id")->unsigned();
            $table->integer("book_id")->unsigned();
            $table->timestamps();
            $table->foreign("book_id")->references("id")->on("books")->onDelete("cascade");
            $table->foreign("category_id")->references("id")->on("categories")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists("book_category");
        Schema::dropIfExists("categories");
    }
}
