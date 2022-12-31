@extends('layouts.Admin.master')

@section('title')
    Edit Category
@endsection

@section('content')

    <div class="card-body">
        <div class="tab-content" id="pills-tabContent">
            <form action="{{route('categories.update',$model->id)}}" method="post" id="alert-form">
                @csrf
                {{ method_field('put') }}
                @include('Admin.categories.form')
                <button class="btn btn-success mt-4 d-block me-auto" type="submit">Update</button>
            </form>
        </div>
    </div>

@endsection
