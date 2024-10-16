<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Notifications\OTP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserAuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'confirmed', Password::min(8)],
        ]);
        $user = User::create($attributes);
        if ($user) {
            auth('web')->login($user);
            request()->session()->regenerate();
            return redirect()->route('welcome')->with('success', 'Account created successfully. Welcome!');
        }
        return back()->with('error', 'There was a problem creating your account. Please try again.');
    }

    public function createSession()
    {
        return view('auth.login');
    }

    public function storeSession()
    {
        $attributes = request()->validate([
            'email' => ['required', 'string', 'email', Rule::exists('users', 'email')],
            'password' => ['required', 'string', Password::min(8)],
        ]);
        if (Auth::guard('web')->attempt($attributes)) {
            request()->session()->regenerate();
            return redirect()->route('welcome')->with('success', 'Logged in successfully');
        }
        return redirect()->route('user.createSession')->with('danger', 'Please enter valid credentials.');
    }

    public function destroySession()
    {
        Auth::guard('web')->logout();
        return redirect()->route('user.createSession');
    }

    public function viewPageEmailToSendOtp()
    {
        return view('auth.send-otp');
    }

    public function checkEmailAndSentOTP()
    {
        request()->validate([
            'email' => ['required', 'string', 'email', Rule::exists('users', 'email')],
        ]);
        $user = User::where('email', request('email'))->first();
        if (!$user) {
            return redirect()->route('user.viewPageEmailToSendOtp')->with('danger', 'User not found.');
        }
        $otp = rand(1000, 9999);
        $user->update(['otp' => $otp]);
        $user->notify(new OTP($user));
//        dd('OTP IS SENT');
        return redirect()->route('user.viewPageCheckOtp')->with('user_id', $user->id);
    }

    public function viewPageCheckOtp()
    {
        return view('auth.login-otp');
    }

    public function loginWithOTP()
    {
//        dd(request()->user_id);
        request()->validate([
            'otp' => ['required', Rule::exists('users', 'otp'), function ($attribute, $value, $fail) {
                if (!User::where('otp', $value)
                    ->where('id', request()->user_id)
                    ->exists()) {
                    $fail('Invalid OTP.');
                }
            }],
        ]);
        $user = User::find(request()->user_id);
        auth('web')->login($user);
        request()->session()->regenerate();
        $user->update(['otp' => null]);
        return redirect()->route('welcome')->with('success', 'Logged in successfully.');
    }
}