@extends('layouts.admin-app')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{url('admin-panel/products')}}">Products</a></li>
            <li class="breadcrumb-item active">{{$product->title}}</li>
        </ol>
    </div>
@endsection
@section('page_title')
    <div class="w-75">
        <div class="info-box">
            <span class="info-box-icon w-25 bg-red"><i class="nav-icon fab fa-product-hunt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Edit products page</span>
                <span class="info-box-number">{{$product->title}}</span>
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
                  action="{{route('products.update',$product)}}">
                @csrf
                @method('PATCH')
                <label class="bg-grey-500 rounded mt-1 p-2">Category</label>
                <select class="border border:bg-grey-900 rounded p-2" name="category_id" required>
                    <option disabled>Select one category</option>
                    @foreach($categories as $category)
                        <option {{$product->category->id === $category->id ?'selected':''}} value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
                <label class="mt-3 bg-grey-500 rounded mt-1">Title</label>
                <input required class="mb-3 border border:bg-grey-900 rounded rounded p-2"
                       value="{{$product->title}}"
                       type="text"
                       name="title"
                       placeholder="Enter product title..."/>
                <label class="mt-3 bg-grey-500 rounded mt-1">Brand</label>
                <input required class="mb-3 border border:bg-grey-900 rounded rounded p-2"
                       value="{{$product->brand}}"
                       type="text"
                       name="brand"
                       placeholder="Enter product brand..."/>
                <label class="mt-3 bg-grey-500 rounded mt-1">Image</label>
                <img src="{{asset($product->image)}}"
                     style="width: 300px;height: 300px"/>
                <input type="file" name="image"/>
                <label class="mt-3 bg-grey-500 rounded mt-1">Details</label>
                <textarea class="mb-3 border border:bg-grey-900 rounded p-2"
                          required
                          name="details">{{$product->details}}</textarea>
                <label class="mt-3 bg-grey-500 rounded mt-1">Price</label>
                <input required
                       class="mb-3 border border:bg-grey-900 rounded rounded p-2"
                       step="0.01"
                       value="{{$product->price}}"
                       type="number"
                       name="price"
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
