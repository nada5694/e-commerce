<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products      = Product::all();
        $clothes_men   = Product::all()->where('is_accessory','no')->where('product_category', '=', 'men');
        $clothes_women = Product::all()->where('is_accessory','no')->where('product_category', '=', 'women');
        $clothes_kids  = Product::all()->where('is_accessory','no')->where('product_category', '=', 'kids');
        $accessories   = Product::all()->where('is_accessory','yes');

        return view('website.products.products' , compact('clothes_men', 'clothes_women' , 'clothes_kids', 'accessories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $search_text_input     = $request->search_query;
        $products_result       = Product::where('name','LIKE',"%{$search_text_input}%")->get();
        $products_result_count = $products_result->count();

        return view('website.products.search', compact('products_result' , 'search_text_input' , 'products_result_count'))
            ->with('i' , ($request->input('page', 1) - 1) * 5);
    }

    public function clothes_all_filter()
    {
        $clothes_all          = Product::all()->where('is_accessory','no');
        $clothes_all_count    = $clothes_all->count();

        return view('website.products.clothes.clothes-filter.clothes_all_filter');
    }

    public function clothes_men_filter()
    {
        $clothes_men          = Product::all()->where('is_accessory','no')->where('product_category', '=', 'men');
        $clothes_men_count    = $clothes_women->count();

        return view('website.products.clothes.clothes-filter.clothes_men_filter', compact('clothes_men' , 'clothes_men_count'));
    }

    public function clothes_women_filter()
    {
        $clothes_women          = Product::all()->where('is_accessory','no')->where('product_category', '=', 'women');
        $clothes_women_count    = $clothes_women->count();

        return view('website.products.clothes.clothes-filter.clothes_men_filter', compact('clothes_women' , 'clothes_women_count'));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
