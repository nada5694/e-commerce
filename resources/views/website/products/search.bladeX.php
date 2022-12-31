@extends('layouts.website.master')

@section('styles')
@endsection

@section('title')
    Search
@endsection

@section('content')


    {{-- @if ($search_text_input == "")
        Search box is empty!
    @else
        @if($products_result_count == 0)
            Results - {{ '"'.$search_text_input.'" ['.$products_result_count.']' }} - Not found! <?php /* "." is for concatenating static front-end
                                                                                                codes with dynamic back-end codes */ ?>
        @else
            Results - {{ '"'.$search_text_input.'" ['.$products_result_count.']' }}
        @endif
    @endif --}}

    {{-- @if ($search_text_input == "")
        <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto;  width: 40%;">
            <span style="font-size: 110%; font-weight: bold;">The search box is empty. You didn't enter anything in it!</span>
        </div>
    @else
        @if ($products_result_count == 0)
            <div class="alert alert-danger" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                "{{ $search_text_input }}" results ({{ $products_result_count }}) - Not found!
            </div>
        @else
            <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                "{{ $search_text_input }}" results ({{ $products_result_count }})
            </div>
        @endif
    @endif

    @foreach ($products_result as $Product)
        <div class="col-6 col-sm-6 col-md-6 mb-4 col-lg-4">
            <div class="item">
                <div class="product-item">
                    <a href="shop-single.html" class="product-img">
                        @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                        @if($data <= 5) <!---------- in weeks ---------->
                            <div class="label new top-right">
                                <div class='content'>New</div>
                            </div>
                        @endif
                        @if($product->discount > 0)
                            <div class="label sale top-right second">
                                <div class='content'>Sale</div>
                            </div>
                        @endif
                        <img src="{{ $product->image_name}}" alt="Image" class="img-fluid">
                    </a>
                    <h3 class="title"><a href="javascript:void(0);">{{ $product->name }}</a></h3>
                    <div class="price">
                        @if($product->discount > 0)
                            <span ><del >{{ $product->price }} EGP</del> &dash; {{ $product->price - ($product->price * $product->discount) }} EGP</span>
                        @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                            <span >{{ $product->price }} EGP</span>
                        @endif
                    </div>
                    @include('layouts.website.add_to_cart_form')
                </div>
            </div>
        </div> <!-- /.item -->
    @endforeach --}}




    <style>
        .session-message{
            width: 60%;
            margin-top: 1%;
            margin-bottom: 3%;
            margin-left: auto;
            margin-right: auto;
        }
        /* .table-search-results{margin-left: auto; margin-right: auto;} */
    </style>


    <div id="search-blade" class="search-blade mt-5">


        <section class="product-results-section" style="padding: 0% 2%;">

            @if($search_text_input == $products_result)
                <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%; margin-top: 10%;">
                    "{{ $search_text_input }}" results ({{ $products_result_count }})
                </div>
            @else <?php //@elseif($search_text == $products_result) ?>
                @if($products_result_count == 0)
                    <div class="alert alert-danger" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%; margin-top: 10%;">
                        "{{ $search_text_input }}" results ({{ $products_result_count }}) - Not found!
                    </div>
                @else
                    <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto;  width: 40%; margin-top: 10%;">
                        <span style="font-size: 110%; font-weight: bold;">The search box is empty. You didn't enter anything in it!</span>
                    </div>
                @endif

                @if(session()->has('add_to_cart_message'))
                        <div class="alert alert-success text-center session-message">
                            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                            {{ session()->get('add_to_cart_message') }}<a href="{{ route('Cart') }}"> Check your cart</a>.
                        </div>
                    @elseif(session()->has('quantity_is_null_message'))
                        <div class="alert alert-danger text-center session-message">
                            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                            {{ session()->get('quantity_is_null_message') }}
                        </div>
                    @elseif(session()->has('quantity_is_zero_message'))
                        <div class="alert alert-danger text-center session-message">
                            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                            {{ session()->get('quantity_is_zero_message') }}
                        </div>
                    @elseif(session()->has('quantity_is_negative_message'))
                        <div class="alert alert-danger text-center session-message">
                            <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
                            {{ session()->get('quantity_is_negative_message') }}
                        </div>
                    @endif

                    <div style="display: flex; justify-content: flex-start; text-align: center; flex-wrap: wrap;">
                        @forelse($products_result as $product)
                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-3 pt-3 pb-3 bg-light border">
                                    <div class="curriculum-event-thumb">
                                        <a href="#"><img src="{{$product->image_name}}" alt="{{$product->name}}" style="width: 180px; height: 200px; border: 2px solid black;"></a>
                                    </div>
                                    <div class="curriculum-event-content d-flex justify-content-center">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-8 col-md-8 text-left mt-1">
                                                <div class="c-red"><u>Title:</u><a href="#" style="color: rgb(3, 3, 191);"> {{$product->name}}</a></div>
                                                @if($product->discount > 0)
                                                    <div class="c-red"><u>Original Price:</u> <del style="color: red;">{{$product->price}} EGP</del></div>
                                                    <div class="c-red"><u>Sale Price:</u> <span style="color: green;">{{$product->price - ($product->price * $product->discount) }} EGP</span> <span style="color:rgb(155, 31, 151); font-weight: bold;">({{ $product->discount * 100 }}% OFF)</span></div>
                                                @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                                    <div class="c-red"><u>Price:</u> {{$product->price}} EGP</div>
                                                @endif
                                                <div class="c-red"><u>Category:</u> {{$product->product_category}}</div>

                                            </div>
                                        </div>
                                    </div>


                                    @if(Auth::guest())
                                        <div style="margin-top: 2%; margin-bottom: 3%;">
                                            {{-- <a href="{{ route('cart-unregistered') }}" style="background-color: rgb(48, 116, 217); color: snow; padding: 1.5% 3%; border-radius: 4px;">
                                                Add Cart
                                            </a> --}}
                                            <a href="{{ route('cart-unregistered') }}"><input class="btn btn-primary" type="submit" value="Add to cart" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                            <a href="#"><input class="btn btn-success" type="submit" value="Add to favorites" name="" style="padding: 1.5% 3%; border-radius: 4px;"></a>
                                        </div>
                                    @endif
                            </div>
                            @empty
                            <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-top: 2%; width: 40%">
                                <span>{{ $search_text }} not found!</span>
                            </div>
                            <?php
                                /*
                                Note:
                                in this case (the search functionality) error is handled with if condition (in line 67 ~ 69)
                                and the result proves that the data count is equals to (0) which is no data to retrieve from
                                the DB (because the entered query didn't match the data that already exists in the DB
                                which is described as the following => $search_text != $products_result).

                                @empty => acts like else from the if condition and for showing the other choice wich will be the error
                                (or the undefined data from the DB) if the data wasn't found in the code in "forelse" loop.
                                */
                            ?>
                            @endforelse
                    </div>
            @endif
        </section>
















    </div>
@endsection

@section('scripts')

@endsection

