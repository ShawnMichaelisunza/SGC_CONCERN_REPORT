<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // view all accounts
    public function index()
    {

        $users = $this->userService->UserViewAllService();

        return view('user.user_dashboard', ['users' => $users]);
    }
    public function deleted(){

        $users = $this->userService->UserViewDeletedService();
        return view('user.user_dashboard', ['users' => $users]);
    }

    // create an account
    public function createUser(){

        return view('user.user_create');
    }
    public function storeUser(UserRequest $req){

        $val = $req->validated();
        $val['password'] = bcrypt($val['password']);

        $this->userService->UserStoreService($val);

        return redirect()->route('user.index')->with('success', 'Created Account Successfully !');
    }

    // view an account
    public function view($id){

        $user = $this->userService->UserViewService($id);
        return view('user.user_view', ['user' => $user]);
    }

    // edit and update an account
    public function edit($id){

        $user = $this->userService->UserEditService($id);
        return view('user.user_edit', ['user' => $user]);
    }
    public function update($id, EditUserRequest $req){

        $val = $req->validated();
        $val['password'] = bcrypt($val['password']);

        $this->userService->UserUpdateService($id, $val);

        return redirect()->route('user.index')->with('success', 'Updated Account Successfully !');
    }

    // view and delete an account
    public function viewDelete($id){

        $user = $this->userService->UserViewDeleteService($id);
        return view('user.user_view_delete', ['user' => $user]);
    }
    public function delete($id){

        $this->userService->UserDeleteService($id);
        return redirect()->route('user.index')->with('success', 'Deleted Account Successfully !');
    }

    // -------------------------------


    // login account
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
                } elseif ($usertype == 'headAdmin') {
                    return redirect()->route('dashboard');
                } elseif ($usertype == 'superAdmin') {
                    return redirect()->route('dashboard');
                }
            }
        }

        return back()
            ->withErrors(['email' => 'Login Failed'])
            ->onlyInput('email');
    }

    // register account
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

    // logout account
    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logout Account Successfully !');
    }
}
