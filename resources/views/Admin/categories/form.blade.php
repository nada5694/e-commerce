<div class="tab-pane mt-4" role="tabpanel">
    <div class="form-group row">
        <label class="admin-form col-lg-2">Name <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input class="form-control @error('name') is-invalid @enderror" value="{{Request::old('name') }}" type="text" name="name" placeholder="Enter product name" autocomplete="off">
            @error('name')
            <span class="invalid-feedback" role="alert"></span>
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label class="admin-form col-lg-2">Description </label>
        <div class="col-lg-9">
            <input class="form-control @error('description') is-invalid @enderror" value="{{Request::old('description') }}" type="text" name="description" placeholder="Enter product description" autocomplete="off">
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

</div>
