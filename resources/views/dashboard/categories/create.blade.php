@extends('layouts.admin-app')
@inject('categories','App\Models\Category')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{url('admin-panel/categories')}}">Categories</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </div>
@endsection
@section('page_title')
    <div class="w-75">
        <div class="info-box">
            <span class="info-box-icon w-25 bg-black"><i class="nav-icon fa fa-list-alt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Create products page</span>
                <span class="info-box-number">{{$categories->count()}}</span>
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
                Create form
            </h3>
        </div>
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-sm text-red-500 mt-1">{{ $error }}</p>
            @endforeach
        @endif
        <div class="card-body">
            <form class="d-flex flex-column" method="post"
                  action="{{route('categories.store')}}">
                @csrf
                @method('POST')
                <label class="mt-3 bg-grey-500 rounded mt-1">Title</label>
                <input required class="mb-3 border border:bg-grey-900 rounded p-2"
                       type="text"
                       name="title"
                       value="{{old('title')}}"
                       placeholder="Enter category title..."/>
                <label class="mt-3 bg-grey-500 rounded mt-1">Details</label>
                <textarea class="mb-3 border border:bg-grey-900 rounded p-2"
                          required
                          name="details"
                          placeholder="Enter category details...">{{old('title')}}</textarea>
                <button class="align-items-center mt-3 p-2 hover:text-white hover:bg-green-900 bg-green-500 rounded mt-1">
                    Save
                </button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
