<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Anonymity;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function signup(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('auth.login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signin(Request $request)
    {
        if (!(Auth::attempt(['email' => $request->email, 'password' => $request->password]))) {
            return back()->withErrors([
                'email' => 'メールアドレスまたはパスワードが間違っています。',
            ]);
        }
        $userId = auth()->user()->id;
        $anonymity = Anonymity::where('user_id', $userId)->first();
        if ($anonymity && $anonymity->nickname) {
            return redirect()->route('index.index');
        }
        return redirect()->route('mypage.nickname');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index.index');
    }
}
