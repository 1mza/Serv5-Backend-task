@extends('layouts.admin-app')
@section('breadcrumb')
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{url('dashboard/products')}}">Products</a></li>
        </ol>
    </div>
@endsection
@section('page_title')
    <div class="w-75">
        <div class="info-box">
            <span class="info-box-icon w-25 bg-red"><i class="nav-icon fab fa-product-hunt"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Products</span>
                <span class="info-box-number">{{$products->count()}}</span>
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
                    List of Products
                </h3>
                <div class="col-4 ml-auto text-end">
                    <a href="{{route('products.create')}}" class="ml-auto btn btn-primary ms-3">
                        Add New Product
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
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Title</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Image</th>
                            <th scope="col">Details</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$product->category->title}}</a></td>
                                <td><a href="{{route('products.show',$product)}}">{{$product->title}}</a></td>
                                <td>{{$product->brand}}</td>
                                <td><img style="width: 300px;height: 300px" src="{{asset($product->image)}}"></td>
                                <td>{{$product->details}}</td>
                                <td>{{$product->price}} $</td>
                                <td>
                                    <a href="{{route('products.edit',$product)}}"
                                       class="btn btn-warning">Edit</a>
                                    <form action="{{route('products.destroy',$product)}}" method="post"
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
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
@endsection
