<form
    @if(auth()->user())
        action="{{ url('add_to_cart' , $product->id) }}" method="post"
    @elseif (! auth()->user())
        action="{{ url('cart-guest') }}" method="get"
    @endif
    style="margin-top: 2%; margin-bottom: 3%;">
    @csrf
    <div class="input-group">
        <!-- declaration for first field -->
        <input class="form_control input-sm" type="number" value="1" min="1" name="quantity" placeholder="Quantity">

        <!-- reducong the gap between them to zero -->
        <span class="input-group-btn" style="width: 5px;"></span>

        <!-- declaration for second field -->
        <input class="btn btn-primary form-control input-xs add-to-cart-btn" type="submit" value="Add to cart" name="">
    </div>
</form>

