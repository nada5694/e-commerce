@extends('layouts.admin.master')

@section('title')
    Deleted users
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
          <div class="card-header pb-0">
            <h6><span class="b-b-success">{{App\Models\User::count()}} - users</span></h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                @forelse($users as $user)
                    <table class="table align-items-center mb-0">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center text-s font-weight-bolder">num</th>
                            <th scope="col" class="text-center text-s font-weight-bolder">Name</th>
                            <th scope="col" class="text-center text-s font-weight-bolder">User name</th>
                            <th scope="col" class="text-center text-s font-weight-bolder">Email</th>
                            <th scope="col" class="text-center text-s font-weight-bolder">Gender</th>
                            <th scope="col" class="text-center text-s font-weight-bolder">User type</th>
                            <th scope="col" class="text-center text-s font-weight-bolder">Phone</th>
                            {{-- <th scope="col" class="text-center text-xxs font-weight-bolder">Date of Creation</th>
                            <th scope="col" class="text-center text-xxs font-weight-bolder">Added By</th>
                            <th scope="col" class="text-center text-xxs font-weight-bolder">Last Updated By</th> --}}
                            {{-- <th scope="col" class="text-center text-s font-weight-bolder">Bio</th> --}}
                            @if(auth()->user()->user_type == "admin")
                                <th scope="col" class="text-center text-s font-weight-bolder">Action</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td scope="row" class="text-center text-xs">{{$loop->iteration}}</td>
                                    <td class="text-center font-secondary text-xs">{{$user->name}}</td>
                                    <td class="text-center font-secondary text-xs">{{$user->username}}</td>
                                    <td class="text-center font-secondary text-xs">{{$user->email}}</td>
                                    <td class="text-center font-secondary text-xs">{{$user->gender ?? 'Undetermined'}}</td>
                                    <td class="text-center font-secondary text-xs">{{$user->user_type}}</td>
                                    <td class="text-center font-secondary text-xs">{{$user->phone ?? 'No Phone Number'}}</td>
                                    {{-- <td class="text-center text-xs">{{$user->created_at->translatedFormat('d/m/Y - h:m A')}}</td>
                                    <td class="text-center text-xs">{{$user->create_user->name ?? '??'}}</td>
                                    <td class="text-center text-xs">{{$user->update_user->name ?? '??'}}</td> --}}
                                    @if(auth()->user()->user_type == "admin")
                                    <td class="text-center">
                                        {!! Form::open([
                                            'route' => ['users.forceDelete',$user->id],
                                            'method' => 'delete'
                                        ])!!}
                                        <button class="delete-button badge badge-sm" onclick="return confirm('Are you sure that you want to permanently delete - {{ $user->name }}?');" type="submit" title="{{'Permanent Delete'." ($user->name)"}}"><i class="fa-solid fa-trash"></i> Permanent Delete </button>
                                        <a href="{{route('users.restore',$user->id)}}" onclick="return confirm('Are you sure that you want to restore - {{ $user->name }}?');" class="edit-button badge badge-sm" type="button" title="{{'Restore'." ($user->name)"}}"><i class="fa-solid fa-trash-arrow-up"></i> Restore</a>
                                        {!! Form::close() !!}
                                    </td>
                                    @endif
                                </tr>
                        </tbody>
                    </table>
                @empty
                <div class="alert alert-secondary">
                    There are no deleted users!
                </div>
                @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
