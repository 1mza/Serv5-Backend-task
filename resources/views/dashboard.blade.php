<!DOCTYPE html>
<html class="h-full bg-white">
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
    <script src="https://cdn.tailwindcss.com?plugin=forms"></script>

</head>
<body class="hold-transition bg-dark sidebar-mini h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
             alt="Your Company">
        <h1 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Dashboard</h1>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <p class="mt-5 text-center text-sm text-gray-500">
            <button class="p-3 text-center bg-gray-500 rounded">
                <a href="{{route('admin.create')}}" class=" font-semibold leading-6 text-white hover:text-black">Register
                    Now!</a>
            </button>
            <button class="p-3 text-center bg-gray-500 rounded">
                <a href="{{route('admin.createSession')}}" class=" font-semibold leading-6 text-white hover:text-black">Log In
                    Now!</a>
            </button>


        </p>
    </div>
</div>

</body>
</html>
