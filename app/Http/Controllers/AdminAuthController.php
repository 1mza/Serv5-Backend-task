<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Mail\OTP;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class AdminAuthController extends Controller
{

    public function create()
    {
        return view('dashboard.auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', Rule::unique('admins', 'email')],
            'password' => ['required', 'string', 'confirmed', Password::min(8)],
        ]);
        $admin = Admin::create($attributes);
        if ($admin) {
            auth('admin')->login($admin);
            request()->session()->regenerate();
            return redirect()->route('categories.index')->with('success', 'Account created successfully.');
        }
        return back()->with('error', 'There was a problem creating your account. Please try again.');
    }

    public function createSession()
    {
        return view('dashboard.auth.login');
    }

    public function storeSession()
    {
        $attributes = request()->validate([
            'email' => ['required', 'string', 'email', Rule::exists('admins', 'email')],
            'password' => ['required', 'string', Password::min(8)],
        ]);

        if (Auth::guard('admin')->attempt($attributes)) {
            request()->session()->regenerate();
            return redirect()->route('categories.index');
        }
        return redirect()->route('admin.createSession')->with('danger', 'Please enter valid credentials.');

    }

    public function destroySession()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.createSession');
    }

    public function viewPageEmailToSendOtp()
    {
        return view('dashboard.auth.send-otp');
    }

    public function checkEmailAndSentOTP()
    {
        request()->validate([
            'email' => ['required', 'string', 'email', Rule::exists('admins', 'email')],
        ]);
        $admin = Admin::where('email', request('email'))->first();
        if (!$admin) {
            return redirect()->route('admin.viewPageEmailToSendOtp')->with('danger', 'Admin not found.');
        }
        $otp = rand(1000, 9999);
        $admin->update(['otp' => $otp]);
        dispatch(Mail::to($admin)->send(new OTP($admin)))->afterResponse();
        return redirect()->route('admin.viewPageCheckOtp')->with('admin_id', $admin->id);
    }

    public function viewPageCheckOtp()
    {
        return view('dashboard.auth.login-otp');
    }

    public function loginWithOTP()
    {
//        dd(request()->admin_id);
        request()->validate([
            'otp' => ['required', Rule::exists('admins', 'otp'), function ($attribute, $value, $fail) {
                if (!Admin::where('otp', $value)
                    ->where('id', request()->admin_id)
                    ->exists()) {
                    $fail('Invalid OTP.');
                }
            }],
        ]);
        $admin = Admin::find(request()->admin_id);
        auth('admin')->login($admin);
        request()->session()->regenerate();
        $admin->update(['otp' => null]);
        return redirect()->route('categories.index')->with('success', 'Logged in successfully.');
    }


}

