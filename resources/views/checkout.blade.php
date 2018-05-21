@extends('layouts.layout')

@section('content')       
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-8">
                    <div class="bill-to">
                        <p>Bill To</p>
                        {{--<div class="form-one">--}}
                            {{--<form>--}}
                                {{--<input type="text" placeholder="Company Name">--}}
                                {{--<input type="text" placeholder="Email*">--}}
                                {{--<input type="text" placeholder="Title">--}}
                                {{--<input type="text" placeholder="First Name *">--}}
                                {{--<input type="text" placeholder="Middle Name">--}}
                                {{--<input type="text" placeholder="Last Name *">--}}
                                {{--<input type="text" placeholder="Address 1 *">--}}
                                {{--<input type="text" placeholder="Address 2">--}}
                            {{--</form>--}}
                        {{--</div>--}}
                        <div class="form-two">
                            <form method="post" action="{{ route('checkout.post') }}">
                                {{csrf_field()}}
                                <input type="text" placeholder="Zip / Postal Code *">
                                <select>
                                    <option>-- Country --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <select>
                                    <option>-- State / Province / Region --</option>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>
                                <input type="password" placeholder="Confirm password">
                                <input type="text" placeholder="Phone *">
                                <input type="text" placeholder="Mobile Phone">
                                <input type="text" placeholder="Fax">
                                <input type="submit" value="Thanh toán">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="order-message">
                        <p>Shipping Order</p>
                        <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                        <label><input type="checkbox"> Shipping to bill address</label>
                    </div>	
                </div>					
            </div>
        </div>
        <div class="review-payment">
            <h2>Review & Payment</h2>
        </div>

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
                        </div>
                    </div>
                </div>
            </div>
        </section><!--/#do_action-->
        <div class="payment-options">
            <span>
                <label><input type="checkbox" disabled>  Thanh toán qua ATM</label>
            </span>
            <span>
                <label><input type="checkbox" disabled> Visa/Master Card </label>
            </span>
            <span>
                <label><input type="checkbox" checked> Trả sau </label>
            </span>
        </div>
        <div class="">

        </div>
    </div>
</section> <!--/#cart_items-->

@endsection