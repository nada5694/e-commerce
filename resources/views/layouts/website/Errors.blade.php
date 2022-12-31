
@if(session()->has('quantity_is_null_message'))
    <div class="alert alert-danger text-center session-message">
    <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
    {{ session()->get('quantity_is_null_message') }}
    </div>
@elseif(session()->has('quantity_same_old_new_message'))
    <div class="alert alert-danger text-center session-message">
    <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
    {{ session()->get('quantity_same_old_new_message') }}
    </div>
@elseif(session()->has('exceeded_available_quantity_message'))
    <div class="alert alert-danger text-center session-message">
    <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
    {{ session()->get('exceeded_available_quantity_message') }}
    </div>
@elseif(session()->has('quantity_is_zero_delete_message'))
    <div class="alert alert-success text-center session-message">
    <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
    {{ session()->get('quantity_is_zero_delete_message') }}
    </div>
@elseif(session()->has('quantity_is_negative_message'))
    <div class="alert alert-danger text-center session-message">
    <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
    {{ session()->get('quantity_is_negative_message') }}
    </div>
@endif

@if(session()->has('quantity_old_new_message'))
    <div class="alert alert-success text-center session-message">
    <button type="button" class="close" data-dismiss="alert" style="color: rgb(173, 6, 6)">x</button>
    {{ session()->get('quantity_old_new_message') }}
    </div>
@endif
