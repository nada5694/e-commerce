<div class="tab-pane mt-4" role="tabpanel">

    <div class="form-group row">
        <label class="admin-form col-lg-2">Name <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('name') is-invalid @enderror" value="{{Request::old('name') ? Request::old('name') : $model->name}}" type="text" name="name" placeholder="Enter product name" autocomplete="off">
            @error('name')
            <span class="invalid-feedback" role="alert"></span>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="admin-form col-lg-2">Image <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control input-file @error('image_name') is-invalid @enderror" value="{{ Request::old('Image') ? Request::old('Image') : $model->Image }}" type="file" name="image_name" placeholder="Enter product name" autocomplete="off">
            @error('image_name')
            <span class="invalid-feedback" role="alert"></span>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="admin-form col-lg-2">Discount (%)</label>
        <div class="col-lg-9">
           <select class="form-control select @error('discount') is-invalid @enderror" value="{{Request::old('discount') ? Request::old('discount') : $model->discount}}" name="discount" id="discount">
                <option name="" value="" disabled selected>---------- Please select a discount ----------</option>
                <?php
                    for($d = 0.00 ; $d < 1 ; $d = $d + 0.01){
                ?>
                        <option value="{{ $d }}" {{ isset($model) && $model->discount == $d ? 'selected'  : '' }}>{{ $d * 100 }}%</option>
                <?php
                    }
                ?>
            </select>
            @error('discount')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="admin-form col-lg-2">Price <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('price') is-invalid @enderror" value="{{Request::old('price') ? Request::old('price') : $model->price }}" type="integer" name="price" placeholder="Enter product price" autocomplete="off">
            @error('price')
            <span class="invalid-feedback" role="alert"></span>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="admin-form col-lg-2">Description </label>
        <div class="col-lg-9">
            <input class="form-control @error('description') is-invalid @enderror" value="{{Request::old('discription') ? Request::old('discription') : $model->description }}" type="text" name="description" placeholder="Enter product description" autocomplete="off">
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="admin-form col-lg-2">Clothing Type <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            @inject('products','App\Models\Product')
            {{-- {!! Form::select('id',$clothing_type->pluck('name','id'),[
                'placeholder' => 'Please select a clothing type',
                'class'       => 'form-control select'. ( $errors->has('clothing_type') ? ' is-invalid' : '' ),
            ]) !!} --}}
            <select name="clothing_type" class="form-control select @error('clothing_type') is-invalid @enderror" value="{{Request::old('clothing_type') ? Request::old('clothing_type') : $model->clothing_type}}">
                <option value="" disabled selected> ---------- Please select a clothing type ---------- </option>
                <option value="1" {{ isset($model) && $model->clothing_type == 'Formal' ? 'selected'  : '' }}>Formal</option>
                <option value="2" {{ isset($model) && $model->clothing_type == 'Casual' ? 'selected'  : '' }}>Casual</option>
                <option value="3" {{ isset($model) && $model->clothing_type == 'Sports Wear' ? 'selected'  : '' }}>Sports Wear</option>
            </select>
            @error('clothing_type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="admin-form col-lg-2">Accessory? <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <select name="is_accessory" class="form-control select @error('is_accessory') is-invalid @enderror" value="{{Request::old('is_accessory') ? Request::old('is_accessory') : $model->is_accessory}}">
                <option value="" disabled selected> ---------- Is it an accessory? ---------- </option>
                <option value="yes" {{ isset($model) && $model->is_accessory == 'yes' ? 'selected'  : '' }}>Yes</option>
                <option value="no" {{ isset($model) && $model->is_accessory == 'no' ? 'selected'  : '' }}>No</option>
            </select>
            @error('is_accessory')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="admin-form col-lg-2">Product Category <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <select name="product_category" class="form-control select @error('product_category') is-invalid @enderror" value="{{Request::old('product_category') ? Request::old('product_category') : $model->product_category}}">
                <option value="" disabled selected> ---------- Please select a category ---------- </option>
                <option value="men" {{ isset($model) && $model->product_category == 'men' ? 'selected'  : '' }}>Men</option>
                <option value="women" {{ isset($model) && $model->product_category == 'women' ? 'selected'  : '' }}>Women</option>
                <option value="kids" {{ isset($model) && $model->product_category == 'kids' ? 'selected'  : '' }}>Kids</option>
            </select>
            @error('product_category')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

</div>
