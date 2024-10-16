@extends('layouts.admin-app')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{url('admin-panel/categories')}}">Categories</a></li>
            <li class="breadcrumb-item active">{{$category->title}}</li>
        </ol>
    </div>
@endsection
@section('page_title')
    <div class="w-75">
        <div class="info-box">
            <span class="info-box-icon w-25 bg-black"><i class="nav-icon fa fa-list-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Edit categories page</span>
                <span class="info-box-number">{{$category->title}}</span>
            </div>
        </div>
    </div>
@endsection
@section('small_title')
@endsection
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">
                Edit form
            </h3>
        </div>
        <div class="card-body">
            <form class="d-flex flex-column" enctype="multipart/form-data" method="post"
                  action="{{route('categories.update',$category)}}">
                @csrf
                @method('PATCH')
                <label class="mt-3 bg-grey-500 rounded mt-1">Title</label>
                <input required class="mb-3 border border:bg-grey-900 rounded rounded p-2"
                       value="{{$category->title}}"
                       type="text"
                       name="title"
                       placeholder="Enter product title..."/>

                <label class="mt-3 bg-grey-500 rounded mt-1">Details</label>
                <textarea class="mb-3 border border:bg-grey-900 rounded p-2"
                          required
                          name="details">{{$category->details}}</textarea>
                <button class="align-items-center mt-3 p-2 hover:text-white hover:bg-green-900 bg-green-500 rounded mt-1">
                    Save
                </button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
