<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class DashboardProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at','asc')->paginate(30);

        return view('Admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products                     = new Product();
        $products->name               = $request->name;
        $products->description        = $request->description ;
        $products->image_name         = "/assets/website/images/products/".$request->image_name;
        $products->price              = $request->price;
        $products->discount           = $request->discount;
        $products->clothing_type      = $request->clothing_type;
        $products->available_quantity = $request->available_quantity;
        $products->is_accessory       = $request->is_accessory;
        $products->product_category   = $request->product_category;
        $products->create_user_id     = auth()->user()->id;
        $products->save();

        return redirect()->route('products.index')
            ->with(['message' => "($products->name) - Added successfully!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Product::findOrFail($id);

        return view('Admin.products.show',compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Product::findOrFail($id);

        return view('Admin.products.edit',compact('model'));
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
        $products                     = Product::findOrFail($id);
        $products->name               = $request->name;
        $products->description        = $request->description ;
        $products->image_name         = "/assets/website/images/products/".$request->image_name;
        $products->price              = $request->price;
        $products->discount           = $request->discount;
        $products->clothing_type      = $request->clothing_type;
        $products->available_quantity = $request->available_quantity;
        $products->is_accessory       = $request->is_accessory;
        $products->product_category   = $request->product_category;
        $products->update_user_id     = auth()->user()->id;
        $products->save();

        return redirect()->route('products.index')
            ->with(['message' => "($products->name) - Edited successfully!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();

        return redirect()->route('products.index')
            ->with(['message' => "($products->name) - Deleted successfully!"]);
    }

    public function delete()
    {
        $products = Product::orderBy('created_at','asc')->onlyTrashed()->paginate(30);
        return view('Admin.products.delete',compact('products'));
    }

    public function forceDelete($id)
    {
        Product::where('id', $id)->forceDelete();
        return redirect()->route('products.delete')
            ->with(['message' => "Permanently deleted successfully!"]);
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        $products = Product::findOrFail($id);
        return redirect()->route('products.delete')
            ->with(['message' => "($products->name) - Restored successfully!"]);
    }
}
