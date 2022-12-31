@extends('layouts.Admin.master')

@section('title')
    Users
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
                <h6><span class="b-b-success">{{App\Models\User::count()}} - Users</span></h6>
              </div>
              <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
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
                        {{-- <th scope="col" class="text-center text-s font-weight-bolder">Bio</th> --}}
                        @if(auth()->user()->user_type == "admin")
                            <th scope="col" class="text-center text-s font-weight-bolder">Action</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td scope="row" class="text-center text-s">{{$loop->iteration}}</td>
                                <td class="text-center font-secondary text-s">{{$user->name}}</td>
                                <td class="text-center font-secondary text-s">{{$user->username}}</td>
                                <td class="text-center font-secondary text-s">{{$user->email}}</td>
                                <td class="text-center font-secondary text-s">{{$user->gender ?? 'Undetermined'}}</td>
                                <td class="text-center font-secondary text-s">{{$user->user_type}}</td>
                                <td class="text-center font-secondary text-s">{{$user->phone ?? 'No Phone Number'}}</td>


                                {{-- <td class="text-center text-s">{{$user->created_at->translatedFormat('d/m/Y - h:m A')}}</td>
                                <td class="text-center text-s">{{$user->create_user->name ?? '??'}}</td>
                                <td class="text-center text-s">{{$user->update_user->name ?? '??'}}</td> --}}
                                @if(auth()->user()->user_type == "admin")
                                    <td class="user-button align-middle text-center text-sm">
                                        {!! Form::open([
                                            'route' => ['users.destroy',$user->id],
                                            'method' => 'delete'
                                        ])!!}

                                        @if($user->user_type == "admin" && $user->id != auth()->user()->id)
                                            <button style="display: none;" class="delete-button badge badge-sm " onclick="return confirm('Are you sure that you want to delete - {{ $user->name }}?');" type="submit" title="{{'Delete'." ($user->name)"}}"><i class="fa-solid fa-trash"></i>  Delete </button>
                                        @else
                                            <button class="delete-button badge badge-sm " onclick="return confirm('Are you sure that you want to delete - {{ $user->name }}?');" type="submit" title="{{'Delete'." ($user->name)"}}"><i class="fa-solid fa-trash"></i>  Delete </button>
                                        @endif

                                        {!! Form::close() !!}

                                        @if($user->user_type == "admin" && $user->id != auth()->user()->id)
                                            <a style="display: none;" href="{{route('users.edit',$user->id)}}" class="edit-button badge badge-sm" type="button" title="{{'Edit'." ($user->name)"}}"><i class="fa-solid fa-pencil"></i> Edit</a>
                                        @else
                                            <a href="{{route('users.edit',$user->id)}}" class="edit-button badge badge-sm" type="button" title="{{'Edit'." ($user->name)"}}"><i class="fa-solid fa-pencil"></i> Edit</a>
                                        @endif

                                    </td>
                                @endif
                            </tr>
                        @empty
                            <div class="alert alert-secondary">
                                There are no data!
                            </div>
                        @endforelse
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
