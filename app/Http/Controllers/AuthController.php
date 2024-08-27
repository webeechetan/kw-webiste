<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;


class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('dashboard');
        }else{
            $this->alert('Login Failed','Invalid Email or Password','danger');
            return redirect()->route('login.view');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.view');
    }

    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->email)->first();
        if ($user) {
            auth()->login($user);
            return redirect()->route('dashboard');
        } else {
            $this->alert('Login Failed','You are not registered with us. Please register first.','danger');
            return redirect()->route('login.view');
        }
    }
}
