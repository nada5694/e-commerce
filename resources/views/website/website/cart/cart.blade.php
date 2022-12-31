@extends('layouts.website.master')

@section('title')
    Cart
@endsection

@section('content')

@if($cartItems_count < 1) <!---- when the cart is empty for each user (customers ONLY!) then
    hide the table's heading because it is out of the loop already ---->
<style>
    table{display: none;}
    .proceed-to-checkout-div{display: none;}
</style>
@endif

@include('layouts.website.Errors')



@if(session()->has('cart_checkout_item_deleted_message'))
    <div class="alert alert-success text-center session-message">
    <button type="button" class="close" data-dismiss="alert">x</button>
    {{ session()->get('cart_checkout_item_deleted_message') }}
    </div>
@endif

<div class="fashion_gate-section">
    <div class="container">
        <div class="row mb-5 cart_page" >
            {{-- <form class="col-md-12" method="post"> --}}
                <div class="site-blocks-table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th class="product-thumbnail">Image</th>
                            <th class="product-name">Product</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-price">Price</th>
                            <th class="product-total">Total</th>
                            <th class="product-remove">
                                @if($cartItems_count == 1 )
                                    Remove Item
                                @elseif($cartItems_count > 1)
                                    Remove Items
                                @endif
                            </th>
                            </tr>
                        </thead>
                        @forelse ($cartItems as $cartItem)
                            <tbody>
                                <tr>
                                    <td class="product-thumbnail">
                                        <img src="{{$cartItem->product_image}}" alt="{{$cartItem->product_name}}" class="img-fluid"></td>
                                <td class="product-name">{{ $cartItem->product_name ?? 'Not Found' }}</td>
                                <td class="quantity">
                                    <form action="{{ url('update-cart-items-quantity' , $cartItem->id) }}" method="POST" id="alert-form" class="update-form">
                                        @csrf
                                        {{ method_field('patch') }}
                                            <input type="number" class="quantity_value" name="quantity_value" value="{{ $cartItem->quantity }}" min="0">
                                    </form>
                                </td>
                                @if($cartItem->discount > 0)
                                    <td class="cart-regester-price">
                                        <del>{{ $cartItem->price }} EGP</del><br>
                                        <span>{{ $cartItem->price - ($cartItem->price * $cartItem->discount) }} EGP</span>
                                    </td>
                                @elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == "")
                                    <td class="price-td">{{ $cartItem->price }} EGP</td>
                                @endif

                                @if($cartItem->discount > 0)
                                    <td class="total_price_cell" >
                                        <del>{{ $cartItem->quantity * $cartItem->price }} EGP</del><br>
                                        <span>{{ ($cartItem->quantity) * ($cartItem->price - ($cartItem->price * $cartItem->discount)) }} EGP</span>
                                    </td>
                                @elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItem->discount == "")
                                    <td class="total_price_cell">{{ $cartItem->quantity * $cartItem->price }} EGP</td>
                                @endif

                                <td>
                                    {!! Form::open([
                                        'route' => ['carts.destroy',$cartItem->id],
                                        'method' => 'delete'
                                    ])!!}
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('{{__('Are you sure that you want to remove the ['.$cartItem->product_name.'] item(s) from your cart?')}}');" type="submit" title="{{__('Remove all')." [$cartItem->product_name] item(s)"}}"><i class="fa-solid fa-trash"></i>&nbsp;&nbsp;Remove</button>
                                    {!! Form::close() !!}
                                </td>
                                </tr>
                            </tbody>
                        @empty
                            <div class="container cart_empty ">
                                <div class="row cart_empty_content" >
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <img src="assets/website/images/cart-empty(2).gif" />
                                        <h5 class="pt-4">There are no items in your cart yet! Go ahead and add some cool stuff to it!</h5>
                                        <br>
                                        <a href="{{ route('product') }}" class="browse-products-link">Browse Products</a>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </table>
                </div>
            {{-- </form> --}}
        </div>

        <div class="row">
            <div class="col-md-6">
            <div class="row mb-5">
                <div class="col-md-6 mb-3 mb-md-0">
                    <a href="{{ route('product') }}" class="btn btn-outline-black btn-sm btn-block">Continue Shopping</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
                </div>
                <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                </div>
                <div class="col-md-4">
                <button class="btn btn-black">Apply Coupon</button>
                </div>
            </div>
            </div>
            <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
                <div class="col-md-7">
                <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                    </div>
                    <div class="col-md-6 text-right">
                    <strong class="text-black">
                        @foreach($finalData as $finalData_result)
                            {{ $finalData_result ?? '???'}} EGP
                        @endforeach
                    </strong>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                    <span class="text-black">Total</span>
                    </div>
                    <div class="col-md-6 text-right">
                    <strong class="text-black">
                        @foreach($finalData as $finalData_result)
                            <span>{{ $finalData_result ?? '???'}} EGP</span>
                        @endforeach
                    </strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                    <a href="javascript:void(0);"> <button class="btn btn-black btn-lg py-3 btn-block"> Proceed To Checkout </button> </a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>


    <div class="fashion_gate-section bg-light">
        <div class="container">
        <div class="row align-items-stretch">
            <div class="col-12 col-sm-6 col-md-4 mb-3 mb-md-0">
            <div class="feature h-100">
                <div class="icon mb-4">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-truck" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5v7h-1v-7a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .5.5v1A1.5 1.5 0 0 1 0 10.5v-7zM4.5 11h6v1h-6v-1z"/>
                    <path fill-rule="evenodd" d="M11 5h2.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5h-1v-1h1a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4.5h-1V5zm-8 8a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                    <path fill-rule="evenodd" d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 1a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                </svg>
                </div>
                <h3>Worldwide Delivery</h3>
                <p>Far far away, behind the word mountains, far from the countries.</p>
            </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mb-3 mb-md-0">
            <div class="feature h-100">
                <div class="icon mb-4">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-lock" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M5.443 1.991a60.17 60.17 0 0 0-2.725.802.454.454 0 0 0-.315.366C1.87 7.056 3.1 9.9 4.567 11.773c.736.94 1.533 1.636 2.197 2.093.333.228.626.394.857.5.116.053.21.089.282.11A.73.73 0 0 0 8 14.5c.007-.001.038-.005.097-.023.072-.022.166-.058.282-.111.23-.106.525-.272.857-.5a10.197 10.197 0 0 0 2.197-2.093C12.9 9.9 14.13 7.056 13.597 3.159a.454.454 0 0 0-.315-.366c-.626-.2-1.682-.526-2.725-.802C9.491 1.71 8.51 1.5 8 1.5c-.51 0-1.49.21-2.557.491zm-.256-.966C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815z"/>
                    <path d="M9.5 6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    <path d="M7.411 8.034a.5.5 0 0 1 .493-.417h.156a.5.5 0 0 1 .492.414l.347 2a.5.5 0 0 1-.493.585h-.835a.5.5 0 0 1-.493-.582l.333-2z"/>
                </svg>
                </div>
                <h3>Secure Payments</h3>
                <p>Far far away, behind the word mountains, far from the countries.</p>
            </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 mb-3 mb-md-0">
            <div class="feature h-100">
                <div class="icon mb-4">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-counterclockwise" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.83 6.706a5 5 0 0 0-7.103-3.16.5.5 0 1 1-.454-.892A6 6 0 1 1 2.545 5.5a.5.5 0 1 1 .91.417 5 5 0 1 0 9.375.789z"/>
                    <path fill-rule="evenodd" d="M7.854.146a.5.5 0 0 0-.708 0l-2.5 2.5a.5.5 0 0 0 0 .708l2.5 2.5a.5.5 0 1 0 .708-.708L5.707 3 7.854.854a.5.5 0 0 0 0-.708z"/>
                </svg>
                </div>
                <h3>Simple Returns</h3>
                <p>Far far away, behind the word mountains, far from the countries.</p>
            </div>
            </div>
        </div>
        </div>
    </div> <!-- /FASHION GATE -->
@endsection

@section('scripts')
@endsection
