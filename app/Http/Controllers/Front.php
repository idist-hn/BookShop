<?php

namespace App\Http\Controllers;

use App\Notifications\SendMail;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\Category;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Mockery\Exception;

class Front extends Controller
{

    public function index()
    {
        $features = Book::getFeature(5);
        $data["features"] = $features;
        $categories_feature = Category::getFeature();
        $data['categories_feature'] = $categories_feature;
        return view('home', array('page' => 'home', "data" => $data));
    }

    public function products()
    {
        $books = Book::paginate(15);
        return view('products', array('page' => 'products', 'books'=> $books));
    }

    public function product_details($id)
    {
        $book = Book::find($id);
        return view('product_details', array('page' => 'products', "book" => $book));
    }

    public function product_categories($name)
    {
        $category = Category::getBook($name);
        $books = $category->books;
        return view('products', array('page' => 'products', "category" => $category, 'books' => $books));
    }

    public function product_brands($name, $category = null)
    {
        $books = Book::all();
        return view('products', array('page' => 'products', 'books'=> $books));
    }

    public function blog()
    {
        return view('blog', array('page' => 'blog'));
    }

    public function blog_post($id)
    {
        return view('blog_post', array('page' => 'blog'));
    }

    public function contact_us()
    {
        return view('contact_us', array('page' => 'contact_us'));
    }

    public function login()
    {
        return view('login', array('page' => 'home'));
    }

    public function logout()
    {
        return view('login', array('page' => 'home'));
    }

    public function cart() {
//        Cart::destroy();

        //update/ add new item to cart
        if (Request::isMethod('post')) {
            $book_id = Request::get('book_id');
            $book = Product::find($book_id);
            Cart::add(array('id' => $book_id, 'name' => $book->name, 'qty' => 1, 'price' => $book->price, 'thumbnail'=> $book->thumbnail));
        }

        //increment the quantity
        if (Request::get('book_id') && (Request::get('increment')) == 1) {
            $rowId = Cart::search(function($key, $value) { return $key->id == Request::get('book_id'); })->first();
            $item = Cart::get($rowId->rowId);
            Cart::update($rowId->rowId, $rowId->qty + 1);
        }

        //decrease the quantity
        if (Request::get('book_id') && (Request::get('decrease')) == 1) {
            $rowId = Cart::search(function($key, $value) { return $key->id == Request::get('book_id'); })->first();
            $item = Cart::get($rowId->rowId);
            Cart::update($rowId->rowId, $rowId->qty - 1);
        }

        $cart = Cart::content();

        return view('cart', array('cart' => $cart, 'title' => 'Welcome', 'description' => '', 'page' => 'home'));
    }

    public function checkout()
    {
        $cart = Cart::content();
        return view('checkout', array('page' => 'home', 'cart'=> $cart));
    }

    public function postCheckout(Request $request){
        $user = Auth::user();
        try{
            $user->notify(new SendMail());
        }catch (\Exception $e){

        }

        try{
            DB::table("bills")->insert([
                'user_id' => $user->id,
                'cart' => json_encode(Cart::content())
            ]);
            Cart::destroy();
        }catch (\Exception $e){

        }

        return redirect(route("user.homepage"));
    }

    public function search($query)
    {
        return view('products', array('page' => 'products'));
    }

    public function searchBook(){
        $keyword = Request::get('keyword');
        $books = Book::search($keyword)->paginate('15');
//        dd($books);

        return view('search', array('page' => 'products', 'books' => $books));

    }
}
