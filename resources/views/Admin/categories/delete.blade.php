@extends('layouts.admin.master')

@section('title')
    Deleted Categories
@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Show deleted categories - <span class="b-b-success">{{\App\Models\Category::onlyTrashed()->count()}}</span></h5>
                    </div>
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive">
                                @forelse($categories as $category)
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="text-center">#</th>
                                            <th scope="col" class="text-center">Name</th>
                                            <th scope="col" class="text-center">Description</th>
                                            @if(auth()->user()->user_type == "admin")
                                                <th scope="col" class="text-center">Action</th>
                                            @endif
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">{{$loop->iteration}}</th>
                                            <td class="text-center">{{$category->name}}</td>
                                            <td class="text-center">{{$category->description}}</td>
                                            <td class="text-center">{{$product->create_user->name ?? '???'}}</td>
                                            <td class="text-center">{{$product->update_user->name ?? '???'}}</td>
                                            <td class="text-center" title="{{$category->created_at->format('Y-D-M h:m h:m A')}}">{{$category->created_at->format('Y-D-M h:m A')}}</td>
                                            <td class="text-center" title="{{$category->deleted_at->format('Y-D-M h:m h:m A')}}">{{$category->deleted_at->format('Y-D-M h:m A')}}</td>
                                            @if(auth()->user()->user_type == "admin")
                                                <td class="align-middle text-center text-sm">
                                                    {!! Form::open([
                                                        'route' => ['categories.forceDelete',$category->id],
                                                        'method' => 'delete'
                                                    ])!!}
                                                    <button class="delete-button badge badge-sm" onclick="return confirm('Are you sure that you want to permanently delete - {{ $category->name }}?');" type="submit" title="{{'Permanent Delete'." ($category->name)"}}"><i class="fa-solid fa-trash"></i> Permanent Delete </button>
                                                    <a href="{{route('categories.restore',$category->id)}}" onclick="return confirm('Are you sure that you want to restore - {{ $category->name }}?');" class="edit-button badge badge-sm" type="button" title="{{'Restore'." ($category->name)"}}"><i class="fa-solid fa-trash-arrow-up"></i> Restore</a>
                                                    {!! Form::close() !!}
                                                </td>
                                            @endif
                                        </tr>
                                        </tbody>
                                    </table>
                                @empty
                                    <div class="alert alert-secondary">
                                        There are no data!
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="m-b-30" aria-label="Page navigation example">
                    <ul class="pagination justify-content-center pagination-primary">
                        {!! $categories->links('pagination::bootstrap-4') !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

@endsection
