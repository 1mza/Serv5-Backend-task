@extends('layouts.admin-app')
@inject('products','App\Models\Product')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{url('admin-panel/products')}}">Products</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </div>
@endsection
@section('page_title')
    <div class="w-75">
        <div class="info-box">
            <span class="info-box-icon w-25 bg-red"><i class="nav-icon fab fa-product-hunt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Create products page</span>
                <span class="info-box-number">{{$products->count()}}</span>
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
            <form class="d-flex flex-column" enctype="multipart/form-data" method="post"
                  action="{{route('products.store')}}">
                @csrf
                @method('POST')
                <label class="bg-grey-500 rounded mt-1">Category</label>
                <select class="border border:bg-grey-900 rounded p-2" name="category_id" required>
                    <option selected disabled>Select one category</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <label class="mt-3 bg-grey-500 rounded mt-1">Title</label>
                <input required class="mb-3 border border:bg-grey-900 rounded p-2"
                       type="text"
                       name="title"
                       value="{{old('title')}}"
                       placeholder="Enter product title..."/>
                <label class="mt-3 bg-grey-500 rounded mt-1">Brand</label>
                <input required class="mb-3 border border:bg-grey-900 rounded p-2"
                       type="text"
                       name="brand"
                       value="{{old('brand')}}"
                       placeholder="Enter product brand..."/>
                <label class="mt-3 bg-grey-500 rounded mt-1">Image</label>
                <input type="file"
                       class="mb-3"
                       value="{{old('image')}}"
                       name="image"/>
                <label class="mt-3 bg-grey-500 rounded mt-1">Details</label>
                <textarea class="mb-3 border border:bg-grey-900 rounded p-2"
                          required
                          name="details"
                          placeholder="Enter some details...">{{old('title')}}</textarea>
                <label class="mt-3 bg-grey-500 rounded mt-1">Price</label>
                <input required class="mb-3 border border:bg-grey-900 rounded p-2"
                       step="0.01"
                       type="number"
                       name="price"
                       value="{{old('price')}}"
                       placeholder="Enter product price..."/>
                <button class="align-items-center mt-3 p-2 hover:text-white hover:bg-green-900 bg-green-500 rounded mt-1">
                    Save
                </button>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
