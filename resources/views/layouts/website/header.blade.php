<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
            <span class="icofont-close js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<nav class="site-nav mb-5">
    <div class="sticky-nav js-sticky-header">
        <div class="container position-relative">
            <div class="site-navigation text-center dark">
                <a href="{{ route('home') }}" class="logo menu-absolute m-0">Fashion Gate &copy;</a>

                <ul class="js-clone-nav pl-0 d-none d-lg-inline-block site-menu">
                    <li ><a href="{{ route('home') }}">Home</a></li>
                    <li class="has-children">
                        <a href="{{ route('product') }}">Shop</a>
                    </li>
                    <li class="has-children">
                        <a href="javascript:void(0);">Pages <i class="fa-solid fa-chevron-down"></i></a>
                        <ul class="dropdown">
                            <li><a href="{{ route('elements') }}">Elements</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('Cart') }}">Cart</a></li>
                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                </ul>
                <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                    <span></span>
                </a>
                <ul class="d-lg-inline-block menu-icons right-menu">
                    @if (auth()->user())
                        <li>
                            <a href="#" class="user-profile" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person"  fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 0 0 .014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 0 0 .022.004zm9.974.056v-.002.002zM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                </svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <label class="dropdown-item name" href="javascript:void(0);" style="color: #b84592;">{{auth()->user()->username}} ({{ ucfirst(auth()->user()->user_type) }})</label>
                                    <hr>
                                    <a class="dropdown-item" href="{{ route('profile') }}">Profile Management</a>
                                    @auth
                                        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator" || auth()->user()->user_type == "vendor")
                                            <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                        @endif
                                    @endauth
                            </div>
                        </li>
                    @else
                        <li class="guest"><span class="guest" >{{ 'guest_'.substr(uniqid(),8,13) }}</span></li>
                    @endif

                    <li>
                        @include('layouts.website.search-bar')
                    </li>

                    @auth
                        @if (auth()->user()->user_type == "customer")
                            <li>
                                <a href="{{ route('Cart') }}" class="cart">
                                    <span class="item-in-cart text-center">{{\App\Models\Cart::where('customer_id',auth()->user()->id)->count()}}</span>
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                    </svg>
                                </a>
                            </li>
                        @endif
                    @endauth

                    @if(auth::guest())
                    <li>
                        <a href="{{ route('cart-unregistered') }}" class="cart">
                            <span class="item-in-cart text-center">{{ 0 }}</span>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                            </svg>
                        </a>
                    </li>
                    @endif

                    <li class="list-dots">
                        <a class="btn three-dots" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg  width="1em" height="1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128 512"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                <path d="M64 360c30.9 0 56 25.1 56 56s-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56zm0-160c30.9 0 56 25.1 56 56s-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56zM120 96c0 30.9-25.1 56-56 56S8 126.9 8 96S33.1 40 64 40s56 25.1 56 56z"/></svg>

                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @if(!auth()->user())
                                <a class="dropdown-item guest-2" style="color: #b84592;">{{ 'guest_'.substr(uniqid(),8,13) }}</a>
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                <a class="dropdown-item" href="{{ route('register') }}">Register</a>
                            @elseif(auth()->user())
                                <a class="ml-2" href="{{ route('logout') }}" onclick="event.preventDefault(); document.querySelector('#logout-form').submit();"><i class="fa-solid fa-arrow-right-from-bracket"></i><span>Logout</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endif
                        </div>
                    </li>
                </ul>
            </div>
    </div>
</nav>
