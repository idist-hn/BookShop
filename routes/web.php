<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(["prefix"=> "admincp","middleware" => "auth"],function (){
    Route::view('/', 'admincp.panel.blank');
    // Section CoreUI elements
    Route::view('/admincp/sample/dashboard','samples.dashboard');
    Route::view('/admincp/sample/buttons','samples.buttons');
    Route::view('/admincp/sample/social','samples.social');
    Route::view('/admincp/sample/cards','samples.cards');
    Route::view('/admincp/sample/forms','samples.forms');
    Route::view('/admincp/sample/modals','samples.modals');
    Route::view('/admincp/sample/switches','samples.switches');
    Route::view('/admincp/sample/tables','samples.tables');
    Route::view('/admincp/sample/tabs','samples.tabs');
    Route::view('/admincp/sample/icons-font-awesome', 'samples.font-awesome-icons');
    Route::view('/admincp/sample/icons-simple-line', 'samples.simple-line-icons');
    Route::view('/admincp/sample/widgets','samples.widgets');
    Route::view('/admincp/sample/charts','samples.charts');


    Route::group(["prefix"=>"settings"],function (){
        Route::get("/","BackEnd\SettingController@getSettings")->name("admin.setting.get");
        Route::get("/add","BackEnd\SettingController@insertSetting")->name("admin.setting.add");
        Route::get("/lock","BackEnd\SettingController@lockSetting")->name("admin.setting.lock");
        Route::get("/edit","BackEnd\SettingController@insertSetting")->name("admin.setting.edit");
        Route::get("/delete","BackEnd\SettingController@insertSetting")->name("admin.setting.delete");
        Route::post("/add","BackEnd\SettingController@doInsertSetting")->name("admin.setting.add.post");
    });
});
Route::group(['prefix'=>"admincp"],function (){
    Auth::routes();
});


Route::get('/','Front@index');
Route::get('/products','Front@products');
Route::get('/products/details/{id}','Front@product_details')->name("front.book.detail.get");
Route::get('/products/categories/{name}','Front@product_categories')->name("front.category.get");
Route::get('/products/brands/{name}/{category?}','Front@product_brands');
Route::get('/blog','Front@blog');
Route::get('/blog/post/{id}','Front@blog_post');
Route::get('/contact-us','Front@contact_us');
Route::get('/login','Front@login');
Route::get('/logout','Front@logout');
Route::get('/cart','Front@cart');
Route::post('/cart','Front@cart')->name("front.cart.post");
//Route::get("/cart/add/{id}","Front@addItem")->name("cart.add");
Route::get('/checkout','Front@checkout');
Route::post('post_checkout','Front@postCheckout')->name('checkout.post');
Route::get('/search/{query}','Front@search');

Route::get('blade', function () {
    $drinks = array('Vodka','Gin','Brandy');
    return view('page',array('name' => 'The Raven','day' => 'Friday','drinks' => $drinks));
});




