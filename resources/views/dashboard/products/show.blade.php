@extends('layouts.admin-app')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{url('admin-panel/products')}}">Products</a></li>
            <li class="breadcrumb-item active"><a href="{{route('products.show',$product->id)}}">{{$product->name}}</a>
            </li>

        </ol>
    </div>
@endsection
@section('page_title')
    <div class="w-75">
        <div class="info-box">
            <span class="info-box-icon w-25 bg-red"><i class="nav-icon fab fa-product-hunt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Show products page</span>
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
                Product Info
            </h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Image</th>
                    <th scope="col">Details</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->category->title}}</td>
                    <td>{{$product->title}}</td>
                    <td>{{$product->brand}}</td>
                    <td><img style="width: 300px;height: 300px" src="{{asset($product->image)}}" /></td>
                    <td>{{$product->details}}</td>
                    <td>{{$product->price}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
