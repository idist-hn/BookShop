<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("books",function (Blueprint $table){
            $table->increments('id');
            $table->string('name', 255)->unique();
            $table->string('title', 140);
            $table->string('slug', 140);
            $table->string('description', 5000);
            $table->string('thumbnail', 5000);
            $table->integer('price');
            $table->integer('is_feature');
            $table->timestamps();
        });
        Schema::create("authors",function (Blueprint $table){
           $table->increments("id");
           $table->string("name");
           $table->string("email");
           $table->string("addr");
           $table->timestamps();
        });
        Schema::create("author_book",function (Blueprint $table){
            $table->increments("id");
            $table->integer("book_id")->unsigned();
            $table->integer("author_id")->unsigned()->nullable();
            $table->timestamps();
            $table->foreign("book_id")->references("id")->on("books")->onDelete("cascade");
            $table->foreign("author_id")->references("id")->on("authors")->onDelete("set null");
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
        Schema::dropIfExists("author_book");
        Schema::dropIfExists("authors");
        Schema::dropIfExists("products");

    }
}
