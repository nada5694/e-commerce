@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Cart
@endsection

@section('content')
<style>
    @media (max-width: 767.98px) {
    .cart-unregistered-div {
        margin-left: -22% !important;
    }
}
</style>
    <div class="container cart-unregistered pt-5">
        <div class="row cart-unregistered-content" >
            <div class="col-lg-12 col-sm-12 col-xs-12 cart-unregistered-div" >
                {{-- <img src="assets/website/images/guest-login.gif" width="130" style="border-radius: 20px;"/> --}}
                {{-- <img src="assets/website/images/cart-empty(2).gif" width="130" style="border-radius: 20px;"/> --}}
                {{-- <img src="assets/website/images/cart-empty(3).gif" width="130" style="border-radius: 20px;"/> --}}
                {{-- <img src="assets/website/images/cart-empty(4).gif" width="130" style="border-radius: 20px;"/> --}}
                <img src="assets/website/images/cart-empty(5).gif"/>
                <h5 class="pt-4">Your are not logged in. Go ahead and <a href="{{ route('login') }}" style="color: rgba(156, 19, 108, 0.65);">log in</a> and add some cool stuff to it!</h5>
                <h6 class="pt-3">Or <a href="{{ route('register') }}" style="color: rgba(156, 19, 108, 0.65);">register</a> if you don't have an account already!</h6>
                <br><br>
                <a href="{{ route('product') }}" class="browse-products-link">Browse Products</a>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
@endsection
