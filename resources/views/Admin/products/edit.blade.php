@extends('layouts.Admin.master')

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
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
                        <div class="tab-content" id="pills-tabContent">
                            <form action="{{route('products.update',$model->id)}}" method="post" id="alert-form">
                                @csrf
                                {{ method_field('put') }}
                                @include('Admin.products.form')
                                <button class="btn btn-success mt-4 d-block me-auto" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
