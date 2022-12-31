<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function cart_unregistered()
    {
        return view('website.website.cart.cart_unregistered');
    }

    public function add_to_cart(Request $request , $id)
    {
        if(Auth::id()){
            $user                   = auth()->user();
            $product                = Product::find($id);
            $cart                   = new Cart;
            $cart->customer_username= $user->username;
            $cart->customer_phone   = $user->phone;
            $cart->customer_email   = $user->email;
            $cart->customer_address = $user->address;
            $cart->product_name     = $product->name;
            $cart->product_image    = $product->image_name;
            $cart->is_accessory     = $product->is_accessory;
            $cart->clothing_type    = $product->clothing_type;
            $cart->product_category = $product->product_category;
            $cart->price            = $product->price;
            $cart->discount         = $product->discount;


            if ($request->quantity > 0){
                $cart->quantity      = $request->quantity;
            }
            elseif ($request->quantity == null || $request->quantity == "") {
                return redirect()->back()->with('quantity_is_null_message' , 'The quantity value is empty! Please enter a quantity for the "'.$cart->product_name.'" product!');
            }
            elseif($request->quantity == 0){ // wrong condition (2): quantity is equals to "zero" value
                return redirect()->back()->with('quantity_is_zero_message' , 'You entered ['.$request->quantity.'] value for the quantity for "'.$cart->product_name.'" product. You can not enter [zero] value for the quantity for any product!');
            }
            elseif($request->quantity < 0){ // wrong condition (3): quantity is equals to "negative" value
                return redirect()->back()->with('quantity_is_negative_message' , 'You entered ['.$request->quantity.'] value for the quantity. The entered value for the quantity for "'.$cart->product_name.'" product is in negative!');
            }
            $cart->customer_id      = $user->id;
            $cart->save();

            return redirect()->back()->with('add_to_cart_message' , '"'.$product->name.'" [Quantity: '.$cart->quantity.'] - added successfully to your cart!');

        }

    }

    public function update_cart_items_quantity(Request $request , $id)
    {
        $cartItem = Cart::where('customer_id',auth()->user()->id)->find($id);
        {// those variables are just used in the json data in the return of the function (they are not used in the update functionality itself!)
            $cartItems_count = Cart::where('customer_id',auth()->user()->id)->count();
            if($cartItems_count > 0){ // if there is items in the cart (the correct condition!)
                $cartItem_Old_Quantity = Cart::find($id)->quantity;
            }
            else{ // if there is no items in the cart (the wrong condition!)
                return redirect()->route('cart-registered');
            }
        }

        if($request->quantity_value > 0){ // the correct condition! if($request->quantity_value > 0), because that's the only correct condition!
            $cartItem->quantity = $request->quantity_value; // all are the same thing => "$_GET['quantity_value']" = "$request->get('quantity_value');" = "$request->quantity_value;"
        }
        elseif($cartItem->quantity == $request->quantity_value){ // wrong condition (1)
            return redirect()->back()->with(['quantity_same_old_new_message' => __('You did not change the quantity! The quantity that you entered for product "'.$cartItem->product_name.'" is the same!')]);
        }
        elseif($request->quantity_value == null || $request->quantity_value == ""){ // wrong condition (2)
            return redirect()->back()->with(['quantity_is_null_message' => __('The quantity value is empty! Please enter a quantity for the "'.$cartItem->product_name.'" product!')]);
        }
        elseif($request->quantity_value == 0){ // the logic of zero quantity which is the "force delete" action (permanent delete from the front-end & back-end)
            $cartItem->quantity = 0; // the new quantity (which will be zero already in this condition!)
            $cartItem->forceDelete();
            return redirect()->back()->with(['quantity_is_zero_delete_message' => __('The quantity that you entered for product "'.$cartItem->product_name.'" is ('.$cartItem->quantity.'). The product is successfully deleted from your cart!')]);
        }

        $cartItem->save();

        return redirect()->back();
    }

    public function update_all_cart(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());

        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

public function index()
    {
        $cartItems       = Cart::where('customer_id',auth()->user()->id)->get();
        $cartItems_count = $cartItems->count();
        $finalData       = [];
        $amount          = 0;

            if(isset($cartItems))
            {
                foreach($cartItems as $cartItem)
                {
                    if($cartItem->discount > 0){
                        $amount                    += $cartItem->quantity * ($cartItem->price - ($cartItem->price * $cartItem->discount));
                        $finalData['Total_Amount']  = $amount; // total amount of all items' price (after discount which is the sale price)
                    }
                    elseif($cartItem->discount <= 0 || $cartItem->discount == null || $cartItems->discount == ""){
                        $amount                    += $cartItem->quantity * $cartItem->price;
                        $finalData['Total_Amount']  = $amount; // total amount of all items' price (with no sale which is the original price)
                    }
                }
            }

            return view('website.website.cart.cart' , compact('cartItems' , 'cartItems_count' , 'finalData'));
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
    public function destroy_for_cart($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->forceDelete();

        return redirect()->back()
                ->with(['cart_checkout_item_deleted_message' => '"'.$cartItem->product_name.'" product is successfully deleted from your cart!']);

    }

    public function getCartItemsForCheckout()
    {
        return view('website.website.cart.checkout');
    }
}
