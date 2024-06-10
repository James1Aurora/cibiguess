<?php
 
// namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;

// class AuthController extends Controller
// {
//     public function login() {
//         return view('auth.login');
//     }

//     public function loginPost(Request $request) {
//         //
//     }

//     public function register() {
//         return view('auth.register');
//     }

//     public function registerPost(Request $request) {
//         //
//     }
// }
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuthLogin; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    
    public function loginPost(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('main-menu');
        }

        return redirect('login')->with('error', 'Invalid credentials');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect('home');
    }
    public function showUser()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('games.index', compact('user')); // Ensure the correct view name
    }

}