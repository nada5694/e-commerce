@extends('layouts.website.master')

@section('title')
    Search
@endsection

@section('content')
    {{-- <div id="search-blade" class="search-blade mt-5">
        <section class="product-results-section" style="padding: 0% 2%;">
            @if($search_text_input == "" || $search_text_input == 0)
                <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto;  width: 40%;">
                    <span style="font-size: 110%; font-weight: bold;">The search box is empty. You didn't enter anything in it!</span>
                </div> --}}

            {{-- @elseif($search_text_input == $products_result)
                <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                    "{{ $search_text_input }}" results ({{ $products_result_count }})
                </div> --}}
            {{-- @else

            <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                "{{ $search_text_input }}" results ({{ $products_result_count }})
            </div>

                @if ($search_text_input == 0)
                    <div class="alert alert-danger" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                        "{{ $search_text_input }}" results ({{ $products_result_count }}) - Not found!
                    </div>
                @else
                    <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                        "{{ $search_text_input }}" results ({{ $products_result_count }})
                    </div>
                @endif
                    @if ($search_text_input == $products_result_count )
                        <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                            "{{ $search_text_input }}" results ({{ $products_result_count }})
                        </div>
                    @else

                    @endif

                <div style="display: flex; justify-content: flex-start; text-align: center; flex-wrap: wrap;">
                    @forelse ($products_result as $product)
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-3 pt-3 pb-3 bg-light border">
                            <div class="curriculum-event-thumb">
                                <a href="javascript:void(0);">
                                    @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                                    @if($data <= 7) <!---------- in days ---------->
                                        <span class="mt-2" style="position: absolute; background: rgba(0, 69, 175, 0.65); width: 180px; height: 35px; font-weight: bold; text-align: center; color: snow; opacity: 0.70;">
                                            <h3 style="font-weight: bolder;">NEW</h3>
                                        </span>
                                    @endif
                                    <img class="mt-2" src="{{$product->image_name}}" alt="{{$product->name}}" style="width: 180px; height: 200px; border: 2px solid black;">
                                </a>
                            </div>
                            <div class="curriculum-event-content d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-8 col-md-8 text-left mt-1">
                                        @if($product->discount > 0)
                                            <div class="c-red"><u>Original Price:</u> <del style="color: red;">{{$product->price}} EGP</del></div>
                                            <div class="c-red"><u>Sale Price:</u> <span style="color: green;">{{$product->price - ($product->price * $product->discount) }} EGP</span> <span style="color:rgb(155, 31, 151); font-weight: bold;">({{ $product->discount * 100 }}% OFF)</span></div>
                                        @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                            <div class="c-red"><u>Price:</u> {{$product->price}} EGP</div>
                                        @endif
                                        <div class="c-red"><u>Category:</u> {{ucfirst($product->product_category)}}</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-top: 2%; width: 40%">
                        <span>{{ $search_text_input }} not found!</span>
                    </div>
                    @endforelse
                </div>
            @endif
        </section>
    </div> --}}








    <div id="search-blade" class="search-blade mt-5">
        <section class="product-results-section" style="padding: 0% 2%;">
            {{-- @if ($search_text_input == "" || $search_text_input == 0 || $search_text_input != '$products_result')
                <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto;  width: 40%;">
                    <span style="font-size: 110%; font-weight: bold;">The search box is empty. You didn't enter anything in it!</span>
                </div> --}}
            {{-- @else($search_text_input != $products_result) --}}
            {{-- <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto;  width: 40%;">
                <span style="font-size: 110%; font-weight: bold;">"{{ $search_text_input }}" result ({{ $products_result_count }}) Not Found</span>
            </div> --}}
            {{-- <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                "{{ $search_text_input }}" results ({{ $products_result_count }})
            </div> --}}
            {{-- @else --}}
                {{-- <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                    "{{ $search_text_input }}" results ({{ $products_result_count }})
                </div> --}}

                {{-- <div style="display: flex; justify-content: flex-start; text-align: center; flex-wrap: wrap;">
                    @forelse ($products_result as $product)
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 mt-3 pt-3 pb-3 bg-light border">
                            <div class="curriculum-event-thumb">
                                <a href="javascript:void(0);">
                                    @php $data = Carbon\Carbon::parse($product->created_at)->diffInDays(Carbon\Carbon::now()); @endphp
                                    @if($data <= 7) <!---------- in days ---------->
                                        <span class="mt-2" style="position: absolute; background: rgba(0, 69, 175, 0.65); width: 180px; height: 35px; font-weight: bold; text-align: center; color: snow; opacity: 0.70;">
                                            <h3 style="font-weight: bolder;">NEW</h3>
                                        </span>
                                    @endif
                                    <img class="mt-2" src="{{$product->image_name}}" alt="{{$product->name}}" style="width: 180px; height: 200px; border: 2px solid black;">
                                </a>
                            </div>
                            <div class="curriculum-event-content d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-8 col-md-8 text-left mt-1">
                                        @if($product->discount > 0)
                                            <div class="c-red"><u>Original Price:</u> <del style="color: red;">{{$product->price}} EGP</del></div>
                                            <div class="c-red"><u>Sale Price:</u> <span style="color: green;">{{$product->price - ($product->price * $product->discount) }} EGP</span> <span style="color:rgb(155, 31, 151); font-weight: bold;">({{ $product->discount * 100 }}% OFF)</span></div>
                                        @elseif($product->discount <= 0 || $product->discount == null || $product->discount == "")
                                            <div class="c-red"><u>Price:</u> {{$product->price}} EGP</div>
                                        @endif
                                        <div class="c-red"><u>Category:</u> {{ucfirst($product->product_category)}}</div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto; margin-top: 2%; width: 40%">
                        <span>{{ $search_text_input }} not found!</span>
                    </div>
                    @endforelse
                </div> --}}
            {{-- @endif --}}

            @if ($search_text_input != $products_result)
                <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto;  width: 40%;">
                    <span style="font-size: 110%; font-weight: bold;">The search box is empty. You didn't enter anything in it!</span>
                </div>
                {{-- <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                    "{{ $search_text_input }}" results ({{ $products_result_count }})
                </div> --}}
            @else
                {{-- <div class="alert alert-success" style="text-align: center; margin-left: auto; margin-right: auto; width: 40%;">
                    "{{ $search_text_input }}" results ({{ $products_result_count }})
                </div> --}}
                {{-- <div class="alert alert-danger" role="alert" style="text-align: center; margin-left: auto; margin-right: auto;  width: 40%;">
                    <span style="font-size: 110%; font-weight: bold;">The search box is empty. You didn't enter anything in it!</span>
                </div> --}}

            @endif
        </section>
    </div>

















@endsection
