<x-mail::message>
    Hi, {{$customer->name}}

    We received a request to access your account with otp,
    Your one time password is: {{$otp}}

    Thanks,
    {{ config('app.name') }}
</x-mail::message>
