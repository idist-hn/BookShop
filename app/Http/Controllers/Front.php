<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class Front extends Controller {

    public function index() {
        $features = Book::getFeature(5);
        $data["features"] = $features;
        $categories_feature = Category::getFeature();
        $data['categories_feature'] = $categories_feature;
        return view('home', array('page' => 'home', "data"=> $data));
    }

    public function products() {
        return view('products', array('page' => 'products'));
    }

    public function product_details($id) {
        $book = Book::find($id);
        return view('product_details', array('page' => 'products', "book"=> $book));
    }

    public function product_categories($name) {
        $category = Category::getBook($name);
        $books = $category->books;
        return view('products', array('page' => 'products', "category"=> $category,'books'=> $books));
    }

    public function product_brands($name, $category = null) {
        return view('products', array('page' => 'products'));
    }

    public function blog() {
        return view('blog', array('page' => 'blog'));
    }

    public function blog_post($id) {
        return view('blog_post', array('page' => 'blog'));
    }

    public function contact_us() {
        return view('contact_us', array('page' => 'contact_us'));
    }

    public function login() {
        return view('login', array('page' => 'home'));
    }

    public function logout() {
        return view('login', array('page' => 'home'));
    }

    public function cart(Request $request) {
        if ($request->isMethod('post')) {
            $book_id = $request['book_id'];
            $book = Book::find($book_id);
            Cart::add(array('id' => $book_id, 'name' => $book->name, 'qty' => $request['quantity'], 'price' => $book->price));
        }

        $cart = Cart::content();

        return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }


    public function checkout() {
        return view('checkout', array('page' => 'home'));
    }

    public function search($query) {
        return view('products', array('page' => 'products'));
    }

}
