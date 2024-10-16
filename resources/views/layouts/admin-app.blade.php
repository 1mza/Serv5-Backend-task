<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/font-awesome.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/css/adminlte.min.css')}}">
    <style>
        .search-results {
            position: absolute;
            z-index: 999;
            background-color: white;
            border: 1px solid #ddd;
            max-height: 300px;
            overflow-y: auto;
            width: 100%; /* Ensures the result box takes the full width of the input group */
            box-sizing: border-box; /* Ensures padding and border are included in the width */
        }

        .list-group-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .list-group-item:hover {
            background-color: #f1f1f1;
        }

        .input-group {
            position: relative;
        }

        .form-control-navbar {
            width: 100%;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar SearchSearch -->
            <li class="nav-item">
                <div class="mt-auto input-group input-group-sm">
                    @livewire('search-product')
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="break-normal justify-center user-panel d-flex">
                <div class="info w-full text-white flex flex-col items-center justify-center mt-2 rounded-md hover:text-white hover:bg-gray-600 transition duration-150">
                    <a
                            {{--                            href="profile" --}}
                            class="text-center d-block">
                        {{ auth('admin')->user()->email }}
                    </a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="{{request()->is('dashboard/categories') ? 'bg-gray-900 text-white' : null}}nav-item">
                        <a
                                href="{{url('dashboard/categories')}}"
                                class="nav-link">
                            <i class="nav-icon fa fa-list-alt"></i>
                            <p>Categories</p>
                        </a>
                    </li>
                    <li class="{{request()->is('dashboard/products') ? 'bg-gray-900 text-white' : null}}nav-item">
                        <a
                                href="{{url('dashboard/products')}}"
                                class="nav-link">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <form method="post" class="nav-link text-white" action="{{route('admin.destroySession')}}">
                            @csrf
                            @method('POST')
                            <button type="submit"><i class="nav-icon fa fa-sign-out-alt"></i>Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            @yield('page_title')
                            <small>@yield('small_title')</small>
                        </h1>
                    </div>
                    @yield('breadcrumb')
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.2.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminlte/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('adminlte/js/demo.js')}}"></script>
</body>
</html>
