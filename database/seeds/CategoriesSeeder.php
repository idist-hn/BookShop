<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("categories")->insert(
            [
                ['name' => "Sách Tiếng Việt",
                    "slug" => "sachtiengviet",
                    "is_feature" => 1],
                ['name' => "Sách Tiếng Anh",
                    "slug" => "sachtienganh",
               "is_feature" => 1],
                ['name' => "Văn Phòng Phẩm",
                    "slug" => "vanphongpham",
                    "is_feature" => 1],
                ['name' => "Ebook",
                    "slug" => "ebook",
                    "is_feature" => 1],

            ]
        );
    }
}
