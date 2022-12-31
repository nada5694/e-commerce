@extends('layouts.Admin.master')

@section('title')
    Categories
@endsection

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
        <div class="col-12">
            <div class="new-product">
                <ul>
                    <li class="options"><a href="{{ route('categories.index') }}" class="btn">All Category</a></li>
                    <li class="options"><a href="{{ route('categories.create') }}" class="btn">Create New Category</a></li>
                    <li class="options"><a href="{{ route('categories.delete') }}" class="btn">Deleted Category</a></li>
                </ul>
            </div>
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6><span class="b-b-success">{{App\Models\Category::count()}} - Categories</span></h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th scope="col" class="text-center text-s font-weight-bolder">num</th>
                    <th scope="col" class="text-center text-s font-weight-bolder">Name</th>
                    <th scope="col" class="text-center text-s font-weight-bolder">num of Product</th>
                    <th scope="col" class="text-center text-s font-weight-bolder">Description</th>
                    <th scope="col" class="text-center text-s font-weight-bolder">Date of Creation</th>
                    <th scope="col" class="text-center text-s font-weight-bolder">Added By</th>
                    <th scope="col" class="text-center text-s font-weight-bolder">Last Updated By</th>
                    @if(auth()->user()->user_type == "admin")
                        <th scope="col" class="text-center text-s font-weight-bolder">Action</th>
                    @endif
                  </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td scope="row" class="text-center text-xs">{{$loop->iteration}}</td>
                            <td class="text-center font-secondary text-s">{{$category->name}}</td>
                            <td class="text-center font-secondary text-s">{{\App\Models\Product::where('clothing_type',$category->name)->count()}}</td>
                            <td class="text-center text-xs">{{($category->description)}}</td> <!-- ucwords($variable), capitalizes first letter in each word -->
                            <td class="text-center text-xs">{{$category->created_at->translatedFormat('d/m/Y - h:m A')}}</td>
                            <td class="text-center text-xs">{{$category->create_user->username ?? '??'}}</td>
                            <td class="text-center text-xs">{{$category->update_user->username ?? '??'}}</td>
                            @if(auth()->user()->user_type == "admin")
                                <td class="align-middle text-center text-sm">
                                    {!! Form::open([
                                        'route' => ['categories.destroy',$category->id],
                                        'method' => 'delete'
                                    ])!!}
                                    <button class="delete-category badge badge-sm " onclick="return confirm('Are you sure that you want to delete - {{ $category->name }}?');" type="submit" title="{{'Delete'." ($category->name)"}}"><i class="fa-solid fa-trash"></i>  Delete </button>
                                    {!! Form::close() !!}
                                    <a href="{{route('categories.edit',$category->id)}}" class="edit-category badge badge-sm" type="button" title="{{'Edit'." ($category->name)"}}"><i class="fa-solid fa-pencil"></i> Edit</a>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <div class="alert alert-secondary">
                            There are no data!
                        </div>
                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
