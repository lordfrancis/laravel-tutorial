<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function index(){
        return 'Hello from UserController';
    }

    public function login(){
        if(View::exists('user.login')) {
            return view('user.login');
        } else {
            return abort(404);
        }
        return view('user.login');
    }

    public function process(Request $request) {

        $validated = $request->validate([
            "email" => ['required', 'email'],
            "password" => 'required'
        ]);

        if( auth()->attempt( $validated ) ) {
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');
    }

    public function register() {
        return view('user.register');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Logout successfull!');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            "name" => ['required', 'min:4'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        auth()->login($user);
    }

    public function show($id){
        $data = array(
            'id'   => $id,
            'name' => 'Francis',
            'age'  => 25,
            'email' => 'francis@gmail.com',
        );

        return view('user', ['data' => $data]);
    }
}
