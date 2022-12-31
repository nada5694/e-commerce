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
                        <li class="options"><a href="{{ route('users.index') }}" class="btn">All Users</a></li>
                        <li class="options"><a href="{{ route('users.create') }}" class="btn">Create New User</a></li>
                        <li class="options"><a href="{{ route('users.delete') }}" class="btn">Deleted Users</a></li>
                    </ul>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <form action="{{route('users.update',$model->id)}}" method="post" id="alert-form">
                                @csrf
                                {{ method_field('put') }}
                                @include('Admin.users.form')
                                <button class="btn btn-success mt-4 d-block me-auto" type="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
