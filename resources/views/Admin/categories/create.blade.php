@extends('layouts.Admin.master')

@section('title')
    Create New Category
@endsection

@section('content')
    <div class="card-body">
        <div class="tab-content" id="pills-tabContent">
            <form action="{{route('categories.store')}}" method="post" id="alert-form">
                @csrf
                @include('Admin.categories.form')
                <button class="btn btn-success mt-4 d-block me-auto" type="submit">Add</button>
            </form>
        </div>
    </div>
@endsection
