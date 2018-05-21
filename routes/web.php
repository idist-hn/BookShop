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
Route::get('/search/{query}','Front@search');

Route::get('blade', function () {
    $drinks = array('Vodka','Gin','Brandy');
    return view('page',array('name' => 'The Raven','day' => 'Friday','drinks' => $drinks));
});




