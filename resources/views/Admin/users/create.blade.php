@extends('layouts.Admin.master')
@inject('model', 'App\Models\User')

@section('title')
    Create New User
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="new-product">
                    <ul>
                        <li class="options"><a href="{{ route('users.index') }}" class="btn">All Users</a></li>
                        <li class="options"><a href="{{ route('users.create') }}" class="btn">Create New Users</a></li>
                        <li class="options"><a href="{{ route('users.delete') }}" class="btn">Deleted Users</a></li>
                    </ul>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <form action="{{route('users.store')}}" method="post" id="alert-form">
                                @csrf
                                @include('Admin.users.form')
                                <button class="btn btn-success mt-4 d-block me-auto" type="submit">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
