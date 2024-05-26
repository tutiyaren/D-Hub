<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\UseCase\Auth\SignUpUseCase;
use App\UseCase\Auth\SignInUseCase;
use App\UseCase\Auth\LogoutUseCase;

class UserController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function signup(UserRequest $request, SignUpUseCase $case)
    {
        $case($request);
        return redirect()->route('auth.login');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function signin(Request $request, SignInUseCase $case)
    {
        $result = $case($request);

        if (!$result['success']) {
            return back()->withErrors([
                'email' => $result['error_message'],
            ]);
        }

        return redirect()->route($result['redirect_route']);
    }

    public function logout(Request $request, LogoutUseCase $case)
    {
        $case($request);
        return redirect()->route('index.index');
    }
}
