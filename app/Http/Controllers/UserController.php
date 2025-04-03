<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view('user.login');
    }
    public function store(LoginRequest $req)
    {
        $val = $req->validated();

        if (auth()->attempt($val)) {
            request()->session()->regenerate();

            if (Auth::id()) {
                $usertype = auth()->user()->usertype;

                if ($usertype == 'user') {

                    return redirect()->route('dashboard');

                } elseif ($usertype == 'admin') {

                    return redirect()->route('dashboard');
                }
            }
        }

        return redirect()
            ->route('login')
            ->withErrors(['email' => 'Login Failed'])
            ->onlyInput('email');
    }

    public function register()
    {
        return view('user.register');
    }
    public function create(UserRequest $req)
    {
        $val = $req->validated();
        $val['password'] = bcrypt($val['password']);

        $this->userService->UserStoreService($val);

        return redirect()->route('login')->with('success', 'Created Account Successfully !');
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout Account Successfully !');
    }
}
