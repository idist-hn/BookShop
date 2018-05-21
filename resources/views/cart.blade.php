@extends('layouts.layout')

@section('content')       
     <section id="cart_items">
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ol>
                </div>
                <div class="table-responsive cart_info">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{ $item->thumbnail }}" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $item->name }}</a></h4>
                                    <p>Web ID: {{ $item->id }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ $item->price }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href='{{url("cart?book_id=$item->id&increment=1")}}'> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="{{ $item->qty }}" autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href='{{url("cart?book_id=$item->id&decrease=1")}}'> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ $item->qty*$item->price }}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </section> <!--/#cart_items-->

        <section id="do_action">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="total_area">
                            <ul>
                                <li>Tiền hàng: <span>{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal() }}</span></li>
                                <li>Eco Tax <span>{{ \Gloudemans\Shoppingcart\Facades\Cart::tax() }}</span></li>
                                <li>Tổng tiền <span>{{ \Gloudemans\Shoppingcart\Facades\Cart::total() }}</span></li>
                            </ul>
                            <a class="btn btn-default update" href="{{url('cart')}}">Update</a>
                            <a class="btn btn-default check_out" href="{{url('checkout')}}">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->
@endsection