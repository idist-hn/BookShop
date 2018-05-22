@extends('layouts.layout')

@section('content')       
<section id="advertisement">
    <div class="container">
        <img src="{{asset('images/shop/advertisement.jpg')}}" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    @include('shared.sidebar')
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">{{ isset($category->name)?$category->name:"Nhà Sách E Shopper" }}</h2>
                    @foreach($books as $book)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ $book->thumbnail }}" alt="" style="height: 250px"/>
                                    <h2>{{ $book->price }}đ</h2>
                                    <p>{{ $book->name }}</p>
                                    <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    <a href="{{ route("front.book.detail.get", ['id'=> $book->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Xem Chi tiết</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{ $book->price }}đ</h2>
                                        <p>{{ $book->title }}</p>
                                        <a href="{{url('cart')}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                        <a href="{{ route("front.book.detail.get", ['id'=> $book->id]) }}" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Thêm vào yêu thích</a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i>So sánh</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div><!--features_items-->
                @php
                    try{
                    $books->links();
                    }catch (Exception $e){
                    }


                @endphp
            </div>
        </div>
    </div>
</section>
@endsection