<!DOCTYPE html>
<html class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
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
        <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Admin Dashboard</h2>
        <h2 class="text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in with OTP</h2>
        <h4 class="text-center text-sm font-bold leading-9 tracking-tight text-gray-900">Your OTP was sent to your email</h4>
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
        <form class="space-y-6" action="{{route('admin.loginOTP')}}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" value="{{session('admin_id')}}" name="admin_id">
            <div>
                <div class="flex items-center justify-between">
                    <label for="otp" class="block m-auto text-sm font-medium leading-6 text-gray-900">OTP</label>
                </div>
                <div class="mt-2 ">
                    <input id="otp" name="otp" type="text" maxlength="4" autocomplete="current-password" required
                           class="p-2 block fa w-12 m-auto rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Login with OTP
                </button>
            </div>
        </form>
        <p class="mt-5 text-center text-sm text-gray-500">
            You don't have an account!
            <a href="{{route('admin.create')}}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register
                Now!</a>
        </p>
    </div>
</div>

</body>
</html>
