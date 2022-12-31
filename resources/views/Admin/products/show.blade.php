@extends('layouts.Admin.master')

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="tab-pane mt-4" role="tabpanel">
                <div class="col-12">
                    <div class="new-product">
                        <ul>
                            <li class="options"><a href="{{ route('products.index') }}" class="btn">All Products</a></li>
                            <li class="options"><a href="{{ route('products.create') }}" class="btn">Create New Product</a></li>
                            <li class="options"><a href="{{ route('products.delete') }}" class="btn">Deleted Products</a></li>
                        </ul>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-lg-9 img-div">
                                    <img src="{{ $model->image_name }}" alt="{{$model->name ?? $model->image_name}}" >
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="admin-form col-lg-2">Name</label>
                                <div class="col-lg-9">
                                    <h5 class="form-control">{{$model->name ?? '???'}}</h5>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="admin-form col-lg-2">Price</label>
                                <div class="col-lg-9">
                                    @if($model->discount > 0)
                                        <h5 class="form-control">
                                            <span class="font-danger"><del class="text-xxs">{{$model->price}}</del></span> <label class="font-secondary">&RightArrow;</label> <span class="font-primary">{{$model->price - ($model->price * $model->discount)}}</span>
                                        </h5>
                                    @elseif($model->discount <= 0 || $model->discount == null || $model->discount == "")
                                        <h5 class="form-control">{{$model->price}}</h5>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="admin-form col-lg-2">Discount</label>
                                <div class="col-lg-9">
                                    <h5 class="form-control">{{$model->discount*100 ?? '???'}}%</h5>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="admin-form col-lg-2">Description</label>
                                <div class="col-lg-9">
                                    <h5 class="form-control">{{$model->description ?? '???'}}</h5>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="admin-form col-lg-2">Category</label>
                                <div class="col-lg-9">
                                    <h5 class="form-control">{{$model->product_category ?? '???'}}</h5>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="admin-form col-lg-2">Clothing Type</label>
                                <div class="col-lg-9">
                                    <h5 class="form-control">{{$model->clothing_type ?? '???'}}</h5>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="admin-form col-lg-2">Is Accessory ?</label>
                                <div class="col-lg-9">
                                    <h5 class="form-control">{{$model->is_accessory ?? '???'}}</h5>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="admin-form col-lg-2">Added By</label>
                                <div class="col-lg-9">
                                    <h5 class="form-control">{{$model->create_user->username ?? '???'}}</h5>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="admin-form col-lg-2">Last Updated By</label>
                                <div class="col-lg-9">
                                    <h5 class="form-control">{{$model->update_user->username ?? '???'}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
