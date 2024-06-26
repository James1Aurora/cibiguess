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
use App\Models\Role;
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
            $user = Auth::user();
            if ($user->roleId == 1) {
                return redirect()->intended('ad');
            } elseif ($user->roleId == 2) {
                return redirect()->intended('main-menu');
            }
        }

        return redirect('login')->with('error', 'Invalid credentials');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerPost(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Jika validasi gagal, kembalikan ke halaman registrasi dengan pesan kesalahan
        if ($validator->fails()) {
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        // Periksa apakah role dengan ID 2 ada di database
        $role = Role::find(2);
        if (!$role) {
            abort(404, 'Role not found');
        }

        // Buat user baru dengan role ID 2
        $user = User::create([
            'roleId' => 2,
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login user yang baru dibuat
        Auth::login($user);

        // Arahkan ke halaman login dengan pesan sukses
        return redirect('login')->with('success', 'Registration successful! You are now logged in.');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'You have been logged out.');
    }

    public function showUser()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('games.index', compact('user')); // Ensure the correct view name
    }

}
