@extends('layouts.website.master')
@section('title')
    Profile Management
@endsection
@section('content')
    <div class="card shadow card-profile">
        <div class="card-body ">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ auth()->user()->avatar}}" alt="{{auth()->user()->name ?? auth()->user()->username}}" width="80" height="80">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                        {{ auth()->user()->username }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                        {{ auth()->user()->email }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3 header-card">
                    <div class="nav-wrapper position-relative end-0">
                        <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center " data-bs-toggle="tab" href="{{route('editProfile')}}" role="tab" aria-selected="true">
                            <i class="fa-solid fa-gear"></i>
                            <span class="ms-2">&nbsp; Settings</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container py-4">
        <div class="row profile-body shadow">
            <div class="card">
                <div class="card_header ">
                    <div class="d-flex align-items-center">
                    <p class="mb-0">Edit Profile</p>
                    <a class="btn btn-primary btn-sm ms-auto setting-button" href="{{route('editProfile')}}">Settings</a>
                    </div>
                </div>
                <div class="card-body">
                    <p class="text-uppercase text-sm">User Information</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Username</label>
                            <input disabled class="form-control @error('username') is-invalid @enderror" type="text"  value="{{Request::old('username') ? Request::old('username') : auth()->user()->username}}" name="usernsme">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Email address</label>
                            <input disabled class="form-control @error('email') is-invalid @enderror" type="email" value="{{Request::old('email') ? Request::old('email') : auth()->user()->email}}" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">First name</label>
                            <input disabled class="form-control @error('name') is-invalid @enderror" type="text"  value="{{Request::old('name') ? Request::old('name') : auth()->user()->name ?? "Enter Your Name"}}" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Last name</label>
                            <input disabled class="form-control @error('lastname') is-invalid @enderror" type="text"  value="{{Request::old('lastname') ? Request::old('lastname') : auth()->user()->lastname ?? "Enter Your Last Name"}}" name="lastnsme">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">User Type</label>
                            <input disabled class="form-control @error('user_type') is-invalid @enderror" type="text"  value="{{Request::old('user_type') ? Request::old('user_type') : ucfirst(auth()->user()->user_type)}}" name="user_type">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Gender</label>
                            <input disabled class="form-control @error('gender') is-invalid @enderror" type="text"  value="{{Request::old('gender') ? Request::old('gender') : ucfirst(auth()->user()->gender) ?? "Enter Your Gender"}}" name="gender">
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark">
                    <p class="text-uppercase text-sm">Contact Information</p>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Address</label>
                            <input disabled class="form-control @error('address') is-invalid @enderror" type="text"  value="{{Request::old('address') ? Request::old('address') : auth()->user()->address ?? "Enter Your Address"}}" name="address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">City</label>
                            <input disabled class="form-control @error('city') is-invalid @enderror" type="text"  value="{{Request::old('city') ? Request::old('city') : auth()->user()->city ?? "Enter Your City"}}" name="city">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Country</label>
                            <input disabled class="form-control @error('Country') is-invalid @enderror" type="text"  value="{{Request::old('Country') ? Request::old('Country') : auth()->user()->country ?? "Enter Your Country"}}" name="country">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Date Of Birth</label>
                            <input disabled class="form-control @error('dob') is-invalid @enderror" type="text"  value="{{Request::old('dob') ? Request::old('dob') : auth()->user()->dob ?? "Enter Your Date Of Birth"}}" name="dob">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Phone Number</label>
                            <input disabled class="form-control @error('phone') is-invalid @enderror" type="text"  value="{{Request::old('phone') ? Request::old('phone') : auth()->user()->phone ?? "Enter Your Phone Number"}}" name="phone">
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="horizontal dark">
                <p class="about-me text-uppercase text-sm">About me</p>
                <div class="row about">
                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Bio</label>
                        <textarea class="form-control" name="bio" placeholder="Enter your bio here..."  rows="5">{{Request::old('bio') ? Request::old('bio') : auth()->user()->bio }}
                        </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
