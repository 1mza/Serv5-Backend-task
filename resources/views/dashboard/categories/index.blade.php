@extends('layouts.admin-app')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{url('dashboard/categories')}}">Categories</a></li>
        </ol>
    </div>
@endsection
@section('page_title')
    <div class="w-75">
        <div class="info-box">
            <span class="info-box-icon w-25 bg-black"><i class="nav-icon fa fa-list-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Categories</span>
                <span class="info-box-number">{{$categories->count()}}</span>
            </div>
        </div>
    </div>
@endsection
@section('small_title')
@endsection
@section('content')
    <!-- Default box -->
    <div class="container-fluid p-0">
        <div class="card p-0 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="card-header d-flex justify-content-between align-items-center col-12">
                <!-- Title -->
                <h3 class="card-title mb-0 col-4">
                    List of Categories
                </h3>
                <div class="col-4 ml-auto text-end">
                    <a href="{{route('categories.create')}}" class="ml-auto btn btn-primary ms-3">
                        Add New Category
                    </a>
                </div>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @elseif(session('danger'))
                <div class="alert alert-danger">
                    {{ session('danger') }}
                </div>
            @endif
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover w-100 m-0">
                        <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Details</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <th>{{$category->id}}</th>
                                <td>{{$category->title}}</a></td>
                                <td>{{$category->details}}</a></td>
                                <td>
                                    <a href="{{route('categories.edit',$category)}}"
                                       class="btn btn-warning">Edit</a>
                                    <form action="{{route('categories.destroy',$category)}}" method="post"
                                          style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')"
                                                class="btn btn-danger">Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
@endsection
