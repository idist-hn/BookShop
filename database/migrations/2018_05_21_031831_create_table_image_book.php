<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImageBook extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("image_book",function (Blueprint $table){
            $table->increments("id");
            $table->integer("book_id")->unsigned();
            $table->string("url",500);
            $table->timestamps();
            $table->foreign("book_id")->references("id")->on("books")->onDelete("cascade");
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
        Schema::dropIfExists("image_book");
    }
}
