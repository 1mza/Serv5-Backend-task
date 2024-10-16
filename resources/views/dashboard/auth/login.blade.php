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
<body class="hold-transition sidebar-mini h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
             alt="Your Company">
        <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Admin Dashboard</h2>
        <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
            account</h2>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="text-sm text-red-500 mt-1">{{ $error }}</p>
            @endforeach
        @endif
        @if(session()->has('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('alert-danger') }}
            </div>
        @endif
        <form class="space-y-6" action="{{route('admin.storeSession')}}" method="POST">
            @csrf
            @method('POST')
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required
                           class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                           class="p-2 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Log In
                </button>
            </div>
        </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                <a href="{{route('admin.viewPageEmailToSendOtp')}}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">OR Login with OTP</a>
            </p>

        <p class="mt-5 text-center text-sm text-gray-500">
            You don't have an account!
            <a href="{{route('admin.create')}}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register
                Now!</a>
        </p>
    </div>
</div>

</body>
</html>
